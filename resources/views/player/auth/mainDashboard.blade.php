<!doctype html>
<html dir="rtl" lang="fa-IR">
<head>
    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta content='width=device-width, initial-scale=1.0, user-scalable=0' name='viewport'>
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta content="" name="description">
    <meta content="limoostudio" name="author">
    <meta content="" name="keywords">
    <!-- FAVICON -->
    <link href="/assets/images/brand/favicon.ico" rel="shortcut icon" type="image/x-icon"/>
    <!-- TITLE -->
    <title>Game</title>
    <!-- BOOTSTRAP CSS -->
    <link href="/assets/plugins/bootstrap/css/bootstrap.min.css" id="style" rel="stylesheet"/>
    <!-- STYLE CSS -->
    <link href="/assets/css/style.css" rel="stylesheet"/>
    <link href="/assets/css/plugins.css" rel="stylesheet"/>
    <link href="/assets/css/dark-style.css" rel="stylesheet"/>
    <link href="/assets/css/transparent-style.css" rel="stylesheet">
    <link href="/assets/css/skin-modes.css" rel="stylesheet"/>
    <!--- FONT-ICONS CSS -->
    <link href="/assets/css/icons.css" rel="stylesheet"/>
    <!-- COLOR SKIN CSS -->
    <link href="/assets/colors/color1.css" id="theme" media="all" rel="stylesheet" type="text/css"/>
    <link href="/assets/switcher/css/switcher.css" rel="stylesheet"/>
    <link href="/assets/switcher/demo.css" rel="stylesheet"/>
    <!--RTL STYLE-->
    <link href="/assets/fonts/styles-fa-num/iran-yekan.css" id="fonts" rel="stylesheet">
    <link href="/assets/css/rtl.css" rel="stylesheet"/>
</head>

<body class="app sidebar-mini rtl light-mode">
<div class="switcher-wrapper">
    <div class="demo_changer">
        <div class="form_holder sidebar-right1">
            <div class="row">
                <div class="predefined_styles">
                    <div class="swichermainleft">
                        <h4>{{__('rtl/ltr')}}</h4>
                        <div class="skin-body">
                            <div class="switch_section">
                                <div class="switch-toggle d-flex">
                                    <span class="me-auto">{{__('ltr')}}</span>
                                    <p class="onoffswitch2"><input class="onoffswitch2-checkbox" id="myonoffswitch23"
                                                                   name="onoffswitch7"
                                                                   type="radio">
                                        <label class="onoffswitch2-label" for="myonoffswitch23"></label>
                                    </p>
                                </div>
                                <div class="switch-toggle d-flex mt-2">
                                    <span class="me-auto">{{__('rtl')}}</span>
                                    <p class="onoffswitch2"><input checked class="onoffswitch2-checkbox"
                                                                   id="myonoffswitch24"
                                                                   name="onoffswitch7" type="radio">
                                        <label class="onoffswitch2-label" for="myonoffswitch24"></label>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="global-loader">
    <img alt="Loader" class="loader-img" src="/assets/images/loader.svg">
</div>

<div class="page">
    <div class="page-main">
        @include('header', ['user' => auth('player')->user()])
        @include('player.auth.sidebar')
        <div class="main-content app-content mt-0">
            <div class="side-app">
                <br>
                <div class="row">
                    <div class="col-12 col-sm-12">
                        @if (!empty($errors))
                            @include('error')
                        @endif
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<footer class="footer">
    <div class="container">
        <div class="row align-items-center flex-row-reverse">
            <div class="col-md-12 col-sm-12 text-center">
                <a href="https://github.com/mnbp1371">
                    {{__('github')}}
                </a>
            </div>
        </div>
    </div>
</footer>
</div>

<!-- BACK-TO-TOP -->
<a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>

<!-- JQUERY JS -->
<script src="/assets/js/jquery.min.js"></script>

<!-- BOOTSTRAP JS -->
<script src="/assets/plugins/bootstrap/js/popper.min.js"></script>
<script src="/assets/plugins/bootstrap/js/bootstrap.min.js"></script>

<!-- SPARKLINE JS-->
<script src="/assets/js/jquery.sparkline.min.js"></script>

<!-- Sticky js -->
<script src="/assets/js/sticky.js"></script>

<!-- CHART-CIRCLE JS-->
<script src="/assets/js/circle-progress.min.js"></script>

<!-- PIETY CHART JS-->
<script src="/assets/plugins/peitychart/jquery.peity.min.js"></script>
<script src="/assets/plugins/peitychart/peitychart.init.js"></script>

<!-- SIDEBAR JS -->
<script src="/assets/plugins/sidebar/sidebar.js"></script>

<!-- Perfect SCROLLBAR JS-->
<script src="/assets/plugins/p-scroll/perfect-scrollbar.js"></script>
<script src="/assets/plugins/p-scroll/pscroll.js"></script>
<script src="/assets/plugins/p-scroll/pscroll-1.js"></script>

<!-- INTERNAL CHARTJS CHART JS-->
<script src="/assets/plugins/chart/Chart.bundle.js"></script>
<script src="/assets/plugins/chart/utils.js"></script>

<!-- INTERNAL SELECT2 JS -->
<script src="/assets/plugins/select2/select2.full.min.js"></script>

<!-- INTERNAL Data tables js-->
<script src="/assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
<script src="/assets/plugins/datatable/js/dataTables.bootstrap5.js"></script>
<script src="/assets/plugins/datatable/dataTables.responsive.min.js"></script>

<!-- INTERNAL APEXCHART JS -->
<script src="/assets/js/apexcharts.js"></script>
<script src="/assets/plugins/apexchart/irregular-data-series.js"></script>

<!-- INTERNAL Flot JS -->
<script src="/assets/plugins/flot/jquery.flot.js"></script>
<script src="/assets/plugins/flot/jquery.flot.fillbetween.js"></script>
<script src="/assets/plugins/flot/chart.flot.sampledata.js"></script>
<script src="/assets/plugins/flot/dashboard.sampledata.js"></script>

<!-- INTERNAL Vector js -->
<script src="/assets/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
<script src="/assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>

<!-- SIDE-MENU JS-->
<script src="/assets/plugins/sidemenu/sidemenu.js"></script>

<!-- TypeHead js -->
<script src="/assets/plugins/bootstrap5-typehead/autocomplete.js"></script>
<script src="/assets/js/typehead.js"></script>

<!-- INTERNAL INDEX JS -->
<script src="/assets/js/index1.js"></script>

<!-- Color Theme js -->
<script src="/assets/js/themeColors.js"></script>

<!-- CUSTOM JS -->
<script src="/assets/js/custom.js"></script>

<!-- Custom-switcher -->
<script src="/assets/js/custom-swicher.js"></script>

<!-- Switcher js -->
<script src="/assets/switcher/js/switcher.js"></script>

</body>
</html>
