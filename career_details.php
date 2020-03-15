<?php
include "functions/functions.php";

if($_GET['id'])
{
    $id = intval($_GET['id']);
    $where = array('id'=>$id,'state'=>1);

    $get_career = $obj->fetch_records('careers',$where);
    if($get_career)
    {
        foreach($get_career as $row)
        {
            $deadline = $row['deadline'];
            $title = $row['title'];
            $description = $row['description'];
            $file = $row['media'];
            $deadline = $row['deadline'];

        }
    }
    else{
        header('location:404');
    }
}
else{
    header('location:404');
}

?>
<!doctype html>
<html class="no-js" lang="en">
    <head>
        <!-- title -->
        <title>Career | five elements advisory</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1" />
<!-- favicon -->
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

        <!-- start page title section -->
        <section class="wow fadeIn bg-light-gray padding-35px-tb page-title-small top-space">
            <div class="container">
                <div class="row equalize xs-equalize-auto">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 display-table">
                        <div class="display-table-cell vertical-align-middle text-left xs-text-center">
                            <!-- start page title -->
                            <h1 class="alt-font text-custom-blue font-weight-600 no-margin-bottom case"><?=$title?></h1>
                            <!-- end page title -->
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 display-table text-right xs-text-left xs-margin-10px-top">
                        <div class="display-table-cell vertical-align-middle breadcrumb text-small alt-font">
                            <!-- breadcrumb -->
                            <ul class="xs-text-center case">
                                <li><?=$row['contract']?></li>
                                <li class="text-dark-gray">Application deadline : <?=$row['deadline']?></li>
                            </ul>
                            <!-- end breadcrumb -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end page title section -->


        <section class="wow fadeIn" style="visibility: visible; animation-name: fadeIn;">
                    <div class="container md-text-left ">
                        <div class="row">
                            <div class="col-md-9 center-col last-paragraph-no-margin md-text-left">
                            <?php
                                if($row['media'])
                                {
                                    ?>
                                    <a class="btn btn-small btn-custom-blue font-weight-700" target="_blank" href="management/<?=$row['media']?>">Download pdf</a><br><br>
                                <?php
                                }
                                ?>

                                <?=$row['description']?>
                            </div>
                        </div>

                    </div>
                </section>






        <!-- start footer -->
        <?php include_once('plugins/footer.php') ?>
        <!-- end footer -->


    </body>
</html>
