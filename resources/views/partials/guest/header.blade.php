<header id="header" id="home" class="{{ Request::is('login', 'register') ? 'header-scrolled' : '' }}">
    <div class="container">
        <div class="row align-items-center justify-content-between d-flex">
            <div id="logo">
                <a href="/"><img src="/dist/pages/guest/img/logo.png" alt="" title="" /></a>
            </div>
            <nav id="nav-menu-container">
                <ul class="nav-menu">
                    <li><a href="#home">Home</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#coffee">Coffee</a></li>
                    <li><a href="#review">Review</a></li>
                    <li><a href="#blog">Blog</a></li>
                    <li><a href="#">Career</a></li>
                    @auth
                        <li class="menu-has-children">
                            <a href="">
                                <span class="align-middle mr-1" data-feather="user"
                                    style="height: 12px; width: 12px;"></span>
                                {{ auth()->user()->name }}
                            </a>
                            <ul>
                                @canany(['superadmin', 'admin'])
                                    <li>
                                        <a href="/dashboard">
                                            <span class="align-middle mr-1" data-feather="monitor"
                                                style="height: 12px; width: 12px;"></span>
                                            Dashboard
                                        </a>
                                    </li>
                                @endcanany
                                <li>
                                    <form action="/logout" method="POST">
                                        @csrf

                                        <button type="submit" class="text-decoration-none border-0 bg-transparent">
                                            <span class="align-middle mr-1" data-feather="log-out"
                                                style="height: 12px; width: 12px;"></span>
                                            Logout
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endauth
                </ul>
            </nav>
        </div>
    </div>
</header>
