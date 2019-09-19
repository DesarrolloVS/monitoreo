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
                        <li class="breadcrumb-item"><a href="/cat_marca">Catálogo Marcas</a></li>
                        <li class="breadcrumb-item active" aria-current="">Modificar Registro</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-md-10 col-offset-1">
                    <form class="bg-white shadow py-3 px-4 rounded" action="/cat_marca/<?php echo e($marca->id); ?>" method="POST">
                        <h2>Modificar Registro</h2>
                        <hr>
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('put'); ?>
                        <div class="row">
                            <div class="form-group col">
                                <label for="descripcion">Descripción Marca: </label>
                                <input class="form-control bg-light shadow-sm border-0" type="text" id="descripcion" name="descripcion" placeholder="Ingrese descripción" value="<?php echo e($marca->descripcion); ?>">
                            </div>
                        </div>

                        <br><br>
                        <button class="btn btn-primary btn-block" type="submit"><i class="fas fa-pencil-alt"></i>&ensp;Modificar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\sismon\resources\views/catalogos/marca/edit.blade.php ENDPATH**/ ?>