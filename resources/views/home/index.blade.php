<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Code Boost</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="{{URL::asset('bootstrap_framework/css/bootstrap.min.css')}}" type="text/css">

    <!-- Custom Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{URL::asset('dist/font-awesome/css/font-awesome.min.css')}}" type="text/css">

    <!-- Plugin CSS -->
    <link rel="stylesheet" href="{{URL::asset('dist/css/magnific-popup.css')}}" type="text/css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{URL::asset('dist/css/creative.min.css')}}" type="text/css">

    <link rel="stylesheet" href="{{ URL::asset('dist/css/AdminLTE.min.css') }}">
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect.
    -->
    <link rel="stylesheet" href="{{ URL::asset('dist/css/skins/skin-blue.min.css') }}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top">

<nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand page-scroll" href="#page-top">Code Boost</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="{{url('customer/login')}}">Sign in</a>
                </li>
                <li>
                    <a href="{{url('customer/register')}}">Sign up</a>
                </li>
                <li>
                    <a class="page-scroll" href="#about">About</a>
                </li>
                <li>
                    <a class="page-scroll" href="#services">Services</a>
                </li>

                <li>
                    <a class="page-scroll" href="#documentation">Documentation</a>
                </li>

                <li>
                    <a class="page-scroll" href="#contact">Contact</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>

<header>
    <div class="header-content">
        <div class="header-content-inner">
            <h1>We Save your Time and make your life easy</h1>
            <hr>
            <p>Start with us and see how easy your life and save your time in developing application</p>
            <a href="#about" class="btn btn-primary btn-xl page-scroll">Find Out More</a>
        </div>
    </div>
</header>

<section class="bg-primary" id="about">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 text-center">
                <h2 class="section-heading">We've got what you need!</h2>
                <hr class="light">
                <p class="text-faded">We provide the robust API to reduce your pain, it's easy to use and it's free!</p>
                <a href="#services" class="page-scroll btn btn-default btn-xl sr-button">Get Started!</a>
            </div>
        </div>
    </div>
</section>

<section id="services">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">At Our Services</h2>
                <hr class="primary">
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 text-center">
                <div class="service-box">
                    <i class="fa fa-4x fa-file-pdf-o text-primary sr-icons"></i>
                    <h3>Easily generate PDF</h3>
                    <p class="text-muted">Now easily can be generated PDF by our API</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 text-center">
                <div class="service-box">
                    <i class="fa fa-4x fa-file-word-o text-primary sr-icons"></i>
                    <h3>Get your DOCX</h3>
                    <p class="text-muted">Generate your DOCX and release your pain</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 text-center">
                <div class="service-box">
                    <i class="fa fa-4x fa-file-excel-o text-primary sr-icons"></i>
                    <h3>Make your CSV</h3>
                    <p class="text-muted">Use our way to generate your CSV</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="bg-primary" id="documentation">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">Documentation</h2>
                <hr class="light">
                <a href="#app_doc" class="page-scroll btn btn-default btn-xl sr-button">App Doc</a>
                <a href="#api_doc" class="page-scroll btn btn-default btn-xl sr-button">API Doc</a>
            </div>
        </div>
    </div>
</section>

<!--Application Documentation Start-->
<section id="app_doc">
    <div class="container">
        <div class="row">
            <h2 style="text-align:center">Application Documentation</h2>
            <hr class="primary">
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
        </div>
    </div>
</section>
<!--Application Documentation End-->


<!--API Documentation Start-->
<section style="margin-top:-100px" id="api_doc">
    <div class="container">
        <div class="row">
            <h2 style="text-align:center">API Documentation</h2>
            <hr class="primary">
            <div class="box box-info">
                <div class="box-body">
                    <h4>Need to provide all data by array</h4>
            <pre>
