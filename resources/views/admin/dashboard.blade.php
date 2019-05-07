@extends('layouts.payroll_layouts')

@section('title')
Dashboard
@endsection

@section('content')

<div class="triangle">
	
</div>

<div>
  <p class="page-label monsterrat xx-large"><span class="glyphicon glyphicon-tasks"></span> Dashboard</p>
</div>

<div class="Dashboard-grid ">
	
	<div class="Dashboard-grid-item grid-item1 shadow">
		
		<p class="medium "><span class="glyphicon glyphicon-repeat"></span> Pending Process</p>
		@if($pendingCount == 0)
		
			<center><p> There's no pending payroll </p></center>
		
		@else
		
		<table class="table small" id="pendingTable" width="100%">
			<thead>
				<td>Name</td>
				<td>Department</td>
				<td>Position</td>
				<td>Salary</td>
				<td>Action</td>
			</thead>
			<tbody>
				@foreach($pending as $pen)
				<tr>
				<td>{{$pen->first_name}} {{$pen->middle_name}} {{$pen->surname}}</td>
				<td>{{$pen->department}}</td>
				<td>{{$pen->position}}</td>
				<td>{{$pen->basic}}</td>
				<td><a class="pink" href="addpayroll/{{$pen->id_number}}">make payroll</a></td>
			    </tr>
			    @endforeach
			</tbody>
		</table>
	    @endif
		

	</div>

	<div class="Dashboard-grid-item grid-item2 shadow">
		<p class="medium "><span class="glyphicon glyphicon-stats"></span> Payroll Count</p>
		@if($countpayrollmonth == 0)
		
			<center><p> There's no payroll </p></center>
		
		@else
		{!! $chart->container() !!}
		@endif
	</div>

	<div class="Dashboard-grid-item grid-item3 shadow">
		<p class="medium "><span class="glyphicon glyphicon-stats"></span> Payrolls per department</p>
		@if($countpayrollmonth == 0)
		
			<center><p> There's no payroll </p></center>
		
		@else
		{!! $chart2->container() !!}
		@endif
	</div>

	
</div>

{{-- 	
	 {!! $chart->script() !!}
	{!! $chart2->script() !!}  --}}

@endsection


@section('srcperpage')
<script>
	$(document).ready(function() {
	  $('#pendingTable, #LogTable').DataTable(
	    {

	        "dom": '<"right monsterrat col-xs-3 col-xs-offset-9"f>'
	        +'rt <"bottom segoeui-light col-xs-5 "i> <"bottom segoeui-light col-xs-5 col-xs-offset-2"p><"clear">'

	    }
	  
	  );

	  $('#viewLog').on('show.bs.modal', function(event){
 		console.log('clicked show');

	});
	  
	});
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/echarts/4.0.2/echarts-en.min.js" charset="utf-8"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
@endsection