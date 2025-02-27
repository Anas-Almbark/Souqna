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
                        <a class="nav-link active" href="{{ route('dashboard') }}"><i
                                class="fa fa-fw fa-user-circle"></i>Dashboard <span
                                class="badge badge-success">6</span></a>
                    </li>
                    @if (Auth::user()->role == 'superAdmin')
                    <li class="nav-item ">
                        <a class="nav-link" href="{{ route('admin.create') }}" data-toggle="collapse"
                            aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-2"><i
                                class="fa fa-fw fa-user-circle"></i>Admins <span
                                class="badge badge-success">6</span></a>
                        <div id="submenu-2" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin.index') }}"><i
                                            class="fa fa-fw fa-user-circle"></i>Show Admins<span
                                            class="badge badge-success">6</span></a>
                                    <a class="nav-link" href="{{ route('admin.create') }}"><i
                                            class="fa fa-fw fa-user-circle"></i>Add Admin<span
                                            class="badge badge-success">6</span></a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    @endif
                    <li class="nav-item ">
                        <a class="nav-link" href="{{ route('categories.create') }}" data-toggle="collapse"
                            aria-expanded="false" data-target="#submenu-3" aria-controls="submenu-3"><i
                                class="fa fa-fw fa-user-circle"></i>Categories <span
                                class="badge badge-success">6</span></a>
                        <div id="submenu-3" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('categories.index') }}"><i
                                            class="fa fa-fw fa-user-circle"></i>Show Categories<span
                                            class="badge badge-success">6</span></a>
                                    <a class="nav-link" href="{{ route('categories.create') }}"><i
                                            class="fa fa-fw fa-user-circle"></i>Add Categories<span
                                            class="badge badge-success">6</span></a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item ">
<<<<<<< HEAD
                        <a class="nav-link" href="{{ route('products.index') }}" data-toggle="collapse"
                            aria-expanded="false" data-target="#submenu-4" aria-controls="submenu-4"><i
                                class="fa fa-fw fa-box"></i>Products <span
=======
                        <a class="nav-link" href="{{ route('supports.create') }}" data-toggle="collapse"
                            aria-expanded="false" data-target="#submenu-4" aria-controls="submenu-4"><i
                                class="fa fa-fw fa-user-circle"></i>Support Messages <span
>>>>>>> 7a6ff9abc715a4755f819937d0f22c306653f7a9
                                class="badge badge-success">6</span></a>
                        <div id="submenu-4" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
<<<<<<< HEAD
                                    <a class="nav-link" href="{{ route('products.index') }}"><i
                                            class="fa fa-fw fa-list"></i>Show Products<span
                                            class="badge badge-success">6</span></a>
                                    
=======
                                    <a class="nav-link" href="{{ route('supports.index') }}"><i
                                            class="fa fa-fw fa-user-circle"></i>Show Messages<span
                                            class="badge badge-success">6</span></a>
                                    <a class="nav-link" href="{{ route('supports.create') }}"><i
                                            class="fa fa-fw fa-user-circle"></i>Add Categories<span
                                            class="badge badge-success">6</span></a>
>>>>>>> 7a6ff9abc715a4755f819937d0f22c306653f7a9
                                </li>
                            </ul>
                        </div>
                    </li>
<<<<<<< HEAD
=======
                </ul>
>>>>>>> 7a6ff9abc715a4755f819937d0f22c306653f7a9
            </div>
        </nav>
    </div>
</div>
