@props(['message'])

@if (!empty($message))
    <div class="no-courses flex-column align-center justify-center">
        <div>
            <img src="{{asset('svg/no_courses.svg')}}" alt="">
        </div>
        <p class="text-center text-white-800 weight-400 font-size-5">
            {{$message}}
        </p>
    </div>
@endif