<ul class="nav nav-tabs mb-4">
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('admin.home-page-banners.*') ? 'active' : '' }}" href="{{ route('admin.home-page-banners.index') }}">
            Property Unit Banners
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('admin.home-page-logos.*') ? 'active' : '' }}" href="{{ route('admin.home-page-logos.index') }}">
            Project Logos
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('admin.home-page-featured.*') ? 'active' : '' }}" href="{{ route('admin.home-page-featured.index') }}">
            Featured Properties
        </a>
    </li>
</ul>
