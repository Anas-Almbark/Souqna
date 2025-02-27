@extends('dashboard')
@section('content')
    <div class="" style="margin-top:-40px">
        <div class="email-inbox-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="email-title">
                        <span class="icon"><i class="fas fa-inbox"></i></span> Inbox
                        <span class="new-messages">(2 new messages)</span>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="email-search">
                        <div class="input-group input-search">
                            <input class="form-control" type="text" placeholder="Search mail..." /><span
                                class="input-group-btn">
                                <button class="btn btn-secondary" type="button">
                                    <i class="fas fa-search"></i></button></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="email-filters">
            <div class="email-filters-left">
                <label class="custom-control custom-checkbox be-select-all">
                    <input class="custom-control-input chk_all" type="checkbox" name="chk_all" /><span
                        class="custom-control-label"></span>
                </label>
                <div class="btn-group">
                    <button class="btn btn-light dropdown-toggle" data-toggle="dropdown" type="button">
                        With selected <span class="caret"></span>
                    </button>
                    <div class="dropdown-menu" role="menu">
                        <a class="dropdown-item" href="#">Mark as rea</a><a class="dropdown-item" href="#">Mark
                            as unread</a><a class="dropdown-item" href="#">Spam</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Delete</a>
                    </div>
                </div>
                <div class="btn-group">
                    <button class="btn btn-light" type="button">Archive</button>
                    <button class="btn btn-light" type="button">Span</button>
                    <button class="btn btn-light" type="button">Delete</button>
                </div>
                <div class="btn-group">
                    <button class="btn btn-light dropdown-toggle" data-toggle="dropdown" type="button">
                        Order by <span class="caret"></span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" role="menu">
                        <a class="dropdown-item" href="#">Date</a><a class="dropdown-item" href="#">From</a><a
                            class="dropdown-item" href="#">Subject</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Size</a>
                    </div>
                </div>
            </div>
            <div class="email-filters-right">
                <span class="email-pagination-indicator">1-50 of 253</span>
                <div class="btn-group email-pagination-nav">
                    <button class="btn btn-light" type="button">
                        <i class="fas fa-angle-left"></i>
                    </button>
                    <button class="btn btn-light" type="button">
                        <i class="fas fa-angle-right"></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="email-list">
            <div class="email-list-item email-list-item--unread">
                <div class="email-list-actions">
                    <label class="custom-control custom-checkbox">
                        <input class="custom-control-input checkboxes" type="checkbox" value="1" id="one" /><span
                            class="custom-control-label"></span>
                    </label>
                </div>
                @forelse ($users as $user)
                    <a href="{{ route('active.show', $user->id) }}" class="w-100 d-block">
                        <div class="email-list-detail d-block w-100">
                            <span class="date float-right">{{ $user->created_at->format('d M') }}</span>
                            <span class="from">{{ $user->name }}</span>
                            <p class="msg">
                                <b>{{ $user->email }}</b> He need to active his account
                            </p>
                        </div>
                    </a>
                @empty
                    <p>No users found</p>
                @endforelse
            </div>
        </div>
    </div>
@endsection
