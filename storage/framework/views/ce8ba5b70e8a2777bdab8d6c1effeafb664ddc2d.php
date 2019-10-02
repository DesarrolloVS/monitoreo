<!DOCTYPE html>
<!-- <html lang="en"> -->
<html>
<head>
    <!-- <title>//<?php echo $__env->yieldContent('title','Aprendible'); ?></title> -->
    <title>Monitoreo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <link rel="stylesheet" href="/css/app.css">
    <script src="/js/app.js" defer></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600,700|Open+Sans:300,400,600" rel="stylesheet">
    <?php echo $__env->yieldContent('css'); ?>
</head>
<body>
    <div id="app" class="d-flex flex-column h-screen justify-content-between">
        <header>
            <?php echo $__env->make('partials.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </header>
        <!-- @//include('partials.session-status') -->
        <main class="pt-0 pb-4">
            <?php echo $__env->yieldContent('content'); ?>
        </main>
        <footer class="bg-white text-center text-black-50 py-3 shadow">
        <?php echo e(config('app.name')); ?> | Copyright @ <?php echo e(date('Y')); ?>

        </footer>
    </div>
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
    <?php echo $__env->yieldContent('scripts'); ?>
</body>
</html><?php /**PATH /var/www/html/monitoreo/resources/views/layout.blade.php ENDPATH**/ ?>