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
        {{ dump($streams) }}
        <!-- Begin: Streams list -->
        <div class="row">
            @foreach($streams as $key => $stream)
                <div class="col-md-6 col-lg-4">
                    <!-- Begin: Card -->
                    @include(
                        'components.card',
                        [
                            'key' => $key,
                            'image' => $stream->preview->medium,
                            'title' => $stream->channel->status,
                            'subtitle' => '<b>Channel:</b> ' . $stream->channel->display_name,
                            'footer' => $stream->viewers . ' ' . (($stream->viewers == 1) ? 'viewer' : 'viewerss')
                        ]
                    )
                    <!-- End: Card -->

                    <!-- Begin: Modal -->
                    <div class="modal fade" id="twitchEmbedModal{{ $key }}" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <div class="modal-body twitch-embed-modal" data-channel="{{ $stream->channel->name }}"
                                     data-video-height="{{ $stream->video_height }}"></div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End: Modal -->
                </div>
            @endforeach
        </div>
        <!-- End: Streams list -->

        <!-- Begin: Pagination -->
        {{ $streams->appends('search', request()->get('search'))->links() }}
        <!-- End: Pagination -->
    @endif
@endsection