<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">    
    <title>@yield('title')</title>
    
    <link href="/css/app.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:200,400&display=swap" rel="stylesheet">

    <style>
        .work-sans {
            font-family: 'Work Sans', sans-serif;
        }
                
        #menu-toggle:checked + #menu {
            display: block;
        }
        
        .hover\:grow {
            transition: all 0.3s;
            transform: scale(1);
        }
        
        .hover\:grow:hover {
            transform: scale(1.02);
        }
        
    </style>

</head>

<body class="bg-white text-gray-600 work-sans leading-normal text-base tracking-normal">
    
    <nav class="container flex justify-around py-8 mx-auto bg-white">
        <div>
          <h3 class="text-2xl font-medium text-blue-500">Test</h3>
        </div>
        <div class="space-x-8">
          @auth('web')
           <a href="{{ route('customers') }}">Customers</a>
           <a href="{{ route('properties') }}">Properties</a>
           <a href="{{ route('logout') }}">Logout</a>

          @endauth
        </div>
    </nav>
        
    @yield('content')


</body>

</html>
