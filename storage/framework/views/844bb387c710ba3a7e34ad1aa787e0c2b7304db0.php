<?php $__env->startSection('content'); ?>
<!-- Hero -->
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">Συνταγών</h1>
        </div>
    </div>
</div>
<!-- END Hero -->
<!-- Page Content -->
<div class="content">
    <!-- Your Block -->
    <div class="block block-rounded block-bordered">
        <div class="block-header block-header-default">
            <h3 class="block-title">Λίστα Συνταγών</h3>
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
                            <th class="d-none d-sm-table-cell" style="width: 10%;">Φωτογραφία</th>
                            <th class="d-none d-sm-table-cell" style="width: 20%;">Τίτλος</th>
                            <th class="d-none d-sm-table-cell" style="width: 20%;">Κατηγορία</th>
                            <th class="d-none d-sm-table-cell" style="width: 20%;">Περιγραφή</th>
                            <th class="d-none d-md-table-cell text-center" style="width: 20%;">Ενέργειες</th>
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
                                <form id="delete-<?php echo e($recipe->id); ?>" action="<?php echo e(route('recipes.destroy',$recipe->id)); ?>" method="POST">
                                    <div class="btn-group">
                                        <a class="btn btn-success" href="<?php echo e(route('recipes.show',$recipe->id)); ?>" data-toggle="tooltip" title="Show">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a class="btn btn-primary" href="<?php echo e(route('recipes.edit',$recipe->id)); ?>" data-toggle="tooltip" title="Edit">
                                            <i class="fa fa-pencil-alt"></i>
                                        </a>
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>

                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-block-normal-<?php echo e($recipe->id); ?>" title="Delete">
                                            <i class="fa fa-times"></i>
                                        </button>

                                        <div class="modal" id="modal-block-normal-<?php echo e($recipe->id); ?>" tabindex="-1" role="dialog" aria-labelledby="modal-block-normal" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title"><i class="fa fa-check"></i>Warning</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body pb-1">
                                                        <p>Are you sure to delete this <span class="text-info">Recipe</span>?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-sm btn-primary confirm" data-id="<?php echo e($recipe->id); ?>">Yes</button>
                                                        <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">No</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
                <div class="text-center" style="width: fit-content; margin:auto;"><?php echo $recipes->links(); ?></div>
            </div>
        </div>
    </div>
    <!-- END Your Block -->
</div>
<!-- END Page Content -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('.confirm').click(function() {
            $('#delete-' + $(this).data("id")).submit();
        });
    });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.backend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\Admin_fitness_app\resources\views/recipes/index.blade.php ENDPATH**/ ?>