<div class="nav-left-sidebar sidebar-dark">
    <div class="menu-list">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="d-xl-none d-lg-none" href="{{ route('dashboard') }}">Dashboard</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav flex-column">
                    <li class="nav-divider">
                        Menu
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link {{ Route::is('dashboard') ? 'active' : '' }}"
                            href="{{ route('dashboard') }}"><i class="fa fa-fw fa-tachometer-alt"></i>Dashboard <span
                                class="badge badge-success">6</span></a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link {{ Route::is('admin.create') ? 'active' : '' }}"
                            href="{{ route('admin.create') }}" data-toggle="collapse" aria-expanded="false"
                            data-target="#submenu-2" aria-controls="submenu-2"><i
                                class="fa fa-fw fa-users-cog"></i>Admins <span class="badge badge-success">6</span></a>
                        <div id="submenu-2" class="collapse submenu">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link {{ Route::is('admin.index') ? 'active' : '' }}"
                                        href="{{ route('admin.index') }}"><i class="fa fa-fw fa-users"></i>Show
                                        Admins<span class="badge badge-success">6</span></a>
                                    <a class="nav-link {{ Route::is('admin.create') ? 'active' : '' }}"
                                        href="{{ route('admin.create') }}"><i class="fa fa-fw fa-user-plus"></i>Add
                                        Admin<span class="badge badge-success">6</span></a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link {{ Route::is('categories.create') ? 'active' : '' }}"
                            href="{{ route('categories.create') }}" data-toggle="collapse" aria-expanded="false"
                            data-target="#submenu-3" aria-controls="submenu-3"><i
                                class="fa fa-fw fa-tags"></i>Categories <span class="badge badge-success">6</span></a>
                        <div id="submenu-3" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('categories.index') }}"><i
                                            class="fa fa-fw fa-list"></i>Show Categories<span
                                            class="badge badge-success">6</span></a>
                                    <a class="nav-link" href="{{ route('categories.create') }}"><i
                                            class="fa fa-fw fa-plus"></i>Add Categories<span
                                            class="badge badge-success">6</span></a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="{{ route('products.index') }}" data-toggle="collapse"
                            aria-expanded="false" data-target="#submenu-4" aria-controls="submenu-4"><i
                                class="fa fa-fw fa-store"></i>Products <span class="badge badge-success">6</span></a>
                        <div id="submenu-4" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('products.index') }}">
                                        <i class="fa fa-fw fa-shopping-bag"></i>Show Products
                                        <span class="badge badge-success">6</span>
                                    </a>
                                </li>

                            </ul>
                        </div>
                    <li class="nav-item ">
                        <a class="nav-link" href="{{ route('supports.index') }}" data-toggle="collapse"
                            aria-expanded="false" data-target="#submenu-5" aria-controls="submenu-5"><i
                                class="fa fa-fw fa-headset"></i>Support Messages <span
                                class="badge badge-success">6</span></a>
                        <div id="submenu-5" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('supports.index') }}">
                                        <i class="fa fa-fw fa-envelope"></i>Show Messages
                                        <span class="badge badge-success">6</span>
                                    </a>
                                    <a class="nav-link" href="#">
                                        <i class="fa fa-fw fa-plus-circle"></i>Add
                                        Categories<span class="badge badge-success">6</span></a>
                                </li>
                            </ul>

                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('active.index') ? 'active' : '' }}"
                            href="{{ route('active.index') }}">
                            <i class="fa fa-fw fa-user-check"></i> Request Active Account </a>
                        </a>
                    </li>
            </div>
        </nav>
    </div>
</div>
