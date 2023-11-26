<?php

namespace App\Models;

use App\Models\User;
use App\Models\Student;
use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Advisor extends Model
{
    use HasFactory;

    protected $table = 'advisors';

    protected $fillable = [
        'created_by',
        'admin_id',
        'birthdate',
        'address',
        'gender',
        'id',
        //'image',
        'set_id'
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

    // Define relationship 

    public function user()
    {
        return $this->hasOne(User::class, 'id');
    }



    public function students()
    {
        return $this->hasMany(Student::class);
    }

    public function academicSet()
    {
        return $this->hasMany(AcademicSet::class);
    }

    public function getAllStudents()
    {
        return $this->students;
    }
    public function countStudents()
    {
        return $this->students->count();
    }

    public function getInfo()
    {
        $values = array_map(fn ($item) => $this->{$item}, $this->fillable);
        return array_combine($this->fillabe, $values);
    }
}
