@extends('layouts.app')

<head>
    <style>
        .profile-pic{
            width: 10rem;
            height: 12rem;
            object-fit: cover;
            box-shadow: 0 6px 10px #4fd5d5;
        }
        .product-pic{
            width: 6rem;
            height: 6rem;
            object-fit: cover;
            box-shadow: 0 6px 10px #4fd5d5;
        }
        .profile-btn{
            margin: 0.2rem;
        }
        td{
            vertical-align:middle!important;
        }
        .table-bordered {
            border: 2px solid #4fd5d5!important;
        }
        .table-bordered td{
            border: 2px solid #4fd5d5!important;
        }
        .table thead th {
            border-bottom: 2px solid #4fd5d5!important;
            border-top: 2px solid #4fd5d5!important;
        }
        .tab{
            margin-left:1em;
            margin-bottom:0!important;
        }
    </style>
</head>
@section('content')
    <section class="content-header">
    </section>
    <div class="content">
        @include('flash::message')
        <div class="clearfix"></div>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h4>Pedidos realizados</h4>
                        <div class="card-tools">
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <table class="table">
                                <thead>
                                    <tr>    
                                        <th scope="col"></th>
                                        <th scope="col">Produto</th>
                                        <th scope="col">Núm.</th>
                                        <th scope="col">Valor</th>
                                        <th scope="col">Frete</th>
                                        <th scope="col">Status</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($realized_orders as $order)
                                        @foreach($order->orderProducts as $product)
                                            <tr>
                                                <th scope="row">
                                                    <img class="product-pic" src="{{asset('images/defaults/default_product_2.png')}}">
                                                </th>
                                                <td>{{ $product->productInfo->product->name }}</td>
                                                <td>{{ $product->productInfo->size }}</td>
                                                <td>R$ {{ $product->productInfo->price }}</td>
                                                <td>R$ {{ $order->shipping_fee }}</td>
                                                <td>Envio pendente</td>
                                                <td>
                                                    <a href="#" class='btn btn-primary btn-xs float-right profile-btn align-bottom open-realized-modal' productInfo='{{ $product->productInfo->id }}'>
                                                        Detalhes
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if(\Auth::user()->stores->first() != null)
            <br>
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h4>Pedidos recebidos</h4>
                            <div class="card-tools">
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col"></th>
                                            <th scope="col">Produto</th>
                                            <th scope="col">Núm.</th>
                                            <th scope="col">Valor</th>
                                            <th scope="col">Frete</th>
                                            <th scope="col">Status</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($received_orders as $order)
                                            @foreach($order->orderProducts as $product)
                                                <tr>
                                                    <th scope="row">
                                                        <img class="product-pic" src="{{asset('images/defaults/default_product_2.png')}}">
                                                    </th>
                                                    <td>{{ $product->productInfo->product->name }}</td>
                                                    <td>{{ $product->productInfo->size }}</td>
                                                    <td>R$ {{ $product->productInfo->price }}</td>
                                                    <td>R$ {{ $order->shipping_fee }}</td>
                                                    <td>Envio pendente</td>
                                                    <td>
                                                        <a href="#" class='btn btn-primary btn-xs float-right profile-btn align-bottom open-received-modal' productInfo='{{ $product->productInfo->id }}'>
                                                            Detalhes
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
        @endif
    </div>

@endsection

@foreach($realized_orders as $order)
    @foreach($order->orderProducts as $product)
        <div class="modal fade" id="realized-order-modal{{ $product->productInfo->id }}" style="display:none">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <img class="product-pic" src="{{asset('images/defaults/default_product_2.png')}}">
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col">
                                <b>{{ $product->productInfo->product->name }} - {{ $order->id }}</b>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <b>Vendedor: </b><a href="#">{{ $order->store->name }}</a>.
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <b>Tamanho:</b> {{ $product->productInfo->size }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <b>Quantidade:</b> {{ $product->quantity }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <b>Valor total:</b> R$ {{ $product->productInfo->price + $order->shipping_fee }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <b>Método de pagamento:</b> Boleto
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <b>Status da entrega:</b> Envio pendente.
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <b>Código de Rastreio:</b> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endforeach
    
@foreach($received_orders as $order)
    @foreach($order->orderProducts as $product)
        <div class="modal fade" id="received-order-modal{{ $product->productInfo->id }}" style="display:none">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <img class="product-pic" src="{{asset('images/defaults/default_product_2.png')}}">
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col">
                                <b>{{ $product->productInfo->product->name }} - {{ $order->id }}</b>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <b>Comprador: </b><a href="#">{{ $order->buyer->name }}</a>.
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <b>Tamanho:</b> {{ $product->productInfo->size }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <b>Quantidade:</b> {{ $product->quantity }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <b>Valor total:</b> R$ {{ $product->productInfo->price + $order->shipping_fee }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <b>Endereço de entrega:</b> {{ $order->deliveryInfo->address }}, {{ $order->deliveryInfo->number }}.<p class="tab">{{ $order->deliveryInfo->neighborhood }}</p><p class="tab">{{ $order->deliveryInfo->city }} - {{ $order->deliveryInfo->state }}. {{ $order->deliveryInfo->zipcode }}.</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <b>Status do pagamento:</b> Envio pendente.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endforeach

@push('page_scripts')
    <script>
        $(document).ready(function () {
            $(document).on('click', '.open-realized-modal', function () {
                productInfo = $(this).attr('productInfo');
                $('#realized-order-modal'+productInfo).modal();
            });

            $(document).on('click', '.open-received-modal', function () {
                productInfo = $(this).attr('productInfo');
                $('#received-order-modal'+productInfo).modal();
            });
        });
    </script>
@endpush
