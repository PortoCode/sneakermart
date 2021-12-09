@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>
                        {!! mb_strtoupper(\Lang::choice("text.details_of", "f"), "UTF-8") !!}
                        {!! mb_strtoupper(\Lang::choice("tables.stores", "s"), "UTF-8") !!}
                    </h1>
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-default float-right"
                       href="{{ route('stores.index') }}">
                        {{ \Lang::get("text.cancel") }}
                    </a>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">
        <div class="card">

            <div class="card-body">
                <div class="row">
                    @include('admin.stores.show_fields')
                </div>
            </div>

        </div>
    </div>
@endsection
