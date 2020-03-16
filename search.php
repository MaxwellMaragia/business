<?php
include_once 'functions/functions.php';

if(isset($_GET['key']))
{
    $keyword = $obj->con->real_escape_string(htmlentities($_GET['key']));


    $sql = "SELECT COUNT(id) FROM news WHERE MATCH (heading,keywords) AGAINST ('$keyword' IN NATURAL LANGUAGE MODE) AND state = 1";
    $exe = mysqli_query($obj->con,$sql);
    $row = mysqli_fetch_row($exe);


    //total row count
    $rows = $row[0];

    //total number of results displayed per page
    $page_rows = 5;
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

    $sql = "SELECT * FROM news WHERE MATCH (heading,keywords) AGAINST ('$keyword' IN NATURAL LANGUAGE MODE) AND state = 1 $limit";
    $query = mysqli_query($obj->con,$sql);

    //establish the pagination control variables
    $paginationCtrls = '';
    //if there is more than 1 page worth of results
    if($last != 1){
        if($last != 1){
        /*First we check if we are on page one. If we are then we don't need a link to the previous page or the first page so we do nothing. If we aren't then we
        generate links to the first page, and to the previous page. */
        if ($pagenum > 1) {
            $previous = $pagenum - 1;
            $paginationCtrls .= ' &nbsp; &nbsp; <li style="margin-top:-5px;"><a href="./search?key='.$keyword.'?&pn='.$previous.'" rel="next" class="page-prev"><span class="fa fa-arrow-left"></span></a></li> ';
            //render clickable number links that should appear on the left of the target page number

            for ($i = $pagenum-4; $i < $pagenum; $i++){
                if($i > 0){
                    $paginationCtrls .='<li><a href="./search?key='.$keyword.'&pn='.$i.'" class=" ">'.$i.'</a></li> &nbsp; ';
                }
            }


        }
        // Render the target page number, but without it being a link
        $paginationCtrls .= '<li class="active"><a href="#">'.$pagenum.'</a></li> &nbsp; ';
        // Render clickable number links that should appear on the right
        for ($i = $pagenum+1; $i <= $last; $i++)
        {
            $paginationCtrls .= '<li><a href="./search?key='.$keyword.'&pn='.$i.'" class=" ">'.$i.'</a></li> &nbsp; ';
            if($i >= $pagenum + 4)
            {
                break;
            }
        }

        if ($pagenum != $last)
        {
            $next = $pagenum + 1;
            $paginationCtrls .= ' &nbsp; &nbsp; <li style="margin-top:-5px;"><a href="./search?key='.$keyword.'&pn='.$next.'" rel="next" class="page-next"><span class="fa fa-arrow-right"></span></a></li> ';
        }
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
        <title>Search results | 5Elements Advisory</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1" />

        <?php include_once 'plugins/resources.php'?>
    </head>
    <body>
        <!-- start header -->
       <?php include_once 'plugins/nav.php'?>
        <!-- end header -->
        <!-- start page title section -->
        <section class="wow fadeIn bg-light-gray padding-35px-tb page-title-small top-space">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12 col-md-12 text-md-left" style="padding-bottom:-20px;">
                        <!-- start page title -->
                        <h1 class="alt-font text-extra-dark-gray font-weight-600 mb-0 ">Search results for "<?=$keyword?>"</h1>
                        <small>(<?=$rows?>) Total results found</small>
                        <!-- end page title -->
                    </div>

                </div>
            </div>
        </section>
        <!-- end page title section -->
        <!-- start section -->
        <section class="wow fadeIn">
            <div class="container">
                <div class="row ">
                    <main class="col-12 col-lg-9 right-sidebar md-padding-15px-lr">

                    <?php
                     if($rows>0){


                        while ($row = mysqli_fetch_assoc($query))
                        {
                            $aid = $row['author'];
                            $sql = "SELECT name FROM users WHERE id=$aid";
                            $exe = mysqli_query($obj->con,$sql);
                            $get_author = mysqli_fetch_assoc($exe);
                            $author = $get_author['name'];


                            ?>
                            <div class="blog-post-content d-inline-block  text-md-left margin-30px-bottom">
                                <div class="row no-gutters align-items-center">
                                    <div class="col-12 col-lg-5 blog-image md-margin-30px-bottom sm-margin-20px-bottom margin-45px-right md-no-margin-right">

                                    <a href="insight?id=<?=$row['id']?>">
                                        <?php
                                        if($row['media_type']=='image')
                                        {
                                            ?>
                                            <img src="management/<?=$row['media']?>" alt="by <?=$author?>" style="height:200px;">
                                        <?php
                                        }
                                        else if($row['media_type']=='video'){
                                            ?>
                                            <video  controls height="200" width="90%">
                                                <source src="management/<?=$row['media']?>" type="video/mp4">
                                                <source src="movie.ogg" type="video/ogg">
                                                Your browser does not support the video tag.
                                            </video>
                                        <?php
                                        }
                                        else if($row['media_type']=='link')
                                        {
                                            ?>
                                            <iframe height="200" width="90%" src="<?=$row['media']?>?rel=0&amp;controls=0&amp;showinfo=0" allowfullscreen="" id="fitvid0"></iframe>
                                            <?php
                                        }
                                        ?>

                                    </a>
                                        
                                    </div>
                                    <div class="col-12 col-lg-6 blog-text">
                                        <div class="content margin-20px-bottom md-no-padding-left ">
                                            <a href="insight?id=<?=$row['id']?>" class="text-extra-dark-gray margin-5px-bottom alt-font text-extra-large font-weight-600 d-inline-block"><?=$row['heading']?></a>
                                            <div class="text-medium-gray text-extra-small margin-15px-bottom  alt-font"><span>By <a class="text-medium-gray"><?=$author?></a></span>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<span><?=$row['date']?></span>&nbsp;&nbsp;&nbsp;</div>
                                            <!-- <p class="m-0 width-95">Lorem Ipsum is simply dummy text of the printing and industry. Lorem Ipsum has been the industry industry’s standard dummy text Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p> -->
                                        </div>
                                        <a class="btn btn-very-small btn-dark-gray " href="insight?id=<?=$row['id']?>">Continue Reading</a>
                                    </div>
                                </div>
                            </div>

                        <?php
                        }
                     }
                     else{
                         ?>
                         <blockquote class="border-color-deep-pink">
                            <p>Ops! No article could be found with the search term <span class="text-info">"<?=$keyword?>"</span>, please refine your search and try again</p>

                        </blockquote>
                         <?php
                     }
                    ?>


                        <!-- start pagination -->
                        <div class="col-12 text-center margin-100px-top px-0 sm-margin-50px-top position-relative wow fadeInUp">
                            <div class="pagination text-small  text-extra-dark-gray justify-content-center">
                                <ul>
                                <?php echo $paginationCtrls;?>
                                </ul>
                            </div>
                        </div>
                        <!-- end pagination -->
                    </main>
                </div>
            </div>
        </section>
        <!-- start section -->
        <!-- start footer -->
        <?php include_once'plugins/footer.php' ?>
    </body>
</html>
