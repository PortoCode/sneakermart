@extends('public.layouts.app')

<head>
    <title>Avaliação</title>
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
        .pic{
            width: 10rem;
            height: 10rem;
            object-fit: cover;
        }
        .div-pic,
        .align-center{
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .margin-right{
            margin: 5%;
        }
        .size-toggle{
            height: 35%;
        }
    </style>
</head>
@section('content')
    <div class="content">
        <div class="row">
            <div class="col-12 col-md-3">
            </div>
            <div class="col-12 col-md-6 card-center">
                <div class="card w-100">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="row">
                                    <h4 class="header-title">(Nome da loja/produto)</h4>
                                    <br>
                                    <div class="card-body div-pic">
                                        <div class="row" >
                                            <div class="col">
                                                <img class="pic" src="{{asset('images/defaults/default_store.png')}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col">
                                        <div>
                                            <label class="form-label">Avaliação</label>
                                        </div>
                                        <div class="btn-group btn-group-toggle size-toggle">
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
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="exampleFormControlTextarea1" class="form-label">Comentário</label>
                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <a href="#" class='btn btn-primary btn-s align-bottom btn-size btn-text-center black-color'>
                                    <span>Avaliar</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-3">
            </div>
        </div>
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
    </script>
@endsection
