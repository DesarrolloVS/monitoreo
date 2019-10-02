<div class="row">
    <div class="form-group">
        <br><br>
        <a class="btn btn-primary pull-right" href="/cat_camposgps/create/<?php echo e($id); ?>"><i class="fas fa-plus"></i>&nbsp;&nbsp;&nbsp;Agregar Campo</a>
    </div>
</div>

<?php if($campos->first()): ?>
<div class="row">
    <br><br>
    <div class="form-group">
        <table class="table table-bordered">
            <th class="text-center">Id</th>
            <th class="text-center">Marca</th>
            <th class="text-center">Modelo</th>
            <th class="text-center">Campo</th>
            <th class="text-center">Modificar</th>
            <th class="text-center">Eliminar</th>
            <?php $__currentLoopData = $campos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $x): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td class="text-center"><?php echo e($x->id); ?></td>
                <td class="text-center"><?php echo e($x->gpsmarcamodelo->marca); ?></td>
                <td class="text-center"><?php echo e($x->gpsmarcamodelo->modelo); ?></td>
                <td class="text-center"><?php echo e($x->descripcion); ?></td>
                <td class="text-center"><a class="btn btn-success btn-xs" href="/cat_camposgps/<?php echo e($x->id); ?>/edit"><i class="fas fa-pencil-alt"></i></a></td>
                <td class="text-center"><a class="btn btn-danger btn-xs" href="/cat_camposgps/<?php echo e($x->id); ?>/confirmDelete"><i class="fas fa-trash-alt"></i></a></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>
    </div>
</div>
<?php else: ?>
<div class="row">
    <br><br><br><br>
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Atención: </strong> No hay registros para este catalogo.
    </div>
</div>
<?php endif; ?><?php /**PATH /var/www/html/monitoreo/resources/views/catalogos/camposgps/filtro.blade.php ENDPATH**/ ?>