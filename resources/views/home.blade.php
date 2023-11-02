@extends('layouts.app')

@section('template_title')
    Producto
@endsection

@section('content')

<div id="carouselExampleControls" class="carousel slide mt-0" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                    <img src="{{ asset('/img/lambo.jpg')}}" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                    <img src="{{ asset('/img/bmw.jpeg')}}" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                    <img src="{{ asset('/img/toallin.jpg')}}" class="d-block w-100" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
</div>
<div class="container-fluid">
    <div class="container-lg">
        <div class="row justify-content-center"> 
            @foreach ($productos as $producto) 
            <div class="card col-3 m-4">
                <div class="card-body">
                    <img src="{{ asset('img/img-productos/' . $producto['foto']) }}" class="card-img-top rounded">
                </div>
                <div class="card-body">
                    <h4 class="card-title justify-content-end">{{ $producto["producto"] }}</h4>
                    <p class="card-text">${{ $producto["precio_venta"] }}</p>

                    <form action="{{ route('cart.store') }}" method="POST">
                                        {{ csrf_field() }}
                                        <input type="hidden" value="{{ $producto['id'] }}" id="id" name="id">
                                        <input type="hidden" value="{{ $producto['rubro'] }}" id="rubro" name="rubro">
                                        <input type="hidden" value="{{ $producto['precio_venta'] }}" id="precio_venta" name="precio_venta">
                                        <input type="hidden" value="{{ $producto['foto'] }}" id="foto" name="foto">
                                        <input type="hidden" value="{{ $producto['producto'] }}" id="producto" name="producto">
                                        <input type="hidden" value="1" id="quantity" name="quantity">
                                        <div class="card-footer" style="background-color: white;">
                                            <div class="row">
                                                <button class="btn btn-secondary btn-sm" class="tooltip-test" title="add to cart">
                                                    <i class="fa fa-shopping-cart"></i> agregar al carrito
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection


