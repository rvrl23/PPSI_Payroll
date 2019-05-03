<div id="<?php echo e($chart->id); ?>" <?php echo $chart->formatContainerOptions('css'); ?>>
    <?php echo $__env->make('charts::loader', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</div>