$option = array(
    'output' => 'table',
    'as' => 'name',
    'type' => 'csv',
    'data' => $data,
    'key'  => 'XgBvadrSHZBzSqIp14hHi0RCbeP953QoIvsoOZDlV4OzkAwKsrqlwxucrphX'
);
            </pre>
                    <p>There are five array key where need to put array value</p>
                    <ul>
                        <li>
                            <h4>output</h4>
                            <ul>
                                <li>
                                    <p>Output is the key which present the output type. There are two types of output
                                        for example - table(for CSV and DOCX) and plain(for only PDF)
                                    </p>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <h4>as</h4>
                            <ul>
                                <li>
                                    <p>As is the key which present the name of the file, for example - document.csv, document.pdf.
                                        Here document present for as.
                                    </p>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <h4>type</h4>
                            <ul>
                                <li>
                                    <p>Type is the key which stands for the format of the output file. For example - PDF, CSV, DOCX
                                    </p>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <h4>data</h4>
                            <ul>
                                <li>
                                    <p>Data is the key which stands for data which will be converted into three types. Data needs to
                                        be array for CSV and DOCX only not PDF. PDF requires HTML as data
                                    </p>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <h4>key</h4>
                            <ul>
                                <li>
                                    <p>Key is the API key which needs to generate from user panel.
                                    </p>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <div style="margin-top:30px;width:600px" class="alert alert-danger"><b>Note: </b>For generating PDF, the output key must be plain not table, table is only for CSV and DOCX</div>

                    <h3 style="margin-top:40px;">Sample Code</h3>
            <pre>
&lt;?php
include_once 'RestAPI.php';
use CodeBoost\RestAPI\RestAPI;
$obj = new RestAPI();
$data = array(
        0 => array(
                'name' => 'sohag',
                'age'  => '27',
                'profession' => 'developer',
                'mission' => 'unknown'
        ),

        1 => array(
                'name' => 'rahad',
                'age'  => '24',
                'profession' => 'programmer',
                'mission' => 'unknown'
        ),

        2 => array(
                'name' => 'rupa',
                'age'  => '27',
                'profession' => 'housewife',
                'mission' => 'unknown'
        ),

        3 => array(
                'name' => 'jakir',
                'age'  => '27',
                'profession' => 'housewife',
                'mission' => 'unknown'
        )
);

$html = "&lt;HTML&gt;&lt;h2&gt;PDF from HTML using phpToPDF&lt;/h2&gt;&lt;/HTML&gt;";

$option = array(
        'output' => 'table',
        'as' => 'name',
        'type' => 'csv',
        'data' => $data,
        'key'  => 'c5rg0bQO7jhpL8oesMCCEyBPFoc8HvrYvDnmm8sfk1eakQbwTMRKO4LzegWQ'
);

echo $obj->optionData($option)
            </pre>

                    <h3>Explanation</h3>
                    <ul>
                        <li><p>The very first the downloaded API RestAPI.php needs to include</p></li>
                        <li><p>The namespace needs to refer</p></li>
                        <li><p>Call the RestAPI class to use method of that</p></li>
                        <li><p>data variable provide a associative array for generating CSV or DOCX. <b>Also possible to use the data from database</b></p></li>
                        <li><p>html variable provide the html code for generating PDF file</p></li>
                        <li><p>option variable provide the array with the credential keys of the API.</p></li>
                        <li><p>Then echo the optionData() method with option variable as parameter</p></li>
                    </ul>

                </div>
            </div>
        </div>
    </div>
</section>
<!--API Documentation End-->



<section class="bg-primary" id="contact">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 text-center">
                <h2 class="section-heading">Let's Get In Touch!</h2>
                <hr class="light primary">
                <p>Ready to start your next project with us? That's great! Give us a call or send us an email and we will get back to you as soon as possible!</p>
            </div>
            <div class="col-lg-4 col-lg-offset-2 text-center">
                <i class="fa fa-phone fa-3x sr-contact"></i>
                <p>01726-688748</p>
            </div>
            <div class="col-lg-4 text-center">
                <i class="fa fa-envelope-o fa-3x sr-contact"></i>
                <p>jaidul26@gmail.com</p>
            </div>
        </div>
    </div>
</section>

<!-- jQuery -->
<script src="{{URL::asset('dist/js/jquery.js')}}"></script>

<!-- Bootstrap Core JavaScript -->
<script src="{{URL::asset('dist/js/bootstrap.min.js')}}"></script>

<!-- Plugin JavaScript -->
<script src="{{URL::asset('dist/js/scrollreveal.min.js')}}"></script>
<script src="{{URL::asset('dist/js/jquery.easing.min.js')}}"></script>
<script src="{{URL::asset('dist/js/jquery.fittext.js')}}"></script>
<script src="{{URL::asset('dist/js/jquery.magnific-popup.min.js')}}"></script>

<!-- Custom Theme JavaScript -->
<script src="{{URL::asset('dist/js/creative.js')}}"></script>

</body>

</html>