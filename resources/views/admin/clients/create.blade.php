@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Client</h1>
        <br>

        @include('errors._check')

        {!! Form::open(['route' => 'admin.clients.store']) !!}

        @include('admin.clients._form')

        {!! Form::submit('Create Client', ['class' => 'btn btn-primary']) !!}

        {!! Form::close() !!}

    </div>

@endsection