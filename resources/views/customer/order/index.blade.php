@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>My Orders</h3>

        <a href="{{route('customer.order.create')}}" class="btn btn-default">New Order</a>
        <br/>
        <br/>


        <table class="table">
            <thead>
            <tr>
                <td>ID</td>
                <td>Total</td>
                <td>Status</td>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>{{$order->id}}</td>
                    <td>{{$order->total}}</td>
                    <td>{{$order->status}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {!! $orders->render() !!}
    </div>

@endsection