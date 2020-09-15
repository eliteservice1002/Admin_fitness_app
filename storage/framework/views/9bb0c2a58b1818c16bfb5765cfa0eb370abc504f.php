<?php $__env->startSection('content'); ?>
<!-- Hero -->
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">Dashboard</h1>
            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">App</li>
                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<!-- END Hero -->

<!-- Page Content -->
<div class="content">
    <div class="row justify-content-center">
        <div class="col-md-6 col-xl-5">
            <div class="block block-rounded block-bordered">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Welcome to Food <span class="text-primary">management</span> dashboard</h3>
                </div>
                <div class="block-content">
                    <p>
                        You can <span class="text-success">Add</span>, <span class="text-warning">Delete</span>, and <span class="text-info">Update</span> Food and Recipe items.
                    </p>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- END Page Content -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.backend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\Fitness\resources\views/dashboard.blade.php ENDPATH**/ ?>