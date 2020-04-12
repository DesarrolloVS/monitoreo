<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title>Sistema de Monitoreo</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">

</head>
<body class="hold-transition layout-top-nav layout-footer-fixed">
    <!-- wrapper -->
    <div class="wrapper" id="app">
        <?php echo $__env->yieldContent('content'); ?>
    </div>
    <!-- ./wrapper -->

    <!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>

    <?php echo $__env->yieldPushContent('extra_scripts'); ?>

</body>

</html><?php /**PATH /Volumes/Datos_vl/sites/monargento/resources/views/core/app.blade.php ENDPATH**/ ?>