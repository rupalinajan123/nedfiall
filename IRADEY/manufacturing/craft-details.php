<?php /*Template Name: Craft Details */
?>
<?php 
if($_POST['incense']=='')
{  
      //wp_redirect(site_url('incense-sticks'));
      //exit; 
}
get_header(); 

$record=0;
if($_POST['incense']!='')
{
              $blog_args = array(
                      'post_type' => 'bamboo',
                      'post_status' => 'publish',
                      'title' =>$_POST['incense'],
                      'posts_per_page' => '1',
                  );
}
else
{
  $current_slug = add_query_arg( array(), $wp->request );
  $current_slug = explode('/',$current_slug);
  $the_slug = end($current_slug);
  $type = $current_slug[count($current_slug) - 2];

  $blog_args = array(
                      'post_type' => 'bamboo',
                      'post_status' => 'publish',
                      'name' =>$the_slug,
                      'posts_per_page' => '1',
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
           // print_r($values);
            $banner_image=$values['banner_image'];
            $capacity=$values['capacity'];
            $raw_materials_required = $values['raw_materials_required'];
            $infrastructure_required = $values['infrastructure_required'];
            $plant_and_machinery_required = $values['plant_&_machinery_required'];
            $emploment_generation_1 = $values['emploment_generation']['emploment_generation_1'];
            $emploment_generation_2 = $values['emploment_generation']['emploment_generation_2'];
            $final_product = $values['final_product'];

        }
?>

<!-- inner-banner-start -->
<div class="inner-banner">
  <div class="container">
    <div class="banner-title">
      <h3><?php echo $blog_posts->posts[0]->post_title;?> <a href="#" class="changeTopic" data-toggle="collapse" data-target="#changeTopic">Change Topic</a></h3>
      <!--<h3><?php echo $page_data->post_title;?> <a href="#" class="changeTopic" data-toggle="collapse" data-target="#changeTopic" >Change Topic</a></h3>-->

      <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Entrepreneurship</a></li>
        <li class="breadcrumb-item"><a href="#">Know your Business</a></li>
        <li class="breadcrumb-item"><a href="#">Manufacturing</a></li>
        <li class="breadcrumb-item"><a href="#">Bamboo</a></li>
        <li class="breadcrumb-item">Craft</li>
        <li class="breadcrumb-item active"><?php echo $blog_posts->posts[0]->post_title;?></li>
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
                        
                                <li><a href="<?php echo site_url()?>/bamboo/primary-treatment-plant/">Primary Treatment Plant</a></li>
                                 <li><a href="<?php echo site_url()?>/craft/">Craft</a></li>
                                <li><a href="<?php echo site_url()?>/bamboo/engineered-wood/"> Engineered Wood</a></li>
                                <li><a href="<?php echo site_url()?>/bamboo/incense-sticks"> Incense Stick</a></li>
                                <li><a href="<?php echo site_url()?>/bamboo/bamboo-blinds/">Bamboo Blinds</a></li>
                                <li><a href="<?php echo site_url()?>/bamboo/bamboo-charcoal/"> Bamboo Charcoal </a></li>
                                <li><a href="<?php echo site_url()?>/bamboo/bamboo-bio-plastics/"> Bamboo Bio-Plastics</a></li>
                                <li><a href="<?php echo site_url()?>/bamboo/bamboo-activated-charcoal/"> Bamboo Activated Charcoal</a></li>
                                <li><a href="<?php echo site_url()?>/bamboo/cutleries/"> Cutleries </a></li>
                                <li><a href="<?php echo site_url()?>/bamboo/food-pharmaceutical-nutraceutical/"> Food, Pharmaceutical and Nutraceutical</a></li>
                                <li><a href="<?php echo site_url()?>/bamboo/round-pole-unit/"> Round Pole Unit</a></li>
                 </ul>
                </div>

                <div class="col-md-6">
                  <h4>&nbsp;</h4>
                    <ul>
                    
                                <li><a href="<?php echo site_url()?>/bamboo/lifestyle-product/"> Lifestyle Product </a></li>
                                <li><a href="<?php echo site_url()?>/bamboo/floor-tiles/"> Floor Tiles</a></li>
                                <!--<li><a href="<?php //echo site_url()?>/bamboo/bamboo-food-and-pharmaceuticals/ "> Bamboo Food and Pharmaceuticals </a></li>-->
                                <li><a href="<?php echo site_url()?>/bamboo/bamboo-charcoal"> Bamboo charcoal</a></li>
                                <li><a href="<?php echo site_url()?>/bamboo/bamboo-vinegar/"> Bamboo vinegar </a></li>
                                <li><a href="<?php echo site_url()?>/bamboo/bamboo-activated-charcoal-carbon/"> Bamboo activated Charcoal/ Carbon</a></li>
                                <li><a href="<?php echo site_url()?>/bamboo/bamboo-plastic/"> Bamboo plastic </a></li>
                                <li><a href="<?php echo site_url()?>/bamboo/bamboo-utility-products/ "> Bamboo utility products </a></li>
                                <li><a href="<?php echo site_url()?>/bamboo/bamboo-nursery/"> Bamboo nursery </a></li>
                                <li><a href="<?php echo site_url()?>/bamboo/bamboo-cutlery/ "> Bamboo cutlery  </a></li>
                    </ul>
                </div>
                    
              </div>
            </div>
          </div>
        </div>

    
    <div class="banner-content">
      <div class="row">
        <div class="col-md-5 banner-img pr-lg-0"><img src="<?php echo $banner_image;?>"></div>
        <div class="col-md-7 pl-lg-0">
          <div class="bannerbg nf-gradient-7 justify-content-start p-3 nf-height-100">
            <h4 class="nf-f-size-24 pl-0"><?php echo $blog_posts->posts[0]->post_title;?></h4>
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
<div class="inner-body">
  <div class="container">
    <?php if($capacity!='') { ?>
    <div class="row">
      <div class="col-12">
        <div class="nf-capacity-block nf-gradient-1">
          <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/warehouse.png" alt="capacity">
          <span>Capacity of the Plant/Unit (at 100% capacity utilization)</span>
          <h2><?php echo $capacity; ?> </h2>
        </div>
      </div>
    </div>
    <?php } ?>


    <div class="national-level icon-text-box">
      <hr/>
      <div class="row">
        <div class="col-md-3">
      <div class="row mb-4">
        <div class="col-md-12">
          <h4 class="nf-f-size-16 nf-strong">Year wise capacity utilization</h4>
        </div>
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
    <div class="col-md-9">
      <div class="nf-year-wise">
        <div class="row justify-content-md-between">
          <?php if(!empty($year)) { 
            $year = explode('*****',$year);
            $break_even_point = explode('*****',$break_even_point); 
            for($i=0;$i<count($year);$i++) { ?>
              <div class="col">
                <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/year-<?php echo $i+1; ?>.png" alt="image" class="img-fluid">
                <h4 class="nf-f-size-16 nf-color-l-grey"><?php echo $year[$i]; ?></h4>
                <h2><?php echo $break_even_point[$i]; ?></h2>
              </div>
          <?php } } ?>
        </div>
      </div>
    </div>
    </div>
      <hr/>
      <div class="row">
        <div class="col-12 mb-3 mb-lg-0">
          <div class="nf-target-process-block flex-direction-row mt-0 mb-md-4 mb-sm-2 ab_raw_material align-items-center">
            <div class="col-12 row">
            <div class="col-lg-3 col-12">
              <h4 class="mb-4">Raw Materials Required</h4>
              <div class="nf-pro-inner-wrap">
                <div class="nf-pro-img-block">
                  <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/raw-material.png" alt="entreprenuearship">
                </div>
              </div>
            </div>
            <?php if(!empty($raw_materials_required)) { 
              $raw_materials_required_arr = explode(',', $raw_materials_required); ?>
              <div class="col-12 col-lg-9">
                <ul class="nf-target-process-block_ul">
                  <?php for ($i=0; $i < count($raw_materials_required_arr); $i++) { ?>
                    <li><?php echo $raw_materials_required_arr[$i]; ?></li>
                  <?php } ?>
                </ul>
              </div>
            <?php } ?>
          </div>
          </div>
        </div>
      </div>

      <div class="nf-f-product mb-4">
        <div class="row ml-md-0">
          <div class="col-lg-3 col-md-4 nf-f-product-l agarbatti_pl mb-3 mb-md-0" style="background-image:url('<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/final-product-agarbatti-bg.png')">
            <span class="p_bgimg_wrap"><h4 class="nf-f-size-20 text-white">Final Product</h4></span>
            <div class="pt-2"><!--<img src="<?php //echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/agarbatti.png" alt="alu" class="img-fluid">-->
              <h2 class="nf-f-size-20 mt-3 text-white"><?php echo $final_product; ?></h2></div>
            </div>
            <div class="col-lg-9 col-md-8 nf-f-product-r">
              <?php if(!empty($infrastructure_required)) { ?>
                <div class="infra_required nf-gradient_color-1 text-white p-3 mb-3">
                  <h2 class="nf-f-size-20 text-white mb-4">Infrastructure Required</h2>
                    <div class="row">
                        <?php if(!empty($infrastructure_required['infrastructure_1'])) { ?>
                        <div class="col-lg-4 col-md-6 d-flex align-items-baseline">
                          <img src="<?php echo $infrastructure_required['infrastructure_1_image']; ?>" alt="image" class="img-fluid">
                          <span class="pl-2"><?php echo $infrastructure_required['infrastructure_1']; ?></span>
                        </div>
                        <?php } ?>
                        <?php if(!empty($infrastructure_required['infrastructure_2'])) { ?>
                        <div class="col-lg-4 col-md-6 d-flex align-items-baseline">
                          <img src="<?php echo $infrastructure_required['infrastructure_2_image']; ?>" alt="image" class="img-fluid">
                          <span class="pl-2"><?php echo $infrastructure_required['infrastructure_2']; ?></span>
                        </div>
                        <?php } ?>
                        <?php if(!empty($infrastructure_required['infrastructure_3'])) { ?>
                        <div class="col-lg-4 col-md-6 d-flex align-items-baseline">
                          <img src="<?php echo $infrastructure_required['infrastructure_3_image']; ?>" alt="image" class="img-fluid">
                          <span class="pl-2"><?php echo $infrastructure_required['infrastructure_3']; ?></span>
                        </div>
                        <?php } ?>
                        <?php if(!empty($infrastructure_required['infrastructure_4'])) { ?>
                        <div class="col-lg-4 col-md-6 d-flex align-items-baseline">
                          <img src="<?php echo $infrastructure_required['infrastructure_4_image']; ?>" alt="image" class="img-fluid">
                          <span class="pl-2"><?php echo $infrastructure_required['infrastructure_4']; ?></span>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <?php } ?>
                    <div class="pm_required nf-gradient_color-2 text-white p-3">
                      <h2 class="nf-f-size-20 text-white">Plant & Machinery Required</h2>
                      <ul class="ul_round">
                        <?php if(!empty($plant_and_machinery_required)) {
                          $plant_and_machinery_required_arr = explode(',', $plant_and_machinery_required); ?>
                          <?php for ($i=0; $i < count($plant_and_machinery_required_arr); $i++) { ?>
                          <li class="col-md-6 col-sm-12"><?php echo $plant_and_machinery_required_arr[$i]; ?></li>
                          <?php } ?>
                        <?php } ?>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>


              <div class="row">
                <div class="col-12">
                  <div class="nf-product-block nf-plan-block">
                    <div class="nf-cost-list justify-content-start align-items-center mt-0">
                      <h4 class="nf-f-size-20 nf-strong col-lg-3 col-md-12 px-0">Emploment Generation:</h4>
                      <?php if(!empty($emploment_generation_1)) { ?>
                        <h2 class="nf-orange-block col-lg-2 col-md-4 text-center mx-3 nf-f-size-18"><?php echo $emploment_generation_1; ?></h2>
                      <?php } ?>
                      <?php if(!empty($emploment_generation_2)) { ?>
                        <h2 class="nf-green-block col-lg-2 col-md-4 text-center mx-3 nf-f-size-18"><?php echo $emploment_generation_2; ?></h2>
                      <?php } ?> 
                    </div>
                  </div>
                </div>
              </div>

              <hr/>
              <div class="row nf-f-accordion">
                <div class="col-md-12 px-0">
                  <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="row mx-0">
                      <div class="col-lg-6 mb-3 mb-lg-0">
                        <div class="panel panel-default">
                          <div class="panel-heading accordion_bg_1" role="tab" id="headingOne">
                            <h4 class="panel-title mb-0">
                              <a role="button" data-toggle="collapse" data-parent="#accordion" href="#projectcost" aria-expanded="true" aria-controls="projectcost">
                                Project Cost (subject to respective DPR) In Lakhs
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
                                       <td  align="right">Amount</td>
                                        <td align="right">Percentage</td>

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
                                        <td align="right"><?php echo $fin4_val[$i].'%'; ?></td>
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
              <hr>

              <div class="row mb-4">
                  <div class="col-md-12">
                    <h4 class="nf-f-size-24 nf-strong">Year wise capacity utilization</h4>
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
                <hr>

              <div class="row nf-f-accordion mt-4">
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
                          <!-- <span class="nf-f-size-14">**The figures are taken assuming the Agarbatti Business</span> -->
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

            </div>

            <?php
            $view_complete_details = $values['view_complete_details'];
             if($view_complete_details!='') { ?>
            <div class="row">
              <div class="col-lg-12 col-md-12 mt-4 d-flex justify-content-center"><a class="btn nf-button-v-small w-50" href="<?php echo $view_complete_details; ?>" role="button" target="_blank">View Complete Details</a></div>
            </div>
          <?php } ?>
            <?php 
              $title = get_post_meta( $post->ID, '_event_qlinks_value_key', true );
              $url = get_post_meta( $post->ID, '_event_qlinksurl_value_key', true );
            ?>
            <?php if(!empty($title)) { ?>
              <div class="nf-product-block nf-quick-block-wrap">
                <h4 class="nf-f-size-20 nf-strong">Quick Links </h4>
                <div class="row">
                    <?php $title_val = explode('*****',$title);
                    $url_val = explode('*****',$url);
                    for($i=0;$i<count($title_val);$i++) { ?>
                      <div class="col-6 col-lg-2">
                        <a href="<?php echo $url_val[$i]; ?>"> 
                          <div class="nf-quick-block nf-q-color-<?php echo $i+1; ?>">
                            <?php echo $title_val[$i]; ?>
                          </div>
                        </a>
                      </div>
                  <?php } ?>
                </div>
              </div>
          <?php } ?>
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
<?php } ?> 
      <!-- End Study tour in north section  -->
       <!-- footer start -->  
<?php get_footer(); ?>
<script>
 
  </script>