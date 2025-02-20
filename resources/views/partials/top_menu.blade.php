<div class="navbar navbar-expand-md navbar-dark">
    <div class="mt-2 mr-5">
        <a href="{{ route('dashboard') }}" class="d-inline-block">
        <h4 class="text-bold text-white">{{ Qs::getSystemName() }}</h4>
        </a>
    </div>
  {{--  <div class="navbar-brand">
        <a href="index.html" class="d-inline-block">
            <img src="{{ asset('global_assets/images/logo_light.png') }}" alt="">
        </a>
    </div>--}}

    <div class="d-md-none">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
            <i class="icon-tree5"></i>
        </button>
        <button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
            <i class="icon-paragraph-justify3"></i>
        </button>
    </div>

    <div class="collapse navbar-collapse" id="navbar-mobile">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="#" class="navbar-nav-link sidebar-control sidebar-main-toggle d-none d-md-block">
                    <i class="icon-paragraph-justify3"></i>
                </a>
            </li>


        </ul>

			<span class="navbar-text ml-md-3 mr-md-auto">
                @php
                    $routeDescription=[
                        'dashboard' => 'Welcome to your Dashboard! Stay updated with your latest metrics.',
                        'tt.index' => 'Create a new timetable or see the saved timetables.',
                        'payments.create' => 'Create payments by setting a Title and an Amount at minimum.',
                        'payments.manage' => 'Manage the payments of the students for each class.',
                        'payments.index'  => 'Manage the payments made for the selected year.',
                        'students.create' => 'Please fill the required info to add a new student',
                        'students.list'   => 'Manage students profiles.',
                        'students.promotion'=> 'Manage the promotion of each student for the actual class (From Class)',
                        'students.promotion_manage'   => 'Reset individual or all promoted students',
                        'students.graduated'   => 'View and Manage all graduated students',
                        'users.index'   => 'Please fill the required info to add a new user',
                        'users.edit' => 'Change/ Fill the required user infos',
                        'classes.index'   => 'All available classes are listed here, you can add a new class',
                        'classes.edit' => 'Change the name or the class type of this class',
                        'dorms.index' => 'Manage the available dorms listed here',
                        'dorms.edit' => 'Change the name or add a description for this dorm',
                        'sections.index' => 'Create a new section or Manage the available sections',
                        'sections.edit' => 'Change the name or set a teacher for the section',
                        'subjects.index' => 'Add a new subject or Manage the available subjects',
                        'subjects.edit' => 'Change the infos of this subject',
                        'exams.index'=> 'Manage the available exams or add a new exam, ONE and ONLY new exam is allowed per TERM',
                        'exams.edit' => 'Change the name or the term for this exam',
                        'grades.index' => 'Manage the available exams or add a custom grade',
                        'grades.edit' => 'Customize the values of this grade',
                        'marks.tabulation' => 'Show Exam details',
                        'marks.batch_fix' => '',
                        'marks.index' => 'Manage exams marks',
                        'marks.bulk' => 'Check students marksheets',
                        'settings' => 'System settings',
                        'my_account' => 'Account settings'    
                    ];
                    
                    $currentRoute= Route::currentRouteName();
                    echo $routeDescription[$currentRoute] ?? 'Welcome to '. Qs::getSystemName() .'! Explore all the features available.';
                @endphp
            </span>
        <ul class="navbar-nav">

            <li class="nav-item dropdown dropdown-user">
                <a href="#" class="navbar-nav-link dropdown-toggle" data-toggle="dropdown">
                    <img style="width: 38px; height:38px;" src="{{ Auth::user()->photo }}" class="rounded-circle" alt="photo">
                    <span>{{ Auth::user()->name }}</span>
                </a>

                <div class="dropdown-menu dropdown-menu-right">
                    <a href="{{ Qs::userIsStudent() ? route('students.show', Qs::hash(Qs::findStudentRecord(Auth::user()->id)->id)) : route('users.show', Qs::hash(Auth::user()->id)) }}" class="dropdown-item"><i class="icon-user-plus"></i> My profile</a>
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('my_account') }}" class="dropdown-item"><i class="icon-cog5"></i> Account settings</a>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
          document.getElementById('logout-form').submit();" class="dropdown-item"><i class="icon-switch2"></i> Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
    </div>
</div>
