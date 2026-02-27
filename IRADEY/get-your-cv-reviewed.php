<?php /*Template Name: Get your CV Reviewed */ ?>
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
                                    <h2> Get Your CV Reviewed</h2>
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
                                                              
                                                          </div>
                                                      </div>  
                                                      <div class="col-xl-12" >
                                              <?php
                                                echo do_shortcode(
                                                  '[contact-form-7 id="29883" title="Get Your CV Reviewed"]'
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
 textarea {
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
 
 
 .modal.fade.show {
 background-color: #030218a6;
}.modal-footer .btn {
 padding: 15px 25px;
 font-weight: 500;
 background: #1C1777;
 border-radius: 3px;
 text-transform: capitalize;
}.modal-title {
 margin-bottom: 0;
 line-height: 1.5;
 color: #000;
 font-weight: 600;
}.modal-header .close {
 margin: -7px;
 width: 40px;
 height: 40px;
 background: #cdcaff;
 padding: 0;
 opacity: 1;
 text-shadow: none;
 border-radius: 4px;
}.modal .modal-body p {
 color: #252525;
 margin-bottom: 0;}
 
</style>
<script>
$('.wpcf7-form').submit(function(){
    //alert('dd');
    //$('#ssModal').modal('show');   
});

document.addEventListener( 'wpcf7mailsent', function( event ) {
 $('#ssModal').modal('show');   
}, false );

function showsecondmodel()
{
    $('#sshModal').modal('show');
}
</script>
    
<div class="modal fade" id="ssModal" tabindex="-1" role="dialog" aria-labelledby="ssModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-lg" role="document" >
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ssModalLabel">
            Confirmation
         </h5>
        <!--<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>-->
      </div>
      <div class="modal-body">
      <p>Successfully Submitted. </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="showsecondmodel()">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="sshModal" tabindex="-1" role="dialog" aria-labelledby="sshModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-lg" role="document" >
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="sshModalLabel">
          Confirmation
         </h5>
        <!--<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>-->
      </div>
      <div class="modal-body">
      <p>Your CV is getting reviewed by the expert. The detailed report will be sent to your registered email. Thanks. (Typically takes 24hrs).</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>