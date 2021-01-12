    <div class="flex p-4 {{ $loop->last ? '' : 'thinborder-gray-bottom' }}">
        <div class="mr-2 flex-shrink-0">
            <a href="{{ route('profile', $tweet->user) }}">
                <img src="{{ $tweet->user->avatar }}" alt="" class="avatar w-h-50 mr-2">
            </a>
        </div>

        <div class="tweet">
            <h5 class="flex justify-between font-bold mb-2">
                <a href="{{ route('profile', $tweet->user) }}">
                    {{ $tweet->user->name }}
                </a>
                @if($tweet->user->is(auth()->user()))
                @auth
                    <x-delete-button :tweet="$tweet" />
                @endauth
                @endif
            </h5>

            <p class="text-sm mb-2">
                {{ $tweet->body }}
            </p>
            @if ($tweet->attached)
            <div class="flex">
                <img src="{{ $tweet->attached }}" alt="" onclick="displayImg(this)" class="rounded-lg myImg mb-2"
                style="width: 600px;height:400px;object-fit:cover;">
                <div id="myModal" class="modal">
                    <span class="close">&times;</span>
                    <img class="modal-content" id="img01">
                  </div>    
            </div>
            @endif
            

            @auth
                @livewire('like-dislike-tweet', ['tweet' => $tweet])
            @endauth

        </div>
    </div>
