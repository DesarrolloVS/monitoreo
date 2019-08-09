<label for="tipoempleado_id">Tipo de empleado: </label>
<select name="tipoempleado_id" id="tipoempleado_id" class="form-control">
    <option value="">Seleccione una Opción</option>
    <?php $__currentLoopData = $tes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $te): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <option value="<?php echo e($te->id); ?>"><?php echo e($te->descripcion); ?></option>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</select><?php /**PATH /var/www/html/monitoreo/resources/views/usuario/select.blade.php ENDPATH**/ ?>