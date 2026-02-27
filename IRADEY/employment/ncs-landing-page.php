<?php /*Template Name: NCS Landing Page */ ?>
<?php //get_header(); ?>


<!-- header part start -->
<!doctype html>
<html class="no-js" lang="zxx">
<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>One Stop Solution for Career and Livelihod</title>
  <meta name="description" content="One Stop Solution for Career and Livelihod">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" type="image/x-icon" href="<?php echo get_template_directory_uri();?>/assets/img/favicon.png">
  <!-- CSS here -->
  <?php wp_head() ?>
  <script>
    var $ = jQuery;
  </script>
</head>

<body <?php body_class('homepage is-preload launchpage-height') ?>>
  <!-- Add your site or application content here -->

  <!-- header-start -->

  <header id="home">
    <div class="header-area">
      <!-- header-top -->
      <div class="header-top">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-lg-9 col-md-6">
              <div class="topbar-logo">
                <a href="https://mdoner.gov.in/" target="_blank"><img src="<?php echo get_template_directory_uri();?>/assets/img/home/mdner-logo.jpg" alt="NER Logo">
                  <a href="http://necouncil.gov.in/" target="_blank"><img src="<?php echo get_template_directory_uri();?>/assets/img/home/nec-toplogo.png" alt="NEC Logo">
                    <a href="https://wcd.nic.in/schemes/beti-bachao-beti-padhao-scheme" target="_blank"><img src="<?php echo get_template_directory_uri();?>/assets/img/home/Beti_Bachao_Beti_Padhao_logo.jpg" alt="emblem of india">
                    </div>
                  </div>
                  <div class="col-lg-3 col-md-6 top-right">
                    <div class="nf-social-links-top">
                      <?php dynamic_sidebar( 'social_media' ); ?>
                      <?php global $current_user; wp_get_current_user(); ?>
                    </div>
                    <div class="header-contact">
                      <div class="phone-number dropdown-toggle" id="dropdownMenuLink" data-toggle="dropdown"><span class="user"><img src="<?php echo get_template_directory_uri();?>/assets/img/icon/user.png"></span></div>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <?php
                        if ( is_user_logged_in() ) {  //echo $current_user->user_login; ?>

                          <a class="dropdown-item" href="<?php echo site_url()?>/edit-profile">Profile</a>

                        <?php }else{?>

                          

                          <a class="dropdown-item" id="loginpopid" href="#" data-toggle="modal" data-target="#loginModal" data-backdrop="static" data-keyboard="false">Login</a>

                        <?php }?>

                        <?php if(is_user_logged_in()) {  ?>

                          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal" data-backdrop="static" data-keyboard="false">Logout </a>

                        <?php }?>

                      </div> 

                    </div>
                  </div>

                </div>

              </div>

            </div>

            <!-- /end header-top -->

            <!-- header-bottom -->

            <div class="header-bottom-area header-sticky" style="transition: .6s;">

              <div class="container">

                <div class="row">

                  <div class="col-md-6 menu-left">

                    <div class="logo">

                      <a href="<?php echo site_url()?>/ncs-landing-page/"><!--ACT NORTH EAST LOGO-->

                        <?php the_custom_logo() ?></a>

                      </div>

              <!--<div class="lang">

                <select id="lang" class="lang-dropdown">

                  <option>English</option>

                  <option>Hindi</option>

                </select>

              </div>-->

            </div>

            <div class="col-md-6 menu-right">

              <div class="header-bottom-icon f-right">

                <div class="toggle-search-box">

                  <?php //echo get_search_form();?>

                  <form action="<?php echo site_url()?>" method="get" id="searchbox">

                    <input placeholder="Search here" name="s" type="text" value="<?php echo $_GET['s']?>">

                    <button class="button-search"><span class="ti-search"></span></button>

                  </form>



                </div>

              </div>

            </div>

          </div>

          <div id="menuzord" class="menuzord">

            <ul class="menuzord-menu">

              <!--<li><a href="<?php echo site_url()?>/">Home</a></li>-->

              <li><a href="<?php echo site_url()?>/ncs-landing-page/">About</a>

                <!--<ul class="dropdown">

                  <li><a href="#">Mission</a></li>

                  <li><a href="#">Vission</a></li>

                </ul>-->

              </li>

              <li><a href="<?php echo site_url()?>/ncs-job-home/">Jobs at NCS</a></li>


              <li><a href="<?php echo site_url(); ?>/jobportal_dev/Employer/login">Post a Job</a></li>

              <li><a href="<?php echo site_url(); ?>/jobportal_dev/Jobseeker/login">Apply for job</a></li>
              <li><a href="javascript:void(0)">Explore CV database</a></li>
              <li><a href="javascript:void(0)">Resources</a></li>

            </ul>

          </div>




          <!-- Global site tag (gtag.js) - Google Analytics -->

          <script async src="https://www.googletagmanager.com/gtag/js?id=G-4H5HK4J3TV"></script>

          <script>

            window.dataLayer = window.dataLayer || [];

            function gtag(){dataLayer.push(arguments);}

            gtag('js', new Date());



            gtag('config', 'G-4H5HK4J3TV');

          </script>





        </header>

        <!-- header-end -->

        <!-- Button trigger modal -->

        <!-- Modal -->

        <!--------logout popup----------->

        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel" aria-hidden="true">

          <div class="modal-dialog modal-lg" role="document" >

            <div class="modal-content">

              <div class="modal-header">

                <h5 class="modal-title" id="logoutModalLabel">

                  Logout

                </h5>

        <!--<button type="button" class="close" data-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">&times;</span>

        </button>-->

      </div>

      <div class="modal-body">

       <section class="nf-faq-section">

        <div class="row">

          <div class="col-xl-10 offset-xl-1">

            <div class="nf-faq-a-block">

              <div id="accordion">  

                Are you sure you want to logout?

                <div class="nf-btnreg">   

                  <input type="button" name="wp-submit" id="wppb-submit" class="btn-skyblue" value="Ok" onclick="window.location='<?php echo wp_logout_url(site_url())?>'">

                  <input type="button" name="wp-submit" id="wppb-submit" class="btn-navyblue ml-2" value="Cancel" data-dismiss="modal">

                </div>

              </div>

            </div>

          </div>

        </div>

      </section>

    </div>

      <!--<div class="modal-footer">

        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

        <button type="button" class="btn btn-primary">Save changes</button>

      </div>-->

    </div>

  </div>

