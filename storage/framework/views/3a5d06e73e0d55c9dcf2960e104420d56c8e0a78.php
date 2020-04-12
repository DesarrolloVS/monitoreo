<?php $__env->startSection('content'); ?>

    <!-- Navbar -->
    <?php echo $__env->make('layouts.admin.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- /.navbar -->

    <!-- Content Wrapper. Contains page content -->
    <?php echo $__env->make('layouts.admin.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- /.content-wrapper -->


    <!-- Content Wrapper. Contains page content -->
    <?php echo $__env->make('layouts.admin.content', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- /.content-wrapper -->

    <!-- Admin Footer -->
    <?php echo $__env->make('layouts.admin.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- Control Sidebar -->
    <?php echo $__env->make('layouts.admin.controlbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- /.control-sidebar -->


<?php $__env->stopSection(); ?>

<?php echo $__env->make('core.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Volumes/Datos_vl/sites/monargento/resources/views/main.blade.php ENDPATH**/ ?>