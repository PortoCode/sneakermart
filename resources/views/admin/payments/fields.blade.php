<!-- Order Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('order_id', 'Order Id:') !!}
    {!! Form::select('order_id', ['id' => 'Order'], null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Value Field -->
<div class="form-group col-sm-6">
    {!! Form::label('value', 'Value:') !!}
    {!! Form::text('value', null, ['class' => 'form-control']) !!}
</div>

<!-- Payment Method Field -->
<div class="form-group col-sm-6">
    {!! Form::label('payment_method', 'Payment Method:') !!}
    {!! Form::text('payment_method', null, ['class' => 'form-control']) !!}
</div>

<!-- Pagarme Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pagarme_id', 'Pagarme Id:') !!}
    {!! Form::text('pagarme_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    {!! Form::text('status', null, ['class' => 'form-control']) !!}
</div>

<!-- Bill Url Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bill_url', 'Bill Url:') !!}
    {!! Form::text('bill_url', null, ['class' => 'form-control']) !!}
</div>