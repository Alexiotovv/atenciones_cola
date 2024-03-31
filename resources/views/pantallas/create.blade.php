@extends('bases.base')
@section('content')
<div class="card">
    <div class="card-body">
        <h5>Crear Recurso</h5>
            <form action="{{route('pantallas.store')}}" method="POST" enctype="multipart/form-data">@csrf
                <label for="">Recurso(Video, Imagen)</label>
                <input type="file" value="" class="form-control" name="recurso" required>
                <label for="">Tipo</label>
                <select name="tipo" id="" class="form-select">
                    <option value="video">video</option>
                    <option value="imagen">imagen</option>
                    <option value="documento">documento(pdf,word,etc)</option>
                </select>
                <label for="">Estado</label>
                <select name="estado" id="" class="form-select">
                    <option value="0">Deshabilitado</option>
                    <option value="1">Habilitado</option>
                </select>
                <br>
                <button class="btn btn-primary bt-sm">Guardar</button>
            </form>

        </form>
      
    </div>
</div>

@endsection

@section('script')

@endsection