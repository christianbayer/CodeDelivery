@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Product</h1>
        <br>

        @include('errors._check')

        {!! Form::open(['route' => 'admin.products.store']) !!}

        @include('admin.products._form')

        {!! Form::submit('Create Product', ['class' => 'btn btn-primary']) !!}

        {!! Form::close() !!}

    </div>

@endsection