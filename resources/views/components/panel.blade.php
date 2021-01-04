<div class="thinborder-gray px-12 py-8 rounded-lg" style="background-color:  rgb(21, 32, 43);">
    @if (isset($heading))
        <div class="font-bold text-lg mb-4">{{ $heading }}</div>
    @endif

    {{ $slot }}
</div>
