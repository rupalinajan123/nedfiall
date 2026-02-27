
<?php
get_header(); 
unset($_SESSION['cramb_session']);
?>
<!--<style type="text/css">
     .leftcurtain { width: 50%; height: 120%; top: 0px; left: 0; position: absolute; z-index: 2; }
    .rightcurtain { width: 50%; height: 120%; right: 0; top: 0px; position: absolute; z-index: 3; }
    .rightcurtain img, .leftcurtain img { width: 100%; height: 100%; /*object-fit: cover;*/ object-fit: cover;
object-position: top; }
    .rope { position: absolute; top: 0; left: 0;  height: 100%; width: 100%; cursor: pointer; z-index: -4;}
    #myVideo { position: fixed; right: 0; bottom: 0; min-width: 100%; min-height: 100%; width: 100%; height: 100%; }
    .launchpage-height{ height: 100vh; overflow: hidden; }
    .launchpage-height .rope  {
      z-index: 4;
    }
    @media (min-width:1600px) {
        .rightcurtain img, .leftcurtain img { object-fit: cover; object-position: top; }

    }
</style>
<div class="rope">
    <div class="leftcurtain"><img src="launch/images/left-side.jpg?v=1.1" /></div>
    <div class="rightcurtain"><img src="launch/images/right-side.jpg?v=1.1" /></div>
  </div>-->
  <style>
 .your-slider-class a div{
    opacity: 0;
    visibility: hidden;
   
}

.your-slider-class.slick-initialized a div{
    visibility: visible;
    opacity: 1;    
     transition: opacity 1s ease;
    -webkit-transition: opacity 1s ease;
}




/*Testimonial*/

.video-popup {
  display: none;
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(0, 0, 0, 0.8);
  justify-content: center;
  align-items: center;
}

.video-popup.show-video {
  display: flex;
}

.video-popup-content {
  position: relative;
  width: 80%;
  max-width: 800px;
  background: #fff;
  padding: 20px;
}

