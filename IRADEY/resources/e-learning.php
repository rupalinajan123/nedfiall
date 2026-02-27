<?php /*Template Name: e-learning */ ?>
<?php get_header();
$page_data = get_page_by_path( 'e-learning' );
?>
    <!-- inner-banner-start -->
    <div class="inner-banner">
      <div class="container">
        <div class="banner-title">
          <h3><?php echo $page_data->post_title;?></h3>
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Resources</a></li>
            <li class="breadcrumb-item active"><?php echo $page_data->post_title;?></li>
          </ul>
        </div>
        <div class="banner-content">
          <div class="row">
            <div class="col-md-4 banner-img pr-0"><?php echo get_the_post_thumbnail(); ?></div>
            <div class="col-md-8  pl-0">
              <div class="bannerbg nf-gradient_1 justify-content-start pt-3 nf-height-100">
                <!-- <h4 class="nf-f-size-24"><?php echo $page_data->post_title;?></h4> -->
                <h4 class="nf-f-size-20"><?php echo $page_data->post_content;?> </h4>
                <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/layers-bg.png" alt="layers background" class="nf-layes-bg">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- inner-banner-end -->
    <!-- Study tour in north section  -->
    <form method="post" action="" id="e-learning">
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
                <div class="nf-select-wrap">
                  <div class="nf-select-img">
                    <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/department.png" alt="department">
                    <span>Sectors</span>
                  </div>
                  <div class="nf-select-field">
                    <?php 
                      $var = get_field_object('field_60d6cd69119e1');
                      ?>
                      <select class="form-control selectpicker" name="sectors" id="sectors">
                        <option value="">Select Sectors</option>
                        <?
                        foreach($var['choices'] as $choice)
                        {
                          echo '<option value="'.$choice.'">'.$choice.'</option>';
                        }
                        ?>
                    </select>
                  </div>
                </div>
                <span id="error_msg" style="color: red;"></span>
              </div>
              <div class="col-12 col-md-6 col-xl-3">
                    <div class="nf-radio-wrap mb-4">
                        <div class="custom-control custom-radio custom-control-inline pl-0">
                            <input type="radio" id="customRadioInline1" name="region" class="custom-control-input" value="India" checked>
                            <label class="custom-control-label" for="customRadioInline1">India</label>
                        </div>
                    </div>
                </div>
              <div class="col-12 col-md-6 col-xl-3">
                    <div class="nf-radio-wrap mb-4">
                        <div class="custom-control custom-radio custom-control-inline pl-0">
                            <input type="radio" id="customRadioInline2" name="region" class="custom-control-input" value="Global">
                            <label class="custom-control-label" for="customRadioInline2">Global</label>
                        </div>
                    </div>
                </div>
            </div>
          </div>
          <div class="nf-form-wrap mt-4 nf-top-border">
          <div class="row">
            <div class="col-12 col-md-6 col-xl-3">
                    <div class="nf-radio-wrap mb-4">
                        <div class="custom-control custom-radio custom-control-inline pl-0">
                            <input type="radio" id="customRadioInline3" name="region" class="custom-control-input" value="act_north_east">
                            <label class="custom-control-label" for="customRadioInline3">Advancing North East Dialogue</label>
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
            <button type="submit" class="nf-button-v-small submitBtn" >
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
      var error_msg = document.getElementById("error_msg");
     
      
      error_msg.textContent = "";
      
       
      if($('#sectors').val()=='')
      {
           
          error_msg.textContent = "*Please select Sector";
          return false;
      }
       

  }

  $(document).on('click', '.submitBtn', function() {
    var siteurl = '<?php echo site_url() ?>/'; 
    var radioValue = $("input[name='region']:checked").val();

    if(radioValue == 'India' || radioValue == 'Global')
    {
      $('#e-learning').attr('action',siteurl+'e-learning-details'); 
    }
    if(radioValue == 'act_north_east')
    {
      $('#e-learning').attr('action',siteurl+'act-north-east-dialogue'); 
    }
  });
</script>