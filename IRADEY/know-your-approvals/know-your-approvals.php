<?php /*Template Name: know your approval */ ?>
<?php get_header(); 

$current_slug = add_query_arg( array(), $wp->request );
$current_slug = explode('/',$current_slug);
$the_slug = end($current_slug);
$type = $current_slug[count($current_slug) - 2];

//echo $the_slug;exit;

$page_data = get_page_by_path( $the_slug );
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
            <li class="breadcrumb-item active"><?php echo $page_data->post_title;?></li>
          </ul>
        </div>

        <div class="banner-content">
          <div class="row">
            <?php $url = wp_get_attachment_url( get_post_thumbnail_id($post_id) );?>
            <div class="col-md-4 banner-img pr-0"><img src="<?php echo $url?>"></div>
            <div class="col-md-8  pl-0">
              <div class="bannerbg nf-gradient-11 justify-content-start pt-3 nf-height-100">
                <h4 class="nf-f-size-24"><?php echo $page_data->post_title;?></h4>
                <h5 class="nf-f-size-16"><?php echo $page_data->post_content;?></h5>
                <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/layers-bg.png" alt="layers background" class="nf-layes-bg">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- inner-banner-end -->
    <!-- Study tour in north section  -->
    <form method="post" action="<?php echo site_url()?>/know-your-approvals-list">
    <div class="inner-body">
      <div class="container">
        <div class="national-level icon-text-box">
          <div class="row mb-2">
            <div class="col-md-8">
              <h4 class="nf-f-size-20 nf-strong">Select Career Options</h4>
            </div>
          </div>
          <div class="nf-form-wrap">
            <div class="row">
              <div class="col-12 col-md-6 col-xl-4">
                <div class="nf-select-wrap">
                  <div class="nf-select-img">
                    <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/state.png" alt="state">
                    <span>State</span>
                  </div>
                  <div class="nf-select-field">
                    <?php 
                      $var = get_field_object('field_60f82577d9f8a');
                      ?>
                      <select class="form-control selectpicker" name="state" id="state">
                        <option value="">Select State</option>
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
              
              <div class="col-12 col-md-6 col-xl-4">
                <div class="nf-select-wrap">
                  <div class="nf-select-img">
                    <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/know-your-approvals/industry.png" alt="industry">
                    <span>Industry</span>
                  </div>
                  <div class="nf-select-field">
                    <?php 
                      $var = get_field_object('field_60f825acd9f8b');
                      ?>
                      <select class="form-control selectpicker" name="industry" id="industry">
                        <option value="">Select Industry</option>
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

                <div class="col-12 col-md-6 col-xl-4">
                <div class="nf-select-wrap">
                  <div class="nf-select-img">
                    <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/enterprise.png" alt="Enterprise">
                    <span>Enterprise</span>
                  </div>
                  <div class="nf-select-field">
                    <?php 
                      $var = get_field_object('field_60f825c5d9f8c');
                      ?>
                      <select class="form-control selectpicker" name="enterprise" id="enterprise">
                        <option value="">Select Enterprise</option>
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
        
        <?php/*?><div class="col-12 col-md-6 col-xl-4">
                <div class="nf-select-wrap">
                  <div class="nf-select-img">
                    <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/know-your-approvals/entity.png" alt="entity">
                    <span>Entity</span>
                  </div>
                  <div class="nf-select-field">
                    <?php 
                      $var = get_field_object('field_60deacce6c931');
                      ?>
                      <select class="form-control selectpicker" name="entity">
                        <option value="">Select Entity</option>
                        <?
                        foreach($var['choices'] as $choice)
                        {
                          echo '<option value="'.$choice.'">'.$choice.'</option>';
                        }
                        ?>
                      </select>
                  </div>
                </div>
              </div><?php*/?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="nf-circle-bg-img">
      <div class="container">
        <div class="row">
          <div class="col-12 nf-button-wrapper">
            <button type="submit" class="nf-button-v-small" onclick="return validation_function()">
                  Next
                </button>
          </div>
          <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/circle-bg.jpg" alt="background image" class="img-fluid">
        </div>
      </div>
    </div>
  </form>
    <!-- End Study tour in north section  -->
   <!-- End Study tour in north section  -->
      <!-- footer start -->   
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
     
      var flag=true;

       if($('#state').val()=='')
       {
           // alert('hjghj');
           error_msg1.textContent = "*Please select state";
           flag= false;
       }
       if($('#industry').val()=='')
       {
           // alert('hjghj');
           error_msg2.textContent = "*Please select industry";
           flag= false;
       }
       if($('#enterprise').val()=='')
       {
           // alert('hjghj');
           error_msg3.textContent = "*Please select enterprise";
           flag= false;
       }

      
       return flag;
       }

$('#state').change(function(){
    $('#preloader-loader').css("display", "block");

    $.ajax({
        data: {"state": $('#state').val(), 'action': 'my_action_get_knowapproval'},
        url: "<?php echo site_url()?>/wp-admin/admin-ajax.php",
        type: "post",
        success: function(data) {
          // alert(data);
           var res = data.split('*****');
           $('#industry').html(res[0]);
           $('#enterprise').html(res[1]);
           $('.selectpicker').selectpicker({ noneSelectedText : 'Select' });
           $('.selectpicker').selectpicker('refresh');
           $('#preloader-loader').css("display", "none");
        }
    });
});
$('#industry').change(function(){
    $('#preloader-loader').css("display", "block");

    $.ajax({
        data: {"state": $('#state').val(),"industry": $('#industry').val(), 'action': 'my_action_get_knowapproval'},
        url: "<?php echo site_url()?>/wp-admin/admin-ajax.php",
        type: "post",
        success: function(data) {
          // alert(data);
           var res = data.split('*****');
           
           if(res[0] && res[1])
           {
              $('#industry').html(res[0]);
              $('#enterprise').html(res[1]);
           }
           else if(res[0])
           {
            $('#enterprise').html(res[0]);
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