
<?php $__env->startSection('content'); ?>
<div class="nk-content ">
  <div class="container">
   <div class="nk-content-inner">
    <div class="nk-content-body">
     <div class="nk-block-head nk-block-head-sm">
        <?php echo $__env->make('admin-layouts.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="nk-block-between g-3">
           <div class="nk-block-head-content">
            <h3 class="nk-block-title page-title">Application Details</h3>
            <div class="nk-block-des text-soft">
             <p>Details of applied card data and documents</p>
         </div>
     </div>
     <div class="nk-block-head-content"><a href="<?php echo e(url('credit-card-leads')); ?>" class="btn btn-outline-light bg-white d-none d-sm-inline-flex"><em class="icon ni ni-arrow-left"></em><span>Back</span></a><a href="<?php echo e(url('credit-card-leads')); ?>" class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none"><em class="icon ni ni-arrow-left"></em></a></div>
 </div>
</div>
<div class="nk-block">
  <div class="row g-gs">
   <div class="col-lg-4 col-xl-4 col-xxl-3">
    <div class="card">
     <div class="card-inner-group">
      <div class="card-inner">
       <div class="user-card user-card-s2">
        <div class="user-avatar lg bg-primary"><img src="<?php echo e(url('storage/app/')); ?>/<?php echo e($data->agents->profile); ?>" alt="" style="width: 82px;height: 82px;"></div>
        <div class="user-info">
         <div class="badge bg-light rounded-pill ucap">Agent Details</div>
         <h5><?php echo e(ucfirst($data->agents->first_name)??''); ?> <?php echo e(ucfirst($data->agents->last_name)??''); ?></h5>
         <span class="sub-text"><?php echo e($data->agents->email); ?></span>
         <span class="sub-text"><?php echo e($data->agents->mobile_number); ?></span>
         <span class="sub-text"><?php echo e($data->agents->office_address ?? $data->agents->address); ?></span>
         <?php if($data->agents->role_id==2): ?>
         <div class="badge bg-success rounded-pill ucap">DSA</div>
         <?php else: ?>
         <div class="badge bg-warning rounded-pill ucap">Sub DSA</div>
         <?php endif; ?>
     </div>
     <form method="POST" action="<?php echo e(url('credit-card-leads')); ?>/status/<?php echo e($data->id); ?>">
        <?php echo csrf_field(); ?>
        <div class="row">

         <div class="col-lg-12" style="text-align: left;">
            <div class="form-group" style="margin-bottom: 8px;">
                <label class="form-label" for="full-name-1">Update Application Status</label>
                <div class="form-control-wrap">
                    <select class="form-control form-select" name="status">
                        <option value="PDC" <?php if($data->status=='PDC'): ?> selected <?php endif; ?>>PDC</option>
                        <option value="Login" <?php if($data->status=='Login'): ?> selected <?php endif; ?>>Login</option>
                        <option value="Process" <?php if($data->status=='Process'): ?> selected <?php endif; ?>>Process</option>
                        <option value="Disbursement" <?php if($data->status=='Disbursement'): ?> selected <?php endif; ?>>Disbursement</option>
                        <option value="Cancel" <?php if($data->status=='Cancel'): ?> selected <?php endif; ?>>Cancel/Reject</option>
                    </select>
                </div>
            </div>
            <div class="form-group hideclass" style="margin-bottom: 8px;">
                <label class="form-label" for="full-name-1">Select Bank</label>
                <div class="form-control-wrap">
                    <select class="form-control form-select <?php $__errorArgs = ['bank_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" onchange="getBankCommission(this.value)" name="bank_id">
                        <option value="">Select Bank</option>
                        <?php $__currentLoopData = $banks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bank): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option <?php if($data->bank_id==$bank->id): ?> selected <?php endif; ?> value="<?php echo e($bank->id.','.$bank->bank_commission); ?>"><?php echo e($bank->bank_name ?? ''); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <?php $__errorArgs = ['bank_id'];
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
          <div class="form-group hideclass" style="margin-bottom: 8px;">
            <label class="form-label" for="full-name-1">Commission up to</label>
            <div class="form-control-wrap">
                <input type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57 || (event.charCode ==46)' class="form-control <?php $__errorArgs = ['commission'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e($data->commission ?? ''); ?>" name="commission" placeholder="Enter Commission" id="commission">
                <?php $__errorArgs = ['commission'];
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
      <div class="form-group">
        <label class="form-label" for="full-name-1">Add Review</label>
        <div class="form-control-wrap">
            <textarea class="form-control" rows="3" name="review" placeholder="Please add message here..."><?php echo e($data->review??''); ?></textarea>
        </div>
    </div>
