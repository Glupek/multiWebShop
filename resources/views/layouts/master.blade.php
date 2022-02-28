<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>{{ config('app.name', 'RetroDreams') }}</title>
        <script src="{{ asset('js/app.js') }}" defer></script>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/font-awesome.css')}}" rel="stylesheet" type="text/css" /> 
        
    </head>
    <body class="antialiased">
        <header>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
              
                <a class="navbar-brand" href="/">RetroDreams</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
              
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                      <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                    </li>
                  
                    <li class="nav-item">
                      <a class="nav-link" href="/Nintendo">Nintendo</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="/Sega">Sega</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="/Playstation">Playstation</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="/Xbox">Xbox</a>
                    </li>
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Overige
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/products">games</a>
                        <a class="dropdown-item" href="/Figurines">Figurines</a>
                        
                    </li>
                    
                  </ul>
                 
                
                  
                   <!-- Right Side Of Navbar -->
                   <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a href="{{ url('/cart') }}">
                      <i class="fa fa-shopping-cart"></i>
                       Cart ({{ \Gloudemans\Shoppingcart\Facades\Cart::content()->count() }})</a></li>
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                              <a class="dropdown-item" href="/admin/dashboard">Dashboard</a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>

                        </li>
                    @endguest
                </ul>
                </div>
              </nav>
        </header>
        <main>
            @yield('content')
           </main>
           <footer id="footer">
            <div class="text-center">
                <p>&copy; 2021 by moi</p>
            </div>
        </footer>
        <script src="plugins/jquery/jquery.min.js"></script>

    </body>
</html>