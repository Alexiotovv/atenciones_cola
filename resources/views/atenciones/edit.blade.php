@extends('bases.base')
@section('content')
<div class="card">
    <div class="card-body">
        <h5>Editar Atención</h5>
            <form action="{{route('atenciones.update')}}" method="POST">@csrf
                <input type="text" name="id" value="{{$atencion->id}}" hidden>
                <label for="">Nombre</label>
                <input type="text" value="{{$atencion->nombres}}" class="form-control" name="nombres">
                <label for="">Apellidos</label>
                <input type="text" class="form-control" name="apellidos" value="{{$atencion->apellidos}}">
                <label for="">Lugar</label>
                <input type="text" class="form-control" name="lugar" value="{{$atencion->lugar}}">
                <label for="">Estado</label>
                <select name="estado" id="" class="form-select">
                    @if ($atencion->estado==0)
                        <option value="0"selected>ESPERA</option>
                        <option value="1" >EN ATENCIÓN</option>
                        <option value="2" >CERRADO</option>
                    @elseif ($atencion->estado==1)
                        <option value="0">ESPERA</option>
                        <option value="1" selected>EN ATENCIÓN</option>
                        <option value="2" >CERRADO</option>
                    @elseif ($atencion->estado==2)
                        <option value="0">ESPERA</option>
                        <option value="1">EN ATENCIÓN</option>
                        <option value="2" selected>CERRADO</option>
                    @endif
                </select>
                <label for="">Personal Salud</label>
                <select name="medico" id="" class="form-select">
                    @foreach ($medicos as $med)
                        @if ($med->id==$atencion->user_id)
                            <option value="{{$med->id}}" selected>{{$med->name}}</option>
                        @else
                            <option value="{{$med->id}}">{{$med->name}}</option>
                        @endif
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