<?php get_header(); ?>


    <!-- slider-start -->

    <!-- slider-end -->
    <?php
if(have_posts()) {
    while(have_posts()) {
        the_post(); ?>
    <div class="course-details-area gray-bg pt-70 pb-50">
        <div class="container-fluid">
            <div class="row">
                
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
    }
    ?>
 <!-- footer start -->   
<?php get_footer(); ?>