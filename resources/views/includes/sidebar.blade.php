<div class="sidebar bg-white rounded-xl" id="sidebar">
    <div class="sidebar-inner">

        <!-- Sidebar Header-->
        <div class="sidebar-header bg-gradient-success rounded-lg px-4 py-4 py-lg-5"><img class="img-fluid d-none d-lg-block" src="{{asset('img/counter-logo-white.svg')}}" alt="Ionic Counter" width="150"><img class="img-fluid d-block d-lg-none" src="{{asset('img/counter-logo-min.svg')}}" alt="Ionic Counter" width="100"></div>

        <!-- Sidebar Content-->
        <div class="sidebar-content py-4 px-lg-4">
            <!-- Sidebar List-->
            <ul class="list-unstyled mb-0">
                <li class="sidebar-item py-lg-1">
                    <!-- Sidebar Link-->
                    <a class="sidebar-link {{ isset($dashboard) ? 'active' : '' }}" href="{{ route('dashboard')}} ">
                        <i class="me-lg-2 fa-fw fas fa-cube"></i>
                        <span>{{__('Dashboard')}}</span>
                    </a>
                </li>
                <li class="sidebar-item py-lg-1">
                    <!-- Sidebar Link-->
                    <a class="sidebar-link {{ isset($subscribers) ? 'active' : '' }}" href="{{ route('subscribes') }}">
                        <i class="me-lg-2 fa-fw fas fa-address-book"></i>
                        <span>{{__('Subscribers')}}</span>
                    </a>
                </li>
            </ul>
            <!-- Sidebar Separator-->
            <div class="sidebar-separator my-2 my-lg-4"></div>
            <p class="text-uppercase text-xs fw-bold text-gray-500 mb-3 px-3 pt-2 pt-lg-0 px-lg-0 text-center text-lg-start">Theme settings</p>
            <!-- Sidebar List-->
            <ul class="list-unstyled mb-0">
                <li class="sidebar-item py-lg-1">
                    <!-- Sidebar Link-->
                    <a class="sidebar-link {{ isset($themes) ? 'active' : '' }}" href="{{ route('themes') }}">
                        <i class="me-lg-2 fa-fw fas fa-chalkboard"></i>
                        <span>{{__('Themes')}}</span>
                    </a>
                </li>
                <li class="sidebar-item py-lg-1">
                    <!-- Sidebar Link-->
                    <a class="sidebar-link {{ isset($counter) ? 'active' : '' }}" href="{{ route('counter') }}">
                        <i class="me-lg-2 fa-fw fas fa-stopwatch"></i>
                        <span>{{__('Counter')}}</span>
                    </a>
                </li>
                <li class="sidebar-item py-lg-1">
                    <!-- Sidebar Link-->
                    <a class="sidebar-link {{ isset($social) ? 'active' : '' }}" href="{{ route('social') }}">
                        <i class="me-lg-2 fa-fw fas fa-globe-africa"></i>
                        <span>{{__('Social links')}}</span>
                    </a>
                </li>
            </ul>
            <!-- Sidebar Separator-->
            <div class="sidebar-separator my-2 my-lg-4"></div>
            <p class="text-uppercase text-xs fw-bold text-gray-500 mb-3 px-3 pt-2 pt-lg-0 px-lg-0 text-center text-lg-start">Other Settings</p>
            <!-- Sidebar List-->
            <ul class="list-unstyled mb-0">
                <li class="sidebar-item py-lg-1">
                    <!-- Sidebar Link-->
                    <a class="sidebar-link {{ isset($profile) ? 'active' : '' }}" href="{{ route('profile') }}">
                        <i class="me-lg-2 fa-fw fas fa-id-card-alt"></i>
                        <span>{{__('Profile')}}</span>
                    </a>
                </li>
                <li class="sidebar-item py-lg-1">
                    <!-- Sidebar Link-->
                    <a class="sidebar-link {{ isset($general) ? 'active' : '' }}" href="{{ route('general') }}">
                        <i class="me-lg-2 fa-fw fas fa-cog"></i>
                        <span>{{__('General')}}</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
