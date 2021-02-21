<?php $__env->startSection('content'); ?>
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">Επεξεργασία Τροφίμων</h1>
            </div>
        </div>
    </div>
    <!-- END Hero -->

    <!-- Page Content -->
    <div class="content">
        <!-- Your Block -->
        <div class="block block-rounded block-bordered">
            <div class="block-header block-header-default">
                <h3 class="block-title">Επεξεργασία Τροφίμων</h3>
                <div class="block-options">
                    <div class="pull-right">
                        <a class="btn btn-primary" href="<?php echo e(route('fooditems.index')); ?>"> Πίσω</a>
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
                <form action="<?php echo e(route('fooditems.update',$fooditem->id)); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <div class="row justify-content-center">
                        <div class="col-xs-10 col-sm-10 col-md-10">
                            <div class="form-group row">
                                <label for="food_categories_id" class="col-sm-4">Κατηγορία:</label>
                                <div class="col-sm-8">
                                    <select class="js-select2 form-control" id="food_categories_id" name="food_categories_id[]" style="width: 100%;" data-placeholder="Choose many.." multiple>
                                        <option></option>
                                        <?php $__currentLoopData = $foodcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $foodcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($foodcategory->id); ?>" <?php if(in_array($foodcategory->id, $fooditem->category_ids)) echo "selected"?>><?php echo e($foodcategory->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-sm-4">Όνομα Τροφής:</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="food_name" name="food_name" value="<?php echo e($fooditem->food_name); ?>" placeholder="Enter Food Name...">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-sm-4">Υδατάνθρακες (carbs):</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="carbon" name="carbon" value="<?php echo e($fooditem->carbon); ?>" placeholder="Enter Carbon...">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-sm-4">Πρωτεΐνες (proteins):</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="protein" name="protein" value="<?php echo e($fooditem->protein); ?>" placeholder="Enter Protein...">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-sm-4">Λιπαρά (fat):</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="fat" name="fat" value="<?php echo e($fooditem->fat); ?>" placeholder="Enter Fat...">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-sm-4">Γραμμάρια (g):</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="portion_in_grams" name="portion_in_grams" value="<?php echo e($fooditem->portion_in_grams); ?>" placeholder="Enter Portion In Grams...">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-sm-4">Kcal:</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="kcal" name="kcal" value="<?php echo e($fooditem->kcal); ?>" placeholder="Enter Portion In Kcal...">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-sm-4">Μερίδα (grams):</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="serving_size" name="serving_size" value="<?php echo e($fooditem->serving_size); ?>" placeholder="Εισαγάγετε το Μερίδα...">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-sm-4">Επέλεξε πρόθεμα:</label>
                                <div class="col-sm-8">
                                    <select class="form-control" id="serving_prefix" name="serving_prefix" style="width: 100%;" data-placeholder="Επέλεξε πρόθεμα...">
                                        <option value="τεμάχιο">1 τεμάχιο</option>
                                        <option value="φλυτζάνι">1 φλυτζάνι</option>
                                        <option value="κουταλιά σουπας">1 κουταλιά σουπας</option>
                                        <option value="κουταλιά γλυκού">1 κουταλιά γλυκού</option>
                                        <option value="μερίδα">1 μερίδα</option>
                                        <option value="φέτα">1 φέτα</option>
                                        <option value="μέτριο">1 μέτριο</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-8 ml-auto">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-fw fa-check"></i> Ενημέρωση
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
<?php $__env->startSection('js_after'); ?>
<script>
    $(document).ready(function() {
        let prefix = "<?php echo e($fooditem->serving_prefix); ?>"
        $('select option[value="' + prefix + '"]').attr("selected",true);
    })
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.backend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\Admin_fitness_app\resources\views/fooditems/edit.blade.php ENDPATH**/ ?>