<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
    integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer"
/>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body class="container-lg p-3 ">
  <div
    class="container-fluid bg-primary p-2 text-center text-white position-sticky  z-index-1 top-0 d-flex gap-2 justify-content-center align-items-center"
  >
    <h2 class="m-0"><a href="/" class="text-white">Easy Client RS</a></h2>
    <img src="{{asset('images/ecrslight.png')}}" class='border rounded p-1' width="60" alt="">

    @auth
    <p class="text-uppercase position-absolute end-0 bottom-0 me-3 d-none d-md-block"><strong>welcome {{auth()->user()->username}}</strong></p>
    @endauth
  </div>
  
  <div class="container position-relative">
    @if(session()->has('message'))
    <div class="bg-info text-white p-2 position-absolute end-0" id="alert">
      {{session('message')}}
    </div>
    @endif 
  </div>

  <div class="container position-relative">
    @if ($errors->has('*'))
    <div class="bg-danger text-white p-2 position-absolute end-0" id="alert">
      Unsuccessful Request !
    </div>
    @endif
</div>


    {{$slot}}
</body>
</html>