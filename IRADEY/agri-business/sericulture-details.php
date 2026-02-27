<?php /*Template Name: Sericulture Details */ ?>
<?php 
if($_POST['sericulture_type']=='')
{  
      wp_redirect(site_url('production-of-commercial-silk-cocoon'));
      exit; 
}

get_header();  

$record=0;
$blog_args = array(
                            'post_type' => 'sericulture',
                            'post_status' => 'publish',
                            'title' =>$_POST['variety'],
                            'meta_key'     =>  'sericulture_type',
                            'meta_value'   =>  $_POST['sericulture_type'],
                            'posts_per_page' => '1'
                            );


$blog_posts = new WP_Query($blog_args);
     //  echo "<pre>";
     //   print_r($blog_posts);exit;

$banner_image = get_field( "banner_image", $blog_posts->posts[0]->ID );
if($_POST['variety']=='') $_POST['variety'] = $blog_posts->posts[0]->post_title;
//$cur_post_slug = $blog_posts->posts[0]->post_name;

if($banner_image=='') $banner_image= get_template_directory_uri(). '/assets/img/no_record_found_banner.png';

?>
<!-- header-end -->

    <!-- inner-banner-start -->
    <div class="inner-banner">
        <div class="container">
           <div class="banner-title">
                <h3><?php echo $_POST['sericulture_type'];?> <a href="#" class="changeTopic" data-toggle="collapse" data-target="#changeTopic">Change Topic</a></h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Entrepreneurship</a></li>
                    <li class="breadcrumb-item"><a href="#">Know your Business</a></li>
                    <li class="breadcrumb-item"><a href="#">Agri-Business</a></li>
                    <li class="breadcrumb-item"><a href="#">Production</a></li>
                    <li class="breadcrumb-item"><a href="#">Sericulture</a></li>
                    <li class="breadcrumb-item"><a href="#"><?php echo $_POST['sericulture_type'];?></a></li>
                    <li class="breadcrumb-item active"><?php echo $_POST['variety'];?></li>
                </ul>
            </div>

          <div class="chagetopic-modal changeTopic-collapse">
          <div class="collapse " id="changeTopic" style="">
            <a href="#" id="changeTopic_close"><i class="fa fa-close"></i></a>
            <div class="card card-body">
              <div class="row">
                
               <div class="col-md-4">
                    <h4>Pre - Cocoon &nbsp;</h4>
                  <ul>
                    <li>
                      <a class="box" href="<?php echo site_url()?>/production-of-commercial-silk-cocoon/">Production of Commercial Silk Cocoon</a>
                    </li>
                    <li>
                      <a class="box" href="<?php echo site_url()?>/production-of-seed-crop/">Silk Grainage</a>
                    </li>
                  </ul>
                </div>

                <div class="col-md-4">
                    <h4>Post - Cocoon &nbsp;</h4>
                  <ul>
                    <li>
                      <a class="box" href="<?php echo site_url()?>/production-of-spun-yarn/">Production of spun yarn</a>
                    </li>
                    <li>
                      <a class="box" href="<?php echo site_url()?>/production-of-reeled-yarn/">Production of Reeled Yarn </a>
                    </li>
                    <li>
                      <a class="box" href="<?php echo site_url()?>/production-of-twisted-reel-yarn/">Production of Twisted Reel Yarn</a>
                    </li>
                    <li>
                      <a class="box" href="<?php echo site_url()?>/silk-yarn-dyeing/">Silk Yarn Dyeing</a>
                    </li>
                     <li>
                      <a class="box" href="<?php echo site_url()?>/integrated-reeling-unit-with-stifling/">Integrated Reeling unit with stifling</a>
                    </li>
                     <li>
                      <a class="box" href="#">Yarn Clinic</a>
                    </li>
                    <li>
                      <a class="box" href="#">Pupae & Other by products</a>
                    </li>
                     <li>
                      <a class="box" href="<?php echo site_url()?>/fabric-production/">Fabric Production</a>
                    </li>
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
                      <div class="bannerbg nf-gradient-3 justify-content-start p-3 nf-height-100">
                        <h4 class="nf-f-size-24 pl-0"><?php echo $_POST['variety'];?></h4>
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
    <input type="hidden" name="sericulture_type" value="<?php echo $_POST['sericulture_type'];?>">
      <div class="inner-body">
        <div class="container">
            <div class="nf-form-wrap">
              <div class="row">
                  
                  <?php
                  if($_POST['sericulture_type'] == 'Production of Commercial Silk Cocoon')
                   { 
                     $icon_image ="silk-cocoon.png";
                     $heading='Production of Commercial Silk Cocoon';
                   }
                   else if($_POST['sericulture_type'] == 'Production of Reeled Yarn')
                   {
                     $icon_image ="yarn.png";
                     $heading='Production of Reeled Yarn';
                   }
                   else if($_POST['sericulture_type'] == 'Fabric Production')
                   {
                     $icon_image ="fabric.png";
                     $heading='Fabric Production';
                   }
                   else
                   {
                      $icon_image ="yarn.png";
                      $heading='Variety';
                   }
                   
                   
                  ?>
                <div class="col-12 col-lg-4 nf-sidebar-c-width">
  <div class="courses-details-sidebar-area search-sidebar nf-sidebar mt-md-5">
    <div class="widget mb-20 widget-padding white-bg">

      <?php
            // args
              $g=0;
            $args = array(
              'post_type'   => 'sericulture',
              'meta_key'    => 'sericulture_type',
              'meta_value'  => $_POST['sericulture_type'],
              'orderby' => 'post_title',
              'order'   => 'ASC',
              'post_status' => 'publish',
              'posts_per_page' => -1
            );
            $the_query = new WP_Query( $args );

            //echo "<pre>";
            //print_r($the_query);
            ?>
      <a class="btn-link nf-color-1" data-toggle="collapse" href="#state-filter">
        <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/<?php echo $icon_image;?>" alt="state-white"> <span> Variety (<?php echo $the_query->post_count;?>)  </span></a>
        <div class="widget-link collapse show" id="state-filter">
          <ul class="sidebar-link nf-sidebar-scroll">
            
            <?php if( $the_query->have_posts() ): ?>
              <?php while( $the_query->have_posts() ) : $the_query->the_post(); 
                $g++;
                $croptile = $post->post_title;
                //$post_slug = $post->post_name;
                if(trim($_POST['variety'])==trim($croptile)) $checked = 'checked';
                //else if(trim($cur_post_slug)==trim($post_slug)) $checked = 'checked';
                //if(strcmp($croptile,$_POST['variety']) == 0) $checked = 'checked';
                //$str1= preg_replace('/[^A-Za-z0-9\-]/', '', $_POST['variety']); 
                //$str2= preg_replace('/[^A-Za-z0-9\-]/', '', $croptile);
                //if ($str1 == $str2) $checked = 'checked';
                else if(is_array($_POST['variety']) && in_array($croptile,$_POST['variety'])) $checked = 'checked'; 
                else  $checked = ''; 
                //echo '>>>'.$str1.'>>'.$str2;exit;

                if($croptile_new!=$croptile){
                ?>
                <li>
                <div class="nf-checkbox-wrap">
                  <input type="checkbox" class="check_variety" name="variety" <?php echo $checked;?> id="variety<?php echo $g;?>" name="checkbox-group" value="<?php the_title(); ?>" onclick="">
                  <label for="variety<?php echo $g;?>"><?php the_title(); ?></label>
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
    <?php if(!empty($_POST['variety']) ){?>
      <div class="nf-state-listing-block">
             <div class="row">
              <?php if(!empty($_POST['variety'])){?>
              <div class="col-12 col-lg-6">
                <a href="#">
                  <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/<?php echo $icon_image;?>" class="nf-w-t1">
                  <span><?php if(is_array($_POST['variety'])) echo Implode(',<br>',$_POST['variety']);else echo $_POST['variety'];?></span>
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
                    $sericulture_type='';
                    $banner_image='';
                    $host_plant='';
                    $plot_size='';
                    $soil_quality='';
                    $spacing='';
                    $season_for_raising_of_plantation='';
                    $average_buying__price_of_1_saplings_rs='';
                    $sapling_age='';
                    $no_of_plants='';
                    $gestation_period='';
                    $leaf_yield='';
                    $rearing_season='';
                    $cocoon_yield_from_1_dfls='';
                    $no_of_dfls_reared_crop_at_100_capacity='';
                    $average_buying__price_of_1_dfls_rs='';
                    $temp_oc='';
                    $rh='';
                    $average_selling_price='';

                    $silkworm_name='';
                    $seed_cocoon_dfls_ratio='';
                    $purchase_rate_of_seed_cocoon='';
                    $series_of_grainage_steps='';
                    $grainage_period='';
                    $survival='';
                    $appliances_required='';
                    $process_of_reeling='';
                    $cocoons_required_to_produce_1_kg_of_yarn='';
                    $cost_of_cocoons_rs='';
                    $production_of_yarndaymachine='';
                    $silk_waste_productiondaymachine='';


                    $yarn_required_to_produce_1_m_of_design_fabric='';
                    $fabric_production_loomcycle_of_4months='';
                    $cost_of_yarn​='';
                    $production_of_design_fabricday_loom='';
                    $average_selling_price_of_design_fabric_one_set_of_mekhela_chadaar='';
                    $yarn_dyeing_capacity_day_8_hrs='';
                    $cost_of_dyeing_per_kg_of_yarn='';
                    $explore_raw_material='';

                    foreach($values as $key => $value)
                    {
                        if($key=='sericulture_type'){ $sericulture_type = $value; } 
                        if($key=='banner_image'){ $banner_image = $value; }

                        if($key=='host_plant'){ $host_plant = $value; }
                        if($key=='plot_size'){ $plot_size = $value; }
                        if($key=='soil_quality'){ $soil_quality = $value; }
                        if($key=='spacing'){ $spacing = $value; }
                        if($key=='season_for_raising_of_plantation'){ $season_for_raising_of_plantation = $value; }
                        if($key=='average_buying__price_of_1_saplings_rs'){ $average_buying__price_of_1_saplings_rs = $value; }
                        if($key=='sapling_age'){ $sapling_age = $value; }
                        if($key=='no_of_plants'){ $no_of_plants = $value; }
                        if($key=='gestation_period'){ $gestation_period = $value; }
                        if($key=='leaf_yield'){ $leaf_yield = $value; }
                        if($key=='rearing_season'){ $rearing_season = $value; }
                        if($key=='cocoon_yield_from_1_dfls'){ $cocoon_yield_from_1_dfls = $value; }
                        if($key=='no_of_dfls_reared_crop_at_100_capacity'){ $no_of_dfls_reared_crop_at_100_capacity = $value; }
                        if($key=='average_buying__price_of_1_dfls_rs'){ $average_buying__price_of_1_dfls_rs = $value; }
                        if($key=='temp_oc'){ $temp_oc = $value; }
                        if($key=='rh'){ $rh = $value; }
                        if($key=='average_selling_price'){ $average_selling_price = $value; }

                        

                    if($key=='silkworm_name'){ $silkworm_name = $value; }
                    if($key=='seed_cocoon_dfls_ratio'){ $seed_cocoon_dfls_ratio = $value; }
                    if($key=='purchase_rate_of_seed_cocoon'){ $purchase_rate_of_seed_cocoon = $value; }
                    if($key=='series_of_grainage_steps'){ $series_of_grainage_steps = $value; }
                    if($key=='grainage_period'){ $grainage_period = $value; }
                    if($key=='survival'){ $survival = $value; }
                    if($key=='appliances_required'){ $appliances_required = $value; }
                    if($key=='process_of_reeling'){ $process_of_reeling = $value; }
                    if($key=='cocoons_required_to_produce_1_kg_of_yarn'){ $cocoons_required_to_produce_1_kg_of_yarn = $value; }
                    if($key=='cost_of_cocoons_rs'){ $cost_of_cocoons_rs = $value; }

                    if($key=='production_of_yarndaymachine'){ $production_of_yarndaymachine = $value; }
                    if($key=='silk_waste_productiondaymachine'){ $silk_waste_productiondaymachine = $value; }

                    if($key=='yarn_required_to_produce_1_m_of_design_fabric'){ $yarn_required_to_produce_1_m_of_design_fabric = $value; }
                    if($key=='fabric_production_loomcycle_of_4months'){ $fabric_production_loomcycle_of_4months = $value; }
                    if($key=='cost_of_yarn​'){ $cost_of_yarn​ = $value; }
                    if($key=='production_of_design_fabricday_loom'){ $production_of_design_fabricday_loom = $value; }
                    if($key=='average_selling_price_of_design_fabric_one_set_of_mekhela_chadaar'){ $average_selling_price_of_design_fabric_one_set_of_mekhela_chadaar = $value; }
                    if($key=='yarn_dyeing_capacity_day_8_hrs'){ $yarn_dyeing_capacity_day_8_hrs = $value; }
                    if($key=='cost_of_dyeing_per_kg_of_yarn'){ $cost_of_dyeing_per_kg_of_yarn = $value; }
                    if($key=='explore_raw_material'){ $explore_raw_material = $value; }



                    }
                }


        if($sericulture_type=='Production of Commercial Silk Cocoon'){
        $record=$record+1;
    ?>
          
					<h4 class="nf-f-size-20 nf-strong mb-4">Plantation</h4>
					<div class="row">
                  <div class="col-12 col-lg-10">

                    <div class="row">
                      <div class="col-lg-6 col-md-6  mb-4 parameter_box ">
                        <div class="nf-gradient-3">
                          <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/climate.png" alt="image" class="img-fluid">
                          <h4 class="nf-f-size-16 text-white">Host Plant</h4>
                          <h2><?php echo $host_plant;?></h2>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6  mb-4 parameter_box ">
                        <div class="nf-gradient-4">
                          <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/soil-ph.png" alt="image" class="img-fluid">
                          <h4 class="nf-f-size-16 text-white">Plot size</h4>
                          <h2><?php echo $plot_size;?></h2>
                        </div>
                      </div>
                    </div>
                 
                    <div class="row">
                      <div class="col-lg-12 col-md-6  mb-4 parameter_box ">
                        <div class="nf-gradient-5">
                          <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/sowing-season2.png" alt="image" class="img-fluid">
                          <h4 class="nf-f-size-16 text-white">Soil Quality</h4>
                          <h2><?php echo $soil_quality;?></h2>
                        </div>
                      </div>
                      <div class="col-lg-4 col-md-6  mb-4 parameter_box ">
                        <div class="nf-gradient-6">
                          <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/harvesting.png" alt="image" class="img-fluid">
                          <h4 class="nf-f-size-16 text-white">Spacing </h4>
                          <h2><?php echo $spacing;?></h2>
                        </div>
                      </div>
                      <div class="col-lg-4 col-md-6  mb-4 parameter_box ">
                        <div class="nf-gradient-7">
                          <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/wheat-sack.png" alt="image" class="img-fluid">
                          <h4 class="nf-f-size-16 text-white">Season for raising of plantation</h4>
                          <h2><?php echo $season_for_raising_of_plantation;?></h2>
                        </div>
                      </div>
                      <div class="col-lg-4 col-md-6  mb-4 parameter_box ">
                        <div class="nf-gradient-17">
                          <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/soil-ph.png" alt="image" class="img-fluid">
                          <h4 class="nf-f-size-16 text-white">Avg.price 1 sapling</h4>
                          <h2><?php echo $average_buying__price_of_1_saplings_rs;?></h2>
             </div>
             </div>
             
              <div class="col-lg-12 col-md-4  mb-3 parameter_box ">
                        <div class="nf-gradient-3">
                          <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/soil-ph.png" alt="image" class="img-fluid">
                          <h4 class="nf-f-size-16 text-white">Sapling Age Months</h4>
                          <h2><?php echo $sapling_age;?></h2>
            </div>
            </div>
            <div class="col-lg-4 col-md-4  mb-3 parameter_box ">
                        <div class="nf-gradient-4">
                          <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/soil-ph.png" alt="image" class="img-fluid">
                          <h4 class="nf-f-size-16 text-white">No of Plants</h4>
                          <h2><?php echo $no_of_plants;?></h2>
            </div>
            </div>
            <div class="col-lg-4 col-md-4  mb-3 parameter_box ">
                        <div class="nf-gradient-5">
                          <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/soil-ph.png" alt="image" class="img-fluid">
                          <h4 class="nf-f-size-16 text-white">Gestation period</h4>
                          <h2><?php echo $gestation_period;?></h2>
            </div>
            </div>
            <div class="col-lg-12 col-md-4  mb-3 parameter_box ">
                        <div class="nf-gradient-17">
                          <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/soil-ph.png" alt="image" class="img-fluid">
                          <h4 class="nf-f-size-16 text-white">Leaf Yield</h4>
                          <h2><?php echo $leaf_yield;?></h2>
          
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
                    <?php }?>
                  </div>

                  <h4 class="nf-f-size-20 nf-strong mb-4">Rearing</h4>
            <div class="row">
                  <div class="col-12 col-lg-10">

                    <div class="row">
                      <div class="col-lg-12 col-md-6  mb-4 parameter_box ">
                        <div class="nf-gradient-3">
                          <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/climate.png" alt="image" class="img-fluid">
                          <h4 class="nf-f-size-16 text-white">Rearing Season</h4>
                          <h2><?php echo $rearing_season;?></h2>
                        </div>
                      </div>
                      <div class="col-lg-4 col-md-6  mb-4 parameter_box ">
                        <div class="nf-gradient-4">
                          <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/soil-ph.png" alt="image" class="img-fluid">
                          <h4 class="nf-f-size-16 text-white">Cocoon yield from 1 dfls</h4>
                          <h2><?php echo $cocoon_yield_from_1_dfls;?></h2>
                        </div>
                      </div>
                      <div class="col-lg-4 col-md-6  mb-4 parameter_box ">
                        <div class="nf-gradient-5">
                          <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/sowing-season2.png" alt="image" class="img-fluid">
                          <h4 class="nf-f-size-16 text-white">No of dfls reared /crop at 100% capacity </h4>
                          <h2><?php echo $no_of_dfls_reared_crop_at_100_capacity;?> </h2>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-4 col-md-6  mb-4 parameter_box ">
                        <div class="nf-gradient-6">
                          <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/harvesting.png" alt="image" class="img-fluid">
                          <h4 class="nf-f-size-16 text-white">Average Buying Price 1 dfls</h4>
                          <h2><?php echo $average_buying__price_of_1_dfls_rs;?></h2>
                        </div>
                      </div>
                      <div class="col-lg-4 col-md-6  mb-4 parameter_box ">
                        <div class="nf-gradient-7">
                          <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/wheat-sack.png" alt="image" class="img-fluid">
                          <h4 class="nf-f-size-16 text-white">Temp °C</h4>
                          <h2><?php echo $temp_oc;?></h2>
                        </div>
                      </div>
                      <div class="col-lg-4 col-md-6  mb-4 parameter_box ">
                        <div class="nf-gradient-17">
                          <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/soil-ph.png" alt="image" class="img-fluid">
                          <h4 class="nf-f-size-16 text-white">RH %</h4>
                          <h2><?php echo $rh;?></h2>
             </div>
             </div>
             
              <div class="col-lg-12 col-md-4  mb-4 parameter_box ">
                        <div class="nf-gradient-3">
                          <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/soil-ph.png" alt="image" class="img-fluid">
                          <h4 class="nf-f-size-16 text-white">Avg Selling Price</h4>
                          <h2><?php echo $average_selling_price;?> </h2>
            </div>
            </div>
            
            </div>
                      </div>
            
                    </div>      
					
					
					<!--<div class="row">
						<div class="col-lg-6 col-md-12 mb-2 mb-lg-0"><a class="btn nf-button-v-small w-100" href="#" role="button">View Complete Details</a></div>
						<div class="col-lg-6 col-md-12"><a class="btn nf-button-v-orange w-100" href="#" role="button">Download Model Project Profile</a></div>
					</div>-->
					
					
		
				 
        <?php }else if($sericulture_type=='Silk Grainage'){
          $record=$record+1;
         ?>
          
            <h4 class="nf-f-size-20 nf-strong mb-4">Important Parameters</h4>
            <div class="row">
                  <div class="col-12 col-lg-10">

                    <div class="row">
                      <div class="col-lg-4 col-md-6  mb-4 parameter_box ">
                        <div class="nf-gradient-4">
                          <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/climate.png" alt="image" class="img-fluid">
                          <h4 class="nf-f-size-16 text-white">Silkworm Name</h4>
                          <h2><?php echo $silkworm_name;?></h2>
                        </div>
                      </div>
                      <div class="col-lg-4 col-md-6  mb-4 parameter_box ">
                        <div class="nf-gradient-3">
                          <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/soil-ph.png" alt="image" class="img-fluid">
                          <h4 class="nf-f-size-16 text-white">Seed cocoon : dfls ratio</h4>
                          <h2><?php echo $seed_cocoon_dfls_ratio;?></h2>
                        </div>
                      </div>
                      <div class="col-lg-4 col-md-6  mb-4 parameter_box ">
                        <div class="nf-gradient-5">
                          <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/sowing-season2.png" alt="image" class="img-fluid">
                          <h4 class="nf-f-size-16 text-white">Purchase rate of Seed Cocoon</h4>
                          <h2><?php echo $purchase_rate_of_seed_cocoon;?></h2>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-3 col-md-6  mb-4 parameter_box ">
                        <div class="nf-gradient-6">
                          <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/harvesting.png" alt="image" class="img-fluid">
                          <h4 class="nf-f-size-16 text-white">Grainage period</h4>
                          <h2><?php echo $grainage_period;?></h2>
                        </div>
                      </div>
                      <div class="col-lg-3 col-md-6  mb-4 parameter_box ">
                        <div class="nf-gradient-7">
                          <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/wheat-sack.png" alt="image" class="img-fluid">
                          <h4 class="nf-f-size-16 text-white">Survival(%)</h4>
                          <h2><?php echo $survival;?></h2>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6  mb-4 parameter_box ">
                        <div class="nf-gradient-17">
                          <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/soil-ph.png" alt="image" class="img-fluid">
                          <h4 class="nf-f-size-16 text-white">Avg.Selling Price</h4>
                          <h2><?php echo $average_selling_price;?></h2>
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
                 <?php if($series_of_grainage_steps!=''){ ?>
                <h4 class="nf-f-size-16 nf-strong my-3 mb-4">Series of Grainage Steps</h4>
                <div class="bg-gray p-4 row mx-0 mb-3">
                  <ul class="five_col_ul">

                    <?php
                      //echo '>>'.$collaborative_or_partner_organizations;
                      
                      $coll = explode(',',$series_of_grainage_steps);
                      for($i=0;$i<count($coll);$i++)
                      {
                        $k=$i+1;
                      ?>
                      <p ><?php echo $k.'. '; echo $coll[$i]?></p>
                      <?php } ?> 

                  
                  </ul>
                </div>
               <?php } ?>
              
              
      <?php }else if($sericulture_type=='Integrated Reeling unit with stifling'){
        $record=$record+1;
        ?>

            
            <h4 class="nf-f-size-20 nf-strong mb-4">Important Parameters</h4>
            <div class="row">
                  <div class="col-12 col-lg-10">

                    <div class="row">
                      <div class="col-lg-4 col-md-6  mb-4 parameter_box ">
                        <div class="nf-gradient-5">
                          <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/sowing-season2.png" alt="image" class="img-fluid">
                          <h4 class="nf-f-size-16 text-white">Cocoons required to produce 1 kg of yarn</h4>
                          <h2><?php echo $cocoons_required_to_produce_1_kg_of_yarn;?></h2>
                        </div>
                      </div>

                      <div class="col-lg-4 col-md-6  mb-4 parameter_box ">
                        <div class="nf-gradient-6">
                          <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/harvesting.png" alt="image" class="img-fluid">
                          <h4 class="nf-f-size-16 text-white">Cost of cocoons (Rs)</h4>
                          <h2><?php echo $cost_of_cocoons_rs;?></h2>
                        </div>
                      </div>

                      <div class="col-lg-4 col-md-6  mb-4 parameter_box ">
                        <div class="nf-gradient-7">
                          <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/wheat-sack.png" alt="image" class="img-fluid">
                          <h4 class="nf-f-size-16 text-white">Production of yarn/day/machine</h4>
                          <h2><?php echo $production_of_yarndaymachine;?></h2>
                        </div>
                      </div> 
                    </div>
                    <div class="row">
                       <div class="col-lg-6 col-md-6  mb-4 parameter_box ">
                        <div class="nf-gradient-17">
                          <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/soil-ph.png" alt="image" class="img-fluid">
                          <h4 class="nf-f-size-16 text-white">Silk Waste production/day/machine</h4>
                          <h2><?php echo $silk_waste_productiondaymachine;?></h2>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6  mb-4 parameter_box ">
                        <div class="nf-gradient-17">
                          <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/soil-ph.png" alt="image" class="img-fluid">
                          <h4 class="nf-f-size-16 text-white">Average Selling Price</h4>
                          <h2><?php echo $average_selling_price_of_design_fabric_one_set_of_mekhela_chadaar;?></h2>
                        </div>
                      </div>

                      
                    </div>
                  </div>

                  <div class="col-lg-12 col-md-6  mb-4 parameter_box nf-muga-font">
                    <div class="nf-gradient-4">
                      <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/climate.png" alt="image" class="img-fluid">
                      <h4 class="nf-f-size-16 text-white">Appliances Required</h4>
                      <h2><?php echo nl2br($appliances_required);?></h2>
                    </div>
                  </div>
                  <div class="col-lg-12 col-md-6  mb-4 parameter_box nf-muga-font">
                    <div class="nf-gradient-3">
                      <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/soil-ph.png" alt="image" class="img-fluid">
                      <h4 class="nf-f-size-16 text-white">Process of Reeling</h4>
                      <h2><?php echo nl2br($process_of_reeling) ;?></h2>
                    </div>
                  </div>
                </div>

                 <?php if($series_of_grainage_steps!=''){ ?>
                <h4 class="nf-f-size-16 nf-strong my-3 mb-4">Series of Grainage Steps</h4>
                <div class="bg-gray p-4 row mx-0 mb-3">
                  <ul class="five_col_ul">

                    <?php
                      //echo '>>'.$collaborative_or_partner_organizations;
                      
                      $coll = explode(',',$series_of_grainage_steps);
                      for($i=0;$i<count($coll);$i++)
                      {
                        $k=$i+1;
                      ?>
                      <p ><?php echo $k.'. '; echo $coll[$i]?></p>
                      <?php } ?> 

                  
                  </ul>
                </div>
               <?php } ?>


            <?php }else if($sericulture_type=='Fabric Production'){
              $record=$record+1;
              ?>

            
            <h4 class="nf-f-size-20 nf-strong mb-4">Important Parameters</h4>
            <div class="row">
                  <div class="col-12 col-lg-10">

                    <div class="row">
                      <div class="col-lg-4 col-md-6  mb-4 parameter_box ">
                        <div class="nf-gradient-4">
                          <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/climate.png" alt="image" class="img-fluid">
                          <h4 class="nf-f-size-16 text-white">Yarn required to produce 1 M of  design fabric </h4>
                          <h2><?php echo $yarn_required_to_produce_1_m_of_design_fabric?></h2>
                        </div>
                      </div>
                      <div class="col-lg-4 col-md-6  mb-4 parameter_box ">
                        <div class="nf-gradient-3">
                          <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/soil-ph.png" alt="image" class="img-fluid">
                          <h4 class="nf-f-size-16 text-white">Fabric production /loom/cycle of 4months</h4>
                          <h2><?php echo $fabric_production_loomcycle_of_4months?> </h2>
                        </div>
                      </div>
                      <div class="col-lg-4 col-md-6  mb-4 parameter_box ">
                        <div class="nf-gradient-5">
                          <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/sowing-season2.png" alt="image" class="img-fluid">
                          <h4 class="nf-f-size-16 text-white">Cost of Yarn​</h4>
                          <h2><?php echo $cost_of_yarn​?></h2>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-6 col-md-6  mb-4 parameter_box ">
                        <div class="nf-gradient-6">
                          <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/harvesting.png" alt="image" class="img-fluid">
                          <h4 class="nf-f-size-16 text-white">Production of design fabric/day/  loom</h4>
                          <h2><?php echo $production_of_design_fabricday_loom?></h2>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6  mb-4 parameter_box ">
                        <div class="nf-gradient-7">
                          <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/wheat-sack.png" alt="image" class="img-fluid">
                          <h4 class="nf-f-size-16 text-white">Average selling  price of design  fabric (One set of Mekhela Chadaar)</h4>
                          <h2> <?php echo $average_selling_price_of_design_fabric_one_set_of_mekhela_chadaar?></h2>
                        </div>
                      </div>
           
                      
                      </div>
           
                     
                  </div>

                  <div class="col-lg-12  mb-4 parameter_box nf-muga-font">
                    <div class="nf-gradient-20">
                      <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/soil-ph.png" alt="image" class="img-fluid">
                      <h4 class="nf-f-size-16 text-white">Appliances Required</h4>
                      <h2><?php echo nl2br($appliances_required);?></h2>
                    </div>
                  </div>

                  <div class="col-lg-12  mb-4 parameter_box nf-muga-font">
                  <div class="nf-gradient-4">
                    <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/soil-ph.png" alt="image" class="img-fluid">
                    <h4 class="nf-f-size-16 text-white">Process of Weaving</h4>
                    <h2><?php echo nl2br($process_of_reeling);?></h2>
                  </div>
                  </div>
                </div>
                 <?php if($series_of_grainage_steps!=''){ ?>
                <h4 class="nf-f-size-16 nf-strong my-3 mb-4">Series of Grainage Steps</h4>
                <div class="bg-gray p-4 row mx-0 mb-3">
                  <ul class="five_col_ul">

                    <?php
                      //echo '>>'.$collaborative_or_partner_organizations;
                      
                      $coll = explode(',',$series_of_grainage_steps);
                      for($i=0;$i<count($coll);$i++)
                      {
                        $k=$i+1;
                      ?>
                      <p ><?php echo $k.'. '; echo $coll[$i]?></p>
                      <?php } ?> 

                  
                  </ul>
                </div>
               <?php } ?>

      <?php } else if($sericulture_type=='Production of Twisted Reel Yarn'){

        $record=$record+1;
        ?>

            
            <h4 class="nf-f-size-20 nf-strong mb-4">Important Parameters</h4>
            <div class="row">
                  <div class="col-12 col-lg-10">

                    <div class="row">
                      <div class="col-lg-4 col-md-6  mb-4 parameter_box ">
                        <div class="nf-gradient-4">
                          <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/soil-ph.png" alt="image" class="img-fluid">
                          <h4 class="nf-f-size-16 text-white">Cost of Twisting (Rs)</h4>
                          <h2><?php echo $cost_of_cocoons_rs; ?></h2>
                        </div>
                      </div>
                      <div class="col-lg-4 col-md-6  mb-4 parameter_box ">
                        <div class="nf-gradient-3">
                          <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/sowing-season2.png" alt="image" class="img-fluid">
                          <h4 class="nf-f-size-16 text-white">Production of Twisted yarn/day/machine​</h4>
                          <h2><?php echo $production_of_yarndaymachine; ?> </h2>
                        </div>
                      </div>
                      <div class="col-lg-4 col-md-6  mb-4 parameter_box ">
                        <div class="nf-gradient-5">
                          <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/wheat-sack.png" alt="image" class="img-fluid">
                          <h4 class="nf-f-size-16 text-white">Average selling price of Twisted yarn (Rs)​</h4>
                          <h2><?php echo $average_selling_price; ?></h2>
                        </div>
                      </div>
                    </div>
                    
                  </div>

                  <div class="row">
                      <div class="col-lg-12 mb-4 parameter_box nf-muga-font">
                        <div class="nf-gradient-20">
                          <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/soil-ph.png" alt="image" class="img-fluid">
                          <h4 class="nf-f-size-16 text-white">Appliances Required</h4>
                            <h2><?php echo nl2br($appliances_required);?></h2>
                        </div>
                      </div>
                    </div>
           
                    <div class="row">
                      <div class="col-lg-12 mb-4 parameter_box nf-muga-font">
                          <div class="nf-gradient-4">
                            <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/soil-ph.png" alt="image" class="img-fluid">
                            <h4 class="nf-f-size-16 text-white">Process of Twisting</h4>
                            <h2><?php echo nl2br($process_of_reeling);?></h2>
                            </div>
                        </div>
                    </div>
                </div>
                 <?php if($series_of_grainage_steps!=''){ ?>
                <h4 class="nf-f-size-16 nf-strong my-3 mb-4">Series of Grainage Steps</h4>
                <div class="bg-gray p-4 row mx-0 mb-3">
                  <ul class="five_col_ul">

                    <?php
                      //echo '>>'.$collaborative_or_partner_organizations;
                      
                      $coll = explode(',',$series_of_grainage_steps);
                      for($i=0;$i<count($coll);$i++)
                      {
                        $k=$i+1;
                      ?>
                      <p ><?php echo $k.'. '; echo $coll[$i]?></p>
                      <?php } ?> 

                  
                  </ul>
                </div>
               <?php } ?>
        <?php } else if($sericulture_type=='Production of Reeled Yarn'){
                  $record=$record+1;
        ?>
            <h4 class="nf-f-size-20 nf-strong mb-4">Important Parameters</h4>
            <div class="row">
                  <div class="col-12 col-lg-10">

                    <div class="row">
                      <div class="col-lg-4 col-md-6  mb-4 parameter_box ">
                        <div class="nf-gradient-1">
                          <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/climate.png" alt="image" class="img-fluid">
                          <h4 class="nf-f-size-16 text-white">Cocoons required to produce 1 kg of yarn</h4>
                          <h2><?php echo $cocoons_required_to_produce_1_kg_of_yarn; ?></h2>
                        </div>
                      </div>
                      <div class="col-lg-4 col-md-6  mb-4 parameter_box ">
                        <div class="nf-gradient-4">
                          <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/soil-ph.png" alt="image" class="img-fluid">
                          <h4 class="nf-f-size-16 text-white">Cost of Cacoons</h4>
                          <h2><?php echo $cost_of_cocoons_rs; ?></h2>
                        </div>
                      </div>
                      <div class="col-lg-4 col-md-6  mb-4 parameter_box ">
                        <div class="nf-gradient-3">
                          <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/sowing-season2.png" alt="image" class="img-fluid">
                          <h4 class="nf-f-size-16 text-white">Production of yarn/day/ machine​</h4>
                          <h2><?php echo $production_of_yarndaymachine; ?> </h2>
                        </div>
                      </div>
                      
                      <div class="col-lg-6 col-md-6  mb-4 parameter_box ">
                        <div class="nf-gradient-7">
                          <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/wheat-sack.png" alt="image" class="img-fluid">
                          <h4 class="nf-f-size-16 text-white">Silk Waste production/day/machine</h4>
                          <h2><?php echo $silk_waste_productiondaymachine; ?></h2>
                        </div>
                      </div>
                    
                      <div class="col-lg-6 col-md-6  mb-4 parameter_box ">
                        <div class="nf-gradient-5">
                          <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/wheat-sack.png" alt="image" class="img-fluid">
                          <h4 class="nf-f-size-16 text-white">Average selling price of yarn (Rs)​</h4>
                          <h2><?php echo $average_selling_price; ?></h2>
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
                    <?php }?>

                  
                </div>

                 <div class="row">
                    <div class="col-lg-12  mb-4 parameter_box nf-muga-font">
                      <div class="nf-gradient-20">
                        <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/soil-ph.png" alt="image" class="img-fluid">
                        <h4 class="nf-f-size-16 text-white">Appliances Required</h4>
                          <h2><?php echo nl2br($appliances_required);?></h2>
                      </div>
                    </div>
                  </div>
           
                  <div class="row">
                    <div class="col-lg-12 mb-4 parameter_box nf-muga-font">
                        <div class="nf-gradient-4">
                          <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/soil-ph.png" alt="image" class="img-fluid">
                          <h4 class="nf-f-size-16 text-white">Process of Reeling</h4>
                          <h2><?php echo nl2br($process_of_reeling);?></h2>
                          </div>
                      </div>
                  </div>

               <?php if($series_of_grainage_steps!=''){ ?>
                <h4 class="nf-f-size-16 nf-strong my-3 mb-4">Series of Grainage Steps</h4>
                <div class="bg-gray p-4 row mx-0 mb-3">
                  <ul class="five_col_ul">

                    <?php
                      //echo '>>'.$collaborative_or_partner_organizations;
                      
                      $coll = explode(',',$series_of_grainage_steps);
                      for($i=0;$i<count($coll);$i++)
                      {
                        $k=$i+1;
                      ?>
                      <p ><?php echo $k.'. '; echo $coll[$i]?></p>
                      <?php } ?> 

                  
                  </ul>
                </div>
               <?php } ?>
        <?php } else if($sericulture_type=='Production of Spun Yarn'){
                  $record=$record+1;
        ?>
            <h4 class="nf-f-size-20 nf-strong mb-4">Important Parameters</h4>
            <div class="row">
                  <div class="col-12 col-lg-10">

                    <div class="row">
                      <div class="col-lg-6 col-md-6  mb-4 parameter_box ">
                        <div class="nf-gradient-1">
                          <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/climate.png" alt="image" class="img-fluid">
                          <h4 class="nf-f-size-16 text-white">Cocoons required to produce 1 kg of yarn</h4>
                          <h2><?php echo $cocoons_required_to_produce_1_kg_of_yarn; ?></h2>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6  mb-4 parameter_box ">
                        <div class="nf-gradient-4">
                          <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/soil-ph.png" alt="image" class="img-fluid">
                          <h4 class="nf-f-size-16 text-white">Cost of Cacoons</h4>
                          <h2><?php echo $cost_of_cocoons_rs; ?></h2>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6  mb-4 parameter_box ">
                        <div class="nf-gradient-3">
                          <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/sowing-season2.png" alt="image" class="img-fluid">
                          <h4 class="nf-f-size-16 text-white">Production of yarn/day/ machine​</h4>
                          <h2><?php echo $production_of_yarndaymachine; ?> </h2>
                        </div>
                      </div>
                      
                      <div class="col-lg-6 col-md-6  mb-4 parameter_box ">
                        <div class="nf-gradient-5">
                          <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/wheat-sack.png" alt="image" class="img-fluid">
                          <h4 class="nf-f-size-16 text-white">Average selling price of yarn (Rs)​</h4>
                          <h2><?php echo $average_selling_price; ?></h2>
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
                    <?php }?>

                  
                </div>

                 <div class="row">
                    <div class="col-lg-12  mb-4 parameter_box nf-muga-font">
                      <div class="nf-gradient-20">
                        <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/soil-ph.png" alt="image" class="img-fluid">
                        <h4 class="nf-f-size-16 text-white">Appliances Required</h4>
                          <h2><?php echo nl2br($appliances_required);?></h2>
                      </div>
                    </div>
                  </div>
           
                  <div class="row">
                    <div class="col-lg-12 mb-4 parameter_box nf-muga-font">
                        <div class="nf-gradient-4">
                          <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/soil-ph.png" alt="image" class="img-fluid">
                          <h4 class="nf-f-size-16 text-white">Process of Reeling</h4>
                          <h2><?php echo nl2br($process_of_reeling);?></h2>
                          </div>
                      </div>
                  </div>

               <?php if($series_of_grainage_steps!=''){ ?>
                <h4 class="nf-f-size-16 nf-strong my-3 mb-4">Series of Grainage Steps</h4>
                <div class="bg-gray p-4 row mx-0 mb-3">
                  <ul class="five_col_ul">

                    <?php
                      //echo '>>'.$collaborative_or_partner_organizations;
                      
                      $coll = explode(',',$series_of_grainage_steps);
                      for($i=0;$i<count($coll);$i++)
                      {
                        $k=$i+1;
                      ?>
                      <p ><?php echo $k.'. '; echo $coll[$i]?></p>
                      <?php } ?> 

                  
                  </ul>
                </div>
               <?php } ?>       

        <?php } else if($sericulture_type=='Silk Yarn Dyeing') {
           $record=$record+1;
        ?>
            <h4 class="nf-f-size-20 nf-strong mb-4">Important Parameters</h4>
            <div class="row">
                  <div class="col-12 col-lg-10">

                    <div class="row">
                      <div class="col-lg-4 col-md-6  mb-4 parameter_box ">
                        <div class="nf-gradient-1">
                          <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/climate.png" alt="image" class="img-fluid">
                          <h4 class="nf-f-size-16 text-white">Yarn Dyeing capacity /day/8 hrs</h4>
                          <h2><?php echo $yarn_dyeing_capacity_day_8_hrs; ?></h2>
                        </div>
                      </div>
                      <div class="col-lg-4 col-md-6  mb-4 parameter_box ">
                        <div class="nf-gradient-4">
                          <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/soil-ph.png" alt="image" class="img-fluid">
                          <h4 class="nf-f-size-16 text-white">Cost of dyeing per kg of yarn</h4>
                          <h2><?php echo $cost_of_dyeing_per_kg_of_yarn; ?></h2>
                        </div>
                      </div>
                    </div>
                    
                  </div>
                </div>

                <div class="row">
                    <div class="col-lg-12 col-md-6  mb-4 parameter_box nf-muga-font">
                      <div class="nf-gradient-20">
                        <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/soil-ph.png" alt="image" class="img-fluid">
                        <h4 class="nf-f-size-16 text-white">Appliances Required</h4>
                          <h2><?php echo nl2br($appliances_required);?></h2>
                      </div>
                    </div>
                  </div>
           
                  <div class="row">
                    <div class="col-lg-12 col-md-6  mb-4 parameter_box nf-muga-font">
                        <div class="nf-gradient-4">
                          <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/soil-ph.png" alt="image" class="img-fluid">
                          <h4 class="nf-f-size-16 text-white">Process of Dyeing</h4>
                          <h2><?php echo nl2br($process_of_reeling);?></h2>
                          </div>
                      </div>
                  </div>

                 <?php if($series_of_grainage_steps!=''){ ?>
                <h4 class="nf-f-size-16 nf-strong my-3 mb-4">Series of Grainage Steps</h4>
                <div class="bg-gray p-4 row mx-0 mb-3">
                  <ul class="five_col_ul">

                    <?php
                      //echo '>>'.$collaborative_or_partner_organizations;
                      
                      $coll = explode(',',$series_of_grainage_steps);
                      for($i=0;$i<count($coll);$i++)
                      {
                        $k=$i+1;
                      ?>
                      <p ><?php echo $k.'. '; echo $coll[$i]?></p>
                      <?php } ?> 

                  
                  </ul>
                </div>
               <?php } }?>
        
        



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
          'value'    => 'Sericulture',
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
          'value'    => 'Sericulture',
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
          'value'    => 'Sericulture',
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
          'value'    => 'Sericulture',
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
    $('.check_variety').click(function() {
        $('.check_variety').not(this).prop('checked', false);
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