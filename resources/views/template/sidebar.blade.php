@php
    $currentRoute = request()->path();
@endphp

<!-- ========== App Menu ========== -->
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
       <!-- Dark Logo -->
<a href="{{ url('ports') }}" class="logo logo-dark d-flex align-items-center">
    <span class="logo-sm me-2">
        <img src="{{ asset('assets/images/SRI RAMLAKSHMAN FABS.jpg') }}" alt="SRLF Logo" class="img-fluid w-50">
    </span>
    <!-- <span class="logo-lg">
        <img src="{{ asset('assets/images/SRI RAMLAKSHMAN FABS.jpg') }}" alt="SRI RAMLAKSHMAN FABS" class="img-fluid w-75">
    </span> -->
</a>

<!-- Light Logo -->
<a href="{{ url('ports') }}" class="logo logo-light d-flex align-items-center">
    <!-- <span class="logo-sm me-2">
        <img src="{{ asset('assets/images/SRI RAMLAKSHMAN FABS.jpg') }}" alt="SRLF Logo Light" class="img-fluid w-50">
    </span> -->
    <span class="logo-lg">
        <img src="{{ asset('assets/images/SRI RAMLAKSHMAN FABS.jpg') }}" alt="SRI RAMLAKSHMAN FABS Light" class="img-fluid w-75">
    </span>
</a>

        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">
            <div id="two-column-menu"></div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span data-key="t-menu">Menu</span></li>

                <!-- Dashboards Menu -->
                @php
                    $dashboardRoutes = ['ports', 'countries', 'gst-config-masters', 'process', 'colours', 'narrations', 'designs','payments','gst_configurations'];
                    $isDashboardOpen = false;
                    foreach ($dashboardRoutes as $route) {
                        if (Request::is($route)) {
                            $isDashboardOpen = true;
                            break;
                        }
                    }
                @endphp

                <li class="nav-item">
                    <a class="nav-link menu-link {{ $isDashboardOpen ? '' : 'collapsed' }}" 
                       href="#sidebarDashboards" 
                       data-bs-toggle="collapse" 
                       role="button"
                       aria-expanded="{{ $isDashboardOpen ? 'true' : 'false' }}" 
                       aria-controls="sidebarDashboards">
                        <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Masters</span>
                    </a>
                    <div class="collapse menu-dropdown {{ $isDashboardOpen ? 'show' : '' }}" id="sidebarDashboards">
                        <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                        <a href="{{ url('ports') }}" class="nav-link {{ Request::is('ports') ? 'active' : '' }}" data-key="t-analytics"> Ports </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('countries') }}" class="nav-link {{ Request::is('countries') ? 'active' : '' }}" data-key="t-crm"> Country </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('gst-config-masters') }}" class="nav-link {{ Request::is('index.html') ? 'active' : '' }}" data-key="t-ecommerce"> GST Config </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('process') }}" class="nav-link {{ Request::is('process') ? 'active' : '' }}" data-key="t-crypto"> Process </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('colours') }}" class="nav-link {{ Request::is('colours') ? 'active' : '' }}" data-key="t-projects"> Colours </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('narrations') }}" class="nav-link {{ Request::is('narrations') ? 'active' : '' }}" data-key="t-projects"> Narrations </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('designs') }}" class="nav-link {{ Request::is('designs') ? 'active' : '' }}" data-key="t-projects"> Designs </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('payments') }}" class="nav-link {{ Request::is('payments') ? 'active' : '' }}" data-key="t-projects"> Payments </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('gst_configurations') }}" class="nav-link {{ Request::is('gst_configurations') ? 'active' : '' }}" data-key="t-analytics"> GST New </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('weaving-displays') }}" class="nav-link {{ Request::is('weaving-displays') ? 'active' : '' }}" data-key="t-analytics"> Weaving Displays </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('weaving-masters') }}" class="nav-link {{ Request::is('weaving-masters') ? 'active' : '' }}" data-key="t-analytics"> Weaving Masters </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('order-of-weavings') }}" class="nav-link {{ Request::is('order-of-weavings') ? 'active' : '' }}" data-key="t-analytics"> Order of Weavings </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('weaving-issues') }}" class="nav-link {{ Request::is('weaving-issues') ? 'active' : '' }}" data-key="t-analytics"> Weaving Issues </a>
                                    </li>
                                
                        </ul>
                    </div>
                </li>
                <!-- End Dashboard Menu -->
            </ul>
        </div>
    </div>
</div>


                