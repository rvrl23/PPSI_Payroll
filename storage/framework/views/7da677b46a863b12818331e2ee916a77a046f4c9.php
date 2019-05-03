<!DOCTYPE html>
<html>
<head>
	<title>
		<?php echo $__env->yieldContent('title'); ?>
	</title>
	<meta charset='utf-8'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    
	<style>
	@media  print {
	  a[href]:after {
	    content: none !important;
	  }

	}

	@media  print {
	.noprint {
	    visibility: hidden;
	    }
	}
	
	
	/* <?php echo $__env->yieldContent('cssperpage'); ?> ariel nag edit neto 12:41PM 22-03-2019*/
</style>
	
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.12/datatables.min.css"/>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"/>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css"/>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/1.2.7/css/select.dataTables.min.css"/>
  
	
	

	<?php echo $__env->make('csslink', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	
</head>
<body>
	<?php if(auth()->guard()->guest()): ?>

	

	<div class="to-animate">
		<h1>You found our website Good job!!!</h1>
		<h1>Now Leave</h1>
	</div>
	
	<?php else: ?>

	<?php if(Auth::user()->Admin == 0): ?>

	<div class="to-animate">
		<h1>You are not suppose to be here</h1>
		<h1>Now Leave</h1>
	</div>

	<?php else: ?>

	<div class="noprint">
	<header>
		<?php echo $__env->make('others.header', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	</header> 
	</div>  

	<?php echo $__env->yieldContent('content'); ?>
	
	<?php echo $__env->make('scriptsrc', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		
	<?php echo $__env->yieldContent('srcperpage'); ?>

	<?php endif; ?>
	
	<?php endif; ?>



	

	
</body>

</script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.12/datatables.min.js"></script>

<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/select/1.2.7/js/dataTables.select.min.js"></script>

</html>