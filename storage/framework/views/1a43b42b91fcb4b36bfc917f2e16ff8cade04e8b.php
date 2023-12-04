
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>MKGRAMEENA | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo e(asset('plugins/fontawesome-free/css/all.min.css')); ?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo e(asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')); ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo e(asset('dist/css/adminlte.min.css')); ?>">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo e(asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')); ?>">
  <!-- summernote -->
  <link rel="stylesheet" href="<?php echo e(asset('plugins/summernote/summernote-bs4.min.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('dist/css/jquery.countdown.css')); ?>">
  <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo e(asset('dist/css/custom.css?v=8')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('plugins/toastr/toastr.min.css')); ?>"><link rel="stylesheet" href="<?php echo e(asset('plugins/dropzone/min/dropzone.min.css')); ?>"><link rel="stylesheet" href="<?php echo e(asset('plugins/select2/css/select2.min.css')); ?>"><link rel="stylesheet" href="<?php echo e(asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.css')); ?>">  <!-- jQuery -->
  <script src="<?php echo e(asset('plugins/jquery/jquery.min.js')); ?>"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="<?php echo e(asset('plugins/jquery-ui/jquery-ui.min.js')); ?>"></script>
  <script src="<?php echo e(asset('plugins/chart.js/Chart.js')); ?>"></script>
  <script src="https://www.gstatic.com/firebasejs/8.4.2/firebase-app.js"></script>
  <script src="https://www.gstatic.com/firebasejs/7.16.1/firebase-messaging.js"></script>
<style type="text/css">
  .headingHead{
              letter-spacing: 18px;
              font-size: 40px;
              font-weight: bold;
              color: #007bff;
  }
  .headingP{
    letter-spacing: 13px;
  }

  @media(max-width: 600px){
    .headingHead{
              letter-spacing: 12px;
              font-size: 20px;
              font-weight: bold;
  }
  .headingP{
    letter-spacing: 6px;
  }    
  }
</style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
    <div class="preloader flex-column justify-content-center align-items-center">
      <img src="<?php echo e(asset('dist/img/loading-buffering.gif')); ?>" alt="Loading" height="500" width="600">
    </div>
    <div class="content-wrapper" style="min-height:59.406px;margin-left:auto;">
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-4">
              <!--Home ver:2-->
              <!--<i class="fa fa-chevron-left"></i> Back-->
            </div>
            <div class="col-sm-4 text-center" style="cursor: pointer;" onclick=window.location.href='<?php echo e(url("home")); ?>'>
              <!--<img src="<?php echo e(asset('dist/img/logo.jpeg')); ?>" height="150px" alt="">-->
              <h4 class="mb-0 headingHead">MKGRAMEENA</h4>
              <p class="headingP" >Your financial bridge</p>
            </div>
            <div class="col-sm-4 text-right">
              <a data-target="grid-drop" class="text-dark" href="javascript:void(0)" id="grid-icon" role="button">
                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="grid" role="img" style="width:14px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="svg-inline--fa fa-grid fa-lg">
                  <path fill="currentColor" d="M0 72C0 49.9 17.9 32 40 32H88c22.1 0 40 17.9 40 40v48c0 22.1-17.9 40-40 40H40c-22.1 0-40-17.9-40-40V72zM0 232c0-22.1 17.9-40 40-40H88c22.1 0 40 17.9 40 40v48c0 22.1-17.9 40-40 40H40c-22.1 0-40-17.9-40-40V232zM128 392v48c0 22.1-17.9 40-40 40H40c-22.1 0-40-17.9-40-40V392c0-22.1 17.9-40 40-40H88c22.1 0 40 17.9 40 40zM160 72c0-22.1 17.9-40 40-40h48c22.1 0 40 17.9 40 40v48c0 22.1-17.9 40-40 40H200c-22.1 0-40-17.9-40-40V72zM288 232v48c0 22.1-17.9 40-40 40H200c-22.1 0-40-17.9-40-40V232c0-22.1 17.9-40 40-40h48c22.1 0 40 17.9 40 40zM160 392c0-22.1 17.9-40 40-40h48c22.1 0 40 17.9 40 40v48c0 22.1-17.9 40-40 40H200c-22.1 0-40-17.9-40-40V392zM448 72v48c0 22.1-17.9 40-40 40H360c-22.1 0-40-17.9-40-40V72c0-22.1 17.9-40 40-40h48c22.1 0 40 17.9 40 40zM320 232c0-22.1 17.9-40 40-40h48c22.1 0 40 17.9 40 40v48c0 22.1-17.9 40-40 40H360c-22.1 0-40-17.9-40-40V232zM448 392v48c0 22.1-17.9 40-40 40H360c-22.1 0-40-17.9-40-40V392c0-22.1 17.9-40 40-40h48c22.1 0 40 17.9 40 40z" class=""></path>
                </svg>
              </a> &nbsp; &nbsp;
              <div class="grid-drop" style="display:none">
                <div class="card custom-card overflow-hidden">
                  <div class="card-body" style="background-color:#fff8e8;">
                    <div class="row gap-3 gap-sm-0">
                      <div class="col-12 text-center">
                        <div class="featured-nft-img">
                          <img style="max-width:100%;" src="<?php echo e(url('storage/app')); ?>/<?php echo e(Auth::user()->profile); ?>" alt="">
                        </div>
                        <span class="featured-nft-text"><?php echo e(Auth::user()->first_name); ?>  <?php echo e(Auth::user()->middle_name); ?>  <?php echo e(Auth::user()->last_name); ?> </span>
                      </div>
                      <div class="col-12">
                        <div class="row">
                          <div class="col-sm-4 text-center">
                            <small><strong>ID :</strong> <?php echo e(10000+Auth::user()->id); ?></small>
                          </div>
                          <div class="col-sm-4 text-center">
                            <small>-</small>
                          </div>
                          <div class="col-sm-4 text-center">
                            <small><strong>PPI: </strong>
                              <?php if(Auth::user()->is_active ==1): ?>
                              <strong class="text-success">Active</strong>
                              <?php else: ?>
                              <strong class="text-danger">Inactive</strong>
                              <?php endif; ?>
                              <a title="PPI Settings" href="javascript:void(0)" role="button"> <i class="fas fa-cog"></i></a></small>
                            </div>
                          </div>
                        </div>
                        <div class="col-12">
                          <hr>
                          <div class="row">
                            <div class="col-4 text-center">
                              <a href="javascript:void(0)" class="text-dark">
                                <img src="<?php echo e(asset('dist/img/home_icons/calculator.png')); ?>" class="grid-img" alt="Emi Calculator"><br>
                                <small>EMI Calculator <i class="fa-solid fa-arrow-up-right-from-square"></i></small>
                              </a>
                            </div>
                            <div class="col-4 text-center">
                              <a href="javascript:void(0)" class="text-dark">
                                <img src="<?php echo e(asset('dist/img/home_icons/teamviewer.png')); ?>" class="grid-img" alt="TeamViewer"><br>
                                <small>TeamViewer <i class="fa-solid fa-arrow-up-right-from-square"></i></small>
                              </a>
                            </div>
                            <div class="col-4 text-center">
                              <a href="javascript:void(0)" class="text-dark">
                                <img src="<?php echo e(asset('dist/img/home_icons/computer.png')); ?>" class="grid-img" alt="Any Desk"><br>
                                <small>Anydesk <i class="fa-solid fa-arrow-up-right-from-square"></i></small>
                              </a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <a data-widget="fullscreen" class="text-dark" href="#" role="button">
                  <i class="fas fa-expand-arrows-alt"></i>
                </a> &nbsp; &nbsp;
                <a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="text-dark" role="button">
                  <i class="fas fa-sign-out-alt"></i>
                </a>
                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                  <!-- <?php echo e(csrf_field()); ?> -->
                  <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>"/>
                </form>  

              </div>
            </div>
          </div>
        </div>

        <?php echo $__env->yieldContent('content'); ?>

      </div>

      <!-- common popups -->

      <!-- common popups end -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
      </aside>
      <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo e(asset('plugins/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
    <!-- ChartJS -->
    <script src="<?php echo e(asset('plugins/chart.js/Chart.min.js')); ?>"></script>
    <!-- Sparkline -->
    <script src="<?php echo e(asset('plugins/sparklines/sparkline.js')); ?>"></script>
    <!-- jQuery Knob Chart -->
    <script src="<?php echo e(asset('plugins/jquery-knob/jquery.knob.min.js')); ?>"></script>
    <!-- Summernote -->
    <script src="<?php echo e(asset('plugins/summernote/summernote-bs4.min.js')); ?>"></script>
    <!-- overlayScrollbars -->
    <script src="<?php echo e(asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')); ?>"></script>
    <script src="<?php echo e(asset('dist/js/adminlte.js')); ?>"></script>
    <script src="<?php echo e(asset('dist/js/jquery.countdown.js')); ?>"></script>
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
    <script src="<?php echo e(asset('dist/js/common.js')); ?>"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <!--  -->
    <script src="<?php echo e(asset('plugins/toastr/toastr.min.js?v=14')); ?>"></script>
    <script src="<?php echo e(asset('plugins/select2/js/select2.min.js?v=14')); ?>"></script>
    <script src="<?php echo e(asset('dist/js/switch.action.js?v=14')); ?>"></script>
    <script src="<?php echo e(asset('dist/js/hm.document.upload.js?v=14')); ?>"></script>
    <script src="<?php echo e(asset('plugins/dropzone/min/dropzone.min.js?v=14')); ?>"></script>
    <script src="<?php echo e(asset('plugins/moment/moment.min.js?v=14')); ?>"></script>
    <script src="<?php echo e(asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.js?v=14')); ?>"></script>
    <script>
     $(document).ready(function(){
      $(".preloader").hide();

      $("#grid-icon").click(function() {
        $(".grid-drop").toggle();
      });

    });
  </script>
</body>
</html><?php /**PATH F:\xampp1\htdocs\loan-project\resources\views/layouts/app.blade.php ENDPATH**/ ?>