<!-- Order Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('order_id', 'Order Id:') !!}
    {!! Form::select('order_id', ['id' => 'Order'], null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Product Info Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('product_info_id', 'Product Info Id:') !!}
    {!! Form::select('product_info_id', ['id' => 'ProductInfo'], null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Quantity Field -->
<div class="form-group col-sm-6">
    {!! Form::label('quantity', 'Quantity:') !!}
    {!! Form::text('quantity', null, ['class' => 'form-control']) !!}
</div>