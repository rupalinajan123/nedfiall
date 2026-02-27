<?php /*Template Name: Hire an Intership */ ?>
<?php get_header(); ?>
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
                                    <h2> Hire an Intern</h2>
                                    <div class="nf-faq-a-block">
                                      <div id="accordion">



                          <div class="advisors-area pt-70 pb-50">
                           <div class="container">
                              <div class="row">
                                   <div class="col-xl-8 offset-xl-2">
                                          <div class="faq-area-form mb-30 p-0">

                                              <div class="row">
                                              <div class="col-xl-12">
                                                          <div class="events-form-title text-center mb-30">
                                                              <h3></h3>
                                                              <p></p>
                                                          </div>
                                                      </div>  
                                                      <div class="col-xl-12" >
                                              <?php
                                                echo do_shortcode(
                                                  '[contact-form-7 id="26762" title="Hire an Intern"]'
                                                );
                                              ?>
                                              </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                  </div> 
                             </div>
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
<style type="text/css">

  /* Contact Form 7 Form Background And Border CSS
 -----------------------------------------------*/
 
 /* Contact Form 7 Input CSS 
 ---------------------------*/
 .wpcf7 input[type="text"],
 .wpcf7 input[type="email"],
 .wpcf7 input[type="tel"],
 textarea, select {
     font-size: 16px;
     
     border-color: #e9e9e9;
     width: 100%;
     padding: 2%;
 }
  /* Contact Form 7 Submit Button 
 -------------------------------*/
 .wpcf7 input[type="submit"] {
     color: #ffffff;
     font-size: 18px;
     font-weight: 700;
     background: #E2272E;
     padding: 15px 25px 15px 25px;
     border: none;
     border-radius: 5px;
     width: auto;
     text-transform: uppercase;
     letter-spacing: 5px;
 }
 .wpcf7 input:hover[type="submit"] {
     background: #494949;
     transition: all 0.4s ease 0s;
 }
 .wpcf7 input:active[type="submit"] {
     background: #000000;
 }
</style>