
{{-- master pages --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
     <link rel="stylesheet" href="{{ mix('/css/theme.css') }}">
     <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="nav navbar-nav">
            <a class="nav-item nav-link active"href="{{ route('home') }}">Home <span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link" href="{{ route('about') }}">about</a>
            <a class="nav-item nav-link" href="{{ route('Post.create') }}">new post</a>
        </div>
    </nav>
    
<x-alert> </x-alert>
  <div class="container my-5">
{{-- yield  sert à appeler la section --}}

    @yield('section')  

            </div>
      
    <script src="{{ mix('/js/app.js') }}"></script>
</body>
</html>