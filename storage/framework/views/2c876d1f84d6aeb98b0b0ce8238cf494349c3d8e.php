<?php $__env->startSection('content'); ?>

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
							<?php $__currentLoopData = $printed; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $print): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tbody>
								
									<td><?php echo e($print->name); ?></td>
									<td><?php echo e($print->cut_off); ?></td>
									<td><?php echo e($print->printed_by); ?></td>
									<td><?php echo e($print->updated_at); ?></td>
								
							</tbody>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</table>
                    </div>

                    <div class="tab-pane fade" id="tab2default">
                    	<table class="table small">
							<thead>
								<td>Id Number</td>
								<td>Name</td>
								<td>Cut-off</td>
								<td>Date Deleted</td>
							
							</thead>
							<?php $__currentLoopData = $deleted; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $del): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tbody>
								
									<td><?php echo e($del->idnumber); ?></td>
									<td><?php echo e($del->first_name); ?> <?php echo e($del->middle_name); ?> <?php echo e($del->surname); ?></td>
									<td><?php echo e($del->cut_off); ?></td>
									<td><?php echo e($del->pda); ?></td>
								
								
							</tbody>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</table>
                    </div>
                    <div class="tab-pane fade" id="tab3default">Default 3</div>
                    <div class="tab-pane fade" id="tab4default">Default 4</div>
                    <div class="tab-pane fade" id="tab5default">Default 5</div>
                </div>
            </div>
        </div>


	<div class="panel-white pgrid-item2 shadow"><br>

		

		

			<p class="large"> <span class="glyphicon glyphicon-list"></span> All</h2>
		<?php if($joinCount == 0): ?>
		<center><p>There's no payslip</p></center>
		<?php else: ?>
		<table class="table small" id="allTable" width="100%">
			<thead>
				<td>ID Number</td>
				<td>Name</td>
				<td>Department</td>
				<td>Cut-off</td>
				<td>Action</td>
			</thead>
			
			<tbody>
				<?php $__currentLoopData = $joinn; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $join): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<tr>
					<td><?php echo e($join->idnumber); ?></td>
					<td><?php echo e($join->first_name); ?> <?php echo e($join->middle_name); ?> <?php echo e($join->surname); ?></td>
					<td><?php echo e($join->department); ?></td>
					<td><?php echo e($join->cut_off); ?></td>
					<td> 
						<a href="print/<?php echo e($join->id); ?>" class="btn btn-primary royalbluebg">Print</a>
					
					
					</td>
				</tr>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</tbody>
		</table>
		
		<?php endif; ?>
		

	</div>





</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('srcperpage'); ?>
<script>

	$(document).ready(function() {

	  $('#allTable').DataTable(

	    {

	        "dom": '<"right form control segoeui-light col-xs-3 col-xs-offset-9"f>'
	        +'rt <"bottom segoeui-light col-xs-5 "i> <"bottom segoeui-light col-xs-5 col-xs-offset-2"p><"clear">'
	  
	    }
	  
	  );
	  
	});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.payroll_layouts', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>