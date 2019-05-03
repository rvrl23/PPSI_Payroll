<?php $__env->startSection('content'); ?>

<div>
  <p class="page-label monsterrat xx-large"><span class="glyphicon glyphicon-tasks"></span> Dashboard</p>
</div>

<div class="empuser-grid">
	

	<div class="empuser-grid-item empuser-item1 panel-white shadow">
		<h4>Summary of Earnings</h4>
		<div>
			<?php if($countPayroll == 0): ?>
			<p class="center">You have not received salary yet</p>
			<?php else: ?>
			<?php echo $emp_chart->container(); ?>

			<?php endif; ?>
		</div>

	</div>

	<div class="empuser-grid-item empuser-item2 panel-white shadow">

		<div class="empuser-item2-1">
			<p class="xx-large">My Payslips</p>
		</div>

		<div class="empuser-item2-2 right">
			<p class="medium ">Select Cut-off</p>
			<p class="small inline-block">Start&nbsp;&nbsp;&nbsp;<input id="fromDate" name="fromDate" type="date" class="form-control normal-width inline-block"> </p> 

			<p class="small inline-block">End&nbsp;&nbsp;&nbsp;&nbsp;<input id="toDate" name="toDate" type="date" class="form-control normal-width inline-block">  </p>

		</div>
	</div>
	

	<div class="panel-white shadow">
	<?php if($countPayroll == 0): ?>
	<p class="center">You don't have payroll yet</p>
	<?php else: ?>
		<table class="table small">
			<thead>
				<td>Cut-off</td>
				<td>Basic Pay</td>
				<td>Allowance</td>
				<td>Total Salary</td>
				<td>Action</td>
			</thead>
			
			<tbody id="display-payslip">
				<?php $__currentLoopData = $payslips; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pay): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<tr>
					<td><?php echo e($pay->cut_off); ?></td>
					<td><?php echo e($pay->basic); ?></td>
					<td><?php echo e($pay->allowance); ?></td>
					<td><?php echo e($pay->netpay); ?></td>
					<td>
						<a class="btn btn-primary royalbluebg" href="/showPrintUser/<?php echo e($pay->id); ?>">Print</a>
					</td>
				</tr>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</tbody>
			
		</table>
		<?php endif; ?>
		<?php echo e($payslips->links()); ?>

	</div>


</div>

	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/6.0.6/highcharts.js" charset="utf-8"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
	<script src="https://cdn.jsdelivr.net/npm/fusioncharts@3.12.2/fusioncharts.js" charset="utf-8"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/echarts/4.0.2/echarts-en.min.js" charset="utf-8"></script>
	<?php echo $emp_chart->script(); ?>


<?php $__env->stopSection(); ?>


<?php $__env->startSection('srcperpage'); ?>

<script>

	$("#fromDate, #toDate").on("change", function(){

	console.log('ss');
		var fromDate = document.getElementById('fromDate').value;
		var toDate = document.getElementById('toDate').value;
		
		console.log('ss');
          $.get("/paysliprange/"+ fromDate + "/" + toDate,function(data){
          console.log(data);
            $("#").empty().html(data);
        })
    });
    
	</script>

<?php $__env->stopSection(); ?>








<?php echo $__env->make('layouts.user_employee_layout', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>