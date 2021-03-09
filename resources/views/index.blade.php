@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tiendas</div>
                <div class="card-body"><a href="{{route('create')}}" class="btn btn-success btn-block">Añadir un nueva tienda</a>
                    <table class='table'> 
                    @if($shops->count()) 
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tiendas</th>
                                <th>Productos</th>
                                <th>Acciones</th>
                            </tr>
                        </thead> 
                    @endif 
                    <tbody> 
                        @forelse($shops as $shop) <tr>
                                <td>{{$shop->id}}</td>
                                <td width="40%">{{$shop->name}}</td>
                                <td>{{$shop->products_count}}</td>
                                <td>
                                    <a href="{{route('show',$shop->id)}}" class="btn btn-dark">Mostrar productos </a>
                                </td>
                                <td>
                                    <form method="POST" action="{{route('destroy',['id'=>$shop->id])}}"> 
                                    @method ("DELETE") 
                                    @csrf 
                                    <button type="submit" class="btn btn-danger">Eliminar tienda</button> 
                                    </form>
                                </td>
                            </tr> @empty <tr>
                                <td colspan="3">
                                    <p class="alert alert-warning text-center">No hay tiendas</p>
                                </td>
                            </tr> @endforelse </tbody>
                    </table>
                    @if($shops->count()){{$shops->links()}}
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection