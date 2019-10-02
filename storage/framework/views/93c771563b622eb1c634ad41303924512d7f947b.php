<?php if($gpss->first()): ?>
    <div class="form-group col-md-6">
    <label for="gpscliente_id">Cambiar GPS a: </label>
    <select name="gpscliente_id" id="gpscliente_id" class="form-control">
        <option value="">Seleccione una Opción</option>
        <?php $__currentLoopData = $gpss; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $g): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <option value="<?php echo e($g->id); ?>"><?php echo e($g->serie); ?> - <?php echo e($g->imei); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
<?php else: ?>
    <div class="row col-md-10 col-offset-1">
        <br>
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Atención: </strong> No hay registros de GPS's libres para este cliente.
        </div>
    </div>
<?php endif; ?>

<input type="hidden" name="bandera" id="bandera" value="<?php echo e($bandera); ?>"><?php /**PATH /var/www/html/monitoreo/resources/views/vehiculos/vehiculos/gpss.blade.php ENDPATH**/ ?>