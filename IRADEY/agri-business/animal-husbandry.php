<?php /*Template Name: Animal Husbandry */ ?>
<?php get_header(); 

$current_slug = add_query_arg( array(), $wp->request );
$current_slug = explode('/',$current_slug);
$the_slug = end($current_slug);
$type = $current_slug[count($current_slug) - 2];

//echo $the_slug;exit; 

$page_data = get_page_by_path( $the_slug );
?>


    <!-- inner-banner-start -->
    <div class="inner-banner">
        <div class="container">
           <div class="banner-title">
                <h3>Animal Husbandry <a href="#" class="changeTopic" data-toggle="collapse" data-target="#changeTopic" >Change Topic</a></h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Entrepreneurship</a></li>
                    <li class="breadcrumb-item"><a href="#">Know your Business</a></li>
                    <li class="breadcrumb-item"><a href="#">Agri-Business</a></li>
                    <li class="breadcrumb-item"><a href="#">Production</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo site_url()?>/meat-production/">Animal Husbandry</a></li>
                    <li class="breadcrumb-item active"><?php echo $page_data->post_title;?></li>
                </ul>
            </div>

             <div class="chagetopic-modal changeTopic-collapse">
          <div class="collapse " id="changeTopic" style="">
            <a href="#" id="changeTopic_close"><i class="fa fa-close"></i></a>
            <div class="card card-body">
              <div class="row">
                
                       <div class="col-md-4">
                              <h4>Production &nbsp;</h4>
                            <ul>
                              <li>
                                <a class="box" href="<?php echo site_url()?>/fruits/">Horticulture</a>
                              </li>
                              <li>
                                <a class="box" href="<?php echo site_url()?>/meat-production/">Animal Husbandry</a>
                              </li>
                              <li>
                                <a class="box" href="<?php echo site_url()?>/production-of-commercial-silk-cocoon/">Sericulture</a>
                              </li>
                              <li>
                                <a class="box" href="<?php echo site_url()?>/species-wise/">Aquaculture</a>
                              </li>
                              <li>
                                <a class="box" href="<?php echo site_url()?>/maps/">MAP</a>
                              </li>
                              <li>
                                <a class="box" href="#">Nursery</a>
                              </li>
                            </ul>
                          </div>
                          
                          <div class="col-md-4">
                              <h4>Post Harvest & Primary Processing &nbsp;</h4>
                            <ul>
                              <li>
                                <a class="box" href="<?php echo site_url()?>/post_harvest/refrigerated-van/">Handling & Logistics</a>
                              </li>
                              <li>
                                <a class="box" href="<?php echo site_url()?>/post_harvest/dry-warehouse/">Storage</a>
                              </li>
                              <li>
                                <a class="box" href="<?php echo site_url()?>/post_harvest/blast-freezing/">Preservation</a>
                              </li>
                              <li>
                                <a class="box" href="<?php echo site_url()?>/post_harvest/rice-mill/">Primary Processing</a>
                              </li>
                            </ul>
                          </div>
                    
              </div>
            </div>
          </div>
        </div>

            <div class="banner-content">
                <div class="row">
                  <?php $url = wp_get_attachment_url( get_post_thumbnail_id($post_id) );?>
                    <div class="col-md-4 banner-img pr-0"><img src="<?php echo $url;?>"></div>
                    <div class="col-md-8  pl-0">
                      <div class="bannerbg nf-gradient-1 justify-content-start pt-3 nf-height-100">
                        <h4 class="nf-f-size-24"><?php echo $page_data->post_title;?></h4>
                        <h4 class="nf-f-size-24"><?php echo $page_data->post_content;?></h4>
                        <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/layers-bg.png" alt="layers background" class="nf-layes-bg">
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- inner-banner-end -->
   <!-- Study tour in north section  -->
   <form method="post" action="" id="meat_production_form">
      <div class="inner-body">
        <div class="container">
          <div class="national-level icon-text-box">

          <?php if($page_data->post_title=='Breeding'){?>
         <div class="row mb-2">
              <div class="col-md-8">
                <h4 class="nf-f-size-24 nf-strong">Select Options</h4>
              </div>
            </div>
			     <div class="nf-form-wrap">
              <div class="row">
               <div class="col-12 col-md-4 col-xl-2">
  					<div class="nf-radio-wrap mb-4">
  					<div class="custom-control custom-radio custom-control-inline pl-0">
  					  <input type="radio" id="customRadioInline1" name="breeding_option" class="custom-control-input" checked value="Animal">
  					  <label class="custom-control-label" for="customRadioInline1">Livestock</label>
  					</div>
  					</div>
                  </div> 
  				 <div class="col-12 col-md-4 col-xl-2">
  				 <div class="nf-radio-wrap mb-4">
  					<div class="custom-control custom-radio custom-control-inline pl-0">
  					  <input type="radio" id="customRadioInline2" name="breeding_option" class="custom-control-input" value="Bird">
  					  <label class="custom-control-label" for="customRadioInline2">Poultry</label>
  					</div>
            </div> 
            </div>
          </div>
          </div>
          <?php }?>

          <?php if($page_data->post_title=='Egg Production'){?>
         <div class="row mb-2">
              <div class="col-md-8">
                <h4 class="nf-f-size-24 nf-strong">Select Options</h4>
              </div>
            </div>
           <div class="nf-form-wrap">
              <div class="row">
               <div class="col-12 col-md-4 col-xl-2">
            <div class="nf-radio-wrap mb-4">
            <div class="custom-control custom-radio custom-control-inline pl-0">
              <input type="radio" id="customRadioInline1" name="egg_production_option" class="custom-control-input" checked value="Food">
              <label class="custom-control-label" for="customRadioInline1">For Food</label>
            </div>
            </div>
                  </div> 
           <div class="col-12 col-md-4 col-xl-2">
           <div class="nf-radio-wrap mb-4">
            <div class="custom-control custom-radio custom-control-inline pl-0">
              <input type="radio" id="customRadioInline2" name="egg_production_option" class="custom-control-input" value="Breeding">
              <label class="custom-control-label" for="customRadioInline2">For Breeding</label>
            </div>
            </div> 
          </div>
        </div>
        </div> 
          <?php }?>

          <?php if($page_data->post_title=='Meat Production'){?>
        <div class="row mb-2">
              <div class="col-md-8">
                <h4 class="nf-f-size-24 nf-strong">Select Options</h4>
              </div>
            </div>
           <div class="nf-form-wrap">
              <div class="row">
               <div class="col-12 col-md-4 col-xl-2">
            <div class="nf-radio-wrap mb-4">
            <div class="custom-control custom-radio custom-control-inline pl-0">
              <input type="radio" id="customRadioInline1" name="meat_production_option" class="custom-control-input" value="livestock" checked>
              <label class="custom-control-label" for="customRadioInline1">Livestock Rearing</label>
            </div>
            </div>
                  </div> 
           <div class="col-12 col-md-4 col-xl-2">
           <div class="nf-radio-wrap mb-4">
            <div class="custom-control custom-radio custom-control-inline pl-0">
              <input type="radio" id="customRadioInline2" name="meat_production_option" class="custom-control-input" value="poultry">
              <label class="custom-control-label" for="customRadioInline2">Poultry Rearing</label>
            </div>
            </div> 
          </div>
        </div>
        </div> 
          <?php }?>

          <?php 
          $title=$page_data->post_title;
          if($page_data->post_title=='Egg Production') $title='Egg Production - Food'; 
          if($page_data->post_title=='Breeding') $title='Breeding Animal'; 

          ?>
    <input type="hidden" name="animal_husbandry_type" id="animal_husbandry_type" value="<?php echo $title?>">
    <?php if($page_data->post_title!='Meat Production'){?>
    <input type="hidden" name="animal" id="animal" value="">
  <?php }?>
			 <div class="row mb-2">
              <div class="col-md-8">
                <h4 class="nf-f-size-24 nf-strong">Select Category</h4>
              </div>
            </div>
            <div class="nf-form-wrap">
              <div class="row">
                <div class="col-12 col-md-6 col-xl-4" >

                  <?php


                   if($page_data->post_title=='Breeding'){?>
                      <div class="nf-select-wrap" id="livestock_menu">
                    <div class="nf-select-img">
                      <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/livestock_animal.png" alt="Poultry">
                      <span>Livestock</span>
                    </div>
                    <div class="nf-select-field">
                      <select class="form-control selectpicker" name="animal1"  id="livestock" onchange="javascript:$('#animal').val(this.value);">
                        <option value="">Select Animal Variety</option>

                         <?php
                          // args
                          $args = array(
                            'post_type'   => 'animal_husbandry',
                            'meta_key'    => 'animal_husbandry_type',
                            'meta_value'  => 'Breeding Animal',
                            'orderby' => 'post_title',
                            'order'   => 'ASC',
                            'post_status' => 'publish',
                            'posts_per_page' => -1
                          );
                          $the_query = new WP_Query( $args );
                          ?>
                          <?php if( $the_query->have_posts() ): ?>
                            <?php while( $the_query->have_posts() ) : $the_query->the_post(); 
                              $croptile = $post->post_title;
                              if($croptile_new!=$croptile){
                              ?>
                              <option value="<?php the_title(); ?>"><?php the_title(); ?></option>
                            <?php 
                          }
                          $croptile_new = $post->post_title;
                          endwhile; ?>
                          <?php endif; ?>
                      </select>
                    </div>
                  </div>
                  <span id="error_msg1" style="color: red;"></span>
                  <div class="nf-select-wrap" id="poultry_menu" style="display: none;">
                    <div class="nf-select-img">
                      <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/chick.png" alt="Poultry">
                      <span>Poultry</span>
                    </div>
                    <div class="nf-select-field">
                      <select class="form-control selectpicker" name="animal1" id="poultry" onchange="javascript:$('#animal').val(this.value);">
                        <option value="">Select Animal Variety</option>

                         <?php
                          // args
                          $args = array(
                            'post_type'   => 'animal_husbandry',
                            'meta_key'    => 'animal_husbandry_type',
                            'meta_value'  => 'Breeding Bird',
                            'orderby' => 'post_title',
                            'order'   => 'ASC',
                            'post_status' => 'publish',
                            'posts_per_page' => -1
                          );
                          $the_query = new WP_Query( $args );
                          ?>
                          <?php if( $the_query->have_posts() ): ?>
                            <?php while( $the_query->have_posts() ) : $the_query->the_post(); 
                              $croptile = $post->post_title;
                              if($croptile_new!=$croptile){
                              ?>
                              <option value="<?php the_title(); ?>"><?php the_title(); ?></option>
                            <?php 
                          }
                          $croptile_new = $post->post_title;
                          endwhile; ?>
                          <?php endif; ?>
                      </select>
                    </div>
                  </div>
                  <span id="error_msg2" style="color: red;"></span>

                 <?php }else if($page_data->post_title=='Egg Production'){?>


                  <div class="nf-select-wrap" id="livestock_menu">
                    <div class="nf-select-img">
                      <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/boiled-egg.png" alt="Egg Production">
                      <span>Egg Production</span>
                    </div>
                    <div class="nf-select-field">
                      <select class="form-control selectpicker" name="animal1"  id="livestock" onchange="javascript:$('#animal').val(this.value);">
                        <option value="">Select Food</option>

                         <?php
                          // args
                          $args = array(
                            'post_type'   => 'animal_husbandry',
                            'meta_key'    => 'animal_husbandry_type',
                            'meta_value'  => 'Egg Production - Food',
                            'orderby' => 'post_title',
                            'order'   => 'ASC',
                            'post_status' => 'publish',
                            'posts_per_page' => -1
                          );
                          $the_query = new WP_Query( $args );
                          ?>
                          <?php if( $the_query->have_posts() ): ?>
                            <?php while( $the_query->have_posts() ) : $the_query->the_post(); 
                              $croptile = $post->post_title;
                              if($croptile_new!=$croptile){
                              ?>
                              <option value="<?php the_title(); ?>"><?php the_title(); ?></option>
                            <?php 
                          }
                          $croptile_new = $post->post_title;
                          endwhile; ?>
                          <?php endif; ?>
                      </select>
                    </div>
                  </div>
                  <span id="error_msg1" style="color: red;"></span>
                  <div class="nf-select-wrap" id="poultry_menu" style="display: none;">
                    <div class="nf-select-img">
                      <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/boiled-egg.png" alt="Egg Production">
                      <span>Egg Production</span>
                    </div>
                    <div class="nf-select-field">
                      <select class="form-control selectpicker" name="animal1" id="poultry" onchange="javascript:$('#animal').val(this.value);">
                        <option value="">Select Breed</option>

                         <?php
                          // args
                          $args = array(
                            'post_type'   => 'animal_husbandry',
                            'meta_key'    => 'animal_husbandry_type',
                            'meta_value'  => 'Egg Production - Breeding',
                            'orderby' => 'post_title',
                            'order'   => 'ASC',
                            'post_status' => 'publish',
                            'posts_per_page' => -1
                          );
                          $the_query = new WP_Query( $args );
                          ?>
                          <?php if( $the_query->have_posts() ): ?>
                            <?php while( $the_query->have_posts() ) : $the_query->the_post(); 
                              $croptile = $post->post_title;
                              if($croptile_new!=$croptile){
                              ?>
                              <option value="<?php the_title(); ?>"><?php the_title(); ?></option>
                            <?php 
                          }
                          $croptile_new = $post->post_title;
                          endwhile; ?>
                          <?php endif; ?>
                      </select>
                    </div>
                  </div>
                  <span id="error_msg2" style="color: red;"></span>


                  <?php }else if($page_data->post_title!='Meat Production'){

                   if($page_data->post_title == 'Wool Production')
                   { 
                     $icon_image ="wool.png";
                     $heading='Wool Production';
                   }
                   else if($page_data->post_title == 'Dairy Production')
                   { 
                     $icon_image ="dairy.png";
                     $heading='Dairy Production';
                   }
                   else
                   {
                      $icon_image ="chick.png";
                      $heading='Animal';
                   }
                
                    ?>
                  <div class="nf-select-wrap">
                    <div class="nf-select-img">
                      <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/<?php echo $icon_image; ?>" alt="Egg Production">
                      <span><?php echo $heading;?></span>
                    </div>
                    <div class="nf-select-field">
                      <select class="form-control selectpicker" name="animal" id="livestock" onchange="javascript:$('#animal').val(this.value);">
                        <option value="">Select Animal Variety</option>

                         <?php
                          // args
                          $args = array(
                            'post_type'   => 'animal_husbandry',
                            'meta_key'    => 'animal_husbandry_type',
                            'meta_value'  => $page_data->post_title,
                            'orderby' => 'post_title',
                            'order'   => 'ASC',
                            'post_status' => 'publish',
                            'posts_per_page' => -1
                          );
                          $the_query = new WP_Query( $args );
                          ?>
                          <?php if( $the_query->have_posts() ): ?>
                            <?php while( $the_query->have_posts() ) : $the_query->the_post(); 
                              $croptile = $post->post_title;
                              if($croptile_new!=$croptile){
                              ?>
                              <option value="<?php the_title(); ?>"><?php the_title(); ?></option>
                            <?php 
                          }
                          $croptile_new = $post->post_title;
                          endwhile; ?>
                          <?php endif; ?>
                      </select>
                    </div>
                  </div>
                  <span id="error_msg1" style="color: red;"></span>
                  <?php  }else if($page_data->post_title=='Meat Production'){?>
                  
                  <div class="nf-select-wrap" id="livestock_menu">
                    <div class="nf-select-img">
                      <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/livestock_animal.png" alt="Poultry">
                      <span>Livestock</span>
                    </div>
                    <div class="nf-select-field">
                      <select class="form-control selectpicker" name="animal"  id="livestock" >
                        <option value="">Select Livestock</option>

                         <?php
                          // args
                          $args = array(
                            'post_type'   => 'animal_husbandry',
                            'meta_key'    => 'animal_husbandry_type',
                            'meta_value'  => $page_data->post_title,
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
                          $the_query = new WP_Query( $args );
                          ?>
                          <?php if( $the_query->have_posts() ): ?>
                            <?php while( $the_query->have_posts() ) : $the_query->the_post(); 
                              $croptile = $post->post_title;
                              if($croptile_new!=$croptile){
                              ?>
                              <option value="<?php the_title(); ?>"><?php the_title(); ?></option>
                            <?php 
                          }
                          $croptile_new = $post->post_title;
                          endwhile; ?>
                          <?php endif; ?>
                      </select>
                    </div>
                  </div>
                  <span id="error_msg1" style="color: red;"></span>
                  <div class="nf-select-wrap" id="poultry_menu" style="display: none;">
                    <div class="nf-select-img">
                      <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/chick.png" alt="Poultry">
                      <span>Poultry</span>
                    </div>
                    <div class="nf-select-field">
                      <select class="form-control selectpicker" name="animal_poltry" id="poultry" >
                        <option value="">Select Poultry</option>

                         <?php
                          // args
                          $args = array(
                            'post_type'   => 'animal_husbandry',
                            'meta_key'    => 'animal_husbandry_type',
                            'meta_value'  => $page_data->post_title,
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
                          $the_query = new WP_Query( $args );
                          ?>
                          <?php if( $the_query->have_posts() ): ?>
                            <?php while( $the_query->have_posts() ) : $the_query->the_post(); 
                              $croptile = $post->post_title;
                              if($croptile_new!=$croptile){
                              ?>
                              <option value="<?php the_title(); ?>"><?php the_title(); ?></option>
                            <?php 
                          }
                          $croptile_new = $post->post_title;
                          endwhile; ?>
                          <?php endif; ?>
                      </select>
                    </div>
                  </div>
                  <span id="error_msg2" style="color: red;"></span>
                  
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
              <div class="col-12 nf-button-wrapper mb-sm-0 mb-3">
                <button type="submit" class="nf-button-v-small submitBtn " onclick="return validation_function()">
                  Next
                </button>
              </div>
              <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/circle-bg.jpg" alt="background image" class="img-fluid">
            </div>
          </div>
        </div>
      </form>
   <!-- End Study tour in north section  -->

    <!-- footer start -->   
<?php get_footer(); ?>
<script type="text/javascript">

<?php if($page_data->post_title=='Meat Production'){?>
function validation_function()
   {
      var error_msg1 = document.getElementById("error_msg1");
      var error_msg2 = document.getElementById("error_msg2");
      

      error_msg1.textContent = "";
      error_msg2.textContent = "";
      


       if($('#livestock').val()=='' && $('#customRadioInline1').is(':checked')  )
       {
           //alert('hjghj');
           $('#poultry').val('');
           error_msg1.textContent = "*Please select Animal Variety";
           return false;
       }
       
       else if($('#poultry').val()=='' && ($('#customRadioInline2').is(':checked')))
       {
           $('#livestock').val('');
           error_msg2.textContent = "*Please select Animal Variety";
           return false;
       }
       
   }
<?php }else if($page_data->post_title=='Egg Production'){?>

  function validation_function()
   {
      var error_msg1 = document.getElementById("error_msg1");
      var error_msg2 = document.getElementById("error_msg2");
      

      error_msg1.textContent = "";
      error_msg2.textContent = "";
      


       if($('#livestock').val()=='' && $('#customRadioInline1').is(':checked')  )
       {
           //alert('hjghj');
           $('#poultry').val('');
           error_msg1.textContent = "*Please select Animal Variety";
           return false;
       }
       
       else if($('#poultry').val()=='' && ($('#customRadioInline2').is(':checked')))
       {
           $('#livestock').val('');
           error_msg2.textContent = "*Please select Animal Variety";
           return false;
       }
       
   }


<?php }else if($page_data->post_title=='Breeding'){?>  

  function validation_function()
   {
      var error_msg1 = document.getElementById("error_msg1");
      var error_msg2 = document.getElementById("error_msg2");
      

      error_msg1.textContent = "";
      error_msg2.textContent = "";
      


       if($('#livestock').val()=='' && $('#customRadioInline1').is(':checked')  )
       {
           //alert('hjghj');
           $('#poultry').val('');
           error_msg1.textContent = "*Please select Animal Variety";
           return false;
       }
       
       else if($('#poultry').val()=='' && ($('#customRadioInline2').is(':checked')))
       {
           $('#livestock').val('');
           error_msg2.textContent = "*Please select Animal Variety";
           return false;
       }
       
   }

 <?php }else{?>
function validation_function()
   {
      var error_msg1 = document.getElementById("error_msg1");
      
      error_msg1.textContent = "";
     
       if($('#livestock').val()==''  )
       {
           //alert('hjghj');
           $('#poultry').val('');
           error_msg1.textContent = "*Please select Animal Variety";
           return false;
       }
    }

<?

 }?>


  <?php if($page_data->post_title=='Meat Production'){?>
   $(function(){
    $('input[name="meat_production_option"]').on('click', function(){

      var error_msg1 = document.getElementById("error_msg1");
      var error_msg2 = document.getElementById("error_msg2");
      

      error_msg1.textContent = "";
      error_msg2.textContent = "";

      if ($(this).val() == 'livestock') 
      {
        $('#livestock_menu').show();
        $('#poultry_menu').hide();
      }

      if ($(this).val() == 'poultry') 
      {
        $('#livestock_menu').hide();
        $('#poultry_menu').show();
      }

    });
  });
 <?php }?>

   <?php if($page_data->post_title=='Egg Production'){?>

   $(function(){
    $('input[name="egg_production_option"]').on('click', function(){

      var error_msg1 = document.getElementById("error_msg1");
      var error_msg2 = document.getElementById("error_msg2");
      

      error_msg1.textContent = "";
      error_msg2.textContent = "";
      

      if ($(this).val() == 'Food') 
      {
        $('#livestock_menu').show();
        $('#poultry_menu').hide();
        
        $('#animal_husbandry_type').val('Egg Production - Food');
      }

      if ($(this).val() == 'Breeding') 
      {
        $('#livestock_menu').hide();
        $('#poultry_menu').show();

        $('#animal_husbandry_type').val('Egg Production - Breeding');
      }

    });
  });
 <?php }?>

   <?php if($page_data->post_title=='Breeding'){?>

   $(function(){
    $('input[name="breeding_option"]').on('click', function(){

      var error_msg1 = document.getElementById("error_msg1");
      var error_msg2 = document.getElementById("error_msg2");
      

      error_msg1.textContent = "";
      error_msg2.textContent = "";

      if ($(this).val() == 'Animal') 
      {
        $('#livestock_menu').show();
        $('#poultry_menu').hide();

        $('#animal_husbandry_type').val('Breeding Animal');
      }

      if ($(this).val() == 'Bird') 
      {
        $('#livestock_menu').hide();
        $('#poultry_menu').show();

        $('#animal_husbandry_type').val('Breeding Bird');
      }

    });
  });
 <?php }?>



  $(document).on('click', '.submitBtn', function() {
    var siteurl = '<?php echo site_url() ?>/'; 
    var radioValue = $("input[name='meat_production_option']:checked").val();
    $('#meat_production_form').attr('action',siteurl+'animal-husbandry-details'); 

  });
</script>


