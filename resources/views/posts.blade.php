@extends("layouts.app")

@section('content')

    <section id="posts" class="container-fluid container-is-padding">
        <h6 class="text-center header-small-text">{{ __('common.upcoming_events') }}</h6>
        <h1 class="text-center header-large-text ">{{ __('common.be_ready') }}</h1>
        <div class="container">
            <div class="posts-filters input-group">
                <form class="form-control justify-content-start" method="GET" action="#posts">
                    <label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text">#</div>
                            </div>
                            <input class="date-pickers" name="search" value="{{ request('search') }}" type="search" placeholder="Promo Code...">
                          </div>
                    </label>
                    <label>
                        <button class="btn sm btn-success">{{ __('common.search') }}</button>
                    </label>
                </form>
                <form class="form-control justify-content-end" method="GET" action="#posts">
                    <label>
                        <input class="date-pickers" name='from' value="{{ request('from') }}" type="date">
                    </label>
                    <span>-</span>
                    <label>
                        <input class="date-pickers" name="to" value="{{ request('to') }}" type="date">
                    </label>
                    <label>
                        <button class="btn sm btn-success">{{ __('common.apply') }}</button>
                    </label>
                </form>
            </div>
            <div class="row mt-5 mb-5">
                @forelse ($posts as $post)
                    <div class="col-12 col-sm-6 col-md-6 col-lg-4">
                        <div class="posts-list-item">
                            <div class="row">
                                <div class="col-12">
                                    <div class="events-item-time-content">
                                        <img src="{{ $post->getFirstMediaUrl() }}" alt="{{ $post->title }}">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="events-item-text-content">
                                        <h4>{{ $post->title }}</h4>

                                        <p>{{ $post->short_description }}</p>
                                        <a href="{{ route('posts.single', compact('post')) }}">{{ __('common.read_more') }} <i
                                                class="fas fa-chevron-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <h4 class="text-center">{{ __('common.not_found') }}</h4>
                @endforelse

                {{-- {!! $posts->links() !!} --}}

            </div>

        </div>
    </section>

    @include("includes.events", compact('activeEvents'))

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
    </script>
@endpush

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('slick/slick.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('slick/slick-theme.css') }}" />
@endpush
