<script type="text/javascript">
    function <?php echo e($chart->id); ?>_create(data) {
        <?php echo e($chart->id); ?>_rendered = true;
        var loader_element = document.getElementById("<?php echo e($chart->id); ?>_loader");
        loader_element.parentNode.removeChild(loader_element);
        <?php if($chart->type): ?>
            let <?php echo e($chart->id); ?>_type = <?php echo e($chart->type); ?>

        <?php else: ?>
            let <?php echo e($chart->id); ?>_type = data[0].renderAs;
        <?php endif; ?>
        if (!<?php echo json_encode($chart->keepType); ?>.includes(<?php echo e($chart->id); ?>_type)) {
            <?php echo e($chart->id); ?>_type = "<?php echo e($chart->comboType); ?>"
        }
        FusionCharts.ready(function () {
            window.<?php echo e($chart->id); ?> = new FusionCharts({
                type: <?php echo e($chart->id); ?>_type,
                renderAt: "<?php echo e($chart->id); ?>",
                dataFormat: 'json',
                <?php echo $chart->formatContainerOptions('js', true); ?>

                dataSource: {
                    categories: [{
                        category: <?php echo $chart->formatLabels(); ?>

                    }],
                    dataset: data,
                    chart: <?php echo $chart->formatOptions(true); ?>

                }
            }).render();
        });
    }
    <?php echo $__env->make('charts::init', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</script>
