@foreach($payslips as $pay)

	<tr>
		<td>{{$pay->cut_off}}</td>
		<td>{{$pay->basic}}</td>
		<td>{{$pay->allowance}}</td>
		<td>{{$pay->total}}</td>
		<td>
			<button class="btn btn-info">Print</button>
		</td>
	</tr>

@endforeach
