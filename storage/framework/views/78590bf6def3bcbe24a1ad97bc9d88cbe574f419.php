<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="box box-info">
                    <div class="box-header">
                        Activation
                    </div>
                    <div class="box-body">
                        <?php if(Session::has('success')): ?>
                            <div class="row">
                                <div class="col-md-8 col-md-offset-2">
                                    <div class="alert alert-success alert-dismissable">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <i class="fa fa-envelope-o" aria-hidden="true"></i> <?php echo e(Session::get('success')); ?>

                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>

                            <?php if(Session::has('invalid_msg')): ?>
                                <div class="row">
                                    <div class="col-md-8 col-md-offset-2">
                                        <div class="alert alert-danger alert-dismissable">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                            <i class="fa fa-exclamation-triangle" aria-hidden="true"></i> <?php echo e(Session::get('invalid_msg')); ?>

                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('customer/register/activation/')); ?>">
                            <?php echo csrf_field(); ?>


                            <div class="form-group<?php echo e($errors->has('token') ? ' has-error' : ''); ?>">
                                <label class="col-md-4 control-label">Token</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="token">

                                    <?php if($errors->has('token')): ?>
                                        <span class="help-block">
                                        <strong><?php echo e($errors->first('token')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-btn fa-sign-in"></i>Activate
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('auth.layout.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>