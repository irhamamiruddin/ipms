<!-- partial:../../partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
    <li class="nav-item nav-profile">
        <div class="nav-link">
        <div class="profile-image">
            <img src="https://via.placeholder.com/100x100" alt="image"/>
            <span class="online-status online"></span> <!--change class online to offline or busy as needed-->
        </div>
        <div class="profile-name">
            <p class="name">
            {{ Auth::user()->name }}
            </p>
            <p class="designation">
            {{ Auth::user()->roles->first()->title }}
            </p>

            <a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                Logout
            </a>
        </div>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
        </div>
    </li>
    <li class="nav-item"> 
        <a class="nav-link" href="{{ route('dashboard') }}">
        <i class="icon-menu menu-icon"></i>
        <span class="menu-title">Dashboard</span>
        </a>
    </li>
    @can('contact-index')
    <li class="nav-item">
        <a class="nav-link" href="{{ route('contacts.index') }}">
        <i class="fa fa-address-book-o menu-icon"></i>
        <span class="menu-title">Contacts</span>
        </a>
    </li>
    @endcan
    @can('company-index')
    <li class="nav-item">
        <a class="nav-link" href="{{ route('companies.index') }}">
        <i class="icon-briefcase menu-icon"></i>
        <span class="menu-title">Companies</span>
        </a>
    </li>
    @endcan
    @can('land-index')
    <li class="nav-item">
        <a class="nav-link" href="{{ route('lands.index') }}">
        <i class="icon-globe menu-icon"></i>
        <span class="menu-title">Lands</span>
        </a>
    </li>
    @endcan
    @can('project-index')
    <li class="nav-item">
        <a class="nav-link" href="{{ route('projects.index') }}">
        <i class="icon-map menu-icon"></i>
        <span class="menu-title">Projects</span>
        </a>
    </li>
    @endcan
    @canany(['report-land_log', 'report-project_log', 'report-land_ownerships', 'report-system_log'])
    <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#reports" aria-expanded="false" aria-controls="page-layouts">
        <i class="icon-notebook menu-icon"></i>
        <span class="menu-title">Reports</span>
        </a>
        <div class="collapse" id="reports">
        <ul class="nav flex-column sub-menu">
            @can('report-land_log')
            <li class="nav-item"> <a class="nav-link" href="{{ route('reports.land_log') }}">Land Logs</a></li>
            @endcan
            @can('report-project_log')
            <li class="nav-item"> <a class="nav-link" href="{{ route('reports.project_log') }}">Project Logs</a></li>
            @endcan
            @can('report-land_ownerships')
            <li class="nav-item"> <a class="nav-link" href="{{ route('reports.land_ownerships') }}">Land Ownerships</a></li>
            @endcan
            @can('report-system_log')
            <li class="nav-item"> <a class="nav-link" href="{{ route('reports.system_log') }}">System Log</a></li>
            @endcan
        </ul>
        </div>
    </li>
    @endcanany
    @can('library')
    <li class="nav-item">
        <a class="nav-link" href="{{ route('libraries.index') }}">
        <i class="icon-pin menu-icon"></i>
        <span class="menu-title">Libraries</span>
        </a>
    </li>
    @endcan
    @canany(['setting-development', 'setting-log', 'setting-other', 'setting-user'])
    <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#settings" aria-expanded="false" aria-controls="page-layouts">
        <i class="icon-cursor-move menu-icon"></i>
        <span class="menu-title">Settings</span>
        </a>
        <div class="collapse" id="settings">
        <ul class="nav flex-column sub-menu">
            @can('setting-development')
            <li class="nav-item"> <a class="nav-link" href="{{ route('settings.components.index') }}">Development Components</a></li>
            @endcan
            @can('setting-log')
            <li class="nav-item"> <a class="nav-link" href="{{ route('settings.logs.index') }}">Logs</a></li>
            @endcan
            @can('setting-other')
            <li class="nav-item"> <a class="nav-link" href="{{ route('settings.others.index') }}">Others</a></li>
            @endcan
            @can('setting-user')
            <li class="nav-item"> <a class="nav-link" href="{{ route('users.index') }}">Users</a></li>
            @endcan
        </ul>
        </div>
    </li>
    @endcanany
</nav>
<!-- partial -->