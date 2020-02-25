<?php $__env->startSection('css'); ?>
<!-- Fuentes -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Montserrat:400,600,700|Open+Sans:300,400,600" rel="stylesheet">
<!-- Include Airship -->
<link rel="stylesheet" href="https://libs.cartocdn.com/airship-style/v2.0.5/airship.css">
<script src="https://libs.cartocdn.com/airship-components/v2.0.5/airship.js"></script>
<!-- Include Leaflet -->
<script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js"></script>
<link href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css" rel="stylesheet">
<!-- Include CARTO.js -->
<script src="https://libs.cartocdn.com/carto.js/v4.1.2/carto.min.js"></script>
<link href="https://carto.com/developers/carto-js/examples/maps/public/style.css" rel="stylesheet">
<!-- Include Chart JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
<!-- INICIO DE MIS ESTILOS -->
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/template/thisSystem.css')); ?>" />
<link rel="stylesheet" href="<?php echo e(asset('css/bootstrap/bootstrap.min.css')); ?>">
<!-- CSS NOTIFICACIONES ANIMATE -->
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/animate/animate.css')); ?>" />
<link rel="stylesheet" href="<?php echo e(asset('css/pushbar/pushbar.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('css/template/estilos.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('css/template/botons.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container montse">

    <div class="row">
        <br><br>
        <div class="">
            <a class="btn btn-success" href="/cat_gpsalerta"><i class="fas fa-angle-double-left"></i>&nbsp;&nbsp;&nbsp;Catálogo GPS Alertas</a>
        </div>
    </div>

    <div class="row">
        <br>
        <div class="text-center">
            <h2>Modificar Estatus Gps Alerta: </h2>
            <p>Alerta: <?php echo e($ga->alerta); ?></p>
            <p>Marca: <?php echo e($ga->gpsmarcamodelo->marca); ?></p>
            <p>Modelo: <?php echo e($ga->gpsmarcamodelo->modelo); ?></p>
            <p>Descripción: <?php echo e($ga->camposgps->descripcion); ?></p>
            <p>Condicion: " <?php echo e($ga->condicion); ?> "</p>
            <p>Valor: <?php echo e($ga->valor); ?></p>
        </div>
    </div>

    <div class="row"><br><br>
        <div class="col-md-4 col-md-offset-4">
            <h3>Estatus Actual: <?php echo e(($ga->estado == false ) ? "INACTIVO" : "ACTIVO"); ?></h3>
    </div>
    </div>

    <div class="row">
        <div class="">
            <br><br>
            <form action="/cat_gpsalerta/<?php echo e($ga->id); ?>/estatus" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('put'); ?>

                <div class="row">
                    <div class="form-group col-md-4 col-md-offset-4">
                        <label for="estado">Cambiar Estado a: </label>
                        <select name="estado" id="estado" class="form-control">
                            <?php if($ga->estado == true): ?>
                            <option value="0">Inactivo</option>
                            <?php endif; ?>
                            <?php if($ga->estado == false): ?>
                            <option value="1">Activo</option>
                            <?php endif; ?>
                    </select>
                    </div>
                </div>
                
                <div class="row text-center"><br><br><br><br>
                    <button class="btn btn-primary" type="submit">Modificar</button>
                </div>

            </form>
            <br>
            <br>
        </div>
    </div>

</div>
<?php echo $__env->make('template.menu_gps', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script src="<?php echo e(asset('js/librerias/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/librerias/bootstrap.min.js')); ?>"></script>
<!-- JS NOTIFICACIONES ANIMATE -->
<script type="text/javascript" src="<?php echo e(asset('js/notify/bootstrap-notify.min.js')); ?>"></script>
<script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>

<script src="<?php echo e(asset('js/librerias/pushbar.js')); ?>"></script>
<script>
    var pushbar = new Pushbar({
        blur: true,
        overlay: true
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/monitoreo/resources/views/catalogos/gpsalerta/estatus.blade.php ENDPATH**/ ?>