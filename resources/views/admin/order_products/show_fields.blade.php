<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $orderProduct->id }}</p>
</div>

<!-- Order Id Field -->
<div class="col-sm-12">
    {!! Form::label('order_id', 'Order Id:') !!}
    <p>{{ $orderProduct->order_id }}</p>
</div>

<!-- Product Info Id Field -->
<div class="col-sm-12">
    {!! Form::label('product_info_id', 'Product Info Id:') !!}
    <p>{{ $orderProduct->product_info_id }}</p>
</div>

<!-- Quantity Field -->
<div class="col-sm-12">
    {!! Form::label('quantity', 'Quantity:') !!}
    <p>{{ $orderProduct->quantity }}</p>
</div>

