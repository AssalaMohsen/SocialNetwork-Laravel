<x-app>
    <form method="POST" action="/profiles/{{ $user->username }}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <header class="mb-8 relative">
            <div class="relative">
                <button type="button"><img src="{{ $user->cover }}" alt="your cover" class="myImg cover" onClick="triggerClick(this,'#cover')" id="coverDisplay"></button>
                <button type="button"><img src="{{ $user->avatar }}" alt="your avatar" class="myImg avatar w-h-150 mr-2 absolute bottom-0 transform -translate-x-1/2" style="left: 50%;top:50%;" onClick="triggerClick(this,'#avatar')" id="avatarDisplay"></button>
                <input type="file" name="cover" id="cover" onChange="displayImage(this,'#coverDisplay')" accept=".png,.gif,.jpg,.webp" style="display: none;">
                <input type="file" name="avatar" id="avatar" onChange="displayImage(this,'#avatarDisplay')" accept=".png,.gif,.jpg,.webp" style="display: none;">
            </div>

            @error('cover')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
            @error('avatar')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </header>

        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="description">
                Description
            </label>

            <textarea class="thinborder-gray p-2 w-full" type="text" rows="4" name="description" id="description">{{$user->description}}</textarea>

            @error('description')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="name">
                Name
            </label>

            <input class="thinborder-gray p-2 w-full" type="text" name="name" id="name"
                value="{{ $user->name }}" required>

            @error('name')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="username">
                Username
            </label>

            <input class="thinborder-gray p-2 w-full" type="text" name="username" id="username"
                value="{{ $user->username }}" required>

            @error('username')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="email">
                Email
            </label>

            <input class="thinborder-gray p-2 w-full" type="email" name="email" id="email"
                value="{{ $user->email }}" required>

            @error('email')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="password">
                Password
            </label>

            <input class="thinborder-gray p-2 w-full" type="password" name="password" id="password">

            @error('password')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="password_confirmation">
                Password Confirmation
            </label>

            <input class="thinborder-gray p-2 w-full" type="password" name="password_confirmation"
                id="password_confirmation">

            @error('password_confirmation')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500 mr-4">
                Submit
            </button>

            <a href="/profiles/{{ $user->username }}" class="hover:underline">Cancel</a>
        </div>
    </form>
</x-app>
