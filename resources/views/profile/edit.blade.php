@extends('profile.profile_layout')
@section('content')
    <div class="flex justify-center pb-5">
        <div class="py-6 px-8 w-50 h-80 mt-20 bg-white rounded shadow-xl">
            <form action="{{ route('profile.update', $user) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-6">
                    <label for="name" class="block text-gray-800 font-bold">Name:</label>
                    <input type="text" name="name" id="name" placeholder="username"
                        class="w-full border border-gray-300 py-2 pl-3 rounded mt-2 outline-none focus:ring-indigo-600 :ring-indigo-600" />
                </div>
                @if ($user->updated_at->addMonth()->isPast() || !$user->location)
                    <div class="mb-6">
                        <label for="location" class="block text-gray-800 font-bold">Location:</label>
                        <input type="text" name="location" id="location" placeholder="Your location"
                            class="w-full border border-gray-300 py-2 pl-3 rounded mt-2 outline-none focus:ring-indigo-600 :ring-indigo-600" />
                        <span class="d-block text-sm mt-3 ml-2 text-info"> You can update your location after
                            {{ $user->updated_at->addMonth()->format('d/m/Y') }} </span>
                    </div>
                @endif
                @if (!$user->identity)
                    <div class="mb-6">
                        <label for="identity" class="block text-gray-800 font-bold">identity:</label>
                        <input type="file" name="identity" id="identity"
                            class="w-full border border-gray-300 py-2 pl-3 rounded mt-2 outline-none focus:ring-indigo-600 :ring-indigo-600"
                            accept="pdf/" />
                        <span class="d-block text-sm my-2 ml-2"> Must be a <b class="text-info"> .pdf </b> file</span>
                    </div>
                @endif
                <div class="mb-6">
                    <label for="photo" class="block text-gray-800 font-bold">photo profile:</label>
                    <input type="file" name="photo" id="photo"
                        class="w-full border border-gray-300 py-2 pl-3 rounded mt-2 outline-none focus:ring-indigo-600 :ring-indigo-600" />
                </div>
                <div class="mb-6">
                    <label for="phone" class="block text-gray-800 font-bold">phone primary:</label>
                    <input type="text" name="phonePrimary" id="phone" placeholder="phone primary"
                        class="w-full border border-gray-300 py-2 pl-3 rounded mt-2 outline-none focus:ring-indigo-600 :ring-indigo-600" />
                </div>
                <div class="mb-6">
                    <label for="phone_second" class="block text-gray-800 font-bold">phone secondary:</label>
                    <input type="text" name="phoneSecondary" id="phone_second" placeholder="phone secondary"
                        class="w-full border border-gray-300 py-2 pl-3 rounded mt-2 outline-none focus:ring-indigo-600 :ring-indigo-600" />
                </div>
                <div class="mb-6">
                    <label for="facebook" class="block text-gray-800 font-bold">account facebook:</label>
                    <input type="text" name="facebook" id="facebook" placeholder="Your account facebook"
                        class="w-full border border-gray-300 py-2 pl-3 rounded mt-2 outline-none focus:ring-indigo-600 :ring-indigo-600" />
                </div>
                <div class="mb-6">
                    <label for="instagram" class="block text-gray-800 font-bold">phone instagram:</label>
                    <input type="text" name="instagram" id="instagram" placeholder="Your account instagram"
                        class="w-full border border-gray-300 py-2 pl-3 rounded mt-2 outline-none focus:ring-indigo-600 :ring-indigo-600" />
                </div>
                <div>
                    <label for="tiktok" class="block text-gray-800 font-bold">phone tiktok:</label>
                    <input type="text" name="tiktok" id="tiktok" placeholder="Your account tiktok"
                        class="w-full border border-gray-300 py-2 pl-3 rounded mt-2 outline-none focus:ring-indigo-600 :ring-indigo-600" />
                </div>
                <button type="submit"
                    class="cursor-pointer py-2 px-4 block mt-6 bg-indigo-500 text-white font-bold w-full text-center rounded">
                    update</button>
            </form>
        </div>
    </div>
@endsection
