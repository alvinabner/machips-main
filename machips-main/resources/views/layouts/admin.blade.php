<!DOCTYPE html>
<html>
    <head>
        <title>@yield('title') | Machips</title>
        <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('css/bootstrap-icons.css')}}">
        <script src="{{ asset('js/bootstrap.bundle.min.js')}}"></script>
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{ asset('css/main.css') }}">
        <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    </head>
    <style>
      .mr-5{
        margin-right: 30px;
      }
    </style>
    <body>
        <header>
            <nav class="navbar navbar-expand-lg navbar-light">

              <span><img class="navbar-brand" src="{{ asset('assets/inovtek-highres.png')}}" width="80px" style="margin-right:0px;"></span>
              <h1 class="mr-5">Maharani Chips</h1>

                <div class="header-container collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                      @auth('user')
                        @if (Auth::guard('user')->user()->role == 'admin')
                          <li class="nav-item dropdown mr-5">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                              <h1>Home</h1>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                              <li><a class="dropdown-item" href="{{ route('dashboard.index') }}"><h1>Dashboard</h1></a></li>
                              <li><a class="dropdown-item" href="{{ route('todoPesanan') }}"><h1>Pesanan</h1></a></li>
                            </ul>
                          </li>
                          <li class="nav-item mr-5">
                            <a class="nav-link" href="{{ route('category.product') }}"><h1> Menu</h1></a>
                          </li>
                          <li class="nav-item mr-5">
                            <a class="nav-link" href="{{ route('auth.edit', [Auth::guard('user')->user()->id]) }}"><h1> Profil</h1></a>
                          </li>
                          <li class="nav-item mr-5">
                            <a class="nav-link" href="{{ route('chat.index') }}"><h1> Chat</h1></a>
                          </li>
                          <li class="nav-item dropdown mr-5">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                              <h1>Product</h1>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                              <li><a class="dropdown-item" href="{{ route('category.index') }}"><h1>Category</h1></a></li>
                              <li><a class="dropdown-item" href="{{ route('product.index') }}"><h1>Product</h1></a></li>
                            </ul>
                          </li>
                          <li class="nav-item mr-5">
                            <a class="nav-link" href="{{ route('auth.create') }}"><h1> Register</h1></a>
                          </li>
                          <li class="nav-item mr-5">
                            <a class="nav-link" href="{{ route('auth.logout') }}"><h1> Logout</h1></a>
                          </li>
                        @elseif (Auth::guard('user')->user()->role == 'user')
                          <li class="nav-item mr-5">
                            <a class="nav-link" href="{{ route('category.product') }}"><h1> Home</h1> <span class="sr-only">(current)</span></a>
                          </li>
                          <li class="nav-item mr-5">
                            <a class="nav-link" href="{{ route('category.product') }}"><h1> Menu</h1></a>
                          </li>
                          <li class="nav-item mr-5">
                            <a class="nav-link" href="{{ route('chat.index') }}"><h1> Chat</h1></a>
                          </li>
                          <li class="nav-item mr-5">
                            <a class="nav-link" href="{{ route('sale.index') }}"><h1> Keranjang</h1></a>
                          </li>
                          <li class="nav-item mr-5">
                            <a class="nav-link" href="{{ route('todoPesananSaya') }}"><h1> Pesanan Saya</h1></a>
                          </li>
                          <li class="nav-item mr-5">
                            <a class="nav-link" href="{{ route('auth.logout') }}"><h1> Logout</h1></a>
                          </li>
                        @endif
                      @else
                        <li class="nav-item mr-5">
                          <a class="nav-link" href="{{ route('auth.index') }}"><h1> Login</h1> <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item mr-5">
                          <a class="nav-link" href="{{ route('auth.create') }}"><h1> Register</h1></a>
                        </li>
                      @endauth
                    </ul>
                  </div>
                  <form class="mr-5">
                    <input class="form-control mr-sm-2" style="outline: 0;border-width: 0 0 2px;border-color: black" s type="search" placeholder="Search" aria-label="Search">
                    {{-- <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button> --}}
                  </form>
            </nav>
        </header>

        <main>
            @yield('content')
        </main>

    </body>
</html>