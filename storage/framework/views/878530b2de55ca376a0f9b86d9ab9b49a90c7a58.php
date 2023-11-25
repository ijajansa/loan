
<style type="text/css">
  .pagination li {
    padding: 5px !important;
  }
</style>
<?php $__env->startSection('content'); ?>
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Credit Card Leads</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?php echo e(url('home')); ?>">Home</a></li>
          <li class="breadcrumb-item active">Credit Card Leads</li>
        </ol>
      </div>
    </div>
  </div>
</section>
<section class="content">
  <div class="card">
    <div class="card-header">
      <div class="col-md-6">
        <h3 class="card-title">Credit Card Leads</h3>
      </div>
      <div class="col-md-6">
        <a class="btn btn-primary float-right" href="<?php echo e(url('credit-card')); ?>">Apply Now</a>
      </div>
    </div>
    <div class="card-body p-0">
      <table class="table table-striped table-sm">
        <thead>
          <tr>
            <th style="width: 5%">#File No.</th>
            <th style="width: 25%">Applicant Name</th>
            <th style="width: 10%">Phone No.</th>
            <th style="width: 10%">Email</th>
            <th style="width: 5%">Review.</th>
            <th style="width: 10%">Status</th>
            <th style="width: 10%">Action</th>
          </tr>
        </thead>
        <tbody>
          <form method="GET" action="#">
            <input type="hidden" name="path" value="cclead">
            <input type="hidden" name="method" value="list">
            <tr>
              <td>
                <input type="text" name="lead_id" value="" class="form-control">
              </td>
              <td>
                <input type="text" class="form-control" name="applicant_name" value="" placeholder="Applicant Name">
              </td>
              <td>
                <input type="text" class="form-control" name="mobile_number" value="" placeholder="Mobile Number">
              </td>
              <td>
                <input type="text" class="form-control" name="email" value="" placeholder="Email">
              </td>
              <td>&nbsp;</td>
              <td>
                <select class="form-control" name="status">
                  <option>All</option>
                  <option value="1" >Un-Assigned</option>
                  <option value="2" >Login</option>
                  <option value="3" >Cancel</option>
                  <option value="4" >Success</option>
                  <option value="5" >Card Dispatched</option>
                  <option value="6" >Rejected</option>
                </select>
              </td>
              <td class="project-actions text-left">
                <button type="submit" class="btn btn-primary btn-sm">
                  <i class="fas fa-filter"></i> Filter
                </button>
              </td>
            </tr>
          </form>
          <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>
            <td><?php echo e(5000+$record->id); ?></td>
            <td><?php echo e($record->first_name); ?> <?php echo e($record->last_name); ?><br/>
              <small><strong>Applied On</strong> <?php echo e($record->created_at->format('d/m/Y')); ?></small><br/>
              <small></small>
            </td>
            <td><?php echo e($record->mobile_number); ?></td>
            <td><?php echo e($record->email); ?></td>
            <td>Review Not Submited</td>
            <td>
              <?php if($record->status=='PDC'): ?>
              <span class="badge bg-indigo">PD-C</span>
              <?php elseif($record->status=='Login'): ?>
              <span class="badge bg-warning"><?php echo e($record->status); ?></span>
              <?php elseif($record->status=='Process'): ?>
              <span class="badge bg-warning">Processing</span>
              <?php elseif($record->status=='Disbursement'): ?>
              <span class="badge bg-success">Disbursement</span>
              <?php elseif($record->status=='Cancel'): ?>
              <span class="badge bg-danger">Cancelled</span>
              <?php endif; ?>
            </td>
            <td>
              <a class="btn btn-primary btn-sm" href="<?php echo e(url('view-credit-card-details')); ?>/<?php echo e($record->id); ?>">
                <i class="far fa-eye"></i> View
              </a>
            </td>
          </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <tr>
            <td colspan="9">
              <ul class="pagination pagination-sm m-0 float-right">
                <?php echo e($data->appends(request()->input())->render("pagination::default")); ?>

              </ul>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</section>
</div> 
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xampp1\htdocs\loan-project\resources\views/front/list-credit-card.blade.php ENDPATH**/ ?>