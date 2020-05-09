<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Cannoo')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/customStyle.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Icon -->
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ route('home.index') }}">
                    <img src="{{ asset('images/logo.png') }}" style="height:80px;">  
                </a>
                
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
           
                <div class="collapse navbar-collapse" id="navbarNav">

                    <ul class="navbar-nav ml-auto"> 

                        @guest
                            <li class="nav-item ">
                                <a class="nav-link" href="{{ route('login') }}">@lang('messages.login')</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">@lang('messages.register')</a>
                                </li>
                            @endif
                        @else
                            

                            @if (Auth::user()->role == 'client')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('contact.index') }}">@lang('messages.contact')</a>
                            </li>
                            @endif

                            @if (Auth::user()->role == 'admin')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('contact.messages') }}">@lang('messages.messages')</a>
                            </li>
                            @endif

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">@lang('messages.products')</a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('product.show') }}">@lang('messages.showProducts')</a>
                                @if (Auth::user()->role == 'admin')
                                    <a class="dropdown-item" href="{{ route('product.create') }}">@lang('messages.createProduct')</a>
                                @endif
                            </li>

                            @if (Auth::user()->role == 'admin')
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">@lang('messages.clients')</a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('client.show') }}">@lang('messages.showClients')</a>
                                </li>
                            @endif

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">@lang('messages.certificates')</a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('certificate.show') }}">@lang('messages.showCert')</a>
                                @if (Auth::user()->role == 'admin')
                                    <a class="dropdown-item" href="{{ route('certificate.create') }}">@lang('messages.createCert')</a>
                                @endif
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">@lang('messages.pets')</a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('animal.show') }}">@lang('messages.showPets')</a>
                                @if (Auth::user()->role == 'admin')
                                    <a class="dropdown-item" href="{{ route('animal.create') }}">@lang('messages.addPet')</a>
                                @endif
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">@lang('messages.top5')</a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('top5.animals') }}">@lang('messages.animals')</a>
                                <a class="dropdown-item" href="{{ route('top5.products') }}">@lang('messages.products')</a>
                            </li>

                           

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" > 
                                    
                                    <a class="nav-link disabled" > <img src="{{ asset('images/weather.png') }}" style="height:25px;"> {{ Session::get('city') }} {{ Session::get('temp') }} °C</a>
                                    @if (Auth::user()->role != 'admin')
                                        <a class="nav-link disabled" > <img src="{{ asset('images/coin.png') }}" style="height:25px;"> {{ Auth::user()->getCredits() }} </a>
                                        <a class="dropdown-item" href="{{ route('order.show') }}">@lang('messages.viewOrders')</a>
                                        <a class="dropdown-item" href="{{ route('order.index') }}">@lang('messages.shoppingCart')</a> 
                                    @endif
                                        
                                    
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();" >
                                        @lang('messages.logout')
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul> 
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</html>

