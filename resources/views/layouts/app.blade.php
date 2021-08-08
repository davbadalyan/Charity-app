<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta property="og:type" content="website">
    <meta property="og:title" content="">
    <meta property="description" content="">
    <meta property="og:description" content="">
    <meta property="og:url" content="https://new-armenia.org/">
    <meta property="og:site_name" content="New Armenia">
    <meta property="og:image" content="">
    <meta property="og:image:secure_url" content="">
    <meta name="theme-color" content="#FF6300">

    <!-- Bootstrap CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    @stack('css')
    <link href="{{ asset('fontawesome/css/all.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/index.css') }}">

    <title>@yield('title', "New Armenia")</title>
</head>

<body>
    <div class="backdrop"></div>

    <div class="menu-window">
        <ul class="menu-list-mobile">
            <li><a href="{{ route('index') }}">{{ __('navbar.home') }}</a></li>
            <li><a href="{{ route('about') }}">{{ __('navbar.about') }}</a></li>
            <li><a href="{{ route('posts') }}">{{ __('navbar.posts') }}</a></li>
        </ul>
    </div>

    <nav id="menu">
        <div class="logotype-window">
            <a href="{{ route('index') }}">
                <img id="image" src="{{ asset('images/logotype/logo.png') }}" alt="Charity App">
            </a>
        </div>
        <div class="btn-group language-drops">
            <ul class="menu-list">
                <li><a href="{{ route('index') }}">{{ __('navbar.home') }}</a></li>
                <li><a href="{{ route('about') }}">{{ __('navbar.about') }}</a></li>
                <li class="end-line"><a href="{{ route('posts') }}">{{ __('navbar.posts') }}</a></li>
                <li><a href="{{ route('index') }}#account-number"
                        class="dropdown-item">{{ __('navbar.donate') }}</a></li>
                <li class="p-0 ml-1"><a class="dropdown-item"
                        href="{{ route('index') }}#mission">{{ __('navbar.mission') }}</a></li>
                <li class="p-0"><a class="dropdown-item"
                        href="{{ route('index') }}#events">{{ __('navbar.events') }}</a></li>
            </ul>
            <button type="button" class="btn btn-lang-drop dropdown-toggle" data-bs-toggle="dropdown"
                aria-expanded="false">
                {{ $currentLocale['name'] }}
            </button>
            <ul class="dropdown-menu">
                @forelse ($selectableLocales as $key => $l)
                    <li><a class="dropdown-item"
                            href="{{ route('lang.set', ['lang' => $key]) }}">{{ $l['name'] }}</a></li>
                @empty

                @endforelse
            </ul>
            <button class="menu-btn">
                <i class="fas fa-bars"></i>
            </button>
        </div>
    </nav>

    <header>
        <div class="content-window">
            <h2>{{ __('common.home_first') }}</h2>
            <h1>{{ __('common.home_second') }}</h1>
        </div>
        <div id="headerCarousel" class="image-window carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                @forelse ($mainSliderImages as $i => $image)
                    <div class="carousel-item {{ $i === 0 ? 'active' : '' }}">
                        <img class="courusel-image d-block w-100" src="{{ $image->getUrl() }}" alt="">
                    </div>
                @empty
                    <div class="carousel-item active">
                        <img class="courusel-image d-block w-100" src="{{ asset('/images/header/main.png') }}"
                            alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="courusel-image d-block w-100"
                            src="https://media.istockphoto.com/photos/yerevan-capital-of-armenia-and-the-mount-ararat-picture-id627744150?k=6&m=627744150&s=612x612&w=0&h=6IIzYfZdjVRlP3oz7Zgxj5W8JO1a3rhpksY22XmLH_E="
                            alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="courusel-image d-block w-100"
                            src="https://cdn.pixabay.com/photo/2015/04/23/22/00/tree-736885__480.jpg" alt="Third slide">
                    </div>
                @endforelse
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#headerCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#headerCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </header>

    @yield('content')

    <!-- Footer -->
    <footer class="text-center text-lg-start bg-light text-muted">
        <!-- Section: Social media -->
        <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
            <!-- Left -->
            <div class="me-5 d-none d-lg-block">
                <span>{{ __('footer.social') }}</span>
            </div>
            <!-- Left -->

            <!-- Right -->
            <div>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-google"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-linkedin"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-github"></i>
                </a>
            </div>
            <!-- Right -->
        </section>
        <!-- Section: Social media -->

        <!-- Section: Links  -->
        <section class="">
            <div class="container text-center text-md-start mt-5">
                <!-- Grid row -->
                <div class="row mt-3">
                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                        <!-- Content -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            <i class="fas fa-gem me-3"></i>{{ __('footer.company_name') }}
                        </h6>
                        <p>{{ __('footer.footer_content') }}</p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            {{ __('footer.products') }}
                        </h6>
                        <p>
                            <a href="#!" class="text-reset">Angular</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">React</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Vue</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Laravel</a>
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            {{ __('footer.useful_links') }}
                        </h6>
                        <p>
                            <a href="#!" class="text-reset">{{ __('footer.pricing') }}</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">{{ __('footer.settings') }}</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">{{ __('footer.orders') }}</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">{{ __('footer.help') }}</a>
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            {{ __('footer.contact') }}
                        </h6>
                        <p><i class="fas fa-home me-3"></i> New York, NY 10012, US</p>
                        <p>
                            <a href="mailto:info@charity.app">
                                <i class="fas fa-envelope me-3"></i>
                                info@example.com
                            </a>
                        </p>
                        <p><i class="fas fa-phone me-3"></i> + 01 234 567 88</p>
                        <p><i class="fas fa-print me-3"></i> + 01 234 567 89</p>
                    </div>
                    <!-- Grid column -->
                </div>
                <!-- Grid row -->
            </div>
        </section>
        <!-- Section: Links  -->

        <!-- Copyright -->
        <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
            © {{ date('Y') }} Copyright:
            <a class="text-reset fw-bold" href="#">Charity App</a>
        </div>
        <!-- Copyright -->
    </footer>


    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/popper.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/menu/menu.js') }}" type="module"></script>
    @stack('js')
</body>

</html>
