@isset($store->id)
    {{-- Id Field --}}
    <div class="form-group col-md-12 show-margin-fix">
        {!! Form::label("id", \Lang::get("attributes.id").":") !!}
        <p>{{ $store->id }}</p>
    </div>
@endisset

@isset($store->seller_id)
    {{-- Seller Id Field --}}
    <div class="form-group col-md-12 show-margin-fix">
        {!! Form::label("seller_id", \Lang::get("attributes.seller_id").":") !!}
        <p>{{ $store->seller->name }}</p>
    </div>
@endisset

@isset($store->name)
    {{-- Name Field --}}
    <div class="form-group col-md-12 show-margin-fix">
        {!! Form::label("name", \Lang::get("attributes.name").":") !!}
        <p>{{ $store->name }}</p>
    </div>
@endisset

@isset($store->zipcode)
    {{-- Zipcode Field --}}
    <div class="form-group col-md-12 show-margin-fix">
        {!! Form::label("zipcode", \Lang::get("attributes.zipcode").":") !!}
        <p>{{ $store->zipcode }}</p>
    </div>
@endisset

@isset($store->address)
    {{-- Address Field --}}
    <div class="form-group col-md-12 show-margin-fix">
        {!! Form::label("address", \Lang::get("attributes.address").":") !!}
        <p>{{ $store->address }}</p>
    </div>
@endisset

@isset($store->address_number)
    {{-- Number Field --}}
    <div class="form-group col-md-12 show-margin-fix">
        {!! Form::label("address_number", \Lang::get("attributes.number").":") !!}
        <p>{{ $store->address_number }}</p>
    </div>
@endisset

@isset($store->neighborhood)
    {{-- Neighborhood Field --}}
    <div class="form-group col-md-12 show-margin-fix">
        {!! Form::label("neighborhood", \Lang::get("attributes.neighborhood").":") !!}
        <p>{{ $store->neighborhood }}</p>
    </div>
@endisset

@isset($store->city)
    {{-- City Field --}}
    <div class="form-group col-md-12 show-margin-fix">
        {!! Form::label("city", \Lang::get("attributes.city").":") !!}
        <p>{{ $store->city }}</p>
    </div>
@endisset

@isset($store->state)
    {{-- State Field --}}
    <div class="form-group col-md-12 show-margin-fix">
        {!! Form::label("state", \Lang::get("attributes.state").":") !!}
        <p>{{ $store->state }}</p>
    </div>
@endisset

@isset($store->complement)
    {{-- Complement Field --}}
    <div class="form-group col-md-12 show-margin-fix">
        {!! Form::label("complement", \Lang::get("attributes.complement").":") !!}
        <p>{{ $store->complement }}</p>
    </div>
@endisset

@isset($store->phone_number)
    {{-- Phone Number Field --}}
    <div class="form-group col-md-12 show-margin-fix">
        {!! Form::label("phone_number", \Lang::get("attributes.phone_number").":") !!}
        <p>{{ $store->phone_number }}</p>
    </div>
@endisset

@isset($store->readable_created_at)
    {{-- Created At Field --}}
    <div class="form-group col-md-12 show-margin-fix">
        {!! Form::label("created_at", \Lang::get("attributes.created_at").":") !!}
        <p>{{ $store->readable_created_at }}</p>
    </div>
@endisset

@isset($store->readable_updated_at)
    {{-- Updated At Field --}}
    <div class="form-group col-md-12 show-margin-fix">
        {!! Form::label("updated_at", \Lang::get("attributes.updated_at").":") !!}
        <p>{{ $store->readable_updated_at }}</p>
    </div>
@endisset
