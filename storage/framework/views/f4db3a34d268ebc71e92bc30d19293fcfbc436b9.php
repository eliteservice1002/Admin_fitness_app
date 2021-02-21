<?php $__env->startSection('content'); ?>
<!-- Hero -->
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">Edit Recipe</h1>
        </div>
    </div>
</div>
<!-- END Hero -->
<!-- Page Content -->
<div class="content">
    <!-- Your Block -->
    <div class="block block-rounded block-bordered">
        <div class="block-header block-header-default">
            <h3 class="block-title">Edit Recipe</h3>
            <div class="block-options">
                <div class="pull-right">
                    <a class="btn btn-primary" href="<?php echo e(route('recipes.index')); ?>"> Πίσω</a>
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
            <form action="<?php echo e(route('recipes.update',$recipe->id)); ?>" id="store" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>

                <div class="row justify-content-center">
                    <div class="col-xs-10 col-sm-10 col-md-10">
                        <div class="form-group row">
                            <label for="name" class="col-sm-4">Τίτλος:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="title" name="title" value="<?php echo e($recipe->title); ?>" placeholder="Enter Title...">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="categories_id" class="col-sm-4">Κατηγορία:</label>
                            <div class="col-sm-8">
                                <select name="categories_id" id="categories_id" class="form-control">
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($category->id); ?>" <?php if ($category->id == $recipe->categories_id) echo "selected" ?>><?php echo e($category->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="description" class="col-sm-4">Περιγραφή:</label>
                            <div class="col-sm-8">
                                <textarea class="form-control" id="description" name="description" value="<?php echo e($recipe->description); ?>"><?php echo e($recipe->description); ?></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="image" class="col-sm-4">Εικόνα:</label>
                            <div class="col-sm-8">
                                <img src="data:image/png;base64, <?php echo e($recipe->image); ?>" width="100" height="100" alt="Recipe" />
                                <input type="file" name="image" id="image" placeholder="Image">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="add" class="col-sm-4">Λίστα τροφίμων:</label>
                            <div class="col-sm-8">
                                <button type="button" class="btn btn-primary" id="add">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="form-group row">
                            <input type="hidden" name="food_id" id="food_id">
                            <input type="hidden" name="food_amount" id="food_amount">
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-8 ml-auto">
                                <button type="button" class="btn btn-primary send">
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        CKEDITOR.replace('description');
        var total = parseInt("<?php echo e($foodvalues->count()); ?>") + 1;

        $("#add").before(
            '<?php $__currentLoopData = $foodvalues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $foodvalue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>\
                    <div class="food-menu row mb-2" data-id="<?php echo e($loop->iteration); ?>">\
                        <label for="add" class="col-sm-3">Φαγητό:</label>\
                        <div class="col-sm-4 id-div">\
                            <select name="food-id" id="food-id-<?php echo e($loop->iteration); ?>" class="form-control">\
                                <?php $__currentLoopData = $fooditems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fooditem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>\
                                <option value="<?php echo e($fooditem->id); ?>" <?php if ($fooditem->id == $foodvalue->food_items_id) echo "selected" ?>><?php echo e($fooditem->food_name); ?></option>\
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>\
                            </select>\
                        </div>\
                        <div class="col-sm-4 amount-div">\
                            <input type="text" name="food-amount" id="food-amount" value="<?php echo e($foodvalue->amount); ?>" class="form-control" placeholder="Amount">\
                        </div>\
                        <div class="col-sm-1">\
                            <button class="btn btn-danger" onclick="deleteTag(this)"><i class="fa fa-times"></i></button>\
                        </div>\
                    </div>\
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>'
        );

        for (var i = 1; i < total; i++) {
            $("#food-id-" + i).select2();
        }

        $("#add").click(function() {
            $(this).before(
                '<div class="food-menu row mb-2" data-id="' + i + '">\
                        <label for="add" class="col-sm-3">Food:</label>\
                        <div class="col-sm-4 id-div">\
                            <select name="food-id" id="food-id-' + i + '" class="form-control">\
                                <?php $__currentLoopData = $fooditems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fooditem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>\
                                <option value="<?php echo e($fooditem->id); ?>"><?php echo e($fooditem->food_name); ?></option>\
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>\
                            </select>\
                        </div>\
                        <div class="col-sm-4 amount-div">\
                            <input type="text" name="food-amount" id="food-amount" class="form-control" placeholder="Amount">\
                        </div>\
                        <div class="col-sm-1">\
                            <button class="btn btn-danger" onclick="deleteTag(this)"><i class="fa fa-times"></i></button>\
                        </div>\
                    </div>'
            );
            $("#food-id-" + i).select2();
            i++;
        })

        deleteTag = (val) => {
            val.parentNode.parentNode.remove();
        }

        $(".send").click(function() {
            var id_arr = [];
            var amount_arr = [];
            $(".food-menu").each(function(i) {
                
                id_arr.push($(this).children('.id-div').children('#food-id-'+($(this).data('id')).toString()).val());

                if (!$(this).children('.amount-div').children('#food-amount').val()) {
                    amount_arr.push(0);
                } else {
                    amount_arr.push($(this).children('.amount-div').children('#food-amount').val());
                }
            });

            $("input:hidden[name='food_id']").val(id_arr);
            $("input:hidden[name='food_amount']").val(amount_arr);
            $("#store").submit();
        })
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.backend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\Admin_fitness_app\resources\views/recipes/edit.blade.php ENDPATH**/ ?>