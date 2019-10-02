<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container montse">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 mx-auto">

            <div class="row">
                <div class="col ">
                    <ol class="breadcrumb bg-transparent d-flex justify-content-end">
                        <li class="breadcrumb-item"><a href="/">Inicio</a></li>
                        <li class="breadcrumb-item active" aria-current="">Catálogo Alertas GPS</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <h2 class="text-center montseh2">CATÁLOGO ALERTAS GPS</h1>
                </div>
            </div>
            <div class="row">
                <div class="col my-3">
                    <a class="btn btn-primary" href="/cat_gpsalerta/create"><i class="fas fa-plus"></i>&nbsp;&nbsp;&nbsp;Agregar Registro</a>
                </div>
            </div>

            <?php if($alertas->first()): ?>
            <div class="row">

                <div class="col">
                    <table class="table table-bordered table-hover table-sm">
                        <thead class="thead-light">
                            <tr>
                                <th class="text-center">Id</th>
                                <th class="text-center">Marca</th>
                                <th class="text-center">Modelo</th>
                                <th class="text-center">Alerta</th>
                                <th class="text-center">Campo</th>
                                <th class="text-center">Tipo Alerta</th>
                                <th class="text-center">Tipo de Dato</th>
                                <th class="text-center">Valor</th>
                                <th class="text-center">Repetir</th>
                                <th class="text-center">Revisar</th>
                                <th class="text-center">Estado</th>
                                <th class="text-center">Modificar</th>
                                <th class="text-center">Eliminar</th>
                            </tr>
                        </thead>
                        <?php $__currentLoopData = $alertas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $x): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <?php
                            $r = fnValor($x->tipodato)
                            ?>
                            <td class="text-center"><?php echo e($x->id); ?></td>
                            <td class="text-center"><?php echo e($x->gpsmarcamodelo->marca); ?></td>
                            <td class="text-center"><?php echo e($x->gpsmarcamodelo->modelo); ?></td>
                            <td class="text-center"><?php echo e($x->alerta); ?></td>
                            <td class="text-center"><?php echo e($x->camposgps->descripcion); ?></td>
                            <td class="text-center"><?php echo e(tipoAlerta($x->tipoalerta)); ?></td>
                            <td class="text-center"><?php echo e(tipoDato($x->tipodato)); ?></td>
                            <td class="text-center"><?php echo e($x->$r); ?></td>
                            <td class="text-center"><?php echo e($x->repetir); ?></td>
                            <td class="text-center"><?php echo e($x->revisar); ?></td>
                            <td class="text-center"><a class="btn btn-info btn-sm" href="/cat_gpsalerta/<?php echo e($x->id); ?>/estatus"><?php echo e(($x->estado == false ) ? "INACTIVO" : "ACTIVO"); ?>&emsp;<i class="fas fa-exchange-alt"></i></a></td>
                            <td class="text-center"><a class="btn btn-success btn-sm" href="/cat_gpsalerta/<?php echo e($x->id); ?>/edit"><i class="fas fa-pencil-alt"></i></a></td>
                            <td class="text-center"><a class="btn btn-danger btn-sm" href="/cat_gpsalerta/<?php echo e($x->id); ?>/confirmDelete"><i class="fas fa-trash-alt"></i></a></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </table>
                </div>
            </div>
            <?php else: ?>
            <div class="row ">
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
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/monitoreo/resources/views/catalogos/gpsalerta/index.blade.php ENDPATH**/ ?>