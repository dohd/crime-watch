<nav
    class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow container-xxl">
    <div class="navbar-container d-flex content">
        <div class="bookmark-wrapper d-flex align-items-center">
            <ul class="nav navbar-nav d-xl-none">
                <li class="nav-item"><a class="nav-link menu-toggle" href="#"><i class="ficon"
                            data-feather="menu"></i></a></li>
            </ul>
            <h3>CRIMEWATCH-KENYA POLICE CRIME ANALYSIS SOFTWARE</h3>
        </div>
        @php
             $image = asset('upload/'.Auth::user()->icon);
           
            
        @endphp
        <ul class="nav navbar-nav align-items-center ms-auto">
            <li class="nav-item dropdown dropdown-user"><a class="nav-link dropdown-toggle dropdown-user-link"
                    id="dropdown-user" href="#" data-bs-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <div class="user-nav d-sm-flex d-none"><span
                            class="user-name fw-bolder">{{ Auth::user()->name }}</span><span
                            class="user-status">Admin</span></div><span class="avatar"><img class="round"
                            src="{{ !empty(Auth::user()->icon ) ? $image : asset('upload/profile_image.png')}}" alt="avatar"
                            height="40" width="40"><span class="avatar-status-online"></span></span>
                </a>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-user">
               
                    <a class="dropdown-item" href="{{route('user-account')}}"><i class="me-50" data-feather="settings"></i> Settings</a><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"><i
                            class="me-50" data-feather="power"></i> Logout</a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                </div>
            </li>
        </ul>
    </div>
</nav>
