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
            <a class="btn btn-primary btn-sm" id="btnNuevo" href="{{route('atenciones.create')}}">Nuevo</a>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-6">
                <div class="alert alert-primary border-0 bg-primary alert-dismissible fade show py-2">
                    <div class="d-flex align-items-center">
                        <div class="font-35 text-white"><i class='bx bx-bookmark-heart'></i>
                        </div>
                        <div class="ms-3">
                            <h6 class="mb-0 text-white">Atención Actual</h6>
                            <div class="text-white" id="paciente">
                                
                            </div>
                            <input type="text" id="id_atencion" value="" hidden>
                        </div>
                        <br>
                    </div>
                    
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
            <div class="col-sm-6">
                <a class="btn btn-info" id="btnactivar_voz"><i class="fadeIn animated bx bx-user-voice"></i></a>
            </div>
        </div>


        <div class="table-responsive">
            <table id="dtUsuarios" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Lugar</th>
                        <th>Estado</th>
                        <th>PersonalSalud</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($atenciones as $a)
                        <tr>
                            <td>{{$a->id}}</td>
                            <td>{{$a->nombres}}</td>
                            <td>{{$a->apellidos}}</td>
                            <td>{{$a->lugar}}</td>
                            <td>
                                @if ($a->estado==0)
                                    <p style="color: green;">EN ESPERA</p> 
                                @elseif ($a->estado==1)
                                    <p style="color: rgb(191, 57, 36)28, 64, 0)">EN ATENCIÓN</p> 
                                @elseif ($a->estado==2)
                                    <p style="color: rgb(151, 133, 130)28, 64, 0)">ATENDIDO</p> 
                                @endif
                                
                            </td>
                            <td>
                                {{$a->name}}
                            </td>
                            <td>
                                <a class="btn btn-warning btn-sm" href="{{route('atenciones.edit',$a->id)}}">Editar</a>
                                <a class="btn btn-primary btn-sm btnLlamada">Llamar</a>
                                <a class="btn btn-danger btn-sm btnterminar_atencion">Terminar Atención</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Lugar</th>
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
        $(document).on("click",'.btnterminar_atencion',function (e) { 
            e.preventDefault();
            fila = $(this).closest("tr");
            id = (fila).find('td:eq(0)').text();

            e.preventDefault();
            $.ajax({
                type: "GET",
                url: "/atenciones/terminar/"+id,
                data: "data",
                dataType: "json",
                success: function (response) {
                    $("#paciente").text('');
                    $("#id_atencion").val('');
                    round_success_noti(response)
                    fila.find('td:eq(4)').text('ATENDIDO');
                    // window.location.reload();
                },
                statusCode: {
                    409: function() {
                        round_warning_noti('No se encontró en atención');
                    },
                },  
            });
         })


        $(document).on("click",".btnLlamada",function (e) { 
            fila = $(this).closest("tr");
            id = (fila).find('td:eq(0)').text();
            nombres = (fila).find('td:eq(1)').text() +" "+(fila).find('td:eq(2)').text();
            e.preventDefault();
            
            $.ajax({
                type: "GET",
                url: "/atenciones/llamada/"+id,
                data: "data",
                dataType: "json",
                success: function (response) {                    
                    $("#paciente").text(nombres);
                    $("#id_atencion").val(id);
                    fila.find('td:eq(4)').text('EN ATENCIÓN');
                    round_success_noti(response)
                },
                statusCode: {
                    409: function() {
                        round_warning_noti('Termina la atención actual para realizar otra llamada');
                    },
                },  
                
            });
         })
    </script>
    <script>
        $("#btnactivar_voz").on("click",function (e) { 
            e.preventDefault();
            if ($("#id_atencion").val()!=='') {
                $.ajax({
                    type: "GET",
                    url: "/pantallas/activar_voz/"+$("#id_atencion").val(),
                    dataType: "json",
                    success: function (response) {
                        
                    }
                });
            }
         })
    </script>
    <script>
         $(document).ready(function() {
            $('#dtUsuarios').DataTable({
                "order": [[ 0, "desc" ]] // Ordenar por la primera columna (columna 0) de forma ascendente
            });

            $.ajax({
                type: "GET",
                url: "/atenciones/atencion_actual",
                dataType: "json",
                success: function (response) {
                    // console.log(response)
                    $("#paciente").text(response[0].nombres + " " +response[0].apellidos);
                    $("#id_atencion").val(response[0].id);
                }
            });


        });
    </script>
@endsection