<?php $__env->startSection('header'); ?>
    API Documentation
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="box box-info">
        <div class="box-body">
          <h3 style="text-decoration:underline">One Step to Active Full Application</h3>
            <p><b>The very fast the user need to collect his API key. For this user need to go API panel and generate the API,
                then the application is completed to use.</b>
            </p>

            <h3 style="text-decoration:underline">Full Explanation</h3>

            <ul>
                <li>
                    <h4>Dashboard</h4>
                    <ul>
                        <li><p>Dashboard is represented by two kind of data <b>New Mail and Remaining Token</b></p></li>
                    </ul>
                </li>

                <li>
                    <h4>API Panel</h4>
                    <ul>
                        <li>
                            <p>API Panel is the represented by <b>Key Generator and Get API</b>, first need to click the <b>Key Generator</b> button for generate the API Key
                                and then <b>Get API</b> will be enabled to download the API
                            </p>
                        </li>
                    </ul>
                </li>

                <li>
                    <h4>Token Manager</h4>
                    <ul>
                        <li>
                            <p>
                                Token is the number of requests which will be used for service which is represented by <b>Total Token and Remaining Token</b>,
                                by default 10 token will be given and after finishing that user can request for new token and admin will approve that.
                            </p>
                        </li>
                    </ul>
                </li>

                <li>
                    <h4>Mail Box</h4>
                    <ul>
                        <li>
                            <p>
                                User can communicate with Admin from Mail Box for any query.
                            </p>
                        </li>
                    </ul>
                </li>

                <li>
                    <h4>Report</h4>
                    <ul>
                        <li>
                            <p>
                                Report is represented by three types of report <b>API Report, Token Approval Report, Total Token Report</b>
                            </p>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('customer.layout.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>