<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<!-- Bootstrap 3.3.5 -->
<link rel="stylesheet" href="<?php echo e(URL::asset('bootstrap_framework/css/bootstrap.min.css')); ?>">
<!-- Font Awesome -->
<!-- Theme style -->
<link rel="stylesheet" href="<?php echo e(URL::asset('dist/css/AdminLTE.min.css')); ?>">

<?php
function getStatus($action = null) {
    if($action == 1) {
        echo '<span style="color:green" ">Approved</span>';
    } else {
        echo '<span style="color:orange">Pending</span>';
    }
}
?>
<style>
    h4{margin-bottom:-5px}
</style>
<div class="row">
    <div class="col-md-8">
        <div class="box box-info">
            <div class="box-header">
                <h4>API Report</h4>
            </div>
            <div class="box-body">
                <?php if(count($data['api_report']) != 0): ?>
                    <table class="table table-hover">
                        <tr><th></th><th>Uses Website</th><th>Total Uses</th></tr>

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
            <div class="box-header"><h4>Token Approval Report</h4></div>
            <div class="box-body">
                <?php if(count($data['token_report']) != 0): ?>
                    <table class="table table-hover">
                        <tr><th></th><th>Token Request</th><th>Status</th><th>Date</th></tr>
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
            <div class="box-header"><h4>Total Token Report</h4></div>
            <div class="box-body">
                <?php if(count($data['result']) != 0): ?>
                    <table class="table table-hover">
                        <tr><th></th><th>Approved Token</th><th>Default Token</th></tr>
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