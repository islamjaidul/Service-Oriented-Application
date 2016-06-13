<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">HEADER</li>
            <?php
                $nav = array('Dashboard', 'API Panel', 'Token Manager', 'Mailbox', 'Report', 'Documentation');
                $url = array('/customer/dashboard', '/customer/api', '/customer/token', '/customer/mailbox', '/customer/report', '/customer/documentation');
                $icon = array('fa fa-tachometer', 'fa fa-code', 'fa fa-briefcase', 'fa fa-envelope', 'fa fa-bar-chart', 'fa fa-book');
            ?>

             @for($i = 0; $i < count($nav); $i++)
                 <!-- Optionally, you can add icons to the links -->
                 <li><a href="{{ url($url[$i]) }}"><i class="{{ $icon[$i] }}"></i> <span>{{$nav[$i]}}</span></a></li>
             @endfor

        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
