<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top" >
    <div class="container-fluid">
        <div class="container">
            <a style="margin-left:50px;" class="navbar-brand" href="/">
                <img src="{{asset('images/logo.png')}}" alt="" width="80" height="50">
            </a>
        </div> <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse"  id="navbarNav">
            <ul class="navbar-nav" style="align-items:center;">
                <li class="nav-item">
                    <a class="nav-link {{request()->is('/') ? 'active' : ''}}" aria-current="page" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{request()->is('category') ? 'active' : ''}}" href="/category">Shop</a>
                </li>
                
                

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
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{request()->is('cart') ? 'active' : ''}}" href="/cart"><img style="width:50px;height:40px;" src="{{asset('images/cart.png')}}"></a>
                </li>
                @endguest




            </ul>
        </div>
    </div>
</nav>