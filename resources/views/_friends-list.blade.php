<div class="rounded-lg py-4 px-6" style="background-color: #2c3640">
    <h3 class="font-bold text-xl mb-4">Following</h3>

    <ul>
        @forelse (auth()->user()->follows()->take(5)->get() as $user)
            <li class="{{ $loop->last ? '' : 'mb-4' }}">
                <div>
                    <a href="{{ route('profile', $user) }}" class="flex items-center text-sm">
                        <img src="{{ $user->avatar }}" alt="" class="avatar w-h-40 mr-2">

                        {{ $user->name }}
                    </a>
                </div>
            </li>
        @empty
            <li>No friends yet.</li>
        @endforelse
    </ul>
</div>
