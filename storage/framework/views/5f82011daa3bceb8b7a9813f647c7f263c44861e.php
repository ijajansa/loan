
<style type="text/css">
  .featured-nft {
    width: 82% !important;
  }
</style>
<?php $__env->startSection('content'); ?>
<section class="content">
  <div class="container-fluid">
    <div class="row">

      <div class="col-md-8 col-lg-8 col-xl-8 col-xxl-8">
        <div class="card custom-card overflow-hidden">
          <div class="card-body">
            <div class="row gap-3 gap-sm-0">
              <div class="col-sm-10 col-12">
                <div class="">
                  <h4 class="fw-semibold mb-2">
                    <span id="greetings">Good <?php if(date('H') <= 12): ?> Morning <?php elseif(date('H') >= 12 && date('H')<=18): ?> Afternoon <?php else: ?> Evening <?php endif; ?></span>, <?php echo e(Auth::user()->first_name??''); ?> <?php echo e(Auth::user()->middle_name??''); ?> <?php echo e(Auth::user()->last_name??''); ?>  <a href="<?php echo e(url('home')); ?>?path=dsa&method=edit" title="Edit Profile"><i class="fas fa-user-edit"></i></a>
                  </h4>
                  <div class="row">
                    <div class="col-sm-3 mt-3 home-left-items">
                      <div class="home-title">ID</div>
                      <div><?php echo e(10000 + Auth::user()->id); ?></div>
                    </div>
                    <!-- <div class="col-sm-3 mt-3 home-left-items">
                      <div class="home-title">BCP ID</div>
                      <div> - </div>
                    </div> -->
                    <div class="col-sm-3 mt-3 home-left-items">
                      <div class="home-title">PPI Active</div>
                      <div>
                        <?php if(Auth::user()->is_active ==1): ?>
                        <strong class="text-success">Active</strong>
                        <?php else: ?>
                        <strong class="text-danger">Inactive</strong>
                        <?php endif; ?>
                        <a title="PPI Settings" href="javascript:void(0)" role="button"> <i class="fas fa-cog"></i></a> </div>
                      </div>
                      <div class="col-sm-3 mt-3 home-left-items">
                        <div class="home-title">State</div>
                        <div><?php echo e(Auth::user()->state??''); ?></div>
                      </div>
                      <?php
                          $record =App\Models\User::where('id',Auth::user()->agent_id)->first();
                      ?>
                      <?php if($record!=null): ?>
                      <div class="col-sm-3 mt-3 home-left-items">
                        <div class="home-title">RM Name</div>
                        <div><?php echo e(ucwords($record->first_name." ".$record->last_name)); ?></div>
                      </div>
                      <?php endif; ?>
                      <?php if($record!=null): ?>
                      <div class="col-sm-3 mt-3 home-left-items">
                        <div class="home-title">RM No.</div>
                        <div>
                          <?php echo e($record->mobile_number); ?>

                        </div>
                      </div>
                      <?php endif; ?>

                      <div class="col-sm-3 mt-3 home-left-items">
                        <div class="home-title">Joining Date</div>
                        <div><?php echo e(Auth::user()->created_at->format('d-M-Y')); ?></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-sm-2 col-auto my-auto">
                  <div class="featured-nft">
                    <img style="max-width:100%;max-height:100%" src="<?php echo e(url('storage/app')); ?>/<?php echo e(Auth::user()->profile); ?>" alt="">
                  </div>
                </div>
                <div class="col-12 btn-list pt-3 d-flex">
                  <a href="https://kb.hoogmatic.in" target="_blank" class="btn btn-outline-primary flex-fill">Knowledge Base <i class="fas fa-lightbulb"></i></a>
                  <a href="/index.php?path=dsa&method=agreement" target="_blank" class="btn btn-outline-primary flex-fill">Agreement <i class="fas fa-download"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>

        <?php if(Auth::user()->role_id==2): ?>
        <div class="col-md-4 col-lg-4 col-xl-4 col-xxl-4">

          <div class="card custom-card overflow-hidden" style="margin-top:0px">
            <div class="card-body p-1" style="height:212px;">
              <div class="text-success text-right"><a title="View all transactions" href="<?php echo e(url('wallet-history')); ?>"><i class="fas fa-wallet"></i></a></div>
              <table class="table">
                <tr>
                  <th class="text-center">Main Wallet</th>
                </tr>
                <tr>
                  <td class="text-center">
                    <h2>&#8377; <?php echo e(number_format(Auth::user()->wallet)); ?></h2>
                  </td>
                  <!-- <td class="text-center">
                    <h5>&#8377; 22.00</h5>
                  </td> -->
                </tr>
              </table>
            </div>
          </div>
        </div>
        <?php endif; ?>

      </div>
      <div class="row">
        <div class="col-12">&nbsp;</div>
      </div>
      <div class="row">
        <div class="col-5">
          <div class="row">
            <div class="col-12 text-center">
              <div class="card custom-card card-warning overflow-hidden">
                <div class="card-header">
                  <h3 class="card-title">All Panels (Active)</h3>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="row">
                <div class="col-sm-6 col-offset-1 panelcard" style="cursor:pointer" onclick=window.location.href="<?php echo e(url('loan-panel')); ?>">
                  <div class="card custom-card">
                    <div class="card-body">
                      <div class="d-flex flex-wrap align-items-top">
                        <div class="mr-3 panel-icon lh-1">
                          <img src="<?php echo e(asset('dist/img/home_icons/loan.png')); ?>" alt="loan">
                        </div>
                        <hr>
                        <div>
                          <h5 class="mb-1"><img src="<?php echo e(asset('dist/img/home_icons/link.png')); ?>" alt="link"> Loan Panel</h5>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-sm-6 panelcard" style="cursor:pointer" onclick=window.location.href="<?php echo e(url('credit-card')); ?>">
                  <div class="card custom-card">
                    <div class="card-body">
                      <div class="d-flex flex-wrap align-items-top">
                        <div class="mr-3 panel-icon lh-1">
                          <img src="<?php echo e(asset('dist/img/home_icons/credit_card.png')); ?>" alt="Credit Card">
                        </div>
                        <hr>
                        <div>
                          <h5 class="mb-1"><img src="<?php echo e(asset('dist/img/home_icons/link.png')); ?>" alt="link">Credit Card</h5>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-5">

          <div class="row">
            <div class="col-12">
              <div class="row">
                <div class="col-12 text-center">
                  <div class="card custom-card card-success overflow-hidden">
                    <div class="card-header">
                      <h3 class="card-title">Certificates & Authorization</h3>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="row">
                    <div class="col-sm-6 col-offset-1 panelcard" style="cursor:pointer" onclick=window.location.href="<?php echo e(url('loan-panel')); ?>">
                      <div class="card custom-card">
                        <div class="card-body">
                          <div class="d-flex flex-wrap align-items-top">
                            <div class="mr-3 panel-icon lh-1">
                              <img src="<?php echo e(asset('dist/img/home_icons/loan-lenders-certificate.png')); ?>" alt="loan">
                            </div>
                            <hr>
                            <div>
                              <h5 class="mb-1">Loan Lenders Certificate</h5>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-sm-6 panelcard" style="cursor:pointer">
                      <div class="card custom-card">
                        <div class="card-body">
                          <div class="d-flex flex-wrap align-items-top">
                            <div class="mr-3 panel-icon lh-1">
                              <img src="<?php echo e(asset('dist/img/home_icons/loan-lenders-letter.png')); ?>" alt="Credit Card">
                            </div>
                            <hr>
                            <div>
                              <h5 class="mb-1">Lenders Authorization Letter</h5>
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


        </div>


        <div class="col-2">

          <div class="row">
            <div class="col-12">
              <div class="row">
                <div class="col-12 text-center">
                  <div class="card custom-card card-primary overflow-hidden">
                    <div class="card-header">
                      <h3 class="card-title">Promotions</h3>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="row">
                    <div class="col-sm-12 col-offset-1 panelcard" style="cursor:pointer" onclick=window.location.href="<?php echo e(url('notification-panel')); ?>">
                      <div class="card custom-card">
                        <div class="card-body">
                          <div class="d-flex flex-wrap align-items-top">
                            <div class="mr-3 panel-icon lh-1">
                              <img src="<?php echo e(asset('dist/img/home_icons/banners.gif')); ?>" width="64px" alt="loan">
                            </div>
                            <hr>
                            <div>
                              <h5 class="mb-1">Notifications</h5>
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


        </div>


        <!--<div class="col-2">-->
          <!--  <div class="card custom-card card-primary overflow-hidden">-->
            <!--    <div class="card-header">-->
              <!--      <h3 class="card-title">Promotions</h3>-->
              <!--  </div>-->
              <!--  <div class="card-body">-->
                <!--      <div class="row">-->
                  <!--        <div class="col-12 text-center">-->
                    <!--          <a href="/index.php?path=promotion&method=categories#" target="_blank">-->
                      <!--            <img src="<?php echo e(asset('dist/img/home_icons/banners.gif')); ?>" width="64px" alt="hoogmoney"><br>-->
                      <!--            <strong class="text-dark">Banners</strong>-->
                      <!--        </a>-->
                      <!--    </div>-->
                      <!--</div>-->
                      <!--</div>-->
                      <!--</div>-->
                      <!--</div>-->
                    </div>
                  
                    <div class="row">
                      <div class="col-12">&nbsp;</div>
                    </div>
                    <div class="row">
                      <div class="col-12">
                        <div class="card custom-card card-info overflow-hidden">
                          <div class="card-header">
                            <div class="row">
                              <div class="col-8">
                                <h3 class="card-title">Commission & Service Price list</h3>
                              </div>
                              <div class="col-4 text-right">
                                <i class="fas fa-info-circle fa-lg" data-toggle="tooltip" data-html="true" data-placement="bottom" title="<p><strong>Disclaimer:</strong> In Business Loan, Home Loans, and Loan against Property the payout depends on the ticket size.</p><p><strong>Maximum Payout can be in:</strong><br>Business Loan up to 2.5%<br>Home Loan up to 0.70%<br>Loan Against Property up to 1.20%</p>"></i>
                              </div>
                            </div>
                          </div>
                          <div class="card-body">
                            <div class="row">
                              <div class="col-5 col-sm-3">
                                <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
                                  <a class="nav-link active text-dark" id="vert-tabs-loan-tab" data-toggle="pill" href="#vert-tabs-loan" role="tab" aria-controls="vert-tabs-loan" aria-selected="true">
                                    Loan <span class="float-right badge badge-warning">Annexure - LC</span>
                                  </a>
                                  
                                    <a class="nav-link text-dark" id="vert-tabs-micro-tab" data-toggle="pill" href="#vert-tabs-micro" role="tab" aria-controls="vert-tabs-micro" aria-selected="false">
                                      Micro Services <span class="float-right badge badge-warning">Annexure - MC</span>
                                    </a>
                                   
                                  </div>
                                </div>
                                <div class="col-7 col-sm-9">
                                  <div class="tab-content" id="vert-tabs-tabContent">
                                    <div class="tab-pane text-left fade show active" id="vert-tabs-loan" role="tabpanel" aria-labelledby="vert-tabs-loan-tab">
                                      <div class="row" style="max-height:300px;overflow-y:scroll;">
                                        <?php $__currentLoopData = $loan_masters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $master): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="col-sm-6">
                                          <div class="card custom-card card-primary overflow-hidden">
                                            <div class="card-header">
                                              <h3 class="card-title"><?php echo e($master->name ?? ''); ?></h3>
                                            </div>
                                            <?php if(count($master->commission_details)): ?>
                                            <div class="card-body">
                                              <table class="table table-sm">
                                                <tr>
                                                  <th>Bank/NBFC</th>
                                                  <th>Commission up to</th>
                                                </tr>
                                                <?php $__currentLoopData = $master->commission_details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $commission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                  <td><?php echo e($commission->bank_name); ?></td>
                                                  <td><?php echo e($commission->bank_commission); ?>%</td>
                                                </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                              </table>
                                            </div>
                                            <?php endif; ?>
                                          </div>
                                        </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                      </div>
                                    </div>
                                   
                                    
                                    <div class="tab-pane fade" id="vert-tabs-micro" role="tabpanel" aria-labelledby="vert-tabs-micro-tab">
                                      <div class="row" style="max-height:300px;overflow-y:scroll;">
                                        
                                        <div class="col-sm-6">
                                          <div class="card custom-card card-primary overflow-hidden">
                                            <div class="card-header">
                                              <h3 class="card-title">Credit Card</h3>
                                            </div>
                                            <div class="card-body">
                                              <table class="table table-sm">
                                                <tr>
                                                  <th>Bank/NBFC</th>
                                                  <th>Commission up to</th>
                                                </tr>
                                                <?php if(count($credit_master)): ?>
                                                <?php $__currentLoopData = $credit_master; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $crmaster): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                  <td><?php echo e($crmaster->bank_name); ?></td>
                                                  <td>₹<?php echo e($crmaster->bank_commission); ?>/-</td>
                                                </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                              </table>
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
                        </div>
                      </div>
                      <div class="row">
                      <div class="col-12">&nbsp;</div>
                    </div>
                      <div class="row">
                        <div class="col-12" id="loan_list"><div class="card custom-card card-primary">
                          <div class="card-header justify-content-between">
                            <div class="card-title">Loan Leads</div>
                            <a href="?data_show=list" class="btn btn-sm btn-success" style="margin-left: 10px;">View All</a>
                          </div>
                          <div class="card-body p-0">
                            <table class="table table-striped table-sm">
                              <thead>
                                <tr>
                                  <th style="width: 5%">#File No.</th>
                                  <th style="width: 10%">Loan</th>
                                  <th style="width: 5%">Loan Mode</th>
                                  <th style="width: 20%">Applicant Name</th>
                                  <th style="width: 20%">Subscriber</th>
                                  <th style="width: 5%">Phone No.</th>
                                  <th style="width: 10%">Email</th>
                                  <th style="width: 5%">Review.</th>
                                  <th style="width: 10%">Status</th>
                                  <!-- <th style="width: 5%">Action</th> -->
                                </tr>
                              </thead>
                              <tbody>
                                <?php $__currentLoopData = $applications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                  <td><?php echo e($record->id); ?></td>
                                  <td>
                                   <?php echo e($record->loan_name ?? ''); ?> 
                                   <br>Rs <?php echo e($record->requested_amount ?? 0); ?></td>
                                   <td>New</td>
                                   <td><?php echo e($record->first_name ?? ''); ?> <?php echo e($record->middle_name ?? ''); ?> <?php echo e($record->last_name ?? ''); ?><br>
                                    <small><strong>Applied On</strong> <?php echo e($record->created_at->format('d/m/Y')); ?></small><br>
                                    <small><strong>First Document Upload</strong> 13/10/2023</small><br>
                                    <small><strong>Last Document Upload</strong> 13/10/2023</small>
                                  </td>
                                  <td>
                                    <?php if(Auth::user()->id==$record->agent_id): ?>
                                    <?php echo e(Auth::user()->first_name." ".Auth::user()->last_name); ?>

                                    <?php else: ?>
                                    <?php echo e($record->agent_first." ".$record->agent_last); ?>

                                    <?php endif; ?>
                                  </td>


                                  <td><?php echo e($record->mobile_number ?? ''); ?></td>
                                  <td><?php echo e($record->email ?? ''); ?></td>
                                  <td><?php echo e($record->review ?? '-'); ?></td>
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

                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                              </tbody>
                            </table>
                          </div>
                        </div></div>
                      </div>
                    </div>
                  </section>

                  <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xampp1\htdocs\loan-project\resources\views/home.blade.php ENDPATH**/ ?>