<?php /* Template Name: Work Abroad Details
Template Post Type: work_abroad */
 ?>
<?php get_header(); 

//$page_data = get_page_by_path( 'work-abroad-details' );
 

  $current_slug = add_query_arg( array(), $wp->request );
  $current_slug = explode('/',$current_slug);
  $the_slug = end($current_slug);
  $type = $current_slug[count($current_slug) - 2];

      
      $blog_args = array(
                            'post_type' => 'work_abroad',
                            'post_status' => 'publish',
                            'posts_per_page' => 1,
                            'name'=>$the_slug
                          
                            
                            );

      $blog_posts = new WP_Query($blog_args);
                            //echo "<pre>";
                            //print_r($blog_posts);

      

?>

<!-- header-end -->
    <!-- inner-banner-start -->
    <div class="inner-banner">
      <div class="container">
        <div class="banner-title"> 
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Employment</a></li>
            <li class="breadcrumb-item"><a href="#">Work Abroad</a></li>
            <li class="breadcrumb-item active"><?php echo $blog_posts->posts[0]->post_title;?></li>
          </ul>
        </div>
        
      </div>
    </div>
    <!-- inner-banner-end -->
    <!-- Study tour in north section  -->
    <div class="inner-body"><!--inner-body-->
      <div class="container">
             
        <div class="nf-inspiring-women-detail">
           <?php
                      $record=0;
                            while($blog_posts->have_posts()) {
                                $blog_posts->the_post(); 

                                $values= get_fields();
                              
                   $record=$record+1;   
                   $img = wp_get_attachment_url( get_post_thumbnail_id($post_id) );    
            ?>
          <div class="row">
            <div class="col-xl-2 col-lg-3 text-center">
                <img src="<?php echo $img; ?>" alt="Flag">
                <h3><?php the_title(); ?></h3>
            </div>
            <div class="col-xl-10 col-lg-9">
              <div class="data">
                <?php the_content(); 
                //$content = wpautop( $post->post_content );
                //echo $content;
                ?>
              </div>
            </div>
          </div>
        </div>
 <?php 

  }

  if($record==0) echo 'No Record Found.';

 
  ?>
      </div>
    </div>
      <!-- End Study tour in north section  -->
<!-- footer start -->   
<?php get_footer(); ?> 