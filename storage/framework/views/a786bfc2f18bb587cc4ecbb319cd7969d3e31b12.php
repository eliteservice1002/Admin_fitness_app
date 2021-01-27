<?php $__env->startSection('content'); ?>
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">Show FoodItem</h1>
            </div>
        </div>
    </div>
    <!-- END Hero -->

    <!-- Page Content -->
    <div class="content">
        <!-- Your Block -->
        <div class="block block-rounded block-bordered">
            <div class="block-header block-header-default">
                <h3 class="block-title">Show FoodItem</h3>
                <div class="block-options">
                    <div class="pull-right">
                        <a class="btn btn-primary" href="<?php echo e(route('fooditems.index')); ?>"> Back</a>
                    </div>
                </div>
            </div>
            <div class="block-content">
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
                            <label for="name" class="col-sm-4">Food Name:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="food_name" name="food_name" value="<?php echo e($fooditem->food_name); ?>" readonly placeholder="Enter Food Name...">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-4">Carbon:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="carbon" name="carbon" value="<?php echo e($fooditem->carbon); ?>" readonly placeholder="Enter Carbon...">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-4">Protein:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="protein" name="protein" value="<?php echo e($fooditem->protein); ?>" readonly placeholder="Enter Protein...">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-4">Fat:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="fat" name="fat" value="<?php echo e($fooditem->fat); ?>" readonly placeholder="Enter Fat...">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-4">Portion In Grams:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="portion_in_grams" name="portion_in_grams" value="<?php echo e($fooditem->portion_in_grams); ?>" readonly placeholder="Enter Portion In Grams...">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-4">Kcal:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="kcal" name="kcal" value="<?php echo e($fooditem->kcal); ?>" readonly placeholder="Enter Portion In Kcal...">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Your Block -->
    </div>
    <!-- END Page Content -->
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.backend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\Admin_fitness_app\resources\views/fooditems/show.blade.php ENDPATH**/ ?>