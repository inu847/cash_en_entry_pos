<div class="app-sidebar colored">
    <div class="sidebar-header">
        <a class="header-brand" href="{{route('dashboard')}}">
            <div class="logo-img">
               <img height="30" src="{{ asset('img/logo_horizontal.png')}}" class="header-brand-img" title="Cash N Entry"> 
            </div>
        </a>
        <div class="sidebar-action"><i class="ik ik-arrow-left-circle"></i></div>
        <button id="sidebarClose" class="nav-close"><i class="ik ik-x"></i></button>
    </div>

    @php
        $segment1 = request()->segment(1);
        $segment2 = request()->segment(2);
    @endphp
    
    <div class="sidebar-content">
        <div class="nav-container">
            <nav id="main-menu-navigation" class="navigation-main">
                <div class="nav-item {{ ($segment2 == 'employee') ? 'active' : '' }}">
                    <a href="{{url('/Employee')}}"><i class="ik ik-bar-chart-2"></i><span>{{ __('Dashboard')}}</span></a>
                </div>

                <!-- start employee pages -->
                <div class="nav-item {{ ($segment1 == 'employee') ? 'active open' : '' }} has-sub">
                    <a href="#"><i class="ik ik-headphones"></i><span>{{ __('Employee')}}</span></a>
                    <div class="submenu-content">
                        <a href="{{ route('employee.create') }}" class="menu-item {{ ($segment1 == 'employee' && $segment2 == 'create') ? 'active' : '' }}">{{ __('Add Employee')}}</a>
                        <a href="{{ route('employee.index') }}" class="menu-item {{ ($segment1 == 'employee' && $segment2 == '') ? 'active' : '' }}">{{ __('List Employee')}}</a>
                    </div>
                </div>
                <div class="nav-item {{ ($segment1 == 'emPosition') ? 'active open' : '' }} has-sub">
                    <a href="#"><i class="ik ik-headphones"></i><span>{{ __('Employee Position')}}</span></a>
                    <div class="submenu-content">
                        <a href="{{ route('emPosition.create') }}" class="menu-item {{ ($segment1 == 'emPosition' && $segment2 == 'create') ? 'active' : '' }}">{{ __('Add Position')}}</a>
                        <a href="{{ route('emPosition.index') }}" class="menu-item {{ ($segment1 == 'emPosition' && $segment2 == '') ? 'active' : '' }}">{{ __('List Position')}}</a>
                    </div>
                </div>
                <div class="nav-item {{ ($segment1 == 'emStatus') ? 'active open' : '' }} has-sub">
                    <a href="#"><i class="ik ik-headphones"></i><span>{{ __('Employee Status')}}</span></a>
                    <div class="submenu-content">
                        <a href="{{ route('emStatus.create') }}" class="menu-item {{ ($segment1 == 'emStatus' && $segment2 == 'create') ? 'active' : '' }}">{{ __('Add Status')}}</a>
                        <a href="{{ route('emStatus.index') }}" class="menu-item {{ ($segment1 == 'emStatus' && $segment2 == '') ? 'active' : '' }}">{{ __('List Status')}}</a>
                    </div>
                </div>
                <div class="nav-item {{ ($segment1 == 'emLevel') ? 'active open' : '' }} has-sub">
                    <a href="#"><i class="ik ik-headphones"></i><span>{{ __('Employee Level')}}</span></a>
                    <div class="submenu-content">
                        <a href="{{ route('emLevel.create') }}" class="menu-item {{ ($segment1 == 'emLevel' && $segment2 == 'create') ? 'active' : '' }}">{{ __('Add Level')}}</a>
                        <a href="{{ route('emLevel.index') }}" class="menu-item {{ ($segment1 == 'emLevel' && $segment2 == '') ? 'active' : '' }}">{{ __('List level')}}</a>
                    </div>
                </div>
                <div class="nav-item {{ ($segment1 == 'emSalary') ? 'active open' : '' }} has-sub">
                    <a href="#"><i class="ik ik-headphones"></i><span>{{ __('Employee Salary')}}</span></a>
                    <div class="submenu-content">
                        <a href="{{ route('emSalary.create') }}" class="menu-item {{ ($segment1 == 'emSalary' && $segment2 == 'create') ? 'active' : '' }}">{{ __('Add Salary')}}</a>
                        <a href="{{ route('emSalary.index') }}" class="menu-item {{ ($segment1 == 'emSalary' && $segment2 == '') ? 'active' : '' }}">{{ __('List Salary')}}</a>
                    </div>
                </div>
                <div class="nav-item {{ ($segment1 == 'emLoan') ? 'active open' : '' }} has-sub">
                    <a href="#"><i class="ik ik-headphones"></i><span>{{ __('Employee Loan')}}</span></a>
                    <div class="submenu-content">
                        <a href="{{ route('emLoan.create') }}" class="menu-item {{ ($segment1 == 'emLoan' && $segment2 == 'create') ? 'active' : '' }}">{{ __('Add Loan')}}</a>
                        <a href="{{ route('emLoan.index') }}" class="menu-item {{ ($segment1 == 'emLoan' && $segment2 == '') ? 'active' : '' }}">{{ __('List Loan')}}</a>
                    </div>
                </div>
                <div class="nav-item {{ ($segment1 == 'emWorkingH') ? 'active open' : '' }} has-sub">
                    <a href="#"><i class="ik ik-headphones"></i><span>{{ __('Employee Working Hour')}}</span></a>
                    <div class="submenu-content">
                        <a href="{{ route('emWorkingH.create') }}" class="menu-item {{ ($segment1 == 'emWorkingH' && $segment2 == 'create') ? 'active' : '' }}">{{ __('Add Working Hour')}}</a>
                        <a href="{{ route('emWorkingH.index') }}" class="menu-item {{ ($segment1 == 'emWorkingH' && $segment2 == '') ? 'active' : '' }}">{{ __('List Working Hour')}}</a>
                    </div>
                </div>
                <div class="nav-item {{ ($segment1 == 'emAttendance') ? 'active open' : '' }} has-sub">
                    <a href="#"><i class="ik ik-headphones"></i><span>{{ __('Employee Attendace')}}</span></a>
                    <div class="submenu-content">
                        <a href="{{ route('emAttendance.create') }}" class="menu-item {{ ($segment1 == 'emAttendance' && $segment2 == 'create') ? 'active' : '' }}">{{ __('Add Attendance')}}</a>
                        <a href="{{ route('emAttendance.index') }}" class="menu-item {{ ($segment1 == 'emAttendance' && $segment2 == '') ? 'active' : '' }}">{{ __('List Attendance')}}</a>
                    </div>
                </div>

                <div class="nav-item {{ ($segment1 == 'emWorkingH') ? 'active open' : '' }} has-sub">
                    <a href="#"><i class="ik ik-headphones"></i><span>{{ __('Employee Working Hour')}}</span></a>
                    <div class="submenu-content">
                          <a href="{{ route('emWorkingH.create') }}" class="menu-item {{ ($segment1 == 'emWorkingH' && $segment2 == 'create') ? 'active' : '' }}">{{ __('Add Working Hour')}}</a>
                        <a href="{{ route('emWorkingH.index') }}" class="menu-item {{ ($segment1 == 'emWorkingH' && $segment2 == '') ? 'active' : '' }}">{{ __('List Working Hour')}}</a>
                    </div>
                </div>

                <!-- end employee pages -->

            </nav>
        </div>
    </div>
</div>