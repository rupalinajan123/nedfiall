<?php /*Template Name: Aquaculture Polyculture Search */ ?>
<?php get_header(); 
$page_data = get_page_by_path( 'aquaculture-polyculture-search' );
?>

  <!-- inner-banner-start -->
  <div class="inner-banner">
    <div class="container">
      <div class="banner-title">
        <h3><?php echo $page_data->post_title;?><a href="#" class="changeTopic" data-toggle="collapse" data-target="#changeTopic" aria-expanded="true">Change Topic</a></h3>
        <ul class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Entrepreneurship</a></li>
          <li class="breadcrumb-item"><a href="#">Know your Business</a></li>
          <li class="breadcrumb-item"><a href="#">Agri-Business</a></li>
          <li class="breadcrumb-item"><a href="#">Production</a></li>
          <li class="breadcrumb-item"><a href="#">Aquaculture</a></li>               
          <li class="breadcrumb-item active"><?php echo $page_data->post_title;?></li>
        </ul>
      </div>
      <div class="chagetopic-modal changeTopic-collapse">
          <div class="collapse " id="changeTopic" style="">
            <div class="card card-body">
              <div class="row">
                 <div class="col-md-6">
                  <h4>Select topic</h4>
                    <ul>
                      <li><a href="<?php echo site_url();?>/species-wise">Species wise</a></li>
                      <li><a href="<?php echo site_url();?>/aquaculture-type-search">Cultural Types</a></li>
                      <li><a href="<?php echo site_url();?>/fish-value-chain">Fish Value Chain</a></li>
                      <li><a href="<?php echo site_url();?>/culture-system">Cultural System</a></li>
                    </ul>
                </div>
                </div>
            </div>
          </div>
        </div>
      <div class="banner-content">
        <div class="row">
          <div class="col-md-4 banner-img pr-0"><img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/rohu.jpg"></div>
          <div class="col-md-8  pl-0">
            <div class="bannerbg nf-gradient-17 justify-content-start p-3 nf-height-100">
              <h4 class="nf-f-size-24 pl-0"><?php echo $page_data->post_title;?></h4>
              <p class="text-white pr-md-5"><?php echo $page_data->post_content;?></p>
              <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/layers-bg.png" alt="layers background" class="nf-layes-bg">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- inner-banner-end -->
<!-- Study tour in north section  -->
<form method="post" action="" id="aquaculture-polyculture" name="aqua_poly_search">
<div class="inner-body">
  <div class="container">
    <div class="national-level icon-text-box">
      <div class="row mb-2">
        <div class="col-md-8">
          <h4 class="nf-f-size-24 nf-strong">Select Options</h4>
        </div>
      </div>
      <div class="nf-form-wrap">
        <div class="row">

        	<?php
              $g=0;
            $args = array(
              'post_type'   => 'polyculture',
              'orderby' => 'post_id',
              'order'   => 'ASC',
              'post_status' => 'publish',
              'posts_per_page' => -1
            );
            $the_query = new WP_Query( $args );
            if( $the_query->have_posts() ): 
             while( $the_query->have_posts() ) : $the_query->the_post(); 
             	 $g++;
            ?>

          <div class="col-12 col-md-4 col-xl-3">
           <div class="nf-radio-wrap mb-4">
             <div class="custom-control custom-radio custom-control-inline pl-0">
               <input type="radio" id="customRadioInline<?php echo $g;?>" name="polyculture_search" class="custom-control-input" value="<?php the_title();?>" <?php if($g==1){?> checked <?php }?>>
               <label class="custom-control-label" for="customRadioInline<?php echo $g;?>"><?php the_title();?></label>
             </div>
           </div>
         </div> 
        <?php endwhile; ?>
            <?php endif; ?>
         
       </div>
     </div>
     <?php/*?><div class="row mb-2">
      <div class="col-md-8">
        <h4 class="nf-f-size-24 nf-strong">Select Category</h4>
      </div>
    </div>
    <div class="nf-form-wrap">
      <div class="row">
        <div class="col-12 col-md-6 col-xl-4" id="imc_menu">
          <div class="nf-select-wrap">
            <div class="nf-select-img">
              <img src="<?php echo get_template_directory_uri(). '/assets/'?>/img/entreprenuearship/fruit.png" alt="state">
              <span>IMC</span>
            </div>
            <div class="nf-select-field">
              <?php 
                      $var = get_field_object('field_60f5abf4bc33a');
                      ?>
                      <select class="form-control selectpicker" name="imc"  id="imc">
                        <option value="">Select IMC's</option>
                        <?
                        foreach($var['choices'] as $choice)
                        {
                          echo '<option value="'.$choice.'">'.$choice.'</option>';
                        }
                        ?>
                        </select>
                          
            </div>
          </div>
          <span id="error_msg1" style="color: red;"></span>
        </div> 
        <div class="col-12 col-md-6 col-xl-4" id="imc_exo_menu" style="display: none;">
          <div class="nf-select-wrap">
            <div class="nf-select-img">
              <img src="<?php echo get_template_directory_uri(). '/assets/'?>/img/entreprenuearship/fruit.png" alt="state">
              <span>Exotic Carp</span>
            </div>
            <div class="nf-select-field">
              <?php 
                      $var = get_field_object('field_60f5ac19bc33b');
                      ?>
                      <select class="form-control selectpicker" id="imc_exo" name="imc_exo" hidden="true">
                        <option value="">Select Exotic Carp</option>
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
        <div class="col-12 col-md-6 col-xl-4" id="imc_exo_minor_menu" style="display: none;">
          <div class="nf-select-wrap">
            <div class="nf-select-img">
              <img src="<?php echo get_template_directory_uri(). '/assets/'?>/img/entreprenuearship/fruit.png" alt="state">
              <span>Minor Carp</span>
            </div>
            <div class="nf-select-field">
               <?php 
                      $var = get_field_object('field_60f5ac4bbc33c');
                      ?>
                      <select class="form-control selectpicker" id="imc_exo_minor" name="imc_exo_minor" hidden="true">
                        <option value="">Select Minor Carp</option>
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
      </div>
    </div><?php*/?>
  </div>
