<div class="app-sidebar colored">
    <div class="sidebar-header">
        <a class="header-brand" href="{{route('dashboard')}}">
            <div class="logo-img">
               <img width="150" src="{{ asset('img/logo_horizontal.png')}}" class="header-brand-img" title="Cash N Entry"> 
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
                <div class="nav-item {{ ($segment1 == 'dashboard') ? 'active' : '' }}">
                    <a href="{{route('dashboard')}}"><i class="ik ik-bar-chart-2"></i><span>{{ __('Dashboard')}}</span></a>
                </div>
                <div class="nav-lavel">{{ __('Master Data')}} </div>
                <div class="nav-item {{ ($segment1 == 'banner' || $segment1 == '') ? 'active open' : '' }} has-sub">
                <a href="#"><i class="ik ik-file-text"></i><span>{{ __('Banner')}}</span></a>
                <div class="submenu-content">
                    <a href="{{route('banner.create')}}" class="menu-item {{ ($segment1 == 'banner') ? 'active' : 'create' }}">{{ __('Add Banner')}}</a>
                    <a href="{{route('banner.index')}}" class="menu-item {{ ($segment1 == 'banner') ? 'active' : '' }}">{{ __('List Banner')}}</a>
                </div>
                </div>

                <div class="nav-item {{ ($segment1 == 'askedQuestions' || $segment1 == '') ? 'active open' : '' }} has-sub">
                <a href="#"><i class="ik ik-file-text"></i><span>{{ __('Frequently Asked Questions')}}</span></a>
                <div class="submenu-content">
                    <a href="{{route('askedQuestions.create')}}" class="menu-item {{ ($segment1 == 'askedQuestions') ? 'active' : '' }}">{{ __('Add Question')}}</a>
                    <a href="{{route('askedQuestions.index')}}" class="menu-item {{ ($segment1 == 'askedQuestions') ? 'active' : '' }}">{{ __('Question List')}}</a>
                </div>
                </div>

                <div class="nav-item {{ ($segment1 == 'whyShouldWe' || $segment1 == '') ? 'active open' : '' }} has-sub">
                <a href="#"><i class="ik ik-file-text"></i><span>{{ __('Why Should We')}}</span></a>
                <div class="submenu-content">
                    <a href="{{route('whyShouldWe.create')}}" class="menu-item {{ ($segment1 == 'whyShouldWe') ? 'active' : '' }}">{{ __('Add')}}</a>
                    <a href="{{route('whyShouldWe.index')}}" class="menu-item {{ ($segment1 == 'whyShouldWe') ? 'active' : '' }}">{{ __('List')}}</a>
                </div>
                </div>

                <div class="nav-item {{ ($segment1 == 'generalSetting' || $segment1 == '') ? 'active open' : '' }} has-sub">
                <a href="#"><i class="ik ik-file-text"></i><span>{{ __('General Setting')}}</span></a>
                <div class="submenu-content">
                    <a href="{{route('generalSetting.create')}}" class="menu-item {{ ($segment1 == 'generalSetting') ? 'active' : '' }}">{{ __('Add')}}</a>
                    <a href="{{route('generalSetting.index')}}" class="menu-item {{ ($segment1 == 'generalSetting') ? 'active' : '' }}">{{ __('List')}}</a>
                </div>
                </div>

                <div class="nav-item {{ ($segment1 == 'voucher' || $segment1 == '') ? 'active open' : '' }} has-sub">
                <a href="#"><i class="ik ik-file-text"></i><span>{{ __('Voucher')}}</span></a>
                <div class="submenu-content">
                    <a href="{{route('voucher.create')}}" class="menu-item {{ ($segment1 == 'voucher') ? 'active' : '' }}">{{ __('Add')}}</a>
                    <a href="{{route('voucher.index')}}" class="menu-item {{ ($segment1 == 'voucher') ? 'active' : '' }}">{{ __('List')}}</a>
                </div>
                </div>

                <div class="nav-lavel">{{ __('Layouts')}} </div>
                <div class="nav-item {{ ($segment1 == 'pos') ? 'active' : '' }}">
                    <a href="{{url('inventory')}}"><i class="ik ik-shopping-cart"></i><span>{{ __('Inventory')}}</span> </a>
                </div>
                <div class="nav-item {{ ($segment1 == 'employee') ? 'active' : '' }}">
                    <a href="{{url('Employee')}}"><i class="ik ik-shopping-cart"></i><span>{{ __('Employee')}}</span> </a>
                </div>
                <div class="nav-item {{ ($segment1 == 'User') ? 'active' : '' }}">
                    <a href="{{url('user')}}"><i class="ik ik-users"></i><span>{{ __('User')}}</span> </a>
                </div>
                <div class="nav-item {{ ($segment1 == 'accounting') ? 'active' : '' }}">
                    <a href="{{url('accounting')}}"><i class="ik ik-printer"></i><span>{{ __('Accounting')}}</span> <span class=" badge badge-success badge-right">{{ __('New')}}</span></a>
                </div>
                <div class="nav-item {{ ($segment1 == 'users' || $segment1 == 'roles'||$segment1 == 'permission' ||$segment1 == 'user') ? 'active open' : '' }} has-sub">
                    <a href="#"><i class="ik ik-user"></i><span>{{ __('Adminstrator')}}</span></a>
                    <div class="submenu-content">
                        <!-- only those have manage_user permission will get access -->
                        @can('manage_user')
                        <a href="{{url('users')}}" class="menu-item {{ ($segment1 == 'users') ? 'active' : '' }}">{{ __('Users')}}</a>
                        <a href="{{url('user/create')}}" class="menu-item {{ ($segment1 == 'user' && $segment2 == 'create') ? 'active' : '' }}">{{ __('Add User')}}</a>
                        @endcan
                        <!-- only those have manage_role permission will get access -->
                        @can('manage_roles')
                        <a href="{{url('roles')}}" class="menu-item {{ ($segment1 == 'roles') ? 'active' : '' }}">{{ __('Roles')}}</a>
                        @endcan
                        <!-- only those have manage_permission permission will get access -->
                        @can('manage_permission')
                        <a href="{{url('permission')}}" class="menu-item {{ ($segment1 == 'permission') ? 'active' : '' }}">{{ __('Permission')}}</a>
                        @endcan
                        <a href="{{url('bussiness')}}" class="menu-item {{ ($segment1 == 'bussiness') ? 'active' : '' }}">{{ __('Bussiness')}}</a>
                    </div>
                </div>


                <!-- Include demo pages inside sidebar start-->
                @include('pages.sidebar-menu')
                <!-- Include demo pages inside sidebar end-->

            </nav>   
                
        </div>
    </div>
</div>