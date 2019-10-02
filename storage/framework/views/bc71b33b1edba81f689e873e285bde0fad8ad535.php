<label for="submarca_id">Submarca: </label>
<select name="submarca_id" id="submarca_id" class="form-control">
    <option value="">Seleccione una Opción</option>
    <?php $__currentLoopData = $submarcas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <option value="<?php echo e($sub->id); ?>"><?php echo e($sub->descripcion); ?></option>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</select><?php /**PATH /var/www/html/monitoreo/resources/views/vehiculos/vehiculos/submarca.blade.php ENDPATH**/ ?>