<?php $__env->startSection('content'); ?>

    <div class="container">
        <div class="row">
            <?php if(Session::has('auth_invalid_message')): ?>
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <i class="fa fa-exclamation-triangle" aria-hidden="true"></i> <?php echo e(Session::get('auth_invalid_message')); ?>

                        </div>
                    </div>
                </div>
            <?php endif; ?>
            
             <?php if(Session::has('success')): ?>
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <i class="fa fa-check" aria-hidden="true"></i> <?php echo e(Session::get('success')); ?>

                        </div>
                    </div>
                </div>
            <?php endif; ?>
            
            <div class="col-md-8 col-md-offset-2">
                <div class="box box-info">

                    <div class="box-header">Customer Login</div>
                    <div class="box-body">
                        <form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('customer/login')); ?>">
                            <?php echo csrf_field(); ?>




                            <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                                <label class="col-md-4 control-label">E-Mail Address</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="email" value="<?php echo e(old('email')); ?>">

                                    <?php if($errors->has('email')): ?>
                                        <span class="help-block">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                                <label class="col-md-4 control-label">Password</label>

                                <div class="col-md-6">
                                    <input type="password" class="form-control" name="password">

                                    <?php if($errors->has('password')): ?>
                                        <span class="help-block">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember"> Remember Me
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-btn fa-sign-in"></i>Login
                                    </button>

                                    <a class="btn btn-link" href="<?php echo e(url('/password/reset')); ?>">Forgot Your Password?</a>
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