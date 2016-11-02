<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="/favicon.ico?" type="image/x-icon">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/app.css">
  </head>
  <body>
    <nav class="navbar navbar-default">
      <div class="container-fluid col-md-8 col-md-offset-2">
        <div class="navbar-header">
          <a href="/"><img src="/img/logo.jpg" class="navbar-brand"></a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
          </ul>
          <ul class="nav navbar-nav navbar-right">
            @if (Auth::guest())
                <li><a href="{{ url('/login') }}" class="nav-item">Login</a></li>
                <li><a href="{{ url('/register') }}" class="nav-item">Registreer</a></li>
            @else
                @if (Auth::user()->isAdmin)
                  <li><a href="{{ url('/administrator') }}" class="nav-item">Adminpaneel</a></li>
                @endif
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        {{ Auth::user()->first_name }} <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="{{ url('/logout') }}"
                                onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>
            @endif
          </ul>
        </div>
      </div>
    </nav>
    @yield('content')
    <footer class="footer">
      <div class="col-md-8 col-md-offset-2">
        <a href="#">Privacy</a>
        <a href="#">Wedstrijdregelement</a>
        <a href="#">Disclaimer</a>
        <a href="#">Cookies</a>
      </div>
    </footer>
    <script src="/js/jquery-3.1.1.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
  </body>
</html>