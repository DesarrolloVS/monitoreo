<label for="usuario_id">Usuarios: </label>
<select name="usuario_id" id="usuario_id" class="form-control">
    <option value="">Seleccione una Opción</option>
    <?php $__currentLoopData = $us; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <option value="<?php echo e($u->id); ?>"><?php echo e($u->nombre." ".$u->paterno." ".$u->materno); ?></option>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</select><?php /**PATH /var/www/html/monitoreo/resources/views/catalogos/respveh/select.blade.php ENDPATH**/ ?>