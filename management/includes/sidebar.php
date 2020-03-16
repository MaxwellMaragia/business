<?php
  $userName=$_SESSION['admin'];

//check if admin
  $query="SELECT role FROM users WHERE `username`='$userName'";
  $run=mysqli_query($connect,$query);
  $display=mysqli_fetch_array($run);
  $role=$display['role'];

 ?>
<aside class="main-sidebar sidebar-dark-primary elevation-4" style="zoom:90%;">
    <!-- Brand Logo -->
    <a href="index" class="brand-link">
        <!-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8"> -->
        <span class="brand-text font-weight-light">5Elements</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info"><a>
                <?php
                if($_SESSION['names']){

                   echo $_SESSION['names'];

                }
                ?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->

               <?php
                if(isset($role)){
                    if($role==1){
                      ?>
                       <li class="nav-item">
                    <a href="index" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="../web-builder/blogpost" target="_blank" class="nav-link">
                        <i class="nav-icon fas fa-globe"></i>
                        <p>
                            Web builder
                        </p>
                    </a>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Home page settings
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="banner" class="nav-link">

                                <p>Banner/intro section</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="youtube" class="nav-link">

                                <p>Youtube video section</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-info"></i>
                        <p>
                            About page settings
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="about_section" class="nav-link">

                                <p>About section</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="blue_section" class="nav-link">

                                <p>Blue section</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="ceo_section" class="nav-link">

                                <p>CEO's section</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-clipboard"></i>
                        <p>
                            Services
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="add_service" class="nav-link">

                                <p>Add new</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="services" class="nav-link">

                                <p>View all</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Team members
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="add_member" class="nav-link">

                                <p>Add new</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="members" class="nav-link">

                                <p>View all</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                            Insights
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="add_insight" class="nav-link">

                                <p>add new</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="insights" class="nav-link">

                                <p>View all</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="categories" class="nav-link">

                                <p>Categories</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-suitcase"></i>
                        <p>
                           Careers
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="add_career" class="nav-link">

                                <p>add new</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="careers" class="nav-link">

                                <p>View all</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-comment"></i>
                        <p>
                            Reviews
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="add_review" class="nav-link">

                                <p>add new</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="reviews" class="nav-link">

                                <p>View all</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-download"></i>
                        <p>
                            Downloads
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="add_downloads" class="nav-link">

                                <p>add files</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="view_downloads" class="nav-link">

                                <p>View all</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- <li class="nav-item">
                    <a href="case_study" class="nav-link">
                        <i class="nav-icon fas fa-pen"></i>
                        <p>
                           Case study
                        </p>
                    </a>
                </li> -->

                <!-- <li class="nav-item">
                    <a href="csr" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            CSR
                        </p>
                    </a>
                </li> -->


                <li class="nav-item">
                    <a href="settings" class="nav-link">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>
                            General settings
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="seo" class="nav-link">
                        <i class="nav-icon fas fa-globe"></i>
                        <p>
                            SEO
                        </p>
                    </a>
                </li>

                <li class="nav-item has-treeview"
                <?php if(isset($role)){
                    if($role!=1){
                      echo 'hidden';
                    }else{
                      echo '';
                    }

                } ?>
                >
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                           Staff
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="add_staff" class="nav-link">

                                <p>add new</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="view_staff" class="nav-link">
                                <i class="nav-icon"></i>
                                <p>View all</p>
                            </a>
                        </li>
                    </ul>
                </li>

                      <?php
                    }
                    else{
                     ?>
                     <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                            Insights
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="add_insight" class="nav-link">

                                <p>add new</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="insights" class="nav-link">

                                <p>View all</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="categories" class="nav-link">

                                <p>Categories</p>
                            </a>
                        </li>
                    </ul>
                </li>
                     <?php
                    }

                }
                ?>


            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
