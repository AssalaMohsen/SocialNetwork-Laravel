<x-master>
    <div class="container mx-auto flex justify-center mb-10">
        <x-panel>
            <x-slot name="heading">Sign Up</x-slot>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="flex m-1">
                    <a href="/github/auth/redirect"> <button type="button"
                            class="flex bg-blue-400 text-white rounded-full py-1 px-4 hover:bg-blue-500 mr-2">
                            <img class="pr-2" src="/images/GitHub-Mark-Light-32px.png" /> <span class="pt-1">Sign up with GitHub</span> 
                        </button></a>
                    <a href="/google/auth/redirect"> <button type="button"
                            class="flex bg-blue-400 text-white rounded-full py-1 px-4 hover:bg-blue-500 mr-2">
                            <img class="pr-2" src="/images/iconfinder_Google_1298745.png"/><span class="pt-1">Sign up with Google</span>
                        </button></a>
                </div>
                <div class="flex">
                    <hr class="text-gray-800 m-4" style="flex-grow: 1;">or
                    <hr class="text-gray-800 m-4" style="flex-grow: 1;">
                </div>

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                           for="username"
                    >
                        Username
                    </label>

                    <input class="thinborder-gray p-2 w-full"
                    style="outline: none"
                           type="text"
                           name="username"
                           id="username"
                           value="{{ old('username') }}"
                           required
                    >

                    @error('username')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                           for="name"
                    >
                        Name
                    </label>

                    <input class="thinborder-gray p-2 w-full"
                    style="outline: none"
                           type="text"
                           name="name"
                           id="name"
                           value="{{ old('name') }}"
                           required
                    >

                    @error('name')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                           for="email"
                    >
                        Email
                    </label>

                    <input class="thinborder-gray p-2 w-full"
                    style="outline: none"
                           type="email"
                           name="email"
                           id="email"
                           value="{{ old('email') }}"
                           autocomplete="email"
                           required
                    >

                    @error('email')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>


                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                           for="password"
                    >
                        Password
                    </label>

                    <input class="thinborder-gray p-2 w-full"
                    style="outline: none"
                           type="password"
                           name="password"
                           id="password"
                           autocomplete="new-password"
                           required
                    >

                    @error('password')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                           for="password_confirmation"
                    >
                        Password Confirmation
                    </label>

                    <input class="thinborder-gray p-2 w-full"
                         style="outline: none"
                           type="password"
                           name="password_confirmation"
                           id="password_confirmation"
                           autocomplete="new-password"
                           required
                    >

                    @error('password_confirmation')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <button type="submit"
                            class="bg-blue-400 text-white rounded-full py-2 px-4 hover:bg-blue-500"
                    >
                        Sign Up
                    </button>
                </div>
            </form>
        </x-panel>
    </div>
</x-master>