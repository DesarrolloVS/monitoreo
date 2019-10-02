<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container">

    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 mx-auto">    

            <div class="row">
                <div class="col">
                    <ol class="breadcrumb bg-transparent d-flex justify-content-end">
                        <li class="breadcrumb-item"><a href="/">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="/cat_trazas">Catálogo Trazas</a></li>
                        <li class="breadcrumb-item active" aria-current="">Administrar Posiciones</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <p class="my-0">Marca: <?php echo e($t->gpsmarcamodelo->marca); ?></p>
                    <p class="my-0">Modelo: <?php echo e($t->gpsmarcamodelo->modelo); ?></p>
                    <p class="my-0">Tipo Traza: <?php echo e($t->tipotraza->descripcion); ?></p>
                </div>
            </div>

            <form class="bg-white shadow rounded py-3 px-4 my-3" action="/cat_posiciones/<?php echo e($t->id); ?>" method="POST">
                <h2 class="text-center">Administrar Posiciones</h2>
                <hr>
                <?php echo csrf_field(); ?>
                <div class="row">
                    <div class="form-group col">
                        <label for="posicion">Posicion: </label>
                        <select name="posicion" id="posicion" class="form-control bg-light shadow-sm border-0">
                            <option value="">Seleccione una Opción</option>
                            <?php $__currentLoopData = $posiciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($p); ?>">Posicion <?php echo e($p); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php echo $errors->first('posicion', '<small style="color:red">:message</small>'); ?>

                    </div>
                    <div class="form-group col">
                        <label for="camposgps_id">Campos GPS: </label>
                        <select name="camposgps_id" id="camposgps_id" class="form-control bg-light shadow-sm border-0">
                            <option value="">Seleccione una Opción</option>
                            <?php $__currentLoopData = $campos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($c->id); ?>"><?php echo e($c->descripcion); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php echo $errors->first('camposgps_id', '<small style="color:red">:message</small>'); ?>

                    </div>
                </div>

                <br>
                    <div class="text-center">
                        <button class="btn btn-primary btn-block" type="submit"><i class="fas fa-save"></i>&nbsp;&nbsp;&nbsp;Guardar</button>
                    </div>
            </form>

            <?php if($ps->first()): ?>
            <div class="row">
                <div class="col">
                    <table class="table table-bordered table-hover table-sm">
                        <thead class="thead-light">
                            <tr>
                                <th class="text-center">Id</th>
                                <th class="text-center">Posicion</th>
                                <th class="text-center">Campo</th>
                                <th class="text-center">Eliminar</th>
                            </tr>
                        </thead>
                        <?php $__currentLoopData = $ps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $x): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="text-center"><?php echo e($x->id); ?></td>
                            <td class="text-center"><?php echo e($x->posicion); ?></td>
                            <td class="text-center"><?php echo e($x->camposgps->descripcion); ?></td>
                            <td class="text-center"><a class="btn btn-danger btn-sm" href="/cat_trazas/<?php echo e($x->id); ?>/confirmDeletePosicion"><i class="fas fa-trash-alt"></i></a></td>
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
                        <strong>Atención: </strong> No hay registros de posiciones para esta traza.
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script src="<?php echo e(asset('js/librerias/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/catalogos/gps/posiciones.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/monitoreo/resources/views/catalogos/trazas/posiciones.blade.php ENDPATH**/ ?>