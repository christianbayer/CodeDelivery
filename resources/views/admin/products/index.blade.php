@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Products</h1>
        <a href="{{route('admin.products.create')}}" class="btn btn-default">New Product</a>
        <br/>
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Category</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->category->name}}</td>
                    <td>{{$product->price}}</td>
                    <td>
                        <a href="{{route('admin.products.edit', [$product->id])}}" class="btn btn-default btn-sm">Edit</a>
                        <a href="{{route('admin.products.destroy', [$product->id])}}" class="btn btn-danger btn-sm">Remove</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {!! $products->render() !!}

    </div>

@endsection