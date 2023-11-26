<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    public function courses()
    {
        return $this->hasMany(Course::class, 'department_id');
    }

    public static function myDepartment()
    {
        return Department::where('id', auth()->user()->department_id)->first();
    }

    public static function levels(): array
    {
        $lastLevel = self::myDepartment()->lastLevel;
        $levels = [];
        for ($i = 1; $i <= $lastLevel / 100; $i++) {
            $levels[] = $i * 100;
        }
        return $levels;
    }

    public static function select($currentLevel): string
    {
        $select = "<select name='level' class='form-control'>";
        foreach (self::levels() as $level) {
            $selected = $level == $currentLevel ? ' selected' : '';
            $select .= "<option value='$level' $selected>$level Level</option>";
        }
        $select .= '</select>';

        return $select;
    }

    public static function myCoursesForLevel(int $level, string $semester)
    {
        return self::myDepartment()->courses->where('level', $level)->where('semester', $semester); //->orderBy('mandatory', 'asc');
    }

    public function coursesForDepartment(int $department)
    {
        return Course::where('department_id', $department)->orWhereNull('department_id');
    }
}
