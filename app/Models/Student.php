<?php

namespace App\Models;

use App\Models\AcademicSet;
use Illuminate\Support\Arr;
use App\Models\AcademicRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;

    protected $table = 'students';

    protected $fillable = [
        'created_by',
        'birthdate',
        'address',
        'level',
        'gender',
        'image',
        'set_id',
        'phone',
        'id',
        'reg_no'
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

    public function advisor()
    {
        return $this->belongsTo(Advisor::class, '');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id');
    }

    public static function auth()
    {
        return Student::where('id', auth()->id())->with('user')->first();
    }

    public function set()
    {
        return $this->belongsTo(AcademicSet::class, 'set_id');
    }

    public function courses()
    {
        return $this->hasMany(AcademicRecord::class, 'user_id');
    }


    public static function myClass()
    {
        return self::active()->set;
    }

    public static function allStudents()
    {
        $students = self::myClass();
        return $students?->students;
    }

    public static function myAdvisor()
    {
        return Advisor::where('id', self::myClass()?->advisor_id)->first();
    }

    public static function active()
    {
        return self::where('id', auth()->id())->first();
    }



    public function classStudents()
    {
    }
}
