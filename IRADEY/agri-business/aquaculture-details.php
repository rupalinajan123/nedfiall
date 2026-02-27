<?php /*Template Name: Aquaculture Details */ ?>
<?php 
if($_POST['aquaculture_type']=='')
{  
  wp_redirect(site_url('species-wise'));
  exit; 
}

get_header();  

//echo '>>>'.$_POST['species'];

$record=0;
$blog_args = array(
  'post_type' => 'aquaculture',
  'post_status' => 'publish',
  'title' =>$_POST['species'],
  'meta_key'     =>  'aquaculture_type',
  'meta_value'   =>  $_POST['aquaculture_type'],
  'posts_per_page' => '1'
);


$blog_posts = new WP_Query($blog_args);
     //  echo "<pre>";
     //   print_r($blog_posts);exit;

$banner_image = get_field( "banner_image", $blog_posts->posts[0]->ID );
if($_POST['species']=='') $_POST['species'] = $blog_posts->posts[0]->post_title;

if($banner_image=='') $banner_image= get_template_directory_uri(). '/assets/img/no_record_found_banner.png';

$title='';
if($_POST['aquaculture_type']=='Cultural Types - Monoculture')
   { 
      $title='Culture Types- Monoculture';
    }

?>
<!-- header-end -->
<!-- header-end -->

<!-- inner-banner-start -->
<div class="inner-banner">
  <div class="container">
   <div class="banner-title">
    <h3><?php if($_POST['cultural_system']!='') echo $_POST['cultural_system'];else if($title!='') echo $title;else echo $_POST['aquaculture_type'];?> <a href="#" class="changeTopic" data-toggle="collapse" data-target="#changeTopic">Change Topic</a></h3>
    <ul class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Entrepreneurship</a></li>
      <li class="breadcrumb-item"><a href="#">Know your Business</a></li>
      <li class="breadcrumb-item"><a href="#">Agri-Business</a></li>
      <li class="breadcrumb-item"><a href="#">Production</a></li>
      <li class="breadcrumb-item"><a href="<?php echo site_url();?>/species-wise">Aquaculture</a></li>
      <li class="breadcrumb-item"><a href="#"><?php if($title!='') echo $title;else echo $_POST['aquaculture_type'];?></a></li>
      <li class="breadcrumb-item active"><?php echo $_POST['species'];?></li>
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
    <div class="col-md-4 banner-img pr-0"><img src="<?php echo $banner_image; ?>"></div>
    <div class="col-md-8  pl-0">
      <div class="bannerbg nf-gradient-17 justify-content-start p-3 nf-height-100">
        <h4 class="nf-f-size-24 pl-0"><?php echo $_POST['species'];?></h4>
        <p class="text-white pr-md-5"><?php echo $blog_posts->posts[0]->post_content;?></p>
        <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/layers-bg.png" alt="layers background" class="nf-layes-bg">
      </div>
    </div>
  </div>
