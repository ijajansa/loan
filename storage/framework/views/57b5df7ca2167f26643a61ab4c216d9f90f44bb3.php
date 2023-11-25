
<?php $__env->startSection('content'); ?>
<!-- content @s -->
<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <!-- .nk-block-head-content -->
                        <div class="nk-block-head-content">
                        <h3 class="nk-block-title page-title">Assign Loan Document</h3>
                    </div>
                    </div><!-- .nk-block-between -->
                </div><!-- .nk-block-head -->
                <div class="nk-block nk-block-lg">

                    <div class="card card-bordered card-preview">
                        <div class="card-inner">
                            <form method="POST" action="<?php echo e(url('loan-types/assign')); ?>/<?php echo e($data->id); ?>" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <div class="row g-4">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label" for="full-name-1">Name <span class="text-danger">*</span></label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('name',$data->name)); ?>" disabled name="name" placeholder="eg. Personal Loan" id="full-name-1">
                                                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong><?php echo e($message); ?></strong>
                                                </span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <hr>
                                        <h5 class="">Documents Required</h5>
                                    </div>
                                    <?php $__currentLoopData = $documents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $document): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                        <input type="checkbox" <?php if($document->is_present==1): ?> checked <?php endif; ?> name="documents[]" id="check<?php echo e($document->id); ?>" value="<?php echo e($document->id); ?>">&nbsp;&nbsp;<label class="form-label" for="check<?php echo e($document->id); ?>"><?php echo e($document->name ?? ''); ?> <span class="text-danger">*</span></label>
                                        </div>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-lg btn-primary">Assign</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div><!-- .card-preview -->
                </div> <!-- nk-block -->
            </div>
        </div>
    </div>
</div>
<script>
    function showImg(event){

        var output6 = document.getElementById('showImage');
        output6.src = URL.createObjectURL(event.target.files[0]);
        output6.onload = function() {
          URL.revokeObjectURL(output6.src)
      }
  }

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin-layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xampp1\htdocs\loan-project\resources\views/loan-masters/assign.blade.php ENDPATH**/ ?>