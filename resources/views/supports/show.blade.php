@extends("dashboard")
@section("content")
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->    
        <div
        class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">              
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
                    </div>
 

                                                <!-- ============================================================== -->
                        <!-- horizontal form -->
                        <!-- ============================================================== -->
                        <div
                            class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">Reply</h5>
                                <div class="card-body">
                                    <form id="form" action="#" method="post" data-parsley-validate
                                        novalidate>
                                        @csrf
                                        <div class="form-group row">
                                            <div class="col-12 col-lg-12">
                                                <textarea id="inputWebSite"
                                                    name="response"
                                                    type="text" required
                                                    data-parsley-type="message"
                                                    placeholder="Message..."
                                                    class="form-control"></textarea>
                                            </div>
                                        </div>
                                        <div class="row pt-2 pt-sm-5 mt-1">
                                            <div class="col-sm-6 pl-0">
                                                <p class="text-right">
                                                    <button type="submit"
                                                        class="btn btn-space btn-primary">Send</button>
                                                    <button
                                                        class="btn btn-space btn-secondary">Cancel</button>
                                                </p>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <!-- end horizontal form -->
                        <!-- ============================================================== -->
   @endsection