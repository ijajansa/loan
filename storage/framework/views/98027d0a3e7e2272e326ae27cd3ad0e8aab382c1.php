
<?php $__env->startSection('content'); ?>
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Credit Card</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>">Home</a></li>
            <li class="breadcrumb-item active">Lead View</li>
          </ol>
        </div>
      </div>
    </div>
  </section>
  <section class="content">
    <div class="card">
      <div class="card-header">
        <div class="row">
						<div class="col-10">
              <h3 class="card-title">Lead #<?php echo e(5000+$data->id); ?></h3>
						</div>
						<div class="col-2">
													</div>
					</div>
        </div>
      </div>
      <div class="card-body p-0">
      
        <div class="row" id="profilehead">
          <div class="col-md-12">
            <div class="card-deck">
              <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                  <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle" src="<?php echo e(asset('dist/img/no-image.png')); ?>" alt="User profile picture">
                  </div>
                  <h3 class="profile-username text-center"><?php echo e($data->first_name); ?> <?php echo e($data->last_name); ?></h3>
                  <p class="text-center">
                    <span class="text-muted"><?php echo e($data->gender ?? ''); ?></span><br>
                    <span class="text-muted"><?php echo e(date('d-m-Y',strtotime($data->dob)) ?? '-'); ?></span><br>
                    <span class="text-muted"><i class="fas fa-envelope"></i> <?php echo e($data->email); ?></span><br>
                    <span class="text-muted"><i class="fas fa-mobile-alt"></i> <?php echo e($data->mobile_number); ?></span>
                  </p>
                </div>
              </div>
              <div class="card card-primary card-outline">
                <div class="card-body">
                  <strong>PAN : </strong><p class="text-muted"><?php echo e($data->pan_number); ?></p>
                  <hr>
                  <strong>Employment Type: </strong><p class="text-muted"><?php echo e($data->employment_type); ?></p>
                  <hr>
                  <strong>Monthly Salary : </strong><p class="text-muted">Rs. <?php echo e(number_format($data->income_salary)); ?></p>
                </div>
              </div>
              <div class="card card-primary card-outline">
                <div class="card-body">
                  <i class="fas fa-home"></i> <strong>Pin Code : </strong>
                  <table class="table">
                    <tr>
                      <th>Current</th>
                      <th>Office</th>
                      <th>Permanent</th>
                    </tr>
                    <tr>
                      <th class="text-muted"><?php echo e($data->current_pincode); ?></th>
                      <th class="text-muted"><?php echo e($data->office_pincode); ?></th>
                      <th class="text-muted"><?php echo e($data->permanent_pincode); ?></th>
                    </tr>
                  </table>
                  <hr>
                  <strong>Have Credit Card: </strong><p class="text-muted">
                    <?php echo e($data->existing_card == 0 ? 'No' : 'Yes'); ?>

                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">&nbsp;</div>
        </div>
        <div class="row">
						<div class="col-md-12">
							<div class="card card-primary">
								<div class="card-header">
                  <div class="row">
                    <div class="col-sm-6"><h3 class="card-title">Documents Check List</h3></div>
                    <div class="col-sm-6 text-right">
                                          </div>
                  </div>
								</div>
								<div class="card-body">
									<div class="row main-docs">
                                          <h3>Document list will display here, if required any</h3>
                    						      </div>
								</div>
							</div>
						</div>
					</div>
        </div>
        <!-- <div class="row">
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Other Documents</h3>
              </div>
              <div class="card-body">
                <div class="row main-docs" id="other_document_container">
                                                                        </div>
                <div class="row">
                  <div class="col-md-3">
                    <br><br><br>
                    <div class="form-group required">
                      <div class="custom-file" id="other_document_button">
                        <button type="submit" data-pid="other_document" data-toggle="modal" data-target="#other_document_modal" data-doctype="Other Document" class="btn btn-success col start doc-link">
                          <i class="fas fa-upload"></i>
                          <span>Upload More Document</span>
                        </button>
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
            <div class="card-deck">
                            <div class="card card-primary">
                <div class="card-body text-center">
                                      <form id="review-form" method="post" class="row">
                      <div class="col-md-12 text-center">
                          <img src="/dist/img/review-this.gif" style="width:100%" alt="Review This Lead">
                          <input type="hidden" id="lead_id" name="file_id" value="3035">
                          <div id="emoji-Box" style="padding:10px">
                            <input type="radio" class="d-none rev" name="review" id="review1" value="1">
                            <label for="review1">
                              <img src="/dist/img/emojis/1.png" class="imgbgchk" style="width:32px" title="Very Bad" alt="Very Bad">
                            </label>

                            <input type="radio" class="d-none rev" name="review" id="review2" value="2">
                            <label for="review2">
                              <img src="/dist/img/emojis/2.png" class="imgbgchk" style="width:32px" title="Moderate" alt="Moderate">
                            </label>

                            <input type="radio" class="d-none rev" name="review" id="review3" value="3">
                            <label for="review3">
                              <img src="/dist/img/emojis/3.png" class="imgbgchk" style="width:32px" title="Average" alt="Average">
                            </label>

                            <input type="radio" class="d-none rev" name="review" id="review4" value="4">
                            <label for="review4">
                              <img src="/dist/img/emojis/4.png" class="imgbgchk" style="width:32px" title="Happy" alt="Happy">
                            </label>

                            <input type="radio" class="d-none rev" name="review" id="review5" value="5">
                            <label for="review5">
                              <img src="/dist/img/emojis/5.png" class="imgbgchk" style="width:32px" title="Awesome" alt="Awesome">
                            </label>
                          </div>
                          <label for="" class="form-lable" style="display:block;background-color:#f2f2f2;" id="selected-review"></label>
                          <textarea class="form-control" name="comment" id="reviewCommentBox" rows="3" placeholder="Comment" autocomplete="off"></textarea>
                      </div>
                      <div class="col-md-12">&nbsp;</div>
                      <div class="col-md-12">
                        <button type="submit" class="btn btn-primary float-right" id="add-review">Submit Review</button>
                      </div>
                    </form>
                                  </div>
              </div>
            </div>
          </div>   
        </div> -->
        <div class="row">
          <div class="col-md-12">&nbsp;</div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="timeline" id="comment_container">
              <!-- comments Start -->
            
              <!-- comments Start -->
            </div>
          </div>
        </div>
        
        <div class="row">
          <div class="col-sm-6">
            <div class="form-group">
            <button type="submit" data-toggle="modal" data-target="#comment_status" class="btn btn-success col start doc-link">
            <span>Add Comment</span> <i class="fas fa-comment-alt"></i>
            </button>
            </div>
          </div>
        </div>


      </div>
    </div>
  </section>
