@extends('profile.profile_layout') @section('content')
    <div class="bg-gray-100 ">
        <div class="container mx-auto p-5">
            <div class="md:flex wrap md:-mx-2 ">
                <div class="w-full md:w-3/12 md:mx-2">
                    <div class="bg-white p-3 border-t-4 border-blue-400">
                        @cannot('active-account')
                            <span class="d-block w-fit bg-red-500 rounded text-white border border-red-500 p-2 my-2"> Not
                                active
                            </span>
                        @endcan
                        @if (!$user->is_active && !$user->isActive())
                            <span class="d-block w-fit bg-orange-500 rounded text-white border p-2 my-2">
                                Your account activation request is being reviewed
                                <div class="inline-block animate-spin rounded-full h-4 w-4 border-t-2 border-white ml-2">
                                </div>
                            </span>
                        @endif
                               
                        <div class="image overflow-hidden"> <img class="h-auto w-full mx-auto"
                                src="{{ $user->photo ? Storage::url($user->photo) : asset('img/def.png') }}"
                                alt="{{ $user->name }}'s profile image"> </div>
                        <h1 class="text-gray-900 font-bold text-xl leading-8 my-1">{{ $user->name }}</h1>
                        
{{-- Seller Rating Display --}}
<div class="flex items-center mb-2">
    <div class="flex text-yellow-400">
        @php
            $evaluation = floor($evaluation);
        @endphp
        
        @for ($i = 1; $i <= 5; $i++)
            @if ($i <= $evaluation)
                <i class="fas fa-star"></i>
            @else
                <i class="far fa-star"></i>
            @endif
        @endfor
    </div>
    <span class="ml-2 text-gray-600">({{ $evaluation }})</span>
</div>
                        
                        <h3 class="text-gray-600 font-lg text-semibold leading-6"> {{ $user->followers->count() }}
                            follower
                            , {{ $user->following->count() }} following </h3>
                        <ul class="py-2 mt-3">
                            <li class="flex rounded text-center">
                                @if (Auth::check() && Auth::id() !== $user->id)
                                    @if (Auth::user()->isFollowing($user->id))
                                        <form action="{{ route('unfollow', $user->id) }}" method="POST" class="w-100">
                                            @csrf
                                            <button type="submit" class="btn w-100 bg-red-400 py-3 text-white">
                                                <i class="fa-solid fa-user-minus mr-1"></i>
                                                unFollow
                                            </button>
                                        </form>
                                    @else
                                        <form action="{{ route('follow', $user->id) }}" method="POST" class="w-100">
                                            @csrf
                                            <button type="submit" class="btn w-100 bg-blue-400 py-3 text-white">
                                                <i class="fa-solid fa-user-plus mr-1"></i>
                                                follow
                                            </button>
                                        </form>
                                    @endif
                                @endif

                            </li>
                            <li>
                                @if ($user->id == auth()->user()->id)
                                    <a href="{{ route('profile.edit', $user->id) }}"
                                        class="d-block text-center p-2 flex text-gray-600 mt-3 hover:text-gray-700 bg-gray-200 items-center py-3 rounded">edit
                                        profile</a>
                                @endif
                            </li>
                        </ul>
                        <ul>
                            <li class="px-2 flex mt-2 items-center py-2 rounded"> <span>Member since</span> <span
                                    class="ml-auto"> {{ $user->created_at->format('Y-m-d') }} </span> </li>
                            @if ($user->location)
                                <li class="flex items-center py-2 px-2 rounded"> <span> <i
                                            class="fa-solid fa-location-dot mr-1"></i> Location:
                                        {{ $user->location }}</span>
                                </li>
                            @endif
                            @if ($user->contacts->first()?->phone_primary)
                                <li>
                                    <a href="tell:{{ $user->contacts->first()->phone_primary }}"
                                        class="d-block flex items-center py-2 px-2 rounded"> <i
                                            class="fa-solid fa-phone mr-1"></i>
                                        Phone: {{ $user->contacts->first()->phone_primary }} </a>
                                </li>
                            @endif
                            @if ($user->contacts->first()?->phone_second)
                                <li>
                                    <a href="tell:{{ $user->contacts->first()->phone_second }}"
                                        class="mb-2 flex items-center py-2 px-2 rounded">
                                        <i class="fa-solid fa-phone mr-1"></i>
                                        Phone Secondary: {{ $user->contacts->first()->phone_second }} </a>
                                </li>
                            @endif
                            <li>
                                @if ($user->contacts->first()?->facebook)
                                    <a href="{{ $user->contacts->first()->facebook }}" target="_blank"
                                        class ="text-blue-500 text-lg hover:text-blue-700 ml-3"><i
                                            class="fa-brands fa-square-facebook"></i>
                                    </a>
                                @endif
                                @if ($user->contacts->first()?->instagram)
                                    <a href="{{ $user->instagram }}" target="_blank" target="_blank"
                                        class ="text-pink-500 text-lg hover:text-pink-700 mx-3"><i
                                            class="fa-brands fa-square-instagram"></i>
                                    </a>
                                @endif
                                @if ($user->contacts->first()?->tiktok)
                                    <a href="{{ $user->tiktok }}" target="_blank" class="text-black text-lg">
                                        <i class="fa-brands fa-tiktok"></i>
                                    </a>
                                @endif
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="w-full md:w-9/12 mx-2">
                    <div class="bg-gray-200 p-3 rounded-lg grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                        @forelse ($user->products as $product)
                            <a href="" class="block h-full">
                                <div class="bg-white rounded-xl border border-blue-300 h-full flex flex-col">
                                    <div
                                        class="relative mx-4 mt-4 overflow-hidden text-gray-700 bg-white bg-clip-border rounded-xl h-48">
                                        <img src="{{ $product->photos->first()->url }}" alt="card-image"
                                            class="object-cover w-full h-full" />
                                    </div>
                                    <div class="p-6 flex-grow">
                                        <div class="flex items-center justify-between mb-2">
                                            <p
                                                class="block font-sans text-base antialiased font-medium leading-relaxed text-blue-gray-900 truncate">
                                                {{ $product->name }} </p>
                                            <p
                                                class="block font-sans text-base antialiased font-medium leading-relaxed text-blue-gray-900">
                                                ${{ $product->price }} </p>
                                        </div>
                                    </div>
                                    <div class="p-6 pt-0"> {{-- <span> {{ $user->product->created_at->diffForHumans() }} </span> --}} </div>
                                </div>
                            </a>
                        @empty
                            <p class="text-center text-gray-500">No products found</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
