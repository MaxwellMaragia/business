<?php
include_once 'functions/functions.php';



//check if category is legit
$cat = intval($_GET['id']);
$where = array('category'=>$cat);
$where2 = array('id'=>$cat);
$get_category_name = $obj->fetch_records('categories',$where2);
foreach($get_category_name as $row)
{
   $category_name = $row['name'];
}
if($obj->fetch_records('news',$where))
{
    //get total number of rooms
    $sql = "SELECT COUNT(id) FROM news WHERE state=1";
    $query = mysqli_query($obj->con,$sql);
    $row = mysqli_fetch_row($query);

//total row count
    $rows = $row[0];

//total number of results displayed per page
    $page_rows = 6;
    $last = ceil($rows/$page_rows);

//make sure last cannot be less than one
    if($last<1){
        $last = 1;
    }
//establish pagenum variable

    $pagenum = 1;
//get pagenum from url if present, else == 1


    if(isset($_GET['pn']))
    {
        $pagenum = preg_replace('#[^0-9]#', '', $_GET['pn']);

    }

//this makes sure the page number is below 1 or more than the past page
    if($pagenum < 1){
        $pagenum = 1;
    }
    else if($pagenum > $last) {
        $pagenum = $last;
    }

//this sets the range of rows to query for the chosen pagenum
    $limit = 'LIMIT ' .($pagenum - 1) * $page_rows .',' .$page_rows;

//this is the query that grabs only one page worth of rows
    $sql = "SELECT * FROM news WHERE state=1 AND category = $cat ORDER BY id DESC $limit ";
    $query = mysqli_query($obj->con,$sql);

//establish the pagination control variables
    $paginationCtrls = '';
//if there is more than 1 page worth of results
    if($last != 1){
        /*First we check if we are on page one. If we are then we don't need a link to the previous page or the first page so we do nothing. If we aren't then we
        generate links to the first page, and to the previous page. */
        if ($pagenum > 1) {
            $previous = $pagenum - 1;
            $paginationCtrls .= ' &nbsp; &nbsp; <li style="margin-top:-5px;"><a href="./insights_category?id='.$cat.'&pn='.$previous.'" rel="next" class="page-prev"><span class="fa fa-arrow-left"></span></a></li> ';
            //render clickable number links that should appear on the left of the target page number

            for ($i = $pagenum-4; $i < $pagenum; $i++){
                if($i > 0){
                    $paginationCtrls .='<li><a href="./insights_category?id='.$cat.'&pn='.$i.'" class=" ">'.$i.'</a></li> &nbsp; ';
                }
            }


        }
        // Render the target page number, but without it being a link
        $paginationCtrls .= '<li class="active"><a href="#">'.$pagenum.'</a></li> &nbsp; ';
        // Render clickable number links that should appear on the right
        for ($i = $pagenum+1; $i <= $last; $i++)
        {
            $paginationCtrls .= '<li><a href="./insights_category?id='.$cat.'&pn='.$i.'" class=" ">'.$i.'</a></li> &nbsp; ';
            if($i >= $pagenum + 4)
            {
                break;
            }
        }

        if ($pagenum != $last)
        {
            $next = $pagenum + 1;
            $paginationCtrls .= ' &nbsp; &nbsp; <li style="margin-top:-5px;"><a href="./insights_category?id='.$cat.'&pn='.$next.'" rel="next" class="page-next"><span class="fa fa-arrow-right"></span></a></li> ';
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
    <title>Insights | 5Elements</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1" />
  <!-- favicon -->
    <?php include_once 'plugins/resources.php'?>
    <![endif]-->
</head>
<body>
<!-- start header -->
<?php include_once 'plugins/nav.php'?>
<!-- end header -->

<!-- start page title section -->
<section class="wow fadeIn bg-light-gray padding-35px-tb page-title-small top-space top-space" style="background:#f0f0f0">
    <div class="container">
        <div class="row equalize xs-equalize-auto">
            <div class="col-lg-8 col-md-6 col-sm-6 col-xs-12 display-table">
                <div class="display-table-cell vertical-align-middle text-left xs-text-center">
                    <!-- start page title -->
                    <h1 class="alt-font text-dark-gray font-weight-600 no-margin-bottom "><?=$category_name?></h1>
                    <!-- end page title -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end page title section -->

<!-- start blog section -->
<section class="wow fadeIn">
    <div class="container">


        <div class="row">
            <main class="col-md-9 col-sm-12 col-xs-12 right-sidebar sm-margin-60px-bottom xs-margin-40px-bottom no-padding-left sm-no-padding-right">
                <div class="col-2-nth">

                    <?php
                    while ($row = mysqli_fetch_assoc($query))
                    {
                        $cid = $row['author'];
                        $sql = "SELECT name FROM users WHERE id=$cid";
                        $exe = mysqli_query($obj->con,$sql);
                        $get_author = mysqli_fetch_assoc($exe);
                        $author = $get_author['name'];
                        ?>
                        <!-- start blog post item -->
                        <div class="col-md-6 col-sm-6 col-xs-12 wow fadeInUp last-paragraph-no-margin sm-margin-50px-bottom xs-margin-30px-bottom" data-wow-delay="0.2s">
                            <div class="blog-post blog-post-style1 xs-text-center">
                                <div class="blog-post-images overflow-hidden margin-25px-bottom sm-margin-20px-bottom">
                                    <a href="insight?id=<?=$row['id']?>">
                                        <?php
                                        if($row['media_type']=='image')
                                        {
                                            ?>
                                            <img src="management/<?=$row['media']?>" alt="by <?=$author?>">
                                            <?php
                                        }
                                        else if($row['media_type']=='video'){
                                            ?>
                                            <video  controls >
                                                <source src="management/<?=$row['media']?>" type="video/mp4">
                                                <source src="movie.ogg" type="video/ogg">
                                                Your browser does not support the video tag.
                                            </video>
                                            <?php
                                        }
                                        ?>

                                    </a>
                                </div>
                                <div class="post-details">
                                    <span class="post-author text-extra-small text-medium-gray text-uppercase display-block margin-10px-bottom  xs-margin-5px-bottom"><?=$row['date']?> | by <?=$author?></span>
                                    <a href="insight?id=<?=$row['id']?>" class="post-title text-medium text-extra-dark-gray width-90 display-block sm-width-100"><?=$row['heading']?></a>
                                    <div class="separator-line-horrizontal-full bg-medium-light-gray margin-20px-tb sm-margin-15px-tb"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end blog post item -->
                        <?php
                    }
                    ?>

                </div>

                <div class="col-md-12 col-sm-12 col-xs-12 text-center margin-100px-top sm-margin-50px-top wow fadeInUp">
                    <div class="pagination text-small text-uppercase text-extra-dark-gray">
                        <ul>
                            <?php echo $paginationCtrls;?>
                        </ul>
                    </div>
                </div>
                <!-- end slider pagination -->
            </main>
            <!-- start right sidebar  -->

            <aside class="col-md-3 col-sm-12 col-xs-12 pull-right">
                <div class="display-inline-block width-100 margin-45px-bottom xs-margin-25px-bottom">
                <form method="GET" action="search">
                        <div class="position-relative">
                            <input type="text" class="bg-transparent text-small no-margin border-color-extra-light-gray medium-input pull-left" placeholder="Enter your keywords..." name="key" required="required">
                            <button type="submit" class="bg-transparent  btn position-absolute right-0 top-1"><i class="fas fa-search no-margin-left"></i></button>
                        </div>
                    </form>
                </div>

                <div class="margin-50px-bottom">
                    <div class="text-extra-dark-gray margin-20px-bottom alt-font text-uppercase font-weight-600 text-small aside-title"><span>Follow Us</span></div>
                    <div class="social-icon-style-1 text-center">
                        <ul class="extra-small-icon">
                            <li><a class="facebook" href="<?=$facebook?>" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a class="linkedin" href="<?=$linkedin?>" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="margin-45px-bottom xs-margin-25px-bottom">
                    <div class="text-extra-dark-gray margin-20px-bottom alt-font text-uppercase font-weight-600 text-small aside-title"><span>Categories</span></div>
                    <ul class="list-style-6 margin-50px-bottom text-small">
                        <?php

                        $sql = "SELECT DISTINCT categories.id as cat_id,categories.name as cat_name,news.category as news_cat FROM news JOIN categories WHERE categories.id = news.category";
                        $exe = mysqli_query($obj->con,$sql);

                        while($get_category = mysqli_fetch_assoc($exe))
                        {
                            $category = $get_category['cat_name'];
                            $cat_id = $get_category['news_cat'];
                            if($cat == $cat_id)
                            {
                                ?>
                                <li class="text-custom-yellow">
                                    <?=$category?>

                                    <span>
                                    <?php
                                    $sql2 = "SELECT id FROM news WHERE category = $cat_id AND state=1";
                                    $exe2 =  mysqli_query($obj->con,$sql2);
                                    echo mysqli_num_rows($exe2);

                            }
                            else{
                                ?>
                                <li>
                                    <a href="insights_category?id=<?=$cat_id?>"><?=$category?>
                                    </a>
                                    <span>
                                    <?php
                                    $sql2 = "SELECT id FROM news WHERE category = $cat_id AND state=1";
                                    $exe2 =  mysqli_query($obj->con,$sql2);
                                    echo mysqli_num_rows($exe2);
                                    ?>
                                </span>
                                </li>
                                <?php
                            }
                        }

                        ?>


                    </ul>
                </div>



            </aside>
            <!-- end right sidebar -->
        </div>
    </div>
</section>
<!-- end blog section -->
<!-- start footer -->
<?php include_once 'plugins/footer.php'?>
</body>
