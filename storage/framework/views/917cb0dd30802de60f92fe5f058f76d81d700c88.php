<?php $__env->startSection('content'); ?>

<div>
  <p class="page-label monsterrat xx-large"><span class="glyphicon glyphicon-tasks"></span> Attendance</p>
</div>

	<div class="attendance-panel">
		
		<div class="attendance-item1 panel-white shadow">
			<p>Days</p>
			<div class="small attendance-chart ">
				<?php echo $att_chart->container(); ?>

			</div>

			<div class="row Monsterrat small">	
				<div class="col-xs-6">
					<p>Total late</p>
					<p>Total days Absent</p>
					<p>Total Overtime</p>
					<p>Total Undertime</p>

			    </div>

			    <div class="col-xs-6">
					<p class="right"><?php echo e($result_total_late); ?></p>
					<p class="right">00:00:00</p>
					<p class="right"><?php echo e($result_total_overtime); ?></p>
					<p class="right"><?php echo e($result_total_undertime); ?></p>

			    </div>

			</div>
		</div>

		<div class="attendance-item2 panel-white shadow small">
			
			<?php echo $calendar_details->calendar(); ?>

		</div>
		
		<div class="attendance-item3 panel-white shadow small">
		<table class="table">
			<thead>
				<th>Date</th>
				<th>Day</th>
				<th>Status</th>
				<th>Time-in</th>
				<th>Time-out</th>
			</thead>
			<tbody>
				<?php $__currentLoopData = $attable; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $at): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<tr>
					<td><?php echo e(@$at->date); ?></td>
					<td><?php echo e(@$at->day); ?></td>
					<td></td>
					<td><?php echo e(@$at->time_in); ?></td>
					<td><?php echo e(@$at->time_out); ?></td>
				</tr>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</tbody>
		</table>
		</div>

	</div>
	

<?php $__env->stopSection(); ?>

<?php $__env->startSection('srcperpage'); ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/6.0.6/highcharts.js" charset="utf-8"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
	<script src="https://cdn.jsdelivr.net/npm/fusioncharts@3.12.2/fusioncharts.js" charset="utf-8"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.0/fullcalendar.min.css"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
	
	<?php echo $att_chart->script(); ?>

	<?php echo $calendar_details->script(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.user_employee_layout', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>