<?php /*Template Name: Disclaimer */ ?>
<?php get_header(); ?>
    <!-- slider-start -->
    
    <!-- slider-end -->
    <?php
if(have_posts()) {
    while(have_posts()) {
        the_post(); ?>
    
<div class="inner-banner">
      <div class="container">
        <div class="banner-title">
          <h3><?php the_title() ?></h3>
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active"><?php the_title() ?></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- inner-banner-end -->
    <!-- Study tour in north section  -->
    <div class="inner-body pt-0">
      <div class="container">
          <div class="nf-privacy-policy">
            <?php the_content() ?>

          </div>
        </div>
      </div>



    <?php 
        }
    }
    ?>
 <!-- footer start -->   
<?php get_footer(); ?>