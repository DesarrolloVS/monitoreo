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
        <div class="text-center">
            <h2>Asignar Gps Vehiculo: <small>Placa: <?php echo e($v->placa); ?> </small></h2>
        </div>
    </div>

    <div class="row">
        <br><br>
        <div class="">
            <a class="btn btn-success" href="/cat_vehiculos"><i class="fas fa-angle-double-left"></i>&nbsp;&nbsp;&nbsp;Catálogo Vehículos</a>
            <?php if($historico->first()): ?>
            <a class="btn btn-info pull-right" href="/cat_vehiculos/<?php echo e($v->id); ?>/historico"><i class="fas fa-database"></i>&nbsp;&nbsp;&nbsp;Historico GPS</a>
            <?php endif; ?>
        </div>
    </div>

    <div class="row  col-md-4 col-md-offset-4"><br>
        <div class="">
            <h3>Gps Actual: <?php echo e(($v->gpscliente_id == "" ) ? "NO ASIGNADO" : $v->gpscliente->imei); ?>

                <?php if($v->gpscliente_id != ""): ?>
                &emsp;<a href="/cat_vehiculos/<?php echo e($v->id); ?>/nogps" class="btn btn-danger btn-xs">Desvincular GPS</a>
                <?php endif; ?>
            </h3>
            <?php if($v->gpscliente_id != ""): ?>
            <h3>Fecha de Asignación: <?php echo e($v->gpscliente->created_at); ?></h3>
            <?php endif; ?>
        </div>
    </div>

    <div class="row">
        <div class="">
            <br><br>
            <form action="/cat_vehiculos/<?php echo e($v->id); ?>/gps" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('put'); ?>

                <div class="row">
                    <div class="form-group col-md-4 col-md-offset-4"><br><br>
                        <label for="cliente_id">Cliente: </label>
                        <select name="cliente_id" id="cliente_id" class="form-control" readonly>
                            <option value="<?php echo e($cliente->id); ?>" selected><?php echo e($cliente->nombre); ?></option>
                        </select>
                    </div>
                </div>

                <?php if($gpss->first()): ?>
                <div class="row">
                    <div class="form-group col-md-4 col-md-offset-4">
                        <label for="gpscliente_id">Cambiar GPS a: </label>
                        <select name="gpscliente_id" id="gpscliente_id" class="form-control">
                            <option value="">Seleccione una Opción</option>
                            <?php $__currentLoopData = $gpss; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $g): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($g->id); ?>"><?php echo e($g->serie); ?> - <?php echo e($g->imei); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group"><br>
                        <div class="text-center" id="asignar" style="display:none"><br><br>
                            <button class="btn btn-primary" type="submit">Asignar Gps</button>
                        </div>
                    </div>
                </div>
                <?php else: ?>
                <div class="row">
                    <div class="form-group col-md-4 col-md-offset-4">
                        <br>
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <strong>Atención: </strong> No hay registros de GPS's disponibles para este cliente.
                        </div>
                    </div>
                </div>
                <?php endif; ?>
                </div>

                <input type="hidden" name="placa" id="placa" value="<?php echo e($v->placa); ?>">
                <input type="hidden" name="vehiculo_id" id="vehiculo_id" value="<?php echo e($v->id); ?>">
                <input type="hidden" name="gpscliente_id_anterior" id="gpscliente_id_anterior" value="<?php echo e($v->gpscliente_id); ?>">
            </form>
            <br>
            <br>
        </div>
    </div>

</div>
<?php echo $__env->make('template.menu_vehiculos', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script src="<?php echo e(asset('js/librerias/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/librerias/bootstrap.min.js')); ?>"></script>
<!-- JS NOTIFICACIONES ANIMATE -->
<script type="text/javascript" src="<?php echo e(asset('js/notify/bootstrap-notify.min.js')); ?>"></script>
<script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>

<script src="<?php echo e(asset('js/librerias/pushbar.js')); ?>"></script>
<script src="<?php echo e(asset('js/usuario/asignargps.js')); ?>"></script>
<script>
    var pushbar = new Pushbar({
        blur: true,
        overlay: true
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/monitoreo/resources/views/vehiculos/vehiculos/gps.blade.php ENDPATH**/ ?>