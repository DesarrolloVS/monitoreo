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
                        <li class="breadcrumb-item active" aria-current="">Catálogo Parametros Cliente</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <h2 class="text-center">CATÁLOGO PARAMETROS CLIENTE</h1>
                </div>
            </div>

            <div class="row">
                <div class="col-4 my-3">
                    <!-- <div class="bg-white shadow py-3 px-4 rounded"> -->
                    

                    <div class="form-group">
                        <label for="cliente_id">Cliente: </label>
                        <select name="cliente_id" id="cliente_id" class="form-control bg-light shadow-sm border-0">
                            <option value="">Seleccione una Opción</option>
                            <?php $__currentLoopData = $clientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cliente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($cliente->id); ?>" 
                            <?php if(isset($id_cliente)): ?>
                            <?php if($cliente->id = $id_cliente): ?>
                            selected
                            <?php endif; ?>
                            <?php endif; ?>
                            ><?php echo e($cliente->nombre); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    
                </div>
            </div>
            
            <div class="row">
                <div class="col" id="tabla_registros"></div>
            </div>


            <input type="hidden" name="id_cliente" id="id_cliente" value="<?php echo e($id_cliente); ?>">

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<script src="<?php echo e(asset('js/librerias/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/cliente/parametros.js')); ?>"></script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/monitoreo/resources/views/catalogos/parametroscliente/index.blade.php ENDPATH**/ ?>