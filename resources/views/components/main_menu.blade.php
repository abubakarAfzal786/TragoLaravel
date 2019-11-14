<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto"><a class="navbar-brand" href="{{ url('/') }}">
                    <div class="brand-logo"></div>
                    <h2 class="brand-text mb-0">{{ config('app.name', 'Laravel') }}</h2>
                </a></li>

        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

            <li class=" navigation-header"><span>Menù</span>
            </li>
            <li class="nav-item {{ Request::is('travel_requests') ? 'active' : '' }}"><a href="{{ route('travel_requests.index') }}"><i class="feather icon-compass"></i><span class="menu-title" data-i18n="Email">Richieste Viaggi</span></a>
            </li>
            <li class=" nav-item {{ Request::is('plans_requests') ? 'active' : '' }}"><a href="{{ route('plans_requests.index') }}"><i class="feather icon-check-circle"></i><span class="menu-title" data-i18n="Chat">Piani - Richieste</span></a>
            </li>
            {{-- <li class=" nav-item {{ Request::is('plans_handheld') ? 'active' : '' }}"><a href="{{ route('plans_handheld.index') }}"><i class="feather icon-clipboard"></i><span class="menu-title" data-i18n="Todo">Piani - Palmare</span></a> --}}
            </li>
            <li class=" nav-item {{ Request::is('maintenance') ? 'active' : '' }}"><a href="{{ route('maintenance.index') }}"><i class="feather icon-settings"></i><span class="menu-title" data-i18n="Calender">Manutenzioni</span></a>
            </li>
            <li class=" nav-item {{ Request::is('plans') ? 'active' : '' }}"><a href="{{ route('plans.index') }}"><i class="feather icon-target"></i><span class="menu-title" data-i18n="Calender">Piani</span></a>
            </li>
            {{-- <li class=" nav-item {{ Request::is('operator') ? 'active' : '' }}"><a href="{{ route('operator.index') }}"><i class="feather icon-headphones"></i><span class="menu-title" data-i18n="Calender">Operatori</span></a> --}}
            </li>
            <li class=" nav-item {{ Request::is('devices') ? 'active' : '' }}"><a href="{{ route('devices.index') }}"><i class="feather icon-tablet"></i><span class="menu-title" data-i18n="Calender">Dispositivi</span></a>
            </li>
            <li class=" nav-item {{ Request::is('vehicles') ? 'active' : '' }}"><a href="{{ route('vehicles.index') }}"><i class="feather icon-truck"></i><span class="menu-title" data-i18n="Calender">Veicoli</span></a>
            </li>
            <li class=" nav-item {{ Request::is('DController') ? 'active' : '' }}"><a href="{{ route('DController.index') }}"><i class="feather icon-cpu"></i><span class="menu-title" data-i18n="Calender">Centraline</span></a>
            </li>
            {{-- <li class=" nav-item {{ Request::is('container') ? 'active' : '' }}"><a href="{{ route('container.index') }}"><i class="feather icon-box"></i><span class="menu-title" data-i18n="Calender">Contenitori</span></a> --}}
            </li>
            <li class=" nav-item {{ Request::is('probe') ? 'active' : '' }}"><a href="{{ route('probe.index') }}"><i class="feather icon-search"></i><span class="menu-title" data-i18n="Calender">Sonde</span></a>
            </li>

            <li class=" nav-item {{ Request::is('transaction') ? 'active' : '' }}"><a href="{{ route('transaction.index') }}"><i class="feather icon-bar-chart-line"></i><span class="menu-title" data-i18n="Calender">Transactions</span></a>
            </li>
            <li class=" nav-item {{ Request::is('equipment') ? 'active' : '' }}"><a href="{{ route('equipment.index') }}"><i class="feather icon-briefcase"></i><span class="menu-title" data-i18n="Calender">Equipment</span></a>
            </li>
            <li class=" nav-item {{ Request::is('datawarehouse') ? 'active' : '' }}"><a href="{{ route('datawarehouse.index') }}"><i class="feather icon-database"></i><span class="menu-title" data-i18n="Calender">Datawarehouse</span></a>
            </li>

        </ul>
    </div>
</div>
<!-- END: Main Menu-->
