<?php /*Template Name: Animal husbandry Cost Calculate */ ?>
<?php get_header(); 

$page_data = get_page_by_path( 'animal-husbandry-cost-calculator' );

$record=0;

if($_POST['sub_type']=='Animal')
{
$blog_args = array(
                            'post_type' => 'animal_farm_calc',
                            'post_status' => 'publish',
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
                                    'key'     =>  'species',
                                    'value'   =>  $_POST['species']
                                ),
                                array(
                                    'key'     =>  'culture_system',
                                    'value'   =>  $_POST['culture_system']
                                )
                                
                              )
                            );
}
else if($_POST['sub_type']=='Bird')
{
      $blog_args = array(
                            'post_type' => 'pigeon_farm_calc',
                            'post_status' => 'publish',
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
                                    'key'     =>  'species',
                                    'value'   =>  $_POST['species']
                                ),
                                array(
                                    'key'     =>  'culture_system',
                                    'value'   =>  $_POST['culture_system']
                                )
                                
                              )
                            );
}
else
{ //for egg production
  $blog_args = array(
                            'post_type' => 'pigeon_farm_calc',
                            'post_status' => 'publish',
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
                                    'key'     =>  'species',
                                    'value'   =>  $_POST['species']
                                ),
                                array(
                                    'key'     =>  'culture_system',
                                    'value'   =>  $_POST['culture_system']
                                )
                                
                              )
                            );
}



