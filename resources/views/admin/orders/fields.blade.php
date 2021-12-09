<!-- Store Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('store_id', 'Store Id:') !!}
    {!! Form::select('store_id', ['id' => 'Store'], null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Delivery Info Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('delivery_info_id', 'Delivery Info Id:') !!}
    {!! Form::select('delivery_info_id', ['id' => 'DeliveryInfo'], null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Total Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('total_price', 'Total Price:') !!}
    {!! Form::text('total_price', null, ['class' => 'form-control']) !!}
</div>

<!-- Shipping Fee Field -->
<div class="form-group col-sm-6">
    {!! Form::label('shipping_fee', 'Shipping Fee:') !!}
    {!! Form::text('shipping_fee', null, ['class' => 'form-control']) !!}
</div>

<!-- Size Field -->
<div class="form-group col-sm-6">
    {!! Form::label('size', 'Size:') !!}
    {!! Form::text('size', null, ['class' => 'form-control']) !!}
</div>

<!-- Is Paid Field -->
<div class="form-group col-sm-12">
    {!! Form::label('is_paid', 'Is Paid', ['class' => 'form-check-label']) !!}
    <label class="form-check">
        {!! Form::radio('is_paid', "1", null, ['class' => 'form-check-input']) !!} Yes
    </label>

    <label class="form-check">
        {!! Form::radio('is_paid', "0", null, ['class' => 'form-check-input']) !!} No
    </label>

</div>


<!-- Is Delivered Field -->
<div class="form-group col-sm-12">
    {!! Form::label('is_delivered', 'Is Delivered', ['class' => 'form-check-label']) !!}
    <label class="form-check">
        {!! Form::radio('is_delivered', "1", null, ['class' => 'form-check-input']) !!} Yes
    </label>

    <label class="form-check">
        {!! Form::radio('is_delivered', "0", null, ['class' => 'form-check-input']) !!} No
    </label>

</div>
