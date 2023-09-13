<!DOCTYPE html>
<html>
<head>
    <title>Contact Laravel 8 </title>
    <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!--=============== FAVICON ===============-->
        <link rel="shortcut icon" href="{{asset('admin/img/favicon.png')}}"type="image/x-icon">

        <!--=============== BOXICONS ===============-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

        <!--=============== SWIPER CSS ===============--> 
        <link rel="stylesheet" href="{{asset('admin/css/swiper-bundle.min.css')}}">

        <!--=============== CSS ===============-->
        <link rel="stylesheet" href="{{asset('admin/css/styles.css')}}">

    @livewireStyles
</head>


<body>
  

@livewireScripts
@livewire('watch')
 <!--=============== SWIPER JS ===============-->
 <script src="{{asset('admin/js/swiper-bundle.min.js')}}"></script>

<!--=============== MAIN JS ===============-->
<script src="{{asset('admin/js/main.js')}}"></script>
<script src="{{asset('admin/js/jquery-3.6.4.min.js')}}"></script>
<script src="{{asset('admin/js/watch.js')}}"></script>

</body>
</html>