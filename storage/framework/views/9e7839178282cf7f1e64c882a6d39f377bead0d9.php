<h3>Congratulation <?php echo e($name); ?></h3>
<h4>You account has successfully registered</h4>
<p>Activation link: <?php echo e(url('customer/register/activation/'.$token.'')); ?></p>