@extends('layouts.app')

@section('content')
    <!-- Begin: Seaction header -->
    <div class="mb-5 d-md-flex justify-content-md-between align-items-md-center">
        {{ $streams->total() }} {{ ($streams->total() == 1) ? 'stream' : 'streams' }} found

        <!-- Begin: Records per page form -->
        @if($streams->total() && !empty(config('records-sets.per-page.options')))
            {!! Form::open(['action' => 'PagesController@index', 'method' => 'GET', 'class' => 'form-inline mt-3 mt-md-0']) !!}
                {!! Form::label('rpp', 'Records per page', ['class' => 'd-none d-md-block']) !!}
                {!! Form::select('rpp', [8 => 8, 24 => 24, 32 => 32], Cookie::get('records_per_page'), ['class' => 'form-control ml-md-2']) !!}

                {!! Form::text('search', null, ['class' => 'form-control my-2 mx-0 my-sm-0 mx-sm-2', 'placeholder' => 'Search', 'aria-label' => 'Search']) !!}

                {!! Form::button('Search', ['type' => 'submit', 'class' => 'btn btn-secondary']) !!}
            {!! Form::close() !!}
        @endif
        <!-- End: Records per page form -->
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