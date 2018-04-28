{!! Form::open(['action' => 'PagesController@index', 'method' => 'GET', 'class' => 'form-inline mt-3 mt-md-0 ml-auto']) !!}
    @if(!empty(config('records-sets.per-page.options')))
        {!! Form::label('rpp', 'Records per page', ['class' => 'd-none d-md-block']) !!}
        {!! Form::select('rpp', config('records-sets.per-page.options'), Cookie::get('records_per_page'), ['class' => 'form-control ml-md-2']) !!}
    @endif

    {!! Form::text('search', null, ['class' => 'form-control my-2 mx-0 my-sm-0 mx-sm-2', 'placeholder' => 'Search', 'aria-label' => 'Search']) !!}

    {!! Form::button('Search', ['type' => 'submit', 'class' => 'btn btn-secondary']) !!}
{!! Form::close() !!}