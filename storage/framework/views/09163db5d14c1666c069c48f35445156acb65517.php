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
        <div class="col-md-10 col-offset-1">
            <h2>Modificar Registro</h2>
        </div>
    </div>

    <div class="row">
        <div class="col-md-10 col-offset-1">
            <br><br>
            <a class="btn btn-success" href="/cat_gpsalerta"><i class="fas fa-angle-double-left"></i>&nbsp;&nbsp;&nbsp;Catálogo GPS Alertas</a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-10 col-offset-1">
            <br><br>
            <form action="/cat_gpsalerta/<?php echo e($ga->id); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('put'); ?>

                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="gpsmarcamodelo_id">Marca - Modelo: </label>
                        <select name="gpsmarcamodelo_id" id="gpsmarcamodelo_id" class="form-control">
                            <option value="">Seleccione una Opción</option>
                            <?php $__currentLoopData = $mm; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($m->id); ?>" 
                            <?php if($m->id == $ga->gpsmarcamodelo_id): ?>
                            selected
                            <?php endif; ?>
                            ><?php echo e($m->marca); ?> - <?php echo e($m->modelo); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php echo $errors->first('gpsmarcamodelo_id', '<small style="color:red">:message</small>'); ?>

                    </div>
                </div>
                <!-- <div id="complement"></div> -->

                <div class="row">
                    <br><br>
                    <div class="form-group col-md-6">
                        <label for="alerta">Alerta: </label>
                        <input class="form-control" type="text" id="alerta" name="alerta" placeholder="Alerta" value="<?php echo e($ga->alerta); ?>">
                        <?php echo $errors->first('alerta', '<small style="color:red">:message</small>'); ?>

                    </div>
                    <div class="form-group col-md-6">
                        <label for="descripcion">Descripción: </label>
                        <input class="form-control" type="text" id="descripcion" name="descripcion" placeholder="Descripción" value="<?php echo e($ga->descripcion); ?>">
                        <?php echo $errors->first('descripcion', '<small style="color:red">:message</small>'); ?>

                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-4" id="complement">
                        <label for="camposgps_id">Campo: </label>
                        <select name="camposgps_id" id="camposgps_id" class="form-control">
                            <option value="">Seleccione una Opción</option>
                            <?php $__currentLoopData = $campos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($c->camposgps_id); ?>" 
                            <?php if($c->camposgps_id == $campo): ?>
                            selected
                            <?php endif; ?>
                            ><?php echo e($c->camposgps->descripcion); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php echo $errors->first('camposgps_id', '<small style="color:red">:message</small>'); ?>

                    </div>

                    <div class="form-group col-md-4">
                        <label for="condicion">Condicion: </label>
                        <select name="condicion" id="condicion" class="form-control">
                            <option value="">Seleccione una Opción</option>
                            <option value="<" <?php if($ga->condicion == "<"): ?> selected <?php endif; ?> > Menor</option>
                            <option value=">" <?php if($ga->condicion == ">"): ?> selected <?php endif; ?> >Mayor</option>
                            <option value="=" <?php if($ga->condicion == "="): ?> selected <?php endif; ?> >Igual</option>
                        </select>
                        <?php echo $errors->first('condicion', '<small style="color:red">:message</small>'); ?>

                    </div>
                    <div class="form-group col-md-4">
                        <label for="valor">Valor: </label>
                        <input class="form-control" type="text" id="valor" name="valor" placeholder="Valor" value="<?php echo e($ga->valor); ?>">
                        <?php echo $errors->first('valor', '<small style="color:red">:message</small>'); ?>

                    </div>
                </div>

                <br><br>
                <button class="btn btn-primary" type="submit">Modificar</button>

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
<script src="<?php echo e(asset('js/catalogos/alertas/complement.js')); ?>"></script>

<script src="<?php echo e(asset('js/librerias/pushbar.js')); ?>"></script>
<script>
    var pushbar = new Pushbar({
        blur: true,
        overlay: true
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/monitoreo/resources/views/catalogos/gpsalerta/edit.blade.php ENDPATH**/ ?>