<?php /*Template Name: Tourism Adventure */ ?>
<?php get_header(); 

$current_slug = add_query_arg( array(), $wp->request );
$current_slug = explode('/',$current_slug);
$the_slug = end($current_slug);
$type = $current_slug[count($current_slug) - 2];

//echo $the_slug;exit; 

$page_data = get_page_by_path( $the_slug );

?>
<!-- header-end -->
<!-- inner-banner-start -->
<div id="preloader-loader" style="display:none;"></div>
<div class="inner-banner">
<div class="container">
<div class="banner-title">
<h3><?php echo $page_data->post_title;?> <a href="#" class="changeTopic" data-toggle="collapse" data-target="#changeTopic" >Change Topic</a></h3>
<ul class="breadcrumb">
  <li class="breadcrumb-item"><a href="#">Entrepreneurship</a></li>
  <li class="breadcrumb-item"><a href="#">Know your Business</a></li>
  <li class="breadcrumb-item"><a href="#">Services</a></li>
  <li class="breadcrumb-item"><a href="#">Tourism & Hospitality</a></li>
  <li class="breadcrumb-item active"><?php echo $page_data->post_title;?></li>
</ul>
</div>
<div class="chagetopic-modal changeTopic-collapse">
          <div class="collapse " id="changeTopic" style="">
            <a href="#" id="changeTopic_close"><i class="fa fa-close"></i></a>
            <div class="card card-body">
              <div class="row">
                
                  <div class="col-md-6">
                  <h4>Select topic</h4>
                    <ul>
                      <li><a href="<?php echo site_url();?>/hotels-and-resorts/"> Hotels & Resorts</a></li>
                      <li><a href="<?php echo site_url();?>/services/homestay/"> Homestay</a></li>
                      <li><a href="<?php echo site_url();?>/tourism-adventure">Adventure Tourism</a></li>
                      <li><a href="<?php echo site_url();?>/services/nature-eco-tourism/"> Nature & Eco Tourism</a></li>
                      <li><a href="<?php echo site_url();?>/services/rural-tourism/"> Rural Tourism</a></li>
                      <li><a href="<?php echo site_url();?>/services/fast-food//"> Fastfood</a></li>
                      <li><a href="<?php echo site_url();?>/services/restaurant/"> Restaurant</a></li>
                      
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
    <div class="bannerbg nf-gradient-1 justify-content-start p-3 nf-height-100">
      <h4 class="nf-f-size-24 pl-0"><?php echo $page_data->post_title;?></h4>
      <p class="text-white pr-md-5"><?php echo $page_data->post_content;?>
      </p>
      <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/layers-bg.png" alt="layers background" class="nf-layes-bg">
    </div>
  </div>
</div>
</div>
</div>
</div>
<!-- inner-banner-end -->
<!-- Study tour in north section  -->
<form method="post" action="<?php echo site_url()?>/tourism-adventure-details/">
<div class="inner-body">
      <div class="container">
        <div class="national-level icon-text-box">
             <?php
           
                   //  if($page_data->post_title == 'Tourism Adventure')
                   // { 
                   //   $icon_image ="sports-category.png";
                   //   $heading='Tourism Adventure';
                   // }
                   // if($page_data->post_title == 'Tourism Adventure')
                   // { 
                   //   $icon_image1 ="sport-activity.png";
                   //   $heading='Tourism Adventure';
                   // }
                   // else
                   // {
                   //    $icon_image ="chick.png";
                   //    $heading='Tourism Adventure';
                   // }
                
                ?>
          <div class="row mb-2">
            <div class="col-md-8">
              <h4 class="nf-f-size-24 nf-strong">Select Options</h4>
            </div>
          </div>
          <div class="nf-form-wrap">
            <div class="row">
              <?php/*?> <div class="col-12 col-md-6 col-xl-4">
                <div class="nf-select-wrap">
                  <div class="nf-select-img">
                    <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/state.png" alt="course">
                    <span>State</span>
                  </div>
                  <div class="nf-select-field">
                    
                    <?php 
                    $var = get_field_object('field_60d6f5c4de2f5');
                    ?>
                    <select class="form-control selectpicker" name="state" id="state">
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
              <span id="error_msg3" style="color: red;"></span>

              </div> <?php*/?>
              <div class="col-12 col-md-6 col-xl-4">
                <div class="nf-select-wrap">
                  <div class="nf-select-img">
                    <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/sport-category.png" alt="state">
                    <span>Sports Category</span>
                  </div>
                  <div class="nf-select-field">
                    
                    <?php 
                    $var = get_field_object('field_611f969f9585e');
                    ?>
                    <select class="form-control selectpicker" name="sports_category" id="sports_category">
                      <option value="">Select Sports Category</option>
                      <?
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
              <div class="col-12 col-md-6 col-xl-4">
                <div class="nf-select-wrap">
                  <div class="nf-select-img">
                    <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/sports.png" alt="department">
                    <span>Sports</span>
                  </div>
                  <div class="nf-select-field">
                    
                    <?php 
                    $var = get_field_object('field_611f96ce9585f');
                    ?>
                    <select class="form-control selectpicker" name="sports" id="sports">
                      <option value="">Select Sport</option>
                      <?
                      foreach($var['choices'] as $choice)
                      {
                        echo '<option value="'.$choice.'">'.$choice.'</option>';
                      }
                      ?>
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
<div class="col-12 nf-button-wrapper mb-sm-0 mb-3">
   <button class="nf-button-v-small submitBtn" type="submit" onclick="return validation_function()">
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
      
      var flag=true;

       if($('#sports_category').val()=='')
       {
           // alert('hjghj');
           error_msg1.textContent = "*Please select Sport Category";
           flag= false;
       }

      if($('#sports').val()=='')
       {
           // alert('hjghj');
           error_msg2.textContent = "*Please select Sport";
           flag= false;
       }
      return flag;
}
</script>
<script type="text/javascript">   

  $('#sports_category').change(function(){
          $('#preloader-loader').css("display", "block");

          $.ajax({
              data: {"sports_category": $('#sports_category').val(),"sports":$('#sports').val(), 'action': 'my_action_get_touradventure'},
              url: "<?php echo site_url()?>/wp-admin/admin-ajax.php",
              type: "post",
              success: function(data) {
                 //alert(data);
                 var res = data.split('*****');
                 
                 if(res[0])
                 {
                  $('#sports').html(res[0]);
                 }

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