.close-video {
  position: absolute;
  top: 10px;
  right: 10px;
  background: #f00;
  color: #fff;
  border: none;
  padding: 10px;
  cursor: pointer;
}

  </style>
  <section class="nf-middle-home-section">
    <div class="container">
      <div class="row nf-top-links">

        <?php
        $arg = array(
         'post_type'         => 'home_top_link',
         'orderby'             => 'post_id',
         'order'             => 'ASC',
         'post_status' => 'publish',
         'posts_per_page' => -1
       );
        $slider = new WP_Query($arg);
        $j = 0;
        $post_count = wp_count_posts('slider')->publish;
        while($slider->have_posts()) : $slider->the_post();

          $values_slider= get_fields();?>
          
          <a class="col-12 col-lg-3 col-md-6" href="<?php echo $values_slider['link'];?>" target="_blank">
            <span> <?php echo $post->post_title;?>  </span>
          </a>
          <?php endWhile; wp_reset_query(); ?>
          
          

        <!--<a class="col-12 col-lg-3 col-md-6" href="https://events.advancingnortheast.in/" target="_blank">
          <span>e-Coffee Table Book </span>
        </a>
        
        <a class="col-12 col-lg-3 col-md-6" href="https://events.advancingnortheast.in/floriculture_masterclass" target="_blank" >
          <span> Commercial Floriculture Course </span>
        </a>
        <a class="col-12 col-lg-3 col-md-6" href="https://www.nedfiventure.com/" target="_blank">
          <span> North East Venture Fund (NEVF)   </span>
        </a>
        
        <a class="col-12 col-lg-3 col-md-6" href="https://www.nedfi.com/" target="_blank">
          <span> Apply NEDFi Loan </span>
        </a>-->
        
      </div>
      
     <!-- <div class="nedfi_event">
        <a href="#" class="close-sign"><i class="fa fa-close"></i></a>
        <a href="https://events.advancingnortheast.in/" target="_blank">
        <img src="<?//php echo get_template_directory_uri(). '/assets/'?>img/home/event-flashing.gif" alt="Event"></a>
      </div> -->

      <div class="row nf-top-slider nf-top-slider-2">
        <div class="col-12 col-lg-9">
          <div class="nf-banner-slider slider your-slider-class">
            <?php
            $arg = array(
             'post_type'         => 'slider',
             'orderby'             => 'post_title',
             'order'             => 'ASC',
             'post_status' => 'publish',
             'posts_per_page' => -1
           );
            $slider = new WP_Query($arg);
            $j = 0;
            $post_count = wp_count_posts('slider')->publish;
            while($slider->have_posts()) : $slider->the_post();
         //echo $j; 
             $values_slider= get_fields();
             ?>
            <?php /*?><a <?php if($j==0){?>href="https://events.advancingnortheast.in/" target="_blank"  <?php }
                else if($j==1){?>href="<?php echo get_template_directory_uri()?>/assets/Career_Hand_Book_2022.pdf" target="_blank" download <?php }
                else if($j==3){?>href="<?php echo site_url()?>/wp-content/uploads/2022/07/Entrepreneurs-Desk-July-2022-5_compressed.pdf" target="_blank" <?php }
                else{?>href="javascript:void(0)" <?php } ?> ><?php */?>
                  <a <?php if($values_slider['slider_url']!=''){?>href="<?php echo $values_slider['slider_url'];?>" target="_blank" <?php }else{?>href="javascript:void(0)"<?php }?> >    
                    <div>
                      <?php
                      $thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $slider->ID ), "original" );
                      if($thumbnail!=''){
                        ?>
                        <img src="<?php echo $thumbnail[0];?>" alt="Banner.jpg">

                        <?php //the_title() ?>
              <?php //echo $post->post_title;
              ?>
              <!--<a href="#">Advance your <span>Career</span> with <br><span>Advancing North East</span> </a>-->

            <?php }?>
          </div></a>
          <?php $j++; endWhile; wp_reset_query(); ?>

        </div>
      </div>

      <?php 

      global $wpdb;
      // Custom SQL query to fetch data from custom table
      $query.= " SELECT * FROM `wp_ncs_api_response` WHERE `is_deleted`=0 AND `manual_flag`=0 ORDER BY `last_updated` DESC LIMIT 5; ";
      $getLimitedApiData = $wpdb->get_results($query);
      
      ?>

      <div class="col-12 col-lg-3">
        <div class="nf-latestJob">
          <h3>Latest Job Vacancies</h3>
          <marquee scrollamount="2" onmouseover="stop()" onmouseout="start()" direction="up">
            <ul class="jobscroll">
              
              <?php foreach ($getLimitedApiData as $val) { ?>
                <li><a href="<?php echo site_url()?>/ncs-job-details/<?php echo $val->id; ?>" target="_blank"><?php echo $val->JobTitle; ?></a></li>
              <?php } ?>
            </ul>
          </marquee>
        </div>
      </div>
    </div>

    <div class="nf-middle_block">
      <h2 class="nf-solution-title" ><span class="skyblue">One Stop Solution</span> for <span class="blue">Informed Decision</span> about <span class="org">Career and Livelihood</span> </h2>
    </div>

    <div class="nf-jobPortal">
      <div class="row">
        <div class="col-lg-8 d-flex align-items-center">
          <div class="nf-data">
            <a href="<?php echo site_url()?>/ncs-landing-page/" target="_blank"><h4>Advancing NE Job Portal</h4></a>
            <p>Welcome to the Advancing NE Job Portal, your gateway to career growth in the Northeast. Explore, connect, and thrive with our curated job listings and resources.</p>
            <div class="nf-jobPortal-btn">
              <a href="<?php echo site_url()?>/ncs-job-home/" target="_blank" class="btn">Vacancies at NCS Portal</a>
              <a href="#" class="btn">Post a Vacancy</a>
              <a href="#" class="btn">Apply for a Job</a>
            </div>
            <ul class="jobPoratl-count">
              <li><span>1000+</span> Jobs Posted</li>
              <li><span>100+</span> Daily Jobs</li>
              <li><span>110+</span> Recruiters</li>
              <!-- <li><span>500+</span> People hired</li> -->
            </ul>
          </div>
        </div>
        <div class="col-lg-4 d-flex justify-content-around">
          <img src="wp-content/themes/IRADEY/assets/img/home/nf-jobportal.png" alt="jobportal">
        </div>
      </div>  
    </div>

      <!--<div class="nf-middle_block">
            <h2 class="nf-solution-title" data-aos="fade-up"><span class="skyblue">One Stop Solution</span> for <span class="blue">Informed Decision</span> about <span class="org">Career and Livelihood</span> </h2>
        </div>
        <div class="nf-exam_section nf-examNewshort">
          <div class="container">
            <div class="row">
              
              <div class="col-lg-4 nfTitle1">
                <h6 data-aos="fade-up">Education</h6>
                <div class="slider nf-exam-slider">
                  <div>
            
                    <div class="img-frame">
                      <img src="wp-content/themes/IRADEY/assets/img/home/s-1.png" alt="image">
                      <span class="nf-top-label nf-c-3">300+ Careers</span>
                    </div>
                    <div class="data-frame">
                        <p><a href="career_type/engineering/">Engineering</a></p>
                      <p><a href="career_type/law/">Law</a></p>
                      <p><a href="career_type/design/">Design</a></p>
                      <p><a href="career_type/defence-services/">Defence Services</a></p>
                      <a href="exam_type/law/" class="view-more">View More</a>
                    </div>
                  </div>
        
                  <div>
                    <div class="img-frame">
                      <img src="wp-content/themes/IRADEY/assets/img/home/s-2.png" alt="image">
                      <span class="nf-top-label nf-c-2">200+ Entrance Exams</span>
                    </div>
                    <div class="data-frame">
                      <p><a href="exam_type/media-and-mass-communication/">Mass Communication</a></p>
                      <p><a href="exam_type/architecture-and-planning/">Architecture</a></p>
                      <p><a href="exam_type/engineering-and-technology/">Engineering</a></p>
                      <p><a href="exam_type/science-and-math/">Science</a></p>
                      
                    <a href="exam_type/media-and-mass-communication/" class="view-more">View More</a>
                    </div>
                  </div>
        
                   <div>
                    <div class="img-frame">
                      <img src="wp-content/themes/IRADEY/assets/img/home/s-3.png" alt="image">
                      <span class="nf-top-label nf-c-3">3000+ Courses in NER</span>
                    </div>
                    <div class="data-frame">
                      <p><a href="study-in-north-east-list/?North-Eastern-Regional-Institute-Of-Science-And-Technology">NERIST</a></p>
                      <p><a href="study-in-north-east-list/?Assam-Engineering-College">AEC </a></p>
                      <p><a href="study-in-north-east-list/?National-Institute-of-Technology">NIT</a></p>
                      <p><a href="study-in-north-east-list/?Regional-Institute-of-Science-and-Technology">RIST</a></p>
                      <a href="study-in-north-east-list/" class="view-more">View More</a>
                    </div>
                  </div>
        
                   <div>
                    <div class="img-frame">
                      <img src="wp-content/themes/IRADEY/assets/img/home/s-2.png" alt="image">
                      <span class="nf-top-label nf-c-2">800+ Top National Institutes</span>
                    </div>
                    <div class="data-frame">
                      <p><a href="higher-education-india-list/?Medical-and-Allied-Sciences">Medical </a></p>
                      <p><a href="higher-education-india-list/?Architecture-and-Planning">Architecture</a></p>
                      <p><a href="higher-education-india-list/?Art-and-Design">Art</a></p>
                      <p><a href="higher-education-india-list/?Hospitality-and-Tourism">Hospitality</a></p>
                      <p><a href="higher-education-india-list/?Education-and-Teaching">Teaching</a></p>
                      <a href="higher-education-india-list" class="view-more">View More</a>
                    </div>
                  </div>
                  <div>
                    <div class="img-frame">
                      <img src="wp-content/themes/IRADEY/assets/img/home/s-3.png" alt="image">
                      <span class="nf-top-label nf-c-3">3000+ Courses Abroad</span>
                    </div>
                    <div class="data-frame">
                      <p><a href="study-in-abroad-list/?University-of-Cambridge">Cambridge University</a></p>
                      <p><a href="study-in-abroad-list/?University-of-Birmingham">Birmingham University</a></p>
                      <p><a href="study-in-abroad-list/?WHU:Otto-Beisheim-School-of-Management">WHU, Germany</a></p>
                      <p><a href="study-in-abroad-list/?University-of-Berlin">Berlin University</a></p>
                      <a href="study-in-abroad-list/" class="view-more">View More</a>
                    </div>
                  </div>
                  <div>
                    <div class="img-frame">
                      <img src="wp-content/themes/IRADEY/assets/img/home/s-2.png" alt="image">
                      <span class="nf-top-label nf-c-2">800+ Scholarships</span>
                    </div>
                    <div class="data-frame">
                      <p><a href="scholarships-list/?SAMBHAVAM:Sood-Charity-Foundation:IAS-Scholarships">SAMBHAVAM</a></p>
                      <p><a href="scholarships-list/?Sydney-Scholars-India-Scholarship">Sydney Scholars India</a></p>
                      <p><a href="scholarships-list/?Leading-Asia-Scholarship">Leading Asia</a></p>
                      <p><a href="scholarships-list/?1000-Dreams-Scholarship-Fund">1000 Dreams Fund</a></p>
                      <a href="scholarships-list/" class="view-more">View More</a>
                    </div>
                  </div>
                  <div>
                    <div class="img-frame">
                      <img src="wp-content/themes/IRADEY/assets/img/home/s-2.png" alt="image">
                      <span class="nf-top-label nf-c-3">200+ Fellowships</span>
                    </div>
                    <div class="data-frame">
                      <p><a href="fellowship-list/?Shakti-Fellowship">Shakti</a></p>
                      <p><a href="fellowship-list/?We-Program,-IIM-Calcutta">We Program</a></p>
                      <p><a href="fellowship-list/?AAUW-International-Fellowship,-American-Association-of-University-Women">AAUW International</a></p>
                      <p><a href="fellowship-list/?Sequoia-Spark-Fellowship">Sequoia Spark</a></p>
                      <a href="fellowship-list/" class="view-more">View More</a>
                    </div>
                  </div>
                  <div>
                    <div class="img-frame">
                      <img src="wp-content/themes/IRADEY/assets/img/home/s-2.png" alt="image">
                      <span class="nf-top-label nf-c-2">250+ E-Learning</span>
                    </div>
                    <div class="data-frame">
                      <p><a href="e-learning-details/?Animal-Husbandry:Cattle-farming">Cattle farming</a></p>
                      <p><a href="e-learning-details/?Architecture-and-Planning:Success-story-of-eminent-Architect-Premnath">Architect  Premnath</a></p>
                      <p><a href="e-learning-details/?Ayurveda:Herbal-Veterinary-Medicine">Herbal Veterinary Medicine</a></p>
                      <p><a href="e-learning-details/?Allied-and-Medical-Sciences:Career-Option-in-Allied-Healthcare-Profession">Allied Healthcare Profession</a></p>
                      <a href="e-learning-details/" class="view-more">View More</a>
                    </div>
                  </div>
                </div>
              </div>
              
              <div class="col-lg-4 nfTitle2">
                <h6 data-aos="fade-up">Employment</h6>
                <div class="slider nf-exam-slider">
                <div>
                    <div class="img-frame">
                      <img src="wp-content/themes/IRADEY/assets/img/home/s-2.png" alt="image">
                      <span class="nf-top-label nf-c-2">Internship in 15 sectors</span>
                    </div>
                    <div class="data-frame">
                      <p><a href="find-an-intern-details/?Education">Education</a></p>
                      <p><a href="find-an-intern-details/?Engineering">Engineering</a></p>
                      <p><a href="find-an-intern-details/?Finance">Finance</a></p>
                      <p><a href="find-an-intern-details/?Law">Law</a></p>
                      
                    <a href="find-an-intern-details/" class="view-more">View More</a>
                    </div>
                  </div>
                  <div>
                    <div class="img-frame">
                      <img src="wp-content/themes/IRADEY/assets/img/home/s-1.png" alt="image">
                      <span class="nf-top-label nf-c-3">300+ Entrance Exams for Government Jobs</span>
                    </div>
                    <div class="data-frame">
                      <p><a href="employment-entrance-exam-details/?Defence:-National-Defence-Academy-and-Naval-Academy-Examination-(I)">Defense- National Defense Academy and Naval Academy Exam</a></p>
                      <p><a href="employment-entrance-exam-details/?Banking-and-Finance:IBPS-RRB-Exam">Banking and Finance - IBPS RRB Exam</a></p>
                      <p><a href="employment-entrance-exam-details/?Engineering:-SSC-JE-Exam">Engineering - SSC JE Exam</a></p>
                      <p><a href="employment-entrance-exam-details/?Sciences:National-Eligibility-Test">Sciences - National Eligibility Test</a></p>
                      <a href="engineering/" class="view-more">View More</a>
                    </div>
                  </div>
        
                   <div>
                    <div class="img-frame">
                      <img src="wp-content/themes/IRADEY/assets/img/home/s-3.png" alt="image">
                      <span class="nf-top-label nf-c-3">20+ Employable Skills</span>
                    </div>
                    <div class="data-frame">
                      <p><a href="employable-skills/#/">Acing an Interview</a></p>
                      <p><a href="employable-skills/#/">Data Analysis</a></p>
                      <p><a href="employable-skills/#/">Programming</a></p>
                      <p><a href="employable-skills/#/">Internet Basics</a></p>
                      <a href="employable-skills" class="view-more">View More</a>
                    </div>
                  </div>
        
                   <div>
                    <div class="img-frame">
                      <img src="wp-content/themes/IRADEY/assets/img/home/s-2.png" alt="image">
                      <span class="nf-top-label nf-c-2">200+ Upskilling Courses</span>
                    </div>
                    <div class="data-frame">
                      <p><a href="upskill-details//?Artificial-Intelligence">Artificial Intelligence</a></p>
                      <p><a href="upskill-details/?Block-Chain-Technology">BlockChain Technology</a></p>
                      <p><a href="upskill-details/?Business-Analytics">Business Analytics</a></p>
                      <p><a href="upskill-details/?Robotics">Robotics</a></p>
                      <a href="upskill-details/" class="view-more">View More</a>
                    </div>
                  </div>
                  <div>
                    <div class="img-frame">
                      <img src="wp-content/themes/IRADEY/assets/img/home/s-3.png" alt="image">
                      <span class="nf-top-label nf-c-3">Job Vacancies in 17 sectors</span>
                    </div>
                    <div class="data-frame">
                      <p><a href="job-alert-details/?Banking">Banking</a></p>
                      <p><a href="job-alert-details/?Defence-&-Police">Defense and Police</a></p>
                      <p><a href="job-alert-details/?Engineering,-Science-&-Technology">Engineering, Science and Technology</a></p>
                      <p><a href="job-alert-details/?Information-Technology-(IT)">Information Technology</a></p> 
                      <a href="job-alert/" class="view-more">View More</a>
                    </div>
                  </div>
                  <div>
                    <div class="img-frame">
                      <img src="wp-content/themes/IRADEY/assets/img/home/s-2.png" alt="image">
                      <span class="nf-top-label nf-c-2">Job Opportunities in 30 Sectors</span>
                    </div>
                    <div class="data-frame">
                      <p><a href="job-opportunity-details/?Design">Design</a></p>
                      <p><a href="job-opportunity-details/?Engineering,-Science-&-Technology">Engineering, Science & Technology</a></p>
                      <p><a href="job-opportunity-details/?Public-Relations">Public Relations</a></p>
                      <p><a href="job-opportunity-details/?Sports">Sports</a></p>
                      <a href="job-opportunity/" class="view-more">View More</a>
                    </div>
                  </div>
                  <div>
                    <div class="img-frame">
                      <img src="wp-content/themes/IRADEY/assets/img/home/s-2.png" alt="image">
                      <span class="nf-top-label nf-c-3">10+ Countries to Work Abroad</span>
                    </div>
                    <div class="data-frame">
                      <p><a href="work-abroad/australia">Work in Australia</a></p>
                      <p><a href="work_abroad/european-countries/">Work in the European Countries</a></p>
                      <p><a href="work_abroad/japan/">Work in Japan</a></p>
                      <p><a href="work_abroad/usa/">Work in USA</a></p>
                      <a href="work-abroad/" class="view-more">View More</a>
                    </div>
                  </div>
                  <div>
                    <div class="img-frame">
                      <img src="wp-content/themes/IRADEY/assets/img/home/s-2.png" alt="image">
                      <span class="nf-top-label nf-c-2">750+ Vocational Training Institutes</span>
                    </div>
                    <div class="data-frame">
                      <p><a href="learn-and-earn-details/?Capital-goods-and-Manufacturing">Capital Goods and Manufacturing</a></p>
                      <p><a href="learn-and-earn-details/?Hospitality-and-Hotel-Management">Hospitality and Hotel Management</a></p>
                      <p><a href="learn-and-earn-details/?IT-ITeS-and-Computer-Science">IT, ITeS and Computer Science</a></p>
                      <p><a href="learn-and-earn-details/?Travel-and-Tourism">Travel and Tourism</a></p>
                      <a href="learn-and-earn-details/?Agriculture" class="view-more">View More</a>
                    </div>
                  </div>
                  <div>
                    <div class="img-frame">
                      <img src="wp-content/themes/IRADEY/assets/img/home/s-2.png" alt="image">
                      <span class="nf-top-label nf-c-3">100+ Career Coaches</span>
                    </div>
                    <div class="data-frame">
                      <p><a href="career-coach-search/?Cinematography/">Cinematography</a></p>
                      <p><a href="career-coach-search/?Competitive-Exams">Competitive Exams</a></p>
                      <p><a href="career-coach-search/?Performing-Arts">Performing Arts</a></p>
                      <p><a href="career-coach-search/?Yoga-and-Sports">Yoga and Sports</a></p>
                      <a href="career-coach-search/?Performing-Arts" class="view-more">View More</a>
                    </div>
                  </div>
                </div>
              </div>
              
              <div class="col-lg-4 nfTitle3">
                <h6 data-aos="fade-up">Entrepreneurship</h6>
                <div class="slider nf-exam-slider">
                  <div>
                    <div class="img-frame">
                      <img src="wp-content/themes/IRADEY/assets/img/home/s-1.png" alt="image">
                      <span class="nf-top-label nf-c-4">1000+ Business Ideas</span>
                    </div>
                    <div class="data-frame">
                      <p><a href="horticulture-details/?Kiwi">Kiwi Farming in Arunachal Pradesh</a></p>
                      <p><a href="conventional-sector-details/?Electric-Vehicle-Charging-Station">EV Charging Station</a></p>
                      <p><a href="services/one-star-hotel/">Holiday Resort</a></p>
                      <p><a href="service_trading/confectionery-store/">Confectionery Store</a></p>
                      <a href="fruits/" class="view-more">View More</a>
                    </div>
                  </div>
        
                  <div>
                    <div class="img-frame">
                      <img src="wp-content/themes/IRADEY/assets/img/home/s-2.png" alt="image">
                      <span class="nf-top-label nf-c-2">Approvals 300+ Enterprises</span>
                    </div>
                    <div class="data-frame">
                      <p><a href="know-your-approvals-list/?Oxygen-&-Nitrogen-Gas-Plant">Oxygen & Nitrogen Gas Plant</a></p>
                      <p><a href="know-your-approvals-list/?Homestay-in-Tripura">Homestay in Tripura</a></p>
                      <p><a href="know-your-approvals-list/?Spices-&-Seasoning">Spices & Seasoning </a></p>
                      <p><a href="know-your-approvals-list/?Solar-Power-Plant-in-Sikkim">Solar Power Plant in Sikkim</a></p>
                      <a href="know-your-approvals/" class="view-more">View More</a>
                    </div>
                  </div>
        
                   <div>
                    <div class="img-frame">
                      <img src="wp-content/themes/IRADEY/assets/img/home/s-3.png" alt="image">
                      <span class="nf-top-label nf-c-3">300+ Schemes & Policies</span>
                    </div>
                    <div class="data-frame">
                      <p><a href="schemes-policies-details/?Commerce-and-Industries">Commerce and Industries</a></p>
                      <p><a href="schemes-policies-details/?Agriculture-and-Horticulture">Agri & Horticulture </a></p>
                      <p><a href="schemes-policies-details/?Animal-Husbandry-and-Veterinary-Sciences">Animal Husbandry </a></p>
                      <p><a href="schemes-policies-details/?Skill-Development-and-Entrepreneurship">Skill Development </a></p>
                      <a href="schemes-policies/" class="view-more">View More</a>
                    </div>
                  </div>
        
                   <div>
                    <div class="img-frame">
                      <img src="wp-content/themes/IRADEY/assets/img/home/s-2.png" alt="image">
                      <span class="nf-top-label nf-c-2">250+ Market & Infrastructure Agencies</span>
                    </div>
                    <div class="data-frame">
                      <p><a href="market-support-infrastructure-details/?Cold-Chain-Storage">Cold Chain Storage</a></p>
                      <p><a href="market-support-infrastructure-details/?Export-Promotion-Park">Export Promotion Park</a></p>
                      <p><a href="market-support-infrastructure-details/?Food-Park">Food Park</a></p>
                      <p><a href="market-support-details/?Apiculture">Market Support for Apiculture</a></p>
                      <a href="market-support-infrastructure/" class="view-more">View More</a>
                    </div>
                  </div>
                  <div>
                    <div class="img-frame">
                      <img src="wp-content/themes/IRADEY/assets/img/home/s-3.png" alt="image">
                      <span class="nf-top-label nf-c-3">50+ Loans</span>
                    </div>
                    <div class="data-frame">
                      <p><a href="credit-linkage-support-details/?Loans-for-ST-Rural-Women">Loans for ST Rural Women</a></p>
                      <p><a href="credit-linkage-support-details/?Loans-upto-5-lakhs">Loans upto 5 lakhs</a></p>
                      <p><a href="credit-linkage-support-details/?NEDFi-MSME-Loans">NEDFi MSME Loans</a></p>
                      <p><a href="credit-linkage-support-details/?Loans-upto-10-Cr">Loans upto 10 Cr</a></p>
                      <a href="credit-linkage-support-search/" class="view-more">View More</a>
                    </div>
                  </div>
                  <div>
                    <div class="img-frame">
                      <img src="wp-content/themes/IRADEY/assets/img/home/s-2.png" alt="image">
                      <span class="nf-top-label nf-c-2">100+ Success Stories</span>
                    </div>
                    <div class="data-frame">
                      <p><a target="_blank" href="https://www.youtube.com/embed/Es-vwmZ-bxc">Daniel Syiem, Fashion Designer </a></p>
                      <p><a target="_blank"  href="https://www.youtube.com/embed/nd4geYDhEAI">Dragon Fruit Farming </a></p>
                      <p><a target="_blank"  href="https://www.youtube.com/embed/lIrNfVvbBfU">Nagaland Coffee</a></p>
                      <p><a target="_blank"  href="https://www.youtube.com/embed/ysZA0ho8c8M">App based Laundry Service </a></p>
                      <a href="success-stories-details/" class="view-more">View More</a>
                    </div>
                  </div>
                  <div>
                    <div class="img-frame">
                      <img src="wp-content/themes/IRADEY/assets/img/home/s-2.png" alt="image">
                      <span class="nf-top-label nf-c-3">200+ Training Institutes</span>
                    </div>
                    <div class="data-frame">
                      <p><a href="training-details/?Orchid">Orchid </a></p>
                      <p><a href="training-details/?Rural-Self-Employment-Training-Institute">RSETI</a></p>
                      <p><a href="training-details/?Rubber">Rubber</a></p>
                      <p><a href="training-details/?Sericulture">Sericulture </a></p>
                      <a href="training_page/" class="view-more">View More</a>
                    </div>
                  </div>
                  <div>
                    <div class="img-frame">
                      <img src="wp-content/themes/IRADEY/assets/img/home/s-2.png" alt="image">
                      <span class="nf-top-label nf-c-2">50+ Mentors & Incubators</span>
                    </div>
                    <div class="data-frame">
                      <p><a href="mentors/?Livelihood-and-Planning">Livelihood & Planning </a></p>
                      <p><a href="mentors/?Business-Administration">Business Administration </a></p>
                      <p><a href="incubators/?Mizoram">Incubators in Mizoram  </a></p>
                      <p><a href="incubators/?Tripura">Incubator in Tripura </a></p>
                      <a href="mentors-incubators/" class="view-more">View More</a>
                    </div>
                  </div>
                  <div>
                    <div class="img-frame">
                      <img src="wp-content/themes/IRADEY/assets/img/home/s-2.png" alt="image">
                      <span class="nf-top-label nf-c-3">200+ Apps & Journals</span>
                    </div>
                    <div class="data-frame">
                      <p><a href="apps-journal-details/?Aquaculture">Aquaculture</a></p>
                      <p><a href="apps-journal-details/?Strawberry-Cultivation">Strawberry Cultivation </a></p>
                      <p><a href="apps-journal-details/?Turkey-Management">Turkey Management </a></p>
                      <p><a href="apps-journal-details/?Animal-Disease-Reporting-System">Animal Disease Reporting System</a></p>
                      <a href="apps-journal-details/" class="view-more">View More</a>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>-->


        <?php dynamic_sidebar( 'home-info-3' ) ?>  
