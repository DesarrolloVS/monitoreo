<label for="vdecimal">Valor o Parametro: </label>
<input class="form-control bg-light shadow-sm <?php if ($errors->has('vdecimal')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('vdecimal'); ?> is-invalid <?php else: ?> border-0 <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" type="text" id="vdecimal" name="vdecimal" placeholder="Valor Decimal" value="<?php echo e(old('vdecimal')); ?>">
<?php if ($errors->has('vdecimal')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('vdecimal'); ?>
<span class="invalid-feedback" role="alert">
    <strong><?php echo e($message); ?></strong>
</span>
<?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?><?php /**PATH /var/www/html/monitoreo/resources/views/catalogos/gpsalerta/vdecimal.blade.php ENDPATH**/ ?>