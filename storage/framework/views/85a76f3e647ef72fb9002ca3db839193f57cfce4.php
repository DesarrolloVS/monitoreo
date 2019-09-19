<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container">

    <div class="row">
        <div class="col-8 col-sm-8 col-md-8 col-lg-8 mx-auto">

            <div class="row">
                <div class="col">
                    <ol class="breadcrumb bg-transparent d-flex justify-content-end">
                        <li class="breadcrumb-item"><a href="/">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="/cat_marca">Catálogo Marcas</a></li>
                        <li class="breadcrumb-item active" aria-current="">Eliminar Registro</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col my-3">
                    <form class="bg-white shadow py-3 py-4" action="/cat_marca/<?php echo e($marca->id); ?>" method="POST">
                        <div class="col">
                            <h2 class="text-center">Eliminar Registro: <small> <?php echo e($marca->descripcion); ?> </small></h2>
                            <hr>
                            <?php echo e(csrf_field()); ?>

                            <?php echo method_field('delete'); ?>
                            <br>
                            <button class="btn btn-danger btn-block" type="submit"><i class="fas fa-trash-alt"></i>&ensp;Eliminar</button>
                            <a class="class btn btn-block btn-outline-dark" href="/cat_marca"><i class="far fa-window-close"></i>&ensp;Cancelar</a>
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
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\sismon\resources\views/catalogos/marca/confirmDelete.blade.php ENDPATH**/ ?>