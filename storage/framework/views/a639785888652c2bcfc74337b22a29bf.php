<header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
        <a href="<?php echo e(route('dashboard')); ?>" class="logo d-flex align-items-center">
            <img src="<?php echo e(asset('img/logo-elnusa-1.png')); ?>">
            <span class="d-none d-lg-block">elnusa</span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">

            <li class="nav-item dropdown pe-3">

                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                    <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo e(Auth::user()->name); ?></span>
                </a><!-- End Profile Iamge Icon -->

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                    <li class="dropdown-header">
                        <h6><?php echo e(Auth::user()->name); ?></h6>
                        <span>
                            <?php $__currentLoopData = Auth::user()->roles_label; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php echo e($role); ?>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </span>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <form method="POST" action="<?php echo e(route('logout')); ?>">
                            <?php echo csrf_field(); ?>

                            <button type="submit" class="dropdown-item d-flex align-items-center">
                                <i class="bi bi-box-arrow-right"
                                    onclick="event.preventDefault();
                                                    this.closest('form').submit();"></i>
                                <span>Sign Out</span>
                            </button>
                        </form>

                    </li>

                </ul><!-- End Profile Dropdown Items -->
            </li><!-- End Profile Nav -->

        </ul>
    </nav><!-- End Icons Navigation -->

</header>
<?php /**PATH C:\laragon\www\elnusa-inventory\resources\views/layouts/template/navbar.blade.php ENDPATH**/ ?>