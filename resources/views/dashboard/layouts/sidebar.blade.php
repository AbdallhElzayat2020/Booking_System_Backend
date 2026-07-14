<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="#">Stisla</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="#">St</a>
        </div>
        <ul class="sidebar-menu">
            {{--  Dashboard Route  --}}
            <li class="menu-header">Dashboard</li>
            <li class="{{setSidebarActive(['admin.dashboard'])}}"><a class="nav-link" href="{{ route('admin.dashboard') }}"><i class="far fa-square"></i> <span>Dashboard</span></a></li>


            {{--  Sections Route  --}}
            <li class="menu-header">Sections</li>
            <li class="dropdown {{setSidebarActive(['admin.hero.*','admin.categories.*','admin.locations.*'])}}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Sections</span></a>
                <ul class="dropdown-menu">
                    <li class="{{setSidebarActive(['admin.hero.*'])}}"><a class="nav-link" href="{{ route('admin.hero.index') }}">Hero</a></li>
                    <li class="{{setSidebarActive(['admin.categories.*'])}}"><a class="nav-link" href="{{ route('admin.categories.index') }}">Categories</a></li>
                    <li class="{{setSidebarActive(['admin.locations.*'])}}"><a class="nav-link" href="{{ route('admin.locations.index') }}">Locations</a></li>
                </ul>
            </li>
            <li><a class="nav-link" href="#"><i class="far fa-square"></i> <span>Blank Page</span></a></li>
        </ul>
    </aside>
</div>