</div>

<!--------login popup----------->

<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">

  <div class="modal-dialog modal-lg" role="document" >

    <div class="modal-content">

      <div class="modal-header">

        <h5 class="modal-title" id="loginModalLabel">

          Login

        </h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="loginCancelButton">

          <span aria-hidden="true">&times;</span>

        </button>

      </div>

      <div class="modal-body">

       <section class="nf-faq-section">

        <div class="row">

          <div class="col-xl-10 offset-xl-1">

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

    <!--<div class="modal-footer">    </div>-->

  </div>

</div>

</div>

<?php if(!empty($_GET['loginerror']) && add_query_arg( array(), $wp->request )!='log-in'){?>

  <script type="text/javascript">

    jQuery(function(){

      document.getElementById("loginpopid").click();

    });

  </script>

<?php }?>







<?php

//auto open login popup start

$time_variable_set = get_option( 'my_login_popup_field' );

if(!isset($_SESSION['login_popup_time']) && $time_variable_set!='' && !is_user_logged_in())

  $_SESSION['login_popup_time']=strtotime('+'.$time_variable_set.' seconds');



if(is_user_logged_in()) unset($_SESSION['login_popup_time']);



if($time_variable_set!='' && add_query_arg( array(), $wp->request )!='log-in' && add_query_arg( array(), $wp->request )!='register' && add_query_arg( array(), $wp->request )!='lost-password' && !is_user_logged_in())

{

  if($_SESSION['login_popup_time'] < time())

  {

    ?>

    <script type="text/javascript">

      jQuery(function(){

        document.getElementById("loginCancelButton").remove();

        document.getElementById("loginpopid").click();

      });

    </script>

    <?php

  }

  ?>



  <script type="text/javascript">

    function show_login_popup()

    {

      if(!$('#loginModal').hasClass('show'))

      {

        $.ajax({

          data: {'action': 'my_action_show_login_popup'},

          url: "<?php echo site_url()?>/wp-admin/admin-ajax.php",

          type: "post",

          success: function(data) {

           if(data=='open')

           {

            if(!$('#loginModal').hasClass('show'))

            {

              document.getElementById("loginCancelButton").remove();

              document.getElementById("loginpopid").click();

            }

          }

        }

      });

      }

    }

    setInterval(function() { show_login_popup(); }, 3000);

  </script>



  <?php

}

//auto open login popup end  

