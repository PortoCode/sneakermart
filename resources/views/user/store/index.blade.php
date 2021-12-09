@extends('layouts.app')

<head>
    <style>
        .store-pic{
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
    </style>
</head>
@section('content')
    <section class="content-header">
    </section>
    <div class="content">
        @include('flash::message')
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-12 col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Dados da sua loja</h4>
                        <div class="card-tools">
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row" >
                            <div class="col-12 col-sm-4 col-md-3">
                                <img class="store-pic" src="{{asset('images/defaults/default_store.png')}}">
                            </div>
                            <div class="col-12 col-sm-4 col-md-9">
                                <b>Nome:</b> {{$store->name}}<br>
                                <b>Telefone:</b> {{$store->phone_number}}<br>
                                <b>Endereço:</b> {{$store->address}}, {{$store->address_number}}, {{$store->neighborhood}}.@if($store->complement) {{$store->complement}}.@endif {{$store->zip_code}}<br>
                                <b>Cidade:</b> {{$store->city}}, {{$store->state}}<br>
                                <b>Telefone:</b> {{$store->phone_number}}<br>
                                <a href="{{ route('stores.showPage', $store->id) }}" style="margin-top:3rem" id="open-edit-modal" class='btn btn-primary btn-s float-left store-btn align-bottom'>
                                    Página da loja
                                </a>
                                <a href="#" style="margin-top:3rem" id="open-edit-modal" class='btn btn-primary btn-s float-right store-btn align-bottom'>
                                    <i class="fas fa-edit"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="card">
                    <div class="card-header">
                        <div class="row" >
                            <div class="col">
                                <h4>Últimos produtos cadastrados</h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col"></th>
                                            <th scope="col">Produto</th>
                                            <th scope="col">Valor</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($store->lastProducts as $product)
                                            <tr>
                                                <th scope="row">
                                                    <img class="product-pic" src="{{asset('images/defaults/default_product_2.png')}}">
                                                </th>
                                                <td>{{$product->name}}</td>
                                                <td>{{ $product->productInfos->first()->price }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <a href="{{ route('products.index') }}" class='btn btn-primary btn-s float-right store-btn align-bottom'>
                                    Visualizar todos
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h4>Últimos pedidos recebidos</h4>
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
                                        <th scope="col">Comprador</th>
                                        <th scope="col">Qnt.</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($latest_orders as $order)
                                        @foreach($order->orderProducts as $product)
                                            <tr>
                                                <th scope="row">
                                                    <img class="product-pic" src="{{asset('images/defaults/default_product_2.png')}}">
                                                </th>
                                                <td>{{ $product->productInfo->product->name }}</td>
                                                <td>{{ $product->productInfo->size }}</td>
                                                <td>{{ $order->buyer->name }}</td>
                                                <td>{{ $product->quantity }}</td>
                                            </tr>
                                        @endforeach
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col">
                                <a href="{{ route('orders.index') }}" class='btn btn-primary btn-s float-right store-btn align-bottom'>
                                    Visualizar todos
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

<div class="modal fade" id="edit-store-modal" style="display:none">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <img class="store-pic" src="{{asset('images/defaults/default_store.png')}}">
            </div>
            <div class="modal-body" id="edit-form">
                <div class="row">
                    <div class="form-group col-sm-12">
                        <label for="photo">Foto:</label>
                        <input type="file" class="form-control" name="photo" id="user-photo">
                    </div>
                </div>
                <div class="row">
                    <!-- Name Field -->
                    <div class="form-group col-sm-6">
                        <label for="name">Nome:</label>
                        <input type="text" class="form-control" value="{{ $store->name }}" required name="name" id="store-name">
                    </div>

                    <!-- Phone Number Field -->
                    <div class="form-group col-sm-6">
                        <label for="phone_number">Telefone:</label>
                        <input type="text" class="form-control phone-mask" value="{{ $store->phone_number }}" required name="store" id="store-phone-number">
                    </div>
                </div>

                <div class="row">
                    <!-- Zipcode Field -->
                    <div class="form-group col-sm-12">
                        <label for="zipcode">CEP:</label>
                        <input type="text" class="form-control zipcode-mask" value="{{ $store->zipcode }}" required name="zipcode" id="store-zipcode">
                    </div>
                </div>

                <div class="row">
                    <!-- Address Field -->
                    <div class="form-group col-sm-6">
                        <label for="address">Rua:</label>
                        <input type="text" class="form-control" value="{{ $store->address }}" required name="address" id="store-address">
                    </div>

                    <!-- Address Number Field -->
                    <div class="form-group col-sm-6">
                        <label for="address_number">Número:</label>
                        <input type="text" class="form-control" value="{{ $store->address_number }}" required name="store" id="store-address-number">
                    </div>
                </div>

                <div class="row">
                    <!-- Neighborhood Field -->
                    <div class="form-group col-sm-6">
                        <label for="neighborhood">Bairro:</label>
                        <input type="text" class="form-control" value="{{ $store->neighborhood }}" required name="neighborhood" id="store-neighborhood">
                    </div>

                    <!-- Complement Field -->
                    <div class="form-group col-sm-6">
                        <label for="complement">Complemento:</label>
                        <input type="text" class="form-control" value="{{ $store->complement }}" name="complement" id="store-complement">
                    </div>
                </div>

                <div class="row">
                    <!-- City Field -->
                    <div class="form-group col-sm-6">
                        <label for="city">Cidade:</label>
                        <input type="text" class="form-control" value="{{ $store->city }}" required name="city" id="store-city">
                    </div>

                    <!-- State Field -->
                    <div class="form-group col-sm-6">
                        <label for="state">Estado:</label>
                        <input type="text" class="form-control state-mask" value="{{ $store->state }}" required name="state" id="store-state">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="#" id="update-store" class="btn btn-default">Salvar</a>
            </div>
        </div>
    </div>
</div>


@push('page_scripts')
    <script>
        $(document).ready(function () {
            // Open modal to edit user infos
            $(document).on('click', '#open-edit-modal', function () {
                $('#edit-store-modal').modal();
            });

            // Send ajax request to update store's info
            $(document).on('click', "#update-store", function() {
                let allFilled = true;
                document.getElementById("edit-form").querySelectorAll("[required]").forEach(function(i) {
                    if (!allFilled) return;
                    if (!i.value) allFilled = false;
                });
                // Check if all fields are filled
                if (!allFilled) {
                    Swal.fire({
                        title: "Preencha todos os campos!",
                        html: "Complemento não é necessário.",
                        icon: "error",
                        showCloseButton: true,
                        showConfirmButton: false
                    });
                }

                name = $('#store-name').val();
                phone_number = $('#store-phone-number').val();
                zipcode = $('#store-zipcode').val();
                address = $('#store-address').val();
                address_number = $('#store-address-number').val();
                neighborhood = $('#store-neighborhood').val();
                complement = $('#store-complement').val();
                city = $('#store-city').val();
                state = $('#store-state').val();
                seller_id = {{ $store->seller_id }};

                let routeUpdate = "{{ route('stores.update', ':store_id') }}";
                routeUpdate = routeUpdate.replace(':store_id', {{ $store->id }});
                $.ajax({
                    url: routeUpdate,
                    datatype: "json",
                    data: {name, phone_number, zipcode, address, address_number, neighborhood, complement, city, state, seller_id, _token: "{{ csrf_token() }}" },
                    method: "PATCH"
                })
                .done(function(response) {
                    location.reload();
                });
            });
        });
    </script>
@endpush
