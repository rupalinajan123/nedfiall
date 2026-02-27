<?php session_start();?>

<!doctype html>

<html class="no-js" lang="zxx">



<head>

    <meta charset="utf-8">

    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>One Stop Solution for Career and Livelihod</title>

    <meta name="description" content="One Stop Solution for Career and Livelihod">

    <meta name="viewport" content="width=device-width, initial-scale=1">



    <!--<link rel="manifest" href="#">site.html-->

    <link rel="shortcut icon" type="image/x-icon" href="<?php echo get_template_directory_uri();?>/assets/img/favicon.png">

    <!-- Place favicon.ico in the root directory -->



    <!-- CSS here -->

    

    <?php wp_head() ?>

    

</head>



<body <?php body_class('homepage is-preload launchpage-height') ?>>

  

    <!--[if lte IE 9]>

            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>

        <![endif]-->



    <!-- Add your site or application content here -->

    <!-- header-start -->

    <header id="home">

        <div class="header-area">

            <!-- header-top -->

            

        <div class="header-top primary-bg">

        <div class="container">

          <div class="row align-items-center">

            <div class="col-lg-9 col-md-6">

              <div class="header-contact-info d-flex">

                <div class="header-contact">

                  <span class="emblem"><a href="https://mdoner.gov.in/" target="_blank"><img src="<?php echo get_template_directory_uri();?>/assets/img/home/emblem-1.png" alt="emblem of india"></a></span>

                  <h4><a href="http://necouncil.gov.in/" target="_blank">North eastern council </a>

                  <span><a href="https://mdoner.gov.in/" target="_blank">Ministry of Development of North Eastern Region | Government OF INDIA</a></span></h4>

                </div>

              </div>

            </div>

            <div class="col-lg-3 col-md-6 top-right">

              <div class="nf-social-links-top">

                <?php dynamic_sidebar( 'social_media' ); ?>

                <?php global $current_user; wp_get_current_user(); ?>

             </div>

             <div class="header-contact">

              <div class="phone-number dropdown-toggle" id="dropdownMenuLink" data-toggle="dropdown"><span class="user"><img src="<?php echo get_template_directory_uri();?>/assets/img/icon/user.png"></span></div>

               <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">

              	

                <?php

                if ( is_user_logged_in() ) {  //echo $current_user->user_login; ?>

                <a class="dropdown-item" href="<?php echo site_url()?>/edit-profile">Profile</a>

              <?php }else{?>

                <!--<a class="dropdown-item" href="<?php// echo site_url()?>/log-in">Login</a>-->

                <a class="dropdown-item" id="loginpopid" href="#" data-toggle="modal" data-target="#loginModal" data-backdrop="static" data-keyboard="false">Login</a>

              <?php }?>

                <?php if(is_user_logged_in()) {  ?>

                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal" data-backdrop="static" data-keyboard="false">Logout </a>

              <?php }?>

              

           <!--    <a class="dropdown-item" href="#">Login</a> -->

              </div> 

            </div>



          </div>

        </div>

      </div>

    </div>

<!-- /end header-top -->

<!-- header-bottom -->

