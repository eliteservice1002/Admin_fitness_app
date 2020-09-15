<?php $__env->startSection('content'); ?>
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">Recipe</h1>
            </div>
        </div>
    </div>
    <!-- END Hero -->
    <!-- Page Content -->
    <div class="content">
        <!-- Your Block -->
        <div class="block block-rounded block-bordered">
            <div class="block-header block-header-default">
                <h3 class="block-title">Recipe List</h3>
                <div class="block-options">
                    <div class="pull-right">
                        <a class="btn btn-primary" href="<?php echo e(route('recipes.create')); ?>" data-toggle="tooltip" title="Create">
                            <i class="fa fa-plus"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="block-content">
                <?php if($message = Session::get('success')): ?>
                    <div class="alert alert-success">
                        <p style="margin-bottom:0;"><?php echo e($message); ?></p>
                    </div>
                <?php endif; ?>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-vcenter">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 10%;">No</th>
                                <th class="d-none d-sm-table-cell" style="width: 10%;">Image</th>
                                <th class="d-none d-sm-table-cell" style="width: 20%;">Title</th>
                                <th class="d-none d-sm-table-cell" style="width: 20%;">Category</th>
                                <th class="d-none d-sm-table-cell" style="width: 20%;">Description</th>
                                <th class="d-none d-md-table-cell text-center" style="width: 20%;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $recipes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recipe): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td class="text-center"><?php echo e(++$i); ?></td>
                                <td class="d-none d-sm-table-cell">
                                    <img src="data:image/png;base64, <?php echo e($recipe->image); ?>" width="100" height="100" alt="Recipe" />
                                </td>
                                <td class="d-none d-sm-table-cell"><?php echo e($recipe->title); ?></td>
                                <td class="d-none d-sm-table-cell"><?php echo e($recipe->category->name); ?></td>
                                <td class="d-none d-sm-table-cell"><?php echo $recipe->description; ?></td>
                                <td class="text-center">
                                    <form action="<?php echo e(route('recipes.destroy',$recipe->id)); ?>" method="POST">
                                        <div class="btn-group">
                                            <a class="btn btn-success" href="<?php echo e(route('recipes.show',$recipe->id)); ?>" data-toggle="tooltip" title="Show">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a class="btn btn-primary" href="<?php echo e(route('recipes.edit',$recipe->id)); ?>"  data-toggle="tooltip" title="Edit">
                                                <i class="fa fa-pencil-alt"></i>
                                            </a>
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>

                                            <button type="submit" class="btn btn-danger" data-toggle="tooltip" title="Delete">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    <div class="text-center"><?php echo $recipes->links(); ?></div>
                </div>
            </div>
        </div>
        <!-- END Your Block -->
    </div>
    <!-- END Page Content -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.backend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\Fitness\resources\views/recipes/index.blade.php ENDPATH**/ ?>