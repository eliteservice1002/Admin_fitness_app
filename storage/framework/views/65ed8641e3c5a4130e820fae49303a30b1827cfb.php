<?php $__env->startSection('content'); ?>

<!-- Hero -->
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">Πελάτες</h1>
        </div>
    </div>
</div>
<!-- END Hero -->
<!-- Page Content -->
<div class="content">
    <!-- Your Block -->
    <div class="block block-rounded block-bordered">
        <div class="block-header block-header-default">
            <h3 class="block-title">Πελάτες Λίστα</h3>

        </div>
        <div class="block-content">

            <div class="table-responsive">
                <table class="table table-bordered table-striped table-vcenter">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 10%;">No</th>
                            <th class="d-none d-sm-table-cell" style="width: 30%;">Email</th>
                            <th class="d-none d-sm-table-cell" style="width: 10%;">γένος</th>
                            <th class="d-none d-sm-table-cell" style="width: 20%;">γενέθλια</th>
                            <th class="d-none d-sm-table-cell" style="width: 20%;">τύπος</th>
                            <th class="d-none d-sm-table-cell" style="width: 10%;">δράση</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="text-center"><?php echo e($loop->iteration); ?></td>
                            <td class="d-none d-sm-table-cell"><?php echo e($customer->email); ?></td>
                            <td class="d-none d-sm-table-cell"><?php echo e($customer->gender); ?></td>
                            <td class="d-none d-sm-table-cell"><?php echo e($customer->birthday); ?></td>
                            <td class="d-none d-sm-table-cell"><?php echo e($customer->type); ?></td>
                            <td class="text-center">
                                <form id="delete-<?php echo e($customer->id); ?>" action="<?php echo e(route('customers.destroy',$customer->id)); ?>" method="POST">
                                    <div class="btn-group">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-block-normal-<?php echo e($customer->id); ?>" title="Delete">
                                            <i class="fa fa-times"></i>
                                        </button>

                                        <div class="modal" id="modal-block-normal-<?php echo e($customer->id); ?>" tabindex="-1" role="dialog" aria-labelledby="modal-block-normal" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title"><i class="fa fa-check"></i>Προειδοποίηση</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body pb-1">
                                                        <p>Είστε βέβαιοι ότι θα διαγράψετε αυτές τις πληροφορίες;?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-sm btn-primary confirm" data-id="<?php echo e($customer->id); ?>">Ναί</button>
                                                        <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Οχι</button>
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
<?php echo $__env->make('layouts.backend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\Admin_fitness_app\resources\views/customers/index.blade.php ENDPATH**/ ?>