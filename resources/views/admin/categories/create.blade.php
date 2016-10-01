@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Category</h1>
        <br>

        @include('errors._check')

        {!! Form::open(['route' => 'admin.categories.store']) !!}

        @include('admin.categories._form')

        {!! Form::submit('Create Category', ['class' => 'btn btn-primary']) !!}

        {!! Form::close() !!}

    </div>

@endsection