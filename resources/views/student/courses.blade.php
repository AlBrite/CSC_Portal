<x-student-layout title="Courses">
    <div class="no-courses flex-column align-center justify-center">
        <div>
            <img src="/src/assets/no_courses.svg" alt="">
        </div>
        <p class="text-center text-white-800 weight-400 font-size-5">
            Oops! It looks like you haven't registered for any courses yet.
            Register your courses before the deadline to ensure you can view them when they become available.
        </p>
        <button class="btn-primary" href="/src/pages/student/register-courses.html">Register Courses</button>
    </div>
    <div class="container-left">
        <div class="title">
            <p class="text-body-300 weight-600 font-size-5">Courses</p>
        </div>

        <div class="app">
            <div class="semester-course-card border radius">
                <img src="/src/assets/course_image_default.svg" alt="course-image">
                <p class="text-body-500 weight-600">Course title goes here</p>
                <p class="flex align-center gap-1">
                    <span class="text-body-300 weight-400">CSC XYZ</span>
                    <span class="divider"></span>
                    <span class="text-body-200 weight-400">3 Units</span>
                </p>
                <button class="btn-small view-full-details">View Details</button>
            </div>
            
            <div class="semester-course-card border radius">
                <img src="/src/assets/course_image_default.svg" alt="course-image">
                <p class="text-body-500 weight-600">Course title goes here</p>
                <p class="flex align-center gap-1">
                    <span class="text-body-300 weight-400">CSC XYZ</span>
                    <span class="divider"></span>
                    <span class="text-body-200 weight-400">3 Units</span>
                </p>
                <button class="btn-small view-full-details">View Details</button>
            </div>
            
            <div class="semester-course-card border radius">
                <img src="/src/assets/course_image_default.svg" alt="course-image">
                <p class="text-body-500 weight-600">Course title goes here</p>
                <p class="flex align-center gap-1">
                    <span class="text-body-300 weight-400">CSC XYZ</span>
                    <span class="divider"></span>
                    <span class="text-body-200 weight-400">3 Units</span>
                </p>
                <button class="btn-small view-full-details">View Details</button>
            </div>

            <div class="semester-course-card border radius">
                <img src="/src/assets/course_image_default.svg" alt="course-image">
                <p class="text-body-500 weight-600">Course title goes here</p>
                <p class="flex align-center gap-1">
                    <span class="text-body-300 weight-400">CSC XYZ</span>
                    <span class="divider"></span>
                    <span class="text-body-200 weight-400">3 Units</span>
                </p>
                <button class="btn-small view-full-details">View Details</button>
            </div>

            <div class="semester-course-card border radius">
                <img src="/src/assets/course_image_default.svg" alt="course-image">
                <p class="text-body-500 weight-600">Course title goes here</p>
                <p class="flex align-center gap-1">
                    <span class="text-body-300 weight-400">CSC XYZ</span>
                    <span class="divider"></span>
                    <span class="text-body-200 weight-400">3 Units</span>
                </p>
                <button class="btn-small view-full-details">View Details</button>
            </div>
            
            <div class="semester-course-card border radius">
                <img src="/src/assets/course_image_default.svg" alt="course-image">
                <p class="text-body-500 weight-600">Course title goes here</p>
                <p class="flex align-center gap-1">
                    <span class="text-body-300 weight-400">CSC XYZ</span>
                    <span class="divider"></span>
                    <span class="text-body-200 weight-400">3 Units</span>
                </p>
                <button class="btn-small view-full-details">View Details</button>
            </div>
            
            <div class="semester-course-card border radius">
                <img src="/src/assets/course_image_default.svg" alt="course-image">
                <p class="text-body-500 weight-600">Course title goes here</p>
                <p class="flex align-center gap-1">
                    <span class="text-body-300 weight-400">CSC XYZ</span>
                    <span class="divider"></span>
                    <span class="text-body-200 weight-400">3 Units</span>
                </p>
                <button class="btn-small">View Details</button>
            </div>
        </div>
    </div>

    <!-- On small screens this element will popup when the View Details button is clicked for each of the course cards -->
    <div class="view-details-small-screen">
        <button><span class="material-symbols-rounded">close</span></button>

        <div class="container-right-top flex gap-1 border radius">
            <div>
                <img src="/src/assets/course_image_default.svg" alt="course-image">
            </div>
            <div class="flex-column justify-center gap-1">
                <p class="text-body-500 weight-600 font-size-4">Course Title goes here</p>
                <p class="flex gap-1">
                    <span class="text-body-300 weight-400">CSC XYZ</span>
                    <span class="divider"></span>
                    <span class="text-body-200 weight-400">3 Units</span>
                </p>
            </div>
        </div>

        <p class="text-black-200 weight-700 font-size-2">Marks distribution</p>
        <div class="marks-dist text-body-800 weight-600">
            <div class="test-dist accent-200">20%</div>
            <div class="practical-dist secondary-200">20%</div>
            <div class="exam-dist primary-200">60%</div>
        </div>
        <div class="legend flex gap-2">
            <div class="flex gap-1">
                <div class="accent-200"></div>
                <p class="text-body-500 weight-400 font-size-2">test</p>
            </div>
            <div class="flex gap-1">
                <div class="secondary-200"></div>
                <p class="text-body-500 weight-400 font-size-2">practical</p>
            </div>
            <div class="flex gap-1">
                <div class="primary-200"></div>
                <p class="text-body-500 weight-400 font-size-2">exam</p>
            </div>
        </div>
    
        <!-- Marks distribution for course without practical -->
        <div class="marks-dist marks-dist-else text-body-800 weight-600" style="display: none;">
            <div class="test-dist accent-200">30%</div>
            <div class="exam-dist primary-200">70%</div>
        </div>
    
        <div hidden class="legend flex gap-2" style="display: none;">
            <div class="flex gap-1">
                <div class="accent-200"></div>
                <p class="text-body-500 weight-400 font-size-2">test</p>
            </div>
            <div class="flex gap-1">
                <div class="primary-200"></div>
                <p class="text-body-500 weight-400 font-size-2">exam</p>
            </div>
        </div>

        <div class="container-right-bottom padding-1">
            <p class="text-body-200 weight-700 font-size-2">Course description</p>
            <div class="course-desc border radius">
                <p class="text-body weight-400 font-size-2">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce in est ut velit malesuada scelerisque. Cras
                    ullamcorper
                    lacus id arcu blandit, et varius tortor sagittis. Nulla facilisi. Nulla ut ex ac justo aliquam gravida.
                    Proin sed nisl a
                    massa vestibulum pellentesque ac sed nulla. Donec ullamcorper bibendum ipsum, ut tristique metus. Sed at
                    purus eget nunc
                    sollicitudin volutpat. Suspendisse potenti. Nulla facilisi. Integer at felis sed augue mattis vehicula. Sed
                    gravida,
                    justo in laoreet pharetra, lectus ipsum euismod urna, sit amet venenatis odio lectus id nisl.
                    <br>
                    Aenean non urna non purus dignissim ultrices. Vestibulum viverra nec augue in congue. Sed non odio quis
                    justo tincidunt
                    consectetur. Phasellus vitae congue mauris. Sed nec justo non justo sollicitudin euismod vel sit amet
                    libero. Morbi
                    euismod justo sit amet lectus bibendum, nec tincidunt neque lacinia. Pellentesque eget justo id quam sodales
                    congue.
                    Cras tincidunt semper nunc, id dignissim erat tristique non. Donec eget fringilla ligula, nec lacinia purus.
                    Nam eget
                    aliquam massa, vel dictum purus. Vivamus ac libero nec ipsum malesuada fringilla.
                </p>
            </div>
        </div>                
    </div>
    
    <!-- Details for each of the courses on larger screens -->

    <div class="container-right border radius gap-1">
        <div class="container-right-top flex gap-1">
            <div>
                <img src="/src/assets/course_image_default.svg" alt="course-image">
            </div>
            <div class="flex-column justify-center gap-1">
                <p class="text-body-500 weight-600 font-size-4">Course Title goes here</p>
                <p class="flex gap-1">
                    <span  class="text-body-300 weight-400">CSC XYZ</span>
                    <span class="divider"></span>
                    <span  class="text-body-200 weight-400">3 Units</span>
                </p>
            </div>
        </div>

        <div class="container-right-middle p-x-1 p-y-2 flex-column gap-1">
            <p class="text-black-200 weight-700 font-size-2">Marks distribution</p>
            <div class="marks-dist text-body-800 weight-600">
                <div class="test-dist accent-200">20%</div>
                <div class="practical-dist secondary-200">20%</div>
                <div class="exam-dist primary-200">60%</div>
            </div>
            <div class="legend flex gap-2">
                <div class="flex gap-1">
                    <div class="accent-200"></div>
                    <p class="text-body-500 weight-400 font-size-2">test</p>
                </div>
                <div class="flex gap-1">
                    <div class="secondary-200"></div>
                    <p class="text-body-500 weight-400 font-size-2">practical</p>
                </div>
                <div class="flex gap-1">
                    <div class="primary-200"></div>
                    <p class="text-body-500 weight-400 font-size-2">exam</p>
                </div>
            </div>

            <!-- Marks distribution for course without practical -->
            <div class="marks-dist marks-dist-else text-body-800 weight-600" style="display: none;">
                <div class="test-dist accent-200">30%</div>
                <div class="exam-dist primary-200">70%</div>
            </div>

            <div hidden class="legend flex gap-2" style="display: none;">
                <div class="flex gap-1">
                    <div class="accent-200"></div>
                    <p class="text-body-500 weight-400 font-size-2">test</p>
                </div>
                <div class="flex gap-1">
                    <div class="primary-200"></div>
                    <p class="text-body-500 weight-400 font-size-2">exam</p>
                </div>
            </div>
        </div>

        <div class="container-right-bottom padding-1">
            <p class="text-body-200 weight-700 font-size-2">Course description</p>
            <div class="course-desc border radius">
                <p class="text-body weight-400 font-size-2">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce in est ut velit malesuada scelerisque. Cras ullamcorper
                    lacus id arcu blandit, et varius tortor sagittis. Nulla facilisi. Nulla ut ex ac justo aliquam gravida. Proin sed nisl a
                    massa vestibulum pellentesque ac sed nulla. Donec ullamcorper bibendum ipsum, ut tristique metus. Sed at purus eget nunc
                    sollicitudin volutpat. Suspendisse potenti. Nulla facilisi. Integer at felis sed augue mattis vehicula. Sed gravida,
                    justo in laoreet pharetra, lectus ipsum euismod urna, sit amet venenatis odio lectus id nisl.
                    <br>
                    Aenean non urna non purus dignissim ultrices. Vestibulum viverra nec augue in congue. Sed non odio quis justo tincidunt
                    consectetur. Phasellus vitae congue mauris. Sed nec justo non justo sollicitudin euismod vel sit amet libero. Morbi
                    euismod justo sit amet lectus bibendum, nec tincidunt neque lacinia. Pellentesque eget justo id quam sodales congue.
                    Cras tincidunt semper nunc, id dignissim erat tristique non. Donec eget fringilla ligula, nec lacinia purus. Nam eget
                    aliquam massa, vel dictum purus. Vivamus ac libero nec ipsum malesuada fringilla.
                </p>
            </div>
        </div>
    </div>
</x-student-layout>