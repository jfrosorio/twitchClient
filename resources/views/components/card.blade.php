<div class="card mb-4">
    <img class="card-img-top" src="{{ $image }}" alt="Card image cap">

    <div class="card-body">
        <h5 class="card-title">{{ $title }}</h5>

        <p>
            {!! $subtitle !!}
        </p>

        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#twitchEmbedModal{{ $key }}">
            Watch stream
        </button>
    </div>

    <div class="card-footer">
        <small class="text-muted">{{ $footer }}</small>
    </div>
</div>