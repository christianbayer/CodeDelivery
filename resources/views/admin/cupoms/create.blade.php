@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Coupon</h1>
        <br>

        @include('errors._check')

        {!! Form::open(['route' => 'admin.cupoms.store']) !!}

        @include('admin.cupoms._form')

        {!! Form::submit('Create Coupon', ['class' => 'btn btn-primary']) !!}

        {!! Form::close() !!}

    </div>

@endsection