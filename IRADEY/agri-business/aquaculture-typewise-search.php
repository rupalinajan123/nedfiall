<?php /*Template Name: Aquaculture Type Wise Search */ ?>
<?php get_header(); 

$current_slug = add_query_arg( array(), $wp->request );
$current_slug = explode('/',$current_slug);
$the_slug = end($current_slug);
$type = $current_slug[count($current_slug) - 2];
$page_data = get_page_by_path( $the_slug );
?>

    <!-- inner-banner-start -->
    <div class="inner-banner">
      <div class="container">
        <div class="banner-title">
          <h3>Aquaculture- Culture Type   <a href="#" class="changeTopic" data-toggle="collapse" data-target="#changeTopic" aria-expanded="false">Change Topic</a></h3>
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Entrepreneurship</a></li>
            <li class="breadcrumb-item"><a href="#">Know your Business</a></li>
            <li class="breadcrumb-item"><a href="#">Agri-Business</a></li>
            <li class="breadcrumb-item"><a href="#">Production</a></li>
            <li class="breadcrumb-item"><a href="#">Aquaculture</a></li>
            <li class="breadcrumb-item active"> Culture Type </li>
          </ul>
        </div>
        <div class="chagetopic-modal changeTopic-collapse">
          <div class="collapse " id="changeTopic" style="">
            <div class="card card-body">
              <div class="row">
                 <div class="col-md-6">
                  <h4>Select topic</h4>
                    <ul>
                      <li><a href="<?php echo site_url();?>/species-wise">Species wise</a></li>
                      <li><a href="<?php echo site_url();?>/aquaculture-type-search">Cultural Types</a></li>
                      <li><a href="<?php echo site_url();?>/fish-value-chain">Fish Value Chain</a></li>
                      <li><a href="<?php echo site_url();?>/culture-system">Cultural System</a></li>
                    </ul>
                </div>
                </div>
            </div>
          </div>
        </div>
        <div class="banner-content">
          <div class="row">
             <?php $url = wp_get_attachment_url( get_post_thumbnail_id($post_id) );?>
            <div class="col-md-4 banner-img pr-0"><img src="<?php echo $url;?>"></div>
            <div class="col-md-8  pl-0">
              <div class="bannerbg nf-gradient-1 justify-content-start pt-3 nf-height-100">
                <h4 class="nf-f-size-24"><?php //echo $page_data->post_title;?></h4>
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
    
 <form method="post" action="" id="aquaculture-typewise-search"> 
    <div class="inner-body">
      <div class="container">
        <div class="national-level icon-text-box">
          <div class="row mb-2">
            <div class="col-md-8">
              <h4 class="nf-f-size-24 nf-strong">Select Options</h4>
            </div>
          </div>
          <div class="nf-form-wrap">
            <div class="row">
              <div class="col-12 col-md-6 col-xl-4">
                <div class="nf-select-wrap">
                  <div class="nf-select-img">
                    <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/fish-value-chain.png" alt="course">
                    <span>Culture Type </span>
                  </div>
                  <div class="nf-select-field">
                    <select class="form-control selectpicker" name="culture-type" id="culture-type" required="">
                    <option value="">Select Type of Culture</option>
                    <option value="polyculture">Polyculture</option>
                    <option value="monoculture">Monoculture</option>
			             </select>
                  </div>
                </div>
                <span id="error_msg1" style="color: red;"></span>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="nf-circle-bg-img">
      <div class="container">
        <div class="row">
          <div class="col-12 nf-button-wrapper mb-sm-0 mb-3">
            <button type="submit" class="nf-button-v-small submitBtn" onclick="return validation_function()">
                  Next
                </button>
          </div>
          <img src="<?php echo get_template_directory_uri(). '/assets/'?>/img/study-in-north/circle-bg.jpg" alt="background image" class="img-fluid">
        </div>
      </div>
    </div>
  </form>
    <!-- End Study tour in north section  -->
<?php get_footer(); ?>
<script type="text/javascript">

function validation_function()
{
  var error_msg1 = document.getElementById("error_msg1");

  error_msg1.textContent = "";

  if ($('#culture-type').val() == '') {
    error_msg1.textContent = "*Please select culture-type";
           return false;
  }
}

$(document).on('click', '.submitBtn', function() {
    var siteurl = '<?php echo site_url() ?>/'; 

    if ($('#culture-type').val()=='polyculture') {
      $('#aquaculture-typewise-search').attr('action',siteurl+'aquaculture-polyculture-search');
    }
  
    else if($('#culture-type').val()=='monoculture'){
      //$('#aquaculture-typewise-search').attr('action',siteurl+'aquaculture-monoculture-search'); 
      $('#aquaculture-typewise-search').attr('action',siteurl+'cultural-types/');
      
    }

  });




  

</script>