?>
<!-- header part end -->

<div class="inner-body">
	<div class="container">

		<div class="nf-jobHome-banner">
			<div class="data">
				<h5>Welcome to</h5>
				<h3>Advancing NE Job Portal</h3>
				<p>Your one stop professional Career Hub: <br>Exclusively Serving the youth of <br>North Eastern Region.</p>
				<div class="nf-jobPortal-btn">
					<a href="#" class="btn mb-2">Find Openings</a>
					<a href="#" class="btn mb-2">Find Candidates</a>
				</div>
			</div>
			<div class="jobImg">
				<img src="<?php echo get_template_directory_uri() ?>/assets/img/emp-job/job.png" alt="Job">
			</div>
		</div>


		<div class="row nf-counter-main">
			<div class="col-lg-4 col-sm-6">
				<div class="nf-jobHome-count">
					<div class="d-flex"><p class="counter-count">1000</p><p>+</p></div>
					<span>Jobs Posted</span>
				</div>
			</div>
			<div class="col-lg-4 col-sm-6">
				<div class="nf-jobHome-count">
					<div class="d-flex"><p class="counter-count">100</p><p>+</p></div>
					<span>Daily Jobs</span>
				</div>
			</div>
			<div class="col-lg-4 col-sm-6">
				<div class="nf-jobHome-count">
					<div class="d-flex"><p class="counter-count">110</p><p>+</p></div>
					<span>Recruiters</span>
				</div>
			</div>
			<!-- <div class="col-lg-3 col-sm-6">
				<div class="nf-jobHome-count">
					<div class="d-flex"><p class="counter-count">500</p><p>+</p></div>
					<span>People hired</span>
				</div>
			</div> -->
		</div>


		<div class="nf-about-us">
			<div class="row align-items-center">
				<div class="col-lg-5 col-md-6">
					<img src="<?php echo get_template_directory_uri() ?>/assets/img/emp-job/about-us.png" class="img-fluid" alt="About-us img" title="About-us img">
				</div>
				<div class="col-lg-7 col-md-6">
					<div class="nf-about-info">
						<h2>About Us</h2>
						<p>Advancing North East is a pioneering digital initiative created by the North Eastern Council (NEC) and North Eastern Development Finance Corporation Ltd. (NEDFi). Our mission is to empower the youth of North East India by providing comprehensive support in education, employment, and entrepreneurship. Through innovative programs and strategic collaborations, we aim to foster innovation and livelihood opportunities in the region.</p>
						<p>Join us on this journey to unleash the full potential of North East youth.</p>
					</div>
				</div>
			</div>
		</div>

	</div>

	

	<div class="container">
		<div class="nf-tab-structure">
			<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
				<li class="nav-item">
					<a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Explore with NCS Portal</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Apply for a Job</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Post a Job Vacancy</a>
				</li>
			</ul>
			<div class="tab-content" id="pills-tabContent">

				<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
					<div class="nf-ncs-portal">
						<div class="nf-tab-img">
							<img src="<?php echo get_template_directory_uri() ?>/assets/img/emp-job/tab-1.png" class="img-fluid">
						</div>
						<div class="nf-tab-info">
							<ul>
								<li>1. Browse available jobs</li>
								<li>2. Apply filter options available</li>
								<li>3. Select your desired job</li>
								<li>4. Apply jobs directly through the NCS portal</li>
							</ul>
							<button class="btn" onclick="if (!window.__cfRLUnblockHandlers) return false; location.href = '<?php echo site_url()?>/ncs-job-home/';">Click Here</button>
						</div>
					</div>
				</div>


				<div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
					<div class="nf-ncs-portal">
						<div class="nf-tab-img">
							<img src="<?php echo get_template_directory_uri() ?>/assets/img/emp-job/tab-1.png" class="img-fluid">
						</div>
						<div class="nf-tab-info">
							<ul>
								<li>1. Browse available jobs</li>
								<li>2. Browse job listings and click on 'Apply'</li>
								<li>3. Fill the form. Upload photograph & signature</li>
								<li>4. Upload CV and Submit</li>
							</ul>
							<button class="btn">Click Here</button>
						</div>
					</div>
				</div>


				<div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
					<div class="nf-ncs-portal">
						<div class="nf-tab-img">
							<img src="<?php echo get_template_directory_uri() ?>/assets/img/emp-job/tab-1.png" class="img-fluid">
						</div>
						<div class="nf-tab-info">
							<ul>
								<li>1. Create employer profile</li>
								<li>2. Fill form with job details and Eligibility</li>
								<li>3. Submit and your job is posted !</li>
								<li>4. View and connect to the applicants</li>
							</ul>
							<button class="btn">Click Here</button>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

	<div class="nf-services-main">
		<div class="container">
			<div class="nf-services-bx">
				<div class="row">
					<div class="col-lg-4 col-md-6">
						<div class="nf-services">
							<h3>Internships</h3>
							<p>Discover tailored internship opportunities to gain hands-on experience and kickstart your career.</p>
							<a href="#">Explore</a>
						</div>
					</div>
					<div class="col-lg-4 col-md-6">
						<div class="nf-services">
							<h3>Freelance jobs</h3>
							<p>Whether you're a writer, designer, developer or marketer, find projects that match your expertise and schedule</p>
							<a href="#">Explore</a>
						</div>
					</div>
					<div class="col-lg-4 col-md-12">
						<div class="nf-services">
							<h3>Events</h3>
							<p>Stay updated on upcoming career events, workshops, seminars, & networking opportunities in the NER.</p>
							<a href="#">Explore</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	<div class="container">
		<div class="partners-slider mt-4">
			<div>
				<img class="image_img" src="<?php echo get_template_directory_uri() ?>/assets/img/emp-job/tcs-logo.png" alt="compant logo" title="compant logo">
			</div>
			<div>
				<img class="image_img" src="<?php echo get_template_directory_uri() ?>/assets/img/emp-job/amazon-logo.png" alt="compant logo" title="compant logo">
			</div>
			<div>
				<img class="image_img" src="<?php echo get_template_directory_uri() ?>/assets/img/emp-job/tcs-logo.png" alt="compant logo" title="compant logo">
			</div>
			<div>
				<img class="image_img" src="<?php echo get_template_directory_uri() ?>/assets/img/emp-job/amazon-logo.png" alt="compant logo" title="compant logo">
			</div>
			<div>
				<img class="image_img" src="<?php echo get_template_directory_uri() ?>/assets/img/emp-job/tcs-logo.png" alt="compant logo" title="compant logo">
			</div>
			<div>
				<img class="image_img" src="<?php echo get_template_directory_uri() ?>/assets/img/emp-job/tcs-logo.png" alt="compant logo" title="compant logo">
			</div>
			<div>
				<img class="image_img" src="<?php echo get_template_directory_uri() ?>/assets/img/emp-job/amazon-logo.png" alt="compant logo" title="compant logo">
			</div>
			<div>
				<img class="image_img" src="<?php echo get_template_directory_uri() ?>/assets/img/emp-job/tcs-logo.png" alt="compant logo" title="compant logo">
			</div>
			<div>
				<img class="image_img" src="<?php echo get_template_directory_uri() ?>/assets/img/emp-job/amazon-logo.png" alt="compant logo" title="compant logo">
			</div>
			<div>
				<img class="image_img" src="<?php echo get_template_directory_uri() ?>/assets/img/emp-job/tcs-logo.png" alt="compant logo" title="compant logo">
			</div>
		</div>
	</div>

