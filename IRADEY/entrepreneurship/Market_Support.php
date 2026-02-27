<?php /*Template Name: Market Support */ ?>
<?php get_header();
$page_data = get_page_by_path( 'market-support-infrastructure' );
?>
  <!-- header-end -->

  <!-- inner-banner-start -->
  <div id="preloader-loader" style="display:none;"></div>
  <div class="inner-banner">
    <div class="container">
     <div class="banner-title">
      <h3><?php echo $page_data->post_title;?> </h3>
      <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Entrepreneurship</a></li>
        <!-- <li class="breadcrumb-item"><a href="#">Know your Business</a></li> -->
        <li class="breadcrumb-item"><a href="#"> <?php echo $page_data->post_title;?></a></li>
       
      </ul>
    </div>

    <div class="banner-content">
      <div class="row">
        <?php $url = wp_get_attachment_url( get_post_thumbnail_id($post_id) );?>
        <div class="col-md-4 banner-img pr-0"><img src="<?php echo $url?>"></div>
        <div class="col-md-8  pl-0">
          <div class="bannerbg nf-gradient-1 justify-content-start p-3 nf-height-100">
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
<form method="post" id="market-support-infrastructure" action="">
<div class="inner-body">
  <div class="container">
    <div class="national-level icon-text-box">
   
      
     <div class="row mb-2">
      <div class="col-md-8">
        <h4 class="nf-f-size-24 nf-strong">Select Category</h4>
      </div>
    </div>
    <div class="nf-form-wrap">
        <div class="row">
            <div class="col-12 col-md-6 col-xl-3">
                <div class="nf-radio-wrap mb-4">
                    <div class="custom-control custom-radio custom-control-inline pl-0">
                        <input type="radio" id="customRadioInline1" name="resource_infrastructure" class="custom-control-input" value="Industry Infrastructure" required>
                        <label class="custom-control-label" for="customRadioInline1">Industry Infrastructure</label>
                    </div>
                </div>
            </div>
       
            <div class="col-12 col-md-6 col-xl-3">
                <div class="nf-radio-wrap mb-4">
                    <div class="custom-control custom-radio custom-control-inline pl-0">
                        <input type="radio" id="customRadioInline2" name="resource_infrastructure" class="custom-control-input" value="Market Support Agency" required>
                        <label class="custom-control-label" for="customRadioInline2">Market Support Agency</label>
                    </div>
                </div> 
            </div>
            
        </div>
        <span id="error_msg0" style="color: red;"></span> 
    </div>
    <div class="nf-form-wrap">
      <div class="row">
        <div class="col-12 col-md-6 col-xl-4 d-none" id="stateDiv">
          <div class="nf-select-wrap">
            <div class="nf-select-img">
              <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/state.png" alt="state">
              <span>State</span>
            </div>
            <div class="nf-select-field">
              <?php 
                $var = get_field_object('field_60d5da2e639d3');
              ?>
              <select class="form-control selectpicker" name="state" id="state" >
                 <option value="">Select State</option>
                  <?php foreach($var['choices'] as $choice) { ?>
                    <option value="<?php echo $choice; ?>"><?php echo $choice; ?></option>';
                  <?php } ?>
              </select>
            </div>
          </div>
          <span id="error_msg1" style="color: red;"></span>
        </div>
        <div class="col-12 col-md-6 col-xl-4 d-none" id="infraDiv">
          <div class="nf-select-wrap">
            <div class="nf-select-img">
              <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/harvesting.png" alt="course">
              <span>Type of Infrastructure</span>
            </div>
            <div class="nf-select-field">
              <?php 
                $var = get_field_object('field_60d5dadb639d4');
              ?>
              <select class="form-control selectpicker" name="infrastructure" id="infrastructure">
                 <option value="">Select Infrastructure</option>
                  <?php foreach($var['choices'] as $choice) { ?>
                    <option value="<?php echo $choice; ?>"><?php echo $choice; ?></option>';
                  <?php } ?>
              </select>
            </div>
          </div>
          <span id="error_msg2" style="color: red;"></span>
        </div>
        <div class="col-12 col-md-6 col-xl-4 d-none" id="sectorDiv">
          <div class="nf-select-wrap">
            <div class="nf-select-img">
              <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/sector.png" alt="Sectors">
              <span>Sectors</span>
            </div>
            <div class="nf-select-field">
              <?php 
                $var = get_field_object('field_60d6eb75829e3');
              ?>
              <select class="form-control selectpicker" name="sectors" id="sectors">
                 <option value="">Select Sectors</option>
                  <?php foreach($var['choices'] as $choice) { ?>
                    <option value="<?php echo $choice; ?>"><?php echo $choice; ?></option>';
                  <?php } ?>
              </select>
            </div>
          </div>
          <span id="error_msg3" style="color: red;"></span>
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

  function validation_function()
   {
    var error_msg0 = document.getElementById("error_msg0");
       var error_msg1 = document.getElementById("error_msg1");
       var error_msg2 = document.getElementById("error_msg2");
      var error_msg3 = document.getElementById("error_msg3");


      error_msg0.textContent ='';
       error_msg1.textContent = "";
       error_msg2.textContent = "";
      error_msg3.textContent = "";

      if(!$('#customRadioInline1').is(':checked') && !$('#customRadioInline2').is(':checked'))
      {
          error_msg0.textContent = "*Please select category";
           return false;
      }


       /*if($('#state').val()=='' && ($('#customRadioInline1').is(':checked') || $('#customRadioInline2').is(':checked')))
       // if($('#state').val()=='') 
       {
           // alert('hjghj');
           error_msg1.textContent = "*Please select state";
           return false;
       }
        if($('#infrastructure').val()=='' && ($('#customRadioInline1').is(':checked')))
        // if($('#infrastructure').val()=='') 
       {
           
           error_msg2.textContent = "*Please select infrastructure";
           return false;
       }
       if($('#sectors').val()=='' && ($('#customRadioInline2').is(':checked')))
          // if($('#sectors').val()=='')
       {
           
           error_msg3.textContent = "*Please select sector";
           return false;
       }*/

   }


  $('input[type=radio][name=resource_infrastructure]').change(function() {
    var selectedValue = $("input[name='resource_infrastructure']:checked").val();
    if(selectedValue == 'Industry Infrastructure')
    {
       $("#sectorDiv").addClass("d-none");
         $("#stateDiv").removeClass("d-none");
       $("#infraDiv").removeClass("d-none");
       //$("#infrastructure").attr('required','true');
       //$("#sectors").removeAttr('required');
    }
    if(selectedValue == 'Market Support Agency')
    {
       $("#infraDiv").addClass("d-none");
       $("#stateDiv").addClass("d-none");
       $("#sectorDiv").removeClass("d-none");
       

       //$("#sectors").attr('required','true');
       //$("#infrastructure").removeAttr('required');
    }
  });


// $(document).ready(function(){
//   $("#customRadioInline2").click(function(){
//     $("state").hide();
//   });
//   $("#customRadioInline1").click(function(){
//     $("state").show();
//   });
// });


  $(document).on('click', '.submitBtn', function() {
    var siteurl = '<?php echo site_url() ?>/'; 
    var radioValue = $("input[name='resource_infrastructure']:checked").val();

    if(radioValue == 'Industry Infrastructure')
    {
      $('#market-support-infrastructure').attr('action',siteurl+'market-support-infrastructure-details'); 
    }
    if(radioValue == 'Market Support Agency')
    {
      $('#market-support-infrastructure').attr('action',siteurl+'market-support-details'); 
    }
  });
  //===========

  $('#state').change(function(){
    $('#preloader-loader').css("display", "block");

    $.ajax({
        data: {"state": $('#state').val(), 'action': 'my_action_get_infrastructure'},
        url: "<?php echo site_url()?>/wp-admin/admin-ajax.php",
        type: "post",
        success: function(data) {
           //alert(data);
           $('#infrastructure').html(data);
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

