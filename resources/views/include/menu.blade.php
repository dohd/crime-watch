  <!-- BEGIN: Main Menu-->
  <div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item me-auto"><a class="navbar-brand" href="{{route('home')}}"><span class="brand-logo">
                        <svg viewbox="0 0 139 95" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" height="24">
                            <defs>
                                <lineargradient id="linearGradient-1" x1="100%" y1="10.5120544%" x2="50%" y2="89.4879456%">
                                    <stop stop-color="#000000" offset="0%"></stop>
                                    <stop stop-color="#FFFFFF" offset="100%"></stop>
                                </lineargradient>
                                <lineargradient id="linearGradient-2" x1="64.0437835%" y1="46.3276743%" x2="37.373316%" y2="100%">
                                    <stop stop-color="#EEEEEE" stop-opacity="0" offset="0%"></stop>
                                    <stop stop-color="#FFFFFF" offset="100%"></stop>
                                </lineargradient>
                            </defs>
                            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g id="Artboard" transform="translate(-400.000000, -178.000000)">
                                    <g id="Group" transform="translate(400.000000, 178.000000)">
                                        <path class="text-primary" id="Path" d="M-5.68434189e-14,2.84217094e-14 L39.1816085,2.84217094e-14 L69.3453773,32.2519224 L101.428699,2.84217094e-14 L138.784583,2.84217094e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L6.71554594,44.4188507 C2.46876683,39.9813776 0.345377275,35.1089553 0.345377275,29.8015838 C0.345377275,24.4942122 0.230251516,14.560351 -5.68434189e-14,2.84217094e-14 Z" style="fill:currentColor"></path>
                                        <path id="Path1" d="M69.3453773,32.2519224 L101.428699,1.42108547e-14 L138.784583,1.42108547e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L32.8435758,70.5039241 L69.3453773,32.2519224 Z" fill="url(#linearGradient-1)" opacity="0.2"></path>
                                        <polygon id="Path-2" fill="#000000" opacity="0.049999997" points="69.3922914 32.4202615 32.8435758 70.5039241 54.0490008 16.1851325"></polygon>
                                        <polygon id="Path-21" fill="#000000" opacity="0.099999994" points="69.3922914 32.4202615 32.8435758 70.5039241 58.3683556 20.7402338"></polygon>
                                        <polygon id="Path-3" fill="url(#linearGradient-2)" opacity="0.099999994" points="101.428699 0 83.0667527 94.1480575 130.378721 47.0740288"></polygon>
                                    </g>
                                </g>
                            </g>
                        </svg></span>
                    <h2 class="brand-text">CRIMEWATCH</h2>
                </a></li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pe-0" data-bs-toggle="collapse"><i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i><i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc" data-ticon="disc"></i></a></li>
        </ul>
    </div>
    @php
    $segment1 = Request::segment(1);
    $segment2 = Request::segment(2);
    $segment3 = Request::segment(3);