</div>


<?php //get_footer(); ?>

<!-- footer start -->
<footer id="Contact">
  <div class="footer-area primary-bg pt-70">
    <div class="container">
      <div class="footer-mid mb-0">
        <div class="row">
          <div class="col-lg-2 col-md-6">
            <div class="logo">
              <img src="<?php echo get_template_directory_uri() ?>/assets/img/emp-job/advancing-logo.png" class="img-fluid">
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <h5>Contact us</h5>
            <div class="footer-menu">
              <p class="mb-0">
                <a href="#" class="__cf_email__" data-cfemail="b4dddad2dbf4d5d0c2d5dad7dddad3dadbc6c0dcd1d5c7c09addda">info@advancingnortheast.in</a>
              </p>
              <p><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="85e2f0ece1e0e8e0c5e4e1f3e4ebe6ecebe2ebeaf7f1ede0e4f6f1abeceb">guideme@advancingnortheast.in</a></p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <h5>Quick Links</h5>
            <div class="row">
              <div class="col-lg-6 col-md-5">
                <div class="footer-widget">
                  <div class="footer-menu clearfix">
                    <ul>
                      <li><a href="#">Advancing NE Portal</a></li>
                      <li><a href="#">NCS Portal</a></li>
                      <li><a href="#">MOONER</a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-12 col-lg-6 col-md-7">
                <div class="footer-widget">
                  <div class="footer-menu clearfix">
                    <ul>
                      <li><a href="#">NEC</a></li>
                      <li><a href="#">NEDFI </a></li>
                      <li><a href="#">Feedback </a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-2 col-md-6">
            <div class="row">
              <div class="col-12 col-lg-12">
                <div class="footer-widget mb-30">
                  <div class="footer-menu clearfix">
                    <a href="https://www.advancingnortheast.in/get-your-cv-reviewed/" target="_blank"><button class="btn nf-cv-btn mb-3">Get Your CV Reviewed</button></a>
                    <div class="nf-social-icons">
                      <ul>
                        <li>
                          <a href="#">
                            <img src="<?php echo get_template_directory_uri() ?>/assets/img/home/s-icon-1.png" alt="facebook">
                          </a>
                        </li>
                        <li>
                          <a href="#">
                            <img src="<?php echo get_template_directory_uri() ?>/assets/img/home/s-icon-2.png" alt="twitter">
                          </a>
                        </li>
                        <li>
                          <a href="#">
                            <img src="<?php echo get_template_directory_uri() ?>/assets/img/home/s-icon-3.png" alt="instagram">
                          </a>
                        </li>
                        <li>
                          <a href="#">
                            <img src="<?php echo get_template_directory_uri() ?>/assets/img/home/s-icon-4.png" alt="youtube">
                          </a>
                        </li>

                      </ul>
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
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <p class="nf-all-right mb-0">All copyrights @ jobs.advancingne.in | 2024</p>
      </div>
    </div>
  </div>
