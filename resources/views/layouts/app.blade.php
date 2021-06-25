<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    @stack('css')
    <link href="{{ asset('fontawesome/css/all.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/index.css') }}">

    <title>@yield('title', "Charity App")</title>
</head>

<body>
    <div class="backdrop"></div>

    <div class="menu-window">
        <ul class="menu-list-mobile">
            <li><a href="{{ route('index') }}">Home</a></li>
            <li><a href="{{ route('about') }}">About</a></li>
            <li><a href="{{ route('posts') }}">Posts</a></li>
        </ul>
    </div>

    <nav id="menu">
        <div class="logotype-window">
            <a href="index.html">
                <img id="image" src="{{ asset('images/logotype/logo.png') }}" alt="Charity App">
            </a>
        </div>
        <div class="btn-group language-drops">
            <ul class="menu-list">
                <li><a href="{{ route('index') }}">Home</a></li>
                <li><a href="{{ route('about') }}">About</a></li>
                <li class="end-line"><a href="{{ route('posts') }}">Posts</a></li>
                <li><a href="#account-number" class="dropdown-item">Donate</a></li>
                <li class="p-0 ml-1"><a class="dropdown-item" href="#mission">Mission</a></li>
                <li class="p-0"><a class="dropdown-item" href="#events">Events</a></li>
            </ul>
            <button type="button" class="btn btn-lang-drop dropdown-toggle" data-bs-toggle="dropdown"
                aria-expanded="false">
                ENG
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Рус</a></li>
                <li><a class="dropdown-item" href="#">Հայ</a></li>
            </ul>
            <button class="menu-btn">
                <i class="fas fa-bars"></i>
            </button>
        </div>
    </nav>

    <header>
        <div class="content-window">
            <h2>Haruma</h2>
            <h1>
                He Who Has No Charity In Life No Mercy
            </h1>
        </div>
        <div id="headerCarousel" class="image-window carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="courusel-image d-block w-100" src="./images/header/main.png" alt="First slide">
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
                <span>Get connected with us on social networks:</span>
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
                            <i class="fas fa-gem me-3"></i>Company name
                        </h6>
                        <p>
                            Here you can use rows and columns to organize your footer content. Lorem ipsum
                            dolor sit amet, consectetur adipisicing elit.
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            Products
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
                            Useful links
                        </h6>
                        <p>
                            <a href="#!" class="text-reset">Pricing</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Settings</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Orders</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Help</a>
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            Contact
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
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}."></script>
    <script src="{{ asset('js/menu/menu.js') }}" type="module"></script>
    @stack('js')
</body>

</html>
