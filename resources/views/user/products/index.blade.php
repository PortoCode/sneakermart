@extends('layouts.app')

<head>
    <style>
        .product-pic{
            width: 12rem;
            height: 12rem;
            object-fit: cover;
            box-shadow: 0 6px 10px #4fd5d5;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }
        .icheck-primary>input:first-child:checked+label::before{
            background-color: #4fd5d5!important;
            border-color: #329c9c!important;
        }
        .icheck-primary>input:first-child:hover+label::before{
            border-color: #329c9c!important;
        }
        .icheck-primary>input:first-child+label::before{
            border-color: #4fd5d5!important;
        }
        .icheck-primary>input:first-child:checked+label::after{
            border-color: #ca1ea1!important;
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
            -webkit-transition: max-height 1s ease-in, opacity 1s ease-in;
            -moz-transition: max-height 1s ease-in, opacity 1s ease-in;
            -o-transition: max-height 1s ease-in, opacity 1s ease-in;
            transition: max-height 1s ease-in, opacity 1s ease-in;
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
                        <h4>Seus Produtos</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @if(count($products) > 0)
                                @foreach($products as $product)
                                    <div class="col-md-3">
                                        <div class="card">
                                            <div class="card-header">
                                                <a href="/products/page/1">
                                                    <img class="product-pic" src="{{asset('images/defaults/default_product_2.png')}}">
                                                </a>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col">
                                                        <b>{{ $product->name }}</b>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <div class="row">
                                                    <div class="col">
                                                        <a href="#" product-id="{{ $product->id }}" class='btn btn-primary btn-s float-right store-btn align-bottom show-product'>
                                                            Detalhes
                                                        </a>
                                                    </div>
                                                    <div class="col">
                                                        <a href="{{ route('products.showPage', $product->id) }}" class='btn btn-primary btn-s float-right'>Página</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <h6>Você ainda não possui produtos cadastrados.</h6>
                            @endif
                        </div>
                        <br>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col">
                                <a href="#" id="show-create" class='btn btn-primary btn-s float-right store-btn align-bottom'>
                                    Cadastrar novo
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
    </div>
    
@endsection
    
@foreach($products as $product)
    <div class="modal fade" id="product-modal{{$product->id}}" style="display:none">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <img class="product-pic" src="{{asset('images/defaults/default_product_2.png')}}">
                </div>
                <div class="modal-body">
                    <div class="visible" id="show-product">
                        <div class="row">
                            <div class="col">
                                <b>{{ $product->name }}</b>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <b>Descrição:</b> {{ $product->description }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <b>Marca:</b> {{ $product->productInfos->first()->brand }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <b>Modelo:</b> {{ $product->productInfos->first()->model }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <b>Preço: </b>R$ {{ $product->productInfos->first()->price }}
                            </div>
                        </div>
                        <br>
                        @foreach($product->productInfos as $productInfo)
                            <div class="row">
                                <div class="col-md-6">
                                    <b>Tamanho:</b> {{ $productInfo->size }}
                                </div>
                                <div class="col-md-6">
                                    <b>Quantidade:</b> {{ $productInfo->stock }}
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="hidden" id="edit-product">
                        <div class="row">
                            <!-- Name Field -->
                            <div class="form-group col-sm-6">
                                <label for="name">Nome:</label>
                                <input type="text" class="form-control" value="{{ $product->name }}" required name="name" id="edit-product-name">
                            </div>

                            <!-- Price Field -->
                            <div class="form-group col-sm-6">
                                <label for="price">Preço:</label>
                                <input type="text" class="form-control money-mask" value="{{ $product->productInfos->first()->price }}" required name="price" id="edit-product-price">
                            </div>
                        </div>
                        <div class="row">
                            <!-- Description Field -->
                            <div class="form-group col-sm-12">
                                <label for="description">Descrição:</label>
                                <input type="textarea" class="form-control" value="{{ $product->description }}" required name="description" id="edit-product-description">
                            </div>
                        </div>

                        <div class="row">
                            <!-- Brand Field -->
                            <div class="form-group col-sm-6">
                                <label for="brand">Marca:</label>
                                <input type="text" class="form-control" value="{{ $product->productInfos->first()->brand }}" required name="brand" id="edit-product-brand">
                            </div>

                            <!-- Model Field -->
                            <div class="form-group col-sm-6">
                                <label for="model">Modelo:</label>
                                <input type="text" class="form-control" value="{{ $product->productInfos->first()->model }}" required name="model" id="edit-product-model">
                            </div>
                        </div>
                        <div class="sizes-div">
                            @foreach($product->productInfos as $productInfo)
                                <div class="row">
                                    <!-- Tamanho Field -->
                                    <div class="form-group col-sm-5">
                                        <label for="size">Tamanho:</label>
                                        <input type="number" class="form-control sizes" value="{{ $productInfo->size }}" required name="size" id="edit-product-size">
                                    </div>

                                    <!-- Quantity Field -->
                                    <div class="form-group col-sm-5">
                                        <label for="stock">Quantidade:</label>
                                        <input type="number" class="form-control stocks" value="{{ $productInfo->stock }}" required name="stock" id="edit-product-stock">
                                    </div>

                                    <div class="form-group col-sm-2">
                                        <a href="#" class='btn btn-danger btn-lg remove-row' style="position: absolute;bottom: 0;right: 7.5px;padding-left: 0.5rem;padding-right: 0.5rem">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </div>
                                    <input type="number" value="{{ $productInfo->id }}" class="form-control product-infos-id" style="display:none">

                                </div>
                            @endforeach
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <a href="#" class="more-sizes float-right">
                                    <h6>Adicionar mais tamanhos</h6>
                                </a>  
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <a href="#" id="cancel-product-btn" class="btn btn-danger float-right">Cancelar</a>
                                <a href="#" style="margin-right:1rem" id="update-product-btn" product-id="{{ $product->id }}" class="btn btn-default float-right">Salvar</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer visible" id="show-footer">
                    <div class="row">
                        <div class="col">
                            {!! Form::open(['route' => ['products.destroy', $product->id], 'method' => 'delete']) !!}
                            <div class='btn-group'>
                                <a href="#" id="edit-product-btn" class='btn btn-default btn-md float-right visible'>
                                    <i class="fas fa-edit"></i>
                                </a>
                                {!! Form::button("<i class='fas fa-trash'></i>", [
                                    "type"        => "submit",
                                    "onclick"     => "return confirm('".\Lang::get("text.confirmation")."')",
                                    "class"       => "btn btn-danger btn-md float-right visible",
                                    "data-toggle" => "tooltip",
                                    "title"       => \Lang::get("text.remove"),
                                    "id"          => "delete-product-btn",
                                ]) !!}
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach

<div class="modal fade" id="create-product-modal" style="display:none">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body" id="create-form">
                <div class="row">
                    <!-- Name Field -->
                    <div class="form-group col-sm-6">
                        <label for="name">Nome:</label>
                        <input type="text" class="form-control" required name="name" id="create-product-name">
                    </div>

                    <!-- Price Field -->
                    <div class="form-group col-sm-6">
                        <label for="price">Preço:</label>
                        <input type="text" class="form-control money-mask" required name="price" id="create-product-price">
                    </div>
                </div>
                <div class="row">
                    <!-- Description Field -->
                    <div class="form-group col-sm-12">
                        <label for="description">Descrição:</label>
                        <input type="textarea" class="form-control" required name="description" id="create-product-description">
                    </div>
                </div>

                <div class="row">
                    <!-- Brand Field -->
                    <div class="form-group col-sm-6">
                        <label for="brand">Marca:</label>
                        <input type="text" class="form-control" required name="brand" id="create-product-brand">
                    </div>

                    <!-- Model Field -->
                    <div class="form-group col-sm-6">
                        <label for="model">Modelo:</label>
                        <input type="text" class="form-control" required name="model" id="create-product-model">
                    </div>
                </div>

                <div class="sizes-div">
                    <div class="row">
                        <!-- Tamanho Field -->
                        <div class="form-group col-sm-5">
                            <label for="size">Tamanho:</label>
                            <input type="number" class="form-control sizes" required name="size" id="create-product-size">
                        </div>

                        <!-- Quantity Field -->
                        <div class="form-group col-sm-5">
                            <label for="stock">Quantidade:</label>
                            <input type="number" class="form-control stocks" required name="stock" id="create-product-stock">
                        </div>

                        <div class="form-group col-sm-2">
                            <a href="#" class='btn btn-danger btn-lg remove-row' style="position: absolute;bottom: 0;right: 7.5px;padding-left: 0.5rem;padding-right: 0.5rem">
                                <i class="fas fa-trash"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <a href="#" class="more-sizes float-right">
                    <div class="row">
                        <h6>Adicionar mais tamanhos</h6>
                        <i class="fas fa-plus" style="margin-left:1rem; padding-right: 7.5px"></i>
                    </div>
                </a>  
            </div>
            <div class="modal-footer">
                <a href="#" id="create-product" class="btn btn-default">Salvar</a>
            </div>
        </div>
    </div>
</div>

@push('page_scripts')
    <script>
        $(document).ready(function () {
            $(document).on('click', '.show-product', function () {
                let productId = $(this).attr('product-id');
                $('#product-modal' + productId).modal();
            });

            $(document).on('click', '#show-create', function () {
                $('#create-product-modal').modal();
            });

            // Change modal from show to edit
            $(document).on('click', '#edit-product-btn', function () {
                $('#edit-product-btn').removeClass("visible").addClass("hidden");
                $('#delete-product-btn').removeClass("visible").addClass("hidden");
                $('#show-product').removeClass("visible").addClass("hidden");
                $('#show-footer').removeClass("visible").addClass("hidden");
                showLoading();
                setTimeout(function(){
                    $('#edit-product').removeClass("hidden").addClass("visible");
                    hideLoading();
                }, 1500);
            });           

            // Change modal from edit to show
            $(document).on('click', '#cancel-product-btn', function () {
                $('#edit-product').removeClass("visible").addClass("hidden");
                showLoading();
                setTimeout(function(){
                    $('#edit-product-btn').removeClass("hidden").addClass("visible");
                    $('#delete-product-btn').removeClass("hidden").addClass("visible");
                    $('#show-product').removeClass("hidden").addClass("visible");
                    $('#show-footer').removeClass("hidden").addClass("visible");
                    hideLoading();
                }, 1500);
            });      

            $(document).on('click', '.more-sizes', function () {
                $(this).closest(':has(.sizes-div)').find('.sizes-div').append(`
                    <div class="row">
                        <!-- Tamanho Field -->
                        <div class="form-group col-sm-5">
                            <label for="size">Tamanho:</label>
                            <input type="number" class="form-control sizes" required name="size" id="product-size">
                        </div>

                        <!-- Quantity Field -->
                        <div class="form-group col-sm-5">
                            <label for="stock">Quantidade:</label>
                            <input type="number" class="form-control stocks" required name="stock" id="product-stock">
                        </div>

                        <div class="form-group col-sm-2">
                            <a href="#" class='btn btn-danger btn-lg remove-row' style="position: absolute;bottom: 0;right: 7.5px;padding-left: 0.5rem;padding-right: 0.5rem">
                                <i class="fas fa-trash"></i>
                            </a>
                        </div>
                        <input type="number" value="new" class="form-control product-infos-id" style="display:none">
                    </div>
                `);
            });

            // Send ajax request to create product
            $(document).on('click', "#create-product", function() {
                let allFilled = true;
                document.getElementById("create-form").querySelectorAll("[required]").forEach(function(i) {
                    if (!allFilled) return;
                    if (!i.value) allFilled = false;
                });
                // Check if all fields are filled
                if (!allFilled) {
                    Swal.fire({
                        title: "Preencha todos os campos!",
                        icon: "error",
                        showCloseButton: true,
                        showConfirmButton: false
                    });
                }
                // Get forms values
                name = $('#create-product-name').val();
                price = $('#create-product-price').val();
                description = $('#create-product-description').val();
                brand = $('#create-product-brand').val();
                model = $('#create-product-model').val();
                this.sizes = [];
                this.stocks = [];
                var self = this;
                // Get each size and each stock in form
                document.getElementById("create-form").querySelectorAll(".sizes").forEach(function(i){
                    self.sizes.push(i.value);
                });
                document.getElementById("create-form").querySelectorAll(".stocks").forEach(function(i){
                    self.stocks.push(i.value);
                });
                allSizes = self.sizes;
                allStocks = self.stocks;
                store_id = {{ \Auth::user()->stores->first()->id }};
                // Send AJAX request to store product
                let routeCreate = "{{ route('products.store') }}";
                $.ajax({
                    url: routeCreate,
                    datatype: "json",
                    data: {name, price, description, brand, model, allSizes, allStocks, store_id, _token: "{{ csrf_token() }}" },
                    method: "POST"
                })
                .done(function(response) {
                    location.reload();
                });
            });

            // Send ajax request to update product
            $(document).on('click', "#update-product-btn", function() {
                let productId = $(this).attr('product-id');
                let allFilled = true;
                document.getElementById("edit-product").querySelectorAll("[required]").forEach(function(i) {
                    if (!allFilled) return;
                    if (!i.value) allFilled = false;
                });
                // Check if all fields are filled
                if (!allFilled) {
                    Swal.fire({
                        title: "Preencha todos os campos!",
                        icon: "error",
                        showCloseButton: true,
                        showConfirmButton: false
                    });
                }
                // Get forms values
                name = $('#edit-product-name').val();
                price = $('#edit-product-price').val();
                description = $('#edit-product-description').val();
                brand = $('#edit-product-brand').val();
                model = $('#edit-product-model').val();
                this.sizes = [];
                this.stocks = [];
                this.productInfosIds = [];
                var self = this;
                // Get each size and each stock in form
                document.getElementById("edit-product").querySelectorAll(".sizes").forEach(function(i){
                    self.sizes.push(i.value);
                });
                document.getElementById("edit-product").querySelectorAll(".stocks").forEach(function(i){
                    self.stocks.push(i.value);
                });
                document.getElementById("edit-product").querySelectorAll(".product-infos-id").forEach(function(i){
                    self.productInfosIds.push(i.value);
                });
                allSizes = self.sizes;
                allStocks = self.stocks;
                allProductInfosIds = self.productInfosIds;
                store_id = {{ \Auth::user()->stores->first()->id }};
                // Send AJAX request to store product
                let routeUpdate = "{{ route('products.update', ':product_id') }}";
                routeUpdate = routeUpdate.replace(':product_id', productId);
                $.ajax({
                    url: routeUpdate,
                    datatype: "json",
                    data: {name, price, description, brand, model, allSizes, allStocks, allProductInfosIds, store_id, _token: "{{ csrf_token() }}" },
                    method: "PATCH"
                })
                .done(function(response) {
                    location.reload();
                });
            });
        });

        $(document).on('click', '.remove-row', function () {
            $(this).closest('.row').remove();
        });
    </script>
@endpush
