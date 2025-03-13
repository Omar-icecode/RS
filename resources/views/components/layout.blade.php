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
<body class="container-lg p-3">
    <div
    class="container-fluid bg-primary p-2 text-center text-white position-sticky  z-index-1 top-0"
  >
    <h2><a href="/" class="text-white">Referral System</a></h2>
  </div>
  @if(session()->has('message'))
    <div class="alert alert-info  w-50 m-auto">
      {{session('message')}}
    </div>
  @endif 

  
  @if ($errors->has('*'))
<div class="alert alert-danger w-50 m-auto">
    <strong>Request Unsuccessful!</strong>
</div>
@endif
    {{$slot}}
</body>
</html>