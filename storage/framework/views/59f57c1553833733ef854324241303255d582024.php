<div class="row">
    <div class="col my-3">        
        <a class="btn btn-primary pull-right" href="/cat_parametroscliente/create/<?php echo e($id); ?>"><i class="fas fa-plus"></i>&nbsp;&nbsp;&nbsp;Agregar Registro</a>
    </div>
</div>

<?php if($pc->first()): ?>
<div class="row">
    <div class="col">
        <table class="table table-bordered table-hover table-sm">
            <thead class="thead-light">
                <tr>
                    <th class="text-center">Id</th>
                    <th class="text-center">Cliente</th>
                    <th class="text-center">Parametro</th>
                    <th class="text-center">Descripción</th>
                    <th class="text-center">Valor</th>
                    <th class="text-center">Modificar</th>
                    <th class="text-center">Eliminar</th>
                </tr>
            </thead>            
            <?php $__currentLoopData = $pc; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $x): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td class="text-center"><?php echo e($x->id); ?></td>
                <td class="text-center"><?php echo e($x->cliente->nombre); ?></td>
                <td class="text-center"><?php echo e($x->parametro); ?></td>
                <td class="text-center"><?php echo e($x->descripcion); ?></td>
                <td class="text-center"><?php echo e($x->valor); ?></td>
                <td class="text-center"><a class="btn btn-success btn-sm" href="/cat_parametroscliente/<?php echo e($x->id); ?>/edit"><i class="fas fa-pencil-alt"></i></a></td>
                <td class="text-center"><a class="btn btn-danger btn-sm" href="/cat_parametroscliente/<?php echo e($x->id); ?>/confirmDelete"><i class="fas fa-trash-alt"></i></a></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>
    </div>
</div>
<?php else: ?>
<div class="row">
    <div class="col">
        <br><br>
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Atención: </strong> No hay registros de parametros para este cliente.
        </div>
    </div>  
</div>
<?php endif; ?><?php /**PATH /var/www/html/monitoreo/resources/views/catalogos/parametroscliente/filtro.blade.php ENDPATH**/ ?>