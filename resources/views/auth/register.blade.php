<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ config('app.name') }} | Cadastro</title>

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css"
          integrity="sha512-0S+nbAYis87iX26mmj/+fWt1MmaKCv80H+Mbo+Ne7ES4I6rxswpfnC6PxmLiw33Ywj2ghbtTw0FkLbMWqh4F7Q=="
          crossorigin="anonymous"/>

    <!-- AdminLTE -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.0.5/css/adminlte.min.css"
          integrity="sha512-rVZC4rf0Piwtw/LsgwXxKXzWq3L0P6atiQKBNuXYRbg2FoRbSTIY0k2DxuJcs7dk4e/ShtMzglHKBOJxW8EQyQ=="
          crossorigin="anonymous"/>

    <!-- iCheck -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/icheck-bootstrap/3.0.1/icheck-bootstrap.min.css"
          integrity="sha512-8vq2g5nHE062j3xor4XxPeZiPjmRDh6wlufQlfC6pdQ/9urJkU07NM0tEREeymP++NczacJ/Q59ul+/K2eYvcg=="
          crossorigin="anonymous"/>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        .register-page {
            background: #000000!important;
        }
        .register-page::before{
            content: "";
            position: fixed;
            left: -5%;
            top: -5%;
            background-image: url("{{asset('images/backgrounds/background-login.jpg')}}");
            background-size: cover;
            min-width: 110%;
            min-height: 110%;
            z-index: -1;
            filter: brightness(20%) blur(9px) grayscale(100%);
        }
        .btn-primary{
            background-color: #ec23bd;
            border-color: #ca1ea1;
        }
        .btn-primary:hover{
            color: #777;
            background-color: #4fd5d5;
            border-color: #329c9c;
        }
        .btn-primary:active{
            color: #777!important;
            background-color: #329c9c!important;
            border-color: #329c9c!important;
        }
        .form-control, .input-group-text{
            border-color: #ca1ea1;
        }
        .form-control:focus, .register-card-body .input-group .form-control:focus~.input-group-append .input-group-text {
            border-color: #329c9c;
        }
        .register-card-body{
            color: #ca1ea1;
        }
        a, a:hover, a:active{
            color: #329c9c;
        }
        a:hover, a:active{
            color: #2c7f80;
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
    </style>
    @include("vendor.input-customizer.masks")
    @stack("css")
</head>

<body class="hold-transition register-page">
<div class="register-box">
    <div class="register-logo" style="margin-bottom:0;margin-top:1rem">
        <a href="#"><img src="{{asset('images/logos/sneakermart-branco.png')}}" style="max-width:100%"></a>
    </div>
    <div class="card">
        <div class="card-body register-card-body">
            <p class="register-box-msg">Crie sua conta!</p>
            <form method="post" action="{{ route('register') }}">
                @csrf

                <div class="input-group mb-3">
                    <input type="text"
                           name="name"
                           class="form-control"
                           value="{{ old('name') }}"
                           placeholder="Nome completo" required>
                    <div class="input-group-append" >
                        <div class="input-group-text"><span class="fas fa-user"></span></div>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <input type="text"
                           name="cpf"
                           class="form-control cpf-mask"
                           value="{{ old('cpf') }}"
                           placeholder="CPF" required>
                    <div class="input-group-append">
                        <div class="input-group-text"><span class="far fa-address-card"></span></div>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <input type="text"
                           name="phone_number"
                           class="form-control phone-mask"
                           value="{{ old('phone_number') }}"
                           placeholder="Telefone" required>
                    <div class="input-group-append">
                        <div class="input-group-text"><span class="fas fa-phone"></span></div>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <input type="email"
                           name="email"
                           value="{{ old('email') }}"
                           class="form-control"
                           placeholder="Email" required>
                    <div class="input-group-append">
                        <div class="input-group-text"><span class="fas fa-envelope"></span></div>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <input type="password"
                           name="password"
                           id="password"
                           class="form-control"
                           placeholder="Senha" required>
                    <div class="input-group-append">
                        <div class="input-group-text"><span class="fas fa-lock"></span></div>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <input type="password"
                           id="passwordConfirmation"
                           name="password_confirmation"
                           class="form-control"
                           placeholder="Confirme a senha" required>
                    <div class="input-group-append">
                        <div class="input-group-text"><span class="fas fa-lock"></span></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <label for="isSeller">
                            Possui loja de revenda?
                        </label>
                    </div>
                    <div class="col-4">
                        <input type="checkbox" name="isSeller" id="isSeller" class="switch_1 float-right">
                    </div>
                </div>
                <div id="storeInfos" class="hidden must-change">
                    <div class="row hidden must-change">
                        <div class="col-12">
                            <div class="input-group mb-3">
                                <input type="name"
                                    name="store_infos[name]"
                                    class="form-control must-be-required"
                                    placeholder="Nome da loja">
                                <div class="input-group-append">
                                    <div class="input-group-text"><span class="fas fa-store"></span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row hidden must-change">
                        <div class="col-12">
                            <div class="input-group mb-3">
                                <input type="phone_number"
                                    name="store_infos[phone_number]"
                                    class="form-control phone-mask must-be-required"
                                    placeholder="Telefone da loja">
                                <div class="input-group-append">
                                    <div class="input-group-text"><span class="fas fa-phone"></span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row hidden must-change">
                        <div class="col-12">
                            <div class="input-group mb-3">
                                <input type="zipcode"
                                    name="store_infos[zipcode]"
                                    id="zipcode"
                                    class="form-control zipcode-mask must-be-required"
                                    placeholder="CEP">
                                <div class="input-group-append">
                                    <div class="input-group-text"><span class="fas fa-map-pin"></span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row hidden must-change">
                        <div class="col-12">
                            <div class="input-group mb-3">
                                <input type="address"
                                    name="store_infos[address]"
                                    id="address"
                                    class="form-control must-be-required"
                                    placeholder="Rua">
                                <div class="input-group-append">
                                    <div class="input-group-text"><span class="fas fa-map-marker-alt"></span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row hidden must-change">
                        <div class="col-12">
                            <div class="input-group mb-3">
                                <input type="complement"
                                    name="store_infos[complement]"
                                    id="complement"
                                    class="form-control"
                                    placeholder="Complemento">
                                <div class="input-group-append">
                                    <div class="input-group-text"><span class="fas fa-map-signs"></span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row hidden must-change">
                        <div class="col-8">
                            <div class="input-group mb-3">
                                <input type="neighborhood"
                                    name="store_infos[neighborhood]"
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
                                    name="store_infos[address_number]"
                                    class="form-control must-be-required"
                                    placeholder="Num">
                                <div class="input-group-append">
                                    <div class="input-group-text"><span class="fas fa-sort-numeric-up"></span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row hidden must-change">
                        <div class="col-8">
                            <div class="input-group mb-3">
                                <input type="city"
                                    name="store_infos[city]"
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
                                    name="store_infos[state]"
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
                <br>
                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" id="agreeTerms" name="terms" value="agree" required>
                            <label for="agreeTerms">
                                Concordo com os <a href="#">termos</a>
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Cadastrar</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
            <a href="{{ route('login') }}" class="text-center float-right">Já tenho conta</a>
        </div>
        <!-- /.form-box -->
    </div><!-- /.card -->

    <!-- /.form-box -->
</div>
<!-- /.register-box -->

<!-- AdminLTE App -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.0.5/js/adminlte.min.js"
        integrity="sha512-++c7zGcm18AhH83pOIETVReg0dr1Yn8XTRw+0bWSIWAVCAwz1s2PwnSj4z/OOyKlwSXc4RLg3nnjR22q0dhEyA=="
        crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"
        integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg=="
        crossorigin="anonymous"></script>

<!-- LoadingOverlay v2.1.6 -->
<script src="{{ asset('js/loadingoverlay.min.js') }}"></script>

<script>
    $(document).ready(function () {
        // Loading overlay
        function showLoading(customText) {
            $.LoadingOverlay("show", {
                imageColor       : '#4fd5d5',
                text             : customText,
                textResizeFactor : 0.2,
                textColor        : '#4fd5d5',
                background       : 'rgba(0, 0, 0, 0.8)',
                fade             : [200, 200],
            });
        }
        function hideLoading() {
            $.LoadingOverlay("hide");
        }

        $(document).on('change', '#isSeller', function (){
            if($(this).is(":checked")){
                $(".must-change").removeClass("hidden").addClass("visible");
                $(".must-be-required").prop('required',true);
            }else{
                $(".must-change").removeClass("visible").addClass("hidden");
                $(".must-be-required").prop('required',false);
            }
        });

        $(document).on('change', '#passwordConfirmation', function(){
            let password = $("#password").val();
            if(password != $(this).val()){
                $(this).val('');
                alert("As senhas não coincidem. Digite novamente.");
            }
        });

        $("#zipcode").on("change", function(){
            let zipcode = $(this).val();
            if (zipcode) {
                let route = "{{ route('address.findByZipcode', ':zipcode') }}";
                route = route.replace(":zipcode", zipcode);
                $.ajax({
                    url: route,
                    dataType: "json",
                    type: "GET",
                    beforeSend: function() {
                        showLoading('Buscando o endereço pelo CEP.');
                    },
                    success: function(data){
                        if(data){
                            $("#address").val(data.message.logradouro);
                            $("#neighborhood").val(data.message.bairro);
                            $("#city").val(data.message.localidade);
                            $("#state").val(data.message.uf);
                        }else{
                            window.scrollTo({top: 0, behavior: "smooth"});
                            $("#zipcode").val("");
                            alert("CEP inválido");
                        }
                    },
                    error: function(fail){
                        window.scrollTo({top: 0, behavior: "smooth"});
                        $("#zipcode").val("");
                        alert("CEP inválido");
                    },
                    complete: function() {
                        hideLoading();
                    }
                });
            }else{
                window.scrollTo({top: 0, behavior: "smooth"});
                $("#zipcode").val("");
                alert("CEP inválido");
            }
        });
    });
</script>

@stack("js")
</body>
</html>
