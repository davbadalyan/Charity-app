<div class="col-12 col-sm-12 col-md-6 col-lg-4">
    <div class="causes-item">
        <div id="post{{ $event->id }}" class="carousel slide hovered" data-bs-ride="carousel">
            <div class="carousel-inner">
                @forelse ($event->getMedia() as $i => $image)
                    <div class="carousel-item {{ $i == 0 ? 'active' : '' }}">
                        <img src="{{ $image->getUrl() }}" class="d-block w-100" alt="{{ $event->title }}">
                    </div>
                @empty

                @endforelse
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#post{{ $event->id }}"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#post{{ $event->id }}"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <div class="causes-item-content">
            <h6>{{ $event->promo_code }}</h6>
            <h4 class="causes-item-name">{{ $event->title }}</h4>
            <p class="causes-item-description">
                {{ $event->short_description }}
            </p>
            <div class="d-flex align-items-center justify-content-between">
                <span>Raised: ${{ $event->raised_amount }}</span>
                <span>Goal: ${{ $event->goal_amount }}</span>
            </div>
            @if ($event->show_foundation_status)
                <div class="donate-status">
                    <div style="width: {{ $event->progress }}%" class="donate-status-bar"></div>
                </div>
            @endif
            {{-- <p>
                Raised by 60 people within 10 days
            </p> --}}
            @if ($event->show_button)
                <p class="m-0">
                    <a href="{{ route('index', ['#account-number']) }}" class="causes-item-donate-button">
                        <span>Donate Now</span>
                        <i class="fas fa-plus"></i>
                    </a>
                </p>
            @endif
        </div>
    </div>
</div>
