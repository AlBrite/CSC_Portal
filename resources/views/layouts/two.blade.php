<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{asset('css/main.css')}}">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0" />
        <link rel="stylesheet" href="{{asset('css/student/student-home.css')}}"> 
        @yield('style', '')
        <title>@yield('title', 'CSC Portal')</title>
    </head>
    <body>
        <div id="overlay" class="overlay">
            <img src="{{asset('svg/logo.svg')}}" alt="">
            <div class="spinner"> </div>
        </div>
        <main>
            <x-menu/>
            <section>
                <x-header/>
                
                <div class="small-screen-nav-content">
                    <div class="small-search-div">
                        <label for="search"><button class="material-symbols-rounded" id="small-search-btn">search</button></label>
                        <input type="search" name="search" id="small-search" placeholder="Search...">
                    </div>
                    <ul class="nav-links">
                        <li><a href="home.html"><span class="material-symbols-rounded">home</span> Home</a></li>
                        <li><a href="courses.html" class="active"><span class="material-symbols-rounded">book_2</span> Courses</a></li>
                        <li><a href="results.html"><span class="material-symbols-rounded">school</span> Results</a></li>
                        <li><a href="profile.html"><span class="material-symbols-rounded">account_circle</span> Profile</a></li>
                        <li><a href="settings.html"><span class="material-symbols-rounded">settings</span> Settings</a></li>
                        <li><a href="/index.html"><span class="material-symbols-rounded">logout</span> Logout</a></li>
                    </ul>
                </div>
                @yield('hero', '')
                <div class="container gap-2">
                    <div class="container-left">
                        <div class="title">
                            <p class="text-body-300 weight-600 font-size-5">@yield('title', 'CSC Portal')</p>
                        </div>

                        <div class="app y-scroll">
                        
                            @yield('left')
                        </div>
                    </div>

                    <div class="container-right radius gap-2">
                        @yield('right')
                    </div>
                </div>
            </section>
        </main>

        <script src="{{asset('js/main.js')}}"></script>
        @yield('scripts', '')
    </body>
</html>