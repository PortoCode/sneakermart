@extends('public.layouts.app')

<head>
    <title>Loja</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        .store-pic{
            width: 20rem;
            height: 20rem;
            object-fit: cover;
        }
        .product-pic{
            width: 6rem;
            height: 6rem;
            object-fit: cover;
            float: left;
            margin-right: 5%;
        }
        .store-btn{
            margin: 0.2rem;
        }
        td{
            vertical-align:middle!important;
        }
        .table thead th {
            border-bottom: 2px solid #4fd5d5!important;
            border-top: 2px solid #4fd5d5!important;
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
        h4{
            font-size: 30px !important;
        }
        h6{
            text-align: justify;
            font-size: 15px !important;
            font-family: Verdana,sans-serif !important;
        }
        .div-pic,
        .align-center{
            display: flex;
            justify-content: flex-end;
            align-items: center;
        }
        .info{
            font-size: 15px !important;
            font-family: Verdana,sans-serif !important;
        }
        #comment-to-store{
            padding-top: 15px;
            padding-bottom: 15px;
        }
        .product-row{
            padding-top: 15px !important;
            padding-bottom: 15px !important;
            border-top: 1px solid rgba(0,0,0,.125) !important;
        }
        .comment-author{
            margin-left: 2%;
            font-size: 13px;
        }
        .div-span-evaluation{
            float: left;
        }
        .span-evaluation {
            display: inline-block;
            width: 25px;
            height: 25px;
            margin: 6px;
        }
        .div-evaluation{
            margin-top: 1em;
        }
        .div-comment{
            margin-left: 5%;
            justify-content: center;
            align-items: center;
        }
        .product-price{
            font-weight: bold;
        }
        .div-product-info{
            display: flex;
            align-items: center;
        }
        .div-product-info p{
            margin-bottom: 0px;
        }
        .show-product{
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: flex-end;
        }
        .show-product a{
            margin-right: 2%;
        }
        .col-store-info{
            margin-left: 19%;
        }
        .col-store-pic{
            margin-right: 19%;
        }
    </style>
</head>
@section('content')
    <div class="content">
        <div class="row">
            <div class="col col-store-info">
                <div class="card-header">
                    <h4>{{ $store->name }}</h4>
                    <div class="card-tools">
                    </div>
                </div>
                <div class="card-body">
                    <div class="row" >
                        <div class="col-12 col-sm-7 col-md-12 info">
                            <b>Nome: </b>{{ $store->name }}<br>
                            <b>Telefone: </b>{{ $store->phone_number }}<br>
                            <b>Endereço: </b>{{ $store->readable_address }}<br>

                            <b>Avaliações da Loja</b><br>
                            <div class="btn-group btn-group-toggle div-evaluation">
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
            <div class="col col-store-pic">
                <div class="card-body div-pic">
                    <div class="row" >
                        <div class="col">
                            <img class="store-pic" src="{{asset('images/defaults/default_store.png')}}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="container mt-3">
                        <h3>Informações da Loja</h3>
                        <br>
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" href="#tab-products">Produtos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#tab-comments">Comentários</a>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content border mb-3">
                            <div id="tab-products" class="container tab-pane active"><br>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="container-fluid">
                                            @foreach($store->products as $product)
                                                <div class="row product-row">
                                                    <div class="col div-product-info">
                                                        <img class="product-pic" src="{{asset('images/defaults/default_product_2.png')}}">
                                                        <div>
                                                            <p>{{ $product->name }}</p>
                                                            <p class="product-price">R$ {{ $product->productInfos->first()->price }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="col"><div class="show-product"><a href="{{ route('products.showPage', $product->id) }}" class='btn btn-primary btn-s float-right'>Página do produto</a></div></div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="tab-comments" class="container tab-pane fade"><br>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="container-fluid">
                                            <div class="row product-row">
                                                <div class="col">
                                                    <div class="div-span-evaluation">
                                                        <span class="rounded-lg span-evaluation" style="background-color: green!important;"></span>
                                                    </div>
                                                    <div class="div-comment">
                                                        <p>"Excelente atendimento. O produto chegou em perfeito estado. Obrigado e Parabéns!"</p>
                                                        <p class="comment-author">De Joel Pereira de Souza Junior em 23 de Junho de 2021.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row product-row">
                                                <div class="col">
                                                    <div class="div-span-evaluation">
                                                        <span class="rounded-lg span-evaluation" style="background-color: green!important;"></span>
                                                    </div>
                                                    <div class="div-comment">
                                                        <p>"Vendedor atencioso e cumpriu o combinado!"</p>
                                                        <p class="comment-author">De Luciano B. em 7 de Fevereiro de 2021.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row product-row">
                                                <div class="col">
                                                    <div class="div-span-evaluation">
                                                        <span class="rounded-lg span-evaluation" style="background-color: green!important;"></span>
                                                    </div>
                                                    <div class="div-comment">
                                                        <p>"Chegou antes do prazo, produto com boa relação custo x benefício, recomendo."</p>
                                                        <p class="comment-author">De Pedro José em 14 de Fevereiro de 2021.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>   
                            </div>
                        </div>
                    </div>
                    
                    <div class="container align-center">
                        <a href="#" id="comment-to-store">
                            Deixar um comentário para a Loja
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <br>
    </div>

    <script>
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

        // Tab
        $(document).ready(function(){
            $(".nav-tabs a").click(function(){
                $(this).tab('show');
            });
        });
    </script>
@endsection
