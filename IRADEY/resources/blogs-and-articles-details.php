<?php /* Template Name: Blogs and Articles details */
/*Template Post Type: blogs_and_articles*/
 ?>
<?php get_header(); 


$page_data = get_page_by_path( 'blogs-and-articles-details' );

$current_slug = add_query_arg( array(), $wp->request );
          $current_slug = explode('/',$current_slug);
          $the_slug = end($current_slug);
          $type = $current_slug[count($current_slug) - 2];
      
      $blog_args = array(
                            'post_type' => 'blogs_and_articles',
                            'post_status' => 'publish',
                            'posts_per_page' => 1,
                            // 'meta_key'=>'type',
                            // 'meta_value'=>'Blog',
                            'name'=>$the_slug
                            );

      $blog_posts = new WP_Query($blog_args);
                            //echo "<pre>";
                            //print_r($blog_posts);

      while($blog_posts->have_posts()){
        $blog_posts->the_post();
        $values = get_fields();

        if ($values) {
          $banner_image = '';
          $description='';
          foreach ($values as $key => $value) {
            if($key=='image'){$banner_image = $value;}
            if($key=='description'){$description = $value;}
          }
        }
      }
?>

<!-- header-end -->
    <!-- inner-banner-start -->
    <div class="inner-banner">
        <div class="container">
            <div class="banner-title">
                     <h3><?php echo the_title(); ?> </h3>
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Blogs & Articles </a></li>
            <li class="breadcrumb-item active"><?php echo the_title(); ?></li>
        </ul>
            </div>
            <div class="banner-content">
                <div class="row">
                    <div class="col-md-4 banner-img pr-0">
                      <img class="nf-height-auto" src="<?php echo $banner_image; ?>">
                    </div>
                    <div class="col-md-8  pl-0">
                        <div class="bannerbg nf-gradient_4 justify-content-start pt-3 nf-height-100">
                          <!-- <h4 class="nf-f-size-24 nf-color-m-grey">Blog Details</h4> -->
                            <h5 class="nf-color-m-grey"><?php echo $description; ?></h5>
                            <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/know-your-approvals/layers-3.png" alt="linear background"
                                class="nf-layes-bg">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- inner-banner-end -->
    <!-- Study tour in north section  -->

    <div class="inner-body"><!--inner-body-->
      <div class="container">
        <?php
                      $record=0;
                                $k=0;
                                while($blog_posts->have_posts()) { 
                                    $blog_posts->the_post();
                                    $values= get_fields();
                                    

                                    if ($values) {
                                        $topic = '';
                                        $state='';
                                        $sectors='';
                                        $flag = '';
                                        $image = '';
                                        $blog_description = '';
                                        $blog_link = '';

                                        foreach($values as $key => $value)
                                        {
                                            if($key=='image'){ $image = $value; }
                                            if($key=='topic'){ $topic = $value; }
                                            if($key=='blog_link'){ $blog_link = $value;  }
                                            if($key=='blog_description'){ $blog_description = $value;}
                                            
                                            if($key=='flag'){ $flag = $value;}
                                            if($key=='state'){ $state = $value;}
                                            if($key=='sectors'){ $sectors = $value;}
                                        }
                                    }
                   $record=$record+1;         
            ?>
             
        <div class="nf-inspiring-women-detail nf-blog-details">
          <div class="row blog-titles">
            <div class="col-md-4">Topic – <?php echo $topic; ?></div>
            <div class="col-md-4 text-center">State – <?php echo $state; ?> </div>
            <div class="col-md-4 text-right">Sector – <?php echo $sectors; ?></div>
          </div>
          <div class="row">
            <div class="col-xl-12 col-lg-12">
              <div class="data">
                <?php if($flag=='In-House'){?>
                <p><?php echo $blog_description; ?></p>
              <?php }else{?>
                <p><a href="<?php echo $blog_link; ?>" target="_blank"><?php echo $blog_link; ?></a></p>
              <?php }?>
              </div>
            </div>
          </div>
        </div>
        <?php //}

  }

  if($record==0) echo 'No Record Found.';

 
  ?>
    
       </div>
    </div>

   
      <!-- End Study tour in north section  -->
<!-- footer start -->   
<?php get_footer(); ?> 