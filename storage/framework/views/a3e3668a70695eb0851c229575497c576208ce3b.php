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
                        <li class="breadcrumb-item"><a href="/cat_parametroscliente">Catálogo Parametros Cliente</a></li>
                        <li class="breadcrumb-item active" aria-current="">Agregar Registro</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <form class="bg-white shadow rounded py-3 px-4" action="/cat_parametroscliente" method="POST">
                        <h3 class="text-center">Agregar Parametro</h3>
                        <hr>
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="form-group col-4">
                                <label for="cliente_id">Cliente: </label>
                                <select name="cliente_id" id="cliente_id" class="form-control bg-light shadow-sm border-0">
                                    <option value="<?php echo e($cliente->id); ?>"><?php echo e($cliente->nombre); ?></option>
                                </select>
                                <?php echo $errors->first('cliente_id', '<small style="color:red">:message</small>'); ?>

                            </div>
                        </div>

                        <div class="row"><br><br>
                            <div class="form-group col-4">
                                <label for="parametro">Parametro: </label>
                                <input class="form-control bg-light shadow-sm border-0" type="text" id="parametro" name="parametro" placeholder="Parametro" value="<?php echo e(old('parametro')); ?>">
                                <?php echo $errors->first('parametro', '<small style="color:red">:message</small>'); ?>

                            </div>

                            <div class="form-group col-4">
                                <label for="descripcion">Descripcion: </label>
                                <input class="form-control bg-light shadow-sm border-0" type="text" id="descripcion" name="descripcion" placeholder="Descripcion" value="<?php echo e(old('descripcion')); ?>">
                                <?php echo $errors->first('descripcion', '<small style="color:red">:message</small>'); ?>

                            </div>

                            <div class="form-group col-4">
                                <label for="valor">Valor: </label>
                                <input class="form-control bg-light shadow-sm border-0" type="text" id="valor" name="valor" placeholder="Valor" value="<?php echo e(old('valor')); ?>">
                                <?php echo $errors->first('valor', '<small style="color:red">:message</small>'); ?>

                            </div>
                        </div>

                        <br>
                        <div class="text-center">
                            <button class="btn btn-primary btn-block" type="submit"><i class="fas fa-save"></i>&nbsp;&nbsp;&nbsp;Guardar</button>
                        </div>
                    </form>
                </div>
                <br>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<!-- <script src="<?php echo e(asset('js/librerias/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/usuario/vehiculo.js')); ?>"></script> -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/monitoreo/resources/views/catalogos/parametroscliente/create.blade.php ENDPATH**/ ?>