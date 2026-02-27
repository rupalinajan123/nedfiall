<?php /* Template Name: Career Coach Search */

if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
  $url = "https://";else $url = "http://";
$url.= $_SERVER['HTTP_HOST'];   
$url.= $_SERVER['REQUEST_URI'];
$url = explode('?',$url);   
$url = explode('&loginerror',$url[1]);  
$sector = str_replace('-',' ',$url[0]);

//new line
if(!empty($wp_query->query_vars['flag'])){ $sector= $wp_query->query_vars['flag']; $sector = str_replace('-',' ',$sector);}

if($sector=='')
{  
  wp_redirect(site_url());
  exit; 
}
?>
<?php get_header(); 

$page_data = get_page_by_path( 'career-coach-search' );
//$logo_image = get_field( "logo", $page_data->ID );

?>


<!-- header-end -->

<!-- inner-banner-start --> 
<div id="preloader-loader" style="display:none;"></div>
<div class="inner-banner">
  <div class="container">
    <div class="banner-title">
      <h3><?php echo  $sector;?></h3>
      <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Resources</a></li>
        <li class="breadcrumb-item "><?php echo $page_data->post_title;?></li>
        <li class="breadcrumb-item active"><?php echo $sector;?></li>

      </ul>
    </div>
    <div class="banner-content">
      <div class="row">
        <div class="col-md-4 banner-img pr-0"><?php echo get_the_post_thumbnail(); ?></div>
          <div class="col-md-8  pl-0">
            <div class="bannerbg nf-gradient-26 justify-content-start pt-3 nf-height-100">
              <!-- <h4 class="nf-f-size-24"><?php echo $page_data->post_title;?></h4> -->
              <h5><?php echo $page_data->post_content;?></h5>
              <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/layers-bg.png" alt="layers background" class="nf-layes-bg">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- inner-banner-end -->
  <!-- Study tour in north section  -->
  <form method="post" action="<?php echo site_url()?>/career-mentor/">
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
              <div class="col-12 col-md-6 col-xl-4" style="display: none;">
               <!--  <label>Find Internship by Location</label> -->
               <div class="nf-select-wrap">
                <div class="nf-select-img">
                  <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/sector.png" alt="Sector">
                  <span>Sectors</span>
                </div>
                <div class="nf-select-field">

                  <?php 
                  $var = get_field_object('field_61090437ef1e4');
                  ?>
                  <select class="form-control selectpicker" name="sector" id="sector">
                    <option value="">Select Sector</option>
                    <?

                    foreach($var['choices'] as $choice)
                    {
                      if($sector==$choice) $sel='selected';else $sel='';
                      echo '<option '.$sel.' value="'.$choice.'">'.$choice.'</option>';
                    }
                    ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-12 col-md-6 col-xl-4">
              <!-- <label>Find Internship by Industry</label> -->
              <div class="nf-select-wrap">
                <div class="nf-select-img">
                  <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/department.png" alt="Field">
                  <span>Field</span>
                </div>

                <div class="nf-select-field">

                  <?php 
                  $var = get_field_object('field_61090574ef1e5');
                  ?>
                  <select class="form-control selectpicker" name="field" id="field">
                    <option value="">Select Field</option>
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
<script type="text/javascript">
  //$('#sector').change(function(){
    function getregion(){
    //$('#preloader-loader').css("display", "block");

    $.ajax({
      data: {"sector": $('#sector').val(), 'action': 'my_action_get_career_coach'},
      url: "<?php echo site_url()?>/wp-admin/admin-ajax.php",
      type: "post",
      async:false,
      success: function(data) {
           //alert(data);
           var res = data.split('*****'); 
           $('#field').html(res[0]);
           $('.selectpicker').selectpicker({ noneSelectedText : 'Select Field' });
           $('.selectpicker').selectpicker('refresh');
           //
           //$('#preloader-loader').css("display", "none");
         }
       });
  }
//});

window.onload=function(){ getregion(); };


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


