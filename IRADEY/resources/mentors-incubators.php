<?php /*Template Name: Mentors and Incubators */ ?>
<?php get_header();
$page_data = get_page_by_path( 'mentors-incubators' );

?>
  <!-- header-end -->
    <!-- inner-banner-start -->
    <div id="preloader-loader" style="display:none;"></div>
    <div class="inner-banner">
      <div class="container">
        <div class="banner-title">
          <h3><?php echo $page_data->post_title;?></h3>
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Resources</a></li>
            <li class="breadcrumb-item active"><?php echo $page_data->post_title;?></li>
          </ul>
        </div>
        <div class="banner-content">
          <div class="row">
            <div class="col-md-4 banner-img pr-0"><?php echo get_the_post_thumbnail(); ?></div>
            <div class="col-md-8  pl-0">
              <div class="bannerbg nf-gradient-10 justify-content-start pt-3 nf-height-100">
                <!-- <h4 class="nf-f-size-24"><?php echo $page_data->post_title;?></h4> -->
                <h4 class="nf-f-size-20"><?php echo $page_data->post_content;?> </h4>
                <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/layers-bg.png" alt="layers background" class="nf-layes-bg">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- inner-banner-end -->
    <!-- Study tour in north section  -->
    <form method="post" action="" id="mentors-and-incubators">
      <input type="hidden" name="type" id="type" value="Mentor">
    <div class="inner-body">
      <div class="container">
        <div class="national-level icon-text-box">
          <div class="row mb-2">
            <div class="col-md-8">
              <h4 class="nf-f-size-20 nf-strong">Select Options</h4>
            </div>
          </div>
          <div class="nf-form-wrap">
            <div class="row">
                <div class="col-12 col-md-6 col-xl-3">
                    <div class="nf-radio-wrap mb-4">
                        <div class="custom-control custom-radio custom-control-inline pl-0">
                            <input type="radio" id="customRadioInline1" name="mentorsAndIncubators" class="custom-control-input" value="mentors" checked onclick="document.getElementById('type').value = 'Mentor';getregion('Mentor','1');">
                            <label class="custom-control-label" for="customRadioInline1">Mentors</label>
                        </div>
                    </div>
                </div>
           
            <div class="col-12 col-md-6 col-xl-3">
                <div class="nf-radio-wrap mb-4">
                    <div class="custom-control custom-radio custom-control-inline pl-0">
                        <input type="radio" id="customRadioInline2" name="mentorsAndIncubators" class="custom-control-input" value="incubators" onclick="document.getElementById('type').value = 'Incubator';getregion('Incubator','1');">
                        <label class="custom-control-label" for="customRadioInline2">Incubators</label>
                    </div>
                </div> 
            </div> 
            </div>
             </div>
          </div>
          <div class="nf-form-wrap mt-4">
          <div class="row">
            <div class="col-12 col-md-6 col-xl-5">
             <!--  <label>Find Internship by Location</label> -->
              <div class="nf-select-wrap">
                <div class="nf-select-img">
                  <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/state.png" alt="state">
                  <span>State</span>
                </div>
                <div class="nf-select-field">
                  <?php 
                      $var = get_field_object('field_60d2d1bb27bde');
                      ?>
                      <select class="form-control selectpicker" name="state" id="state">
                        <option value="">Select State</option>
                        <?
                        foreach($var['choices'] as $choice)
                        {
                          echo '<option value="'.$choice.'">'.$choice.'</option>';
                        }
                        ?>
                        <select>
                </div>
              </div>
              <span id="error_msg1" style="color: red;"></span>
            </div>
            <div class="col-12 col-md-6 col-xl-5">
              <!-- <label>Find Internship by Industry</label> -->
              <div class="nf-select-wrap">
                <div class="nf-select-img">
                  <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entrepreneurship-and-resources/area.png" alt="area">
                  <!--<span>Area of <br>Specialization</span>-->
                  <span>Sector</span>
                </div>
                <div class="nf-select-field">
                  <?php 
                      $var = get_field_object('field_60d2d5ba27bdf');
                      ?>
                      <select class="form-control selectpicker" name="sectors" id="sectors">
                        <option value="">Select Sector</option>
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
          </div>
        </div>
        </div>
      </div>
    </div>
    <div class="nf-circle-bg-img">
      <div class="container">
        <div class="row">
          <div class="col-12 nf-button-wrapper">
            <button type="submit" class="nf-button-v-small submitBtn" >
              Apply
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
      var error_msg1 = document.getElementById("error_msg1");
      var error_msg2 = document.getElementById("error_msg2");
      
      error_msg1.textContent = "";
      error_msg2.textContent = "";
      


      if($('#state').val()=='' )
      {
          // alert('hjghj');
          error_msg1.textContent = "*Please select State";
          return false;
      }
       
      else if($('#sectors').val()=='')
      {
           
          error_msg2.textContent = "*Please select Area";
          return false;
      }
       

  }


  


  $(document).on('click', '.submitBtn', function() {
    var siteurl = '<?php echo site_url() ?>/'; 
    var radioValue = $("input[name='mentorsAndIncubators']:checked").val();

    if(radioValue == 'mentors')
    {
      $('#mentors-and-incubators').attr('action',siteurl+'mentors'); 
      
    }
    if(radioValue == 'incubators')
    {
      $('#mentors-and-incubators').attr('action',siteurl+'incubators'); 
      
    }
  });



  function getregion(val,id)
    {
    if(id!='') $('#preloader-loader').css("display", "block");

    $.ajax({
        data: {"type": val, 'action': 'my_action_get_mentor_incub_sector'},
        url: "<?php echo site_url()?>/wp-admin/admin-ajax.php",
        type: "post",
        //async: false,
        success: function(data) {
           //alert(data);
           var res = data.split('*****');
           $('#state').html(res[0]);
           $('#sectors').html(res[1]);
           
           $('.selectpicker').selectpicker({ noneSelectedText : 'Select' });
           $('.selectpicker').selectpicker('refresh');
           
           $('#preloader-loader').css("display", "none");
        }
    });
  }

  $('#state').change(function(){
    $('#preloader-loader').css("display", "block");

    $.ajax({
        data: {"type": $('#type').val(),"state":$('#state').val(), 'action': 'my_action_get_mentor_incub_sector'},
        url: "<?php echo site_url()?>/wp-admin/admin-ajax.php",
        type: "post",
        success: function(data) {
           //alert(data);
           var res = data.split('*****');
           

           if(res[0] && res[1])
           {
            $('#state').html(res[0]);
            $('#sectors').html(res[1]);
            
           }
           else if(res[0])
           {
            $('#sectors').html(res[0]);
           }
           

           $('.selectpicker').selectpicker({ noneSelectedText : 'Select' });
           $('.selectpicker').selectpicker('refresh');
           //
           $('#preloader-loader').css("display", "none");
        }
    });
});

  window.onload=function(){ getregion('Mentor',''); };
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

