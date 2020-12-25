<x-master>
    <div class="container mx-auto flex justify-center">
        <x-panel>
            <x-slot name="heading">Register</x-slot>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                           for="name"
                    >
                        Name
                    </label>

                    <input class="border-2 border-gray-400 p-2 w-full"
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

                    <input class="border-2 border-gray-400 p-2 w-full"
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

                    <input class="border-2 border-gray-400 p-2 w-full"
                        style="outline: none"
                           type="password"
                           name="password"
                           id="password"
                           autocomplete="new-password"
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

                    <input class="border-2 border-gray-400 p-2 w-full"
                         style="outline: none"
                           type="password"
                           name="password_confirmation"
                           id="password_confirmation"
                           autocomplete="new-password"
                    >

                    @error('password_confirmation')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <button type="submit"
                            class="bg-blue-400 text-white rounded-full py-2 px-4 hover:bg-blue-500"
                    >
                        Register
                    </button>
                </div>
            </form>
        </x-panel>
    </div>
</x-master>