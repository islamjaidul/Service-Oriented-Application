<?php $__env->startSection('header'); ?>
    Dasboard
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="col-md-3">
        <div class="info-box">
            <span class="info-box-icon bg-red-active"><i class="ion-email"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">New Mail</span>
                <span class="info-box-number"><?php echo e($data['new_mail']); ?></span>
            </div><!-- /.info-box-content -->
        </div>
    </div>

    <div class="col-md-3">
        <div class="info-box">
            <span class="info-box-icon bg-aqua-active"><i class="ion-briefcase"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Remaining Token</span>
                <span class="info-box-number"><?php echo e($data['remaining_token']); ?></span>
            </div><!-- /.info-box-content -->
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('customer.layout.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>