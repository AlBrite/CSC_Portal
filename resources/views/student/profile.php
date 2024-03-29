<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/src/main.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0" />
    <!-- Your CSS File -->
    <link rel="stylesheet" href="/src/styles/student/student-profile.css"> <!-- Write your CSS in this file alrady created for you -->
    <title>Student - Profile</title>
</head>
<body>
    <div id="overlay" class="overlay">
        <img src="/src/assets/logo.svg" alt="">
        <div class="spinner"> </div>
    </div>
    <main>
        <nav>
            <div class="nav--top flex align-center gap-small">
                <img src="/src/assets/logo.svg" alt="logo" width="40">
                <div>
                    <p class="font-size-1 text-body-600 weight-600">Department of Computer Science</p>
                    <p class="font-size-small text-body-400 weight-400">Federal University of Technolog, Owerri</p>
                </div>
            </div>
            <ul class="nav-links">
                <li><a href="home.html"><span class="material-symbols-rounded">home</span> Home</a></li>
                <li><a href="courses.html"><span class="material-symbols-rounded">book_2</span> Courses</a></li>
                <li><a href="results.html"><span class="material-symbols-rounded">school</span> Results</a></li>
                <li><a href="profile.html" class="active"><span class="material-symbols-rounded">account_circle</span> Profile</a></li>
                <li><a href="settings.html"><span class="material-symbols-rounded">settings</span> Settings</a></li>
                <li><a href="/index.html"><span class="material-symbols-rounded">logout</span> Logout</a></li>
            </ul>
        </nav>
        <section>
            <header>
                <div class="small-screen-nav flex align-center gap-2">
                    <div>
                        <span class="material-symbols-rounded text-primary-700 pointer" id="menu">menu</span>
                    </div>
                    <div class="flex align-center gap-small">
                        <img src="/src/assets/logo.svg" alt="logo" width="35">
                        <p class="text-primary weight-600 font-size-5">CSC-FUTO</p>
                    </div>
                </div>
                <div class="search-div">
                    <label for="search"><button class="material-symbols-rounded" id="search-btn">search</button></label>
                    <input type="search" name="search" id="search" placeholder="Search...">
                </div>
                <div class="top-right flex align-center gap-2">
                    <div class="icons flex align-center gap-2">
                        <a href="profile.html"><span class="material-symbols-rounded">account_circle</span></a>
                        <a href="settings.html"><span class="material-symbols-rounded">settings</span></a>
                    </div>
                    <div class="details flex gap-1 align-center">
                        <div class="image-container hidden">
                            <img src="/src/assets/user.jpg" alt="user-image" class="fit rounded">
                        </div>
                        <div class="user-info">
                            <p class="font-size-1 text-body-800 weight-600">Amalagu Cosmos</p>
                            <p class="font-size-small text-body-200 weight-400">amalagucosmos@example.com</p>
                        </div>
                    </div>
                </div>
            </header>
            <div class="small-screen-nav-content">
                <div class="small-search-div">
                    <label for="search"><button class="material-symbols-rounded" id="small-search-btn">search</button></label>
                    <input type="search" name="search" id="small-search" placeholder="Search...">
                </div>
                <ul class="nav-links">
                    <li><a href="home.html"><span class="material-symbols-rounded">home</span> Home</a></li>
                    <li><a href="courses.html"><span class="material-symbols-rounded">book_2</span> Courses</a></li>
                    <li><a href="results.html"><span class="material-symbols-rounded">school</span> Results</a></li>
                    <li><a href="profile.html" class="active"><span class="material-symbols-rounded">account_circle</span>
                            Profile</a></li>
                    <li><a href="settings.html"><span class="material-symbols-rounded">settings</span> Settings</a></li>
                    <li><a href="/index.html"><span class="material-symbols-rounded">logout</span> Logout</a></li>
                </ul>
            </div>

            <div class="container">
                <div class="title">
                    <p class="text-body-300 weight-600 font-size-5">Profile</p>
                </div>

                <div class="app">
                <!-- Write your code here: Do not use a <main></main> tag!!!-->
          
                </div>
            </div>
        </section>
    </main>

    <script src="/main.js"></script>
    <!-- Add the link to your own JavaScript file below this comment -->
</body>
</html>