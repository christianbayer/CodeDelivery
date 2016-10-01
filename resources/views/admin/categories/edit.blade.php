@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Category</h1>
        <br>

        @include('errors._check')

        {!! Form::model($category, ['route' => ['admin.categories.update', $category->id]]) !!}

        @include('admin.categories._form')

        {!! Form::submit('Save Category', ['class' => 'btn btn-primary']) !!}

        {!! Form::close() !!}

    </div>

@endsection