@endphp
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
          
            <li class="{{ ($segment1 == 'home') ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{route('home')}}"><i data-feather='home'></i><span class="menu-title text-truncate" data-i18n="Todo">Home</span></a>
            </li>
            <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather='radio'></i></i><span class="menu-title text-truncate" data-i18n="User">Daily Incident</span></a>
                <ul class="menu-content">
                    <li class="{{ ($segment1 == 'dailyincidences' &&  $segment2 == 'create')? 'active' : '' }}"><a class="d-flex align-items-center" href="{{route('dailyincidences.create')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Create Incident</span></a>
                    </li>
                    <li class="{{ ($segment1 == 'dailyincidences' &&  $segment2 == '') || ($segment1 == 'dailyincidences' &&  $segment3 == 'edit') ? 'active' : '' }}" ><a class="d-flex align-items-center" href="{{route('dailyincidences.index')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List"> Manage Incident </span></a>
                    </li>
              
                </ul>
            </li>
            <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather='truck'></i><span class="menu-title text-truncate" data-i18n="User">Traffic Incidences</span></a>
                <ul class="menu-content">
                    <li class="{{ ($segment1 == 'traffic' &&  $segment2 == 'create')  ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{route('traffic.create')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Create Traffic</span></a>
                    </li>
                    <li class="{{ ($segment1 == 'traffic' &&  $segment2 == '') ||($segment1 == 'traffic' &&  $segment3 == 'edit') ? 'active' : '' }}" ><a class="d-flex align-items-center" href="{{route('traffic.index')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Manage Traffic </span></a>
                    </li>
              
                </ul>
            </li>
            <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather='battery-charging'></i><span class="menu-title text-truncate" data-i18n="User">Drug Incidences</span></a>
                <ul class="menu-content">
                    <li class="{{ ($segment1 == 'drug' &&  $segment2 == 'create')  ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{route('drug.create')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Create Drug</span></a>
                    </li>
                    <li class="{{ ($segment1 == 'drug' &&  $segment2 == '') ||($segment1 == 'drug' &&  $segment3 == 'edit') ? 'active' : '' }}" ><a class="d-flex align-items-center" href="{{route('drug.index')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Manage Drug </span></a>
                    </li>
              
                </ul>
            </li>
            <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather='user-x'></i><span class="menu-title text-truncate" data-i18n="User">SGVB Incidences</span></a>
                <ul class="menu-content">
                    <li class="{{ ($segment1 == 'sgbv' &&  $segment2 == 'create')  ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{route('sgbv.create')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Create SGVB</span></a>
                    </li>
                    <li class="{{ ($segment1 == 'sgbv' &&  $segment2 == '') ||($segment1 == 'sgbv' &&  $segment3 == 'edit') ? 'active' : '' }}" ><a class="d-flex align-items-center" href="{{route('sgbv.index')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Manage SGVB </span></a>
                    </li>
                   

                   
              
                </ul>
            </li>
            <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather='sunrise'></i><span class="menu-title text-truncate" data-i18n="User">Wildlife Incidences</span></a>
                <ul class="menu-content">
                    <li class="{{ ($segment1 == 'wildlife' &&  $segment2 == 'create')  ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{route('wildlife.create')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Create Wildlife</span></a>
                    </li>
                    <li class="{{ ($segment1 == 'wildlife' &&  $segment2 == '') ||($segment1 == 'wildlife' &&  $segment3 == 'edit') ? 'active' : '' }}" ><a class="d-flex align-items-center" href="{{route('wildlife.index')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Manage Wildlife </span></a>
                    </li>
              
                </ul>
            </li>
            <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather='sunrise'></i><span class="menu-title text-truncate" data-i18n="User">Firearm Incidences</span></a>
                <ul class="menu-content">
                    <li class="{{ ($segment1 == 'firearm' &&  $segment2 == 'create')  ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{route('firearm.create')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Create Firearm</span></a>
                    </li>
                    <li class="{{ ($segment1 == 'firearm' &&  $segment2 == '') ||($segment1 == 'firearm' &&  $segment3 == 'edit') ? 'active' : '' }}" ><a class="d-flex align-items-center" href="{{route('firearm.index')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Manage Firearm </span></a>
                    </li>
              
                </ul>
            </li>
            <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather='tool'></i><span class="menu-title text-truncate" data-i18n="User">Regional  Incidences</span></a>
                <ul class="menu-content">
                    <li class="{{ ($segment1 == 'regionalincidence' &&  $segment2 == 'create')  ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{route('regionalincidence.create')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Create Incident</span></a>
                    </li>
                    <li class="{{ ($segment1 == 'regionalincidence' &&  $segment2 == '') ||($segment1 == 'regionalincidence' &&  $segment3 == 'edit') ? 'active' : '' }}" ><a class="d-flex align-items-center" href="{{route('regionalincidence.index')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Manage Incident </span></a>
                    </li>
              
                </ul>
            </li>
            <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather='activity'></i><span class="menu-title text-truncate" data-i18n="User">Reports</span></a>
                <ul class="menu-content">
                    <li class="{{ ($segment1 == 'dor-report') ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{route('dor-report')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">DOR Report</span></a>
                    </li>
                    <li class="{{ ($segment1 == 'dcir-report') ? 'active' : '' }}" ><a class="d-flex align-items-center" href="{{route('dcir-report')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">DCIR Report </span></a>
                    </li>
                    <li class="{{ ($segment1 == 'special-report') ? 'active' : '' }}" ><a class="d-flex align-items-center" href="{{route('special-report')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Special Report </span></a>
                    </li>
              
                </ul>
            </li>
            <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather='settings'></i><span class="menu-title text-truncate" data-i18n="User">Settings</span></a>
                <ul class="menu-content">
                    <li class="{{ ($segment1 == 'region' &&  $segment2 == '') ||($segment1 == 'region' &&  $segment2 == 'edit') ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{route('region.index')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Manage Regions</span></a>
                    </li>
                    <li class="{{ ($segment1 == 'county' &&  $segment2 == '') ||($segment1 == 'division' &&  $segment2 == 'edit') ? 'active' : '' }}" ><a class="d-flex align-items-center" href="{{route('county.index')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Manage Counties </span></a>
                    </li>
                    <li class="{{ ($segment1 == 'division' &&  $segment2 == '') ||($segment1 == 'county' &&  $segment2 == 'edit') ? 'active' : '' }}" ><a class="d-flex align-items-center" href="{{route('division.index')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Manage Divisions </span></a>
                    </li>
                    <li class="{{ ($segment1 == 'station' &&  $segment2 == '') ||($segment1 == 'station' &&  $segment2 == 'edit') ? 'active' : '' }}" ><a class="d-flex align-items-center" href="{{route('station.index')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Manage Stations </span></a>
                    </li>
                    <li class="{{ ($segment1 == 'policebase' &&  $segment2 == '') ||($segment1 == 'policebase' &&  $segment2 == 'edit') ? 'active' : '' }}" ><a class="d-flex align-items-center" href="{{route('policebase.index')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Manage Police Base </span></a>
                    </li>
                    <li class="{{ ($segment1 == 'crimecategory' &&  $segment2 == '') ||($segment1 == 'crimecategory' &&  $segment2 == 'edit') ? 'active' : '' }}" ><a class="d-flex align-items-center" href="{{route('crimecategory.index')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Manage Crime Category </span></a>
                    </li>
                    <li class="{{ ($segment1 == 'incidentfile' &&  $segment2 == '') ||($segment1 == 'incidentfile' &&  $segment2 == 'edit') ? 'active' : '' }}" ><a class="d-flex align-items-center" href="{{route('incidentfile.index')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Manage Incident File </span></a>
                    </li>
                    <li class="{{ ($segment1 == 'crimesource' &&  $segment2 == '') ||($segment1 == 'crimesource' &&  $segment2 == 'edit') ? 'active' : '' }}" ><a class="d-flex align-items-center" href="{{route('crimesource.index')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Manage Crime Source </span></a>
                    </li>
                </ul>
            </li>
        </li>
        <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="user"></i><span class="menu-title text-truncate" data-i18n="User">Users</span></a>
            <ul class="menu-content">
                <li class="{{ ($segment1 == 'users' &&  $segment2 == '') || ($segment1 == 'users' &&  $segment2 == 'edit') || ($segment1 == 'user-account') ? 'active' : ''   }}"><a class="d-flex align-items-center" href="{{route('users.index')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Manage Users</span></a>
                </li>
          
            </ul>
        </li>
        <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="shield"></i><span class="menu-title text-truncate" data-i18n="User">Roles & Permissions</span></a>
            <ul class="menu-content">
                <li class="{{ ($segment1 == 'roles' &&  $segment2 == '') ||($segment1 == 'roles' &&  $segment2 == 'edit') ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{route('roles.index')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Manage Roles</span></a>
                </li>
          
            </ul>
        </li>
            <li ><a class="d-flex align-items-center" href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();"><i data-feather='log-out'></i><span class="menu-title text-truncate" data-i18n="Todo" >Logout</span></a>
            </li>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
         
        
        </ul>
    </div>
</div>
<!-- END: Main Menu-->