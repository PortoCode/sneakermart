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
        input[type="checkbox"].switch_1{
            font-size: 30px;
            -webkit-appearance: none;
            -moz-appearance: none;
                appearance: none;
            width: 2.5em;
            height: 0.7em;
            background: #777;
            border-radius: 3em;
            position: relative;
            cursor: pointer;
            outline: none;
            -webkit-transition: all .2s ease-in-out;
            transition: all .2s ease-in-out;
        }
        input[type="checkbox"].switch_1:checked{
            background: #4fd5d5;
        }
        input[type="checkbox"].switch_1:after{
            position: absolute;
            content: "";
            width: 0.7em;
            height: 0.7em;
            border-radius: 50%;
            background: #fff;
            -webkit-box-shadow: 0 0 .25em rgba(0,0,0,.3);
                    box-shadow: 0 0 .25em rgba(0,0,0,.3);
            -webkit-transform: scale(.7);
                    transform: scale(.7);
            left: 0;
            -webkit-transition: all .2s ease-in-out;
            transition: all .2s ease-in-out;
        }
        
        input[type="checkbox"].switch_1:checked:after{
            left: calc(100% - 0.7em);
        }
        .edit-pic{
            display: block;
            margin-left: auto;
            margin-right: auto;
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
                        <h4>Seus dados</h4>
                        <div class="card-tools">
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row" >
                            <div class="col-12 col-sm-4 col-md-3">
                                <img class="profile-pic" src="{{asset('images/defaults/default_user.jpg')}}">
                            </div>
                            <div class="col-12 col-sm-4 col-md-9">
                                <b>Nome:</b> {{$user->name}}<br>
                                <b>Email:</b> {{$user->email}}<br>
                                <b>CPF:</b> {{$user->cpf}}<br>
                                <b>Telefone:</b> {{$user->phone_number}}<br>
                                <a href="#" style="margin-top:3rem" class='btn btn-primary btn-s float-right open-edit-modal'>
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
                                <h4>Seus endereços cadastrados</h4>
                            </div>
                            <div class="col">
                                @if(count($delivery_infos) < 3)
                                    <a href="#" id='new-address' class='btn btn-primary btn-s float-right align-bottom'>
                                        Adicionar novo
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            @if(count($delivery_infos) > 0)
                                                @foreach($delivery_infos as $delivery_info)
                                                    <td>
                                                        {{ $delivery_info->address }}, {{ $delivery_info->number }}, {{ $delivery_info->neighborhood }}.<br>{{ $delivery_info->city }} - {{ $delivery_info->state }}.<br>{{ $delivery_info->zipcode }}<br><br>Destinatário: {{ $delivery_info->recipient_name }}<br>
                                                        <div class="row">
                                                            <div class="col">
                                                                {!! Form::open(['route' => ['deliveryInfos.destroy', $delivery_info->id], 'method' => 'delete']) !!}
                                                                <div class='btn-group float-right'>
                                                                    <a href="#" class='btn btn-default btn-md float-right edit-address' address-id='{{ $delivery_info->id }}'>
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
                                                    </td>
                                                @endforeach
                                            @else
                                                <td>Você ainda não cadastrou nenhum endereço.</td>
                                            @endif
                                        </tr>
                                    </tbody>
                                </table>
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
                        <h4>Últimos pedidos realizados</h4>
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
                                                <td>R$ {{ $product->productInfo->price }}</td>
                                                <td>R$ {{ $order->shipping_fee }}</td>
                                                <td>Envio pendente</td>
                                            </tr>
                                        @endforeach
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col">
                                <a href="{{ route('orders.index') }}" class='btn btn-primary btn-s float-right profile-btn align-bottom'>
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

<div class="modal fade" id="edit-profile-modal" style="display:none">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                @if(isset($user->photo))
                    <img class="profile-pic edit-pic" src="{{asset('images/defaults/default_user.jpg')}}">
                @else
                    <img class="profile-pic edit-pic" src="{{asset('images/defaults/default_user.jpg')}}">
                @endif
            </div>
            <div class="modal-body" id="edit-form">
                <div class="row">
                    <!-- Photo Field -->
                    <div class="form-group col-md-12">
                        <label for="photo">Foto:</label>
                        @if(isset($user->photo) && !strpos($user->photo, "default-square"))
                            <div class="row">
                                <!-- Delete img -->
                                <div class="form-group col-md-12 no-padding" style="margin-bottom:10px">
                                    <div class="icheck">
                                        <div class="col-sm-8">
                                            <p style="font-weight:bold">Deletar foto?</p>
                                        </div>
                                        <div class="col-sm-4" style="vertical-align:middle!important">
                                            <input type="checkbox" name="user-delete" id="delete" class="switch_1">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <input type="file" class="form-control" name="photo" id="user-photo">
                    </div>
                </div>

                <!-- Name Field -->
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label for="name">Nome:</label>
                        <input type="text" class="form-control must-be-required" value="{{ $user->name }}" required name="name" id="user-name">
                    </div>

                    <!-- Email Field -->
                    <div class="form-group col-sm-6">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control must-be-required" value="{{ $user->email }}" required name="email" id="user-email">
                    </div>
                </div>

                <div class="row">
                    <!-- Cpf Field -->
                    <div class="form-group col-sm-6">
                        <label for="cpf">CPF:</label>
                        <input type="text" class="form-control must-be-required cpf-mask" value="{{ $user->cpf }}" required name="cpf" id="user-cpf">
                    </div>

                    <!-- Phone Number Field -->
                    <div class="form-group col-sm-6">
                        <label for="phone_number">Telefone:</label>
                        <input type="text" class="form-control must-be-required phone-mask" value="{{ $user->phone_number }}" required name="phone_number" id="user-phone-number">
                    </div>
                </div>

                <!-- Keep Password -->
                <div class="row">
                    <div class="form-group col-sm-12">
                        <label class="checkbox">
                            <div class="row">
                                <div class="col-sm-8">
                                    <p style="font-weight:bold">Manter Senha?</p>
                                </div>
                                <div class="col-sm-4" style="vertical-align:middle!important">
                                    <input type="checkbox" name="keep_password" id="keep-password" class="switch_1" checked>
                                </div>
                            </div>
                        </label>
                    </div>
                </div>

                <!-- Hide if keep password is selected -->
                <div class="hide-field col-sm-12" style="display:none">
                    <div class="row">
                        <!-- Password Field -->
                        <div class="form-group col-sm-6">
                            <label for="password">Senha:</label>
                            <input type="password" class="form-control must-be-required" name="password" id="user-password">
                        </div>

                        <!-- Password Confirmation Field -->
                        <div class="form-group col-sm-6">
                            <label for="password_confirmation">Confirme sua Senha:</label>
                            <input type="password" name="password_confirmation" class="form-control must-be-required" id="user-password-confirmation">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="#" id="update-user" class="btn btn-default">Salvar</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="save-address-modal" style="display:none">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body" id="save-address-form">
                <div class="row">
                    <!-- Name Field -->
                    <div class="form-group col-sm-6">
                        <label for="recipient-name">Destinatário:</label>
                        <input type="text" class="form-control" required name="recipient-name" id="create-recipient-name">
                    </div>

                    <!-- Zipcode Field -->
                    <div class="form-group col-sm-6">
                        <label for="zipcode">CEP:</label>
                        <input type="text" class="form-control zipcode-mask" required name="zipcode" id="create-zipcode">
                    </div>
                </div>

                <div class="row">
                    <!-- Address Field -->
                    <div class="form-group col-sm-6">
                        <label for="address">Rua:</label>
                        <input type="text" class="form-control" required name="address" id="create-address">
                    </div>

                    <!-- Address Number Field -->
                    <div class="form-group col-sm-6">
                        <label for="address_number">Número:</label>
                        <input type="text" class="form-control" required name="address_number" id="create-address-number">
                    </div>
                </div>

                <div class="row">
                    <!-- Neighborhood Field -->
                    <div class="form-group col-sm-6">
                        <label for="neighborhood">Bairro:</label>
                        <input type="text" class="form-control" required name="neighborhood" id="create-neighborhood">
                    </div>

                    <!-- Complement Field -->
                    <div class="form-group col-sm-6">
                        <label for="complement">Complemento:</label>
                        <input type="text" class="form-control" name="complement" id="create-complement">
                    </div>
                </div>

                <div class="row">
                    <!-- City Field -->
                    <div class="form-group col-sm-6">
                        <label for="city">Cidade:</label>
                        <input type="text" class="form-control" required name="city" id="create-city">
                    </div>

                    <!-- State Field -->
                    <div class="form-group col-sm-6">
                        <label for="state">Estado:</label>
                        <input type="text" class="form-control state-mask" required name="state" id="create-state">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="#" id="save-address" class="btn btn-default">Salvar</a>
            </div>
        </div>
    </div>
</div>

@foreach($delivery_infos as $delivery_info)
    <div class="modal fade" id="edit-address-modal{{$delivery_info->id}}" style="display:none">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body" id="edit-address-form">
                    <div class="row">
                        <!-- Name Field -->
                        <div class="form-group col-sm-6">
                            <label for="recipient-name">Destinatário:</label>
                            <input type="text" class="form-control" required value="{{ $delivery_info->recipient_name }}" name="recipient-name" id="update-recipient-name{{ $delivery_info->id }}">
                        </div>

                        <!-- Zipcode Field -->
                        <div class="form-group col-sm-6">
                            <label for="zipcode">CEP:</label>
                            <input type="text" class="form-control zipcode-mask" required value="{{ $delivery_info->zipcode }}" name="zipcode" id="update-zipcode{{ $delivery_info->id }}">
                        </div>
                    </div>

                    <div class="row">
                        <!-- Address Field -->
                        <div class="form-group col-sm-6">
                            <label for="address">Rua:</label>
                            <input type="text" class="form-control" required value="{{ $delivery_info->address }}" name="address" id="update-address{{ $delivery_info->id }}">
                        </div>

                        <!-- Address Number Field -->
                        <div class="form-group col-sm-6">
                            <label for="address_number">Número:</label>
                            <input type="text" class="form-control" required value="{{ $delivery_info->number }}" name="address_number" id="update-address-number{{ $delivery_info->id }}">
                        </div>
                    </div>

                    <div class="row">
                        <!-- Neighborhood Field -->
                        <div class="form-group col-sm-6">
                            <label for="neighborhood">Bairro:</label>
                            <input type="text" class="form-control" required value="{{ $delivery_info->neighborhood }}" name="neighborhood" id="update-neighborhood{{ $delivery_info->id }}">
                        </div>

                        <!-- Complement Field -->
                        <div class="form-group col-sm-6">
                            <label for="complement">Complemento:</label>
                            <input type="text" class="form-control" value="{{ $delivery_info->complement }}" name="complement" id="update-complement{{ $delivery_info->id }}">
                        </div>
                    </div>

                    <div class="row">
                        <!-- City Field -->
                        <div class="form-group col-sm-6">
                            <label for="city">Cidade:</label>
                            <input type="text" class="form-control" required value="{{ $delivery_info->city }}" name="city" id="update-city{{ $delivery_info->id }}">
                        </div>

                        <!-- State Field -->
                        <div class="form-group col-sm-6">
                            <label for="state">Estado:</label>
                            <input type="text" class="form-control state-mask" required value="{{ $delivery_info->state }}" name="state" id="update-state{{ $delivery_info->id }}">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="#" address-id="{{ $delivery_info->id }}" class="btn btn-default update-address">Salvar</a>
                </div>
            </div>
        </div>
    </div>
@endforeach

@push('page_scripts')
    <script>
        $(document).ready(function () {
            $(document).on('click', '#new-address', function () {
                $('#save-address-modal').modal();
            });

            // Send ajax request to create product
            $(document).on('click', "#save-address", function() {
                let allFilled = true;
                document.getElementById("save-address-form").querySelectorAll("[required]").forEach(function(i) {
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
                recipient_name = $('#create-recipient-name').val();
                zipcode = $('#create-zipcode').val();
                address = $('#create-address').val();
                number = $('#create-address-number').val();
                neighborhood = $('#create-neighborhood').val();
                complement = $('#create-complement').val();
                city = $('#create-city').val();
                state = $('#create-state').val();
                user_id = {{ \Auth::user()->id }};
                // Send AJAX request to store deliveryInfos
                let routeCreate = "{{ route('deliveryInfos.store') }}";
                $.ajax({
                    url: routeCreate,
                    datatype: "json",
                    data: {recipient_name, zipcode, address, number, neighborhood, complement, city, state, user_id, _token: "{{ csrf_token() }}" },
                    method: "POST"
                })
                .done(function(response) {
                    location.reload();
                });
            });

            // Open modal to edit user infos
            $(document).on('click', '.open-edit-modal', function () {
                $('#edit-profile-modal').modal();
            });

            $(document).on('click', '.edit-address', function () {
                let addressId = $(this).attr('address-id');
                $('#edit-address-modal' + addressId).modal();
            });

            // Send ajax request to create product
            $(document).on('click', ".update-address", function() {
                let addressId = $(this).attr('address-id');
                let allFilled = true;
                document.getElementById("edit-address-form").querySelectorAll("[required]").forEach(function(i) {
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
                recipient_name = $('#update-recipient-name'+addressId).val();
                zipcode = $('#update-zipcode'+addressId).val();
                address = $('#update-address'+addressId).val();
                number = $('#update-address-number'+addressId).val();
                neighborhood = $('#update-neighborhood'+addressId).val();
                complement = $('#update-complement'+addressId).val();
                city = $('#update-city'+addressId).val();
                state = $('#update-state'+addressId).val();
                user_id = {{ \Auth::user()->id }};
                // Send AJAX request to store deliveryInfos
                let routeUpdate = "{{ route('deliveryInfos.update', ':delivery_info_id') }}";
                routeUpdate = routeUpdate.replace(':delivery_info_id', addressId);
                $.ajax({
                    url: routeUpdate,
                    datatype: "json",
                    data: {recipient_name, zipcode, address, number, neighborhood, complement, city, state, user_id, _token: "{{ csrf_token() }}" },
                    method: "PATCH"
                })
                .done(function(response) {
                    location.reload();
                });
            });

            // Check if user want to change it's password
            $(document).on('change', '#keep-password', function () {
                if($(this).is(":checked")){
                    $(".hide-field").hide();
                    $(".must-be-required").prop('required', false);
                }else{
                    $(".hide-field").show();
                    $(".must-be-required").prop('required', true);
                }
            });

            // Send ajax request to update user's info
            $(document).on('click', "#update-user", function() {
                let allFilled = true;
                document.getElementById("edit-form").querySelectorAll("[required]").forEach(function(i) {
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

                name = $('#user-name').val();
                email = $('#user-email').val();
                cpf = $('#user-cpf').val();
                phone_number = $('#user-phone-number').val();
                password = $('#user-password').val();
                photo = $('#user-photo').files[0];
                delete_photo = $('#user-delete').val();
                role_name = 'user';

                if($('#keep-password').is(":checked")){
                    keep_password = true;
                }else{
                    // Check if both passwords are the same
                    password_confirmation = $('#user-password-confirmation').val();
                    if(password != password_confirmation){
                        Swal.fire({
                            title: "As senhas não coincidem.",
                            html: "Digite novamente.",
                            icon: "error",
                            showCloseButton: true,
                            showConfirmButton: false
                        });
                        return;
                    }
                    keep_password = false;
                }
                let routeUpdate = "{{ route('users.update', ':user_id') }}";
                route = routeUpdate.replace(':user_id', {{ $user->id }});
                $.ajax({
                    url: route,
                    datatype: "json",
                    data: {name, email, cpf, phone_number, keep_password, password, photo, delete_photo, role_name, _token: "{{ csrf_token() }}" },
                    method: "PATCH"
                })
                .done(function(response) {
                    location.reload();
                });
            });
        });
    </script>
@endpush
