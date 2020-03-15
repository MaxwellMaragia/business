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
                            <h1 class="alt-font text-dark-gray font-weight-600 no-margin-bottom ">Typography</h1>
                            <!-- end page title -->
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <section class="wow fadeIn" style="visibility: visible; animation-name: fadeIn;">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-sm-12 center-col last-paragraph-no-margin">
                        <h1 class="text-extra-dark-gray alt-font font-weight-600">Heading Style 1<span class="text-light-gray xs-display-block">(H1)</span></h1>
                        <p class="text-medium line-height-30 text-medium-gray">Ferri reque integre mea ut, eu eos vide errem noluisse. Putent laoreet et ius. <strong>Vel utroque dissentias ut,</strong> nam ad soleat alterum maluisset, cu est copiosae intellegat inciderint. Nam ei eirmod consequuntur, quod nostrum consectetuer usu ut. Vim veniam singulis senserit an, sumo consul mentitum duo ea. <u>Copiosae antiopam</u> ius ea, meis explicari reformidans vix cu.Ut possit patrioque prodesset est, vivendum concludaturque conclusionemque eam in.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="wow fadeIn" style="visibility: visible; animation-name: fadeIn;">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-sm-12 center-col last-paragraph-no-margin">
                        <h1 class="text-extra-dark-gray alt-font font-weight-600">Heading Style 1<span class="text-light-gray xs-display-block">(H1)</span></h1>
                        <p class="text-medium line-height-30 text-medium-gray">Ferri reque integre mea ut, eu eos vide errem noluisse. Putent laoreet et ius. <strong>Vel utroque dissentias ut,</strong> nam ad soleat alterum maluisset, cu est copiosae intellegat inciderint. Nam ei eirmod consequuntur, quod nostrum consectetuer usu ut. Vim veniam singulis senserit an, sumo consul mentitum duo ea. <u>Copiosae antiopam</u> ius ea, meis explicari reformidans vix cu.Ut possit patrioque prodesset est, vivendum concludaturque conclusionemque eam in.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="wow fadeIn" style="visibility: visible; animation-name: fadeIn;">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-sm-12 center-col last-paragraph-no-margin">
                        <h3 class="text-extra-dark-gray alt-font font-weight-600">Heading Style 3 <span class="text-light-gray xs-display-block">(H3)</span></h3>
                        <p class="text-medium line-height-30 text-medium-gray">Ferri reque integre mea ut, eu eos vide errem noluisse. Putent laoreet et ius. <strong>Vel utroque dissentias ut,</strong> nam ad soleat alterum maluisset, cu est copiosae intellegat inciderint. Nam ei eirmod consequuntur, quod nostrum consectetuer usu ut. Vim veniam singulis senserit an, sumo consul mentitum duo ea. <u>Copiosae antiopam</u> ius ea, meis explicari reformidans vix cu.Ut possit patrioque prodesset est, vivendum concludaturque conclusionemque eam in.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="bg-light-gray wow fadeIn" style="visibility: visible; animation-name: fadeIn;">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-sm-12 center-col last-paragraph-no-margin">
                        <h4 class="text-extra-dark-gray alt-font font-weight-600">Heading Style 4 <span class="text-light-gray xs-display-block">(H4)</span></h4>
                        <p class="text-medium line-height-30 text-medium-gray">Ferri reque integre mea ut, eu eos vide errem noluisse. Putent laoreet et ius. <strong>Vel utroque dissentias ut,</strong> nam ad soleat alterum maluisset, cu est copiosae intellegat inciderint. Nam ei eirmod consequuntur, quod nostrum consectetuer usu ut. Vim veniam singulis senserit an, sumo consul mentitum duo ea. <u>Copiosae antiopam</u> ius ea, meis explicari reformidans vix cu.Ut possit patrioque prodesset est, vivendum concludaturque conclusionemque eam in.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="wow fadeIn" style="visibility: visible; animation-name: fadeIn;">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-sm-12 center-col last-paragraph-no-margin">
                        <h5 class="text-extra-dark-gray alt-font font-weight-600">Heading Style 5 <span class="text-light-gray xs-display-block">(H5)</span></h5>
                        <p class="text-medium line-height-30 text-medium-gray">Ferri reque integre mea ut, eu eos vide errem noluisse. Putent laoreet et ius. <strong>Vel utroque dissentias ut,</strong> nam ad soleat alterum maluisset, cu est copiosae intellegat inciderint. Nam ei eirmod consequuntur, quod nostrum consectetuer usu ut. Vim veniam singulis senserit an, sumo consul mentitum duo ea. <u>Copiosae antiopam</u> ius ea, meis explicari reformidans vix cu.Ut possit patrioque prodesset est, vivendum concludaturque conclusionemque eam in.</p>
                    </div>
                </div>
            </div>
        </section>
  
    </body>
</html>
