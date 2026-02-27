<?php /*Template Name: faq */ ?>
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
                <!--<div class="col-xl-3 col-lg-3">
                    <?php //get_sidebar() ?>
                </div>-->
                <!-- Blog -->
                <div class="col-xl-12 col-lg-12">
                    <div class="container">
                          
                          <section class="nf-faq-section">
                              <div class="container">
                                <div class="row">
                                  <div class="col-12">
                                    <h2><img src="<?php echo get_template_directory_uri(). '/assets/'?>img/home/faq-icon.png" alt="faq-icon"> Frequently Asked Questions</h2>
                                    <div class="nf-faq-a-block">
                                      <div id="accordion">

                                        <?php
                                          // args
                                          $g=0;
                                          $args = array(
                                            'post_type'   => 'faq',
                                            'post_status' => 'publish',
                                            'posts_per_page' => -1,
                                            //'posts_per_page' =>100,
                                            //'page'=>1,
                                            //'offset' => 5,
                                            'order'   => 'ASC'
                                          );
                                          $the_query = new WP_Query( $args );
                                          ?>
                                          <?php if( $the_query->have_posts() ): ?>
                                            <?php while( $the_query->have_posts() ) : $the_query->the_post(); 
                                              $g++;
                                          ?>
                                              
                                        <div class="card">
                                          <div class="card-header" id="headingOne<?php echo $g;?>">
                                            <h5 class="mb-0">
                                              <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseOne<?php echo $g;?>" aria-expanded="true" aria-controls="collapseOne<?php echo $g;?>">
                                                <?php the_title();?>
                                              </button>
                                            </h5>
                                          </div>
                                          <div id="collapseOne<?php echo $g;?>" class="collapse" aria-labelledby="headingOne<?php echo $g;?>" data-parent="#accordion">
                                            <div class="card-body">
                                              <?php the_content();?>
                                            </div>
                                          </div>
                                        </div>
                                          
                                         <?php endwhile; ?>
                                        <?php endif; ?>

                                        
                                        
                                      </div>
                                      <?php if(count($the_query->posts)>0){?>
                                      <!--<div class="nf-faq-more d-flex justify-content-center">
                                        <a href="#" class="nf-button-v-small">View More </a>
                                      </div>-->
                                      <?php }?>
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