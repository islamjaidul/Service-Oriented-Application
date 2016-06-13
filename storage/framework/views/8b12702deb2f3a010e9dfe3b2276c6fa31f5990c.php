<?php $__env->startSection('header'); ?>
    Token
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('customer.common.new_token', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="box box-info">

        <div ng-if="notApproved == true" class="alert alert-danger">
            <i class="fa fa-check"></i> Your token request has successfully processed but not approved yet.
        </div>

        <div class="row">
            <div class="box-body">
                <div class="col-md-6">
                    <a data-toggle="modal" data-target="#confirm-new-token" href="#"  ng-class="remainingToken==0 && notApproved != true ? 'btn btn-success btn-xs' : 'btn btn-success btn-xs disabled'">Add new token</a>
                    <table class="table table-bordered">
                        <tr><th>Total Token</th><th>Remaining Token</th></tr>
                        <?php foreach($token as $row): ?>
                            <tr>
                                <td><?php echo e($row->api_token); ?></td>
                                <td><?php echo e($row->remaining_api_token); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>

                <div class="col-md-6">
                    <div style="background-color:lightcyan" class="alert alert-default alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <b>Note: </b> Token will reduce per uses of API.
                        <p><b>Note: </b>Apply for new token, when your token will be finished</p>
                        <p><b>Note: </b>Admin will approve your application and you will get the new token</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
    <script>
        $(document).ready(function(){
            $("#tokenSubmit").click(function(event) {
                event.preventDefault();
                $("#confirm-new-token").modal("hide");
            });
        })
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('customer.layout.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>