@php
    $currentRoute = request()->path();
@endphp
<link href="{{ asset('assets/libs/simplebar/simplebar.min.css') }}" rel="stylesheet" type="text/css" />
<script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
<style>
.app-menu.navbar-menu {
    height: 100vh;
    overflow: hidden;
}

</style>
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

    <div id="scrollbar" data-simplebar class="h-100 overflow-auto">
    <div class="container-fluid">
        <div id="two-column-menu"></div>
            <ul class="navbar-nav" id="navbar-nav">
           


{{-- Administration Menu --}}
@php
    $AdministrationRoutes = ['roles', 'users', 'permissions'];
    $currentRoute = Request::segment(1); // or use Route::currentRouteName() if needed
    $isAdministration = in_array($currentRoute, $AdministrationRoutes);
@endphp

<li class="nav-item">
    <a class="nav-link menu-link {{ $isAdministration ? '' : 'collapsed' }}"
       href="#sidebarAdmistartion"
       data-bs-toggle="collapse"
       aria-expanded="{{ $isAdministration ? 'true' : 'false' }}"
       aria-controls="sidebarAdmistartion">
        <i class="ri-shield-user-line"></i>
        <span data-key="t-administration">Administration</span>
    </a>
    <div class="collapse menu-dropdown {{ $isAdministration ? 'show' : '' }}" id="sidebarAdmistartion">
        <ul class="nav nav-sm flex-column">
            <li class="nav-item">
                <a href="{{ url('roles') }}"
                   class="nav-link {{ Request::is('roles') ? 'active' : '' }}">
                   <i class="ri-shield-keyhole-line me-1"></i> Roles
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('users') }}"
                   class="nav-link {{ Request::is('users') ? 'active' : '' }}">
                   <i class="ri-user-line me-1"></i> Users
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('permissions') }}"
                   class="nav-link {{ Request::is('permissions') ? 'active' : '' }}">
                   <i class="ri-lock-line me-1"></i> Permissions
                </a>
            </li>
        </ul>
    </div>
</li>







                {{-- Masters Menu --}}
                @php
                    $mastersRoutes = ['ports', 'countries', 'gst-config-masters', 'process', 'colours', 'narrations', 'payments', 'companies', 'weaving-masters'];
                    $isMastersOpen = in_array($currentRoute, $mastersRoutes);
                @endphp

                <li class="nav-item">
                    <a class="nav-link menu-link {{ $isMastersOpen ? '' : 'collapsed' }}"
                       href="#sidebarMasters"
                       data-bs-toggle="collapse"
                       aria-expanded="{{ $isMastersOpen ? 'true' : 'false' }}"
                       aria-controls="sidebarMasters">
                        <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Masters</span>
                    </a>
                    <div class="collapse menu-dropdown {{ $isMastersOpen ? 'show' : '' }}" id="sidebarMasters">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item"><a href="{{ url('ports') }}" class="nav-link {{ Request::is('ports') ? 'active' : '' }}">Ports</a></li>         
                            <li class="nav-item"><a href="{{ url('countries') }}" class="nav-link {{ Request::is('countries') ? 'active' : '' }}">Country</a></li>
                            <li class="nav-item"><a href="{{ url('process') }}" class="nav-link {{ Request::is('process') ? 'active' : '' }}">Process</a></li>
                            <li class="nav-item"><a href="{{ url('colours') }}" class="nav-link {{ Request::is('colours') ? 'active' : '' }}">Colours</a></li>
                            <li class="nav-item"><a href="{{ url('narrations') }}" class="nav-link {{ Request::is('narrations') ? 'active' : '' }}">Narrations</a></li>
                            <li class="nav-item"><a href="{{ url('payments') }}" class="nav-link {{ Request::is('payments') ? 'active' : '' }}">Payments</a></li>
                            <li class="nav-item"><a href="{{ url('companies') }}" class="nav-link {{ Request::is('companies') ? 'active' : '' }}">Companies</a></li>
                            <li class="nav-item"><a href="{{ url('gst-config-masters') }}" class="nav-link {{ Request::is('gst-config-masters') ? 'active' : '' }}">GST New</a></li>
                            <li class="nav-item"><a href="{{ url('weaving-masters') }}" class="nav-link {{ Request::is('weaving-masters') ? 'active' : '' }}">Weavings</a></li>
                        </ul>
                    </div>
                </li>
   





{{-- Finance Masters Menu --}}
@php
    $financeRoutes = ['group-masters', 'ledger-masters', 'bank-masters'];
    $isFinanceOpen = in_array($currentRoute, $financeRoutes);
@endphp

