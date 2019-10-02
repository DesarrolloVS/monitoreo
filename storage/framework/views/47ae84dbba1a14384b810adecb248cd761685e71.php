<!-- <div class="form-group col-md-4"> -->
    <label for="camposgps_id">Campo: </label>
    <select name="camposgps_id" id="camposgps_id" class="form-control bg-light shadow-sm border-0">
        <option value="">Seleccione una Opción</option>
        <?php $__currentLoopData = $campos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <option value="<?php echo e($c->camposgps_id); ?>"><?php echo e($c->camposgps->descripcion); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
    <?php echo $errors->first('camposgps_id', '<small style="color:red">:message</small>'); ?>

<!-- </div> --><?php /**PATH /var/www/html/monitoreo/resources/views/catalogos/gpsalerta/complemento.blade.php ENDPATH**/ ?>