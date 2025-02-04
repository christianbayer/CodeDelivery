@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>New Order</h1>
        @include('errors._check')
        <br>

        <div class="container">
            {!! Form::open(['route' => 'customer.order.store', 'class'=>'form']) !!}
            <div class="form-group">
                <label>Total:</label>
                <p id="total"></p>
                <a href="#" id="btnNewItem" class="btn btn-success">New Item</a>
                <br/>
                <br/>

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
                                    <option value="{{$product->id}}" data-price="{{$product->price}}">{{$product->name}}
                                        -- {{$product->price}}</option>
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

            <div class="form-group">
                {!! Form::submit('Finish Order', ['class' => 'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection

@section('script')
    <script>
        $('#btnNewItem').click(function () {
            var row = $('table tbody >tr:last'),
                    newRow = row.clone(),
                    length = $('table tbody tr').length;

            newRow.find('td').each(function () {
                var td = $(this),
                        input = td.find('input,select'),
                        name = input.attr('name');

                input.attr('name', name.replace((length - 1) + "", length + ""));
            });

            newRow.find('input').val(1);
            newRow.insertAfter(row);
            calculateTotal();
        });

        $(document.body).on('click', 'select', function () {
            calculateTotal();
        });

        $(document.body).on('blur', 'input', function () {
            calculateTotal();
        });

        function calculateTotal() {
            var total = 0,
                    trLen = $('table tbody tr').length,
                    tr = null, price, qtd;

            for (var i = 0; i < trLen; i++) {
                tr = $('table tbody tr').eq(i);
                price = tr.find(':selected').data('price');
                qtd = tr.find('input').val();
                total += price * qtd;
            }

            $('#total').html(total);
        }
    </script>
@endsection
