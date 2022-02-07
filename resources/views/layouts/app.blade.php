<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Met Store</title>
         <!-- custom css -->
         <link rel="stylesheet" href="{{asset('css/custom-style.css')}}" media="all">
         <!-- bootstrap css -->
         <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
         <!-- font awesome css -->
         <link rel="stylesheet" href="{{asset('css/all.css')}}">
         <!-- app css -->
         <link rel="stylesheet" href="{{asset('css/app.css')}}">
    </head>
    <body class="antialiased">
       <!-- include navbar -->
       @include('nav.navbar')
       <!-- bootstrap container -->
       <div class="container">
        <!-- success and error message will be displayed -->
       @include('message.messages')
       @yield('content')
       </div>
       <!-- jquery  --> 
       <script src="{{asset('js/jquery-3.3.1.js')}}"></script>  
       <!-- bootstrap js  --> 
       <script src="{{asset('js/bootstrap.min.js')}}"></script>  
       <!-- font awesome js  --> 
       <script src="{{asset('js/all.js')}}"></script>
        <!-- app js  --> 
        <script src="{{asset('js/app.js')}}"></script>    
        <!-- app stripe js -->
        <script src="{{asset('js/app-stripe.js')}}"></script>
        <!-- toogle js -->
        <script src="{{asset('js/toggle.js')}}"></script>
    </body>
</html>
