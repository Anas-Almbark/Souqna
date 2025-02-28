<div class="dashboard-header">
    <nav class="navbar navbar-expand-lg bg-white fixed-top">
        <a class="navbar-brand" href="index.html">Souqna</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto navbar-right-top">
                <li class="nav-item">
                    <div id="custom-search" class="top-search-bar">
                        <input class="form-control" type="text" placeholder="Search..">
                    </div>
                </li>
                <li class="nav-item dropdown notification">
                    <a class="nav-link nav-icons" href="#" id="navbarDropdownMenuLink1" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-fw fa-bell"></i>
                        @php
                            $notificationCount = count($supports->where('response', null)) + count($pendingProducts);
                        @endphp
                        @if($notificationCount > 0)
                            <span class="badge badge-danger" style="position: absolute; top: 0; right: 0; font-size: 0.8em;">{{ $notificationCount }}</span>
                        @endif
                    </a>
                    <ul class="dropdown-menu dropdown-menu-right notification-dropdown">
                        <li>
                            <div class="notification-title"> Notifications ({{ $notificationCount }})</div>
                            <div class="notification-list">
                                <div class="list-group">
                                    @foreach($supports as $support)
                                        @if($support->response === null)
                                            <a href="{{ route('supports.show', $support->id) }}" class="list-group-item list-group-item-action">
                                                <div class="notification-info">
                                                    <div class="notification-list-user-img">
                                                        <i class="fas fa-envelope fa-2x"></i>
                                                    </div>
                                                    <div class="notification-list-user-block">
                                                        <span class="notification-list-user-name">{{ $support->name }}</span>
                                                        needs support response
                                                        <div class="notification-date">{{ $support->created_at->diffForHumans() }}</div>
                                                    </div>
                                                </div>
                                            </a>
                                        @endif
                                    @endforeach

                                    @foreach($pendingProducts as $product)
                                        <a href="{{ route('admin.products.index') }}" class="list-group-item list-group-item-action">
                                            <div class="notification-info">
                                                <div class="notification-list-user-img">
                                                    <i class="fas fa-shopping-cart fa-2x"></i>
                                                </div>
                                                <div class="notification-list-user-block">
                                                    <span class="notification-list-user-name">{{ $product->name }}</span>
                                                    needs approval
                                                    <div class="notification-date">{{ $product->created_at->diffForHumans() }}</div>
                                                </div>
                                            </div>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="list-footer">
                                <a href="{{ route('supports.index') }}">View all notifications</a>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown connection">
                    <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false"> <i class="fas fa-fw fa-th"></i> </a>
                    <ul class="dropdown-menu dropdown-menu-right connection-dropdown">
                        <li class="connection-list">
                            <div class="row">
                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                                    <a href="#" class="connection-item"><img src="assets/images/github.png"
                                            alt=""> <span>Github</span></a>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                                    <a href="#" class="connection-item"><img src="assets/images/dribbble.png"
                                            alt=""> <span>Dribbble</span></a>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                                    <a href="#" class="connection-item"><img src="assets/images/dropbox.png"
                                            alt=""> <span>Dropbox</span></a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                                    <a href="#" class="connection-item"><img src="assets/images/bitbucket.png"
                                            alt=""> <span>Bitbucket</span></a>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                                    <a href="#" class="connection-item"><img src="assets/images/mail_chimp.png"
                                            alt=""><span>Mail chimp</span></a>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                                    <a href="#" class="connection-item"><img src="assets/images/slack.png"
                                            alt=""> <span>Slack</span></a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="conntection-footer"><a href="#">More</a></div>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown nav-user">
                    <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img
                            src="assets/images/avatar-1.jpg" alt=""
                            class="user-avatar-md rounded-circle"></a>
                    <div class="dropdown-menu dropdown-menu-right nav-user-dropdown"
                        aria-labelledby="navbarDropdownMenuLink2">
                        <div class="nav-user-info">
                            <h5 class="mb-0 text-white nav-user-name">
                                {{ "dump(auth()->user())" }}</h5>
                            <span class="status"></span><span
                                class="ml-2">{{"dump(auth()->user())"}}</span>
                        </div>

                        <a class="dropdown-item" href="#"><i class="fas fa-user mr-2"></i>Account</a>
                        <a class="dropdown-item" href="#"><i class="fas fa-cog mr-2"></i>Setting</a>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-item"><i
                                    class="fas fa-power-off mr-2"></i>Logout</button>
                        </form>

                    </div>
                </li>
            </ul>
        </div>
    </nav>
</div>
