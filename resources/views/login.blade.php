<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from codervent.com/mons/syndron/demo/vertical/authentication-lock-screen.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 13 Mar 2023 12:49:16 GMT -->
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="assets/images/favicon-32x32.png" type="image/png" />
	<!-- loader-->
	<link href="assets/css/pace.min.css" rel="stylesheet" />
	<script src="assets/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/css/bootstrap-extended.css" rel="stylesheet">
	<link href="assets/css/app.css" rel="stylesheet">
	<link href="assets/css/icons.css" rel="stylesheet">
	<title>Sistema de Citas</title>
</head>

<body class="bg-lock-screen">
	<!-- wrapper -->
	<div class="wrapper">
		<div class="authentication-lock-screen d-flex align-items-center justify-content-center">
			<div class="card shadow-none bg-transparent">
				<div class="card-body p-md-5 text-center">
					{{-- <h2 class="text-white">10:53 AM</h2>
					<h5 class="text-white">Tuesday, January 14, 2021</h5> --}}
					<div class="">
						<img src="assets/images/icons/user.png" class="mt-5" width="120" alt="" />
					</div>
					<form action="{{route('login')}}" method="POST">@csrf
						<p class="mt-2 text-white">Usuario</p>
						<div class="mb-3 mt-3">
							<input type="text" id="user" name="email" class="form-control" placeholder="usuario@correo.com" />
						</div>
						<p class="mt-2 text-white">Contraseña</p>
						<div class="mb-3 mt-3">
							<input type="password" id="pass" name="password" class="form-control" placeholder="*******" />
						</div>
						<div class="d-grid">
							<button type="submit" class="btn btn-white">Iniciar Sesión</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- end wrapper -->
</body>

<script src="{{asset('assets/js/jquery.min.js')}}"></script>
<script>
	// function enviarDatos() { 
	// 	_token=$('input[name="_token"]').val()
	// 	_user=$("#user").val()
	// 	_pass=$("#pass").val()
	// 	$.ajax({
	// 		type: "POST",
	// 		url: "{{route('login')}}",
	// 		data: {'email':_user,'password':_pass,'_token':_token},
	// 		dataType: "json",
	// 		statusCode: {
	// 			401: function() {
	// 				// Manejar el código de estado 200 (Éxito)
	// 				console.log("no pe")
	// 				// round_error_noti()
	// 			},
	// 			500: function() {
	// 				// Manejar el código de estado 500 (Error del servidor)
					
	// 			}
				
	// 		},
	// 		success: function (response) {
				
	// 		}

	// 	});
	//  }

</script>

<!-- Mirrored from codervent.com/mons/syndron/demo/vertical/authentication-lock-screen.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 13 Mar 2023 12:49:16 GMT -->
</html>