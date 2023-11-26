<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\AcademicSet;
use App\Models\User;
use App\Models\Admin;
use App\Models\Advisor;
use App\Models\Course;
use App\Models\Department;
use App\Models\Student;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {


        // Dummy Accounts

        $advisor = [
            'name' => 'Theodora Ero',
            'role' => 'advisor',
            'email' => 'advisor@gmail.com',
            'password' => bcrypt('passkey'),
            'username' => fake()->userName(),
        ];

        $admin = [
            'name' => 'ICT Admin',
            'role' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('passkey'),
            'username' => fake()->userName(),
        ];

        $student = [
            'username' => 'buzzy',
            'name' => 'Ejimadu Chibuzo Bright',
            'role' => 'student',
            'level' => 500,
            'email' => 'student@gmail.com',
            'password' => bcrypt('passkey'),
            'token' => Str::random(10),
            'reg_no' => '20181121075'
        ];


        $startYears = [2017, 2018, 2019, 2022, 2023];
        $start = $startYears[mt_rand(0, count($startYears))];
        $end = $start + 5;

        $setData =  [
            'name' => "$start/$end",
            'start_year' => $start,
            'end_year' => $end
        ];

        $advisor = User::store_user($advisor);
        if ($advisor) {
            $setData['advisor_id'] =  $advisor->id;
        }
        $academicSet = AcademicSet::create($setData);

        // Assign Academic Set to data that will be used to create a dummy student
        if ($academicSet) {
            $student['set_id'] = $academicSet->id;
        }

        // Create dummy student account
        User::store_user($student);

        $courses = json_decode(file_get_contents(__DIR__ . '/../../public/js/courses.json'), true);

        foreach ($courses as $course) {
            Course::create($course);
        }
    }
}
