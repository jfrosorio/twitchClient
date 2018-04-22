@extends('layouts.app')

@section('content')
    <!-- Begin: Seaction header -->
    <div class="section-header">
        {{ $streams->count() }} {{ ($streams->count() == 1) ? 'stream' : 'streams' }} found

        <!-- Begin: Records per page selector -->
        @if($streams->count())
            <div class="dropdown show">
                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Records
                </a>

                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="#">15</a>
                    <a class="dropdown-item" href="#">30</a>
                    <a class="dropdown-item" href="#">75</a>
                    <a class="dropdown-item" href="#">120</a>
                </div>
            </div>
    @endif
    <!-- End: Records per page selector -->
    </div>
    <!-- End: Seaction header -->

    @if($streams->count())
        <!-- Begin: Streams list -->
        <div class="row">
            @foreach($streams as $stream)
                <div class="col-md-6 col-lg-4">
                    @include(
                        'components.card',
                        [
                            'image' => $stream->preview->medium,
                            'title' => $stream->channel->status,
                            'subtitle' => '<b>Channel:</b> ' . $stream->channel->display_name,
                            'footer' => $stream->viewers . ' ' . (($stream->viewers == 1) ? 'viewer' : 'viewerss')
                        ]
                    )
                </div>
            @endforeach
        </div>
        <!-- End: Streams list -->

        <!-- Begin: Pagination -->
        {{ $streams->appends('search', request()->get('search'))->links() }}
        <!-- End: Pagination -->
    @endif
@endsection