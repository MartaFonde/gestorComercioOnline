@extends('layouts.app') @section('content') <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-  8">
            <div class="card">
                <div class="card-header">Producto de la tienda<b></b></div>                 
                <table class='table'> 
                    <thead>
                        <tr>
                            <th>Nombre</th>
                        </tr>
                        <tr>
                            <td width="70%">{{$product->nombre}}</td>
                        </tr>
                    </thead>

                    <tbody>
                        
                        <tr>
                            <th>Descripción</th>
                        </tr>
                        <tr>
                            <td>{{$product->descripción}}</td>
                        </tr>

                        <tr>                            
                            <th>Precio</th>
                        </tr>

                        <tr>
                            <td>{{$product->precio}}</td>
                        </tr>
                    </tbody>                                         
                </table>
                <br><br>
                <a href="{{route('show', $product->shop_id)}}" class="btn btn-dark">Volver a la tienda</a>
                <br><br>
                <a href="{{route('index')}}" class="btn  btn-info  text-white">Volver al listado de tiendas</a> 

            </div>
        </div>
    </div>
</div> 
@endsection