</div>
</div>
</div>
<!-- inner-banner-end -->
<!-- Study tour in north section  -->
<form method="post" id="form_id">
  <input type="hidden" name="aquaculture_type" value="<?php echo $_POST['aquaculture_type'];?>">
  <div class="inner-body">
    <div class="container">
      <div class="nf-form-wrap">
        <div class="row">
          <?php
          if($_POST['aquaculture_type'] == 'Fish Value Chain - Hatchery')
          { 
           $icon_image ="fish-value-chain.png";
           $heading='Fish Value Chain - Hatchery';
         }

         else if($_POST['aquaculture_type'] == 'Species Wise')
         { 
           $icon_image ="fish-value-chain.png";
           $heading='$aquaculture_type';
         }
         else
         {
          $icon_image ="chick.png";
          $heading='Fish Value Chain ';
        }
        ?>
        <div class="col-12 col-lg-4 nf-sidebar-c-width">
          <div class="courses-details-sidebar-area search-sidebar nf-sidebar mt-md-5">
            <div class="widget mb-20 widget-padding white-bg">
              <?php if($_POST['aquaculture_type']=='Culture System'){
                $var = get_field_object('field_60f69e6bff44d');
                ?>
                <a class="btn-link nf-color-1" data-toggle="collapse" href="#state-filter">
                  <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/state-white.png" alt="state-white"> <span> Culture System (<?php echo count($var['choices'])?>)</span></a>
                  <div class="widget-link collapse show" id="state-filter">
                    <ul class="sidebar-link nf-sidebar-scroll">

                      <?php 
                      
                      
                      $k=0;
                      foreach($var['choices'] as $choice)
                      {
                        if($_POST['cultural_system']==$choice) $checked = 'checked'; 
                        else if(is_array($_POST['cultural_system']) && in_array($choice,$_POST['cultural_system'])) $checked = 'checked'; 
                        else  $checked = ''; 
                        echo '
                        <li>
                        <div class="nf-checkbox-wrap">
                        <input value="'.$choice.'" class="check_cultural_system" type="checkbox" '.$checked.' id="cultural_system_'.$k.'" name="cultural_system">
                        <label for="cultural_system_'.$k.'">'.$choice.'</label>
                        </div>
                        </li>
                        ';
                        $k++;
                      }
                      ?>
                    </ul>
                  </div>
                <?php }?>

                <?php
                if($_POST['cultural_system']=='Super Intensive' )
                {
                  $_POST['species']='';
                }
                if($_POST['cultural_system']!='Super Intensive'){
                  ?>
                  <a class="btn-link nf-color-1" data-toggle="collapse" href="#state-filter">

                    <?php if($_POST['aquaculture_type']=='Fish Value Chain - Hatchery')
                    {
                      $ltitle = 'Hatchery Type';
                    }
                    else if($_POST['aquaculture_type']=='Fish Value Chain - Trading')
                    {
                      $ltitle = 'Trading Type';
                    }
                    else
                    {
                      $ltitle = 'Species';
                    }

                    ?>

                    <?php
            // args
                    $g=0;
                    $args = array(
                      'post_type'   => 'aquaculture',
                      'meta_key'    => 'aquaculture_type',
                      'meta_value'  => $_POST['aquaculture_type'],
                      'orderby' => 'post_title',
                      'order'   => 'ASC',
                      'post_status' => 'publish',
                      'posts_per_page' => -1
                    );
                    $the_query = new WP_Query( $args );

            //echo "<pre>";
            //print_r($the_query);
                    ?>
                    <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/fish-value-chain.png" alt="state-white"> <span> <?php echo $ltitle;?> (<?php echo $the_query->post_count?>) </span></a>
                    <div class="widget-link collapse show" id="state-filter">
                      <ul class="sidebar-link nf-sidebar-scroll">

                        <?php if( $the_query->have_posts() ): ?>
                          <?php while( $the_query->have_posts() ) : $the_query->the_post(); 
                            $g++;
                            $croptile = $post->post_title;
                            if($_POST['species']==$croptile) $checked = 'checked'; 
                            else if(is_array($_POST['species']) && in_array($croptile,$_POST['species'])) $checked = 'checked'; 
                            else  $checked = ''; 
                            if($croptile_new!=$croptile){
                              ?>
                              <li>
                                <div class="nf-checkbox-wrap">
                                  <input type="checkbox" class="check_species" name="species" <?php echo $checked;?> id="species<?php echo $g;?>" name="checkbox-group" value="<?php the_title(); ?>" onclick="">
                                  <label for="species<?php echo $g;?>"><?php the_title(); ?> </label>
                                </div>
                              </li>

                              <?php 
                            }
                            $croptile_new = $post->post_title;
                          endwhile; ?>
                        <?php endif; ?>


                      </ul>
                    </div> 
                  <?php }?>

                  <?php 
                  if($_POST['cultural_system']!='Super Intensive' )
                  {
                    $_POST['technology']='';
                  }
                  if($_POST['cultural_system']=='Super Intensive'){
                    $var = get_field_object('field_60f69edbff44e');
                    ?>
                    <a class="btn-link nf-color-1" data-toggle="collapse" href="#state-filter">
                      <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/state-white.png" alt="state-white"> <span> Technology (<?php echo count($var['choices'])?>)</span></a>
                      <div class="widget-link collapse show" id="state-filter">
                        <ul class="sidebar-link nf-sidebar-scroll">

                          <?php 


                          $k=0;
                          foreach($var['choices'] as $choice)
                          {
                            if($_POST['technology']==$choice) $checked = 'checked'; 
                            else if(is_array($_POST['technology']) && in_array($choice,$_POST['technology'])) $checked = 'checked'; 
                            else  $checked = ''; 
                            echo '
                            <li>
                            <div class="nf-checkbox-wrap">
                            <input value="'.$choice.'" class="check_technology" type="checkbox" '.$checked.' id="technology_'.$k.'" name="technology[]">
                            <label for="technology_'.$k.'">'.$choice.'</label>
                            </div>
                            </li>
                            ';
                            $k++;
                          }
                          ?>
                        </ul>
                      </div>
                    <?php }?>





                  </div>
                </div>
              </div>
              <div class="col-12 col-lg-8 nf-listing-c-width">
                <?php if(!empty($_POST['cultural_system']) or !empty($_POST['species']) or !empty($_POST['technology'])){?>
                  <div class="nf-state-listing-block">
                   <div class="row">
                    <?php if(!empty($_POST['cultural_system'])){?>
                      <div class="col-12 col-lg-4">
                        <a href="#">
                          <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/state.png" class="nf-w-t1">
                          <span><?php if(is_array($_POST['cultural_system'])) echo Implode(',<br>',$_POST['cultural_system']);else echo $_POST['cultural_system'];?></span>
                        </a>
                      </div>
                    <?php }?>
                    <?php if(!empty($_POST['species'])){?>
                      <div class="col-12 col-lg-4">
                        <a href="#">
                          <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/fish-value-chain.png" class="nf-w-t1">
                          <span><?php if(is_array($_POST['species'])) echo Implode(',<br>',$_POST['species']);else echo $_POST['species'];?></span>
                        </a>
                      </div>
                    <?php }?>
                    <?php if(!empty($_POST['technology'])){?>
                      <div class="col-12 col-lg-4">
                        <a href="#">
                          <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/state.png" class="nf-w-t1">
                          <span><?php if(is_array($_POST['technology'])) echo Implode(',<br>',$_POST['technology']);else echo $_POST['technology'];?></span>
                        </a>
                      </div>
                    <?php }?>


                  </div> 
                </div>
              <?php }?>

              <?php 

              while($blog_posts->have_posts()) {
                $blog_posts->the_post(); 

                $values= get_fields();

                $view_complete_details=$values['view_complete_details'];
                
                if($values)
                {
                  $aquaculture_type='';
                  $banner_image='';
                  $local_name='';
                  $water_ph='';
                  $dissolved_oxygen='';
                  $ammonia_concentration='';
                  $pond='';
                  $cage='';
                  $average_farm_gate_pricekg='';
                  $species='';

                  $medium_of_culture='';
                  $stocking_density_in_culture_pond_per_hectare='';
                  $output_in_kg='';
                  $culture_period_in_months='';

                  $brood_stock_quantity='';
                  $brood_stock_age='';
                  $spawning_season='';

                  $market_size_in_gram='';
                  $farm_gate_price_per_kg='';
                  $shrinkage_percentage='';
                  $output='';
                  $average_retail_sales_rate_per_kg='';
                  $species_favouable_for_ne='';
                  $explore_raw_material='';


                  foreach($values as $key => $value)
                  {
                    if($key=='aquaculture_type'){ $aquaculture_type = $value; } 
                    if($key=='banner_image'){ $banner_image = $value; }

                    if($key=='local_name'){ $local_name = $value; }
                    if($key=='water_ph'){ $water_ph = $value; }
                    if($key=='dissolved_oxygen'){ $dissolved_oxygen = $value; }
                    if($key=='ammonia_concentration'){ $ammonia_concentration = $value; }
                    if($key=='pond'){ $pond = $value; }
                    if($key=='cage'){ $cage = $value; }
                    if($key=='average_farm_gate_pricekg'){ $average_farm_gate_pricekg = $value; }
                    if($key=='species'){ $species = $value; }

                    if($key=='medium_of_culture'){ $medium_of_culture = $value; }
                    if($key=='stocking_density_in_culture_pond_per_hectare'){ $stocking_density_in_culture_pond_per_hectare = $value; }
                    if($key=='output_in_kg'){ $output_in_kg = $value; }
                    if($key=='culture_period_in_months'){ $culture_period_in_months = $value; }

                    if($key=='brood_stock_quantity'){ $brood_stock_quantity = $value; }
                    if($key=='brood_stock_age'){ $brood_stock_age = $value; }
                    if($key=='spawning_season'){ $spawning_season = $value; }

                    if($key=='market_size_in_gram'){ $market_size_in_gram = $value; }
                    if($key=='farm_gate_price_per_kg'){ $farm_gate_price_per_kg = $value; }
                    if($key=='shrinkage_percentage'){ $shrinkage_percentage = $value; }
                    if($key=='output'){ $output = $value; }
                    if($key=='average_retail_sales_rate_per_kg'){ $average_retail_sales_rate_per_kg = $value; }
                    if($key=='species_favouable_for_ne'){ $species_favouable_for_ne = $value; }
                    if($key=='explore_raw_material'){ $explore_raw_material = $value; }

                    if($key=='technology'){ $technology = $value; }
                    if($key=='culture_system'){ $culture_system = $value; }

                  }
                }


                if($aquaculture_type=='Species Wise' ){
                  $record=$record+1;
                  ?>


                  <h4 class="nf-f-size-20 nf-strong mb-4">Important Parameters</h4>
                  <div class="row">
                    <div class="col-12 col-lg-10">

                      <div class="row">
                        <div class="col-lg-6 col-md-6  mb-4 parameter_box ">
                          <div class="nf-gradient-3">
                            <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/climate.png" alt="image" class="img-fluid">
                            <h4 class="nf-f-size-16 text-white">Local Name</h4>
                            <h2><?php echo $local_name?></h2>
                          </div>
                        </div>
                        <?php if($species!=''){?>
                          <div class="col-lg-6 col-md-6  mb-4 parameter_box ">
                            <div class="nf-gradient-4">
                              <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/soil-ph.png" alt="image" class="img-fluid">
                              <h4 class="nf-f-size-16 text-white">Species</h4>
                              <h2><?php echo $species?></h2>
                            </div>
                          </div>
                        <?php }?>
                        <div class="col-lg-6 col-md-6  mb-4 parameter_box ">
                          <div class="nf-gradient-4">
                            <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/soil-ph.png" alt="image" class="img-fluid">
                            <h4 class="nf-f-size-16 text-white">Avg. Farm Gate Price</h4>
                            <h2><?php echo $average_farm_gate_pricekg?></h2>
                          </div>
                        </div>
                      </div>

                      <h4 class="nf-f-size-20 nf-strong mb-4">Water Parameters</h4>
                      <div class="row">
                        <div class="col-lg-4 col-md-6  mb-4 parameter_box ">
                          <div class="nf-gradient-5">
                            <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/sowing-season2.png" alt="image" class="img-fluid">
                            <h4 class="nf-f-size-16 text-white">Water pH</h4>
                            <h2><?php echo $water_ph?></h2>
                          </div>
                        </div>

                        <div class="col-lg-4 col-md-6  mb-4 parameter_box ">
                          <div class="nf-gradient-6">
                            <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/harvesting.png" alt="image" class="img-fluid">
                            <h4 class="nf-f-size-16 text-white">Dissolved Oxygen </h4>
                            <h2><?php echo $dissolved_oxygen?></h2>
                          </div>
                        </div>
                        <div class="col-lg-4 col-md-6  mb-4 parameter_box ">
                          <div class="nf-gradient-7">
                            <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/wheat-sack.png" alt="image" class="img-fluid">
                            <h4 class="nf-f-size-16 text-white">Ammonia Concentration</h4>
                            <h2><?php echo $ammonia_concentration?></h2>
                          </div>
                        </div>
                      </div>
                      <h4 class="nf-f-size-20 nf-strong mb-4">Yield</h4>
                      <div class="row">

                        <div class="col-lg-6 col-md-6  mb-4 parameter_box ">
                          <div class="nf-gradient-17">
                            <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/soil-ph.png" alt="image" class="img-fluid">
                            <h4 class="nf-f-size-16 text-white">Pond</h4>
                            <h2><?php echo $pond?></h2>
                          </div>
                        </div>

                        <div class="col-lg-6 col-md-4  mb-4 parameter_box ">
                          <div class="nf-gradient-3">
                            <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/soil-ph.png" alt="image" class="img-fluid">
                            <h4 class="nf-f-size-16 text-white">Cage</h4>
                            <h2><?php echo $cage?></h2>
                          </div>
                        </div>

                      </div>

                    </div>

                    <?php if($aquaculture_type=='Species Wise' && $explore_raw_material!='') {  ?>
                     <div class="col 12 col-lg-2 parameter_box databank_box">
                       <div class="nf-gradient-20">
                         <h4 class="nf-f-size-16 text-white">Explore Raw Material</h4>
                          <a href="<?php echo $explore_raw_material;?>" target="_blank">NER DATABASE</a>
                       </div>
                     </div>
                   <?php } ?>
                 </div>
               <?php }else if($aquaculture_type=='Cultural Types - Monoculture'){
                $record=$record+1; ?>                

                <h4 class="nf-f-size-20 nf-strong mb-4">Imporatnat Parameters</h4>
                <div class="row">
                  <div class="col-12 col-lg-12">

                    <div class="row">
                      <div class="col-lg-4 col-md-6  mb-4 parameter_box ">
                        <div class="nf-gradient-3">
                          <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/climate.png" alt="image" class="img-fluid">
                          <h4 class="nf-f-size-16 text-white">Local Name</h4>
                          <h2><?php echo $local_name?></h2>
                        </div>
                      </div>
                      <?php if($species!=''){?>
                        <div class="col-lg-4 col-md-6  mb-4 parameter_box ">
                          <div class="nf-gradient-4">
                            <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/soil-ph.png" alt="image" class="img-fluid">
                            <h4 class="nf-f-size-16 text-white">Species</h4>
                            <h2><?php echo $species?></h2>
                          </div>
                        </div>
                      <?php }?>
                      <div class="col-lg-4 col-md-6  mb-4 parameter_box ">
                        <div class="nf-gradient-4">
                          <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/soil-ph.png" alt="image" class="img-fluid">
                          <h4 class="nf-f-size-16 text-white">Avg. Farm Gate Price</h4>
                          <h2><?php echo $average_farm_gate_pricekg?></h2>
                        </div>
                      </div>
                    </div>

                    <h4 class="nf-f-size-20 nf-strong mb-4">Water Parameters</h4>
                    <div class="row">
                      <div class="col-lg-4 col-md-6  mb-4 parameter_box ">
                        <div class="nf-gradient-5">
                          <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/sowing-season2.png" alt="image" class="img-fluid">
                          <h4 class="nf-f-size-16 text-white">Water pH</h4>
                          <h2><?php echo $water_ph?></h2>
                        </div>
                      </div>

                      <div class="col-lg-4 col-md-6  mb-4 parameter_box ">
                        <div class="nf-gradient-6">
                          <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/harvesting.png" alt="image" class="img-fluid">
                          <h4 class="nf-f-size-16 text-white">Dissolved Oxygen </h4>
                          <h2><?php echo $dissolved_oxygen?></h2>
                        </div>
                      </div>
                      <div class="col-lg-4 col-md-6  mb-4 parameter_box ">
                        <div class="nf-gradient-7">
                          <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/wheat-sack.png" alt="image" class="img-fluid">
                          <h4 class="nf-f-size-16 text-white">Ammonia Concentration</h4>
                          <h2><?php echo $ammonia_concentration?></h2>
                        </div>
                      </div>
                    </div>
                    <h4 class="nf-f-size-20 nf-strong mb-4">Yield</h4>
                    <div class="row">

                      <div class="col-lg-6 col-md-6  mb-4 parameter_box ">
                        <div class="nf-gradient-17">
                          <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/soil-ph.png" alt="image" class="img-fluid">
                          <h4 class="nf-f-size-16 text-white">Pond</h4>
                          <h2><?php echo $pond?></h2>
                        </div>
                      </div>

                      <div class="col-lg-6 col-md-4  mb-4 parameter_box ">
                        <div class="nf-gradient-3">
                          <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/soil-ph.png" alt="image" class="img-fluid">
                          <h4 class="nf-f-size-16 text-white">Cage</h4>
                          <h2><?php echo $cage?></h2>
                        </div>
                      </div>

                    </div>

                  </div>

                  <?php if($aquaculture_type=='Species Wise' && $explore_raw_material!='') {  ?>
                   <div class="col 12 col-lg-2 parameter_box databank_box">
                     <div class="nf-gradient-20">
                       <h4 class="nf-f-size-16 text-white">Explore Raw Material</h4>
                        <a href="<?php echo $explore_raw_material;?>" target="_blank">NER DATABASE</a>
                     </div>
                   </div>
                 <?php } ?>
               </div>


             <?php }else if($aquaculture_type=='Culture System'){

              if((isset($_POST)  
                && ($_POST['cultural_system']==$culture_system or $_POST['cultural_system']=='' or (is_array($_POST['cultural_system']) && in_array($culture_system,$_POST['cultural_system'])))

                && ($_POST['technology']==$technology or $_POST['technology']=='' or (is_array($_POST['technology']) && in_array($technology,$_POST['technology'])))

              )) {
                $record=$record+1;
                ?>


                <h4 class="nf-f-size-20 nf-strong mb-4">Imporatnat Parameters</h4>
                <div class="row">
                  <div class="col-12 col-lg-10">

                    <div class="row">
                      <?php if($_POST['cultural_system']=='Super Intensive'){?>
                        <div class="col-lg-4 col-md-6  mb-4 parameter_box ">
                          <div class="nf-gradient-3">
                            <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/climate.png" alt="image" class="img-fluid">
                            <h4 class="nf-f-size-16 text-white">Local Name</h4>
                            <h2><?php echo $local_name; //echo $_POST['cultural_system'];?></h2>
                          </div>
                        </div>
                        <div class="col-lg-4 col-md-6  mb-4 parameter_box ">
                        <div class="nf-gradient-1">
                          <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/soil-ph.png" alt="image" class="img-fluid">
                          <h4 class="nf-f-size-16 text-white">Species</h4>
                          <h2><?php echo $species?></h2>
                        </div>
                      </div>
                      <div class="col-lg-4 col-md-6  mb-4 parameter_box ">
                        <div class="nf-gradient-2">
                          <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/wheat-sack.png" alt="image" class="img-fluid">
                          <h4 class="nf-f-size-16 text-white">Medium of Culture</h4>
                          <h2><?php echo $medium_of_culture?></h2>
                        </div>
                      </div>
                      <?php }else{?>
                      <div class="col-lg-6 col-md-6  mb-4 parameter_box ">
                        <div class="nf-gradient-1">
                          <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/soil-ph.png" alt="image" class="img-fluid">
                          <h4 class="nf-f-size-16 text-white">Species</h4>
                          <h2><?php echo $species?></h2>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6  mb-4 parameter_box ">
                        <div class="nf-gradient-2">
                          <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/wheat-sack.png" alt="image" class="img-fluid">
                          <h4 class="nf-f-size-16 text-white">Medium of Culture</h4>
                          <h2><?php echo $medium_of_culture?></h2>
                        </div>
                      </div>
                  <?php }?>
                      <div class="col-lg-6 col-md-6  mb-4 parameter_box ">
                        <div class="nf-gradient-3">
                          <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/sowing-season2.png" alt="image" class="img-fluid">
                          <h4 class="nf-f-size-16 text-white">Output in kg</h4>
                          <h2><?php echo $output_in_kg?></h2>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6  mb-4 parameter_box ">
                        <div class="nf-gradient-4">
                          <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/harvesting.png" alt="image" class="img-fluid">
                          <h4 class="nf-f-size-16 text-white">Culture period in months</h4>
                          <h2><?php echo $culture_period_in_months?></h2>
                        </div>
                      </div>
                      
                      <div class="col-lg-6 col-md-6  mb-4 parameter_box ">
                        <div class="nf-gradient-5">
                          <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/soil-ph.png" alt="image" class="img-fluid">
                          <h4 class="nf-f-size-16 text-white">Stocking Density in culture pond per hectare</h4>
                          <h2><?php echo $stocking_density_in_culture_pond_per_hectare?></h2>
                        </div>
                      </div>        
                    </div>
                  </div>
                  <?php if($explore_raw_material!=''){ ?>
                    <div class="col 12 col-lg-2 parameter_box databank_box">
                      <div class="nf-gradient-20">
                        <h4 class="nf-f-size-16 text-white">Explore Raw Material</h4>
                        <a href="<?php echo $explore_raw_material;?>" target="_blank">NER DATABASE</a>
                      </div>
                    </div>
                  <?php } ?>
                </div>

              <?php }

            }else if($aquaculture_type=='Fish Value Chain - Hatchery'){
              $record=$record+1;
              ?>


              <h4 class="nf-f-size-20 nf-strong mb-4">Imporatnat Parameters</h4>
              <div class="row">
                <div class="col-lg-4 col-md-6  mb-4 parameter_box ">
                  <div class="nf-gradient-5">
                    <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/climate.png" alt="image" class="img-fluid">
                    <h4 class="nf-f-size-16 text-white">Brood Stock Quantity</h4>
                    <h2><?php echo $brood_stock_quantity;?></h2>
                  </div>
                </div>
                <div class="col-lg-4 col-md-6  mb-4 parameter_box ">
                  <div class="nf-gradient-4">
                    <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/soil-ph.png" alt="image" class="img-fluid">
                    <h4 class="nf-f-size-16 text-white">Brood Stock Age</h4>
                    <h2><?php echo $brood_stock_age;?></h2>
                  </div>
                </div>
                <div class="col-lg-4 col-md-6  mb-4 parameter_box ">
                  <div class="nf-gradient-3">
                    <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/harvesting.png" alt="image" class="img-fluid">
                    <h4 class="nf-f-size-16 text-white">Spawning Season</h4>
                    <h2><?php echo $spawning_season;?></h2>
                  </div>
                </div>
                <?php if($explore_raw_material!=''){ ?>
                  <div class="col-lg-4 col-md-6  mb-4 parameter_box ">
                    <div class="nf-gradient-20">
                      <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/soil-ph.png" alt="image" class="img-fluid">
                      <h4 class="nf-f-size-16 text-white">Explore Raw Material</h4>
                       <a href="<?php echo $explore_raw_material;?>" target="_blank">NER DATABASE</a>
                    </div>
                  </div>
                <?php } ?>
              </div>

            <?php }else if($aquaculture_type=='Fish Value Chain - Trading'){
              $record=$record+1;
              ?>

              
              <h4 class="nf-f-size-20 nf-strong mb-4">Imporatnat Parameters</h4>
              <div class="row">
                <div class="col-12 col-lg-12">

                  <div class="row">
                    <div class="col-lg-6 col-md-6  mb-4 parameter_box ">
                      <div class="nf-gradient-5">
                        <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/climate.png" alt="image" class="img-fluid">
                        <h4 class="nf-f-size-16 text-white">Local Name</h4>
                        <h2><?php echo $local_name; ?></h2>
                      </div>
                    </div>
                    <div class="col-lg-6 col-md-6  mb-4 parameter_box ">
                      <div class="nf-gradient-4">
                        <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/soil-ph.png" alt="image" class="img-fluid">
                        <h4 class="nf-f-size-16 text-white">Average Retail Sales Rate Per kg </h4>
                        <h2><?php echo $average_retail_sales_rate_per_kg; ?></h2>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6 col-md-6  mb-4 parameter_box ">
                      <div class="nf-gradient-3">
                        <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/soil-ph.png" alt="image" class="img-fluid">
                        <h4 class="nf-f-size-16 text-white">Market Size in Gram</h4>
                        <h2><?php echo $market_size_in_gram; ?></h2>
                      </div>
                    </div>
                    <div class="col-lg-6 col-md-6  mb-4 parameter_box ">
                      <div class="nf-gradient-2">
                        <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/harvesting.png" alt="image" class="img-fluid">
                        <h4 class="nf-f-size-16 text-white">Farm Gate Price Per kg</h4>
                        <h2><?php echo $farm_gate_price_per_kg; ?></h2>
                      </div>
                    </div>

                    <div class="col-lg-6 col-md-6  mb-4 parameter_box ">
                      <div class="nf-gradient-1">
                        <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/harvesting.png" alt="image" class="img-fluid">
                        <h4 class="nf-f-size-16 text-white">Shrinkage Percentage</h4>
                        <h2><?php echo $shrinkage_percentage; ?></h2>
                      </div>
                    </div>
                    <div class="col-lg-6 col-md-6  mb-4 parameter_box ">
                      <div class="nf-gradient-5">
                        <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/sowing-season2.png" alt="image" class="img-fluid">
                        <h4 class="nf-f-size-16 text-white">OUTPUT</h4>
                        <h2><?php echo $output; ?></h2>
                      </div>
                    </div>

                    <?php if($explore_raw_material!=''){ ?>
                      <div class="col-lg-6 col-md-6  mb-4 parameter_box ">
                        <div class="nf-gradient-20">
                          <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/soil-ph.png" alt="image" class="img-fluid">
                          <h4 class="nf-f-size-16 text-white">Explore Raw Material</h4>
                           <a href="<?php echo $explore_raw_material;?>" target="_blank">NER DATABASE</a>
                        </div>
                      </div>
                    <?php } ?>
                    <div class="col-12 col-lg-8 nf-listing-c-width">
                      <h4 class="nf-f-size-20 nf-strong mb-4">Species Favourable for NE</h4>
                      <p> <?php echo $species_favouable_for_ne; ?> </p> 

                    </div>
                  </div>
                </div>
              </div>


            <?php }?>  

            <?php      
          }




          if($record==0) $msg= '<b>No Record Found.</b>';
          if($record==0 or count($blog_posts->posts)==0) $msg= '<b>No Record Found.</b>';
          echo $msg; ?>

          <?php $postid = $post->ID; ?>


          <?php if($record>0){?>
          <section class="nf-s-stories-section nf-tommoto-section">
            <div class="container">
              <div class="row">
                <div class="col-12">
                  <h2>Success Stories <div class="explore-div"><a href="<?php echo site_url()?>/success-stories-details/" class="nf-explore-bgbtn">Explore All Videos </a> <a href="<?php echo site_url()?>/blogs-articles-list/" class="nf-explore-bgbtn ml-3">Explore All Blogs</a></div> </h2>
                </div>

              </div>
              <div class=" success-story-slider">
                <?php
      $suc = get_post_meta( $postid, '_event_suc_value_key', true ); 
      $sucurl = get_post_meta( $postid, '_event_sucurl_value_key', true );
      $sucdesc = get_post_meta( $postid, '_event_sucdesc_value_key', true ); 
      if(!empty($suc))
      {
        $suc = explode('*****',$suc);
        $sucurl = explode('*****',$sucurl);
        $sucdesc = explode('*****',$sucdesc);
        $k=0;
        for($i=0;$i<count($suc);$i++) 
        {
          if($k==4) $k=0;
          $k = $k+1;     

          if(strpos($sucurl[$i],'youtu')!=false && strpos($sucurl[$i],'=')!=false) 
          {
              $end_str = strstr($sucurl[$i], '='); 
              $final_str = str_replace('=', '', $end_str);
              $youtube_url = 'https://www.youtube.com/embed/';
          } 
          else
          {
            $final_str='';
            $youtube_url= $sucurl[$i];
          }

          if (function_exists("convertYoutube")) {
            $final_str='';
            $youtube_url =  convertYoutube($sucurl[$i]); 
          }   
          ?>

          <div class="item-box">
            <div class="nf-ss-inner">
              <div class="nf-ss-img-inner">
                            <iframe width="100%" height="200" src="<?php echo $youtube_url.$final_str; ?>" frameborder="0" allowfullscreen=""></iframe>
                          </div>
                          <div class="nf-ss-text-inner">
                            <h5><?php echo $suc[$i];?></h5>
                            <p><?php echo $sucdesc[$i];?></p>
                            <div><input type="hidden" id="copylink<?php echo $i?>ss" value="<?php echo $youtube_url.$final_str; ?>">
                              <a href="javascript:void(0)" title="Copy Link" class="copylink-class" onclick="copyLinkFunction('<?php echo $i?>ss')">Copy Link</a></div>
                            </div>

                          </div>
                        </div>

            <?php 
              }
            }
            ?>

              <?php/*?>  <?php
          //videos
                $i=0;
                $sts = array(
                  'key'     =>  'flag',
                  'value'    => 'In-House',
                  'compare'  => '='
                );
                $sts_dept = array(
                  'key'     =>  'sectors',
                  'value'    => 'Aquaculture',
                  'compare'  => '='
                );

                $tot_blog_args = array(
                  'post_type' => 'success_stories',
                  'post_status' => 'publish',
                  'posts_per_page' => 5,
                  'meta_query'     =>  array(
                    array(
                      'relation' => 'AND',
                      $sts,
                      $sts_dept

                    )
                  )
                );
                $tot_blog_posts = new WP_Query($tot_blog_args);
                if(count($tot_blog_posts->posts)>0){

                  while($tot_blog_posts->have_posts()) { 

                    $tot_blog_posts->the_post();
                    $values= get_fields();
                    if(strpos($values['video_url'],'youtu')!=false && strpos($values['video_url'],'=')!=false) 
                    {
                      $end_str = strstr($values['video_url'], '='); 
                      $final_str = str_replace('=', '', $end_str);
                      $youtube_url = 'https://www.youtube.com/embed/';
                    } 
                    else
                    {
                      $final_str='';
                      $youtube_url= $values['video_url'];
                    }
                    $description = $values['description'];

                    $i++;
                    ?>
                    <div class="item-box">
                      <div class="nf-ss-inner">
                        <div class="nf-ss-img-inner">

                         <iframe width="100%" height="300" src="<?php echo $youtube_url.$final_str ?>" frameborder="0" allowfullscreen=""></iframe>
                       </div>
                       <div class="nf-ss-text-inner">
                        <h5><?php echo $post->post_title;?></h5>
                        <p><?php
                        if (strlen($description) > 150) {
                          $stringCut = substr($description, 0, 80);
                          $endPoint = strrpos($stringCut, ' ');
                          $description = $endPoint? substr($stringCut, 0, $endPoint).'...':substr($stringCut, 0).'...';
                        } 
                        echo $description;
                      ?></p>
                      <div>


                       <input type="hidden" id="copylink<?php echo $i?>si" value="<?php echo $youtube_url.$final_str; ?>">
                       <a href="javascript:void(0)" title="Copy Link" class="copylink-class" onclick="copyLinkFunction('<?php echo $i?>si')">Copy Link</a>


                     </div>

                   </div>

                 </div>
               </div>

             <?php }?>
           <?php }
           wp_reset_query();
           ?><?php*/?>

           <?php
          //blogs=======
           $i=0;
           $sts = array(
            'key'     =>  'flag',
            'value'    => 'In-House',
            'compare'  => '='
          );
           $sts_dept = array(
            'key'     =>  'sectors',
            'value'    => 'Aquaculture',
            'compare'  => '='
          );

           $tot_blog_args = array(
            'post_type' => 'blogs_and_articles',
            'post_status' => 'publish',
            'posts_per_page' => 5,
            'meta_query'     =>  array(
              array(
                'relation' => 'AND',
                $sts,
                $sts_dept

              )
            )
          );
           $tot_blog_posts = new WP_Query($tot_blog_args);
           if(count($tot_blog_posts->posts)>0){

            while($tot_blog_posts->have_posts()) { 

              $tot_blog_posts->the_post();
              $values= get_fields();
              if ($values) {
                $type = '';
                $flag = '';
                $image = '';
                $blog_description = '';
                $blog_link = '';
                $description='';

                foreach($values as $key => $value)
                {
                  if($key=='image'){ $image = $value; }
                  if($key=='blog_link'){ $blog_link = $value;  }
                  if($key=='blog_description'){ $blog_description = $value;}
                  if($key=='description'){ $description = $value;}
                  if($key=='type'){ $type = $value;} 
                  if($key=='flag'){ $flag = $value;}
                }
              }
              $i++;
              ?>
              <div class="item-box">
                <div class="nf-ss-inner">
                  <div class="nf-ss-img-inner">

                   <img width="100%" height="300" src="<?php echo $image; ?>"></img>
                 </div>
                 <div class="nf-ss-text-inner">
                  <h5><?php echo $post->post_title;?></h5>
                  <p><?php
                  if (strlen($description) > 150) {
                    $stringCut = substr($description, 0, 80);
                    $endPoint = strrpos($stringCut, ' ');
                    $description = $endPoint? substr($stringCut, 0, $endPoint).'...':substr($stringCut, 0).'...';
                  } 
                  echo $description;
                ?></p>
                <div>

                 <input type="hidden" id="copylink<?php echo $i?>bi" value="<?php echo get_permalink( $post->ID ); ?>">
                 <a href="javascript:void(0)" title="Copy Link" class="copylink-class" onclick="copyLinkFunction('<?php echo $i?>bi')">Copy Link</a>


               </div>

             </div>

           </div>
         </div>

       <?php }?>
     <?php }
     wp_reset_query();
     ?>


     <?php/*?><?php
          //videos
     $i=0;
     $sts = array(
      'key'     =>  'flag',
      'value'    => 'External',
      'compare'  => '='
    );
     $sts_dept = array(
      'key'     =>  'sectors',
      'value'    => 'Aquaculture',
      'compare'  => '='
    );

     $tot_blog_args = array(
      'post_type' => 'success_stories',
      'post_status' => 'publish',
      'posts_per_page' => 5,
      'meta_query'     =>  array(
        array(
          'relation' => 'AND',
          $sts,
          $sts_dept

        )
      )
    );
     $tot_blog_posts = new WP_Query($tot_blog_args);
     if(count($tot_blog_posts->posts)>0){

      while($tot_blog_posts->have_posts()) { 

        $tot_blog_posts->the_post();
        $values= get_fields();
        if(strpos($values['video_url'],'youtu')!=false && strpos($values['video_url'],'=')!=false) 
        {
          $end_str = strstr($values['video_url'], '='); 
          $final_str = str_replace('=', '', $end_str);
          $youtube_url = 'https://www.youtube.com/embed/';
        } 
        else
        {
          $final_str='';
          $youtube_url= $values['video_url'];
        }
        $description = $values['description'];

        $i++;
        ?>
        <div class="item-box">
          <div class="nf-ss-inner">
            <div class="nf-ss-img-inner">

             <iframe width="100%" height="300" src="<?php echo $youtube_url.$final_str ?>" frameborder="0" allowfullscreen=""></iframe>
           </div>
           <div class="nf-ss-text-inner">
            <h5><?php echo $post->post_title;?></h5>
            <p><?php
            if (strlen($description) > 150) {
              $stringCut = substr($description, 0, 80);
              $endPoint = strrpos($stringCut, ' ');
              $description = $endPoint? substr($stringCut, 0, $endPoint).'...':substr($stringCut, 0).'...';
            } 
            echo $description;
          ?></p>
          <div>


           <input type="hidden" id="copylink<?php echo $i?>se" value="<?php echo $youtube_url.$final_str; ?>">
           <a href="javascript:void(0)" title="Copy Link" class="copylink-class" onclick="copyLinkFunction('<?php echo $i?>se')">Copy Link</a>


         </div>

       </div>

     </div>
   </div>

 <?php }?>
<?php }
wp_reset_query();
?><?php*/?>

<?php
$i=0;
$sts = array(
  'key'     =>  'flag',
  'value'    => 'External',
  'compare'  => '='
);
$sts_dept = array(
  'key'     =>  'sectors',
  'value'    => 'Aquaculture',
  'compare'  => '='
);

$tot_blog_args = array(
  'post_type' => 'blogs_and_articles',
  'post_status' => 'publish',
  'posts_per_page' => 5,
  'meta_query'     =>  array(
    array(
      'relation' => 'AND',
      $sts,
      $sts_dept

    )
  )
);
$tot_blog_posts = new WP_Query($tot_blog_args);
if(count($tot_blog_posts->posts)>0){

  while($tot_blog_posts->have_posts()) { 

    $tot_blog_posts->the_post();
    $values= get_fields();
    if ($values) {
      $type = '';
      $flag = '';
      $image = '';
      $blog_description = '';
      $blog_link = '';
      $description='';

      foreach($values as $key => $value)
      {
        if($key=='image'){ $image = $value; }
        if($key=='blog_link'){ $blog_link = $value;  }
        if($key=='blog_description'){ $blog_description = $value;}
        if($key=='description'){ $description = $value;}
        if($key=='type'){ $type = $value;} 
        if($key=='flag'){ $flag = $value;}
      }
    }
    $i++;
    ?>
    <div class="item-box">
      <div class="nf-ss-inner">
        <div class="nf-ss-img-inner">

         <img width="100%" height="300" src="<?php echo $image; ?>"></img>
       </div>
       <div class="nf-ss-text-inner">
        <h5><?php echo $post->post_title;?></h5>
        <p><?php
        if (strlen($description) > 150) {
          $stringCut = substr($description, 0, 80);
          $endPoint = strrpos($stringCut, ' ');
          $description = $endPoint? substr($stringCut, 0, $endPoint).'...':substr($stringCut, 0).'...';
        } 
        echo $description;
      ?></p>
      <div>

       <input type="hidden" id="copylink<?php echo $i?>be" value="<?php echo $blog_link; ?>">
       <a href="javascript:void(0)" title="Copy Link" class="copylink-class" onclick="copyLinkFunction('<?php echo $i?>be')">Copy Link</a>


     </div>

   </div>

 </div>
</div>

<?php }?>
<?php }
wp_reset_query();
?>


</div>
</div>
</section>

<?php
$rows = get_post_meta( $postid, '_event_institute_value_key', true ); 
$rows1 = get_post_meta( $postid, '_event_institute_link_key', true );

if(!empty($rows))
{
  ?>
  <!--<h4 class="nf-f-size-16 nf-strong my-3 mb-4 mt-4">Training Institute</h4>-->
  <h4 class="nf-f-size-16 nf-strong my-3 mb-4 mt-4 nf-btnTitle">Training Institute <a href="<?php echo site_url()?>/training_page/" class="nf-explore-bgbtn">Explore All </a></h4>

  <div class="clat-carrer-slider vm-training-slider">

    <?php
    $k=0; 
    $rows = explode('*****',$rows);
    $rows1 = explode('*****',$rows1);

                                    //echo 'Event Rows: ';echo '<br>';
    for($i=0;$i<count($rows);$i++) 
    {
                                       //echo  $rows[$i].' - '.$rows1[$i]; 
      if($k==4) $k=0; 
      $k = $k+1; 
      echo '<a href="'.$rows1[$i].'" target="_blank"><div class="item grd-bg'.$k.'">'.$rows[$i].'</div></a>';
    } 
    ?>

                  

                </div>
                <?php
              }

              ?>

              <section class="nf-calculator-section nf-cal-tommoto-wrap">
                <div class="container">
                  <div class="row">
                    <div class="col-12">
                      <div class="nf-calculator-block">
                        <div class="nf-left-block">
                          <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/home/calendar.png" alt="calendar">
                          <h2>Farm Cost Calculator <span>Know your Farming cost in advance </span></h2>
                        </div>
                        <div class="nf-right-block">
                          <a href="<?php echo site_url()?>/cost-calculate" class="nf-button-v-small">Calculate Now</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </section>
              <?php 
              $suc = get_post_meta( $postid, '_event_learn_value_key', true ); 
              $sucurl = get_post_meta( $postid, '_event_learnurl_value_key', true );
              if(!empty($suc))
              {
                ?>

                <section class="nf-learing-section">
                  <!--<h4>Learning Videos</h4>-->
                  <h4 class="nf-btnTitle">Learning Videos <a href="<?php echo site_url()?>/e-learning/" class="nf-explore-bgbtn">Explore All </a></h4>
                  <div class="row">


                    <?php
                    $suc = explode('*****',$suc);
                    $sucurl = explode('*****',$sucurl);

                    $k=0;
                    for($i=0;$i<count($suc);$i++) 
                    {
                      if($k==4) $k=0;
                      $k = $k+1;     

                      if(strpos($sucurl[$i],'youtu')!=false && strpos($sucurl[$i],'=')!=false) 
                      {
                        $end_str = strstr($sucurl[$i], '='); 
                        $final_str = str_replace('=', '', $end_str);
                        $youtube_url = 'https://www.youtube.com/embed/';
                      } 
                      else
                      {
                        $final_str='';
                        $youtube_url= $sucurl[$i];
                      }

                      if (function_exists("convertYoutube")) {
                        $final_str='';
                        $youtube_url =  convertYoutube($sucurl[$i]); 
                      } 
                      ?>

                      <div class="col-12 col-lg-4">
                        <a href="#">
                          <iframe width="100%" height="200" src="<?php echo $youtube_url.$final_str; ?>" frameborder="0" allowfullscreen=""></iframe>
                          <h5><?php echo $suc[$i];?></h5>
                        </a>
                        <input type="hidden" id="copylink<?php echo $i?>1" value="<?php echo $youtube_url.$final_str; ?>">
                        <a href="javascript:void(0)" title="Copy Link" class="copylink-class"onclick="copyLinkFunction('<?php echo $i?>1')">Copy Link</a>

                      </div>

                      <?php 
                    }
                    ?>

                    

                    
                  </div>
                </section>
                <?php
              } 
              ?>

              <?php 
              
              if($view_complete_details!=''){?>
                <div class="row">
                  <div class="col-lg-12 text-center col-md-12 mb-2 mb-lg-0 vm-vc-detail"><a class="btn nf-button-v-small w-50" href="<?php echo $view_complete_details?>" target="_blank" role="button">View Complete Details</a></div>
                </div>
              <?php }?>




              <?php 
              $suc = get_post_meta( $postid, '_event_gov_value_key', true ); 
              $sucurl = get_post_meta( $postid, '_event_govurl_value_key', true );
              if(!empty($suc))
              {
                ?>

                <section class="nf-rgs">
                  <h4 class="nf-btnTitle">Related Government Schemes <a href="<?php echo site_url()?>/schemes-policies/"  class="nf-explore-bgbtn">Explore All </a></h4>
                  <div class="row">

                    <?php
                    $suc = explode('*****',$suc);
                    $sucurl = explode('*****',$sucurl);

                    $k=0;
                    for($i=0;$i<count($suc);$i++) 
                    {

                      ?>

                      <div class="col-12 col-lg-4">
                        <ul>
                          <li><a target="_blank" href="<?php echo $sucurl[$i]; ?>"><?php echo $suc[$i];?></a></li>                        
                        </ul>
                      </div>

                      <?php 
                    }
                    ?>





                    
                    
                  </div>
                </section>
                <?php
              } 
              ?>

              <div class="circle_bg2">
                <div class="row">
                  <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/circle-bg2.png" alt="background image" class="img-fluid">
                </div>
              </div>
              <?php }?>

            </div>

          </div>
        </div>
      </div>
      <div class="circle_bg2 right-0">
       <div class="row mx-0">
         <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/circle-bg2.png" alt="background image" class="img-fluid">
       </div>
     </div>	
   </div>
 </form>

 <!-- End Study tour in north section  -->

 <!-- footer start -->   
 <?php get_footer(); ?>
 <script> 
  $(document).ready(function(){
    $('.check_species').click(function() {
      $('.check_species').not(this).prop('checked', false);
      document.getElementById("form_id").submit();
    });
    $('.check_technology').click(function() {
      $('.check_technology').not(this).prop('checked', false);
      document.getElementById("form_id").submit();
    });
    $('.check_cultural_system').click(function() {
      $('.check_cultural_system').not(this).prop('checked', false);
      document.getElementById("form_id").submit();
    });
  });

  function copyLinkFunction(id) {
    /* Get the text field */

    var videoLink = document.getElementById("copylink"+id);

    videoLink.setAttribute('type','text');

    /* Select the text field */
    videoLink.select();
  //videoLink.setSelectionRange(0, 99999); /* For mobile devices */
//alert(id);
/* Copy the text inside the text field */
document.execCommand("copy");

videoLink.setAttribute('type','hidden');

/* Alert the copied text */
  //alert("Copied the text: " + videoLink.value);
  Swal.fire(
    'Link Copied',
    videoLink.value,
    'success'
    )
}
document.body.scrollTop = 500;
document.documentElement.scrollTop = 500;
</script> 