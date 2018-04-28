<div class="card mb-5">
    <img class="card-img-top" src="{{ $image }}" alt="Card image cap">

    <div class="card-body">
        <h4 class="card-title">{{ $title }}</h4>

        @if(!empty($text))
            <p>
                {!! $text !!}
            </p>
        @endif

        <a class="btn btn-outline-primary" href="{{ $link }}">Watch stream</a>
    </div>

    <div class="card-footer">
        <small class="text-muted">{{ $footer }}</small>
    </div>
</div>