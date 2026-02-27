<?php /*Template Name: Aquaculture */ ?>
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
                <h3>Aquaculture<a href="#" class="changeTopic" data-toggle="collapse" data-target="#changeTopic" >Change Topic</a></h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Entrepreneurship</a></li>
                    <li class="breadcrumb-item"><a href="#">Know your Business</a></li>
                    <li class="breadcrumb-item"><a href="#">Agri-Business</a></li>
                    <li class="breadcrumb-item"><a href="#">Production</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo site_url()?>/species-wise/">Aquaculture</a></li>
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
   <?php 
   $title=$page_data->post_title;
   if($page_data->post_title=='Fish Value Chain'){ $title='Fish Value Chain - Hatchery';}

   if($page_data->post_title=='Culture Types- Monoculture')
   { 
   		$title='Cultural Types - Monoculture';
   		$page_data->post_title = 'Cultural Types - Monoculture';
    }
   ?>
   <form method="post" action="<?php echo site_url()?>/aquaculture-details/">
   <input type="hidden" name="aquaculture_type" id="aquaculture_type" value="<?php echo $title;?>">
   <input type="hidden" name="species" id="species" value="">

      <div class="inner-body">
        <div class="container">
          <div class="national-level icon-text-box">
                <?php
           
                    if($page_data->post_title == 'Fish Value Chain')
                   { 
                     $icon_image ="fish-value-chain.png";
                     $heading='Fish Value Chain';
                   }
                   else if($page_data->post_title =='Species Wise')
                   { 
                     $icon_image ="fish-value-chain.png";
                     $heading='Species Wise';
                   }
                   else if($page_data->post_title == 'Cultural Types - Monoculture')
                   {
                   		$icon_image ="fish-value-chain.png";
                     	$heading='Culture Types - Monoculture';
                   }
                   else
                   {
                      $icon_image ="chick.png";
                      $heading='Fish Value Chain - Hatchery';
                   }
                
                ?>
			    <div class="row mb-2">
              <div class="col-md-8">
                <h4 class="nf-f-size-24 nf-strong">Select Category</h4>
              </div>
            </div>

            <?php if($page_data->post_title=='Fish Value Chain'){?>
            <div class="nf-form-wrap">
              <div class="row">
               <div class="col-12 col-md-4 col-xl-2">
            <div class="nf-radio-wrap mb-4">
            <div class="custom-control custom-radio custom-control-inline pl-0">
              <input type="radio" id="customRadioInline1" name="aquaculture_option" class="custom-control-input" value="Hatchery" checked>
              <label class="custom-control-label" for="customRadioInline1">Hatchery</label>
            </div>
            </div>
                  </div> 
           <div class="col-12 col-md-4 col-xl-2">
           <div class="nf-radio-wrap mb-4">
            <div class="custom-control custom-radio custom-control-inline pl-0">
              <input type="radio" id="customRadioInline2" name="aquaculture_option" class="custom-control-input" value="Trading">
              <label class="custom-control-label" for="customRadioInline2">Trading</label>
            </div>
            </div> 
          </div>
          <div class="col-12 col-md-4 col-xl-2">
           <div class="nf-radio-wrap mb-4">
            <div class="custom-control custom-radio custom-control-inline pl-0">
              <input type="radio" id="customRadioInline3" name="aquaculture_option" class="custom-control-input" value="Production">
              <label class="custom-control-label" for="customRadioInline3">Production</label>
            </div>
            </div> 
          </div>
        </div>
        </div>
      <?php }?>
            <div class="nf-form-wrap">
              <div class="row">
                
                  <?php if($page_data->post_title=='Culture System'){?>

                    <div class="col-12 col-md-6 col-xl-4">
                    <div class="nf-select-wrap">
                      <div class="nf-select-img">
                        <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/state.png" alt="state">
                        <span>Culture System</span>
                      </div>
                      <div class="nf-select-field">

                        <?php 
                            $var = get_field_object('field_60f69e6bff44d');
                            ?>
                            <select class="form-control selectpicker" name="cultural_system" id="cultural_system" onchange="return updateddata(this.value)">
                           
                              <option value="">Select Culture System</option>
                              
                              <?
                              foreach($var['choices'] as $choice)
                              {
                                echo '<option value="'.$choice.'">'.$choice.'</option>';
                              }
                              ?>
                            </select>

                      </div>
                       
                    </div>
                    <span id="error_msg2" style="color: red;"></span>
                  </div>
                   <div class="col-12 col-md-6 col-xl-4" id="specid">
                    <div class="nf-select-wrap">
                    <div class="nf-select-img">
                      <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/fish-value-chain.png" alt="state">
                      <span>Species</span>
                    </div>
                    <div class="nf-select-field">
                      <select class="form-control selectpicker" name="species1" id="species1" onchange="javascript:$('#species').val(this.value);">
                        <option value="">Select Species</option>
                        <?php
                          // args
                          $args = array(
                            'post_type'   => 'aquaculture',
                            'meta_key'    => 'aquaculture_type',
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
                  </div>
                   <div class="col-12 col-md-6 col-xl-4" id="techid">

                  <div class="nf-select-wrap">
                      <div class="nf-select-img">
                        <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/state.png" alt="state">
                        <span>Technology</span>
                      </div>
                      <div class="nf-select-field">

                        <?php 
                            $var = get_field_object('field_60f69edbff44e');
                            ?>
                            <select class="form-control selectpicker" name="technology" id="technology">
                           
                              <option value="">Select Technology</option>
                              
                              <?
                              foreach($var['choices'] as $choice)
                              {
                                echo '<option value="'.$choice.'">'.$choice.'</option>';
                              }
                              ?>
                            </select>

                      </div>
                       
                    </div>
                    <span id="error_msg3" style="color: red;"></span>
                    </div>

                   <?php } else if($page_data->post_title!='Fish Value Chain'){?>
                     <div class="col-12 col-md-6 col-xl-4">
                  <div class="nf-select-wrap">
                    <div class="nf-select-img">
                      <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/<?php echo $icon_image;?>" alt="state">
                      <span>Species</span>
                    </div>
                    <div class="nf-select-field">
                      <select class="form-control selectpicker" name="species1" id="species1" onchange="javascript:$('#species').val(this.value);">
                        <option value="">Select Species</option>


                        <?php
                          // args
                          $args = array(
                            'post_type'   => 'aquaculture',
                            'meta_key'    => 'aquaculture_type',
                            'meta_value'  => $page_data->post_title,
                            'orderby' => 'post_title',
                            'order'   => 'ASC',
                            'posts_per_page' => '100'
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
                  </div>
                  <?php  }else{?>
                  <div class="col-12 col-md-6 col-xl-4">
                  <div class="nf-select-wrap" id="livestock_menu">
                    <div class="nf-select-img">
                      <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/<?php echo $icon_image;?>" alt="state">
                      <span>Hatchery Type</span>
                    </div>
                    <div class="nf-select-field">
                      <select class="form-control selectpicker" name="species1"  id="livestock" onchange="javascript:$('#species').val(this.value);">
                        <option value="">Select Hatchery Type</option>

                         <?php
                          // args
                          $args = array(
                            'post_type'   => 'aquaculture',
                            'meta_key'    => 'aquaculture_type',
                            'meta_value'  => 'Fish Value Chain - Hatchery',
                            'orderby' => 'post_title',
                            'order'   => 'ASC',
                            'posts_per_page' => '100'
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
                     <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/<?php echo $icon_image;?>" alt="state">
                      <span>Trading Type</span>
                    </div>
                    <div class="nf-select-field">
                      <select class="form-control selectpicker" name="species2" id="poultry" onchange="javascript:$('#species').val(this.value);">
                        <option value="">Select Trading Type</option>

                         <?php
                          // args
                          $args = array(
                            'post_type'   => 'aquaculture',
                            'meta_key'    => 'aquaculture_type',
                            'meta_value'  => 'Fish Value Chain - Trading',
                            'orderby' => 'post_title',
                            'order'   => 'ASC',
                            'posts_per_page' => '100'
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
              <div class="col-12 nf-button-wrapper mb-sm-0 mb-3">
               <!--  <button type="submit" class="nf-button-v-small">
                  Next
                </button> -->

        <button class="nf-button-v-small submitBtn" type="submit" onclick="return validation_function()">
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
  <?php if($page_data->post_title=='Culture System'){?>

function updateddata(val)
{
    if(val!='Super Intensive')
    {
      $('#techid').hide();
      $('#technology').val('');
      $('#specid').show();
      
    }
    else
    {
      $('#techid').show();
      $('#technology').val('');
      $('#specid').hide();
      $('#species1').val('');
    }
}


function validation_function()
   {
      var error_msg1 = document.getElementById("error_msg1");
      var error_msg2 = document.getElementById("error_msg2");
      var error_msg3 = document.getElementById("error_msg3");

     
      error_msg1.textContent = "";
      error_msg2.textContent = "";
      error_msg3.textContent = "";
     
      var flag=true;

       
       if($('#cultural_system').val()=='')
       {
           
           error_msg2.textContent = "*Please select cultural system";
           flag= false;
       }
       if($('#species1').val()==''|| $('#species').val()=='')
       {
           
           //error_msg1.textContent = "*Please select species";
           //flag= false;
       }
       if($('#technology').val()=='' && $('#cultural_system').val()=='Super Intensive')
       {
           
           error_msg3.textContent = "*Please select technology";
           flag= false;
       }

      
       return flag;
  }
<?php }else if($page_data->post_title!='Fish Value Chain'){?>
function validation_function()
   {
      var error_msg1 = document.getElementById("error_msg1");

     
      error_msg1.textContent = "";
     
      var flag=true;

       if($('#species1').val()=='' || $('#species').val()=='') 
       {
           
           error_msg1.textContent = "*Please select species";
           flag= false;
       }

      
       return flag;
  }
<?php }else{
?>
function validation_function()
   {
      var error_msg1 = document.getElementById("error_msg1");
      var error_msg2 = document.getElementById("error_msg2");
      

      error_msg1.textContent = "";
      error_msg2.textContent = "";


      if($('#customRadioInline3').is(':checked'))
      {
        window.location='<?php echo site_url() ?>/species-wise';
        return false;
      }
      
      else if($('#livestock').val()=='' && $('#customRadioInline1').is(':checked')  )
       {
           //alert('hjghj');
           $('#poultry').val('');
           error_msg1.textContent = "*Please select species";
           return false;
       }
       
       else if($('#poultry').val()=='' && ($('#customRadioInline2').is(':checked')))
       {
           $('#livestock').val('');
           error_msg2.textContent = "*Please select species";
           return false;
       }
       
   }
<?php
}?>



$(function(){
    $('input[name="aquaculture_option"]').on('click', function(){

      var error_msg1 = document.getElementById("error_msg1");
      var error_msg2 = document.getElementById("error_msg2");
      

      error_msg1.textContent = "";
      error_msg2.textContent = "";

      if ($(this).val() == 'Hatchery') 
      {
        $('#livestock_menu').show();
        $('#poultry_menu').hide();
        $('#aquaculture_type').val('Fish Value Chain - Hatchery');
        
      }

      if ($(this).val() == 'Trading') 
      {
        $('#livestock_menu').hide();
        $('#poultry_menu').show();
        $('#aquaculture_type').val('Fish Value Chain - Trading');
      }

    });
  });

</script>