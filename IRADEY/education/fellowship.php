<?php /* Template Name: fellowship */
 ?>
<?php get_header(); 

$category_id = get_cat_ID ('Fellowship');
$categories = get_category( $category_id );

$page_data = get_page_by_path( 'fellowships' );
?>

    <!-- inner-banner-start -->
    <div class="inner-banner">
      <div class="container">
        <div class="banner-title">
          <h3><?php echo $page_data->post_title;?> </h3>
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Education</a></li>
            <li class="breadcrumb-item active"><?php echo $page_data->post_title;?></li>
          </ul>
        </div>

        <div class="banner-content">
          <div class="row">
            <?php $url = wp_get_attachment_url( get_post_thumbnail_id($post_id) );?>
            <div class="col-md-4 banner-img pr-0"><img src="<?php echo $url?>"></div>
            <div class="col-md-8  pl-0">
              <div class="bannerbg nf-banner-parrot justify-content-start pt-3 nf-height-100">
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
    <form method="post" action="<?php echo site_url()?>/fellowship-list/">
      <input type="hidden" name="location" id="location" value="India">
    <div class="inner-body">
      <div class="container">
        <div class="national-level icon-text-box">
          <div class="row mb-2">
            <div class="col-md-8">
              <h4 class="nf-f-size-20 nf-strong">Select Options</h4>
            </div>
          </div>

          <div class="nf-navtab-sec nf-felloship">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" data-toggle="pill" href="#pills-india" onclick="document.getElementById('location').value = 'India'"><img src="<?php echo get_template_directory_uri(). '/assets/'?>img/education/india-sm.png" alt="India Map"> India</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="pill" href="#pills-india" onclick="document.getElementById('location').value = 'Abroad'"><img src="<?php echo get_template_directory_uri(). '/assets/'?>img/education/abroad-sm.png"> Abroad</a>
              </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
             
              <div class="tab-pane fade show active" id="pills-india" role="tabpanel">
                <div class="nf-form-wrap">
                  <div class="row">                
                    <div class="col-12 col-md-6 col-xl-5">
                      <div class="nf-select-wrap">
                        <div class="nf-select-img">
                          <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/study.png" alt="study">
                          <span>Category</span>
                        </div>
                        <div class="nf-select-field">
                          <?php 
                              $var = get_field_object('field_60c9c203d11ff');
                              ?>
                              <select class="form-control selectpicker" name="category">
                                <option value="">Select Category</option>
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
                    <?php /*?><div class="col-12 col-md-6 col-xl-5">
                      <div class="nf-select-wrap">
                        <div class="nf-select-img">
                          <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/choices.png" alt="choices">
                          <span>Type Of Fellowship</span>
                        </div>
                        <div class="nf-select-field">
                          <?php 
                              $var = get_field_object('field_60c9c250d1200');
                              ?>
                              <select class="form-control selectpicker" name="type">
                                <option value="">Select Category</option>
                                <?
                                foreach($var['choices'] as $choice)
                                {
                                  echo '<option value="'.$choice.'">'.$choice.'</option>';
                                }
                                ?>
                              </select>
                        </div>
                      </div>
                    </div><?php */?>
                  </div>
                </div>
              </div>
              <!--<div class="tab-pane fade" id="pills-abroad" role="tabpanel">
                <div class="nf-form-wrap">
                  <div class="row">                
                    <div class="col-12 col-md-6 col-xl-5">
                      <div class="nf-select-wrap">
                        <div class="nf-select-img">
                          <img src="<?php //echo get_template_directory_uri(). '/assets/'?>img/study-in-north/study.png" alt="study">
                          <span>Category</span>
                        </div>
                        <div class="nf-select-field">
                          <select class="form-control selectpicker">
                            <option>Select Level</option>
                            <option>Level 1</option>
                            <option>Level 2</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="col-12 col-md-6 col-xl-5">
                      <div class="nf-select-wrap">
                        <div class="nf-select-img">
                          <img src="<?php //echo get_template_directory_uri(). '/assets/'?>img/study-in-north/choices.png" alt="choices">
                          <span>Type Of Fellowship</span>
                        </div>
                        <div class="nf-select-field">
                          <select class="form-control selectpicker">
                            <option>Select Level</option>
                            <option>Level 1</option>
                            <option>Level 2</option>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>-->
            </div>
          </div>


        </div>
      </div>
    </div>
    <div class="nf-circle-bg-img">
      <div class="container">
        <div class="row">
          <div class="col-12 nf-button-wrapper">
            <button type="submit" class="nf-button-v-small">
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
