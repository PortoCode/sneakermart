@extends('layouts.app')

@section('content')
    <div class="card" style="margin-top: 1em">
        <div class="card-head">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>{!! mb_strtoupper(\Lang::choice("tables.orders", "p"), "UTF-8") !!}</h1>
                        </div>
                        <div class="col-sm-6">
                            <a class="btn btn-primary float-right"
                            href="{{ route('orders.create') }}">
                                {!! mb_strtoupper(\Lang::get("text.add"), "UTF-8") !!}
                            </a>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <div class="card-body">
            <div class="content px-3">

                @include('flash::message')

                <div class="clearfix"></div>

                @include('admin.orders.table')

                <div class="card-footer clearfix float-right">
                    <div class="float-right">

                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection