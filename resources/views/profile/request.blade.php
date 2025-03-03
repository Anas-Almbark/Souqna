@extends('profile.profile_layout') @section('content')

<div class="container mx-auto p-6">
    <h2 class="text-2xl font-bold mb-6">My Requests</h2>

    <!-- Buying Requests -->
    <div class="mb-8">
        <h3 class="text-xl font-semibold mb-4">Buying Requests</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @forelse($buyingRequests as $request)
                <div class="bg-white rounded-xl shadow-md overflow-hidden">
                    <div class="h-48 overflow-hidden">
                        @if($request->product->photos->count() > 0)
                            <img src="{{ Storage::url($request->product->photos[0]->url) }}" 
                                alt="{{ $request->product->name }}"
                                class="w-full h-full object-cover">
                        @else
                            <img src="{{ asset('img/no-image.png') }}" 
                                alt="No image" 
                                class="w-full h-full object-cover">
                        @endif
                    </div>
                    <div class="p-4">
                        <h4 class="font-semibold text-lg mb-2">{{ $request->product->name }}</h4>
                        <div class="text-sm text-gray-600 space-y-2">
                            <p><span class="font-medium">Seller:</span> {{ $request->seller_user->name }}</p>
                            <p><span class="font-medium">Price:</span> ${{ $request->product->price }}</p>
                            <p><span class="font-medium">Date:</span> {{ $request->created_at->format('Y-m-d') }}</p>
                            <div class="mt-3">
                                @if($request->is_sale)
                                    <span class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-sm">
                                        Completed
                                    </span>
                                @else
                                    <span class="px-3 py-1 bg-yellow-100 text-yellow-800 rounded-full text-sm">
                                        Pending
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center text-gray-500 py-8">
                    No buying requests found
                </div>
            @endforelse
        </div>
    </div>

    <!-- Selling Requests -->
    <div>
        <h3 class="text-xl font-semibold mb-4">Selling Requests</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @forelse($sellingRequests as $request)
                <div class="bg-white rounded-xl shadow-md overflow-hidden">
                    <div class="h-48 overflow-hidden">
                        @if($request->product->photos->count() > 0)
                            <img src="{{ Storage::url($request->product->photos[0]->url) }}" 
                                alt="{{ $request->product->name }}" 
                                style="max-width: 300px; max-height: 300px;"
                                class="mx-auto object-cover">
                        @else
                            <img src="{{ asset('img/no-image.png') }}" 
                                alt="No image" 
                                style="max-width: 300px; max-height: 300px;"
                                class="mx-auto object-cover">
                        @endif
                    </div>
                    <div class="p-4">
                        <h4 class="font-semibold text-lg mb-2">{{ $request->product->name }}</h4>
                        <div class="text-sm text-gray-600 space-y-2">
                            <p><span class="font-medium">Buyer:</span> {{ $request->buyer_user->name }}</p>
                            <p><span class="font-medium">Price:</span> ${{ $request->product->price }}</p>
                            <p><span class="font-medium">Date:</span> {{ $request->created_at->format('Y-m-d') }}</p>
                            <div class="mt-3">
                                @if($request->is_sale)
                                    <span class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-sm">
                                        Completed
                                    </span>
                                @else
                                    <span class="px-3 py-1 bg-yellow-100 text-yellow-800 rounded-full text-sm">
                                        Pending
                                    </span>
                                @endif
                            </div>
                            <!-- Update the buttons section -->
                            @if(!$request->is_sale)
                                <div class="mt-4 flex space-x-2">
                                    <form action="{{ route('requests.accept', $request->id) }}" method="POST" class="flex-1">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="w-full bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 text-sm transition duration-200">
                                            Accept
                                        </button>
                                    </form>
                                    <form action="{{ route('requests.reject', $request->id) }}" method="POST" class="flex-1">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="w-full bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 text-sm transition duration-200">
                                            Reject
                                        </button>
                                    </form>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center text-gray-500 py-8">
                    No selling requests found
                </div>
            @endforelse
        </div>
    </div>
</div>
@endsection
