<?php $__env->startSection('content'); ?>
<!-- Hero -->
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">Επεξεργασία Αθλημάτων</h1>
        </div>
    </div>
</div>
<!-- END Hero -->

<!-- Page Content -->
<div class="content">
    <!-- Your Block -->
    <div class="block block-rounded block-bordered">
        <div class="block-header block-header-default">
            <h3 class="block-title">Επεξεργασία Αθλημάτων</h3>
            <div class="block-options">
                <div class="pull-right">
                    <a class="btn btn-primary" href="<?php echo e(route('sports.index')); ?>"> Πίσω</a>
                </div>
            </div>
        </div>
        <div class="block-content">
            <?php if($errors->any()): ?>
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
            <?php endif; ?>
            <form action="<?php echo e(route('sports.update',$sport->id)); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <div class="row justify-content-center">
                    <div class="col-xs-8 col-sm-8 col-md-8">
                        <div class="form-group row">
                            <label for="name" class="col-sm-2">Όνομα Αθλήματος:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name" name="name" value="<?php echo e($sport->name); ?>" placeholder="Enter Sport Name...">
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-8 col-sm-8 col-md-8">
                        <div class="form-group row">
                            <label for="coefficient" class="col-sm-2">Συντελεστής:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="coefficient" name="coefficient" value="<?php echo e($sport->coefficient); ?>" placeholder="Enter Sport Coefficient...">
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-8 col-sm-8 col-md-8">
                        <div class="form-group row">
                            <div class="col-sm-10 ml-auto">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-fw fa-check"></i> Εκσυγχρονίζω
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- END Your Block -->
</div>
<!-- END Page Content -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.backend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\Admin_fitness_app\resources\views/sports/edit.blade.php ENDPATH**/ ?>