<!-- sidebar @s -->
            <div class="nk-sidebar nk-sidebar-fixed is-light " data-content="sidebarMenu">
                <div class="nk-sidebar-element nk-sidebar-head">
                    <div class="nk-sidebar-brand">
                        <a style="display: flex;" class="logo-link nk-sidebar-logo">
                           <!--  <img class="logo-light logo-img" src="<?php echo e(asset('assets/images/logo/Icon-COLOR.png')); ?>" alt="logo">
                            <img class="logo-dark logo-img" src="<?php echo e(asset('assets/images/logo/Icon-COLOR.png')); ?>" alt="logo-dark">
                            <img class="logo-small logo-img logo-img-small" src="<?php echo e(asset('assets/images/logo/Icon-COLOR.png')); ?>"  alt="logo-small"> -->
                            <h4>MKGRAMEENA</h4>
                        </a>
                    </div>
                    <div class="nk-menu-trigger me-n2">
                        <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu"><em class="icon ni ni-arrow-left"></em></a>
                        <a href="#" class="nk-nav-compact nk-quick-nav-icon d-none d-xl-inline-flex" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
                    </div>
                </div><!-- .nk-sidebar-element -->
                <div class="nk-sidebar-element">
                    <div class="nk-sidebar-content">
                        <div class="nk-sidebar-menu" data-simplebar>
                            <ul class="nk-menu">
                                
                                <li class="nk-menu-heading">  
                                    <a href="javascript:void(0)" class="nk-menu-link"><span class="nk-menu-text"><h6 class="overline-title text-primary-alt">Dashboard</h6></span></a>
                                </li><!-- .nk-menu-heading -->
                                
                                <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon"><em class="icon ni ni-users"></em></span>
                                        <span class="nk-menu-text">User Management</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                        <li class="nk-menu-item">
                                            <a href="<?php echo e(url('dsa')); ?>" class="nk-menu-link"><span class="nk-menu-text">All DSA</span></a>
                                        </li>
                                        
                                        <li class="nk-menu-item">
                                            <a href="<?php echo e(url('sub-dsa')); ?>" class="nk-menu-link"><span class="nk-menu-text">All Sub-DSA</span></a>
                                        </li>
                                        
                                    </ul><!-- .nk-menu-sub -->
                                </li><!-- .nk-menu-item -->
                                
                                <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon"><em class="icon ni ni-file"></em></span>
                                        <span class="nk-menu-text">Loan Master</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                        <li class="nk-menu-item">
                                            <a href="<?php echo e(url('loan-types')); ?>" class="nk-menu-link"><span class="nk-menu-text">Loan Types</span></a>
                                        </li>
                                        
                                        <li class="nk-menu-item">
                                            <a href="<?php echo e(url('loan-documents')); ?>" class="nk-menu-link"><span class="nk-menu-text">Documents</span></a>
                                        </li>
                                        
                                    </ul><!-- .nk-menu-sub -->
                                </li><!-- .nk-menu-item -->
                                
                                 <li class="nk-menu-item">
                                    <a href="<?php echo e(url('loan-applications')); ?>" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-file"></em></span>
                                        <span class="nk-menu-text">Loan Applications</span>
                                    </a>
                                   
                                </li><!-- .nk-menu-item -->


                                 <li class="nk-menu-item">
                                    <a href="<?php echo e(url('credit-card-leads')); ?>" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-cc-alt"></em></span>
                                        <span class="nk-menu-text">Credit Card Leads</span>
                                    </a>
                                   
                                </li><!-- .nk-menu-item -->
                                
                                <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon"><em class="icon ni ni-building"></em></span>
                                        <span class="nk-menu-text">Bank Commission Master</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                        <li class="nk-menu-item">
                                            <a href="<?php echo e(url('bank-commissions')); ?>" class="nk-menu-link"><span class="nk-menu-text">Loan Bank Commissions</span></a>
                                        </li>
                                        
                                        <li class="nk-menu-item">
                                            <a href="<?php echo e(url('credit-card-commissions')); ?>" class="nk-menu-link"><span class="nk-menu-text">Credit Card Bank Commissions</span></a>
                                        </li>
                                        
                                    </ul><!-- .nk-menu-sub -->
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-item">
                                    <a href="<?php echo e(url('wallet-requests')); ?>" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-wallet"></em></span>
                                        <span class="nk-menu-text">Wallet Requests</span>
                                    </a>
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-item">
                                    <a href="<?php echo e(url('notifications')); ?>" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-bell"></em></span>
                                        <span class="nk-menu-text">Notifications</span>

                                    </a>
                                </li><!-- .nk-menu-item -->
                            </ul><!-- .nk-menu -->
                        </div><!-- .nk-sidebar-menu -->
                    </div><!-- .nk-sidebar-content -->
                </div><!-- .nk-sidebar-element -->
            </div>
            <!-- sidebar @e --><?php /**PATH F:\xampp1\htdocs\loan-project\resources\views/admin-layouts/sidebar.blade.php ENDPATH**/ ?>