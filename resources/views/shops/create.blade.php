@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Crear nueva tienda</div> 
                @include("partials.errors")
                <div class="card-body">
                    <form method="POST" action="{{route('store')}}">
                        @csrf                                                             
                        <label for="nombre">Nombre</label> 
                        <input type="text" class="form-control" name="nombre" />
                        <label for="dirección">Dirección</label> 
                        <input type="text" class="form-control" name="dirección" />
                        <label for="teléfono">Teléfono</label> 
                        <input type="text" class="form-control" name="teléfono" />
                        <br>
                    <input type="submit" class="btn btn-block btn-success" value="Crear Tienda"></form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection