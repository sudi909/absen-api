<!DOCTYPE html>
<html>

@include('header')

<body>
<div id="preloader">
    <div data-loader="circle-side"></div>
</div><!-- /Preload -->

<div id="loader_form">
    <div data-loader="circle-side-2"></div>
</div><!-- /loader_form -->

<!-- Bootstrap row -->
<div id="wrapper" class="toggled">
    <div class="row">
        <!-- Sidebar -->
        <div id="sidebar-wrapper" class="sidebar-expanded">
            <div class="icon-logo" style="margin-left: 65px; margin-bottom: 60px">
                <img src="img/logoyv.png" alt="" width="100" height="98" class="d-none d-md-block">
            </div>

            <ul class="list-group">
                <div style="padding: 20px 20px 0px 20px">
                    <li class="custom-list-active">
                        <a href="/" style="color: white; font-size: 14px">
                            <i class="fas fa-poll-h fa-lg" style="margin-right: 20px; vertical-align:middle"></i>Dashboard
                        </a>
                    </li>
                </div>
                <div style="padding: 20px 20px 0px 20px">
                    <li class="custom-list">
                        <a href="/report" style="color: grey; font-size: 14px">
                            <i class="fas fa-file-alt fa-lg" style="margin-right: 20px; vertical-align:middle"></i>Report
                        </a>
                    </li>
                </div>
                <div style="padding: 20px 20px 0px 20px">
                    <li class="custom-list">
                        <a href="/settings" style="color: grey; font-size: 14px">
                            <i class="fas fa-cog fa-lg" style="margin-right: 20px; vertical-align:middle"></i>Setting
                        </a>
                    </li>
                </div>
            </ul><!-- List Group END-->
        </div><!-- sidebar-container END -->
        <!-- MAIN -->
        <div id="wizard_container" class="toggled">
            <span class="fas fa-bars" id="menu-toggle"></span>
            <span class="head-title">
                CONTACT TRACING
            </span>
            <input type="hidden" name="audioSuccess" id="audioSuccess" value="{{ URL::to('/') }}/audio/thank_you.mp3">
            <input type="hidden" name="audioFailed" id="audioFailed" value="{{ URL::to('/') }}/audio/bell_notification.mp3">
            <!-- /top-wizard -->
            <div class="box-form">
                <form id="attForm" method="post" class="custom-form">
                    <div id="middle-wizard">
                        <div class="vertical-center">
                            <div class="container">
                                <img src="img/hands-card.png" alt="" height="350" style="margin-top: -80px">
                                <div class="summary" style="display: inline-block; text-align: left;">
                                    <h3 class="main_question" style="font-weight: bold">Silahkan arahkan Barcode Kartu Identitas<br>
                                        Mahasiswa / Karyawan anda ke Mesin Scanner.</h3>
                                    @include('notification')
                                    <div class="form-group add_top">
                                        <input type="text" name="id" id="id" class="custom-input" autofocus>
                                        <input type="hidden" name="location" id="location">
                                    </div>
                                    <button type="submit" name="process" class="hide-btn"></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /middle-wizard -->
                </form>
            </div>
            <!-- Main Col END -->
        </div>
    </div><!-- body-row END -->
</div>

<div class="cd-overlay-nav">
    <span></span>
</div>
<!-- /cd-overlay-nav -->
<div class="cd-overlay-content">
    <span></span>
</div>
<!-- /cd-overlay-content -->

@include('footer')

<script src="js/index.js">
</script>
</body>
</html>
