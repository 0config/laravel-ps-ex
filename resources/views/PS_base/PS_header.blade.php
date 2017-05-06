<div class="navbar navbar-default  ">
    <div class="container">
        <div class="navbar-header">
            <a href="/" class="navbar-brand">
                Your Logo Here
            </a>
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main"
                    onclick="console.log('clicked');" id="mobile_menu_btn">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="navbar-collapse collapse" id="navbar-main">
            <ul class="nav navbar-nav navbar-left">
                <li class="active"><a href="#">About us <span class="sr-only">(current)</span></a></li>
                <li><a href="#">Services </a></li>
                <li><a href="#">Contact us</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">

                @if (Auth::guest())
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endif
                {{--<li class=""><a href="/login">Log in </a></li>--}}
                {{--<li><a href="/register">Register</a></li>--}}
            </ul>
        </div>
    </div>
</div>