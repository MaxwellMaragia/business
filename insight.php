<?php
include "functions/functions.php";
$id = intval($_GET['id']);

$where = array('id'=>$id);
$get_insight = $obj->fetch_records('news',$where);
if($get_insight)
{
    foreach($get_insight as $row)
    {
        $title = $row['heading'];
        $body = $row['body'];
        $media = $row['media_type'];
        $file = $row['media'];
        $date = $row['date'];

        $aid = $row['author'];
        $cid = $row['category'];

        //get category
        $where = array('id'=>$cid);
        $get_cat = $obj->fetch_records('categories',$where);
        foreach ($get_cat as $row)
        {
            $category = $row['name'];
        }

        //get author
        $where = array('id'=>$aid);
        $get_user = $obj->fetch_records('users',$where);
        foreach ($get_user as $row)
        {
            $author = $row['name'];
        }


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
        <title>5elements advisory | Insight</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1" />
      <!-- favicon -->
       <?php include_once 'plugins/resources.php'?>
    </head>
    <body>
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v6.0"></script>
        <!-- start header -->
        <?php include_once 'plugins/nav.php'?>
        <!-- end header -->
        <!-- start page title section -->

        <section class="wow fadeIn bg-light-gray padding-35px-tb page-title-small top-space">
            <div class="container">
                <div class="row equalize xs-equalize-auto">
                    <div class="col-lg-7 col-md-6 col-sm-6 col-xs-12 display-table">
                        <div class="display-table-cell vertical-align-middle text-left xs-text-center">
                            <!-- start page title -->
                            <h1 class="alt-font text-custom-blue font-weight-600 no-margin-bottom "><?=$title?></h1>
                            <!-- end page title -->
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-6 col-sm-6 col-xs-12 display-table text-right xs-text-left xs-margin-10px-top">
                        <div class="display-table-cell vertical-align-middle breadcrumb text-small alt-font">
                            <!-- breadcrumb -->
                            <ul class="xs-text-center ">
                                <li><span class="text-dark-gray"><?=$date?></span></li>
                                <li><span class="text-dark-gray">by <?=$author?></span></li>
                                <li class="text-dark-gray"><a><?=$category?></a></li>
                            </ul>
                            <!-- end breadcrumb -->
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- end page title section -->
        <!-- start post content section -->
        <!-- start section -->
        <section class="wow fadeIn">
            <div class="container">
                <div class="row">
                    <div class="col-md-9 center-col last-paragraph-no-margin md-text-left">
                        <?php
                        if($media == 'image')
                        {
                            ?>
                            <img src="management/<?=$file?>" alt="" class="width-100 margin-50px-bottom sm-margin-30px-bottom">
                        <?php
                        }
                        else{
                            ?>
                            <video controls>
                                <source src="management/<?=$file?>" type="video/mp4">
                                <source src="movie.ogg" type="video/ogg">
                                Your browser does not support the video tag.
                            </video>
                        <?php
                        }
                        ?>
                        <div>
                            <?=$body?>
                            <script>document.write("<div class='fb-comments' data-href='" + window.location.href + "' data-num-posts='2' data-width='470'></div>");</script>
                        </div>

                    </div>

                </div>
            </div>
        </section>
        <!-- end section -->
        <!-- end blog content section -->
        <!-- start footer -->
    <?php include_once 'plugins/footer.php'?>
    </body>
</html>
