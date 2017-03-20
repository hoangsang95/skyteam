<?php $__env->startSection('content'); ?>
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Slide
                            <small>Add</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <?php if(count($errors) > 0): ?>
                        <div class="alert alert-danger">
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $err): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php echo e($err); ?><br>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            
                        </div>
                        <?php endif; ?>
                        
                        <?php if(session('thongbao')): ?>
                        <div class="alert alert-success">
                            <?php echo e(session('thongbao')); ?>

                        </div>
                        <?php endif; ?>
                        <form action="" method="POST">  
                             <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
                            <div class="form-group">
                                <label>Slide_Title</label>
                                <input class="form-control" name="Slide_Title"  />
                            </div>
                            <div class="form-group">
                                <label>Slide_Description</label>
                                <textarea class="form-control" rows="3" name="Slide_Description"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Slide_Image</label>
                                <textarea class="form-control" rows="3" name="Slide_Image"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Slide_Link</label>
                                <textarea class="form-control" rows="3" name="Slide_Link"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Slide_Target</label>
                                <textarea class="form-control" rows="3" name="Slide_Target"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Slide_Order</label>
                                <input class="form-control" name="Slide_Order"  />
                            </div>
                            <div class="form-group">
                                <label>Slide_Cat</label>
                                <select class="form-control" name="Slide_Cat">
                                 
                                    <?php $__currentLoopData = $cate; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                         <option value="<?php echo e($r->Cat_ID); ?>"><?php echo e($r->Cat_Name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-default">Add</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>