</div>
<?php if($data->status!='Cancel'): ?>
<div class="col-lg-12 mt-3">
    <div class="form-group">
        <div class="form-control-wrap" style="text-align: left;">

            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </div>
</div>
<?php endif; ?>
</div>
</form>

</div>
</div>
</div>
</div>
</div>
<div class="col-lg-8 col-xl-8 col-xxl-9">
    <div class="card">
     <div class="card-inner">
      <div class="nk-block">
       <div class="overline-title-alt mb-2 mt-2">Application Details (Created At : <?php echo e($data->created_at); ?>)</div>
       <div class="row">
           <div class="row">
               <div class="col-lg-6 mt-2">
                <div class="form-group">
                    <label class="form-label" for="full-name-1">First Name</label>
                    <div class="form-control-wrap">
                        <input type="text" class="form-control" value="<?php echo e($data->first_name ?? '-'); ?>" name="first_name" disabled placeholder="Enter First Name" id="full-name-1">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mt-2">
                <div class="form-group">
                    <label class="form-label" for="full-name-1">Last Name</label>
                    <div class="form-control-wrap">
                        <input type="text" class="form-control" value="<?php echo e($data->last_name ?? '-'); ?>" name="first_name" disabled placeholder="Enter Last Name" id="full-name-1">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mt-2">
                <div class="form-group">
                    <label class="form-label" for="full-name-1">Email</label>
                    <div class="form-control-wrap">
                        <input type="text" class="form-control" value="<?php echo e($data->email ?? '-'); ?>" name="first_name" disabled placeholder="Enter Email" id="full-name-1">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mt-2">
                <div class="form-group">
                    <label class="form-label" for="full-name-1">Contact Number</label>
                    <div class="form-control-wrap">
                        <input type="text" class="form-control" value="<?php echo e($data->mobile_number ?? '-'); ?>" name="first_name" disabled placeholder="Enter Email" id="full-name-1">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mt-2">
                <div class="form-group">
                    <label class="form-label" for="full-name-1">Date Of Birth</label>
                    <div class="form-control-wrap">
                        <input type="text" class="form-control" value="<?php echo e($data->dob ?? '-'); ?>" name="first_name" disabled placeholder="Enter Email" id="full-name-1">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mt-2">
                <div class="form-group">
                    <label class="form-label" for="full-name-1">Gender</label>
                    <div class="form-control-wrap">
                        <input type="text" class="form-control" value="<?php echo e($data->gender ?? '-'); ?>" name="first_name" disabled placeholder="Enter Email" id="full-name-1">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mt-2">
                <div class="form-group">
                    <label class="form-label" for="full-name-1">Income Salary</label>
                    <div class="form-control-wrap">
                        <input type="text" class="form-control" value="<?php echo e($data->income_salary ?? '-'); ?>" name="first_name" disabled placeholder="Enter Email" id="full-name-1">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mt-2">
                <div class="form-group">
                    <label class="form-label" for="full-name-1">Qualification</label>
                    <div class="form-control-wrap">
                        <input type="text" class="form-control" value="<?php echo e($data->qualification ?? '-'); ?> Month" name="first_name" disabled placeholder="Enter Email" id="full-name-1">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mt-2">
                <div class="form-group">
                    <label class="form-label" for="full-name-1">PAN Number</label>
                    <div class="form-control-wrap">
                        <input type="text" class="form-control" value="<?php echo e($data->pan_number ?? '-'); ?>" name="first_name" disabled placeholder="Enter Email" id="full-name-1">
                    </div>
                </div>
            </div>

            <div class="col-lg-6 mt-2">
                <div class="form-group">
                    <label class="form-label" for="full-name-1">Current Pincode</label>
                    <div class="form-control-wrap">
                        <input type="text" class="form-control" value="<?php echo e($data->current_pincode ?? '-'); ?>" name="first_name" disabled placeholder="Enter Email" id="full-name-1">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mt-2">
                <div class="form-group">
                    <label class="form-label" for="full-name-1">Permanent Pincode</label>
                    <div class="form-control-wrap">
                        <input type="text" class="form-control" value="<?php echo e($data->permanent_pincode ?? '-'); ?>" name="first_name" disabled placeholder="Enter Email" id="full-name-1">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mt-2">
                <div class="form-group">
                    <label class="form-label" for="full-name-1">Office Pincode</label>
                    <div class="form-control-wrap">
                        <input type="text" class="form-control" value="<?php echo e($data->office_pincode ?? '-'); ?>" name="first_name" disabled placeholder="Enter Email" id="full-name-1">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mt-2">
                <div class="form-group">
                    <label class="form-label" for="full-name-1">Existing Card</label>
                    <div class="form-control-wrap">
                        <input type="text" class="form-control" value="<?php echo e($data->existing_card == 0 ? 'No' : 'Yes'); ?>" name="first_name" disabled placeholder="Enter Email" id="full-name-1">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mt-2">
                <div class="form-group">
                    <label class="form-label" for="full-name-1">Employment Type</label>
                    <div class="form-control-wrap">
                        <input type="text" class="form-control" value="<?php echo e($data->employment_type ?? '-'); ?>" name="first_name" disabled placeholder="Enter Email" id="full-name-1">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mt-2">
                <div class="form-group">
                    <label class="form-label" for="full-name-1">Company Name</label>
                    <div class="form-control-wrap">
                        <input type="text" class="form-control" value="<?php echo e($data->company_name ?? '-'); ?>" name="first_name" disabled placeholder="Enter Email" id="full-name-1">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mt-2">
                <div class="form-group">
                    <label class="form-label" for="full-name-1">Profession</label>
                    <div class="form-control-wrap">
                        <input type="text" class="form-control" value="<?php echo e($data->profession ?? '-'); ?>" name="first_name" disabled placeholder="Enter Email" id="full-name-1">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mt-2">
                <div class="form-group">
                    <label class="form-label" for="full-name-1">Designation</label>
                    <div class="form-control-wrap">
                        <input type="text" class="form-control" value="<?php echo e($data->designation ?? '-'); ?>" name="first_name" disabled placeholder="Enter Email" id="full-name-1">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mt-2">
                <div class="form-group">
                    <label class="form-label" for="full-name-1">Mother Name</label>
                    <div class="form-control-wrap">
                        <input type="text" class="form-control" value="<?php echo e($data->mother_name ?? '-'); ?>" name="first_name" disabled placeholder="Enter Email" id="full-name-1">
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

</div>
</div>
</div>
<?php if(count($documents)!=0): ?>
<div class="col-lg-12 col-xl-12 col-xxl-12">
    <div class="card">
     <div class="card-inner">
      <div class="nk-block">
       <div class="overline-title-alt mb-2 mt-2">Uploaded Documents</div>
       <hr>
       <div class="row">
           <div class="row">
            <?php $__currentLoopData = $documents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $document): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-4">
                <div class="form-group">
                    <label class="form-label" for="full-name-1"><?php echo e($document->name); ?></label>
                    <a href="<?php echo e(url('storage/app')); ?>/<?php echo e($document->image); ?>" target="_blank"><?php echo e($document->image); ?></a>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>

</div>
</div>
</div>
<?php endif; ?>
</div>
</div>
</div>
</div>
</div>
</div>
<?php $__env->stopSection(); ?>
<script type="text/javascript">

    function getBankCommission(data)
    {
        data = data.split(',');
        $("#commission").val(data[1]);
    }
</script>

<?php echo $__env->make('admin-layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xampp1\htdocs\loan-project\resources\views/card-leads/edit.blade.php ENDPATH**/ ?>