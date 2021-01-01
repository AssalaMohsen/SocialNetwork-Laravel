@unless(auth()->user()->is($user))
    <form method="POST" action="/profiles/{{$user->username}}/follow">
        @csrf
        <button type="submit"
        class="bg-blue-500 border-2 border-blue-500 rounded-full py-2 px-4 text-white text-xs"
        >@if (auth()->user()->following($user))
            Unfollow Me
        @else
            Follow Me
        @endif
        </button>
    </form>
@endunless
