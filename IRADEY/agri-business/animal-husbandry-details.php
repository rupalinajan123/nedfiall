<?php /*Template Name: Animal Husbandry Details */ ?>
<?php 
if($_POST['animal_husbandry_type']=='')
{  
  wp_redirect(site_url('meat-production'));
  exit; 
}  

get_header();  

//echo '>>'.$_POST['animal'];exit;

if($_POST['animal']=='' && $_POST['animal_poltry']!='') $_POST['animal']=$_POST['animal_poltry'];


$record=0;
$blog_args = array(
  'post_type' => 'animal_husbandry',
  'post_status' => 'publish',
  'title' =>$_POST['animal'],
  'meta_key'     =>  'animal_husbandry_type',
  'meta_value'   =>  $_POST['animal_husbandry_type'],
  'posts_per_page' => '1'
);


$blog_posts = new WP_Query($blog_args);
       //echo "<pre>";
        //print_r($blog_posts);exit;

$banner_image = get_field( "banner_image", $blog_posts->posts[0]->ID );
if($_POST['animal']=='') $_POST['animal'] = $blog_posts->posts[0]->post_title;

if($banner_image=='') $banner_image= get_template_directory_uri(). '/assets/img/no_record_found_banner.png';

?>
<!-- header-end -->

<!-- inner-banner-start -->
<div class="inner-banner">
  <div class="container">
   <div class="banner-title"> 
    <h3><?php echo $_POST['animal_husbandry_type']; //$_POST['animal'];?> <a href="#" class="changeTopic" data-toggle="collapse" data-target="#changeTopic" >Change Topic</a></h3>
    <ul class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Entrepreneurship</a></li>
      <li class="breadcrumb-item"><a href="#">Know your Business</a></li>
      <li class="breadcrumb-item"><a href="#">Agri-Business</a></li>
      <li class="breadcrumb-item"><a href="#">Production</a></li>
      <li class="breadcrumb-item"><a href="#">Animal Husbandry</a></li>
      <?php  if($_POST['animal_husbandry_type']=='Breeding Animal') { ?>
        <li class="breadcrumb-item"><a href="#"><?php echo 'Breeding';?></a></li>
        <li class="breadcrumb-item"><a href="#"><?php echo 'Livestock';?></a></li>
      <?php }else if($_POST['animal_husbandry_type']=='Breeding Bird') { ?>
        <li class="breadcrumb-item"><a href="#"><?php echo 'Breeding';?></a></li>
        <li class="breadcrumb-item"><a href="#"><?php echo 'Poultry';?></a></li>
      <?php }else{ ?>
        <li class="breadcrumb-item"><a href="#"><?php echo $_POST['animal_husbandry_type'];?></a></li>
      <?php }
      if($_POST['meat_production_option']=='poultry') { ?>
       <li class="breadcrumb-item">Poultry Rearing</li>
     <?php } else if($_POST['meat_production_option']=='livestock') {  ?>

      <li class="breadcrumb-item">Livestock Rearing</li>
    <?php } ?>
    <li class="breadcrumb-item active"><?php echo $_POST['animal'];?></li>
  </ul>
</div>

<div class="chagetopic-modal changeTopic-collapse">
  <div class="collapse " id="changeTopic" style="">
    <a href="#" id="changeTopic_close"><i class="fa fa-close"></i></a>
    <div class="card card-body">
      <div class="row">

        <?php
        $k=0;
        $t=0;
        $var = get_field_object('field_60c3339c6524c');

        $k=0;
        unset($var['choices']['Breeding Animal']);
        unset($var['choices']['Egg Production - Breeding']);
                        //print_r($var['choices']);

        foreach($var['choices'] as $choice)
        {
          ?>

          <?php 
          if($k==0){ ?>
            <div class="col-md-4">
              <h4><?php if($t==0){?>Select Animal Husbandry <?php }else echo '&nbsp;'; ?></h4>
              <ul>
              <?php }
              if($choice=='Breeding Bird') $choice='Breeding';
              if($choice=='Egg Production - Food') $choice='Egg Production';
              $curslug = str_replace(' ','-',strtolower($choice));
              if($the_slug!=$curslug){
                ?>      
                <li>
                  <a class="box" href="<?php echo site_url()?>/<?php echo $curslug; ?>"><?php echo $choice;?></a>
                </li>
                <?php
              } 
              $totk=count($var['choices'])-1;
              if($k==7 or $totk==$t){ $k=0;?>
              </ul>
            </div>
          <?php }else{ $k++;} $t++; ?>

          <?php
        }
        wp_reset_postdata();
        ?>
      </div>
    </div>
  </div>
</div>

<div class="banner-content">
  <div class="row">
    <div class="col-md-4 banner-img pr-0"><img src="<?php echo $banner_image; ?>"></div>
    <div class="col-md-8  pl-0">
      <div class="bannerbg nf-gradient-3 justify-content-start p-3 nf-height-100">
        <h4 class="nf-f-size-24 pl-0"><?php echo $_POST['animal'];?></h4>
        <p class="text-white pr-md-5"><?php echo $blog_posts->posts[0]->post_content;?></p>
        <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/layers-bg.png" alt="layers background" class="nf-layes-bg">
      </div>
    </div>
  </div>
</div>
</div>
</div>
<?php    // print_r($_POST); ?>
<!-- inner-banner-end -->
<!-- Study tour in north section  -->
<form method="post" id="form_id">
  <input type="hidden" name="animal_husbandry_type" value="<?php echo $_POST['animal_husbandry_type'];?>">
  <div class="inner-body">
    <div class="container">
      <div class="nf-form-wrap">
        <div class="row">
          <div class="col-12 col-lg-4 nf-sidebar-c-width">
            <div class="courses-details-sidebar-area search-sidebar nf-sidebar mt-md-5">
              <div class="widget mb-20 widget-padding white-bg">
                <a class="btn-link nf-color-1" data-toggle="collapse" href="#state-filter">
                  <?php
                  $heading='Animal';
                  if($_POST['animal_husbandry_type'] == 'Wool Production')
                  { 
                   $icon_image ="wool.png";
                   $heading='Wool Production';
                 }
                 else if($_POST['animal_husbandry_type'] == 'Dairy Production')
                 {
                   $icon_image ="dairy.png";
                   $heading='Dairy';
                 }
                 else if($_POST['animal_husbandry_type'] == 'Breeding Animal')
                 { 
                   $icon_image ="livestock_animal.png";
                   $heading='Livestock';
                 }
                 else if($_POST['animal_husbandry_type'] == 'Breeding Bird')
                 {
             $icon_image ="chick.png"; //bird.png
             $heading='Poultry';
           }
           else if($_POST['animal_husbandry_type'] == 'Egg Production - Food')
           {
             $icon_image ="boiled-egg.png";
             $heading='Egg Production';
           }
           else if($_POST['animal_husbandry_type'] == 'Egg Production - Breeding')
           {
             $icon_image ="boiled-egg.png";
             $heading='Egg Production';
           }
           else
           {
            $icon_image ="chick.png";
          }


          ?>
          <?php


            // args
              $g=0;
              if($_POST['animal_poltry']!='')
              { //echo "***********poultry rearing"; 
            $args = array(
              'post_type'   => 'animal_husbandry',
              'meta_key'    => 'animal_husbandry_type',
              'meta_value'  => $_POST['animal_husbandry_type'],
              'orderby' => 'post_title',
              'order'   => 'ASC',
              'post_status' => 'publish',
              'posts_per_page' => -1,
              'meta_query'     =>  array(

                array(
                  'key'     =>  'meat_production_type',
                  'value'   =>  'Poultry Rearing'
                )
              )
            );
          }
          else if($_POST['animal_husbandry_type']=='Meat Production')
            {//echo "***********Livestock Rearing"; 
          $args = array(
            'post_type'   => 'animal_husbandry',
            'meta_key'    => 'animal_husbandry_type',
            'meta_value'  => $_POST['animal_husbandry_type'],
            'orderby' => 'post_title',
            'order'   => 'ASC',
            'post_status' => 'publish',
            'posts_per_page' => -1,
            'meta_query'     =>  array(

              array(
                'key'     =>  'meat_production_type',
                'value'   =>  'Livestock Rearing'
              )
            )
          ); 
        }
        else
        {
          $args = array(
            'post_type'   => 'animal_husbandry',
            'meta_key'    => 'animal_husbandry_type',
            'meta_value'  => $_POST['animal_husbandry_type'],
            'orderby' => 'post_title',
            'order'   => 'ASC',
            'post_status' => 'publish',
            'posts_per_page' => -1

          );

        }
        $the_query = new WP_Query( $args );

            //echo "<pre>";
            //print_r($the_query);
        ?>


          <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/<?php echo $icon_image; ?>" alt="state-white"> <span> <?php echo $heading?> (<?php echo $the_query->post_count?>) </span></a>
          <div class="widget-link collapse show" id="state-filter">
            <ul class="sidebar-link nf-sidebar-scroll">

              

        <!--  hidden fields for poultry  -->
        <input type="hidden" name="meat_production_option" value="<?php if(isset($_POST['meat_production_option'])){echo $_POST['meat_production_option']; } ?>">

        <input type="hidden" name="animal_poltry" value="<?php if(isset($_POST['animal_poltry'])){echo $_POST['animal_poltry']; } ?>">

        <?php 

        if( $the_query->have_posts() ): ?>
          <?php while( $the_query->have_posts() ) : $the_query->the_post(); 
            $g++;
            $croptile = $post->post_title;
            if($_POST['animal']==$croptile) $checked = 'checked'; 
            else if(is_array($_POST['animal']) && in_array($croptile,$_POST['animal'])) $checked = 'checked'; 
            else  $checked = ''; 
            if($croptile_new!=$croptile){
              ?>
              <li>
                <div class="nf-checkbox-wrap">
                  <input type="checkbox" class="check_animal" name="animal" <?php echo $checked;?> id="animal<?php echo $g;?>" name="checkbox-group" value="<?php the_title(); ?>" onclick="">


                  <label for="animal<?php echo $g;?>"><?php the_title(); ?> </label>
                </div>
              </li>

              <?php 
            }
            $croptile_new = $post->post_title;
          endwhile; ?>
        <?php endif; ?>

      </ul>
    </div> 
  </div>
