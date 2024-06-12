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
                <div class="nav-item {{ ($segment1 == 'banner') ? 'active open' : '' }} has-sub">
                    <a href="#"><i class="ik ik-file-text"></i><span>{{ __('Banner')}}</span></a>
                    <div class="submenu-content">
                        <a href="{{route('banner.create')}}" class="menu-item {{ ($segment1 == 'banner' && $segment2 == 'create') ? 'active' : '' }}">{{ __('Add Banner')}}</a>
                        <a href="{{route('banner.index')}}" class="menu-item {{ ($segment1 == 'banner' && $segment2 == '') ? 'active' : '' }}">{{ __('List Banner')}}</a>
                    </div>
                </div>

                <div class="nav-item {{ ($segment1 == 'askedQuestions') ? 'active open' : '' }} has-sub">
                    <a href="#"><i class="ik ik-file-text"></i><span>{{ __('Frequently Asked Questions')}}</span></a>
                    <div class="submenu-content">
                        <a href="{{route('askedQuestions.create')}}" class="menu-item {{ ($segment1 == 'askedQuestions' && $segment2 == 'create') ? 'active' : '' }}">{{ __('Add Question')}}</a>
                        <a href="{{route('askedQuestions.index')}}" class="menu-item {{ ($segment1 == 'askedQuestions' && $segment2 == '') ? 'active' : '' }}">{{ __('Question List')}}</a>
                    </div>
                </div>

                <div class="nav-item {{ ($segment1 == 'whyShouldWe' || $segment1 == '') ? 'active open' : '' }} has-sub">
                    <a href="#"><i class="ik ik-file-text"></i><span>{{ __('Why Should We')}}</span></a>
                    <div class="submenu-content">
                        <a href="{{route('whyShouldWe.create')}}" class="menu-item {{ ($segment1 == 'whyShouldWe' && $segment2 == 'create') ? 'active' : '' }}">{{ __('Add')}}</a>
                        <a href="{{route('whyShouldWe.index')}}" class="menu-item {{ ($segment1 == 'whyShouldWe' && $segment2 == '') ? 'active' : '' }}">{{ __('List')}}</a>
                    </div>
                </div>

                <div class="nav-item {{ ($segment1 == 'generalSetting') ? 'active open' : '' }} has-sub">
                <a href="#"><i class="ik ik-file-text"></i><span>{{ __('General Setting')}}</span></a>
                <div class="submenu-content">
                    <a href="{{route('generalSetting.index')}}" class="menu-item {{ ($segment1 == 'generalSetting' && $segment2 == '') ? 'active' : '' }}">{{ __('List')}}</a>
                </div>
                </div>

                <div class="nav-item {{ ($segment1 == 'voucher') ? 'active open' : '' }} has-sub">
                    <a href="#"><i class="ik ik-file-text"></i><span>{{ __('Voucher')}}</span></a>
                    <div class="submenu-content">
                        <a href="{{route('voucher.create')}}" class="menu-item {{ ($segment1 == 'voucher' && $segment2 == 'create') ? 'active' : '' }}">{{ __('Add')}}</a>
                        <a href="{{route('voucher.index')}}" class="menu-item {{ ($segment1 == 'voucher' && $segment2 == '') ? 'active' : '' }}">{{ __('List')}}</a>
                    </div>
                </div>

                <div class="nav-item {{ ($segment1 == 'ingredient') ? 'active open' : '' }} has-sub">
                    <a href="#"><i class="ik ik-file-text"></i><span>{{ __('Ingredient')}}</span></a>
                    <div class="submenu-content">
                        <a href="{{route('ingredient.create')}}" class="menu-item {{ ($segment1 == 'ingredient' && $segment2 == 'create') ? 'active' : '' }}">{{ __('Add')}}</a>
                        <a href="{{route('ingredient.index')}}" class="menu-item {{ ($segment1 == 'ingredient' && $segment2 == '') ? 'active' : '' }}">{{ __('List')}}</a>
                    </div>
                </div>

                <div class="nav-item {{ ($segment1 == 'manageTable') ? 'active open' : '' }} has-sub">
                    <a href="#"><i class="ik ik-file-text"></i><span>{{ __('Manage Table')}}</span></a>
                    <div class="submenu-content">
                        <a href="{{route('manageTable.create')}}" class="menu-item {{ ($segment1 == 'manageTable' && $segment2 == 'create') ? 'active' : '' }}">{{ __('Add')}}</a>
                        <a href="{{route('manageTable.index')}}" class="menu-item {{ ($segment1 == 'manageTable' && $segment2 == '') ? 'active' : '' }}">{{ __('List')}}</a>
                    </div>
                </div>

                <div class="nav-item {{ ($segment1 == 'masterHoliday' || $segment1 == '') ? 'active open' : '' }} has-sub">
                    <a href="#"><i class="ik ik-file-text"></i><span>{{ __('Master Holiday')}}</span></a>
                    <div class="submenu-content">
                        <a href="{{route('masterHoliday.create')}}" class="menu-item {{ ($segment1 == 'masterHoliday' && $segment2 == 'create') ? 'active' : '' }}">{{ __('Add')}}</a>
                        <a href="{{route('masterHoliday.index')}}" class="menu-item {{ ($segment1 == 'masterHoliday' && $segment2 == '') ? 'active' : '' }}">{{ __('List')}}</a>
                    </div>
                </div>

                <div class="nav-item has-sub">
                    <a href="javascript:void(0)"><i class="ik ik-file-text"></i><span>{{ __('Stock')}}</span></a>
                    <div class="submenu-content">
                        <div class="nav-item {{ ($segment1 == '') ? 'active' : '' }} has-sub">
                            <a href="javascript:void(0)" class="menu-item">{{ __('Stock In')}}</a>
                            <div class="submenu-content">
                         <a href="{{route('stockIn.create')}}" class="menu-item {{ ($segment1 == 'stock' && $segment2 == 'create') ? 'active' : '' }}">{{ __('Add')}}</a>
                         <a href="{{route('stockIn.index')}}" class="menu-item {{ ($segment1 == 'stock' && $segment2 == '') ? 'active' : '' }}">{{ __('List')}}</a>
                            </div>
                        </div>
                    
                        <div class="nav-item {{ ($segment1 == '') ? 'active' : '' }} has-sub">
                            <a href="javascript:void(0)" class="menu-item">{{ __('Stock out')}}</a>
                            <div class="submenu-content">
                                <a href="{{route('stockOut.create')}}" class="menu-item {{ ($segment1 == 'stock' && $segment2 == 'create') ? 'active' : '' }}">{{ __('Add')}}</a>
                                <a href="{{route('stockOut.index')}}" class="menu-item {{ ($segment1 == 'stock' && $segment2 == '') ? 'active' : '' }}">{{ __('List')}}</a>       
                           </div>
                        </div>

                        <div class="nav-item {{ ($segment1 == '') ? 'active' : '' }} has-sub">
                            <a href="javascript:void(0)" class="menu-item">{{ __('Transfer In')}}</a>
                            <div class="submenu-content">
                                <a href="{{route('transferIn.create')}}" class="menu-item {{ ($segment1 == 'stock' && $segment2 == 'create') ? 'active' : '' }}">{{ __('Add')}}</a>
                                <a href="{{route('transferIn.index')}}" class="menu-item {{ ($segment1 == 'stock' && $segment2 == '') ? 'active' : '' }}">{{ __('List')}}</a>       
                            </div>
                        </div>
                    </div>
                </div>
        <div class="nav-item {{ ($segment1 == 'productInstruction' || $segment1 == '') ? 'active open' : '' }} has-sub">
            <a href="#"><i class="ik ik-file-text"></i><span>{{ __('Product Instruction')}}</span></a>
            <div class="submenu-content">
                <a href="{{route('productInstruction.create')}}" class="menu-item {{ ($segment1 == 'productInstruction' && $segment2 == 'create') ? 'active' : '' }}">{{ __('Add')}}</a>
                <a href="{{route('productInstruction.index')}}" class="menu-item {{ ($segment1 == 'productInstruction' && $segment2 == '') ? 'active' : '' }}">{{ __('List')}}</a>
            </div>
        </div>

        <div class="nav-item {{ ($segment1 == 'katalog' || $segment1 == '') ? 'active open' : '' }} has-sub">
            <a href="#"><i class="ik ik-file-text"></i><span>{{ __('Katalog')}}</span></a>
            <div class="submenu-content">
                <a href="{{route('katalog.create')}}" class="menu-item {{ ($segment1 == 'katalog' && $segment2 == 'create') ? 'active' : '' }}">{{ __('Add')}}</a>
                <a href="{{route('katalog.index')}}" class="menu-item {{ ($segment1 == 'katalog' && $segment2 == '') ? 'active' : '' }}">{{ __('List')}}</a>
            </div>
        </div>

        <div class="nav-item {{ ($segment1 == 'katalogDetails' || $segment1 == '') ? 'active open' : '' }} has-sub">
            <a href="#"><i class="ik ik-file-text"></i><span>{{ __('Katalog Details')}}</span></a>
            <div class="submenu-content">
                <a href="{{route('katalogDetails.create')}}" class="menu-item {{ ($segment1 == 'katalogDetails' && $segment2 == 'create') ? 'active' : '' }}">{{ __('Add')}}</a>
                <a href="{{route('katalogDetails.index')}}" class="menu-item {{ ($segment1 == 'katalogDetails' && $segment2 == '') ? 'active' : '' }}">{{ __('List')}}</a>
            </div>
        </div>


        
        <div class="nav-item {{ ($segment1 == 'payment' || $segment1 == '') ? 'active open' : '' }} has-sub">
            <a href="#"><i class="ik ik-file-text"></i><span>{{ __('Payment')}}</span></a>
            <div class="submenu-content">
                <a href="{{route('payment.create')}}" class="menu-item {{ ($segment1 == 'payment' && $segment2 == 'create') ? 'active' : '' }}">{{ __('Add')}}</a>
                <a href="{{route('payment.index')}}" class="menu-item {{ ($segment1 == 'payment' && $segment2 == '') ? 'active' : '' }}">{{ __('List')}}</a>
            </div>
        </div>
    </nav>
</div>
</div>
</div>
    
