@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>New Order</h1>
        @include('errors._check')
        <br>

        <div class="container">
            {!! Form::open(['class'=>'form']) !!}
            <div class="form-group">
                <label>Total:</label>
                <p id="total"></p>
                <a href="#" class="btn btn-default">Add Item</a>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                            <select class="form-control" name="items[0][product_id]">
                            @foreach($products as $product)
                                <option value="{{$product->id}}" data-price="{{$product->price}}">{{$product->name}} -- {{$product->price}}</option>
                            @endforeach
                            </select>
                        </td>
                        <td>
                            {!! Form::text('items[0][qtd]', '1', ['class' => 'form-control']) !!}
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection