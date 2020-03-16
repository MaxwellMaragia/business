<header class="header-with-topbar">
            <!-- topbar -->
            <div class="top-header-area bg-custom-blue padding-5px-tb">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12 alt-font xs-no-padding-lr xs-text-center">
                            <a href="tel:<?=$mobile1?>" class="text-link-white xs-width-100" title="Call us <?=$mobile1?>">Call us <?=$mobile1?></a>

                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12 hidden-xs xs-no-padding-lr text-right">
                          <a href="csr" class="text-link-white xs-width-100" title="CSR">CSR</a>
                          <div class="separator-line-verticle-extra-small bg-dark-gray display-inline-block margin-two-lr hidden-xs position-relative vertical-align-middle top-minus1"></div>
                          <a href="careers" class="text-link-white xs-width-100" title="careers">Careers</a>
                          <div class="separator-line-verticle-extra-small bg-dark-gray display-inline-block margin-two-lr hidden-xs position-relative vertical-align-middle top-minus1"></div>
                          <a href="contact" class="text-link-white xs-width-100" title="contact">Contact us</a>

                            <div class="icon-social-very-small xs-width-100 xs-text-center display-inline-block">
                                <a href="<?=$facebook?>" title="Facebook" target="_blank" class="text-link-white"><i class="fab fa-facebook-f" aria-hidden="true"></i></a>
                                <a href="<?=$linkedin?>" title="Linked In" target="_blank" class="text-link-white"><i class="fab fa-linkedin-in"></i></a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- end topbar -->
            <!-- start navigation -->
            <nav class="navbar navbar-default bootsnav navbar-top header-light-transparent bg-transparent nav-box-width on no-full">
                <div class="container nav-header-container">
                    <div class="row">
                        <!-- start logo -->
                        <div class="col-md-2 col-xs-5">
                            <a href="index" title="5elements" class="logo">
                              <img src="management/<?=$logo_url?>" data-rjs="management/<?=$logo_url?>" class="logo-dark" alt="5elements" style="margin-top: 7px;">
                              <img src="management/<?=$logo_url?>" data-rjs="management/<?=$logo_url?>" alt="5elements" class="logo-light default" style="margin-top: 7px;">
                            </a>
                        </div>
                        <!-- end logo -->
                        <div class="col-md-7 col-xs-2 width-auto pull-right accordion-menu xs-no-padding-right">
                            <button type="button" class="navbar-toggle collapsed pull-right" data-toggle="collapse" data-target="#navbar-collapse-toggle-1" style="margin-right:20px;">
                                <span class="sr-only">toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>

                            <div class="navbar-collapse collapse pull-right" id="navbar-collapse-toggle-1">
                              <ul id="accordion" class="nav navbar-nav navbar-left no-margin alt-font text-normal" data-in="fadeIn" data-out="fadeOut">
                                  <!-- start menu item -->


                                  <li>
                                      <a href="about">About us</a>
                                      <!-- start sub menu -->
                                  </li>
                                  <li>
                                      <a href="index#services">Our services</a>
                                      <!-- start sub menu -->
                                  </li>
                                  <li>
                                      <a href="insights">Insights</a>
                                      <!-- start sub menu -->
                                  </li>
                                  <li>
                                      <a href="index#testimonials">Testimonials</a>
                                      <!-- start sub menu -->
                                  </li>

                                  <div class="visible-xs">
                                      <li>
                                          <a href="careers">Careers</a>
                                          <!-- start sub menu -->
                                      </li>
                                      <li>
                                          <a href="csr">CSR</a>
                                          <!-- start sub menu -->
                                      </li>

                                  </div>

                                  <!-- end menu item -->

                              </ul>
                            </div>
                        </div>
                        <div class="col-auto pr-0">
                        <div class="header-searchbar" style="margin-top:10px;margin-right:20px;">
                            <a href="#search-header" class="header-search-form" ><i class="fas fa-search search-button"></i></a>
                            <!-- search input-->
                            <form id="search-header" method="get" action="search" name="search-header" class="mfp-hide search-form-result">
                                <div class="search-form position-relative">
                                    <button type="submit" class="fas fa-search close-search search-button"></button>
                                    <input type="text" name="key" class="search-input" placeholder="Enter your keywords..." autocomplete="off" required="required" >
                                </div>
                            </form>
                        </div>

                    </div>
                    </div>


                </div>
            </nav>
            <!-- end navigation -->
            <!-- end navigation -->
        </header>
