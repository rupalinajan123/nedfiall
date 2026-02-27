<?php /* Template Name: Higher education India */

if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
$url = "https://";else $url = "http://";
$url.= $_SERVER['HTTP_HOST'];   
$url.= $_SERVER['REQUEST_URI'];
$url = explode('?',$url);   
$course = str_replace('-',' ',$url[1]);
if($course=='')
{  
      wp_redirect(site_url());
      exit; 
}
?>
<?php get_header(); 

$page_data = get_page_by_path( 'higher-education-india' ); 
?>
<!-- /end header-bottom -->

    <!-- inner-banner-start -->
    <div class="inner-banner">
        <div class="container">
            <div class="banner-title">
                <h3><?php echo $page_data->post_title;?></h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Education</a></li>
                    <li class="breadcrumb-item"><a href="#">Higher Education India</a></li>
                    <li class="breadcrumb-item active"><a href="#"><?php echo $course?></a></li>
                    
                </ul>
            </div>

            <div class="banner-content">
                <div class="row">
                  <?php $url = wp_get_attachment_url( get_post_thumbnail_id($post_id) );?>
                    <div class="col-md-4 banner-img pr-0"><img src="<?php echo $url?>"></div>
                    <div class="col-md-8  pl-0">
                      <div class="bannerbg nf-gradient-2 justify-content-start pt-3 nf-height-100">
                        <!--<h4 class="nf-f-size-24"><?php //echo $page_data->post_title;?></h4>-->
                        <h4 class="nf-f-size-24"><?php echo $page_data->post_content;?></h4>
                        <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/layers-bg.png" alt="layers background" class="nf-layes-bg">
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- inner-banner-end -->
   <!-- Study tour in north section  -->
   <form method="post" action="<?php echo site_url()?>/higher-education-india-list/">
    <input type="hidden" name="course" id="course" value="<?php echo $course;?>">
      <div class="inner-body">
        <div class="container">
          <div class="national-level icon-text-box">
            <div class="row mb-2">
              <div class="col-md-8">
                <h4 class="nf-f-size-20 nf-strong">Select Career Options</h4>
              </div>
            </div>
            <div class="nf-form-wrap">
              <div class="row">
                <div class="col-12 col-md-6 col-xl-4">
                  <div class="nf-select-wrap">
                    <div class="nf-select-img">
                      <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/state.png" alt="state">
                      <span>State</span>
                    </div>
                    <div class="nf-select-field">

                      <?php 
                      $var = get_field_object('field_60b23a93b3052');
                      ?>
                      <select class="form-control selectpicker" name="state">
                        <option value="">Select State</option>
                        <?
                        foreach($var['choices'] as $choice)
                        {
                          echo '<option value="'.$choice.'">'.$choice.'</option>';
                        }
                        ?>
                      </select>
                    </div>
                  </div>
                </div>

                  <div class="col-12 col-md-6 col-xl-4">
                    <div class="nf-select-wrap">
                      <div class="nf-select-img">
                        <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/icon/subject.png" alt="department">
                        <span>Subject</span>
                      </div>
                      <div class="nf-select-field">
                      <?php
                      if($course=='Science and Math') $keyvalue = 'field_60fbd7d2bb2ad';
                      if($course=='Law') $keyvalue = 'field_60fbb1e99fe7f';
                      if($course=='Medical and Allied sciences') $keyvalue = 'field_60fbd80ebb2ae';
                      if($course=='Engineering and Technology') $keyvalue = 'field_60fbd83cbb2af';
                      if($course=='Architecture and Planning') $keyvalue = 'field_60fbd85cbb2b0';
                      if($course=='Art and Design') $keyvalue = 'field_60fbd882bb2b1';
                      if($course=='Commerce, Accounts and Finance') $keyvalue ='field_60fbd8a3bb2b2';
                      if($course=='Business and Management Studies') $keyvalue='field_60fbd8c0bb2b3';
                      if($course=='Media and Mass Communication') $keyvalue = 'field_60fbd8dbbb2b4';
                      if($course=='Social Sciences and Liberal Studies') $keyvalue = 'field_60fbd8fabb2b5';
                      if($course=='Hospitality and Tourism') $keyvalue = 'field_60fbd91abb2b6';
                      if($course=='Education and Teaching') $keyvalue = 'field_60fbd937bb2b7';
                      if($course=='University Entrance Exams') $keyvalue = 'field_60fbd94bbb2b8';


                      $var = get_field_object($keyvalue);
                      ?>
                      <select class="form-control selectpicker" name="subject">
                        <option value="">Select Subject</option>
                        <?
                        foreach($var['choices'] as $choice)
                        {
                          echo '<option value="'.$choice.'">'.$choice.'</option>';
                        }
                        ?>
                      </select>
                      </div>
                    </div>
                  </div>
                  
                  
              </div>
            </div>
          </div>
        </div>
      </div>

        <div class="nf-circle-bg-img">
          <div class="container">
            <div class="row">
              <div class="col-12 nf-button-wrapper">
                <button class="nf-button-v-small" type="submit">
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
