<!-- Buyer Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('buyer_id', 'Buyer Id:') !!}
    {!! Form::select('buyer_id', ['id' => 'User'], null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Order Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('order_id', 'Order Id:') !!}
    {!! Form::select('order_id', ['id' => 'Order'], null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Store Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('store_id', 'Store Id:') !!}
    {!! Form::select('store_id', ['id' => 'Store'], null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Stars Field -->
<div class="form-group col-sm-6">
    {!! Form::label('stars', 'Stars:') !!}
    {!! Form::text('stars', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>