@extends('layouts.app')

@section('content')
    <div class="container" style="margin-top: 80px;">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/home') }}">Tienda</a></li>
                <li class="breadcrumb-item active" aria-current="page">Cart</li>
            </ol>
        </nav>
        @if(session()->has('success_msg'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session()->get('success_msg') }}
                <!--<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>-->
            </div>
        @endif
        @if(session()->has('alert_msg'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {{ session()->get('alert_msg') }}
                <!--<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>-->
            </div>
        @endif
        @if(count($errors) > 0)
            @foreach($errors0>all() as $error)
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ $error }}
                    <!--<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>-->
                </div>
            @endforeach
        @endif
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <br>
                @if(\Cart::getTotalQuantity()>0)
                    <h4>{{ \Cart::getTotalQuantity()}} Producto(s) en el carrito</h4><br>
                @else
                    <h4>No Product(s) In Your Cart</h4><br>
                    <a href="{{ url('/home') }}" class="btn btn-dark">Continue en la tienda</a>
                @endif

                @foreach($cartCollection as $item)
                    <div class="row">
                        <div class="col-lg-3">
                            <img src="{{ asset('img/img-productos/' . $item['attributes']['image']) }}" class="img-thumbnail" width="200" height="200">
                        </div>
                        <div class="col-lg-5">
                            <p>
                                <b class="fs-5">{{ $item['attributes']['slug'] }}</b><br>
                                <b>Precio/u: </b>${{ $item->price }}<br>
                                <b>Sub Total: </b>${{ \Cart::get($item->id)->getPriceSum() }}<br>
                                {{--                                <b>With Discount: </b>${{ \Cart::get($item->id)->getPriceSumWithConditions() }}--}}
                            </p>
                        </div>
                        <div class="col-lg-4">
                            <div class="row">
                                <form id="form_update" action="{{ route('cart.update') }}" method="POST" class="p-0 col-6" autocomplete="off">
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <button class="btn btn-secondary btn-sm col-4 m-0" style="margin-right: 25px;"><i class="fa fa-edit">-</i></button>
                                        <input type="hidden" value="{{ $item->id }}" id="id" name="id">
                                        <input type="text" class="form-control-sm input-number-spinner-disabled m-0 col-4 p-0" value="{{ $item->quantity }}" 
                                        id="quantity" name="quantity" style="cursor: auto; text-align: center;">
                                        <button class="btn btn-secondary btn-sm col-4 m-0" style="margin-right: 25px;" name="mas" value="true"><i class="fa fa-edit">+</i></button>
                                    </div>

                                </form>
                                <form action="{{ route('cart.remove') }}" method="POST" class="p-0 col-2 ms-5">
                                    {{ csrf_field() }}
                                    <input type="hidden" value="{{ $item->id }}" id="id" name="id" >
                                    <button class="btn btn-dark btn-sm" style="margin-right: 10px;"><i class="fa fa-trash">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ff2825" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M4 7l16 0" />
                                    <path d="M10 11l0 6" />
                                    <path d="M14 11l0 6" />
                                    <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                    <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                    </svg>
                                    </i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <hr>
                @endforeach
                @if(count($cartCollection)>0)
                    <form action="{{ route('cart.clear') }}" method="POST">
                        {{ csrf_field() }}
                        <button class="btn btn-secondary btn-md">Borrar Carrito</button> 
                    </form>
                @endif
            </div>
            @if(count($cartCollection)>0)
            
                <div class="col-lg-5">
                    
                    <div class="d-flex">
                        <button id="miBoton" class="btn btn-primary mi-boton">
                            <svg id="envio-si" xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-truck" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#00b341" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <path d="M7 17m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                            <path d="M17 17m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                            <path d="M5 17h-2v-11a1 1 0 0 1 1 -1h9v12m-4 0h6m4 0h2v-6h-8m0 -5h5l3 5" />
                            </svg>

                            <svg id="envio-no" xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-truck-off" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ff2825" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <path d="M7 17m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                            <path d="M15.585 15.586a2 2 0 0 0 2.826 2.831" />
                            <path d="M5 17h-2v-11a1 1 0 0 1 1 -1h1m3.96 0h4.04v4m0 4v4m-4 0h6m6 0v-6h-6m-2 -5h5l3 5" />
                            <path d="M3 3l18 18" />
                            </svg>
                        </button>
                        <p class="mt-5"> <-- Habilitar envío? </p>
                    </div>
                    <div class="card">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <b id="total-sin-envio">Total sin envío: ${{ \Cart::getTotal() }}</b>
                                <?php $total = \Cart::getTotal(); $total += $total * 0.1; ?>
                                <b id="total-con-envio">Total con envío: ${{ $total }}</b>
                                
                            </li>
                        </ul>
                    </div>
                    <div class="row m-1 mt-3">
                    <br><a href="{{ url('/home') }}" class="btn btn-dark col-6">Continue en la tienda</a>
                    <a id="pedido-con-envio" href="{{ route('cart.generarFactura', 'conEnvio= true') }}" class="btn btn-success col-6">Proceder al Checkout</a>
                    <a id="pedido-sin-envio" href="{{ route('cart.generarFactura', 'conEnvio= false') }}" class="btn btn-success col-6">Proceder al Checkout</a>
                    </div>
                    <style>
                            .mi-boton {
                                transition: background-color 0.3s, color 0.3s;
                                cursor: pointer;
                                background-color: #000000;
                                margin: 2rem 1rem 1rem 0rem;
                                }
                            .mi-boton:hover{
                                background-color: #000000;
                            }
                            #pedido-sin-envio{
                                display:block;
                            }
                            #pedido-con-envio{
                                display:none;
                            }
                            #pedido-sin-envio.noMostrar{
                                display:none;
                            }
                            #pedido-con-envio.mostrar{
                                display:block;
                            }
                            #envio-si{
                                display:none;
                            }
                            #envio-si.noMostrar{
                                display:block;
                            }
                            #envio-no{
                                display:block;
                            }
                            #envio-no.mostrar{
                                display:none;
                            }
                            #total-sin-envio{
                                display:block;
                            }
                            #total-sin-envio.noMostrar{
                                display:none;
                            }
                            #total-con-envio{
                                display:none;
                            }
                            #total-con-envio.mostrar{
                                display:block;
                            }
                        </style>

                        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4kWbQ78iYhFldvKuhfTAU6auU8ttT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"></script>
                        <script>
                        document.querySelector('#miBoton').addEventListener('click', function() {
                        document.getElementById('envio-no').classList.toggle('mostrar');
                        document.getElementById('envio-si').classList.toggle('noMostrar');
                        document.getElementById('total-sin-envio').classList.toggle('noMostrar');
                        document.getElementById('total-con-envio').classList.toggle('mostrar');
                        document.getElementById('pedido-sin-envio').classList.toggle('noMostrar');
                        document.getElementById('pedido-con-envio').classList.toggle('mostrar');
                        });
                        </script>
                </div>
            @endif
        </div>
        <br><br>
    </div>
@endsection