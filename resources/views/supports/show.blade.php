@extends("dashboard")
@section("content")
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->                    
                        <div class="email-head">
                            <div class="email-head-subject">
                                <div class="title"><a class="active" href="#"><span class="icon"><i class="fas fa-star"></i></span></a> <span>{{ $support->subject }}</span>
                                    <div class="icons"><a href="#" class="icon"><i class="fas fa-reply"></i></a><a href="#" class="icon"><i class="fas fa-print"></i></a>
                                       <form method="POST" action="{{ route('supports.destroy',$support->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="icon"><i class="fas fa-trash"></i></button>
                                    </form>
                                </div>
                                </div>
                            </div>
                            <div class="email-head-sender">
                                <div class="date">{{ $support->created_at }}</div>
                                <div class="avatar"><img src="../assets/images/avatar-2.jpg" alt="Avatar" class="rounded-circle user-avatar-md"></div>
                                <div class="sender"><a href="#">{{ $support->name }}</a> to <a href="#">me</a>
                                    <div class="actions"><a class="icon toggle-dropdown" href="#" data-toggle="dropdown"><i class="fas fa-caret-down"></i></a>
                                        <div class="dropdown-menu" role="menu"><a class="dropdown-item" href="#">Mark as read</a><a class="dropdown-item" href="#">Mark as unread</a><a class="dropdown-item" href="#">Spam</a>
                                            <div class="dropdown-divider"></div>
                                            <form method="POST" action="{{ route('supports.destroy',$support->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <input type="submit" value="Delete" class="dropdown-item">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="email-body">
                            <p>{{ $support->message }}</p>
                            <p><strong>Regards</strong>,
                                <br> {{ $support->name }}</p>
                        </div>
   @endsection