<div class="nk-header nk-header-fixed is-light">
    <div class="container-fluid">
        <div class="nk-header-wrap">
            <div class="nk-menu-trigger d-xl-none ms-n1">
                <a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
            </div>
            <div class="nk-header-brand d-xl-none">
                <a href="<?php echo e(url('home')); ?>" class="logo-link">
                    <!-- <img class="logo-light logo-img" src="./images/logo.png" srcset="./images/logo2x.png 2x" alt="logo">
                    <img class="logo-dark logo-img" src="./images/logo-dark.png" srcset="./images/logo-dark2x.png 2x" alt="logo-dark"> -->
                </a>
            </div><!-- .nk-header-brand -->
            <!-- <div class="nk-header-search ms-3 ms-xl-0">
                <em class="icon ni ni-search"></em>
                <input type="text" class="form-control border-transparent form-focus-none" placeholder="Search anything">
            </div> --><!-- .nk-header-news -->
            <div class="nk-header-tools">
                <ul class="nk-quick-nav">
                    <li class="dropdown user-dropdown">
                        <a href="#" class="dropdown-toggle me-n1" data-bs-toggle="dropdown">
                            <div class="user-toggle">
                                <div class="user-avatar sm">
                                    <em class="icon ni ni-user-alt"></em>
                                </div>
                                <div class="user-info d-none d-xl-block">
                                    <div class="user-status user-status-unverified">Welcome</div>
                                    <div class="user-name dropdown-indicator"><?php echo e(Auth::user()->first_name); ?></div>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-end">
                            <div class="dropdown-inner user-card-wrap bg-lighter d-none d-md-block">
                                <div class="user-card">
                                    <div class="user-avatar">
                                        <span>
                                        <em class="icon ni ni-user-alt"></em>                  
                                        </span>
                                    </div>
                                    <div class="user-info">
                                        <span class="lead-text"><?php echo e(Auth::user()->first_name); ?></span>
                                        <span class="sub-text"><?php echo e(Auth::user()->email); ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="dropdown-inner">
                                <ul class="link-list">
                                    <li><a href="<?php echo e(url('change-password')); ?>"><em class="icon ni ni-setting-alt"></em><span>Change Password</span></a></li>
                                    <!-- <li><a href="<?php echo e(config('app.baseURL')); ?>/changepassword/<?php echo e(Auth::user()->id); ?>"><em class="icon ni ni-setting-alt"></em><span>Change Password</span></a></li> -->
                                </ul>
                            </div>
                           
                            <div class="dropdown-inner">
                                <ul class="link-list">
                                    <li>
                                        <a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><em class="icon ni ni-signout"></em><span>Sign out</span>
                                        </a>
                                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                            <!-- <?php echo e(csrf_field()); ?> -->
                                            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>"/>
                                        </form>                                        
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div><!-- .nk-header-wrap -->
    </div><!-- .container-fliud -->
</div><?php /**PATH F:\xampp1\htdocs\loan-project\resources\views/admin-layouts/header.blade.php ENDPATH**/ ?>