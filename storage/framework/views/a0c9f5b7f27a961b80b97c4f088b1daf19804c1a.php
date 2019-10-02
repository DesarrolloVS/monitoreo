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
                        <li class="breadcrumb-item"><a href="/cat_trazas">Catálogo Trazas</a></li>
                        <li class="breadcrumb-item active" aria-current="">Agregar Registro</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <form class="bg-white shadow rounded py-3 px-4" action="/cat_trazas" method="POST">
                        <h2 class="text-center">Agregar Traza</h2>
                        <hr>
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="gpsmarcamodelo_id">Marca - Modelo: </label>
                                <select name="gpsmarcamodelo_id" id="gpsmarcamodelo_id" class="form-control bg-light shadow-sm border-0">
                                    <option value="">Seleccione una Opción</option>
                                    <?php $__currentLoopData = $mm; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($m->id); ?>"><?php echo e($m->marca); ?> - <?php echo e($m->modelo); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php echo $errors->first('gpsmarcamodelo_id', '<small style="color:red">:message</small>'); ?>

                            </div>
                        </div>

                        <div class="row">
                        <br><br>
                            <div class="form-group col-md-4">
                                <label for="descripcion">Traza: </label>
                                <input class="form-control bg-light shadow-sm border-0" type="text" id="descripcion" name="descripcion" placeholder="Descripción" value="<?php echo e(old('descripcion')); ?>">
                                <?php echo $errors->first('descripcion', '<small style="color:red">:message</small>'); ?>

                            </div>
                            <div class="form-group col-md-4">
                                <label for="descripcion">Número de Posiones: </label>
                                <input class="form-control bg-light shadow-sm border-0" type="text" id="num_posiciones" name="num_posiciones" placeholder="Número de Posiciones" value="<?php echo e(old('num_posiciones')); ?>">
                                <?php echo $errors->first('num_posiciones', '<small style="color:red">:message</small>'); ?>

                            </div>
                            <div class="form-group col-md-4">
                                <label for="tipotraza_id">Tipo Traza: </label>
                                <select name="tipotraza_id" id="tipotraza_id" class="form-control bg-light shadow-sm border-0">
                                    <option value="">Seleccione una Opción</option>
                                    <?php $__currentLoopData = $tt; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($t->id); ?>"><?php echo e($t->descripcion); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php echo $errors->first('tipotraza_id', '<small style="color:red">:message</small>'); ?>

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
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/monitoreo/resources/views/catalogos/trazas/create.blade.php ENDPATH**/ ?>