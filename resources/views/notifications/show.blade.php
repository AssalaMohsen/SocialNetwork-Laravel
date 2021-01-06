<x-app>
    <div class="thinborder-gray rounded-lg">
        @forelse ($notifications as $notification)
            <div class="flex p-4 {{ $loop->last ? '' : 'thinborder-gray-bottom' }}">
                @if ($notification->type === 'App\Notifications\FollowNotification')
                    <div class="mr-1 flex-shrink-0">
                        <a href="/profiles/{{ $notification->data['user']['username'] }}">
                            <img src="{{ $notification->data['user']['avatar'] }}" alt="" class="avatar w-h-50 mr-2">
                        </a>
                    </div>
                    <div class="tweet">
                        <h5 class="flex pt-3">
                            <a class="font-bold profile-lnk" href="/profiles/{{ $notification->data['user']['username'] }}">
                                {{ $notification->data['user']['name'] }}
                            </a>
                            <p class="text-m ml-2"> is now following you.</p>
                        </h5>
                    </div>
                @endif
                @if ($notification->type === 'App\Notifications\LikeNotification')
                    <div class="mr-1 flex-shrink-0">
                        <a href="/profiles/{{ $notification->data['user']['username'] }}">
                            <img src="{{ $notification->data['user']['avatar'] }}" alt="" class="avatar w-h-50 mr-2">
                        </a>
                    </div>
                    <div class="tweet">
                        <h5 class="flex pt-3">
                            <a class="font-bold profile-lnk" href="/profiles/{{ $notification->data['user']['username'] }}">
                                {{ $notification->data['user']['name'] }}
                            </a>
                            <p class="text-m ml-2"> likes your <a class="profile-lnk ml-1" href="/tweets/{{ $notification->data['tweet']['id'] }}">tweet</a></p>
                        </h5>
                    </div>
                @endif
                @if ($notification->type === 'App\Notifications\DislikeNotification')
                <div class="mr-1 flex-shrink-0">
                    <a href="/profiles/{{ $notification->data['user']['username'] }}">
                        <img src="{{ $notification->data['user']['avatar'] }}" alt="" class="avatar w-h-50 mr-2">
                    </a>
                </div>
                <div class="tweet">
                    <h5 class="flex pt-3">
                        <a class="font-bold profile-lnk" href="/profiles/{{ $notification->data['user']['username'] }}">
                            {{ $notification->data['user']['name'] }}
                        </a>
                        <p class="text-m ml-2"> dislikes your <a class="profile-lnk ml-1" href="/tweets/{{ $notification->data['tweet']['id'] }}">tweet</a></p>
                    </h5>
                </div>
                @endif
            </div>
        @empty
            <p class="p-4">
                You have no unread notifications at this time.
            </p>
        @endforelse
    </div>
</x-app>
