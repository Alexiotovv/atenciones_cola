@extends('bases.base')
@section('content')
<div class="card">
    <div class="card-body">
        <h5>Editar Pantalla</h5>
            <form action="{{route('pantallas.update')}}" method="POST">@csrf
                <input type="text" name="id" value="{{$pantalla->id}}" hidden>
                <label for="">Recurso(Video, Imagen)</label>
                <input type="text" value="{{$pantalla->recurso}}" class="form-control" name="recurso">
                
                <br>
                <button class="btn btn-primary bt-sm">Guardar</button>
            </form>

        </form>
      
    </div>
</div>

@endsection

@section('script')

@endsection