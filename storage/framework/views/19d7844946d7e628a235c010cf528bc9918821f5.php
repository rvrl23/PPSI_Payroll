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
	
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>

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

	<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.19/js/dataTables.material.min.js"></script>

	

	
</body>
</html>