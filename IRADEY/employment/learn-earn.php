<?php /*Template Name: Learn & Earn */ 

if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
$url = "https://";else $url = "http://";
$url.= $_SERVER['HTTP_HOST'];   
$url.= $_SERVER['REQUEST_URI'];
$url = explode('?',$url); 
$url = explode('&loginerror',$url[1]);  
$sector = str_replace('-',' ',$url[0]);
if($sector=='')
{  
      wp_redirect(site_url());
      exit; 
}
?> 

<?php get_header(); 

$page_data = get_page_by_path( 'learn-and-earn' );
?>
  <!-- header-end -->
  <!-- inner-banner-start -->
  <div id="preloader-loader" style="display:none;"></div>
  <div class="inner-banner">
    <div class="container">
      <div class="banner-title">
        <h3><?php echo $sector;?> <!-- <a href="#" class="changeTopic">Change Exam</a> --></h3>
        <ul class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Employment</a></li>
          <li class="breadcrumb-item"><a href="#">Learn and Earn </a></li>
          <li class="breadcrumb-item active"><?php echo $sector;?></li>
        </ul>
      </div>
      <div class="banner-content">
        <div class="row">
          <?php $url = wp_get_attachment_url( get_post_thumbnail_id($post_id) );?>
          <div class="col-md-4 banner-img pr-0"><img src="<?php echo $url?>"></div>
          <div class="col-md-8  pl-0">
            <div class="bannerbg nf-gradient-learnearn justify-content-start pt-3 nf-height-100">
              <h4 class="nf-f-size-24"><?php echo $sector;?></h4>
              <h4 class="nf-f-size-24 text-white"><?php echo $page_data->post_content;?></h4>
              <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/layers-bg.png" alt="layers background" class="nf-layes-bg">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- inner-banner-end -->
  <!-- Study tour in north section  -->
 
  <form method="post" action="<?php echo site_url()?>/learn-and-earn-details">
  <!--<input type="hidden" name="sector" id="sector" value="<?php //echo $sector;?>"> -->
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
             <!--  <label>Select Options</label> -->
              <div class="nf-select-wrap">
                <div class="nf-select-img">
                  <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/state.png" alt="state">
                  <span>State</span>
                </div>
                <div class="nf-select-field">
                  <?php 
                      $var = get_field_object('field_60d4229160436');
                      ?>
                      <select class="form-control selectpicker" name="state" id="state">
                        <option value="">Select state</option>
                        <?php
                        foreach($var['choices'] as $choice)
                        {
                          echo '<option value="'.$choice.'">'.$choice.'</option>';
                        }
                        ?>
                      </select>
                </div>
              </div>
              <span id="error_msg1" style="color: red;"></span>
            </div>
			 <div class="col-12 col-md-6 col-xl-4" style="display: none;">
             
              <div class="nf-select-wrap">
                <div class="nf-select-img">
                  <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/department.png" alt="department">
                  <span>Sector</span>
                </div>
                <div class="nf-select-field">
                  <?php 
                      $var = get_field_object('field_60d422f160437');
                      ?>
                      <select class="form-control selectpicker" name="sector" id="sector">
                        <option value="">Select Sector</option>
                        <?php
                        $sel='';
                        foreach($var['choices'] as $choice)
                        {
                          if($sector==$choice) $sel='selected';else $sel='';
                          echo '<option '.$sel.' value="'.$choice.'">'.$choice.'</option>';
                        }
                        ?>
                      </select>
                </div>
              </div>
              <span id="error_msg2" style="color: red;"></span>  
        </div>  




			<div class="col-12 col-md-6 col-xl-4">
             <!--  <label>Select Options</label> -->
              <div class="nf-select-wrap">
                <div class="nf-select-img">
                  <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/employment/book.png" alt="book">
                  <span>Courses Offered</span>
                </div>
                <div class="nf-select-field">
                  <?php 
                      $var = get_field_object('field_60d4234c60438');
                      ?>
                      <select class="form-control selectpicker" name="course" id="course">
                        <option value="">Select Course</option>
                        <?php
                        foreach($var['choices'] as $choice)
                        {
                          echo '<option value="'.$choice.'">'.$choice.'</option>';
                        }
                        ?>
                      </select>
                </div>
              </div>
               <span id="error_msg3" style="color: red;"></span>
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
          <!-- <button type="submit" class="nf-button-v-small">
            Apply
          </button> -->

          <button class="nf-button-v-small submitBtn" type="submit" onclick="return validation_function()">
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

    <script type="text/javascript">
/*function validation_function()
   {
      var error_msg1 = document.getElementById("error_msg1");
      var error_msg2 = document.getElementById("error_msg2");
      var error_msg3 = document.getElementById("error_msg3");

      error_msg1.textContent = "";
      error_msg2.textContent = "";
      error_msg3.textContent = "";
      var flag=true;

       if($('#state').val()=='')
       {
           // alert('hjghj');
           error_msg1.textContent = "*Please select state";
           flag= false;
       }

      if($('#sector').val()=='')
       {
           // alert('hjghj');
           error_msg2.textContent = "*Please select sector";
           flag= false;
       }

        if($('#course').val()=='')
       {
           // alert('hjghj');
           error_msg3.textContent = "*Please select course";
           flag= false;
       }
       return flag;
       }*/

       $('#state').change(function(){
          $('#preloader-loader').css("display", "block");

          $.ajax({
              data: {"state": $('#state').val(), 'action': 'my_action_get_learnearn','sector':'<?php echo $sector;?>'},
              url: "<?php echo site_url()?>/wp-admin/admin-ajax.php",
              type: "post",
              success: function(data) {
                 //alert(data);
                 
                 $('#course').html(data);
                 $('.selectpicker').selectpicker({ noneSelectedText : 'Select' });
                 $('.selectpicker').selectpicker('refresh');
                 $('#preloader-loader').css("display", "none");
              }
          });
      });
</script>
<style type="text/css">
  #preloader-loader {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    z-index: 9999;
    overflow: hidden;
    background: rgba(0,0,0,0.5);
    }
    #preloader-loader:before {
        content: "";
        position: fixed;
        top: calc(50% - 30px);
        left: calc(50% - 30px);
        border: 6px solid #f2f2f2;
        border-top: 6px solid #c80032;
        border-radius: 50%;
        width: 60px;
        height: 60px;
        -webkit-animation: animate-preloader 1s linear infinite;
        animation: animate-preloader 1s linear infinite;
    }
</style>