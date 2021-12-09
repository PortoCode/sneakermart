{{-- Seller Id Field --}}
<div class="form-group col-md-6">
    {!! Form::label("seller_id", \Lang::get("attributes.seller_id").":") !!}
    {!! Form::select("seller_id", ["" => "Selecionar"] + $sellersArray, null, ["class" => "form-control first-disabled custom-select"]) !!}
</div>

{{-- Name Field --}}
<div class="form-group col-md-6">
    {!! Form::label("name", \Lang::get("attributes.name").":") !!}
    {!! Form::text("name", null, ["class" => "form-control"]) !!}
</div>

{{-- Zipcode Field --}}
<div class="form-group col-md-6">
    {!! Form::label("zipcode", \Lang::get("attributes.zipcode").":") !!}
    {!! Form::text("zipcode", null, ["class" => "form-control zipcode-mask"]) !!}
</div>

{{-- Address Field --}}
<div class="form-group col-md-6">
    {!! Form::label("address", \Lang::get("attributes.address").":") !!}
    {!! Form::text("address", null, ["class" => "form-control"]) !!}
</div>

{{-- Address Number Field --}}
<div class="form-group col-md-6">
    {!! Form::label("address_number", \Lang::get("attributes.number").":") !!}
    {!! Form::text("address_number", null, ["class" => "form-control"]) !!}
</div>

{{-- Neighborhood Field --}}
<div class="form-group col-md-6">
    {!! Form::label("neighborhood", \Lang::get("attributes.neighborhood").":") !!}
    {!! Form::text("neighborhood", null, ["class" => "form-control"]) !!}
</div>

{{-- City Field --}}
<div class="form-group col-md-6">
    {!! Form::label("city", \Lang::get("attributes.city").":") !!}
    {!! Form::text("city", null, ["class" => "form-control"]) !!}
</div>

{{-- State Field --}}
<div class="form-group col-md-6">
    {!! Form::label("state", \Lang::get("attributes.state").":") !!}
    {!! Form::text("state", null, ["class" => "form-control state-mask"]) !!}
</div>

{{-- Complement Field --}}
<div class="form-group col-md-6">
    {!! Form::label("complement", \Lang::get("attributes.complement").":") !!}
    {!! Form::text("complement", null, ["class" => "form-control"]) !!}
</div>

{{-- Phone Number Field --}}
<div class="form-group col-md-6">
    {!! Form::label("phone_number", \Lang::get("attributes.phone_number").":") !!}
    {!! Form::text("phone_number", null, ["class" => "form-control phone-mask"]) !!}
</div>