<?php /*Template Name: Login */ ?>
<?php 
if($_GET['action']=='register')
{  
      wp_redirect(site_url('register'));
      exit; 
}

get_header(); 
?>

<?php
if(have_posts()) {
    while(have_posts()) {
        the_post(); ?>
    <div class="course-details-area gray-bg pt-70 pb-50">
        <div class="container-fluid">
            <div class="row">
                <!--<div class="col-xl-3 col-lg-3">
                    <?php //get_sidebar() ?>
                </div>-->
                <!-- Blog -->
                <div class="col-xl-12 col-lg-12">
                    <div class="container">
                          
                      <section class="nf-faq-section">
                        <div class="row">
                          <div class="col-xl-8 offset-xl-2">
                            <h2><!--<img src="<?php //echo get_template_directory_uri(). '/assets/'?>img/home/faq-icon.png" alt="faq-icon">--> Login</h2>
                            <div class="nf-faq-a-block">
                              <div id="accordion">
                                <?php
                                        echo do_shortcode(
                                          '[wppb-login]'
                                        );
                                      ?>

                                   <div class="nf-btnreg">   
                                    <input type="button" name="wp-submit" id="wppb-submit" class="btn-skyblue" value="Register" onclick="window.location='<?php echo site_url()?>/register'">

                                     <input type="button" name="wp-submit" id="wppb-submit" class="btn-navyblue ml-2" value="Lost Password" onclick="window.location='<?php echo site_url()?>/lost-password'">
                                    </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </section>
                    
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