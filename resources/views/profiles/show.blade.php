<x-app>
    <x-profile-header :user="$user"/>
    @include('_timeline',['tweets'=>$tweets])
    {{$tweets->links()}}
    @include('notify::messages')
</x-app>
