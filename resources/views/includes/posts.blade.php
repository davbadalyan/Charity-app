<!--Posts-->
<section class="container-fluid container-is-padding events">
    <h6 class="text-center header-small-text">Upcoming Events</h6>
    <h1 class="text-center header-large-text color-white">Be Ready For Our Events</h1>
    <p class="text-center header-description-text color-white">
        Event makes suspendice adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis
        ipsum suspendices gravida.
    </p>
    <div class="container mt-3 mb-3">
        <div class="event-slider">
            @forelse ($posts as $post)
                <div class="events-item">
                    <div class="row">
                        <div class="col-12 col-sm-5 col-lg-5">
                            <div class="events-item-time-content">
                                <img src="{{ $post->getFirstMediaUrl() }}" title="{{ $post->title }}"
                                    alt="{{ $post->title }}">
                            </div>
                        </div>
                        <div class="col-12 col-sm-5 col-lg-7">
                            <div class="events-item-text-content">
                                <h4>{{ $post->title }}</h4>
                                <p>{{ $post->short_description }}</p>
                                <a href="{{ route('posts.single', compact('post')) }}">{{ __('common.read_more') }}<i
                                        class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty

            @endforelse
        </div>
    </div>
</section>
