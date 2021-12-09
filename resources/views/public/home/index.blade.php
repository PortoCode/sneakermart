@extends('public.layouts.app')

<head>
    <title>Home</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        .carousel-inner{
            border-radius: 8px;
        }
        .product-pic {
            width: 100px;
            height: 100px;
        }
        .label-title {
            font-size: 60px;
        }
        .form-control-borderless {
            border: none;
        }
        .form-control-borderless:hover, .form-control-borderless:active, .form-control-borderless:focus {
            border: none;
            outline: none;
            box-shadow: none;
        }
        .src-field {
            border-radius: 0;
        }
        .src-btn {
            line-height: 0.5;
            height: 38px;
            border-radius: 0;
        }
        .div-search-icon{
            margin-right: 1.5%;
        }
        .div-margin-bottom{
            margin-bottom: 20px;
        }
        .container-middle{
            margin-top: 60px; 
            margin-bottom: 20px;
        }
        .container-buttons{
            height: 150px; 
            margin-top: 70px;
            text-align: center;
        }
        .button-icon{
            font-size: 20px; 
            background: #000; 
            color: #fff; 
            padding: 10px; 
            border-radius: 50px;
        }
        .div-label-date{
            text-align: center;
        }
        .label-day{
            font-size: 20px;
        }
        .label-date{
            font-size: 10px;
        }
        .card-product{
            width: 18rem;
        }
        .number-product{
            float: right; 
            font-size: 12px; 
            background: grey; 
            color: #fff; 
            padding: 3px; 
            border-radius: 5px;
        }
        .price-product{
            font-weight: bold;
        }
    </style>