</div>        
<!--testionial section start-->

<section class="testimonial-main">
    <div class="">
      <div class="row">
        <div class="col-lg-12">
            <h5>Testimonials</h5>
        </div>
      </div>
      
      <div class="swiper mySwiper">
        <div class="swiper-wrapper">  

          <?php
            $arg = array(
              'post_type'         => 'testamonial', // Custom post type for testimonials
              'orderby'           => 'post_title',
              'order'             => 'ASC',
              'post_status'       => 'publish',
              'posts_per_page'    => -1
            );
            $testimonial_query = new WP_Query($arg);
            
            // echo"<pre>";
            // print_r($testimonial_query);exit;

            while($testimonial_query->have_posts()) : $testimonial_query->the_post();
              $values_testimonial = get_fields(); // Get custom fields for each testimonial
              $testimonial_image = wp_get_attachment_image_src(get_post_thumbnail_id($testimonial_query->ID), "original");
              $youtube_link = $values_testimonial['video_link']; // Assuming 'youtube_link' is the field name
              
          ?>

          <div class="swiper-slide">
  <div class="testomonial-img">
    <div class="vid-slider">
      <div class="vid-wrapper">
        <div class="vid item" data-video-link="<?php echo $youtube_link; ?>">
          <!--<iframe width="0" height="0" class="img_video_sper" src="<?php echo $youtube_link; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>-->
         <div class="video-popup">
          <div class="video-popup-content">
            <button class="close-video">Close</button>
            <iframe src="" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          </div>
        </div>
          <?php if($testimonial_image): ?>
            <img src="<?php echo $testimonial_image[0]; ?>" id="img" class="img-fluid">
          <?php endif; ?>
          <div class="testi-name">
            <p><?php the_title(); ?></p> <!-- Display the testimonial title -->
          </div>
        </div>
      </div>
    </div>   
  </div>
</div>
          <?php endwhile; wp_reset_query(); ?>

        </div>
      </div>
    </div>
     <div class="video-popup">
      <div class="iframe-wrapper"><iframe width="400" height="300" src="" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      <span class="close-video"></span>
      </div>
    </div>
</section>
<!--<section class="testimonial-main">-->

<!--    <div class="">-->
<!--      <div class="row">-->
<!--        <div class="col-lg-12">-->
<!--            <h5>Testimonials</h5>-->
<!--        </div>-->
<!--      </div>-->
      
      <!--<div class="swiper mySwiper">-->
      <!--  <div class="swiper-wrapper">  -->
      <!--    <div class="swiper-slide" >-->
      <!--      <div class="testomonial-img">-->
      <!--        <div class="vid-slider">-->
      <!--          <div class="vid-wrapper">-->
      <!--            <div class="vid item">-->
      <!--              <iframe width="0" height="0" src="https://www.youtube.com/embed/9xwazD5SyVg" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>-->
      <!--                <img src="wp-content/themes/IRADEY/assets/img/team/teammember1.jpg" class="img-fluid"> -->
      <!--                <div class="testi-name">-->
      <!--                  <p>Testimonial name</p>-->
      <!--                </div>-->
      <!--            </div>-->
      <!--          </div>-->
      <!--        </div>   -->
      <!--      </div>-->
      <!--    </div>-->
<!--          <div class="swiper-slide" >-->
<!--            <div class="testomonial-img">-->
<!--              <div class="vid-slider">-->
<!--                <div class="vid-wrapper">-->
<!--                  <div class="vid item">-->
<!--                    <iframe width="0" height="0" src="https://www.youtube.com/embed/D4NyQ5iOMF0?si=TiAuSb4eLxP2eSyw" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>-->
<!--                      <img src="wp-content/themes/IRADEY/assets/img/team/teammember2.jpg" class="img-fluid"> -->
<!--                      <div class="testi-name">-->
<!--                        <p>Testimonial name</p>-->
<!--                      </div>-->
<!--                  </div>-->
<!--                </div>-->
<!--              </div>   -->
<!--            </div>-->
<!--          </div>-->
<!--          <div class="swiper-slide" >-->
<!--            <div class="testomonial-img">-->
<!--              <div class="vid-slider">-->
<!--                <div class="vid-wrapper">-->
<!--                  <div class="vid item">-->
<!--                    <iframe width="0" height="0" src="https://www.youtube.com/embed/9xwazD5SyVg" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>-->
<!--                      <img src="wp-content/themes/IRADEY/assets/img/team/teammember3.jpg" class="img-fluid"> -->
<!--                      <div class="testi-name">-->
<!--                        <p>Testimonial name</p>-->
<!--                      </div>-->
<!--                  </div>-->
<!--                </div>-->
<!--              </div>   -->
<!--            </div>-->
<!--          </div>-->
<!--          <div class="swiper-slide" >-->
<!--            <div class="testomonial-img">-->
<!--              <div class="vid-slider">-->
<!--                <div class="vid-wrapper">-->
<!--                  <div class="vid item">-->
<!--                    <iframe width="0" height="0" src="https://www.youtube.com/embed/9xwazD5SyVg" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>-->
<!--                      <img src="wp-content/themes/IRADEY/assets/img/team/teammember4.jpg" class="img-fluid"> -->
<!--                      <div class="testi-name">-->
<!--                        <p>Testimonial name</p>-->
<!--                      </div>-->
<!--                  </div>-->
<!--                </div>-->
<!--              </div>   -->
<!--            </div>-->
<!--          </div>-->
<!--          <div class="swiper-slide" >-->
<!--            <div class="testomonial-img">-->
<!--              <div class="vid-slider">-->
<!--                <div class="vid-wrapper">-->
<!--                  <div class="vid item">-->
<!--                    <iframe width="0" height="0" src="https://www.youtube.com/embed/9xwazD5SyVg" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>-->
<!--                      <img src="wp-content/themes/IRADEY/assets/img/team/teammember1.jpg" class="img-fluid"> -->
<!--                      <div class="testi-name">-->
<!--                        <p>Testimonial name</p>-->
<!--                      </div>-->
<!--                  </div>-->
<!--                </div>-->
<!--              </div>   -->
<!--            </div>-->
<!--          </div>-->
<!--          <div class="swiper-slide" >-->
<!--            <div class="testomonial-img">-->
<!--              <div class="vid-slider">-->
<!--                <div class="vid-wrapper">-->
<!--                  <div class="vid item">-->
<!--                    <iframe width="0" height="0" src="https://www.youtube.com/embed/9xwazD5SyVg" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>-->
<!--                      <img src="wp-content/themes/IRADEY/assets/img/team/teammember2.jpg" class="img-fluid"> -->
<!--                      <div class="testi-name">-->
<!--                        <p>Testimonial name</p>-->
<!--                      </div>-->
<!--                  </div>-->
<!--                </div>-->
<!--              </div>   -->
<!--            </div>-->
<!--          </div>-->
<!--        </div>-->
<!--        <div class="swiper-button-next text-white"></div>-->
<!--      <div class="swiper-button-prev text-white"></div>-->
        <!-- <div class="swiper-pagination"></div> -->
<!--      </div>-->
      
<!--      </div>-->
   
<!--    </div>-->
<!--    <div class="video-popup">-->
<!--      <div class="iframe-wrapper"><iframe width="400" height="300" src="" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>-->
<!--      <span class="close-video"></span>-->
<!--      </div>-->
<!--    </div>-->
    
    

<!--</section>-->
<!--testionial section ends-->
<!--client stories sectrion start-->
<?php

  global $wpdb;
  $query= "SELECT wp_vxcf_leads_detail.lead_id, wp_vxcf_leads_detail.value, wp_vxcf_leads_detail.name 
FROM wp_vxcf_leads_detail 
INNER JOIN wp_vxcf_leads 
ON wp_vxcf_leads_detail.lead_id = wp_vxcf_leads.id
WHERE wp_vxcf_leads_detail.lead_id IN (
    SELECT lead_id 
    FROM wp_vxcf_leads_detail 
    WHERE name = 'status'
    AND value = 'Active'
)
ORDER BY wp_vxcf_leads_detail.lead_id DESC
LIMIT 50;";
          
          $results = $wpdb->get_results($query);
?>
<section class="client-stories-main">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
          <h5>Client Stories</h5>
      </div>
    </div>
    <div class="swiper client-story">
      <div class="swiper-wrapper"> 
      <?php
        if (!empty($results)) {
          $clientStories = [];

          // Aggregate data by lead_id
          foreach ($results as $row) {
            if (!isset($clientStories[$row->lead_id])) {
              $clientStories[$row->lead_id] = [
                'value' => '',
                'name' => '',
              ];
            }

            // Assign values based on the name field
            if ($row->name == 'your-message') {
              $clientStories[$row->lead_id]['value'] = $row->value;
            } elseif ($row->name == 'your-name') {
              $clientStories[$row->lead_id]['name'] = $row->value;
            } 
          }

          // Display client stories
          foreach ($clientStories as $story) {
        ?>
        <div class="swiper-slide" >
          <div class="client-info">
             <div class="client-info-main">
                <i class="fa fa-quote-left" aria-hidden="true"></i>
                     <p><?php echo esc_html($story['value']); ?></p>
                 <div class="client-name">
                  <strong><?php echo esc_html($story['name']); ?></strong>
                </div>
              </div>
          </div>
        </div>
         <?php
        }
      } else {
        echo "<p>No client stories found.</p>";
      }
      ?>
        
        <!--<div class="swiper-slide" >-->
        <!--  <div class="client-info">-->
        <!--    <div class="client-info-main">-->
        <!--       <i class="fa fa-quote-left" aria-hidden="true"></i>-->
        <!--       <p>I saw that this platform helps especially us who are living in rural areas. By participating in htis, i found out that will improved the life of many people by creating our own ideas of business. Thank You. </p>-->
        <!--       <div class="client-name">-->
        <!--         <strong>Lamthenneng Khongsai</strong>-->
        <!--       <strong>Student</strong>-->
        <!--       </div>-->
        <!--     </div>-->
        <!-- </div>-->
        <!--</div>-->
        <!--<div class="swiper-slide" >-->
        <!--  <div class="client-info">-->
        <!--    <div class="client-info-main">-->
        <!--       <i class="fa fa-quote-left" aria-hidden="true"></i>-->
        <!--       <p>I saw that this platform helps especially us who are living in rural areas. By participating in htis, i found out that will improved the life of many people by creating our own ideas of business. Thank You. </p>-->
        <!--       <div class="client-name">-->
        <!--         <strong>Lamthenneng Khongsai</strong>-->
        <!--       <strong>Student</strong>-->
        <!--       </div>-->
        <!--     </div>-->
        <!-- </div>-->
        <!--</div>-->
        <!--<div class="swiper-slide" >-->
        <!--  <div class="client-info">-->
        <!--    <div class="client-info-main">-->
        <!--       <i class="fa fa-quote-left" aria-hidden="true"></i>-->
        <!--       <p>I saw that this platform helps especially us who are living in rural areas. By participating in htis, i found out that will improved the life of many people by creating our own ideas of business. Thank You. </p>-->
        <!--       <div class="client-name">-->
        <!--         <strong>Lamthenneng Khongsai</strong>-->
        <!--       <strong>Student</strong>-->
        <!--       </div>-->
        <!--     </div>-->
        <!-- </div>-->
        <!--</div>-->
        <!--<div class="swiper-slide" >-->
        <!--  <div class="client-info">-->
        <!--    <div class="client-info-main">-->
        <!--       <i class="fa fa-quote-left" aria-hidden="true"></i>-->
        <!--       <p>I saw that this platform helps especially us who are living in rural areas. By participating in htis, i found out that will improved the life of many people by creating our own ideas of business. Thank You. </p>-->
        <!--       <div class="client-name">-->
        <!--         <strong>Lamthenneng Khongsai</strong>-->
        <!--       <strong>Student</strong>-->
        <!--       </div>-->
        <!--     </div>-->
        <!-- </div>-->
        <!--</div>-->
        <!--<div class="swiper-slide" >-->
        <!--  <div class="client-info">-->
        <!--    <div class="client-info-main">-->
        <!--       <i class="fa fa-quote-left" aria-hidden="true"></i>-->
        <!--       <p>I saw that this platform helps especially us who are living in rural areas. By participating in htis, i found out that will improved the life of many people by creating our own ideas of business. Thank You. </p>-->
        <!--       <div class="client-name">-->
        <!--         <strong>Lamthenneng Khongsai</strong>-->
        <!--       <strong>Student</strong>-->
        <!--       </div>-->
        <!--     </div>-->
        <!-- </div>-->
        <!--</div>-->
      </div>
      <!-- <div class="swiper-button-next text-white"></div>
    <div class="swiper-button-prev text-white"></div> -->
      <!-- <div class="swiper-pagination"></div> -->
    </div>
    
    </div>
