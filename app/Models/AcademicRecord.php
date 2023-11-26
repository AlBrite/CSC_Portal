<?php

namespace App\Models;

use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcademicRecord extends Model
{
    use HasFactory;

    protected $table = 'academic_records';
    protected $fillable = [
        'user_id',
        'course_id',
        'student_id',
        'semester',
        'unit',
        'level',
        'code',
        'name'
    ];



    public static function getFillables(array $data = [])
    {
        $class = __CLASS__;
        $obj = new $class;

        $fillables = $obj->fillable;

        if (count($data) === 0) {
            return $fillables;
        }

        return Arr::only($data, $fillables);
    }

    public function gradeToPoints()
    {

        $grade = strtoupper($this->grade);

        $gradingPointsMapping = [
            'A' => 5,
            'B' => 4,
            'C' => 3,
            'D' => 2,
            'E' => 1,
            'F' => 0
        ];

        return $gradingPointsMapping[$grade] ?? 0;
    }

    public function scoreToPoints()
    {
        $score = $this->score;

        return match (true) {
            $score >= 70 => 5,
            $score >= 60 => 4,
            $score >= 50 => 3,
            $score >= 45 => 2,
            $score >= 40 => 1,
            default => 0,
        };
    }


    public function calculateCGPA()
    {
        $academicRecords = $this - getAcademicRecords;
        $totalCredits = 0;
        $totalGradePoints = 0;

        foreach ($academicRecords as $record) {
            // Calculate the grade points for each course
            $gradePoints = $record->scoreToPoints();

            // Sum the total credits and grade points
            $totalCredits += $record->credits;
            $totalGradePoints += $gradePoints;
        }

        if ($totalCredits > 0) {
            // Calculate GPA by dividing total grade points by total credits
            $gpa = $totalGradePoints / $totalCredits;
            return number_format($gpa, 2);
        }

        return 0.0; // Return 0 GPA if there are no academic records
    }
}
