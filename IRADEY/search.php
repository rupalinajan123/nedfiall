<?php get_header(); ?>

<div class="course-details-area gray-bg pt-70 pb-50">
        <div class="container-fluid">
            <div class="row">

                <div class="col-xl-12 col-lg-12">

                    <div class="container">
                        <div class="col-xl-3 col-lg-3">
                        <?php
                            //echo do_shortcode(
                             // '[ivory-search id="5536" title="Default Search Form"]'
                            //);
                        ?>
                        </div>
                        <div class="clearfix">&nbsp;</div>

                        <?php
                        //if($_GET['s']!=''){
                        $record=0;
                        
                            if(have_posts()) {
                                while(have_posts()) {
                                    the_post(); 
                                    
                                    
                                //echo '>>>'.get_page_template();
                                // Include the page content template.
                                //echo '>'.$post->ID;
                                //echo '>>>'.get_template_part( 'template-parts/content', 'page' );
                                $page_template = esc_html( get_page_template_slug( $post->ID ) );
                                if($page_template!=''){
                                    $record++;
                                
                        ?>
                          
                            <section class="nf-faq-section">
                              <div class="container">
                                <div class="row">
                                  <div class="col-12">
                                    
                                    <div class="nf-faq-a-block">
                                      <div id="accordion">
                                        <a href="<?php the_permalink()?>">
                                        <h1><?php the_title() ?></h1>
                                        <h4> <?php the_content() ?></h4>
                                        </a>
                                      </div>
                                      
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </section>
                            <?php
                                    }
                                }
                            }
                        
                            ?>
                            <div class="col-xl-12 col-lg-12">
                             <?php 
                            if($record==0){ ?>
                                <b>No Record Found For <?php echo $_GET['s']?>.</b>
                             <?php }?>  
                             </div> 
                        <?php //}?>

                    </div>
                </div>
                
            </div>
        </div>
    </div>
   
<?php get_footer(); ?>