<?php $__currentLoopData = $payslips; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pay): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

	<tr>
		<td><?php echo e($pay->cut_off); ?></td>
		<td><?php echo e($pay->basic); ?></td>
		<td><?php echo e($pay->allowance); ?></td>
		<td><?php echo e($pay->total); ?></td>
		<td>
			<button class="btn btn-info">Print</button>
		</td>
	</tr>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
