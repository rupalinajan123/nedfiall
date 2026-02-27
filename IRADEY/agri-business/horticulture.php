<?php /*Template Name: Horticulture */ ?>
<?php get_header(); 

$current_slug = add_query_arg( array(), $wp->request );
$current_slug = explode('/',$current_slug);
$the_slug = end($current_slug);
$type = $current_slug[count($current_slug) - 2];

//echo $the_slug;exit;

$page_data = get_page_by_path( $the_slug );
?>

<!-- inner-banner-start -->
<div id="preloader-loader" style="display:none;"></div>
<form method="post" id="form" action="<?php echo site_url()?>/horticulture-details/" >
<div class="inner-banner">
<div class="container">
<div class="banner-title">
<h3>Horticulture<a href="#" class="changeTopic" data-toggle="collapse" data-target="#changeTopic">Change Topic</a></h3>
<ul class="breadcrumb">
  <li class="breadcrumb-item"><a href="#">Entrepreneurship</a></li>
  <li class="breadcrumb-item"><a href="#">Know your Business</a></li>
  <li class="breadcrumb-item"><a href="#">Agri-Business</a></li>
  <li class="breadcrumb-item"><a href="#">Production</a></li>
  <li class="breadcrumb-item"><a href="<?php echo site_url()?>/fruits/">Horticulture</a></li>
  <?php if($page_data->post_title!='Apiculture'){?>
  <li class="breadcrumb-item">Crop wise</li>
<?php }?>
  <li class="breadcrumb-item active"><?php echo $page_data->post_title;?></li>
</ul>
</div>
<div class="chagetopic-modal changeTopic-collapse">
          <div class="collapse " id="changeTopic" style="">
            <a href="#" id="changeTopic_close"><i class="fa fa-close"></i></a>
            <div class="card card-body">
              <div class="row">
                
                         <div class="col-md-4">
                              <h4>Production &nbsp;</h4>
                            <ul>
                              <li>
                                <a class="box" href="<?php echo site_url()?>/fruits/">Horticulture</a>
                              </li>
                              <li>
                                <a class="box" href="<?php echo site_url()?>/meat-production/">Animal Husbandry</a>
                              </li>
                              <li>
                                <a class="box" href="<?php echo site_url()?>/production-of-commercial-silk-cocoon/">Sericulture</a>
                              </li>
                              <li>
                                <a class="box" href="<?php echo site_url()?>/species-wise/">Aquaculture</a>
                              </li>
                              <li>
                                <a class="box" href="<?php echo site_url()?>/maps/">MAP</a>
                              </li>
                              <li>
                                <a class="box" href="#">Nursery</a>
                              </li>
                            </ul>
                          </div>
                          
                          <div class="col-md-4">
                              <h4>Post Harvest & Primary Processing &nbsp;</h4>
                            <ul>
                              <li>
                                <a class="box" href="<?php echo site_url()?>/post_harvest/refrigerated-van/">Handling & Logistics</a>
                              </li>
                              <li>
                                <a class="box" href="<?php echo site_url()?>/post_harvest/dry-warehouse/">Storage</a>
                              </li>
                              <li>
                                <a class="box" href="<?php echo site_url()?>/post_harvest/blast-freezing/">Preservation</a>
                              </li>
                              <li>
                                <a class="box" href="<?php echo site_url()?>/post_harvest/rice-mill/">Primary Processing</a>
                              </li>
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
      <h4 class="nf-f-size-24"><?php echo $page_data->post_title;?></h4> 
      <h4 class="nf-f-size-24"><?php echo $page_data->post_content;?> </h4>
      <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/layers-bg.png" alt="layers background" class="nf-layes-bg">
    </div>
  </div>
</div>
</div>
</div>
</div>
<!-- inner-banner-end -->
<!-- Study tour in north section  -->
<div class="inner-body">
<div class="container">
<div class="national-level icon-text-box">
    <?php
           
                    if($page_data->post_title == 'Spices')
                   { 
                     $icon_image ="saffron.png";
                     $heading='Spices';
                   }
                   else if($page_data->post_title == 'Mushroom')
                   { 
                     $icon_image ="mushroom.png";
                     $heading='Mushroom';
                   }
                   else if($page_data->post_title == 'Floriculture')
                  { 
                   $icon_image ="floriculture.png";
                    $heading='Floriculture';
                 }
                   else
                   {
                      $icon_image ="fruit.png";
                      $heading='Animal';
                   }
                
                    ?>
<div class="row mb-2">
    <div class="col-md-8">
    <h4 class="nf-f-size-24 nf-strong">Select Options</h4>
  </div>
</div>