</div>
</div>
<div class="col-12 col-lg-8 nf-listing-c-width">
  <?php if(!empty($_POST['animal'])){?>
    <div class="nf-state-listing-block">
     <div class="row">
      <?php if(!empty($_POST['animal'])){?>
        <div class="col-12 col-lg-6">
          <a href="#">
            <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/<?php echo $icon_image; ?>" class="nf-w-t1">
            <span><?php if(is_array($_POST['animal'])) echo Implode(',<br>',$_POST['animal']);else echo $_POST['animal'];?></span>
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
    $animal_husbandry_type='';
    $meat_production_type='';
    $animal_variety=''; 
    $total_stocking = '';
    $mortality='';
    $marketable_size='';
    $marketable_age='';
    $average_market_rate='';
    $variety='';
    $banner_image='';

    $breed_name='';
    $number_of_birds='';
    $space_requirement='';
    $rearing_period='';
    $output='';
    $feed_consumtion_kfbird='';
    $feed_conversion_ratio='';


    $daily_avg_milk_producttion='';
    $standard_fat_percentage='';
    $snf='';
    $average_market_price='';

    $mortality_percentage='';
    $maturiry_age_in_months='';
    $wool_production_cycle_per_year='';
    $production_per_cycle='';
    $average_market_rate='';

    $no_of_kiddingfurrowing_per_year_no_of_chicks='';
    $avg_litter_size_no_of_hatching_egges='';
    $sexual_maturity='';
    $malefemale_ratio='';
    $weaning_period_in_months='';
    $species_favourable_for_ne='';

    $total_no_of_hen_housed_chicks='';
    $hen_housed_egg_production='';
    $hen_housed_hatching_eggs='';

    $standard_egg_weight_in_gram='';
    $egg_prductionyear='';
    $average_feed_consumption_gmday_during_laying_stage_in_grams='';
    $rearing_system='';
    $explore_raw_material=''; 
    $breeds='';
    $average_laying_weeks='';

    foreach($values as $key => $value)
    {
      if($key=='animal_husbandry_type'){ $animal_husbandry_type = $value; } 
      if($key=='meat_production_type'){ $meat_production_type = $value; }
      if($key=='animal_variety'){ $animal_variety = $value; }
      if($key=='total_stocking'){ $total_stocking = $value; }
      if($key=='mortality'){ $mortality = $value; }
      if($key=='marketable_size'){ $marketable_size = $value; }
      if($key=='marketable_age'){ $marketable_age = $value; }
      if($key=='average_market_rate'){ $average_market_rate = $value; }
      if($key=='variety'){ $variety = $value; }
      if($key=='banner_image'){ $banner_image = $value; }

      if($key=='breed_name'){ $breed_name = $value; }
      if($key=='number_of_birds'){ $number_of_birds = $value; }
      if($key=='space_requirement'){ $space_requirement = $value; }
      if($key=='rearing_period'){ $rearing_period = $value; }
      if($key=='output'){ $output = $value; }
      if($key=='feed_consumtion_kfbird'){ $feed_consumtion_kfbird = $value; }
      if($key=='feed_conversion_ratio'){ $feed_conversion_ratio = $value; }

      if($key=='daily_avg_milk_producttion'){ $daily_avg_milk_producttion = $value; }
      if($key=='standard_fat_percentage'){ $standard_fat_percentage = $value; }
      if($key=='snf'){ $snf = $value; }
      if($key=='average_market_price'){ $average_market_price = $value; }

      if($key=='mortality_percentage'){ $mortality_percentage = $value; }
      if($key=='maturiry_age_in_months'){ $maturiry_age_in_months = $value; }
      if($key=='wool_production_cycle_per_year'){ $wool_production_cycle_per_year = $value; }
      if($key=='production_per_cycle'){ $production_per_cycle = $value; }
      if($key=='average_market_rate'){ $average_market_rate = $value; }

      if($key=='no_of_kiddingfurrowing_per_year_no_of_chicks'){ $no_of_kiddingfurrowing_per_year_no_of_chicks = $value; }
      if($key=='avg_litter_size_no_of_hatching_egges'){ $avg_litter_size_no_of_hatching_egges = $value; }
      if($key=='sexual_maturity'){ $sexual_maturity = $value; }
      if($key=='malefemale_ratio'){ $malefemale_ratio = $value; }
      if($key=='weaning_period_in_months'){ $weaning_period_in_months = $value; }
      if($key=='species_favourable_for_ne'){ $species_favourable_for_ne = $value; }

      if($key=='total_no_of_hen_housed_chicks'){ $total_no_of_hen_housed_chicks = $value; }
      if($key=='hen_housed_egg_production'){ $hen_housed_egg_production = $value; }
      if($key=='hen_housed_hatching_eggs'){ $hen_housed_hatching_eggs = $value; }


      if($key=='standard_egg_weight_in_gram'){ $standard_egg_weight_in_gram = $value; }
      if($key=='egg_prductionyear'){ $egg_prductionyear = $value; }
      if($key=='average_feed_consumption_gmday_during_laying_stage_in_grams'){ $average_feed_consumption_gmday_during_laying_stage_in_grams = $value; }
      if($key=='rearing_system'){ $rearing_system = $value; }
      if($key=='explore_raw_material'){ $explore_raw_material = $value; }
      if($key=='breeds'){ $breeds = $value; }
      if($key=='average_laying_weeks'){ $average_laying_weeks = $value; }




    }
  }


  if($animal_husbandry_type=='Meat Production'){
    $record=$record+1;
      //echo   '****'.$meat_production_type; 
        //this is for livestock meat production
    if($meat_production_type=='Livestock Rearing') { ?>


     <h4 class="nf-f-size-20 nf-strong mb-4">Important Parameters</h4>
     <div class="row">
      <div class="col-12 col-xl-10">

        <div class="row">
          <div class="col-lg-4 col-md-6  mb-4 parameter_box ">
            <div class="nf-gradient-4">
              <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/climate.png" alt="image" class="img-fluid">
              <h4 class="nf-f-size-16 text-white">Animal Variety</h4>
              <h2><?php echo $animal_variety;?></h2>
            </div>
          </div>
          <div class="col-lg-4 col-md-6  mb-4 parameter_box ">
            <div class="nf-gradient-3">
              <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/soil-ph.png" alt="image" class="img-fluid">
              <h4 class="nf-f-size-16 text-white">Total Stocking</h4>
              <h2><?php echo $total_stocking;?></h2>
            </div>
          </div>
          <div class="col-lg-4 col-md-6  mb-4 parameter_box ">
            <div class="nf-gradient-5">
              <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/sowing-season2.png" alt="image" class="img-fluid">
              <h4 class="nf-f-size-16 text-white">Mortality</h4>
              <h2><?php echo $mortality;?></h2>
            </div>
          </div>
          <div class="col-lg-4 col-md-6  mb-4 parameter_box ">
            <div class="nf-gradient-6">
              <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/harvesting.png" alt="image" class="img-fluid">
              <h4 class="nf-f-size-16 text-white">Marketable Size</h4>
              <h2><?php echo $marketable_size;?></h2>
            </div>
          </div>
          <div class="col-lg-4 col-md-6  mb-4 parameter_box ">
            <div class="nf-gradient-7">
              <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/wheat-sack.png" alt="image" class="img-fluid">
              <h4 class="nf-f-size-16 text-white">Marketable Age</h4>
              <h2><?php echo $marketable_age;?></h2>
            </div>
          </div>
          <div class="col-lg-4 col-md-6  mb-4 parameter_box ">
            <div class="nf-gradient-20">
              <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/soil-ph.png" alt="image" class="img-fluid">
              <h4 class="nf-f-size-16 text-white">Average Market Rate(in Rs/Kg) </h4>
              <h2><?php echo $average_market_rate;?></h2>
            </div>
          </div>
        </div>

      </div>
      <?php if($explore_raw_material!=''){ ?>
        <div class="col-12 col-xl-2">
          <div class="row">
            <div class="col-lg-12 col-md-12 parameter_box databank_box">
              <div class="nf-gradient-20">

                <h4 class="nf-f-size-16 text-white">Explore Raw Material  </h4>
                <a href="<?php echo $explore_raw_material;?>" target="_blank">NER DATABASE</a>
              </div>
            </div>
          </div>
        </div>
      <?php }?>
    </div>

    <h4 class="nf-f-size-16 nf-strong my-3 mb-4">Variety</h4>

    <div class="bg-gray p-4 row mx-0 mb-3">
      <ul class="five_col_ul vm-variety-wrap-2">
        <?php if(!empty($variety))
        {
         $variety = explode(',',$variety); 
         foreach($variety as $vari)
          echo '<li><a href="javascript:void(0);">'.$vari.'</a></li>';
      }
      ?>
    </ul>
  </div>




  <?php 

} else { //this is for poultry meat production    ?>


  <h4 class="nf-f-size-20 nf-strong mb-4">Important Parameters</h4>
  <div class="row">
    <div class="col-12 col-xl-10">
      <div class="row">
        <!--<div class="col-lg-4 col-md-6  mb-4 parameter_box ">
          <div class="nf-gradient-4">
            <img src="<?php //echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/climate.png" alt="image" class="img-fluid">
            <h4 class="nf-f-size-16 text-white">Breed Name</h4>
            <h2><?php //echo $breed_name;?></h2>
          </div>
        </div>-->
        <div class="col-lg-4 col-md-6  mb-4 parameter_box ">
          <div class="nf-gradient-4">
            <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/soil-ph.png" alt="image" class="img-fluid">
            <h4 class="nf-f-size-16 text-white">Number of Birds</h4>
            <h2><?php echo $number_of_birds;?></h2>
          </div>
        </div>
        <div class="col-lg-4 col-md-6  mb-4 parameter_box ">
          <div class="nf-gradient-8">
            <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/sowing-season2.png" alt="image" class="img-fluid">
            <h4 class="nf-f-size-16 text-white">Space requirement</h4>
            <h2><?php echo $space_requirement;?></h2>
          </div>
        </div>

        <div class="col-lg-4 col-md-6  mb-4 parameter_box ">
          <div class="nf-gradient-6">
            <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/harvesting.png" alt="image" class="img-fluid">
            <h4 class="nf-f-size-16 text-white">Mortality</h4>
            <h2><?php echo $mortality;?></h2>
          </div>
        </div>
        <div class="col-lg-4 col-md-6  mb-4 parameter_box ">
          <div class="nf-gradient-7">
            <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/wheat-sack.png" alt="image" class="img-fluid">
            <h4 class="nf-f-size-16 text-white">Rearing period</h4>
            <h2><?php echo $rearing_period;?> </h2>
          </div>
        </div>
        <div class="col-lg-4 col-md-6  mb-4 parameter_box ">
          <div class="nf-gradient-8">
            <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/wheat-sack.png" alt="image" class="img-fluid">
            <h4 class="nf-f-size-16 text-white">Output </h4>
            <h2><?php echo $output;?></h2>
          </div>
        </div>
        <div class="col-lg-4 col-md-6  mb-4 parameter_box ">
          <div class="nf-gradient-8">
            <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/wheat-sack.png" alt="image" class="img-fluid">
            <h4 class="nf-f-size-16 text-white">Feed Consumption (kg/bird) </h4>
            <h2><?php echo $feed_consumtion_kfbird;?></h2>
          </div>
        </div>
        <div class="col-lg-4 col-md-6  mb-4 parameter_box ">
          <div class="nf-gradient-8">
            <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/wheat-sack.png" alt="image" class="img-fluid">
            <h4 class="nf-f-size-16 text-white">Feed Conversion Ratio </h4>
            <h2><?php echo $feed_conversion_ratio;?></h2>
          </div>
        </div>
      </div>
    </div>
    <?php if($explore_raw_material!=''){ ?>
      <div class="col-12 col-xl-2">
        <div class="row">
          <div class="col-lg-12 col-md-12 parameter_box databank_box">
            <div class="nf-gradient-20">

              <h4 class="nf-f-size-16 text-white">Explore Raw Material  </h4>
              <!--<h2><?php echo $explore_raw_material;?></h2>-->
              <a href="<?php echo $explore_raw_material;?>" target="_blank">NER DATABASE</a>
            </div>
          </div>
        </div>
      </div>
    <?php }?>
  </div>
  <h4 class="nf-f-size-16 nf-strong my-3 mb-4">Variety</h4>

  <div class="bg-gray p-4 row mx-0 mb-3">
    <ul class="five_col_ul vm-variety-wrap-2">
      <?php if(!empty($variety))
      {
       $variety = explode(',',$variety); 
       foreach($variety as $vari)
        echo '<li><a href="javascript:void(0);">'.$vari.'</a></li>';
    }
    ?>
  </ul>
</div>

<?php  } ?>


<?php }else if($animal_husbandry_type=='Dairy Production'){
  $record=$record+1; ?>


  <h4 class="nf-f-size-20 nf-strong mb-4">Important Parameters</h4>
  <div class="row">
   <div class="col-12 col-lg-10">
    <div class="row">
      <div class="col-lg-4 col-md-6  mb-4 parameter_box ">
        <div class="nf-gradient-4">
          <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/climate.png" alt="image" class="img-fluid">
          <h4 class="nf-f-size-16 text-white">Daily Avg. Milk Producttion (in L)</h4>
          <h2><?php echo $daily_avg_milk_producttion;?></h2>
        </div>
      </div>
      <div class="col-lg-4 col-md-6  mb-4 parameter_box ">
        <div class="nf-gradient-3">
          <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/soil-ph.png" alt="image" class="img-fluid">
          <h4 class="nf-f-size-16 text-white">Standard Fat Percentage- Minimum</h4>
          <h2><?php echo $standard_fat_percentage;?></h2>
        </div>
      </div>
      <div class="col-lg-4 col-md-6  mb-4 parameter_box ">
        <div class="nf-gradient-5">
          <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/sowing-season2.png" alt="image" class="img-fluid">
          <h4 class="nf-f-size-16 text-white">SNF%</h4>
          <h2><?php echo $snf;?></h2>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-4 col-md-6  mb-4 parameter_box ">
        <div class="nf-gradient-6">
          <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/harvesting.png" alt="image" class="img-fluid">
          <h4 class="nf-f-size-16 text-white">Average Market Price/L</h4>
          <h2><?php echo $average_market_price;?></h2>
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

          <!--<div class="row">
            <div class="col-lg-6 col-md-12 mb-2 mb-lg-0"><a class="btn nf-button-v-small w-100" href="#" role="button">View Complete Details</a></div>
            <div class="col-lg-6 col-md-12"><a class="btn nf-button-v-orange w-100" href="#" role="button">Download Model Project Profile</a></div>
          </div>-->
          


        <?php }else if($animal_husbandry_type=='Wool Production'){
          $record=$record+1; ?>


          <h4 class="nf-f-size-20 nf-strong mb-4">Important Parameters</h4>
          <div class="row">
            <div class="col-lg-4 col-md-6  mb-4 parameter_box ">
              <div class="nf-gradient-4">
                <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/climate.png" alt="image" class="img-fluid">
                <h4 class="nf-f-size-16 text-white">Mortality Percentage</h4>
                <h2><?php echo $mortality_percentage;?></h2>
              </div>
            </div>
            <div class="col-lg-4 col-md-6  mb-4 parameter_box ">
              <div class="nf-gradient-3">
                <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/soil-ph.png" alt="image" class="img-fluid">
                <h4 class="nf-f-size-16 text-white">Maturiry Age in months</h4>
                <h2><?php echo $maturiry_age_in_months;?></h2>
              </div>
            </div>
            <?php if($explore_raw_material!=''){ ?>
              <div class="col-lg-4 col-md-6  mb-4 parameter_box ">
                <div class="nf-gradient-5">
                  <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/sowing-season2.png" alt="image" class="img-fluid">
                  <h4 class="nf-f-size-16 text-white">Explore Raw Material</h4>
                  <a href="<?php echo $explore_raw_material;?>" target="_blank">NER DATABASE</a>
                </div>
              </div>
            <?php } ?>
            
            <div class="col-lg-4 col-md-6  mb-4 parameter_box ">
              <div class="nf-gradient-5">
                <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/sowing-season2.png" alt="image" class="img-fluid">
                <h4 class="nf-f-size-16 text-white">Wool Production Cycle per year</h4>
                <h2><?php echo $wool_production_cycle_per_year;?></h2>
              </div>
            </div>

            <div class="col-lg-4 col-md-6  mb-4 parameter_box ">
              <div class="nf-gradient-6">
                <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/harvesting.png" alt="image" class="img-fluid">
                <h4 class="nf-f-size-16 text-white">Production per cycle</h4>
                <h2><?php echo $production_per_cycle;?></h2>
              </div>
            </div>

            <div class="col-lg-4 col-md-6  mb-4 parameter_box ">
              <div class="nf-gradient-6">
                <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/harvesting.png" alt="image" class="img-fluid">
                <h4 class="nf-f-size-16 text-white">Average Market Rate</h4>
                <h2><?php echo $average_market_rate;?></h2>
              </div>
            </div>

          </div>
          <!--<div class="row">
            <div class="col-lg-6 col-md-12 mb-2 mb-lg-0"><a class="btn nf-button-v-small w-100" href="#" role="button">View Complete Details</a></div>
            <div class="col-lg-6 col-md-12"><a class="btn nf-button-v-orange w-100" href="#" role="button">Download Model Project Profile</a></div>
          </div>-->
          

        <?php }else if($animal_husbandry_type=='Breeding Animal'){
          $record=$record+1; ?>


          <h4 class="nf-f-size-20 nf-strong mb-4">Important Parameters</h4>
          <div class="row">
            <div class="col-lg-4 col-md-6  mb-4 parameter_box ">
              <div class="nf-gradient-4">
                <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/climate.png" alt="image" class="img-fluid">
                <h4 class="nf-f-size-16 text-white">No of kidding/furrowing per year<!--/ no of chicks--></h4>
                <h2><?php echo $no_of_kiddingfurrowing_per_year_no_of_chicks;?></h2>
              </div>
            </div>
            <div class="col-lg-4 col-md-6  mb-4 parameter_box ">
              <div class="nf-gradient-3">
                <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/soil-ph.png" alt="image" class="img-fluid">
                <h4 class="nf-f-size-16 text-white">Avg Litter size</h4>
                <h2><?php echo $avg_litter_size_no_of_hatching_egges;?></h2>
              </div>
            </div>
            <div class="col-lg-4 col-md-6  mb-4 parameter_box ">
              <div class="nf-gradient-5">
                <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/sowing-season2.png" alt="image" class="img-fluid">
                <h4 class="nf-f-size-16 text-white">Sexual maturity</h4>
                <h2><?php echo $sexual_maturity;?></h2>
              </div>
            </div>

            <div class="col-lg-4 col-md-6  mb-4 parameter_box ">
              <div class="nf-gradient-6">
                <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/harvesting.png" alt="image" class="img-fluid">
                <h4 class="nf-f-size-16 text-white">Male/Female Ratio</h4>
                <h2><?php echo $malefemale_ratio;?></h2>
              </div>
            </div>

            <div class="col-lg-4 col-md-6  mb-4 parameter_box ">
              <div class="nf-gradient-6">
                <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/harvesting.png" alt="image" class="img-fluid">
                <h4 class="nf-f-size-16 text-white">Weaning period in months</h4>
                <h2><?php echo $weaning_period_in_months;?></h2>
              </div>
            </div>
            
            <?php if($explore_raw_material!=''){ ?>
              <div class="col-lg-4 col-md-6  mb-4 parameter_box ">
                <div class="nf-gradient-6">
                  <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/harvesting.png" alt="image" class="img-fluid">
                  <h4 class="nf-f-size-16 text-white">Explore Raw Material</h4>
                  <a href="<?php echo $explore_raw_material;?>" target="_blank">NER DATABASE</a>
                </div>
              </div>
            <?php } ?>
            
            <div class="col-12 ">
              <h4 class="nf-f-size-16 nf-strong my-3 mb-4">Variety</h4>

              <div class="bg-gray p-4 row mx-0 mb-3">
                <ul class="five_col_ul vm-variety-wrap-2">
                  <?php if(!empty($variety))
                  {
                   $variety = explode(',',$variety); 
                   foreach($variety as $vari)
                    echo '<li><a href="javascript:void(0);">'.$vari.'</a></li>';
                }
                ?>
              </ul>
            </div>
          </div>

        </div>
          <!--<div class="row">
            <div class="col-lg-6 col-md-12 mb-2 mb-lg-0"><a class="btn nf-button-v-small w-100" href="#" role="button">View Complete Details</a></div>
            <div class="col-lg-6 col-md-12"><a class="btn nf-button-v-orange w-100" href="#" role="button">Download Model Project Profile</a></div>
          </div>-->
          

        <?php }else if($animal_husbandry_type=='Breeding Bird'){
          $record=$record+1; ?>


          <h4 class="nf-f-size-20 nf-strong mb-4">Important Parameters</h4>
          <div class="row">
            <div class="col-lg-4 col-md-6  mb-4 parameter_box ">
              <div class="nf-gradient-4">
                <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/climate.png" alt="image" class="img-fluid">
                <h4 class="nf-f-size-16 text-white">Bird Name</h4>
                <h2><?php echo $_POST['animal'];?></h2>
              </div>
            </div>
            <div class="col-lg-4 col-md-6  mb-4 parameter_box ">
              <div class="nf-gradient-4">
                <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/climate.png" alt="image" class="img-fluid">
                <h4 class="nf-f-size-16 text-white">Total no of hen housed chicks</h4>
                <h2><?php echo $total_no_of_hen_housed_chicks;?></h2>
              </div>
            </div>
            <div class="col-lg-4 col-md-6  mb-4 parameter_box ">
              <div class="nf-gradient-3">
                <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/soil-ph.png" alt="image" class="img-fluid">
                <h4 class="nf-f-size-16 text-white">Hen housed egg production</h4>
                <h2><?php echo $hen_housed_egg_production;?></h2>
              </div>
            </div>
            <div class="col-lg-4 col-md-6  mb-4 parameter_box ">
              <div class="nf-gradient-3">
                <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/soil-ph.png" alt="image" class="img-fluid">
                <h4 class="nf-f-size-16 text-white">Hen housed hatching eggs</h4>
                <h2><?php echo $hen_housed_hatching_eggs;?></h2>
              </div>
            </div>
            <!--<div class="col-lg-4 col-md-6  mb-4 parameter_box ">
              <div class="nf-gradient-5">
                <img src="<?php //echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/sowing-season2.png" alt="image" class="img-fluid">
                <h4 class="nf-f-size-16 text-white">Breeds</h4>
                <h2><?php //echo $breeds;?></h2>
              </div>
            </div>-->

            <?php if($explore_raw_material!=''){ ?>
              <div class="col-lg-4 col-md-6  mb-4 parameter_box ">
                <div class="nf-gradient-6">
                  <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/harvesting.png" alt="image" class="img-fluid">
                  <h4 class="nf-f-size-16 text-white">Explore Raw Material</h4>
                  <a href="<?php echo $explore_raw_material;?>" target="_blank">NER DATABASE</a>
                </div>
              </div>
            <?php } ?>
            
            <!--<div class="col-lg-4 col-md-6  mb-4 parameter_box ">
              <div class="nf-gradient-5">
              <img src="<?php //echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/sowing-season2.png" alt="image" class="img-fluid">
              <h4 class="nf-f-size-16 text-white">Species favourable for NE </h4>
              <h2><?php //echo $species_favourable_for_ne;?></h2>
            </div>
          </div>-->
          
          <div class="col-12 ">
            <h4 class="nf-f-size-16 nf-strong my-3 mb-4">Variety</h4>

            <div class="bg-gray p-4 row mx-0 mb-3">
              <ul class="five_col_ul vm-variety-wrap-2">
                <?php if(!empty($variety))
                {
                 $variety = explode(',',$variety); 
                 foreach($variety as $vari)
                  echo '<li><a href="javascript:void(0);">'.$vari.'</a></li>';
              }
              ?>
            </ul>
          </div>
        </div>

      </div>
          <!--<div class="row">
            <div class="col-lg-6 col-md-12 mb-2 mb-lg-0"><a class="btn nf-button-v-small w-100" href="#" role="button">View Complete Details</a></div>
            <div class="col-lg-6 col-md-12"><a class="btn nf-button-v-orange w-100" href="#" role="button">Download Model Project Profile</a></div>
          </div>-->
          

        <?php }else if($animal_husbandry_type=='Egg Production - Food' or $animal_husbandry_type=='Egg Production - Breeding'){
          $record=$record+1; ?>


          <h4 class="nf-f-size-20 nf-strong mb-4">Important Parameters</h4>
          <div class="row">
            <div class="col-12 col-lg-10">
              <div class="row">
                <!--<div class="col-lg-4 col-md-6  mb-4 parameter_box ">
                  <div class="nf-gradient-4">
                    <img src="<?php //echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/climate.png" alt="image" class="img-fluid">
                    <h4 class="nf-f-size-16 text-white">Breed Name</h4>
                    <h2><?php //echo $breed_name;?></h2>
                  </div>
                </div>-->

                <div class="col-lg-6 col-md-6  mb-4 parameter_box ">
                  <div class="nf-gradient-4">
                    <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/climate.png" alt="image" class="img-fluid">
                    <h4 class="nf-f-size-16 text-white">Rearing System</h4>
                    <h2><?php echo $rearing_system;?></h2>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6  mb-4 parameter_box ">
                  <div class="nf-gradient-5">
                    <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/climate.png" alt="image" class="img-fluid">
                    <h4 class="nf-f-size-16 text-white">Average Feed Consumption during laying (per day/per birth)</h4>
                    <h2><?php echo $average_feed_consumption_gmday_during_laying_stage_in_grams;?></h2>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-4 col-md-6  mb-4 parameter_box ">
                  <div class="nf-gradient-3">
                    <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/soil-ph.png" alt="image" class="img-fluid">
                    <h4 class="nf-f-size-16 text-white">Average egg production per year</h4>
                    <h2><?php echo $egg_prductionyear;?></h2>
                  </div>
                </div>
                <div class="col-lg-4 col-md-6  mb-4 parameter_box ">
                  <div class="nf-gradient-3">
                    <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/soil-ph.png" alt="image" class="img-fluid">
                    <h4 class="nf-f-size-16 text-white">Starting of Laying (Weeks)</h4>
                    <h2><?php echo $average_laying_weeks;?></h2>
                  </div>
                </div>
                <div class="col-lg-4 col-md-6  mb-4 parameter_box ">
                  <div class="nf-gradient-5">
                    <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/sowing-season2.png" alt="image" class="img-fluid">
                    <h4 class="nf-f-size-16 text-white">Standard Egg Weight in Gram</h4>
                    <h2><?php echo $standard_egg_weight_in_gram;?></h2>
                  </div>
                </div>

                <!--<div class="col-lg-4 col-md-6  mb-4 parameter_box ">
                  <div class="nf-gradient-5">
                    <img src="<?php //echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/sowing-season2.png" alt="image" class="img-fluid">
                    <h4 class="nf-f-size-16 text-white">Breeds</h4>
                    <h2><?php //echo $breeds;?></h2>
                  </div>
                </div>-->
              </div>
            </div>
            <?php if($explore_raw_material!=''){ ?>
             <div class="col-12 col-lg-2">
              <div class="row">
                <div class="col-lg-12 col-md-12 parameter_box databank_box">
                  <div class="nf-gradient-20">
                    <h4 class="nf-f-size-16 text-white">Explore Raw Material  </h4>
                    <a href="<?php echo $explore_raw_material;?>" target="_blank">NER DATABASE</a>
                  </div>
                </div>
              </div>
            </div>
          <?php } ?>
          
          <div class="col-12 ">
            <h4 class="nf-f-size-16 nf-strong my-3 mb-4">Variety</h4>

            <div class="bg-gray p-4 row mx-0 mb-3">
              <ul class="five_col_ul vm-variety-wrap-2">
                <?php if(!empty($variety))
                {
                 $variety = explode(',',$variety); 
                 foreach($variety as $vari)
                  echo '<li><a href="javascript:void(0);">'.$vari.'</a></li>';
              }
              ?>
            </ul>
          </div>
        </div>

      </div>
         <!-- <div class="row">
            <div class="col-lg-6 col-md-12 mb-2 mb-lg-0"><a class="btn nf-button-v-small w-100" href="#" role="button">View Complete Details</a></div>
            <div class="col-lg-6 col-md-12"><a class="btn nf-button-v-orange w-100" href="#" role="button">Download Model Project Profile</a></div>
          </div>-->
          

        <?php } ?>



        <?php      
      }
      if($record==0) $msg= '<b>No Record Found.</b>';
      if($record==0 or count($blog_posts->posts)==0) $msg= '<b>No Record Found.</b>';
      echo $msg;
      ?>

      <?php $postid = $post->ID; ?>


     
    <section class="nf-s-stories-section nf-tommoto-section">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <h2>Success Stories <div class="explore-div"><a href="<?php echo site_url()?>/success-stories-details/" class="nf-explore-bgbtn">Explore All Videos </a> <a href="<?php echo site_url()?>/blogs-articles-list/" class="nf-explore-bgbtn ml-3">Explore All Blogs</a></div> </h2>
          </div>

        </div>
        <div class="success-story-slider">
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

         <?php/*?> <?php
          //videos
          $i=0;
              $sts = array(
          'key'     =>  'flag',
          'value'    => 'In-House',
          'compare'  => '='
        );
        $sts_dept = array(
          'key'     =>  'sectors',
          'value'    => 'Animal Husbandry',
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
                  $description = $endPoint? substr($stringCut, 0, $endPoint).'...':substr($stringCut, 0).'...';;
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
          'value'    => 'Animal Husbandry',
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
                  $description = $endPoint? substr($stringCut, 0, $endPoint).'...':substr($stringCut, 0).'...';;
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
          'value'    => 'Animal Husbandry',
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
                  $description = $endPoint? substr($stringCut, 0, $endPoint).'...':substr($stringCut, 0).'...';;
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
          'value'    => 'Animal Husbandry',
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
                  $description = $endPoint? substr($stringCut, 0, $endPoint).'...':substr($stringCut, 0).'...';;
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
                          <a href="<?php echo site_url()?>/animal-husbandry-cost-calculator" class="nf-button-v-small">Calculate Now</a>
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
    $('.check_animal').click(function() {
      $('.check_animal').not(this).prop('checked', false);
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