<?php $__env->startSection('title'); ?> View Payrolls <?php $__env->stopSection(); ?>

<?php $__env->startSection('cssperpage'); ?>
<link rel="stylesheet" type="text/css" href="/bower_components/materialize/dist/css/materialize.css">
<link rel="stylesheet" type="text/css" href="/css/dataTables.materialize.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


<div class="margin-page panel-white shadow">
	

	<div class="view-payroll-grid">

		<div class="view-payroll-grid-item1 center">
		  <img src="/uploads/avatars/<?php echo e(@$img->avatar); ?>" alt="avatar" class="avatar-view normal-pic">
    	</div>

    	<div class="view-payroll-grid-item2">
    		<div class="col-xs-6">
    			<h1><?php echo e($name->fname); ?> <?php echo e($name->mname); ?> <?php echo e($name->lname); ?></h1>
    			<input type="hidden" value="<?php echo e($name->id_number); ?>" id="idn"><br>
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
	              <?php $__currentLoopData = $payroll; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pay): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

	              <tr>
	                  
	                  <td><?php echo e($pay->basic); ?></td>
	                  <td><?php echo e($pay->allowance); ?></td>
	                  <td><?php echo e($pay->government_deduction); ?></td>
	                  <td><?php echo e($pay->total); ?></td>
	                  <td><?php echo e($pay->cut_off); ?></td>
	                  <td>
		                  
		                  <button class="btn btn-primary white royalblluebg shadow">
	                    <a href="/vieweditpayroll/<?php echo e($pay->cut_off); ?>/<?php echo e($pay->idnumber); ?>" class="white "><span class="glyphicon glyphicon-eye-open white" aria-hidden="true"></span>&nbsp; View</a> 
		                  </button>

	                   <form action="/payroll/<?php echo e($pay->id); ?>"method="POST" class="inline-block">
			            <?php echo csrf_field(); ?>
			            <?php echo method_field("DELETE"); ?>
			            <button  type="submit" name="submit" value="Delete"  class="btn btn-danger inline-block shadow">
			            <span class="glyphicon glyphicon-trash"></span> Delete</button>
			          </form> 
	                  </td>

	              </tr>

	              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	          </tbody>
	        </table>
	        <?php echo e($payroll->links()); ?>

	        </div>
    	</div>

    	<div class="view-payroll-grid-item3 clearfix">
    		<br>

    		<div class="col-xs-12">
				<div class="col-xs-5">				
					<p class="small">Department :</p> 
				</div>
				
				<div class="col-xs-6">	
					<p class="small left"><?php echo e($name->department); ?></p>
				</div>
			</div>

			<div class="col-xs-12">
				<div class="col-xs-5">
					<p class="small">Position   :</p> 
				</div>
				
				<div class="col-xs-6">					
					<p class="small left"><?php echo e($name->position); ?></p>
				</div>
			</div>

			<div class="col-xs-12">
				<div class="col-xs-5">
					<p class="small">Birthdate  :</p> 
				</div>
				
				<div class="col-xs-6">	
					<p class="small left"><?php echo e($name->birthdate); ?></p>
				</div>
			</div>

			<div class="col-xs-12">
				<div class="col-xs-5">
					<p class="small">Age        :</p> 
				</div>
				
				<div class="col-xs-6">	
					<p class="small left"><?php echo e($name->age); ?></p>
				</div>
		    </div>

		    <div class="col-xs-12">
				<div class="col-xs-5">
					<p class="small">Email      :</p> 
				</div>
				
				<div class="col-xs-6">	
					<p class="small left"><?php echo e($name->email); ?></p>
				</div>
    		</div>
    	</div>

    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('srcperpage'); ?>

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

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.payroll_layouts', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>