</section>
<!--client stories sectrion ends-->

<div class="container">
        <?php dynamic_sidebar( 'home-info-1' ) ?>

<?php/*?>
  <div class="nf-middle_block">
  	<h2 class="nf-solution-title"><span class="skyblue">One Stop Solution</span> for <span class="blue">Informed Decision</span> about <span class="org">Career and Livelihood</span> </h2>
    <div class="row">
      <div class="col-12 col-lg-4">
        <div class="nf-m-img-wrap">
          <img src="<?php  echo get_template_directory_uri(). '/assets/'?>img/home/m-img-1.png" alt="image 1">
          <h5>RESOURCES FOR <span> STUDENTS</span></h5>
        </div>
      
        <div class="nf-m-text-wrap">
          <ul>
            <li>Explore careers in Emerging Sectors</li>
            <li>Pathway to your dream institution</li>
            <li>Get supported through Scholarship & Fellowship</li>
            <li>Connect with career coach</li>
            <li>E-Learning- Learn from anywhere, anytime</li>
          </ul>
          <a href="<?php echo site_url()?>/career_type/law/" class="know-more">KNOW MORE <i class="fa fa-angle-right"></i></a>
        </div>
      </div>
    
      <div class="col-12 col-lg-4">
        <div class="nf-m-img-wrap">
          <img src="<?php  echo get_template_directory_uri(). '/assets/'?>img/home/m-img-2.png" alt="image 1">
          <h5 class="grenbg">RESOURCES FOR <span> ENTREPRENEURS</span></h5>
        </div>
      
        <div class="nf-m-text-wrap">
          <ul>
            <li>Setup/Expand a venture </li>
            <li>Know your approvals to start your venture</li>
            <li>Explore Government scheme and policies</li>
            <li>Explore Infrastructure, Market, Credit Linkage & Training</li>
            <li>Get Connected to a mentor</li>
          </ul>
          <a href="<?php echo site_url()?>/fruits/" class="know-more">KNOW MORE <i class="fa fa-angle-right"></i></a>
        </div>
      </div>
    
      <div class="col-12 col-lg-4">
        <div class="nf-m-img-wrap">
          <img src="<?php  echo get_template_directory_uri(). '/assets/'?>img/home/m-img-3.png" alt="image 1">
          <h5 class="orgbg">RESOURCES FOR <span> JOB SEEKERS</span></h5>
        </div>
      
        <div class="nf-m-text-wrap">
          <ul>
            <li>Explore job in both government and corporate sector</li>
            <li>Under the skill need of business world</li>
            <li>Get updated with the job vaccancies & opportunities</li>
            <li>Find an internship</li>
            <li>Learn & Earn through Vocational Skills</li>
          </ul>
          <a href="<?php echo site_url()?>/job-opportunity/" class="know-more">KNOW MORE <i class="fa fa-angle-right"></i></a>
        </div>
      </div>
    </div>
  </div>
  <?php*/?>

  <?php dynamic_sidebar( 'home-info-6' ) ?>
    <!--<div class="nf-testimonial-section">
    <div class="container">
      <div class="nf-testimonial-spacing nf-testimonial-slider">
        <div>
          <div class="row align-items-center">
            <div class="col-lg-6 pr-0">
              <div class="testimonial-bg">
                <h2 data-aos="fade-right">Advancing North East Dialogue with Mirabai Chanu</h2>
                <p data-aos="fade-up">Ulimate Goal does not come without Sacrifice</p>
              </div>
            </div>
            <div class="col-lg-6 pl-0">
              <iframe id="mvideo1" src="https://www.youtube.com/embed/Da8WCz4CiwM?playlist=Da8WCz4CiwM&loop=1" width="100%" frameborder="0" allowfullscreen="allowfullscreen"></iframe>
            </div>
          </div>
        </div>

        <div>
          <div class="row align-items-center">
            <div class="col-lg-6 pr-0">
              <div class="testimonial-bg bg2">
                <h2 data-aos="fade-right">Advancing North East Dialogue with Ms. Lapdiang Syiem</h2>
                <p data-aos="fade-up">The first NSD Graduate from Meghalaya</p>
              </div>
            </div>
            <div class="col-lg-6 pl-0">
              <iframe id="mvideo2" src="https://www.youtube.com/embed/tEI4GFAP7uo?playlist=tEI4GFAP7uo&loop=1" width="100%" frameborder="0" allowfullscreen="allowfullscreen"></iframe>
            </div>
          </div>
        </div>

        <div>
          <div class="row align-items-center">
            <div class="col-lg-6 pr-0">
              <div class="testimonial-bg bg3"> 

                <h2 data-aos="fade-right">Advancing North East Dialogue Hiren Chandra Nath, ADGP, Assam Police</h2>
                <p data-aos="fade-up">Career in Police Service</p>
              </div>
            </div>
            <div class="col-lg-6 pl-0">
              <iframe id="mvideo3" src="https://www.youtube.com/embed/O9n4wQZEoEc?playlist=O9n4wQZEoEc&loop=1" width="100%" frameborder="0" allowfullscreen="allowfullscreen"></iframe>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>-->

</div>

   <?php/*?><div class="nf-testimonial-section">
    <div class="container">
      <div class="nf-testimonial-spacing nf-testimonial-slider">
        <div>
          <div class="row align-items-center">
            <div class="col-lg-6 pr-0">
              <div class="testimonial-bg">
                <h2>“Ultimate goal does not come without sacrifice”</h2>
                <h6>~ Mirabai Chanu</h6>
                <p>Silver Medalist,Tokyo olympics 2021</p>
              </div>
            </div>
            <div class="col-lg-6 pl-0">
              <iframe id="mvideo1" src="https://www.youtube.com/embed/Da8WCz4CiwM?playlist=Da8WCz4CiwM&loop=1" width="100%" frameborder="0" allowfullscreen="allowfullscreen"></iframe>
            </div>
          </div>
        </div>

        <div>
          <div class="row align-items-center">
            <div class="col-lg-6 pr-0">
              <div class="testimonial-bg">
                <h2>Career in Film Making- Advancing North East Dialogue with </h2>
                <h6>Kenny Deori Basumatary</h6>
                <p></p>
              </div>
            </div>
            <div class="col-lg-6 pl-0">
              <iframe id="mvideo2" src="https://www.youtube.com/embed/kWkG0eSR41U?playlist=kWkG0eSR41U&loop=1" width="100%" frameborder="0" allowfullscreen="allowfullscreen"></iframe>
            </div>
          </div>
        </div>

        <div>
          <div class="row align-items-center">
            <div class="col-lg-6 pr-0">
              <div class="testimonial-bg">
                <h2>Vocal for Local- How Elizabeth Yambem took local herbs of Manipur to the Global Market</h2>
                <h6>Elizabeth Yambem</h6>
                <p></p>
              </div>
            </div>
            <div class="col-lg-6 pl-0">
              <iframe id="mvideo3" src="https://www.youtube.com/embed/On6nMw9-E0Y?playlist=On6nMw9-E0Y&loop=1" width="100%" frameborder="0" allowfullscreen="allowfullscreen"></iframe>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

  </div><?php*/?>

  <?php dynamic_sidebar( 'home-info-2' ) ?>
 <?php/*?><div class="nf-career_section">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="nf-art-slider-main">
            <div class="slider nf-art-slider">
              <div>
                <div class="row">
                  <div class="col-lg-6 pr-0">
                    <img src="<?php  echo get_template_directory_uri(). '/assets/'?>img/home/explore1.png" alt="Banner.jpg">
                  </div>
                  <div class="col-lg-6 pl-0">
                    <div class="nf-art-textwrap">
                    <h3>Defence Services <img src="<?php  echo get_template_directory_uri(). '/assets/'?>img/home/defence-icon.png" alt="Defence"></h3>
                    <ul>
                      <li><a href="#">Indian Army</a></li>
                      <li><a href="#">Indian Air Force</a></li>
                      <li><a href="#">Indian Navy</a></li>
                      <li><a href="#">Indian Coast Guard</a></li>
                      <li><a href="#">Border Security Forces</a></li>
                    </ul>
                    <a href="<?php echo site_url()?>/career_type/defence-services/" class="nf-button-v-small" tabindex="0">Explore Emerging Career</a>
                    </div>
                  </div>
                </div>              
              </div>

              <div>
                <div class="row">
                  <div class="col-lg-6 pr-0">
                    <img src="<?php  echo get_template_directory_uri(). '/assets/'?>img/home/explore2.png" alt="Banner.jpg">
                  </div>
                  <div class="col-lg-6 pl-0">
                    <div class="nf-art-textwrap">
                    <h3>Performing Arts <img src="<?php  echo get_template_directory_uri(). '/assets/'?>img/home/face-shape.png" alt="face"></h3>
                    <ul>
                      <li><a href="#">Music</a></li>
                      <li><a href="#">Acting/Dramatics</a></li>
                      <li><a href="#">Choreography</a></li>
                      <li><a href="#">Fine arts</a></li>
                      <li><a href="#">Photography & Film Making</a></li>
                    </ul>
                    <a href="<?php echo site_url()?>/career_type/performing-applied-arts/" class="nf-button-v-small" tabindex="0">Explore Emerging Career</a>
                    </div>
                  </div>
                </div>              
              </div>

              <div>
                <div class="row">
                  <div class="col-lg-6 pr-0">
                    <img src="<?php  echo get_template_directory_uri(). '/assets/'?>img/home/explore3.png" alt="Banner.jpg">
                  </div>
                  <div class="col-lg-6 pl-0">
                    <div class="nf-art-textwrap">
                    <h3>Hospitality & Tourism <img src="<?php  echo get_template_directory_uri(). '/assets/'?>img/home/tourism-icon.png" alt="Tourism"></h3>
                    <ul>
                      <li><a href="#">Cabin Crew</a></li>
                      <li><a href="#">Culinary Arts</a></li>
                      <li><a href="#">Hotel Management</a></li>
                      <li><a href="#">Tourism</a></li>
                      <li><a href="#">Chef</a></li>
                    </ul>
                    <a href="<?php echo site_url()?>/career_type/hospitality-and-tourism/" class="nf-button-v-small" tabindex="0">Explore Emerging Career</a>
                    </div>
                  </div>
                </div>              
              </div>

          </div>
        </div>
      </div>
    </div>
  </div>
  </div><?php*/?>

  <?php //dynamic_sidebar( 'home-info-3' ) ?>
