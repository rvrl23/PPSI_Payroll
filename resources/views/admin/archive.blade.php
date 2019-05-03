@extends('layouts.payroll_layouts')


@section('content')

<div>
  <p class="page-label monsterrat xx-large"><span class="glyphicon glyphicon-tasks"></span> Archive</p>
</div>

<div class="archive-div">
	<div class="archive-div-item panel-white small shadow">
		<h4>Employee</h4>
		<table id="EmployeeTable" class="table">
	        <thead class="tableback">
	            <tr>
	                <th>Name</th>
	                <th>ID Number</th>
	                <th>Position</th>
	                <th>Department</th>
	                <th>Action</th>
	            </tr>
	        </thead>

	       
	       
		    <tbody>
		      
		        @foreach($employees as $employee)
		      <tr>
		        <td>{{$employee->first_name}} {{$employee->middle_name}} {{$employee->surname}}</td>
		        <td>{{$employee->id_number}}</td>
		        <td>{{$employee->position}}</td>
		        <td>{{$employee->department}}</td>
		        <td colspan="1"> 

		          <a href="restoreEmployee/{{$employee->id}}" class="btn btn-primary btn-circle inline-block"><span class="glyphicon glyphicon-refresh"></span> {{-- Restore --}} </a>

							<a class="btn btn-danger btn-circle inline-block" onclick="return confirm('Are you sure you want to delete?')" href="deleteEmployee/{{$employee->id}}"><span class="glyphicon glyphicon-trash"></span> {{-- Delete --}} </a>

		         </td>
		       
		                    
		      </tr>
		      @endforeach
		    </tbody> 
	    </table>
	</div>


	<div class="archive-div-item panel-white small shadow">
		<h4>Payroll</h4>
		<table id="PayrollTable" class="table">
	        <thead class="tableback">
	            <tr>
	                <th>Name</th>
	                <th>Position</th>
	                <th>Department</th>
	                <th>Cut-off</th>
	                <th>Action</th>
	            </tr>
	        </thead>

	       
	       
		    <tbody>
		      
		        @foreach($payrolls as $pay)
		      <tr>
		        <td>{{$pay->first_name}} {{$pay->middle_name}} {{$pay->surname}}</tsur>
		        <td>{{$pay->position}}</td>
		        <td>{{$pay->department}}</td>
		        <td>{{$pay->cut_off}}</td>
		        <td colspan="1"> 

	            	<a class="btn btn-primary inline-block btn-circle" href="restorePayroll/{{$pay->id}}" ><span class="glyphicon glyphicon-refresh"></span> {{-- Restore --}} </a>
		            <a class="btn btn-danger inline-block" onclick="return confirm('Are you sure you want to delete?')" href="deletePayroll/{{$pay->id}}"><span class="glyphicon glyphicon-trash"></span> {{-- Delete --}} </a>

		         </td>
		       
		                    
		      </tr>
		      @endforeach
		    </tbody> 
	    </table>
	</div>

</div>

@endsection

@section('srcperpage')

<script>
	$(document).ready(function() {

	  $('#EmployeeTable, #PayrollTable').DataTable(

	    {

	        "dom": '<"right form control monsterrat col-xs-3 col-xs-offset-8"f>'
	        +'rt <"bottom segoeui-light col-xs-5 "i> <"bottom segoeui-light col-xs-5 col-xs-offset-2"p><"clear">'
	  
	    }
	  
	  );
	  
	});
</script>

@endsection


