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
        <div class="text-center">
            <br>
            <h2 montseh2>Agregar Responsable de Vehículo</h2>
        </div>
    </div>

    <div class="row">
        <br><br>
        <div class="">
            <a class="btn btn-success" href="/cat_respveh"><i class="fas fa-angle-double-left"></i>&nbsp;&nbsp;&nbsp;Catálogo Responsables de Vehículos</a>
        </div>
    </div>

    <div class="row">
        <br><br>

        <form action="/cat_respveh" method="POST">
            <?php echo csrf_field(); ?>
            <div class="row">
                <div class="form-group col-md-4">
                    <label for="cliente_id">Cliente: </label>
                    <select name="cliente_id" id="cliente_id" class="form-control">
                        <option value="">Seleccione una Opción</option>
                        <?php $__currentLoopData = $clientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cliente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($cliente->id); ?>"><?php echo e($cliente->nombre); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="form-group col-md-4" id="usuarios" style="display:none">
                </div>

                <div class="form-group col-md-4" id="turnos" style="display:none">
                    <label for="turno_id">Turnos: </label>
                    <select name="turno_id" id="turno_id" class="form-control">
                        <option value="">Seleccione una Opción</option>
                        <?php $__currentLoopData = $turnos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($t->id); ?>"><?php echo e($t->descripcion); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>

            <br><br>
            <div class="text-center">
                <button class="btn btn-primary" type="submit"><i class="fas fa-save"></i>&nbsp;&nbsp;&nbsp;Guardar</button>
            </div>
        </form>
        <br>

    </div>

</div>
<?php echo $__env->make('template.menu_responsables', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script src="<?php echo e(asset('js/librerias/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/librerias/bootstrap.min.js')); ?>"></script>
<!-- JS NOTIFICACIONES ANIMATE -->
<script type="text/javascript" src="<?php echo e(asset('js/notify/bootstrap-notify.min.js')); ?>"></script>
<script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
<script src="<?php echo e(asset('js/usuario/responsables.js')); ?>"></script>

<script src="<?php echo e(asset('js/librerias/pushbar.js')); ?>"></script>
<script>
    var pushbar = new Pushbar({
        blur: true,
        overlay: true
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/monitoreo/resources/views/catalogos/respveh/create.blade.php ENDPATH**/ ?>