<?php/*?><div class="nf-exam_section">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h6>Know Your Entrance Exam</h6>
      </div>
      <div class="col-12">
        <div class="slider nf-exam-slider">
          <div>
            <div class="img-frame">
              <img src="<?php  echo get_template_directory_uri(). '/assets/'?>img/home/s-1.png" alt="image">
              <span class="nf-top-label">Law</span>
            </div>
            <div class="data-frame">
              <p><a href="#">Common Law Admission test (CLAT)</a></p>
              <p><a href="#">All  Law entrance test (AILET)</a></p>
              <p><a href="#">Law School Admission test  (LSAT) india</a></p>
              <a href="<?php echo site_url()?>/exam_type/law/" class="view-more">View More</a>
            </div>
          </div>

          <div>
            <div class="img-frame">
              <img src="<?php  echo get_template_directory_uri(). '/assets/'?>img/home/s-2.png" alt="image">
              <span class="nf-top-label nf-c-2">Media & Mass <br>Communication</span>
            </div>
            <div class="data-frame">
              <p><a href="#">Delhi university entrance test (DUET)</a></p>
              <p><a href="#">Central university Common entrance test (CUCET)</a></p>
              <p><a href="#">American college testing (ACT)</a></p>
              <a href="<?php echo site_url()?>/exam_type/media-and-mass-communication/" class="view-more">View More</a>
            </div>
          </div>

           <div>
            <div class="img-frame">
              <img src="<?php  echo get_template_directory_uri(). '/assets/'?>img/home/s-3.png" alt="image">
              <span class="nf-top-label nf-c-3">Architecture<br> & planning</span>
            </div>
            <div class="data-frame">
              <p><a href="#">National aptitude test in Architecture (NATA)</a></p>
              <p><a href="#">JEE ADVANCE  Architecture aptitude test </a></p>
              <p><a href="#">joint entrance examination mains (JEE)</a></p>
              <a href="<?php echo site_url()?>/exam_type/architecture-and-planning/" class="view-more">View More</a>
            </div>
          </div>

           <div>
            <div class="img-frame">
              <img src="<?php  echo get_template_directory_uri(). '/assets/'?>img/home/s-2.png" alt="image">
              <span class="nf-top-label nf-c-2">Engineering and Technology</span>
            </div>
            <div class="data-frame">
              <p><a href="#">Common Law Admission test (CLAT)</a></p>
              <p><a href="#">Common Law Admission test (CLAT)</a></p>
              <p><a href="#">Common Law Admission test (CLAT)</a></p>
              <a href="<?php echo site_url()?>/exam_type/engineering-and-technology/" class="view-more">View More</a>
            </div>
          </div>
          <div>
            <div class="img-frame">
              <img src="<?php  echo get_template_directory_uri(). '/assets/'?>img/home/s-3.png" alt="image">
              <span class="nf-top-label nf-c-3">Art and Design</span>
            </div>
            <div class="data-frame">
              <p><a href="#">Common Law Admission test (CLAT)</a></p>
              <p><a href="#">Common Law Admission test (CLAT)</a></p>
              <p><a href="#">Common Law Admission test (CLAT)</a></p>
              <a href="<?php echo site_url()?>/exam_type/art-and-design/" class="view-more">View More</a>
            </div>
          </div>
          <div>
            <div class="img-frame">
              <img src="<?php  echo get_template_directory_uri(). '/assets/'?>img/home/s-2.png" alt="image">
              <span class="nf-top-label nf-c-2">University Entrance Exams</span>
            </div>
            <div class="data-frame">
              <p><a href="#">Common Law Admission test (CLAT)</a></p>
              <p><a href="#">Common Law Admission test (CLAT)</a></p>
              <p><a href="#">Common Law Admission test (CLAT)</a></p>
              <a href="<?php echo site_url()?>/exam_type/university-entrance-exams/" class="view-more">View More</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div><?php*/?>

  <div class="nf-institute-wrap">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h6 data-aos="fade-up">Explore Your Dream Institute</h6>
          <div class="nf-mi-button-section">
            <a href="<?php echo site_url()?>/study-in-north-east-list" class="nf-box">
              <img src="<?php  echo get_template_directory_uri(). '/assets/'?>img/home/ico-6.png">
              <h4>REGIONAL <i class="fa fa-angle-right"></i></h4>
            </a>
            <a href="<?php echo site_url()?>/higher-education-india-list" class="nf-box nf-btn_1">
              <img src="<?php  echo get_template_directory_uri(). '/assets/'?>img/home/ico-5.png">
              <h4>NATIONAL <i class="fa fa-angle-right"></i></h4>
            </a>
            <a href="<?php echo site_url()?>/study-in-abroad-list" class="nf-box nf-btn_2">
              <img src="<?php  echo get_template_directory_uri(). '/assets/'?>img/home/ico-7.png">
              <h4>ABROAD <i class="fa fa-angle-right"></i></h4>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="nf-support-wrap">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h6 data-aos="fade-up">Get Supported Through</h6>
          <div class="nf-support-inner">
            <div class="nf-ss-wrap">
              <span>
                <img src="<?php  echo get_template_directory_uri(). '/assets/'?>img/home/ico-8.png" alt="icon 8">
              </span>
              <h5>Scholarship</h5>
              <a href="<?php echo site_url()?>/scholarships" class="know-more">KNOW MORE</a>
            </div>
            <div class="nf-ss-wrap nf-g-2">
              <span>
                <img src="<?php  echo get_template_directory_uri(). '/assets/'?>img/home/ico-9.png" alt="icon 8">
              </span>
              <h5>Fellowship</h5>
              <a href="<?php echo site_url()?>/fellowships" class="know-more">KNOW MORE</a>
            </div>
            <div class="nf-ss-wrap nf-g-3">
              <span>
                <img src="<?php  echo get_template_directory_uri(). '/assets/'?>img/home/ico-10.png" alt="icon 8">
              </span>
              <h5>Education Loan</h5>
              <a href="<?php echo site_url()?>/education-loan" class="know-more">KNOW MORE</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="nf-project-atmanirbhar">
    <div class="nf-project-wrap">
      <div class="container">
        <h6 data-aos="fade-up">Explore potential of North-East through thousands of  Business Ideas</h6>
        <div class="nf-pr-list-wrapper">
          <div class="item">
           <a href="<?php echo site_url()?>/fruits" class="nf-pr-list">
             <img src="<?php  echo get_template_directory_uri(). '/assets/'?>img/home/ico-11.png">
           </a>
           <h5>AgriBusiness</h5>
         </div>
         <div class="item">
           <a href="<?php echo site_url()?>/ready-to-eat/" class="nf-pr-list">
             <img src="<?php  echo get_template_directory_uri(). '/assets/'?>img/home/ico-12.png">
           </a>
           <h5>Manufacturing</h5>
         </div>
         <div class="item">
           <a href="<?php echo site_url()?>/hotels-and-resorts/" class="nf-pr-list">
             <img src="<?php  echo get_template_directory_uri(). '/assets/'?>img/home/ico-13.png">
           </a>
           <h5>Services</h5>
         </div>
         <div class="item">
           <a href="<?php echo site_url()?>/service_trading/kids-readymade-garment/" class="nf-pr-list">
             <img src="<?php  echo get_template_directory_uri(). '/assets/'?>img/home/increase2.png">
           </a>
           <h5>Trading</h5>
         </div>
       </div>
     </div>
   </div>

   <section class="nf-atmanirbhar">
    <div class="container">
      <h4 data-aos="fade-up">Contribute to <span>Atmanirbhar Bharat</span></h4>
      <div class="row">
        <div class="col-lg-4">
          <div class="card">
            <div class="card-header">
              Grow Exotic Spices in North East 
            </div>
            <div class="card-body">
              <div class="img-wrap">
                <img src="<?php  echo get_template_directory_uri(). '/assets/'?>img/home/spice.png" alt="img">
              </div>
              <h6>Reduce import dependence</h6>
              <a href="<?php echo site_url()?>/exotic-spices/" class="know-more">Know More <i class="fa fa-angle-right"></i></a>
            </div>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="card">
            <div class="card-header headbg-2">
              Set up Nitrogen and Oxygen Gas Plant 
            </div>
            <div class="card-body">
              <div class="img-wrap">
                <img src="<?php  echo get_template_directory_uri(). '/assets/'?>img/home/nitrogen.jpg" alt="img">
              </div>
              <h6>Fuel for Critical Industries</h6>
              <a href="<?php echo site_url()?>/conventional-sector-details/nitrogen-and-oxygen-gas-plant/" class="know-more">Know More <i class="fa fa-angle-right"></i></a>
            </div>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="card">
            <div class="card-header headbg-3">
              Start a Data Centre 
            </div>
            <div class="card-body">
              <div class="img-wrap">
                <img src="<?php  echo get_template_directory_uri(). '/assets/'?>img/home/data-center.png" alt="img">
              </div>
              <h6>Need of the business world</h6>
              <a href="<?php echo site_url()?>/services/data-processing-center/" class="know-more">Know More <i class="fa fa-angle-right"></i></a>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>
</div>

<section class="nf-approval-wrapper">
  <div class="container">
    <div class="row">
      <div class="col-12 col-lg-12 text-center">
        <h3>Know your approval before starting your business <a data-aos="zoom-in-down" href="<?php echo site_url()?>/know-your-approvals">Click here</a></h3>
      </div>
    </div>
  </div>
</section>

<?php dynamic_sidebar( 'home-info-4' ) ?>
<?php/*?>
<section class="nf-development-section">
  <div class="container">
   <div class="nf-tab-wrapper">
   <div class="row">
    <div class="col-12 col-lg-5">
      <h3>Explore Support Ecosystem</h3>
      <h6>Partner with the ecosystem enablers</h6>
      <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item" role="presentation"><a href="<?php echo site_url()?>/mentors-incubators/">
            <!--id="Agriculture-tab" data-toggle="tab" data-target="#Agriculture" role="tab"-->
          <button class="nav-link active" >Mentor and Incubator</button></a>
        </li>
        <li class="nav-item" role="presentation">
          <a href="<?php echo site_url()?>/training_page/">
          <!--id="Handloom-tab" data-toggle="tab" data-target="#Handloom" role="tab"-->
          <button class="nav-link" >Training and Capacity Building</button></a>
        </li>
        <li class="nav-item" role="presentation">
          <a href="<?php echo site_url()?>/market-support-infrastructure/">
          <!--id="Industries-tab" data-toggle="tab" data-target="#Industries" role="tab"-->
          <button class="nav-link" >Infrastructure and Market Linkage </button></a>
        </li>
        <li class="nav-item" role="presentation">
          <a href="<?php echo site_url()?>/schemes-policies/">
          <!--id="Fishing-tab" data-toggle="tab" data-target="#Fishing" role="tab"-->
          <button class="nav-link" >Government Scheme and Policy </button></a>
        </li>        
        <li class="nav-item" role="presentation">
          <a href="<?php echo site_url()?>/credit-linkage-support-search/">
          <!--id="Import-tab" data-toggle="tab" data-target="#Import" role="tab"-->
          <button class="nav-link" >Loan Support</button></a>
        </li>
      </ul>
    </div>
    <div class="col-12 col-lg-7">
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="Agriculture" role="tabpanel" aria-labelledby="Agriculture-tab">
          <div class="nf-tab-text-block">
            <div class="nf-dev-img">
              <img src="<?php  echo get_template_directory_uri(). '/assets/'?>img/home/development.png" alt="development">
            </div>
            <h3>Connect with Mentors | <span>Learn from the Experts</span></h3>
            <div class="row">
              <div class="col-md-3">
                <a href="<?php echo site_url()?>/mentors/?Agriculture" class="nf-box">
                  <img src="<?php  echo get_template_directory_uri(). '/assets/'?>img/home/ico-11.png" alt="Agriculture">
                  <span>Agriculture</span>
                </a>
              </div>
              <div class="col-md-3">
                <a href="<?php echo site_url()?>/mentors/?Horticulture" class="nf-box">
                  <img src="<?php  echo get_template_directory_uri(). '/assets/'?>img/home/ico-horticulture.png" alt="Horticulture">
                  <span>Horticulture</span>
                </a>
              </div>
              <div class="col-md-3">
                <a href="<?php echo site_url()?>/mentors/?Fishery" class="nf-box">
                  <img src="<?php  echo get_template_directory_uri(). '/assets/'?>img/home/ico-fishery.png" alt="Fishery">
                  <span>Fishery</span>
                </a>
              </div>
              <div class="col-md-3">
                <a href="<?php echo site_url()?>/mentors/?Export" class="nf-box">
                  <img src="<?php  echo get_template_directory_uri(). '/assets/'?>img/home/ico-export.png">
                  <span>Export</span>
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="Handloom" role="tabpanel" aria-labelledby="Handloom-tab">
          <div class="nf-tab-text-block">
            
          </div>
        </div>
        <div class="tab-pane fade" id="Industries" role="tabpanel" aria-labelledby="Industries-tab">
          <div class="nf-tab-text-block">
            
          </div>
        </div>
        <div class="tab-pane fade" id="Fishing" role="tabpanel" aria-labelledby="Fishing-tab">
          <div class="nf-tab-text-block">
            
          </div>
        </div>
        <div class="tab-pane fade" id="Import" role="tabpanel" aria-labelledby="Import-tab">
          <div class="nf-tab-text-block">
            
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</section>
<?php*/?>


<section class="nf-calculator-section">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="nf-calculator-block">
          <div class="nf-left-block">
            <img src="<?php  echo get_template_directory_uri(). '/assets/'?>img/home/calendar.png" alt="calendar">
            <h2>Farm Cost Calculator <span>Know your Farming cost in advance </span></h2>
          </div>
          <div class="nf-right-block">
            <a href="<?php echo site_url()?>/cost-calculate" class="nf-button-v-small">Calculate Now</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php dynamic_sidebar( 'home-info-5' ) ?>