$blog_posts = new WP_Query($blog_args);
?>
    <!-- slider-start -->  
    <!-- inner-banner-start -->
    <div id="preloader-loader" style="display:none;"></div>
  <div class="inner-banner">
    <div class="container">
      <div class="banner-title">
        <h3><?php echo $page_data->post_title;?></h3>
        <ul class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item"><a href="#"><?php echo $page_data->post_title;?></a></li>
          <li class="breadcrumb-item active">Animal Husbandry</li>
        </ul>
      </div>

      <div class="banner-content">
        <div class="row">
          <?php $url = wp_get_attachment_url( get_post_thumbnail_id($post_id) );?>
            <div class="col-md-4 banner-img pr-0"><img class="h-135" src="<?php echo $url?>"></div>
         
          <div class="col-md-8  pl-0">
            <div class="bannerbg nf-gradient-1 justify-content-start pt-3 nf-height-100 nf-fcc">
              <h4 class="nf-f-size-24"><img src="<?php echo get_template_directory_uri(). '/assets/'?>img/home/calendar.png" alt="calendar"><?php echo $page_data->post_title;?></h4>
              <h5><?php echo $page_data->post_content;?></h5>
              <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/layers-bg.png" alt="layers background" class="nf-layes-bg">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- inner-banner-end -->
  <!-- Study tour in north section  -->
  <form method="post" id="form_id" action="<?php echo site_url()?>/animal-husbandry-cost-calculator">
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
                <input type="radio" id="customRadioInline1" name="cost_type" class="custom-control-input"  value="Fishery" onclick="window.location='<?php echo site_url()?>/cost-calculate'">
                <label class="custom-control-label" for="customRadioInline1" >
                  <span><img src="<?php echo get_template_directory_uri(). '/assets/'?>img/home/fish-icon.jpg"></span> 
                  Fishery
                </label>
              </div>
            </div>
            </div>
            <div class="col-12 col-md-6 col-xl-3">
              <div class="nf-radio-wrap">
              <div class="custom-control custom-radio custom-control-inline pl-0 nf-radio-full nf-radio-full-2">
                <input type="radio" id="customRadioInline2" name="cost_type" class="custom-control-input"  value="Horticulture" onclick="window.location='<?php echo site_url()?>/horticulture-cost-calculator'">
                <label class="custom-control-label" for="customRadioInline2" >
                  <span><img src="<?php echo get_template_directory_uri(). '/assets/'?>img/home/flower.png"></span> 
                  Horticulture
                </label>
              </div>
            </div>
            </div>
            <div class="col-12 col-md-6 col-xl-3">
              <div class="nf-radio-wrap">
              <div class="custom-control custom-radio custom-control-inline pl-0 nf-radio-full nf-radio-full-3">
                <input type="radio" id="customRadioInline3" name="cost_type" class="custom-control-input" checked=""  value="Animal Husbandry">
                <label class="custom-control-label" for="customRadioInline3">
                  <span><img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/animal-husbandary-wht.png"></span> 
                  Animal Husbandry
                </label>
              </div>
            </div>
            </div>
          </div>
        
        <div class="row mb-2">
          <div class="col-md-12">
            <h4 class="nf-f-size-20 nf-strong nf-top-brdr">Select Options</h4>
          </div>
        </div>

        <div class="nf-form-wrap">
          <div class="row">

        <div class="col-12 col-md-6 col-xl-3">
              <label>Type</label>
              <div class="nf-select-wrap nf-pl-30">
                <div class="nf-select-img">
                	
                  <img id="img1" src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/animal-husbandary.png" alt="fish-1">
              

                  <span>Type </span>
                </div>
                <div class="nf-select-field">
                  <?php 
                    //$var = get_field_object('field_610ba2e93d7ae');
                    $j=0;
                    ?>
                    <select class="form-control selectpicker" name="type" id="type" onchange="get_final_tot()">
                   
                     <option value="">Select</option>
                      
                      <?php
                     $var['choices'] = array('Meat Production','Dairy Production','Wool Production','Breeding','Egg Production'); 
                     foreach($var['choices'] as $choice)
                      {
                        if($choice==$_POST['type']) $sel='selected'; else $sel='';
                        //if($j==0) $selz='disabled'; else $selz='';
                       echo '<option '.$sel.' '.$selz.' value="'.$choice.'">'.$choice.'</option>';
                       $j++;
                      }
                      ?>
                    </select>

                </div>
              </div>
              <span id="error_msg5" style="color: red;"></span>
            </div>
            
            <div class="col-12 col-md-6 col-xl-3" >
              <label>Sub Type</label>
              <div class="nf-select-wrap nf-pl-30">
                <div class="nf-select-img">
                	
                  <img id="img2" src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/animal-husbandary.png" alt="fish-1">
                 
                  <span>Sub Type </span>
                </div>
                <div class="nf-select-field">
                  <?php 
                    //$var = get_field_object('field_610ba3883d7af');
                    ?>
                    <select class="form-control selectpicker" name="sub_type" id="sub_type" onchange="get_final_tot()">
                   
                     <option value="">Select</option>
                      
                      <?php
                      if($_POST['type']=='Meat Production' or $_POST['type']=='Breeding')
                      $var['choices'] = array('Bird','Animal'); 
                      else if($_POST['type']=='Dairy Production' or $_POST['type']=='Wool Production')
                      $var['choices'] = array('Animal'); 
                      else if($_POST['type']=='Egg Production')
                      $var['choices'] = array('For Food','For Breeding'); 
                      else
                      $var['choices'] = array('Bird','Animal');
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
                	
                  <img id="img3" src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/animal-husbandary.png" alt="fish-1">
                  
                  <span>Species </span>
                </div>
                <div class="nf-select-field">
                  <span id="species1_id" <?php if($_POST['sub_type']=='Animal'){ ?>style="display: none;" <?php }?>>
                  <?php 
                    $var = get_field_object('field_610ba4203d7b1');
                    ?>
                    <select class="form-control selectpicker" name="species1" id="species1" onchange="document.getElementById('species').value=this.value; get_final_tot()" >
                   
                     <option value="">Select</option> 
                      <?php
                      $args = array(
                          'post_type' => 'pigeon_farm_calc',
                          'post_status' => 'publish',
                          'posts_per_page' => -1,
                          'meta_query'     =>  array(
                                array(
                                    'key'     =>  'type',
                                    'value'   =>  $_POST['type']
                                    ),
                                array(
                                    'key'     =>  'sub_type',
                                    'value'   =>  $_POST['sub_type']
                                )
                              )
                      );
                      $the_query = new WP_Query( $args );
                      $return_species=array();
                      $returnTxt_infrastructure='<option value="">Select</option>';
                      if( $the_query->have_posts() ){
                          while( $the_query->have_posts() ){ 
                            $the_query->the_post(); 
                            $values= get_fields();
                            $return_species[]=$values['species'];
                        }
                    }
                    $return_species = array_filter(array_unique($return_species));
                    foreach($return_species as $res)
                    {
                      if($res==$_POST['species']) $sel='selected'; else $sel='';
                      echo '<option '.$sel.' value="'.$res.'">'.$res.'</option>';
                    }
                    ?>
                    </select>
                    </span>
                    <span id="species2_id" <?php if($_POST['sub_type']=='Bird' or $_POST['type']=='Egg Production'){ ?>style="display: none;" <?php }elseif($_POST['sub_type']==''){?>style="display: none;"<?php }?>>
                    <select class="form-control selectpicker" name="species2" id="species2" onchange="document.getElementById('species').value=this.value; get_final_tot()" >
                     <option value="">Select</option> 
                      <?php
                      $args = array(
                          'post_type' => 'animal_farm_calc',
                          'post_status' => 'publish',
                          'posts_per_page' => -1,
                          'meta_query'     =>  array(
                                array(
                                    'key'     =>  'type',
                                    'value'   =>  $_POST['type']
                                    ),
                                array(
                                    'key'     =>  'sub_type',
                                    'value'   =>  $_POST['sub_type']
                                )
                              )
                      );
                      $the_query = new WP_Query( $args );
                      $return_species=array();
                      $returnTxt_infrastructure='<option value="">Select</option>';
                      if( $the_query->have_posts() ){
                          while( $the_query->have_posts() ){ 
                            $the_query->the_post(); 
                            $values= get_fields();
                            $return_species[]=$values['species'];
                        }
                    }
                    $return_species = array_filter(array_unique($return_species));
                    foreach($return_species as $res)
                    {
                      if($res==$_POST['species']) $sel='selected'; else $sel='';
                      echo '<option '.$sel.' value="'.$res.'">'.$res.'</option>';
                    }
                    ?>
                    </select>
                    </span>
                </div>
              </div>
              <input type="hidden" name="species" id="species" value="<?php echo $_POST['species']?>">
              <span id="error_msg2" style="color: red;"></span>
            </div>

            
            

            <div class="col-12 col-md-6 col-xl-3" id="culture_system1_id" <?php if($_POST['sub_type']=='Animal'){ ?>style="display: none;" <?php }?>>
               <label>Step 2</label>
              <div class="nf-select-wrap nf-pl-30">
                <div class="nf-select-img">
                	
                  <img id="img4" src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/animal-husbandary.png" alt="fish-1">
                  
                  <span>Culture System </span>
                </div>
                <div class="nf-select-field">
                 
                  <?php 
                    $var = get_field_object('field_610ba42a3d7b2');
                    ?>
                    <select class="form-control selectpicker" name="culture_system1" id="culture_system1" onchange="document.getElementById('culture_system').value=this.value; get_final_tot();">
                      <option value="">Select</option> 
                   
                     <?php
                     if(!empty($_POST['species']) )
                    {
                        $sts_species = array(
                          'key'     =>  'species',
                          'value'    =>  $_POST['species'],
                          'compare'  => '='
                      );
                    }
                      $args = array(
                          'post_type' => 'pigeon_farm_calc',
                          'post_status' => 'publish',
                          'posts_per_page' => -1,
                          'meta_query'     =>  array(
                                array(
                                    'key'     =>  'type',
                                    'value'   =>  $_POST['type']
                                    ),
                                array(
                                    'key'     =>  'sub_type',
                                    'value'   =>  $_POST['sub_type']
                                ),
                                $sts_species
                              )
                      );
                      $the_query = new WP_Query( $args );
                      $return_species=array();
                      $returnTxt_infrastructure='<option value="">Select</option>';
                      if( $the_query->have_posts() ){
                          while( $the_query->have_posts() ){ 
                            $the_query->the_post(); 
                            $values= get_fields();
                            $return_species[]=$values['culture_system'];
                        }
                    }
                    $return_species = array_filter(array_unique($return_species));
                    foreach($return_species as $res)
                    {
                      if($res==$_POST['culture_system']) $sel='selected'; else $sel='';
                      echo '<option '.$sel.' value="'.$res.'">'.$res.'</option>';
                    }
                    ?>
                    </select>
                </div>
              </div>
              <span id="error_msg3" style="color: red;"></span>
            </div>
            <div class="col-12 col-md-6 col-xl-3" id="culture_system2_id" <?php if($_POST['sub_type']=='Bird' or $_POST['type']=='Egg Production'){ ?>style="display: none;" <?php }else if($_POST['sub_type']==''){?>style="display: none;" <?php }?>>
               <label>Step 2</label>
              <div class="nf-select-wrap nf-pl-30">
                <div class="nf-select-img">
                	
                  <img id="img5" src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/animal-husbandary.png" alt="fish-1">
                  
                  <span>Culture System </span>
                </div>
                <div class="nf-select-field">
                 
                  <?php 
                    $var = get_field_object('field_610ba4de3d7b3');
                    ?>
                    <select class="form-control selectpicker" name="culture_system2" id="culture_system2" onchange="document.getElementById('culture_system').value=this.value; get_final_tot();" >
                   <option value="">Select</option> 
                      <?php
                      $args = array(
                          'post_type' => 'animal_farm_calc',
                          'post_status' => 'publish',
                          'posts_per_page' => -1,
                          'meta_query'     =>  array(
                                array(
                                    'key'     =>  'type',
                                    'value'   =>  $_POST['type']
                                    ),
                                array(
                                    'key'     =>  'sub_type',
                                    'value'   =>  $_POST['sub_type']
                                ),
                                $sts_species
                              )
                      );
                      $the_query = new WP_Query( $args );
                      $return_species=array();
                      $returnTxt_infrastructure='<option value="">Select</option>';
                      if( $the_query->have_posts() ){
                          while( $the_query->have_posts() ){ 
                            $the_query->the_post(); 
                            $values= get_fields();
                            $return_species[]=$values['culture_system'];
                        }
                    }
                    $return_species = array_filter(array_unique($return_species));
                    foreach($return_species as $res)
                    {
                      if($res==$_POST['culture_system']) $sel='selected'; else $sel='';
                      echo '<option '.$sel.' value="'.$res.'">'.$res.'</option>';
                    }
                    ?>
                    </select>
                </div>
              </div>
              <input type="hidden" name="culture_system" id="culture_system" value="<?php echo $_POST['culture_system']?>">
              <span id="error_msg4" style="color: red;"></span>
            </div>
            <div class="col-12 col-md-6 col-xl-3">
               <label>Step 3</label>
              <div class="nf-select-wrap nf-pl-30">
                <div class="nf-select-img">
                  <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/home/tot-icon.png" alt="wave">
                  <span id="totid">Total <?php echo $_POST['sub_type']?></span>
                </div>
                <div class="nf-select-field">
                  <input type="number"  name="total" id="total" value="<?php echo $_POST['total'];?>" class="form-control selectpicker" onchange="get_final_tot()">
                  <input type="hidden" id="hiddentot" name="hiddentot" value="<?php echo $_POST['hiddentot']?>">
                </div>
              </div>
              <span id="error_msg1" style="color: red;"></span>
            </div>
            <div class="col-12 col-md-6 col-xl-3" style="display: none;">
               <label>Step 4</label>
              <div class="nf-select-wrap nf-pl-30">
                <div class="nf-select-img">
                  <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/home/wave.png" alt="wave">
                  <span id="ftotid">Final Total <?php echo $_POST['sub_type']?></span>
                </div>
                <div class="nf-select-field">
                  <input type="number" name="final_total" id="final_total" value="<?php echo $_POST['final_total'];?>" class="form-control selectpicker" readonly>
                </div>
              </div>
              
            </div>
          </div>

          <div class="row mb-2">
            <div class="col-12 nf-button-wrapper">
              <button type="submit" class="nf-button-v-small" onclick="return validation_function()">Calculate Now</button>
            </div>
          </div>
        </div>

        <?php if(!empty($_POST)){?>
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
                     <h4><img src="<?php echo get_template_directory_uri(). '/assets/'?>img/home/imgbin.jpg" alt="wave-white"> Total <?php echo $_POST['sub_type']?> <strong><?php echo $_POST['total']?> </strong></h4>
                   </div>
                 </div>
                 <div class="">
                   <div class="nf-wave-inner-wrap">
                   	
                     <h4><img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/animal-husbandary-wht.png" alt="fish-blue"> Species <span><?php echo $_POST['species']?> </span></h4>
                
                   </div>
                 </div>
                  
                  <div class="">
                   <div class="nf-wave-inner-wrap">
                   	
                     <h4><img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/animal-husbandary-wht.png" alt="fish-blue"> Culture System <span><?php if($_POST['culture_system']!=''){ echo $_POST['culture_system'];}else echo '-';?> </span></h4>
                     
                   </div>
                 </div>

                 <!--<div class="">
                   <div class="nf-wave-inner-wrap">
                     <h4><img src="<?php //echo get_template_directory_uri(). '/assets/'?>img/home/wave-white.png" alt="wave-white"> Final Total <?php //echo $_POST['sub_type']?> <strong><?php //echo $_POST['final_total']?> </strong></h4>
                   </div>
                 </div>-->
                
                 
                  <!--<div class="">
                   <div class="nf-wave-inner-wrap">
                     <h4><img src="<?php //echo get_template_directory_uri(). '/assets/'?>img/home/fish-blue.png" alt="fish-blue"> Culture Medium <span><?php  //if($_POST['culture_medium']!=''){ echo $_POST['culture_medium'];}else echo '-';?> </span></h4>
                   </div>
                 </div>-->
               
               </div>
             </div>
             </div>
           </div>
         <?php }?>

        <?php
        $total = $_POST['total'];
        $cptitalcost=0;
        $recurringcost=0;
        $incomecost=0;
        $profitcost=0;
        while($blog_posts->have_posts()) {
                $blog_posts->the_post(); 

                $values= get_fields();
                $record++;

                //capita cost
                $ccost1 = get_post_meta( $post->ID, '_event_capital_value_key', true );
                $ccost2 = get_post_meta( $post->ID, '_event_crate_value_key', true );
                $ccost3 = get_post_meta( $post->ID, '_event_cvalue_value_key', true );
                $ccost4 = get_post_meta( $post->ID, '_event_cmult_value_key', true );

                if(!empty($ccost1)) { 
                    $ccost1_val = explode('*****',$ccost1);
                    $ccost2_val = explode('*****',$ccost2);
                    $ccost3_val = explode('*****',$ccost3);
                    $ccost4_val = explode('*****',$ccost4);

                    for($i=0;$i<count($ccost1_val);$i++) 
                    {
                        if($ccost4_val[$i]=='Yes' && $total!='') 
                        $ccost3_val_cost = $ccost3_val[$i]*$total;
                        else $ccost3_val_cost = $ccost3_val[$i];

                        $cptitalcost = $cptitalcost+$ccost3_val_cost;
                    }
                }
                //Recurring cost
                $rcost1 = get_post_meta( $post->ID, '_event_recurring_value_key', true );
                $rcost2 = get_post_meta( $post->ID, '_event_rrate_value_key', true );
                $rcost3 = get_post_meta( $post->ID, '_event_rvalue_value_key', true );
                $rcost4 = get_post_meta( $post->ID, '_event_rmult_value_key', true );

                if(!empty($rcost1)) { 
                    $rcost1_val = explode('*****',$rcost1);
                    $rcost2_val = explode('*****',$rcost2);
                    $rcost3_val = explode('*****',$rcost3);
                    $rcost4_val = explode('*****',$rcost4);

                    for($i=0;$i<count($rcost1_val);$i++) 
                    {
                        if($rcost4_val[$i]=='Yes' && $total!='') 
                        $rcost3_val_cost = $rcost3_val[$i]*$total;
                        else $rcost3_val_cost = $rcost3_val[$i];

                        $recurringcost = $recurringcost+$rcost3_val_cost;
                    }
                }
                //Income profit cost
                $icost1 = get_post_meta( $post->ID, '_event_income_value_key', true );
                $icost2 = get_post_meta( $post->ID, '_event_irate_value_key', true );
                $icost3 = get_post_meta( $post->ID, '_event_ivalue_value_key', true );
                $icost4 = get_post_meta( $post->ID, '_event_imult_value_key', true );

                if(!empty($icost1)) { 
                    $icost1_val = explode('*****',$icost1);
                    $icost2_val = explode('*****',$icost2);
                    $icost3_val = explode('*****',$icost3);
                    $icost4_val = explode('*****',$icost4);

                    for($i=0;$i<count($icost1_val);$i++) 
                    {
                        if($icost4_val[$i]=='Yes' && $total!='') 
                        $icost3_val_cost = $icost3_val[$i]*$total;
                        else $icost3_val_cost = $icost3_val[$i];

                        $incomecost = $incomecost+$icost3_val_cost;
                    }
                }
                       

        ?>
           
        <div class="row">
          <div class="col-12">
            <div class="nf-product-block nf-plan-block">
              <div class="nf-cost-list nf-cost-list-2">
                <div class="row">
                  <div class="col-12 col-md-3">
                  <h5>Capital Investment </h5>
                                <h2 class="nf-orange-block"><?php echo $cptitalcost;?></h2>
                </div>
                  <div class="col-12 col-md-3">
                  <h5>Recurring Cost </h5>
                                <h2 class="nf-green-block"><?php echo $recurringcost;?></h2>
                </div>
                  <div class="col-12 col-md-3">
                  <h5>Total Income After One Cycle </h5>
                                <h2 class="nf-voilet-block"><?php echo $incomecost;?></h2>
                </div>
                <div class="col-12 col-md-3">
                  <h5>Profit After One Cycle</h5>
                <h2 class="nf-pink-block"><?php echo $incomecost-$recurringcost;?></h2>
                </div>

                <div class="col-12 col-md-3">
                  <h5>Profit Per <?php echo $_POST['sub_type']?> </h5>
                <h2 class="nf-pink-block"><?php echo number_format(($incomecost-$recurringcost)/$_POST['final_total'],2, '.', '');?></h2>
                </div>

                <div class="col-12 col-md-3">
                  <h5>Total Profit After 5 Cycle <?php /*?>IN (<?php echo $_POST['final_total']?>X5)=<?php echo $_POST['final_total']*5; ?><?php */?> </h5>
                <h2 class="nf-voilet-block"><?php echo number_format((($incomecost-$recurringcost)/$_POST['final_total'])*5*$_POST['final_total'],2, '.', '');?></h2>
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
                            Capital Investment (In Lacs) 
                          </a>
                        </h4>
                      </div>
                      <div id="projectcost" class="panel-collapse collapse show" role="tabpanel" aria-labelledby="headingOne">
                        <div class="panel-body">
                          <div class="table-responsive ">
                            <table class="table table_border_0 nf-strong-600">
                              <tbody>
                              <?php
                                if(!empty($ccost1))
                                { 
                                    for($i=0;$i<count($ccost1_val);$i++) 
                                    {
                                      if($ccost4_val[$i]=='Yes' && $total!='') 
                                      $ccost3_val_cost = $ccost3_val[$i]*$total;
                                      else $ccost3_val_cost = $ccost3_val[$i];
                                    ?>
                                    <tr>
                                      <td><?php echo $ccost1_val[$i].' '.$ccost2_val[$i]; ?></td>
                                      <td align="right"><?php echo $ccost3_val_cost;?></td>
                                    </tr>
                                    <?php
                                    }
                                }
                                ?>
                                
                                <tr class="bg-gray nf-strong">
                                  <td>Total</td>
                                  <td align="right"><?php echo $cptitalcost;?></td>
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

                                <?php
                                if(!empty($rcost1))
                                { 
                                    for($i=0;$i<count($rcost1_val);$i++) 
                                    {
                                      if($rcost4_val[$i]=='Yes' && $total!='') 
                                      $rcost3_val_cost = $rcost3_val[$i]*$total;
                                      else $rcost3_val_cost = $rcost3_val[$i];
                                    ?>
                                    <tr>
                                      <td><?php echo $rcost1_val[$i].' '.$rcost2_val[$i]; ?></td>
                                      <td align="right"><?php echo $rcost3_val_cost;?></td>
                                    </tr>
                                    <?php
                                    }
                                }
                                ?>
                                
                                <tr class="bg-gray nf-strong">
                                  <td>Total</td>
                                  <td align="right"><?php echo $recurringcost;?></td>
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

                                <?php
                                if(!empty($icost1))
                                { 
                                    for($i=0;$i<count($icost1_val);$i++) 
                                    {
                                      if($icost4_val[$i]=='Yes' && $total!='') 
                                      $icost3_val_cost = $icost3_val[$i]*$total;
                                      else $icost3_val_cost = $icost3_val[$i];
                                    ?>
                                    <tr>
                                      <td><?php echo $icost1_val[$i].' '.$icost2_val[$i]; ?></td>
                                      <td align="right"><?php echo $icost3_val_cost;?></td>
                                    </tr>
                                    <?php
                                    }
                                }
                                ?>
                                
                                <tr class="bg-gray nf-strong">
                                  <td>Total revenue</td>
                                  <td align="right"><?php echo $incomecost;?></td>
                                </tr>
                               
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="clear">&nbsp;</div>
                  <?php 
                  $assumption = $values['assumption'];
                  if($assumption!=''){?>
                  <div class="col-12 col-lg-12 mb-3 mb-lg-0">
                    <div class="panel panel-default">
                      <div class="panel-heading accordion_bg_10" role="tab" id="headingOne1">
                        <h4 class="panel-title mb-0">
                          <a role="button" data-toggle="collapse" data-parent="#accordion" href="#projectcost1" aria-expanded="true" aria-controls="projectcost1">
                            Assumptions
                          </a>
                        </h4>
                      </div>
                      <div id="projectcost1" class="panel-collapse collapse show" role="tabpanel" aria-labelledby="headingOne1">
                        <div class="panel-body">
                          <?php if($assumption!='') echo $assumption; ?>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php }?>

                </div>
              </div>
            </div>
          </div>
        <?php }
         if($record==0 && !empty($_POST)) echo '<b>Record Not Found</b>';
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
document.body.scrollTop = 500;
document.documentElement.scrollTop =500;


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
       if($('#sub_type').val()=='')
       {
           // alert('hjghj');
           error_msg6.textContent = "*Please select sub type ";
           flag= false;
       }

       if($('#total').val()=='')
       {
           // alert('hjghj');
           error_msg1.textContent = "*Please enter total ";
           flag= false;
       }
       //alert($('#total').val()+' > '+$('#hiddentot').val());
       //if($('#total').val()!='' && (($('#total').val()<$('#hiddentot').val() && ($('#sub_type').val()=='Bird' || $('#type').val()=='Egg Production')) || ($('#total').val()<$('#hiddentot').val() && $('#sub_type').val()=='Animal')))
       if($('#total').val()!='' && parseFloat($('#total').val())<parseFloat($('#hiddentot').val()))
       {
           // alert('hjghj');
           //if($('#sub_type').val()=='Animal')
           error_msg1.textContent = "*Please enter value "+$('#hiddentot').val()+" or greater than "+$('#hiddentot').val()+" ";
           //else 
           //error_msg1.textContent = "*Please enter value "+$('#hiddentot').val()+" or greater than "+$('#hiddentot').val()+" ";
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
           error_msg4.textContent = "*Please select culture system ";
           flag= false;
       }
       
       return flag;
}
$('#sub_type').change(function(){

  if(this.value=='Bird')
  {

  	

    $('#totid').html('Total Bird');
    $('#ftotid').html('Final Total Bird');
    $('#culture_system1_id').show();
    $('#culture_system2_id').hide();
    $('#culture_system').val('');
    $('#culture_system1').val('');
    $('#culture_system2').val('');

    $('#species1_id').show();
    $('#species2_id').hide();

    $('#species1').val('');
    $('#species2').val('');

    $('#species').val('');
    $('.selectpicker').selectpicker({ noneSelectedText : 'Select' });
    $('.selectpicker').selectpicker('refresh');
  }
  else
  {

    $('#totid').html('Total Animal');
    $('#ftotid').html('Final Total Animal');

    $('#culture_system1_id').hide();
    $('#culture_system2_id').show();
    $('#culture_system').val('');
    $('#culture_system1').val('');
    $('#culture_system2').val('');

    $('#species1_id').hide();
    $('#species2_id').show();
    $('#species1').val('');
    $('#species2').val('');
    $('#species').val('');
    $('.selectpicker').selectpicker({ noneSelectedText : 'Select' });
    $('.selectpicker').selectpicker('refresh');
  }

  if($('#type').val()!='' && $('#sub_type').val()!=''){
    $('#preloader-loader').css("display", "block");
    $.ajax({
        data: {"type": $('#type').val(),"sub_type": $('#sub_type').val(), 'action': 'my_action_get_cost_calc_animal'},
        url: "<?php echo site_url()?>/wp-admin/admin-ajax.php",
        type: "post",
        success: function(data) {
           //alert(data);
           var res = data.split('*****');

           if($('#sub_type').val()=='Bird') $('#species1').html(res[0]); else $('#species2').html(res[0]);
           if($('#sub_type').val()=='Bird') $('#culture_system1').html(res[1]); else $('#culture_system2').html(res[1]);
           $('.selectpicker').selectpicker({ noneSelectedText : 'Select' });
           $('.selectpicker').selectpicker('refresh');
           $('#preloader-loader').css("display", "none");
        }
    });
  }
  
});

