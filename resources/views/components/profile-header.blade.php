<header class="mb-4 relative">
    <div class="relative">
        <img src="{{ $user->cover }}" alt="" onclick="displayImg(this)" class="cover myImg mb-2">
        <img src="{{ $user->avatar }}" onclick="displayImg(this)" alt=""
            class="avatar myImg w-h-150 mr-2 absolute bottom-0 transform -translate-x-1/2 translate-y-1/2" style="left: 50%">
            <div id="myModal" class="modal">
                <span class="close">&times;</span>
                <img class="modal-content" id="img01">
              </div>                  
    </div>
    <div class="flex justify-between items-center mb-2">
        <div style="max-width: 270px">
            <h2 class="font-bold text-2xl">{{ $user->name }}</h2>
            <p class="text-m text-gray-500">{{'@'.$user->username }}</p>
            <p class="text-sm text-gray-500">Joined {{ $user->created_at->diffForHumans() }}</p>
            <div class="flex">
            <a href="/profiles/{{$user->username}}/following" class="flex profile-lnk text-sm text-gray-500 pr-2"><p class="font-bold text-gray-100 pr-1">{{$user->follows->count()}}</p> Following</a>
            <a href="/profiles/{{$user->username}}/followers" class="flex profile-lnk text-sm text-gray-500"><p class="font-bold text-gray-100 pr-1">{{$user->followers()->count()}}</p> Followers</a>
            </div>
        </div>
        <div class="flex">
            @can('edit', $user)
                <a href="/profiles/{{ $user->username }}/edit"
                    class="thinborder-gray rounded-full py-2 px-4 text-xs hover:bg-gray-800 mr-2">Edit Profile
                </a>
            @endcan
            <x-follow-button :user="$user"></x-follow-button>
        </div>
    </div>
    <p class="text-sm">
        {{$user->description}}
    </p>
    <a href="/profiles/{{$user->username}}" class="block mt-2 text-lg font-bold hover:text-gray-500">Tweets</a>
</header>