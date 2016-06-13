<?php $__env->startSection('header'); ?>
    <div class="row">
        <div class="col-md-8">
            Report
            <a target="_blank" href="<?php echo e(url('/customer/report/export')); ?>" style="float:right;" class="btn btn-primary btn-sm"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Export PDF</a>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php
        function getStatus($action = null) {
            if($action == 1) {
                echo '<span class="label label-info">Approved</span>';
            } else {
                echo '<span class="label label-warning">Pending</span>';
            }
        }
    ?>
    <div class="row">
        <div class="col-md-8">
            <div class="box box-info">
                <div class="box-header">
                    API Report
                </div>
                <div class="box-body">
                    <?php if(count($data['api_report']) != 0): ?>
                    <table class="table table-bordered">
                        <tr><th>Uses Website</th><th>Total Uses</th></tr>

                            <?php foreach($data['api_report'] as $row): ?>
                                <tr>
                                    <td><?php echo e($row->uses_address); ?></td>
                                    <td><?php echo e($row->api_uses_count); ?> Times</td>
                                </tr>
                            <?php endforeach; ?>
                    </table>
                    <?php else: ?>
                        <h4 style="color:red">No API Report Available</h4>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="box box-info">
                <div class="box-header">Token Approval Report</div>
                <div class="box-body">
                    <?php if(count($data['token_report']) != 0): ?>
                       <table class="table table-bordered">
                           <tr><th>Token Request</th><th>Status</th><th>Date</th></tr>
                           <?php foreach($data['token_report'] as $row): ?>
                                <tr>
                                    <td><?php echo e($row->token_request); ?></td>
                                    <td><?php echo e(getStatus($row->action)); ?></td>
                                    <td><?php echo e($row->created_at); ?></td>
                                </tr>
                           <?php endforeach; ?>
                       </table>
                    <?php else: ?>
                        <h4 style="color:red">No Approval Report Available</h4>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="box box-info">
                <div class="box-header">Total Token Report</div>
                <div class="box-body">
                    <?php if(count($data['result']) != 0): ?>
                        <table class="table table-bordered">
                            <tr><th>Approved Token</th><th>Default Token</th></tr>
                            <tr>
                                <td><?php echo e($data['result'][0]); ?></td>
                                <td><?php echo e($data['result'][1]); ?></td>
                            </tr>
                            <tr>
                                <td><b>Total Token: </b></td>
                                <td><?php echo e($data['result'][0] + $data['result'][1]); ?></td>
                            </tr>
                        </table>
                    <?php else: ?>
                        <h4 style="color:red">No Token Report Available</h4>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('customer.layout.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>