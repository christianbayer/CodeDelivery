@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Client</h1>
        <br>

        @include('errors._check')

        {!! Form::model($client, ['route' => ['admin.clients.update', $client->id]]) !!}

        @include('admin.clients._form')

        {!! Form::submit('Save Client', ['class' => 'btn btn-primary']) !!}

        {!! Form::close() !!}

    </div>

@endsection