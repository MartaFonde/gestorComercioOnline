@extends('layouts.app') 

@section('content') 
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-  8">
            <div class="card">
                <div class="card-header">Crear un nuevo producto</div> 
                    @include("partials.errors") 
                    <div class="card-body">
                        <form method="POST" action="{{route('storeProduct',$id)}}">  
                        @csrf                             
                            <label for="nombre">Nombre</label> 
                            <input type="text" class="form-control" name="nombre" /> 
                            <label for="descripción">Descripción</label> 
                            <input type="text" class="form-control" name="descripción" /> 
                            <label for="precio">Precio</label> 
                            <input type="text" class="form-control" name="precio" />    
                            <br>              
                            <input type="submit" class="btn  btn-block  btn-success" value="Crear producto"> 
                        </form>                     
                        <br>
                        <a href="{{route('index')}}" class="btn btn-dark btn-block mt-8">Volver al listado de tiendas</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 
@endsection