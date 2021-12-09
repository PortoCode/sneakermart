@extends('public.layouts.app')

<head>
    <title>Pedido</title>
    <style>
        .btn{
            align-items: center;
        }
        .header-title{
            font-weight: bold;
        }
        .shipping{
            margin-left: 1%;
        }
        .product-pic{
            width: 6rem;
            height: 6rem;
            object-fit: cover;
            box-shadow: 0 6px 10px #4fd5d5;
        }
        .margin-left{
            margin-left: 2.5%;
        }
        .margin-right{
            margin-right: 2.5%;
        }
        .card-flex{
            display: flex;
        }
        .label-right{
            float: right;
        }
        .quantity{
            margin-bottom: 2.5%;
        }
        .product-pic{
            width: 8rem;
            height: 8rem;
            object-fit: cover;
            box-shadow: 0 6px 10px #4fd5d5;
        }
        .card-flex{
            display: flex;
            align-items: center;
        }
        .margin-left{
            margin-left: 3%;
        }
        .align-items{
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .hidden {
            visibility: hidden;
            max-height: 0;
            opacity: 0;
            overflow: hidden;
            -webkit-transition: max-height 0.5s ease-out, opacity 0s ease-out;
            -moz-transition: max-height 0.5s ease-out, opacity 0s ease-out;
            -o-transition: max-height 0.5s ease-out, opacity 0s ease-out;
            transition: max-height 0.5s ease-out, opacity 0s ease-out;
        }
        .visible {
            visibility: visible;
            max-height: 2000px;
            opacity: 1;
            -webkit-transition: max-height 2s ease-in, opacity 1.5s ease-in;
            -moz-transition: max-height 2s ease-in, opacity 1.5s ease-in;
            -o-transition: max-height 2s ease-in, opacity 1.5s ease-in;
            transition: max-height 2s ease-in, opacity 1.5s ease-in;
        }
        .store-name{
            font-weight: bold;
            font-size: 2rem;
        }
    </style>
</head>
@section('content')
    <div class="content">
        <div class="row">
            <div class="col-12 col-md-12">
                <div class="card w-100">
                    <div class="row align-items">
                        <h3 class="store-name">Loja 1</h3>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-7">
                            <div class="card w-100">
                                <div class="card-body">
                                    <div class="row">
                                        <h4 class="header-title">Pedido</h4><br>
                                        <div class="card w-100">
                                            <div class="card-body card-flex">
                                                <div class="col-lg-3">
                                                    <img class="product-pic" src="{{asset('images/defaults/default_product_3.jpeg')}}">
                                                </div>
                                                <div class="col-lg-9">
                                                    <p>Tênis Nike SB Charge Blue</p>
                                                    <p>Tamanho: 40</p>
                                                    <p>Quantidade: 1</p>
                                                    <b>R$ <span class="item-subtotal-card1">700,00</span></b>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="card w-100">
                                            <div class="card-body card-flex">
                                                <div class="col-lg-3">
                                                    <img class="product-pic" src="{{asset('images/defaults/default_product_4.jpeg')}}">
                                                </div>
                                                <div class="col-lg-9">
                                                    <p>Tênis Nike SB Charge Green</p>
                                                    <p>Tamanho: 38</p>
                                                    <p>Quantidade: 1</p>
                                                    <b>R$ <span class="item-subtotal-card1">850,00</span></b>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card w-100">
                                            <div class="card-body card-flex">
                                                <div class="col-lg-3">
                                                    <img class="product-pic" src="{{asset('images/defaults/default_product_5.jpeg')}}">
                                                </div>
                                                <div class="col-lg-9">
                                                    <p>Tênis Nike SB Charge Orange</p>
                                                    <p>Tamanho: 43</p>
                                                    <p>Quantidade: 1</p>
                                                    <b>R$ <span class="item-subtotal-card1">900,00</span></b>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 col-md-12">
                                    <div class="card w-100">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <label>Subtotal</label>
                                                </div>
                                                <div class="col-lg-6">
                                                    <label class="label-right card-store">R$ <span class="store-subtotal-card1"></span></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-5">
                            <div class="card w-100">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h4 class="header-title">Endereços</h4>
                                            <br>
                                            @if(count($delivery_infos) > 0)
                                                @foreach($delivery_infos as $delivery_info)
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="address1" name="customRadio" class="custom-control-input">
                                                        <label class="custom-control-label" for="address1">{{ $delivery_info->address }}, {{ $delivery_info->number }}, {{ $delivery_info->neighborhood }}.<br>{{ $delivery_info->city }} - {{ $delivery_info->state }}.<br>{{ $delivery_info->zipcode }}<br>Destinatário: {{ $delivery_info->recipient_name }}<br></label>
                                                        <h6><a href="" data-toggle="modal" data-target="#addressModal" data-whatever="@fat">Editar</a></h6>
                                                    </div>
                                                    <hr>
                                                @endforeach
                                            @endif
                                            <hr>
                                            <a href="#" class='btn btn-primary btn-s align-bottom btn-size btn-text-center black-color' data-toggle="modal" data-target="#createAddressModal" data-whatever="@fat" style="margin-left:25%;margin-right:25%;">
                                                <span>Inserir novo endereço</span>
                                            </a>

                                            @foreach($delivery_infos as $delivery_info)
                                                <!-- Address Modal -->
                                                <div class="modal fade" id="addressModal" tabindex="-1" role="dialog" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="addressModalLabel">Novo endereço</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div id="addressInfos">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <div class="input-group mb-3">
                                                                            <input type="zipcode"
                                                                                name="address_infos[zipcode]"
                                                                                id="zipcode"
                                                                                class="form-control zipcode-mask must-be-required"
                                                                                value="{{ $delivery_info->zipcode }}"
                                                                                placeholder="CEP">
                                                                            <div class="input-group-append">
                                                                                <div class="input-group-text"><span class="fas fa-map-pin"></span></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <div class="input-group mb-3">
                                                                            <input type="address"
                                                                                name="address_infos[address]"
                                                                                id="address"
                                                                                class="form-control must-be-required"
                                                                                value="{{ $delivery_info->address }}"
                                                                                placeholder="Rua">
                                                                            <div class="input-group-append">
                                                                                <div class="input-group-text"><span class="fas fa-map-marker-alt"></span></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <div class="input-group mb-3">
                                                                            <input type="complement"
                                                                                name="address_infos[complement]"
                                                                                id="complement"
                                                                                class="form-control"
                                                                                value="{{ $delivery_info->complement }}"
                                                                                placeholder="Complemento">
                                                                            <div class="input-group-append">
                                                                                <div class="input-group-text"><span class="fas fa-map-signs"></span></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-8">
                                                                        <div class="input-group mb-3">
                                                                            <input type="neighborhood"
                                                                                name="address_infos[neighborhood]"
                                                                                id="neighborhood"
                                                                                class="form-control must-be-required"
                                                                                value="{{ $delivery_info->neighborhood }}"
                                                                                placeholder="Bairro">
                                                                            <div class="input-group-append">
                                                                                <div class="input-group-text"><span class="fas fa-map-marker"></span></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-4">
                                                                        <div class="input-group mb-3">
                                                                            <input type="address_number"
                                                                                name="address_infos[address_number]"
                                                                                class="form-control must-be-required"
                                                                                value="{{ $delivery_info->number }}"
                                                                                placeholder="Num">
                                                                            <div class="input-group-append">
                                                                                <div class="input-group-text"><span class="fas fa-sort-numeric-up"></span></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-8">
                                                                        <div class="input-group mb-3">
                                                                            <input type="city"
                                                                                name="address_infos[city]"
                                                                                id="city"
                                                                                class="form-control must-be-required"
                                                                                value="{{ $delivery_info->city }}"
                                                                                placeholder="Cidade">
                                                                            <div class="input-group-append">
                                                                                <div class="input-group-text"><span class="far fa-map"></span></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-4">
                                                                        <div class="input-group mb-3">
                                                                            <input type="state"
                                                                                name="address_infos[state]"
                                                                                id="state"
                                                                                class="form-control state-mask must-be-required"
                                                                                value="{{ $delivery_info->state }}"
                                                                                placeholder="Estado">
                                                                            <div class="input-group-append">
                                                                                <div class="input-group-text"><span class="fas fa-map-marked-alt"></span></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary black-color" data-dismiss="modal">Cancelar</button>
                                                            <button type="button" class="btn btn-primary black-color">Salvar</button>
                                                        </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End Address Modal -->
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card w-100">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h4 class="header-title">Opções de entrega</h4>
                                            <br>
                                            <div class="custom-control custom-radio">
                                                <div class="row align-items">
                                                    <div class="col-lg-4">
                                                        <input type="radio" id="transport1" name="customRadio2" class="custom-control-input">
                                                        <label class="custom-control-label" for="transport1">Normal</label>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <h6>GRÁTIS</h6>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <h6>26 a 29-ago</h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="custom-control custom-radio">
                                                <div class="row align-items">
                                                    <div class="col-lg-4">
                                                        <input type="radio" id="transport2" name="customRadio2" class="custom-control-input">
                                                        <label class="custom-control-label" for="transport2">Sedex</label>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <h6>GRÁTIS</h6>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <h6>19 a 24-ago</h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card w-100">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h4 class="header-title">Forma de pagamento</h4>
                                            <br>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="creditCard" name="customRadio3" class="custom-control-input">
                                                <label class="custom-control-label" for="creditCard">Cartão de Crédito</label>
                                            </div>

                                            <div id="creditCardInfos" class="hidden must-change">
                                                <br>
                                                <div class="row hidden must-change">
                                                    <div class="col-12">
                                                        <div class="input-group mb-3">
                                                            <input type="card-number"
                                                                name="credit_card_infos[card-number]"
                                                                id="card-number"
                                                                class="form-control card-number-mask must-be-required"
                                                                placeholder="Número do Cartão: 0000 0000 0000 0000">
                                                            <div class="input-group-append">
                                                                <div class="input-group-text"><span class="fas fa-credit-card"></span></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row hidden must-change">
                                                    <div class="col-12">
                                                        <div class="input-group mb-3">
                                                            <input type="complement"
                                                                name="credit_card_infos[complement]"
                                                                id="complement"
                                                                class="form-control"
                                                                placeholder="Seu Nome (como no cartão)">
                                                            <div class="input-group-append">
                                                                <div class="input-group-text"><span class="fas fa-address-card"></span></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row hidden must-change">
                                                    <div class="col-6">
                                                        <div class="input-group mb-3">
                                                            <input type="neighborhood"
                                                                name="credit_card_infos[neighborhood]"
                                                                id="neighborhood"
                                                                class="form-control must-be-required"
                                                                placeholder="Ano de vencimento">
                                                            <div class="input-group-append">
                                                                <div class="input-group-text"><span class="fas fa-calendar-alt"></span></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="input-group mb-3">
                                                            <input type="address_number"
                                                                name="credit_card_infos[address_number]"
                                                                class="form-control must-be-required"
                                                                placeholder="Mês de vencimento">
                                                            <div class="input-group-append">
                                                                <div class="input-group-text"><span class="fas fa-calendar-alt"></span></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row hidden must-change">
                                                    <div class="col-12">
                                                        <div class="input-group mb-3">
                                                            <input type="complement"
                                                                name="credit_card_infos[complement]"
                                                                id="complement"
                                                                class="form-control"
                                                                placeholder="Código de segurança (cvv)">
                                                            <div class="input-group-append">
                                                                <div class="input-group-text"><span class="fas fa-shield-alt"></span></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <hr>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="ticket" name="customRadio3" class="custom-control-input">
                                                <label class="custom-control-label" for="ticket">Boleto Bancário</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-12">
                <div class="card w-100">
                    <div class="row align-items">
                        <h3 class="store-name">Loja 2</h3>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-7">
                            <div class="card w-100">
                                <div class="card-body">
                                    <div class="row">
                                        <h4 class="header-title">Pedido</h4><br>
                                        <div class="card w-100">
                                            <div class="card-body card-flex">
                                                <div class="col-lg-3">
                                                    <img class="product-pic" src="{{asset('images/defaults/default_product_3.jpeg')}}">
                                                </div>
                                                <div class="col-lg-9">
                                                    <p>Tênis Nike SB Charge Blue</p>
                                                    <p>Tamanho: 40</p>
                                                    <p>Quantidade: 1</p>
                                                    <b>R$ <span class="item-subtotal-card2">400,00</span></b>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="card w-100">
                                            <div class="card-body card-flex">
                                                <div class="col-lg-3">
                                                    <img class="product-pic" src="{{asset('images/defaults/default_product_4.jpeg')}}">
                                                </div>
                                                <div class="col-lg-9">
                                                    <p>Tênis Nike SB Charge Green</p>
                                                    <p>Tamanho: 38</p>
                                                    <p>Quantidade: 1</p>
                                                    <b>R$ <span class="item-subtotal-card2">250,00</span></b>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card w-100">
                                            <div class="card-body card-flex">
                                                <div class="col-lg-3">
                                                    <img class="product-pic" src="{{asset('images/defaults/default_product_5.jpeg')}}">
                                                </div>
                                                <div class="col-lg-9">
                                                    <p>Tênis Nike SB Charge Orange</p>
                                                    <p>Tamanho: 43</p>
                                                    <p>Quantidade: 1</p>
                                                    <b>R$ <span class="item-subtotal-card2">600,00</span></b>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 col-md-12">
                                    <div class="card w-100">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <label>Subtotal</label>
                                                </div>
                                                <div class="col-lg-6">
                                                    <label class="label-right card-store">R$ <span class="store-subtotal-card2"></span></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-5">
                            <div class="card w-100">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h4 class="header-title">Endereços</h4>
                                            <br>
                                            @if(count($delivery_infos) > 0)
                                                @foreach($delivery_infos as $delivery_info)
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="address1" name="customRadio" class="custom-control-input">
                                                        <label class="custom-control-label" for="address1">{{ $delivery_info->address }}, {{ $delivery_info->number }}, {{ $delivery_info->neighborhood }}.<br>{{ $delivery_info->city }} - {{ $delivery_info->state }}.<br>{{ $delivery_info->zipcode }}<br>Destinatário: {{ $delivery_info->recipient_name }}<br></label>
                                                        <h6><a href="" data-toggle="modal" data-target="#addressModal" data-whatever="@fat">Editar</a></h6>
                                                    </div>
                                                    <hr>
                                                @endforeach
                                            @endif
                                            <a href="#" class='btn btn-primary btn-s align-bottom btn-size btn-text-center black-color' data-toggle="modal" data-target="#addressModal" data-whatever="@fat" style="margin-left:25%;margin-right:25%;">
                                                <span>Inserir novo endereço</span>
                                            </a>

                                            <!-- Address Modal -->
                                            <div class="modal fade" id="addressModal" tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="addressModalLabel">Novo endereço</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div id="addressInfos">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="input-group mb-3">
                                                                        <input type="zipcode"
                                                                            name="address_infos[zipcode]"
                                                                            id="zipcode"
                                                                            class="form-control zipcode-mask must-be-required"
                                                                            placeholder="CEP">
                                                                        <div class="input-group-append">
                                                                            <div class="input-group-text"><span class="fas fa-map-pin"></span></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="input-group mb-3">
                                                                        <input type="address"
                                                                            name="address_infos[address]"
                                                                            id="address"
                                                                            class="form-control must-be-required"
                                                                            placeholder="Rua">
                                                                        <div class="input-group-append">
                                                                            <div class="input-group-text"><span class="fas fa-map-marker-alt"></span></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="input-group mb-3">
                                                                        <input type="complement"
                                                                            name="address_infos[complement]"
                                                                            id="complement"
                                                                            class="form-control"
                                                                            placeholder="Complemento">
                                                                        <div class="input-group-append">
                                                                            <div class="input-group-text"><span class="fas fa-map-signs"></span></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-8">
                                                                    <div class="input-group mb-3">
                                                                        <input type="neighborhood"
                                                                            name="address_infos[neighborhood]"
                                                                            id="neighborhood"
                                                                            class="form-control must-be-required"
                                                                            placeholder="Bairro">
                                                                        <div class="input-group-append">
                                                                            <div class="input-group-text"><span class="fas fa-map-marker"></span></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-4">
                                                                    <div class="input-group mb-3">
                                                                        <input type="address_number"
                                                                            name="address_infos[address_number]"
                                                                            class="form-control must-be-required"
                                                                            placeholder="Num">
                                                                        <div class="input-group-append">
                                                                            <div class="input-group-text"><span class="fas fa-sort-numeric-up"></span></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-8">
                                                                    <div class="input-group mb-3">
                                                                        <input type="city"
                                                                            name="address_infos[city]"
                                                                            id="city"
                                                                            class="form-control must-be-required"
                                                                            placeholder="Cidade">
                                                                        <div class="input-group-append">
                                                                            <div class="input-group-text"><span class="far fa-map"></span></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-4">
                                                                    <div class="input-group mb-3">
                                                                        <input type="state"
                                                                            name="address_infos[state]"
                                                                            id="state"
                                                                            class="form-control state-mask must-be-required"
                                                                            placeholder="Estado">
                                                                        <div class="input-group-append">
                                                                            <div class="input-group-text"><span class="fas fa-map-marked-alt"></span></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary black-color" data-dismiss="modal">Cancelar</button>
                                                        <button type="button" class="btn btn-primary black-color">Salvar</button>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Address Modal -->
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card w-100">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h4 class="header-title">Opções de entrega</h4>
                                            <br>
                                            <div class="custom-control custom-radio">
                                                <div class="row align-items">
                                                    <div class="col-lg-4">
                                                        <input type="radio" id="transport1" name="customRadio2" class="custom-control-input">
                                                        <label class="custom-control-label" for="transport1">Normal</label>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <h6>GRÁTIS</h6>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <h6>26 a 29-ago</h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="custom-control custom-radio">
                                                <div class="row align-items">
                                                    <div class="col-lg-4">
                                                        <input type="radio" id="transport2" name="customRadio2" class="custom-control-input">
                                                        <label class="custom-control-label" for="transport2">Sedex</label>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <h6>GRÁTIS</h6>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <h6>19 a 24-ago</h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card w-100">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h4 class="header-title">Forma de pagamento</h4>
                                            <br>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="creditCard" name="customRadio3" class="custom-control-input">
                                                <label class="custom-control-label" for="creditCard">Cartão de Crédito</label>
                                            </div>

                                            <div id="creditCardInfos" class="hidden must-change">
                                                <br>
                                                <div class="row hidden must-change">
                                                    <div class="col-12">
                                                        <div class="input-group mb-3">
                                                            <input type="card-number"
                                                                name="credit_card_infos[card-number]"
                                                                id="card-number"
                                                                class="form-control card-number-mask must-be-required"
                                                                placeholder="Número do Cartão: 0000 0000 0000 0000">
                                                            <div class="input-group-append">
                                                                <div class="input-group-text"><span class="fas fa-credit-card"></span></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row hidden must-change">
                                                    <div class="col-12">
                                                        <div class="input-group mb-3">
                                                            <input type="complement"
                                                                name="credit_card_infos[complement]"
                                                                id="complement"
                                                                class="form-control"
                                                                placeholder="Seu Nome (como no cartão)">
                                                            <div class="input-group-append">
                                                                <div class="input-group-text"><span class="fas fa-address-card"></span></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row hidden must-change">
                                                    <div class="col-6">
                                                        <div class="input-group mb-3">
                                                            <input type="neighborhood"
                                                                name="credit_card_infos[neighborhood]"
                                                                id="neighborhood"
                                                                class="form-control must-be-required"
                                                                placeholder="Ano de vencimento">
                                                            <div class="input-group-append">
                                                                <div class="input-group-text"><span class="fas fa-calendar-alt"></span></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="input-group mb-3">
                                                            <input type="address_number"
                                                                name="credit_card_infos[address_number]"
                                                                class="form-control must-be-required"
                                                                placeholder="Mês de vencimento">
                                                            <div class="input-group-append">
                                                                <div class="input-group-text"><span class="fas fa-calendar-alt"></span></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row hidden must-change">
                                                    <div class="col-12">
                                                        <div class="input-group mb-3">
                                                            <input type="complement"
                                                                name="credit_card_infos[complement]"
                                                                id="complement"
                                                                class="form-control"
                                                                placeholder="Código de segurança (cvv)">
                                                            <div class="input-group-append">
                                                                <div class="input-group-text"><span class="fas fa-shield-alt"></span></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <hr>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="ticket" name="customRadio3" class="custom-control-input">
                                                <label class="custom-control-label" for="ticket">Boleto Bancário</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-2"></div>
            <div class="col-12 col-md-8">
                <br>
                <div class="row">
                    <div class="col-lg-6">
                        <label style="font-size:18px;margin-left:7.5%;">Pagamento total</label>
                    </div>
                    <div class="col-lg-6">
                        <label class="label-right" style="font-size:20px;margin-right:7.5%;">R$ <span class="payment-total"></span></label>
                    </div>
                </div>
                <br>
                <a href="#" class='btn btn-primary btn-s align-bottom btn-size btn-text-center black-color' style="margin-left:25%;margin-right:25%;"> 
                    <span>FINALIZAR COMPRA </span>
                </a>
                <br>
            </div>
            <div class="col-12 col-md-2"></div>
        </div>
    </div>

    <!-- Address Modal -->
    <div class="modal fade" id="createAddressModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addressModalLabel">Novo endereço</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="addressInfos">
                    <div class="row">
                        <div class="col-12">
                            <div class="input-group mb-3">
                                <input type="zipcode"
                                    name="address_infos[zipcode]"
                                    id="zipcode"
                                    class="form-control zipcode-mask must-be-required"
                                    placeholder="CEP">
                                <div class="input-group-append">
                                    <div class="input-group-text"><span class="fas fa-map-pin"></span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="input-group mb-3">
                                <input type="address"
                                    name="address_infos[address]"
                                    id="address"
                                    class="form-control must-be-required"
                                    placeholder="Rua">
                                <div class="input-group-append">
                                    <div class="input-group-text"><span class="fas fa-map-marker-alt"></span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="input-group mb-3">
                                <input type="complement"
                                    name="address_infos[complement]"
                                    id="complement"
                                    class="form-control"
                                    placeholder="Complemento">
                                <div class="input-group-append">
                                    <div class="input-group-text"><span class="fas fa-map-signs"></span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="input-group mb-3">
                                <input type="neighborhood"
                                    name="address_infos[neighborhood]"
                                    id="neighborhood"
                                    class="form-control must-be-required"
                                    placeholder="Bairro">
                                <div class="input-group-append">
                                    <div class="input-group-text"><span class="fas fa-map-marker"></span></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="input-group mb-3">
                                <input type="address_number"
                                    name="address_infos[address_number]"
                                    class="form-control must-be-required"
                                    placeholder="Num">
                                <div class="input-group-append">
                                    <div class="input-group-text"><span class="fas fa-sort-numeric-up"></span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="input-group mb-3">
                                <input type="city"
                                    name="address_infos[city]"
                                    id="city"
                                    class="form-control must-be-required"
                                    placeholder="Cidade">
                                <div class="input-group-append">
                                    <div class="input-group-text"><span class="far fa-map"></span></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="input-group mb-3">
                                <input type="state"
                                    name="address_infos[state]"
                                    id="state"
                                    class="form-control state-mask must-be-required"
                                    placeholder="Estado">
                                <div class="input-group-append">
                                    <div class="input-group-text"><span class="fas fa-map-marked-alt"></span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary black-color" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary black-color">Salvar</button>
            </div>
            </div>
        </div>
    </div>
    <!-- End Address Modal -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"
            integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg=="
            crossorigin="anonymous"></script>

    <script>
        $(document).ready(function () {
            $(document).on('change', '#creditCard', function (){
                if($(this).is(":checked")){
                    $(".must-change").removeClass("hidden").addClass("visible");
                    $(".must-be-required").prop('required',true);
                }
            });
            $(document).on('change', '#ticket', function (){
                if($(this).is(":checked")){
                    $(".must-change").removeClass("visible").addClass("hidden");
                    $(".must-be-required").prop('required',false);
                }
            });
        });

        calculateTotal()

        function numberWithCommas(x) {
            return x.toString().replace('.', ',')
        }
        
        function calculateTotal(){
            let cards = document.getElementsByClassName('card-store');
            let numCards = cards.length;
            let subGeneral = 0
            for (var i=1; i <= numCards; i++) {
                let subtotalItems = document.getElementsByClassName('item-subtotal-card' + i)
                let subtotal = 0
                for (var j=0; j < subtotalItems.length; j++) {
                    subtotal += parseFloat(subtotalItems[j].innerHTML)
                }
                subGeneral += subtotal
                let storeSubtotal = document.getElementsByClassName('store-subtotal-card'+ i)[0]
                storeSubtotal.innerHTML = numberWithCommas((subtotal).toFixed(2))
            }
            let paymentTotal = document.getElementsByClassName('payment-total')[0]
            paymentTotal.innerHTML = numberWithCommas((subGeneral).toFixed(2))
        }
    </script>
@endsection
