<?php 
/*Template Name: careers */?>
<?php get_header(); ?>


<?php 
  $page_data = get_page_by_path( 'careers' );
  //echo '<pre>';
  //print_r($page_data);

  //echo '>>'.$page_data->post_title;
?>

    <!-- inner-banner-start -->
    <div class="inner-banner">
        <div class="container">
            <div class="banner-title">
                <h3><?php echo $page_data->post_title;?> <a href="#" class="changeTopic">Change Topic</a></h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Education</a></li>
                    <li class="breadcrumb-item active"><?php echo $page_data->post_title;?></li>
                </ul>
            </div>
            <div class="banner-content">
                <div class="row">
                    <div class="col-md-4 banner-img pr-0"><img src="<?php echo get_template_directory_uri(). '/assets/'?>img/bg/law-bg2.png"></div>
                    <div class="col-md-8 pl-0">
                      <div class="bannerbg nf-gradient-3 justify-content-start pt-3 nf-height-100">
                        <h4> <?php echo $page_data->post_content;?></h4>
                        <h5></h5>
                        <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/bg/vct-bg2.png" alt="layers background" class="vct-layes-bg">
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- inner-banner-end -->

    <?php

      $blog_args = array(
                            'post_type' => 'career',
                            'posts_per_page' => -1,
                            'post_status' => 'publish'
                            //'cat' => $category_id
                            );

      $blog_posts = new WP_Query($blog_args);
                            //echo "<pre>";
                            //print_r($blog_posts);
      ?>

    <div class="inner-body">
        <div class="container">
            <div class="national-level icon-text-box">
                <div class="row mb-2">
                    <div class="col-md-8">
                        <h4>Career Option <span>|</span> <?php echo count($blog_posts->posts);?></h4>
                    </div>
                </div>

                <div class="row mb-4">
                  <?php
                   while($blog_posts->have_posts()) {
                                $blog_posts->the_post(); 

                                $values= get_fields();
                                
                                if($values)
                                {
                                    $icon='';
                                    foreach($values as $key => $value)
                                    {
                                        if($key=='icon'){ $icon = $value; }
                                    }
                                }
                                

                  ?>

                    <div class="col-md-3">
                        <a href="<?php echo get_permalink($blog_posts->ID);?>" class="box">
                            <img src="<?php echo $icon; ?>">
                            <h4><?php the_title()?></h4>
                        </a>
                    </div>

                  <?php
                  }
                  ?>  
                    <!--<div class="col-md-3">
                        <a href="#" class="box">
                            <img src="<?php //echo get_template_directory_uri(). '/assets/'?>img/icon/magistrate.png">
                            <h4>MAGISTRATE</h4>
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a href="#" class="box">
                            <img src="<?php //echo get_template_directory_uri(). '/assets/'?>img/icon/bank.png">
                            <h4>COURT MANAGER</h4>
                        </a>
                    </div>-->
                    
                </div>

            </div>

            <!--<div class="jumbotron">              
              Description - Advocate
            </div>-->

        </div>
    </div>
  
    <!-- footer start -->   
<?php get_footer(); ?>
