@if($streams->total())
    <!-- Begin: Streams list -->
    <div class="row">
        @foreach($streams as $key => $stream)
            <div class="col-md-6 col-lg-4 col-xl-3">
                <!-- Begin: Card -->
                @include(
                    'components.card',
                    [
                        'key' => $key,
                        'image' => $stream->preview->large,
                        'title' => $stream->channel->status,
                        'subtitle' => '<b>Channel:</b> ' . $stream->channel->display_name,
                        'footer' => $stream->viewers . ' ' . (($stream->viewers == 1) ? 'viewer' : 'viewerss')
                    ]
                )
                <!-- End: Card -->

                <!-- Begin: Modal -->
                <div class="modal fade twitch-embed-modal" id="twitchEmbedModal{{ $key }}" tabindex="-1"
                     role="dialog"
                     aria-labelledby="exampleModalLabel" aria-hidden="true"
                     data-channel="{{ $stream->channel->name }}"
                     data-video-height="{{ $stream->video_height }}">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">{{ $stream->channel->status }}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body"></div>

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