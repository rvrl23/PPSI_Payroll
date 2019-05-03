<script type="text/javascript">
    function <?php echo e($chart->id); ?>_getType(data) {
        var special_datasets = <?php echo json_encode($chart->special_datasets); ?>;
        for (var i = 0; i < special_datasets.length; i++) {
            for (var k = 0; k < data.length; k++) {
                if (special_datasets[i] == data[k].chartType) {
                    return special_datasets[i];
                }
            }
        }
        return 'axis-mixed';
    }
    function <?php echo e($chart->id); ?>_create(data) {
        <?php echo e($chart->id); ?>_rendered = true;
        var loader_element = document.getElementById("<?php echo e($chart->id); ?>_loader");
        loader_element.parentNode.removeChild(loader_element);
        window.<?php echo e($chart->id); ?> = new frappe.Chart("#<?php echo e($chart->id); ?>", {
            <?php echo $chart->formatContainerOptions('js'); ?>

            labels: <?php echo $chart->formatLabels(); ?>,
            type: <?php echo e($chart->id); ?>_getType(data),
            data: {
                labels: <?php echo $chart->formatLabels(); ?>,
                datasets: data
            },
            <?php echo $chart->formatOptions(false, true); ?>

        });
    }
    <?php echo $__env->make('charts::init', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</script>