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
            <h2>Modificar Usuario <small></small></h2>
        </div>
    </div>

    <div class="row">
        <div class="col-md-10 col-offset-1">
            <br><br>
            <a class="btn btn-success" href="/cat_usuarios"><i class="fas fa-angle-double-left"></i>&nbsp;&nbsp;&nbsp;Catálogo Usuarios</a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-10 col-offset-1">
            <br><br>
            <form action="/cat_usuarios/<?php echo e($usuario->id); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('put'); ?>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="nombre">Cliente: </label>
                        <select name="cliente_id" id="cliente_id" class="form-control">
                            <option value="">Seleccione una Opción</option>
                            <?php $__currentLoopData = $clientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cliente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($cliente->id); ?>" 
                                <?php if($cliente->id == $usuario->cliente_id): ?>
                                selected
                                <?php endif; ?>
                                ><?php echo e($cliente->nombre); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="nombre">Nombre: </label>
                        <input class="form-control" type="text" id="nombre" name="nombre" placeholder="Nombre" value="<?php echo e($usuario->nombre); ?>">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="paterno">Paterno: </label>
                        <input class="form-control" type="text" id="paterno" name="paterno" placeholder="Paterno" value="<?php echo e($usuario->paterno); ?>">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="materno">Materno: </label>
                        <input class="form-control" type="text" id="materno" name="materno" placeholder="Materno" value="<?php echo e($usuario->materno); ?>">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="email">Correo: </label>
                        <input class="form-control" type="text" id="email" name="email" placeholder="Correo" value="<?php echo e($usuario->email); ?>">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="rfc">RFC: </label>
                        <input class="form-control" type="text" id="rfc" name="rfc" placeholder="RFC" value="<?php echo e($usuario->rfc); ?>">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="curp">CURP: </label>
                        <input class="form-control" type="text" id="curp" name="curp" placeholder="CURP" value="<?php echo e($usuario->curp); ?>">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="tipoacceso_id">Tipo de acceso: </label>
                        <select multiple name="tipoacceso_id[]" id="tipoacceso_id[]" class="form-control">
                            <option value="rep_legal" 
                            <?php if($usuario->rep_legal == 1): ?>
                            selected
                            <?php endif; ?>
                            >Representante Legal</option>
                            <option value="contacto" 
                            <?php if($usuario->contacto == 1): ?>
                            selected
                            <?php endif; ?>
                            >Contacto</option>
                            <option value="usuario" 
                            <?php if($usuario->usuario == 1): ?>
                            selected
                            <?php endif; ?>
                            >Usuario</option>
                        </select>
                    </div>

                    <div class="form-group col-md-4">
                        <div class="checkbox">
                            <label><input id="empleado" name="empleado" type="checkbox" value="<?php echo e($usuario->empleado); ?>" onclick="calc()" 
                            <?php if($usuario->empleado == 1): ?>
                            checked
                            <?php endif; ?>
                            >¿Es Empleado?
                        </div>
                    </div>
                    <div class="form-group col-md-4" id="tipo_empleado" style="display:none">
                        <label for="tipoempleado_id">Tipo de empleado: </label>
                        <select name="tipoempleado_id" id="tipoempleado_id" class="form-control">
                            <option value="">Seleccione una Opción</option>
                            <?php $__currentLoopData = $tes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $te): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($te->id); ?>" 
                                <?php if($usuario->tipoempleado_id == $te->id): ?>
                                selected
                                <?php endif; ?>
                                ><?php echo e($te->descripcion); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>

                <br><br>
                <button class="btn btn-primary" type="submit">Modificar</button>

            </form>
            <br>
            <br>
            <!--
            @//if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
            @//endif
            -->
        </div>
    </div>

</div>
<?php echo $__env->make('template.menu_catalogos', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script src="<?php echo e(asset('js/librerias/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/librerias/bootstrap.min.js')); ?>"></script>
<!-- JS NOTIFICACIONES ANIMATE -->
<script type="text/javascript" src="<?php echo e(asset('js/notify/bootstrap-notify.min.js')); ?>"></script>
<script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>

<script src="<?php echo e(asset('js/librerias/pushbar.js')); ?>"></script>
<script src="<?php echo e(asset('js/usuario/usuario.js')); ?>"></script>
<script>
    var pushbar = new Pushbar({
        blur: true,
        overlay: true
    });
</script>
<?php echo $__env->make('template.menu_catalogos', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/monitoreo/resources/views/usuario/edit.blade.php ENDPATH**/ ?>