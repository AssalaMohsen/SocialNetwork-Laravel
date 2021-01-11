<x-app>
    @include('notify::messages')   
    @include('_publish-tweet-panel')
    @include('_timeline')
    {{ $tweets->links() }}
</x-app>
