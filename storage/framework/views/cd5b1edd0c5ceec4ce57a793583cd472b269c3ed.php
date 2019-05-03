<?php $__currentLoopData = $select; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pay): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<tr>
  
	<td><?php echo e($pay->basic); ?></td>
	<td><?php echo e($pay->allowance); ?></td>
	<td><?php echo e($pay->government_deduction); ?></td>
	<td><?php echo e($pay->total); ?></td>
	<td><?php echo e($pay->cut_off); ?></td>
	<td>
	  <button class="btn btn-primary white royalblluebg shadow">
	    <a href="/vieweditpayroll/<?php echo e($pay->cut_off); ?>" class="white "><span class="glyphicon glyphicon-eye-open white" aria-hidden="true"></span>&nbsp; View</a> 
	  </button>
	</td>

</tr>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>