<div class="header-bottom-area header-sticky" style="transition: .6s;">

  <div class="container">

      <div class="row">

          <div class="col-md-6 menu-left">

              <div class="logo">

                  <a href="<?php echo site_url()?>"><!--ACT NORTH EAST LOGO-->

                  <?php the_custom_logo() ?></a>

              </div>

              <!--<div class="lang">

                <select id="lang" class="lang-dropdown">

                  <option>English</option>

                  <option>Hindi</option>

                </select>

              </div>-->

          </div>

          <div class="col-md-6 menu-right">

              <div class="header-bottom-icon f-right">

                  <div class="toggle-search-box">

                    <?php //echo get_search_form();?>

                      <form action="<?php echo site_url()?>" method="get" id="searchbox">

                          <input placeholder="Search here" name="s" type="text" value="<?php echo $_GET['s']?>">

                          <button class="button-search"><span class="ti-search"></span></button>

                      </form>



                  </div>

              </div>

            </div>

          </div>

          <div id="menuzord" class="menuzord">

            <ul class="menuzord-menu">

              <!--<li><a href="<?php echo site_url()?>">Home</a></li>-->

              <li><a href="<?php echo site_url()?>/about">About</a>

                <!--<ul class="dropdown">

                  <li><a href="#">Mission</a></li>

                  <li><a href="#">Vission</a></li>

                </ul>-->

              </li>

              <li><a href="javascript:void(0)">Education</a>

                <div class="megamenu">

                  <div class="megamenu-row">

                    <div class="col12">

                      <ul class="hrs-menu">

                        <li><a href="#">Career</a>

                          <div class="mega-submenu">

                            <div class="cources-menu">

                              <h4 class="menu-subtitle">Select Course (22)</h4>

                              <ul class="vrt-menu-scroll">

                              <?php /*?>

                              	<?php

                              $args = array(

                                'post_type'   => 'career',

                                'orderby' => 'post_title',

                                'order'   => 'ASC',

                                'posts_per_page' => '100'

                              );

                              $the_query = new WP_Query( $args );

                              ?>

                              <?php if( $the_query->have_posts() ): ?>

                                <?php while( $the_query->have_posts() ) : $the_query->the_post(); 

                                  $croptile = $post->post_title;

                                  ?>

                                  <li>

                                      <a class="box" href="<?php the_permalink()?>">

                                        <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/Law.png" alt="Icon">

                                        <span><?php the_title()?></span>

                                      </a>

                                    </li>

                                <?php 

                              endwhile; ?>

                              <?php endif; 

                              wp_reset_postdata();

                              ?>

                              <?php */?>



                           



                     <!--<li>

                      <a class="box" >

                        <img src="<?php //echo get_template_directory_uri();?>/assets/img/icon/megamenu/Law.png" alt="Icon">

                        <span>Civil Lawyer</span>

                      </a>

                    </li>-->



                    <li>

                      <a class="box" href="<?php echo site_url()?>/career_type/agriculture-and-food-sciences/">

                        <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/agriculture-and-food-science.png" alt="Icon">

                        <span>Agriculture and Food Sciences</span>

                      </a>

                    </li>

                    <li>

                      <a class="box" href="<?php echo site_url()?>/career_type/physical-sciences/">

                        <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/physical-science.png" alt="Icon">

                        <span>Physical Sciences</span>

                      </a>

                    </li>

                    <li>

                      <a class="box" href="<?php echo site_url()?>/career_type/life-science-and-environment/">

                        <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/life-science.png" alt="Icon">

                        <span>Life Science and Environment</span>

                      </a>

                    </li>

                    <li>

                      <a class="box" href="<?php echo site_url()?>/career_type/math-and-statistics/">

                        <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/maths-and-stats.png" alt="Icon">

                        <span>Math and Statistics</span>

                      </a>

                    </li>

                    <li>

                      <a class="box" href="<?php echo site_url()?>/career_type/medical-sciences/">

                        <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/medical-sciences.png" alt="Icon">

                        <span>Medical Sciences</span>

                      </a>

                    </li>

                    <li>

                      <a class="box" href="<?php echo site_url()?>/career_type/allied-medical-sciences/">

                        <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/allied-medical.png" alt="Icon">

                        <span>Allied Medical Sciences</span>

                      </a>

                    </li>

                    <li>

                      <a class="box" href="<?php echo site_url()?>/career_type/sports-and-fitness/">

                        <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/sports.png" alt="Icon">

                        <span>Sports and Fitness</span>

                      </a>

                    </li>

                    <li>

                      <a class="box" href="<?php echo site_url()?>/career_type/engineering/">

                        <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/engineering.png" alt="Icon">

                        <span>Engineering</span>

                      </a>

                    </li>

                    <li>

                      <a class="box" href="<?php echo site_url()?>/career_type/architecture-and-planning/">

                        <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/Architecture.png" alt="Icon">

                        <span>Architecture and Planning</span>

                      </a>

                    </li>

                    <li>

                      <a class="box" href="<?php echo site_url()?>/career_type/design/">

                        <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/Design.png" alt="Icon">

                        <span>Design</span>

                      </a>

                    </li>

                    <li>

                      <a class="box" href="<?php echo site_url()?>/career_type/defence-services/">

                        <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/Defence.png" alt="Icon">

                        <span>Defence Services</span>

                      </a>

                    </li>

                    <li>

                      <a class="box" href="<?php echo site_url()?>/career_type/performing-applied-arts/">

                        <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/Arts.png" alt="Icon">

                        <span>Performing  & Applied Arts</span>

                      </a>

                    </li>

                    <li>

                      <a class="box" href="<?php echo site_url()?>/career_type/government-civil-services/">

                        <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/Government.png" alt="Icon">

                        <span>Government/ Civil Services</span>

                      </a>

                    </li>

                    <li>

                      <a class="box" href="<?php echo site_url()?>/career_type/social-sciences-and-liberal-studies/">

                        <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/social-science.png" alt="Icon">

                        <span>Social Sciences and Liberal Studies</span>

                      </a>

                    </li>

                    <li>

                      <a class="box" href="<?php echo site_url()?>/career_type/commerce-accounts-finance/">

                        <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/commerce.png" alt="Icon">

                        <span>Commerce, Accounts & Finance</span>

                      </a>

                    </li>

                    <li>

                      <a class="box" href="<?php echo site_url()?>/career_type/business-management-studies/">

                        <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/business.png" alt="Icon">

                        <span>Business & Management Studies</span>

                      </a>

                    </li>

                    <li>

                      <a class="box" href="<?php echo site_url()?>/career_type/media-and-mass-communication/">

                        <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/mass-media.png" alt="Icon">

                        <span>Media and Mass communication</span>

                      </a>

                    </li>

                    <li>

                      <a class="box" href="<?php echo site_url()?>/career_type/hospitality-and-tourism/">

                        <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/hospitality.png" alt="Icon">

                        <span>Hospitality and Tourism</span>

                      </a>

                    </li>

                    <li>

                      <a class="box" href="<?php echo site_url()?>/career_type/education-and-teaching/">

                        <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/education.png" alt="Icon">

                        <span>Education and Teaching</span>

                      </a>

                    </li>

                    <li>

                      <a class="box" href="<?php echo site_url()?>/career_type/technical-electronics-hardware/">

                        <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/technical-electronics.png" alt="Icon">

                        <span>Technical/Electronics & Hardware</span>

                      </a>

                    </li>

                    <li>

                      <a class="box" href="<?php echo site_url()?>/career_type/computer-science-it/">

                        <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/computer.png" alt="Icon">

                        <span>Computer Science & IT</span>

                      </a>

                    </li>



                      <li>

                      <a class="box" href="<?php echo site_url()?>/career_type/law/">

                        <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/Law.png" alt="Icon">

                        <span>Law</span>

                      </a>

                    </li> 



                    

                    

                              </ul>

                            </div>

                          </div>

                        </li>



                        <li><a href="#">Entrance Exams</a>

                          <div class="mega-submenu">

                            <div class="cources-menu">

                              <h4 class="menu-subtitle">Select Course (13)</h4>

                              <ul class="vrt-menu-scroll">

                              	<?php /*?>

                              	<?php

                              $args = array(

                                'post_type'   => 'exam_type',

                                'orderby' => 'post_title',

                                'order'   => 'ASC',

                                'posts_per_page' => '100'

                              );

                              $the_query = new WP_Query( $args );

                              ?>

                              <?php if( $the_query->have_posts() ): ?>

                                <?php while( $the_query->have_posts() ) : $the_query->the_post(); 

                                  ?>

                                  <li>

                                      <a class="box" href="<?php the_permalink()?>">

                                        <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/Law.png" alt="Icon">

                                        <span><?php the_title()?></span>

                                      </a>

                                    </li>

                                <?php 

                              endwhile; ?>

                              <?php endif; 

                              wp_reset_postdata();

                              ?>

                              <?php */?>



              <li>

                      <a class="box" href="<?php echo site_url()?>/exam_type/law/">

                        <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/Law.png" alt="Icon">

                        <span>Law</span>

                      </a>

                    </li>

                    <li>

                      <a class="box" href="<?php echo site_url()?>/exam_type/science-and-math/">

                        <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/computer.png" alt="Icon">

                        <span>Science and Math</span>

                      </a>

                    </li>

                    <li>

                      <a class="box" href="<?php echo site_url()?>/exam_type/medical-and-allied-sciences/">

                        <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/allied-medical.png" alt="Icon">

                        <span>Medical and Allied Sciences</span>

                      </a>

                    </li>

                    <li>

                      <a class="box" href="<?php echo site_url()?>/exam_type/engineering-and-technology/">

                        <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/engineering.png" alt="Icon">

                        <span>Engineering and Technology</span>

                      </a>

                    </li>

                    <li>

                      <a class="box" href="<?php echo site_url()?>/exam_type/architecture-and-planning/">

                        <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/Architecture.png" alt="Icon">

                        <span>Architecture and Planning</span>

                      </a>

                    </li>

                    <li>

                      <a class="box" href="<?php echo site_url()?>/exam_type/art-and-design/">

                        <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/Arts.png" alt="Icon">

                        <span>Art and Design</span>

                      </a>

                    </li>

                    <li>

                      <a class="box" href="<?php echo site_url()?>/exam_type/commerce-accounts-finance/">

                        <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/commerce.png" alt="Icon">

                        <span>Commerce, Accounts & Finance</span>

                      </a>

                    </li>

                    <li>

                      <a class="box" href="<?php echo site_url()?>/exam_type/business-and-management-studies/">

                        <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/business.png" alt="Icon">

                        <span>Business and Management Studies</span>

                      </a>

                    </li>

                   

                    <li>

                      <a class="box" href="<?php echo site_url()?>/exam_type/media-and-mass-communication/">

                        <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/mass-media.png" alt="Icon">

                        <span>Media and Mass Communication</span>

                      </a>

                    </li>

                    <li>

                      <a class="box" href="<?php echo site_url()?>/exam_type/social-sciences-liberal-studies/">

                        <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/social-science.png" alt="Icon">

                        <span>Social Sciences & Liberal Studies</span>

                      </a>

                    </li>

                    <li>

                      <a class="box" href="<?php echo site_url()?>/exam_type/hospitality-and-tourism/">

                        <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/hospitality.png" alt="Icon">

                        <span>Hospitality and Tourism</span>

                      </a>

                    </li>

                    <li>

                      <a class="box" href="<?php echo site_url()?>/exam_type/education-and-teaching/">

                        <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/education.png" alt="Icon">

                        <span>Education and Teaching</span>

                      </a>

                    </li>

                    <li>

                      <a class="box" href="<?php echo site_url()?>/exam_type/university-entrance-exams/">

                        <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/University.png" alt="Icon">

                        <span>University Entrance Exams</span>

                      </a>

                    </li>



                              </ul>

                            </div>

                          </div>

                        </li>

                        <li><a href="<?php echo site_url()?>/study-in-north-east/">Study in North -East</a></li>

                  <li><a href="#">Higher Education India</a>

                    <div class="mega-submenu">

                      <div class="cources-menu">

                        <h4 class="menu-subtitle">Select Course (13)</h4>

                        <ul class="vrt-menu-scroll">

                                



                    <li>

                      <a class="box" href="<?php echo site_url()?>/higher-education-india-list/?Law">

                        <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/Law.png" alt="Icon">

                        <span>Law</span>

                      </a>

                    </li>

                    <li>

                      <a class="box" href="<?php echo site_url()?>/higher-education-india-list/?Science-and-Math">

                        <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/computer.png" alt="Icon">

                        <span>Science and Math</span>

                      </a>

                    </li>

                    <li>

                      <a class="box" href="<?php echo site_url()?>/higher-education-india-list/?Medical-and-Allied-Sciences">

                        <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/allied-medical.png" alt="Icon">

                        <span>Medical and Allied Sciences</span>

                      </a>

                    </li>

                    <li>

                      <a class="box" href="<?php echo site_url()?>/higher-education-india-list/?Engineering-and-Technology">

                        <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/engineering.png" alt="Icon">

                        <span>Engineering and Technology</span>

                      </a>

                    </li>

                    <li>

                      <a class="box" href="<?php echo site_url()?>/higher-education-india-list/?Architecture-and-Planning">

                        <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/Architecture.png" alt="Icon">

                        <span>Architecture and Planning</span>

                      </a>

                    </li>

                    <li>

                      <a class="box" href="<?php echo site_url()?>/higher-education-india-list/?Art-and-Design">

                        <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/Arts.png" alt="Icon">

                        <span>Art and Design</span>

                      </a>

                    </li>

                    <li>

                      <a class="box" href="<?php echo site_url()?>/higher-education-india-list/?Commerce,-Accounts-and-Finance">

                        <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/commerce.png" alt="Icon">

                        <span>Commerce, Accounts & Finance</span>

                      </a>

                    </li>

                    <li>

                      <a class="box" href="<?php echo site_url()?>/higher-education-india-list/?Business-and-Management-Studies">

                        <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/business.png" alt="Icon">

                        <span>Business and Management Studies</span>

                      </a>

                    </li>

                   

                    <li>

                      <a class="box" href="<?php echo site_url()?>/higher-education-india-list/?Media-and-Mass-Communication">

                        <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/mass-media.png" alt="Icon">

                        <span>Media and Mass Communication</span>

                      </a>

                    </li>

                    <li>

                      <a class="box" href="<?php echo site_url()?>/higher-education-india-list/?Social-Sciences-and-Liberal-Studies">

                        <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/social-science.png" alt="Icon">

                        <span>Social Sciences & Liberal Studies</span>

                      </a>

                    </li>

                    <li>

                      <a class="box" href="<?php echo site_url()?>/higher-education-india-list/?Hospitality-and-Tourism">

                        <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/hospitality.png" alt="Icon">

                        <span>Hospitality and Tourism</span>

                      </a>

                    </li>

                    <li>

                      <a class="box" href="<?php echo site_url()?>/higher-education-india-list/?Education-and-Teaching">

                        <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/education.png" alt="Icon">

                        <span>Education and Teaching</span>

                      </a>

                    </li>

                   



                              </ul>

                            </div>

                          </div>

                        </li>

                        <li><a href="<?php echo site_url()?>/study-in-abroad/">Study Abroad</a></li>

                        <li><a href="<?php echo site_url()?>/scholarships/">Scholarships</a></li>

                        <!--<li><a href="#">Event/Competitions</a></li>-->

                        <li><a href="<?php echo site_url()?>/fellowships/">Fellowships</a></li>

                      </ul>

                    </div>

                  </div>

                </div>

              </li>

              <li><a href="javascript:void(0)">Employment</a>

                <div class="megamenu">

                <div class="megamenu-row">

                  <div class="col12">

                    <ul class="hrs-menu">

                      <li class="nf-mb-menu"><a href="#">Govt. Job Exams</a>

                        <div class="mega-submenu">

                          <div class="cources-menu">

                            <h4 class="menu-subtitle">Select Exam (9)</h4>

                            <ul class="vrt-menu-scroll">

                              <li>

                                <a class="box" href="<?php echo site_url()?>/engineering/">

                                  <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/engineering.png" alt="Icon">

                                  <span>Engineering</span>

                                </a>

                              </li>

                                  <li>

                                    <a class="box" href="<?php echo site_url()?>/sciences/">

                                      <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/social-science.png" alt="Icon">

                                      <span>Sciences</span>

                                    </a>

                                  </li>

                                  <li>

                                    <a class="box" href="<?php echo site_url()?>/banking-and-finance/">

                                      <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/banking-and-finance.png" alt="Icon">

                                      <span>Banking and Finance</span>

                                    </a>

                                  </li>

                                  

                                  <li>

                                    <a class="box" href="<?php echo site_url()?>/legal/">

                                      <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/social-science.png" alt="Icon">

                                      <span>Legal</span>

                                    </a>

                                  </li>

                                  <li>

                                    <a class="box" href="<?php echo site_url()?>/defence/">

                                      <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/Defence.png" alt="Icon">

                                      <span>Defence</span>

                                    </a>

                                  </li>

                                  <li>

                                    <a class="box" href="<?php echo site_url()?>/medicine-and-allied-medicine/">

                                      <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/allied-medical.png" alt="Icon">

                                      <span>Medicine and Allied Medicine</span>

                                    </a>

                                  </li>

                                  <li>

                                    <a class="box" href="<?php echo site_url()?>/public-administration-civil-services/">

                                      <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/Architecture.png" alt="Icon">

                                      <span>Public Administration & Civil Services</span>

                                    </a>

                                  </li>

                                  <li>

                                    <a class="box" href="<?php echo site_url()?>/education-training/">

                                      <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/education.png" alt="Icon">

                                      <span>Education & Training</span>

                                    </a>

                                  </li>
                                  <li>

                                    <a class="box" href="<?php echo site_url()?>/other-exams/">

                                      <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/other-exam.png" alt="Icon">

                                      <span>Other Exams</span>

                                    </a>

                                  </li>

                            </ul>

                          </div>

                        </div>

                      </li>

                      <li class="nf-mb-menu"><a href="#">Internships</a>

                        <div class="mega-submenu">

                          <div class="cources-menu">

                            <h4 class="menu-subtitle">Select Exam</h4>

                            <ul class="vrt-menu-scroll">

                              <li>

                                <a class="box" href="<?php echo site_url()?>/find-an-intern">

                                  <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/find-an-intern.png" alt="Icon">

                                  <span>Find an Internship</span>

                                </a>

                              </li>

                              <li>
                                <a class="box" href="<?php echo site_url()?>/hire-an-intern/">
                                  <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/hire-intern.png" alt="Icon">
                                  <span>Hire an Intern</span>
                                </a>
                              </li>

                            </ul>

                          </div>

                        </div>

                      </li> 

                      <li><a href="<?php echo site_url()?>/employable-skills/">Employable Skills</a></li>

                      <li><a href="<?php echo site_url()?>/upskill/">Upskill</a></li>

                      <li><a href="<?php echo site_url()?>/job-alert/">Job Alert</a></li>

                      <li><a href="<?php echo site_url()?>/job-opportunity/">Job Opportunities</a></li>

                      <li><a href="<?php echo site_url()?>/work-abroad/">Work Abroad</a></li>

                      <li><a href="#">Learn and Earn</a>

                        <div class="mega-submenu">

                            <div class="cources-menu">

                              <h4 class="menu-subtitle">Select Sector (36)</h4>

                              <ul class="vrt-menu-scroll">

                                <li>

                                  <a class="box" href="<?php echo site_url()?>/learn-and-earn-details/?Agriculture">

                                    <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/Agriculture.png" alt="Icon">

                                    <span>Agriculture</span>

                                  </a>

                                </li>

                                <li>

                                  <a class="box" href="<?php echo site_url()?>/learn-and-earn-details/?Animal-Husbandry">

                                    <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/animal-husbandry.png" alt="Icon">

                                    <span>Animal Husbandry</span>

                                  </a>

                                </li>

                                <li>

                                  <a class="box" href="<?php echo site_url()?>/learn-and-earn-details/?Textile-and-Apparel">

                                    <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/textile-apparel.png" alt="Icon">

                                    <span>Textile and Apparel</span>

                                  </a>

                                </li>                              

                                <li>

                                  <a class="box" href="<?php echo site_url()?>/learn-and-earn-details/?Automobile">

                                    <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/Automobile.png" alt="Icon">

                                    <span>Automobile</span>

                                  </a>

                                </li>



                                <li>

                                  <a class="box" href="<?php echo site_url()?>/learn-and-earn-details/?Banking-and-Finance">

                                    <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/banking-and-finance.png" alt="Icon">

                                    <span>Banking and Finance</span>

                                  </a>

                                </li>

                                <li>

                                  <a class="box" href="<?php echo site_url()?>/learn-and-earn-details/?Beauty-and-Wellness">

                                    <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/beauty-and-wellness.png" alt="Icon">

                                    <span>Beauty and Wellness</span>

                                  </a>

                                </li>

                                <li>

                                  <a class="box" href="<?php echo site_url()?>/learn-and-earn-details/?Capital-goods-and-Manufacturing">

                                    <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/capital-goods-and-manufacturing.png" alt="Icon">

                                    <span>Capital goods and Manufacturing</span>

                                  </a>

                                </li>

                                <li>

                                  <a class="box" href="<?php echo site_url()?>/learn-and-earn-details/?Civil-and-Construction">

                                    <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/civil-and-construction.png" alt="Icon">

                                    <span>Civil and Construction</span>

                                  </a>

                                </li>

                                <!--<li>

                                  <a class="box" href="<?php //echo site_url()?>/learn-and-earn-details/?Craft">

                                    <img src="<?php //echo get_template_directory_uri();?>/assets/img/icon/megamenu/Craft.png" alt="Icon">

                                    <span>Craft</span>

                                  </a>

                                </li>-->

                                <li>

                                  <a class="box" href="<?php echo site_url()?>/learn-and-earn-details/?Health-and-Paramedical">

                                    <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/health-and-paramedical.png" alt="Icon">

                                    <span>Health and Paramedical</span>

                                  </a>

                                </li>

                                <li>

                                  <a class="box" href="<?php echo site_url()?>/learn-and-earn-details/?Logistics-and-Shipping">

                                    <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/logistics-and-shipping.png" alt="Icon">

                                    <span>Logistics and Shipping</span>

                                  </a>

                                </li>

                                <li>

                                  <a class="box" href="<?php echo site_url()?>/learn-and-earn-details/?Hospitality-and-Hotel-Management">

                                    <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/hospitality-and-hotel-management.png" alt="Icon">

                                    <span>Hospitality and Hotel Management</span>

                                  </a>

                                </li>

                                <li>

                                  <a class="box" href="<?php echo site_url()?>/learn-and-earn-details/?IT-ITeS-and-Computer-Science">

                                    <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/IT-ITeS-and-computer-science.png" alt="Icon">

                                    <span>IT-ITeS and Computer Science</span>

                                  </a>

                                </li>

                                <li>

                                  <a class="box" href="<?php echo site_url()?>/learn-and-earn-details/?Sports-and-Fitness">

                                    <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/sports-fitness.png" alt="Icon">

                                    <span>Sports & Fitness</span>

                                  </a>

                                </li>

                                <li>

                                  <a class="box" href="<?php echo site_url()?>/learn-and-earn-details/?Plumbing">

                                    <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/Plumbing.png" alt="Icon">

                                    <span>Plumbing</span>

                                  </a>

                                </li>

                                <li>

                                  <a class="box" href="<?php echo site_url()?>/learn-and-earn-details/?Electrical-Power">

                                    <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/electrical-power.png" alt="Icon">

                                    <span>Electrical - Power</span>

                                  </a>

                                </li>

                                <li>

                                  <a class="box" href="<?php echo site_url()?>/learn-and-earn-details/?Retail-and-Marketing">

                                    <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/retail-and-marketing.png" alt="Icon">

                                    <span>Retail and Marketing</span>

                                  </a>

                                </li>

                                <li>

                                  <a class="box" href="<?php echo site_url()?>/learn-and-earn-details/?Mechanical">

                                    <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/Mechanical.png" alt="Icon">

                                    <span>Mechanical</span>

                                  </a>

                                </li>

                                <li>

                                  <a class="box" href="<?php echo site_url()?>/learn-and-earn-details/?Aviation-Sector">

                                    <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/aviation-sector.png" alt="Icon">

                                    <span>Aviation Sector</span>

                                  </a>

                                </li>

                                <li>

                                  <a class="box" href="<?php echo site_url()?>/learn-and-earn-details/?Fire-and-Safety">

                                    <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/fire-and-safety.png" alt="Icon">

                                    <span>Fire and Safety</span>

                                  </a>

                                </li>

                                <li>

                                  <a class="box" href="<?php echo site_url()?>/learn-and-earn-details/?Media-and-Entertainment">

                                    <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/Media-&-Entertainment.png" alt="Icon">

                                    <span>Media & Entertainment</span>

                                  </a>

                                </li>

                                <li>

                                  <a class="box" href="<?php echo site_url()?>/learn-and-earn-details/?Domestic-Workers">

                                    <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/domestic-workers.png" alt="Icon">

                                    <span>Domestic Workers</span>

                                  </a>

                                </li>

                                <li>

                                  <a class="box" href="<?php echo site_url()?>/learn-and-earn-details/?Electronics">

                                    <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/Electronics.png" alt="Icon">

                                    <span>Electronics</span>

                                  </a>

                                </li>

                                <li>

                                  <a class="box" href="<?php echo site_url()?>/learn-and-earn-details/?Food-and-Beverages">

                                    <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/food-and-beverages.png" alt="Icon">

                                    <span>Food and Beverages</span>

                                  </a>

                                </li>

                                <li>

                                  <a class="box" href="<?php echo site_url()?>/learn-and-earn-details/?Furniture-and-Fitting">

                                    <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/furniture-and-fitting.png" alt="Icon">

                                    <span>Furniture and Fitting</span>

                                  </a>

                                </li>

                                <li>

                                  <a class="box" href="<?php echo site_url()?>/learn-and-earn-details/?Gem-and-Jewellery">

                                    <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/gem-and-jwellery.png" alt="Icon">

                                    <span>Gem and Jewellery</span>

                                  </a>

                                </li>

                                <li>

                                  <a class="box" href="<?php echo site_url()?>/learn-and-earn-details/?Telecom">

                                    <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/Telecom.png" alt="Icon">

                                    <span>Telecom</span>

                                  </a>

                                </li>

                                <li>

                                  <a class="box" href="<?php echo site_url()?>/learn-and-earn-details/?Yoga-and-Naturopathy">

                                    <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/yoga-naturopathy.png" alt="Icon">

                                    <span>Yoga and Naturopathy</span>

                                  </a>

                                </li>

                                <li>

                                  <a class="box" href="<?php echo site_url()?>/learn-and-earn-details/?Teacher-Training">

                                    <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/teacher-training.png" alt="Icon">

                                    <span>Teacher Training</span>

                                  </a>

                                </li>

                               

                                <li>

                                  <a class="box" href="<?php echo site_url()?>/learn-and-earn-details/?Infrastructure-and-Equipment">

                                    <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/infrastructure-and-equipment.png" alt="Icon">

                                    <span>Infrastructure and Equipment</span>

                                  </a>

                                </li>

                                <li>

                                  <a class="box" href="<?php echo site_url()?>/learn-and-earn-details/?Handicraft-and-Carpet">

                                    <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/handicraft-and-carpet.png" alt="Icon">

                                    <span>Handicraft and Carpet</span>

                                  </a>

                                </li>

                                <li>

                                  <a class="box" href="<?php echo site_url()?>/learn-and-earn-details/?Rubber">

                                    <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/Rubber.png" alt="Icon">

                                    <span>Rubber</span>

                                  </a>

                                </li>

                                <li>

                                  <a class="box" href="<?php echo site_url()?>/learn-and-earn-details/?Green-jobs">

                                    <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/green-jobs.png" alt="Icon">

                                    <span>Green jobs</span>

                                  </a>

                                </li>

                                <li>

                                  <a class="box" href="<?php echo site_url()?>/learn-and-earn-details/?Skills-for-PWD">

                                    <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/skills-for-pwd.png" alt="Icon">

                                    <span>Skills for PWD</span>

                                  </a>

                                </li>

                                <li>

                                  <a class="box" href="<?php echo site_url()?>/learn-and-earn-details/?Humanities-(Soft-Skills)">

                                    <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/humanities(SoftSkills).png" alt="Icon">

                                    <span>Humanities (Soft Skills)</span>

                                  </a>

                                </li>

                                <li>

                                  <a class="box" href="<?php echo site_url()?>/learn-and-earn-details/?Fashion-Technology">

                                    <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/fashion.png" alt="Icon">

                                    <span>Fashion Technology</span>

                                  </a>

                                </li>

                                <li>

                                  <a class="box" href="<?php echo site_url()?>/learn-and-earn-details/?Travel-and-Tourism">

                                    <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/logistics-and-shipping.png" alt="Icon">

                                    <span>Travel and Tourism</span>

                                  </a>

                                </li>

                              </ul>

                            </div>

                          </div>



                      </li>

                    </ul>

                  </div>

                </div>

              </div>

                          </li>

                          <li><a href="javascript:void(0)">Entrepreneurship</a>

        <div class="megamenu">

          <div class="megamenu-row">

            <div class="col12">

              <ul class="hrs-menu">

                <li class="nf-mb-menu"><a href="#">Know your Business</a>

                <div class="mega-submenu">

                  <div class="cources-menu">

                    <ul class="fourthlevel-menu">

                      <li><a href="#">Agri-Business</a>

                      <div class="nf-tabular-menu">

                        <div class="hrz-tab-menu vrt-menu-scroll">

                          <div class="nf-left-megatab">

                            <h4><a data-toggle="collapse" href="#production-menu">Production <i class="fa fa-angle-up"></i></a></h4>

                            <div class="collapse show" id="production-menu">

                              <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist">

                                <a class="nav-link active" data-toggle="pill" href="#nf-protab1" role="tab">Horticulture</a>

                                <a class="nav-link" data-toggle="pill" href="#nf-protab2" role="tab">Animal Husbandry</a>

                                <a class="nav-link" data-toggle="pill" href="#nf-protab3" role="tab">Sericulture</a>

                                <a class="nav-link" data-toggle="pill" href="#nf-protab4" role="tab">Aquaculture</a>

                                <a class="nav-link" data-toggle="pill" href="#nf-protab5" role="tab">MAP</a>

                                <a class="nav-link" data-toggle="pill" href="#nf-protab6" role="tab">Nursery</a>

                              </div>

                            </div>

                            

                          </div>

                          <div class="nf-right-megatab">

                            <div class="tab-content" id="v-pills-tabContent">

                              <div class="tab-pane fade show active" id="nf-protab1" role="tabpanel">

                                <div class="mega-panel-sec">

                                  <h5>Crop-wise</h5>

                                  <div class="panel"><a href="<?php echo site_url()?>/fruits"><div class="panel-body nf-brlf1"> Fruits</div></a></div>

                                  <div class="panel"><a href="<?php echo site_url()?>/vegetables"><div class="panel-body nf-brlf2"> Vegetables</div></a></div>

                                  <div class="panel"><a href="<?php echo site_url()?>/spices"><div class="panel-body nf-brlf3"> Spices</div></a></div>

                                  <div class="panel"><a href="<?php echo site_url()?>/exotic-spices"><div class="panel-body nf-brlf3">Exotic Spices</div></a></div>

                                  <div class="panel"><a href="<?php echo site_url()?>/mushroom"><div class="panel-body nf-brlf4"> Mushroom</div></a></div>

                                  <div class="panel"><a href="<?php echo site_url()?>/floriculture"><div class="panel-body nf-brlf5"> Floriculture</div></a></div>

                                  <div class="panel"><a href="<?php echo site_url()?>/apiculture"><div class="panel-body nf-brlf6"> Apiculture</div></a></div>

                                </div>

                                <div class="mega-panel-sec">

                                  <h5>Type-wise</h5>

                                  <div class="panel"><a href="<?php echo site_url()?>/horticulture_int/integrated-farming"><div class="panel-body nf-brlf1"> Integrated</div></a></div>

                                  <div class="panel"><a href="<?php echo site_url()?>/horticulture_int/hi-tech"><div class="panel-body nf-brlf2"> Hi-Tech</div></a></div>

                                  <div class="panel"><a href="<?php echo site_url()?>/horticulture_int/traditional"><div class="panel-body nf-brlf3"> Traditional</div></a></div>

                                  <div class="panel"><a href="<?php echo site_url()?>/horticulture_int/organic-farming"><div class="panel-body nf-brlf4"> Organic Farming</div></a></div>

                                 <!-- <div class="panel"><div class="panel-body nf-brlf5"> Floriculture</div></div>

                                  <div class="panel"><div class="panel-body nf-brlf6"> Agriculture</div></div>-->

                                </div>

                              </div>

                              <div class="tab-pane fade" id="nf-protab2" role="tabpanel">

                                <div class="mega-panel-sec">

                                  <h5>Categories</h5>

                                  <div class="panel"><a href="<?php echo site_url()?>/meat-production"><div class="panel-body nf-brlf1"> Meat Production</div></a></div>

                                  <div class="panel"><a href="<?php echo site_url()?>/dairy-production"><div class="panel-body nf-brlf2"> Dairy Production</div></a></div>

                                  <div class="panel"><a href="<?php echo site_url()?>/wool-production"><div class="panel-body nf-brlf3"> Wool Production</div></a></div>



                                  <div class="panel"><a href="<?php echo site_url()?>/breeding"><div class="panel-body nf-brlf4"> Breeding</div></a></div>

                                  <!--<div class="panel"><a href="<?php //echo site_url()?>/breeding-animal"><div class="panel-body nf-brlf4"> Breeding Animal</div></a></div>

                                  <div class="panel"><a href="<?php //echo site_url()?>/breeding-bird"><div class="panel-body nf-brlf4"> Breeding Bird</div></a></div>-->

                                  <div class="panel"><a href="<?php echo site_url()?>/egg-production"><div class="panel-body nf-brlf5"> Egg Production</div></a></div>

                                  <!--<div class="panel"><a href="<?php //echo site_url()?>/egg-production-food"><div class="panel-body nf-brlf5"> Egg Production - Food</div></a></div>

                                  <div class="panel"><a href="<?php //echo site_url()?>/egg-production-breeding"><div class="panel-body nf-brlf5"> Egg Production - Breeding</div></a></div>-->

                                </div>

                              </div>

                              <div class="tab-pane fade" id="nf-protab3" role="tabpanel">

                                <div class="mega-panel-sec lg-size">

                                  <h5>Pre - Cocoon</h5>

                                  <div class="panel"><a href="<?php echo site_url()?>/production-of-commercial-silk-cocoon"><div class="panel-body nf-brlf1"> Production of Commercial Silk Cocoon</div></a></div>

                                  <div class="panel"><a href="<?php echo site_url()?>/production-of-seed-crop"><div class="panel-body nf-brlf2"> Silk Grainage</div></a></div>

                                  

                                </div>

                                <div class="mega-panel-sec lg-size">

                                  <h5>Post - Cocoon</h5>

                                  

                                  <div class="panel"><a href="<?php echo site_url()?>/production-of-spun-yarn"><div class="panel-body nf-brlf3"> Production of Spun Yarn</div></a></div>

                                  <div class="panel"><a href="<?php echo site_url()?>/production-of-reeled-yarn"><div class="panel-body nf-brlf5"> Production of Reeled Yarn</div></a></div>

                                  <div class="panel"><a href="<?php echo site_url()?>/production-of-twisted-reel-yarn"><div class="panel-body nf-brlf6"> Production of Twisted Reel Yarn</div></a></div>

                                  <div class="panel"><a href="<?php echo site_url()?>/silk-yarn-dyeing"><div class="panel-body nf-brlf5"> Silk Yarn Dyeing</div></a></div>

                                  <div class="panel"><a href="<?php echo site_url()?>/integrated-reeling-unit-with-stifling"><div class="panel-body nf-brlf1"> Integrated Reeling Unit with Stifling</div></a></div>

                                  <div class="panel"><div class="panel-body nf-brlf2"> Yarn Clinic</div></div>

                                   <div class="panel"><div class="panel-body nf-brlf3"> Pupae & Other By Products</div></div>

                                  <div class="panel"><a href="<?php echo site_url()?>/fabric-production/"><div class="panel-body nf-brlf4"> Fabric Production</div></a></div>



                                  <!--<div class="panel"><div class="panel-body nf-brlf1">Production of Reeled Silk Yarn Muga</div></div>-->

                                </div>

                              </div>

                              <div class="tab-pane fade" id="nf-protab4" role="tabpanel">

                                <div class="mega-panel-sec lg-size">

                                  <h5>Categories</h5>

                                  <div class="panel"><a href="<?php echo site_url()?>/species-wise"><div class="panel-body nf-brlf1"> Species Wise</div></a></div>

                                  <div class="panel"><a href="<?php echo site_url()?>/aquaculture-type-search"><div class="panel-body nf-brlf2"> Culture Type</div></a></div>



                                  <div class="panel"><a href="<?php echo site_url()?>/fish-value-chain"><div class="panel-body nf-brlf3"> Fish Value Chain</div></a></div>

                                  

                                  <!--<div class="panel"><a href="<?php //echo site_url()?>/fish-value-chain-hatchery"><div class="panel-body nf-brlf3"> Fish Value Chain - Hatchery</div></a></div>

                                  <div class="panel"><a href="<?php //echo site_url()?>/fish-value-chain-trading"><div class="panel-body nf-brlf3"> Fish Value Chain - Trading</div></a></div>-->



                                  <div class="panel"><a href="<?php echo site_url()?>/culture-system"><div class="panel-body nf-brlf4"> Culture System</div></a></div>

                                </div>

                              </div>

                              <div class="tab-pane fade" id="nf-protab5" role="tabpanel">

                                <div class="mega-panel-sec lg-size">

                                  <h5>Categories</h5>

                                 <?php /* ?>

                                  <?php

                                    $args = array(

                                      'post_type'   => 'map',

                                      'orderby' => 'post_title',

                                      'order'   => 'ASC',

                                      'posts_per_page' => '100'

                                    );

                                    $the_query = new WP_Query( $args );

                                    ?>

                                    <?php if( $the_query->have_posts() ): ?>

                                      <?php while( $the_query->have_posts() ) : $the_query->the_post(); 

                                        $croptile = $post->post_title;

                                        ?>

                                        <div class="panel"><a href="<?php echo site_url()?>/map-details?map=<?php echo urlencode($croptile); ?>"><div class="panel-body nf-brlf1"><?php echo $croptile; ?></div></a></div>

                                      <?php 

                                    endwhile; ?>

                                    <?php endif; 

                                    wp_reset_postdata();

                                    ?>



                                    <?php */ ?>

                                    

                                  <div class="panel"><a href="<?php echo site_url()?>/maps/agar-aquilaria-agallocha"><div class="panel-body nf-brlf1"> Agar <span>(Aquilaria agallocha)</span></div></a></div>

                                  <div class="panel"><a href="<?php echo site_url()?>/maps/patchouli-pogostemon-cablin"><div class="panel-body nf-brlf2"> Patchouli <span>(Pogostemon cablin)</span></div></a></div>

                                  <div class="panel"><a href="<?php echo site_url()?>/maps/stevia-stevia-rebaudiana"><div class="panel-body nf-brlf3"> Stevia <span>(Stevia rebaudiana)</span></div></a></div>

                                  <div class="panel"><a href="<?php echo site_url()?>/maps/lemongrass-cymbopogon-flexuosus"><div class="panel-body nf-brlf4"> Lemongrass <span>(Cymbopogon flexuosus)</span></div></a></div>

                                  <div class="panel"><a href="<?php echo site_url()?>/maps/citronella-cymbopogon-winterianus"><div class="panel-body nf-brlf5"> Citronella <span>(Cymbopogon winterianus)</span></div></a></div>

                                  <div class="panel"><a href="<?php echo site_url()?>/maps/vetiver-vetiveria-zizaniodes"><div class="panel-body nf-brlf6"> Vetiver <span>(Vetiveria zizaniodes)</span></div></a></div>

                                  <div class="panel"><a href="<?php echo site_url()?>/maps/sugandhmantri-gondhi-homalomena-aromatica"><div class="panel-body nf-brlf1"> Sugandhmantri / Gondhi <span>(Homalomena aromatica)</span></div></a></div>

                                  <div class="panel"><a href="<?php echo site_url()?>/maps/sarpagandha-rauvolfia-serpentina-family-apocynaceae"><div class="panel-body nf-brlf2"> Sarpagandha <span>(Rauvolfia serpentina, Family: Apocynaceae)</span></div></a></div>

                                  <div class="panel"><a href="<?php echo site_url()?>/maps/tulshi-ocimum-tenuiflorum"><div class="panel-body nf-brlf3"> Tulshi <span>(Ocimum tenuiflorum)</span></div></a></div>

                                  <div class="panel"><a href="<?php echo site_url()?>/maps/brahmi-bacopa-monnieri"><div class="panel-body nf-brlf4"> Brahmi <span>(Bacopa monnieri)</span> </div></a></div>

                                  <div class="panel"><a href="<?php echo site_url()?>/maps/ghritkumari-aloe-vera"><div class="panel-body nf-brlf5"> Ghritkumari <span>(Aloe vera)</span></div></a></div>

                                  <div class="panel"><a href="<?php echo site_url()?>/maps/pipli"><div class="panel-body nf-brlf5"> Pipli <span>(Piper longum)</span></div></a></div>

                                  <div class="panel"><a href="<?php echo site_url()?>/maps/rosemary-rosemarinus-officinalis"><div class="panel-body nf-brlf1"> Rosemary <span>(Rosemarinus officinalis)</span></div></a></div>

                                  <div class="panel"><a href="<?php echo site_url()?>/maps/coleus-coleus-forskohlii"><div class="panel-body nf-brlf2"> Coleus <span>(Coleus forskohlii)</span> </div></a></div>

                                  <div class="panel"><a href="<?php echo site_url()?>/maps/kokum-garcinia-indica"><div class="panel-body nf-brlf3"> Kokum <span>(Garcinia indica)</span></div></a></div>

                                  <div class="panel"><a href="<?php echo site_url()?>/maps/curry-leaves-murraya-koenigii"><div class="panel-body nf-brlf4"> Curry leaves <span>(Murraya koenigii)</span></div></a></div>

                                </div>

                              </div>

                              <div class="tab-pane fade" id="nf-protab6" role="tabpanel">

                                <div class="mega-panel-sec lg-size">

                                  <h5>Categories</h5>

                                  <div class="panel"><a href="<?php echo site_url()?>/nursery/hi-tech-nursery"><div class="panel-body nf-brlf1"> Hi-Tech Nursery</div></a></div>

                                  <div class="panel"><a href="<?php echo site_url()?>/nursery/vegetable-plant-nursery"><div class="panel-body nf-brlf2"> Vegetable Plant Nursery</div></a></div>

                                  <div class="panel"><a href="<?php echo site_url()?>/nursery/ornamental-plant-nursery"><div class="panel-body nf-brlf3"> Ornamental Plant Nursery</div></a></div>

                                  <div class="panel"><a href="<?php echo site_url()?>/nursery/map-nursery"><div class="panel-body nf-brlf4"> MAP Nursery</div></a></div>

                                  <div class="panel"><a href="<?php echo site_url()?>/nursery/bamboo-nursery"><div class="panel-body nf-brlf5"> Bamboo Nursery</div></a></div>

                                  <div class="panel"><a href="<?php echo site_url()?>/nursery/forest-plant-nursery"><div class="panel-body nf-brlf5"> Forest Plant Nursery</div></a></div>

                                  <div class="panel"><a href="<?php echo site_url()?>/nursery/fruit-plant-nursery"><div class="panel-body nf-brlf1"> Fruit Plant Nursery</div></a></div>

                                  <div class="panel"><a href="<?php echo site_url()?>/nursery/agriculture-crop-nursery"><div class="panel-body nf-brlf2"> Agriculture Crop Nursery</div></a></div>

                                </div>

                              </div>

                            </div>

                          </div>

                          <div class="nf-post-harvest">

                                      <div class="nf-left-megatab">

                                        <h4><a data-toggle="collapse" href="#harvest-menu">Post Harvest & Primary Processing <i class="fa fa-angle-up"></i></a></h4>

                                        <div class="collapse show" id="harvest-menu">

                                          <div class="nav flex-column nav-pills" id="harvest-pills-tab" role="tablist">

                                            <a class="nav-link active" data-toggle="pill" href="#nf-harvesttab1" role="tab">Handling & Logistics</a>

                                            <a class="nav-link" data-toggle="pill" href="#nf-harvesttab2" role="tab">Storage</a>

                                            <a class="nav-link" data-toggle="pill" href="#nf-harvesttab3" role="tab">Preservation</a>

                                            <a class="nav-link" data-toggle="pill" href="#nf-harvesttab4" role="tab">Primary Processing</a>

                                          </div>

                                        </div>

                                      </div>

                                      <div class="nf-right-megatab">

                                        <div class="tab-content" id="v-harvest-tabContent">

                                          <div class="tab-pane fade show active" id="nf-harvesttab1" role="tabpanel">

                                            <div class="mega-panel-sec lg-size">

                                              <h5>Categories</h5>

                                             <!--  <div class="panel"><a href="<?php //echo site_url()?>/post-harvest"><div class="panel-body nf-brlf1"> Post Harvest & Primary Processing</div></a></div> -->

                                              <div class="panel"><a href="<?php echo site_url()?>/post_harvest/refrigerated-van/"><div class="panel-body nf-brlf1"> Refrigerated Van</div></a></div>

                                              <div class="panel"><a href="<?php echo site_url()?>/post_harvest/insulated-van/"><div class="panel-body nf-brlf2"> Insulated Van</div></a></div>

                                              <div class="panel"><a href="<?php echo site_url()?>/post_harvest/specialised-vandf-transportation-vehicles/"><div class="panel-body nf-brlf3"> Specialised V&F Transportation Vehicles</div></a></div>

                                              <div class="panel"><a href="<?php echo site_url()?>/post_harvest/material-loading-and-handling-conveyors/"><div class="panel-body nf-brlf4"> Material Loading and Handling Conveyors</div></a></div>

                                            </div>

                                          </div>

                                          <div class="tab-pane fade" id="nf-harvesttab2" role="tabpanel">

                                            <div class="mega-panel-sec lg-size">

                                              <h5>Categories</h5>

                                              <div class="panel"><a href="<?php echo site_url()?>/post_harvest/dry-warehouse/"><div class="panel-body nf-brlf1"> Dry Warehouse</div></a></div>

                                              <div class="panel"><a href="<?php echo site_url()?>/post_harvest/cold-room/"><div class="panel-body nf-brlf2"> Cold Room</div></a></div>

                                              <div class="panel"><a href="<?php echo site_url()?>/post_harvest/multi-chamber-multi-temperature-cold-store/"><div class="panel-body nf-brlf3"> Multi Chamber Multi Temperature Cold Store</div></a></div>

                                              <div class="panel"><a href="<?php echo site_url()?>/post_harvest/controlled-atmosphere-cold-store/"><div class="panel-body nf-brlf4"> Controlled Atmosphere Cold Store</div></a></div>

                                              <div class="panel"><a href="<?php echo site_url()?>/post_harvest/modified-atmospheric-cold-store/"><div class="panel-body nf-brlf5"> Modified Atmospheric Cold Store</div></a></div>

                                            </div>

                                          </div>

                                          <div class="tab-pane fade" id="nf-harvesttab3" role="tabpanel">

                                            <div class="mega-panel-sec lg-size">

                                              <h5>Categories</h5>

                                              <div class="panel"><a href="<?php echo site_url()?>/post_harvest/blast-freezing/"><div class="panel-body nf-brlf1"> Blast Freezing</div></a></div>

                                              <div class="panel"><a href="<?php echo site_url()?>/post_harvest/iqf/"><div class="panel-body nf-brlf2"> IQF</div></a></div>

                                              <div class="panel"><a href="<?php echo site_url()?>/post_harvest/hot-air-drying/"><div class="panel-body nf-brlf3"> Hot Air Drying</div></a></div>

                                              <div class="panel"><a href="<?php echo site_url()?>/post_harvest/batch-drying/"><div class="panel-body nf-brlf4"> Batch Drying</div></a></div>

                                              <div class="panel"><a href="<?php echo site_url()?>/post_harvest/continuous-drying/"><div class="panel-body nf-brlf5"> Continuous Drying</div></a></div>

                                              <div class="panel"><a href="<?php echo site_url()?>/post_harvest/freezing-drying/"><div class="panel-body nf-brlf6"> Freezing Drying</div></a></div>

                                              <div class="panel"><a href="<?php echo site_url()?>/post_harvest/spraying-drying/"><div class="panel-body nf-brlf1"> Spraying Drying</div></a></div>

                                              <div class="panel"><a href="<?php echo site_url()?>/post_harvest/canning/"><div class="panel-body nf-brlf2"> Canning</div></a></div>

                                              

                                            </div>

                                          </div>

                                          <div class="tab-pane fade" id="nf-harvesttab4" role="tabpanel">

                                             <div class="mega-panel-sec lg-size">

                                                <h5>Categories</h5>

                                                <div class="panel"><a href="<?php echo site_url()?>/post_harvest/rice-mill/"><div class="panel-body nf-brlf1"> Rice Mill</div></a></div>

                                                <div class="panel"><a href="<?php echo site_url()?>/post_harvest/roller-flour-mill/"><div class="panel-body nf-brlf2"> Roller Flour Mill</div></a></div>

                                                <div class="panel"><a href="<?php echo site_url()?>/post_harvest/dal-mill/"><div class="panel-body nf-brlf3"> Dal Mill</div></a></div>

                                              </div>

                                          </div>

                                        </div>

                                      </div>

                                    </div>

                        </div>

                        

                      </div>

                    </li>

                    <li><a href="#">Manufacturing</a>

                    <div class="nf-tabular-menu">

                      <div class="hrz-tab-menu">

                        <div class="nf-left-megatab">

                          <div class="nav flex-column nav-pills" id="nf-mnfctr-tab" role="tablist">

                            <a class="nav-link active" data-toggle="pill" href="#nf-mnfctrtab1" role="tab">Food Processing</a>

                            <a class="nav-link" data-toggle="pill" href="#nf-mnfctrtab2" role="tab">Conventional Sector</a>

                            <a class="nav-link" data-toggle="pill" href="#nf-mnfctrtab3" role="tab">Bamboo</a>

                            <a class="nav-link"  data-toggle="pill" href="#nf-mnfctrtab4" role="tab">Handloom and Handicraft</a>

                          </div>

                        </div>

                        <div class="nf-right-megatab">

                          <div class="tab-content" id="nf-mnfctr-Content">

                            <div class="tab-pane fade show active" id="nf-mnfctrtab1" role="tabpanel">

                              <div class="mega-panel-sec lg-size">

                                <h5>Categories</h5>

                                <div class="panel"><a href="<?php echo site_url()?>/ready-to-eat"><div class="panel-body nf-brlf1"> Ready to Eat</div></a></div>

                                <div class="panel"><a href="<?php echo site_url()?>/ready-to-cook"><div class="panel-body nf-brlf2"> Ready to Cook</div></a></div>

                                <div class="panel"><a href="<?php echo site_url()?>/traditional-food"><div class="panel-body nf-brlf3"> Traditional Food</div></a></div>

                                <div class="panel"><a href="<?php echo site_url()?>/dairy-products"><div class="panel-body nf-brlf4"> Dairy Products</div></a></div>

                                <div class="panel"><a href="<?php echo site_url()?>/confectionary"><div class="panel-body nf-brlf5"> Confectionery</div></a></div>

                                <div class="panel"><a href="<?php echo site_url()?>/biscuits"><div class="panel-body nf-brlf6"> Biscuits</div></a></div>

                                <div class="panel"><a href="<?php echo site_url()?>/beverages"><div class="panel-body nf-brlf1"> Beverages</div></a></div>

                                <div class="panel"><a href="<?php echo site_url()?>/bakery-pastries"><div class="panel-body nf-brlf2"> Bakery & Pastries</div></a></div>

                                <div class="panel"><a href="<?php echo site_url()?>/functional-food"><div class="panel-body nf-brlf3"> Functional Food</div></a></div>

                                <div class="panel"><a href="<?php echo site_url()?>/diet-food"><div class="panel-body nf-brlf4"> Diet Food</div></a></div>

                                <div class="panel"><a href="<?php echo site_url()?>/food-ingredients"><div class="panel-body nf-brlf5"> Food Ingredients</div></a></div>

                                <div class="panel"><a href="<?php echo site_url()?>/spices-seasoning"><div class="panel-body nf-brlf6"> Spices & Seasoning</div></a></div>

                                <div class="panel"><a href="<?php echo site_url()?>/nutraceutical-food-supplements"><div class="panel-body nf-brlf4"> Nutraceutical Food & Supplements </div></a></div>

                              </div>

                            </div>

                            <div class="tab-pane fade" id="nf-mnfctrtab2" role="tabpanel">

                              <div class="mega-panel-sec exlg-size">

                                <h5>Categories</h5>

                                <div class="panel"><a href="<?php echo site_url()?>/automobiles-mechanical-steel-iron-metallurgical"><div class="panel-body nf-brlf1"> Automobiles, Mechanical, Steel & Iron & Metallurgical</div></a></div>

                                <div class="panel"><a href="<?php echo site_url()?>/chemicals-organic-inorganic-with-petroleum-products"><div class="panel-body nf-brlf2"> Chemicals (Organic & Inorganic) with Petroleum Products</div></a></div>

                                <div class="panel"><a href="<?php echo site_url()?>/electrical-electronics-computers-and-infotech-it-projects"><div class="panel-body nf-brlf3">Electrical & Electronics</div></a></div>

                                <div class="panel"><a href="<?php echo site_url()?>/gums-and-adhesives"><div class="panel-body nf-brlf4">Gums & Adhesive</div></a></div>

                                <!--<div class="panel"><a href="<?php //echo site_url()?>/infotech-it-projects"><div class="panel-body nf-brlf5">Infotech/It Projects</div></a></div>-->

                                <div class="panel"><a href="<?php echo site_url()?>/leather-and-leather-products"><div class="panel-body nf-brlf6">Leather & Leather Products</div></a></div>

                                

                                <div class="panel"><a href="<?php echo site_url()?>/paint-enamel-solvents-thiners-inks"><div class="panel-body nf-brlf2">Industrial & Decorative Paints</div></a></div>



                               

                                

                                <div class="panel"><a href="<?php echo site_url()?>/plastic-bopp-acrylic-disposable-plastic-products-pet-products"><div class="panel-body nf-brlf1">Pet & Polymer Products</div></a></div>

                                

                                <div class="panel "><a href="<?php echo site_url()?>/pharmaceutical-and-healthcare"><div class="panel-body nf-brlf5">Pharmaceutical & Healthcare</div></a></div>

                                <div class="panel "><a href="<?php echo site_url()?>/pulp-paper-straw-grey-board"><div class="panel-body nf-brlf6">Pulp, Paper & Packaging</div></a></div>

                                <div class="panel "><a href="<?php echo site_url()?>/textile"><div class="panel-body nf-brlf4">Textile</div></a></div>

                                <!--nf-vheight-->

                                 <!--<div class="panel "><a href="<?php //echo site_url()?>/infotech-it-hospitality-hospital-college-school-medical-entertainment"><div class="panel-body nf-brlf3">Infotech/It, Hospitality, Hospital, College, School, Medical, Entertainment, Club, Ware Housing & Real Estate Projects.</div></a></div>-->

                                <div class="panel"><a href="<?php echo site_url()?>/miscellaneous"><div class="panel-body nf-brlf1">Miscellaneous</div></a></div>

                                

                              </div>

                            </div>

                            <div class="tab-pane fade" id="nf-mnfctrtab3" role="tabpanel">

                              <div class="mega-panel-sec lg-size">

                                <h5>Categories</h5>

                                <div class="panel"><a href="<?php echo site_url()?>/bamboo/primary-treatment-plant/"><div class="panel-body nf-brlf1"> Primary Treatment Plant</div></a></div>

                                <div class="panel"><a href="<?php echo site_url()?>/bamboo/floor-tiles/"><div class="panel-body nf-brlf2"> Engineered Wood</div></a></div>

                                <div class="panel"><a href="<?php echo site_url()?>/craft/"><div class="panel-body nf-brlf3"> Craft</div></a></div>

                                <div class="panel"><a href="<?php echo site_url()?>/bamboo/incense-sticks"><div class="panel-body nf-brlf4"> Incense Stick</div></a></div>

                                <div class="panel"><a href="<?php echo site_url()?>/bamboo/bamboo-blinds/"><div class="panel-body nf-brlf5"> Bamboo Blinds</div></a></div>

                                <div class="panel"><a href="<?php echo site_url()?>/bamboo/bamboo-charcoal/"><div class="panel-body nf-brlf6"> Bamboo Charcoal </div></a></div>

                                <div class="panel"><a href="<?php echo site_url()?>/bamboo/bamboo-bio-plastics/"><div class="panel-body nf-brlf1"> Bamboo Bio-Plastics</div></a></div>

                                <div class="panel"><a href="<?php echo site_url()?>/bamboo/bamboo-activated-carbon/"><div class="panel-body nf-brlf2"> Bamboo Activated Charcoal</div></a></div>

                                <!--<div class="panel"><a href="<?php //echo site_url()?>/bamboo/cutleries/"><div class="panel-body nf-brlf3"> Cutleries </div></a></div>-->

                                <div class="panel"><a href="<?php echo site_url()?>/bamboo/food-pharmaceutical-nutraceutical/"><div class="panel-body nf-brlf4"> Food, Pharmaceutical and Nutraceutical</div></a></div>

                                <div class="panel"><a href="<?php echo site_url()?>/bamboo/round-pole-unit/"><div class="panel-body nf-brlf5"> Round Pole Unit</div></a></div>

                                <div class="panel"><a href="<?php echo site_url()?>/bamboo/bamboo-string-lights/"><div class="panel-body nf-brlf6"> Lifestyle Product </div></a></div>

                                <div class="panel"><a href="<?php echo site_url()?>/bamboo/bamboo-engineered-wood-based-tiles/"><div class="panel-body nf-brlf1"> Floor Tiles</div></a></div>

                                <!--<div class="panel"><a href="<?php //echo site_url()?>/bamboo/bamboo-food-and-pharmaceuticals/ "><div class="panel-body nf-brlf2"> Bamboo Food and Pharmaceuticals </div></a></div>-->

                                <!--<div class="panel"><a href="<?php //echo site_url()?>/bamboo/bamboo-charcoal"><div class="panel-body nf-brlf3"> Bamboo Charcoal</div></a></div>-->

                                <div class="panel"><a href="<?php echo site_url()?>/bamboo/bamboo-vinegar/"><div class="panel-body nf-brlf4"> Bamboo Vinegar </div></a></div>

                                <!--<div class="panel"><a href="<?php //echo site_url()?>/bamboo/bamboo-activated-charcoal-carbon/"><div class="panel-body nf-brlf5"> Bamboo Activated Charcoal/ Carbon</div></a></div>-->

                                <!--<div class="panel"><a href="<?php //echo site_url()?>/bamboo/bamboo-plastic/"><div class="panel-body nf-brlf6"> Bamboo Plastic </div></a></div>-->

                                <div class="panel"><a href="<?php echo site_url()?>/bamboo/bamboo-utility-products/ "><div class="panel-body nf-brlf1"> Bamboo Utility Products </div></a></div>

                                <div class="panel"><a href="<?php echo site_url()?>/bamboo/bamboo-nursery/"><div class="panel-body nf-brlf2"> Bamboo Nursery </div></a></div>

                                <div class="panel"><a href="<?php echo site_url()?>/bamboo/bamboo-cutlery/"><div class="panel-body nf-brlf3"> Bamboo Cutlery  </div></a></div>
                                
                                <div class="panel"><a href="<?php echo site_url()?>/bamboo/bamboo-furniture/"><div class="panel-body nf-brlf6"> Bamboo Furniture  </div></a></div>
                                
                                <div class="panel"><a href="<?php echo site_url()?>/bamboo/bamboo-mat-board/"><div class="panel-body nf-brlf3"> Bamboo Mat Board  </div></a></div>

                              </div>

                            </div>

                            <div class="tab-pane fade" id="nf-mnfctrtab4" role="tabpanel">

                              <div class="mega-panel-sec lg-size">

                                <h5>Categories</h5>

                                <div class="panel"><a href="<?php echo site_url()?>/fabric-production"><div class="panel-body nf-brlf1"> Handloom</div></a></div>

                                <div class="panel"><a href="<?php echo site_url()?>/craft"><div class="panel-body nf-brlf2"> Handicraft</div></a></div>

                              </div>

                            </div>

                          </div>

                        </div>

                      </div>

                    </div>

                  </li>

                  <li style="width:150px"><a href="#">Services</a>

                  <div class="nf-tabular-menu">

                    <div class="hrz-tab-menu">

                      <div class="nf-left-megatab">

                        <div class="nav flex-column nav-pills" id="nf-services-tab" role="tablist">

                          <a class="nav-link active" data-toggle="pill" href="#nf-services-tab1" role="tab">Tourism & Hospitality</a>

                          <a class="nav-link" data-toggle="pill" href="#nf-services-tab2" role="tab">Healthcare</a>

                          <a class="nav-link" data-toggle="pill" href="#nf-services-tab3" role="tab">IT</a>

                          <a class="nav-link" data-toggle="pill" href="#nf-services-tab4" role="tab">Education</a>

                          <a class="nav-link" data-toggle="pill" href="#nf-services-tab5" role="tab">Construction</a>
                          
                          <!--<a class="nav-link" data-toggle="pill" href="#nf-services-tab6" role="tab">Trading</a>-->

                          <a class="nav-link" href="<?php echo site_url()?>/other/" role="tab">Other</a>

                        </div>

                      </div>

                      <div class="nf-right-megatab">

                        <div class="tab-content" id="nf-services-Content">

                          <div class="tab-pane fade show active" id="nf-services-tab1" role="tabpanel">

                            <div class="mega-panel-sec lg-size">

                              <h5>Categories</h5>

                              <div class="panel"><a href="<?php echo site_url()?>/hotels-and-resorts"><div class="panel-body nf-brlf1"> Hotels & Resorts</div></a></div>

                             

                              <div class="panel"><a href="<?php echo site_url()?>/services/homestay"><div class="panel-body nf-brlf2"> Homestay</div></a></div>

                              <div class="panel"><a href="<?php echo site_url()?>/tourism-adventure"><div class="panel-body nf-brlf3"> Adventure Tourism</div></a></div>

                              <div class="panel"><a href="<?php echo site_url()?>/services/nature-eco-tourism"><div class="panel-body nf-brlf4"> Nature & Eco Tourism</div></a></div>

                              <div class="panel"><a href="<?php echo site_url()?>/services/rural-tourism"><div class="panel-body nf-brlf5"> Rural Tourism</div></a></div>

                              <div class="panel"><a href="<?php echo site_url()?>/services/fast-food"><div class="panel-body nf-brlf6"> Fastfood</div></a></div>

                              <div class="panel"><a href="<?php echo site_url()?>/services/restaurant/"><div class="panel-body nf-brlf1"> Restaurant</div></a></div>

                            </div>

                          </div>

                          <div class="tab-pane fade" id="nf-services-tab2" role="tabpanel">

                            <div class="mega-panel-sec lg-size">

                              <h5>Categories</h5>

                              <div class="panel"><a href="<?php echo site_url()?>/services/nursing-home/"><div class="panel-body nf-brlf1"> Nursing Home</div></a></div>

                              <div class="panel"><a href="<?php echo site_url()?>/services/diagnostic-center/"><div class="panel-body nf-brlf2"> Diagnostic Center</div></a></div>

                              <div class="panel"><a href="<?php echo site_url()?>/services/dental-clinic/"><div class="panel-body nf-brlf3"> Dental Clinic</div></a></div>

                              <div class="panel"><a href="<?php echo site_url()?>/services/medical-college/"><div class="panel-body nf-brlf4"> Medical College</div></a></div>

                              <div class="panel"><a href="<?php echo site_url()?>/services/mental-retardation-hospital-cerebral-palsy/"><div class="panel-body nf-brlf5"> Mental Retardation Hospital & Cerebral Palsy</div></a></div>

                              <div class="panel"><a href="<?php echo site_url()?>/services/rehabilitation-centre-for-drug-addiction/"><div class="panel-body nf-brlf6"> Rehabilitation Centre for Drug Addiction</div></a></div>

                              <div class="panel"><a href="<?php echo site_url()?>/services/physiotherapy/"><div class="panel-body nf-brlf1"> Physiotherapy</div></a></div>

                              <div class="panel"><a href="<?php echo site_url()?>/services/nature-care-center/"><div class="panel-body nf-brlf2"> Nature Care Center</div></a></div>
                             
                             <div class="panel"><a href="<?php echo site_url()?>/services/health-club-fitness-centre/"><div class="panel-body nf-brlf4"> Health Club Fitness Centre</div></a></div>
                            </div>

                          </div>

                          <div class="tab-pane fade" id="nf-services-tab3" role="tabpanel">

                            <div class="mega-panel-sec lg-size">

                              <h5>Categories</h5>

                              <div class="panel"><a href="<?php echo site_url()?>/services/data-processing-center/"><div class="panel-body nf-brlf1"> Data Processing Center </div></a></div>

                              <div class="panel"><a href="<?php echo site_url()?>/services/internet-service-provider/"><div class="panel-body nf-brlf2"> Internet Service Provider</div></a></div>

                              <div class="panel"><a href="<?php echo site_url()?>/services/it-park/"><div class="panel-body nf-brlf3"> IT Park</div></a></div>

                              <!--<div class="panel"><a href="<?php //echo site_url()?>/services/medical-college/"><div class="panel-body nf-brlf4"> Medical College</div></a></div>-->

                              <div class="panel"><a href="<?php echo site_url()?>/services/e-commerce/"><div class="panel-body nf-brlf5"> E-Commerce</div></a></div>

                              <div class="panel"><a href="<?php echo site_url()?>/services/computer-software/"><div class="panel-body nf-brlf6"> Computer Software</div></a></div>

                              <div class="panel"><a href="<?php echo site_url()?>/services/website-design-e-mail-registering/"><div class="panel-body nf-brlf1"> Website Design & E-mail Registering</div></a></div>
                                <div class="panel"><a href="<?php echo site_url()?>/services/computer-and-laptop-service-centre/"><div class="panel-body nf-brlf3"> Computer and Laptop Service Centre</div></a></div>
                            </div>

                          </div>

                          <div class="tab-pane fade" id="nf-services-tab4" role="tabpanel">

                            <div class="mega-panel-sec lg-size">

                              <h5>Categories</h5>

                              <div class="panel"><a href="<?php echo site_url()?>/services/b-ed-law-college/"><div class="panel-body nf-brlf1"> B.Ed & Law College </div></a></div>

                              <div class="panel"><a href="<?php echo site_url()?>/services/engineering-college/"><div class="panel-body nf-brlf2"> Engineering College</div></a></div>

                              <div class="panel"><a href="<?php echo site_url()?>/services/fashion-technology-institute/"><div class="panel-body nf-brlf3"> Fashion Technology Institute</div></a></div>

                              <div class="panel"><a href="<?php echo site_url()?>/services/secondary-school/"><div class="panel-body nf-brlf4"> Secondary School</div></a></div>

                              <div class="panel"><a href="<?php echo site_url()?>/services/residential-school/"><div class="panel-body nf-brlf5"> Residential School</div></a></div>

                              <div class="panel"><a href="<?php echo site_url()?>/services/play-school/"><div class="panel-body nf-brlf6"> Play School</div></a></div>

                              <div class="panel"><a href="<?php echo site_url()?>/services/computer-training-institute/"><div class="panel-body nf-brlf4"> Computer Training Institute</div></a></div>

                              <div class="panel"><a href="<?php echo site_url()?>/services/college/"><div class="panel-body nf-brlf1"> College</div></a></div>

                              <div class="panel"><a href="<?php echo site_url()?>/services/hostel-for-boys-and-girls/"><div class="panel-body nf-brlf2"> Hostel (for Boys and Girls)</div></a></div>

                              <div class="panel"><a href="<?php echo site_url()?>/services/senior-secondary-school/"><div class="panel-body nf-brlf3"> Senior Secondary School</div></a></div>

                              <div class="panel"><a href="<?php echo site_url()?>/services/veterinary-college-and-hospital/"><div class="panel-body nf-brlf1"> Veterinary College and Hospital</div></a></div>
                              <div class="panel"><a href="<?php echo site_url()?>/services/managment-institute/"><div class="panel-body nf-brlf2"> Management Institute</div></a></div>
                              <div class="panel"><a href="<?php echo site_url()?>/services/health-cum-beauty-parlour-training-institute/"><div class="panel-body nf-brlf6"> Health Cum Beauty Parlour Training Institute</div></a></div>
                            </div>

                          </div>

                          <div class="tab-pane fade" id="nf-services-tab5" role="tabpanel">

                            <div class="mega-panel-sec lg-size">

                              <h5>Categories</h5>

                              <div class="panel"><a href="<?php echo site_url()?>/services/multistorey-commercial-complex/"><div class="panel-body nf-brlf1"> Multistorey Commercial Complex</div></a></div>

                              <div class="panel"><a href="<?php echo site_url()?>/services/multiplex-cum-entertainment-center/"><div class="panel-body nf-brlf2"> Multiplex Cum Entertainment Center</div></a></div>

                              <div class="panel"><a href="<?php echo site_url()?>/services/township/"><div class="panel-body nf-brlf3"> Township</div></a></div>

                              <div class="panel"><a href="<?php echo site_url()?>/services/special-economic-zone-sez-industrial-park/"><div class="panel-body nf-brlf4"> Special Economic Zone (SEZ)/Industrial Park</div></a></div>

                              <div class="panel"><a href="<?php echo site_url()?>/services/tourist-club/"><div class="panel-body nf-brlf5"> Tourist Club</div></a></div>

                              <div class="panel"><a href="<?php echo site_url()?>/services/warehouse-godown-for-paddy-jutemaize/"><div class="panel-body nf-brlf6"> Warehouse Godown for Paddy, Jute,Maize</div></a></div>
                                <div class="panel"><a href="<?php echo site_url()?>/services/concrete-tiles-and-paving-blocks/"><div class="panel-body nf-brlf2"> Concrete Tiles and Paving Blocks </div></a></div>
                            
                                <div class="panel"><a href="<?php echo site_url()?>/services/soil-cement-block/"><div class="panel-body nf-brlf4"> Soil Cement Block </div></a></div>
                            </div>

                          </div>

                          <?php /*?><div class="tab-pane fade show " id="nf-services-tab6" role="tabpanel">
                            <div class="mega-panel-sec lg-size">
                              <h5>Categories</h5>
                              <div class="panel"><a href="<?php echo site_url()?>/garments"><div class="panel-body nf-brlf1">Garments</div></a></div>
                                    <div class="panel"><a href="<?php echo site_url()?>/electronics"><div class="panel-body nf-brlf2"> Electronics</div></a></div>
                                    <div class="panel"><a href="<?php echo site_url()?>/accessories"><div class="panel-body nf-brlf3"> Accessories </div></a></div>
                                    <div class="panel"><a href="<?php echo site_url()?>/food"><div class="panel-body nf-brlf4"> Food </div></a></div>
                                    <div class="panel"><a href="<?php echo site_url()?>/sports-and-fitness"><div class="panel-body nf-brlf5">Sports and Fitness</div></a></div>
                                    <div class="panel"><a href="<?php echo site_url()?>/general"><div class="panel-body nf-brlf6">General</div></a></div>
                                    <div class="panel"><a href="<?php echo site_url()?>/stores"><div class="panel-body nf-brlf2"> Stores </div></a></div>
                                  <div class="panel"><a href="<?php echo site_url()?>/service-unit"><div class="panel-body nf-brlf1"> Service Unit </div></a></div>
                            </div>
                          </div><?php */?>

                        </div>

                      </div>

                    </div>

                  </div>

                </li>
                <!----trading----->
                 <?php
                    // args
                    $args = array(
                      'post_type'   => 'service_trading',
                      'orderby' => 'post_title',
                      'order'   => 'ASC',
                      'post_status' => 'publish',
                      'posts_per_page' => -1
                    );
                    $the_query = new WP_Query( $args );
                    ?>
                <li><a href="#">Trading</a>
                  <div class="nf-tabular-menu">
                    <div class="hrz-tab-menu">
                      <div class="nf-left-megatab">
                        <div class="nav flex-column nav-pills" id="nf-trd-tab" role="tablist">
                          <a class="nav-link active" data-toggle="pill" href="#nf-trd-tab1" role="tab">Garments</a>
                          <a class="nav-link" data-toggle="pill" href="#nf-trd-tab2" role="tab">Electronics</a>
                          <a class="nav-link" data-toggle="pill" href="#nf-trd-tab3" role="tab">Accessories</a>
                          <a class="nav-link" data-toggle="pill" href="#nf-trd-tab4" role="tab">Food </a>
                          <a class="nav-link" data-toggle="pill" href="#nf-trd-tab5" role="tab">Sports and Fitness</a>
                          <a class="nav-link" data-toggle="pill" href="#nf-trd-tab6" role="tab">General</a>
                          <a class="nav-link" data-toggle="pill" href="#nf-trd-tab7" role="tab">Stores</a>
                          <a class="nav-link" data-toggle="pill" href="#nf-trd-tab8" role="tab">Service Unit</a>
                        </div>
                      </div>
                      <div class="nf-right-megatab">
                        <div class="tab-content" id="nf-trd-Content">
                          <div class="tab-pane fade show active" id="nf-trd-tab1" role="tabpanel">
                            <div class="mega-panel-sec lg-size">
                              <h5>Categories</h5>
                              <?php if( $the_query->have_posts() ): $bb=0;?>
                              <?php while( $the_query->have_posts() ): $the_query->the_post(); 
                              $values= get_fields();
                              if($values['sector']=='Garments'):
                                  $bb++;
                                  if($bb==7){ $bb=1;}
                              ?>
                                <div class="panel"><a href="<?php the_permalink()?>"><div class="panel-body nf-brlf<?php echo $bb?>"> <?php the_title(); ?></div></a></div>
                            <?php 
                              endif; 
                                endwhile; 
                                    endif; 
                                    wp_reset_query();
                                    wp_reset_postdata();
                            ?>
                              
                            </div>
                          </div>
                          <div class="tab-pane fade" id="nf-trd-tab2" role="tabpanel">
                            <div class="mega-panel-sec lg-size">
                              <h5>Categories</h5>
                              <?php if( $the_query->have_posts() ): $bb=0;?>
                              <?php while( $the_query->have_posts() ) : $the_query->the_post(); 
                              $values= get_fields();
                              if($values['sector']=='Electronics'):
                                  $bb++;
                                  if($bb==7) $bb=1;
                              ?>
                                <div class="panel"><a href="<?php the_permalink()?>"><div class="panel-body nf-brlf<?php echo $bb?>"> <?php the_title(); ?></div></a></div>
                            <?php 
                              endif; 
                                endwhile; 
                                    endif; 
                                    wp_reset_query();
                                    wp_reset_postdata();
                            ?>
                            </div>
                          </div>
                          <div class="tab-pane fade" id="nf-trd-tab3" role="tabpanel">
                            <div class="mega-panel-sec lg-size">
                              <h5>Categories</h5>
                              <?php if( $the_query->have_posts() ): $bb=0;?>
                              <?php while( $the_query->have_posts() ) : $the_query->the_post(); 
                              $values= get_fields();
                              if($values['sector']=='Accessories'):
                                  $bb++;
                                  if($bb==7) $bb=1;
                              ?>
                                <div class="panel"><a href="<?php the_permalink()?>"><div class="panel-body nf-brlf<?php echo $bb?>"> <?php the_title(); ?></div></a></div>
                            <?php 
                              endif; 
                                endwhile; 
                                    endif; 
                                    wp_reset_query();
                                    wp_reset_postdata();
                            ?>
                            </div>
                          </div>
                          <div class="tab-pane fade" id="nf-trd-tab4" role="tabpanel">
                            <div class="mega-panel-sec lg-size">
                              <h5>Categories</h5>
                              <?php if( $the_query->have_posts() ): $bb=0;?>
                              <?php while( $the_query->have_posts() ) : $the_query->the_post(); 
                              $values= get_fields();
                              if($values['sector']=='Food'):
                                  $bb++;
                                  if($bb==7) $bb=1;
                              ?>
                                <div class="panel"><a href="<?php the_permalink()?>"><div class="panel-body nf-brlf<?php echo $bb?>"> <?php the_title(); ?></div></a></div>
                            <?php 
                              endif; 
                                endwhile; 
                                    endif; 
                                    wp_reset_query();
                                    wp_reset_postdata();
                            ?>
                            </div>
                          </div>
                          <div class="tab-pane fade" id="nf-trd-tab5" role="tabpanel">
                            <div class="mega-panel-sec lg-size">
                              <h5>Categories</h5>
                              <?php if( $the_query->have_posts() ): $bb=0;?>
                              <?php while( $the_query->have_posts() ) : $the_query->the_post(); 
                              $values= get_fields();
                              if($values['sector']=='Sports and Fitness'):
                                  $bb++;
                                  if($bb==7) $bb=1;
                              ?>
                                <div class="panel"><a href="<?php the_permalink()?>"><div class="panel-body nf-brlf<?php echo $bb?>"> <?php the_title(); ?></div></a></div>
                            <?php 
                              endif; 
                                endwhile; 
                                    endif; 
                                    wp_reset_query();
                                    wp_reset_postdata();
                            ?>
                            </div>
                          </div>
                          <div class="tab-pane fade show " id="nf-trd-tab6" role="tabpanel">
                            <div class="mega-panel-sec lg-size">
                              <h5>Categories</h5>
                              <?php if( $the_query->have_posts() ): $bb=0;?>
                              <?php while( $the_query->have_posts() ) : $the_query->the_post(); 
                              $values= get_fields();
                              if($values['sector']=='General'):
                                  $bb++;
                                  if($bb==7){ $bb=1;}
                              ?>
                                <div class="panel"><a href="<?php the_permalink()?>"><div class="panel-body nf-brlf<?php echo $bb?>"> <?php the_title(); ?></div></a></div>
                            <?php 
                              endif; 
                                endwhile; 
                                    endif; 
                                    wp_reset_query();
                                    wp_reset_postdata();
                            ?>
                            </div>
                          </div>
                          <div class="tab-pane fade show " id="nf-trd-tab7" role="tabpanel">
                            <div class="mega-panel-sec lg-size">
                              <h5>Categories</h5>
                              <?php if( $the_query->have_posts() ): $bb=0;?>
                              <?php while( $the_query->have_posts() ) : $the_query->the_post(); 
                              $values= get_fields();
                              if($values['sector']=='Stores'):
                                  $bb++;
                                  if($bb==7) $bb=1;
                              ?>
                                <div class="panel"><a href="<?php the_permalink()?>"><div class="panel-body nf-brlf<?php echo $bb?>"> <?php the_title(); ?></div></a></div>
                            <?php 
                              endif; 
                                endwhile; 
                                    endif; 
                                    wp_reset_query();
                                    wp_reset_postdata();
                            ?>
                            </div>
                          </div>
                          <div class="tab-pane fade show " id="nf-trd-tab8" role="tabpanel">
                            <div class="mega-panel-sec lg-size">
                              <h5>Categories</h5>
                              <?php if( $the_query->have_posts() ): $bb=0;?>
                              <?php while( $the_query->have_posts() ) : $the_query->the_post(); 
                              $values= get_fields();
                              if($values['sector']=='Service Unit'):
                                  $bb++;
                                  if($bb==7) $bb=1;
                              ?>
                                <div class="panel"><a href="<?php the_permalink()?>"><div class="panel-body nf-brlf<?php echo $bb?>"> <?php the_title(); ?></div></a></div>
                            <?php 
                              endif; 
                                endwhile; 
                                    endif; 
                                    wp_reset_query();
                                    wp_reset_postdata();
                            ?>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
                <!--trd end---->

              </ul>

            </div>

          </div>

        </li>

        <li><a href="<?php echo site_url()?>/know-your-approvals">Know your Approvals</a></li>

        <li><a href="<?php echo site_url()?>/schemes-policies">Schemes & Policies<!--Govt Schemes--></a></li>

        <li><a href="<?php echo site_url()?>/market-support-infrastructure/">Market & Infrastructure</a></li>

        <li><a href="<?php echo site_url()?>/credit-linkage-support-search/">Loan Support</a></li>

        <!--<li><a href="<?php //echo site_url()?>/loan-support-search/">Loan Support</a></li>-->

        <li><a href="<?php echo site_url()?>/success-stories-details">Success Stories</a></li>

        <!--<li><a href="#">News & Events</a></li>-->

        <li><a href="<?php echo site_url()?>/forums">Ask a Question</a></li>

      </ul>

    </div>

  </div>

</div>

</li>

                          <li><a href="#">Resources</a>

                            <div class="megamenu">

                            <div class="megamenu-row">

                              <div class="col12">

                                <ul class="hrs-menu">

                                  <li class="nf-mb-menu"><a href="<?php echo site_url()?>/training_page">Training & Capacity Building</a></li>

                                  <li class="nf-mb-menu"><a href="<?php echo site_url()?>/mentors-incubators">Mentors & Incubators</a></li>

                                  <!--<li class="nf-mb-menu"><a href="<?php //echo site_url()?>/career-coach-search">Career Coach</a></li>-->

                                  <li><a href="#">Career Coach</a>

                                      <div class="mega-submenu">

                                        <div class="cources-menu">

                                          <h4 class="menu-subtitle">Select Sector (7)</h4>

                                          <ul class="vrt-menu-scroll">



                                          <li>

                                            <a class="box" href="<?php echo site_url()?>/career-coach-search/?Performing-Arts">

                                              <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/skills-for-pwd.png" alt="Icon">

                                              <span>Performing Arts</span>

                                            </a>

                                          </li>

                                          <li>

                                            <a class="box" href="<?php echo site_url()?>/career-coach-search/?Yoga-and-Sports">

                                              <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/yoga-naturopathy.png" alt="Icon">

                                              <span>Yoga and Sports</span>

                                            </a>

                                          </li>

                                          <li>

                                            <a class="box" href="<?php echo site_url()?>/career-coach-search/?Fine-Arts">

                                              <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/humanities(SoftSkills).png" alt="Icon">

                                              <span>Fine Arts</span>

                                            </a>

                                          </li>                              

                                          <li>

                                            <a class="box" href="<?php echo site_url()?>/career-coach-search/?Personality-Development">

                                              <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/business.png" alt="Icon">

                                              <span>Personality Development</span>

                                            </a>

                                          </li>



                                          <li>

                                            <a class="box" href="<?php echo site_url()?>/career-coach-search/?Freelance-Writing">

                                              <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/Rubber.png" alt="Icon">

                                              <span>Freelance Writing</span>

                                            </a>

                                          </li>

                                          <li>

                                            <a class="box" href="<?php echo site_url()?>/career-coach-search/?Cinematography">

                                              <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/beauty-and-wellness.png" alt="Icon">

                                              <span>Cinematography</span>

                                            </a>

                                          </li>

                                          <li>

                                            <a class="box" href="<?php echo site_url()?>/career-coach-search/?Competitive-Exams">

                                              <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/other-exam.png" alt="Icon">

                                              <span>Competitive Exams</span>

                                            </a>

                                          </li>

                                          

                                        </ul>

                                      </div>

                                    </div>

                                    </li><!-- Learn and Earn -->



                                

                                  <!--<li class="nf-mb-menu"><a href="#">Infrastructutre & Manufacturing</a></li>-->

                                  <li class="nf-mb-menu"><a href="<?php echo site_url()?>/e-learning">E-Learning</a></li>

                                  <li class="nf-mb-menu"><a href="<?php echo site_url()?>/success-stories-details">Success Stories</a></li>

                                  <li class="nf-mb-menu"><a href="<?php echo site_url()?>/schemes-policies">Schemes & Policies</a></li>

                                  <li class="nf-mb-menu"><a href="<?php echo site_url()?>/apps-journals">Apps and Journals</a></li>

                                

                                  <!--<li class="nf-mb-menu"><a href="#">Training & Capacity Building</a></li>

                                  <li class="nf-mb-menu"><a href="#">Mentors & Incubators</a></li>

                                  <li class="nf-mb-menu"><a href="#">E-Learning</a></li>

                                  <li class="nf-mb-menu"><a href="#">Sucess Strories</a></li>

                                  <li class="nf-mb-menu"><a href="#">Schemes & Policies</a></li>

                                  <li class="nf-mb-menu"><a href="#">Apps and Journals</a></li>-->

                                </ul>

                              </div>

                            </div>

                          </div>

                          </li>

                          <li><a href="<?php echo site_url()?>/contact-us">Contact Us</a></li>
                          
                          <li><a href="#" class="blink_text">Events</a></li>

                        </ul>

                      </div>

                 

              </div>

            </div>

            <!-- /end header-bottom -->





            <!-- Responsive Mega Menu -->

      <div class="cd-dropdown-wrapper">

        <a class="cd-dropdown-trigger" href="#0"><i class="fa fa-bars"></i></a>

        <nav class="cd-dropdown">

          <h2>Menu</h2>

          <a href="#0" class="cd-close">Close</a>

          <ul class="cd-dropdown-content">

            <li><a href="<?php echo site_url()?>/about">About</a></li>

            <li class="has-children">

              <a href="#">Education</a>

              <ul class="cd-secondary-dropdown is-hidden">

                <li class="go-back"><a href="#0">Education Menu</a></li>

                <li class="has-children">

                  <a href="#">Career</a>

                  <ul class="cd-dropdown-gallery is-hidden">

                    <li class="go-back"><a href="#0">Career Menu</a></li>

                    <li>

                      <div class="cources-menu">

                        <h4 class="menu-subtitle">Select Course (22)</h4>

                        <ul class="vrt-menu-scroll">

                          <li>

                            <a class="box" href="<?php echo site_url()?>/career_type/agriculture-and-food-sciences/">

                              <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/agriculture-and-food-science.png" alt="Icon">

                              <span>Agriculture and Food Sciences</span>

                            </a>

                          </li>

                          <li>

                            <a class="box" href="<?php echo site_url()?>/career_type/physical-sciences/">

                              <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/physical-science.png" alt="Icon">

                              <span>Physical Sciences</span>

                            </a>

                          </li>

                          <li>

                            <a class="box" href="<?php echo site_url()?>/career_type/life-science-and-environment/">

                              <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/life-science.png" alt="Icon">

                              <span>Life Science and Environment</span>

                            </a>

                          </li>

                          <li>

                            <a class="box" href="<?php echo site_url()?>/career_type/math-and-statistics/">

                              <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/maths-and-stats.png" alt="Icon">

                              <span>Math and Statistics</span>

                            </a>

                          </li>

                          <li>

                            <a class="box" href="<?php echo site_url()?>/career_type/medical-sciences/">

                              <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/medical-sciences.png" alt="Icon">

                              <span>Medical Sciences</span>

                            </a>

                          </li>

                          <li>

                            <a class="box" href="<?php echo site_url()?>/career_type/allied-medical-sciences/">

                              <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/allied-medical.png" alt="Icon">

                              <span>Allied Medical Sciences</span>

                            </a>

                          </li>

                          <li>

                            <a class="box" href="<?php echo site_url()?>/career_type/sports-and-fitness/">

                              <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/sports.png" alt="Icon">

                              <span>Sports and Fitness</span>

                            </a>

                          </li>

                          <li>

                            <a class="box" href="<?php echo site_url()?>/career_type/engineering/">

                              <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/engineering.png" alt="Icon">

                              <span>Engineering</span>

                            </a>

                          </li>

                          <li>

                            <a class="box" href="<?php echo site_url()?>/career_type/architecture-and-planning/">

                              <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/Architecture.png" alt="Icon">

                              <span>Architecture and Planning</span>

                            </a>

                          </li>

                          <li>

                            <a class="box" href="<?php echo site_url()?>/career_type/design/">

                              <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/Design.png" alt="Icon">

                              <span>Design</span>

                            </a>

                          </li>

                          <li>

                            <a class="box" href="<?php echo site_url()?>/career_type/defence-services/">

                              <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/Defence.png" alt="Icon">

                              <span>Defence Services</span>

                            </a>

                          </li>

                          <li>

                            <a class="box" href="<?php echo site_url()?>/career_type/performing-applied-arts/">

                              <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/Arts.png" alt="Icon">

                              <span>Performing  & Applied Arts</span>

                            </a>

                          </li>

                          <li>

                            <a class="box" href="<?php echo site_url()?>/career_type/government-civil-services/">

                              <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/Government.png" alt="Icon">

                              <span>Government/ Civil Services</span>

                            </a>

                          </li>

                          <li>

                            <a class="box" href="<?php echo site_url()?>/career_type/social-sciences-and-liberal-studies/">

                              <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/social-science.png" alt="Icon">

                              <span>Social Sciences and Liberal Studies</span>

                            </a>

                          </li>

                          <li>

                            <a class="box" href="<?php echo site_url()?>/career_type/commerce-accounts-finance/">

                              <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/commerce.png" alt="Icon">

                              <span>Commerce, Accounts & Finance</span>

                            </a>

                          </li>

                          <li>

                            <a class="box" href="<?php echo site_url()?>/career_type/business-management-studies/">

                              <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/business.png" alt="Icon">

                              <span>Business & Management Studies</span>

                            </a>

                          </li>

                          <li>

                            <a class="box" href="<?php echo site_url()?>/career_type/media-and-mass-communication/">

                              <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/mass-media.png" alt="Icon">

                              <span>Media and Mass communication</span>

                            </a>

                          </li>

                          <li>

                            <a class="box" href="<?php echo site_url()?>/career_type/hospitality-and-tourism/">

                              <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/hospitality.png" alt="Icon">

                              <span>Hospitality and Tourism</span>

                            </a>

                          </li>

                          <li>

                            <a class="box" href="<?php echo site_url()?>/career_type/education-and-teaching/">

                              <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/education.png" alt="Icon">

                              <span>Education and Teaching</span>

                            </a>

                          </li>

                          <li>

                            <a class="box" href="<?php echo site_url()?>/career_type/technical-electronics-hardware/">

                              <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/technical-electronics.png" alt="Icon">

                              <span>Technical/Electronics & Hardware</span>

                            </a>

                          </li>

                          <li>

                            <a class="box" href="<?php echo site_url()?>/career_type/computer-science-it/">

                              <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/computer.png" alt="Icon">

                              <span>Computer Science & IT</span>

                            </a>

                          </li>

                          <li>

                            <a class="box" href="<?php echo site_url()?>/career_type/law/">

                              <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/Law.png" alt="Icon">

                              <span>Law</span>

                            </a>

                          </li>

                        </ul>

                      </div>

                    </li>



                   

                  </ul> <!-- .cd-dropdown-gallery -->

                </li>

                <li class="has-children">

                  <a href="#">Entrance Exams</a>

                  <ul class="cd-dropdown-gallery is-hidden">

                    <li class="go-back"><a href="#0">Entrance Exams Menu</a></li>

                    <li>

                      <div class="cources-menu">

                        <h4 class="menu-subtitle">Select Course (13)</h4>

                        <ul class="vrt-menu-scroll">

                          <li>

                            <a class="box" href="<?php echo site_url()?>/exam_type/science-and-math/">

                              <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/computer.png" alt="Icon">

                              <span>Science and Math</span>

                            </a>

                          </li>

                          <li>

                            <a class="box" href="<?php echo site_url()?>/exam_type/medical-and-allied-sciences/">

                              <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/allied-medical.png" alt="Icon">

                              <span>Medical and Allied Sciences</span>

                            </a>

                          </li>

                          <li>

                            <a class="box" href="<?php echo site_url()?>/exam_type/engineering-and-technology/">

                              <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/engineering.png" alt="Icon">

                              <span>Engineering and Technology</span>

                            </a>

                          </li>

                          <li>

                            <a class="box" href="<?php echo site_url()?>/exam_type/architecture-and-planning/">

                              <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/Architecture.png" alt="Icon">

                              <span>Architecture and Planning</span>

                            </a>

                          </li>

                          <li>

                            <a class="box" href="<?php echo site_url()?>/exam_type/art-and-design/">

                              <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/Arts.png" alt="Icon">

                              <span>Art and Design</span>

                            </a>

                          </li>

                          <li>

                            <a class="box" href="<?php echo site_url()?>/exam_type/commerce-accounts-finance/">

                              <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/commerce.png" alt="Icon">

                              <span>Commerce, Accounts & Finance</span>

                            </a>

                          </li>

                          <li>

                            <a class="box" href="<?php echo site_url()?>/exam_type/business-and-management-studies/">

                              <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/business.png" alt="Icon">

                              <span>Business and Management Studies</span>

                            </a>

                          </li>

                          <li>

                            <a class="box" href="<?php echo site_url()?>/exam_type/law/">

                              <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/Law.png" alt="Icon">

                              <span>Law</span>

                            </a>

                          </li>

                          <li>

                            <a class="box" href="<?php echo site_url()?>/exam_type/media-and-mass-communication/">

                              <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/mass-media.png" alt="Icon">

                              <span>Media and Mass Communication</span>

                            </a>

                          </li>

                          <li>

                            <a class="box" href="<?php echo site_url()?>/exam_type/social-sciences-liberal-studies/">

                              <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/social-science.png" alt="Icon">

                              <span>Social Sciences & Liberal Studies</span>

                            </a>

                          </li>

                          <li>

                            <a class="box" href="<?php echo site_url()?>/exam_type/hospitality-and-tourism/">

                              <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/hospitality.png" alt="Icon">

                              <span>Hospitality and Tourism</span>

                            </a>

                          </li>

                          <li>

                            <a class="box" href="<?php echo site_url()?>/exam_type/education-and-teaching/">

                              <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/education.png" alt="Icon">

                              <span>Education and Teaching</span>

                            </a>

                          </li>

                          <li>

                            <a class="box" href="<?php echo site_url()?>/exam_type/university-entrance-exams/">

                              <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/University.png" alt="Icon">

                              <span>University Entrance Exams</span>

                            </a>

                          </li>

                          

                        </ul>

                      </div>

                    </li>



                  </ul> <!-- .cd-dropdown-gallery -->

                </li>

                <li><a href="<?php echo site_url()?>/study-in-north-east/">Study in North -East</a></li>



                   <li class="has-children">

                            <a href="#">Higher Education India</a>

                            <ul class="cd-dropdown-gallery is-hidden">

                              <li class="go-back"><a href="#0">Higher Education India Menu</a></li>

                              <li>

                                <div class="cources-menu">

                                  <h4 class="menu-subtitle">Select Course (13)</h4>

                                  <ul class="vrt-menu-scroll">

                                    <li>

                                      <a class="box" href="<?php echo site_url()?>/higher-education-india-list/?Law">

                                        <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/Law.png" alt="Icon">

                                        <span>Law</span>

                                      </a>

                                    </li>

                                    <li>

                                      <a class="box" href="<?php echo site_url()?>/higher-education-india-list/?Science-and-Math">

                                        <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/computer.png" alt="Icon">

                                        <span>Science and Math</span>

                                      </a>

                                    </li>

                                    <li>

                                      <a class="box" href="<?php echo site_url()?>/higher-education-india-list/?Medical-and-Allied-Sciences">

                                        <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/allied-medical.png" alt="Icon">

                                        <span>Medical and Allied Sciences</span>

                                      </a>

                                    </li>

                                    <li>

                                      <a class="box" href="<?php echo site_url()?>/higher-education-india-list/?Engineering-and-Technology">

                                        <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/engineering.png" alt="Icon">

                                        <span>Engineering and Technology</span>

                                      </a>

                                    </li>

                                    <li>

                                      <a class="box" href="<?php echo site_url()?>/higher-education-india-list/?Architecture-and-Planning">

                                        <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/Architecture.png" alt="Icon">

                                        <span>Architecture and Planning</span>

                                      </a>

                                    </li>

                                    <li>

                                      <a class="box" href="<?php echo site_url()?>/higher-education-india-list/?Art-and-Design">

                                        <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/Arts.png" alt="Icon">

                                        <span>Art and Design</span>

                                      </a>

                                    </li>

                                    <li>

                                      <a class="box" href="<?php echo site_url()?>/higher-education-india-list/?Commerce,-Accounts-and-Finance">

                                        <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/commerce.png" alt="Icon">

                                        <span>Commerce, Accounts & Finance</span>

                                      </a>

                                    </li>

                                    <li>

                                      <a class="box" href="<?php echo site_url()?>/higher-education-india-list/?Business-and-Management-Studies">

                                        <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/business.png" alt="Icon">

                                        <span>Business and Management Studies</span>

                                      </a>

                                    </li>



                                    <li>

                                      <a class="box" href="<?php echo site_url()?>/higher-education-india-list/?Media-and-Mass-Communication">

                                        <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/mass-media.png" alt="Icon">

                                        <span>Media and Mass Communication</span>

                                      </a>

                                    </li>

                                    <li>

                                      <a class="box" href="<?php echo site_url()?>/higher-education-india-list/?Social-Sciences-and-Liberal-Studies">

                                        <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/social-science.png" alt="Icon">

                                        <span>Social Sciences & Liberal Studies</span>

                                      </a>

                                    </li>

                                    <li>

                                      <a class="box" href="<?php echo site_url()?>/higher-education-india-list/?Hospitality-and-Tourism">

                                        <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/hospitality.png" alt="Icon">

                                        <span>Hospitality and Tourism</span>

                                      </a>

                                    </li>

                                    <li>

                                      <a class="box" href="<?php echo site_url()?>/higher-education-india-list/?Education-and-Teaching">

                                        <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/education.png" alt="Icon">

                                        <span>Education and Teaching</span>

                                      </a>

                                    </li>

                                    <!--<li>

                                      <a class="box" href="<?php //echo site_url()?>/higher-education-india-list/?University-Entrance-Exams">

                                        <img src="<?php //echo get_template_directory_uri();?>/assets/img/icon/megamenu/University.png" alt="Icon">

                                        <span>University Entrance Exams</span>

                                      </a>

                                    </li>-->



                                  </ul>

                                </div>

                              </li>



                            </ul> <!-- .cd-dropdown-gallery -->

                          </li>

                

                <li><a href="<?php echo site_url()?>/study-in-abroad/">Study Abroad</a></li>

                <li><a href="<?php echo site_url()?>/scholarships/">Scholarships</a></li>

                <li><a href="<?php echo site_url()?>/fellowships/">Fellowship</a></li>

              </ul> <!-- .cd-secondary-dropdown -->

            </li> <!-- .Education -->



            <li class="has-children">

              <a href="#">Employment</a>

              <ul class="cd-secondary-dropdown is-hidden">

                <li class="go-back"><a href="#0">Employment Menu</a></li>

                <li class="has-children">

                  <a href="#">Govt. Job Exams</a>

                  <ul class="cd-dropdown-gallery is-hidden">

                    <li class="go-back"><a href="#0">Govt. Job Exams Menu</a></li>

                    <li>

                      <div class="cources-menu">

                        <h4 class="menu-subtitle">Select Exam (9)</h4>

                        <ul class="vrt-menu-scroll">

                          <li>

                            <a class="box" href="<?php echo site_url()?>/engineering/">

                              <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/engineering.png" alt="Icon">

                              <span>Engineering</span>

                            </a>

                          </li>

                          <li>

                            <a class="box" href="<?php echo site_url()?>/sciences/">

                              <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/social-science.png" alt="Icon">

                              <span>Sciences</span>

                            </a>

                          </li>

                          <li>

                            <a class="box" href="<?php echo site_url()?>/banking-and-finance/">

                              <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/banking-and-finance.png" alt="Icon">

                              <span>Banking and Finance</span>

                            </a>

                          </li>

                          

                          

                          <li>

                            <a class="box" href="<?php echo site_url()?>/legal/">

                              <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/social-science.png" alt="Icon">

                              <span>Legal</span>

                            </a>

                          </li>

                          <li>

                            <a class="box" href="<?php echo site_url()?>/defence/">

                              <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/Defence.png" alt="Icon">

                              <span>Defence</span>

                            </a>

                          </li>

                          <li>

                            <a class="box" href="<?php echo site_url()?>/medicine-and-allied-medicine/">

                              <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/allied-medical.png" alt="Icon">

                              <span>Medicine and Allied Medicine</span>

                            </a>

                          </li>

                          <li>

                            <a class="box" href="<?php echo site_url()?>/public-administration-civil-services/">

                              <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/Architecture.png" alt="Icon">

                              <span>Public Administration & Civil Services</span>

                            </a>

                          </li>

                          <li>

                            <a class="box" href="<?php echo site_url()?>/education-training/">

                              <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/education.png" alt="Icon">

                              <span>Education & Training</span>

                            </a>

                          </li>
                          <li>

                            <a class="box" href="<?php echo site_url()?>/other-exams/">

                              <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/other-exam.png" alt="Icon">

                              <span>Other Exams</span>

                            </a>

                          </li>

                        </ul>

                      </div>

                    </li>

                   

                  </ul> <!-- Entrance Exams -->

                </li>

                <li class="has-children">

                  <a href="#">Internships</a>

                  <ul class="cd-dropdown-gallery is-hidden">

                    <li class="go-back"><a href="#0">Internships Menu</a></li>

                    <li>

                      <div class="cources-menu">

                        <h4 class="menu-subtitle">Select Exam (6)</h4>

                        <ul class="vrt-menu-scroll">

                          <li>

                            <a class="box" href="<?php echo site_url()?>/find-an-intern">

                              <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/find-an-intern.png" alt="Icon">

                              <span>Find an Internship</span>

                            </a>

                          </li>

                          <li>

                            <a class="box" >

                              <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/hire-intern.png" alt="Icon">

                              <span>Hire an Intern</span>

                            </a>

                          </li>

                        </ul>

                      </div>

                    </li>



                  </ul> <!-- Internships -->

                </li>

                <li><a href="<?php echo site_url()?>/employable-skills/">Employable Skills</a></li>

                <li><a href="<?php echo site_url()?>/upskill/">Upskill</a></li>

                <li><a href="<?php echo site_url()?>/job-alert/">Job Alert</a></li>

                <li><a href="<?php echo site_url()?>/job-opportunity/">Job Opportunities</a></li>

                <li><a href="<?php echo site_url()?>/work-abroad/">Work Abroad</a></li>

                <li class="has-children">

                  <a href="#">Learn and Earn</a>

                  <ul class="cd-dropdown-gallery is-hidden">

                    <li class="go-back"><a href="#0">Learn and Earn Menu</a></li>

                    <li>

                      <div class="cources-menu">

                        <h4 class="menu-subtitle">Select Sector (36)</h4>

                        <ul class="vrt-menu-scroll">

                          <li>

                            <a class="box" href="<?php echo site_url()?>/learn-and-earn-details/?Agriculture">

                              <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/Agriculture.png" alt="Icon">

                              <span>Agriculture</span>

                            </a>

                          </li>

                          <li>

                            <a class="box" href="<?php echo site_url()?>/learn-and-earn-details/?Animal-Husbandry">

                              <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/animal-husbandry.png" alt="Icon">

                              <span>Animal Husbandry</span>

                            </a>

                          </li>

                          <li>

                            <a class="box" href="<?php echo site_url()?>/learn-and-earn-details/?Textile-and-Apparel">

                              <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/textile-apparel.png" alt="Icon">

                              <span>Textile and Apparel</span>

                            </a>

                          </li>                              

                          <li>

                            <a class="box" href="<?php echo site_url()?>/learn-and-earn-details/?Automobile">

                              <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/Automobile.png" alt="Icon">

                              <span>Automobile</span>

                            </a>

                          </li>



                          <li>

                            <a class="box" href="<?php echo site_url()?>/learn-and-earn-details/?Banking-and-Finance">

                              <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/banking-and-finance.png" alt="Icon">

                              <span>Banking and Finance</span>

                            </a>

                          </li>

                          <li>

                            <a class="box" href="<?php echo site_url()?>/learn-and-earn-details/?Beauty-and-Wellness">

                              <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/beauty-and-wellness.png" alt="Icon">

                              <span>Beauty and Wellness</span>

                            </a>

                          </li>

                          <li>

                            <a class="box" href="<?php echo site_url()?>/learn-and-earn-details/?Capital-goods-and-Manufacturing">

                              <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/capital-goods-and-manufacturing.png" alt="Icon">

                              <span>Capital goods and Manufacturing</span>

                            </a>

                          </li>

                          <li>

                            <a class="box" href="<?php echo site_url()?>/learn-and-earn-details/?Civil-and-Construction">

                              <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/civil-and-construction.png" alt="Icon">

                              <span>Civil and Construction</span>

                            </a>

                          </li>

                          <!--<li>

                            <a class="box" href="<?php //echo site_url()?>/learn-and-earn-details/?Craft">

                              <img src="<?php //echo get_template_directory_uri();?>/assets/img/icon/megamenu/Craft.png" alt="Icon">

                              <span>Craft</span>

                            </a>

                          </li>-->

                          <li>

                            <a class="box" href="<?php echo site_url()?>/learn-and-earn-details/?Health-and-Paramedical">

                              <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/health-and-paramedical.png" alt="Icon">

                              <span>Health and Paramedical</span>

                            </a>

                          </li>

                          <li>

                            <a class="box" href="<?php echo site_url()?>/learn-and-earn-details/?Logistics-and-Shipping">

                              <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/logistics-and-shipping.png" alt="Icon">

                              <span>Logistics and Shipping</span>

                            </a>

                          </li>

                          <li>

                            <a class="box" href="<?php echo site_url()?>/learn-and-earn-details/?Hospitality-and-Hotel-Management">

                              <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/hospitality-and-hotel-management.png" alt="Icon">

                              <span>Hospitality and Hotel Management</span>

                            </a>

                          </li>

                          <li>

                            <a class="box" href="<?php echo site_url()?>/learn-and-earn-details/?IT-ITeS-and-Computer-Science">

                              <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/IT-ITeS-and-computer-science.png" alt="Icon">

                              <span>IT-ITeS and Computer Science</span>

                            </a>

                          </li>

                          <li>

                            <a class="box" href="<?php echo site_url()?>/learn-and-earn-details/?Sports-and-Fitness">

                              <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/sports-fitness.png" alt="Icon">

                              <span>Sports & Fitness</span>

                            </a>

                          </li>

                          <li>

                            <a class="box" href="<?php echo site_url()?>/learn-and-earn-details/?Plumbing">

                              <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/Plumbing.png" alt="Icon">

                              <span>Plumbing</span>

                            </a>

                          </li>

                          <li>

                            <a class="box" href="<?php echo site_url()?>/learn-and-earn-details/?Electrical-Power">

                              <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/electrical-power.png" alt="Icon">

                              <span>Electrical - Power</span>

                            </a>

                          </li>

                          <li>

                            <a class="box" href="<?php echo site_url()?>/learn-and-earn-details/?Retail-and-Marketing">

                              <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/retail-and-marketing.png" alt="Icon">

                              <span>Retail and Marketing</span>

                            </a>

                          </li>

                          <li>

                            <a class="box" href="<?php echo site_url()?>/learn-and-earn-details/?Mechanical">

                              <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/Mechanical.png" alt="Icon">

                              <span>Mechanical</span>

                            </a>

                          </li>

                          <li>

                            <a class="box" href="<?php echo site_url()?>/learn-and-earn-details/?Aviation-Sector">

                              <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/aviation-sector.png" alt="Icon">

                              <span>Aviation Sector</span>

                            </a>

                          </li>

                          <li>

                            <a class="box" href="<?php echo site_url()?>/learn-and-earn-details/?Fire-and-Safety">

                              <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/fire-and-safety.png" alt="Icon">

                              <span>Fire and Safety</span>

                            </a>

                          </li>

                          <li>

                            <a class="box" href="<?php echo site_url()?>/learn-and-earn-details/?Media-and-Entertainment">

                              <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/Media-&-Entertainment.png" alt="Icon">

                              <span>Media & Entertainment</span>

                            </a>

                          </li>

                          <li>

                            <a class="box" href="<?php echo site_url()?>/learn-and-earn-details/?Domestic-Workers">

                              <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/domestic-workers.png" alt="Icon">

                              <span>Domestic Workers</span>

                            </a>

                          </li>

                          <li>

                            <a class="box" href="<?php echo site_url()?>/learn-and-earn-details/?Electronics">

                              <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/Electronics.png" alt="Icon">

                              <span>Electronics</span>

                            </a>

                          </li>

                          <li>

                            <a class="box" href="<?php echo site_url()?>/learn-and-earn-details/?Food-and-Beverages">

                              <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/food-and-beverages.png" alt="Icon">

                              <span>Food and Beverages</span>

                            </a>

                          </li>

                          <li>

                            <a class="box" href="<?php echo site_url()?>/learn-and-earn-details/?Furniture-and-Fitting">

                              <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/furniture-and-fitting.png" alt="Icon">

                              <span>Furniture and Fitting</span>

                            </a>

                          </li>

                          <li>

                            <a class="box" href="<?php echo site_url()?>/learn-and-earn-details/?Gem-and-Jewellery">

                              <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/gem-and-jwellery.png" alt="Icon">

                              <span>Gem and Jewellery</span>

                            </a>

                          </li>

                          <li>

                            <a class="box" href="<?php echo site_url()?>/learn-and-earn-details/?Telecom">

                              <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/Telecom.png" alt="Icon">

                              <span>Telecom</span>

                            </a>

                          </li>

                          <li>

                            <a class="box" href="<?php echo site_url()?>/learn-and-earn-details/?Yoga-and-Naturopathy">

                              <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/yoga-naturopathy.png" alt="Icon">

                              <span>Yoga and Naturopathy</span>

                            </a>

                          </li>

                          <li>

                            <a class="box" href="<?php echo site_url()?>/learn-and-earn-details/?Teacher-Training">

                              <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/teacher-training.png" alt="Icon">

                              <span>Teacher Training</span>

                            </a>

                          </li>

                          <!-- <li>

                            <a class="box">

                              <img src="<?php //echo get_template_directory_uri();?>/assets/img/icon/megamenu/Technical-(Industrial).png" alt="Icon">

                              <span>Technical (Industrial)</span>

                            </a>

                          </li> -->

                          <li>

                            <a class="box" href="<?php echo site_url()?>/learn-and-earn-details/?Infrastructure-and-Equipment">

                              <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/infrastructure-and-equipment.png" alt="Icon">

                              <span>Infrastructure and Equipment</span>

                            </a>

                          </li>

                          <li>

                            <a class="box" href="<?php echo site_url()?>/learn-and-earn-details/?Handicraft-and-Carpet">

                              <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/handicraft-and-carpet.png" alt="Icon">

                              <span>Handicraft and Carpet</span>

                            </a>

                          </li>

                          <li>

                            <a class="box" href="<?php echo site_url()?>/learn-and-earn-details/?Rubber">

                              <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/Rubber.png" alt="Icon">

                              <span>Rubber</span>

                            </a>

                          </li>

                          <li>

                            <a class="box" href="<?php echo site_url()?>/learn-and-earn-details/?Green-jobs">

                              <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/green-jobs.png" alt="Icon">

                              <span>Green jobs</span>

                            </a>

                          </li>

                          <li>

                            <a class="box" href="<?php echo site_url()?>/learn-and-earn-details/?Skills-for-PWD">

                              <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/skills-for-pwd.png" alt="Icon">

                              <span>Skills for PWD</span>

                            </a>

                          </li>

                          <li>

                            <a class="box"  href="<?php echo site_url()?>/learn-and-earn-details/?Humanities-(Soft-Skills)">

                              <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/humanities(SoftSkills).png" alt="Icon">

                              <span>Humanities (Soft Skills)</span>

                            </a>

                          </li>

                          <li>

                            <a class="box" href="<?php echo site_url()?>/learn-and-earn-details/?Fashion-Technology">

                              <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/fashion.png" alt="Icon">

                              <span>Fashion Technology</span>

                            </a>

                          </li>

                          <li>

                              <a class="box" href="<?php echo site_url()?>/learn-and-earn-details/?Travel-and-Tourism">

                                <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/logistics-and-shipping.png" alt="Icon">

                                <span>Travel and Tourism</span>

                              </a>

                            </li>

                        </ul>

                      </div>

                    </li>



                  </ul> <!-- Learn and Earn -->

                </li>

              </ul> 

            </li> <!-- Employment -->



            <li class="has-children">

              <a href="#">Entrepreneurship</a>

              <ul class="cd-secondary-dropdown is-hidden">

                <li class="go-back"><a href="#0">Menu</a></li>

                <li class="has-children">

                  <a href="#">Know your Business</a>

                  <ul class="is-hidden">

                    <li class="go-back"><a href="#0">Back</a></li>

                    <li class="has-children">

                      <a href="#0">Agri-Business</a>

                      <ul class="is-hidden">

                        <li class="go-back"><a href="#0">Back</a></li>

                        <li class="has-children">

                          <a href="#0">Production</a>

                          <ul class="is-hidden">

                            <li class="go-back"><a href="#0">Agri-Business > Production</a></li>

                            <li class="has-children">

                              <a href="#0">Horticulture</a>

                              <ul class="is-hidden">

                                <li class="go-back"><a href="#0">Horticulture Menu</a></li>

                                <li>

                                  <div class="nf-right-megatab">

                                    <div class="mega-panel-sec">

                                      <h5>Crop-wise</h5>

                                      <div class="panel"><a href="<?php echo site_url()?>/fruits"><div class="panel-body nf-brlf1"> Fruits</div></a></div>

                                      <div class="panel"><a href="<?php echo site_url()?>/vegetables"><div class="panel-body nf-brlf2"> Vegetables</div></a></div>

                                      <div class="panel"><a href="<?php echo site_url()?>/spices"><div class="panel-body nf-brlf3"> Spices</div></a></div>

                                      <div class="panel"><a href="<?php echo site_url()?>/exotic-spices"><div class="panel-body nf-brlf4">Exotic Spices</div></a></div>

                                      <div class="panel"><a href="<?php echo site_url()?>/mushroom"><div class="panel-body nf-brlf4"> Mushroom</div></a></div>

                                      <div class="panel"><a href="<?php echo site_url()?>/floriculture"><div class="panel-body nf-brlf5"> Floriculture</div></a></div>

                                      <div class="panel"><a href="<?php echo site_url()?>/apiculture"><div class="panel-body nf-brlf6"> Apiculture</div></a></div>

                                    </div>



                                    <div class="mega-panel-sec">

                                      <h5>Type-wise</h5>

                                      <div class="panel"><a href="<?php echo site_url()?>/horticulture_int/integrated-farming"><div class="panel-body nf-brlf1"> Integrated</div></a></div>

                                      <div class="panel"><a href="<?php echo site_url()?>/horticulture_int/hi-tech"><div class="panel-body nf-brlf2"> Hi-Tech</div></a></div>

                                      <div class="panel"><a href="<?php echo site_url()?>/horticulture_int/traditional"><div class="panel-body nf-brlf3"> Traditional</div></a></div>

                                      <div class="panel"><a href="<?php echo site_url()?>/horticulture_int/organic-farming"><div class="panel-body nf-brlf4"> Organic Farming</div></a></div>

                                    </div>

                                  </div>

                                </li>

                              </ul>

                            </li>

                            <li class="has-children">

                              <a href="#0">Animal Husbandry</a>

                              <ul class="is-hidden">

                                <li class="go-back"><a href="#0">Animal Husbandry Menu</a></li>

                                <li>

                                  <div class="nf-right-megatab">

                                    <div class="mega-panel-sec">

                                      <h5>Categories</h5>

                                      <div class="panel"><a href="<?php echo site_url()?>/meat-production"><div class="panel-body nf-brlf1"> Meat Production</div></a></div>

                                      <div class="panel"><a href="<?php echo site_url()?>/dairy-production"><div class="panel-body nf-brlf2"> Dairy Production</div></a></div>

                                      <div class="panel"><a href="<?php echo site_url()?>/wool-production"><div class="panel-body nf-brlf3"> Wool Production​</div></a></div>

                                      <div class="panel"><a href="<?php echo site_url()?>/breeding"><div class="panel-body nf-brlf4"> Breeding​</div></a></div>

                                      <div class="panel"><a href="<?php echo site_url()?>/egg-production"><div class="panel-body nf-brlf5"> Egg Production</div></a></div>

                                    </div>

                                  </div>

                                </li>

                              </ul>

                            </li>

                            <li class="has-children">

                              <a href="#0">Sericulture</a>

                              <ul class="is-hidden">

                                <li class="go-back"><a href="#0">Sericulture Menu</a></li>

                                <li>

                                  <div class="nf-right-megatab">

                                    <div class="mega-panel-sec lg-size">

                                      <h5>Pre - Cocoon</h5>

                                      <div class="panel"><a href="<?php echo site_url()?>/production-of-commercial-silk-cocoon"><div class="panel-body nf-brlf1"> Production of

                                      Commercial Silk Cocoon​</div></a></div>

                                      <div class="panel"><a href="<?php echo site_url()?>/production-of-seed-crop"><div class="panel-body nf-brlf2"> Silk Grainage</div></a></div>

                                      

                                    </div>

                                    <div class="mega-panel-sec lg-size">

                                      <h5>Post - Cocoon</h5>

                                      <div class="panel"><a href="<?php echo site_url()?>/production-of-spun-yarn"><div class="panel-body nf-brlf3"> Production of Spun Yarn​</div></a></div>

                                      <div class="panel"><a href="<?php echo site_url()?>/integrated-reeling-unit-with-stifling"><div class="panel-body nf-brlf1"> Integrated Reeling Unit

                                      with Stifling​</div></a></div>

                                      <div class="panel"><div class="panel-body nf-brlf2"> Yarn Clinic</div></div>

                                      <div class="panel"><div class="panel-body nf-brlf3"> Pupa & Other by products​</div></div>

                                      <div class="panel"><a href="<?php echo site_url()?>/fabric-production/"><div class="panel-body nf-brlf4"> Fabric Production​</div></a></div>

                                      <div class="panel"><a href="<?php echo site_url()?>/production-of-reeled-yarn"><div class="panel-body nf-brlf5"> Production of Reeled Yarn​</div></a></div>

                                      <div class="panel"><a href="<?php echo site_url()?>/production-of-twisted-reel-yarn"><div class="panel-body nf-brlf6"> Production of Twisted

                                      Reel Yarn</div></a></div>

                                      <div class="panel"><a href="<?php echo site_url()?>/silk-yarn-dyeing"><div class="panel-body nf-brlf5"> Silk Yarn Dyeing​</div></a></div>

                                    </div>

                                  </div>

                                </li>

                              </ul>

                            </li>

                            <li class="has-children">

                              <a href="#0">Aquaculture</a>

                              <ul class="is-hidden">

                                <li class="go-back"><a href="#0">Aquaculture Menu</a></li>

                                <li>

                                  <div class="nf-right-megatab">

                                     <div class="mega-panel-sec lg-size">

                                  <h5>Categories</h5>

                                  <div class="panel"><a href="<?php echo site_url()?>/species-wise"><div class="panel-body nf-brlf1"> Species Wise</div></a></div>

                                  <div class="panel"><a href="<?php echo site_url()?>/aquaculture-type-search"><div class="panel-body nf-brlf2"> Culture Type</div></a></div>



                                  <div class="panel"><a href="<?php echo site_url()?>/fish-value-chain"><div class="panel-body nf-brlf3"> Fish Value Chain</div></a></div>



                                  <div class="panel"><a href="<?php echo site_url()?>/culture-system"><div class="panel-body nf-brlf4"> Culture System</div></a></div>

                                </div>

                                  </div>

                                </li>

                              </ul>

                            </li>

                            <li class="has-children">

                              <a href="#0">MAP</a>

                              <ul class="is-hidden">

                                <li class="go-back"><a href="#0">MAP Menu</a></li>

                                <li>

                                  <div class="nf-right-megatab">

                                     <div class="mega-panel-sec lg-size">

                                  <h5>Categories</h5>

                                    

                                  <div class="panel"><a href="<?php echo site_url()?>/maps/agar-aquilaria-agallocha"><div class="panel-body nf-brlf1"> Agar <span>(Aquilaria agallocha)</span></div></a></div>

                                  <div class="panel"><a href="<?php echo site_url()?>/maps/patchouli-pogostemon-cablin"><div class="panel-body nf-brlf2"> Patchouli <span>(Pogostemon cablin)</span></div></a></div>

                                  <div class="panel"><a href="<?php echo site_url()?>/maps/stevia-stevia-rebaudiana"><div class="panel-body nf-brlf3"> Stevia <span>(Stevia rebaudiana)</span></div></a></div>

                                  <div class="panel"><a href="<?php echo site_url()?>/maps/lemongrass-cymbopogon-flexuosus"><div class="panel-body nf-brlf4"> Lemongrass <span>(Cymbopogon flexuosus)</span></div></a></div>

                                  <div class="panel"><a href="<?php echo site_url()?>/maps/citronella-cymbopogon-winterianus"><div class="panel-body nf-brlf5"> Citronella <span>(Cymbopogon winterianus)</span></div></a></div>

                                  <div class="panel"><a href="<?php echo site_url()?>/maps/vetiver-vetiveria-zizaniodes"><div class="panel-body nf-brlf6"> Vetiver <span>(Vetiveria zizaniodes)</span></div></a></div>

                                  <div class="panel"><a href="<?php echo site_url()?>/maps/sugandhmantri-gondhi-homalomena-aromatica"><div class="panel-body nf-brlf1"> Sugandhmantri / Gondhi <span>(Homalomena aromatica)</span></div></a></div>

                                  <div class="panel"><a href="<?php echo site_url()?>/maps/sarpagandha-rauvolfia-serpentina-family-apocynaceae"><div class="panel-body nf-brlf2"> Sarpagandha <span>(Rauvolfia serpentina, Family: Apocynaceae)</span></div></a></div>

                                  <div class="panel"><a href="<?php echo site_url()?>/maps/tulshi-ocimum-tenuiflorum"><div class="panel-body nf-brlf3"> Tulshi <span>(Ocimum tenuiflorum)</span></div></a></div>

                                  <div class="panel"><a href="<?php echo site_url()?>/maps/brahmi-bacopa-monnieri"><div class="panel-body nf-brlf4"> Brahmi <span>(Bacopa monnieri)</span> </div></a></div>

                                  <div class="panel"><a href="<?php echo site_url()?>/maps/ghritkumari-aloe-vera"><div class="panel-body nf-brlf5"> Ghritkumari <span>(Aloe vera)</span></div></a></div>

                                  <div class="panel"><a href="<?php echo site_url()?>/maps/pipli"><div class="panel-body nf-brlf5"> Pipli <span>(Piper longum)</span></div></a></div>

                                  <div class="panel"><a href="<?php echo site_url()?>/maps/rosemary-rosemarinus-officinalis"><div class="panel-body nf-brlf1"> Rosemary <span>(Rosemarinus officinalis)</span></div></a></div>

                                  <div class="panel"><a href="<?php echo site_url()?>/maps/coleus-coleus-forskohlii"><div class="panel-body nf-brlf2"> Coleus <span>(Coleus forskohlii)</span> </div></a></div>

                                  <div class="panel"><a href="<?php echo site_url()?>/maps/kokum-garcinia-indica"><div class="panel-body nf-brlf3"> Kokum <span>(Garcinia indica)</span></div></a></div>

                                  <div class="panel"><a href="<?php echo site_url()?>/maps/curry-leaves-murraya-koenigii"><div class="panel-body nf-brlf4"> Curry leaves <span>(Murraya koenigii)</span></div></a></div>

                                </div>

                                  </div>

                                </li>

                              </ul>

                            </li>

                            <li class="has-children">

                              <a href="#0">Nursery</a>

                              <ul class="is-hidden">

                                <li class="go-back"><a href="#0">Nursery Menu</a></li>

                                <li>

                                  <div class="nf-right-megatab">

                                    <div class="mega-panel-sec lg-size">

                                      <h5>Categories</h5>

                                      <div class="panel"><a href="<?php echo site_url()?>/nursery/hi-tech-nursery"><div class="panel-body nf-brlf1"> Hi-Tech Nursery</div></a></div>

                                      <div class="panel"><a href="<?php echo site_url()?>/nursery/vegetable-plant-nursery"><div class="panel-body nf-brlf2"> Vegetable Plant Nursery</div></a></div>

                                      <div class="panel"><a href="<?php echo site_url()?>/nursery/ornamental-plant-nursery"><div class="panel-body nf-brlf3"> Ornamental Plant Nursery</div></a></div>

                                      <div class="panel"><a href="<?php echo site_url()?>/nursery/map-nursery"><div class="panel-body nf-brlf4"> MAP Nursery</div></a></div>

                                      <div class="panel"><a href="<?php echo site_url()?>/nursery/bamboo-nursery"><div class="panel-body nf-brlf5"> Bamboo Nursery</div></a></div>

                                      <div class="panel"><a href="<?php echo site_url()?>/nursery/forest-plant-nursery"><div class="panel-body nf-brlf5"> Forest Plant Nursery</div></a></div>

                                      <div class="panel"><a href="<?php echo site_url()?>/nursery/fruit-plant-nursery"><div class="panel-body nf-brlf1"> Fruit Plant Nursery</div></a></div>

                                      <div class="panel"><a href="<?php echo site_url()?>/nursery/agriculture-crop-nursery"><div class="panel-body nf-brlf2"> Agriculture Crop Nursery</div></a></div>

                                    </div>

                                  </div>

                                </li>

                              </ul>

                            </li>



                          </ul>

                        </li>

                        <li class="has-children">

                          <a href="#0">Post Harvest & Primary Processing </a>

                          <ul class="is-hidden">

                            <li class="go-back"><a href="#0">Agri-Business > Post Harvest & Primary Processing</a></li>

                            <li class="has-children">

                              <a href="#0">Handling & Logistics</a>

                              <ul class="is-hidden">

                                <li class="go-back"><a href="#0">Horticulture Menu</a></li>

                                <li>

                                  <div class="nf-right-megatab">

                                    <div class="mega-panel-sec lg-size">

                                      <h5>Categories</h5>

                                        <div class="panel"><a href="<?php echo site_url()?>/post_harvest/refrigerated-van/"><div class="panel-body nf-brlf1"> Refrigerated Van</div></a></div>

                                        <div class="panel"><a href="<?php echo site_url()?>/post_harvest/insulated-van/"><div class="panel-body nf-brlf2"> Insulated Van</div></a></div>

                                        <div class="panel"><a href="<?php echo site_url()?>/post_harvest/specialised-vandf-transportation-vehicles/"><div class="panel-body nf-brlf3"> Specialised V&F Transportation Vehicles</div></a></div>

                                        <div class="panel"><a href="<?php echo site_url()?>/post_harvest/material-loading-and-handling-conveyors/"><div class="panel-body nf-brlf4"> Material Loading and Handling Conveyors</div></a></div>

                                    </div>

                                  </div>

                                </li>

                              </ul>

                            </li>

                            <li class="has-children">

                              <a href="#0">Storage</a>

                              <ul class="is-hidden">

                                <li class="go-back"><a href="#0">Storage Menu</a></li>

                                <li>

                                  <div class="nf-right-megatab">

                                    <div class="mega-panel-sec lg-size">

                                      <h5>Categories</h5>

                                        <div class="panel"><a href="<?php echo site_url()?>/post_harvest/dry-warehouse/"><div class="panel-body nf-brlf1"> Dry Warehouse</div></a></div>

                                        <div class="panel"><a href="<?php echo site_url()?>/post_harvest/cold-room/"><div class="panel-body nf-brlf2"> Cold Room</div></a></div>

                                        <div class="panel"><a href="<?php echo site_url()?>/post_harvest/multi-chamber-multi-temperature-cold-store/"><div class="panel-body nf-brlf3"> Multi Chamber Multi Temperature Cold Store</div></a></div>

                                        <div class="panel"><a href="<?php echo site_url()?>/post_harvest/controlled-atmosphere-cold-store/"><div class="panel-body nf-brlf4"> Controlled Atmosphere Cold Store</div></a></div>

                                        <div class="panel"><a href="<?php echo site_url()?>/post_harvest/modified-atmospheric-cold-store/"><div class="panel-body nf-brlf5"> Modified Atmospheric Cold Store</div></a></div>

                                    </div>

                                  </div>

                                </li>

                              </ul>

                            </li>

                            <li class="has-children">

                              <a href="#0">Preservation</a>

                              <ul class="is-hidden">

                                <li class="go-back"><a href="#0">Preservation Menu</a></li>

                                <li>

                                  <div class="nf-right-megatab">

                                    <div class="mega-panel-sec lg-size">

                                      <h5>Categories</h5>

                                      <div class="panel"><a href="<?php echo site_url()?>/post_harvest/blast-freezing/"><div class="panel-body nf-brlf1"> Blast Freezing</div></a></div>

                                      <div class="panel"><a href="<?php echo site_url()?>/post_harvest/iqf/"><div class="panel-body nf-brlf2"> IQF</div></a></div>

                                      <div class="panel"><a href="<?php echo site_url()?>/post_harvest/hot-air-drying/"><div class="panel-body nf-brlf3"> Hot Air Drying</div></a></div>

                                      <div class="panel"><a href="<?php echo site_url()?>/post_harvest/batch-drying/"><div class="panel-body nf-brlf4"> Batch Drying</div></a></div>

                                      <div class="panel"><a href="<?php echo site_url()?>/post_harvest/continuous-drying/"><div class="panel-body nf-brlf5"> Continuous Drying</div></a></div>

                                      <div class="panel"><a href="<?php echo site_url()?>/post_harvest/freezing-drying/"><div class="panel-body nf-brlf6"> Freezing Drying</div></a></div>

                                      <div class="panel"><a href="<?php echo site_url()?>/post_harvest/spraying-drying/"><div class="panel-body nf-brlf1"> Spraying Drying</div></a></div>

                                      <div class="panel"><a href="<?php echo site_url()?>/post_harvest/canning/"><div class="panel-body nf-brlf2"> Canning</div></a></div>

                                      

                                    </div>

                                  </div>

                                </li>

                              </ul>

                            </li>

                            <li class="has-children">

                              <a href="#0">Primary Processing</a>

                              <ul class="is-hidden">

                                <li class="go-back"><a href="#0">Primary Processing Menu</a></li>

                                <li>

                                  <div class="nf-right-megatab">

                                    <div class="mega-panel-sec lg-size">

                                      <h5>Categories</h5>

                                        <div class="panel"><a href="<?php echo site_url()?>/post_harvest/rice-mill/"><div class="panel-body nf-brlf1"> Rice Mill</div></a></div>

                                        <div class="panel"><a href="<?php echo site_url()?>/post_harvest/roller-flour-mill/"><div class="panel-body nf-brlf2"> Roller Flour Mill</div></a></div>

                                       <div class="panel"><a href="<?php echo site_url()?>/post_harvest/dal-mill/"><div class="panel-body nf-brlf3"> Dal Mill</div></a></div>

                                    </div>

                                  </div>

                                </li>

                              </ul>

                            </li>



                          </ul>

                        </li>

                      </ul>

                    </li>

                    <li class="has-children">

                      <a href="#0">Manufacturing</a>

                      <ul class="is-hidden">

                        <li class="go-back"><a href="#0">Manufacturing</a></li>

                        <li class="has-children">

                          <a href="#0">Food Processing</a>

                          <ul class="is-hidden">

                            <li class="go-back"><a href="#0">Food Processing Menu</a></li>

                            <li>

                              <div class="nf-right-megatab">

                             <div class="mega-panel-sec lg-size">

                                <h5>Categories</h5>

                                <div class="panel"><a href="<?php echo site_url()?>/ready-to-eat"><div class="panel-body nf-brlf1"> Ready to Eat</div></a></div>

                                <div class="panel"><a href="<?php echo site_url()?>/ready-to-cook"><div class="panel-body nf-brlf2"> Ready to Cook</div></a></div>

                                <div class="panel"><a href="<?php echo site_url()?>/traditional-food"><div class="panel-body nf-brlf3"> Traditional Food</div></a></div>

                                <div class="panel"><a href="<?php echo site_url()?>/dairy-products"><div class="panel-body nf-brlf4"> Dairy Products</div></a></div>

                                <div class="panel"><a href="<?php echo site_url()?>/confectionary"><div class="panel-body nf-brlf5"> Confectionery</div></a></div>

                                <div class="panel"><a href="<?php echo site_url()?>/biscuits"><div class="panel-body nf-brlf6"> Biscuits</div></a></div>

                                <div class="panel"><a href="<?php echo site_url()?>/beverages"><div class="panel-body nf-brlf1"> Beverages</div></a></div>

                                <div class="panel"><a href="<?php echo site_url()?>/bakery-pastries"><div class="panel-body nf-brlf2"> Bakery & Pastries</div></a></div>

                                <div class="panel"><a href="<?php echo site_url()?>/functional-food"><div class="panel-body nf-brlf3"> Functional Food</div></a></div>

                                <div class="panel"><a href="<?php echo site_url()?>/diet-food"><div class="panel-body nf-brlf4"> Diet Food</div></a></div>

                                <div class="panel"><a href="<?php echo site_url()?>/food-ingredients"><div class="panel-body nf-brlf5"> Food Ingredients</div></a></div>

                                <div class="panel"><a href="<?php echo site_url()?>/spices-seasoning"><div class="panel-body nf-brlf6"> Spices & Seasoning</div></a></div>

                                <div class="panel"><a href="<?php echo site_url()?>/nutraceutical-food-supplements"><div class="panel-body nf-brlf4"> Nutraceutical Food & Supplements </div></a></div>

                              </div>

                              </div>

                            </li>

                          </ul>

                        </li>

                        <li class="has-children">

                          <a href="#0">Conventional Sector</a>

                          <ul class="is-hidden">

                            <li class="go-back"><a href="#0">Conventional Sector Menu</a></li>

                            <li>

                              <div class="nf-right-megatab">

                                <div class="mega-panel-sec exlg-size">

                                <h5>Categories</h5>

                                <div class="panel"><a href="<?php echo site_url()?>/automobiles-mechanical-steel-iron-metallurgical"><div class="panel-body nf-brlf1"> Automobiles, Mechanical, Steel & Iron & Metallurgical</div></a></div>

                                <div class="panel"><a href="<?php echo site_url()?>/chemicals-organic-inorganic-with-petroleum-products"><div class="panel-body nf-brlf2"> Chemicals (Organic & Inorganic) with Petroleum Products</div></a></div>

                                <div class="panel"><a href="<?php echo site_url()?>/electrical-electronics-computers-and-infotech-it-projects"><div class="panel-body nf-brlf3">Electrical & Electronics</div></a></div>

                                <div class="panel"><a href="<?php echo site_url()?>/gums-and-adhesives"><div class="panel-body nf-brlf4">Gums & Adhesive</div></a></div>

                                <!--<div class="panel"><a href="<?php //echo site_url()?>/infotech-it-projects"><div class="panel-body nf-brlf4">Infotech/It Projects</div></a></div>-->

                                <div class="panel"><a href="<?php echo site_url()?>/leather-and-leather-products"><div class="panel-body nf-brlf4">Leather & Leather Products</div></a></div>

                                

                                <div class="panel"><a href="<?php echo site_url()?>/paint-enamel-solvents-thiners-inks"><div class="panel-body nf-brlf2">Industrial & Decorative Paints</div></a></div>



                                

                              

                                <div class="panel "><a href="<?php echo site_url()?>/textile"><div class="panel-body nf-brlf2">Textile</div></a></div>

                                <div class="panel "><a href="<?php echo site_url()?>/pharmaceutical-and-healthcare"><div class="panel-body nf-brlf2">Pharmaceutical & Healthcare</div></a></div>

                                <div class="panel "><a href="<?php echo site_url()?>/pulp-paper-straw-grey-board"><div class="panel-body nf-brlf2">Pulp, Paper & Packaging</div></a></div>

                                <div class="panel"><a href="<?php echo site_url()?>/plastic-bopp-acrylic-disposable-plastic-products-pet-products"><div class="panel-body nf-brlf1">Pet & Polymer Products</div></a></div>

                                <!--nf-vheight-->

                                <!--<div class="panel "><a href="<?php //echo site_url()?>/infotech-it-hospitality-hospital-college-school-medical-entertainment"><div class="panel-body nf-brlf2">Infotech/It, Hospitality, Hospital, College, School, Medical, Entertainment, Club, Ware Housing & Real Estate Projects.</div></a></div>-->

                                <div class="panel"><a href="<?php echo site_url()?>/miscellaneous"><div class="panel-body nf-brlf2">Miscellaneous</div></a></div>

                              </div>

                              </div>

                            </li>

                          </ul>

                        </li>

                        <li class="has-children">

                          <a href="#0">Bamboo</a>

                          <ul class="is-hidden">

                            <li class="go-back"><a href="#0">Bamboo Menu</a></li>

                            <li>

                              <div class="nf-right-megatab">

                                <div class="mega-panel-sec lg-size">

                                <h5>Categories</h5>

                                <div class="panel"><a href="<?php echo site_url()?>/bamboo/primary-treatment-plant/"><div class="panel-body nf-brlf1"> Primary Treatment Plant</div></a></div>

                                <div class="panel"><a href="<?php echo site_url()?>/bamboo/floor-tiles/"><div class="panel-body nf-brlf2"> Engineered Wood</div></a></div>

                                <div class="panel"><a href="<?php echo site_url()?>/craft/"><div class="panel-body nf-brlf3"> Craft</div></a></div>

                                <div class="panel"><a href="<?php echo site_url()?>/bamboo/incense-sticks"><div class="panel-body nf-brlf4"> Incense Stick</div></a></div>

                                <div class="panel"><a href="<?php echo site_url()?>/bamboo/bamboo-blinds/"><div class="panel-body nf-brlf5"> Bamboo Blinds</div></a></div>

                                <div class="panel"><a href="<?php echo site_url()?>/bamboo/bamboo-charcoal/"><div class="panel-body nf-brlf6"> Bamboo Charcoal </div></a></div>

                                <div class="panel"><a href="<?php echo site_url()?>/bamboo/bamboo-bio-plastics/"><div class="panel-body nf-brlf1"> Bamboo Bio-Plastics</div></a></div>

                                <div class="panel"><a href="<?php echo site_url()?>/bamboo/bamboo-activated-carbon/"><div class="panel-body nf-brlf2"> Bamboo Activated Charcoal</div></a></div>

                                <!--<div class="panel"><a href="<?php //echo site_url()?>/bamboo/cutleries/"><div class="panel-body nf-brlf3"> Cutleries </div></a></div>-->

                                <div class="panel"><a href="<?php echo site_url()?>/bamboo/food-pharmaceutical-nutraceutical/"><div class="panel-body nf-brlf4"> Food, Pharmaceutical and Nutraceutical</div></a></div>

                                <div class="panel"><a href="<?php echo site_url()?>/bamboo/round-pole-unit/"><div class="panel-body nf-brlf5"> Round Pole Unit</div></a></div>

                                <div class="panel"><a href="<?php echo site_url()?>/bamboo/bamboo-string-lights/"><div class="panel-body nf-brlf6"> Lifestyle Product </div></a></div>

                                <div class="panel"><a href="<?php echo site_url()?>/bamboo/bamboo-engineered-wood-based-tiles/"><div class="panel-body nf-brlf1"> Floor Tiles</div></a></div>

                                <!--<div class="panel"><a href="<?php //echo site_url()?>/bamboo/bamboo-food-and-pharmaceuticals/ "><div class="panel-body nf-brlf2"> Bamboo Food and Pharmaceuticals </div></a></div>-->

                                <!--<div class="panel"><a href="<?php //echo site_url()?>/bamboo/bamboo-charcoal"><div class="panel-body nf-brlf3"> Bamboo Charcoal</div></a></div>-->

                                <div class="panel"><a href="<?php echo site_url()?>/bamboo/bamboo-vinegar/"><div class="panel-body nf-brlf4"> Bamboo vinegar </div></a></div>

                               <!-- <div class="panel"><a href="<?php //echo site_url()?>/bamboo/bamboo-activated-charcoal-carbon/"><div class="panel-body nf-brlf5"> Bamboo Activated Charcoal/ Carbon</div></a></div>-->

                                <!--<div class="panel"><a href="<?php //echo site_url()?>/bamboo/bamboo-plastic/"><div class="panel-body nf-brlf6"> Bamboo Plastic </div></a></div>-->

                                <div class="panel"><a href="<?php echo site_url()?>/bamboo/bamboo-utility-products/ "><div class="panel-body nf-brlf1"> Bamboo Utility Products </div></a></div>

                                <div class="panel"><a href="<?php echo site_url()?>/bamboo/bamboo-nursery/"><div class="panel-body nf-brlf2"> Bamboo Nursery </div></a></div>

                                <div class="panel"><a href="<?php echo site_url()?>/bamboo/bamboo-cutlery/ "><div class="panel-body nf-brlf3"> Bamboo Cutlery  </div></a></div>
                                
                                <div class="panel"><a href="<?php echo site_url()?>/bamboo/bamboo-furniture/"><div class="panel-body nf-brlf6"> Bamboo Furniture  </div></a></div>
                                
                                <div class="panel"><a href="<?php echo site_url()?>/bamboo/bamboo-mat-board/"><div class="panel-body nf-brlf3"> Bamboo Mat Board  </div></a></div>

                              </div>

                              </div>

                            </li>

                          </ul>

                        </li>

                        <li class="has-children">

                          <a href="#0">Handloom and Handicraft</a>

                          <ul class="is-hidden">

                            <li class="go-back"><a href="#0">Handloom and Handicraft Menu</a></li>

                            <li>

                              <div class="nf-right-megatab">

                                <div class="mega-panel-sec lg-size">

                                <h5>Categories</h5>

                                <div class="panel"><a href="<?php echo site_url()?>/fabric-production"><div class="panel-body nf-brlf1"> Handloom</div></a></div>

                                <div class="panel"><a href="<?php echo site_url()?>/craft"><div class="panel-body nf-brlf2"> Handicraft</div></a></div>

                              </div>

                              </div>

                            </li>

                          </ul>

                        </li>



                      </ul>

                    </li>

                    <li class="has-children">

                      <a href="#0">Services</a>

                      <ul class="is-hidden">

                        <li class="go-back"><a href="#0">Services Menu</a></li>

                        <li class="has-children">

                          <a href="#0">Tourism & Hospitality</a>

                          <ul class="is-hidden">

                            <li class="go-back"><a href="#0">Tourism & Hospitality Menu</a></li>

                            <li>

                              <div class="nf-right-megatab">

                                <div class="mega-panel-sec lg-size">

                                  <h5>Categories</h5>

                                  <div class="panel"><a href="<?php echo site_url()?>/hotels-and-resorts"><div class="panel-body nf-brlf1"> Hotels & Resorts</div></a></div>

                                 

                                  <div class="panel"><a href="<?php echo site_url()?>/services/homestay"><div class="panel-body nf-brlf2"> Homestay</div></a></div>

                                  <div class="panel"><a href="<?php echo site_url()?>/tourism-adventure"><div class="panel-body nf-brlf3"> Adventure Tourism</div></a></div>

                                  <div class="panel"><a href="<?php echo site_url()?>/services/nature-eco-tourism"><div class="panel-body nf-brlf4"> Nature & Eco Tourism</div></a></div>

                                  <div class="panel"><a href="<?php echo site_url()?>/services/rural-tourism"><div class="panel-body nf-brlf5"> Rural Tourism</div></a></div>

                                  <div class="panel"><a href="<?php echo site_url()?>/services/fast-food"><div class="panel-body nf-brlf6"> Fastfood</div></a></div>

                                  <div class="panel"><a href="<?php echo site_url()?>/services/restaurant/"><div class="panel-body nf-brlf1"> Restaurant</div></a></div>

                                </div>

                              </div>

                            </li>

                          </ul>

                        </li>

                        <li class="has-children">

                          <a href="#0">Healthcare</a>

                          <ul class="is-hidden">

                            <li class="go-back"><a href="#0">Healthcare Menu</a></li>

                            <li>

                              <div class="nf-right-megatab">

                               <div class="mega-panel-sec lg-size">

                                  <h5>Categories</h5>

                                  <div class="panel"><a href="<?php echo site_url()?>/services/nursing-home/"><div class="panel-body nf-brlf1"> Nursing Home</div></a></div>

                                  <div class="panel"><a href="<?php echo site_url()?>/services/diagnostic-center/"><div class="panel-body nf-brlf2"> Diagnostic Center</div></a></div>

                                  <div class="panel"><a href="<?php echo site_url()?>/services/dental-clinic/"><div class="panel-body nf-brlf3"> Dental Clinic</div></a></div>

                                  <div class="panel"><a href="<?php echo site_url()?>/services/medical-college/"><div class="panel-body nf-brlf4"> Medical College</div></a></div>

                                  <div class="panel"><a href="<?php echo site_url()?>/services/mental-retardation-hospital-cerebral-palsy/"><div class="panel-body nf-brlf5"> Mental Retardation Hospital & Cerebral Palsy</div></a></div>

                                  <div class="panel"><a href="<?php echo site_url()?>/services/rehabilitation-centre-for-drug-addiction/"><div class="panel-body nf-brlf6"> Rehabilitation Centre for Drug Addiction</div></a></div>

                                  <div class="panel"><a href="<?php echo site_url()?>/services/physiotherapy/"><div class="panel-body nf-brlf1"> Physiotherapy</div></a></div>

                                  <div class="panel"><a href="<?php echo site_url()?>/services/nature-care-center/"><div class="panel-body nf-brlf2"> Nature Care Center</div></a></div>
                                  <div class="panel"><a href="<?php echo site_url()?>/services/health-club-fitness-centre/"><div class="panel-body nf-brlf4"> Health Club Fitness Centre</div></a></div>

                                </div>

                              </div>

                            </li>

                          </ul>

                        </li>

                        <li class="has-children">

                          <a href="#0">IT</a>

                          <ul class="is-hidden">

                            <li class="go-back"><a href="#0">IT Menu</a></li>

                            <li>

                              <div class="nf-right-megatab">

                                <div class="mega-panel-sec lg-size">

                                  <h5>Categories</h5>

                                  <div class="panel"><a href="<?php echo site_url()?>/services/data-processing-center/"><div class="panel-body nf-brlf1"> Data Processing Center </div></a></div>

                                  <div class="panel"><a href="<?php echo site_url()?>/services/internet-service-provider/"><div class="panel-body nf-brlf2"> Internet Service Provider</div></a></div>

                                  <div class="panel"><a href="<?php echo site_url()?>/services/it-park/"><div class="panel-body nf-brlf3"> IT Park</div></a></div>

                                  <!--<div class="panel"><a href="<?php //echo site_url()?>/services/medical-college/"><div class="panel-body nf-brlf4"> Medical College</div></a></div>-->

                                  <div class="panel"><a href="<?php echo site_url()?>/services/e-commerce/"><div class="panel-body nf-brlf5"> E-Commerce</div></a></div>

                                  <div class="panel"><a href="<?php echo site_url()?>/services/computer-software/"><div class="panel-body nf-brlf6"> Computer Software</div></a></div>

                                  <div class="panel"><a href="<?php echo site_url()?>/services/website-design-e-mail-registering/"><div class="panel-body nf-brlf1"> Website Design & E-mail Registering</div></a></div>
                                  <div class="panel"><a href="<?php echo site_url()?>/services/computer-and-laptop-service-centre/"><div class="panel-body nf-brlf3"> Computer and Laptop Service Centre</div></a></div>
                                </div>

                              </div>

                            </li>

                          </ul>

                        </li>

                        <li class="has-children">

                          <a href="#0">Education</a>

                          <ul class="is-hidden">

                            <li class="go-back"><a href="#0">Education Menu</a></li>

                            <li>

                              <div class="nf-right-megatab">

                               <div class="mega-panel-sec lg-size">

                                  <h5>Categories</h5>

                                  <div class="panel"><a href="<?php echo site_url()?>/services/b-ed-law-college/"><div class="panel-body nf-brlf1"> B.Ed & Law College </div></a></div>

                                  <div class="panel"><a href="<?php echo site_url()?>/services/engineering-college/"><div class="panel-body nf-brlf2"> Engineering College</div></a></div>

                                  <div class="panel"><a href="<?php echo site_url()?>/services/fashion-technology-institute/"><div class="panel-body nf-brlf3"> Fashion Technology Institute</div></a></div>

                                  <div class="panel"><a href="<?php echo site_url()?>/services/secondary-school/"><div class="panel-body nf-brlf4"> Secondary School</div></a></div>

                                  <div class="panel"><a href="<?php echo site_url()?>/services/residential-school/"><div class="panel-body nf-brlf5"> Residential School</div></a></div>

                                  <div class="panel"><a href="<?php echo site_url()?>/services/play-school/"><div class="panel-body nf-brlf6"> Play School</div></a></div>

                                  <div class="panel"><a href="<?php echo site_url()?>/services/computer-training-institute/"><div class="panel-body nf-brlf4"> Computer Training Institute</div></a></div>

                                  <div class="panel"><a href="<?php echo site_url()?>/services/college/"><div class="panel-body nf-brlf1"> College</div></a></div>

                                  <div class="panel"><a href="<?php echo site_url()?>/services/hostel-for-boys-and-girls/"><div class="panel-body nf-brlf2"> Hostel (for Boys and Girls)</div></a></div>

                                  <div class="panel"><a href="<?php echo site_url()?>/services/senior-secondary-school/"><div class="panel-body nf-brlf3"> Senior Secondary School</div></a></div>

                                  <div class="panel"><a href="<?php echo site_url()?>/services/veterinary-college-and-hospital/"><div class="panel-body nf-brlf1"> Veterinary College and Hospital</div></a></div>
                                  <div class="panel"><a href="<?php echo site_url()?>/services/managment-institute/"><div class="panel-body nf-brlf3"> Management Institute</div></a></div>
                                  <div class="panel"><a href="<?php echo site_url()?>/services/health-cum-beauty-parlour-training-institute/"><div class="panel-body nf-brlf6"> Health Cum Beauty Parlour Training Institute</div></a></div>

                                </div>

                              </div>

                            </li>

                          </ul>

                        </li>

                        <li class="has-children">

                          <a href="#0">Construction</a>

                          <ul class="is-hidden">

                            <li class="go-back"><a href="#0">Construction Menu</a></li>

                            <li>

                              <div class="nf-right-megatab">

                                 <div class="mega-panel-sec lg-size">

                                    <h5>Categories</h5>

                                    <div class="panel"><a href="<?php echo site_url()?>/services/multistorey-commercial-complex/"><div class="panel-body nf-brlf1"> Multistorey Commercial Complex</div></a></div>

                                    <div class="panel"><a href="<?php echo site_url()?>/services/multiplex-cum-entertainment-center/"><div class="panel-body nf-brlf2"> Multiplex Cum Entertainment Center</div></a></div>

                                    <div class="panel"><a href="<?php echo site_url()?>/services/township/"><div class="panel-body nf-brlf3"> Township</div></a></div>

                                    <div class="panel"><a href="<?php echo site_url()?>/services/special-economic-zone-sez-industrial-park/"><div class="panel-body nf-brlf4"> Special Economic Zone (SEZ)/Industrial Park</div></a></div>

                                    <div class="panel"><a href="<?php echo site_url()?>/services/tourist-club/"><div class="panel-body nf-brlf5"> Tourist Club</div></a></div>

                                    <div class="panel"><a href="<?php echo site_url()?>/services/warehouse-godown-for-paddy-jutemaize/"><div class="panel-body nf-brlf6"> Warehouse Godown for Paddy, Jute,Maize</div></a></div>
                                    <div class="panel"><a href="<?php echo site_url()?>/services/concrete-tiles-and-paving-blocks/"><div class="panel-body nf-brlf2"> Concrete Tiles and Paving Blocks </div></a></div>
                                    <div class="panel"><a href="<?php echo site_url()?>/services/soil-cement-block/"><div class="panel-body nf-brlf4"> Soil Cement Block </div></a></div>
                                  </div>

                              </div>

                            </li>

                          </ul>

                        </li>
                        <?php /*?><li class="has-children">
                          <a href="#0">Trading</a>
                          <ul class="is-hidden">
                            <li class="go-back"><a href="#0">Trading Menu</a></li>
                            <li>
                              <div class="nf-right-megatab">
                                 <div class="mega-panel-sec lg-size">
                                    <h5>Categories</h5>
                                    <div class="panel"><a href="<?php echo site_url()?>/garments"><div class="panel-body nf-brlf1">Garments</div></a></div>
                                    <div class="panel"><a href="<?php echo site_url()?>/electronics"><div class="panel-body nf-brlf2"> Electronics</div></a></div>
                                    <div class="panel"><a href="<?php echo site_url()?>/accessories"><div class="panel-body nf-brlf3"> Accessories </div></a></div>
                                    <div class="panel"><a href="<?php echo site_url()?>/food"><div class="panel-body nf-brlf4"> Food </div></a></div>
                                    <div class="panel"><a href="<?php echo site_url()?>/sports-and-fitness"><div class="panel-body nf-brlf5">Sports and Fitness</div></a></div>
                                    <div class="panel"><a href="<?php echo site_url()?>/general"><div class="panel-body nf-brlf6">General</div></a></div>
                                    <div class="panel"><a href="<?php echo site_url()?>/stores"><div class="panel-body nf-brlf2"> Stores </div></a></div>
                                  <div class="panel"><a href="<?php echo site_url()?>/service-unit"><div class="panel-body nf-brlf1"> Service Unit </div></a></div>
                                  </div>
                              </div>
                            </li>
                          </ul>
                        </li><?php */?>

                        <li>

                          <a href="<?php echo site_url()?>/other/">Other</a> 

                        </li>



                      </ul>

                    </li>
                    <!-----trading---->
                    <?php
                        // args
                        $args = array(
                          'post_type'   => 'service_trading',
                          'orderby' => 'post_title',
                          'order'   => 'ASC',
                          'post_status' => 'publish',
                          'posts_per_page' => -1
                        );
                        $the_query = new WP_Query( $args );
                        ?>
                    <li class="has-children">
                      <a href="#0">Trading</a>
                      <ul class="is-hidden">
                        <li class="go-back"><a href="#0">Trading Menu</a></li>
                        <li class="has-children">
                          <a href="#0">Garments</a>
                          <ul class="is-hidden">
                            <li class="go-back"><a href="#0">Garments Menu</a></li>
                            <li>
                              <div class="nf-right-megatab">
                                <div class="mega-panel-sec lg-size">
                                  <h5>Categories</h5>
                                  <?php if( $the_query->have_posts() ): $bb=0;?>
                                      <?php while( $the_query->have_posts() ): $the_query->the_post(); 
                                      $values= get_fields();
                                      if($values['sector']=='Garments'):
                                          $bb++;
                                          if($bb==7){ $bb=1;}
                                      ?>
                                        <div class="panel"><a href="<?php the_permalink()?>"><div class="panel-body nf-brlf<?php echo $bb?>"> <?php the_title(); ?></div></a></div>
                                    <?php 
                                      endif; 
                                        endwhile; 
                                            endif; 
                                            wp_reset_query();
                                            wp_reset_postdata();
                                    ?>
                                </div>
                              </div>
                            </li>
                          </ul>
                        </li>
                        <li class="has-children">
                          <a href="#0">Electronics</a>
                          <ul class="is-hidden">
                            <li class="go-back"><a href="#0">Electronics Menu</a></li>
                            <li>
                              <div class="nf-right-megatab">
                               <div class="mega-panel-sec lg-size">
                                  <h5>Categories</h5>
                                  <?php if( $the_query->have_posts() ): $bb=0;?>
                                      <?php while( $the_query->have_posts() ): $the_query->the_post(); 
                                      $values= get_fields();
                                      if($values['sector']=='Electronics'):
                                          $bb++;
                                          if($bb==7){ $bb=1;}
                                      ?>
                                        <div class="panel"><a href="<?php the_permalink()?>"><div class="panel-body nf-brlf<?php echo $bb?>"> <?php the_title(); ?></div></a></div>
                                    <?php 
                                      endif; 
                                        endwhile; 
                                            endif; 
                                            wp_reset_query();
                                            wp_reset_postdata();
                                    ?>
                                </div>
                              </div>
                            </li>
                          </ul>
                        </li>
                        <li class="has-children">
                          <a href="#0">Accessories</a>
                          <ul class="is-hidden">
                            <li class="go-back"><a href="#0">Accessories Menu</a></li>
                            <li>
                              <div class="nf-right-megatab">
                                <div class="mega-panel-sec lg-size">
                                  <h5>Categories</h5>
                                  <?php if( $the_query->have_posts() ): $bb=0;?>
                                      <?php while( $the_query->have_posts() ): $the_query->the_post(); 
                                      $values= get_fields();
                                      if($values['sector']=='Accessories'):
                                          $bb++;
                                          if($bb==7){ $bb=1;}
                                      ?>
                                        <div class="panel"><a href="<?php the_permalink()?>"><div class="panel-body nf-brlf<?php echo $bb?>"> <?php the_title(); ?></div></a></div>
                                    <?php 
                                      endif; 
                                        endwhile; 
                                            endif; 
                                            wp_reset_query();
                                            wp_reset_postdata();
                                    ?>
                                </div>
                              </div>
                            </li>
                          </ul>
                        </li>
                        <li class="has-children">
                          <a href="#0">Food</a>
                          <ul class="is-hidden">
                            <li class="go-back"><a href="#0">Food Menu</a></li>
                            <li>
                              <div class="nf-right-megatab">
                               <div class="mega-panel-sec lg-size">
                                  <h5>Categories</h5>
                                  <?php if( $the_query->have_posts() ): $bb=0;?>
                                      <?php while( $the_query->have_posts() ): $the_query->the_post(); 
                                      $values= get_fields();
                                      if($values['sector']=='Food'):
                                          $bb++;
                                          if($bb==7){ $bb=1;}
                                      ?>
                                        <div class="panel"><a href="<?php the_permalink()?>"><div class="panel-body nf-brlf<?php echo $bb?>"> <?php the_title(); ?></div></a></div>
                                    <?php 
                                      endif; 
                                        endwhile; 
                                            endif; 
                                            wp_reset_query();
                                            wp_reset_postdata();
                                    ?>
                                </div>
                              </div>
                            </li>
                          </ul>
                        </li>
                        <li class="has-children">
                          <a href="#0">Sports and Fitness</a>
                          <ul class="is-hidden">
                            <li class="go-back"><a href="#0">Sports and Fitness Menu</a></li>
                            <li>
                              <div class="nf-right-megatab">
                                 <div class="mega-panel-sec lg-size">
                                    <h5>Categories</h5>
                                    <?php if( $the_query->have_posts() ): $bb=0;?>
                                      <?php while( $the_query->have_posts() ): $the_query->the_post(); 
                                      $values= get_fields();
                                      if($values['sector']=='Sports and Fitness'):
                                          $bb++;
                                          if($bb==7){ $bb=1;}
                                      ?>
                                        <div class="panel"><a href="<?php the_permalink()?>"><div class="panel-body nf-brlf<?php echo $bb?>"> <?php the_title(); ?></div></a></div>
                                    <?php 
                                      endif; 
                                        endwhile; 
                                            endif; 
                                            wp_reset_query();
                                            wp_reset_postdata();
                                    ?>
                                  </div>
                              </div>
                            </li>
                          </ul>
                        </li>
                        <li class="has-children">
                          <a href="#0">General</a>
                          <ul class="is-hidden">
                            <li class="go-back"><a href="#0">General Menu</a></li>
                            <li>
                              <div class="nf-right-megatab">
                                 <div class="mega-panel-sec lg-size">
                                    <h5>Categories</h5>
                                    <?php if( $the_query->have_posts() ): $bb=0;?>
                                      <?php while( $the_query->have_posts() ): $the_query->the_post(); 
                                      $values= get_fields();
                                      if($values['sector']=='General'):
                                          $bb++;
                                          if($bb==7){ $bb=1;}
                                      ?>
                                        <div class="panel"><a href="<?php the_permalink()?>"><div class="panel-body nf-brlf<?php echo $bb?>"> <?php the_title(); ?></div></a></div>
                                    <?php 
                                      endif; 
                                        endwhile; 
                                            endif; 
                                            wp_reset_query();
                                            wp_reset_postdata();
                                    ?>
                                  </div>
                              </div>
                            </li>
                          </ul>
                        </li>
                        <li class="has-children">
                          <a href="#0">Stores</a>
                          <ul class="is-hidden">
                            <li class="go-back"><a href="#0">Stores Menu</a></li>
                            <li>
                              <div class="nf-right-megatab">
                                 <div class="mega-panel-sec lg-size">
                                    <h5>Categories</h5>
                                    <?php if( $the_query->have_posts() ): $bb=0;?>
                                      <?php while( $the_query->have_posts() ): $the_query->the_post(); 
                                      $values= get_fields();
                                      if($values['sector']=='Stores'):
                                          $bb++;
                                          if($bb==7){ $bb=1;}
                                      ?>
                                        <div class="panel"><a href="<?php the_permalink()?>"><div class="panel-body nf-brlf<?php echo $bb?>"> <?php the_title(); ?></div></a></div>
                                    <?php 
                                      endif; 
                                        endwhile; 
                                            endif; 
                                            wp_reset_query();
                                            wp_reset_postdata();
                                    ?>
                                  </div>
                              </div>
                            </li>
                          </ul>
                        </li>
                        <li class="has-children">
                          <a href="#0">Service Unit</a>
                          <ul class="is-hidden">
                            <li class="go-back"><a href="#0">Service Unit Menu</a></li>
                            <li>
                              <div class="nf-right-megatab">
                                 <div class="mega-panel-sec lg-size">
                                    <h5>Categories</h5>
                                    <?php if( $the_query->have_posts() ): $bb=0;?>
                                      <?php while( $the_query->have_posts() ): $the_query->the_post(); 
                                      $values= get_fields();
                                      if($values['sector']=='Service Unit'):
                                          $bb++;
                                          if($bb==7){ $bb=1;}
                                      ?>
                                        <div class="panel"><a href="<?php the_permalink()?>"><div class="panel-body nf-brlf<?php echo $bb?>"> <?php the_title(); ?></div></a></div>
                                    <?php 
                                      endif; 
                                        endwhile; 
                                            endif; 
                                            wp_reset_query();
                                            wp_reset_postdata();
                                    ?>
                                  </div>
                              </div>
                            </li>
                          </ul>
                        </li>

                      </ul>
                    </li>
                    
                    <!---trd end--->

                  </ul>

                </li>



                <li><a href="<?php echo site_url()?>/know-your-approvals">Know your Approvals</a></li>

                <li><a href="<?php echo site_url()?>/schemes-policies">Schemes & Policies</a></li>

                <li><a href="<?php echo site_url()?>/market-support-infrastructure/">Market & Infrastructure</a></li>

				<li><a href="<?php echo site_url()?>/credit-linkage-support-search/">Loan Support</a></li>

                <li><a href="<?php echo site_url()?>/success-stories-details">Success Stories</a></li>

                <!--<li><a href="#">News & Events</a></li>-->

                <li><a href="<?php echo site_url()?>/forums">Ask a Question</a></li>

              </ul> <!-- .cd-secondary-dropdown -->

            </li> <!-- .has-children -->



            <li class="has-children">

              <a href="#">Resources</a>

              <ul class="cd-secondary-dropdown is-hidden">

                <li class="nf-mb-menu"><a href="<?php echo site_url()?>/training_page">Training & Capacity Building</a></li>

                <li class="nf-mb-menu"><a href="<?php echo site_url()?>/mentors-incubators">Mentors & Incubators</a></li>

                <!--<li class="nf-mb-menu"><a href="<?php //echo site_url()?>/career-coach-search">Career Coach</a></li>-->

                <li class="has-children">

                                  <a href="#">Career Coach</a>

                                  <ul class="cd-dropdown-gallery is-hidden">

                                    <li class="go-back"><a href="#0">Career Coach Menu</a></li>

                                    <li>

                                      <div class="cources-menu">

                                        <h4 class="menu-subtitle">Select Sector (7)</h4>

                                        <ul class="vrt-menu-scroll">

                                          <li>

                                            <a class="box" href="<?php echo site_url()?>/career-coach-search/?Performing-Arts">

                                              <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/skills-for-pwd.png" alt="Icon">

                                              <span>Performing Arts</span>

                                            </a>

                                          </li>

                                          <li>

                                            <a class="box" href="<?php echo site_url()?>/career-coach-search/?Yoga-and-Sports">

                                              <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/yoga-naturopathy.png" alt="Icon">

                                              <span>Yoga and Sports</span>

                                            </a>

                                          </li>

                                          <li>

                                            <a class="box" href="<?php echo site_url()?>/career-coach-search/?Fine-Arts">

                                              <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/humanities(SoftSkills).png" alt="Icon">

                                              <span>Fine Arts</span>

                                            </a>

                                          </li>                              

                                          <li>

                                            <a class="box" href="<?php echo site_url()?>/career-coach-search/?Personality-Development">

                                              <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/business.png" alt="Icon">

                                              <span>Personality Development</span>

                                            </a>

                                          </li>



                                          <li>

                                            <a class="box" href="<?php echo site_url()?>/career-coach-search/?Freelance-Writing">

                                              <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/Rubber.png" alt="Icon">

                                              <span>Freelance Writing</span>

                                            </a>

                                          </li>

                                          <li>

                                            <a class="box" href="<?php echo site_url()?>/career-coach-search/?Cinematography">

                                              <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/beauty-and-wellness.png" alt="Icon">

                                              <span>Cinematography</span>

                                            </a>

                                          </li>

                                          <li>

                                            <a class="box" href="<?php echo site_url()?>/career-coach-search/?Competitive-Exams">

                                              <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/megamenu/other-exam.png" alt="Icon">

                                              <span>Competitive Exams</span>

                                            </a>

                                          </li>

                                          

                                        </ul>

                                      </div>

                                    </li>



                                  </ul> <!-- Learn and Earn -->

                                </li>

                <li class="nf-mb-menu"><a href="<?php echo site_url()?>/e-learning">E-Learning</a></li>

                <li class="nf-mb-menu"><a href="<?php echo site_url()?>/success-stories-details">Success Stories</a></li>

                <li class="nf-mb-menu"><a href="<?php echo site_url()?>/schemes-policies">Schemes & Policies</a></li>

                <li class="nf-mb-menu"><a href="<?php echo site_url()?>/apps-journals">Apps and Journals</a></li>

              </ul>

            </li>

            <li><a href="<?php echo site_url()?>/contact-us">Contact Us</a></li>

          </ul> <!-- .cd-dropdown-content -->

        </nav> <!-- .cd-dropdown -->

      </div> <!-- .cd-dropdown-wrapper -->

        </div>



        <!-- Global site tag (gtag.js) - Google Analytics -->

<script async src="https://www.googletagmanager.com/gtag/js?id=G-4H5HK4J3TV"></script>

<script>

  window.dataLayer = window.dataLayer || [];

  function gtag(){dataLayer.push(arguments);}

  gtag('js', new Date());



  gtag('config', 'G-4H5HK4J3TV');

</script>





    </header>

    <!-- header-end -->

<!-- Button trigger modal -->

<!-- Modal -->

<!--------logout popup----------->

<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel" aria-hidden="true">

  <div class="modal-dialog modal-lg" role="document" >

    <div class="modal-content">

      <div class="modal-header">

        <h5 class="modal-title" id="logoutModalLabel">

          Logout

         </h5>

        <!--<button type="button" class="close" data-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">&times;</span>

        </button>-->

      </div>

      <div class="modal-body">

       <section class="nf-faq-section">

                        <div class="row">

                          <div class="col-xl-10 offset-xl-1">

                            <div class="nf-faq-a-block">

                              <div id="accordion">  

                                Are you sure you want to logout?

                                   <div class="nf-btnreg">   

                                    <input type="button" name="wp-submit" id="wppb-submit" class="btn-skyblue" value="Ok" onclick="window.location='<?php echo wp_logout_url(site_url())?>'">

                                     <input type="button" name="wp-submit" id="wppb-submit" class="btn-navyblue ml-2" value="Cancel" data-dismiss="modal">

                                    </div>

                              </div>

                            </div>

                          </div>

                        </div>

                      </section>

      </div>

      <!--<div class="modal-footer">

        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

        <button type="button" class="btn btn-primary">Save changes</button>

      </div>-->

    </div>

  </div>

</div>

<!--------login popup----------->

<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">

  <div class="modal-dialog modal-lg" role="document" >

    <div class="modal-content">

      <div class="modal-header">

        <h5 class="modal-title" id="loginModalLabel">

          Login

         </h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="loginCancelButton">

          <span aria-hidden="true">&times;</span>

        </button>

      </div>

      <div class="modal-body">

       <section class="nf-faq-section">

                        <div class="row">

                          <div class="col-xl-10 offset-xl-1">

                            <div class="nf-faq-a-block">

                              <div id="accordion">

                                <?php

                                        echo do_shortcode(

                                          '[wppb-login]'

                                        );

                                      ?>



                                   <div class="nf-btnreg">   

                                    <input type="button" name="wp-submit" id="wppb-submit" class="btn-skyblue" value="Register" onclick="window.location='<?php echo site_url()?>/register'">

                                     <input type="button" name="wp-submit" id="wppb-submit" class="btn-navyblue ml-2" value="Lost Password" onclick="window.location='<?php echo site_url()?>/lost-password'">

                                    </div>

                              </div>

                            </div>

                          </div>

                        </div>

                      </section>

      </div>

      <!--<div class="modal-footer">    </div>-->

    </div>

  </div>

</div>

<?php if(!empty($_GET['loginerror']) && add_query_arg( array(), $wp->request )!='log-in'){?>

<script type="text/javascript">

  jQuery(function(){

    document.getElementById("loginpopid").click();

  });

</script>

<?php }?>







<?php

//auto open login popup start

  $time_variable_set = get_option( 'my_login_popup_field' );

  if(!isset($_SESSION['login_popup_time']) && $time_variable_set!='' && !is_user_logged_in())

  $_SESSION['login_popup_time']=strtotime('+'.$time_variable_set.' seconds');



  if(is_user_logged_in()) unset($_SESSION['login_popup_time']);



  if($time_variable_set!='' && add_query_arg( array(), $wp->request )!='log-in' && add_query_arg( array(), $wp->request )!='register' && add_query_arg( array(), $wp->request )!='lost-password' && !is_user_logged_in())

  {

      if($_SESSION['login_popup_time'] < time())

      {

  ?>

    <script type="text/javascript">

      jQuery(function(){

        document.getElementById("loginCancelButton").remove();

        document.getElementById("loginpopid").click();

      });

    </script>

  <?php

      }

  ?>



    <script type="text/javascript">

      function show_login_popup()

      {

        if(!$('#loginModal').hasClass('show'))

        {

            $.ajax({

                data: {'action': 'my_action_show_login_popup'},

                url: "<?php echo site_url()?>/wp-admin/admin-ajax.php",

                type: "post",

                success: function(data) {

                   if(data=='open')

                   {

                      if(!$('#loginModal').hasClass('show'))

                      {

                        document.getElementById("loginCancelButton").remove();

                        document.getElementById("loginpopid").click();

                      }

                   }

                }

            });

        }

      }

      setInterval(function() { show_login_popup(); }, 3000);

    </script>



<?php

  }

//auto open login popup end  

?>