@extends('layouts.payroll_layouts')

@section('title') View Payrolls @endsection

@section('cssperpage')
<link rel="stylesheet" type="text/css" href="/bower_components/materialize/dist/css/materialize.css">
<link rel="stylesheet" type="text/css" href="/css/dataTables.materialize.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
@endsection

@section('content')

{{-- <div>
  <p class="page-label monsterrat xx-large"><span class="glyphicon glyphicon-credit-card"></span> {{$name->fname}} {{$name->mname}} {{$name->lname}}</p>
</div> --}}
<div class="margin-page panel-white shadow">
	

	<div class="view-payroll-grid">

		<div class="view-payroll-grid-item1 center">
		  <img src="/uploads/avatars/{{ @$img->avatar }}" alt="avatar" class="avatar-view normal-pic">
    	</div>

    	<div class="view-payroll-grid-item2">
    		<div class="col-xs-6">
    			<h1>{{$name->fname}} {{$name->mname}} {{$name->lname}}</h1>
    			<input type="hidden" value="{{$name->id_number}}" id="idn"><br>
    			<div class="group">      
			      <input class="google_input" type="text" required id="psearch">
			      <span class="highlight"></span>
			      <span class="bar"></span>
			      <label class="google_label">Search</label>
			    </div>
    		</div>
    		<div class="col-xs-6 right">
    			
    		</div>
    		<br>
    		<div class="col-xs-12">
			<table id="PTable" class="bordered mdl-data-table small poppins" style="width: 100%;">
	          <thead>
	              <tr>
	                  <th>Basic</th>
	                  <th>Allowance</th>
	                  <th>Government Deduction</th>
	                  <th>Total</th>
	                  <th>Cut-off</th>
	                  <th>Action</th>
	              </tr>
	          </thead>
	          <tbody id="ptbody">
	              @foreach($payroll as $pay)

	              <tr>
	                  
	                  <td>{{$pay->basic}}</td>
	                  <td>{{$pay->allowance}}</td>
	                  <td>{{$pay->government_deduction}}</td>
	                  <td>{{$pay->total}}</td>
	                  <td>{{$pay->cut_off}}</td>
	                  <td>
		                  {{-- <button class="btn btn-primary white royalblluebg shadow">
		                    <a href="/viewpayroll/{{$pay->payid}}" class="white "><span class="glyphicon glyphicon-pencil white" aria-hidden="true"></span>&nbsp; Edit</a> 
		                  </button>
 --}}
		                  <button class="btn btn-primary white royalblluebg shadow">
	                    <a href="/vieweditpayroll/{{$pay->cut_off}}/{{$pay->idnumber}}" class="white "><span class="glyphicon glyphicon-eye-open white" aria-hidden="true"></span>&nbsp; View</a> 
		                  </button>

	                   <form action="/payroll/{{$pay->id}}"method="POST" class="inline-block">
			            @csrf
			            @method("DELETE")
			            <button  type="submit" name="submit" value="Delete" onclick="return confirm('Are you sure you want to delete?')" class="btn btn-danger inline-block shadow">
			            <span class="glyphicon glyphicon-trash"></span> Delete</button>
			          </form> 
	                  </td>

	              </tr>

	              @endforeach
	          </tbody>
	        </table>
	        {{$payroll->links()}}
	        </div>
    	</div>

    	<div class="view-payroll-grid-item3 clearfix">
    		<br>

    		<div class="col-xs-12">
				<div class="col-xs-5">				
					<p class="small">Department :</p> 
				</div>
				
				<div class="col-xs-6">	
					<p class="small left">{{$name->department}}</p>
				</div>
			</div>

			<div class="col-xs-12">
				<div class="col-xs-5">
					<p class="small">Position   :</p> 
				</div>
				
				<div class="col-xs-6">					
					<p class="small left">{{$name->position}}</p>
				</div>
			</div>

			<div class="col-xs-12">
				<div class="col-xs-5">
					<p class="small">Birthdate  :</p> 
				</div>
				
				<div class="col-xs-6">	
					<p class="small left">{{$name->birthdate}}</p>
				</div>
			</div>

			<div class="col-xs-12">
				<div class="col-xs-5">
					<p class="small">Age        :</p> 
				</div>
				
				<div class="col-xs-6">	
					<p class="small left">{{$name->age}}</p>
				</div>
		    </div>

		    <div class="col-xs-12">
				<div class="col-xs-5">
					<p class="small">Email      :</p> 
				</div>
				
				<div class="col-xs-6">	
					<p class="small left">{{$name->email}}</p>
				</div>
    		</div>
    	</div>

    </div>
</div>

@endsection

@section('srcperpage')

	<script>

	    $('#psearch').keypress(function (e) {
		 var key = e.which;
		 if(key == 13)  // the enter key code
		  {
		    var psearch = document.getElementById('psearch').value;
			var idn = document.getElementById('idn').value;
			
			if(psearch != '')
			{
				$.get("/searchpayroll/"+ psearch + "/" + idn,function(data){
					$("#ptbody").empty().html(data);
				})
			}
			else if(psearch == '')
			{
				$.get("/searchpayrollreset/"+ idn,function(data){
					$("#ptbody").empty().html(data);
				})
	        }
		  }
		});  
	</script>

@endsection
