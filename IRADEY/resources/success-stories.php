<?php /*Template Name: success stories */ ?>
<?php get_header();
$page_data = get_page_by_path( 'success-stories' );
?>
  <!-- inner-banner-start -->
  <div class="inner-banner">
    <div class="container">
      <div class="banner-title">
        <h3><?php echo $page_data->post_title;?> </h3>
        <ul class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Resources</a></li>
          <li class="breadcrumb-item active"> <?php echo $page_data->post_title;?></li>
        </ul>
      </div>
      <div class="banner-content">
        <div class="row">
          <div class="col-md-4 banner-img pr-0"><?php echo get_the_post_thumbnail(); ?></div>
          <div class="col-md-8  pl-0">
            <div class="bannerbg nf-gradient_2 justify-content-start pt-3 nf-height-100">
              <!-- <h4 class="nf-f-size-24 nf-color-m-grey"><?php echo $page_data->post_title;?></h4> -->
              <h5 class="nf-color-m-grey"><?php echo $page_data->post_content;?></h5>
              <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/layers-bg.png" alt="layers background" class="nf-layes-bg">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- inner-banner-end -->
  <!-- Study tour in north section  -->
  <form method="post" action="<?php echo site_url()?>/success-stories-details/">
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
             <!--  <label>Find Internship by Location</label> -->
              <div class="nf-select-wrap">
                <div class="nf-select-img">
                  <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/state.png" alt="state">
                  <span>State</span>
                </div>
                <div class="nf-select-field">
                  <?php 
                    $var = get_field_object('field_60d428da876b5');
                  ?>
                  <select class="form-control selectpicker" name="state" id="state">
                     <option value="">Select State</option>
                        <?php foreach($var['choices'] as $choice) { ?>
                          <option value="<?php echo $choice; ?>"><?php echo $choice; ?></option>';
                        <?php } ?>
                  </select>
                </div>
              </div>
              <span id="error_msg1" style="color: red;"></span>
            </div>
            <div class="col-12 col-md-6 col-xl-4">
              <!-- <label>Find Internship by Industry</label> -->
              <div class="nf-select-wrap">
                <div class="nf-select-img">
                  <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/department.png" alt="department">
                  <span>Sectors</span>
                </div>
                <div class="nf-select-field">
                  <?php 
                    $var = get_field_object('field_60d4291c876b7');
                  ?>
                  <select class="form-control selectpicker" name="sectors" id="sectors">
                     <option value="">Select Sector</option>
                        <?php foreach($var['choices'] as $choice) { ?>
                          <option value="<?php echo $choice; ?>"><?php echo $choice; ?></option>';
                        <?php } ?>
                  </select>
                </div>
              </div>
              <span id="error_msg2" style="color: red;"></span>
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
           <button type="submit" class="nf-button-v-small" >
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
  <script type="text/javascript">
  function validation_function()
 {
    var error_msg1 = document.getElementById("error_msg1");
    var error_msg2 = document.getElementById("error_msg2");

    error_msg1.textContent = "";
     error_msg2.textContent = "";


       if($('#state').val()=='' )
       {
           error_msg1.textContent = "*Please select state";
           return false;
       }

      else if($('#sectors').val()=='' )
       {
           error_msg2.textContent = "*Please select sector";
           return false;
       }
  }
</script>