<?php/*?><div class="nf-upskill-wrap">
  <div class="container">
  <div class="row">
    <div class="col-12">
      <h6>CAREER BEYOND BOUNDARIES</h6>
    </div>
    </div>
    <div class="row co-12">
      <div class="col-12 col-lg-4">
        <div class="nf-upskill-main">
          <img src="<?php  echo get_template_directory_uri(). '/assets/'?>img/home/up-img-1.png" alt="up-img-1">
          <div class="data-wrap">
            <h4>How to become a google certified educator? </h4>
            <a href="<?php echo site_url()?>/upskill" class="know-more">Know More <i class="fa fa-angle-right"></i></a>
          </div>
        </div>
      </div>
      <div class="col-12 col-lg-4">
        <div class="nf-upskill-main nf-up-2">
          <img src="<?php  echo get_template_directory_uri(). '/assets/'?>img/home/up-img-2.png" alt="up-img-2">
          <div class="data-wrap nf-bg2">
            <h4>Get Certificate in Advanced Education Leadership </h4>
            <a href="<?php echo site_url()?>/upskill" class="know-more">Know More <i class="fa fa-angle-right"></i></a>
          </div>
        </div>
      </div>
      <div class="col-12 col-lg-4">
        <div class="nf-upskill-main nf-up-3">
          <img src="<?php  echo get_template_directory_uri(). '/assets/'?>img/home/up-img-3.png" alt="up-img-3">
          <div class="data-wrap nf-bg3">
            <h4>Learn from Harvard ‘Early Childhood Development: Global Strategies for Interventions’</h4>
            <a href="<?php echo site_url()?>/upskill" class="know-more">Know More <i class="fa fa-angle-right"></i></a>
          </div>
        </div>
      </div>
    </div>
    
  </div>
</div>

<div class="nf-skill-section">
  <div class="container">
    <div class="row">
      <div class="col-12 col-lg-12">
        <div class="nf-cfw-wrapper">
          <div class="nf-skill-wrapper">
            <h4>Skill Needs of Post-Covid Business World</h4>
            <div class="row">
              <div class="col-md-3">
                <a href="<?php echo site_url()?>/upskill-details/?Data-Science">
                  <img src="<?php  echo get_template_directory_uri(). '/assets/'?>img/home/skill-ic-1.png" alt="Data Science">
                  <h6>Data Science</h6>
                </a>
              </div>
              <div class="col-md-3">
                <a href="<?php echo site_url()?>/upskill-details/?Block-Chain-Technology">
                  <img src="<?php  echo get_template_directory_uri(). '/assets/'?>img/home/skill-ic-2.png" alt="Blockchain">
                  <h6>Blockchain</h6>
                </a>
              </div>
              <div class="col-md-3">
                <a href="<?php echo site_url()?>/upskill-details/?Digital-Marketing">
                  <img src="<?php  echo get_template_directory_uri(). '/assets/'?>img/home/skill-ic-3.png" alt="Digital Marketing">
                  <h6>Digital Marketing</h6>
                </a>
              </div>
              <div class="col-md-3">
                <a href="<?php echo site_url()?>/upskill-details/?Business-Analytics">
                  <img src="<?php  echo get_template_directory_uri(). '/assets/'?>img/home/skill-ic-4.png" alt="Business Analytics">
                  <h6>Business Analytics</h6>
                </a>
              </div>
            </div>

            <div class="nf-skill-btns-2">
             <a href="<?php echo site_url()?>/upskill" class="nf-button-v-small">Explore More</a>
           </div>

          </div>
           
        </div>
      </div>
    </div>
  </div>
</div>
<?php*/?>

<div class="nf-betibachao-home">
  <div class="container">
    <div class="nf-banner-event">  
      <div class="nf-event-content">
        <h2 class="nfgirl-title"><span class="whtbg">Advancing Girls </span> Advancing North East </h2>
        <a href="<?php echo site_url()?>/beti-bachao/" class="btn btn-2">Know More</a>
      </div>

<!--<div class="nf-event-content">
        <h2>Beti <span class="yellow-txt"> Bachao</span> Beti <span class="org-txt"> Padhao</span></h2>
        <a href="<?php //echo site_url()?>/beti-bachao/" class="btn btn-2">Know More</a>
      </div>
      --->

    </div>
  </div>
</div>

<section class="nf-s-stories-section home-success-story">
  <div class="container">
    <div class="row">
      <div class="col-12 col-lg-4">
       <h3>Advancing North East Dialogue</h3>
       <div class="nf-ss-inner">



        <?php
        $blog_args = array(
          'post_type' => 'e_learning',
          'post_status' => 'publish',
          'posts_per_page' => 1,
          'meta_key'    => 'region',
          'meta_value'  => 'Advancing North East Dialogue'
        );

        $blog_posts = new WP_Query($blog_args);
                                        //echo "<pre>";
                                        //print_r($blog_posts);
        $record=0;
        while($blog_posts->have_posts()) {
          $blog_posts->the_post(); 

          $values= get_fields();

          if($values)
          {
            $title_for_act_north_east_dialogue=''; 
            $url='';  
            $description='';


            foreach($values as $key => $value)
            {
              if($key=='region'){ $region = $value; }


              $url = $values['act_north_east_dialogue']['url'];
              $description = $values['act_north_east_dialogue']['description'];
              $title_for_act_north_east_dialogue = $values['act_north_east_dialogue']['title_for_act_north_east_dialogue'];
            }
          }
          if(strpos($url,'youtu')!=false && strpos($url,'=')!=false) 
          {
            $end_str = strstr($url, '='); 
            $final_str = str_replace('=', '', $end_str);
            $youtube_url = 'https://www.youtube.com/embed/';
          } 
          else
          {
            $final_str='';
            $youtube_url= $url;
          } 

          if (function_exists("convertYoutube")) {
            $final_str='';
            $youtube_url =  convertYoutube($url); 
          }           

          $record++;        
          ?>

          <div class="nf-ss-inner">

            <div class=""> <!--nf-ss-img-inner-->

              <a href="<?php echo $url;?>" target="_blank">
                <iframe width="100%" height="100" src="<?php echo $youtube_url.$final_str; ?>" frameborder="0" allowfullscreen=""></iframe>

              </a>
            </div>
            <div class="nf-ss-text-inner">
              <h5><?php echo $title_for_act_north_east_dialogue;?></h5>
              <p><?php //echo $description;?>
              <?php
              if (strlen($description) > 150) {
                $stringCut = substr($description, 0, 150);
                $endPoint = strrpos($stringCut, ' ');
                $description = $endPoint? substr($stringCut, 0, $endPoint).'...':substr($stringCut, 0).'...';
              } 
              echo $description;
              ?>
            </p>

          </div>
          <div class="col-12 col-lg-12"><input type="hidden" id="copylink<?php echo $record?>" value="<?php echo $youtube_url.$final_str; ?>">
            <a href="javascript:void(0)" title="Copy Link" class="copylink-class" onclick="copyLinkFunction('<?php echo $record?>')">Copy Link</a></div>
          </div>

        <?php }
        ?>
      </div>
      <a href="<?php echo site_url()?>/act-north-east-dialogue" class="view-more">View More</a>
    </div>
    <div class="col-12 col-lg-4">
      <h3>success Stories</h3>
      <div class="nf-ss-inner">
        <?php
        $blog_args = array(
          'post_type' => 'success_stories',
          'post_status' => 'publish',
          'posts_per_page' => 1
                                         // 'meta_key'    => 'type',
                                         //'meta_value'  => 'Video'

        );

        $blog_posts = new WP_Query($blog_args);
                                        //echo "<pre>";
                                        //print_r($blog_posts);

        $record=0;
        $k=0;
        while($blog_posts->have_posts()) { 
          $blog_posts->the_post();
          $values= get_fields();

          if(strpos($values['video_url'],'youtu')!=false && strpos($values['video_url'],'=')!=false) 
          {
            $end_str = strstr($values['video_url'], '='); 
            $final_str = str_replace('=', '', $end_str);
            $youtube_url = 'https://www.youtube.com/embed/';
          } 
          else
          {
            $final_str='';
            $youtube_url= $values['video_url'];
          }

          if (function_exists("convertYoutube")) {
            $final_str='';
            $youtube_url =  convertYoutube($values['video_url']); 
          } 

          $record++;
          ?> 



          <div class=""> <!--nf-ss-img-inner-->

            <a href="<?php echo $values['video_url'];?>" target="_blank">
              <iframe width="100%" height="100" src="<?php echo $youtube_url.$final_str; ?>" frameborder="0" allowfullscreen=""></iframe>

            </a>
          </div>
          <div class="nf-ss-text-inner">
            <h5><?php echo $post->post_title;?></h5>
            <p><?php //echo $values['description'];?>
            <?php
            if (strlen($values['description']) > 150) {
              $stringCut = substr($values['description'], 0, 150);
              $endPoint = strrpos($stringCut, ' ');
              $values['description'] = $endPoint? substr($stringCut, 0, $endPoint).'...':substr($stringCut, 0).'...';
            } 
            echo $values['description'];
            ?>
          </p>

        </div>
        <div class="col-12 col-lg-12"><input type="hidden" id="copylink<?php echo $record?>1" value="<?php echo $youtube_url.$final_str; ?>">
          <a href="javascript:void(0)" title="Copy Link" class="copylink-class" onclick="copyLinkFunction('<?php echo $record?>1')">Copy Link</a></div>

        <?php }
        ?> 
      </div>
      <a href="<?php echo site_url()?>/success-stories-details/" class="view-more">View More</a>
    </div>
    <div class="col-12 col-lg-4">
      <h3>Learning Videos</h3>
      <div class="nf-ss-inner">
        <?php
        $blog_args = array(
          'post_type' => 'e_learning',
          'post_status' => 'publish',
          'posts_per_page' => 1,
          'meta_query'     =>  array(

            array(
              'key'     =>  'region',
              'value'   =>  'Advancing North East Dialogue',
              'compare'=>'!='
            )
          )   

        );

        $blog_posts = new WP_Query($blog_args);
                                        //echo "<pre>";
                                        //print_r($blog_posts);
        $record=0;
        while($blog_posts->have_posts()) {
          $blog_posts->the_post(); 

          $values= get_fields();

          if($values)
          {
            $region=''; 
            $sector='';  
            $video_url='';
            $video_description='';

            $tag_for_blog=''; 
            $blog_title='';  
            $blog_url='';

            $extra_link_title=''; 
            $external_link='';  

            foreach($values as $key => $value)
            {
              if($key=='region'){ $region = $value; }
              if($key=='sector'){ $sector = $value;  }

              $video_url = $values['video']['video_url'];
              $video_description = $values['video']['video_description'];

            }
          }

          if(strpos($video_url,'youtu')!=false && strpos($video_url,'=')!=false) 
          {
            $end_str = strstr($video_url, '='); 
            $final_str = str_replace('=', '', $end_str);
            $youtube_url = 'https://www.youtube.com/embed/';
          } 
          else
          {
            $final_str='';
            $youtube_url= $video_url;
          }

          if (function_exists("convertYoutube")) {
            $final_str='';
            $youtube_url =  convertYoutube($video_url); 
          } 

          $record++;       
          ?> 
          <div class="nf-ss-inner">
            <div class=""> <!--nf-ss-img-inner-->

              <a href="<?php echo $video_url;?>" target="_blank">
                <iframe width="100%" height="100" src="<?php echo $youtube_url.$final_str; ?>" frameborder="0" allowfullscreen=""></iframe>

              </a>
            </div>
            <div class="nf-ss-text-inner">
              <h5><?php echo $post->post_title;?></h5>
              <p><?php //echo $video_description;?>
              <?php
              if (strlen($video_description) > 150) {
                $stringCut = substr($video_description, 0, 150);
                $endPoint = strrpos($stringCut, ' ');
                $video_description = $endPoint? substr($stringCut, 0, $endPoint).'...':substr($stringCut, 0).'...';
              } 
              echo $video_description;
              ?>
            </p>

          </div>
          <div class="col-12 col-lg-12"><input type="hidden" id="copylink<?php echo $record?>2" value="<?php echo $youtube_url.$final_str; ?>">
            <a href="javascript:void(0)" title="Copy Link" class="copylink-class" onclick="copyLinkFunction('<?php echo $record?>2')">Copy Link</a></div>
          </div>

        <?php }
        ?>
        
      </div>
      <a href="<?php echo site_url()?>/e-learning-details/" class="view-more">View More</a>
    </div>
  </div>
</div>
</section>

<?php
      //blogs=======
$i=0;
        //$sts = array(
        //  'key'     =>  'flag',
        //  'value'    => 'In-House',
        //  'compare'  => '='
        //);
        //$sts_dept = array(
        //  'key'     =>  'sectors',
         // 'value'    => 'Horticulture',
         // 'compare'  => '='
        //);

