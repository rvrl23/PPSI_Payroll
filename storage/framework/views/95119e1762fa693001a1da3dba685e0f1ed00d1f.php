<?php $__env->startSection('content'); ?>

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
		      
		        <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		      <tr>
		        <td><?php echo e($employee->first_name); ?> <?php echo e($employee->middle_name); ?> <?php echo e($employee->surname); ?></td>
		        <td><?php echo e($employee->id_number); ?></td>
		        <td><?php echo e($employee->position); ?></td>
		        <td><?php echo e($employee->department); ?></td>
		        <td colspan="1"> 

		          <a href="restoreEmployee/<?php echo e($employee->id); ?>" class="btn btn-primary btn-circle inline-block"><span class="glyphicon glyphicon-refresh"></span>  </a>

							<a class="btn btn-danger btn-circle inline-block" onclick="return confirm('Are you sure you want to delete?')" href="deleteEmployee/<?php echo e($employee->id); ?>"><span class="glyphicon glyphicon-trash"></span>  </a>

		         </td>
		       
		                    
		      </tr>
		      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
		      
		        <?php $__currentLoopData = $payrolls; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pay): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		      <tr>
		        <td><?php echo e($pay->first_name); ?> <?php echo e($pay->middle_name); ?> <?php echo e($pay->surname); ?></tsur>
		        <td><?php echo e($pay->position); ?></td>
		        <td><?php echo e($pay->department); ?></td>
		        <td><?php echo e($pay->cut_off); ?></td>
		        <td colspan="1"> 

	            	<a class="btn btn-primary inline-block btn-circle" href="restorePayroll/<?php echo e($pay->id); ?>" ><span class="glyphicon glyphicon-refresh"></span>  </a>
		            <a class="btn btn-danger inline-block" onclick="return confirm('Are you sure you want to delete?')" href="deletePayroll/<?php echo e($pay->id); ?>"><span class="glyphicon glyphicon-trash"></span>  </a>

		         </td>
		       
		                    
		      </tr>
		      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		    </tbody> 
	    </table>
	</div>

</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('srcperpage'); ?>

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

<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.payroll_layouts', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>