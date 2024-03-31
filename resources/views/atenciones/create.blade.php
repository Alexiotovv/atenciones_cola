@extends('bases.base')
@section('content')
<div class="card">
    <div class="card-body">
        <h5>Crear Atención</h5>
            <form action="{{route('atenciones.store')}}" method="POST">@csrf
                <label for="">Nombre</label>
                <input type="text" class="form-control" name="nombres">
                <label for="">Apellidos</label>
                <input type="text" class="form-control" name="apellidos">
                <label for="">Lugar</label>
                <select name="lugar" id="" class="form-select">
                    <option value="CONSULTORIO 1" selected>CONSULTORIO 1</option>
                    <option value="CONSULTORIO 2">CONSULTORIO 2</option>
                    
                </select>
                <label for="">Estado</label>
                <select name="estado" id="" class="form-select">
                    <option value="0" selected>ESPERA</option>
                    <option value="1">EN ATENCIÓN</option>
                    <option value="2">CERRADO</option>
                </select>
                <label for="">Personal Salud</label>
                <select name="medico" id="" class="form-select">
                    @foreach ($medicos as $med)
                        <option value="{{$med->id}}" selected>{{$med->name}}</option>
                    @endforeach
                    
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