</head>
@section('content')
    <div class="content">

        <div class="container div-margin-bottom">
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-8">
                    <form>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto div-search-icon">
                                <i class="fas fa-search fa-2x"></i>
                            </div>
                            <div class="col">
                                <input class="form-control form-control-borderless src-field" type="search" placeholder="Pesquisar..">
                            </div>
                            <div class="col-auto">
                                <button class="btn btn-lg btn-success src-btn black-color" type="submit">Pesquisar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="container div-margin-bottom">
            <div class="row">
                <div class="col-lg-12">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                            <img class="d-block w-100" src="{{asset('images/sneakers/nike.jpg')}}" alt="First slide">
                            </div>
                            <div class="carousel-item">
                            <img class="d-block w-100" src="{{asset('images/sneakers/nike2.jpg')}}" alt="Second slide">
                            </div>
                            <div class="carousel-item">
                            <img class="d-block w-100" src="{{asset('images/sneakers/nike3.jpg')}}" alt="Third slide">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        {{--<div class="container div-margin-bottom">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="label-title">Sneakers do Mês</h1>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="row">
                        <div class="col-lg-2">
                            <div class="div-label-date">
                                <label class="label-day">4</label>
                                <label class="label-date">ago/21</label>
                            </div>                          
                        </div>
                        <div class="col-lg-4">
                            <img class="product-pic" src="{{asset('images/sneakers/air_jordan_1_mid_crater.png')}}" alt="First slide">
                        </div>
                        <div class="col-lg-6">
                            <label>Air Jordan 1 Mid Crater</label>
                        </div>
                    </div>     
                </div>
                <div class="col-lg-4">
                    <div class="row">
                        <div class="col-lg-2">
                            <div class="div-label-date">
                                <label class="label-day">30</label>
                                <label class="label-date">jul/21</label>
                            </div>                          
                        </div>
                        <div class="col-lg-4">
                            <img class="product-pic" src="{{asset('images/sneakers/ambush_nike_dunk_high_flash_lime.png')}}" alt="First slide">
                        </div>
                        <div class="col-lg-6">
                            <label>Ambush x Nike Dunk High Flash Lime</label>
                        </div>
                    </div>     
                </div>
                <div class="col-lg-4">
                    <div class="row">
                        <div class="col-lg-2">
                            <div class="div-label-date">
                                <label class="label-day">3</label>
                                <label class="label-date">ago/21</label>
                            </div>                          
                        </div>
                        <div class="col-lg-4">
                            <img class="product-pic" src="{{asset('images/sneakers/air_jordan_1_low_denim.png')}}" alt="First slide">
                        </div>
                        <div class="col-lg-6">
                            <label>Air Jordan 1 Low Denim</label>
                        </div>
                    </div>     
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-4">
                    <div class="row">
                        <div class="col-lg-2">
                            <div class="div-label-date">
                                <label class="label-day">30</label>
                                <label class="label-date">jul/21</label>
                            </div>                          
                        </div>
                        <div class="col-lg-4">
                            <img class="product-pic" src="{{asset('images/sneakers/lego_adidas_originals_superstar.png')}}" alt="First slide">
                        </div>
                        <div class="col-lg-6">
                            <label>LEGO x adidas Originals Superstar White Black</label>
                        </div>
                    </div>     
                </div>
                <div class="col-lg-4">
                    <div class="row">
                        <div class="col-lg-2">
                            <div class="div-label-date">
                                <label class="label-day">2</label>
                                <label class="label-date">ago/21</label>
                            </div>                          
                        </div>
                        <div class="col-lg-4">
                            <img class="product-pic" src="{{asset('images/sneakers/jaden_smith_new_balance.png')}}" alt="First slide">
                        </div>
                        <div class="col-lg-6">
                            <label>Jaden Smith x New Balance V. Racer</label>
                        </div>
                    </div>     
                </div>
                <div class="col-lg-4">
                    <div class="row">
                        <div class="col-lg-2">
                            <div class="div-label-date">
                                <label class="label-day">29</label>
                                <label class="label-date">jul/21</label>
                            </div>                          
                        </div>
                        <div class="col-lg-4">
                            <img class="product-pic" src="{{asset('images/sneakers/nike_air_max_96.png')}}" alt="First slide">
                        </div>
                        <div class="col-lg-6">
                            <label>Nike Air Max 96 II Beach</label>
                        </div>
                    </div>     
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-4">
                    <div class="row">
                        <div class="col-lg-2">
                            <div class="div-label-date">
                                <label class="label-day">31</label>
                                <label class="label-date">jul/21</label>
                            </div>                          
                        </div>
                        <div class="col-lg-4">
                            <img class="product-pic" src="{{asset('images/sneakers/parra_nike_sb_dunk_low_pro.png')}}" alt="First slide">
                        </div>
                        <div class="col-lg-6">
                            <label>Parra x Nike SB Dunk Low Pro Abstract Art</label>
                        </div>
                    </div>     
                </div>
                <div class="col-lg-4">
                    <div class="row">
                        <div class="col-lg-2">
                            <div class="div-label-date">
                                <label class="label-day">29</label>
                                <label class="label-date">jul/21</label>
                            </div>                          
                        </div>
                        <div class="col-lg-4">
                            <img class="product-pic" src="{{asset('images/sneakers/nike_air_max_96_dark_denim.png')}}" alt="First slide">
                        </div>
                        <div class="col-lg-6">
                            <label>Nike Air Max 96 II Dark Denim</label>
                        </div>
                    </div>     
                </div>
                <div class="col-lg-4">
                    <div class="row">
                        <div class="col-lg-2">
                            <div class="div-label-date">
                                <label class="label-day">31</label>
                                <label class="label-date">jul/21</label>
                            </div>                          
                        </div>
                        <div class="col-lg-4">
                            <img class="product-pic" src="{{asset('images/sneakers/nike_air_force_1_low_07.png')}}" alt="First slide">
                        </div>
                        <div class="col-lg-6">
                            <label>Nike Air Force 1 Low '07 Daktari Stripes</label>
                        </div>
                    </div>     
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-4">
                    <div class="row">
                        <div class="col-lg-2">
                            <div class="div-label-date">
                                <label class="label-day">29</label>
                                <label class="label-date">jul/21</label>
                            </div>                          
                        </div>
                        <div class="col-lg-4">
                            <img class="product-pic" src="{{asset('images/sneakers/nice_kicks_asics_gel_lyte_3.png')}}" alt="First slide">
                        </div>
                        <div class="col-lg-6">
                            <label>Nice Kicks x ASICS Gel Lyte III OG Nice Cream</label>
                        </div>
                    </div>     
                </div>
                <div class="col-lg-4">
                    <div class="row">
                        <div class="col-lg-2">
                            <div class="div-label-date">
                                <label class="label-day">6</label>
                                <label class="label-date">jul/21</label>
                            </div>                          
                        </div>
                        <div class="col-lg-4">
                            <img class="product-pic" src="{{asset('images/sneakers/nike_dunk_low_pink.png')}}" alt="First slide">
                        </div>
                        <div class="col-lg-6">
                            <label>Nike Dunk Low Pink Red White</label>
                        </div>
                    </div>     
                </div>
                <div class="col-lg-4">
                    <div class="row">
                        <div class="col-lg-2">
                            <div class="div-label-date">
                                <label class="label-day">10</label>
                                <label class="label-date">jul/21</label>
                            </div>                          
                        </div>
                        <div class="col-lg-4">
                            <img class="product-pic" src="{{asset('images/sneakers/air_jordan_3_racer_blue.png')}}" alt="First slide">
                        </div>
                        <div class="col-lg-6">
                            <label>Air Jordan 3 Racer Blue</label>
                        </div>
                    </div>     
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-4">
                    <div class="row">
                        <div class="col-lg-2">
                            <div class="div-label-date">
                                <label class="label-day">16</label>
                                <label class="label-date">jul/21</label>
                            </div>                          
                        </div>
                        <div class="col-lg-4">
                            <img class="product-pic" src="{{asset('images/sneakers/air_jordan_1_high_court_purple.png')}}" alt="First slide">
                        </div>
                        <div class="col-lg-6">
                            <label>Air Jordan 1 High Court Purple Feminino</label>
                        </div>
                    </div>     
                </div>
                <div class="col-lg-4">
                    <div class="row">
                        <div class="col-lg-2">
                            <div class="div-label-date">
                                <label class="label-day">27</label>
                                <label class="label-date">jul/21</label>
                            </div>                          
                        </div>
                        <div class="col-lg-4">
                            <img class="product-pic" src="{{asset('images/sneakers/nike_sb_dunk_high_pro_maize_black.png')}}" alt="First slide">
                        </div>
                        <div class="col-lg-6">
                            <label>Nike SB Dunk High Pro Maize and Black</label>
                        </div>
                    </div>     
                </div>
                <div class="col-lg-4">
                    <div class="row">
                        <div class="col-lg-2">
                            <div class="div-label-date">
                                <label class="label-day">24</label>
                                <label class="label-date">jul/21</label>
                            </div>                          
                        </div>
                        <div class="col-lg-4">
                            <img class="product-pic" src="{{asset('images/sneakers/nike_sb_dunk_low_pro_barcelona.png')}}" alt="First slide">
                        </div>
                        <div class="col-lg-6">
                            <label>Nike SB Dunk Low Pro Barcelona</label>
                        </div>
                    </div>     
                </div>
            </div>
        </div> --}}

        <div class="container container-middle">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="label-title">Mais Vendidos</h1>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="row">
                        <div class="col-lg-2">
                            <div class="div-label-date">
                                <label class="label-day">4</label>
                                <label class="label-date">ago/21</label>
                            </div>                          
                        </div>
                        <div class="col-lg-4">
                            <img class="product-pic" src="{{asset('images/sneakers/air_jordan_1_mid_crater.png')}}" alt="First slide">
                        </div>
                        <div class="col-lg-6">
                            <label>Air Jordan 1 Mid Crater</label>
                        </div>
                    </div>     
                </div>
                <div class="col-lg-4">
                    <div class="row">
                        <div class="col-lg-2">
                            <div class="div-label-date">
                                <label class="label-day">30</label>
                                <label class="label-date">jul/21</label>
                            </div>                          
                        </div>
                        <div class="col-lg-4">
                            <img class="product-pic" src="{{asset('images/sneakers/ambush_nike_dunk_high_flash_lime.png')}}" alt="First slide">
                        </div>
                        <div class="col-lg-6">
                            <label>Ambush x Nike Dunk High Flash Lime</label>
                        </div>
                    </div>     
                </div>
                <div class="col-lg-4">
                    <div class="row">
                        <div class="col-lg-2">
                            <div class="div-label-date">
                                <label class="label-day">3</label>
                                <label class="label-date">ago/21</label>
                            </div>                          
                        </div>
                        <div class="col-lg-4">
                            <img class="product-pic" src="{{asset('images/sneakers/air_jordan_1_low_denim.png')}}" alt="First slide">
                        </div>
                        <div class="col-lg-6">
                            <label>Air Jordan 1 Low Denim</label>
                        </div>
                    </div>     
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-4">
                    <div class="row">
                        <div class="col-lg-2">
                            <div class="div-label-date">
                                <label class="label-day">30</label>
                                <label class="label-date">jul/21</label>
                            </div>                          
                        </div>
                        <div class="col-lg-4">
                            <img class="product-pic" src="{{asset('images/sneakers/lego_adidas_originals_superstar.png')}}" alt="First slide">
                        </div>
                        <div class="col-lg-6">
                            <label>LEGO x adidas Originals Superstar White Black</label>
                        </div>
                    </div>     
                </div>
                <div class="col-lg-4">
                    <div class="row">
                        <div class="col-lg-2">
                            <div class="div-label-date">
                                <label class="label-day">2</label>
                                <label class="label-date">ago/21</label>
                            </div>                          
                        </div>
                        <div class="col-lg-4">
                            <img class="product-pic" src="{{asset('images/sneakers/jaden_smith_new_balance.png')}}" alt="First slide">
                        </div>
                        <div class="col-lg-6">
                            <label>Jaden Smith x New Balance V. Racer</label>
                        </div>
                    </div>     
                </div>
                <div class="col-lg-4">
                    <div class="row">
                        <div class="col-lg-2">
                            <div class="div-label-date">
                                <label class="label-day">29</label>
                                <label class="label-date">jul/21</label>
                            </div>                          
                        </div>
                        <div class="col-lg-4">
                            <img class="product-pic" src="{{asset('images/sneakers/nike_air_max_96.png')}}" alt="First slide">
                        </div>
                        <div class="col-lg-6">
                            <label>Nike Air Max 96 II Beach</label>
                        </div>
                    </div>     
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-4">
                    <div class="row">
                        <div class="col-lg-2">
                            <div class="div-label-date">
                                <label class="label-day">31</label>
                                <label class="label-date">jul/21</label>
                            </div>                          
                        </div>
                        <div class="col-lg-4">
                            <img class="product-pic" src="{{asset('images/sneakers/parra_nike_sb_dunk_low_pro.png')}}" alt="First slide">
                        </div>
                        <div class="col-lg-6">
                            <label>Parra x Nike SB Dunk Low Pro Abstract Art</label>
                        </div>
                    </div>     
                </div>
                <div class="col-lg-4">
                    <div class="row">
                        <div class="col-lg-2">
                            <div class="div-label-date">
                                <label class="label-day">29</label>
                                <label class="label-date">jul/21</label>
                            </div>                          
                        </div>
                        <div class="col-lg-4">
                            <img class="product-pic" src="{{asset('images/sneakers/nike_air_max_96_dark_denim.png')}}" alt="First slide">
                        </div>
                        <div class="col-lg-6">
                            <label>Nike Air Max 96 II Dark Denim</label>
                        </div>
                    </div>     
                </div>
                <div class="col-lg-4">
                    <div class="row">
                        <div class="col-lg-2">
                            <div class="div-label-date">
                                <label class="label-day">31</label>
                                <label class="label-date">jul/21</label>
                            </div>                          
                        </div>
                        <div class="col-lg-4">
                            <img class="product-pic" src="{{asset('images/sneakers/nike_air_force_1_low_07.png')}}" alt="First slide">
                        </div>
                        <div class="col-lg-6">
                            <label>Nike Air Force 1 Low '07 Daktari Stripes</label>
                        </div>
                    </div>     
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-4">
                    <div class="row">
                        <div class="col-lg-2">
                            <div class="div-label-date">
                                <label class="label-day">29</label>
                                <label class="label-date">jul/21</label>
                            </div>                          
                        </div>
                        <div class="col-lg-4">
                            <img class="product-pic" src="{{asset('images/sneakers/nice_kicks_asics_gel_lyte_3.png')}}" alt="First slide">
                        </div>
                        <div class="col-lg-6">
                            <label>Nice Kicks x ASICS Gel Lyte III OG Nice Cream</label>
                        </div>
                    </div>     
                </div>
                <div class="col-lg-4">
                    <div class="row">
                        <div class="col-lg-2">
                            <div class="div-label-date">
                                <label class="label-day">6</label>
                                <label class="label-date">jul/21</label>
                            </div>                          
                        </div>
                        <div class="col-lg-4">
                            <img class="product-pic" src="{{asset('images/sneakers/nike_dunk_low_pink.png')}}" alt="First slide">
                        </div>
                        <div class="col-lg-6">
                            <label>Nike Dunk Low Pink Red White</label>
                        </div>
                    </div>     
                </div>
                <div class="col-lg-4">
                    <div class="row">
                        <div class="col-lg-2">
                            <div class="div-label-date">
                                <label class="label-day">10</label>
                                <label class="label-date">jul/21</label>
                            </div>                          
                        </div>
                        <div class="col-lg-4">
                            <img class="product-pic" src="{{asset('images/sneakers/air_jordan_3_racer_blue.png')}}" alt="First slide">
                        </div>
                        <div class="col-lg-6">
                            <label>Air Jordan 3 Racer Blue</label>
                        </div>
                    </div>     
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-4">
                    <div class="row">
                        <div class="col-lg-2">
                            <div class="div-label-date">
                                <label class="label-day">16</label>
                                <label class="label-date">jul/21</label>
                            </div>                          
                        </div>
                        <div class="col-lg-4">
                            <img class="product-pic" src="{{asset('images/sneakers/air_jordan_1_high_court_purple.png')}}" alt="First slide">
                        </div>
                        <div class="col-lg-6">
                            <label>Air Jordan 1 High Court Purple Feminino</label>
                        </div>
                    </div>     
                </div>
                <div class="col-lg-4">
                    <div class="row">
                        <div class="col-lg-2">
                            <div class="div-label-date">
                                <label class="label-day">27</label>
                                <label class="label-date">jul/21</label>
                            </div>                          
                        </div>
                        <div class="col-lg-4">
                            <img class="product-pic" src="{{asset('images/sneakers/nike_sb_dunk_high_pro_maize_black.png')}}" alt="First slide">
                        </div>
                        <div class="col-lg-6">
                            <label>Nike SB Dunk High Pro Maize and Black</label>
                        </div>
                    </div>     
                </div>
                <div class="col-lg-4">
                    <div class="row">
                        <div class="col-lg-2">
                            <div class="div-label-date">
                                <label class="label-day">24</label>
                                <label class="label-date">jul/21</label>
                            </div>                          
                        </div>
                        <div class="col-lg-4">
                            <img class="product-pic" src="{{asset('images/sneakers/nike_sb_dunk_low_pro_barcelona.png')}}" alt="First slide">
                        </div>
                        <div class="col-lg-6">
                            <label>Nike SB Dunk Low Pro Barcelona</label>
                        </div>
                    </div>     
                </div>
            </div>
        </div>

        <div class="container container-middle">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="label-title">Anúncios em Destaque</h1>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="card card-product">
                        <img class="card-img-top" src="{{asset('images/defaults/default_product_1.png')}}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Nike SB Dunk High Pro Test Pattern Green</h5>
                            <div class="row">
                                <div class="col-lg-6">
                                    <h5 class="price-product">R$920,00</h5>
                                </div>    
                                <div class="col-lg-6">
                                    <h5 class="number-product">41</h5>
                                </div>  
                            </div>
                        </div>
                    </div>    
                </div>
                <div class="col-lg-3">
                    <div class="card card-product">
                        <img class="card-img-top" src="{{asset('images/defaults/default_product_2.png')}}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Nike SB Dunk High Pro Test Pattern Red</h5>
                            <div class="row">
                                <div class="col-lg-6">
                                    <h5 class="price-product">R$890,00</h5>
                                </div>    
                                <div class="col-lg-6">
                                    <h5 class="number-product">39</h5>
                                    <h5 class="number-product">42</h5>
                                </div>  
                            </div>
                        </div>
                    </div>    
                </div>
                <div class="col-lg-3">
                    <div class="card card-product">
                        <img class="card-img-top" src="{{asset('images/defaults/default_product_3.jpeg')}}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Nike Air Jordan 3 Mid Chicago Blue</h5>
                            <div class="row">
                                <div class="col-lg-6">
                                    <h5 class="price-product">R$990,00</h5>
                                </div>    
                                <div class="col-lg-6">
                                    <h5 class="number-product">39</h5>
                                </div>  
                            </div>
                        </div>
                    </div>    
                </div>
                <div class="col-lg-3">
                    <div class="card card-product">
                        <img class="card-img-top" src="{{asset('images/defaults/default_product_4.jpeg')}}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Nike Air Jordan 3 Mid Chicago Light Green</h5>
                            <div class="row">
                                <div class="col-lg-6">
                                    <h5 class="price-product">R$1100,00</h5>
                                </div>    
                                <div class="col-lg-6">
                                    <h5 class="number-product">40</h5>
                                </div>  
                            </div>
                        </div>
                    </div>    
                </div>
            </div>

            <div class="row">
                <div class="col-lg-3">
                    <div class="card card-product">
                        <img class="card-img-top" src="{{asset('images/defaults/default_product_5.jpeg')}}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Nike SB Dunk High Pro Orange</h5>
                            <div class="row">
                                <div class="col-lg-6">
                                    <h5 class="price-product">R$950,00</h5>
                                </div>    
                                <div class="col-lg-6">
                                    <h5 class="number-product">40</h5>
                                </div>  
                            </div>
                        </div>
                    </div>    
                </div>
                <div class="col-lg-3">
                    <div class="card card-product">
                        <img class="card-img-top" src="{{asset('images/defaults/default_product_6.jpeg')}}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Nike SB Dunk High Pro Colored</h5>
                            <div class="row">
                                <div class="col-lg-6">
                                    <h5 class="price-product">R$690,00</h5>
                                </div>    
                                <div class="col-lg-6">
                                    <h5 class="number-product">37</h5>
                                </div>  
                            </div>
                        </div>
                    </div>    
                </div>
                <div class="col-lg-3">
                    <div class="card card-product">
                        <img class="card-img-top" src="{{asset('images/defaults/default_product_7.jpeg')}}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Nike SB Dunk High Pro Black I</h5>
                            <div class="row">
                                <div class="col-lg-6">
                                    <h5 class="price-product">R$890,00</h5>
                                </div>    
                                <div class="col-lg-6">
                                    <h5 class="number-product">43</h5>
                                </div>  
                            </div>
                        </div>
                    </div>    
                </div>
                <div class="col-lg-3">
                    <div class="card card-product">
                        <img class="card-img-top" src="{{asset('images/defaults/default_product_8.jpeg')}}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Nike SB Dunk Rattlesnake Safari</h5>
                            <div class="row">
                                <div class="col-lg-6">
                                    <h5 class="price-product">R$1290,00</h5>
                                </div>    
                                <div class="col-lg-6">
                                    <h5 class="number-product">39</h5>
                                    <h5 class="number-product">40</h5>
                                </div>  
                            </div>
                        </div>
                    </div>    
                </div>
            </div>
        </div>

        <div class="container container-buttons">
            <div class="row">
                <div class="col-lg-12">
                    <a href="#">
                        <i class="fas fa-arrow-up fa-2x button-icon"></i>
                        <label>Anunciar</label>
                    </a>
                    <a href="#">
                        <i class="fas fa-comment-alt fa-2x button-icon"></i>
                        <label>Mensagens</label>
                    </a>
                    <a href="#">
                        <i class="fas fa-shopping-cart fa-2x button-icon"></i>
                        <label>Compras</label>
                    </a>
                    <a href="#">
                        <i class="fab fa-sellsy fa-2x button-icon"></i>
                        <label>Vendas</label>
                    </a>
                    <a href="#">
                        <i class="fas fa-puzzle-piece fa-2x button-icon"></i>
                        <label>Taxas</label>
                    </a>
                </div>
            </div>
        </div>

    </div>

    <script>
    </script>
@endsection