$('#type').change(function(){

 // alert(this.value)

  if(this.value=='Meat Production')
  {
    $('#sub_type').html('<option value="">Select</option><option value="Bird">Bird</option><option value="Animal">Animal</option>');
  }
  if(this.value=='Dairy Production')
  {
    $('#sub_type').html('<option value="">Select</option><option value="Animal">Animal</option>');
  }
  if(this.value=='Wool Production')
  {
    $('#sub_type').html('<option value="">Select</option><option value="Animal">Animal</option>');
  }
  if(this.value=='Breeding')
  {
    $('#sub_type').html('<option value="">Select</option><option value="Bird">Bird</option><option value="Animal">Animal</option>');
  }
  if(this.value=='Egg Production')
  {
    $('#sub_type').html('<option value="">Select</option><option value="For Food">For Food</option><option value="For Breeding">For Breeding</option>');
  }
  $('.selectpicker').selectpicker({ noneSelectedText : 'Select' });
   $('.selectpicker').selectpicker('refresh');

}); 


function get_final_tot()
{
//&& $('#total').val()!=''
  if($('#type').val()!='' && $('#sub_type').val()!=''  && $('#species').val()!='' && $('#culture_system').val()!=''){

  $('#preloader-loader').css("display", "block");

          $.ajax({
              data: {"type": $('#type').val(),"sub_type":$('#sub_type').val(),"total":$('#total').val(),"species":$('#species').val(),"culture_system":$('#culture_system').val(), 'action': 'my_action_get_final_tot_cost_calculate'},
              url: "<?php echo site_url()?>/wp-admin/admin-ajax.php",
              type: "post",
              success: function(data) {
                 //alert(data);
                 var res = data.split('*****');
                 $('#final_total').val(res[0]);
                 $('#hiddentot').val(res[1]);
                // $('#total').val('');
                 document.getElementById("error_msg1").textContent='';
                 $('#preloader-loader').css("display", "none");
                 document.getElementById("error_msg1").textContent='';
              }
          });
  }
}

