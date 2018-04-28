@if($streams->total())
    <!-- Begin: Streams list -->
    <div class="row">
        @foreach($streams as $key => $stream)
            <div class="col-md-6 col-xl-4">
                <!-- Begin: Card -->
                @include(
                    'components.card',
                    [
                        'image' => $stream->preview->large,
                        'title' => $stream->channel->display_name,
                        'text' => $stream->channel->status,
                        'link' => url('stream/' . $stream->channel->_id),
                        'footer' => $stream->viewers . ' ' . (($stream->viewers == 1) ? 'viewer' : 'viewerss')
                    ]
                )
                <!-- End: Card -->
            </div>
        @endforeach
    </div>
    <!-- End: Streams list -->

    <!-- Begin: Pagination -->
    {{ $streams->appends('search', request()->get('search'))->links() }}
    <!-- End: Pagination -->
@endif