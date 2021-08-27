<!DOCTYPE html>
<html>

@include('header')

<body>

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
                    <li class="custom-list">
                        <a href="/" style="color: grey; font-size: 14px">
                            <i class="fas fa-poll-h fa-lg" style="margin-right: 20px; vertical-align:middle"></i>Dashboard
                        </a>
                    </li>
                </div>
                <div style="padding: 20px 20px 0px 20px">
                    <li class="custom-list-active">
                        <a href="/report" style="color: white; font-size: 14px">
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
                REPORT
            </span>
            <!-- /top-wizard -->
            <div class="box-form">
                <form id="reportForm" method="post" class="custom-form">
                    <div id="middle-wizard">
                        <div class="vertical-center">
                            <div class="container">
                                <img src="img/hands-report.png" alt="" height="350" style="margin-top: -70px">
                                <div class="summary" style="display: inline-block">
                                    <h3 class="main_question" style="font-weight: bold">Silahkan memilih tanggal dan lokasi</h3>
                                    <input type="text" name="daterange" class="custom-input" required/><br>
                                    <select name="location" id="location" class="custom-selection" style="font-size: 14px" required>
                                        @foreach($locations as $location)
                                            <option class="custom-option" value="{{ $location->id }}">{{ $location->name }}</option>
                                        @endforeach
                                    </select>
                                    <br>
                                    <button type="submit" name="process" class="submit">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /middle-wizard -->
                </form>
            </div>
        </div>
        <!-- Main Col END -->
    </div><!-- body-row END -->
</div>

@include('footer')

<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<script src="js/report.js"></script>
</body>
</html>