$tot_blog_args = array(
  'post_type' => 'blogs_and_articles',
  'post_status' => 'publish',
  'posts_per_page' => 10,
  'meta_key' => 'flag',
  'orderby'   => 'meta_value post_modified',
  'order' => 'DESC',
  'meta_query'     =>  array(
    array(
      'relation' => 'AND',
      $sts,
      $sts_dept

    )
  )
);
$tot_blog_posts = new WP_Query($tot_blog_args);
if(count($tot_blog_posts->posts)>0){
  ?>

  <section class="nf-blog-article">
    <div class="container">
      <h4 data-aos="fade-up">Blogs & Articles  <a href="<?php echo site_url()?>/blogs-articles-list" class="nf-btn-view-all">View All</a> </h4>
      <div class="blog-slider">

        <?php
        
        while($tot_blog_posts->have_posts()) { 

          $tot_blog_posts->the_post();
          $values= get_fields();
          if ($values) {
            $type = '';
            $flag = '';
            $image = '';
            $blog_description = '';
            $blog_link = '';
            $description='';

            foreach($values as $key => $value)
            {
              if($key=='image'){ $image = $value; }
              if($key=='blog_link'){ $blog_link = $value;  }
              if($key=='blog_description'){ $blog_description = $value;}
              if($key=='description'){ $description = $value;}
              if($key=='type'){ $type = $value;} 
              if($key=='flag'){ $flag = $value;}
            }
          }
          $i++;
          ?>

          <div>
            <div class="img-wrap">
              <img src="<?php echo $image; ?>" alt="blog img">

              <?php if ($flag=="In-House") { ?>
                <a href="<?php echo get_permalink( $post->ID )?>" class="view-btn" tabindex="0">View</a>
              <?php } else{ ?>
                <a href="<?php echo $blog_link; ?>" target="_blank" class="view-btn" tabindex="0">View</a>
              <?php } ?>

            </div>
            <div class="data-wrwp">
              <h6><?php echo $post->post_title;?></h6>
              <p>
                <?php
                if (strlen($description) > 150) {
                  $stringCut = substr($description, 0, 150);
                  $endPoint = strrpos($stringCut, ' ');
                  $description = $endPoint? substr($stringCut, 0, $endPoint).'...':substr($stringCut, 0).'...';
                } 
                echo $description;
                ?>
              </p>
            </div>
          </div>

        <?php }?>


      </div>
    </div>
  </section>
<?php }
wp_reset_query();
?>


<?php /*?>
<section class="nf-blog-article">
  <div class="container">
    <h4>Blogs & Articles  <a href="<?php echo site_url()?>/blogs-articles" class="nf-btn-view-all">View All</a> </h4>
    <div class="blog-slider">
      <div>
        <div class="img-wrap">
          <img src="<?php  echo get_template_directory_uri(). '/assets/'?>img/home/blog-1.png" alt="blog img">
          <a href="<?php echo site_url()?>/blogs-articles-details" class="view-btn">View</a>
        </div>
        <div class="data-wrwp">
          <h6>Nagaland to become  Hub of exotic musroom Production.</h6>
          <p>The Commerce and Industry Ministry has suggested business community in the north-east region ?</p>
        </div>
      </div>

      <div>
        <div class="img-wrap">
          <img src="<?php  echo get_template_directory_uri(). '/assets/'?>img/home/blog-2.png" alt="blog img">
          <a href="<?php echo site_url()?>/blogs-articles-details" class="view-btn">View</a>
        </div>
        <div class="data-wrwp">
          <h6>10 things you need to know about german biotech industry</h6>
          <p>The Commerce and Industry Ministry has suggested business community in the north-east region ?</p>
        </div>
      </div>

      <div>
        <div class="img-wrap">
          <img src="<?php  echo get_template_directory_uri(). '/assets/'?>img/home/blog-3.png" alt="blog img">
          <a href="<?php echo site_url()?>/blogs-articles-details" class="view-btn">View</a>
        </div>
        <div class="data-wrwp">
          <h6>North east - the new destination of OTT film Shooting</h6>
          <p>The Commerce and Industry Ministry has suggested business community in the north-east region ?</p>
        </div>
      </div>

      <div>
        <div class="img-wrap">
          <img src="<?php  echo get_template_directory_uri(). '/assets/'?>img/home/blog-1.png" alt="blog img">
          <a href="<?php echo site_url()?>/blogs-articles-details" class="view-btn">View</a>
        </div>
        <div class="data-wrwp">
          <h6>Nagaland to become  Hub of exotic musroom Production.</h6>
          <p>The Commerce and Industry Ministry has suggested business community in the north-east region ?</p>
        </div>
      </div>

    </div>
  </div>
  </section><?php */?>


  <!-----------------Gallery statrt--------------->

  <?php
      //gallery=======
  $i=0;

  $tot_blog_args = array(
    'post_type' => 'gallery',
    'post_status' => 'publish',
    'posts_per_page' => 5,
    'orderby'   => 'post_id',
    'order' => 'DESC'
  );
  $tot_blog_posts = new WP_Query($tot_blog_args);
  if(count($tot_blog_posts->posts)>0){
    ?>

    <section class="nf-blog-article">
      <div class="container">
        <h4 data-aos="fade-up">Gallery  <a href="<?php echo site_url()?>/gallary" class="nf-btn-view-all">View All</a> </h4>
        <div class="blog-slider">

          <?php

          while($tot_blog_posts->have_posts()) { 

            $tot_blog_posts->the_post();
            $values= get_fields();
            if ($values) {
              $type = '';
              $photo = '';
              $video_url = '';
              $description='';

              foreach($values as $key => $value)
              {
                if($key=='photo'){ $photo = $value; }
                if($key=='video_url'){ $video_url = $value;  }
                if($key=='description'){ $description = $value;}
                if($key=='type'){ $type = $value;} 
              }
            }
            $i++;
            ?>
            
            <div>
              <?php if ($type=="Photo") { ?>
                <div class="img-wrap">
                  <img src="<?php echo $photo; ?>" alt="blog img" onclick="$('#modtitle').html('<?php echo ucfirst($post->post_title)?>'); $('#imgx').attr('src', '<?php echo $photo; ?>'); javascript:$('#myModal').modal('show')">
                  <a href="<?php echo get_permalink( $post->ID )?>" class="view-btn">View</a>
                </div>    
              <?php } else{ 
                if (function_exists("convertYoutube")) {
                  $final_str='';
                  $youtube_url =  convertYoutube($video_url); 
                } 
                ?>
                <div class="img-wrap">
                  <iframe width="100%" height="170" src="<?php echo $youtube_url.$final_str; ?>" frameborder="0" allowfullscreen=""></iframe>
                  <a href="<?php echo get_permalink( $post->ID )?>" class="view-btn">View</a>
                </div>
              <?php } ?>


              <div class="data-wrwp">
                <h6><?php echo $post->post_title;?></h6>
          <?php /*?><p>
            <?php
                if (strlen($description) > 150) {
                  $stringCut = substr($description, 0, 150);
                  $endPoint = strrpos($stringCut, ' ');
                  $description = $endPoint? substr($stringCut, 0, $endPoint).'...':substr($stringCut, 0).'...';
                } 
                echo $description;
              ?>
              </p><?php */?>
            </div>
          </div>

        <?php }?>


      </div>
    </div>
  </section>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="display: block;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h6 class="modal-title" id="modtitle"></h6>
        </div>
        
        <div class="modal-body">

          <p><img id="imgx" style="width: 100%;" src="#" alt="blog img"></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>

<?php }
wp_reset_query();
?>


<!------------------Gllery End--------------->

<section class="nf-event-section">
  <div class="container">
    <div class="row">
      <div class="col-12 col-lg-4">
        <div class="nf-event-cart">
          <div class="nf-event-header">
            <h3><img src="<?php echo get_template_directory_uri(). '/assets/'?>img/home/t-icon.png"> Latest Tweets <a target="_blank" href="https://twitter.com/advancingne">View All</a></h3>
          </div>
          <div class="nf-event-body">
           <div class="nf-news-scroll">
            <!--<img src="<?php //echo get_template_directory_uri(). '/assets/'?>img/home/twitter.png" alt="twitter" class="img-fluid">-->
            <?php
            $args = array(
              'post_type'   => 'post',
              'title' =>'Latest Tweets',
              'post_status' => 'publish',
              'posts_per_page' => '1'
            );
            $the_query = new WP_Query( $args );
            ?>
            <?php if( $the_query->have_posts() ): ?>
              <?php while( $the_query->have_posts() ) : $the_query->the_post(); 
                ?>
                <?php the_content();?>

              <?php endwhile; ?>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
    <div class="col-12 col-lg-4">
      <div class="nf-event-cart">
        <div class="nf-event-header nf-header-color-2">
          <h3>Events and Competition

            <?php
            $args = array(
              'post_type'   => 'new_and_event',
              'post_status' => 'publish',
              'posts_per_page' => '15',
              'meta_key'    => 'status',
              'meta_value'  => 'Active'
            );
            $the_query = new WP_Query( $args );

            if(count($the_query->posts)>0){
              ?>
              <a href="<?php echo site_url()?>/events-competitions">View All</a></h3>
            <?php }?>
          </div>
          <div class="nf-event-body">
            <ul class="nf-news-scroll">
              <?php if( $the_query->have_posts() ): ?>
                <?php while( $the_query->have_posts() ) : $the_query->the_post();
                  $values= get_fields();

                  if($values)
                  {
                    $published_date='';
                    $laste_date='';
                    foreach($values as $key => $value)
                    {
                      if($key=='published_date'){ $published_date = $value;  } 
                      if($key=='laste_date'){ $laste_date = $value;  } 
                    }
                  }
        //if(strtotime($published_date)<=strtotime(date('Y-m-d')) && strtotime($laste_date)>=strtotime(date('Y-m-d'))){
                  ?>
                  <li><a href="<?php echo $values['link'] ?>" target="_blank"><?php the_title();?></a></li>

                  <?php //} ?>

                <?php endwhile; ?>
              <?php endif; ?>

              
            </ul>
          </div>
        </div>
      </div>
      <div class="col-12 col-lg-4">
        <div class="nf-event-cart">
          <div class="nf-event-header nf-header-color-3">
            <h3>Notices 
              <?php 
              
              $args = array(
                'post_type'   => 'notice',
                'post_status' => 'publish',
                'posts_per_page' => '5'
              );
              $the_query = new WP_Query( $args );


              if(count($the_query->posts)>0){

                ?>
                <a href="<?php echo site_url()?>/notices">View All</a></h3>
              <?php }?>
            </div>
            <div class="nf-event-body">
              <ul>

                <?php if( $the_query->have_posts() ): ?>
                  <?php while( $the_query->have_posts() ) : $the_query->the_post(); 
                    ?>
                    <li><?php the_title();?></li>

                  <?php endwhile; ?>
                <?php endif; ?>

              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="nf-faq-section">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h2 data-aos="fade-up"><img src="<?php echo get_template_directory_uri(). '/assets/'?>img/home/faq-icon.png" alt="faq-icon"> Frequently Asked Questions</h2>
          <div class="nf-faq-a-block">
            <div id="accordion">

              <?php
              // args
              $g=0;
              $args = array(
                'post_type'   => 'faq',
                'post_status' => 'publish',
                'posts_per_page' => '5',
                'order'        => 'ASC'
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
              <div class="nf-faq-more d-flex justify-content-center mt-4">
                <a href="<?php echo site_url()?>/frequently-asked-questions/" class="nf-button-v-small">View More </a>
              </div>
            <?php }?>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="nf-helpus-section">
    <div class="container">
      <div class="nf-helpus-block">
        <h2><span>Share Your Feedback</span> share with your valuable feedback</h2>
        <a href="<?php echo site_url()?>/share-your-feedback/" class="nf-button-v-small">Click Here</a>
      </div>
    </div>
  </section>

  <?php dynamic_sidebar( 'home-footer-1' ) ?>