</div>
</div>
<div class="nf-circle-bg-img">
  <div class="container">
    <div class="row">
      <div class="col-12 nf-button-wrapper mb-sm-0 mb-3">
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
<?php get_footer(); ?>
<script type="text/javascript">

   function validation_function()
   {
      var error_msg1 = document.getElementById("error_msg1");
      var error_msg2 = document.getElementById("error_msg2");
      var error_msg3 = document.getElementById("error_msg3");

      error_msg1.textContent = "";
      error_msg2.textContent = "";
      error_msg3.textContent = "";


       if($('#imc').val()=='' && ($('#customRadioInline1').is(':checked') || $('#customRadioInline2').is(':checked') || $('#customRadioInline3').is(':checked')) )
       {
           // alert('hjghj');
           error_msg1.textContent = "*Please select IMC";
           return false;
       }
       
       else if($('#imc_exo').val()=='' && ($('#customRadioInline2').is(':checked') || $('#customRadioInline3').is(':checked')))
       {
           
           error_msg2.textContent = "*Please select Exotic Carp";
           return false;
       }
       

        else if($('#imc_exo_minor').val()=='' && $('#customRadioInline3').is(':checked'))
       {
           
           error_msg3.textContent = "*Please select Minor Carp";
           return false;
       }
   }

  $(function(){
    $('input[name="polyculture_search"]').on('click', function(){
      if ($(this).val() == 'imc') 
      {
        $('#imc_menu').show();
        $('#imc_exo_menu').hide();
        $('#imc_exo_minor_menu').hide();
      }

      if ($(this).val() == 'imc_and_exo') 
      {
        $('#imc_menu').show();
        $('#imc_exo_menu').show();
        $('#imc_exo_minor_menu').hide();
      }

      if ($(this).val() == 'imc_exo_minor') 
      {
        $('#imc_menu').show();
        $('#imc_exo_menu').show();
        $('#imc_exo_minor_menu').show();
      }

      if ($(this).val() == 'other') 
      {
        $('#imc_menu').hide();
        $('#imc_exo_menu').hide();
        $('#imc_exo_minor_menu').hide();
      }
    });
  });


  $(document).on('click', '.submitBtn', function() {
    var siteurl = '<?php echo site_url() ?>/'; 
    var radioValue = $("input[name='polyculture_search']:checked").val();

    $('#aquaculture-polyculture').attr('action',siteurl+'aquaculture-culturetype-polyculture1');

    /*if(radioValue == 'imc')
    {
      $('#aquaculture-polyculture').attr('action',siteurl+'aquaculture-culturetype-polyculture1'); 
    }
    if(radioValue == 'imc_and_exo')
    {
      $('#aquaculture-polyculture').attr('action',siteurl+'aquaculture-culturetype-polyculture2'); 
    }
    if(radioValue == 'imc_exo_minor')
    {
      $('#aquaculture-polyculture').attr('action',siteurl+'aquaculture-culturetype-polyculture3'); 
    }*/
  });
</script>