@extends('admin.templates.index')
@section('title', 'Creating new review')
@section('content')
    {!! Form::open(['route' => 'reviews.store']) !!}
        <div class="form-group">
            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('email', 'E-Mail:') !!}
            {!! Form::email('email', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('rate','Rating:') !!}
            {!! Form::number('rate', null, ['min' => 1, 'max' => 5, 'step' => 1, 'class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('content', 'Enter review text here:') !!}
            {!! Form::textarea('content', null, ['rows' => 5,'class' => 'form-control']) !!}
        </div>

        <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-5">
            {!! Form::submit('Send Review', ['class' => 'btn btn-outline-success']) !!}
        </div>

    {!! Form::close() !!}
@endsection