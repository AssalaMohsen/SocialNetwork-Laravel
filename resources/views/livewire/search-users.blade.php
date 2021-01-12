<div class="relative text-gray-800" style="width: 250px">
    <input
        type="text"
        class="w-full form-input"
        placeholder="Search users..."
        wire:model="query"
        wire:keydown.escape="incrementHighlight"
        wire:keydown.tab="reset"
        wire:keydown.arrow-up="decrementHighlight"
        wire:keydown.arrow-down="incrementHighlight"
        wire:keydown.enter="selectContact"
    />

    @if(!empty($query))
    <div class="fixed top-0 right-0 bottom-0 left-0" wire:click="reset"></div>

    <div class="absolute z-10 p-0 list-group bg-white w-full form-input rounded shadow-lg">
            @if(!empty($users))
                @foreach($users as $i => $user)
                <div class="m-0 p-2 {{ $highlightIndex === $i ? 'bg-gray-500' : '' }}">
                    <a href="/profiles/{{$user->username}}" class="flex items-center text-sm"><img src="{{$user->avatar}}"  alt="" class="avatar w-h-30 mr-2"/>{{ $user->name }}</a>
                </div>
                @endforeach
            @else
                <div class="group-list-item">No results!</div>
            @endif
        </div>
    @endif
</div>
