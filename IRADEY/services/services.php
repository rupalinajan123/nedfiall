<?php /*Template Name: Service Details */
/* Template Post Type: services */
 ?>
<?php 
if($_POST['internet_service']=='')
{  
      //wp_redirect(site_url('internet-service'));
      //exit; 
}

get_header(); 

$record=0;
if($_POST['internet_service']!='')
{
              $blog_args = array(
                      'post_type' => 'services',
                      'post_status' => 'publish',
                      'title' =>$_POST['internet_service'],
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
                      'post_type' => 'services',
                      'post_status' => 'publish',
                      'name' =>$the_slug,
                      'posts_per_page' => '1',
                  );

}
    

      $blog_posts = new WP_Query($blog_args);
        //echo "<pre>";
        //print_r($blog_posts);exit;

while($blog_posts->have_posts()) {
        $blog_posts->the_post(); 

        $values= get_fields();
        
        if($values)
        {
            
            $banner_image=$values['banner_image'];
            $proposed_project = $values['proposed_project'];
            $capacity=$values['capacity'];
            $final_product=$values['final_product'];
            $raw_materials_required = $values['raw_materials_required'];
            $infrastructure_required = $values['infrastructure_required'];
            $plant_and_machinery_required = $values['plant_&_machinery_required'];
            $employment_generation = $values['employment_generation'];
            $view_complete_details=$values['view_complete_details'];
            $service_type=$values['service_type'];

            
        }
?>

<!-- inner-banner-start -->
  <div class="inner-banner">
    <div class="container">
      <div class="banner-title">
        <h3><?php echo $blog_posts->posts[0]->post_title;?> <a href="#" class="changeTopic" data-toggle="collapse" data-target="#changeTopic" >Change Topic</a></h3>
        <ul class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Entrepreneurship</a></li>
          <li class="breadcrumb-item"><a href="#">Know your Business</a></li>
          <li class="breadcrumb-item"><a href="#">Services</a></li>
          <li class="breadcrumb-item"><a href="#"><?php echo $service_type;?></a></li>
          <li class="breadcrumb-item active"><?php echo $blog_posts->posts[0]->post_title;?></li>
        </ul>
      </div>
      <div class="chagetopic-modal changeTopic-collapse">
          <div class="collapse " id="changeTopic" style="">
            <a href="#" id="changeTopic_close"><i class="fa fa-close"></i></a>
            <div class="card card-body">
              <div class="row">
                <?php if($service_type=='Healthcare'){?>
                  <div class="col-md-6">
                  <h4>Select topic</h4>
                    <ul>
                      <li><a href="<?php echo site_url()?>/services/nursing-home">Nursing Home</a></li>
                      <li><a href="<?php echo site_url()?>/services/diagnostic-center">Diagnostic Center</a></li>
                      <li><a href="<?php echo site_url()?>/services/dental-clinic">Dental Clinic</a></li>
                      <li><a href="<?php echo site_url()?>/services/medical-college"> Medical College</a></li>
                    </ul>
                </div>
                <div class="col-md-6">
                  <h4>&nbsp;</h4>
                    <ul>
                      <li><a href="<?php echo site_url()?>/services/mental-retardation-hospital-cerebral-palsy">Mental Retardation Hospital & Cerebral Palsy</a></li>
                      <li><a href="<?php echo site_url()?>/services/rehabilitation-centre-for-drug-addiction">Rehabilitation Centre for Drug Addiction</a></li>
                      <li><a href="<?php echo site_url()?>/services/physiotherapy">Physiotherapy</a></li>
                      <li><a href="<?php echo site_url()?>/services/nature-care-center">Nature Care Center</a></li>
                      <li><a href="<?php echo site_url()?>/services/health-club-fitness-centre/">Health Club Fitness Centre</a></li>
                      
                    </ul>
                </div>
                
                <?php }else if($service_type=='IT'){?>
                  <div class="col-md-6">
                  <h4>Select topic</h4>
                    <ul>
                      <li><a href="<?php echo site_url()?>/services/data-processing-center"> Data Processing Center</a></li>
                      <li><a href="<?php echo site_url()?>/services/internet-service-provider">Internet Service Provider</a></li>
                      <li><a href="<?php echo site_url()?>/services/it-park">IT Park</a></li>
                      <li><a href="<?php echo site_url()?>/services/medical-college">Medical College</a></li>
                      <li><a href="<?php echo site_url()?>/services/e-Commerce">E-Commerce</a></li>
                      <li><a href="<?php echo site_url()?>/services/computer-software">Computer Software</a></li>
                      <li><a href="<?php echo site_url()?>/services/website-design-e-mail-registering">Website Design & E-mail Registering</a></li>
                      <li><a href="<?php echo site_url()?>/services/computer-and-laptop-service-centre">Computer and Laptop Service Centre</a></li>
                      
                    </ul>
                </div>
                
                <?php }else if($service_type=='Education'){?>
                  <div class="col-md-6">
                  <h4>Select topic</h4>
                    <ul>
                      <li><a href="<?php echo site_url()?>/services/b-ed-law-college">B.Ed & Law College</a></li>
                      <li><a href="<?php echo site_url()?>/services/engineering-college"> Engineering College</a></li>
                      <li><a href="<?php echo site_url()?>/services/fashion-technology-institute"> Fashion Technology Institute</a></li>
                      <li><a href="<?php echo site_url()?>/services/secondary-school">Secondary School</a></li>
                      <li><a href="<?php echo site_url()?>/services/residential-school">Residential School</a></li>
                      <li><a href="<?php echo site_url()?>/services/play-school">Play School</a></li>
                      <li><a href="<?php echo site_url()?>/services/computer-training-institute">Computer Training Institute</a></li>
                     

                    </ul>
                </div>
                <div class="col-md-6">
                  <h4>&nbsp;</h4>
                    <ul>
                     
                      <li><a href="<?php echo site_url()?>/services/college">College</a></li>
                      <li><a href="<?php echo site_url()?>/services/hostel-for-boys-and-girls"> Hostel (for Boys and Girls)</a></li>
                      <li><a href="<?php echo site_url()?>/services/senior-secondary-school"> Senior Secondary School</a></li>
                      <li><a href="<?php echo site_url()?>/services/veterinary-college-and-hospital">Veterinary College and Hospital</a></li>
                      <li><a href="<?php echo site_url()?>/services/managment-institute/">Management Institute</a></li>
                      <li><a href="<?php echo site_url()?>/services/health-cum-beauty-parlour-training-institute/">Health Cum Beauty Parlour Training Institute</a></li>
                      

                    </ul>
                </div>
                
                <?php }else if($service_type=='Construction'){?>
                  <div class="col-md-6">
                  <h4>Select topic</h4>
                    <ul>
                      <li><a href="<?php echo site_url()?>/services/multistorey-commercial-complex">Multistorey Commercial Complex</a></li>
                      <li><a href="<?php echo site_url()?>/services/multiplex-cum-entertainment-center"> Multiplex Cum Entertainment Center</a></li>
                      <li><a href="<?php echo site_url()?>/services/township">Township</a></li>
                      <li><a href="<?php echo site_url()?>/services/special-economic-zone-sez-industrial-park">Special Economic Zone (SEZ)/Industrial Park</a></li>
                      <li><a href="<?php echo site_url()?>/services/tourist-club"> Tourist Club</a></li>
                      <li><a href="<?php echo site_url()?>/services/warehouse-godown-for-paddy-jutemaize"> Warehouse Godown for Paddy, Jute,Maize</a></li>
                      <li><a href="<?php echo site_url()?>/services/concrete-tiles-and-paving-blocks"> Concrete Tiles and Paving Blocks</a></li>
                      <li><a href="<?php echo site_url()?>/services/soil-cement-block"> Soil Cement Block</a></li>
                    </ul>
                </div>
                
                <?php }else if($service_type=='Other'){?>
                  <div class="col-md-6">
                  <h4>Select topic</h4>
                    <ul>
                      <li><a href="<?php echo site_url()?>/other/">other</a></li>
                    </ul>
                </div>
                <?php }else{?>
                  <div class="col-md-6">
                  <h4>Select topic</h4>
                    <ul>
                      <li><a href="<?php echo site_url();?>/hotels-and-resorts"> Hotels & Resorts</a></li>
                      <li><a href="<?php echo site_url();?>/services/homestay/"> Homestay</a></li>
                      <li><a href="<?php echo site_url();?>/tourism-adventure">Adventure Tourism</a></li>
                      <li><a href="<?php echo site_url();?>/services/nature-eco-tourism/"> Nature & Eco Tourism</a></li>
                      <li><a href="<?php echo site_url();?>/services/rural-tourism/"> Rural Tourism</a></li>
                      <li><a href="<?php echo site_url();?>/services/fast-food//"> Fastfood</a></li>
                      <li><a href="<?php echo site_url();?>/services/restaurant/"> Restaurant</a></li>
                    </ul>
                </div>
                <?php }?>           
              </div>
            </div>
          </div>
        </div>
      <div class="banner-content">
        <div class="row">
          <div class="col-md-5 banner-img pr-lg-0"><img src="<?php echo $banner_image ;?>"></div>
          <div class="col-md-7 pl-lg-0">
            <div class="bannerbg nf-gradient-15 justify-content-start p-3 nf-height-100">
              <h4 class="nf-f-size-24 pl-0"><?php echo $blog_posts->posts[0]->post_title;?></h4>
              <p class="text-white pr-md-5"><?php echo $blog_posts->posts[0]->post_content;?></p>
              <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/it-bannerbg-vector.png" alt="layers background" class="nf-layes-bg">
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

      <div class="row nf-raw-section">
        <div class="col-12 col-lg-4">
          <div class="nf-select-wrap nf-raw-wrap">
            <div class="nf-select-img">
              <span class="border-0 pl-0">Proposed Project</span>
              <span class="nf-f-size-18 nf-strong-600"><?php echo $proposed_project; ?></span>
            </div>
          </div>
        </div>
      </div>

      <?php if($capacity!='') { ?>
      <div class="row">
        <div class="col-12">
          <div class="nf-capacity-block nf-gradient-1">
            <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/warehouse.png" alt="capacity">
            <span>Capacity of the Plant/Unit (at 100% capacity utilization)</span>
            <h2><?php echo $capacity; ?></h2>
          </div>
        </div>
      </div>
      <?php } ?>


      <div class="national-level icon-text-box">
        <?php 
              $year = get_post_meta( $post->ID, '_event_yearwise1_con_value_key', true );
              $break_even_point = get_post_meta( $post->ID, '_event_yearwise3_con_value_key', true );
             //if(!empty($year)) { ?>
        <hr/>
        <div class="row">
            <div class="col-md-3">
              <div class="row mb-4">
                <div class="col-md-12">
                  <h4 class="nf-f-size-16 nf-strong">Year wise capacity utilization</h4>
                </div>
              </div>
            </div>
            
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
        <?php //}?>
        <hr/>

        <div class="nf-f-product mb-5">
          <div class="row ml-md-0">
            <div class="col-lg-3 col-md-4 nf-f-product-l mb-3 mb-md-0">
              <span class="p_shape_wrap nf-gradient-11 mb-5"><h4 class="nf-f-size-20 text-white">Final Product</h4></span>
              <div class="p-4"><img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/world-grid.png" alt="alu" class="img-fluid">
                <h2 class="nf-f-size-20 mt-3"><?php echo $final_product; ?></h2></div>
              </div>
              <div class="col-lg-9 col-md-8 nf-f-product-r">
                <div class="infra_required nf-gradient_color-1 text-white p-3 mb-3">
                  <h2 class="nf-f-size-20 text-white mb-4">Infrastructure and Equipments Required</h2>
                        <div class="row">
                          <?php if(!empty($infrastructure_required['infrastructure_1'])) { ?>
                          <div class="col-lg-4 col-md-6 d-flex align-items-center">
                            <img src="<?php echo $infrastructure_required['infrastructure_1_image']; ?>" alt="image" class="img-fluid">
                            <span class="pl-2"><?php echo $infrastructure_required['infrastructure_1']; ?></span>
                          </div>
                          <?php } ?>
                          <?php if(!empty($infrastructure_required['infrastructure_2'])) { ?>
                          <div class="col-lg-4 col-md-6 d-flex align-items-center">
                            <img src="<?php echo $infrastructure_required['infrastructure_2_image']; ?>" alt="image" class="img-fluid">
                            <span class="pl-2"><?php echo $infrastructure_required['infrastructure_2']; ?></span>
                          </div>
                          <?php } ?>
                          <?php if(!empty($infrastructure_required['infrastructure_3'])) { ?>
                          <div class="col-lg-4 col-md-6 d-flex align-items-center">
                            <img src="<?php echo $infrastructure_required['infrastructure_3_image']; ?>" alt="image" class="img-fluid">
                            <span class="pl-2"><?php echo $infrastructure_required['infrastructure_3']; ?></span>
                          </div>
                          <?php } ?>
                          <?php if(!empty($infrastructure_required['infrastructure_4'])) { ?>
                          <div class="col-lg-4 col-md-6 d-flex align-items-center">
                            <img src="<?php echo $infrastructure_required['infrastructure_4_image']; ?>" alt="image" class="img-fluid">
                            <span class="pl-2"><?php echo $infrastructure_required['infrastructure_4']; ?></span>
                          </div>
                          <?php } ?>
                        </div>
                      </div>
                      <div class="pm_required nf-gradient_color-2 text-white p-3">
                        <h2 class="nf-f-size-20 text-white">Employment Generation</h2>
                        <ul class="ul_round">
                          <?php if(!empty($employment_generation)) { 
                            $employment_generation = explode(',',$employment_generation);
                            for($i=0;$i<count($employment_generation);$i++) { ?>
                              <li class="w-50 "><?php echo $employment_generation[$i]; ?></li>
                          <?php } } ?>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>

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
                                                  <td>Amount</td>
                                                  <!--<td>Percentage</td>-->

                                                </tr>
                                        <?php
                                        for($i=0;$i<count($fin1_val);$i++) {
                                          if($fin3_val[$i] == 'Bold Text') { ?>
                                              <tr class="bg-gray nf-strong">
                                            <?php } else { ?>
                                              <tr>
                                            <?php } ?>
                                            <td><?php echo $fin1_val[$i]; ?></td>
                                            <td><?php echo $fin2_val[$i]; ?></td>
                                            <!--<td ><?php //echo $fin4_val[$i].'%'; ?></td>-->
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
                    <h4 class="nf-f-size-24 nf-strong">Financial Benchmarks</h4>
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