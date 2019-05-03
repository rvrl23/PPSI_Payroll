<script type="text/javascript">
    function <?php echo e($chart->id); ?>_create(data) {
        <?php echo e($chart->id); ?>_rendered = true;
        var loader_element = document.getElementById("<?php echo e($chart->id); ?>_loader");
        loader_element.parentNode.removeChild(loader_element);
        window.<?php echo e($chart->id); ?> = new Highcharts.Chart("<?php echo e($chart->id); ?>", {
            series: data,
            <?php echo $chart->formatOptions(false, true); ?>

        });
    }
    <?php echo $__env->make('charts::init', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</script>
