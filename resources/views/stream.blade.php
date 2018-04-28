@extends('layouts.app')

@section('page-header')
    <h1 class="display-4">{{ $stream->channel->name }}</h1>

    <hr class="my-4">

    <p class="lead">{{ $stream->channel->status }}</p>
@endsection


@section('content')
    <!-- Begin: Seaction header -->
    <div class="mb-5 d-flex">
        @include('forms.search')
    </div>
    <!-- End: Seaction header -->

    <!-- Add a placeholder for the Twitch embed -->
    <div id="twitch-embed"></div>

    <div class="mt-5 d-md-flex justify-content-md-between">
        <div>
            @if(!empty($stream->channel->description))
                <b class="text-primary">Description:</b> <span
                        class="text-muted">{{ $stream->channel->description }}</span>
            @endif
        </div>
        <div>
            <b class="text-primary">Viewers:</b> <span class="text-muted">{{ $stream->viewers }}</span>
        </div>
    </div>
@endsection

@push('js')
    <!-- Load the Twitch embed script -->
    <script src="https://embed.twitch.tv/embed/v1.js"></script>

    <!-- Create a Twitch.Embed object that will render within the "twitch-embed" root element. -->
    <script type="text/javascript">
        new Twitch.Embed("twitch-embed", {
            width: '100%',
            height: '600',
            channel: '{{ $stream->channel->name }}',
            layout: 'video'
        });
    </script>
@endpush