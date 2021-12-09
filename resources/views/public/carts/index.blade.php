@extends('public.layouts.app')

<head>
    <title>Loja</title>
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
    </style>
</head>
@section('content')
    <div class="content">
        <div class="row">
            <div class="col margin-left">
                <div class="card w-100">
                    <div class="card-body">
                        <div class="row">
                            <h4 class="header-title">Meu carrinho</h4><br>

                            <div class="card w-100">
                                <div class="card-body card-flex">
                                    <div class="col-lg-3">
                                        <img class="product-pic" src="{{asset('images/defaults/default_product_3.jpeg')}}">
                                    </div>
                                    <div class="col-lg-9">
                                        <p>Tênis Nike SB Charge Blue</p>
                                        <p>Tamanho: 40</p>
                                        <label for="quantidade">Quantidade:</label>
                                        <input class="quantity" type="number" id="quantidade" name="quantidade" min="1" max="99" value="1" onclick="calculate()">
                                        <p>Individual: R$ <span class="item-individual">700,00</span></p>
                                        <p>Subtotal: R$ <span class="item-subtotal">700,00</span></p>
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
                                        <label for="quantidade">Quantidade:</label>
                                        <input class="quantity" type="number" id="quantidade" name="quantidade" min="1" max="99" value="1" onclick="calculate()">
                                        <p>Individual: R$ <span class="item-individual">850,00</span></p>
                                        <p>Subtotal: R$ <span class="item-subtotal">850,00</span></p>
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
                                        <label for="quantidade">Quantidade:</label>
                                        <input class="quantity" type="number" id="quantidade" name="quantidade" min="1" max="99" value="1" onclick="calculate()">
                                        <p>Individual: R$ <span class="item-individual">900,00</span></p>
                                        <p>Subtotal: R$ <span class="item-subtotal">900,00</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-5 margin-right">
                <div class="card w-100">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h4 class="header-title">Resumo da compra</h4>
                                <br>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label>Subtotal (3 itens)</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="label-right">R$ <span class="cart-subtotal"></span></label>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label>Frete</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="label-right">Grátis</label>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label>Descontos</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="label-right">R$ <span class="cart-discount">0,00</span></label>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label>Valor total</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="label-right">R$ <span class="cart-total"></span></label>
                                    </div>
                                </div>
                                <br>
                                <a href="{{ route('orders.show', 1) }}" class='btn btn-primary btn-s product-btn align-bottom btn-size btn-text-center black-color'>
                                    <span>Continuar</span>
                                </a>
                                <br>
                                <a href="{{ route('home.show', 1) }}" class='btn btn-primary btn-s product-btn align-bottom btn-size btn-text-center black-color'>
                                    <span>Escolher mais produtos</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-12 col-md-12">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h4 class="shipping header-title">Simular frete</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <form class="form-inline">
                                <div class="form-group mx-sm-3 mb-2">
                                    <input type="text" class="form-control" id="inputCep" placeholder="37540-000">
                                </div>
                                <button type="submit" class="btn btn-primary mb-2">Calcular</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        calculateTotal()

        function numberWithCommas(x) {
            return x.toString().replace('.', ',')
        }

        function calculate(){
            let quantityItems = document.getElementsByClassName('quantity')
            let individualItems = document.getElementsByClassName('item-individual')
            let subtotalItems = document.getElementsByClassName('item-subtotal')

            for (var i=0; i < subtotalItems.length; i++){
                subtotalItems[i].innerHTML = numberWithCommas((parseFloat(quantityItems[i].value) * parseFloat(individualItems[i].innerText)).toFixed(2))
            }

            calculateTotal()
        }

        function calculateTotal(){
            let subtotalItems = document.getElementsByClassName('item-subtotal')
            let cartSubtotal = document.getElementsByClassName('cart-subtotal')[0]
            let cartDiscount = document.getElementsByClassName('cart-discount')[0]
            let cartTotal = document.getElementsByClassName('cart-total')[0]
            
            let subtotal = 0
            for (var i=0; i < subtotalItems.length; i++){
                subtotal += parseFloat(subtotalItems[i].innerHTML)
            }
    
            cartSubtotal.innerHTML = numberWithCommas((subtotal).toFixed(2))
            cartTotal.innerHTML = numberWithCommas((parseFloat(cartSubtotal.innerHTML) - parseFloat(cartDiscount.innerHTML)).toFixed(2))
        }
    </script>
@endsection