<div class="nf-form-wrap">
  <div class="row">
    <?php if($page_data->post_title!='Apiculture' && $page_data->post_title!='Mushroom' && $page_data->post_title!='Exotic Spices'){?>
    <div class="col-12 col-md-6 col-xl-4">
      <div class="nf-select-wrap">
        <div class="nf-select-img">
          <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/state.png" alt="state">
          <span>State</span>
        </div>
        <div class="nf-select-field">

          <?php 
              $var = get_field_object('field_60bf6af7fa6fa');
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
      <span id="error_msg1" style="color: red;"></span>
    </div>
  <?php }?>
  <?php /*?> <?php //if($page_data->post_title!='Apiculture'){?>
    <div class="col-12 col-md-6 col-xl-4">
      <div class="nf-select-wrap">
        <div class="nf-select-img">
          <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/sowing-season.png" alt="department">
          <span>
            <?php
              if($page_data->post_title!='Mushroom')
              echo 'Sowing Season From';
              else echo 'Growing Season From';
            ?>
          </span>
        </div>
        <div class="nf-select-field">
         <?php 
              if($page_data->post_title!='Mushroom')
              $var = get_field_object('field_60bf6b6cfa6fd');
              else
              $var = get_field_object('field_60e1b40510d8c');  
              ?>
              <select class="form-control selectpicker" name="season_from" id="season_from">
                
                <option value="0">Select Season From</option>
                
                <?
                foreach($var['choices'] as $value => $label)
                {
                  echo '<option value="'.$value.'">'.$label.'</option>';
                }
                ?>
              </select>
            </div>
      </div>
      <span id="error_msg2" style="color: red;"></span>  
       
    </div>
    <div class="col-12 col-md-6 col-xl-4">
      <div class="nf-select-wrap">
        <div class="nf-select-img">
          <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/sowing-season.png" alt="department">
          <span>
            <?php
              if($page_data->post_title!='Mushroom')
              echo 'Sowing Season To';
              else echo 'Growing Season To';
            ?>
          </span>
        </div>
        <div class="nf-select-field">
         <?php 
              if($page_data->post_title!='Mushroom')
              $var = get_field_object('field_60e6e32e9a1c2');
              else
              $var = get_field_object('field_60e6e3749a1c3'); 
             //echo '<pre>';
             // print_r($var);exit; 
              ?>
              <select class="form-control selectpicker" name="season_to" id="season_to">
                
                <option value="0">Select Season To</option>
                
                <?
                foreach($var['choices'] as $value => $label)
                {
                  echo '<option value="'.$value.'">'.$label.'</option>';
                }
                ?>
              </select>
            </div>
      </div>
      <span id="error_msg22" style="color: red;"></span>  
       
    </div>
  <?php// }?> <?php */?>
    <input type="hidden" name="horticulture_type" value="<?php echo $page_data->post_title;?>">
    <div class="col-12 col-md-6 col-xl-4">
      <div class="nf-select-wrap">
        <div class="nf-select-img">
          <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/<?php echo $icon_image;?>" alt="course">
          <span><?php echo $page_data->post_title;?></span>
        </div>
        <div class="nf-select-field">

          <select class="form-control selectpicker" name="crop" id="crop">
            <option value="">Select <?php echo $page_data->post_title;?></option>
            
            <?php
            // args
            $args = array(
              'post_type'   => 'horticulture',
              'meta_key'    => 'horticulture_type',
              'meta_value'  => $page_data->post_title,
              'orderby' => 'post_title',
              'order'   => 'ASC',
              'post_status' => 'publish',
               'posts_per_page' => -1
            );
            $the_query = new WP_Query( $args );
            ?>
            <?php if( $the_query->have_posts() ): ?>
              <?php while( $the_query->have_posts() ) : $the_query->the_post(); 
                $croptile = $post->post_title;
                if($croptile_new!=$croptile){
                ?>
                <option value="<?php the_title(); ?>"><?php the_title(); ?></option>
              <?php 
            }
            $croptile_new = $post->post_title;
            endwhile; ?>
            <?php endif; ?>

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
<div class="col-12 nf-button-wrapper mb-sm-0 mb-3">
<!--   <button class="nf-button-v-small" type="submit" value="submit">
    Next
  </button> -->
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
    <?php if($page_data->post_title!='Apiculture' && $page_data->post_title!='Mushroom' && $page_data->post_title!='Exotic Spices'){?>
      var error_msg1 = document.getElementById("error_msg1");
    <?php }?>
    <?php if($page_data->post_title!='Apiculture'){?>
      //var error_msg2 = document.getElementById("error_msg2");
      //var error_msg22 = document.getElementById("error_msg22");
    <?php }?> 
      var error_msg3 = document.getElementById("error_msg3");

      <?php if($page_data->post_title!='Apiculture' && $page_data->post_title!='Mushroom' && $page_data->post_title!='Exotic Spices'){?>
      error_msg1.textContent = "";
      <?php }?>
      <?php if($page_data->post_title!='Apiculture'){?>
      //error_msg2.textContent = "";
      //error_msg22.textContent = "";
      <?php }?>
      error_msg3.textContent = "";
      var flag=true;


      <?php if($page_data->post_title!='Apiculture' && $page_data->post_title!='Mushroom' && $page_data->post_title!='Exotic Spices'){?>
       if($('#state').val()=='')
       {
           // alert('hjghj');
           error_msg1.textContent = "*Please select state";
           flag= false;
       }
      <?php }?>
      <?php if($page_data->post_title!='Apiculture'){?>
      /*if($('#season_from').val()=='0')
       {
           // alert('hjghj');
           error_msg2.textContent = "*Please select season from";
           flag= false;
       }
       if($('#season_to').val()=='0')
       {
           // alert('hjghj');
           error_msg22.textContent = "*Please select season to";
           flag= false;
       }*/
       <?php }?>

        if($('#crop').val()=='')
       {
           // alert('hjghj');
           error_msg3.textContent = "*Please select option";
           flag= false;
       }
       return flag;
       }
//ajax
$('#state').change(function(){
          $('#preloader-loader').css("display", "block");

          $.ajax({
              data: {"state": $('#state').val(), 'action': 'my_action_get_horticulture','type':'<?php echo $page_data->post_title;?>'},
              url: "<?php echo site_url()?>/wp-admin/admin-ajax.php",
              type: "post",
              success: function(data) {
                 //alert(data);
                 
                 $('#crop').html(data);
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
