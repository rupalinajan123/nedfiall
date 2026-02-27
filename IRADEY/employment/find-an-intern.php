<?php /*Template Name: Find an Intern */ ?>
<?php get_header(); 

$page_data = get_page_by_path( 'find-an-intern' );
?>

<!-- header-end -->
<!-- inner-banner-start -->
<div class="inner-banner">
<div class="container">
<div class="banner-title">
  <h3><?php echo $page_data->post_title;?> <!-- <a href="#" class="changeTopic">Change Exam</a> --></h3>
  <ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Employment</a></li>
    <li class="breadcrumb-item"><a href="#">Internships</a></li>
    <li class="breadcrumb-item active"><?php echo $page_data->post_title;?></li>
  </ul>
</div>
<div class="banner-content">
  <div class="row">
    <?php $url = wp_get_attachment_url( get_post_thumbnail_id($post_id) );?>
    <div class="col-md-4 banner-img pr-0"><img src="<?php echo $url?>"></div>
    <div class="col-md-8  pl-0">
      <div class="bannerbg nf-gradient-2 justify-content-start pt-3 nf-height-100">
        <!-- <h4 class="nf-f-size-24"><?php echo $page_data->post_title;?></h4> -->
        <h5 class="nf-f-size-24"><?php echo $page_data->post_content;?></h5>
        <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/layers-bg.png" alt="layers background" class="nf-layes-bg">
      </div>
    </div>
  </div>
</div>
</div>
</div>
<!-- inner-banner-end -->
<!-- Study tour in north section  -->
<form method="post" action="<?php echo site_url()?>/find-an-intern-details/">
<div class="inner-body">
<div class="container">
<div class="national-level icon-text-box">
  <div class="row mb-2">
    <div class="col-md-8">
      <h4 class="nf-f-size-20 nf-strong">Select Options</h4>
    </div>
  </div>
  <div class="nf-form-wrap">
    <div class="row">
      <div class="col-12 col-md-6 col-xl-4">
        <label>Find an Internship by Location</label>
                  <div class="nf-select-wrap">
                    <div class="nf-select-img">
                      <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/state.png" alt="state">
                      <span>State</span>
                    </div>
                    <div class="nf-select-field">

                      <?php 
                      $var = get_field_object('field_60d6c3e559268');
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
                    <label>Find an Internship by Industry</label>
                    <div class="nf-select-wrap">
                      <div class="nf-select-img">
                        <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/department.png" alt="department">
                        <span>Industry</span>
                      </div>
                      <div class="nf-select-field">
                      <?php 
                      $var = get_field_object('field_60d6c40359269');
                      ?>
                      <select class="form-control selectpicker" name="dept">
                        <option value="">Select Industry</option>
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
                  Apply
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