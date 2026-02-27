<?php get_header(); ?>


    <!-- slider-start -->
    <!--<div class="slider-area">
        <div class="page-title">
            <div class="single-slider slider-height slider-height-breadcrumb d-flex align-items-center" style="background-image: url(<?php echo get_template_directory_uri(). '/assets/img/bg/others_bg.jpg'?>);">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="slider-content slider-content-breadcrumb text-center">
                                <h1 class="white-color f-700">Our Course</h1>
                                <nav class="text-center" aria-label="breadcrumb">
                                    <ol class="breadcrumb justify-content-center">
                                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Courses</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>-->
    <!-- slider-end -->
   
    <?php
if(have_posts()) {
    while(have_posts()) {
        the_post(); ?>
    <div class="course-details-area gray-bg pt-70 pb-50">
        <div class="container-fluid">
            <div class="row">
                <!--<div class="col-xl-3 col-lg-3">
                    <?php get_sidebar() ?>
                </div>-->
                <!-- Blog -->
                <div class="col-xl-12 col-lg-12">
                    <div class="container">
                          <h1><?php the_title() ?></h1>
                            <h4> <?php the_content() ?></h4>
                    
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <?php 
        }
    }else{
        ?>
        <div class="inner-body">
    <div class="container">
     
      <div class="row">
         <div class="col-md-6 text-center align-self-center">
            <div class="error-page text-center">
               <div class="error-code">
                  <strong>404</strong>
               </div>
               <div class="error-message">
                  <h3>Oops... Page Not Found!</h3>
               </div>
               <div class="error-body">
                  <p>Try using the button below to go to main page of the site <p>
                  <a href="<?php echo site_url()?>" class="nf-button-v-small"><i class="fa fa-arrow-circle-left">&nbsp;</i> Go to Home</a>
               </div>
            </div>
         </div>
         <div class="col-md-6 text-right">
            <img class="img-fluid" src="<?php echo get_template_directory_uri(). '/assets/'?>img/home/404.jpg" alt="404 image">
         </div>
      </div>
    </div>
  </div>
        <?php
    }
    ?>
 <!-- footer start -->   
<?php get_footer(); ?>