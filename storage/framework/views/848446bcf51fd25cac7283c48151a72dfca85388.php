<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=5.0">
    <title> SISMON </title>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    
    <?php echo $__env->yieldContent('css'); ?>

</head>

<body class="as-app-body as-app">
    <?php echo $__env->make('template.modals', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- <header class="as-toolbar" style="background: #000;max-heigth:60px;"> -->
    <!-- <header class="as-toolbar"> -->
        <?php echo $__env->make('template.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- </header> -->

    <as-responsive-content>
        <div id="spinner"></div> 
        <?php echo $__env->yieldContent('content'); ?>
    </as-responsive-content>
        <?php echo $__env->yieldContent('scripts'); ?>
    
</body>

</html><?php /**PATH /var/www/html/monitoreo/resources/views/layouts/app.blade.php ENDPATH**/ ?>