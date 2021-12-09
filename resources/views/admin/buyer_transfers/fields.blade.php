<!-- Buyer Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('buyer_id', 'Buyer Id:') !!}
    {!! Form::select('buyer_id', ['id' => 'User'], null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Payment Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('payment_id', 'Payment Id:') !!}
    {!! Form::select('payment_id', ['id' => 'Payment'], null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Value Field -->
<div class="form-group col-sm-6">
    {!! Form::label('value', 'Value:') !!}
    {!! Form::text('value', null, ['class' => 'form-control']) !!}
</div>

<!-- Pix Key Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pix_key', 'Pix Key:') !!}
    {!! Form::text('pix_key', null, ['class' => 'form-control']) !!}
</div>

<!-- Is Transferred Field -->
<div class="form-group col-sm-12">
    {!! Form::label('is_transferred', 'Is Transferred', ['class' => 'form-check-label']) !!}
    <label class="form-check">
        {!! Form::radio('is_transferred', "1", null, ['class' => 'form-check-input']) !!} Yes
    </label>

    <label class="form-check">
        {!! Form::radio('is_transferred', "0", null, ['class' => 'form-check-input']) !!} No
    </label>

</div>


<!-- Bill Url Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bill_url', 'Bill Url:') !!}
    {!! Form::text('bill_url', null, ['class' => 'form-control']) !!}
</div>