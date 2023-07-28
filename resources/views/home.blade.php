@extends('layouts.app')

@section('content')
    <div class="page-title-box">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h6 class="page-title">Inicio</h6>
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item active">Bienvenido a FunHotel</li>
                </ol>
                <ul class="ul">
                    <li class="li">F</li>
                    <li class="li">U</li>
                    <li class="li">N</li>
                    <li class="li">H</li>
                    <li class="li">O</li>
                    <li class="li">T</li>
                    <li class="li">E</li>
                    <li class="li">L</li>
                </ul>
            </div>

        </div>
    </div>
    
    <style>
        .ul {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            margin: 0;
            padding: 0;
            display: flex;
        }

        .ul .li {
            list-style: none;
            font-family: arial;
            font-size: 3em;
            letter-spacing: 15px;
            text-shadow: none;
            animation: animate 1s linear infinite;
        }

        @keyframes animate {
            0% {
                color: #ffffff;
                text-shadow: none;
            }

            18% {
                color: #ffffff;
                text-shadow: none;
            }

            20% {
                color: #008cff;
                text-shadow: 0 0 7px #008cff, 0 0 20px #e100ff;
            }

            30% {
                color: #ffffff;
                text-shadow: none;
            }

            35% {
                color: #008cff;
                text-shadow: 0 0 7px #008cff, 0 0 20px #e100ff;
            }

            70% {
                color: #ffffff;
                text-shadow: none;
            }

            85% {
                color: #008cff;
                text-shadow: 0 0 7px #008cff, 0 0 20px #e100ff;
            }

            90% {
                color: #ffffff;
                text-shadow: none;
            }

            100% {
                color: #ffffff;
                text-shadow: none;
            }
        }

        .ul .li:nth-child(1) {
            animation-delay: .2s;
        }

        .ul .li:nth-child(2) {
            animation-delay: .4s;
        }

        .ul .li:nth-child(3) {
            animation-delay: .6s;
        }

        .ul .li:nth-child(4) {
            animation-delay: .8s;
        }

        .ul .li:nth-child(5) {
            animation-delay: 1s;
        }

        .ul .li:nth-child(6) {
            animation-delay: 1.2s;
        }

        .ul .li:nth-child(7) {
            animation-delay: 1.4s;
        }

        .ul .li:nth-child(8) {
            animation-delay: 1.6s;
        }
    </style>
@endsection
