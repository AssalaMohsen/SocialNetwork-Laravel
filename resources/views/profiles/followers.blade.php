<x-app>
    <x-profile-header :user="$user"/>
    <hr class="text-gray-800 mb-6">
    <div>
        @forelse ($followers as $follower)
        <div class="flex justify-between">
            <a href="/profiles/{{ $follower->username }}" class="flex items-center mb-5" style="width: 300px">
                <img src="{{ $follower->avatar }}"
                      alt="{{ $follower->username }}'s avatar"
                      class="avatar w-h-60 mr-4"
                >

                <div>
                    <h2 class="font-bold">{{$follower->name}}</h2>
                    <p class="font-bold text-xs text-gray-500">{{ '@' . $follower->username }}</p>
                </div>
            </a>
            <x-follow-button :user="$follower"></x-follow-button>
        </div>
        @empty
        <p class="text-sm text-gray-300">No followers yet.</p>
        @endforelse

        {{ $followers->links() }}
    </div>
    @include('notify::messages')
</x-app>