@isset($product->id)
    {{-- Id Field --}}
    <div class="form-group col-md-12 show-margin-fix">
        {!! Form::label("id", \Lang::get("attributes.id").":") !!}
        <p>{{ $product->id }}</p>
    </div>
@endisset

@isset($product->store_id)
    {{-- Store Id Field --}}
    <div class="form-group col-md-12 show-margin-fix">
        {!! Form::label("store_id", \Lang::get("attributes.store_id").":") !!}
        <p>{{ $product->store->name }}</p>
    </div>
@endisset

@isset($product->name)
    {{-- Name Field --}}
    <div class="form-group col-md-12 show-margin-fix">
        {!! Form::label("name", \Lang::get("attributes.name").":") !!}
        <p>{{ $product->name }}</p>
    </div>
@endisset

@if($product->productInfos->count() > 0)
    {{-- Brand Field --}}
    <div class="form-group col-md-12 show-margin-fix">
        {!! Form::label("brand", \Lang::get("attributes.brand").":") !!}
        <p>{{ $product->productInfos->first()->brand }}</p>
    </div>
@endif

@if($product->productInfos->count() > 0)
    {{-- Model Field --}}
    <div class="form-group col-md-12 show-margin-fix">
        {!! Form::label("model", \Lang::get("attributes.model").":") !!}
        <p>{{ $product->productInfos->first()->model }}</p>
    </div>
@endif

@if($product->productInfos->count() > 0)
    {{-- Price Field --}}
    <div class="form-group col-md-12 show-margin-fix">
        {!! Form::label("price", \Lang::get("attributes.price").":") !!}
        <p>R$ {{ $product->productInfos->first()->price }}</p>
    </div>
@endif

@isset($product->description)
    {{-- Description Field --}}
    <div class="form-group col-md-12 show-margin-fix">
        {!! Form::label("description", \Lang::get("attributes.description").":") !!}
        <p>{{ $product->description }}</p>
    </div>
@endisset

@if($product->productInfos->count() > 0)
    {{-- Product Infos Field --}}
    <div class="form-group col-md-12 show-margin-fix">
        <table class="table table-bordered table-striped table-content-size table-scroll-x">
            <thead>
                <tr>
                    <th>{!! Form::label("size", \Lang::get("attributes.size"), ["class" => "no-margin"]) !!}</th>
                    <th>{!! Form::label("stock", \Lang::get("attributes.stock"), ["class" => "no-margin"]) !!}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($product->productInfos as $productInfo)
                    <tr>
                        <td>{{ $productInfo->size }}</td>
                        <td>{{ $productInfo->stock }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endif
