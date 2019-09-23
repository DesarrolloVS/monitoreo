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
                        <li class="breadcrumb-item"><a href="/cat_clientes">Catálogo Clientes</a></li>
                        <li class="breadcrumb-item active" aria-current="">Modificar Registro</li>
                    </ol>
                </div>
            </div>            

            <div class="row">
                <div class="col">
                    <form class="bg-white shadow rounded py-3 px-4" action="/cat_clientes/<?php echo e($cliente->id); ?>" method="POST">
                        <h4 class="text-center">Modificar Cliente <small>( <?php echo e($cliente->nombre); ?> )</small></h4>
                        <hr>
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('put'); ?>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="nombre">Nombre Empresa: </label>
                                <input class="form-control shadow-sm border-0 bg-light" type="text" id="nombre" name="nombre" placeholder="Nombre empresa" value="<?php echo e($cliente->nombre); ?>">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="logo">Logo: </label>
                                <input type="file" class="form-control shadow-sm border-0 bg-light" name="logo">
                                <?php if($cliente->logo): ?>
                                <a href="<?php echo e(asset('logos')); ?>/<?php echo e($cliente->logo); ?>" class="btn btn-info btn-sm mt-2" target="_blank">Ver Logo</a>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="tipopersona_id">Tipo de Persona: </label>
                                <select name="tipopersona_id" id="tipopersona_id" class="form-control shadow-sm border-0 bg-light">
                                    <option value="">Seleccione una Opción</option>
                                    <?php $__currentLoopData = $tps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($tp->id); ?>" 
                                        <?php if($cliente->tipopersona_id == $tp->id): ?> 
                                        selected
                                        <?php endif; ?>
                                        ><?php echo e($tp->descripcion); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="rfc">RFC: </label>
                                <input class="form-control shadow-sm border-0 bg-light" type="text" id="rfc" name="rfc" placeholder="RFC" value="<?php echo e($cliente->rfc); ?>">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="tipoempresa_id">Tipo de Empresa: </label>
                                <select name="tipoempresa_id" id="tipoempresa_id" class="form-control shadow-sm border-0 bg-light">
                                    <option value="">Seleccione una Opción</option>
                                    <?php $__currentLoopData = $tes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $te): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($te->id); ?>" 
                                        <?php if($cliente->tipoempresa_id == $te->id): ?> 
                                        selected
                                        <?php endif; ?>
                                        ><?php echo e($te->descripcion); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="estadocliente_id">Estado cliente: </label>
                                <select name="estadocliente_id" id="estadocliente_id" class="form-control shadow-sm border-0 bg-light">
                                    <option value="">Seleccione una Opción</option>
                                    <?php $__currentLoopData = $estados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $estado): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($estado->id); ?>" 
                                    <?php if($cliente->estadocliente_id == $estado->id): ?> 
                                    selected
                                    <?php endif; ?>
                                    ><?php echo e($estado->descripcion); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="tiposervicio_id">Tipo de Servicio: </label>
                                <select multiple name="tiposervicio_id[]" id="tiposervicio_id[]" class="form-control shadow-sm border-0 bg-light">
                                    <?php $__currentLoopData = $tss; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ts): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($ts->id); ?>" 
                                        <?php if(isset($services[$ts->id])): ?>
                                        selected
                                        <?php endif; ?>
                                        ><?php echo e($ts->descripcion); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="usuario_id">Contacto: </label>
                                <input type="text" placeholder="Ingrese el nombre del usuario" class="form-control shadow-sm border-0 bg-light">
                            </div>
                        </div>
                        <br>
                        <button class="btn btn-primary btn-block" type="submit"><i class="fas fa-edit"></i>&ensp;Modificar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/monitoreo/resources/views/catalogos/cliente/edit.blade.php ENDPATH**/ ?>