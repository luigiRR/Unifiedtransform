<div class="col-xs-1 col-sm-1 col-md-1 col-lg-2 col-xl-2 col-xxl-2 border-rt-e6 px-0">
    <div class="d-flex flex-column align-items-center align-items-sm-start ">
                <ul class="nav flex-column pt-2 w-100">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('home')? 'active' : '' }}" href="{{url('home')}}"><em class="ms-auto bi bi-grid"></em> <span class="ms-1 d-inline d-sm-none d-md-none d-xl-inline">{{ __('Dashboard') }}</span></a>
                    </li>
                    {{-- @if (Auth::user()->role == "teacher")
                    <li class="nav-item">
                        <a type="button" href="{{url('attendances')}}" class="d-flex nav-link {{ request()->is('attendances*')? 'active' : '' }}"><em class="bi bi-calendar2-week"></em> <span class="ms-2 d-inline d-sm-none d-md-none d-xl-inline">Attendance</span></a>
                    </li>
                    @endif --}}
                    @can('view classes')
                    <li class="nav-item">
                        @php
                            if (session()->has('browse_session_id')){
                                $classCount = \App\Models\SchoolClass::where('session_id', session('browse_session_id'))->count();
                            } else {
                                $latest_session = \App\Models\SchoolSession::latest()->first();
                                if($latest_session) {
                                    $classCount = \App\Models\SchoolClass::where('session_id', $latest_session->id)->count();
                                } else {
                                    $classCount = 0;
                                }
                            }
                        @endphp
                        <a class="nav-link d-flex {{ request()->is('classes')? 'active' : '' }}" href="{{url('classes')}}"><em class="bi bi-diagram-3"></em> <span class="ms-2 d-inline d-sm-none d-md-none d-xl-inline">Classes</span> <span class="ms-auto d-inline d-sm-none d-md-none d-xl-inline">{{ $classCount }}</span></a>
                    </li>
                    @endcan
                    @if(Auth::user()->role != "student")
                    <li class="nav-item">
                        <a type="button" href="#student-submenu" data-bs-toggle="collapse" class="d-flex nav-link {{ request()->is('students*')? 'active' : '' }}"><em class="bi bi-person-lines-fill"></em> <span class="ms-2 d-inline d-sm-none d-md-none d-xl-inline">Students</span>
                            <em class="ms-auto d-inline d-sm-none d-md-none d-xl-inline bi bi-chevron-down"></em>
                        </a>
                        <ul class="nav collapse {{ request()->is('students*')? 'show' : 'hide' }} bg-white" id="student-submenu">
                            <li class="nav-item w-100" {{ request()->routeIs('student.list.show')? 'style="font-weight:bold;"' : '' }}><a class="nav-link" href="{{route('student.list.show')}}"><em class="bi bi-person-video2 me-2"></em> View Students</a></li>
                            @if (!session()->has('browse_session_id') && Auth::user()->role == "admin")
                            <li class="nav-item w-100" {{ request()->routeIs('student.create.show')? 'style="font-weight:bold;"' : '' }}><a class="nav-link" href="{{route('student.create.show')}}"><em class="bi bi-person-plus me-2"></em> Add Student</a></li>
                            @endif
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a type="button" href="#teacher-submenu" data-bs-toggle="collapse" class="d-flex nav-link {{ request()->is('teachers*')? 'active' : '' }}"><em class="bi bi-person-lines-fill"></em> <span class="ms-2 d-inline d-sm-none d-md-none d-xl-inline">Teachers</span>
                            <em class="ms-auto d-inline d-sm-none d-md-none d-xl-inline bi bi-chevron-down"></em>
                        </a>
                        <ul class="nav collapse {{ request()->is('teachers*')? 'show' : 'hide' }} bg-white" id="teacher-submenu">
                            <li class="nav-item w-100" {{ request()->routeIs('teacher.list.show')? 'style="font-weight:bold;"' : '' }}><a class="nav-link" href="{{route('teacher.list.show')}}"><em class="bi bi-person-video2 me-2"></em> View Teachers</a></li>
                            @if (!session()->has('browse_session_id') && Auth::user()->role == "admin")
                            <li class="nav-item w-100" {{ request()->routeIs('teacher.create.show')? 'style="font-weight:bold;"' : '' }}><a class="nav-link" href="{{route('teacher.create.show')}}"><em class="bi bi-person-plus me-2"></em> Add Teacher</a></li>
                            @endif
                        </ul>
                    </li>
                    @endif
                    @if(Auth::user()->role == "teacher")
                    <li class="nav-item">
                        <a class="nav-link {{ (request()->is('courses/teacher*') || request()->is('courses/assignments*'))? 'active' : '' }}" href="{{route('course.teacher.list.show', ['teacher_id' => Auth::user()->id])}}"><em class="bi bi-journal-medical"></em> <span class="ms-1 d-inline d-sm-none d-md-none d-xl-inline">My Courses</span></a>
                    </li>
                    @endif
                    @if(Auth::user()->role == "student")
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('student.attendance.show')? 'active' : '' }}" href="{{route('student.attendance.show', ['id' => Auth::user()->id])}}"><em class="bi bi-calendar2-week"></em> <span class="ms-1 d-inline d-sm-none d-md-none d-xl-inline">Attendance</span></a>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('course.student.list.show')? 'active' : '' }}" href="{{route('course.student.list.show', ['student_id' => Auth::user()->id])}}"><em class="bi bi-journal-medical"></em> <span class="ms-1 d-inline d-sm-none d-md-none d-xl-inline">Courses</span></a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="#"><em class="bi bi-file-post"></em> <span class="ms-1 d-inline d-sm-none d-md-none d-xl-inline">Assignments</span></a>
                    </li><li class="nav-item">
                        <a class="nav-link" href="#"><em class="bi bi-cloud-sun"></em> <span class="ms-1 d-inline d-sm-none d-md-none d-xl-inline">Marks</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><em class="bi bi-journal-text"></em> <span class="ms-1 d-inline d-sm-none d-md-none d-xl-inline">Syllabus</span></a>
                    </li> --}}
                    <li class="nav-item border-bottom">
                        @php
                            if (session()->has('browse_session_id')){
                                $class_info = \App\Models\Promotion::where('session_id', session('browse_session_id'))->where('student_id', Auth::user()->id)->first();
                            } else {
                                $latest_session = \App\Models\SchoolSession::latest()->first();
                                if($latest_session) {
                                    $class_info = \App\Models\Promotion::where('session_id', $latest_session->id)->where('student_id', Auth::user()->id)->first();
                                } else {
                                    $class_info = [];
                                }
                            }
                        @endphp
                        <a class="nav-link" href="{{route('section.routine.show', [
                            'class_id'  => $class_info->class_id,
                            'section_id'=> $class_info->section_id
                        ])}}"><em class="bi bi-calendar4-range"></em> <span class="ms-1 d-inline d-sm-none d-md-none d-xl-inline">Routine</span></a>
                    </li>
                    @endif
                    @if(Auth::user()->role != "student")
                    <li class="nav-item border-bottom">
                        <a type="button" href="#exam-grade-submenu" data-bs-toggle="collapse" class="d-flex nav-link {{ request()->is('exams*')? 'active' : '' }}"><em class="bi bi-file-text"></em> <span class="ms-2 d-inline d-sm-none d-md-none d-xl-inline">Exams / Grades</span>
                            <em class="ms-auto d-inline d-sm-none d-md-none d-xl-inline bi bi-chevron-down"></em>
                        </a>
                        <ul class="nav collapse {{ request()->is('exams*')? 'show' : 'hide' }} bg-white" id="exam-grade-submenu">
                            <li class="nav-item w-100" {{ request()->routeIs('exam.list.show')? 'style="font-weight:bold;"' : '' }}><a class="nav-link" href="{{route('exam.list.show')}}"><em class="bi bi-file-text me-2"></em> View Exams</a></li>
                            @if (Auth::user()->role == "admin" || Auth::user()->role == "teacher")
                            <li class="nav-item w-100" {{ request()->routeIs('exam.create.show')? 'style="font-weight:bold;"' : '' }}><a class="nav-link" href="{{route('exam.create.show')}}"><em class="bi bi-file-plus me-2"></em> Create Exams</a></li>
                            @endif
                            @if (Auth::user()->role == "admin")
                            <li class="nav-item w-100" {{ request()->routeIs('exam.grade.system.create')? 'style="font-weight:bold;"' : '' }}><a class="nav-link" href="{{route('exam.grade.system.create')}}"><em class="bi bi-file-plus me-2"></em> Add Grade Systems</a></li>
                            @endif
                            <li class="nav-item w-100" {{ request()->routeIs('exam.grade.system.index')? 'style="font-weight:bold;"' : '' }}><a class="nav-link" href="{{route('exam.grade.system.index')}}"><em class="bi bi-file-ruled me-2"></em> View Grade Systems</a></li>
                        </ul>
                    </li>
                    {{-- <li class="nav-item border-bottom">
                        <a type="button" href="#" class="d-flex nav-link {{ request()->is('marks*')? 'active' : '' }} dropdown-toggle caret-off" data-bs-toggle="dropdown" aria-expanded="false"><em class="bi bi-cloud-sun"></em> <span class="ms-2 d-inline d-sm-none d-md-none d-xl-inline">Marks / Results</span>
                            <em class="ms-auto d-inline d-sm-none d-md-none d-xl-inline bi bi-chevron-down"></em>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="{{url('marks/view')}}">View Marks</a></li>
                            <li><a class="dropdown-item" href="{{url('marks/results')}}">View Results</a></li>
                        </ul>
                    </li> --}}
                    @endif
                    @if (Auth::user()->role == "admin")
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('notice*')? 'active' : '' }}" href="{{route('notice.create')}}"><em class="bi bi-megaphone"></em> <span class="ms-1 d-inline d-sm-none d-md-none d-xl-inline">Notice</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('calendar-event*')? 'active' : '' }}" href="{{route('events.show')}}"><em class="bi bi-calendar-event"></em> <span class="ms-1 d-inline d-sm-none d-md-none d-xl-inline">Event</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('syllabus*')? 'active' : '' }}" href="{{route('class.syllabus.create')}}"><em class="bi bi-journal-text"></em> <span class="ms-1 d-inline d-sm-none d-md-none d-xl-inline">Syllabus</span></a>
                    </li>
                    <li class="nav-item border-bottom">
                        <a class="nav-link {{ request()->is('routine*')? 'active' : '' }}" href="{{route('section.routine.create')}}"><em class="bi bi-calendar4-range"></em> <span class="ms-1 d-inline d-sm-none d-md-none d-xl-inline">Routine</span></a>
                    </li>
                    @endif
                    @if (Auth::user()->role == "admin")
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('academics*')? 'active' : '' }}" href="{{url('academics/settings')}}"><em class="bi bi-tools"></em> <span class="ms-1 d-inline d-sm-none d-md-none d-xl-inline">Academic</span></a>
                    </li>
                    @endif
                    @if (!session()->has('browse_session_id') && Auth::user()->role == "admin")
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('promotions*')? 'active' : '' }}" href="{{url('promotions/index')}}"><em class="bi bi-sort-numeric-up-alt"></em> <span class="ms-1 d-inline d-sm-none d-md-none d-xl-inline">Promotion</span></a>
                    </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#" aria-disabled="true"><em class="bi bi-currency-exchange"></em> <span class="ms-1 d-inline d-sm-none d-md-none d-xl-inline">Payment</span></a>
                    </li>
                    @if (Auth::user()->role == "admin")
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#" aria-disabled="true"><em class="bi bi-person-lines-fill"></em> <span class="ms-1 d-inline d-sm-none d-md-none d-xl-inline">Staff</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#" aria-disabled="true"><em class="bi bi-journals"></em> <span class="ms-1 d-inline d-sm-none d-md-none d-xl-inline">Library</span></a>
                    </li>
                    @endif
                </ul>
            </div>
        </div>