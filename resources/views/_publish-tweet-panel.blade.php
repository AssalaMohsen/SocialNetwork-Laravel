<div class="thinborder-lightgray rounded-lg px-8 py-6 mb-8">
    <form method="POST" action="/tweets"  enctype="multipart/form-data">
        @csrf
        <textarea name="body" style="outline: none" class="w-full" onkeyup="countChar(this)" placeholder="What's up doc?" required></textarea>
        <button type="button"><i class="fa fa-file-image-o hover:text-gray-500 mb-3" style="font-size:24px" onClick="triggerClick(this,'#attached')"></i></button>
        <img src="" alt="" class="rounded-lg"
                style="display:none;width: 100px;height:100px;object-fit:cover;" id="attached-img">
        <input class="thinborder-gray p-2 w-full" type="file" name="attached" id="attached" onChange="displayImage(this,'#attached-img')"
                    accept="image/*"  style="display: none;">
        <div class="text-xs text-red-600 text-right" id="charNum"></div>
        <hr class="my-3" style="color: rgb(136, 153, 166)">
        <footer class="flex justify-between items-center">
            <img src="{{ auth()->user()->avatar }}" alt="your avatar" class="avatar w-h-50">

            <button type="submit" class="bg-blue-500 hover:bg-blue-600 rounded-lg shadow px-10 text-sm text-white h-10">
                Publish
            </button>
        </footer>
    </form>
    @error('body')
        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
    @enderror
</div>
