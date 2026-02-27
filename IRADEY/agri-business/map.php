<?php /*Template Name: Maps */ ?>
<?php get_header(); 

$current_slug = add_query_arg( array(), $wp->request );
$current_slug = explode('/',$current_slug);
$the_slug = end($current_slug);
$type = $current_slug[count($current_slug) - 2];

//echo $the_slug;exit;

$page_data = get_page_by_path( $the_slug );
?>


    <!-- inner-banner-start -->
    <div class="inner-banner">
        <div class="container">
           <div class="banner-title">
                <h3><?php echo $page_data->post_title;?> <a href="#" class="changeTopic" data-toggle="collapse" data-target="#changeTopic">Change Topic</a></h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Entrepreneurship</a></li>
                    <li class="breadcrumb-item"><a href="#">Know your Business</a></li>
                    <li class="breadcrumb-item"><a href="#">Agri-Business</a></li>
                    <li class="breadcrumb-item"><a href="#">Production</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo site_url()?>/maps/">Map</a></li>
                    <!--<li class="breadcrumb-item active"><?php //echo $page_data->post_title;?></li>-->
                </ul>
            </div>

            <div class="chagetopic-modal changeTopic-collapse">
          <div class="collapse " id="changeTopic" style="">
            <a href="#" id="changeTopic_close"><i class="fa fa-close"></i></a>
            <div class="card card-body">
              <div class="row">
                
                       
                          <div class="col-md-4">
                              <h4>Production &nbsp;</h4>
                            <ul>
                              <li>
                                <a class="box" href="<?php echo site_url()?>/fruits/">Horticulture</a>
                              </li>
                              <li>
                                <a class="box" href="<?php echo site_url()?>/meat-production/">Animal Husbandry</a>
                              </li>
                              <li>
                                <a class="box" href="<?php echo site_url()?>/production-of-commercial-silk-cocoon/">Sericulture</a>
                              </li>
                              <li>
                                <a class="box" href="<?php echo site_url()?>/species-wise/">Aquaculture</a>
                              </li>
                              <li>
                                <a class="box" href="<?php echo site_url()?>/maps/">MAP</a>
                              </li>
                              <li>
                                <a class="box" href="#">Nursery</a>
                              </li>
                            </ul>
                          </div>
                          
                          <div class="col-md-4">
                              <h4>Post Harvest & Primary Processing &nbsp;</h4>
                            <ul>
                              <li>
                                <a class="box" href="<?php echo site_url()?>/post_harvest/refrigerated-van/">Handling & Logistics</a>
                              </li>
                              <li>
                                <a class="box" href="<?php echo site_url()?>/post_harvest/dry-warehouse/">Storage</a>
                              </li>
                              <li>
                                <a class="box" href="<?php echo site_url()?>/post_harvest/blast-freezing/">Preservation</a>
                              </li>
                              <li>
                                <a class="box" href="<?php echo site_url()?>/post_harvest/rice-mill/">Primary Processing</a>
                              </li>
                            </ul>
                          </div> 
                    
              </div>
            </div>
          </div>
        </div>

            <div class="banner-content">
                <div class="row">
                  <?php $url = wp_get_attachment_url( get_post_thumbnail_id($post_id) );?>
                    <div class="col-md-4 banner-img pr-0"><img src="<?php echo $url;?>"></div>
                    <div class="col-md-8  pl-0">
                      <div class="bannerbg nf-gradient-1 justify-content-start pt-3 nf-height-100">
                        <h4 class="nf-f-size-24"><?php echo $page_data->post_title;?></h4>
                        <p><?php echo $page_data->post_content;?></p>
                        <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/layers-bg.png" alt="layers background" class="nf-layes-bg">
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- inner-banner-end -->
   <!-- Study tour in north section  -->
   <form action="<?php echo site_url()?>/map-details" method="post">
   	
      <div class="inner-body">
        <div class="container">
          <div class="national-level icon-text-box">

			 <div class="row mb-2">
              <div class="col-md-8">
                <h4 class="nf-f-size-24 nf-strong">Select Category</h4>
              </div>
            </div>
            <div class="nf-form-wrap">
              <div class="row">
                <div class="col-12 col-md-6 col-xl-4">
                  <div class="nf-select-wrap">
                    <div class="nf-select-img">
                      <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/fruit.png" alt="state">
                      <span>Crop</span>
                    </div>
                    <div class="nf-select-field">
                      <select class="form-control selectpicker" name="map" id="map">
                        <option value="">Select Crop</option>

                        <?php
                          // args
                          $args = array(
                            'post_type'   => 'map',
                            //'meta_key'    => 'map_type',
                            //'meta_value'  => $page_data->post_title,
                            'orderby' => 'post_title',
                            'order'   => 'ASC',
                            'post_status' => 'publish',
                            'posts_per_page' => -1
                          );
                          $the_query = new WP_Query( $args );
                          ?>
                          <?php if( $the_query->have_posts() ): ?>
                            <?php while( $the_query->have_posts() ) : $the_query->the_post(); 
                              $croptile = $post->post_title;
                              if($croptile_new!=$croptile){
                              ?>
                              <option value="<?php the_title(); ?>"><?php the_title(); ?></option>
                            <?php 
                          }
                          $croptile_new = $post->post_title;
                          endwhile; ?>
                          <?php endif; ?>
                       
                          
                      </select>
                    </div>
                  </div>
                  <span id="error_msg1" style="color: red;"></span>
                </div> 
              </div>
            </div>
          </div>
        </div>
      </div>
        <div class="nf-circle-bg-img">
          <div class="container">
            <div class="row">
              <div class="col-12 nf-button-wrapper mb-sm-0 mb-3">
          <button class="nf-button-v-small submitBtn" type="submit" onclick="return validation_function()">
          Next
        </button>
              </div>
              <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/circle-bg.jpg" alt="background image" class="img-fluid">
            </div>
          </div>
        </div>
    </form>
   <!-- End Study tour in north section  -->

    <!-- footer start -->   
<?php get_footer(); ?>
<script type="text/javascript">
function validation_function()
   {
      var error_msg1 = document.getElementById("error_msg1");
     
      error_msg1.textContent = "";
     
      var flag=true;

       if($('#map').val()=='')
       {
           // alert('hjghj');
           error_msg1.textContent = "*Please select Crop";
           flag= false;
       }

      
       return flag;
       }
</script>
