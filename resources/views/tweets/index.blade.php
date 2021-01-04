<x-app>
    @include('_publish-tweet-panel')
    @include('_timeline')
    {{$tweets->links()}}
</x-app>
