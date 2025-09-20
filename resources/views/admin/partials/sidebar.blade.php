<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <!-- Dashboard -->
        <li class="nav-item">
            <a class="nav-link" href="#">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-view-dashboard-outline menu-icon"></i>
            </a>
        </li>

        <!-- Courses -->
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#courses-menu" aria-expanded="true" aria-controls="courses-menu">
                <span class="menu-title">Courses</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-school menu-icon"></i>
            </a>
            <div class="collapse show" id="courses-menu">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="{{route('courses.index')}}">View Courses</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('courses.create')}}">Create Course</a></li>

                </ul>
            </div>
        </li>

        <!-- Lessons -->
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#lessons-menu" aria-expanded="true" aria-controls="lessons-menu">
                <span class="menu-title">Lessons</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-book-open-variant menu-icon"></i>
            </a>
            <div class="collapse show" id="lessons-menu">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="{{route('lessons.index')}}">View Lessons</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('lessons.create')}}">Create Lesson</a></li>

                </ul>
            </div>
        </li>

        <!-- Users -->
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#users-menu" aria-expanded="true" aria-controls="users-menu">
                <span class="menu-title">Users</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-account-multiple menu-icon"></i>
            </a>
            <div class="collapse show" id="users-menu">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="{{route('admin.users.index')}}">View Users</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('admin.users.create')}}">Create User</a></li>
                
                </ul>
            </div>
        </li>
    </ul>
</nav>
