<div>
    <div class="form-group">
        <input wire:model="search" class="thinborder-gray rounded p-2" type="text" style="outline: none;"
            placeholder="Search by username" />

            <ul>
                @foreach ($users as $user)
                    <li><a href="/profiles/{{$user->username}}" class="flex items-center text-sm mt-2"><img src="{{$user->avatar}}"  alt="" class="avatar w-h-40 mr-2"/>{{ $user->name }}</a></li>
                @endforeach
            </ul>
    </div>
</div>
