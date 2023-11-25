
<?php $__env->startSection('content'); ?>
<section class="content-header">
  <div class="container-fluid">
   <div class="row mb-2">
    <div class="col-sm-6">
     <h1>Credit Card (New)</h1>
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
       <div class="row">
        <div class="col-6">
         <h3 class="card-title">Fill Credit Card Application</h3>
       </div>
       <div class="col-6 text-right">
         <a href="<?php echo e(url('list-credit-cards')); ?>" class="btn btn-secondary" title="Go to existing application list">List</a>
       </div>
     </div>
   </div>
   <form action="<?php echo e(url('credit-card')); ?>" method="post" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
     <div class="card-body">
      <div class="row">
       <div class="col-sm-6 border-right p-2">
        <div class="row">
         <div class="col-md-6">
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
      <div class="col-md-6">
        <div class="form-group required">
          <label for="InputFirstName1" class="control-label">Last Name</label>
          <input type="text" name="last_name" class="form-control <?php $__errorArgs = ['last_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="InputFirstName1" placeholder="Enter Last Name" value="<?php echo e(old('last_name')); ?>">
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
      <div class="col-md-6">
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
  <div class="col-md-6">
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
   <label for="InputGender">Gender</label>
   <select name="gender" class="form-control <?php $__errorArgs = ['gender'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="InputGender">
    <option value="">Select Gender</option>
    <option  value="Male" <?php if(old('gender')=='Male'): ?> selected <?php endif; ?>>Male</option>
    <option  value="Female" <?php if(old('gender')=='Female'): ?> selected <?php endif; ?>>Female</option>
  </select>
  <?php $__errorArgs = ['gender'];
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
   <label for="InputDob">Date of Birth <small>DD-MM-YYYY</small> </label>
   <div class="input-group date" id="Dob" data-target-input="nearest">
    <input type="date" name="dob" class="form-control <?php $__errorArgs = ['dob'];
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
  </div>
</div>
</div>
<div class="col-md-4">
  <div class="form-group required">
   <label for="InputPan" class="control-label">Qualification</label>
   <div class="input-group mb-3">
    <select name="qualification" class="form-control <?php $__errorArgs = ['qualification'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="InputQualification">
     <option value="">Select Qualification</option>
     <option  value="10th pass">10th pass</option>
     <option  value="12th pass">12th pass</option>
     <option  value="Graduate">Graduate</option>
     <option  value="Post Graduate">Post Graduate</option>
     <option  value="others">others</option>
   </select>
   <?php $__errorArgs = ['qualification'];
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
   <label for="InputResidencePinCode" class="control-label">Current Pin Code</label>
   <div class="input-group mb-3">
    <div class="input-group-prepend">
     <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
   </div>
   <input type="number" name="current_pincode" id="InputcurrentPinCode" class="form-control  <?php $__errorArgs = ['current_pincode'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Pin Code" value="<?php echo e(old('current_pincode')); ?>">
   <?php $__errorArgs = ['current_pincode'];
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
   <label for="InputResidencePinCode" class="control-label">Permanent Pin Code</label>
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
<div class="col-sm-6 p-2">
  <div class="row">
   <div class="col-md-8">
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
   <label for="InputExistingCard" class="control-label">Have Credit Card</label>
   <select name="existing_card" class="form-control <?php $__errorArgs = ['existing_card'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="InputExistingCard">
    <option value="0">No</option>
    <option value="1">Yes</option>
  </select>
  <?php $__errorArgs = ['existing_card'];
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
   <label for="InputPanNumber" class="control-label">PAN</label>
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
<div class="col-md-6">
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
<div class="col-md-6">
  <div class="form-group required">
   <label for="InputPan" class="control-label">Profession</label>
   <div class="input-group mb-3">
    <select name="profession" class="form-control <?php $__errorArgs = ['profession'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="InputProfession">
     <option value="">Select Profession</option>
     <option  value="Bank/Insurance Employee">Bank/Insurance Employee</option>
     <option  value="Business Owner">Business Owner</option>
     <option  value="Customer Support">Customer Support</option>
     <option  value="Financial Advisor/ CA">Financial Advisor/ CA</option>
     <option  value="Homemaker/Housewife">Homemaker/Housewife</option>
     <option  value="Influencer">Influencer</option>
     <option  value="Insurance Agent">Insurance Agent</option>
     <option  value="Property Dealer/Travel Agent">Property Dealer/Travel Agent</option>
     <option  value="Sales & Marketing">Sales & Marketing</option>
     <option  value="Shop Owner/Merchant">Shop Owner/Merchant</option>
     <option  value="Student/Not working">Student/Not working</option>
     <option  value="Working Professional">Working Professional</option>
     <option  value="Others">Others</option>
   </select>
   <?php $__errorArgs = ['profession'];
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
   <label for="InputOfficePinCode" class="control-label">Office Pin Code</label>
   <div class="input-group mb-3">
    <div class="input-group-prepend">
     <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
   </div>
   <input type="number" name="office_pincode" id="InputOfficePinCode" class="form-control <?php $__errorArgs = ['office_pincode'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Pin Code" value="<?php echo e(old('office_pincode')); ?>">
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
</div>
</div>
<div class="col-md-3">
  <div class="form-group required">
   <label for="InputCompanyName" class="control-label">Company Name</label>
   <input type="text" name="company_name" id="InputCompanyName" class="form-control <?php $__errorArgs = ['company_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Company Name" value="<?php echo e(old('company_name')); ?>">
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
<div class="col-md-3">
  <div class="form-group required">
    <label for="InputDesignation" class="control-label">Designation</label>
   <input type="text" name="designation" id="InputDesignation" class="form-control <?php $__errorArgs = ['designation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Designation" value="<?php echo e(old('designation')); ?>">
   <?php $__errorArgs = ['designation'];
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
<div class="col-md-3">
  <div class="form-group required">
   <label for="InputMotherName" class="control-label">Mother Name</label>
   <input type="text" name="mother_name" id="InputMotherName" class="form-control <?php $__errorArgs = ['mother_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Mother Name" value="<?php echo e(old('mother_name')); ?>">
   <?php $__errorArgs = ['mother_name'];
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
<div class="col-md-12">
  <input type="hidden" name="loan_mode" value="New">
  <input type="hidden" name="step" value="basic">
  <button type="submit" id="submitBtn" class="btn btn-primary float-right">Submit</button>
</div>
</div>
</div>
<div class="card-footer">

</div>
</form>
</div>
<!-- /.card -->
</div>
</div>
</div>
</section>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xampp1\htdocs\loan-project\resources\views/front/credit-card.blade.php ENDPATH**/ ?>