<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?php echo $__env->yieldContent('header'); ?>
        </h1>
    </section>

    <!-- Main content -->
    <section ng-controller="MyController" class="content">
        <div id="overlay">
            <img src="<?php echo e(asset('spinner/ajax-loader.gif')); ?>" alt="Loading" /><br/>
            Loading...
        </div>
        <!-- Your Page Content Here -->
        <?php echo $__env->yieldContent('content'); ?>

    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
<script>
    jQuery(window).load(function(){
        jQuery('#overlay').fadeOut();
    });
</script>