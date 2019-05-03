<!DOCTYPE html>
<html>
<head>
	<title>
		@yield('title')
	</title>
	<meta charset='utf-8'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    
	<style>
	@media print {
	  a[href]:after {
	    content: none !important;
	  }

	}

	@media print {
	.noprint {
	    visibility: hidden;
	    }
	}
	
	
	/* @yield('cssperpage') ariel nag edit neto 12:41PM 22-03-2019*/
</style>
	{{-- data tables --}}
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.12/datatables.min.css"/>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"/>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css"/>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/1.2.7/css/select.dataTables.min.css"/>
  
	{{-- data tables --}}
	

	@include('csslink')
	
</head>
<body>
	@guest

	

	<div class="to-animate">
		<h1>You found our website Good job!!!</h1>
		<h1>Now Leave</h1>
	</div>
	
	@else

	@if(Auth::user()->Admin == 0)

	<div class="to-animate">
		<h1>You are not suppose to be here</h1>
		<h1>Now Leave</h1>
	</div>

	@else

	<div class="noprint">
	<header>
		@include('others.header')
	</header> 
	</div>  

	@yield('content')
	
	@include('scriptsrc')
		{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> --}}
	@yield('srcperpage')

	@endif
	
	@endguest



	{{-- <a href="/payslip">Back</a> --}}

	
</body>
{{-- <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"> --}}
</script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.12/datatables.min.js"></script>
{{-- <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script> --}}
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/select/1.2.7/js/dataTables.select.min.js"></script>

</html>