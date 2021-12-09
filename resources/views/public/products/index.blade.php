@extends('public.layouts.app')

<head>
    <style>
        *,*:after,*:before{
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            -ms-box-sizing: border-box;
            box-sizing: border-box;
        }
        img{
            max-width: 100%;
        }
        .container div ul:first-child{
            padding: 0 0;
        }
        .container figure, div{
            margin-left: auto;
            margin-right: auto;
        }
        figure{
            max-width: 75%;
            margin: 0 auto 40px;
            border:2px solid #fff;
        }
        figure img{
            max-width: 100%;
            min-width: 100%;
            display: block;
        }
        .ul-thumb{
            list-style: none;
            margin: 0;
            text-align: center;
        }
        .ul-thumb li{
            margin: 0 5px;
            display: inline-block;
            width: 80px;
            border:1px solid #fff;
            cursor: pointer;
        }
        .ul-thumb li img{
            display: block;
            opacity: 0.6;
        }
        .ul-thumb li img:hover{
            opacity: 1;
        }
        .active{
            opacity: 1 !important;
        }
        .comments{
            text-align: center;
        }
        .btn{
            align-items: center;
        }
        .pos-final-icon{
            margin-right: 0 !important;
        }
        .btn-evaluation-checked{
            border: 2px solid black!important;
        }
        .btn-evaluation:hover{
            transform: scale(1.2);
            border: 2px solid black!important;
        }
        .btn-evaluation{
            margin-right: 1px !important;
        }
        .btn-sneaker-checked{
            border: 2px solid !important;
            font-size: 110% !important;
        }
    </style>
</head>
@section('content')
    <div class="content">
        <div class="row">
            <div class="col-12 col-md-7">
                <div class="card-body">
                    <div class="row">
                        <div class="container">
                            <figure>
                                <img id="mainImg" src="{{asset('images/defaults/default_product_2.png')}}">
                            </figure>
                            <div>
                                <ul class="ul-thumb">
                                    <li><img class="thumb active" src="{{asset('images/defaults/default_product_2.png')}}"></li>
                                    <li><img class="thumb" src="{{asset('images/defaults/default_product_1.png')}}"></li>
                                    <li><img class="thumb" src="{{asset('images/defaults/default_store.png')}}"></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-5">
                <div class="card-header">
                    <h4>{{ $product->name }}</h4>
                    <div class="card-tools">
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h6>Envio com nota fiscal</h6>
                            <br>
                            <h4>R$ {{ $product->productInfos->first()->price }}</h4>
                            <br>
                            <h4><b>Marca: </b>{{ $product->productInfos->first()->brand }}</h4>
                            <br>
                            <h4><b>Modelo: </b>{{ $product->productInfos->first()->model }}</h4>
                            <br>
                            <h4>{{ $product->description }}</h4>
                            @foreach($product->productInfos as $product_info)
                                <input type="radio" class="btn-check size-option" name="size-option" autocomplete="off">
                                <label class="btn btn-secondary btn-sneaker" for="size-option">{{ $product_info->size }}</label>
                            @endforeach
                            <div class="col">
                                <a href="{{ route('carts.show', 1) }}" class='btn btn-primary btn-s product-btn align-bottom btn-size btn-text-center black-color'>
                                    <span>COMPRAR</span>
                                </a>
                            </div>
                            <br>
                            <h6>Vendedor</h6>
                            <div class="btn-group btn-group-toggle">
                                <label class="btn btn-evaluation" style="background-color: red!important;">
                                    <input type="radio" name="options" id="option1" autocomplete="off">
                                </label>
                                <label class="btn btn-evaluation" style="background-color: orange!important;">
                                    <input type="radio" name="options" id="option2" autocomplete="off">
                                </label>
                                <label class="btn btn-evaluation" style="background-color: yellow!important;">
                                    <input type="radio" name="options" id="option3" autocomplete="off">
                                </label>
                                <label class="btn btn-evaluation" style="background-color: lightgreen!important;">
                                    <input type="radio" name="options" id="option4" autocomplete="off">
                                </label>
                                <label class="btn btn-evaluation btn-evaluation-checked" style="background-color: green!important;">
                                    <input type="radio" name="options" id="option5" autocomplete="off" checked>
                                </label>
                                <h6 style="margin-left: 5px; text-decoration: underline;">
                                    <a href="">(20 avaliações)</a>
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-12 col-md-7">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5>COMENTÁRIOS</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col comments">
                            <i class="fas fa-comment-alt"></i>
                            <h6>Ainda não há comentários</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-5">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <a href="#" class='btn btn-primary btn-s product-btn align-bottom btn-size black-color'>
                                <i class="far fa-credit-card align-icon"></i>
                                <span>Formas de pagamento</span>
                                <div class="pos-final-icon">
                                    <i class="fas fa-chevron-right"></i>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>      
            </div>
        </div>
    </div>
    <script>
        // Images
        let thumbnails = document.getElementsByClassName('thumb')
        let activeImages = document.getElementsByClassName('active')

        for (var i=0; i < thumbnails.length; i++){
            thumbnails[i].addEventListener('click', function(){
                if (activeImages.length > 0){
                    activeImages[0].classList.remove('active')
                }
                
                this.classList.add('active')
                document.getElementById("mainImg").src = this.src
            })
        }

        // Sneakers
        let sneakers = document.getElementsByClassName('btn-sneaker')
        let checkedSneakers = document.getElementsByClassName('btn-sneaker-checked')

        for (var i=0; i < sneakers.length; i++){
            sneakers[i].addEventListener('click', function(){
                if (checkedSneakers.length > 0){
                    checkedSneakers[0].classList.remove('btn-sneaker-checked')
                }
                this.classList.add('btn-sneaker-checked')
            })
        }

        // Evaluations
        let evaluations = document.getElementsByClassName('btn-evaluation')
        let checkedEvaluations = document.getElementsByClassName('btn-evaluation-checked')

        for (var i=0; i < evaluations.length; i++){
            evaluations[i].addEventListener('click', function(){
                if (checkedEvaluations.length > 0){
                    checkedEvaluations[0].classList.remove('btn-evaluation-checked')
                }
                this.classList.add('btn-evaluation-checked')
            })
        }
    </script>
@endsection
