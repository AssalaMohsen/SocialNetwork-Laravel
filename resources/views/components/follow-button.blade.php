@unless(auth()->user()->is($user))
    <form method="POST" action="/profiles/{{$user->username}}/follow">
        @csrf
        <button type="submit"
        class="thinborder-gray bg-blue-500 hover:bg-blue-800 rounded-full py-2 px-4 text-white text-xs"
        >@if (auth()->user()->following($user))
            Unfollow
        @else
            Follow
        @endif
        </button>
    </form>
@endunless
