@extends('layouts.user_employee_layout')

@section('content')

<div>
  <p class="page-label monsterrat xx-large"><span class="glyphicon glyphicon-tasks"></span> Attendance</p>
</div>

	<div class="attendance-panel">
		
		<div class="attendance-item1 panel-white shadow">
			<p>Days</p>
			<div class="small attendance-chart ">
				{!! $att_chart->container() !!}
			</div>

			<div class="row Monsterrat small">	
				<div class="col-xs-6">
					<p>Total late</p>
					<p>Total days Absent</p>
					<p>Total Overtime</p>
					<p>Total Undertime</p>

			    </div>

			    <div class="col-xs-6">
					<p class="right">{{$result_total_late}}</p>
					<p class="right">00:00:00</p>
					<p class="right">{{$result_total_overtime}}</p>
					<p class="right">{{$result_total_undertime}}</p>

			    </div>

			</div>
		</div>

		<div class="attendance-item2 panel-white shadow small">
			
			{!! $calendar_details->calendar() !!}
		</div>
		
		<div class="attendance-item3 panel-white shadow small">
		<table class="table">
			<thead>
				<th>Date</th>
				<th>Day</th>
				<th>Status</th>
				<th>Time-in</th>
				<th>Time-out</th>
			</thead>
			<tbody>
				@foreach($attable as $at)
				<tr>
					<td>{{@$at->date}}</td>
					<td>{{@$at->day}}</td>
					<td></td>
					<td>{{@$at->time_in}}</td>
					<td>{{@$at->time_out}}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		</div>

	</div>
	

@endsection()

@section('srcperpage')

<script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/6.0.6/highcharts.js" charset="utf-8"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
	<script src="https://cdn.jsdelivr.net/npm/fusioncharts@3.12.2/fusioncharts.js" charset="utf-8"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.0/fullcalendar.min.css"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
	
	{!! $att_chart->script() !!}
	{!! $calendar_details->script() !!}
@endsection