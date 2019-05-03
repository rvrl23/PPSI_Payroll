
@guest

<nav class="headnav shadow">


	<div class="guestview " id="normalview">
		<div class="grid-item left">
			<h3 class=" col-ml-4 white guestlogo"> PPSI Payroll</h3>
		</div>
		<div class="grid-item">
			<ul class="first-ul">
				<li><a class="white" href="/login"><span class="glyphicon glyphicon-tasks"></span> Login</a></li>
				<li><a class="white" href="/register"><span class="glyphicon glyphicon-user"></span> Register</a></li>
			</ul>
		</div>
		
	</div>

</nav>

@else

@if(Auth::user()->Admin == 1)

<nav class="headnav shadow">

	<div class="mobileview">

 		<div class="grid">
			<div class="mobileitem x-large">
				<label><p class="Montserrat">PPSI Payroll</p></label>
			</div>

			<div class="mobileitem right medium">
				
				<a href="/admin/setting"><img src="/uploads/avatars/{{ Auth::user()->avatar }}" class="navpic"></a>

				<p class="viewmobileitem1 segoeui normal-padding-right">{{Auth::user()->name}}</p>

				<button class="viewmobileitem2 clearbtn" id="moblie">
					<span class="glyphicon glyphicon-align-justify"></span>
				</button>

			</div>
		</div>

	</div>
	
	<div class="normalview" id="normalview">
			@if(Auth::user()->Admin == 1)
		<div class="grid-item">
			<ul class="first-ul">
				<li><a class="white" href="/dashboard"><span class="glyphicon glyphicon-tasks"></span> Dashboard</a></li>
				<li><a class="white" href="/employee"><span class="glyphicon glyphicon-user"></span> Employee</a></li>
				<li><a class="white" href="/payroll"><span class="glyphicon glyphicon-credit-card"></span> Payroll</a></li>
				<li><a class="white" href="/payslip"><span class="glyphicon glyphicon-usd"></span> Payslip</a></li>
				
			</ul>
	</div>
	<div class="grid-item-2">
			<ul class="second-ul">
				<li class="nav-item dropdown">
					<a class="clearbtn " id="navbarDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<span class="glyphicon glyphicon-cog"></span>
					</a>
				  <div class="dropdown-menu pull-left admin-settings" style="text-align: center;" aria-labelledby="navbarDropdown">

					<div class="dropdown-header yellowbg">
						
						<center><p class="settings-menu-title white Montserrat large">Settings</p></center>

					</div>

					  <div class="setting-item-1 whitebg dropdown-item row">

					  <div class="col-xs-4">

					  <a class="inline-block greyhover clearbtn large setting-button black" href="/archive">
						  <span class="glyphicon glyphicon-modal-window"></span>
					  </a>

					</div>
					
					<div class="col-xs-4">

					  <a class="inline-block greyhover black clearbtn large setting-button" href="/admin/setting">
						  <span class="glyphicon glyphicon-user"></span>
					  </a>

					</div>


					<div class="col-xs-4">

						  <button class="clearbtn greyhover inline-block large setting-button" href="{{ route('logout') }}" onclick="event.preventDefault();
							  document.getElementById('logout-form').submit();">
							 {{--  {{ __('Logout') }} --}} <span class="glyphicon glyphicon-off"></span>
							 </button>

							 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
							@csrf
						</form>

					</div>
					
					</div>
					  
				  </div>

				</li>						
	
			</ul>

</div>




	@endif
	</div>
</nav>

 @else



<nav class="headnav shadow">

	<div class="mobileview">

 		<div class="grid">
			<div class="mobileitem x-large">
				<label><p class="Montserrat">PPSI Payroll</p></label>
			</div>

			<div class="nav-item dropdown mobileitem right medium">
				
				<a class="viewmobileitem1 segoeui normal-padding-right" id="navbarDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					{{Auth::user()->name}}
				</a>
			  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
	              <a class="dropdown-item acol" href="{{ route('logout') }}"
				     onclick="event.preventDefault();
				      document.getElementById('logout-form').submit();">
				      {{ __('Logout') }}
				  </a>

				  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
				      @csrf
				  </form>
			</div>

			<button class="viewmobileitem2 clearbtn" id="moblie">
				<span class="glyphicon glyphicon-align-justify"></span>
			</button>
		</div>

	</div>
	
	<div class="normalview" id="normalview">
		@if(Auth::user()-> Admin ==0)
		
		<div class="grid-item">
			<ul class="first-ul">
				<li><a class="white" href="/emp_dashboard"><span class="glyphicon glyphicon-tasks"></span> Dashboard</a></li>
				<li><a class="white" href="/manageaccount"><span class="glyphicon glyphicon-user"></span> Profile</a></li>
				<li><a class="white" href="/attendance"><span class="glyphicon glyphicon-user"></span> Attendance</a></li>
			</ul>
		</div>
		<div class="grid-item-2">
			<ul class="second-ul">
					
						   <div class="col-xs-4">

			              	<button class="btn btn-default btn-md" href="{{ route('logout') }}" onclick="event.preventDefault();
     							 document.getElementById('logout-form').submit();">
     							{{--  {{ __('Logout') }} --}} <span class="glyphicon glyphicon-log-out"></span>Logout
          			   	    </button>

          			   	    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
							    @csrf
							</form>

						</div>
					
				
			</ul>
		</div>
		
	</div>
</nav> 
@endif

@endif

@endguest




{{--  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
  <a class="dropdown-item acol" href="{{ route('logout') }}"
     onclick="event.preventDefault();
      document.getElementById('logout-form').submit();">
      {{ __('Logout') }}
  </a>

  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
      @csrf
  </form>
</div> --}}