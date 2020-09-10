<header class="site-navbar" role="banner">
    <div class="site-navbar-top">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-6 col-md-4 order-2 order-md-1 site-search-icon text-left">
                    <form action="" class="site-block-top-search">
                        <span class="icon icon-search2"></span>
                        <input type="text" class="form-control border-0" placeholder="Search">
                    </form>
                </div>

                <div class="col-12 mb-3 mb-md-0 col-md-4 order-1 order-md-2 text-center">
                    <div class="site-logo">
                        <a href="index.html" class="js-logo-clone">Shoppers</a>
                    </div>
                </div>

                <div class="col-6 col-md-4 order-3 order-md-3 text-right">
                    <div class="site-top-icons">
                        <ul>
                            <li><a href="#"><span class="icon icon-person"></span></a></li>
                            <li><a href="#"><span class="icon icon-heart-o"></span></a></li>
                            <li>
                                <a href="{{ route('cart.index') }}" class="site-cart">
                                    <span class="icon icon-shopping_cart"></span>
                                    @auth
                                        <span id="cart_count" class="count">
                                            {{ Cart::session(authUser()->id)->getContent()->count() }}
                                        </span>
                                    @endauth
                                </a>
                            </li>
                            <li class="d-inline-block d-md-none ml-md-0"><a href="#"
                                    class="site-menu-toggle js-menu-toggle"><span class="icon-menu"></span></a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <nav class="site-navigation text-right text-md-center" role="navigation">
        <div class="container">
            <ul class="site-menu js-clone-nav d-none d-md-block">
              @auth
                <li class="has-children">
                    <a href="about.html">{{ authUser()->name }}</a>
                    <ul class="dropdown">
                        <li>
                            <form method="post" action="/logout">
                                @csrf
                                <button>Logout</button>
                            </form>
                        </li>
                    </ul>
                </li>
                @endauth
            </ul>
        </div>
    </nav>
</header>
