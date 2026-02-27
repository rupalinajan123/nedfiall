<?php /* Template Name: Loan Support Search */
 ?>
<?php get_header(); 
$page_data = get_page_by_path( 'credit-linkage-support-search' );
?>
<!-- /end header-bottom -->

<!-- inner-banner-start --> 
<div id="preloader-loader" style="display:none;"></div>
<div class="inner-banner">
  <div class="container">
    <div class="banner-title">
      <h3><?php echo $page_data->post_title;?></h3>
      <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Entrepreneurship</a></li>
        <li class="breadcrumb-item active"><?php echo $page_data->post_title;?></li>
      </ul>
    </div>

    <div class="banner-content">
      <div class="row">
        <?php $url = wp_get_attachment_url( get_post_thumbnail_id($post_id) );?>
        <div class="col-md-4 banner-img pr-0"><img src="<?php echo $url?>" alt="Credit Linkage Support"></div>
        <div class="col-md-8  pl-0">
          <div class="bannerbg nf-gradient-23 justify-content-start pt-3 nf-height-100 nf-fcc">
            <h4 class="nf-f-size-24"><?php echo $page_data->post_title;?></h4>
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
<form method="post" action="<?php echo site_url()?>/credit-linkage-support-details/">
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
         <div class="col-12 col-md-6 col-xl-4">
                  <div class="nf-select-wrap">
                    <div class="nf-select-img">
                      <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/loan.png" alt="state">
                      <span>Loan Amount</span>
                    </div>
                    <div class="nf-select-field">

                      <?php 
                      $var = get_field_object('field_61011b5f67441');
                      ?>
                      <select class="form-control selectpicker" name="loan_amount" id="loan_amount">
                        <option value="">Select Loan Amount</option>
                        <?
                        foreach($var['choices'] as $choice)
                        {
                          echo '<option value="'.$choice.'">'.$choice.'</option>';
                        }
                        ?>
                      </select>
                    </div>
                  </div>
                </div>
          <div class="col-12 col-md-6 col-xl-4">
            <div class="nf-select-wrap">
              <div class="nf-select-img">
                <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/cast.png" alt="Cast">
                <span>Caste</span>
              </div>
              <div class="nf-select-field">

                      <?php 
                      $var = get_field_object('field_61011aa56743d');
                      ?>
                      <select class="form-control selectpicker" name="cast" id="cast">
                        <option value="">Select Caste</option>
                        <?
                        foreach($var['choices'] as $choice)
                        {
                          echo '<option value="'.$choice.'">'.$choice.'</option>';
                        }
                        ?>
                      </select>
                    </div>
            </div>
          </div>
          <div class="col-12 col-md-6 col-xl-4">
            <div class="nf-select-wrap">
              <div class="nf-select-img">
                <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/gender.png" alt="Gender">
                <span>Gender</span>
              </div>
              <div class="nf-select-field">
                <?php 
                $var = get_field_object('field_61011aff6743e');
                ?>
                <select class="form-control selectpicker" name="gender" id="gender">
                  <option value="">Select Gender</option>
                  <?
                  foreach($var['choices'] as $choice)
                  {
                    echo '<option value="'.$choice.'">'.$choice.'</option>';
                  }
                  ?>
                </select>
              </div>            
            </div>
          </div>
          <div class="col-12 col-md-6 col-xl-4">
            <div class="nf-select-wrap">
              <div class="nf-select-img">
                <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/habitat.png" alt="Habitat">
                <span>Habitat</span>
              </div>
              <div class="nf-select-field">
                <?php 
                $var = get_field_object('field_61011b1d6743f');
                ?>
                <select class="form-control selectpicker" name="habitat" id="habitat">
                  <option value="">Select Habitat</option>
                  <?
                  foreach($var['choices'] as $choice)
                  {
                    echo '<option value="'.$choice.'">'.$choice.'</option>';
                  }
                  ?>
                </select>
              </div>  
            </div>
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
        <button class="nf-button-v-small" type="submit">
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
  $('#loan_amount').change(function(){
    $('#preloader-loader').css("display", "block");

    $.ajax({
        data: {"loan_amount": $('#loan_amount').val(), 'action': 'my_action_get_loan_support'},
        url: "<?php echo site_url()?>/wp-admin/admin-ajax.php",
        type: "post",
        success: function(data) {
           //alert(data);
           var res = data.split('*****');
           $('#cast').html(res[0]);
           $('#gender').html(res[1]);
           $('#habitat').html(res[2]);
           $('.selectpicker').selectpicker({ noneSelectedText : 'Select' });
           $('.selectpicker').selectpicker('refresh');
           //
           $('#preloader-loader').css("display", "none");
        }
    });
});
  $('#cast').change(function(){
    $('#preloader-loader').css("display", "block");

    $.ajax({
        data: {"loan_amount": $('#loan_amount').val(),"cast":$('#cast').val(), 'action': 'my_action_get_loan_support'},
        url: "<?php echo site_url()?>/wp-admin/admin-ajax.php",
        type: "post",
        success: function(data) {
           //alert(data);
           var res = data.split('*****');
           

           if(res[0] && res[1] && res[2])
           {
            $('#cast').html(res[0]);
            $('#gender').html(res[1]);
            $('#habitat').html(res[2]);
           }
           else if(res[0] && res[1])
           {
            $('#gender').html(res[0]);
           $('#habitat').html(res[1]);
           }
           else if(res[0])
           {
            $('#habitat').html(res[0]);
           }

           $('.selectpicker').selectpicker({ noneSelectedText : 'Select' });
           $('.selectpicker').selectpicker('refresh');
           //
           $('#preloader-loader').css("display", "none");
        }
    });
});
  $('#gender').change(function(){
    $('#preloader-loader').css("display", "block");

    $.ajax({
        data: {"loan_amount": $('#loan_amount').val(), "cast":$('#cast').val(), "gender":$('#gender').val(), 'action': 'my_action_get_loan_support'},
        url: "<?php echo site_url()?>/wp-admin/admin-ajax.php",
        type: "post",
        success: function(data) {
           //alert(data);
           var res = data.split('*****');
           
           if(res[0] && res[1] && res[2])
           {
            $('#cast').html(res[0]);
            $('#gender').html(res[1]);
            $('#habitat').html(res[2]);
           }
           else if(res[0] && res[1])
           {
            $('#gender').html(res[0]);
           $('#habitat').html(res[1]);
           }
           else if(res[0])
           {
            $('#habitat').html(res[0]);
           }
           
           $('.selectpicker').selectpicker({ noneSelectedText : 'Select' });
           $('.selectpicker').selectpicker('refresh');
           //
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

