@extends('dashboard')
@section('content')
    <div class="dashboard-main-wrapper">
        <div class="row">
            <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="card-header p-4">
                        <a class="pt-2 d-inline-block" href="index.html"> {{ $user->name }} </a>
                        <div class="float-right">
                            <img src="{{ asset(Storage::url($user->photo)) }}" alt="user_img"
                                class="rounded-circle object-fit-cover" style="aspect-ratio: 1; border-radius: 50%;"
                                width="50" height="50">
                        </div>
                    </div>
                    <div class="card-body px-5">
                        <div class="row mb-4">
                            <div class="w-100">
                                <h5 class="mb-3">Identity:</h5>
                                @if ($user->identity)
                                    <div class="pdf-container">
                                        <embed src="{{ asset(Storage::url($user->identity)) }}" type="application/pdf"
                                            width="100%" height="500px">
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="table-responsive-sm">
                            <div class="row mb-4">
                                <div class="w-100">
                                    <h5 class="mb-3">Location:</h5>
                                    @if ($user->location)
                                        <div class="location-details">
                                            <p><strong>Address:</strong> {{ $user->location }}</p>
                                        </div>
                                    @endif
                                </div>
                                <div class="w-100">
                                    @if ($user->contacts->first()?->phone_primary)
                                        <div class="location-details">
                                            <p><strong>phone:</strong> {{ $user->contacts->first()?->phone_primary }}</p>
                                        </div>
                                    @endif
                                </div>

                            </div>
                        </div>
                        <div class="card-footer bg-white">
                            <div class="d-flex">
                                <form action="{{ route('active.reject', $user->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-dark rounded"> rejected </button>
                                </form>
                                <form action="{{ route('active.accept', $user->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button class="btn btn-success rounded"> accepted </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
