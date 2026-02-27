<?php /* Template Name: Inspiring Women of North East */
 ?>
<?php get_header(); 

$category_id = get_cat_ID ('Inspiring Women of North East');
$categories = get_category( $category_id );

$page_data = get_page_by_path( 'inspiring-women-of-north-east' );
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
        <div class="banner-content">
          <div class="row">
            <div class="col-md-4 banner-img pr-0"><?php echo get_the_post_thumbnail(); ?></div>
            <div class="col-md-8  pl-0">
              <div class="bannerbg nf-gradient-28 justify-content-start pt-3 nf-height-100">
                <h4 class="nf-f-size-24"><?php echo $page_data->post_content;?></h4>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- inner-banner-end -->
    <!-- Study tour in north section  -->
    <form method="post" action="<?php echo site_url(); ?>/inspiring-women-details" id="form_id">
    <div class="inner-body pb-3">
      <div class="container">
        <?php
 
  if($_POST['keyword']!='')
  {
    $keyw = array(
        'relation' => 'OR',
        array(
            'key'     =>  'name',
                  'value'    =>  $_POST['keyword'],
                  'compare'  => 'LIKE'
        )
        
    );
  }

      //$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
      $blog_args = array(
                            'post_type' => 'beti_bachao',
                            'post_status' => 'publish',
                            'meta_key'    => 'category',
                            'meta_value'  => 'Inspiring Women of North East',
                            'posts_per_page' => -1,
                            //'posts_per_page' => 10,
                            //'paged' => $paged, 
                            'meta_query'     =>  array(
                              array(
                                  'relation' => 'AND',
                                  $keyw
                                )
                            )
                            );

      $blog_posts = new WP_Query($blog_args);
                            //echo "<pre>";
                            //print_r($blog_posts);

      $tot_blog_args = array(
                            'post_type' => 'beti_bachao',
                            'post_status' => 'publish',
                            'meta_key'    => 'category',
                            'meta_value'  => 'Inspiring Women of North East',
                            'posts_per_page' => -1,
                            'meta_query'     =>  array(
                              array(
                                  'relation' => 'AND',
                                  $keyw
                                )
                            )
                            );
     ?>
        <div class="nf-inspiring-women">
                <ul>
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

                                    foreach($values as $key => $value)
                                    {
                                        if($key=='name'){ $name = $value; }
                                        if($key=='image'){ $image = $value;  }
                                        if($key=='description'){ $description = $value;  }

                                        
                                    }
                                }
                   $record=$record+1;         
            ?>

          
            <li class="item">

              <div class="box">
                <div class="nf-img">
                  <img src="<?php echo $image; ?>" alt="inspiring-women">
                </div>
               <div class="data">
                  <h3><a href="<?php echo get_permalink( $post->ID )?>"><?php echo $name; ?></a></h3>
                  <?php
                     if (strlen($description) > 70) {
                         $stringCut = substr($description, 0, 70);
                         $endPoint = strrpos($stringCut, ' ');
                         $description = $endPoint? substr($stringCut, 0, $endPoint):substr($stringCut, 0);
                         //$description .= '... <a style="cursor: pointer;" href="#" >Read More</a>';
                     } ?>
                   
                  
                  <p><?php echo $description?>.. <a style="cursor: pointer; color: #1673e7;" href="<?php echo get_permalink( $post->ID )?>" >Read More</a></p>

                </div>

              </div>
        
            </li>

            

          
 <?php  } ?>
      </ul>

      <?php
       if($record==0) echo 'No Record Found.';

        // Step  3 : Call the Pagination Function Here  
        //if (function_exists("cpt_pagination")) {
         //cpt_pagination($blog_posts->max_num_pages); 
        //}
      ?>

        </div>

      </div>
    </div>
    </form>
      <!-- End Study tour in north section  -->
<!-- footer start -->   
<?php get_footer(); ?>
<script type="text/javascript">
  $( ".page-link" ).click(function() {
  $('#form_id').attr('action',this.href); 
  $( "#form_id" ).submit();
  //alert(this.href);
  return false;
});
</script> 