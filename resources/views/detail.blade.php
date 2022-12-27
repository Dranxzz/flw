@extends('layouts.exchange')
@section('content')

    <!--/ Intro Skew Star /-->
    <div class="intro intro-single route bg-image" style="background-image: url(img/overlay-bg.jpg)">
        <div class="overlay-mf"></div>
        <div class="intro-content display-table">
            <div class="table-cell">
                <div class="container">
                    <h2 class="intro-title mb-4">{{ $product->name }}</h2>
                    <ol class="breadcrumb d-flex justify-content-center">
                        <li class="breadcrumb-item">
                            <a href="#">compra</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="#">{{ $product->name }}</a>
                        </li>
                        <li class="breadcrumb-item active">data</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!--/ Intro Skew End /-->

    <!--/ Section Blog-Single Star /-->
    <section class="blog-wrapper sect-pt4" id="blog">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="post-box">
                        <div class="post-thumb">
                            <img src="img/post-1.jpg" class="img-fluid" alt="">
                        </div>
                        <div class="post-meta">
                            <h1 class="article-title">{{ $product->name }}</h1>

                        </div>
                        <div class="article-content" id="app">
                            <p>{{ $product->description }}</p>

                            <blockquote class="blockquote">
                                <p class="mb-0">Monto Minimo: {{ $product->minimum_amount }}</p>
                                <p class="mb-0">{{ $product->char->name }}</p>
                                <p class="mb-0">{{ $product->char->description }}</p>
                                <ul>
                                    @foreach ($product->exchange as $item)
                                        <li>{{ $product->name }} a {{ $item->coin->name }} = {{ $item->amount }}</li>
                                    @endforeach

                                </ul>
                            </blockquote>
                            <saleproduct product="{{ $product->id }}" />

                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>
    <!--/ Section Blog-Single End /-->
