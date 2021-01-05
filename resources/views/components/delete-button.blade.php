<div class="flex">
    <form method="POST" action="/tweets/{{ $tweet->id }}/delete">
        @csrf
        @method('DELETE')
        
        <div>
            <button type="submit">
                <i class="fa fa-trash-o text-gray-500 trash"></i>
            </button>
        </div>
    </form>
</div>