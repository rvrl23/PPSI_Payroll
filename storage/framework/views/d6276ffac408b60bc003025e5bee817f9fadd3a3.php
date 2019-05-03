<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset='utf-8'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<?php echo $__env->yieldContent('cssperpage'); ?>

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
	
	</style>

	<?php echo $__env->make('csslink', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</head>
<body>
	<?php if(auth()->guard()->guest()): ?>

		<div class="to-animate">
			<h1>You found our website Good job!!!</h1>
			<h1>Now Leave</h1>
		</div>

	<?php else: ?>

		<header class="noprint">
			<?php echo $__env->make('others.header', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		</header>   

		<?php echo $__env->yieldContent('content'); ?>

		<?php echo $__env->make('scriptsrc', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

		<?php echo $__env->yieldContent('srcperpage'); ?>

	<?php endif; ?>

	
</body>
</html>
