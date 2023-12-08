<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
  <!-- Fav Icon  -->
  <link rel="shortcut icon" href="<?php echo e(asset ('images/logonew.png')); ?>">
  <!-- Page Title  -->

  <!-- StyleSheets  -->
  <link rel="stylesheet" href="<?php echo e(asset('assets/css/dashlite.css')); ?>">
  <link id="skin-default" rel="stylesheet" href="<?php echo e(asset('assets/css/theme.css?ver=2.7.0')); ?>">
  <title>MKGRAMEENA | Loan Dashboard | Admin</title>

  <!-- Img icon -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> -->

  <!-- flash -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/additional-methods.min.js"></script>
  <script src="<?php echo e(asset('assets/js/bundle.js?ver=2.7.0')); ?>"></script>

  <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-app.js"></script>
  <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-database.js"></script>
  <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-messaging.js"></script>




  <!-- end -->

</head>
<style type="text/css">
@import url('https://fonts.googleapis.com/css2?family=Outfit&display=swap');
  #toast-container>div{
    width: 277px !important;
    position: absolute;
    bottom: 0 !important;
    right: 0 !important;
  }
  #toast-container{
    position: absolute;
    bottom: 0 !important;
    right: 0 !important;
  }
</style>
<body class="nk-body bg-lighter npc-default has-sidebar ">
  <div class="nk-app-root">
    <div class="nk-main ">
      <?php echo $__env->make('admin-layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <!-- wrap @s -->
      <div class="nk-wrap ">
        <?php echo $__env->make('admin-layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="nk-content ">
          <div class="container-fluid">
            <div class="nk-content-inner">
              <div class="nk-content-body">
               <?php echo $__env->yieldContent('content'); ?>
             </div>
           </div>
         </div>
       </div>                
       <?php echo $__env->make('admin-layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
     </div>
   </div>
 </div>
 <script src="<?php echo e(asset('assets/js/scripts.js?ver=2.7.0')); ?>"></script>
 <script src="<?php echo e(asset('js/app.js')); ?>"></script>
 <script src="<?php echo e(asset('assets/js/jquery-ui.min.js')); ?>"></script>

 <script src="<?php echo e(asset ('assets/js/libs/datatable-btns.js?ver=3.1.1')); ?>"></script>
 <!-- <script src="<?php echo e(asset ('assets/js/charts/gd-default.js?ver=2.7.0')); ?>"></script> -->
 <script type="text/javascript">
  $.fn.select2.defaults.set( "theme", "bootstrap" );

  <?php if(Session::has('message')): ?>
  var type = "<?php echo e(Session::get('alert-type', 'info')); ?>";
  switch(type){
    case 'info':
    toastr.info("<?php echo e(Session::get('message')); ?>");
    break;

    case 'warning':
    toastr.warning("<?php echo e(Session::get('message')); ?>");
    break;

    case 'success':
    toastr.success("<?php echo e(Session::get('message')); ?>");
    break;

    case 'error':
    toastr.error("<?php echo e(Session::get('message')); ?>");
    break;
  }
  <?php endif; ?>
</script>
<script type="text/javascript">
  function show1()
  {
    $(".icon-hide").show();
    $(".icon-show").hide();
    $("#password").attr('type','text');
  }
  function hide1(){
    $(".icon-hide").hide();
    $(".icon-show").show();
    $("#password").attr('type','password');
  }
</script>
</body>
</html>
<?php /**PATH F:\xampp1\htdocs\loan-project\resources\views/admin-layouts/app.blade.php ENDPATH**/ ?>