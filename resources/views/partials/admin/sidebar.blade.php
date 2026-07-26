<aside class="sidebar">

    <div class="sidebar-logo">

        <h4>Property Listing</h4>

    </div>

    <ul class="sidebar-menu">

        <li>
            <a href="{{ route('admin.dashboard') }}"
               class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">

                <i class="bi bi-speedometer2"></i>

                <span>Dashboard</span>

            </a>
        </li>

        <li>

            <a href="#">

                <i class="bi bi-box-seam"></i>

                Products

            </a>

        </li>

        <li>
            <a href="{{ route('admin.categories.index') }}"
               class="{{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">

                <i class="bi bi-tags"></i>

                <span>Categories</span>

            </a>
        </li>

        <li>

            <a href="#">

                <i class="bi bi-award"></i>

                Brands

            </a>

        </li>

        <li>

            <a href="#">

                <i class="bi bi-images"></i>

                Banners

            </a>

        </li>

        <li>

            <a href="#">

                <i class="bi bi-gear"></i>

                Settings

            </a>

        </li>

    </ul>

</aside>