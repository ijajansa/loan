
<?php $__env->startSection('content'); ?>
<div class="nk-content ">
  <div class="container">
     <div class="nk-content-inner">
        <div class="nk-content-body">
           <div class="nk-block-head nk-block-head-sm">
                    <?php echo $__env->make('admin-layouts.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

              <div class="nk-block-between g-3">
                 <div class="nk-block-head-content">
                    <h3 class="nk-block-title page-title">Application Details (<?php echo e($data->loan_name??'-'); ?>)</h3>
                    <div class="nk-block-des text-soft">
                       <p>Details of applied loan data and documents</p>
                   </div>
               </div>
               <div class="nk-block-head-content"><a href="<?php echo e(url('loan-applications')); ?>" class="btn btn-outline-light bg-white d-none d-sm-inline-flex"><em class="icon ni ni-arrow-left"></em><span>Back</span></a><a href="<?php echo e(url('loan-applications')); ?>" class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none"><em class="icon ni ni-arrow-left"></em></a></div>
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
                           <form method="POST" action="<?php echo e(url('loan-applications')); ?>/status/<?php echo e($data->id); ?>">
                            <?php echo csrf_field(); ?>
                            <div class="row">

                               <div class="col-lg-12">
                                <div class="form-group">
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
                     <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label" for="full-name-1">First Name</label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" value="<?php echo e($data->first_name ?? '-'); ?>" name="first_name" disabled placeholder="Enter First Name" id="full-name-1">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label" for="full-name-1">Middle Name</label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" value="<?php echo e($data->middle_name ?? '-'); ?>" name="first_name" disabled placeholder="Enter Middle Name" id="full-name-1">
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label" for="full-name-1">Last Name</label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" value="<?php echo e($data->last_name ?? '-'); ?>" name="first_name" disabled placeholder="Enter Last Name" id="full-name-1">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mt-2">
                        <div class="form-group">
                            <label class="form-label" for="full-name-1">Email</label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" value="<?php echo e($data->email ?? '-'); ?>" name="first_name" disabled placeholder="Enter Email" id="full-name-1">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mt-2">
                        <div class="form-group">
                            <label class="form-label" for="full-name-1">Contact Number</label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" value="<?php echo e($data->mobile_number ?? '-'); ?>" name="first_name" disabled placeholder="Enter Email" id="full-name-1">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mt-2">
                        <div class="form-group">
                            <label class="form-label" for="full-name-1">Date Of Birth</label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" value="<?php echo e($data->dob ?? '-'); ?>" name="first_name" disabled placeholder="Enter Email" id="full-name-1">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mt-2">
                        <div class="form-group">
                            <label class="form-label" for="full-name-1">Requested Loan Amount</label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" value="<?php echo e($data->requested_amount ?? '-'); ?>" name="first_name" disabled placeholder="Enter Email" id="full-name-1">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mt-2">
                        <div class="form-group">
                            <label class="form-label" for="full-name-1">Requested Duration</label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" value="<?php echo e($data->requested_duration ?? '0'); ?> Month" name="first_name" disabled placeholder="Enter Email" id="full-name-1">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mt-2">
                        <div class="form-group">
                            <label class="form-label" for="full-name-1">PAN Number</label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" value="<?php echo e($data->pan_number ?? '-'); ?>" name="first_name" disabled placeholder="Enter Email" id="full-name-1">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mt-2">
                        <div class="form-group">
                            <label class="form-label" for="full-name-1">Employment Type</label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" value="<?php echo e($data->employment_type ?? '-'); ?>" name="first_name" disabled placeholder="Enter Email" id="full-name-1">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mt-2">
                        <div class="form-group">
                            <label class="form-label" for="full-name-1">Company Name</label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" value="<?php echo e($data->company_name ?? '-'); ?>" name="first_name" disabled placeholder="Enter Email" id="full-name-1">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mt-2">
                        <div class="form-group">
                            <label class="form-label" for="full-name-1">Company Type</label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" value="<?php echo e($data->company_type ?? '-'); ?>" name="first_name" disabled placeholder="Enter Email" id="full-name-1">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mt-2">
                        <div class="form-group">
                            <label class="form-label" for="full-name-1">Income Salary</label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" value="<?php echo e($data->income_salary ?? '-'); ?>" name="first_name" disabled placeholder="Enter Email" id="full-name-1">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mt-2">
                        <div class="form-group">
                            <label class="form-label" for="full-name-1">Residence Pincode</label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" value="<?php echo e($data->residence_pincode ?? '-'); ?>" name="first_name" disabled placeholder="Enter Email" id="full-name-1">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mt-2">
                        <div class="form-group">
                            <label class="form-label" for="full-name-1">Permanent Pincode</label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" value="<?php echo e($data->permanent_pincode ?? '-'); ?>" name="first_name" disabled placeholder="Enter Email" id="full-name-1">
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

<?php echo $__env->make('admin-layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xampp1\htdocs\loan-project\resources\views/loan-applications/edit.blade.php ENDPATH**/ ?>