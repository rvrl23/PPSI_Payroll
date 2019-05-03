@foreach($select as $pay)

<tr>
  
	<td>{{$pay->basic}}</td>
	<td>{{$pay->allowance}}</td>
	<td>{{$pay->government_deduction}}</td>
	<td>{{$pay->total}}</td>
	<td>{{$pay->cut_off}}</td>
	<td>
	  <button class="btn btn-primary white royalblluebg shadow">
	    <a href="/vieweditpayroll/{{$pay->cut_off}}" class="white "><span class="glyphicon glyphicon-eye-open white" aria-hidden="true"></span>&nbsp; View</a> 
	  </button>
	</td>

</tr>

@endforeach