<?php /*Template Name: Nursery Details */ 
/* Template Post Type: nursery */ ?>
<?php 
get_header(); 

$record=0;
if($_POST['nursery']!='')
{
  $blog_args = array(
    'post_type' => 'nursery',
    'post_status' => 'publish',
    'title' =>$_POST['nursery'],
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
    'post_type' => 'nursery',
    'post_status' => 'publish',
    'name' =>$the_slug,
    'posts_per_page' => '1'
  );
}


$blog_posts = new WP_Query($blog_args);
       // echo "<pre>";
       // print_r($blog_posts);


while($blog_posts->have_posts()) {
  $blog_posts->the_post(); 

  $values= get_fields();

  if($values)
  {

    $banner_image=$values['banner_image'];

    $final_products=$values['final_products'];

    $variety_of_plants=$values['variety_of_plants'];

    $soil_type = $values['soil_type'];
    $pesticides_fertilizer_and_manure = $values['pesticides_fertilizer_and_manure'];

    $cropname1 = $values['total_yearly_production_1st_year']['crop_1_name'];
    $cropname2 = $values['total_yearly_production_1st_year']['crop_2_name'];
    $cropname3 = $values['total_yearly_production_1st_year']['crop_3_name'];
    $cropname4 = $values['total_yearly_production_1st_year']['crop_4_name'];
    $cropname5 = $values['total_yearly_production_1st_year']['crop_5_name'];
    $cropvalue1 = $values['total_yearly_production_1st_year']['crop_1_value'];
    $cropvalue2 = $values['total_yearly_production_1st_year']['crop_2_value'];
    $cropvalue3 = $values['total_yearly_production_1st_year']['crop_3_value'];
    $cropvalue4 = $values['total_yearly_production_1st_year']['crop_4_value'];
    $cropvalue5 = $values['total_yearly_production_1st_year']['crop_5_value'];

    $envcropname1 = $values['environment']['crop_1_name'];
    $envcropname2 = $values['environment']['crop_2_name'];
    $envcropname3 = $values['environment']['crop_3_name'];
    $envcropname4 = $values['environment']['crop_4_name'];
    $envcropname5 = $values['environment']['crop_5_name'];
    $envcropvalue1 = $values['environment']['crop_1_value'];
    $envcropvalue2 = $values['environment']['crop_2_value'];
    $envcropvalue3 = $values['environment']['crop_3_value'];
    $envcropvalue4 = $values['environment']['crop_4_value'];
    $envcropvalue5 = $values['environment']['crop_5_value'];

    $seasoncropname1 = $values['season']['crop_1_name'];
    $seasoncropname2 = $values['season']['crop_2_name'];
    $seasoncropname3 = $values['season']['crop_3_name'];
    $seasoncropname4 = $values['season']['crop_4_name'];
    $seasoncropname5 = $values['season']['crop_5_name'];
    $seasoncropvalue1 = $values['season']['crop_1_value'];
    $seasoncropvalue2 = $values['season']['crop_2_value'];
    $seasoncropvalue3 = $values['season']['crop_3_value'];
    $seasoncropvalue4 = $values['season']['crop_4_value'];
    $seasoncropvalue5 = $values['season']['crop_5_value'];



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

    $employment_generation=$values['employment_generation'];
    $employment_generation_heading1=$values['employment_generation']['heading_1'];
    $employment_generation_heading2=$values['employment_generation']['heading_2'];
    $employment_generation_heading3=$values['employment_generation']['heading_3'];
    $employment_generation_heading4=$values['employment_generation']['heading_4'];
    $employment_generation_heading5=$values['employment_generation']['heading_5'];
    $employment_generation_value1=$values['employment_generation']['value_1'];
    $employment_generation_value2=$values['employment_generation']['value_2'];
    $employment_generation_value3=$values['employment_generation']['value_3'];
    $employment_generation_value4=$values['employment_generation']['value_4'];
    $employment_generation_value5=$values['employment_generation']['value_5'];


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

    $view_complete_details=$values['view_complete_details'];
  }

  ?>
  <!-- header-end -->
  <!-- inner-banner-start -->
  <div class="inner-banner">
    <div class="container">
      <div class="banner-title">
        <h3><?php echo $blog_posts->posts[0]->post_title;?> <a href="#" class="changeTopic" data-toggle="collapse" data-target="#changeTopic" >Change Topic</a></h3>
        <ul class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Entrepreneurship</a></li>
          <li class="breadcrumb-item"><a href="#">Know your Business</a></li>
          <li class="breadcrumb-item"><a href="#">Agri-Business</a></li>
          <li class="breadcrumb-item"><a href="#">Production</a></li>
          <li class="breadcrumb-item"><a href="#">Nursery</a></li>
          <li class="breadcrumb-item active"><?php echo $blog_posts->posts[0]->post_title;?></li>
        </ul>
      </div>
      <div class="chagetopic-modal changeTopic-collapse">
        <div class="collapse " id="changeTopic" style="">
          <a href="#" id="changeTopic_close"><i class="fa fa-close"></i></a>
          <div class="card card-body">
            <h4>Categories</h4>
            <div class="row">
              <div class="col-md-6">
                <ul>
                  <li>
                    <a href="<?php echo site_url()?>/nursery/hi-tech-nursery">Hi-Tech Nursery</a>
                  </li>
                  <li>
                    <a class="box" href="<?php echo site_url()?>/nursery/vegetable-plant-nursery/">Vegetable Plant Nursery</a>
                  </li>
                  <li>
                    <a class="box" href="<?php echo site_url()?>/nursery/ornamental-plant-nursery/">Ornamental Plant Nursery</a>
                  </li>
                  <li>
                    <a class="box" href="<?php echo site_url()?>/nursery/map-nursery/">MAP Nursery</a>
                  </li>
                </ul>
              </div>

              <div class="col-md-6">
                <ul>
                  <li>
                    <a class="box" href="<?php echo site_url()?>/nursery/bamboo-nursery/">Bamboo Nursery</a>
                  </li>
                  <li>
                    <a class="box" href="<?php echo site_url()?>/nursery/forest-plant-nursery/">Forest Plant Nursery</a>
                  </li>
                  <li>
                    <a class="box" href="<?php echo site_url()?>/nursery/fruit-plant-nursery/">Fruit Plant Nursery</a>
                  </li>
                  <li>
                    <a class="box" href="<?php echo site_url()?>/nursery/agriculture-crop-nursery/">Agriculture Crop Nursery</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="banner-content">
        <div class="row">
          <div class="col-md-4 banner-img pr-0"><img src="<?php echo $banner_image?>"></div>
          <div class="col-md-8  pl-0">
            <div class="bannerbg nf-gradient-14 justify-content-start pt-3 nf-height-100">
              <h4 class="nf-f-size-24"><?php echo $blog_posts->posts[0]->post_title;?></h4>
              <h5><?php echo $blog_posts->posts[0]->post_content;?> </h5>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- inner-banner-end -->

  <!-- Study tour in north section  -->
  <div class="inner-body nursery-main">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="nf-product-block nf-plan-block pt-0 mt-0 border-0">
            <h4 class="nf-f-size-20 nf-strong">Variety of Plants</h4>
            <div class="nf-plan-listing">
              <?php
              $variety_of_plants = explode(',',$variety_of_plants);
              $i=0;
              foreach($variety_of_plants as $plant)
              {
                if($plant!=''){
                  $i++;
                  ?>

                  <h5><span class="nf-ico-color-<?php echo $i?>"><?php echo $i?></span> <?php echo $plant?></h5>
                <?php } }?>
              </div>
            </div>
          </div>
        </div>

        <div class="nf-nursery-production">
          <div class="nf-product-block mt-2">
            <h4 class="nf-f-size-20 nf-strong">Total Yearly Production (1st year)</h4>
            <div class="'table-responsive">
              <table class="table table-bordered">
                <thead>
                  <? if($cropname1!=''){?>
                    <th><?php echo $cropname1?></th>
                  <?php }?>
                  <? if($cropname2!=''){?>
                    <th><?php echo $cropname2?></th>
                  <?php }?>
                  <? if($cropname3!=''){?>
                    <th><?php echo $cropname3?></th>
                  <?php }?>
                  <? if($cropname4!=''){?>
                    <th><?php echo $cropname4?></th>
                  <?php }?>
                  <? if($cropname5!=''){?>
                    <th><?php echo $cropname5?></th>
                  <?php }?>
                </thead>
                <tbody>
                  <? if($cropvalue1!=''){?>
                    <td><?php echo $cropvalue1?></td>
                  <?php }?>
                  <? if($cropvalue2!=''){?>
                    <td><?php echo $cropvalue2?></td>
                  <?php }?>
                  <? if($cropvalue3!=''){?>
                    <td><?php echo $cropvalue3?></td>
                  <?php }?>
                  <? if($cropvalue4!=''){?>
                    <td><?php echo $cropvalue4?></td>
                  <?php }?>
                  <? if($cropvalue5!=''){?>
                    <td><?php echo $cropvalue5?></td>
                  <?php }?>
                </tbody>
              </table>
            </div>
          </div>
        </div>

        <div class="national-level icon-text-box">
          <div class="nf-product-block">
            <div class="row mb-2">
              <div class="col-md-8">
                <h4 class="nf-f-size-20 nf-strong">Raw Materials Required</h4>
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
          </div>

          <div class="row">
            <div class="col-12">
              <div class="nf-product-block">
                <h4 class="nf-f-size-20 nf-strong">Final Products</h4>
                <div class="nf-middle-product-block">
                  <div class="row">
                    <div class="col-12">
                      <div class="nf-product-info">
                        <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/turmeric-processing/food-1.jpg" alt="food-1">
                        <p><?php echo $final_products?></p>
                      </div>
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
                <?php if($infrastructure_1_heading!=''){?>
                  <div class="col-12 col-lg-3">
                    <div class="nf-capacity-block nf-sm-gradient-1">
                      <img class="nf-p-img-1" src="<?php echo $infrastructure_1_Image?>" alt="icon-1.png">
                      <span><?php echo $infrastructure_1_heading;?></span>
                      <h2><?php echo $infrastructure_1_value?></h2>
                    </div>
                  </div>
                <?php }?>
                <?php if($infrastructure_2_heading!=''){?>
                  <div class="col-12 col-lg-3">
                    <div class="nf-capacity-block nf-sm-gradient-2">
                      <img class="nf-p-img-2" src="<?php echo $infrastructure_2_Image?>" alt="icon-2.png">
                      <span><?php echo $infrastructure_2_heading;?></span>
                      <h2><?php echo $infrastructure_2_value?></h2>
                    </div>
                  </div>
                <?php }?>
                <?php if($infrastructure_3_heading!=''){?>
                  <div class="col-12 col-lg-3">
                    <div class="nf-capacity-block nf-sm-gradient-3">
                      <img class="nf-p-img-3" src="<?php echo $infrastructure_3_Image?>" alt="icon-3.png">
                      <span><?php echo $infrastructure_3_heading;?></span>
                      <h2><?php echo $infrastructure_3_value?></h2>
                    </div>
                  </div>
                <?php }?>
                <?php if($infrastructure_4_heading!=''){?>
                  <div class="col-12 col-lg-3">
                    <div class="nf-capacity-block nf-sm-gradient-4">
                      <img class="nf-p-img-4" src="<?php echo $infrastructure_4_Image?>" alt="icon-4.png">
                      <span><?php echo $infrastructure_4_heading;?></span>
                      <h2><?php echo $infrastructure_4_value?></h2>
                    </div>
                  </div>
                <?php }?>
                <?php if($infrastructure_5_heading!=''){?>
                  <div class="col-12 col-lg-3">
                    <div class="nf-capacity-block nf-sm-gradient-4">
                      <img class="nf-p-img-4" src="<?php echo $infrastructure_5_Image?>" alt="icon-4.png">
                      <span><?php echo $infrastructure_5_heading;?></span>
                      <h2><?php echo $infrastructure_5_value?></h2>
                    </div>
                  </div>
                <?php }?>
                <?php if($infrastructure_6_heading!=''){?>
                  <div class="col-12 col-lg-3">
                    <div class="nf-capacity-block nf-sm-gradient-3">
                      <img class="nf-p-img-3" src="<?php echo $infrastructure_6_Image?>" alt="icon-3.png">
                      <span><?php echo $infrastructure_6_heading;?></span>
                      <h2><?php echo $infrastructure_6_value?></h2>
                    </div>
                  </div>
                <?php }?>
                <?php if($infrastructure_7_heading!=''){?>
                  <div class="col-12 col-lg-3">
                    <div class="nf-capacity-block nf-sm-gradient-2">
                      <img class="nf-p-img-2" src="<?php echo $infrastructure_7_Image?>" alt="icon-2.png">
                      <span><?php echo $infrastructure_7_heading;?></span>
                      <h2><?php echo $infrastructure_7_value?></h2>
                    </div>
                  </div>
                <?php }?>
                <?php if($infrastructure_8_heading!=''){?>
                  <div class="col-12 col-lg-3">
                    <div class="nf-capacity-block nf-sm-gradient-1">
                      <img class="nf-p-img-1" src="<?php echo $infrastructure_8_Image?>" alt="icon-1.png">
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
              <h4 class="nf-f-size-20 nf-strong">Plant and machinery / Equipment</h4>
              <div class="nf-plan-listing">
                <?php
                $plan_and_machinery_required = explode(',',$plan_and_machinery_required);
                $i=0;
                foreach($plan_and_machinery_required as $plant)
                {
                  if($plant!=''){
                    $i++;
                    ?>

                    <h5><span class="nf-ico-color-<?php echo $i?>"><?php echo $i?></span> <?php echo $plant?></h5>
                  <?php } }?>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-12">
              <div class="nf-employment-block nf-emp-nursery">
                <div class="nf-capacity-block nf-gradient-1">
                  <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/turmeric-processing/capacity.png" alt="capacity">
                  <span>Employment Generation  </span>
                  <?php if($employment_generation_heading1!=''){?>
                    <h2><span> <?php echo $employment_generation_heading1;?> </span> <?php echo $employment_generation_value1;?></h2>
                  <?php }?>
                  <?php if($employment_generation_heading2!=''){?>
                    <h2><span> <?php echo $employment_generation_heading2;?> </span> <?php echo $employment_generation_value2;?></h2>
                  <?php }?>
                  <?php if($employment_generation_heading3!=''){?>
                    <h2><span> <?php echo $employment_generation_heading3;?> </span> <?php echo $employment_generation_value3;?></h2>
                  <?php }?>
                  <?php if($employment_generation_heading4!=''){?>
                    <h2><span> <?php echo $employment_generation_heading4;?> </span> <?php echo $employment_generation_value4;?></h2>
                  <?php }?>
                  <?php if($employment_generation_heading5!=''){?>
                    <h2><span> <?php echo $employment_generation_heading5;?> </span> <?php echo $employment_generation_value5;?></h2>
                  <?php }?>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-12">
              <div class="nf-product-block nf-plan-block nf-pro-cost">
                <h4 class="nf-f-size-20 nf-strong">Land Development Cost</h4>
                <div class="nf-flex-wrap">
                  <div class="nf-table-wrap">
                    <div class="table-responsive">
                      <?php /*?><table class="table">
                        <thead>
                          <th>Details</th>
                          <th style="text-align: right;">In INR in Lakhs</th>
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
                                <td  align="right"><?php echo $pcost2[$i]?></td>
                                <!--   <td><?php //echo $pcost3[$i]?></td> -->
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
                      </table><?php */?>
                      <table class="table">
                        <thead>
                          <th>Details</th> 
                        </thead>
                        <tbody>
                          <?php
                          $pcost1 = get_post_meta( $post->ID, '_event_major_value_key', true ); 
                          if(!empty($pcost1))
                          {

                            $pcost1 = explode('*****',$pcost1);
                            

                            for($i=0;$i<count($pcost1);$i++) 
                            {
                              ?>
                              <tr>
                                <td><?php echo $pcost1[$i]?></td>  
                              </tr>
                              <?php 
                            }
                          } 
                          ?>
                        </tbody>
                      </table>
                    </div>
                    <?php /*?><div class="table-responsive nf-table-footer">
                      <table class="table ">
                        <tfoot>
                          <tr>
                            <td>Total</td>
                            <td align="right"><?php echo $tot1;?></td>
                            <!--<td align="right"><?php //echo $tot2;?></td> -->
                          </tr>
                        </tfoot>
                      </table>
                    </div><?php */?>
                  </div>
                  <?php if($explore_raw_material!=''){ ?>
                   <div class="nf-databank-wrap">
                     <div class="nf-inner-databank">
                       <h4>Explore Raw Material  </h4>
                        <a href="<?php echo $explore_raw_material;?>" target="_blank">NER DATABASE</a>
                     </div>
                   </div>
                 <?php }?>
               </div>
             </div>
           </div>
         </div>

         <div class="row">
          <div class="col-12">
            <?php 
            $farmland1 = get_post_meta( $post->ID, '_event_farmland1_value_key', true );
            $farmland2 = get_post_meta( $post->ID, '_event_farmland2_value_key', true );
            ?>
            <div class="nf-product-block nursary-table-block">
              <div class="nf-table-wrap">
                <h4 class="nf-f-size-20 nf-strong">Farm Land</h4>
                <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <th>Details</th>
                      <th class="text-right">Value</th>
                    </thead>
                    <tbody>
                      <?php if(!empty($farmland1)) { 
                          $farmland1_val = explode('*****',$farmland1);
                          $farmland2_val = explode('*****',$farmland2);
                          for($i=0;$i<count($farmland1_val);$i++) { ?>
                            <tr>
                              <td><?php echo $farmland1_val[$i]; ?></td>
                              <td align="right"><?php echo $farmland2_val[$i]; ?></td>
                            </tr>
                          <?php } } ?>
                    </tbody>
                  </table>
                </div>
              </div>

              <div class="nf-table-wrap">
                <?php 
            $nurserycycle1 = get_post_meta( $post->ID, '_event_nurserycycle1_value_key', true );
            $nurserycycle2 = get_post_meta( $post->ID, '_event_nurserycycle2_value_key', true );
            ?>
                <h4 class="nf-f-size-20 nf-strong">Nursery Cycle (Ready to be Transplanted)</h4>
                <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <th>Details</th>
                      <th class="text-right">Months</th>
                    </thead>
                    <tbody>
                      <?php if(!empty($nurserycycle1)) { 
                          $nurserycycle1_val = explode('*****',$nurserycycle1);
                          $nurserycycle2_val = explode('*****',$nurserycycle2);
                          for($i=0;$i<count($nurserycycle1_val);$i++) { ?>
                            <tr>
                              <td><?php echo $nurserycycle1_val[$i]; ?></td>
                              <td align="right"><?php echo $nurserycycle2_val[$i]; ?></td>
                            </tr>
                          <?php } } ?>
                    </tbody>
                  </table>
                </div>
              </div>

            </div>
          </div>
        </div>



      <div class="nf-nursery-production">
        <div class="nf-product-block mt-2">
          <h4 class="nf-f-size-20 nf-strong">Environment</h4>
          <div class="table-responsive">
            <table class="table table-bordered">
              <thead>
                <? if($envcropname1!=''){?>
                  <th><?php echo $envcropname1?></th>
                <?php }?>
                <? if($envcropname2!=''){?>
                  <th><?php echo $envcropname2?></th>
                <?php }?>
                <? if($envcropname3!=''){?>
                  <th><?php echo $envcropname3?></th>
                <?php }?>
                <? if($envcropname4!=''){?>
                  <th><?php echo $envcropname4?></th>
                <?php }?>
                <? if($envcropname5!=''){?>
                  <th><?php echo $envcropname5?></th>
                <?php }?>
              </thead>
              <tbody>
                <? if($envcropvalue1!=''){?>
                  <td><?php echo $envcropvalue1?></td>
                <?php }?>
                <? if($envcropvalue2!=''){?>
                  <td><?php echo $envcropvalue2?></td>
                <?php }?>
                <? if($envcropvalue3!=''){?>
                  <td><?php echo $envcropvalue3?></td>
                <?php }?>
                <? if($envcropvalue4!=''){?>
                  <td><?php echo $envcropvalue4?></td>
                <?php }?>
                <? if($envcropvalue5!=''){?>
                  <td><?php echo $envcropvalue5?></td>
                <?php }?>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-12">
          <div class="nf-product-block nf-plan-block">
            <h4 class="nf-f-size-20 nf-strong">Soil Type</h4>
            <div class="nf-plan-listing">
             <?php 
             $soil_type = explode(',', $soil_type);
             $i=0;
             foreach($soil_type as $soil)
             {
              if($soil!=''){
                $i++;   ?>
                <h5><span class="nf-ico-color-<?php echo $i?>"><?php echo $i?></span> <?php echo $soil?></h5>
              <?php  }
            }
            ?>
          </div>
        </div>
      </div>
    </div>

    <div class="nf-nursery-production">
      <div class="nf-product-block mt-2">
        <h4 class="nf-f-size-20 nf-strong">Season</h4>
        <div class="table-responsive">
          <table class="table table-bordered">
           <thead>
            <? if($seasoncropname1!=''){?>
              <th><?php echo $seasoncropname1?></th>
            <?php }?>
            <? if($seasoncropname2!=''){?>
              <th><?php echo $seasoncropname2?></th>
            <?php }?>
            <? if($seasoncropname3!=''){?>
              <th><?php echo $seasoncropname3?></th>
            <?php }?>
            <? if($seasoncropname4!=''){?>
              <th><?php echo $seasoncropname4?></th>
            <?php }?>
            <? if($seasoncropname5!=''){?>
              <th><?php echo $seasoncropname5?></th>
            <?php }?>
          </thead>
          <tbody>
            <? if($seasoncropvalue1!=''){?>
              <td><?php echo $seasoncropvalue1?></td>
            <?php }?>
            <? if($seasoncropvalue2!=''){?>
              <td><?php echo $seasoncropvalue2?></td>
            <?php }?>
            <? if($seasoncropvalue3!=''){?>
              <td><?php echo $seasoncropvalue3?></td>
            <?php }?>
            <? if($seasoncropvalue4!=''){?>
              <td><?php echo $seasoncropvalue4?></td>
            <?php }?>
            <? if($seasoncropvalue5!=''){?>
              <td><?php echo $seasoncropvalue5?></td>
            <?php }?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-12">
      <div class="nf-product-block">
        <h4 class="nf-f-size-20 nf-strong">Pesticides, Fertilizer and Manure</h4>
        <div class="nf-middle-product-block">
          <div class="row">
            <div class="col-12">
              <div class="nf-product-info">
                <p><?php echo $pesticides_fertilizer_and_manure; ?></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <hr>

  <div class="row">
      <div class="col-12">
          <?php 
            $costrevenue1 = get_post_meta( $post->ID, '_event_costrevenue1_value_key', true );
            $costrevenue2 = get_post_meta( $post->ID, '_event_costrevenue2_value_key', true );
             $costrevenue3 = get_post_meta( $post->ID, '_event_costrevenue3_value_key', true );

            ?>
        <h4 class="nf-f-size-20 nf-strong mb-4">Cost and Revenue Analysis</h4>
        <div class="nursary-table-block">
          <div class="nf-table-wrap">
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <th>Details</th>
                  <th class="text-right">Cost(variable) per Sapling</th>
                </thead>
                <tbody>
                   <?php if(!empty($costrevenue1)) { 
                          $costrevenue1_val = explode('*****',$costrevenue1);
                          $costrevenue2_val = explode('*****',$costrevenue2);
                          $costrevenue3_val = explode('*****',$costrevenue3);

                         

                          for($i=0;$i<count($costrevenue1_val);$i++) { ?>
                            <tr>
                              <?php if ($costrevenue3_val[$i]=="Cost(variable) per Sapling") { ?>
                              <td><?php echo $costrevenue1_val[$i]; ?></td>
                              <td align="right"><?php echo $costrevenue2_val[$i]; ?></td>
                            <?php } ?>
                            </tr>
                          <?php } }  ?>
                </tbody>
              </table>
            </div>
          </div>

          <div class="nf-table-wrap">
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <th>Details</th>
                  <th class="text-right">Selling Price per Sapling</th>
                </thead>
                <tbody>
                  <?php if(!empty($costrevenue1)) { 
                          $costrevenue1_val = explode('*****',$costrevenue1);
                          $costrevenue2_val = explode('*****',$costrevenue2);
                          $costrevenue3_val = explode('*****',$costrevenue3);
                         
                        
                          for($i=0;$i<count($costrevenue1_val);$i++) { ?>
                            <tr>
                              <?php if ($costrevenue3_val[$i]=="Selling Price per Sapling") { ?>
                              <td><?php echo $costrevenue1_val[$i]; ?></td>    
                              <td align="right"><?php echo $costrevenue2_val[$i]; ?></td>
                              <?php  } ?>
                            </tr>
                          <?php } }  ?>
                </tbody>
              </table>
            </div>
          </div>

        </div>
      </div>
    </div>

    <hr>
  

  <div class="row">
    <div class="col-12">

      <div class="row nf-f-accordion">
        <div class="col-md-12 px-0">
          <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
            <div class="row mx-0">
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
                              // print_r($pcost3);
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
                                    <td class="text-right">Amount</td>
                                    <td class="text-right">Percentage</td>

                                  </tr>
                                  <?php
                                  for($i=0;$i<count($fin1_val);$i++) {
                                    if($fin3_val[$i] == 'Bold Text') { ?>
                                      <tr class="bg-gray nf-strong">
                                      <?php } else { ?>
                                        <tr>
                                        <?php } ?>
                                        <td><?php echo $fin1_val[$i]; ?></td>
                                        <td class="text-right"><?php echo $fin2_val[$i]; ?></td>
                                        <td class="text-right"><?php echo $fin4_val[$i].'%'; ?></td>
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

              <hr/>
              <div class="row mb-4">
                <div class="col-md-12">
                  <h4 class="nf-f-size-24 nf-strong">Financial Benchmarks <!--Year wise capacity utilization--></h4>
                </div>
              </div>
              <?php 
              $year = get_post_meta( $post->ID, '_event_yearwise1_value_key', true );
              $target_revenue = get_post_meta( $post->ID, '_event_yearwise2_value_key', true );
              $break_even_point = get_post_meta( $post->ID, '_event_yearwise3_value_key', true );
              $DSCR_including_principal_repayment = get_post_meta( $post->ID, '_event_yearwise4_value_key', true );
                  // echo "<pre>";
                  // print_r($DSCR_including_principal_repayment);
              ?>
              <div class="table-responsive capacity_tbl">
                <table class="table table_border_0 nf-strong-600">
                  <thead>
                    <tr>
                      <th scope="col" width="310px" class="border-0"> </th>
                      <?php if(!empty($year)) { 
                        $year = explode('*****',$year);
                        for($i=0;$i<count($year);$i++) { ?>
                          <th scope="col" class="border-0">
                            <span class="d-flex align-items-center justify-content-center">
                              <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/year-<?php echo $i+1; ?>.png" alt="image" class="img-fluid">
                              <h4 class="nf-f-size-16 nf-color-l-grey mb-0 pl-2"><?php echo $year[$i]; ?></h4>
                            </span>
                          </th>
                        <?php } } ?>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td align="right">Target Revenue</td>
                        <?php if(!empty($target_revenue)) { 
                          $target_revenue = explode('*****',$target_revenue);
                          for($i=0;$i<count($target_revenue);$i++) { ?>
                            <td  align="center"><?php echo $target_revenue[$i]; ?></td>
                          <?php } } ?>
                        </tr>
                        <tr>
                          <td align="right">Break Even Point</td>
                          <?php if(!empty($break_even_point)) { 
                            $break_even_point = explode('*****',$break_even_point);
                            for($i=0;$i<count($break_even_point);$i++) { ?>
                              <td  align="center"><?php echo $break_even_point[$i]; ?></td>
                            <?php } } ?>
                          </tr>
                          <tr>
                            <td align="right">DSCR including Principal Repayment</td>
                            <?php if(!empty($DSCR_including_principal_repayment)) { 
                              $DSCR_including_principal_repayment = explode('*****',$DSCR_including_principal_repayment);
                              for($i=0;$i<count($DSCR_including_principal_repayment);$i++) { ?>
                                <td  align="center"><?php echo $DSCR_including_principal_repayment[$i]; ?></td>
                              <?php } } ?>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                      <hr/>

                      <div class="row nf-f-accordion">
                        <div class="col-md-12 px-0">
                          <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            <div class="row mx-0">
                              <div class="col-lg-6 mb-3 mb-lg-0">
                                <div class="panel panel-default">
                                  <div class="panel-heading accordion_bg_3" role="tab" id="headingOne">
                                    <h4 class="panel-title mb-0">
                                      <a role="button" data-toggle="collapse" data-parent="#accordion" href="#assumptions" aria-expanded="true" aria-controls="assumptions">
                                        Basic Assumptions
                                      </a>
                                    </h4>
                                  </div>
                                  <?php 
                                  $assumption1 = get_post_meta( $post->ID, '_event_basicas1_value_key', true );
                                  $assumption2 = get_post_meta( $post->ID, '_event_basicas2_value_key', true );
                                  ?>
                                  <div id="assumptions" class="panel-collapse collapse show" role="tabpanel" aria-labelledby="headingOne">
                                    <div class="panel-body">
                                      <div class="table-responsive">
                                        <table class="table table_border_0 nf-strong-600">
                                          <tbody>
                                            <?php if(!empty($assumption1)) { 
                                              $assumption1_val = explode('*****',$assumption1);
                                              $assumption2_val = explode('*****',$assumption2);
                                              for($i=0;$i<count($assumption1_val);$i++) { ?>
                                                <tr>
                                                  <td><?php echo $assumption1_val[$i]; ?></td>
                                                  <td align="right"><?php echo $assumption2_val[$i]; ?></td>
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
                                    <div class="panel-heading accordion_bg_4" role="tab" id="headingTwo">
                                      <h4 class="panel-title mb-0">
                                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#others" aria-expanded="false" aria-controls="others">
                                          Others
                                        </a>
                                      </h4>
                                    </div>
                                    <?php 
                                    $other1 = get_post_meta( $post->ID, '_event_other1_value_key', true );
                                    $other2 = get_post_meta( $post->ID, '_event_other2_value_key', true );
                                    ?>
                                    <div id="others" class="panel-collapse collapse show" role="tabpanel" aria-labelledby="headingTwo">
                                      <div class="panel-body">
                                        <div class="table-responsive">
                                          <table class="table table_border_0 nf-strong-600">
                                            <tbody>
                                              <?php if(!empty($other1)) { 
                                                $other1_val = explode('*****',$other1);
                                                $other2_val = explode('*****',$other2);
                                                for($i=0;$i<count($other1_val);$i++) { ?>
                                                  <tr>
                                                    <td><?php echo $other1_val[$i]; ?></td>
                                                    <td align="right"><?php echo $other2_val[$i]; ?></td>
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

          <!-- End Study tour in north section  -->

        <?php }?>
        <!-- End Study tour in north section  -->
        <!-- footer start -->   
        <?php get_footer(); ?>