@extends('layouts.exchange')
@section('content')
    <!--/ Intro Skew Star /-->
    <div id="home" class="intro route bg-image" style="background-image: url(venta/img/intro-bg.jpg); height: 350px;">
        <div class="overlay-itro"></div>
        <div class="intro-content display-table">
            <div class="table-cell">
                <div class="container">
                    <!--<p class="display-6 color-d">Hello, world!</p>-->
                    <h1 class="intro-title mb-4">Compras</h1>
                    <!-- <p class="intro-subtitle"><span class="text-slider-items">Alquiler de Trajes,Venta de Traje ,Sastreria,Traje Medida,Reparacion</span><strong class="text-slider"></strong></p> -->
                    <!-- <p class="pt-3"><a class="btn btn-primary btn js-scroll px-4" href="about" role="button">Learn More</a></p> -->
                </div>
            </div>
        </div>
    </div>

    <!--/ Section Services Star /-->
    <section id="service" class="services-mf route">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="title-box text-center">
                        <h3 class="title-a">
                            Services
                        </h3>
                        <p class="subtitle-a">
                            Compra De Monedas
                        </p>
                        <div class="line-mf"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($products as $item)
                    <div class="col-md-4">
                        <div class="service-box">
                            <a href="{{ route('detail',$item->id) }}">
                                <div class="service-ico">
                                    <span class="ico-circle"><i class="ion-monitor"></i></span>
                                </div>
                                <div class="service-content">
                                    <h2 class="s-title">{{ $item->name }}</h2>
                                    <h6 class="s-title" style="font-size: 90%">Monto minimo <br>{{ $item->minimum_amount }}
                                    </h6>
                                    <p class="s-description text-center">
                                        {{ $item->description }}
                                    </p>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    <!--/ Section Services End /-->
