@extends("layouts.app")

@section('content')

    <section class="container-fluid container-is-padding">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-6">
                    <div class="p-i-image-content">
                        <button class="view-slide-buttons prev-view slick-arrow" style="">
                            <i class="fas fa-chevron-left"></i>
                        </button>
                        <button class="view-slide-buttons next-view slick-arrow" style="">
                            <i class="fas fa-chevron-right"></i>
                        </button>

                        <div class="main-viewer">
                            @forelse ($post->getMedia() as $image)
                                <div class="m-i-item">
                                    <img src="{{ $image->getUrl() }}" alt="">
                                </div>
                            @empty

                            @endforelse
                        </div>

                        <div class="slide-viewer">
                            @forelse ($post->getMedia() as $image)
                                <div class="s-i-item">
                                    <img src="{{ $image->getUrl() }}" alt="">
                                </div>
                            @empty

                            @endforelse
                        </div>
                    </div>
                </div>


                <div class="col-12 col-sm-12 col-md-6">
                    <div class="p-i-content">
                        <h1 class="p-i-item-name">
                            {{ $post->title }}
                        </h1>
                        <p>{{ $post->description }}</p>
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

        $('.main-viewer').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: true,
            prevArrow: '.prev-view',
            nextArrow: '.next-view',
            fade: true,
            asNavFor: '.slide-viewer'
        });
        
        $('.slide-viewer').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            asNavFor: '.main-viewer',
            dots: false,
            centerMode: true,
            focusOnSelect: true
        });
    </script>
@endpush

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('slick/slick.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('slick/slick-theme.css') }}" />
@endpush
