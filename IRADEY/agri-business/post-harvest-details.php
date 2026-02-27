<?php /*Template Name: Post Harvest Details */
/* Template Post Type: post_harvest */ ?>
<?php 
if($_POST['post_harvest_new']=='')
{  
      //wp_redirect(site_url('post-harvest'));
      //exit; 
}
get_header(); 

$record=0;

if($_POST['post_harvest_new']!=''){
          $blog_args = array(
                            'post_type' => 'post_harvest',
                            'post_status' => 'publish',
                            'title' =>$_POST['post_harvest_new'],
                            'posts_per_page' => '1'
                            
                             );
}
else
{
          $current_slug = add_query_arg( array(), $wp->request );
          $current_slug = explode('/',$current_slug);
          $the_slug = end($current_slug);
          $type = $current_slug[count($current_slug) - 2];

          $blog_args = array(
                            'post_type' => 'post_harvest',
                            'post_status' => 'publish',
                            'name' =>$the_slug,
                            'posts_per_page' => '1'
                            
                             );
}
    

      $blog_posts = new WP_Query($blog_args);
        //echo "<pre>";
        //print_r($blog_posts);


while($blog_posts->have_posts()) {
                $blog_posts->the_post(); 

                $values= get_fields();
                
                if($values)
                {
                   //print_r($values); 
                    $post_harvest_type=$values['post_harvest_type'];
                    $banner_image=$values['banner_image'];
                    $capacity=$values['capacity'];
                    $final_products_1=$values['final_products_1'];
                    $final_products_2=$values['final_products_2'];
                    
                    $infrastructure_required=$values['infrastructure_required'];
                    $plot=$values['infrastructure_required']['plot'];
                    $shed=$values['infrastructure_required']['shed'];
                    $power=$values['infrastructure_required']['power'];
                    $water=$values['infrastructure_required']['water'];
                    $plan_and_machinery_required=$values['plan_and_machinery_required'];
                    $employment_generation=$values['employment_generation'];
                    $direct=$values['employment_generation']['direct'];
                    $indirect=$values['employment_generation']['indirect'];
                    $cost_of_sale_or_either=$values['cost_of_sale_or_either'];
                    $cost_of_sale_or_either_1=$values['cost_of_sale_or_either']['cost_of_sale_or_either_1'];
                    $cost_of_sale_or_either_2=$values['cost_of_sale_or_either']['cost_of_sale_or_either_2'];
                    $cost_of_sale_or_either_3=$values['cost_of_sale_or_either']['cost_of_sale_or_either_3'];
                    $cost_of_sale_or_either_4=$values['cost_of_sale_or_either']['cost_of_sale_or_either_4'];
                    $target_sales_revenue_300_days_pa_8_hours_shift=$values['target_sales_revenue_300_days_pa_8_hours_shift'];
                    $target_sales_revenue_300_days_pa_8_hours_shift_1=$values['target_sales_revenue_300_days_pa_8_hours_shift']['target_sales_revenue_300_days_pa_8_hours_shift_1'];
                    $target_sales_revenue_300_days_pa_8_hours_shift_2=$values['target_sales_revenue_300_days_pa_8_hours_shift']['target_sales_revenue_300_days_pa_8_hours_shift_2'];
                    $target_sales_revenue_300_days_pa_8_hours_shift_3=$values['target_sales_revenue_300_days_pa_8_hours_shift']['target_sales_revenue_300_days_pa_8_hours_shift_3'];
                    $target_sales_revenue_300_days_pa_8_hours_shift_4=$values['target_sales_revenue_300_days_pa_8_hours_shift']['target_sales_revenue_300_days_pa_8_hours_shift_4'];

                    //$explore_raw_material=$values['explore_raw_material'];

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


                     if($key=='plan_and_machinery_required')
                      { $plan_and_machinery_required = $value; } 

 

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


                    
                }

?>
<!-- header-end -->
<!-- inner-banner-start -->
<div class="inner-banner">
<div class="container">
<div class="banner-title">
  <h3><?php echo $blog_posts->posts[0]->post_title;?><a href="#" class="changeTopic" data-toggle="collapse" data-target="#changeTopic">Change Topic</a></h3>
  <ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Entrepreneurship </a></li>
    <li class="breadcrumb-item"><a href="#"> Know your Business </a></li>
    <li class="breadcrumb-item"><a href="#">Agri Business </a></li>
    <li class="breadcrumb-item"><a href="#">Post Harvest & Primary Processing</a></li>
    <li class="breadcrumb-item"><a href="#"><?php echo $post_harvest_type?></a></li>
    <li class="breadcrumb-item active"><?php echo $blog_posts->posts[0]->post_title;?> </a></li>
    
  </ul>
</div>

  <div class="chagetopic-modal changeTopic-collapse">
          <div class="collapse " id="changeTopic" style="">
            <a href="#" id="changeTopic_close"><i class="fa fa-close"></i></a>
            <div class="card card-body">
              <div class="row">
                
                  <div class="col-md-6">
                  <h4>Select topic</h4>
                  <?php if ($post_harvest_type=='Handling & Logistics') { ?>
                    <ul>
                                  
                                    
                                  
                                <li><a href="<?php echo site_url()?>/post_harvest/refrigerated-van/">Refrigerated Van</a></li>
                                <li><a href="<?php echo site_url()?>/post_harvest/insulated-van/"> Insulated Van</a></li>
                                <li><a href="<?php echo site_url()?>/post_harvest/specialised-vandf-transportation-vehicles/"> Specialised V&F Transportation Vehicles</a></li>
                                <li><a href="<?php echo site_url()?>/post_harvest/material-loading-and-handling-conveyors/">Material Loading and Handling Conveyors</a></li>
                 </ul>
               <?php  } ?>

               <?php if ($post_harvest_type=='Storage') { ?>
                    <ul>
                                <li><a href="<?php echo site_url()?>/post_harvest/dry-warehouse/">Dry Warehouse</a></li>
                                <li><a href="<?php echo site_url()?>/post_harvest/cold-room/"> Cold Room</a></li>
                                <li><a href="<?php echo site_url()?>/post_harvest/multi-chamber-multi-temperature-cold-store/">Multi Chamber Multi Temperature Cold Store</a></li>
                                <li><a href="<?php echo site_url()?>/post_harvest/controlled-atmosphere-cold-store/">Controlled Atmosphere Cold Store</a></li>
                                <li><a href="<?php echo site_url()?>/post_harvest/modified-atmospheric-cold-store/">Modified Atmospheric Cold Store</a></li>
                 </ul>
               <?php  } ?>

                <?php if ($post_harvest_type=='Preservation') { ?>
                    <ul>
                                <li><a href="<?php echo site_url()?>/post_harvest/blast-freezing/">Blast Freezing</a></li>
                                <li><a href="<?php echo site_url()?>/post_harvest/iqf/"> IQF</a></li>
                                <li><a href="<?php echo site_url()?>/post_harvest/hot-air-drying/">Hot Air Drying</a></li>
                                <li><a href="<?php echo site_url()?>/post_harvest/batch-drying/">Batch Drying</a></li>
                                <li><a href="<?php echo site_url()?>/post_harvest/continuous-drying/">Continuous Drying</a></li>
                                <li><a href="<?php echo site_url()?>/post_harvest/freezing-drying/">Freezing Drying</a></li>
                                <li><a href="<?php echo site_url()?>/post_harvest/spraying-drying/">Spraying Drying</a></li>
                                <li><a href="<?php echo site_url()?>/post_harvest/canning/">Canning</a></li>
                                
                                
                 </ul>
               <?php  } ?>

               <?php if ($post_harvest_type=='Primary Processing') { ?>
                    <ul>
                                <li><a href="<?php echo site_url()?>/post_harvest/rice-mill/">Rice Mill</a></li>
                                <li><a href="<?php echo site_url()?>/post_harvest/roller-flour-mill/"> Roller Flour Mill</a></li>
                                <li><a href="<?php echo site_url()?>/post_harvest/dal-mill/"> Dal Mill</a></li>
                 </ul>
               <?php  } ?>

                </div>
                    
              </div>
            </div>
          </div>
        </div>

<div class="banner-content">
  <div class="row">
    <div class="col-md-4 banner-img pr-0"><img src="<?php echo $banner_image; ?>" alt="post_harvest"></div>
    <div class="col-md-8  pl-0">
      <div class="bannerbg nf-gradient-4 justify-content-start pt-3 nf-height-100">
        <!-- <h4 class="nf-f-size-24"><?php echo $blog_posts->posts[0]->post_title;?></h4> -->
        <h5><?php echo $blog_posts->posts[0]->post_content;?></h5>
        
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
          <img src="<?php echo $raw_material_input_1_image; ?>" alt="seed">
          <span><?php echo $raw_material_input_1; ?></span>
        </div>
      </div>
    </div>
    <?php }?>
    <?php if($raw_material_input_2!=''){?>
    <div class="col-12 col-lg-2">
      <div class="nf-select-wrap nf-raw-wrap">
        <div class="nf-select-img">
          <img src="<?php echo $raw_material_input_2_image; ?>" alt="seed">
          <span><?php echo $raw_material_input_2; ?></span>
        </div>
      </div>
    </div>
    <?php }?>
    <?php if($raw_material_input_3!=''){?>
    <div class="col-12 col-lg-2">
      <div class="nf-select-wrap nf-raw-wrap">
        <div class="nf-select-img">
          <img src="<?php echo $raw_material_input_3_image; ?>" alt="seed">
          <span><?php echo $raw_material_input_3; ?></span>
        </div>
      </div>
    </div>
    <?php }?>
    <?php if($raw_material_input_4!=''){?>
    <div class="col-12 col-lg-2">
      <div class="nf-select-wrap nf-raw-wrap">
        <div class="nf-select-img">
          <img src="<?php echo $raw_material_input_4_image; ?>" alt="seed">
          <span><?php echo $raw_material_input_4; ?></span>
        </div>
      </div>
    </div>
    <?php }?>
    <?php if($raw_material_input_5!=''){?>
    <div class="col-12 col-lg-2">
      <div class="nf-select-wrap nf-raw-wrap">
        <div class="nf-select-img">
          <img src="<?php echo $raw_material_input_5_image; ?>" alt="seed">
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
            <img src="<?php echo $target_process_1_image; ?>" alt="process-1">
            <span><?php echo $target_process_1; ?></span>
          </div>
        <?php }?>
        <?php if($target_process_2!=''){?>
          <div class="nf-pro-img-block">
            <img src="<?php echo $target_process_2_image; ?>" alt="process-1">
            <span><?php echo $target_process_2; ?></span>
          </div>
          <?php }?>
        <?php if($target_process_3!=''){?>
          <div class="nf-pro-img-block">
            <img src="<?php echo $target_process_3_image; ?>" alt="process-1">
            <span><?php echo $target_process_3; ?></span>
          </div>
          <?php }?>
        <?php if($target_process_4!=''){?>
          <div class="nf-pro-img-block">
            <img src="<?php echo $target_process_4_image; ?>" alt="process-1">
            <span><?php echo $target_process_4; ?></span>
          </div>
          <?php }?>
        <?php if($target_process_5!=''){?>
          <div class="nf-pro-img-block">
            <img src="<?php echo $target_process_5_image; ?>" alt="process-1">
            <span><?php echo $target_process_5; ?></span>
          </div>
          <?php }?>
        <?php if($target_process_6!=''){?>
          <div class="nf-pro-img-block">
            <img src="<?php echo $target_process_6_image; ?>" alt="process-1">
            <span><?php echo $target_process_6; ?></span>
          </div>
          <?php }?>
        <?php if($target_process_7!=''){?>
          <div class="nf-pro-img-block">
            <img src="<?php echo $target_process_7_image; ?>" alt="process-1">
            <span><?php echo $target_process_7; ?></span>
          </div>
          <?php }?>
        </div>
      </div>
    </div>
  </div>
    <div class="row">
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
  </div>
 <div class="row">
    <div class="col-12">
      <div class="nf-product-block nf-infra-block">
        <h4 class="nf-f-size-20 nf-strong">Infrastructure Required</h4>
        <div class="row">
          <div class="col-12 col-lg-3">
            <div class="nf-capacity-block nf-sm-gradient-1">
              <img class="nf-p-img-1" src="<?php echo get_template_directory_uri(). '/assets/'?>img/turmeric-processing/icon-1.png" alt="icon-1.png">
              <span>Plot</span>
              <h2><?php echo $plot?></h2>
            </div>
          </div>
          <div class="col-12 col-lg-3">
            <div class="nf-capacity-block nf-sm-gradient-2">
              <img class="nf-p-img-2" src="<?php echo get_template_directory_uri(). '/assets/'?>img/turmeric-processing/icon-2.png" alt="icon-2.png">
              <span>Shed</span>
              <h2><?php echo $shed?></h2>
            </div>
          </div>
          <div class="col-12 col-lg-3">
            <div class="nf-capacity-block nf-sm-gradient-3">
              <img class="nf-p-img-3" src="<?php echo get_template_directory_uri(). '/assets/'?>img/turmeric-processing/icon-3.png" alt="icon-3.png">
              <span>Power</span>
              <h2><?php echo $power?></h2>
            </div>
          </div>
          <div class="col-12 col-lg-3">
            <div class="nf-capacity-block nf-sm-gradient-4">
              <img class="nf-p-img-4" src="<?php echo get_template_directory_uri(). '/assets/'?>img/turmeric-processing/icon-4.png" alt="icon-4.png">
              <span>Water</span>
              <h2><?php echo $water?></h2>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    
    <div class="col-12">
      <div class="nf-product-block nf-plan-block">
        <h4 class="nf-f-size-20 nf-strong">Plan and Machinery Required  </h4>
       <div class="nf-plan-listing">
          <?php if(!empty($plan_and_machinery_required)){
            $plan_and_machinery = explode(',',$plan_and_machinery_required);
            $k=$j=0;
            foreach ($plan_and_machinery as $key => $value) {
              $k++; $j++; 
              if($k==11) $k=1;
          ?>
         <h5><span class="nf-ico-color-<?php echo $k;?>"><?php echo $j; ?></span><?php echo  $value ; ?> </h5>
    <?php 
        }
      }?>
       </div>
      </div>
    </div>
  </div>


    <div class="row">
    <div class="col-12">
      <div class="nf-product-block nf-plan-block">
        <h4 class="nf-f-size-20 nf-strong">Plant and Machinery Cost  </h4>
        <div class="nf-table-wrap">
          <div class="table-responsive">
            <table class="table">
              <thead>
                <th>Details</th>
                <th>In INR in Lakhs</th>
                <!--<th>In USD</th>-->
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
                          $pcost3 = explode('*****',$pcost3);

                          for($i=0;$i<count($pcost1);$i++) 
                          {
                        ?>
                    
                      <tr>
                        <td><?php echo $pcost1[$i]?></td>
                        <td><?php echo $pcost2[$i]?></td>
                        <!--<td><?php //echo $pcost3[$i]?></td>-->
                      </tr>
                      <?php 
                      if(is_numeric($pcost2[$i]))
                      $tot1 = $tot1 + $pcost2[$i];
                      if(is_numeric($pcost3[$i]))
                      $tot2 = $tot2 + $pcost3[$i];
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
                        <!--<td><?php //echo $tot2;?></td>-->
                      </tr>
                    </tfoot>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="nf-employment-block">
        <div class="nf-capacity-block nf-gradient-1">
          <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/turmeric-processing/capacity.png" alt="capacity">
          <span>Employment Generation  </span>
          <h2><span> Direct: </span> <?php echo $direct?> </h2>
          <h2><span> Indirect: </span> <?php echo $indirect?> </h2>
        </div>
      </div>
    </div>
  </div>
   <div class="row">
    <div class="col-12">
      <div class="nf-product-block nf-plan-block">
        <h4 class="nf-f-size-20 nf-strong">Cost Of Sale or  Either </h4>
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
                  </div>
                
            </div>
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