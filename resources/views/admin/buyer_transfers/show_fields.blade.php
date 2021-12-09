<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $buyerTransfer->id }}</p>
</div>

<!-- Buyer Id Field -->
<div class="col-sm-12">
    {!! Form::label('buyer_id', 'Buyer Id:') !!}
    <p>{{ $buyerTransfer->buyer_id }}</p>
</div>

<!-- Payment Id Field -->
<div class="col-sm-12">
    {!! Form::label('payment_id', 'Payment Id:') !!}
    <p>{{ $buyerTransfer->payment_id }}</p>
</div>

<!-- Value Field -->
<div class="col-sm-12">
    {!! Form::label('value', 'Value:') !!}
    <p>{{ $buyerTransfer->value }}</p>
</div>

<!-- Pix Key Field -->
<div class="col-sm-12">
    {!! Form::label('pix_key', 'Pix Key:') !!}
    <p>{{ $buyerTransfer->pix_key }}</p>
</div>

<!-- Is Transferred Field -->
<div class="col-sm-12">
    {!! Form::label('is_transferred', 'Is Transferred:') !!}
    <p>{{ $buyerTransfer->is_transferred }}</p>
</div>

<!-- Transfer Date Field -->
<div class="col-sm-12">
    {!! Form::label('transfer_date', 'Transfer Date:') !!}
    <p>{{ $buyerTransfer->transfer_date }}</p>
</div>

<!-- Bill Url Field -->
<div class="col-sm-12">
    {!! Form::label('bill_url', 'Bill Url:') !!}
    <p>{{ $buyerTransfer->bill_url }}</p>
</div>

