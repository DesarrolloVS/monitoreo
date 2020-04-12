<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
        <h5>Anónimo</h5>
        <a class="d-block" href="javascript:{}" onclick="document.getElementById('logout-form').submit();">Logout</a>
         <?php if(auth()->guard()->check()): ?>
	        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
	            <?php echo csrf_field(); ?>
	        </form>
        <?php endif; ?>
    </div>
</aside>

  <?php /**PATH /Volumes/Datos_vl/sites/monargento/resources/views/layouts/inicio/controlbar.blade.php ENDPATH**/ ?>