<?php if(session('error')): ?>
<div class="alert alert-danger alert-icon"><em class="icon ni ni-cross-circle"></em> <strong><?php echo e(session('error')); ?></strong></div>
<?php endif; ?>
<?php if(session('success')): ?>
<div class="alert alert-success alert-icon"><em class="icon ni ni-check-circle"></em> <strong><?php echo e(session('success')); ?></strong></div>
<?php endif; ?>
<?php if(session('warning')): ?>
<div class="alert alert-warning alert-icon"><em class="icon ni ni-alert-circle"></em> <strong><?php echo e(session('warning')); ?></strong></div>
<?php endif; ?><?php /**PATH F:\xampp1\htdocs\loan-project\resources\views/admin-layouts/flash.blade.php ENDPATH**/ ?>