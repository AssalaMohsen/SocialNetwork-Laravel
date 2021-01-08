<ul>

    <li>
        <a class="font-bold text-lg mb-4 block" href="{{ route('home') }}">
            Home
        </a>
    </li>

    @auth
        <li>
            <a class="font-bold text-lg mb-4 block" href="{{ route('profile', auth()->user()) }}">
                Profile
            </a>
        </li>

        <li>
            <div class="inline-flex items-center text-center mb-4">
                <a class="font-bold text-lg" href="/notifications">
                    Notifications
                </a>
                @if (auth()->user()->unreadNotifications->count() >0)
                    <div class="bg-red-500 text-xs rounded-full ml-2" style="width: 16px;height:16px;">
                        {{ auth()->user()->unreadNotifications->count() }}
                    </div>
                @endif

            </div>
        </li>
    @endauth

    <li>
        <a class="font-bold text-lg mb-4 block" href="/explore">
            Explore
        </a>
    </li>
    @auth
        <li>
            <form method="POST" action="/logout">
                @csrf

                <button class="font-bold text-lg">Logout</button>
            </form>
        </li>
    @endauth
</ul>
