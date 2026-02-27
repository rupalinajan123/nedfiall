<?php /* Template Name: scholership for girls */
?>
<?php get_header(); 

$category_id = get_cat_ID ('Scholarship for Girls');
$categories = get_category( $category_id );

$page_data = get_page_by_path( 'scholarship-for-girls' );
?>

<!-- header-end -->
<div id="preloader-loader" style="display:none;"></div>
<div class="inner-banner">
  <div class="container">
    <div class="banner-title">
      <h3><?php echo $page_data->post_title;?></h3>
      <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Advancing Girls Advancing North East</a></li>
        <li class="breadcrumb-item active"><?php echo $page_data->post_title;?></li>
      </ul>
    </div>
    <div class="banner-content">
      <div class="row">
        <div class="col-md-4 banner-img pr-0"><?php echo get_the_post_thumbnail(); ?></div>
        <div class="col-md-8  pl-0">
          <div class="bannerbg nf-gradient-27 justify-content-start pt-3 nf-height-100">
            <h4 class="nf-f-size-24"><?php echo $page_data->post_title;?></h4>
            <h5><?php echo $page_data->post_content;?></h5>
            <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/home/layer.png" alt="layers background" class="nf-layes-bg">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- inner-banner-end -->
<!-- Study tour in north section  -->
<form method="post" action="<?php echo site_url()?>/scholarship-for-girls-list/" id="formId">
  <div class="inner-body">
    <div class="container">
      <div class="national-level icon-text-box">
        <div class="row mb-2">
          <div class="col-md-8">
            <h4 class="nf-f-size-20 nf-strong">Select Options</h4>
          </div>
        </div>

        <input type="hidden" name="region" id="region" value="All">

        <div class="nf-navtab-sec">
         <ul class="nav nav-pills mb-3" id="selectRegion" role="tablist">
          <li class="nav-item" value="All" onclick="document.getElementById('region').value = 'All';getregion('')">
            <a class="nav-link active" data-toggle="pill" href="#pills-all" name="region"><img src="<?php echo get_template_directory_uri(). '/assets/'?>img/education/world-map.png" > All</a>
          </li>
          <li class="nav-item"  value="India" onclick="document.getElementById('region').value = 'India'; getregion('')">
            <a class="nav-link" data-toggle="pill" href="#pills-all" ><img src="<?php echo get_template_directory_uri(). '/assets/'?>img/education/india-sm.png" > India</a>
          </li>
          <li class="nav-item" value="Abroad" onclick="document.getElementById('region').value = 'Abroad'; getregion('')">
            <a class="nav-link"  data-toggle="pill" href="#pills-all"><img src="<?php echo get_template_directory_uri(). '/assets/'?>img/education/abroad-sm.png" > Abroad</a>
          </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
          <div class="tab-pane fade show active" id="pills-all" role="tabpanel">
            <div class="nf-form-wrap">
              <div class="row">                
                <div class="col-12 col-md-6 col-xl-4" id="department_menu">
                  <div class="nf-select-wrap">
                    <div class="nf-select-img">
                      <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/department.png" alt="department">
                      <span>Department</span>
                    </div>
                    <div class="nf-select-field">
                      <?php 
                      $var = get_field_object('field_610b8b3599e75');
                      ?>
                      <select class="form-control selectpicker" name="department" id="department">
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

                <div class="col-12 col-md-6 col-xl-4" id="study_level_menu">
                  <div class="nf-select-wrap">
                    <div class="nf-select-img">
                      <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/study.png" alt="study">
                      <span>Study Level</span>
                    </div>
                    <div class="nf-select-field">
                      <?php 
                      $var = get_field_object('field_610b8b5d99e76');
                      ?>
                      <select class="form-control selectpicker" name="study_level" id="study_level">
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
              <?php/*?> <div class="tab-pane fade" id="pills-india" role="tabpanel">
                <div class="nf-form-wrap">
                  <div class="row">                
                    <div class="col-12 col-md-6 col-xl-4">
                      <div class="nf-select-wrap">
                        <div class="nf-select-img">
                          <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/department.png" alt="department">
                          <span>Department</span>
                        </div>
                        <div class="nf-select-field">
                              <?php 
                              $var = get_field_object('field_610b8b3599e75');
                              ?>
                              <select class="form-control selectpicker" name="department">
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
                  </div>
                </div>
              </div><?php*/?>
            <?php/*?>   <div class="tab-pane fade" id="pills-abroad" role="tabpanel">
                <div class="nf-form-wrap">
                  <div class="row">    
                    <div class="col-12 col-md-6 col-xl-4">
                      <div class="nf-select-wrap">
                        <div class="nf-select-img">
                          <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/study.png" alt="study">
                          <span>Study Level</span>
                        </div>
                        <div class="nf-select-field">
                              <?php 
                              $var = get_field_object('field_610b8b5d99e76');
                              ?>
                              <select class="form-control selectpicker" name="study_level">
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
              </div> <?php*/?>
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
  $('#selectRegion li').click(function(){
    var obj = $(this);
    var region_obj = obj.attr('value');
    
    //alert(region_obj);

    if (region_obj=='India') {

      $('#department_menu').show();
      //$('#study_level_menu').hide();
      $('#study_level_menu').show();
      
    }
    else if(region_obj=='Abroad'){
      //$('#department_menu').hide();
      $('#department_menu').show();
      $('#study_level_menu').show();
      
    }

    else
    {
      $('#department_menu').show();
      $('#study_level_menu').show();
      
    }
  });
</script>
<script type="text/javascript">
  //$('#region').change(function(){
    function getregion(id)
    {
    if(id=='')
    $('#preloader-loader').css("display", "block");

    $.ajax({
        data: {"region": $('#region').val(), 'action': 'my_action_get_scholarship_for_girls'},
        url: "<?php echo site_url()?>/wp-admin/admin-ajax.php",
        type: "post",
        success: function(data) {
           //alert(data);
           var res = data.split('*****');
           $('#department').html(res[0]);
           $('#study_level').html(res[1]);
           
           $('.selectpicker').selectpicker({ noneSelectedText : 'Select' });
           $('.selectpicker').selectpicker('refresh');
           if(id=='')
           $('#preloader-loader').css("display", "none");
        }
    });
  }
//});
$('#department').change(function(){
    $('#preloader-loader').css("display", "block");

    $.ajax({
        data: {"region": $('#region').val(),"department":$('#department').val(), 'action': 'my_action_get_scholarship_for_girls'},
        url: "<?php echo site_url()?>/wp-admin/admin-ajax.php",
        type: "post",
        success: function(data) {
           //alert(data);
           var res = data.split('*****');
           

           if(res[0] && res[1])
           {
            $('#department').html(res[0]);
            $('#study_level').html(res[1]);
            
           }
           else if(res[0])
           {
            $('#study_level').html(res[0]);
           }
           

           $('.selectpicker').selectpicker({ noneSelectedText : 'Select' });
           $('.selectpicker').selectpicker('refresh');
           //
           $('#preloader-loader').css("display", "none");
        }
    });
});

window.onload=function(){ getregion(1); };

 

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

