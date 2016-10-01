@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Order #{{$order->id}} - $ {{$order->total}}</h2>
        <h4>Client: {{$order->client->user->name}}</h4>
        <h5>Date: {{$order->created_at}}</h5>
        <p>Address: {{$order->client->address}} - {{$order->client->city}} - {{$order->client->state}}</p>
        {!! Form::model($order, ['route' => ['admin.orders.update', 'id' => $order->id]]) !!}

        <div class="form-group">
            {!! Form::label('status', 'Status:') !!}
            {!! Form::select('status', $list_status, null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('deliveryman', 'Deliveryman:') !!}
            {!! Form::select('user_deliveryman_id', $deliveryman, null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}
    </div>
@endsection