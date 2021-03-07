@extends('layouts.app') @section('content') <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-  8">
            <div class="card">
                <div class="card-header">Detalle de la Tienda<b>{{$shop->name}}</b></div> 
                <a href="{{route('index')}}" class="btn  btn-info  text-white">Volver al listado de tiendas</a> 
                <a href="{{route('createProduct',['shopId'=>$shop->id])}}" class="btn btn-success btn-block mt-3">Añadir un nuevo producto</a>
                
                <table class='table'> 
                    @if($shop->products->count()) 
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Productos</th>
                            <th>Acciones</th>
                        </tr>
                    </thead> 
                    @endif 
                    <tbody> 
                    @forelse($shop->products as $product) 
                        <tr>
                            <td>{{$product->id}}</td>
                            <td width="70%">{{$product->name}}</td>
                            <td>{{$shop->products_count}}</td>
                            <td><a href="{{route('showProduct',['id'=>$product->id])}}" class="btn btn-dark">Ir al producto </a></td>
                        </tr> 
                        @empty <tr>
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