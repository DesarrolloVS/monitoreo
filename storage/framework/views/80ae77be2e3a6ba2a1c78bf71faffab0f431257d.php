<label for="vfecha">Valor o Parametro: </label>
<input class="form-control bg-light shadow-sm <?php if ($errors->has('vfecha')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('vfecha'); ?> is-invalid <?php else: ?> border-0 <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" type="date" id="vfecha" name="vfecha" placeholder="Valor" value="<?php echo e(old('vfecha')); ?>">
<?php if ($errors->has('vfecha')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('vfecha'); ?>
<span class="invalid-feedback" role="alert">
    <strong><?php echo e($message); ?></strong>
</span>
<?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?><?php /**PATH /var/www/html/monitoreo/resources/views/catalogos/gpsalerta/vfecha.blade.php ENDPATH**/ ?>