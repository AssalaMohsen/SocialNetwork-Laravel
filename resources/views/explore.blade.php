<x-app>
    <div>
        @foreach ($users as $user)
        <div class="flex justify-between">
            <a href="/profiles/{{ $user->username }}" class="flex items-center mb-5" style="width: 300px">
                <img src="{{ $user->avatar }}"
                      alt="{{ $user->username }}'s avatar"
                      class="avatar w-h-60 mr-4"
                >

                <div>
                    <h4 class="font-bold">{{ '@' . $user->username }}</h4>
                </div>
            </a>
            <x-follow-button :user="$user"></x-follow-button>
        </div>
        @endforeach

        {{ $users->links() }}
    </div>
</x-app>