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
                        <li class="breadcrumb-item"><a href="/cat_gpsmarcamodelo">Catálogo GPS Marca Modelo</a></li>
                        <li class="breadcrumb-item active" aria-current="">Modificar Registro</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <form class="bg-white shadow rounded py-3 px-4" action="/cat_gpsmarcamodelo/<?php echo e($gps->id); ?>" method="POST">
                        <h2 class="text-center">Modificar Registro</h2>
                        <hr>
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('put'); ?>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="marca">Marca: </label>
                                <input class="form-control bg-light shadow-sm border-0" type="text" id="marca" name="marca" placeholder="Marca" value="<?php echo e($gps->marca); ?>">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="modelo">Modelo: </label>
                                <input class="form-control bg-light shadow-sm border-0" type="text" id="modelo" name="modelo" placeholder="Modelo" value="<?php echo e($gps->modelo); ?>">
                            </div>
                        </div>
                        <br>
                        <button class="btn btn-primary btn-block" type="submit"><i class="fas fa-edit"></i>&ensp;Modificar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/monitoreo/resources/views/catalogos/gpsmarcamodelo/edit.blade.php ENDPATH**/ ?>