@extends('layouts.app') )
@section('content') 

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-  8">
            <div class="card">
                <div class="card-header">Detalle de la Tienda <b>{{$shop->nombre}}</b></div> 
                <a href="{{route('index')}}" class="btn  btn-info  text-white">Volver al listado de tiendas</a> 

                @if(auth()->check() && ($shop->user_id == auth()->user()->id || auth()->user()->rol==0))
                <a href="{{route('createProduct',['id'=>$shop->id])}}" class="btn btn-success btn-block mt-3">Añadir un nuevo producto</a>
                @endif

                <table class='table'> 
                    @if($shop->products->count()) 
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Producto</th>
                        </tr>
                    </thead> 
                    @endif 
                    <tbody> 
                    @forelse($shop->products as $product) 
                        <tr>
                            <td>{{$product->id}}</td>
                            <td width="70%">{{$product->nombre}}</td>
                            <td>{{$shop->products_count}}</td>
                            <td>
                                <a href="{{route('showProduct',['id'=>$product->id])}}" class="btn btn-dark">Ir al producto </a>
                            </td>
                            @if(auth()->check() && ($shop->user_id == auth()->user()->id || auth()->user()->rol==0))
                            <td>
                                <form method="POST" action="{{route('destroyProduct', ['id'=>$product->id])}}"> 
                                    @method ("DELETE") 
                                    @csrf 
                                    <button type="submit" class="btn btn-danger">Eliminar producto</button> 
                                </form> 
                            </td>
                            @endif
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