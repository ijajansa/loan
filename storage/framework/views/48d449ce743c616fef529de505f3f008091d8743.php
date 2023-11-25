
<?php $__env->startSection('content'); ?>

<section class="content-header">
  <div class="container-fluid">
  <?php echo $__env->make('admin-layouts.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
   <div class="row mb-2">
    <div class="col-sm-6">
      <h1><?php echo e($data->name ?? ''); ?> (New)</h1>
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
       <h3 class="card-title">Fill Loan Application</h3>
     </div>
     <form action="<?php echo e(url('upload-loan')); ?>" method="post" enctype="multipart/form-data">
      <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
      <div class="card-body">
        <div class="row">
         <div class="col-md-4">
          <div class="form-group required">
           <label for="InputRequestedAmount" class="control-label">Loan Amount <small>in number only</small></label>
           <input type="number" name="requested_amount" class="form-control <?php $__errorArgs = ['requested_amount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="InputRequestedAmount" placeholder="Enter required Loan amount" value="<?php echo e(old('requested_amount')); ?>">
           <?php $__errorArgs = ['requested_amount'];
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
      <input type="hidden" name="type" value="<?php echo e(request()->query('type')); ?>">
      <div class="col-md-4">
        <div class="form-group required">
         <label for="InputRequestedDuration" class="control-label">Tenure (Months)</label>
         <select name="requested_duration" class="form-control <?php $__errorArgs = ['requested_duration'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="InputRequestedDuration">
           <option  value=12 <?php if(old('requested_duration')==12): ?> selected <?php endif; ?>>12 Months</option>
           <option  value=24 <?php if(old('requested_duration')==24): ?> selected <?php endif; ?>>24 Months</option>
           <option  value=36 <?php if(old('requested_duration')==36): ?> selected <?php endif; ?>>36 Months</option>
           <option  value=48 <?php if(old('requested_duration')==48): ?> selected <?php endif; ?>>48 Months</option>
           <option  value=60 <?php if(old('requested_duration')==60): ?> selected <?php endif; ?>>60 Months</option>
           <option  value=72 <?php if(old('requested_duration')==72): ?> selected <?php endif; ?>>72 Months</option>
           <option  value=84 <?php if(old('requested_duration')==84): ?> selected <?php endif; ?>>84 Months</option>
           <option  value=96 <?php if(old('requested_duration')==96): ?> selected <?php endif; ?>>96 Months</option>
           <option  value=108 <?php if(old('requested_duration')==108): ?> selected <?php endif; ?>>108 Months</option>
           <option  value=120 <?php if(old('requested_duration')==120): ?> selected <?php endif; ?>>120 Months</option>
           <option  value=132 <?php if(old('requested_duration')==132): ?> selected <?php endif; ?>>132 Months</option>
           <option  value=144 <?php if(old('requested_duration')==144): ?> selected <?php endif; ?>>144 Months</option>
           <option  value=156 <?php if(old('requested_duration')==156): ?> selected <?php endif; ?>>156 Months</option>
           <option  value=168 <?php if(old('requested_duration')==168): ?> selected <?php endif; ?>>168 Months</option>
           <option  value=180 <?php if(old('requested_duration')==180): ?> selected <?php endif; ?>>180 Months</option>
           <option  value=192 <?php if(old('requested_duration')==192): ?> selected <?php endif; ?>>192 Months</option>
           <option  value=204 <?php if(old('requested_duration')==204): ?> selected <?php endif; ?>>204 Months</option>
           <option  value=216 <?php if(old('requested_duration')==216): ?> selected <?php endif; ?>>216 Months</option>
           <option  value=228 <?php if(old('requested_duration')==228): ?> selected <?php endif; ?>>228 Months</option>
           <option  value=240 <?php if(old('requested_duration')==240): ?> selected <?php endif; ?>>240 Months</option>
           <option  value=252 <?php if(old('requested_duration')==252): ?> selected <?php endif; ?>>252 Months</option>
           <option  value=264 <?php if(old('requested_duration')==264): ?> selected <?php endif; ?>>264 Months</option>
           <option  value=276 <?php if(old('requested_duration')==276): ?> selected <?php endif; ?>>276 Months</option>
           <option  value=288 <?php if(old('requested_duration')==288): ?> selected <?php endif; ?>>288 Months</option>
           <option  value=300 <?php if(old('requested_duration')==300): ?> selected <?php endif; ?>>300 Months</option>
           <option  value=312 <?php if(old('requested_duration')==312): ?> selected <?php endif; ?>>312 Months</option>
           <option  value=324 <?php if(old('requested_duration')==324): ?> selected <?php endif; ?>>324 Months</option>
           <option  value=336 <?php if(old('requested_duration')==336): ?> selected <?php endif; ?>>336 Months</option>
           <option  value=348 <?php if(old('requested_duration')==348): ?> selected <?php endif; ?>>348 Months</option>
           <option  value=360 <?php if(old('requested_duration')==360): ?> selected <?php endif; ?>>360 Months</option>
         </select>
         <?php $__errorArgs = ['requested_duration'];
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
       <label for="InputDob" class="control-label">Date of Birth <small>DD-MM-YYYY</small> </label>
       <div class="input-group date" id="Dob" data-target-input="nearest">
        <input type="date" id="dobInput" name="dob" class="form-control <?php $__errorArgs = ['dob'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" autocomplete="off" value="<?php echo e(old('dob')); ?>">
        <?php $__errorArgs = ['dob'];
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
        <script>
         $(document).ready(function(){
          document.getElementById("dobInput").defaultValue = "";
        });
      </script>
    </div>
  </div>
</div>
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
unset($__errorArgs, $__bag); ?>" id="InputFirstName" placeholder="Enter First Name" value="<?php echo e(old('first_name')); ?>">
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
unset($__errorArgs, $__bag); ?>" id="InputMiddleName" placeholder="Enter Middle Name" value="<?php echo e(old('middle_name')); ?>">
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
unset($__errorArgs, $__bag); ?>" id="InputLastName" placeholder="Enter Last Name" value="<?php echo e(old('last_name')); ?>">
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
unset($__errorArgs, $__bag); ?>" placeholder="Email" value="<?php echo e(old('email')); ?>">
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
   <label for="InputMobileNumber" class="control-label">Mobile Number <small>10 Digit only</small> </label>
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
unset($__errorArgs, $__bag); ?>" placeholder="Mobile Number" value="<?php echo e(old('mobile_number')); ?>">
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
   <label for="InputPanNumber" class="control-label">Permanent Account Number (PAN) <small>10 Charactors Alpha-numeric</small> </label>
   <input type="text" name="pan_number" id="InputPanNumber" class="form-control <?php $__errorArgs = ['pan_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" style="text-transform:uppercase" placeholder="PAN" value="<?php echo e(old('pan_number')); ?>">
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
</div>
<div class="row">
 <div class="col-md-4">
  <div class="form-group required">
   <label for="InputEmploymentType" class="control-label">Employment Type</label>
   <select class="form-control <?php $__errorArgs = ['employment_type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="employment_type" id="InputEmploymentType">
    <option value="">Select</option>
    <option  value="Salaried">Salaried</option>
    <option  value="Self Employed">Self Employed</option>
  </select>
  <?php $__errorArgs = ['employment_type'];
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
   <label for="InputRequestedDuration" class="control-label">Company Name</label>
   <input type="text" name="company_name" class="form-control <?php $__errorArgs = ['company_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="InputRequestedDuration" placeholder="Enter Company Name" value="<?php echo e(old('company_name')); ?>">
   <?php $__errorArgs = ['company_name'];
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
   <label for="InputCompanyType" class="control-label">Company Type</label>
   <select class="form-control <?php $__errorArgs = ['company_type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="company_type" id="InputCompanyType">
    <option value="">Select</option>
    <option  value="Public Limited Company">Public Limited Company</option>
    <option  value="One Person Company">One Person Company</option>
    <option  value="Private Limited Company">Private Limited Company</option>
    <option  value="Joint-Venture Company">Joint-Venture Company</option>
    <option  value="Partnership Firm">Partnership Firm</option>
    <option  value="Sole Proprietorship">Sole Proprietorship</option>
    <option  value="Branch Office">Branch Office</option>
    <option  value="Non-Government Organization (NGO)">Non-Government Organization (NGO)</option>
  </select>
  <?php $__errorArgs = ['company_type'];
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
   <label for="InputLastName" class="control-label">Annual Income/ Monthly Salary <small>in number only</small> </label>
   <input type="number" name="income_salary" class="form-control <?php $__errorArgs = ['income_salary'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="InputLastName" placeholder="Enter Annual Income/ Monthly Salary" value="<?php echo e(old('income_salary')); ?>">
   <?php $__errorArgs = ['income_salary'];
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
   <label for="InputResidencePinCode" class="control-label">Residence Pin Code</label>
   <div class="input-group mb-3">
    <div class="input-group-prepend">
     <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
   </div>
   <input type="number" name="residence_pincode" id="InputResidencePinCode" class="form-control <?php $__errorArgs = ['residence_pincode'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Pin Code" value="<?php echo e(old('residence_pincode')); ?>">
   <?php $__errorArgs = ['residence_pincode'];
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
   <label for="InputResidencePinCode" class="control-label">Pin Code</label>
   <div class="input-group mb-3">
    <div class="input-group-prepend">
     <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
   </div>
   <input type="number" name="permanent_pincode" id="InputResidencePinCode" class="form-control <?php $__errorArgs = ['permanent_pincode'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Pin Code" value="<?php echo e(old('permanent_pincode')); ?>">
   <?php $__errorArgs = ['permanent_pincode'];
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
<!-- /.card-body -->
<div class="card-footer">
  <input type="hidden" name="loan_mode" value="New">
  <input type="hidden" name="step" value="basic">
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xampp1\htdocs\loan-project\resources\views/front/add-loan.blade.php ENDPATH**/ ?>