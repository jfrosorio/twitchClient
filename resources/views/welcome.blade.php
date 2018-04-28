@extends('layouts.app')

@section('page-header')
    <h1 class="display-4">Welcome to Twitch Client App</h1>

    <hr class="my-4">

    <p class="lead">Lightweight Search Engine for finding streams on Twitch.tv.</p>
@endsection

@section('content')
    <!-- Begin: Seaction header -->
    <div class="mb-5 d-md-flex justify-content-md-between align-items-md-center">
        {{ $streams->total() }} {{ ($streams->total() == 1) ? 'stream' : 'streams' }} found

        @include('forms.search')
    </div>
    <!-- End: Seaction header -->


    <!-- Begin: Streams list -->
    @include(
        'partials.streams-list',
        [
            'streams' => $streams
        ]
    )
    <!-- End: Streams list -->
@endsection