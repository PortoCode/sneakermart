@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>
                        {!! mb_strtoupper(\Lang::get("text.edit"), "UTF-8") !!}
                        {!! mb_strtoupper(\Lang::choice("tables.products", "s"), "UTF-8") !!}
                    </h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::model($product, ['route' => ['products.update', $product->id], 'method' => 'patch']) !!}

            <div class="card-body">
                <div class="row" id="edit-product">
                    @include('admin.products.fields_edit')
                </div>
            </div>

            <div class="card-footer">
                <a href="#" id="update-product-btn" class="btn btn-primary">{{ \Lang::get("text.save") }}</a>
                <a href="{{ route('products.index') }}" class="btn btn-default">{{ \Lang::get("text.cancel") }}</a>
            </div>

           {!! Form::close() !!}

        </div>
    </div>
@endsection
