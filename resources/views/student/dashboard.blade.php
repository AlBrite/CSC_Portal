
@extends('layouts.two')
@section('title', 'Student Dashboard')

@section('left')
   
    @if($courses && $courses->count() > 0)
        @foreach($courses as $course)
       
            <div class="semester-course-card border radius">
                <img src="{{asset('svg/course_image_default.svg')}}" alt="course-image">
                <p class="text-body-500 weight-600">{{$course->name}}</p>
                <p class="flex align-center gap-1">
                    <span class="text-body-300 weight-400">{{$course->code}}</span>
                    <span class="divider"></span>
                    <span class="text-body-200 weight-400">{{$course->unit}} Unit{{ $course->unit >1 ? 's':''}}</span>
                </p>
            </div>
        @endforeach
    @else

        <div class="no-courses flex-column align-center justify-center">
            <div>
                <img src="{{asset('svg/no_courses.svg')}}" alt="">
            </div>
            <p class="text-center text-white-800 weight-400 font-size-5">
                Oops! It looks like you haven't registered for any courses yet.
                Register your courses before the deadline to ensure you can view them when they become available.
            </p>
            <a class="btn-primary" href="/student/register-courses">Register Courses</a>
        </div>
    @endif

@endsection
    
@section('right')
    
    <div class="student-info border radius padding-2">
        <x-profile-pic :user="$student" src="{{asset('images/user.jpg')}}" alt="Student-Image"/>

        <p class="text-body-800 weight-500 font-size-5">{{$user->name}}</p>
        <p class="text-black-300 weight-400">{{$student->reg_no}}</p>
        <p class="text-black-200 weight-400 font-size-2">Class:
            <span class="text-black-400 weight-600">{{$set->name}}</span>
        </p>
        <p class="divider-h"></p>
        <p class="text-black-200 weight-400 font-size-2">Advisor: 
            <span class="text-black-400 weight-600">{{$advisor->name}}</span>
        </p>
    </div>

    <div class="session-info padding-1 primary-50 radius flex align-center justify-center gap-1">
        <div class="flex-column align-center">
            <p class="text-secondary-800 weight-400 font-size-4">20XX-20YY</p>
            <p class="text-body-200 weight-400 font-size-2">Session</p>
        </div>
        <div class="divider"></div>
        <div class="flex-column align-center">
            <p class="text-secondary-800 weight-400 font-size-4">Harmattan</p>
            <p class="text-body-200 weight-400 font-size-2">Semester</p>
        </div>
    </div>
    <div class="notices">
        <div class="notices-container">
            <!-- List of notices. To be rendered from the Database -->
            <div class="notice-card primary-50 radius">
                <p class="text-secondary-800 weight-400 font-size-4">
                    XX Days Left for
                    course registration,
                    register now to access
                    your results
                </p>
                <a href="/student/register-courses" class="btn-small-primary">Register Courses</a>
                <img src="{{asset('svg/frame.svg')}}" alt="design">
            </div>
            <div class="notice-card primary-50 radius">
                <p class="text-secondary-800 weight-400 font-size-4">
                    XX Days Left for
                    course registration,
                    register now to access
                    your results
                </p>
                <button class="btn-small-primary">Register Courses</button>
                <img src="{{asset('svg/frame.svg')}}" alt="design">
            </div>
        </div>
    </div>
@endsection