<?php /*Template Name: Horticulture Cost Calculate */ ?>
<?php get_header(); 

$page_data = get_page_by_path( 'horticulture-cost-calculator' );

$record=0;

if($_POST['ftype']=='Integrated')
{
		$blog_args = array(
                            'post_type' => 'integrated_farm_calc',
                            'post_status' => 'publish',
                            'posts_per_page' => '1',
                            'meta_query'     =>  array(
                                array(
                                    'key'     =>  'type',
                                    'value'   =>  $_POST['type']
                                    ),
                                array(
                                    'key'     =>  'fish_species',
                                    'value'   =>  $_POST['fish_species']
                                ),
                                array(
                                    'key'     =>  'bird_species',
                                    'value'   =>  $_POST['bird_species']
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
}
else
{
	if(!empty($_POST['species']) )
    {
        $sts_species = array(
          'key'     =>  'species',
          'value'    =>  $_POST['species'],
          'compare'  => '='
      );
    }

	$blog_args = array(
                            'post_type' => 'horticulture_calc',
                            'post_status' => 'publish',
                            'posts_per_page' => '1',
                            'meta_query'     =>  array(
                                array(
                                    'key'     =>  'type',
                                    'value'   =>  $_POST['type']
                                    ),
                                $sts_species
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
          <li class="breadcrumb-item active">Horticulture</li>
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
  <form method="post" id="form_id" action="<?php echo site_url()?>/horticulture-cost-calculator">
    <input type="hidden" name="ftype" id="ftype" value="<?php echo $_POST['ftype']?>">
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
                <input type="radio" id="customRadioInline1" name="cost_type" class="custom-control-input" value="Fishery" onclick="window.location='<?php echo site_url()?>/cost-calculate'">
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
                <input type="radio" id="customRadioInline2" name="cost_type" class="custom-control-input"  checked="" value="Horticulture">
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
                <input type="radio" id="customRadioInline3" name="cost_type" class="custom-control-input"  value="Animal Husbandry" onclick="window.location='<?php echo site_url()?>/animal-husbandry-cost-calculator'">
                <label class="custom-control-label" for="customRadioInline3" >
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
                  <?php if($_POST['type']=='Mushroom'){ ?>
                  <img id="img1" src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/mushroom.png" alt="fish-1">
                <?php }
                else if($_POST['type']=='Floriculture'){ ?>
                  <img id="img1" src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/floriculture.png" alt="fish-1">
                <?php }
                  else if($_POST['ftype']!='Integrated'){ ?>
                  <img id="img1" src="<?php echo get_template_directory_uri(). '/assets/'?>img/home/flower-blue.png" alt="fish-1">
                <?php }else{?>
                  <img id="img1" src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/irrigation.png" alt="fish-1">
                <?php }?>
                  <span>Type </span>
                </div>
                <div class="nf-select-field">
                  <?php 
                    //$var = get_field_object('field_610ba2e93d7ae');
                    $j=0;
                    ?>
                    <select class="form-control selectpicker" name="type" id="type">
                   
                     <option value="">Select</option>
                      
                      <?php
                     $var['choices'] = array('Fruits','Vegetables','Spices','Exotic Spices','Floriculture','Integrated','Hi-Tech','Traditional','Organic Farming'); //'Mushroom','Apiculture',
                     
                     foreach($var['choices'] as $choice)
                      {
                        if($choice==$_POST['type']) $sel='selected'; else $sel='';
                        //if($j!=6) $selz='disabled'; else 
                        $selz='';
                       echo '<option '.$sel.' '.$selz.' value="'.$choice.'">'.$choice.'</option>';
                       $j++;
                      }
                      ?>
                    </select>

                </div>
              </div>
              <span id="error_msg5" style="color: red;"></span>
            </div>
            
            
          
          </div>
        </div>

        
        <div class="nf-form-wrap">
        <span id="integratedID" <?php if($_POST['ftype']!='Integrated'){ ?>style="display: none;"<?php }?>>
          <div class="row">
            
            
            <div class="col-12 col-md-6 col-xl-3">
              <label>Step 1</label>

              <div class="nf-select-wrap nf-pl-30">
                <div class="nf-select-img">
                  <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/irrigation.png" alt="fish-1">
                  <span>Fish Species </span>
                </div>
                <div class="nf-select-field">
                    <select class="form-control selectpicker" name="fish_species" id="fish_species" >
                     <option value="">Select</option> 
                      <?php
                       if(!empty($_POST['type']) )
                      {
                          $sts_type = array(
                            'key'     =>  'type',
                            'value'    =>  $_POST['type'],
                            'compare'  => '='
                        );
                      }
                      $args = array(
                          'post_type' => 'integrated_farm_calc',
                          'posts_per_page' => -1,
                          'post_status' => 'publish',
                          'meta_query'     =>  array(
                            $sts_type
                          )
                      );
                      $the_query = new WP_Query( $args );
                      $return_species=array();
                      $returnTxt_infrastructure='<option value="">Select</option>';
                      if( $the_query->have_posts() ){
                          while( $the_query->have_posts() ){ 
                            $the_query->the_post(); 
                            $values= get_fields();
                            $return_species[]=$values['fish_species'];
                        }
                    }
                    $return_species = array_filter(array_unique($return_species));
                    foreach($return_species as $res)
                    {
                      if($res==$_POST['fish_species']) $sel='selected'; else $sel='';
                      echo '<option '.$sel.' value="'.$res.'">'.$res.'</option>';
                    }
                    ?>
                    </select>
                   
                </div>
              </div>
              <span id="error_msg2" style="color: red;"></span>
            </div>
            <div class="col-12 col-md-6 col-xl-3">
              <label>Step 2 </label>

              <div class="nf-select-wrap nf-pl-30">
                <div class="nf-select-img">
                  <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/irrigation.png" alt="fish-1">
                  <span>Bird Species </span>
                </div>
                <div class="nf-select-field">
                    <select class="form-control selectpicker" name="bird_species" id="bird_species" >
                     <option value="">Select</option> 
                      <?php
                      if(!empty($_POST['type']) )
                      {
                          $sts_type = array(
                            'key'     =>  'type',
                            'value'    =>  $_POST['type'],
                            'compare'  => '='
                        );
                      }
                      if(!empty($_POST['fish_species']) )
                      {
                          $sts_fish_species = array(
                            'key'     =>  'fish_species',
                            'value'    =>  $_POST['fish_species'],
                            'compare'  => '='
                        );
                      }
                      $args = array(
                          'post_type' => 'integrated_farm_calc',
                          'posts_per_page' => -1,
                          'post_status' => 'publish',
                          'meta_query'     =>  array(
                            $sts_type,
                            $sts_fish_species
                          )
                      );
                      $the_query = new WP_Query( $args );
                      $return_species=array();
                      $returnTxt_infrastructure='<option value="">Select</option>';
                      if( $the_query->have_posts() ){
                          while( $the_query->have_posts() ){ 
                            $the_query->the_post(); 
                            $values= get_fields();
                            $return_species[]=$values['bird_species'];
                        }
                    }
                    $return_species = array_filter(array_unique($return_species));
                    foreach($return_species as $res)
                    {
                      if($res==$_POST['bird_species']) $sel='selected'; else $sel='';
                      echo '<option '.$sel.' value="'.$res.'">'.$res.'</option>';
                    }
                    ?>
                    </select>
                   
                </div>
              </div>
              <span id="error_msg7" style="color: red;"></span>
            </div>

            <div class="col-12 col-md-6 col-xl-3" >
               <label>Step 3</label>
              <div class="nf-select-wrap nf-pl-30">
                <div class="nf-select-img">
                  <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/irrigation.png" alt="fish-1">
                  <span>Culture System </span>
                </div>
                <div class="nf-select-field">
                 
                    <select class="form-control selectpicker" name="culture_system" id="culture_system">
                   
                     <option value="">Select</option> 
                      <?php
                      if(!empty($_POST['type']) )
                      {
                          $sts_type = array(
                            'key'     =>  'type',
                            'value'    =>  $_POST['type'],
                            'compare'  => '='
                        );
                      }
                      if(!empty($_POST['fish_species']) )
                      {
                          $sts_fish_species = array(
                            'key'     =>  'fish_species',
                            'value'    =>  $_POST['fish_species'],
                            'compare'  => '='
                        );
                      }
                      if(!empty($_POST['bird_species']) )
                      {
                          $sts_bird_species = array(
                            'key'     =>  'bird_species',
                            'value'    =>  $_POST['bird_species'],
                            'compare'  => '='
                        );
                      }
                      $args = array(
                          'post_type' => 'integrated_farm_calc',
                          'posts_per_page' => -1,
                          'post_status' => 'publish',
                          'meta_query'     =>  array(
                            $sts_type,
                            $sts_fish_species,
                            $sts_bird_species
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
            <div class="col-12 col-md-6 col-xl-3" >
               <label>Step 4</label>
              <div class="nf-select-wrap nf-pl-30">
                <div class="nf-select-img">
                  <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/irrigation.png" alt="fish-1">
                  <span>Culture Medium </span>
                </div>
                <div class="nf-select-field">
                    <select class="form-control selectpicker" name="culture_medium" id="culture_medium">
                   
                     <option value="">Select</option> 
                      <?php
                      if(!empty($_POST['type']) )
                      {
                          $sts_type = array(
                            'key'     =>  'type',
                            'value'    =>  $_POST['type'],
                            'compare'  => '='
                        );
                      }
                      if(!empty($_POST['fish_species']) )
                      {
                          $sts_fish_species = array(
                            'key'     =>  'fish_species',
                            'value'    =>  $_POST['fish_species'],
                            'compare'  => '='
                        );
                      }
                      if(!empty($_POST['bird_species']) )
                      {
                          $sts_bird_species = array(
                            'key'     =>  'bird_species',
                            'value'    =>  $_POST['bird_species'],
                            'compare'  => '='
                        );
                      }
                      if(!empty($_POST['culture_system']) )
                      {
                          $sts_culture_system = array(
                            'key'     =>  'culture_system',
                            'value'    =>  $_POST['culture_system'],
                            'compare'  => '='
                        );
                      }
                      $args = array(
                          'post_type' => 'integrated_farm_calc',
                          'posts_per_page' => -1,
                          'post_status' => 'publish',
                          'meta_query'     =>  array(
                            $sts_type,
                            $sts_fish_species,
                            $sts_bird_species,
                            $sts_culture_system
                          )
                      );
                      $the_query = new WP_Query( $args );
                      $return_species=array();
                      $returnTxt_infrastructure='<option value="">Select</option>';
                      if( $the_query->have_posts() ){
                          while( $the_query->have_posts() ){ 
                            $the_query->the_post(); 
                            $values= get_fields();
                            $return_species[]=$values['culture_medium'];
                        }
                    }
                    $return_species = array_filter(array_unique($return_species));
                    foreach($return_species as $res)
                    {
                      if($res==$_POST['culture_medium']) $sel='selected'; else $sel='';
                      echo '<option '.$sel.' value="'.$res.'">'.$res.'</option>';
                    }
                    ?>
                    </select>
                </div>
              </div>
              <span id="error_msg4" style="color: red;"></span>
            </div>
            <div class="col-12 col-md-6 col-xl-3">
               <label >Step 5</label>
              <div class="nf-select-wrap nf-pl-30">
                <div class="nf-select-img">
                  <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/home/wave.png" alt="wave">
                  <span>Water Areas (in Ha)</span>
                </div>
                <div class="nf-select-field">
                  <input type="number"   name="water_area" id="water_area" value="<?php echo $_POST['water_area'];?>" class="form-control selectpicker">
                  
                </div>
              </div>
              <span id="error_msg1" style="color: red;"></span>
            </div>
           </div>
           </span>


            <span id="otherID"  <?php if($_POST['ftype']=='Integrated'){ ?>style="display: none;"<?php }?>>
            <div class="row">
            
            <div class="col-12 col-md-6 col-xl-3">
              <label>Step 1</label>

              <div class="nf-select-wrap nf-pl-30">
                <div class="nf-select-img">

                <?php if($_POST['type']=='Mushroom'){ ?>
                  <img id="img2" src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/mushroom.png" alt="fish-1">
                <?php }
                else if($_POST['type']=='Floriculture'){ ?>
                  <img id="img2" src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/floriculture.png" alt="fish-1">
                <?php }else{?>
                  <img id="img2" src="<?php echo get_template_directory_uri(). '/assets/'?>img/home/flower-blue.png" alt="fish-1">
                <?php }?>
                  
                  <span> Species </span>
                </div>
                <div class="nf-select-field">
                    <select class="form-control selectpicker" name="species" id="species" >
                     <option value="">Select</option> 
                      <?php
                      if(!empty($_POST['type']) )
                      {
                          $sts_type = array(
                            'key'     =>  'type',
                            'value'    =>  $_POST['type'],
                            'compare'  => '='
                        );
                      }
                      $args = array(
                          'post_type' => 'horticulture_calc',
                          'posts_per_page' => -1,
                          'post_status' => 'publish',
                          'meta_query'     =>  array(
                                $sts_type
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
                   
                </div>
              </div>
              <span id="error_msg55" style="color: red;"></span>
            </div>
            <div class="col-12 col-md-6 col-xl-3">
               <label>Step 2</label>
              <div class="nf-select-wrap nf-pl-30">
                <div class="nf-select-img">
                  <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/land.png" alt="wave">
                  <span>Total Areas (in Ha)</span>
                </div>
                <div class="nf-select-field">
                  <input type="number"   name="water_area1" id="water_area1" value="<?php echo $_POST['water_area1'];?>" class="form-control selectpicker" onchange="document.getElementById('water_area').value=this.value;">
                </div>
              </div>
              <span id="error_msg11" style="color: red;"></span>
            </div>
        	</div>
        	</span>
          <input type="hidden" id="hiddentot" name="hiddentot" value="<?php echo $_POST['hiddentot']?>">

          

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
                   	<?php if($_POST['ftype']=='Integrated'){?>
                     <h4><img src="<?php echo get_template_directory_uri(). '/assets/'?>img/home/wave-white.png" alt="wave-white">Water Areas in HA <strong><?php echo $_POST['water_area']?> </strong></h4>
                     <?php }else{?>
                     <h4><img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/land.png" alt="wave-white">Total Areas in HA <strong><?php echo $_POST['water_area']?> </strong></h4>
                 <?php }?>
                   </div>
                 </div>
                 <div class="">
                   <div class="nf-wave-inner-wrap">
                    <?php if($_POST['type']=='Mushroom'){ ?>
                      <h4><img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/mushroom-wht.png" alt="fish-blue"> Species <span><?php echo $_POST['species']?> </span></h4>
                     <?php }
                      else if($_POST['type']=='Floriculture'){ ?>
                        <h4><img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/floriculture-wht.png" alt="fish-blue"> Species <span><?php echo $_POST['species']?> </span></h4>
                     <?php } 
                   	 else if($_POST['ftype']=='Integrated'){?>
                     <h4><img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/irrigation-wht.png" alt="fish-blue">Fish Species <span><?php echo $_POST['fish_species']?> </span></h4>
                 <?php }else{?>
                 	<h4><img src="<?php echo get_template_directory_uri(). '/assets/'?>img/home/flower.png" alt="fish-blue">Species <span><?php echo $_POST['species']?> </span></h4>
                 <?php }?>
                   </div>
                 </div>
                 <?php if($_POST['ftype']=='Integrated'){?>
                 <div class="">
                   <div class="nf-wave-inner-wrap">
                     <h4><img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/irrigation-wht.png" alt="fish-blue">Bird Species <span><?php echo $_POST['bird_species']?> </span></h4>
                   </div>
                 </div>
                  <?php }?>
                  <?php if($_POST['ftype']=='Integrated'){?>
                  <div class="">
                   <div class="nf-wave-inner-wrap">
                     <h4><img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/irrigation-wht.png" alt="fish-blue"> Culture System <span><?php if($_POST['culture_system']!=''){ echo $_POST['culture_system'];}else echo '-';?> </span></h4>
                   </div>
                 </div>
                <?php }?>
                  <?php if($_POST['ftype']=='Integrated'){?>
                  <div class="">
                   <div class="nf-wave-inner-wrap">
                     <h4><img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/irrigation-wht.png" alt="fish-blue"> Culture Medium <span><?php  if($_POST['culture_medium']!=''){ echo $_POST['culture_medium'];}else echo '-';?> </span></h4>
                   </div>
                 </div>
               <?php }?>
               </div>
             </div>
             </div>
           </div>
         <?php }?>

        <?php
        $water_area = $_POST['water_area'];
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
                        if($ccost4_val[$i]=='Yes' && $water_area!='') 
                        $ccost3_val_cost = $ccost3_val[$i]*$water_area;
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
                        if($rcost4_val[$i]=='Yes' && $water_area!='') 
                        $rcost3_val_cost = $rcost3_val[$i]*$water_area;
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
                    	if($_POST['ftype']=='Integrated')
                    	{
	                        if($icost4_val[$i]=='Yes' && $water_area!='') 
	                        $icost3_val_cost = $icost3_val[$i]*$water_area;
	                        else $icost3_val_cost = $icost3_val[$i];

	                        $incomecost = $incomecost+$icost3_val_cost;
                    	}
                    	else
                    	{
                    		if($icost4_val[$i]=='Yes' && $icost3_val[$i-1]!='') 
	                        $icost3_val_cost = $icost3_val[$i]*$icost3_val[$i-1];
	                        else $icost3_val_cost = 0;

	                        $incomecost = $incomecost+$icost3_val_cost;
                    	}
                      if($_POST['ftype']!='Integrated') $incomecost = $incomecost*$water_area;
                    }
                }
                       

        ?>
           
        <div class="row">
          <div class="col-12">
            <div class="nf-product-block nf-plan-block">
              <div class="nf-cost-list nf-cost-list-2">
              	<?php if($_POST['ftype']=='Integrated'){?>
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
                  <h5>Profit After One Cycle </h5>
                <h2 class="nf-pink-block"><?php echo $incomecost-$recurringcost;?></h2>
               </div>
              </div>
               <?php }else{?>

               <div class="row">
                  <div class="col-12 col-md-4">
                  <h5>Cost of Cultivation </h5>
                                <h2 class="nf-orange-block"><?php echo $cptitalcost;?></h2>
                </div>
                  
                  <div class="col-12 col-md-4">
                  <h5>Total Income  </h5>
                        <h2 class="nf-voilet-block"><?php echo $incomecost;?></h2>
                </div>
                  <div class="col-12 col-md-4">
                  <h5>Profit  </h5>
                <h2 class="nf-pink-block"><?php echo $incomecost-$cptitalcost;?></h2>
               </div>
              </div>

              <?php }?>
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
                           <?php if($_POST['ftype']=='Integrated'){?> Capital Investment (In Lacs) <?php }else{?>Cost of Cultivation <?php }?>
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
                                      if($ccost4_val[$i]=='Yes' && $water_area!='') 
                                      $ccost3_val_cost = $ccost3_val[$i]*$water_area;
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
                  <?php if($_POST['ftype']=='Integrated'){?>
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
                                      if($rcost4_val[$i]=='Yes' && $water_area!='') 
                                      $rcost3_val_cost = $rcost3_val[$i]*$water_area;
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
              <?php }?>
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
                                      if($icost4_val[$i]=='Yes' && $water_area!='') 
                                      $icost3_val_cost = $icost3_val[$i]*$water_area;
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
      //var error_msg6 = document.getElementById("error_msg6");
      var error_msg7 = document.getElementById("error_msg7");
      var error_msg55 = document.getElementById("error_msg55");
      var error_msg11 = document.getElementById("error_msg11");
     
      error_msg1.textContent = "";
      error_msg2.textContent = "";
      error_msg3.textContent = "";
      error_msg4.textContent = "";
      error_msg5.textContent = "";
      //error_msg6.textContent = "";
      error_msg7.textContent = "";
      error_msg55.textContent = "";
      error_msg11.textContent = "";
     
      var flag=true;

      if($('#type').val()=='')
       {
            //alert('hjghj');
           error_msg5.textContent = "*Please select type ";
           flag= false;
       }

       if($('#water_area').val()=='' && $('#ftype').val()=='Integrated')
       {
           //alert('hjghj w');
           error_msg1.textContent = "*Please enter areas ";
           flag= false;
       }
       if($('#water_area1').val()=='' && $('#ftype').val()!='Integrated')
       {
           //alert('hjghj w');
           error_msg11.textContent = "*Please enter areas ";
           flag= false;
       }
       if($('#water_area').val()!='' && parseFloat($('#water_area').val())<parseFloat($('#hiddentot').val()) && $('#ftype').val()=='Integrated')
       {
          //alert('hjghj ww');
           error_msg1.textContent = "*Please enter value "+$('#hiddentot').val()+" or greater than "+$('#hiddentot').val()+" ";
           flag= false;
       }
       if($('#water_area1').val()!='' && parseFloat($('#water_area').val())<parseFloat($('#hiddentot').val()) && $('#ftype').val()!='Integrated')
       {
           // alert('hjghj');
           error_msg11.textContent = "*Please enter value "+$('#hiddentot').val()+" or greater than "+$('#hiddentot').val()+" ";
           flag= false;
       }
       if($('#fish_species').val()=='' && $('#ftype').val()=='Integrated')
       {
           // alert('hjghj');
           error_msg2.textContent = "*Please select species ";
           flag= false;
       }
       if($('#species').val()=='' && $('#ftype').val()!='Integrated')
       {
           error_msg55.textContent = "*Please select species ";
           flag= false;
       }
       if($('#bird_species').val()=='' && $('#ftype').val()=='Integrated')
       {
           // alert('hjghj');
           error_msg7.textContent = "*Please select species ";
           flag= false;
       }
       if($('#culture_system').val()=='' && $('#ftype').val()=='Integrated')
       {
           // alert('hjghj');
           error_msg3.textContent = "*Please select culture system ";
           flag= false;
       }
       if($('#culture_medium').val()=='' && $('#ftype').val()=='Integrated')
       {
           // alert('hjghj');
           error_msg4.textContent = "*Please select culture medium ";
           flag= false;
       }
       return flag;
}


$('#type').change(function(){

	if(this.value=='Integrated' || this.value=='Hi-Tech' || this.value=='Traditional' || this.value=='Organic Farming')
	{
		$('#integratedID').show();
		$('#otherID').hide();
    $('#ftype').val('Integrated');

    document.getElementById("img1").src = "<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/irrigation.png";

    
	}
	else
	{
		$('#integratedID').hide();
		$('#otherID').show();
    $('#ftype').val('Horticulture');

    if(this.value=='Mushroom')
    {
    document.getElementById("img1").src = "<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/mushroom.png";
    document.getElementById("img2").src = "<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/mushroom.png";
    }
    else if(this.value=='Floriculture')
    {
    document.getElementById("img1").src = "<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/floriculture.png";
    document.getElementById("img2").src = "<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/floriculture.png";
     }
    else
    {  
    document.getElementById("img1").src = "<?php echo get_template_directory_uri(). '/assets/'?>img/home/flower-blue.png";
    document.getElementById("img2").src = "<?php echo get_template_directory_uri(). '/assets/'?>img/home/flower-blue.png";
     }

     
	}


	if(this.value!=''){
    $('#preloader-loader').css("display", "block");
    $.ajax({
        data: {"type": this.value,"ftype": $('#ftype').val(), 'action': 'my_action_get_cost_calc_horticulture'},
        url: "<?php echo site_url()?>/wp-admin/admin-ajax.php",
        type: "post",
        success: function(data) {
           //alert(data);
           var res = data.split('*****');
           $('#species').html(res[0]);
           $('#fish_species').html(res[1]);
           $('#bird_species').html(res[2]);
           $('#culture_system').html(res[3]);
           $('#culture_medium').html(res[4]);
      
           $('.selectpicker').selectpicker({ noneSelectedText : 'Select' });
           $('.selectpicker').selectpicker('refresh');
           $('#preloader-loader').css("display", "none");
        }
    });
  }

});

$('#fish_species').change(function(){
    $('#preloader-loader').css("display", "block");
    $.ajax({
        data: {"type": $('#type').val(),"ftype": $('#ftype').val(),"fish_species":$('#fish_species').val(), 'action': 'my_action_get_cost_calc_horticulture'},
        url: "<?php echo site_url()?>/wp-admin/admin-ajax.php",
        type: "post",
        success: function(data) {
           //alert(data);
           
           var res = data.split('*****');

           if(res[0] && res[1] && res[2] && res[3] && res[4])
           {
            $('#species').html(res[0]);
            $('#fish_species').html(res[1]);
            $('#bird_species').html(res[2]);
            $('#culture_system').html(res[3]);
            $('#culture_medium').html(res[4]);
           }
           else if(res[0] && res[1] && res[2] && res[3])
           {
              $('#fish_species').html(res[0]);
              $('#bird_species').html(res[1]);
              $('#culture_system').html(res[2]);
              $('#culture_medium').html(res[3]);
           }
           else if(res[0] && res[1] && res[2])
           {
            $('#bird_species').html(res[0]);
            $('#culture_system').html(res[1]);
            $('#culture_medium').html(res[2]);
           }
           else if(res[0] && res[1])
           {
            $('#culture_system').html(res[0]);
            $('#culture_medium').html(res[1]);
           }
           else if(res[0])
           {
            $('#culture_medium').html(res[0]);
           }

           $('.selectpicker').selectpicker({ noneSelectedText : 'Select' });
           $('.selectpicker').selectpicker('refresh');
           $('#preloader-loader').css("display", "none");
        }
    });
  });
$('#bird_species').change(function(){
    $('#preloader-loader').css("display", "block");
    $.ajax({
        data: {"type": $('#type').val(),"ftype": $('#ftype').val(),"fish_species":$('#fish_species').val(),"bird_species":$('#bird_species').val(), 'action': 'my_action_get_cost_calc_horticulture'},
        url: "<?php echo site_url()?>/wp-admin/admin-ajax.php",
        type: "post",
        success: function(data) {
           //alert(data);
          
           var res = data.split('*****');

           if(res[0] && res[1] && res[2] && res[3] && res[4])
           {
            $('#species').html(res[0]);
            $('#fish_species').html(res[1]);
            $('#bird_species').html(res[2]);
            $('#culture_system').html(res[3]);
            $('#culture_medium').html(res[4]);
           }
           else if(res[0] && res[1] && res[2] && res[3])
           {
              $('#fish_species').html(res[0]);
              $('#bird_species').html(res[1]);
              $('#culture_system').html(res[2]);
              $('#culture_medium').html(res[3]);
           }
           else if(res[0] && res[1] && res[2])
           {
            $('#bird_species').html(res[0]);
            $('#culture_system').html(res[1]);
            $('#culture_medium').html(res[2]);
           }
           else if(res[0] && res[1])
           {
            $('#culture_system').html(res[0]);
            $('#culture_medium').html(res[1]);
           }
           else if(res[0])
           {
            $('#culture_medium').html(res[0]);
           }

           $('.selectpicker').selectpicker({ noneSelectedText : 'Select' });
           $('.selectpicker').selectpicker('refresh');
           $('#preloader-loader').css("display", "none");
        }
    });
  });
$('#culture_system').change(function(){
    $('#preloader-loader').css("display", "block");
    $.ajax({
        data: {"type": $('#type').val(),"ftype": $('#ftype').val(),"fish_species":$('#fish_species').val(),"bird_species":$('#bird_species').val(),"culture_system":$('#culture_system').val(), 'action': 'my_action_get_cost_calc_horticulture'},
        url: "<?php echo site_url()?>/wp-admin/admin-ajax.php",
        type: "post",
        success: function(data) {
           //alert(data);
           
           var res = data.split('*****');

           if(res[0] && res[1] && res[2] && res[3] && res[4])
           {
            $('#species').html(res[0]);
            $('#fish_species').html(res[1]);
            $('#bird_species').html(res[2]);
            $('#culture_system').html(res[3]);
            $('#culture_medium').html(res[4]);
           }
           else if(res[0] && res[1] && res[2] && res[3])
           {
              $('#fish_species').html(res[0]);
              $('#bird_species').html(res[1]);
              $('#culture_system').html(res[2]);
              $('#culture_medium').html(res[3]);
           }
           else if(res[0] && res[1] && res[2])
           {
            $('#bird_species').html(res[0]);
            $('#culture_system').html(res[1]);
            $('#culture_medium').html(res[2]);
           }
           else if(res[0] && res[1])
           {
            $('#culture_system').html(res[0]);
            $('#culture_medium').html(res[1]);
           }
           else if(res[0])
           {
            $('#culture_medium').html(res[0]);
           }

           $('.selectpicker').selectpicker({ noneSelectedText : 'Select' });
           $('.selectpicker').selectpicker('refresh');
           $('#preloader-loader').css("display", "none");
        }
    });
  });

$('#culture_medium').change(function(){
    $('#preloader-loader').css("display", "block");
    $.ajax({
        data: {"type": $('#type').val(),"ftype": $('#ftype').val(),"fish_species":$('#fish_species').val(),"bird_species":$('#bird_species').val(),"culture_system":$('#culture_system').val(),"culture_medium":$('#culture_medium').val(), 'action': 'my_action_get_cost_calc_horticulture_total'},
        url: "<?php echo site_url()?>/wp-admin/admin-ajax.php",
        type: "post",
        success: function(data) {
           //alert(data);
           $('#hiddentot').val(data);
           $('#water_area').val('');
           $('#water_area1').val('');
           document.getElementById("error_msg1").textContent='';
           document.getElementById("error_msg11").textContent='';
           $('#preloader-loader').css("display", "none");
        }
    });
  });
$('#species').change(function(){
    $('#preloader-loader').css("display", "block");
    $.ajax({
        data: {"type": $('#type').val(),"ftype": $('#ftype').val(),"species":$('#species').val(), 'action': 'my_action_get_cost_calc_horticulture_total'},
        url: "<?php echo site_url()?>/wp-admin/admin-ajax.php",
        type: "post",
        success: function(data) {
           //alert(data);
           $('#hiddentot').val(data);
           $('#water_area').val('');
           $('#water_area1').val('');
           document.getElementById("error_msg1").textContent='';
           document.getElementById("error_msg11").textContent='';
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