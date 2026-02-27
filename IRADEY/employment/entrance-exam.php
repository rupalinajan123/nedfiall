<?php /*Template Name: Employment Entrance Exam */ ?>
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
  <h3><?php echo $page_data->post_title;?> <a href="#" class="changeTopic" data-toggle="collapse" data-target="#changeTopic" >Change Topic</a></h3>
  <ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Employment</a></li>
    <li class="breadcrumb-item">Govt. Job Exams</li>
    <li class="breadcrumb-item active"><?php echo $page_data->post_title;?></li>
  </ul>
</div>
   <div class="chagetopic-modal changeTopic-collapse">
          <div class="collapse " id="changeTopic" style="">
            <a href="#" id="changeTopic_close"><i class="fa fa-close"></i></a>
            <div class="card card-body">
              <div class="row">
                
                        <?php
                        $k=0;
                        $t=0;
                        $var = get_field_object('field_60d2f23517b9d');
                      
                        $k=0;
                        foreach($var['choices'] as $choice)
                        {
                        ?>
                        
                          <?php 
                          if($k==0){ ?>
                            <div class="col-md-4">
                              <h4><?php if($t==0){?>Select <?php }else echo '&nbsp;'; ?></h4>
                            <ul>
                          <?php }
                          $curslug = str_replace(' ','-',strtolower($choice));
                          if($the_slug!=$curslug){
                          ?>      
                            <li>
                              <a class="box" href="<?php echo site_url()?>/<?php echo $curslug; ?>"><?php echo $choice;?></a>
                            </li>
                            <?php
                            } 
                            $totk=count($var['choices'])-1;
                            if($k==7 or $totk==$t){ $k=0;?>
                            </ul>
                            </div>
                          <?php }else{ $k++;} $t++; ?>
                          
                        <?php
                        }
                        wp_reset_postdata();
                        ?>
                    
              </div>
            </div>
          </div>
        </div>
<div class="banner-content">
  <div class="row">
    <?php $url = wp_get_attachment_url( get_post_thumbnail_id($post_id) );?>
    <div class="col-md-4 banner-img pr-0"><img src="<?php echo $url;?>"></div>
    <div class="col-md-8  pl-0">
      <div class="bannerbg nf-gradient-2 justify-content-start pt-3 nf-height-100">
        <h4 class="nf-f-size-24"><?php echo $page_data->post_title;?></h4>
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
<form method="post" action="<?php echo site_url()?>/employment-entrance-exam-details">
  <input type="hidden" name="entrance_exam_type" id="entrance_exam_type" value="<?php echo $page_data->post_title;?>">
<div class="inner-body">
<div class="container">
<div class="national-level icon-text-box mb-4">
  <div class="row mb-2">
    <div class="col-md-8">
      <h4 class="nf-f-size-20 nf-strong">Select Options</h4>
    </div>
  </div>
  <div class="nf-form-wrap">
    <div class="row">

      <?php
          $var = get_field_object('field_60db0e77ba2f4');
                      
                        $k=0;
                        
                        foreach($var['choices'] as $choice)
                        {
                          if($k==0) $fistval = $choice;

                          $k++;
      ?>
                <div class="col-12 col-md-6 col-xl-3">
                    <div class="nf-radio-wrap mb-4">
                        <div class="custom-control custom-radio custom-control-inline pl-0">
                            <input onclick="getlevel('<?php echo $choice;?>','1')" type="radio" id="customRadioInline<?php echo $k?>" name="level" class="custom-control-input" value="<?php echo $choice;?>" <?php if($k==1) echo 'checked'; ?>>
                            <label class="custom-control-label" for="customRadioInline<?php echo $k?>"><?php echo $choice;?></label>
                        </div>
                    </div>
                </div>

        <?php }?>        
           
           
            </div>
  </div>
</div>
<div class="nf-form-wrap">
          <div class="row">
      <div class="col-12 col-md-6 col-xl-4">
             <!--  <label>Select Options</label> -->
              <div class="nf-select-wrap">
                <div class="nf-select-img">
                  <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/department.png" alt="department">
                  <span>Department</span>
                </div>
                <div class="nf-select-field">
                  

                  <?php 
              $var = get_field_object('field_60d2f2cf17b9f');
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
                             <span id="error_msg1" style="color: red;"></span>

            </div>
            <div class="col-12 col-md-6 col-xl-4">
      <div class="nf-select-wrap">
        <div class="nf-select-img">
          <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/icon/megamenu/University.png" alt="course">
          <span>Exam</span>
        </div>
        <div class="nf-select-field">

          <select class="form-control selectpicker" name="exam" id="exam">
            <option value="">Select Exam</option>
            <?php/*?>
            <?php
            // args
            $args = array(
              'post_type'   => 'emp_entrance_exam',
              'meta_key'    => 'entrance_exam_type',
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
                $values= get_fields();
                
                ?>
                <option value="<?php echo $values['exam_name'] ?>"><?php echo $values['exam_name'] ?></option>
              <?php 
            
            $croptile_new = $post->post_title;
            endwhile; ?>
            <?php endif; ?>
            <?php*/?>
          </select>
        </div>
      </div>
      <span id="error_msg3" style="color: red;"></span>
    </div>
          </div>
        </div>
</div>
</div>
<div class="nf-circle-bg-img">
<div class="container">
<div class="row">
  <div class="col-12 nf-button-wrapper">
     <button class="nf-button-v-small submitBtn" type="submit" onclick="return validation_function()">
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
     
      error_msg1.textContent = "";
     
      var flag=true;

       if($('#department').val()=='')
       {
           // alert('hjghj');
           error_msg1.textContent = "*Please select Department";
           flag= false;
       }

      
       return flag;
       }



  //
   function getlevel(val,cnt){
   // if(cnt!='') $('#preloader-loader').css("display", "block");
      if(cnt!=''){ $('#preloader-loader').css("display", "block");  var flsg = true;}else{ var flsg = false; }

    $.ajax({
        data: {"level": val,"entrance_exam_type":$('#entrance_exam_type').val(),'action': 'my_action_get_emp_entrance_exam'},
        url: "<?php echo site_url()?>/wp-admin/admin-ajax.php",
        type: "post",
        async:flsg,
        success: function(data) {
           //alert(data);
           var res = data.split('*****');
           $('#department').html(res[0]);
           $('#exam').html(res[1]);
           $('.selectpicker').selectpicker({ noneSelectedText : 'Select' });
           $('.selectpicker').selectpicker('refresh');
           //
           $('#preloader-loader').css("display", "none");
        }
    });
}     

$('#department').change(function(){
    $('#preloader-loader').css("display", "block");

    $.ajax({
        data: {"level": $("input[name='level']:checked").val(),"department":$('#department').val(),"entrance_exam_type":$('#entrance_exam_type').val(), 'action': 'my_action_get_emp_entrance_exam'},
        url: "<?php echo site_url()?>/wp-admin/admin-ajax.php",
        type: "post",
        success: function(data) {
           //alert(data);
           var res = data.split('*****');
           

           if(res[0] && res[1])
           {
            $('#department').html(res[0]);
            $('#exam').html(res[1]);
            
           }
           else if(res[0])
           {
            $('#exam').html(res[0]);
           }
           

           $('.selectpicker').selectpicker({ noneSelectedText : 'Select' });
           $('.selectpicker').selectpicker('refresh');
           //
           $('#preloader-loader').css("display", "none");
        }
    });
});

window.onload=function(){ getlevel('<?php echo $fistval;?>',''); };
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
