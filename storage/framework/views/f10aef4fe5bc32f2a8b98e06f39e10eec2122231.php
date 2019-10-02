<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container montse">

    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 mx-auto">

            <div class="row">
                <div class="col">
                    <ol class="breadcrumb bg-transparent d-flex justify-content-end">
                        <li class="breadcrumb-item"><a href="/">Inicio</a></li>
                        <li class="breadcrumb-item active" aria-current="">Catálogo GPS Clientes</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <h2 class="text-center">CATÁLOGO GPS CLIENTE</h2>
                </div>
            </div>

            <div class="row">
                <div class="col my-3">
                    <a class="btn btn-primary" href="/cat_gpscliente/create"><i class="fas fa-plus"></i>&nbsp;&nbsp;&nbsp;Agregar GPS Cliente</a>
                </div>
            </div>

            <?php if($gps->first()): ?>
            <div class="row">
                <div class="col">
                    <table class="table table-bordered table-hover table-sm">
                        <thead class="thead-light">
                            <tr>
                                <th class="text-center">Id</th>
                                <th class="text-center">Cliente</th>
                                <th class="text-center">Serie</th>
                                <th class="text-center">Imei</th>
                                <th class="text-center">Marca Modelo</th>
                                <th class="text-center">Estado</th>
                                <th class="text-center">Modificar</th>
                                <th class="text-center">Eliminar</th>
                            </tr>
                        </thead>
                        <?php $__currentLoopData = $gps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $g): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="text-center"><?php echo e($g->id); ?></td>
                            <td class="text-center"><?php echo e(str_limit($g->cliente->nombre,30)); ?> </td>
                            <td class="text-center"><?php echo e($g->serie); ?></td>
                            <td class="text-center"><?php echo e($g->imei); ?></td>
                            <td class="text-center"><?php echo e($g->gpsmarcamodelo->marca); ?> / <?php echo e($g->gpsmarcamodelo->modelo); ?></td>
                            <td class="text-center"><a class="btn btn-info btn-sm" href="/cat_gpscliente/<?php echo e($g->id); ?>/estatus"><?php echo e(($g->estadogpscliente_id == "" ) ? estatus_gps($g->estadogpscliente_id) : $g->estadogpscliente->descripcion); ?>&emsp;<i class="fas fa-exchange-alt"></i></a></td>
                            <td class="text-center"><a class="btn btn-success btn-sm" href="/cat_gpscliente/<?php echo e($g->id); ?>/edit"><i class="fas fa-pencil-alt"></i></a></td>
                            <td class="text-center"><a class="btn btn-danger btn-sm" href="/cat_gpscliente/<?php echo e($g->id); ?>/confirmDelete"><i class="fas fa-trash-alt"></i></a></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </table>
                </div>
            </div>
            <?php else: ?>
            <div class="row">
                <div class="col">
                    <br><br>
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>Atención: </strong> No hay registros para este catálogo.
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/monitoreo/resources/views/catalogos/gpscliente/index.blade.php ENDPATH**/ ?>