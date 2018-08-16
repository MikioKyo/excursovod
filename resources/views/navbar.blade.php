<div style="height: 48px;">
    <nav class="navbar navbar-default" role="navigation" style="margin-bottom: 0px;">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ url('/home') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
        </div>
        @guest
        @else
        <ul class="nav navbar-nav">
            <li><a href="http://voicesofrussia.com/myexcursions">Мои экскурсии</a></li>
        </ul>
        @endguest
        <ul class="nav navbar-nav navbar-right">
            @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Войти') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Зарегистрироваться') }}</a>
                </li>
            @else
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Привет, {{ Auth::user()->name }}! <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        {{ __('Выйти') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>     
            @endguest
        </ul>
    </div>
    </nav>
</div>