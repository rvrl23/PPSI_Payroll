@extends('layouts.user_employee_layout')


@section('content')

<div>
  <p class="page-label monsterrat xx-large"><span class="glyphicon glyphicon-tasks"></span> Dashboard</p>
</div>

<div class="empuser-grid">
	

	<div class="empuser-grid-item empuser-item1 panel-white shadow">
		<h4>Summary of Earnings</h4>
		<div>
			@if($countPayroll == 0)
			<p class="center">You have not received salary yet</p>
			@else
			{!! $emp_chart->container() !!}
			@endif
		</div>

	</div>

	<div class="empuser-grid-item empuser-item2 panel-white shadow">

		<div class="empuser-item2-1">
			<p class="xx-large">My Payslips</p>
		</div>

		<div class="empuser-item2-2 right">
			<p class="medium ">Select Cut-off</p>
			<p class="small inline-block">Start&nbsp;&nbsp;&nbsp;<input id="fromDate" name="fromDate" type="date" class="form-control normal-width inline-block"> </p> 

			<p class="small inline-block">End&nbsp;&nbsp;&nbsp;&nbsp;<input id="toDate" name="toDate" type="date" class="form-control normal-width inline-block">  </p>

		</div>
	</div>
	

	<div class="panel-white shadow">
	@if($countPayroll == 0)
	<p class="center">You don't have payroll yet</p>
	@else
		<table class="table small">
			<thead>
				<td>Cut-off</td>
				<td>Basic Pay</td>
				<td>Allowance</td>
				<td>Total Salary</td>
				<td>Action</td>
			</thead>
			
			<tbody id="display-payslip">
				@foreach($payslips as $pay)
				<tr>
					<td>{{$pay->cut_off}}</td>
					<td>{{$pay->basic}}</td>
					<td>{{$pay->allowance}}</td>
					<td>{{$pay->netpay}}</td>
					<td>
						<a class="btn btn-primary royalbluebg" href="/showPrintemployee/{{$pay->id}}">Print</a>
							{{-- <a href="print/{{$join->id}}" class="btn btn-primary royalbluebg">Print</a> --}}
					</td>
				</tr>
				@endforeach
			</tbody>
			
		</table>
		@endif
		{{$payslips->links()}}
	</div>


</div>

	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/6.0.6/highcharts.js" charset="utf-8"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
	<script src="https://cdn.jsdelivr.net/npm/fusioncharts@3.12.2/fusioncharts.js" charset="utf-8"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/echarts/4.0.2/echarts-en.min.js" charset="utf-8"></script>
	{!! $emp_chart->script() !!}

@endsection


@section('srcperpage')

<script>

	$("#fromDate, #toDate").on("change", function(){

	console.log('ss');
		var fromDate = document.getElementById('fromDate').value;
		var toDate = document.getElementById('toDate').value;
		
		console.log('ss');
          $.get("/paysliprange/"+ fromDate + "/" + toDate,function(data){
          console.log(data);
            $("#").empty().html(data);
        })
    });
    
	</script>

@endsection







