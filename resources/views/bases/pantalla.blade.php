<!doctype html>
<html lang="es">


<!-- Mirrored from codervent.com/mons/syndron/demo/vertical/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 13 Mar 2023 12:39:18 GMT -->
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="{{ asset('assets/images/favicon-32x32.png')}}" type="image/png" />
	<!--plugins-->
	<link href="{{asset('assets/plugins/simplebar/css/simplebar.css')}}" rel="stylesheet" />
	<link href="{{asset('assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet" />
	<link href="{{asset('assets/plugins/metismenu/css/metisMenu.min.css')}}" rel="stylesheet" />
	<link href="{{asset('assets/plugins/datatable/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet" />
	<!-- loader-->
	<link href="{{asset('assets/css/pace.min.css')}}" rel="stylesheet" />
	<script src="{{asset('assets/js/pace.min.js')}}"></script>
	<!-- Bootstrap CSS -->
	<link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{asset('assets/css/bootstrap-extended.css')}}" rel="stylesheet">
	<link href="{{asset('assets/css/app.css')}}" rel="stylesheet">
	<link href="{{asset('assets/css/icons.css')}}" rel="stylesheet">
	<!-- Theme Style CSS -->
	<link rel="stylesheet" href="{{asset('assets/css/dark-theme.css')}}" />
	<link rel="stylesheet" href="{{asset('assets/css/semi-dark.css')}}" />
	<link rel="stylesheet" href="{{asset('assets/css/header-colors.css')}}" />
	<link rel="stylesheet" href="{{asset('assets/plugins/notifications/css/lobibox.min.css')}}" />
	
	<link href="{{asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet" />
	<link href="{{asset('assets/plugins/select2/css/select2-bootstrap4.css')}}" rel="stylesheet" />
	<title>Atención</title>
</head>

<body>

        @yield('pantalla_contenido')
        
        {{-- @else
        <div class="row">
                <div class="col-md-4">
                    <a type="button" class="btn btn-primary" href="{{route('credentials')}}">Inicie sesión</a>
                </div>
            </div>
		@endif --}}
		
		<!-- Bootstrap JS -->
		<script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
		<!--plugins-->
		<script src="{{asset('assets/js/jquery.min.js')}}"></script>
		<script src="{{asset('assets/plugins/simplebar/js/simplebar.min.js')}}"></script>
		<script src="{{asset('assets/plugins/metismenu/js/metisMenu.min.js')}}"></script>
		<script src="{{asset('assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js')}}"></script>
		{{-- <script src="{{asset('assets/plugins/apexcharts-bundle/js/apexcharts.min.js')}}"></script> --}}
		<script src="{{asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
		<script src="{{asset('assets/plugins/datatable/js/dataTables.bootstrap5.min.js')}}"></script>
		
		<!--notification js -->
		<script src="{{asset('assets/plugins/notifications/js/lobibox.min.js')}}"></script>
		<script src="{{asset('assets/plugins/notifications/js/notifications.min.js')}}"></script>
		<script src="{{asset('assets/plugins/notifications/js/notification-custom-script.js')}}"></script>

		<script src="{{asset('assets/js/index.js')}}"></script>
		<!--app JS-->
		<script src="{{asset('assets/js/app.js')}}"></script>

		<script src="{{asset('assets/plugins/select2/js/select2.min.js')}}"></script>
		<script src="{{asset('assets/js/form-select2.js')}}"></script>
		
		@yield('script')

</body>


<!-- Mirrored from codervent.com/mons/syndron/demo/vertical/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 13 Mar 2023 12:41:08 GMT -->
</html>