<x-app>
    <x-profile-header :user="$user"/>
    <hr class="text-gray-800 mb-6">
    <div>
        @forelse ($followings as $following)
        <div class="flex justify-between">
            <a href="/profiles/{{ $following->username }}" class="flex items-center mb-5" style="width: 300px">
                <img src="{{ $following->avatar }}"
                      alt="{{ $following->username }}'s avatar"
                      class="avatar w-h-60 mr-4"
                >

                <div>
                    <h2 class="font-bold">{{$following->name}}</h2>
                    <p class="font-bold text-xs text-gray-500">{{ '@' . $following->username }}</p>
                </div>
            </a>
            <x-follow-button :user="$following"></x-follow-button>
        </div>
        @empty
        <p class="text-sm text-gray-300">No followings yet.</p>
        @endforelse

        {{ $followings->links() }}
    </div>
    @include('notify::messages')
</x-app>