$('#species1').change(function(){
    $('#preloader-loader').css("display", "block");
    $.ajax({
        data: {"type": $('#type').val(),"sub_type": $('#sub_type').val(),"species":$('#species1').val(), 'action': 'my_action_get_cost_calc_animal'},
        url: "<?php echo site_url()?>/wp-admin/admin-ajax.php",
        type: "post",
        success: function(data) {
           //alert(data);
           $('#culture_system').val('');
           $('#culture_system1').val('');
           $('#culture_system2').val('');
           var res = data.split('*****');

           if($('#species1').val()!='')
           {
              if($('#sub_type').val()=='Bird') $('#culture_system1').html(res[0]); else $('#culture_system2').html(res[0]);
           }
           $('.selectpicker').selectpicker({ noneSelectedText : 'Select' });
           $('.selectpicker').selectpicker('refresh');
           $('#preloader-loader').css("display", "none");
        }
    });
  });
  $('#species2').change(function(){
    $('#preloader-loader').css("display", "block");
    $.ajax({
        data: {"type": $('#type').val(),"sub_type": $('#sub_type').val(),"species":$('#species2').val(), 'action': 'my_action_get_cost_calc_animal'},
        url: "<?php echo site_url()?>/wp-admin/admin-ajax.php",
        type: "post",
        success: function(data) {
           //alert(data);
           $('#culture_system').val('');
           $('#culture_system1').val('');
           $('#culture_system2').val('');
           var res = data.split('*****');

           if($('#species2').val()!='')
           {
              if($('#sub_type').val()=='Bird') $('#culture_system1').html(res[0]); else $('#culture_system2').html(res[0]);
           }

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