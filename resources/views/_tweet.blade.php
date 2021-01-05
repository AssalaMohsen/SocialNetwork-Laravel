    <div class="flex p-4 {{ $loop->last ? '' : 'thinborder-gray-bottom' }}">
        <div class="mr-2 flex-shrink-0">
            <a href="{{ route('profile', $tweet->user) }}">
                <img src="{{ $tweet->user->avatar }}" alt="" class="avatar w-h-50 mr-2">
            </a>
        </div>

        <div class="tweet">
            <h5 class="font-bold mb-2">
                <a href="{{ route('profile', $tweet->user) }}">
                    {{ $tweet->user->name }}
                </a>
            </h5>

            <p class="text-sm mb-2">
                {{ $tweet->body }}
            </p>

            @auth
                <x-like-dislike-button :tweet="$tweet" />
            @endauth

        </div>
    </div>