</footer>

<!-- footer end -->


<!-- JS here -->
   <!--  <script src="js/vendor/modernizr-3.5.0.min.js"></script>
    <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/isotope.pkgd.min.js"></script>
    <script src="js/one-page-nav-min.js"></script>
    <script src="js/slick.min.js"></script>
    <script src="js/ajax-form.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/jquery.meanmenu.min.js"></script>
    <script src="js/menuzord.js"></script>
    <script src="js/jquery.barfiller.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/imagesloaded.pkgd.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/jquery.mCustomScrollbar.js"></script>
    <script src="js/main.js"></script> 
    <script src="js/video_link.js"></script>-->
    <script>$=jQuery.noConflict(true);</script>
    <?php wp_footer() ?>
    <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>

    <!--<script type="text/javascript">
        jQuery(document).ready(function(){
          jQuery("#menuzord").menuzord({
            align: "center",
            effect: "fade",
            animation: "none"
          });
        });
      </script>-->

      

      <div id="chat_tracking" style="display:block"></div>
      <script language="JavaScript" type="text/javascript"> var chat_config;  var script = document.createElement("script"); script.type="text/javascript";var src = "https://chatbot.esdsconnect.com/tracker_v1.php?accId=6&projId=8&nse="+Math.random(); setTimeout("script.src=src;document.getElementById('chat_tracking').appendChild(script)",5000); </script>

    </body>

    <style type="text/css">
      .chatbox-open {
        display: none !important;
      }
/*manage  subscription page setting sendpress*/
.sendpress-content{
  padding-bottom: 20px;
}
</style>
<script type="text/javascript">
  /*manage  subscription page setting sendpress*/
  jQuery(document).ready(function(){
    jQuery(".sendpress").addClass('container');
  }); 

//removed form resubmission message
  if ( window.history.replaceState ) {
    window.history.replaceState( null, null, window.location.href );
  }       
</script>


</html>

<!--slick slider partner script-->
<script>
  $('.partners-slider').slick({
      dots: false,
      infinite: true,
      speed: 300,
      slidesToShow: 7,
      slidesToScroll: 4,
      prevArrow: false,
    nextArrow: false,
    autoplay: true,
      responsive: [
          {
              breakpoint: 1024,
              settings: {
                  slidesToShow: 3,
                  slidesToScroll: 3,
                  infinite: true,
                  dots: true
              }
          },
          {
              breakpoint: 600,
              settings: {
                  slidesToShow: 2,
                  slidesToScroll: 2
              }
          },
          {
              breakpoint: 480,
              settings: {
                  slidesToShow: 1,
                  slidesToScroll: 1
              }
          }
          // You can unslick at a given breakpoint now by adding:
          // settings: "unslick"
          // instead of a settings object
      ]
  });
  </script>
  <!--slick slider partner script-->