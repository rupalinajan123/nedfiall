<?php /*Template Name: Craft */ ?>
<?php get_header(); 
$page_data = get_page_by_path( 'craft' );
?>

    <!-- inner-banner-start -->
    <div class="inner-banner">
        <div class="container">
           <div class="banner-title">
                <h3><?php echo $page_data->post_title;?> <a href="#" class="changeTopic" data-toggle="collapse" data-target="#changeTopic">Change Topic</a></h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Entrepreneurship</a></li>
                    <li class="breadcrumb-item"><a href="#">Know your Business</a></li>
                    <li class="breadcrumb-item"><a href="#">Manufacturing</a></li>
                    <li class="breadcrumb-item"><a href="#">Bamboo</a></li>
                    <li class="breadcrumb-item active"><?php echo $page_data->post_title;?></li>
                </ul>
            </div>
            <div class="chagetopic-modal changeTopic-collapse">
          <div class="collapse " id="changeTopic" style="">
            <a href="#" id="changeTopic_close"><i class="fa fa-close"></i></a>
            <div class="card card-body">
              <div class="row">
                
                  <div class="col-md-6">
                  <h4>Select topic</h4>
                    <ul>
                        
                                <li><a href="<?php echo site_url()?>/bamboo/primary-treatment-plant/">Primary Treatment Plant</a></li>
                                 <li><a href="<?php echo site_url()?>/craft/">Craft</a></li>
                                <li><a href="<?php echo site_url()?>/bamboo/engineered-wood/"> Engineered Wood</a></li>
                                <li><a href="<?php echo site_url()?>/bamboo/incense-sticks"> Incense Stick</a></li>
                                <li><a href="<?php echo site_url()?>/bamboo/bamboo-blinds/">Bamboo Blinds</a></li>
                                <li><a href="<?php echo site_url()?>/bamboo/bamboo-charcoal/"> Bamboo Charcoal </a></li>
                                <li><a href="<?php echo site_url()?>/bamboo/bamboo-bio-plastics/"> Bamboo Bio-Plastics</a></li>
                                <li><a href="<?php echo site_url()?>/bamboo/bamboo-activated-charcoal/"> Bamboo Activated Charcoal</a></li>
                                <li><a href="<?php echo site_url()?>/bamboo/cutleries/"> Cutleries </a></li>
                                <li><a href="<?php echo site_url()?>/bamboo/food-pharmaceutical-nutraceutical/"> Food, Pharmaceutical and Nutraceutical</a></li>
                                <li><a href="<?php echo site_url()?>/bamboo/round-pole-unit/"> Round Pole Unit</a></li>
                 </ul>
                </div>

                <div class="col-md-6">
                  <h4>&nbsp;</h4>
                    <ul>
                    
                                <li><a href="<?php echo site_url()?>/bamboo/lifestyle-product/"> Lifestyle Product </a></li>
                                <li><a href="<?php echo site_url()?>/bamboo/floor-tiles/"> Floor Tiles</a></li>
                                <!--<li><a href="<?php //echo site_url()?>/bamboo/bamboo-food-and-pharmaceuticals/ "> Bamboo Food and Pharmaceuticals </a></li>-->
                                <li><a href="<?php echo site_url()?>/bamboo/bamboo-charcoal"> Bamboo charcoal</a></li>
                                <li><a href="<?php echo site_url()?>/bamboo/bamboo-vinegar/"> Bamboo vinegar </a></li>
                                <li><a href="<?php echo site_url()?>/bamboo/bamboo-activated-charcoal-carbon/"> Bamboo activated Charcoal/ Carbon</a></li>
                                <li><a href="<?php echo site_url()?>/bamboo/bamboo-plastic/"> Bamboo plastic </a></li>
                                <li><a href="<?php echo site_url()?>/bamboo/bamboo-utility-products/ "> Bamboo utility products </a></li>
                                <li><a href="<?php echo site_url()?>/bamboo/bamboo-nursery/"> Bamboo nursery </a></li>
                                <li><a href="<?php echo site_url()?>/bamboo/bamboo-cutlery/ "> Bamboo cutlery  </a></li>
                    </ul>
                </div>
                    
              </div>
            </div>
          </div>
        </div>

            <div class="banner-content">
                <div class="row">
                    <div class="col-md-4 banner-img pr-0"><?php echo get_the_post_thumbnail(); ?></div>
                    <div class="col-md-8  pl-0">
                      <div class="bannerbg nf-gradient-10 justify-content-start p-3 nf-height-100">
						            <h4 class="nf-f-size-24 pl-0"><?php echo $page_data->post_title;?></h4>
                        <p class="text-white pr-md-5"><?php echo $page_data->post_content;?></p>
                        <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/layers-bg.png" alt="layers background" class="nf-layes-bg">
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- inner-banner-end -->
   <!-- Study tour in north section  -->
  <form method="post" action="<?php echo site_url()?>/craft-details/">
      <div class="inner-body">
        <div class="container">
          <div class="national-level icon-text-box">
            <div class="row mb-2">
              <div class="col-md-8">
                <h4 class="nf-f-size-24 nf-strong">Select Option </h4>
              </div>
            </div>
            <div class="nf-form-wrap">
              <div class="row">
                <div class="col-12 col-md-6 col-xl-4">
                  <div class="nf-select-wrap">
                    <div class="nf-select-img">
                      <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/icon/megamenu/Craft.png" alt="incense-stick">
                      <span>Option</span>
                    </div>
                    <div class="nf-select-field">
                      <select class="form-control selectpicker" name="incense" id="incense">
                        <option value="">Select Option</option>
                        <?php
                        // args
                        $args = array(
                          'post_type'   => 'bamboo',
                          'meta_key'    => 'bamboo_type',
                          'meta_value'  => 'Craft',
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
                  <button type="submit" onclick="return validation_function()" class="nf-button-v-small submitBtn">
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

       if($('#incense').val()=='')
       {
           // alert('hjghj');
           error_msg1.textContent = "*Please Select Option";
           flag= false;
       }
       return flag;
       }
</script>
