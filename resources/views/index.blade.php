@extends("layouts.app")

@section('content')

    <section class="container-fluid container-is-padding">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-7 col-lg-5">
                <div class="post-info">
                    <h6>Services</h6>
                    <h1>You Can Help The Poor Through Us</h1>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui quia Laboriosam libero ipsa velit
                        omnis. Laboriosam quae sint.
                    </p>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-5 col-lg-7">
                <div class="slick-window">
                    <div class="about-as-slick">
                        <div>
                            <div class="post-item">
                                <div class="post-item-content">
                                    <h1 class="post-item-name">Give Donation</h1>
                                    <p class="post-item-text">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elitsed do eiusmod tempor
                                        incididun labore voluptatem accusantium.
                                    </p>
                                    <button class="post-item-button" data-bs-toggle="modal"
                                        data-bs-target="#services-modal">
                                        Button <i class="fas fa-plus"></i></button>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="post-item">
                                <div class="post-item-content">
                                    <h1 class="post-item-name">Join as member</h1>
                                    <p class="post-item-text">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elitsed do eiusmod tempor
                                        incididun labore voluptatem accusantium.
                                    </p>
                                    <button class="post-item-button" data-bs-toggle="modal"
                                        data-bs-target="#services-modal">
                                        Button <i class="fas fa-plus"></i></button>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="post-item">
                                <div class="post-item-content">
                                    <h1 class="post-item-name">Become Volunteer</h1>
                                    <p class="post-item-text">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elitsed do eiusmod tempor
                                        incididun labore voluptatem accusantium.
                                    </p>
                                    <button class="post-item-button" data-bs-toggle="modal"
                                        data-bs-target="#services-modal">
                                        Button <i class="fas fa-plus"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include("includes.posts", compact('posts'))
    @include("includes.events", compact('activeEvents'))
    @include("includes.account")
    @include("includes.mission")

    @include("includes.modals")

@endsection

@push('js')
    <script src="{{ asset('slick/slick.min.js') }}"></script>

    <script>
        $('.about-as-slick').slick({
            infinite: true,
            autoplay: true,
            arrows: false,
            dots: true,
            slidesToShow: 3,
            slidesToScroll: 3,
            responsive: [{
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 576,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });
        $('.event-slider').slick({
            infinite: true,
            autoplay: true,
            arrows: true,
            dots: true,
            slidesToShow: 2,
            slidesToScroll: 2,
            responsive: [{
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 576,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });
    </script>
@endpush

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('slick/slick.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('slick/slick-theme.css') }}" />
@endpush
