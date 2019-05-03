
@extends('layouts.payroll_layouts')

@section('content')

<div>
  <p class="page-label monsterrat xx-large"><span class="glyphicon glyphicon-usd"></span> Payslip</p>
</div>
<div class="payslip-grid">


		<div class="panel with-nav-tabs panel-default pgrid-item1">
            <div class="panel-heading">
	            <ul class="nav nav-tabs">
	                <li class="active"><a href="#tab1default" data-toggle="tab"><span class="glyphicon glyphicon-inbox"></span> Recently Printed</a></li>
	                <li><a href="#tab2default" data-toggle="tab"><span class="glyphicon glyphicon-trash"></span>  Recently Deleted</a></li>
	            </ul>
            </div>
            <div class="panel-body">
                <div class="tab-content">
                    <div class="tab-pane fade in active" id="tab1default">

	
						<table class="table small">
							<thead>
								<td>Name</td>
								<td>Cut-off</td>
								<td>Printed by</td>
								<td>Date printed</td>
							</thead>
							@foreach($printed as $print)
							<tbody>
								
									<td>{{$print->name}}</td>
									<td>{{$print->cut_off}}</td>
									<td>{{$print->printed_by}}</td>
									<td>{{$print->updated_at}}</td>
								
							</tbody>
							@endforeach
						</table>
                    </div>

                    <div class="tab-pane fade" id="tab2default">
                    	<table class="table small">
							<thead>
								<td>Id Number</td>
								<td>Name</td>
								<td>Cut-off</td>
								<td>Date Deleted</td>
								{{-- <td>Action</td> --}}
							</thead>
							@foreach($deleted as $del)
							<tbody>
								
									<td>{{$del->idnumber}}</td>
									<td>{{$del->first_name}} {{$del->middle_name}} {{$del->surname}}</td>
									<td>{{$del->cut_off}}</td>
									<td>{{$del->pda}}</td>
								{{-- 	<td> <a href="print/{{$del->id}}" class="btn btn-info">Print</a> --}}
								
							</tbody>
							@endforeach
						</table>
                    </div>
                    <div class="tab-pane fade" id="tab3default">Default 3</div>
                    <div class="tab-pane fade" id="tab4default">Default 4</div>
                    <div class="tab-pane fade" id="tab5default">Default 5</div>
                </div>
            </div>
        </div>


<div class="panel-white pgrid-item2 shadow"><br>

		{{-- <div class="group">      
	      <input class="google_input" type="text" required>
	      <span class="highlight"></span>
	      <span class="bar"></span>
	      <label class="google_label">Search</label>
	    </div> --}}

		
	<div id="example_wrapper" class="dataTables_wrapper">
			<p class="large"> <span class="glyphicon glyphicon-list"></span> All</p>
		@if($joinCount == 0)
		<center><p>There's no payslip</p></center>
		@else
		<table id="exampleid" class="display" style="width:100%"> 
			<thead>
			<tr>
				<td>ID Number</td>
				<td>Name</td>
				<td>Department</td>
				<td>Cut-off</td>
			</tr>
			</thead>
			
			<tbody>
				@foreach($joinn as $join)
				<tr>
					<td id="agik">{{$join->idnumber}}</td>
					<td>{{$join->first_name}} {{$join->middle_name}} {{$join->surname}}</td>
					<td>{{$join->department}}</td>
					<td>{{$join->cut_off}}</td>
				
				{{-- <td style="text-align:center;width:45px;"><input type="checkbox" id="checkitems" style="width:30px; height:30px;" value="{{$join->id}}" name="ids"></td> --}}
						{{-- <td><a href="print/{{$join->id}}" class="btn btn-primary royalbluebg">Print</a></td> --}}
					{{-- <input type="checkbox" name="printInfo" class="form-control" :value="{{$join->id}}"> --}}
				</tr>
				@endforeach
				{{-- <div class="dt-buttons">
				<button class="dt-button buttons-print" tabindex="0" aria-controls="example" type="button"><span>Print all</span></button>
				<button class="dt-button buttons-print" tabindex="0" aria-controls="example" type="button"><span>Print</span></button>
				</div> --}}

				

			</tbody>
		</table>
		{{-- <a href="print" class="btn btn-primary royalbluebg col-sm-2">Print</a> --}}
		@endif
		{{-- {{$joinn->links}} --}}


		</div>
	</div>





</div>
@endsection

@section('srcperpage')



<script>
$(document).ready(function() {
	var events = $('#events');
	var table = $('#exampleid').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            {
                
				// extend: 'print',
				// ajax:'{{url("/print/{id}")}}',
                text: 'Print all',
				action: function (e, dt, node, config ){
					window.location.href="/print/1"
				}
                // exportOptions: {
					
                //     modifier: {
                //         selected: null
                //     }
                // }
            },
            {
                
	                text: 'Print selected',
					action: function () {
						$('#exampleid').on( 'click', 'tr', function () {
						console.log( table.row( {selected: true} ).data() );
						} );
						// console.log(count)
 
                    // events.prepend( '<div>'+count+' row(s) selected</div>' );
                }

					
					// action:function(e, dt, node, config){
					// 	table.rows[].onclick= function(){
					// 		window.location.href="/print/id";
					// 		}
					// 	}
		
				
            }
        ],
		rowId: 'id',
        select: true

		
    } );
} );

</script>
@endsection