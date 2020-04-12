<?php $__env->startSection('content'); ?>
    <!-- Navbar -->
    <?php echo $__env->make('layouts.admin.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <?php echo $__env->make('layouts.admin.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- /.Main Sidebar Container -->


  <div class="content-wrapper">

    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h4>Administración GPS Marca - Modelo</h4>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/home">Inicio</a></li>
                <li class="breadcrumb-item active">Administración GPS Marca Modelo</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>


    <!-- Main content -->
    <section class="content">
      <div class="card card-solid">
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-sm-6">
                    <a class="btn btn-primary" href="/cat_gpsmarcamodelo/create"><i class="fas fa-plus"></i>&nbsp;&nbsp;&nbsp;Agregar GPS Marca - Modelo</a>
            </div>
          </div>
        </div>
      </div>
  </section>

    <section class="content">
      <div class="card card-solid">
        <div class="card-body">
        <?php if($gps->first()): ?>
          <div class="row">
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead class="thead-light">
                        <tr>
                            <th class="text-center">Id</th>
                            <th class="text-center">Marca</th>
                            <th class="text-center">Modelo</th>
                            <th class="text-center">Modificar</th>
                            <th class="text-center">Trazas</th>
                            <th class="text-center">Alertas</th>
                            <th class="text-center">Estado</th>
                        </tr>
                    </thead>

                    <?php $__currentLoopData = $gps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $g): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td class="text-center"><?php echo e($g->id); ?></td>
                        <td class="text-center"><?php echo e($g->marca); ?></td>
                        <td class="text-center"><?php echo e($g->modelo); ?></td>
                        <td class="text-center"><a class="btn btn-info btn-sm" href="/cat_gpsmarcamodelo/<?php echo e($g->id); ?>/edit"><i class="fas fa-pencil-alt"></i></a></td>
                        <td class="text-center"><a class="btn btn-info btn-sm" href="/cat_gpsmarcamodelo/<?php echo e($g->id); ?>/trazasgpsmm"><i class="fas fa-route"></i>&emsp;Trazas </a></td>
                        <td class="text-center"><a class="btn btn-info btn-sm" href="/cat_gpsmarcamodelo/<?php echo e($g->id); ?>/alertasgpsmm"> <i class="fas fa-exclamation"></i>&emsp;Alertas </a></td>

                        <?php if($g->estado == true): ?>
                            <td class="text-center"><a class="btn btn-success btn-sm" href="/cat_gpsmarcamodelo/<?php echo e($g->id); ?>/estatus"> <i class="fas fa-exchange-alt"></i>&emsp;Activo </a></td>
                        <?php else: ?>
                            <td class="text-center"><a class="btn btn-secondary btn-sm" href="/cat_gpsmarcamodelo/<?php echo e($g->id); ?>/estatus"> <i class="fas fa-exchange-alt"></i>&emsp;Inactivo </a></td>
                        <?php endif; ?>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </table>
            </div>
          </div>
        <?php else: ?>
          <div class="row">
            <div class="col-12 col-sm-6">
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>Atención: </strong> No hay registros para este catálogo.
                </div>
            </div>
          </div>
        <?php endif; ?>
        </div>
      </div>
  </section>

</div>
    <!-- Control Sidebar -->
    <?php echo $__env->make('layouts.admin.controlbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- /.control-sidebar -->

    <!-- Admin Footer -->
    <?php echo $__env->make('layouts.admin.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('core.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Volumes/Datos_vl/sites/monargento/resources/views/catalogos/gpsmarcamodelo/index.blade.php ENDPATH**/ ?>