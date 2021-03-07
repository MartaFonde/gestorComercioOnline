@extends('layouts.app')@section('content')<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Crear nueva tienda</div> @include("partials.errors")<div class="card-body">
                    <form method="POST" action="{{route('store')}}"> 
                    @csrf 
                    <div class="form-group"> 
                    <label for="name">Nombre</label> 
                    <input type="text" class="form-control" name="name" />
                    <label for="address">Dirección</label> 
                    <input type="text" class="form-control" name="address" />
                    <label for="numberTelephone">Número de telefono</label> 
                    <input type="text" class="form-control" name="numberTelephone" />
                    </div>
                    <input type="submit" class="btn btn-block btn-dark" value="Crear Tienda"></form>
                </div>
            </div>
        </div>
    </div>
</div>@endsection