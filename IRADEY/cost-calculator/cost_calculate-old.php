<?php /*Template Name: Cost Calculate-old */ ?>
<?php get_header(); 

$record=0;
$blog_args = array(
                            'post_type' => $_POST['cost_type'],
                            'post_status' => 'publish',
                            //'title' =>$_POST['crop'],
                            'posts_per_page' => '1',
                            'meta_query'     =>  array(
                                array(
                                    'key'     =>  'type',
                                    'value'   =>  $_POST['type']
                                    ),
                                array(
                                    'key'     =>  'sub_type',
                                    'value'   =>  $_POST['sub_type']
                                ),
                                array(
                                    'key'     =>  'polyculture_species',
                                    'value'   =>  $_POST['species']
                                ),
                                array(
                                    'key'     =>  'culture_system',
                                    'value'   =>  $_POST['culture_system']
                                ),
                                array(
                                    'key'     =>  'culture_medium',
                                    'value'   =>  $_POST['culture_medium']
                                )
                              )
                            );
$blog_posts = new WP_Query($blog_args);
?>
    <!-- slider-start -->  
    <!-- inner-banner-start -->
  <div class="inner-banner">
    <div class="container">
      <div class="banner-title">
        <h3>Farm Cost Calcuator</h3>
        <ul class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Resources</a></li>
          <li class="breadcrumb-item"><a href="#">Farm Cost Calcuator</a></li>
          <li class="breadcrumb-item active">Fishery</li>
        </ul>
      </div>

      <div class="banner-content">
        <div class="row">
          <div class="col-md-4 banner-img pr-0"><img src="<?php echo get_template_directory_uri(). '/assets/'?>img/home/compare-fibre.png"></div>
          <div class="col-md-8  pl-0">
            <div class="bannerbg nf-gradient-1 justify-content-start pt-3 nf-height-100 nf-fcc">
              <h4 class="nf-f-size-24"><img src="<?php echo get_template_directory_uri(). '/assets/'?>img/home/calendar.png" alt="calendar"> Farm Cost Calcuator</h4>
              <h5>Brief about Study Abroad </h5>
              <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/layers-bg.png" alt="layers background" class="nf-layes-bg">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- inner-banner-end -->
  <!-- Study tour in north section  -->
  <form method="post" id="form_id" action="<?php echo site_url()?>/cost-calculate-details">
  <div class="inner-body">
    <div class="container">
      <div class="national-level icon-text-box">
               <div class="row mb-2">
          <div class="col-md-8">
            <h4 class="nf-f-size-20 nf-strong">Select the Farm </h4>
          </div>
        </div>
         
          <div class="row">
            <div class="col-12 col-md-6 col-xl-3">
              <div class="nf-radio-wrap">
              <div class="custom-control custom-radio custom-control-inline pl-0 nf-radio-full">
                <input type="radio" id="customRadioInline1" name="cost_type" class="custom-control-input" checked="" value="polyculture_calc">
                <label class="custom-control-label" for="customRadioInline1">
                  <span><img src="<?php echo get_template_directory_uri(). '/assets/'?>img/home/fish-icon.jpg"></span> 
                  Fishery
                </label>
              </div>
            </div>
            </div>
            <div class="col-12 col-md-6 col-xl-3">
              <div class="nf-radio-wrap">
              <div class="custom-control custom-radio custom-control-inline pl-0 nf-radio-full nf-radio-full-2">
                <input type="radio" id="customRadioInline2" name="cost_type" class="custom-control-input" disabled="" value="horticulture_farm">
                <label class="custom-control-label" for="customRadioInline2">
                  <span><img src="<?php echo get_template_directory_uri(). '/assets/'?>img/home/flower.png"></span> 
                  Horticulture
                </label>
              </div>
            </div>
            </div>
            <div class="col-12 col-md-6 col-xl-3">
              <div class="nf-radio-wrap">
              <div class="custom-control custom-radio custom-control-inline pl-0 nf-radio-full nf-radio-full-3">
                <input type="radio" id="customRadioInline3" name="cost_type" class="custom-control-input" disabled="" value="animal_husbandry_farm">
                <label class="custom-control-label" for="customRadioInline3">
                  <span><img src="<?php echo get_template_directory_uri(). '/assets/'?>img/home/animal.png"></span> 
                  Animal Husbandry
                </label>
              </div>
            </div>
            </div>
          </div>
        
        <div class="row mb-2">
          <div class="col-md-12">
            <h4 class="nf-f-size-20 nf-strong nf-top-brdr">Select Career Options</h4>
          </div>
        </div>

        <div class="nf-form-wrap">
          <div class="row">

        <div class="col-12 col-md-6 col-xl-3">
              <label>Type</label>
              <div class="nf-select-wrap nf-pl-30">
                <div class="nf-select-img">
                  <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/home/fish-1.png" alt="fish-1">
                  <span>Type </span>
                </div>
                <div class="nf-select-field">
                  <?php 
                    $var = get_field_object('field_610ba2e93d7ae');
                    $j=0;
                    ?>
                    <select class="form-control selectpicker" name="type" id="type">
                   
                     <option value="">Select</option>
                      
                      <?php
                     foreach($var['choices'] as $choice)
                      {
                        if($choice==$_POST['type']) $sel='selected'; else $sel='';
                        if($j==0) $selz='disabled'; else $selz='';
                       echo '<option '.$sel.' '.$selz.' value="'.$choice.'">'.$choice.'</option>';
                       $j++;
                      }
                      ?>
                    </select>

                </div>
              </div>
              <span id="error_msg5" style="color: red;"></span>
            </div>
            <div class="col-12 col-md-6 col-xl-3" id="sub_type_id">
              <label>Sub Type</label>
              <div class="nf-select-wrap nf-pl-30">
                <div class="nf-select-img">
                  <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/home/fish-1.png" alt="fish-1">
                  <span>Sub Type </span>
                </div>
                <div class="nf-select-field">
                  <?php 
                    $var = get_field_object('field_610ba3883d7af');
                    ?>
                    <select class="form-control selectpicker" name="sub_type" id="sub_type">
                   
                     <option value="">Select</option>
                      
                      <?php
                     foreach($var['choices'] as $choice)
                      {
                        if($choice==$_POST['sub_type']) $sel='selected'; else $sel='';
                       echo '<option '.$sel.' value="'.$choice.'">'.$choice.'</option>';
                      }
                      ?>
                    </select>

                </div>
              </div>
              <span id="error_msg6" style="color: red;"></span>
            </div>
          </div>
        </div>


        <div class="nf-form-wrap">
          <div class="row">
            <div class="col-12 col-md-6 col-xl-3">
               <label>Step 1</label>
              <div class="nf-select-wrap nf-pl-30">
                <div class="nf-select-img">
                  <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/home/wave.png" alt="wave">
                  <span>Water Areas (in Ha)</span>
                </div>
                <div class="nf-select-field">
                  <input type="number" step="0.1" min=0 name="water_area" id="water_area" value="<?php echo $_POST['water_area'];?>" class="form-control selectpicker">
                </div>
              </div>
              <span id="error_msg1" style="color: red;"></span>
            </div>
            <div class="col-12 col-md-6 col-xl-3">
              <label>Step 2</label>
              <div class="nf-select-wrap nf-pl-30">
                <div class="nf-select-img">
                  <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/home/fish-1.png" alt="fish-1">
                  <span>Species </span>
                </div>
                <div class="nf-select-field">
                  <?php 
                    $var = get_field_object('field_610ba4203d7b1');
                    ?>
                    <select class="form-control selectpicker" name="species" id="species">
                   
                     <option value="">Select</option>
                      
                      <?php
                     foreach($var['choices'] as $choice)
                      {
                        if($choice==$_POST['species']) $sel='selected'; else $sel='';
                       echo '<option '.$sel.' value="'.$choice.'">'.$choice.'</option>';
                      }
                      ?>
                    </select>

                </div>
              </div>
              <span id="error_msg2" style="color: red;"></span>
            </div>

            <div class="col-12 col-md-6 col-xl-3">
               <label>Step 3</label>
              <div class="nf-select-wrap nf-pl-30">
                <div class="nf-select-img">
                  <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/home/fish-1.png" alt="fish-1">
                  <span>Culture System </span>
                </div>
                <div class="nf-select-field">
                 
                  <?php 
                    $var = get_field_object('field_610ba42a3d7b2');
                    ?>
                    <select class="form-control selectpicker" name="culture_system" id="culture_system">
                   
                     <option value="">Select</option>
                      
                      <?php
                     foreach($var['choices'] as $choice)
                      {
                        if($choice==$_POST['culture_system']) $sel='selected'; else $sel='';
                       echo '<option '.$sel.' value="'.$choice.'">'.$choice.'</option>';
                      }
                      ?>
                    </select>
                </div>
              </div>
              <span id="error_msg3" style="color: red;"></span>
            </div>
            <div class="col-12 col-md-6 col-xl-3">
               <label>Step 4</label>
              <div class="nf-select-wrap nf-pl-30">
                <div class="nf-select-img">
                  <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/home/fish-1.png" alt="fish-1">
                  <span>Culture Medium </span>
                </div>
                <div class="nf-select-field">
                 
                  <?php 
                    $var = get_field_object('field_610ba4de3d7b3');
                    ?>
                    <select class="form-control selectpicker" name="culture_medium" id="culture_medium">
                   
                     <option value="">Select</option>
                      
                      <?php
                     foreach($var['choices'] as $choice)
                      {
                        if($choice==$_POST['culture_medium']) $sel='selected'; else $sel='';
                       echo '<option '.$sel.' value="'.$choice.'">'.$choice.'</option>';
                      }
                      ?>
                    </select>
                </div>
              </div>
              <span id="error_msg4" style="color: red;"></span>
            </div>
          </div>

          <div class="row mb-2">
            <div class="col-12 nf-button-wrapper">
              <button type="submit" class="nf-button-v-small" onclick="return validation_function()">Calculate Now</button>
            </div>
          </div>
        </div>

        <div class="row mb-2">
          <div class="col-md-12">
            <h4 class="nf-f-size-20 nf-strong nf-title_1">Know Your Farm Costing <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/home/job.png"> </h4>
          </div>
        </div>
        <div class="row mb-2">
             <div class="col-12">
              <div class="nf-wave-block">
               <div class="col-12 row justify-content-md-between">
                 <div class="">
                   <div class="nf-wave-inner-wrap">
                     <h4><img src="<?php echo get_template_directory_uri(). '/assets/'?>img/home/wave-white.png" alt="wave-white"> Water areas in HA <strong><?php echo $_POST['water_area']?> </strong></h4>
                   </div>
                 </div>
                 <div class="">
                   <div class="nf-wave-inner-wrap">
                     <h4><img src="<?php echo get_template_directory_uri(). '/assets/'?>img/home/fish-blue.png" alt="fish-blue"> Species <span><?php echo $_POST['species']?> </span></h4>
                   </div>
                 </div>
                  <div class="">
                   <div class="nf-wave-inner-wrap">
                     <h4><img src="<?php echo get_template_directory_uri(). '/assets/'?>img/home/fish-blue.png" alt="fish-blue"> Culture System <span><?php echo $_POST['culture_system']?> </span></h4>
                   </div>
                 </div>
                  <div class="">
                   <div class="nf-wave-inner-wrap">
                     <h4><img src="<?php echo get_template_directory_uri(). '/assets/'?>img/home/fish-blue.png" alt="fish-blue"> Culture Medium <span><?php echo $_POST['culture_medium']?> </span></h4>
                   </div>
                 </div>
               </div>
             </div>
             </div>
           </div>

        <?php
        while($blog_posts->have_posts()) {
                $blog_posts->the_post(); 

                $values= get_fields();
                
                if($values)
                {
                    /*$horticulture_type='';
                    
                    foreach($values as $key => $value)
                    {
                        if($key=='horticulture_type'){ $horticulture_type = $value; }
                    }*/

                    //CAPITAL COST
                    $pond_area_own_land = $values['pond_area_own_land'];
                    $pond_construction_pre_assumption = $values['pond_construction']['pre_assumption'];
                    $pond_construction_first_amount = $values['pond_construction']['first_amount'];
                    $pond_construction_second_amount = $values['pond_construction']['second_amount'];
                    $pond_construction_tot = $pond_construction_first_amount*$pond_construction_second_amount*$_POST['water_area'];

                    $boring_4_inch_pre_assumption = $values['boring_4_inch']['pre_assumption'];
                    $boring_4_inch_amount = $values['boring_4_inch']['amount'];
                    $boring_4_inch_tot = $boring_4_inch_amount*$_POST['water_area'];

                    $toilet_pre_assumption = $values['farm_house_and_store_house_bathroom_toilet']['pre_assumption'];
                    $toilet_first_amount = $values['farm_house_and_store_house_bathroom_toilet']['first_amount'];
                    $toilet_second_amount = $values['farm_house_and_store_house_bathroom_toilet']['second_amount'];
                    $toilet_tot = ($toilet_first_amount+$toilet_second_amount)*$_POST['water_area'];

                    $tube_well_pre_assumption = $values['tube_well']['pre_assumption'];
                    $tube_well_amount = $values['tube_well']['amount'];
                    $tube_well_tot = $tube_well_amount*$_POST['water_area'];

                    $net_pre_assumption = $values['net']['pre_assumption'];
                    $net_amount = $values['net']['amount'];
                    $net_tot = $net_amount*$_POST['water_area'];

                    $boat_cost_pre_assumption = $values['boat_cost']['pre_assumption'];
                    $boat_cost_amount = $values['boat_cost']['amount'];
                    $boat_cost_tot = $boat_cost_amount*$_POST['water_area'];

                    $pump_pre_assumption = $values['pump']['pre_assumption'];
                    $pump_amount = $values['pump']['amount'];
                    $pump_tot = $pump_amount*$_POST['water_area'];

                    $miscellenous_pre_assumption = $values['miscellenous']['pre_assumption'];
                    $miscellenous_amount = $values['miscellenous']['amount'];
                    $miscellenous_tot = $miscellenous_amount*$_POST['water_area'];

                    $capital_cost=$pond_area_own_land+$pond_construction_tot+$boring_4_inch_tot+$toilet_tot+$tube_well_tot+$net_tot+$boat_cost_tot+$pump_tot+$miscellenous_tot;

                    //RECURRING COST
                    $fingerling_cost_pre_assumption = $values['fingerling_cost']['pre_assumption'];
                    $fingerling_cost_first_amount = $values['fingerling_cost']['first_amount'];
                    $fingerling_cost_second_amount = $values['fingerling_cost']['second_amount'];
                    $fingerling_cost_tot = $fingerling_cost_first_amount*$fingerling_cost_second_amount*$_POST['water_area'];

                    $feed_cost_10_mt_pre_assumption = $values['feed_cost_10_mt']['pre_assumption'];
                    $feed_cost_10_mt_first_amount = $values['feed_cost_10_mt']['first_amount'];
                    $feed_cost_10_mt_second_amount = $values['feed_cost_10_mt']['second_amount'];
                    $feed_cost_10_mt_tot = $feed_cost_10_mt_first_amount*$feed_cost_10_mt_second_amount*$_POST['water_area'];

                    $feed_cost_7mt_pre_assumption = $values['feed_cost_7mt']['pre_assumption'];
                    $feed_cost_7mt_first_amount = $values['feed_cost_7mt']['first_amount'];
                    $feed_cost_7mt_second_amount = $values['feed_cost_7mt']['second_amount'];
                    $feed_cost_7mt_tot = $feed_cost_7mt_first_amount*$feed_cost_7mt_second_amount*$_POST['water_area'];

                    $labour_cost_pre_assumption = $values['labour_cost']['pre_assumption'];
                    $labour_cost_amount = $values['labour_cost']['amount'];
                    $labour_cost_tot = $labour_cost_amount*$_POST['water_area'];


                    $healthcare_products_cost_pre_assumption = $values['healthcare_products_cost']['pre_assumption'];
                    $healthcare_products_cost_first_amount = $values['healthcare_products_cost']['first_amount'];
                    $healthcare_products_cost_second_amount = $values['healthcare_products_cost']['second_amount'];
                    $healthcare_products_cost_tot = $healthcare_products_cost_first_amount*$healthcare_products_cost_second_amount*$_POST['water_area'];

                    $harvesting_cost_pre_assumption = $values['harvesting_cost']['pre_assumption'];
                    $harvesting_cost_first_amount = $values['harvesting_cost']['first_amount'];
                    $harvesting_cost_second_amount = $values['harvesting_cost']['second_amount'];
                    $harvesting_cost_tot = $harvesting_cost_first_amount*$harvesting_cost_second_amount*$_POST['water_area'];

                    $management_cost_pre_assumption = $values['management_cost']['pre_assumption'];
                    $management_cost_first_amount = $values['management_cost']['first_amount'];
                    $management_cost_second_amount = $values['management_cost']['second_amount'];
                    $management_cost_tot = $management_cost_first_amount*$management_cost_second_amount*$_POST['water_area'];

                    $electricity_cost_pre_assumption = $values['miscellaenous_cost_including_electricity_cost']['pre_assumption'];
                    $electricity_cost_first_amount = $values['miscellaenous_cost_including_electricity_cost']['first_amount'];
                    $electricity_cost_second_amount = $values['miscellaenous_cost_including_electricity_cost']['second_amount'];
                    $electricity_cost_tot = $electricity_cost_first_amount*$electricity_cost_second_amount*$_POST['water_area'];

                    $food_cost_for_one_manpower_pre_assumption = $values['food_cost_for_one_manpower']['pre_assumption'];
                    $food_cost_for_one_manpower_first_amount = $values['food_cost_for_one_manpower']['first_amount'];
                    $food_cost_for_one_manpower_second_amount = $values['food_cost_for_one_manpower']['second_amount'];
                    $food_cost_for_one_manpower_tot = $food_cost_for_one_manpower_first_amount*$food_cost_for_one_manpower_second_amount*$_POST['water_area'];

                    $recurring_cost =$fingerling_cost_tot+ $feed_cost_10_mt_tot+$feed_cost_7mt_tot+$labour_cost_tot+$healthcare_products_cost_tot+$harvesting_cost_tot+$management_cost_tot+$electricity_cost_tot+$food_cost_for_one_manpower_tot;

                    //Income
                    $by_selling_pre_assumption = $values['by_selling']['pre_assumption'];
                    $by_selling_first_amount = $values['by_selling']['first_amount'];
                    $by_selling_second_amount = $values['by_selling']['second_amount'];
                    $by_selling_tot = $by_selling_first_amount*$by_selling_second_amount*$_POST['water_area'];

                    $by_selling_vegetables_pre_assumption = $values['by_selling_vegetables']['pre_assumption'];
                    $by_selling_vegetables_first_amount = $values['by_selling_vegetables']['first_amount'];
                    $by_selling_vegetables_second_amount = $values['by_selling_vegetables']['second_amount'];
                    $by_selling_vegetables_tot = $by_selling_vegetables_first_amount*$by_selling_vegetables_second_amount*$_POST['water_area'];

                    $by_selling_feed_bags_pre_assumption = $values['by_selling_feed_bags']['pre_assumption'];
                    $by_selling_feed_bags_first_amount = $values['by_selling_feed_bags']['first_amount'];
                    $by_selling_feed_bags_second_amount = $values['by_selling_feed_bags']['second_amount'];
                    $by_selling_feed_bags_tot = $by_selling_feed_bags_first_amount*$by_selling_feed_bags_second_amount*$_POST['water_area'];

                    $income_cost = $by_selling_tot+$by_selling_vegetables_tot+$by_selling_feed_bags_tot;



                }
            $record++;

        ?>
           
        <div class="row">
          <div class="col-12">
            <div class="nf-product-block nf-plan-block">
              <div class="nf-cost-list nf-cost-list-2">
                <div class="row">
                  <div class="col-12 col-md-3">
                  <h5>Capital Investment </h5>
                                <h2 class="nf-orange-block"><?php echo $capital_cost;?></h2>
                </div>
                  <div class="col-12 col-md-3">
                  <h5>Recurring Cost </h5>
                                <h2 class="nf-green-block"><?php echo $recurring_cost;?></h2>
                </div>
                  <div class="col-12 col-md-3">
                  <h5>Income </h5>
                                <h2 class="nf-voilet-block"><?php echo $income_cost;?></h2>
                </div>
                  <div class="col-12 col-md-3">
                  <h5>Profit </h5>
                <h2 class="nf-pink-block"><?php echo $income_cost-$recurring_cost;?></h2>
             </div>
              </div>
              </div>
            </div>
          </div>
        </div>
          <div class="row nf-f-accordion">
            <div class="col-md-12 px-0">
              <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                <div class="row mx-0">
                  <div class="col-12 col-lg-4 mb-3 mb-lg-0">
                    <div class="panel panel-default">
                      <div class="panel-heading accordion_bg_10" role="tab" id="headingOne">
                        <h4 class="panel-title mb-0">
                          <a role="button" data-toggle="collapse" data-parent="#accordion" href="#projectcost" aria-expanded="true" aria-controls="projectcost">
                            Capital Investment  (In Lacs )
                          </a>
                        </h4>
                      </div>
                      <div id="projectcost" class="panel-collapse collapse show" role="tabpanel" aria-labelledby="headingOne">
                        <div class="panel-body">
                          <div class="table-responsive ">
                            <table class="table table_border_0 nf-strong-600">
                              <tbody>
                                <tr>
                                  <td>POND AREA - OWN LAND </td>
                                  <td align="right"><?php echo $pond_area_own_land;?></td>
                                </tr>
                                <tr>
                                  <td>POND CONSTRUCTION <?php echo $pond_construction_pre_assumption;?></td>
                                  <td align="right"><?php echo $pond_construction_tot;?></td>
                                </tr>
                                <tr>
                                  <td>BORING 4 INCH <?php echo $boring_4_inch_pre_assumption;?></td>
                                  <td align="right"><?php echo $boring_4_inch_tot;?></td>
                                </tr>
                                <tr>
                                  <td>FARM HOUSE AND STORE HOUSE, BATHROOM & TOILET <?php echo $toilet_pre_assumption;?></td>
                                  <td align="right"><?php echo $toilet_tot;?></td>
                                </tr>
                                <tr>
                                  <td>TUBE WELL <?php echo $tube_well_pre_assumption;?></td>
                                  <td align="right"><?php echo $tube_well_tot;?></td>
                                </tr>
                                <tr>
                                  <td>NET <?php echo $net_pre_assumption;?></td>
                                  <td align="right"><?php echo $net_tot;?></td>
                                </tr>
                                <tr>
                                  <td>BOAT COST <?php echo $boat_cost_pre_assumption;?></td>
                                  <td align="right"><?php echo $boat_cost_tot;?></td>
                                </tr>

                                <tr>
                                  <td>PUMP <?php echo $pump_pre_assumption;?></td>
                                  <td align="right"><?php echo $pump_tot;?></td>
                                </tr>
                                  <tr>
                                  <td>MISCELLENOUS <?php echo $miscellenous_pre_assumption;?></td>
                                  <td align="right"><?php echo $miscellenous_tot;?></td>
                                </tr>
                                  <!--<tr>
                                  <td>Miscelleneous</td>
                                  <td align="right">20000</td>
                                </tr>-->

                                <tr class="bg-gray nf-strong">
                                  <td>Total</td>
                                  <td align="right"><?php echo $capital_cost;?></td>
                                </tr>
                               
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-12 col-lg-4">
                    <div class="panel panel-default">
                      <div class="panel-heading accordion_bg_11" role="tab" id="headingTwo">
                        <h4 class="panel-title mb-0">
                          <a role="button" data-toggle="collapse" data-parent="#accordion" href="#finance" aria-expanded="false" aria-controls="finance">
                           Recurring Cost 
                          </a>
                        </h4>
                      </div>
                      <div id="finance" class="panel-collapse collapse show" role="tabpanel" aria-labelledby="headingTwo">
                        <div class="panel-body">
                          <div class="table-responsive">
                            <table class="table table_border_0 nf-strong-600">
                               <tbody>
                                <tr>
                                  <td>FINGERLING COST <?php echo $fingerling_cost_pre_assumption;?></td>
                                  <td align="right"><?php echo $fingerling_cost_tot;?></td>
                                </tr>
                                <tr>
                                  <td>FEED COST 10 MT <?php echo $feed_cost_10_mt_pre_assumption;?></td>
                                  <td align="right"><?php echo $feed_cost_10_mt_tot;?></td>
                                </tr>
                                <tr>
                                  <td>FEED COST 7 MT <?php echo $feed_cost_7mt_pre_assumption;?></td>
                                  <td align="right"><?php echo $feed_cost_7mt_tot;?></td>
                                </tr>
                                <tr>
                                  <td>LABOUR COST <?php echo $labour_cost_pre_assumption;?></td>
                                  <td align="right"><?php echo $labour_cost_tot;?></td>
                                </tr>
                                <tr>
                                  <td>HEALTHCARE PRODUCTS COST <?php echo $healthcare_products_cost_pre_assumption;?></td>
                                  <td align="right"><?php echo $healthcare_products_cost_tot;?></td>
                                </tr>
                              
                                <tr>
                                  <td>HARVESTING COST <?php echo $harvesting_cost_pre_assumption;?></td>
                                  <td align="right"><?php echo $harvesting_cost_tot;?></td>
                                </tr>

                                <tr>
                                  <td>MANAGEMENT COST <?php echo $management_cost_pre_assumption;?></td>
                                  <td align="right"><?php echo $management_cost_tot;?></td>
                                </tr>

                                <tr>
                                  <td>MISCELLAENOUS COST INCLUDING ELECTRICITY COST <?php echo $electricity_cost_pre_assumption;?></td>
                                  <td align="right"><?php echo $electricity_cost_tot;?></td>
                                </tr>
                                <tr>
                                  <td>FOOD COST FOR ONE MANPOWER <?php echo $food_cost_for_one_manpower_pre_assumption;?></td>
                                  <td align="right"><?php echo $food_cost_for_one_manpower_tot;?></td>
                                </tr>
                                 

                                <tr class="bg-gray nf-strong">
                                  <td>Total</td>
                                  <td align="right"><?php echo $recurring_cost;?></td>
                                </tr>
                               
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-12 col-lg-4">
                    <div class="panel panel-default">
                      <div class="panel-heading accordion_bg_12" role="tab" id="headingTwo">
                        <h4 class="panel-title mb-0">
                          <a role="button" data-toggle="collapse" data-parent="#accordion" href="#finance" aria-expanded="false" aria-controls="finance">
                           Income Statement & Profit
                          </a>
                        </h4>
                      </div>
                      <div id="finance" class="panel-collapse collapse show" role="tabpanel" aria-labelledby="headingTwo">
                        <div class="panel-body">
                          <div class="table-responsive">
                            <table class="table table_border_0 nf-strong-600">
                              <tbody>
                                <tr>
                                  <td>BY SELLING <?php echo $by_selling_pre_assumption;?></td>
                                  <td align="right"><?php echo $by_selling_tot;?></td>
                                </tr>
                                <tr>
                                  <td>BY SELLING VEGETABLES <?php echo $by_selling_vegetables_pre_assumption;?></td>
                                  <td align="right"><?php echo $by_selling_vegetables_tot;?></td>
                                </tr>
                                <tr>
                                  <td>BY SELLING FEED BAGS <?php echo $by_selling_feed_bags_pre_assumption;?></td>
                                  <td align="right"><?php echo $by_selling_feed_bags_tot;?></td>
                                </tr>
                                
                                <tr class="bg-gray nf-strong">
                                  <td>Total revenue</td>
                                  <td align="right"><?php echo $income_cost;?></td>
                                </tr>
                               
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
        <?php }
         if($record==0) echo 'Record Not Found';
        ?>
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
</form>
  <!-- End Study tour in north section  -->
 <!-- footer start -->   
