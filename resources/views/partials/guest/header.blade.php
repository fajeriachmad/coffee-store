<header id="header" id="home" class="{{ Request::is('login') ? 'header-scrolled' : '' }}">
    <div class="container">
        <div class="row align-items-center justify-content-between d-flex">
            <div id="logo">
                <a href="index.html"><img src="/dist/pages/guest/img/logo.png" alt="" title="" /></a>
            </div>
            <nav id="nav-menu-container">
                <ul class="nav-menu">
                    @if (Request::is('login'))
                        <li><a href="/">Home</a></li>
                    @else
                        <li><a href="#home">Home</a></li>
                        <li><a href="#about">About</a></li>
                        <li><a href="#coffee">Coffee</a></li>
                        <li><a href="#review">Review</a></li>
                        <li><a href="#blog">Blog</a></li>
                    @endif
                    <li><a href="/login">Login</a></li>
                </ul>
            </nav>
        </div>
    </div>
</header>
