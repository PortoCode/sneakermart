@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>
                        {!! mb_strtoupper(\Lang::get("text.edit"), "UTF-8") !!}
                        {!! mb_strtoupper(\Lang::choice("tables.stores", "s"), "UTF-8") !!}
                    </h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::model($store, ['route' => ['stores.update', $store->id], 'method' => 'patch']) !!}

            <div class="card-body">
                <div class="row">
                    @include('admin.stores.fields')
                </div>
            </div>

            <div class="card-footer">
                {!! Form::submit(\Lang::get("text.save"), ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('stores.index') }}" class="btn btn-default">{{ \Lang::get("text.cancel") }}</a>
            </div>

           {!! Form::close() !!}

        </div>
    </div>
@endsection
