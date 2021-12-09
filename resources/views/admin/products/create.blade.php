@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>
                        {!! mb_strtoupper(\Lang::get("text.add"), "UTF-8") !!}
                        {!! mb_strtoupper(\Lang::choice("tables.products", "s"), "UTF-8") !!}
                    </h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::open(['route' => 'products.store']) !!}

            <div class="card-body">

                <div class="row" id="create-form">
                    @include('admin.products.fields')
                </div>

            </div>

            <div class="card-footer">
                <a href="#" id="create-product" class="btn btn-primary">{{ \Lang::get("text.save") }}</a>
                <a href="{{ route('products.index') }}" class="btn btn-default">{{ \Lang::get("text.cancel") }}</a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection
