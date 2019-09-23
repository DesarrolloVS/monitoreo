<?php $__env->startSection('css'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container montse">

    <div class="row">
        <div class="col-8 col-sm-8 col-md-8 col-lg-8 mx-auto">

            <div class="row">
                <div class="col">
                    <ol class="breadcrumb bg-transparent d-flex justify-content-end">
                        <li class="breadcrumb-item"><a href="/">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="/cat_clientes">Catálogo Clientes</a></li>
                        <li class="breadcrumb-item active" aria-current="">Modificar Estatus</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <h3>Estatus Actual: <?php echo e($cliente->estadocliente_id); ?></h3>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <form class="bg-white shadow py-3 px-4 rounded" action="/cat_clientes/<?php echo e($cliente->id); ?>/estatus" method="POST">
                        <h3 class="text-center">Modificar Estatus Cliente: <small><?php echo e($cliente->nombre); ?></small></h3>
                        <hr>
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('put'); ?>

                        <div class="row">
                            <div class="form-group col">
                                <label for="estadocliente_id">Cambiar Estado a: </label>
                                <select name="estadocliente_id" id="estadocliente_id" class="form-control bg-light shadow-sm border-0">
                                <option value="">Seleccione una Opción</option>
                                <?php $__currentLoopData = $estados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $estado): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($estado->id != $cliente->estadocliente_id): ?>
                                    <option value="<?php echo e($estado->id); ?>"><?php echo e($estado->descripcion); ?></option>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            </div>
                        </div>

                        <br>
                        <button class="btn btn-primary btn-block" type="submit">Modificar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/monitoreo/resources/views/cliente/estatus.blade.php ENDPATH**/ ?>