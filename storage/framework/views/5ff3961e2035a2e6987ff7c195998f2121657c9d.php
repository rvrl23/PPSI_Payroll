<?php $__env->startSection('title'); ?>
Dashboard
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="triangle">
	
</div>

<div>
  <p class="page-label monsterrat xx-large"><span class="glyphicon glyphicon-tasks"></span> Dashboard</p>
</div>

<div class="Dashboard-grid ">
	
	<div class="Dashboard-grid-item grid-item1 shadow">
		
		<p class="medium "><span class="glyphicon glyphicon-repeat"></span> Pending Process</p>
		<?php if($pendingCount == 0): ?>
		
			<center><p> There's no pending payroll </p></center>
		
		<?php else: ?>
		
		<table class="table small" id="pendingTable" width="100%">
			<thead>
				<td>Name</td>
				<td>Department</td>
				<td>Position</td>
				<td>Salary</td>
				<td>Action</td>
			</thead>
			<tbody>
				<?php $__currentLoopData = $pending; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pen): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<tr>
				<td><?php echo e($pen->first_name); ?> <?php echo e($pen->middle_name); ?> <?php echo e($pen->surname); ?></td>
				<td><?php echo e($pen->department); ?></td>
				<td><?php echo e($pen->position); ?></td>
				<td><?php echo e($pen->basic); ?></td>
				<td><a class="pink" href="addpayroll/<?php echo e($pen->id_number); ?>">make payroll</a></td>
			    </tr>
			    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</tbody>
		</table>
	    <?php endif; ?>
		

	</div>

	<div class="Dashboard-grid-item grid-item2 shadow">
		<p class="medium "><span class="glyphicon glyphicon-stats"></span> Payroll Count</p>
		<?php if($countpayrollmonth == 0): ?>
		
			<center><p> There's no payroll </p></center>
		
		<?php else: ?>
		<?php echo $chart->container(); ?>

		<?php endif; ?>
	</div>

	<div class="Dashboard-grid-item grid-item3 shadow">
		<p class="medium "><span class="glyphicon glyphicon-stats"></span> Payrolls per department</p>
		<?php if($countpayrollmonth == 0): ?>
		
			<center><p> There's no payroll </p></center>
		
		<?php else: ?>
		<?php echo $chart2->container(); ?>

		<?php endif; ?>
	</div>

	
</div>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/echarts/4.0.2/echarts-en.min.js" charset="utf-8"></script>
	 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<?php echo $chart->script(); ?>

	<?php echo $chart2->script(); ?>


<?php $__env->stopSection(); ?>


<?php $__env->startSection('srcperpage'); ?>
<script>
	$(document).ready(function() {

	  $('#pendingTable, #LogTable').DataTable(

	    {

	        "dom": '<"right monsterrat col-xs-3 col-xs-offset-9"f>'
	        +'rt <"bottom segoeui-light col-xs-5 "i> <"bottom segoeui-light col-xs-5 col-xs-offset-2"p><"clear">'
	  
	    }
	  
	  );

	  $('#viewLog').on('show.bs.modal', function(event){
 		console.log('clicked show');

	});
	  
	});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.payroll_layouts', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>