<li class="nav-item">
    <a class="nav-link menu-link {{ $isFinanceOpen ? '' : 'collapsed' }}"
    
       href="#sidebarFinanceMasters"
       data-bs-toggle="collapse"
       aria-expanded="{{ $isFinanceOpen ? 'true' : 'false' }}"
       aria-controls="sidebarFinanceMasters">
        <i class="ri-money-dollar-circle-line"></i>
        <span data-key="t-finance-masters">Finance Masters</span>
    </a>

    <div class="collapse menu-dropdown {{ $isFinanceOpen ? 'show' : '' }}" id="sidebarFinanceMasters">
        <ul class="nav nav-sm flex-column">

            <li class="nav-item">
                <a href="{{ url('group-masters') }}"
                   class="nav-link {{ Request::is('group-masters') ? 'active' : '' }}">
                   <i class="ri-folder-2-line me-1"></i> Group Masters
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ url('ledger-masters') }}"
                   class="nav-link {{ Request::is('ledger-masters') ? 'active' : '' }}">
                   <i class="ri-booklet-line me-1"></i> Ledger Masters
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ url('bank-masters') }}"
                   class="nav-link {{ Request::is('bank-masters') ? 'active' : '' }}">
                   <i class="ri-bank-line me-1"></i> Bank Masters
                </a>
            </li>

        </ul>
    </div>
</li>





                
             {{-- Designs Menu --}}
@php
    $designRoutes = ['designs', 'loom-types', 'buyers', 'year'];
    $isDesignOpen = in_array($currentRoute, $designRoutes);
@endphp

<li class="nav-item">
    <a class="nav-link menu-link {{ $isDesignOpen ? '' : 'collapsed' }}"
       href="#sidebarDesigns"
       data-bs-toggle="collapse"
       aria-expanded="{{ $isDesignOpen ? 'true' : 'false' }}"
       aria-controls="sidebarDesigns">
        <i class="ri-artboard-line"></i>
        <span data-key="t-designs">Design Masters</span>
    </a>

    <div class="collapse menu-dropdown {{ $isDesignOpen ? 'show' : '' }}" id="sidebarDesigns">
        <ul class="nav nav-sm flex-column">
            <li class="nav-item">
                <a href="{{ url('designs') }}" class="nav-link {{ Request::is('designs') ? 'active' : '' }}">
                    <i class="ri-pencil-ruler-2-line"></i> Designs
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('loom-types') }}" class="nav-link {{ Request::is('loom-types') ? 'active' : '' }}">
                    <i class="ri-draft-line"></i> Loom Types
                </a>
            </li>
       <li class="nav-item">
                <a href="{{ url('year') }}" class="nav-link {{ Request::is('year') ? 'active' : '' }}">
                    <i class="ri-draft-line"></i> Year
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('buyers') }}" class="nav-link {{ Request::is('buyers') ? 'active' : '' }}">
                    <i class="ri-user-add-line"></i> Buyers
                </a>
            </li>
        </ul>
    </div>
</li>

{{-- Systems Menu --}}
@php
    $systemsRoutes = ['year_creations', 'options', 'adjustments', 'ledgers', 'w-adjustment'];
    $isSystemOpen = in_array($currentRoute, $systemsRoutes);
@endphp

<li class="nav-item">
    <a class="nav-link menu-link {{ $isSystemOpen ? '' : 'collapsed' }}"
       href="#sidebarSystems"
       data-bs-toggle="collapse"
       aria-expanded="{{ $isSystemOpen ? 'true' : 'false' }}"
       aria-controls="sidebarSystems">
        <i class="ri-settings-3-line"></i> <!-- Changed to a settings icon for better visual context -->
        <span data-key="t-systems">System Config</span>
    </a>

    <div class="collapse menu-dropdown {{ $isSystemOpen ? 'show' : '' }}" id="sidebarSystems">
        <ul class="nav nav-sm flex-column">
            <li class="nav-item">
                <a href="{{ url('year_creations') }}" class="nav-link {{ Request::is('year_creations') ? 'active' : '' }}">
                    <i class="ri-calendar-line"></i> Year Creation
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('options') }}" class="nav-link {{ Request::is('options') ? 'active' : '' }}">
                    <i class="ri-settings-2-line"></i> Options
                </a>
            </li>
            <li class="nav-item">
    <a href="{{ url('adjustments') }}" class="nav-link {{ Request::is('adjustments') ? 'active' : '' }}">
        <i class="ri-arrow-up-down-line"></i> Adjustment Entries 
    </a>
</li>

            <li class="nav-item">
                <a href="{{ url('ledgers') }}" class="nav-link {{ Request::is('ledgers') ? 'active' : '' }}">
                    <i class="ri-briefcase-line"></i> Ledgers
                </a>
            </li>
<li class="nav-item">
    <a href="{{ url('w-adjustment') }}" class="nav-link {{ Request::is('w-adjustment') ? 'active' : '' }}">
        <i class="ri-tools-line"></i> W-Adjustment
    </a>
</li>


        </ul>
    </div>
</li>




            </ul>
        </div>
    </div>
</div>
