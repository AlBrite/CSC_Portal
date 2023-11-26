<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'code',
        'courses',
        'level',
        'unit',
        'mandatory'
    ];


    public function allCourses()
    {
    }

    public function getLevelCourses(int $level)
    {
    }
    public function getLevelMandatoryCourses(int $level)
    {
    }

    public function getLevelElectiveCourses(int $level)
    {
    }

    public function getAllCoursesForDepartment(int $department)
    {
        return Course::whereNull('department_id')->orWhere('department_id', $department);
    }


    public function getAllCoursesForLevel(int $level, int $department)
    {
        return Course::whereNull('department_id')->orWhere('department_id', $department)->addWhere('level', $level);
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }

    public static function getAllCourses()
    {
        return Course::get();
    }

    public static function getCourses($level, $semester)
    {
        return Course::where('level', $level)->where('semester', $semester)->get();
    }
}
