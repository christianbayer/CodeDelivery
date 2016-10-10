@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Product</h1>
        <br>

        @include('errors._check')

        {!! Form::model($product, ['route' => ['admin.products.update', $product->id]]) !!}

        @include('admin.products._form')

        {!! Form::submit('Save Product', ['class' => 'btn btn-primary']) !!}

        {!! Form::close() !!}

    </div>

@endsection