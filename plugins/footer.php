<?php
$sql = "SELECT value FROM general_settings WHERE name='footer_text'";
$exe = mysqli_query($obj->con,$sql);
$get_data = mysqli_fetch_assoc($exe);
$ft = $get_data['value'];
?>
<footer class="footer-standard-dark bg-extra-dark-gray">
    <div class="footer-widget-area padding-five-tb xs-padding-30px-tb">
        <div class="container">
            <div class="row equalize xs-equalize-auto">
                <div class="col-md-3 col-sm-6 col-xs-12 widget border-right border-color-medium-dark-gray sm-no-border-right sm-margin-30px-bottom xs-text-left">
                    <!-- start logo -->
                    <!-- <a href="index.html" class="margin-20px-bottom display-inline-block"><img class="footer-logo" src="images/logo.png" data-rjs="images/logo-white@2x.png" alt="Pofo"></a> -->
                    <!-- end logo -->

                    <p class="text-small width-95 xs-width-100"><?=$ft?></p>
                    <!-- start social media -->
                    <div class="social-icon-style-8 display-inline-block vertical-align-middle">
                        <ul class="small-icon no-margin-bottom">
                            <li><a class="facebook text-white" href="<?=$facebook?>" target="_blank"><i class="fab fa-facebook-f" aria-hidden="true"></i></a></li>
                            <li><a class="linkedin text-white" href="<?=$linkedin?>" target="_blank"><i class="fab fa-linkedin no-margin-right" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                    <!-- end social media -->
                </div>
                <!-- start additional links -->
                <div class="col-md-3 col-sm-6 col-xs-12 widget border-right border-color-medium-dark-gray padding-45px-left sm-padding-15px-left sm-no-border-right sm-margin-30px-bottom xs-text-left">
                    <div class="widget-title alt-font text-small text-custom-yellow btn-custom-blue margin-10px-bottom font-weight-600">Quick Links</div>
                    <ul class="list-unstyled">
                        <li><a class="text-small" href="index">Home</a></li>
                        <li><a class="text-small" href="about">About us</a></li>
                        <li><a class="text-small" href="insights">Insights</a></li>
                        <li><a class="text-small" href="careers">Careers</a></li>
                    </ul>
                </div>
                <!-- end additional links -->
                <!-- start contact information -->
                <div class="col-md-3 col-sm-6 col-xs-12 widget border-right border-color-medium-dark-gray padding-45px-left sm-padding-15px-left sm-clear-both sm-no-border-right  xs-margin-30px-bottom xs-text-left">
                    <div class="widget-title alt-font text-small text-custom-yellow btn-custom-blue margin-10px-bottom font-weight-600">Address</div>
                    <p class="text-small display-block margin-15px-bottom width-80"><?=$address?></p>
                    <a href="<?=$map?>" target="_blank" class="text-small btn-custom-blue text-decoration-underline">Get Directions</a>
                </div>
                <!-- end contact information -->
                <!-- start instagram -->
                <div class="col-md-3 col-sm-6 col-xs-12 widget padding-45px-left sm-padding-15px-left xs-text-left">
                    <div class="widget-title alt-font text-small text-custom-yellow btn-custom-blue margin-20px-bottom font-weight-600">Contacts</div>
                    <div class="text-small">Email : <a href="mailto:<?=$email1?>"><?=$email1?></a></div>
                    <!-- <div class="text-small">Email 2: <a href="mailto:<?=$email2?>"><?=$email2?></a></div> -->
                    <div class="text-small">Phone : <a href="tell:<?=$mobile1?>"><?=$mobile1?></a></div>
                    <!-- <div class="text-small">Mobile: <a href="tell:<?=$mobile2?>"><?=$mobile2?></a></div> -->
                </div>
                <!-- end instagram -->
            </div>
        </div>
    </div>
    <div class="bg-dark-footer padding-50px-tb text-center xs-padding-30px-tb">
        <div class="container">
            <div class="row">
                <!-- start copyright -->
                <div class="col-md-6 col-sm-6 col-xs-12 text-left text-small xs-text-left">Copyright &copy; <script>document.write(new Date().getFullYear());</script> 5element</div>
                <div class="col-md-6 col-sm-6 col-xs-12 text-right text-small xs-text-left">
                    Developed by <a href="http://www.codeisystems.co.ke" target="_blank" class="text-dark-gray">Codei systems ke</a>
                </div>
                <!-- end copyright -->
            </div>
        </div>
    </div>
