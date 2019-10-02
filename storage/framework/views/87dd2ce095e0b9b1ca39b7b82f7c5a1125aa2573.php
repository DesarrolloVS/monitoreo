<div class="row">
    <div class="form-group col-md-4">
        <label for="gpsmarcamodelo_id">Marca - Modelo: </label>
        <select name="gpsmarcamodelo_id" id="gpsmarcamodelo_id" class="form-control bg-light shadow-sm border-0">
            <option value="">Seleccione una Opción</option>
            <?php $__currentLoopData = $mm; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($m->id); ?>"><?php echo e($m->marca); ?> - <?php echo e($m->modelo); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>

    <div class="form-group col-md-4">
        <label for="serie">Serie: </label>
        <input class="form-control bg-light shadow-sm border-0" type="text" id="serie" name="serie" placeholder="Serie" value="">
    </div>
    <div class="form-group col-md-4">
        <label for="paterno">Imei: </label>
        <input class="form-control bg-light shadow-sm border-0" type="text" id="imei" name="imei" placeholder="Imei" value="">
    </div>
</div>

<div class="row">
    <div class="form-group col-md-4">
        <label for="puerto">Puerto: </label>
        <input class="form-control bg-light shadow-sm border-0" type="text" id="puerto" name="puerto" placeholder="Puerto" value="">
    </div>
    <div class="form-group col-md-4">
        <label for="sincronizacion">Sincronización: </label>
        <input class="form-control bg-light shadow-sm border-0" type="text" id="sincronizacion" name="sincronizacion" placeholder="Sincronización" value="">
    </div>
</div><?php /**PATH /var/www/html/monitoreo/resources/views/catalogos/gpscliente/form.blade.php ENDPATH**/ ?>