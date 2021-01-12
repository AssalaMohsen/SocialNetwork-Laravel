@unless(auth()->user()->is($user))
    <form wire:submit.prevent="updateFollow()">
        <button type="submit"
        class="thinborder-gray bg-blue-500 hover:bg-blue-800 rounded-full py-2 px-4 text-white text-xs"
        >@if($following)
            Unfollow
        @else
            Follow
        @endif
        </button>
        @include('notify::messages')
    </form>
@endunless