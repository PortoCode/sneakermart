<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $order->id }}</p>
</div>

<!-- Store Id Field -->
<div class="col-sm-12">
    {!! Form::label('store_id', 'Store Id:') !!}
    <p>{{ $order->store_id }}</p>
</div>

<!-- Delivery Info Id Field -->
<div class="col-sm-12">
    {!! Form::label('delivery_info_id', 'Delivery Info Id:') !!}
    <p>{{ $order->delivery_info_id }}</p>
</div>

<!-- Total Price Field -->
<div class="col-sm-12">
    {!! Form::label('total_price', 'Total Price:') !!}
    <p>{{ $order->total_price }}</p>
</div>

<!-- Shipping Fee Field -->
<div class="col-sm-12">
    {!! Form::label('shipping_fee', 'Shipping Fee:') !!}
    <p>{{ $order->shipping_fee }}</p>
</div>

<!-- Size Field -->
<div class="col-sm-12">
    {!! Form::label('size', 'Size:') !!}
    <p>{{ $order->size }}</p>
</div>

<!-- Is Paid Field -->
<div class="col-sm-12">
    {!! Form::label('is_paid', 'Is Paid:') !!}
    <p>{{ $order->is_paid }}</p>
</div>

<!-- Order Date Field -->
<div class="col-sm-12">
    {!! Form::label('order_date', 'Order Date:') !!}
    <p>{{ $order->order_date }}</p>
</div>

<!-- Is Delivered Field -->
<div class="col-sm-12">
    {!! Form::label('is_delivered', 'Is Delivered:') !!}
    <p>{{ $order->is_delivered }}</p>
</div>

