<?php $__env->startSection('title'); ?>
Dashboard
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>



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