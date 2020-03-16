<?php
include_once 'functions/functions.php';

?>
<!doctype html>
<html class="no-js" lang="en">
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <!-- title -->
        <title>Five elements advisory | Kenya</title>

        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1" />
        <?php
        $where = array('page'=>'contact');
        $get_seo = $obj->fetch_records('seo',$where);
        foreach($get_seo as $row)
        {
            $author = $row['author'];
            $description = $row['description'];
            $keywords = $row['keywords'];
        }
        ?>
        <meta name="author" content="<?=$author?>">
        <!-- description -->
        <meta name="description" content="<?=$description?>">
        <!-- keywords -->
        <meta name="keywords" content="<?=$keywords?>"> <!-- favicon -->
       <?php include_once 'plugins/resources.php'?>
    </head>
    <body>
        <!-- start header -->
        <header>
            <!-- start navigation -->
                <?php include_once 'plugins/nav.php'?>

            <!-- end navigation -->
        </header>
        <!-- end header -->


        <!-- start contact section -->
        <section class="no-padding bg-extra-dark-gray margin-100px-top">
            <div class="container-fluid">
                <div class="row equalize sm-equalize-auto">
                    <div class="col-md-6 col-sm-12 no-padding cover-background sm-height-450px xs-height-350px wow fadeInLeft" style="background: url(management/images/nairobi-kenya-wallpaper.jpg)"></div>
                    <div class="col-md-6 col-sm-12 no-padding col-2-nth wow fadeInRight">
                        <!-- start contact item -->
                        <div class="col-md-6 col-sm-6 col-xs-12 display-table bg-extra-dark-gray height-350px last-paragraph-no-margin">
                            <div class="display-table-cell vertical-align-middle text-center">
                                <i class="icon-map text-deep-pink icon-medium margin-25px-bottom"></i>
                                <div class="text-white  alt-font font-weight-600 margin-5px-bottom">Contact Address</div>
                                <p class="width-60 md-width-80 center-col text-medium"><?=$address?></p>
                            </div>
                        </div>
                        <!-- end contact item -->
                        <!-- start contact item -->
                        <div class="col-md-6 col-sm-6 col-xs-12 display-table bg-black height-350px last-paragraph-no-margin">
                            <div class="display-table-cell vertical-align-middle text-center">
                                <i class="icon-chat text-deep-pink icon-medium margin-25px-bottom"></i>
                                <div class="text-white  alt-font font-weight-600 margin-5px-bottom">Let's Talk</div>
                                <p class="center-col text-medium no-margin">Mobile : <?=$mobile1?></p>
                                <!-- <p class="center-col text-medium">Mobile 2: <?=$mobile1?></p> -->
                            </div>
                        </div>
                        <!-- end contact item -->
                        <!-- start contact item -->
                        <div class="col-md-6 col-sm-6 col-xs-12 display-table bg-black height-350px last-paragraph-no-margin">
                            <div class="display-table-cell vertical-align-middle text-center">
                                <i class="icon-envelope text-deep-pink icon-medium margin-25px-bottom"></i>
                                <div class="text-white  alt-font font-weight-600 margin-5px-bottom">Email Us</div>
                                <p class="center-col text-medium no-margin"><a href="mailto:<?=$email1?>"><?=$email1?></a></p>
                                <!-- <p class="center-col text-medium"><a href="mailto:<?=$email2?>"><?=$email2?></a></p> -->
                            </div>
                        </div>
                        <!-- end contact item -->
                        <!-- start contact item -->
                        <div class="col-md-6 col-sm-6 col-xs-12 display-table bg-extra-dark-gray height-350px last-paragraph-no-margin">
                            <div class="display-table-cell vertical-align-middle text-center">
                                <i class="icon-clock text-deep-pink icon-medium margin-25px-bottom"></i>
                                <div class="text-white  alt-font font-weight-600 margin-5px-bottom">Working Hours</div>
                                <p class="center-col text-medium no-margin">Mon to Sat - 8 AM to 11 PM</p>
                                <p class="center-col text-medium">Sunday - 10 AM to 6 PM</p>
                            </div>
                        </div>
                        <!-- end contact item -->
                    </div>
                </div>
            </div>
        </section>
        <!-- end contact section -->
        <!-- start map section -->
        <section class="wow fadeIn no-padding-bottom" id="location">
            <div class="row">
                <div class="col-md-7 col-sm-12 col-xs-12 center-col text-center margin-100px-bottom xs-margin-40px-bottom">
                    <div class="position-relative overflow-hidden width-100">
                        <span class="text-small text-outside-line-full alt-font font-weight-600 ">Location address</span>
                    </div>
                </div>
            </div>
            <iframe class="width-100" style="height:600px;" src="<?=$map?>"
            ></iframe>
        </section>
        <!-- end map section -->
        <section class="wow fadeIn bg-light-gray">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center social-style-4 border round">
                        <span class="text-medium font-weight-600  display-block alt-font text-extra-dark-gray margin-30px-bottom">On social networks</span>
                        <div class="social-icon-style-4">
                            <ul class="margin-30px-top large-icon">
                                <li><a class="facebook" href="<?=$facebook?>" target="_blank"><i class="fab fa-facebook-f"></i><span></span></a></li>
                                <li><a class="linkedin" href="<?=$linkedin?>" target="_blank"><i class="fab fa-linkedin-in"></i><span></span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- start footer -->
     <?php include_once 'plugins/footer.php'?>
    </body>
</html>
