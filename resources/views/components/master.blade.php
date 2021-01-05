<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        button:focus {
            outline: none;
        }
    </style>
</head>

<body>
    <div id="app">
        <section class="px-8 py-4 mb-6">
            <header class="container mx-auto">
                <a class="flex" href="/tweets">
                    <img src="/images/logo.ico" alt="TwitterClone" width="32" height="32">
                </a>
            </header>
        </section>
        {{ $slot }}
    </div>
    <script src="http://unpkg.com/turbolinks"></script>
    <script src="http://code.jquery.com/jquery-1.5.js"></script>
    <script>
      function countChar(Text) {
        let length = Text.value.length;
        if (length > 255) {
            Text.value = Text.value.substring(0, 255);
            alert('Tweet must not exceed 255 characters.');
        } else {
          $('#charNum').text(255 - length);
        }
      };

      function displayImg(val){
        // Get the modal
        var modal = document.getElementById("myModal");
        
        // Get the image and insert it inside the modal - use its "alt" text as a caption
        var modalImg = document.getElementById("img01");
        var captionText = document.getElementById("caption");
            console.log("img clicked");
          modal.style.display = "block";
          modalImg.src = val.src;
        
        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];
        
        // When the user clicks on <span> (x), close the modal
        span.onclick = function() { 
          modal.style.display = "none";
        }
    }
        </script>
</body>

</html>