</footer>
<!-- end footer -->
<!-- start scroll to top -->
<a class="scroll-top-arrow" href="javascript:void(0);"><i class="ti-arrow-up"></i></a>
<!-- end scroll to top -->
<!-- javascript libraries -->
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/modernizr.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="js/skrollr.min.js"></script>
<script type="text/javascript" src="js/smooth-scroll.js"></script>
<script type="text/javascript" src="js/jquery.appear.js"></script>
<!-- menu navigation -->
<script type="text/javascript" src="js/bootsnav.js"></script>
<script type="text/javascript" src="js/jquery.nav.js"></script>
<!-- animation -->
<script type="text/javascript" src="js/wow.min.js"></script>
<!-- page scroll -->
<script type="text/javascript" src="js/page-scroll.js"></script>
<!-- swiper carousel -->
<script type="text/javascript" src="js/swiper.min.js"></script>
<!-- counter -->
<script type="text/javascript" src="js/jquery.count-to.js"></script>
<!-- parallax -->
<script type="text/javascript" src="js/jquery.stellar.js"></script>
<!-- magnific popup -->
<script type="text/javascript" src="js/jquery.magnific-popup.min.js"></script>
<!-- portfolio with shorting tab -->
<script type="text/javascript" src="js/isotope.pkgd.min.js"></script>
<!-- images loaded -->
<script type="text/javascript" src="js/imagesloaded.pkgd.min.js"></script>
<!-- pull menu -->
<script type="text/javascript" src="js/classie.js"></script>
<script type="text/javascript" src="js/hamburger-menu.js"></script>
<!-- counter -->
<script type="text/javascript" src="js/counter.js"></script>
<!-- fit video -->
<script type="text/javascript" src="js/jquery.fitvids.js"></script>
<!-- equalize -->
<script type="text/javascript" src="js/equalize.min.js"></script>
<!-- skill bars -->
<script type="text/javascript" src="js/skill.bars.jquery.js"></script>
<!-- justified gallery -->
<script type="text/javascript" src="js/justified-gallery.min.js"></script>
<!--pie chart-->
<script type="text/javascript" src="js/jquery.easypiechart.min.js"></script>
<!-- instagram -->
<script type="text/javascript" src="js/instafeed.min.js"></script>
<!-- retina -->
<script type="text/javascript" src="js/retina.min.js"></script>
<!-- revolution -->
<script type="text/javascript" src="revolution/js/jquery.themepunch.tools.min.js"></script>
<script type="text/javascript" src="revolution/js/jquery.themepunch.revolution.min.js"></script>
<!-- revolution slider extensions (load below extensions JS files only on local file systems to make the slider work! The following part can be removed on server for on demand loading) -->
<!--<script type="text/javascript" src="revolution/js/extensions/revolution.extension.actions.min.js"></script>
<script type="text/javascript" src="revolution/js/extensions/revolution.extension.carousel.min.js"></script>
<script type="text/javascript" src="revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
<script type="text/javascript" src="revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
<script type="text/javascript" src="revolution/js/extensions/revolution.extension.migration.min.js"></script>
<script type="text/javascript" src="revolution/js/extensions/revolution.extension.navigation.min.js"></script>
<script type="text/javascript" src="revolution/js/extensions/revolution.extension.parallax.min.js"></script>
<script type="text/javascript" src="revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
<script type="text/javascript" src="revolution/js/extensions/revolution.extension.video.min.js"></script>-->
<!-- setting -->
<script type="text/javascript" src="js/main.js"></script>
