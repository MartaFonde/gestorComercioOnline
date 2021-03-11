@extends('layouts.app') 

@section('content') 
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-  8">
            <div class="card">
                <div class="card-header">Información sobre producto<b></b></div>                 
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
                    <a href="{{route('show', $product->shop_id)}}" class="btn btn-info">Volver a la tienda</a>
                    <br><br>
                    <a href="{{route('index')}}" class="btn  btn-dark  text-white">Volver al listado de tiendas</a> 
                </div>
            </div>
        </div>
    </div>
</div> 
@endsection