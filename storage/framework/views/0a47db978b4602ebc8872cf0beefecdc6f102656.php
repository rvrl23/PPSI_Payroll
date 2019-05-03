<script type="text/javascript">
    function <?php echo e($chart->id); ?>_create(data) {
        <?php echo e($chart->id); ?>_rendered = true;
        var loader_element = document.getElementById("<?php echo e($chart->id); ?>_loader");
        loader_element.parentNode.removeChild(loader_element);
        window.<?php echo e($chart->id); ?> = echarts.init(document.getElementById("<?php echo e($chart->id); ?>"),'<?php echo e($chart->theme); ?>');
		window.<?php echo e($chart->id); ?>.setOption({
            series: data,
            <?php echo $chart->formatOptions(false, true); ?>

        });
    }
    <?php echo $__env->make('charts::init', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</script>
