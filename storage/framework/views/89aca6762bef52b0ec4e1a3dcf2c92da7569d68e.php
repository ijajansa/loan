
<?php $__env->startSection('content'); ?>

<section class="content-header">
  <div class="container-fluid">
    <?php echo $__env->make('admin-layouts.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Partner/Sub-DSA Form</h1>
      </div>
    </div>
  </div>
</section>
<section class="content">
  <div class="container-fluid">
   <div class="row">
    <div class="col-md-12">
     <div class="card card-primary">
      <div class="card-header">
       <h3 class="card-title">Edit Partner/Sub-DSA</h3>
     </div>
     <form action="<?php echo e(url('edit-dsa')); ?>/<?php echo e(Auth::user()->id); ?>" method="post" enctype="multipart/form-data">
      <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
      <div class="card-body">
        <div class="row">

          <div class="col-md-4">
            <div class="form-group required">
             <label for="InputFirstName" class="control-label">First Name</label>
             <input type="text" name="first_name" class="form-control <?php $__errorArgs = ['first_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="InputFirstName" placeholder="Enter First Name" value="<?php echo e(old('first_name',Auth::user()->first_name)); ?>">
             <?php $__errorArgs = ['first_name'];
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
        <div class="col-md-4">
          <div class="form-group">
           <label for="InputMiddleName" class="control-label">Middle Name</label>
           <input type="text" name="middle_name" class="form-control <?php $__errorArgs = ['middle_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="InputMiddleName" placeholder="Enter Middle Name" value="<?php echo e(old('middle_name',Auth::user()->middle_name)); ?>">
           <?php $__errorArgs = ['middle_name'];
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
      <div class="col-md-4">
        <div class="form-group required">
         <label for="InputLastName" class="control-label">Last Name</label>
         <input type="text" name="last_name" class="form-control <?php $__errorArgs = ['last_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="InputLastName" placeholder="Enter Last Name" value="<?php echo e(old('last_name',Auth::user()->last_name)); ?>">
         <?php $__errorArgs = ['last_name'];
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
    <div class="col-md-4">
      <div class="form-group required">
       <label for="InputEmail" class="control-label">Email Id <small>Personal</small> </label>
       <div class="input-group mb-3">
        <div class="input-group-prepend">
         <span class="input-group-text"><i class="fas fa-envelope"></i></span>
       </div>
       <input type="email" name="email" id="InputEmail" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Email" value="<?php echo e(old('email',Auth::user()->email)); ?>" disabled>
       <?php $__errorArgs = ['email'];
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
<div class="col-md-4">
  <div class="form-group required">
   <label for="InputMobileNumber" class="control-label">Mobile Number </label>
   <div class="input-group mb-3">
    <div class="input-group-prepend">
     <span class="input-group-text"><i class="fas fa-mobile-alt"></i></span>
   </div>
   <input type="tel" name="mobile_number" id="InputMobileNumber" class="form-control <?php $__errorArgs = ['mobile_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Mobile Number" value="<?php echo e(old('mobile_number',Auth::user()->mobile_number)); ?>">
   <?php $__errorArgs = ['mobile_number'];
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

<div class="col-md-4">
  <div class="form-group required">
   <label for="InputMobileNumber1" class="control-label">Whatsapp Number </label>
   <div class="input-group mb-3">
    <div class="input-group-prepend">
     <span class="input-group-text"><i class="fab fa-whatsapp"></i></span>
   </div>
   <input type="tel" name="whatsapp_number" id="InputMobileNumber1" class="form-control <?php $__errorArgs = ['whatsapp_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Whatsapp Number" value="<?php echo e(old('whatsapp_number',Auth::user()->whatsapp_number)); ?>">
   <?php $__errorArgs = ['whatsapp_number'];
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

<div class="col-md-6">
  <div class="form-group required">
   <label for="InputPanNumber" class="control-label">Permanent Account Number (PAN) </label>
   <input type="text" name="pan_number" id="InputPanNumber" class="form-control <?php $__errorArgs = ['pan_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" style="text-transform:uppercase" placeholder="PAN" value="<?php echo e(old('pan_number',Auth::user()->pan_number)); ?>">
   <?php $__errorArgs = ['pan_number'];
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
<div class="col-md-6">
  <div class="form-group required">
   <label for="InputPanNumber2" class="control-label">Aadhar Number </label>
   <input type="number" min="0" name="aadhar_number" id="InputPanNumber2" class="form-control <?php $__errorArgs = ['aadhar_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Aadhar Number" value="<?php echo e(old('aadhar_number',Auth::user()->aadhar_number)); ?>">
   <?php $__errorArgs = ['aadhar_number'];
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
<div class="row">
  <div class="col-md-12">
   <div class="card card-primary">
    <div class="card-header">
     <h3 class="card-title">Goods and Service Tax Details</h3>
   </div>
   <div class="card-body">
     <div class="row">
      <div class="col-md-6">
        <div class="form-group required">
          <label for="InputGSTType" class="control-label">GST Type </label>
          <select class="form-control form-select <?php $__errorArgs = ['gst_type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="InputGSTType" name="gst_type">
            <option value="" <?php if(Auth::user()->gst_type==""): ?> selected <?php endif; ?>>Select GST Type</option>
            <option value="Regular" <?php if(Auth::user()->gst_type=="Regular"): ?> selected <?php endif; ?>>Regular</option>
            <option value="Composit" <?php if(Auth::user()->gst_type=="Composit"): ?> selected <?php endif; ?>>Composit</option>
            <option value="Other" <?php if(Auth::user()->gst_type=="Other"): ?> selected <?php endif; ?>>Other</option>
          </select>
          <?php $__errorArgs = ['gst_type'];
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
      <div class="col-md-6">
        <div class="form-group required">
          <label for="InputGSTNumber" class="control-label">GST Number </label>
          <input type="text" name="gst_number" id="InputGSTNumber" class="form-control <?php $__errorArgs = ['gst_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Enter GST Number" value="<?php echo e(old('gst_number',Auth::user()->gst_number)); ?>">
          <?php $__errorArgs = ['gst_number'];
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
  </div>
</div>
</div>
</div>


<div class="row">
  <div class="col-md-12">
   <div class="card card-primary">
    <div class="card-header">
     <h3 class="card-title">Residence Address</h3>
   </div>
   <div class="card-body">
     <div class="row">
      <div class="col-md-6">
        <div class="form-group required">
          <label for="InputAddress" class="control-label">Residence Address </label>
          <textarea rows="3" class="form-control <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="address"  id="InputAddress" placeholder="Residence Address"><?php echo e(old('address',Auth::user()->address??'')); ?></textarea>
          <?php $__errorArgs = ['address'];
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
      <div class="col-lg-6">
        <div class="row">
          <div class="col-lg-12">
            <div class="form-group">
              <label class="form-label" for="full-name-12">Pincode <span class="text-danger">*</span></label>
              <div class="form-control-wrap">
                <input type="number" class="form-control <?php $__errorArgs = ['pincode'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('pincode',Auth::user()->pincode??'')); ?>" name="pincode" placeholder="Enter Pincode" id="full-name-12">
                <?php $__errorArgs = ['pincode'];
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
          <div class="col-lg-4">
            <div class="form-group">
              <div class="form-control-wrap">
                <input type="text" class="form-control <?php $__errorArgs = ['city'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('city',Auth::user()->city??'')); ?>" name="city" placeholder="City">
                <?php $__errorArgs = ['city'];
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
          <div class="col-lg-4">
            <div class="form-group">
              <div class="form-control-wrap">
                <input type="text" class="form-control <?php $__errorArgs = ['state'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('state',Auth::user()->state??'')); ?>" name="state" placeholder="State">
                <?php $__errorArgs = ['state'];
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
          <div class="col-lg-4">
            <div class="form-group">
              <div class="form-control-wrap">
                <input type="text" class="form-control <?php $__errorArgs = ['country'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('country',Auth::user()->country??'')); ?>" name="country" placeholder="Country">
                <?php $__errorArgs = ['country'];
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
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>


<div class="row">
  <div class="col-md-12">
   <div class="card card-primary">
    <div class="card-header">
     <h3 class="card-title">Office Address</h3>
   </div>
   <div class="card-body">
     <div class="row">
      <div class="col-md-6">
        <div class="form-group required">
          <label for="InputAddress1" class="control-label"> Address </label>
          <textarea rows="3" class="form-control <?php $__errorArgs = ['office_address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="office_address"  id="InputAddress1" placeholder="Office Address"><?php echo e(old('office_address',Auth::user()->office_address??'')); ?></textarea>
          <?php $__errorArgs = ['office_address'];
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
      <div class="col-lg-6">
        <div class="row">
          <div class="col-lg-12">
            <div class="form-group">
              <label class="form-label" for="full-name-12">Pincode <span class="text-danger">*</span></label>
              <div class="form-control-wrap">
                <input type="number" class="form-control <?php $__errorArgs = ['office_pincode'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('office_pincode',Auth::user()->office_pincode??'')); ?>" name="office_pincode" placeholder="Enter Pincode" id="full-name-12">
                <?php $__errorArgs = ['office_pincode'];
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
          <div class="col-lg-4">
            <div class="form-group">
              <div class="form-control-wrap">
                <input type="text" class="form-control <?php $__errorArgs = ['office_city'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('office_city',Auth::user()->office_city??'')); ?>" name="office_city" placeholder="City">
                <?php $__errorArgs = ['office_city'];
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
          <div class="col-lg-4">
            <div class="form-group">
              <div class="form-control-wrap">
                <input type="text" class="form-control <?php $__errorArgs = ['office_state'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('office_state',Auth::user()->office_state??'')); ?>" name="office_state" placeholder="State">
                <?php $__errorArgs = ['office_state'];
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
          <div class="col-lg-4">
            <div class="form-group">
              <div class="form-control-wrap">
                <input type="text" class="form-control <?php $__errorArgs = ['office_country'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('office_country',Auth::user()->office_country??'')); ?>" name="office_country" placeholder="Country">
                <?php $__errorArgs = ['office_country'];
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
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>

<div class="row">
  <!-- left column -->
  <div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Bank Details</h3>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-4">
            <div class="form-group required">
              <label for="InputAccountType" class="control-label">Account Type</label>
              <select name="account_type" id="InputAccountType" class="form-control <?php $__errorArgs = ['account_type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" >
                <option value="">Select Account Type</option>
                <option value="Saving" <?php if(Auth::user()->account_type=="Saving"): ?> selected <?php endif; ?>>Saving</option>
                <option value="Current" <?php if(Auth::user()->account_type=="Current"): ?> selected <?php endif; ?>>Current</option>
                <option value="Other" <?php if(Auth::user()->account_type=="Other"): ?> selected <?php endif; ?>>Other</option>
              </select>
              <?php $__errorArgs = ['account_type'];
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
          <div class="col-md-4">
            <div class="form-group required">
              <label for="InputAccountName" class="control-label">Account Name</label>
              <input type="text" name="account_name" class="form-control <?php $__errorArgs = ['account_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="InputAccountName" placeholder="Enter Account Name" value="<?php echo e(Auth::user()->account_name ?? ''); ?>">
              <?php $__errorArgs = ['account_name'];
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
          <div class="col-md-4">
            <div class="form-group required">
              <label for="InputBankName" class="control-label">Bank Name</label>
              <input type="text" name="bank_name" class="form-control <?php $__errorArgs = ['bank_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="InputBankName" placeholder="Enter Bank Name" value="<?php echo e(Auth::user()->bank_name ?? ''); ?>">
              <?php $__errorArgs = ['bank_name'];
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
          <div class="col-md-4">
            <div class="form-group required">
              <label for="InputIfscCode" class="control-label">IFSC Code</label>
              <input type="text" name="ifsc_code" class="form-control <?php $__errorArgs = ['ifsc_code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="InputIfscCode" placeholder="Enter IFSC Code" value="<?php echo e(Auth::user()->ifsc_code ?? ''); ?>">
              <?php $__errorArgs = ['ifsc_code'];
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
          <div class="col-md-4">
            <div class="form-group required">
              <label for="InputAccountNumber" class="control-label">Account Number</label>
              <input type="number" name="account_number" class="form-control <?php $__errorArgs = ['account_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="InputAccountNumber" placeholder="Enter Account Number" value="<?php echo e(Auth::user()->account_number ?? ''); ?>">
              <?php $__errorArgs = ['account_number'];
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
      </div>
    </div>
  </div>
</div>






</div>
<!-- /.card-body -->
<div class="card-footer">

  <button type="submit" id="submitBtn" class="btn btn-primary">Submit</button>
</div>
</form>
</div>
<!-- /.card -->
</div>
</div>
</div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xampp1\htdocs\loan-project\resources\views/front/edit-dsa.blade.php ENDPATH**/ ?>