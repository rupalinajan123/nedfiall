<?php /* Template Name: study-in-north-east */
 ?>
<?php get_header(); 

$category_id = get_cat_ID ('Study in North-East');
$categories = get_category( $category_id );

$page_data = get_page_by_path( 'study-in-north-east' );
?>
<!-- /end header-bottom -->

    <!-- inner-banner-start -->
    <div id="preloader-loader" style="display:none;"></div>
    <div class="inner-banner">
        <div class="container">
            <div class="banner-title">
                <h3><?php echo $page_data->post_title;?></h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Education</a></li>
                    <li class="breadcrumb-item active"><?php echo $page_data->post_title;?></li>
                </ul>
            </div>

            <div class="banner-content">
                <div class="row">
                  <?php $url = wp_get_attachment_url( get_post_thumbnail_id($post_id) );?>
                    <div class="col-md-4 banner-img pr-0"><img src="<?php echo $url?>"></div>
                    <div class="col-md-8  pl-0">
                      <div class="bannerbg nf-gradient-2 justify-content-start pt-3 nf-height-100">
                        <!--<h4 class="nf-f-size-24"><?php //echo $page_data->post_title;?></h4>-->
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
   <form method="post" action="<?php echo site_url()?>/study-in-north-east-list/">
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
                      $var = get_field_object('field_60b23a93b3052');
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
                </div>

                  <div class="col-12 col-md-6 col-xl-4">
                    <div class="nf-select-wrap">
                      <div class="nf-select-img">
                        <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/department.png" alt="department">
                        <span>Department</span>
                      </div>
                      <div class="nf-select-field">
                      <?php 
                      $var = get_field_object('field_60b23932b3044');
                      ?>
                      <select class="form-control selectpicker" name="dept" id="dept">
                        <option value="">Select Department</option>
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
                  <?php/*?><div class="col-12 col-md-6 col-xl-4">
                    <div class="nf-select-wrap">
                      <div class="nf-select-img">
                        <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/course.png" alt="course">
                        <span>Course</span>
                      </div>
                      <div class="nf-select-field">
                        
                        <?php 
                      $var = get_field_object('field_60b23968b3046');
                      ?>
                      <select class="form-control selectpicker" name="course">
                        <option value="">Select Course</option>
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
                  <div class="col-12 col-md-6 col-xl-4">
                    <div class="nf-select-wrap">
                      <div class="nf-select-img">
                        <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/education.png" alt="education">
                        <span>Mode of Education</span>
                      </div>
                      <div class="nf-select-field">
                        <?php 
                      $var = get_field_object('field_60b239c7b3049');
                      ?>
                      <select class="form-control selectpicker" name="educ" id="educ">
                        <option value="">Select Mode</option>
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
                        <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/study.png" alt="study">
                        <span>Study Level</span>
                      </div>
                      <div class="nf-select-field">
                        <?php 
                      $var = get_field_object('field_60b239acb3048');
                      ?>
                      <select class="form-control selectpicker" name="level" id="level">
                        <option value="">Select Level</option>
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
  $('#state').change(function(){
    $('#preloader-loader').css("display", "block");

    $.ajax({
        data: {"state": $('#state').val(), 'action': 'my_action_get_northeast_department'},
        url: "<?php echo site_url()?>/wp-admin/admin-ajax.php",
        type: "post",
        success: function(data) {
           //alert(data);
           var res = data.split('*****');
           $('#dept').html(res[0]);
           $('#educ').html(res[1]);
           $('#level').html(res[2]);
           $('.selectpicker').selectpicker({ noneSelectedText : 'Select' });
           $('.selectpicker').selectpicker('refresh');
           //
           $('#preloader-loader').css("display", "none");
        }
    });
});
  $('#dept').change(function(){
    $('#preloader-loader').css("display", "block");

    $.ajax({
        data: {"state": $('#state').val(),"dept":$('#dept').val(), 'action': 'my_action_get_northeast_department'},
        url: "<?php echo site_url()?>/wp-admin/admin-ajax.php",
        type: "post",
        success: function(data) {
           //alert(data);
           var res = data.split('*****');
           

           if(res[0] && res[1] && res[2])
           {
            $('#dept').html(res[0]);
            $('#educ').html(res[1]);
            $('#level').html(res[2]);
           }
           else if(res[0] && res[1])
           {
            $('#educ').html(res[0]);
           $('#level').html(res[1]);
           }
           else if(res[0])
           {
            $('#level').html(res[0]);
           }

           $('.selectpicker').selectpicker({ noneSelectedText : 'Select' });
           $('.selectpicker').selectpicker('refresh');
           //
           $('#preloader-loader').css("display", "none");
        }
    });
});
  $('#educ').change(function(){
    $('#preloader-loader').css("display", "block");

    $.ajax({
        data: {"state": $('#state').val(), "dept":$('#dept').val(), "educ":$('#educ').val(), 'action': 'my_action_get_northeast_department'},
        url: "<?php echo site_url()?>/wp-admin/admin-ajax.php",
        type: "post",
        success: function(data) {
           //alert(data);
           var res = data.split('*****');
           
           if(res[0] && res[1] && res[2])
           {
            $('#dept').html(res[0]);
            $('#educ').html(res[1]);
            $('#level').html(res[2]);
           }
           else if(res[0] && res[1])
           {
            $('#educ').html(res[0]);
           $('#level').html(res[1]);
           }
           else if(res[0])
           {
            $('#level').html(res[0]);
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
