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
                        <li class="breadcrumb-item"><a href="/cat_gpsalerta">Catálogo Alertas GPS</a></li>
                        <li class="breadcrumb-item active" aria-current="">Agregar Alerta GPS</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <form class="bg-white shadow rounded py-3 px-4" action="/cat_gpsalerta" method="POST">
                        <?php echo csrf_field(); ?>
                        <h2 class="text-center">Agregar Alerta GPS</h2>
                        <hr>
                        <div class="row">
                            <div class="col-4 mb-4">
                                <div class="form-group ">
                                    <label for="gpsmarcamodelo_id">Marca - Modelo: </label>
                                    <select name="gpsmarcamodelo_id" id="gpsmarcamodelo_id" class="form-control bg-light shadow-sm <?php if ($errors->has('gpsmarcamodelo_id')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('gpsmarcamodelo_id'); ?> is-invalid <?php else: ?> border-0 <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>">
                                        <option value="">Seleccione una Opción</option>
                                        <?php $__currentLoopData = $mm; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($m->id); ?>"><?php echo e($m->marca); ?> - <?php echo e($m->modelo); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php if ($errors->has('gpsmarcamodelo_id')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('gpsmarcamodelo_id'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                    <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                </div>
                            </div>
                        </div>
                        <!-- <div id="complement"></div> -->

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="alerta">Alerta: </label>
                                    <input class="form-control bg-light shadow-sm <?php if ($errors->has('alerta')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('alerta'); ?> is-invalid <?php else: ?> border-0 <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" type="text" id="alerta" name="alerta" placeholder="Alerta" value="<?php echo e(old('alerta')); ?>">
                                    <?php if ($errors->has('alerta')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('alerta'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                    <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-group">
                                    <label for="tipoalerta">Tipo de Alerta:</label>
                                    <select name="tipoalerta" id="tipoalerta" class="form-control bg-light shadow-sm <?php if ($errors->has('tipoalerta')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('tipoalerta'); ?> is-invalid <?php else: ?> border-0 <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>">
                                        <option value="">Seleccione una Opción</option>
                                        <option value="1">Alerta Verde</option>
                                        <option value="2">Alerta Amarilla</option>
                                        <option value="3">Alerta Roja</option>
                                    </select>
                                    <?php if ($errors->has('tipoalerta')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('tipoalerta'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                    <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-group">
                                    <label for="tipovehiculo_id">Tipo de Vehículo:</label>
                                    <select name="tipovehiculo_id" id="tipovehiculo_id" class="form-control bg-light shadow-sm <?php if ($errors->has('tipovehiculo_id')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('tipovehiculo_id'); ?> is-invalid <?php else: ?> border-0 <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>">
                                        <option value="">Seleccione una Opción</option>
                                        <?php $__currentLoopData = $tv; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $x): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($x->id); ?>"><?php echo e($x->descripcion); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php if ($errors->has('tipovehiculo_id')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('tipovehiculo_id'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                    <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group" id="complement">
                                    <label for="camposgps_id">Campo: </label>
                                    <select name="camposgps_id" id="camposgps_id" class="form-control bg-light shadow-sm <?php if ($errors->has('camposgps_id')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('camposgps_id'); ?> is-invalid <?php else: ?> border-0 <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>">
                                        <option value="">Seleccione una Opción</option>
                                    </select>
                                    <?php if ($errors->has('camposgps_id')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('camposgps_id'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                    <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-group">
                                    <label for="tipodato">Tipo de Dato: </label>
                                    <select name="tipodato" id="tipodato" class="form-control bg-light shadow-sm <?php if ($errors->has('tipodato')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('tipodato'); ?> is-invalid <?php else: ?> border-0 <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>">
                                        <option value="">Seleccione una Opción</option>
                                        <option value="1">Entero</option>
                                        <option value="2">Decimal</option>
                                        <option value="3">Fecha</option>
                                        <option value="4">Booleano</option>
                                        <option value="5">Cadena</option>
                                    </select>
                                    <?php if ($errors->has('tipodato')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('tipodato'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                    <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-group" id="complement2">
                                    <label for="valor">Valor o Parametro: </label>
                                    <input class="form-control bg-light shadow-sm <?php if ($errors->has('valor')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('valor'); ?> is-invalid <?php else: ?> border-0 <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" type="text" id="valor" name="valor" placeholder="Valor" value="<?php echo e(old('valor')); ?>">
                                    <?php if ($errors->has('valor')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('valor'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                    <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="funcion">Tipo de Confirmación Alerta:</label>
                                    <select name="funcion" id="funcion" class="form-control bg-light shadow-sm <?php if ($errors->has('funcion')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('funcion'); ?> is-invalid <?php else: ?> border-0 <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>">
                                        <option value="">Seleccione una Opción</option>
                                        <option value="1">Funcion 1</option>
                                        <option value="2">Funcion 2</option>
                                        <option value="3">Funcion 3</option>
                                    </select>
                                    <?php if ($errors->has('funcion')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('funcion'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                    <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                </div>
                            </div>

                            <div class="col">
                                <label for="repetir">Repetir: </label>
                                <div class="form-group input-group">
                                    <input class="input-group form-control bg-light shadow-sm <?php if ($errors->has('repetir')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('repetir'); ?> is-invalid <?php else: ?> <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" type="text" id="repetir" name="repetir" placeholder="Repetir" value="<?php echo e(old('repetir')); ?>">
                                    <div class="input-group-append">
                                        <span class="input-group-text">segundos</span>
                                    </div>
                                </div>
                                <?php if ($errors->has('repetir')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('repetir'); ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                            </div>
                            

                            <div class="col">
                                <label for="revisar">Revisar: </label>
                                <div class="form-group input-group">
                                    <input class="input-group form-control bg-light shadow-sm <?php if ($errors->has('revisar')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('revisar'); ?> is-invalid <?php else: ?> <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" type="text" id="revisar" name="revisar" placeholder="Revisar" value="<?php echo e(old('revisar')); ?>">
                                    <div class="input-group-append">
                                        <span class="input-group-text">segundos</span>
                                    </div>
                                </div>
                                <?php if ($errors->has('revisar')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('revisar'); ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                            </div>
                        </div>

                        <br>
                        <div class="text-center" id="save" style="display:none">
                            <button class="btn btn-primary btn-block" type="submit"><i class="fas fa-save"></i>&nbsp;&nbsp;&nbsp;Guardar</button>
                        </div>
                    </form>
                    <br>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script src="<?php echo e(asset('js/librerias/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/catalogos/alertas/complement.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/monitoreo/resources/views/catalogos/gpsalerta/create.blade.php ENDPATH**/ ?>