<!DOCTYPE html>
<html>

@include('header')

<body>
<header>
    <div class="container">
        <div class="row">
            <div class="col-3">
                <img src="img/logoyv.png" alt="" width="57" height="55" class="d-none d-md-block"><img
                    src="img/logoyv.png" alt="" width="50" height="45" class="d-block d-md-none">
            </div>

        </div>
    </div>
    <!-- /container -->
</header>
<!-- /Header -->

<div class="container">
    <div id="form_container">
        <div class="row no-gutters">
            <div class="col-lg-4">
                <div id="left_form">
                    <figure><img src="img/logoyv.png" alt="" width="100" height="100"></figure>
                    <h2>YAYASAN VITKA <span>Contact Tracing</span></h2>
                    <p><i>“To ensure good health: eat lightly, breathe deeply, live moderately, cultivate cheerfulness,
                            and
                            maintain an interest in life.” -William Londen.</i></p>
                    <a href="/" class="btn_1 rounded yellow purchase" target="_parent">Input Civitas</a>
                </div>
            </div>
            <div class="col-lg-8">
                <div id="wizard_container">
                    <!-- /top-wizard -->
                    <form id="wrapped" method="post">
                        <input id="website" name="website" type="text" value="">
                        <!-- Leave for security protection, read docs for details -->
                        <div id="middle-wizard">

                            <div >
                                <div>
                                    <p id="time"></p>
                                    @include('notification')
                                    <h3 class="main_question"><i class="arrow_right"></i>Silahkan Masukkan Data Anda
                                    </h3>
                                    <div class="form-group add_top_30">
                                        <label for="name">Nama</label>
                                        <input type="text" name="name" id="name" class="form-control required">
                                    </div>
                                    <div class="form-group add_top_30">
                                        <label for="phone">No HP</label>
                                        <input type="text" name="phone" id="phone" class="form-control required">
                                    </div>
                                    <div class="form-group add_top_30">
                                        <label for="address">Alamat</label>
                                        <input type="text" name="address" id="address" class="form-control">
                                    </div>
                                    <div class="form-group add_top_30">
                                        <label for="keperluan">Keperluan</label>
                                        <input type="text" name="keperluan" id="keperluan" class="form-control">
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" name="process" class="submit">Submit</button>
                                    </div>
                                </div>
                            </div>
                            <!-- /step last-->

                        </div>
                        <!-- /middle-wizard -->
                    </form>
                </div>
                <!-- /Wizard container -->
            </div>
        </div><!-- /Row -->
    </div><!-- /Form_container -->
</div>
<!-- /container -->

<div class="container">
    <footer id="home" class="clearfix">
        <p>© 2020 IT Yayasan Vitka</p>
        <ul>
            <li><a href="#" class="animated_link">Prevention Tips</a></li>
        </ul>
    </footer>
    <!-- end footer-->
</div>
<!-- /container -->

<div class="cd-overlay-nav">
    <span></span>
</div>
<!-- /cd-overlay-nav -->
<div class="cd-overlay-content">
    <span></span>
</div>
<!-- /cd-overlay-content -->
@include('footer')
</body>
</html>
