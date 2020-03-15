<?php
session_start();
if(!$_SESSION['admin']){
  header('location:index');
}
include "../functions/WB-functions.php";

?>
<!doctype html>
<html class="no-js" lang="en">
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <!-- title -->
        <title>Web-builder</title>

        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1" />

        <?php include_once '../plugins/WB-resources.php'?>
    </head>
    <body>
        <!-- start header -->
        <header>
            <!-- start navigation -->
                <?php include_once '../plugins/WB-nav.php'?>

            <!-- end navigation -->
        </header>
        <!-- end header -->
        <section class="wow fadeIn bg-light-gray padding-35px-tb page-title-small top-space" style="margin-top: 109px; visibility: visible; animation-name: fadeIn;">
            <div class="container">
                <div class="row equalize">
                    <div class="col-lg-8 col-md-6 col-sm-6 col-xs-12 display-table" style="height: 26px;">
                        <div class="display-table-cell vertical-align-middle text-left xs-text-center">
                            <!-- start page title -->
                            <h1 class="alt-font text-dark-gray font-weight-600 no-margin-bottom ">Blogpost template</h1>
                            <!-- end page title -->
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <section>
            <div class="container">
                <div class="row">
                    <main class="col-md-12 col-sm-12 col-xs-12 right-sidebar sm-margin-60px-bottom xs-margin-40px-bottom no-padding-left sm-no-padding-right">
                        <div class="col-md-12 col-sm-12 col-xs-12 blog-details-text last-paragraph-no-margin">
                            <div class="blog-post-content margin-45px-bottom xs-margin-30px-bottom xs-text-center">
                              <img src="http://placehold.it/900x600" alt="" class="width-100 margin-45px-bottom" data-no-retina="">
                            </div>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. <strong class="text-extra-dark-gray">Lorem Ipsum has been the industry's</strong> standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more <u>recently with desktop publishing</u> software like aldus pagemaker including versions.</p>
                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the lorem ipsum generators on the internet tend to repeat predefined chunks as necessary, making this the <strong class="text-extra-dark-gray">first true generator on the internet.</strong> It uses a dictionary of over 200 Latin words, combined with a <u>handful of model sentence structures,</u> to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour.</p>
                            <blockquote class="border-color-deep-pink">
                                <p>Reading is not only informed by what’s going on with us at that moment, but also governed by how our eyes and brains work to process information. What you see and what you’re experiencing as you read these words is quite different.</p>
                                <footer>Jason Maria</footer>
                            </blockquote>
                            <img src="http://placehold.it/900x600" alt="" class="width-100 margin-45px-bottom" data-no-retina="">
                            <!-- dropcaps -->
                            <p><span class="first-letter first-letter-block bg-extra-dark-gray text-white">M</span>Lorem Ipsum is simply dummy text of the printing and typesetting industry. It has survived not only five centuries. Simply dummy text of the printing and typesetting industry. It has survived not only five centuries. There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                            <!-- end dropcaps -->
                            <figure class="wp-caption alignleft"><img alt="" src="http://placehold.it/350x255" data-no-retina=""><figcaption class="wp-caption-text">There is no sincerer love than the love of food.</figcaption></figure>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the lorem ipsum generators on the internet tend to repeat predefined chunks as necessary, making this the first true generator on the internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour.</p>
                            <span class="text-extra-dark-gray font-weight-500 margin-15px-bottom display-block text-medium">You can never quit. Winners never quit, and quitters never win</span>
                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the lorem ipsum generators on the internet tend to repeat predefined chunks as necessary, making this the first true generator on the internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour.</p>
                        <img src="http://placehold.it/900x600" alt="" class="width-100 margin-45px-bottom" data-no-retina=""></div>

                    </main>

                </div>
            </div>
        </section>




    </body>
</html>
