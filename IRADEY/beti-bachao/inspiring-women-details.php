<?php /* Template Name: Inspiring Women Details
Template Post Type: beti_bachao */
 ?>
<?php get_header(); 

$category_id = get_cat_ID ('Inspiring Women of North East');
$categories = get_category( $category_id );

$page_data = get_page_by_path( 'inspiring-women-details' );
?>

<!-- header-end -->
    <!-- inner-banner-start -->
    <div class="inner-banner">
      <div class="container">
        <div class="banner-title">
          <h3><?php echo $page_data->post_title;?></h3>
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Advancing Girls Advancing North East</a></li>
            <li class="breadcrumb-item active"><?php echo $page_data->post_title;?></li>
          </ul>
        </div>
        <!--<div class="banner-content">
          <div class="row">
            <div class="col-md-4 banner-img pr-0"><img src="<?php //echo get_template_directory_uri(). '/assets/'?>img/home/beti-bachao-banner.png"></div>
            <div class="col-md-8  pl-0">
              <div class="bannerbg nf-gradient-12 justify-content-start pt-3 nf-height-100">
                <h4 class="nf-f-size-24"><?php //echo $page_data->post_content;?></h4>
              </div>
            </div>
          </div>
        </div>-->
      </div>
    </div>
    <!-- inner-banner-end -->
    <!-- Study tour in north section  -->
    <div class="inner-body pt-0">
      <div class="container">
             <?php
 

  $current_slug = add_query_arg( array(), $wp->request );
  $current_slug = explode('/',$current_slug);
  $the_slug = end($current_slug);
  $type = $current_slug[count($current_slug) - 2];

      
      $blog_args = array(
                            'post_type' => 'beti_bachao',
                            'post_status' => 'publish',
                            'meta_key'    => 'category',
                            'meta_value'  => 'Inspiring Women of North East',
                            'posts_per_page' => 1,
                            'name'=>$the_slug
                          
                            
                            );

      $blog_posts = new WP_Query($blog_args);
                            //echo "<pre>";
                            //print_r($blog_posts);

      
     ?>
        <div class="nf-inspiring-women-detail">
           <?php
                      $record=0;
                            while($blog_posts->have_posts()) {
                                $blog_posts->the_post(); 

                                $values= get_fields();
                                
                                if($values)
                                {
                                    $name=''; 
                                    $image='';  
                                    $description='';
                                    $source_link='';
                                    $designation='';
									$video_link='';
									$state='';

                                    foreach($values as $key => $value)
                                    {
                                        if($key=='name'){ $name = $value; }
                                        if($key=='image'){ $image = $value;  }
                                        if($key=='description'){ $description = $value;  }
                                        if($key=='source_link'){ $source_link = $value;  }
                                        if($key=='designation'){ $designation = $value;  }
										if($key=='video_link'){ $video_link = $value;  }
										if($key=='state'){ $state = $value; }
										
                                    }
                                }
                   $record=$record+1;         
            ?>
          <div class="row">
            <div class="col-xl-2 col-lg-3 text-center">
                <img src="<?php echo $image; ?>" alt="inspiring-women">
                <h3><?php echo $name; ?></h3>
            </div>
            <div class="col-xl-10 col-lg-9">
              <div class="data">
				<label>State</label>
                <p><?php echo $state; ?></p>
			  
                <label>Sector</label>
                <p><?php echo $designation; ?></p>

                <label>Brief Description</label>
                <p><?php echo $description; ?></p>

                <label>Source Link</label>
				<?php $source_link_url = explode(',',$source_link);
					foreach($source_link_url as $url){
				?>
                <p><a target="_blank" href="<?php echo $url; ?>"><?php echo $url; ?></a></p>
					<?php }?>
				
				<?php if($video_link!=''){ ?>
				<label>Video Link</label>
                <p><a target="_blank" href="<?php echo $video_link; ?>"><?php echo $video_link; ?></a></p>
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