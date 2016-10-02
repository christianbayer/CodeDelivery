@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Coupons</h1>
        <a href="{{route('admin.cupoms.create')}}" class="btn btn-default">New Coupon</a>
        <br/>
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Code</th>
                <th>Value</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($cupoms as $cupom)
                <tr>
                    <td>{{$cupom->id}}</td>
                    <td>{{$cupom->code}}</td>
                    <td>{{$cupom->value}}</td>
                    <td></td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {!! $cupoms->render() !!}

    </div>

@endsection