@extends('bases.base')
@section('content')
<div class="card">
    <div class="card-body">
        @if(session()->has('error'))
            <div class="col-sm-4">
                <div class="alert border-0 border-start border-5 border-danger alert-dismissible fade show py-2">
                    <div class="d-flex align-items-center">
                        <div class="font-35 text-danger"><i class='bx bxs-check-circle'></i>
                        </div>
                        <div class="ms-3">
                            <h6 class="mb-0 text-danger">Mensaje</h6>
                            <div>{{Session::get('error')}}</div>
                        </div>
                    </div>
                    
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif
        @if(session()->has('mensaje'))
            <div class="col-sm-4">
                <div class="alert border-0 border-start border-5 border-success alert-dismissible fade show py-2">
                    <div class="d-flex align-items-center">
                        <div class="font-35 text-success"><i class='bx bxs-check-circle'></i>
                        </div>
                        <div class="ms-3">
                            <h6 class="mb-0 text-success">Mensaje</h6>
                            <div>{{Session::get('mensaje')}}</div>
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif

        <div class="col-sm-12" style="text-align: -webkit-right">
            <a class="btn btn-primary btn-sm" href="{{route('pantallas.create')}}" id="btnPantalla" href="">Nuevo</a>
        </div>
        <br>

        <div class="table-responsive">
            <table id="dtPantallas" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Recurso</th>
                        <th>Tipo</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pantallas as $p)
                        <tr>
                            <td>{{$p->id}}</td>
                            <td>{{$p->recurso}}</td>
                            <td>{{$p->tipo}}</td>
                            <td>
                                <div class="form-check form-switch">
                                    @if ($p->estado)
                                        <input class="form-check-input chkestado" onclick="cambia_estado('estado')" type="checkbox" id="chkestado" checked>
                                    @else
                                        <input class="form-check-input chkestado" onclick="cambia_estado('estado')" type="checkbox" id="chkestado">
                                    @endif
                                </div>
                            </td>
                            <td>
                                <a class="btn btn-warning btn-sm" href="{{route('pantallas.edit',$p->id)}}">Editar</a>
                                <a class="btn btn-danger btn-sm" href="{{route('pantallas.destroy',$p->id)}}">Eliminar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>Recurso</th>
                        <th>Tipo</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

@endsection

@section('script')
   <script>
    function cambia_estado(elemento) { 
        $(document).on("click",".chk"+ elemento +"",function (e){
            // e.preventDefault();
            if ($(this).prop('checked')) { valor=1; } else { valor=0; }
            fila = $(this).closest("tr");
            id = (fila).find('td:eq(0)').text();
            
            $.ajax({
                type: "GET",
                url: "/pantallas/"+ elemento +"/"+ id +"/valor/"+ valor,
                dataType: "json",
                success: function (response) {
                    console.log(response);
                }
            });            
        })
    }
   </script>
@endsection