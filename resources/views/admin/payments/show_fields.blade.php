<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $payment->id }}</p>
</div>

<!-- Order Id Field -->
<div class="col-sm-12">
    {!! Form::label('order_id', 'Order Id:') !!}
    <p>{{ $payment->order_id }}</p>
</div>

<!-- Value Field -->
<div class="col-sm-12">
    {!! Form::label('value', 'Value:') !!}
    <p>{{ $payment->value }}</p>
</div>

<!-- Payment Method Field -->
<div class="col-sm-12">
    {!! Form::label('payment_method', 'Payment Method:') !!}
    <p>{{ $payment->payment_method }}</p>
</div>

<!-- Pagarme Id Field -->
<div class="col-sm-12">
    {!! Form::label('pagarme_id', 'Pagarme Id:') !!}
    <p>{{ $payment->pagarme_id }}</p>
</div>

<!-- Status Field -->
<div class="col-sm-12">
    {!! Form::label('status', 'Status:') !!}
    <p>{{ $payment->status }}</p>
</div>

<!-- Payment Date Field -->
<div class="col-sm-12">
    {!! Form::label('payment_date', 'Payment Date:') !!}
    <p>{{ $payment->payment_date }}</p>
</div>

<!-- Bill Url Field -->
<div class="col-sm-12">
    {!! Form::label('bill_url', 'Bill Url:') !!}
    <p>{{ $payment->bill_url }}</p>
</div>

