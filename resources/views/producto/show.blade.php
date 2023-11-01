@extends('layouts.app')

@section('template_title')
    {{ $producto->name ?? "{{ __('Show') Producto" }}
@endsection

@section('content')
    <section class="content container-fluid mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Producto</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('productos.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Rubro:</strong>
                            {{ $producto->rubro }}
                        </div>
                        <div class="form-group">
                            <strong>Subrubro:</strong>
                            {{ $producto->subrubro }}
                        </div>
                        <div class="form-group">
                            <strong>Producto:</strong>
                            {{ $producto->producto }}
                        </div>
                        <div class="form-group">
                            <strong>Marca:</strong>
                            {{ $producto->marca }}
                        </div>
                        <div class="form-group">
                            <strong>Stock:</strong>
                            {{ $producto->stock }}
                        </div>
                        <div class="form-group">
                            <strong>Precio Costo:</strong>
                            {{ $producto->precio_costo }}
                        </div>
                        <div class="form-group">
                            <strong>Foto:</strong>
                            {{ $producto->foto }}
                        </div>
                        <div class="form-group">
                            <strong>Iva:</strong>
                            {{ $producto->iva }}
                        </div>
                        <div class="form-group">
                            <strong>Ibb:</strong>
                            {{ $producto->ibb }}
                        </div>
                        <div class="form-group">
                            <strong>Impuesto Provincia:</strong>
                            {{ $producto->impuesto_provincia }}
                        </div>
                        <div class="form-group">
                            <strong>Precio Venta:</strong>
                            {{ $producto->precio_venta }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
