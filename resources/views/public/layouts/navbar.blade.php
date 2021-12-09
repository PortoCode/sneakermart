<!-- Main Header -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <a href="{{ route('home.show') }}" class="brand-link">
        <span class="brand-text font-weight-light"><img src="{{asset('images/logos/sneakermart-branco.png')}}" style="max-height:5rem"></span>
    </a>
    <ul class="navbar-nav ml-auto">
        @if(!Auth::user())
            <li class="nav-item">
                <a href="{{ route('login') }}" class="nav-link">Login</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('register') }}" class="nav-link">Crie sua conta</a>
            </li>
        @else
            <li class="nav-item">
                <a href="{{ route('users.show', \Auth::user()->id) }}" class="nav-link">Sua conta</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Deslogar
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        @endif
    </ul>
</nav>