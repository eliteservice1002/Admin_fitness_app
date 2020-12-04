<?php $__env->startSection('content'); ?>
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">Προσθήκη Νέας Κατηγορίας</h1>
            </div>
        </div>
    </div>
    <!-- END Hero -->

    <!-- Page Content -->
    <div class="content">
        <!-- Your Block -->
        <div class="block block-rounded block-bordered">
            <div class="block-header block-header-default">
                <h3 class="block-title">Προσθήκη Νέας Κατηγορίας</h3>
                <div class="block-options">
                    <div class="pull-right">
                        <a class="btn btn-primary" href="<?php echo e(route('foodcategories.index')); ?>"> Πίσω</a>
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
                <form action="<?php echo e(route('foodcategories.store')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="row justify-content-center">
                        <div class="col-xs-8 col-sm-8 col-md-8">
                            <div class="form-group row">
                                <label for="name" class="col-sm-2">Όνομα:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Πληκτρολογήστε το όνομα της κατηγορίας...">
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-8 col-sm-8 col-md-8">
                            <div class="form-group row">
                                <div class="col-sm-10 ml-auto">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-fw fa-check"></i> Αποθήκευση
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

<?php echo $__env->make('layouts.backend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\Admin_fitness_app\resources\views/foodcategories/create.blade.php ENDPATH**/ ?>