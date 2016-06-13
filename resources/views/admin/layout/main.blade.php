<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            @yield('header')
        </h1>
    </section>

    <!-- Main content -->
    <section ng-controller="MyController" class="content">
        <div id="overlay">
            <img src="{{ asset('spinner/ajax-loader.gif') }}" alt="Loading" /><br/>
            Loading...
        </div>

        <!-- Your Page Content Here -->
        @yield('content')

    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
<script>
    jQuery(window).load(function(){
        jQuery('#overlay').fadeOut();
    });
</script>