<?php /*?>
<section class="nf-navigation-section">
  <div class="container">
    <div class="row">
      <div class="col-12 col-lg-3">
        <h4>Top Trending Courses</h4>
        <ul>
          <li><a href="#">Finding Purpose & Meaning in Life</a></li>
          <li><a href="#">Understanding Medical Research</a></li>
          <li><a href="#">Japanese for Beginners</a></li>
          <li><a href="#">Introduction to Cloud Computing</a></li>
          <li><a href="#">Foundations of Mindfulness</a></li>
          <li><a href="#">Fundamentals of Finance</a></li>
          <li><a href="#">Machine Learning</a></li>
          <li><a href="#">Machine Learning Using Sas Viya</a></li>
          <li><a href="#">The Science of Well Being</a></li>
          <li><a href="#">Covid-19 Contact Tracing</a></li>
          <li><a href="#">AI for Everyone</a></li>
          <li><a href="#">Financial Markets</a></li>
          <li><a href="#">Introduction to Psychology</a></li>
          <li><a href="#">Getting Started with AWS</a></li>
          <li><a href="#">International Marketing</a></li>
          <li><a href="#">C++</a></li>
          <li><a href="#">Predictive Analytics & Data Mining</a></li>
          <li><a href="#">UCSD Learning How to Learn</a></li>
          <li><a href="#">Michigan Programming for Everybody</a></li>
          <li><a href="#">JHU R Programming</a></li>
          <li><a href="#">Google CBRS CPI Training</a></li>
        </ul>
      </div>
      <div class="col-12 col-lg-3">
        <h4>Top Trending Sectors</h4>
        <ul>
          <li><a href="#">Natural Language Processing (NLP)</a></li>
          <li><a href="#">AI for Medicine</a></li>
          <li><a href="#">Good with Words: Writing & Editing</a></li>
          <li><a href="#">Infections Disease Modeling</a></li>
          <li><a href="#">The Pronounciation of American English</a></li>
          <li><a href="#">Software Testing Automation</a></li>
          <li><a href="#">Deep Learning</a></li>
          <li><a href="#">Python for Everybody</a></li>
          <li><a href="#">Data Science</a></li>
          <li><a href="#">Business Foundations</a></li>
          <li><a href="#">Excel Skills for Business</a></li>
          <li><a href="#">Data Science with Python</a></li>
          <li><a href="#">Finance for Everyone</a></li>
          <li><a href="#">Communication Skills for Engineers</a></li>
          <li><a href="#">Sales Training</a></li>
          <li><a href="#">Career Brand Management</a></li>
          <li><a href="#">Wharton Business Analytics</a></li>
          <li><a href="#">Penn Positive Psychology</a></li>
          <li><a href="#">Washington Machine Learning</a></li>
          <li><a href="#">CalArts Graphic Design</a></li>
        </ul>
      </div>
      <div class="col-12 col-lg-3">
        <h4>Top universities aboard</h4>
        <ul class="">
          <li><a href="#">Professional Certificates</a></li>
          <li><a href="#">MasterTrack Certificates</a></li>
          <li><a href="#">Google IT Support</a></li>
          <li><a href="#">IBM Data Science</a></li>
          <li><a href="#"> Google Cloud Data Engineering</a></li>
          <li><a href="#">IBM Applied AI</a></li>
          <li><a href="#">Google Cloud Architecture</a></li>
          <li><a href="#">IBM Cybersecurity Analyst</a></li>
          <li><a href="#">Google IT Automation with Python</a></li>
          <li><a href="#">IBM z/OS Mainframe Practitioner</a></li>
          <li><a href="#">UCI Applied Project Management</a></li>
          <li><a href="#">Instructional Design Certificate</a></li>
          <li><a href="#">Construction Engineering and Management Certificate</a></li>
          <li><a href="#">Big Data Certificate</a></li>
          <li><a href="#">Machine Learning for Analytics Certificate</a></li>
          <li><a href="#">Innovation Management & Entrepreneurship Certificate</a></li>
          <li><a href="#">Sustainabaility and Development Certificate</a></li>
          <li><a href="#">Social Work Certificate</a></li>
          <li><a href="#">AI and Machine Learning Certificate</a></li>
        </ul>
      </div>
      <div class="col-12 col-lg-3">
        <h4>Degree Programs</h4>
        <ul class="">
          <li><a href="#">Computer Science Degrees</a></li>
          <li><a href="#">Business Degrees</a></li>
          <li><a href="#">Public Health Degrees</a></li>
          <li><a href="#">Data Science Degrees</a></li>
          <li><a href="#">Bachelor's Degrees</a></li>
          <li><a href="#">Bachelor of Computer Science</a></li>
          <li><a href="#">MS Electrical Engineering</a></li>
          <li><a href="#">Bachelor Completion Degree</a></li>
          <li><a href="#">MS Management</a></li>
          <li><a href="#">MS Computer Science</a></li>
          <li><a href="#">MPH</a></li>
          <li><a href="#">Accounting Master's Degree</a></li>
          <li><a href="#">MCIT</a></li>
          <li><a href="#">MBA Online</a></li>
          <li><a href="#">Master of Applied Data Science</a></li>
          <li><a href="#">Global MBA</a></li>
          <li><a href="#">Master's of Innovation & Entre\p</a></li>
          <li><a href="#">MCS Data Science</a></li>
          <li><a href="#">Master's in Computer Science</a></li>
          <li><a href="#">Master's in Public Health</a></li>
        </ul>
      </div>
    </div>
    <div class="row">
      <div class="col-12 col-lg-3">
        <h4> Important Links</h4>
        <ul>
          <li><a href="#">Ministry of DoNER</a></li>
          <li><a href="#">Northeastern Council(NEC)</a></li>
          <li><a href="#">Startup India</a></li>
          <li><a href="#">National Career Service Portal</a></li>
          <li><a href="#">National Career Service Portal</a></li>
          <li><a href="#">National Scholarship Portal </a></li>
          <li><a href="#">NEDFi</a></li>
          <li><a href="#">Ministry of Skill Development</a></li>
          <li><a href="#">AGNIi portal</a></li>
          <li><a href="#">National Portal of India</a></li>
          <li><a href="#">Make in India</a></li>
        </ul>
      </div>
      <div class="col-12 col-lg-3">
        <h4> Forum</h4>
        <ul>
          <li><a href="#">Learners</a></li>
          <li><a href="#"> Partners</a></li>
          <li><a href="#"> Developers</a></li>
          <li><a href="#"> Beta Testers</a></li>
          <li><a href="#"> Translators</a></li>
          <li><a href="#"> Blog</a></li>
          <li><a href="#">Tech Blog</a></li>
          <li><a href="#"> Teaching Center</a></li>
        </ul>
      </div>
      <div class="col-12 col-lg-3">
        <h4> More</h4>
        <ul>
          <li><a href="#">Press</a></li>
          <li><a href="#">Privacy Policy</a></li>
          <li><a href="#">Terms</a></li>
          <li><a href="#">Privacy</a></li>
          <li><a href="#">Help</a></li>
          <li><a href="#">Accessibility</a></li>
          <li><a href="#">Contact</a></li>
          <li><a href="#">Articles</a></li>
          <li><a href="#">Directory</a></li>
          <li><a href="#">Affiliates</a></li>
        </ul>
      </div>
      <div class="col-12 col-lg-3">
        <div class="nf-app-button-wrap">
          <a href="#">
            <img src="<?php  echo get_template_directory_uri(). '/assets/'?>img/home/app-1.png" alt="app-1">
          </a>
          <a href="#">
            <img src="<?php  echo get_template_directory_uri(). '/assets/'?>img/home/app-2.png" alt="app-1">
          </a>
        </div>
      </div>
    </div>
  </div>
</section>
<?php */?>

<?php get_footer(); ?>

<script src="js/swiper-bundle.min.js"></script>

<script>
  var swiper = new Swiper(".mySwiper", {
    slidesPerView: 1,
    spaceBetween: 10,
    centeredSlides: true,
    loop: false,
   
  },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    breakpoints: {
      360: {
      slidesPerView: 1,
   
    },  
    480: {
      slidesPerView: 2,
      spaceBetween: 10,
    },
    768: {
      slidesPerView: 2,
      spaceBetween: 20,
    },
    1024: {
      slidesPerView: 3,
      spaceBetween: 20,
    },
    1200: {
      slidesPerView: 5,
      spaceBetween: 10,
    },
  },
  });
</script>

<script>https://code.jquery.com/jquery-3.6.0.min.js"</script>

<!--testimonial video popup script-->
<script>

$(document).ready(function() {
  $('.vid-slider .vid').on('click', function() {
    var video_link = $(this).data('video-link'); // Get the video link from the data attribute

    if (typeof video_link === 'undefined' || !video_link) {
      console.error('Video link is undefined or empty');
      return;
    }

    try {
      var video_id = video_link.split('/').pop(); // Extract the video ID from the URL
    } catch (error) {
      console.error('Error extracting video ID:', error);
      return;
    }

    var iframe_src = 'https://www.youtube.com/embed/' + video_id + '?autoplay=1&rel=0';

    var iframe = $(this).find('.video-popup'), // Target only the iframe related to the clicked image
        iframe_video = $(this).find('.video-popup iframe'), // Target the specific iframe
        close_btn = $(this).find('.close-video'); // Target the specific close button

    $('.video-popup').not(iframe).removeClass('show-video').fadeOut(); // Hide all other iframes
    $('.video-popup iframe').not(iframe_video).attr('src', ''); // Stop all other videos

    $(iframe_video).attr('src', iframe_src);
    $(iframe).fadeIn().addClass('show-video');

    $(document).on('click', function(e) {
      if ($(iframe).is(e.target) || $(close_btn).is(e.target)) {
        $(iframe).removeClass('show-video').fadeOut();
        $(iframe_video).attr('src', ''); // Stop the video
      }
    });
  });
});


//   $(document).ready(function() {
// 	$('.vid-slider .vid').on('click', function() {
//   // get required DOM Elements
//   var iframe_src = $(this).children('iframe').attr('src'),
//         iframe = $('.video-popup'),
//         iframe_video = $('.video-popup iframe'),
//         close_btn = $('.close-video');
//         iframe_src = iframe_src + '?autoplay=1&rel=0'; // for autoplaying the popup video
        
//   // change the video source with the clicked one
//   $(iframe_video).attr('src', iframe_src);
//   $(iframe).fadeIn().addClass('show-video');
		
//   // remove the video overlay when clicking outside the video
//   $(document).on('click', function(e) {
//     if($(iframe).is(e.target) || $(close_btn).is(e.target)) {
//     $(iframe).removeClass('show-video');
//     $(iframe_video).attr('src', '');
//   }
// 		});
		
// 	});
  
// });
</script>
<!--testimonial script ends-->
<!--client story script start-->
<script>
   var swiper = new Swiper(".client-story", {
    slidesPerView: 5,
    spaceBetween: 20,
    centeredSlides: true,
    loop: true,
    autoplay: {
    delay: 2000,
  },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    breakpoints: {
      360: {
      slidesPerView: 1,
      
    },  
    480: {
      slidesPerView: 1,
      spaceBetween: 30,
    },
    768: {
      slidesPerView: 2,
      spaceBetween: 20,
    },
    1024: {
      slidesPerView: 3,
      spaceBetween: 20,
    },
    1200: {
      slidesPerView: 4,
      spaceBetween: 20,
    },
  },
  });
</script>

<script type="text/javascript"> 
  $(".close-sign").click(function() {
    $(".nedfi_event").addClass("hide-sign");
  });
/*$(document).ready(function () {
        $curtainopen = false;
        $(".rope").click(function () {
            $(this).blur();
            if ($curtainopen == false) {  
                $(this).stop().animate({
                    top: '0px'
                }, {
                    queue: false,
                    duration: 600,
                    easing: 'easeOutBounce'
                });
                $(".leftcurtain").stop().animate({
                    width: '0'
                }, 3500);
                $(".rightcurtain").stop().animate({
                    width: '0'
                }, 3500);
                $curtainopen = true;

                
                
var delayInMilliseconds = 3500; //1 second

setTimeout(function() {
  $("body").removeClass("launchpage-height");
  //your code to be executed after 1 second
}, delayInMilliseconds);
            } else { 
                // $(this).stop().animate({
                //     top: '0px'
                // }, {
                //     queue: false,
                //     duration: 600,
                //     easing: 'easeOutBounce'
                // });
                // $(".leftcurtain").stop().animate({
                //     width: '50%'
                // }, 15000);
                // $(".rightcurtain").stop().animate({
                //     width: '50%'
                // }, 15000);

                // $curtainopen = false;
            }
            return false;
        });
      
    });*/
</script>

<script> 

  function copyLinkFunction(id) {
  /* Get the text field */

    var videoLink = document.getElementById("copylink"+id);

    videoLink.setAttribute('type','text');

  /* Select the text field */
    videoLink.select();
  //videoLink.setSelectionRange(0, 99999); /* For mobile devices */
//alert(id);
  /* Copy the text inside the text field */
    document.execCommand("copy");

    videoLink.setAttribute('type','hidden');

   /* Alert the copied text */
  //alert("Copied the text: " + videoLink.value);
    Swal.fire(
      'Link Copied',
      videoLink.value,
      'success'
      )
  }

//============pause video
/*$(function(){
    $('.slick-next').click(function(){      
        $('#mvideo1').attr('src', $('#mvideo1').attr('src'));
        $('#mvideo2').attr('src', $('#mvideo2').attr('src'));
        $('#mvideo3').attr('src', $('#mvideo3').attr('src'));
    });
});
$(function(){
    $('.slick-prev').click(function(){      
        $('#mvideo1').attr('src', $('#mvideo1').attr('src'));
        $('#mvideo2').attr('src', $('#mvideo2').attr('src'));
        $('#mvideo3').attr('src', $('#mvideo3').attr('src'));
    });
});*/
//============pause video end
//================
  
/*(function($){
    $(window).on("load",function(){
      
      setTimeout(function(){
        $('.page-loader').fadeOut('slow');
        },200);

      var content=$(".nf-news-scroll"),autoScrollTimer=10000,autoScrollTimerAdjust,autoScroll;
      
      content.mCustomScrollbar({
        scrollButtons:{enable:true},
        callbacks:{
          whileScrolling:function(){
            autoScrollTimerAdjust=autoScrollTimer*this.mcs.topPct/100;
          },
          onScroll:function(){ 
            if($(this).data("mCS").trigger==="internal"){AutoScrollOff();}
          }
        }
      });
      
      content.addClass("auto-scrolling-on auto-scrolling-to-bottom");
      AutoScrollOn("bottom");
      
      $(".auto-scrolling-toggle").click(function(e){
        e.preventDefault();
        if(content.hasClass("auto-scrolling-on")){
          AutoScrollOff();
        }else{
          if(content.hasClass("auto-scrolling-to-top")){
            AutoScrollOn("top",autoScrollTimerAdjust);
          }else{
            AutoScrollOn("bottom",autoScrollTimer-autoScrollTimerAdjust);
          }
        }
      });
      
      function AutoScrollOn(to,timer){
        if(!timer){timer=autoScrollTimer;}
        content.addClass("auto-scrolling-on").mCustomScrollbar("scrollTo",to,{scrollInertia:timer,scrollEasing:"easeInOutSmooth"});
        
        autoScroll=setTimeout(function(){
          if(content.hasClass("auto-scrolling-to-top")){
            AutoScrollOn("bottom",autoScrollTimer-autoScrollTimerAdjust);
            content.removeClass("auto-scrolling-to-top").addClass("auto-scrolling-to-bottom");
          }else{
            AutoScrollOn("top",autoScrollTimerAdjust);
            content.removeClass("auto-scrolling-to-bottom").addClass("auto-scrolling-to-top");
          }
        },timer);
      }
      
      function AutoScrollOff(){
        clearTimeout(autoScroll);
        content.removeClass("auto-scrolling-on").mCustomScrollbar("stop");
      }
      
    });
})(jQuery);*/
</script> 
