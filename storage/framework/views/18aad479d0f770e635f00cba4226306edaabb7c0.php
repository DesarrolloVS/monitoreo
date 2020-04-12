<?php $__env->startSection('content'); ?>

    <!-- Navbar -->
    <?php echo $__env->make('layouts.inicio.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- /.navbar -->
    <!-- Content Wrapper. Contains page content -->
    <?php echo $__env->make('layouts.inicio.contentlogin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <?php echo $__env->make('layouts.inicio.controlbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- /.control-sidebar -->

    <!-- Admin Footer -->
    <?php echo $__env->make('layouts.inicio.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('core.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Volumes/Datos_vl/sites/monargento/resources/views/auth/login.blade.php ENDPATH**/ ?>