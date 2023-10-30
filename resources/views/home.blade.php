@extends('layouts.app')

@section('template_title')
    Producto
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>

            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                    <img src="{{ asset('/img/lambo.jpg')}}" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                    <img src="{{ asset('/img/lambo.jpg')}}" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                    <img src="{{ asset('/img/lambo.jpg')}}" class="d-block w-100" alt="...">
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
            <div>
                @foreach ($productos as $producto)
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                    <img src="{{ asset('img/img-productos/' . $producto['foto']) }}" class="card-img-top">
                        <p class="card-text">{{ $producto["producto"] }}</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
                @endforeach

                                        @foreach ($productos as $producto)
                                            <tr class="align-middle">
                                            @if (array_key_exists ("foto", $producto))
                                            <td>
                                                <?php echo $producto["foto"]; ?>
                                            </td>
                                            @endif
                                            </tr>
                                        @endforeach
            </div>
        </div>
    </div>
</div>
@endsection


