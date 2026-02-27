<?php /*Template Name: Food Processing Details */ ?>
<?php 
if($_POST['spice']=='')
{  
      wp_redirect(site_url('ready-to-eat'));
      exit; 
}
get_header(); 

$record=0;
$blog_args = array(
                            'post_type' => 'food_processing',
                            'post_status' => 'publish',
                            'meta_key'    => 'food_processing_type',
                            'meta_value'  => $_POST['food_processing_type'],
                            'title' =>$_POST['spice'],
                            'posts_per_page' => '1',
                            
                    );
    

      $blog_posts = new WP_Query($blog_args);
       // echo "<pre>";
       // print_r($blog_posts);


while($blog_posts->have_posts()) {
                $blog_posts->the_post(); 

                $values= get_fields();
                
                if($values)
                {
                    
                    $banner_image=$values['banner_image'];
                    $capacity=$values['capacity'];
                    $final_products_1=$values['final_products_1'];
                    $final_products_2=$values['final_products_2'];
                    
                    //$infrastructure_required=$values['infrastructure_required'];
                    //$plot=$values['infrastructure_required']['plot'];
                    //$shed=$values['infrastructure_required']['shed'];
                    //$power=$values['infrastructure_required']['power'];
                    //$water=$values['infrastructure_required']['water'];


                    $infrastructure_1_Image = $values['infrastructure_required']['infrastructure_1_Image'];
                    $infrastructure_1_heading = $values['infrastructure_required']['infrastructure_1_heading'];
                    $infrastructure_1_value = $values['infrastructure_required']['infrastructure_1_value'];
                    $infrastructure_2_Image = $values['infrastructure_required']['infrastructure_2_Image'];
                    $infrastructure_2_heading = $values['infrastructure_required']['infrastructure_2_heading'];
                    $infrastructure_2_value = $values['infrastructure_required']['infrastructure_2_value'];
                    $infrastructure_3_Image = $values['infrastructure_required']['infrastructure_3_Image'];
                    $infrastructure_3_heading = $values['infrastructure_required']['infrastructure_3_heading'];
                    $infrastructure_3_value = $values['infrastructure_required']['infrastructure_3_value'];
                    $infrastructure_4_Image = $values['infrastructure_required']['infrastructure_4_Image'];
                    $infrastructure_4_heading = $values['infrastructure_required']['infrastructure_4_heading'];
                    $infrastructure_4_value = $values['infrastructure_required']['infrastructure_4_value'];
                    $infrastructure_5_Image = $values['infrastructure_required']['infrastructure_5_Image'];
                    $infrastructure_5_heading = $values['infrastructure_required']['infrastructure_5_heading'];
                    $infrastructure_5_value = $values['infrastructure_required']['infrastructure_5_value'];
                    $infrastructure_6_Image = $values['infrastructure_required']['infrastructure_6_Image'];
                    $infrastructure_6_heading = $values['infrastructure_required']['infrastructure_6_heading'];
                    $infrastructure_6_value = $values['infrastructure_required']['infrastructure_6_value'];
                    $infrastructure_7_Image = $values['infrastructure_required']['infrastructure_7_Image'];
                    $infrastructure_7_heading = $values['infrastructure_required']['infrastructure_7_heading'];
                    $infrastructure_7_value = $values['infrastructure_required']['infrastructure_7_value'];
                    $infrastructure_8_Image = $values['infrastructure_required']['infrastructure_8_Image'];
                    $infrastructure_8_heading = $values['infrastructure_required']['infrastructure_8_heading'];
                    $infrastructure_8_value = $values['infrastructure_required']['infrastructure_8_value'];



                    $plan_and_machinery_required=$values['plan_and_machinery_required'];
                    $exporting_countries=$values['exporting_countries'];
                    $employment_generation=$values['employment_generation'];
                    $direct=$values['employment_generation']['direct'];
                    $indirect=$values['employment_generation']['indirect'];
                    $cost_of_sale_or_either=$values['cost_of_sale_or_either'];
                    $cost_of_sale_or_either_1=$values['cost_of_sale_or_either']['cost_of_sale_or_either_1'];
                    $cost_of_sale_or_either_2=$values['cost_of_sale_or_either']['cost_of_sale_or_either_2'];
                    $cost_of_sale_or_either_3=$values['cost_of_sale_or_either']['cost_of_sale_or_either_3'];
                    $cost_of_sale_or_either_4=$values['cost_of_sale_or_either']['cost_of_sale_or_either_4'];
                    $cost_of_sale_or_either_5=$values['cost_of_sale_or_either']['cost_of_sale_or_either_5'];
                    $target_sales_revenue_300_days_pa_8_hours_shift=$values['target_sales_revenue_300_days_pa_8_hours_shift'];
                    $target_sales_revenue_300_days_pa_8_hours_shift_1=$values['target_sales_revenue_300_days_pa_8_hours_shift']['target_sales_revenue_300_days_pa_8_hours_shift_1'];
                    $target_sales_revenue_300_days_pa_8_hours_shift_2=$values['target_sales_revenue_300_days_pa_8_hours_shift']['target_sales_revenue_300_days_pa_8_hours_shift_2'];
                    $target_sales_revenue_300_days_pa_8_hours_shift_3=$values['target_sales_revenue_300_days_pa_8_hours_shift']['target_sales_revenue_300_days_pa_8_hours_shift_3'];
                    $target_sales_revenue_300_days_pa_8_hours_shift_4=$values['target_sales_revenue_300_days_pa_8_hours_shift']['target_sales_revenue_300_days_pa_8_hours_shift_4'];
                    $target_sales_revenue_300_days_pa_8_hours_shift_5=$values['target_sales_revenue_300_days_pa_8_hours_shift']['target_sales_revenue_300_days_pa_8_hours_shift_5'];

                    $explore_raw_material=$values['explore_raw_material'];

                    $raw_material_input=$values['raw_material_input'];
                    $raw_material_input_1_image=$values['raw_material_input']['raw_material_input_1_image'];
                    $raw_material_input_1=$values['raw_material_input']['raw_material_input_1'];
                    $raw_material_input_2_image=$values['raw_material_input']['raw_material_input_2_image'];
                    $raw_material_input_2=$values['raw_material_input']['raw_material_input_2'];
                    $raw_material_input_3_image=$values['raw_material_input']['raw_material_input_3_image'];
                    $raw_material_input_3=$values['raw_material_input']['raw_material_input_3'];
                    $raw_material_input_4_image=$values['raw_material_input']['raw_material_input_4_image'];
                    $raw_material_input_4=$values['raw_material_input']['raw_material_input_4'];
                    $raw_material_input_5_image=$values['raw_material_input']['raw_material_input_5_image'];
                    $raw_material_input_5=$values['raw_material_input']['raw_material_input_5'];
                    
                    
                    $final_products=$values['final_products'];
                    $final_products_1_image=$values['final_products']['final_product_1_image'];
                    $final_products_1=$values['final_products']['final_product_1'];
                    $final_products_2_image=$values['final_products']['final_product_2_image'];
                    $final_products_2=$values['final_products']['final_product_2'];
                    $final_products_3_image=$values['final_products']['final_product_3_image'];
                    $final_products_3=$values['final_products']['final_product_3'];
                    $final_products_4_image=$values['final_products']['final_product_4_image'];
                    $final_products_4=$values['final_products']['final_product_4'];
                    $final_products_5_image=$values['final_products']['final_product_5_image'];
                    $final_products_5=$values['final_products']['final_product_5'];
                    

                    $target_process=$values['target_process'];
                    $target_process_1_image=$values['target_process']['target_process_1_image'];
                    $target_process_1=$values['target_process']['target_process_1'];
                    $target_process_2_image=$values['target_process']['target_process_2_image'];
                    $target_process_2=$values['target_process']['target_process_2'];
                    $target_process_3_image=$values['target_process']['target_process_3_image'];
                    $target_process_3=$values['target_process']['target_process_3'];
                    $target_process_4_image=$values['target_process']['target_process_4_image'];
                    $target_process_4=$values['target_process']['target_process_4'];
                    $target_process_5_image=$values['target_process']['target_process_5_image'];
                    $target_process_5=$values['target_process']['target_process_5'];
                    $target_process_6_image=$values['target_process']['target_process_6_image'];
                    $target_process_6=$values['target_process']['target_process_6'];
                    $target_process_7_image=$values['target_process']['target_process_7_image'];
                    $target_process_7=$values['target_process']['target_process_7'];
                    $target_process_8_image=$values['target_process']['target_process_8_image'];
                    $target_process_8=$values['target_process']['target_process_8'];


                    $view_complete_details=$values['view_complete_details'];
                }

?>
<!-- header-end -->
<!-- inner-banner-start -->
<div class="inner-banner">
<div class="container">
<div class="banner-title">
  <h3><?php echo $_POST['spice'];?><a href="javascript:void(0)" onclick="history.go(-1);" class="changeTopic">Change Topic</a></h3>
  <ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Entrepreneurship </a></li>
    <li class="breadcrumb-item"><a href="#"> Know your Business </a></li>
    <li class="breadcrumb-item"><a href="#">Manufacturing </a></li>
    <li class="breadcrumb-item"><a href="#">Food Processing </a></li>
    <li class="breadcrumb-item"><a href="#"> <?php echo $_POST['food_processing_type']?> </a></li>
    <li class="breadcrumb-item active"><?php echo $_POST['spice'];?></li>
  </ul>
</div>
<div class="banner-content">
  <div class="row">
    <div class="col-md-4 banner-img pr-0"><img src="<?php echo $banner_image?>"></div>
    <div class="col-md-8  pl-0">
      <div class="bannerbg nf-gradient-14 justify-content-start pt-3 nf-height-100">
        <h4 class="nf-f-size-24"><?php echo $_POST['spice'];?></h4>
        <h5><?php echo $blog_posts->posts[0]->post_content;?> </h5>
        
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
  <div class="row mb-2">
    <div class="col-md-8">
      <h4 class="nf-f-size-20 nf-strong">Raw Material Input </h4>
    </div>
  </div>
  <div class="row nf-raw-section">

    <?php if($raw_material_input_1!=''){?>
    <div class="col-12 col-lg-2">
      <div class="nf-select-wrap nf-raw-wrap">
        <div class="nf-select-img">
          <?php if($raw_material_input_1_image!=''){?><img src="<?php echo $raw_material_input_1_image; ?>" alt="seed"><?php }?>
          <span><?php echo $raw_material_input_1; ?></span>
        </div>
      </div>
    </div>
    <?php }?>
    <?php if($raw_material_input_2!=''){?>
    <div class="col-12 col-lg-2">
      <div class="nf-select-wrap nf-raw-wrap">
        <div class="nf-select-img">
          <?php if($raw_material_input_2_image!=''){?><img src="<?php echo $raw_material_input_2_image; ?>" alt="seed"><?php }?>
          <span><?php echo $raw_material_input_2; ?></span>
        </div>
      </div>
    </div>
    <?php }?>
    <?php if($raw_material_input_3!=''){?>
    <div class="col-12 col-lg-2">
      <div class="nf-select-wrap nf-raw-wrap">
        <div class="nf-select-img">
          <?php if($raw_material_input_3_image!=''){?><img src="<?php echo $raw_material_input_3_image; ?>" alt="seed"><?php }?>
          <span><?php echo $raw_material_input_3; ?></span>
        </div>
      </div>
    </div>
    <?php }?>
    <?php if($raw_material_input_4!=''){?>
    <div class="col-12 col-lg-2">
      <div class="nf-select-wrap nf-raw-wrap">
        <div class="nf-select-img">
          <?php if($raw_material_input_4_image!=''){?><img src="<?php echo $raw_material_input_4_image; ?>" alt="seed"><?php }?>
          <span><?php echo $raw_material_input_4; ?></span>
        </div>
      </div>
    </div>
    <?php }?>
    <?php if($raw_material_input_5!=''){?>
    <div class="col-12 col-lg-2">
      <div class="nf-select-wrap nf-raw-wrap">
        <div class="nf-select-img">
          <?php if($raw_material_input_5_image!=''){?><img src="<?php echo $raw_material_input_5_image; ?>" alt="seed"><?php }?>
          <span><?php echo $raw_material_input_5; ?></span>
        </div>
      </div>
    </div>
    <?php }?>
    
  </div>
  <div class="row">
    <div class="col-12">
      <div class="nf-capacity-block nf-gradient-1">
        <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/turmeric-processing/capacity.png" alt="capacity">
        <span>Capacity</span>
        <h2><?php echo $capacity?></h2>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="nf-target-process-block">
        <h4>Target Process</h4>
        <div class="nf-pro-inner-wrap">
          <?php if($target_process_1!=''){?>
          <div class="nf-pro-img-block">
            <?php if($target_process_1_image!=''){?><img src="<?php echo $target_process_1_image; ?>" alt="process-1"><?php }?>
            <span><?php echo $target_process_1; ?></span>
          </div>
        <?php }?>
        <?php if($target_process_2!=''){?>
          <div class="nf-pro-img-block">
            <?php if($target_process_2_image!=''){?><img src="<?php echo $target_process_2_image; ?>" alt="process-1"><?php }?>
            <span><?php echo $target_process_2; ?></span>
          </div>
          <?php }?>
        <?php if($target_process_3!=''){?>
          <div class="nf-pro-img-block">
            <?php if($target_process_3_image!=''){?><img src="<?php echo $target_process_3_image; ?>" alt="process-1"><?php }?>
            <span><?php echo $target_process_3; ?></span>
          </div>
          <?php }?>
        <?php if($target_process_4!=''){?>
          <div class="nf-pro-img-block">
            <?php if($target_process_4_image!=''){?><img src="<?php echo $target_process_4_image; ?>" alt="process-1"><?php }?>
            <span><?php echo $target_process_4; ?></span>
          </div>
          <?php }?>
        <?php if($target_process_5!=''){?>
          <div class="nf-pro-img-block">
            <?php if($target_process_5_image!=''){?><img src="<?php echo $target_process_5_image; ?>" alt="process-1"><?php }?>
            <span><?php echo $target_process_5; ?></span>
          </div>
          <?php }?>
        <?php if($target_process_6!=''){?>
          <div class="nf-pro-img-block">
            <?php if($target_process_6_image!=''){?><img src="<?php echo $target_process_6_image; ?>" alt="process-1"><?php }?>
            <span><?php echo $target_process_6; ?></span>
          </div>
          <?php }?>
        <?php if($target_process_7!=''){?>
          <div class="nf-pro-img-block">
            <?php if($target_process_7_image!=''){?><img src="<?php echo $target_process_7_image; ?>" alt="process-1"><?php }?>
            <span><?php echo $target_process_7; ?></span>
          </div>
          <?php }?>
        </div>
      </div>
    </div>
  </div>
  <?php /*?><div class="row">
    <div class="col-12">
      <div class="nf-product-block">
        <h4 class="nf-f-size-20 nf-strong">Final Products</h4>
        <div class="nf-middle-product-block">
          <div class="row">
            <div class="col-6">
              <div class="nf-product-info">
                <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/turmeric-processing/food-1.jpg" alt="food-1">
                <p>
                  <?php echo $final_products_1?>
                </p>
              </div>
            </div>
            <div class="col-6">
              <div class="nf-product-info">
                <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/turmeric-processing/pizza.jpg" alt="food-1">
                <p>
                  <?php echo $final_products_2?>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div><?php */?>
  <hr>  
  <div class="row mb-2">
    <div class="col-md-8">
      <h4 class="nf-f-size-20 nf-strong">Final Product </h4>
    </div>
  </div>
  <div class="row nf-raw-section">

    <?php if($final_products_1!=''){?>
    <div class="col-12 col-lg-2">
      <div class="nf-select-wrap nf-raw-wrap">
        <div class="nf-select-img">
          <?php if($final_products_1_image!=''){?><img src="<?php echo $final_products_1_image; ?>" alt="seed"><?php }?>
          <span><?php echo $final_products_1; ?></span>
        </div>
      </div>
    </div>
    <?php }?>
    <?php if($final_products_2!=''){?>
    <div class="col-12 col-lg-2">
      <div class="nf-select-wrap nf-raw-wrap">
        <div class="nf-select-img">
          <?php if($final_products_2_image!=''){?><img src="<?php echo $final_products_2_image; ?>" alt="seed"><?php }?>
          <span><?php echo $final_products_2; ?></span>
        </div>
      </div>
    </div>
    <?php }?>
    <?php if($final_products_3!=''){?>
    <div class="col-12 col-lg-2">
      <div class="nf-select-wrap nf-raw-wrap">
        <div class="nf-select-img">
          <?php if($final_products_3_image!=''){?><img src="<?php echo $final_products_3_image; ?>" alt="seed"><?php }?>
          <span><?php echo $final_products_3; ?></span>
        </div>
      </div>
    </div>
    <?php }?>
    <?php if($final_products_4!=''){?>
    <div class="col-12 col-lg-2">
      <div class="nf-select-wrap nf-raw-wrap">
        <div class="nf-select-img">
          <?php if($final_products_4_image!=''){?><img src="<?php echo $final_products_4_image; ?>" alt="seed"><?php }?>
          <span><?php echo $final_products_4; ?></span>
        </div>
      </div>
    </div>
    <?php }?>
    <?php if($final_products_5!=''){?>
    <div class="col-12 col-lg-2">
      <div class="nf-select-wrap nf-raw-wrap">
        <div class="nf-select-img">
          <?php if($final_products_5_image!=''){?><img src="<?php echo $final_products_5_image; ?>" alt="seed"><?php }?>
          <span><?php echo $final_products_5; ?></span>
        </div>
      </div>
    </div>
    <?php }?>
    
  </div>
  
  
  
  <div class="row">
    <div class="col-12">
      <div class="nf-product-block nf-infra-block">
        <h4 class="nf-f-size-20 nf-strong">Infrastructure Required</h4>
        <div class="row">
          <?php if($infrastructure_1_heading!=''){?>
          <div class="col-12 col-lg-3">
            <div class="nf-capacity-block nf-sm-gradient-1">
              <?php if($infrastructure_1_Image!=''){?><img class="nf-p-img-1" src="<?php echo $infrastructure_1_Image?>" alt="icon-1.png"><?php }?>
              <span><?php echo $infrastructure_1_heading;?></span>
              <h2><?php echo $infrastructure_1_value?></h2>
            </div>
          </div>
        <?php }?>
        <?php if($infrastructure_2_heading!=''){?>
          <div class="col-12 col-lg-3">
            <div class="nf-capacity-block nf-sm-gradient-2">
              <?php if($infrastructure_2_Image!=''){?><img class="nf-p-img-2" src="<?php echo $infrastructure_2_Image?>" alt="icon-2.png"><?php }?>
              <span><?php echo $infrastructure_2_heading;?></span>
              <h2><?php echo $infrastructure_2_value?></h2>
            </div>
          </div>
          <?php }?>
        <?php if($infrastructure_3_heading!=''){?>
          <div class="col-12 col-lg-3">
            <div class="nf-capacity-block nf-sm-gradient-3">
              <?php if($infrastructure_3_Image!=''){?><img class="nf-p-img-3" src="<?php echo $infrastructure_3_Image?>" alt="icon-3.png"><?php }?>
              <span><?php echo $infrastructure_3_heading;?></span>
              <h2><?php echo $infrastructure_3_value?></h2>
            </div>
          </div>
          <?php }?>
        <?php if($infrastructure_4_heading!=''){?>
          <div class="col-12 col-lg-3">
            <div class="nf-capacity-block nf-sm-gradient-4">
              <?php if($infrastructure_4_Image!=''){?><img class="nf-p-img-4" src="<?php echo $infrastructure_4_Image?>" alt="icon-4.png"><?php }?>
              <span><?php echo $infrastructure_4_heading;?></span>
              <h2><?php echo $infrastructure_4_value?></h2>
            </div>
          </div>
          <?php }?>
        <?php if($infrastructure_5_heading!=''){?>
          <div class="col-12 col-lg-3">
            <div class="nf-capacity-block nf-sm-gradient-4">
              <?php if($infrastructure_5_Image!=''){?><img class="nf-p-img-4" src="<?php echo $infrastructure_5_Image?>" alt="icon-4.png"><?php }?>
              <span><?php echo $infrastructure_5_heading;?></span>
              <h2><?php echo $infrastructure_5_value?></h2>
            </div>
          </div>
          <?php }?>
        <?php if($infrastructure_6_heading!=''){?>
          <div class="col-12 col-lg-3">
            <div class="nf-capacity-block nf-sm-gradient-3">
              <?php if($infrastructure_6_Image!=''){?><img class="nf-p-img-3" src="<?php echo $infrastructure_6_Image?>" alt="icon-3.png"><?php }?>
              <span><?php echo $infrastructure_6_heading;?></span>
              <h2><?php echo $infrastructure_6_value?></h2>
            </div>
          </div>
          <?php }?>
        <?php if($infrastructure_7_heading!=''){?>
          <div class="col-12 col-lg-3">
            <div class="nf-capacity-block nf-sm-gradient-2">
              <?php if($infrastructure_7_Image!=''){?><img class="nf-p-img-2" src="<?php echo $infrastructure_7_Image?>" alt="icon-2.png"><?php }?>
              <span><?php echo $infrastructure_7_heading;?></span>
              <h2><?php echo $infrastructure_7_value?></h2>
            </div>
          </div>
          <?php }?>
        <?php if($infrastructure_8_heading!=''){?>
          <div class="col-12 col-lg-3">
            <div class="nf-capacity-block nf-sm-gradient-1">
              <?php if($infrastructure_8_Image!=''){?><img class="nf-p-img-1" src="<?php echo $infrastructure_8_Image?>" alt="icon-1.png"><?php }?>
              <span><?php echo $infrastructure_8_heading;?></span>
              <h2><?php echo $infrastructure_8_value?></h2>
            </div>
          </div>
        <?php }?>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="nf-product-block nf-plan-block">
        <h4 class="nf-f-size-20 nf-strong">Plant and Machinery Required  </h4>
        <div class="nf-plan-listing">
          <?php
          $plan_and_machinery_required = explode(',',$plan_and_machinery_required);
          $i=0;
          foreach($plan_and_machinery_required as $plant)
          {
            $i++;
          ?>

          <h5><span class="nf-ico-color-<?php echo $i?>"><?php echo $i?></span> <?php echo $plant?></h5>
        <?php }?>
          
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="nf-product-block nf-plan-block">
        <h4 class="nf-f-size-20 nf-strong">Exporting Countries  </h4>
        <div class="nf-plan-listing">
          <?php
          $exporting_countries = explode(',',$exporting_countries);
          $i=0;
          foreach($exporting_countries as $countries)
          {
            $i++;
          ?>

          <h5><span class="nf-ico-color-<?php echo $i?>"><?php echo $i?></span> <?php echo $countries?></h5>
        <?php }?>
          
        </div>
      </div>
    </div>
  </div>
  
  <?php /*?><div class="row">
          <div class="col-12">
            <div class="nf-product-block nf-plan-block nf-pro-cost">
              <h4 class="nf-f-size-20 nf-strong">Project Cost In Lakhs</h4>
              <div class="nf-flex-wrap">
              <div class="nf-table-wrap">
                <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <th>Details</th>
                      <th>In INR in Lakhs</th>
                      <!-- <th>In USD</th> -->
                    </thead>
                    <tbody>
                      <?php
                      $pcost1 = get_post_meta( $post->ID, '_event_pcost1_value_key', true ); 

                      $pcost2 = get_post_meta( $post->ID, '_event_pcost2_value_key', true );
                      //$pcost3 = get_post_meta( $post->ID, '_event_pcost3_value_key', true ); 
                      $tot1=0;
                      $tot2=0;
                    if(!empty($pcost1))
                      {

                          $pcost1 = explode('*****',$pcost1);
                          $pcost2 = explode('*****',$pcost2);
                         // $pcost3 = explode('*****',$pcost3);

                          for($i=0;$i<count($pcost1);$i++) 
                          {
                        ?>
                    
                      <tr>
                        <td><?php echo $pcost1[$i]?></td>
                        <td><?php echo $pcost2[$i]?></td>
                      <!--   <td><?php //echo $pcost3[$i]?></td> -->
                      </tr>
                      <?php 
                      if(is_numeric(trim($pcost2[$i])))
                      $tot1 = $tot1 + trim($pcost2[$i]);
                      if(is_numeric(trim($pcost3[$i])))
                      $tot2 = $tot2 + trim($pcost3[$i]);
                          }
                        } 
                      ?>

                 
                    </tbody>
                  </table>
                </div>
                <div class="table-responsive nf-table-footer">
                  <table class="table ">
                    <tfoot>
                      <tr>
                        <td>Total</td>
                        <td><?php echo $tot1;?></td>
                       <!--  <td><?php //echo $tot2;?></td> -->
                      </tr>
                    </tfoot>
                  </table>
                </div>
              </div>
              <?php if($explore_raw_material!=''){ ?>
               <div class="nf-databank-wrap">
                 <div class="nf-inner-databank">
                   <h4>Explore Raw Material  </h4>
                   <h2><a href="<?php echo $explore_raw_material?>" target="_blank">NER Database</a></h2>
                 </div>
               </div>
               <?php }?>
             </div>
            </div>
          </div>
          
        </div><?php */?>
        
        
        <div class="row nf-f-accordion">
            <div class="col-md-12 px-0 ">
              <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                <div class="row mx-0 nf-employment-block">
                  <div class="col-lg-6 mb-3 mb-lg-0">
                    <div class="panel panel-default">
                      <div class="panel-heading accordion_bg_1" role="tab" id="headingOne">
                        <h4 class="panel-title mb-0">
                          <a role="button" data-toggle="collapse" data-parent="#accordion" href="#projectcost" aria-expanded="true" aria-controls="projectcost">
                            Project Cost In Lakhs
                          </a>
                        </h4>
                      </div>
                      <?php 
                        $pcost1 = get_post_meta( $post->ID, '_event_pcostnew1_value_key', true );
                        $pcost2 = get_post_meta( $post->ID, '_event_pcostnew2_value_key', true );
                        $pcost3 = get_post_meta( $post->ID, '_event_pcostnew3_value_key', true );
                        // echo "<pre>";
                        // print_r($pcost1);
                      ?>
                      <div id="projectcost" class="panel-collapse collapse show" role="tabpanel" aria-labelledby="headingOne">
                        <div class="panel-body">
                          <div class="table-responsive ">
                            <table class="table table_border_0 nf-strong-600">
                              <tbody>
                                <?php if(!empty($pcost1)) { 
                                  $pcost1_val = explode('*****',$pcost1);
                                  $pcost2_val = explode('*****',$pcost2);
                                  $pcost3_val = explode('*****',$pcost3);
                                  for($i=0;$i<count($pcost1_val);$i++) {
                                     if($pcost3_val[$i] == 'Bold Text') { ?>
                                          <tr class="bg-gray nf-strong">
                                        <?php } else { ?>
                                          <tr>
                                        <?php } ?>
                                      <td><?php echo $pcost1_val[$i]; ?></td>
                                      <td align="right"><?php echo $pcost2_val[$i]; ?></td>
                                    </tr>
                                  <?php } } ?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="panel panel-default">
                      <div class="panel-heading accordion_bg_2" role="tab" id="headingTwo">
                        <h4 class="panel-title mb-0">
                          <a role="button" data-toggle="collapse" data-parent="#accordion" href="#finance" aria-expanded="false" aria-controls="finance">
                            Means of Finance In Lakhs
                          </a>
                        </h4>
                      </div>
                      <?php 
                        $fin1 = get_post_meta( $post->ID, '_event_finance1_value_key', true );
                        $fin2 = get_post_meta( $post->ID, '_event_finance2_value_key', true );
                        $fin3 = get_post_meta( $post->ID, '_event_finance3_value_key', true );
                        $fin4 = get_post_meta( $post->ID, '_event_finance4_value_key', true );
                        // echo "<pre>";
                        // print_r($fin1);
                      ?>
                      <div id="finance" class="panel-collapse collapse show" role="tabpanel" aria-labelledby="headingTwo">
                        <div class="panel-body">
                          <div class="table-responsive">
                            <table class="table table_border_0 nf-strong-600">
                              <tbody>
                                <?php if(!empty($fin1)) { 
                                  $fin1_val = explode('*****',$fin1);
                                  $fin2_val = explode('*****',$fin2);
                                  $fin3_val = explode('*****',$fin3);
                                  $fin4_val = explode('*****',$fin4);
                                  ?>
                                    <tr class="bg-gray nf-strong">
                                                  <td></td>
                                                  <td align="right">Amount</td>
                                                  <!--<td align="right">Percentage</td>-->
                                                </tr>

                                  <?php
                                  for($i=0;$i<count($fin1_val);$i++) {
                                    if($fin3_val[$i] == 'Bold Text') { ?>
                                        <tr class="bg-gray nf-strong">
                                      <?php } else { ?>
                                        <tr>
                                      <?php } ?>
                                      <td><?php echo $fin1_val[$i]; ?></td>
                                      <td align="right"><?php echo $fin2_val[$i]; ?></td>
                                      <!--<td  align="right"><?php //echo $fin4_val[$i].'%'; ?></td>-->
                                    </tr>
                                <?php } } ?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
        <?php if($explore_raw_material!=''){ ?> 
        <div class="row">
          <div class="col-12">
            <div class=""> <!--nf-product-block nf-plan-block nf-pro-cost-->
            <div class="nf-flex-wrap">
               <div class="nf-databank-wrap nf-product-block w-100 ml-0">
                 <div class="nf-inner-databank d-flex align-items-center">
                   <h4 class="m-0">Explore Raw Material  </h4>
                   <h2 class="m-0 ml-2"><a href="<?php echo $explore_raw_material?>" target="_blank">NER Database</a></h2>
                 </div>
               </div>
                </div>
            </div>
          </div>
        </div>
        <?php }?>
    
        
  <div class="row">
    <div class="col-12">
      <div class="nf-employment-block">
        <div class="nf-capacity-block nf-gradient-1">
          <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/turmeric-processing/capacity.png" alt="capacity">
          <span>Employment Generation  </span>
          <h2><?php echo $employment_generation; //$direct?> </h2>
          <h2><span> <!--Indirect:--> </span> <?php //echo $indirect?> </h2>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="nf-product-block nf-plan-block">
        <h4 class="nf-f-size-20 nf-strong">Cost Of Sales </h4>
        <div class="nf-cost-list">
          <? if($cost_of_sale_or_either_1!=''){?>
          <h2 class="nf-orange-block"><small><?php echo $cost_of_sale_or_either_1?></small></h2>
        <?php }?>
        <? if($cost_of_sale_or_either_2!=''){?>
          <h2 class="nf-green-block"><small><?php echo $cost_of_sale_or_either_2?></small></h2>
          <?php }?>
        <? if($cost_of_sale_or_either_3!=''){?>
          <h2 class="nf-voilet-block"><small><?php echo $cost_of_sale_or_either_3?></small></h2>
          <?php }?>
        <? if($cost_of_sale_or_either_4!=''){?>
          <h2 class="nf-pink-block"><small><?php echo $cost_of_sale_or_either_4?></small></h2>
          <?php }?>
        <? if($cost_of_sale_or_either_5!=''){?>
          <h2 class="nf-pink-block"><small><?php echo $cost_of_sale_or_either_5?></small></h2>
          <?php }?>  
        </div>
      </div>
    </div>
  </div>

  <div class="row">
          <div class="col-12">
            <div class="nf-product-block nf-plan-block">
              <h4 class="nf-f-size-20 nf-strong">Target Sales Revenue 300 days p.a. 8 hours shift </h4>
             
              <div class="nf-cost-list">
                <? if($target_sales_revenue_300_days_pa_8_hours_shift_1!=''){?>
                <h2 class="nf-orange-block"><small><?php echo $target_sales_revenue_300_days_pa_8_hours_shift_1?></small></h2>
              <?php }?>
              <? if($target_sales_revenue_300_days_pa_8_hours_shift_2!=''){?>
                <h2 class="nf-green-block"><small><?php echo $target_sales_revenue_300_days_pa_8_hours_shift_2?></small></h2>
                <?php }?>
              <? if($target_sales_revenue_300_days_pa_8_hours_shift_3!=''){?>
                <h2 class="nf-voilet-block"><small><?php echo $target_sales_revenue_300_days_pa_8_hours_shift_3?></small></h2>
                <?php }?>
              <? if($target_sales_revenue_300_days_pa_8_hours_shift_4!=''){?>
                <h2 class="nf-pink-block"><small><?php echo $target_sales_revenue_300_days_pa_8_hours_shift_4?></small></h2>
                <?php }?>
              <? if($target_sales_revenue_300_days_pa_8_hours_shift_5!=''){?>
                <h2 class="nf-pink-block"><small><?php echo $target_sales_revenue_300_days_pa_8_hours_shift_5?></small></h2>
                <?php }?>
              </div>
                
            </div>
            <?php if($view_complete_details!=''){?>
            <div class="row">
              <div class="col-lg-12 col-md-12 mt-4 d-flex justify-content-center"><a class="btn nf-button-v-small w-50" href="<?php echo $view_complete_details?>" target="_blank" role="button">View Complete Details</a></div>
            </div>
            <?php }?>
            <?php 
            $qsuc = get_post_meta( $post->ID, '_event_qlinks_value_key', true ); 
            $qsucurl = get_post_meta( $post->ID, '_event_qlinksurl_value_key', true );
            if(!empty($qsuc))
            {
            ?>
            <div class="nf-product-block nf-quick-block-wrap">
             <h4 class="nf-f-size-20 nf-strong">Quick Links </h4>
             <div class="row">

              <?php
                    $qsuc = explode('*****',$qsuc);
                    $qsucurl = explode('*****',$qsucurl);
                                
                    $k=0;
                    for($i=0;$i<count($qsuc);$i++) 
                    {
                      $k=$i+1;
                                         
                                ?>

                      <div class="col-6 col-lg-2">
                        <a href="<?php echo $qsucurl[$i]?>"> 
                          <div class="nf-quick-block nf-q-color-<?php echo $k?>">
                           <?php echo $qsuc[$i]?>
                          </div>
                        </a>
                        </div>

                      <?php 
                      }
                    ?>
            </div>
          </div>
        <?php }?>
        </div>
      </div>
</div>
</div>
</div>
</div>
<div class="nf-circle-bg-img">
<div class="container">
<div class="row">
<img src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/circle-bg.jpg" alt="background image" class="img-fluid">
</div>
</div>
</div>
<?php }?>
<!-- End Study tour in north section  -->
<!-- footer start -->   
<?php get_footer(); ?>