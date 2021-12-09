<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'User Id:') !!}
    {!! Form::select('user_id', ['id' => 'User'], null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Recipient Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('recipient_name', 'Recipient Name:') !!}
    {!! Form::text('recipient_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Zipcode Field -->
<div class="form-group col-sm-6">
    {!! Form::label('zipcode', 'Zipcode:') !!}
    {!! Form::text('zipcode', null, ['class' => 'form-control']) !!}
</div>

<!-- Address Field -->
<div class="form-group col-sm-6">
    {!! Form::label('address', 'Address:') !!}
    {!! Form::text('address', null, ['class' => 'form-control']) !!}
</div>

<!-- Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('number', 'Number:') !!}
    {!! Form::text('number', null, ['class' => 'form-control']) !!}
</div>

<!-- Neighborhood Field -->
<div class="form-group col-sm-6">
    {!! Form::label('neighborhood', 'Neighborhood:') !!}
    {!! Form::text('neighborhood', null, ['class' => 'form-control']) !!}
</div>

<!-- City Field -->
<div class="form-group col-sm-6">
    {!! Form::label('city', 'City:') !!}
    {!! Form::text('city', null, ['class' => 'form-control']) !!}
</div>

<!-- State Field -->
<div class="form-group col-sm-6">
    {!! Form::label('state', 'State:') !!}
    {!! Form::text('state', null, ['class' => 'form-control']) !!}
</div>

<!-- Complement Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('complement', 'Complement:') !!}
    {!! Form::textarea('complement', null, ['class' => 'form-control']) !!}
</div>

<!-- Reference Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('reference', 'Reference:') !!}
    {!! Form::textarea('reference', null, ['class' => 'form-control']) !!}
</div>