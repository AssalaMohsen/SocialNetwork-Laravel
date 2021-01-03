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
