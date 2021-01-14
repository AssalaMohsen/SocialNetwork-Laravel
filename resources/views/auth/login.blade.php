<x-master>
    <div class="container mx-auto flex justify-center">
        <x-panel>
            <x-slot name="heading">Sign In</x-slot>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="flex m-1">
                    <a href="/github/auth/redirect"> <button type="button"
                            class="flex bg-blue-400 text-white rounded-full py-1 px-4 hover:bg-blue-500 mr-2">
                            <img class="pr-2" src="/images/GitHub-Mark-Light-32px.png" /> <span class="pt-1">Sign in with GitHub</span> 
                        </button></a>
                    <a href="/google/auth/redirect"> <button type="button"
                            class="flex bg-blue-400 text-white rounded-full py-1 px-4 hover:bg-blue-500 mr-2">
                            <img class="pr-2" src="/images/iconfinder_Google_1298745.png"/><span class="pt-1">Sign in with Google</span>
                        </button></a>
                </div>
                <div class="flex">
                    <hr class="text-gray-800 m-4" style="flex-grow: 1;">or
                    <hr class="text-gray-800 m-4" style="flex-grow: 1;">
                </div>
                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="email">
                        Email
                    </label>

                    <input class="thinborder-gray p-2 w-full" style="outline:none;" type="email" name="email" id="email"
                        autocomplete="email" value="{{ old('email') }}">

                    @error('email')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>


                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="password">
                        Password
                    </label>

                    <input class="thinborder-gray p-2 w-full" style="outline: none" type="password" name="password"
                        id="password" autocomplete="current-password">

                    @error('password')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-between">

                    <div class="flex mb-4">
                        <div>
                            <input class="mr-1" type="checkbox" name="remember" id="remember"
                                {{ old('remember') ? ' checked' : '' }}>

                            <label class="text-xs text-gray-700 font-bold uppercase" for="remember">
                                Remember Me
                            </label>
                        </div>

                        @error('remember')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex">
                        <button type="submit"
                            class="bg-blue-400 text-white rounded-full py-1 px-4 hover:bg-blue-500 mr-2">
                            Sign In
                        </button>
                    </div>
                </div>

                <div class="pt-3 text-right">
                    <a href="{{ route('password.request') }}" class="text-xs text-gray-700">Forgot Your Password?</a>
                </div>
            </form>
        </x-panel>
    </div>
</x-master>
