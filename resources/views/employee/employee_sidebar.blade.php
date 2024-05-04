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


                <!-- end employee pages -->

            </nav>
        </div>
    </div>
</div>