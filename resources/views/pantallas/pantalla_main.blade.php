@extends('bases.pantalla')
@section('pantalla_contenido')
    <div class="card">
        <video width="100%" height="650px" controls autoplay>
            <source src="{{asset('storage/recursos/'.$pantalla[0]->recurso)}}" type="video/mp4">
        </video>
        
        <div class="row" id="content_paciente">

        </div>

    </div>
    <audio id="myAudio">
        <source src="{{ asset('storage/recursos/tono_llamada.mp3') }}" type="audio/mp3">
    </audio>
@endsection

@section('script')
    {{-- <script src="https://code.responsivevoice.org/responsivevoice.js?key=a1aIDqMK"></script> --}}

    <script>
        function reproducirSonido() {
            var audio = document.getElementById("myAudio");
            audio.play();
        }

        function VerificarLlamada(){
            $.ajax({
                type: "GET",
                url: "/atenciones/verificarllamada",
                dataType: "json",
                success: function (response) {
                    $('#content_paciente').empty();

                    response.forEach(element => {
                        var nuevaColumna = $('<div class="col-md-6" style="border:solid">'+
                            '<h1 class="display-2" style= "font-weight: bold;color:#119393">'+ element.nombres + " "+element.apellidos +'</h1>'+
                            '<h1 class="display-2" style= "font-weight: bold;color:#113293">'+ element.lugar +'</h1>'
                            +'</div>');
                        $('#content_paciente').append(nuevaColumna);
                        
                        
                        if (element.voz==1) {
                            reproducirSonido();

                            setTimeout(function() {
                                var texto = element.nombres +" "+ element.lugar; 
                                //Emitiendo voz
                                var synthesis = new SpeechSynthesisUtterance(texto);
                                
                                synthesis.lang = 'es-EN';
                                synthesis.rate = 1.2; // Velocidad normal
                                synthesis.pitch = 1.0; // Tono normal
                                window.speechSynthesis.speak(synthesis);
                                
                                // //desactivar voz
                                $.ajax({
                                    type: "GET",
                                    url: "/pantallas/desactivar_voz/"+element.id,
                                    dataType: "json",
                                    success: function (response) {
                                        
                                    }
                                });
                                
                                }, 3000);

                                
                            
                            
                        }

                    });
                }
            });
        }

        setInterval(VerificarLlamada, 5000); // 10000 milisegundos = 10 segundos


        // $("#btnHablar").on("click",function (e) { 
        //     e.preventDefault();
        //     var texto = "Jhon Bardales Consultorio 1"; 
        //     // responsiveVoice.speak(texto, "Spanish Female");

        //     var synthesis = new SpeechSynthesisUtterance(texto);
        //     synthesis.lang = 'es-EN';
        //     synthesis.rate = 1.0; // Velocidad normal
        //     synthesis.pitch = 1.0; // Tono normal

        //     window.speechSynthesis.speak(synthesis);
        //  })

    </script>
@endsection