</div>

  <div class="modal fade" id="new_document_modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="otherDocumentLable">Other Document</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="new_document_form" action="/index.php?path=document&method=upload" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <input type="text" class="form-control" id="document_name" name="document_name" placeholder="Enter Document name" value=""/>
              <input type="hidden" class="form-control" id="fid" name="document_fid" value="3035"/>
              <input type="hidden" class="form-control" id="pid" name="document_pid" value=""/>
              <input type="hidden" class="form-control" id="type" name="type" value="files"/>
              <input type="hidden" class="form-control" id="as" name="uploaded_as" value="0"/>
              <input type="file" accept="application/pdf,image/jpg,image/jpeg,image/png" name="image" />
              <input type="text" class="form-control" id="password" name="password" placeholder="Password if any" value=""/> 
              <input type="submit" class="btn btn-primary upload-btn" value="Upload">
              <span class="file-error" id="other_document_error"></span>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

<div class="modal fade" id="comment_status" tabindex="-1" role="dialog" aria-labelledby="status" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="status">Comment and Update lead status</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="comment_form" action="/index.php?path=lead&method=comment" method="post" enctype="multipart/form-data">
                        <div class="form-group">
              <label for="InputComment">Comment</label>
              <input type="hidden" name="file_id" value="3035">
              <textarea name="comment" class="form-control" id="InputComment" rows="3" autocomplete="off"></textarea>
            </div>
            <div class="form-group">
              <input type="submit" class="btn btn-primary upload-btn form-control" value="Post">
              <span class="file-error" id="CommentError"></span>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </section>
  <!-- /.content -->
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xampp1\htdocs\loan-project\resources\views/front/view-credit-card.blade.php ENDPATH**/ ?>