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
                        <li class="breadcrumb-item active" aria-current="">Agregar Registro</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <form class="bg-white shadow rounded py-3 px-4" action="/cat_gpsmarcamodelo" method="POST">
                        <h2 class="text-center">Agregar Gps Marca Modelo</h2>
                        <hr>
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col">
                                <div class="form-group col">
                                    <label for="marca">Marca: </label>
                                    <input class="form-control bg-light shadow-sm border-0" type="text" id="marca" name="marca" placeholder="Marca" value="">
                                </div>
                                <div class="form-group col">
                                    <label for="modelo">Modelo: </label>
                                    <input class="form-control bg-light shadow-sm border-0" type="text" id="modelo" name="modelo" placeholder="Modelo" value="">
                                </div>
                            </div>
                        </div>

                        <br>
                        <div class="text-center">
                            <button class="btn btn-primary btn-block" type="submit"><i class="fas fa-save"></i>&nbsp;&nbsp;&nbsp;Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/monitoreo/resources/views/catalogos/gpsmarcamodelo/create.blade.php ENDPATH**/ ?>