<?php get_footer(); ?>
<script type="text/javascript">
document.body.scrollTop = 600;
document.documentElement.scrollTop = 600;


function validation_function()
{
      var error_msg1 = document.getElementById("error_msg1");
      var error_msg2 = document.getElementById("error_msg2");
      var error_msg3 = document.getElementById("error_msg3");
      var error_msg4 = document.getElementById("error_msg4");
      var error_msg5 = document.getElementById("error_msg5");
      var error_msg6 = document.getElementById("error_msg6");
     
      error_msg1.textContent = "";
      error_msg2.textContent = "";
      error_msg3.textContent = "";
      error_msg4.textContent = "";
      error_msg5.textContent = "";
      error_msg6.textContent = "";
     
      var flag=true;

      if($('#type').val()=='')
       {
           // alert('hjghj');
           error_msg5.textContent = "*Please select type ";
           flag= false;
       }
       if($('#sub_type').val()=='' && $('#type').val()=='Polyculture')
       {
           // alert('hjghj');
           error_msg6.textContent = "*Please select sub type ";
           flag= false;
       }

       if($('#water_area').val()=='')
       {
           // alert('hjghj');
           error_msg1.textContent = "*Please enter water areas ";
           flag= false;
       }
       if($('#species').val()=='')
       {
           // alert('hjghj');
           error_msg2.textContent = "*Please select species ";
           flag= false;
       }
       if($('#culture_system').val()=='')
       {
           // alert('hjghj');
           error_msg3.textContent = "*Please select culture system ";
           flag= false;
       }
       if($('#culture_medium').val()=='')
       {
           // alert('hjghj');
           error_msg4.textContent = "*Please select culture medium ";
           flag= false;
       }
       return flag;
}
$('#type').change(function(){

  if(this.value=='Polyculture')
  {
    $('#sub_type_id').show();
    $('.selectpicker').selectpicker('refresh');
  }
  else
  {
    $('#sub_type_id').hide();
    $('#sub_type').val('');
  }
});
</script>