<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset='utf-8'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	@yield('cssperpage')

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
	
	</style>

	@include('csslink')
</head>
<body>
	
		{{-- <div class="col-xs-4">

				<button class="clearbtn greyhover inline-block large setting-button" href="{{ route('logout') }}" onclick="event.preventDefault();
			document.getElementById('logout-form').submit();">
	 <span class="glyphicon glyphicon-off"></span>
					 </button>
			
					 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
			@csrf
			</form>
			
			</div> --}}
	@guest

		<div class="to-animate">
			<h1>You found our website Good job!!!</h1>
			<h1>Now Leave</h1>
		</div>

	@else

		<header class="noprint">
			@include('others.header')
		</header>   

		@yield('content')

		@include('scriptsrc')

		@yield('srcperpage')

	@endguest

	
</body>
</html>
