<!-- Top Page Nav Elements-->
<div class="rounded-lg px-3 px-lg-5 mb--1">
    <ul class="list-inline d-flex align-items-center mb-0">

        <!-- Sidebar Toggler Button-->
        <li class="list-inline-item d-inline-block d-lg-none">
            <button class="btn btn-gradient-success btn-sm py-2" id="sidebarToggler" type="button" onclick="toggleSidebar()">
                <i class="fas fa-bars"></i>
            </button>
        </li>

        <!-- Hompage Button-->
        <li class="list-inline-item">
            <a class="btn btn-gradient-success btn-sm py-2" href="{{ route('home') }}">
                <i class="fas fa-home me-2"></i>
                {{__('Homepage')}}
            </a>
        </li>

        <!-- Mobile Dropdown Menu-->
        <li class="list-inline-item d-block d-lg-none">
            <!-- User Dropdown-->
            <div class="dropdown"><a class="dropdown-toggle float-end no-caret reset-link" id="userDropdownAlt" href="#" data-bs-toggle="dropdown" aria-expanded="false"><img class="rounded" src="{{asset('img/profile.svg')}}" alt="Jason Doe" width="40"></a>
                <ul class="dropdown-menu dropdown-menu-end mt-2" aria-labelledby="userDropdownAlt">
                    <li><a class="dropdown-item text-muted" href="{{ route('profile')}}"> <i class="fas fa-cog me-2 text-sm"></i>{{__('Settings')}}</a></li>
                    <li>
                      <a class="dropdown-item text-muted" href="{{ route('logout') }}">
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        <i class="fas fa-door-open me-2 text-sm"></i>{{__('Logout')}}
                      </a>
                    </li>
                </ul>
            </div>
        </li>

    </ul>
</div>


<!-- Admin Page Header-->
<header class="px-3 px-lg-5 py-5 rounded-lg bg-white">
    <div class="d-flex align-items-center justify-content-between py-lg-4">

        <!-- Header Text & Icon-->
        <div class="d-flex">
            <i class="text-success me-1 me-lg-2 fa-2x fas fa-cube"></i>
            <div class="ms-2">

                @isset ($pageDescription)
                 <h1 class="h3 text-uppercase fw-bold letter-spacing-0 mb-0 mb-lg-2 line-height-0">{{ $pageName ?? '' }}</h1>
                 <p class="text-gray-500 mb-0">{{ $pageDescription }}</p>
                @else
                 <h1 class="h3 text-uppercase fw-bold letter-spacing-0 pt-lg-2 mb-0 line-height-0">{{ $pageName ?? '' }}</h1>
                @endisset
            </div>
        </div>

        <!-- User Dropdown-->
        <div class="ms-3">
            <div class="dropdown d-none d-lg-block">
                <!-- Dropdown Toggler-->
                <a class="dropdown-toggle float-end no-caret reset-link" id="userDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="d-flex align-items-center">
                        <div class="me-2 text-right">
                            <h6 class="text-uppercase letter-spacing-0 fw-bold mb-0 line-height-0">{{ $auth->full_name ?? ''}}</h6>
                            <p class="text-gray-500 mb-0 text-sm line-height-0">{{ $auth->role == 1 ? 'Administrator' : ''}}</p>
                        </div>
                        <img class="rounded-circle" src="{{asset('img/profile.svg')}}" alt="Jason Doe" width="40">
                    </div>
                </a>

                <!-- Dropdown Menu-->
                <ul class="dropdown-menu dropdown-menu-end mt-2" aria-labelledby="userDropdown">
                    <li>
                        <a class="dropdown-item text-muted" href="{{ route('profile')}}">
                            <i class="fas fa-cog me-2 text-sm"></i>
                            {{__('Settings')}}
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item text-muted" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                            <i class="fas fa-door-open me-2 text-sm"></i>
                            {{__('Logout')}}
                        </a>
                    </li>
                </ul>

            </div>
        </div>

    </div>
</header>
