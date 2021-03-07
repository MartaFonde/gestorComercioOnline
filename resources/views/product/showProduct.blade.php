@extends('layouts.app') 
@section('content') <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-  8">
            <div class="card">
                <div class="card-header">Productos de la tienda <b>{{$shop->name}}</b></div> 
                <a href="{{route('index')}}" class="btn  btn-info  text-white">Volver al listado de tiendas</a> 
                <!-- PROBLEMAS  -->
                <a href="{{route('createProduct',$shop->id)}}" class="btn btn-success btn-block mt-3">Añadir un nuevo producto</a>
                <!-- 404 NOT FOUND -->
                <table class='table'> @if($shop->products->count()) <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Precio</th>
                        </tr>
                    </thead> @endif <tbody> @forelse($shop->products as $product) <tr>
                            <td width="70%">{{$product->name}}</td>
                            <td>{{$product->description}}</td>
                            <td>{{$product->price}}</td>
                            <td><a href="{{route('index')}}" class="btn btn-dark">Ir a la lista de tiendas </a></td>
                        </tr> @empty <tr>
                            <td colspan="3">
                                <p class="alert    alert-warning    text-center">No hay productos</p>
                            </td>
                        </tr> 
                        @endforelse </tbody>
                </table>
            </div>
        </div>
    </div>
</div> @endsection