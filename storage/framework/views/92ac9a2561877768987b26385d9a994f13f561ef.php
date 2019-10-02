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
                        <li class="breadcrumb-item"><a href="/cat_vehiculos">Catálogo Vehículos</a></li>
                        <li class="breadcrumb-item active" aria-current="">Agregar Registro</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col">
                <form class="bg-white shadow py-3 px-4 rounded" action="/cat_vehiculos" method="POST">
                    <h2 class="text-center">Agregar Vehículo</h2>
                    <hr>
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="cliente_id">Cliente: </label>
                            <select name="cliente_id" id="cliente_id" class="form-control form-control-sm bg-light shadow-sm border-0">
                                <option value="<?php echo e($cliente->id); ?>"><?php echo e($cliente->nombre); ?></option>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="descripcion">Descripcion Vehículo: </label>
                            <input class="form-control form-control-sm bg-light shadow-sm border-0" type="text" id="descripcion" name="descripcion" placeholder="Descripción" value="">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="marca_id">Marca: </label>
                            <select name="marca_id" id="marca_id" class="form-control  form-control-sm bg-light shadow-sm border-0">
                                <option value="">Seleccione una Opción</option>
                                <?php $__currentLoopData = $marcas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($m->id); ?>"><?php echo e($m->descripcion); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div id="submarca" style="" class="form-group col-md-3">
                            <label for="submarca_id">Submarca: </label>
                            <select name="submarca_id" id="submarca_id" class="form-control  form-control-sm bg-light shadow-sm border-0">
                                <option value=""></option>
                            </select>
                        </div>
                    </div>


                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="placa">Placa: </label>
                            <input class="form-control  form-control-sm bg-light shadow-sm border-0" type="text" id="placa" name="placa" placeholder="Placa" value="">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="modelo_id">Modelo: </label>
                            <select name="modelo_id" id="modelo_id" class="form-control  form-control-sm bg-light shadow-sm border-0">
                                <option value="">Seleccione una Opción</option>
                                <?php $__currentLoopData = $modelos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $modelo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($modelo->id); ?>"><?php echo e($modelo->descripcion); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="puertas">Puertas: </label>
                            <input class="form-control  form-control-sm bg-light shadow-sm border-0" type="text" id="puertas" name="puertas" placeholder="Puertas" value="">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="cilindros">Cilindros: </label>
                            <input class="form-control  form-control-sm bg-light shadow-sm border-0" type="text" id="cilindros" name="cilindros" placeholder="Cilindros" value="">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="serie">Serie: </label>
                            <input class="form-control  form-control-sm bg-light shadow-sm border-0" type="text" id="serie" name="serie" placeholder="Serie" value="">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="chasis">Chasis: </label>
                            <input class="form-control  form-control-sm bg-light shadow-sm border-0" type="text" id="chasis" name="chasis" placeholder="Chasis" value="">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="capacidad">Capacidad de Carga: </label>
                            <input class="form-control  form-control-sm bg-light shadow-sm border-0" type="text" id="capacidad" name="capacidad" placeholder="Capacidad" value="">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="procedencia_id">Procedencia: </label>
                            <select name="procedencia_id" id="procedencia_id" class="form-control  form-control-sm bg-light shadow-sm border-0">
                                <option value="">Seleccione una Opción</option>
                                <?php $__currentLoopData = $procedencias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $procedencia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($procedencia->id); ?>"><?php echo e($procedencia->descripcion); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="tipovehiculo_id">Tipo de Vehículo: </label>
                            <select name="tipovehiculo_id" id="tipovehiculo_id" class="form-control  form-control-sm bg-light shadow-sm border-0">
                                <option value="">Seleccione una Opción</option>
                                <?php $__currentLoopData = $tvs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tv): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($tv->id); ?>"><?php echo e($tv->descripcion); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="tipouso_id">Tipo de usos: </label>
                            <select name="tipouso_id" id="tipouso_id" class="form-control  form-control-sm bg-light shadow-sm border-0">
                                <option value="">Seleccione una Opción</option>
                                <?php $__currentLoopData = $tus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($tu->id); ?>"><?php echo e($tu->descripcion); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="tipocombustible_id">Tipo de Combustible: </label>
                            <select name="tipocombustible_id" id="tipocombustible_id" class="form-control  form-control-sm bg-light shadow-sm border-0">
                                <option value="">Seleccione una Opción</option>
                                <?php $__currentLoopData = $tcs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($tc->id); ?>"><?php echo e($tc->descripcion); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="transmision_id">Tipo de Transmision: </label>
                            <select name="tipotransmision_id" id="tipotransmision_id" class="form-control  form-control-sm bg-light shadow-sm border-0">
                                <option value="">Seleccione una Opción</option>
                                <?php $__currentLoopData = $tts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($tt->id); ?>"><?php echo e($tt->descripcion); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="version">Version: </label>
                            <input class="form-control  form-control-sm bg-light shadow-sm border-0" type="text" id="version" name="version" placeholder="Versión" value="">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="clasevehiculo_id">Clase de Vehículo: </label>
                            <select name="clasevehiculo_id" id="clasevehiculo_id" class="form-control  form-control-sm bg-light shadow-sm border-0">
                                <option value="">Seleccione una Opción</option>
                                <?php $__currentLoopData = $cvs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cv): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($cv->id); ?>"><?php echo e($cv->descripcion); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="vin">VIN: </label>
                            <input class="form-control  form-control-sm bg-light shadow-sm border-0" type="text" id="vin" name="vin" placeholder="VIN" value="">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="rfv">RFV: </label>
                            <input class="form-control  form-control-sm bg-light shadow-sm border-0" type="text" id="rfv" name="rfv" placeholder="RFV" value="">
                        </div>
                        
                    </div>

                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="color">Color: </label>
                            <input class="form-control  form-control-sm bg-light shadow-sm border-0" type="text" id="color" name="color" placeholder="Color" value="">
                        </div>

                        <div class="form-group col-md-3">
                            <label for="balizado">Balizado: </label>
                            <select name="balizado" id="balizado" class="form-control form-control-sm bg-light shadow-sm border-0">
                                <option value="">Seleccione una Opción</option>
                                <option value="0">No</option>
                                <option value="1">Si</option>
                            </select>
                        </div>
                    </div>

                    <br>
                    <div class="text-center">
                        <button class="btn btn-primary btn-block btn-sm" type="submit"><i class="fas fa-save"></i>&nbsp;&nbsp;&nbsp;Guardar</button>
                    </div>
                </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script src="<?php echo e(asset('js/librerias/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/usuario/vehiculo.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/monitoreo/resources/views/vehiculos/vehiculos/create.blade.php ENDPATH**/ ?>