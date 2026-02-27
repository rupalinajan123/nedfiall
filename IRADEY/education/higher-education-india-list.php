<?php /* Template Name: Higher education India List */
if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
  $url = "https://";else $url = "http://";
$url.= $_SERVER['HTTP_HOST'];   
$url.= $_SERVER['REQUEST_URI'];
$url = explode('?',$url);  
$url = explode('&loginerror',$url[1]); 
$course = str_replace('-',' ',$url[0]);
//new line
if(!empty($wp_query->query_vars['flag'])){ $course= $wp_query->query_vars['flag']; $course = str_replace('-',' ',$course); }

if($course=='' && $_POST['course']=='')
{  
      //wp_redirect(site_url());
      //exit; 
}
if(!empty($course)) $_POST['course']=$course;
?>
<?php get_header(); 

$page_data = get_page_by_path( 'higher-education-india-list' );
?>
<!-- /end header-bottom -->

<!-- header-end -->
<!-- inner-banner-start -->
<div class="inner-banner">
  <div class="container">
    <div class="banner-title">
      <h3><?php echo $page_data->post_title;?> </h3>
      <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Education</a></li>
        <li class="breadcrumb-item"><a href="#"><?php echo $page_data->post_title;?></a></li>
        <li class="breadcrumb-item active"><?php echo $_POST['course'];?></li>
         <?php
              
        $_SESSION['cramb_session'] = '<li class="breadcrumb-item"><a href="#">Education</a></li>
                          <li class="breadcrumb-item">'.$page_data->post_title.'</li>
                          <li class="breadcrumb-item "><a href="#">'.$_POST['course'].'</a></li>';
            
                    ?>

      </ul>
    </div>
    <div class="banner-content">
      <div class="row">
        <?php $url = wp_get_attachment_url( get_post_thumbnail_id($post_id) );?>
        <div class="col-md-4 banner-img pr-0"><img src="<?php echo $url?>"></div>
        <div class="col-md-8  pl-0">
          <div class="bannerbg nf-white-bg justify-content-start pt-3 nf-height-100">
            <!--<h4 class="nf-f-size-24"><?php //echo $page_data->post_title;?></h4>-->
            <h5><?php echo $page_data->post_content;?></h5>
            <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/linear-bg.png" alt="linear background" class="nf-layes-bg">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- inner-banner-end -->
<!-- Study tour in north section  -->
<form method="post" action="<?php echo site_url()?>/higher-education-india-list" id="form_id">

  <div class="inner-body">
    <div class="container">
      <div class="row">
        <div class="col-12 col-lg-4 nf-sidebar-c-width">

          <div class="courses-details-sidebar-area search-sidebar nf-sidebar">
            <div class="widget mb-20 widget-padding white-bg">
            
              

        <?php $var = get_field_object('field_6114fe8290c88');?>

        <a class="btn-link nf-color-1" data-toggle="collapse" href="#state-filter">
          <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/state-white.png" alt="state-white"> <span> State (<?php echo count($var['choices']);?>) </span></a>
          <div class="widget-link collapse show" id="state-filter">
            <ul class="sidebar-link nf-sidebar-scroll">

             <?php 


             $k=0;
             sort($var['choices']);
                   foreach($var['choices'] as $choice)
            // foreach($return_state as $choice)
             {
              if($_POST['state']==$choice) $checked = 'checked'; 
              else if(is_array($_POST['state']) && in_array($choice,$_POST['state'])) $checked = 'checked'; 
              else  $checked = ''; 
              echo '
              <li>
              <div class="nf-checkbox-wrap">
              <input class="check_state" value="'.$choice.'" type="checkbox" '.$checked.' id="state_'.$k.'" name="state[]">
              <label for="state_'.$k.'">'.$choice.'</label>
              </div>
              </li>
              ';
              $k++;
            }
            ?>

          </ul>
        </div>

              <?php 

        //=========ajax start
              if(!empty($_POST['state']) )
              {
                if(!is_array($_POST['state'])) $_POST['state']=[$_POST['state']];
                $sts_state = array(
                  'key'     =>  'higher_education_state',
                  'value'    =>  $_POST['state'],
                  'compare'  => 'IN'
                );
              }

              $args = array(
                'post_type' => 'education',
                'post_status' => 'publish',
                'meta_key'    => 'university_type',
                'posts_per_page' => -1,
                'meta_value'  => 'Higher education India',
                'meta_query'     =>  array(
                  array(
                    'relation' => 'AND',
                    $sts_state
                  )
                )
              );

              $the_query = new WP_Query( $args );
              $course_arr=array();
              if( $the_query->have_posts() ){
                while( $the_query->have_posts() ){ 
                  $the_query->the_post(); 
                  $values= get_fields();
                  $course_arr[]=$values['course_category'];
                }
              }

              $course_arr = array_filter(array_unique($course_arr));
              //if(!empty($_POST['course']) && !in_array($_POST['course'], $course_arr)) $_POST['course']='';
              wp_reset_query(); 
              //=======ajax end ?>

              <?php $var = get_field_object('field_60fbb1739fe7e');?>

              <a class="btn-link nf-color-2" data-toggle="collapse" href="#department-filter">
                <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/icon/subject.png" alt="department"> <span>  Course (<?php echo count($var['choices']);//count($course_arr);?>)</span>
              </a>
              <div class="widget-link collapse show" id="department-filter">
                <ul class="sidebar-link nf-sidebar-scroll">



                  <?php 

                  $k=0;
                  sort($var['choices']);
                  foreach($var['choices'] as $choice)
                  //foreach($course_arr as $choice)
                  {
                    if($_POST['course']==$choice) $checked = 'checked'; 
                    else if(is_array($_POST['course']) && in_array($choice,$_POST['course'])) $checked = 'checked'; 
                    else  $checked = '';
                    echo '
                    <li>
                    <div class="nf-checkbox-wrap">
                    <input class="check_course" value="'.$choice.'" type="checkbox" '.$checked.' id="course_'.$k.'" name="course">
                    <label for="course_'.$k.'">'.$choice.'</label>
                    </div>
                    </li>
                    ';
                    $k++;
                  }
                  ?>


                </ul>
              </div>

              <?php 

        //=========ajax start
              if(!empty($_POST['state']) )
              {
                if(!is_array($_POST['state'])) $_POST['state']=[$_POST['state']];
                $sts_state = array(
                  'key'     =>  'higher_education_state',
                  'value'    =>  $_POST['state'],
                  'compare'  => 'IN'
                );
              }
              $course = str_replace(' ','_',strtolower($_POST['course']));
              if(!empty($_POST['course']))
              {
                if(!is_array($_POST['course'])) $_POST['course']=[$_POST['course']];

                $sts_course = array(
                  'key'     =>  'course_category',
                  'value'    =>  $_POST['course'], 
                  'compare'  => 'IN'
                );
              }

              $args = array(
                'post_type' => 'education',
                'post_status' => 'publish',
                'posts_per_page' => -1,
                'meta_key'    => 'university_type',
                'meta_value'  => 'Higher education India',
                'meta_query'     =>  array(
                  array(
                    'relation' => 'AND',
                    $sts_state,
                    $sts_course
                  )
                )
              );

              $the_query = new WP_Query( $args );
              //echo 'subject_for_'.$course;
              //print_r($the_query);

              $subject_arr=array();
              if( $the_query->have_posts() ){
                while( $the_query->have_posts() ){ 
                  $the_query->the_post(); 
                  $values= get_fields();
                  $subject_arr[]=$values['subject_for_'.$course];
                  //echo '<pre>';
                  //print_r($values);
                }
              }

              $subject_arr = array_filter(array_unique($subject_arr));
              if(!empty($_POST['subject']) && !in_array($_POST['subject'], $subject_arr)) $_POST['subject']='';
              //print_r($subject_arr);
             
              wp_reset_query(); 
              //=======ajax end ?>

              <?php $var = get_field_object('field_60fbb1739fe7e');
              if(!empty($subject_arr))
              {
              ?>

              <a class="btn-link nf-color-2" data-toggle="collapse" href="#department-filter">
                <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/icon/subject.png" alt="department"> <span>  Subject (<?php echo count($subject_arr);?>)</span>
              </a>
              <div class="widget-link collapse show" id="department-filter">
                <ul class="sidebar-link nf-sidebar-scroll">



                  <?php 

                  $k=0;
                  //foreach($var['choices'] as $choice)
                  foreach($subject_arr as $choice)
                  
                  {
                    if($_POST['subject']==$choice) $checked = 'checked'; 
                    else if(is_array($_POST['subject']) && in_array($choice,$_POST['subject'])) $checked = 'checked'; 
                    else  $checked = '';
                    echo '
                    <li>
                    <div class="nf-checkbox-wrap">
                    <input class="check_subject" value="'.$choice.'" type="checkbox" '.$checked.' id="subject_'.$k.'" name="subject">
                    <label for="subject_'.$k.'">'.$choice.'</label>
                    </div>
                    </li>
                    ';
                    $k++;
                  }
                  ?>


                </ul>
              </div>
            <?php }?>


      </div>
    </div>

  </div>
  <?php
  if(!empty($_POST['state']) )
  {
    if(!is_array($_POST['state'])) $_POST['state']=[$_POST['state']];

    $sts_location = array(
      'key'     =>  'higher_education_state',
      'value'    =>  $_POST['state'],
      'compare'  => 'IN'
    );
  }


  if(!empty($_POST['subject']))
  {
    if(!is_array($_POST['subject'])) $_POST['subject']=[$_POST['subject']];

    $sts_subject = array(
      'key'     =>  'subject_for_'.$course,
      'value'    =>  $_POST['subject'],
      'compare'  => 'IN'
    );
  }
  if(!empty($_POST['course']))
  {
    if(!is_array($_POST['course'])) $_POST['course']=[$_POST['course']];

    $sts_course = array(
      'key'     =>  'course_category',
      'value'    =>  $_POST['course'], 
      'compare'  => 'IN'
    );
  }

  if($_POST['keyword']!='')
  {
    $keyw = array(
      'relation' => 'OR',
      array(
        'key'     =>  'subject',
        'value'    =>  $_POST['keyword'],
        'compare'  => 'LIKE'
      ),
      array(
        'key'     =>  'higher_education_state',
        'value'    =>  $_POST['keyword'],
        'compare'  => 'LIKE'
      ),
      array(
        'key'     =>  'name',
        'value'    =>  $_POST['keyword'],
        'compare'  => 'LIKE'
      ),
      array(
        'key'     =>  'location_name',
        'value'    =>  $_POST['keyword'],
        'compare'  => 'LIKE'
      ),
      array(
        'key'     =>  'application_link',
        'value'    =>  $_POST['keyword'],
        'compare'  => 'LIKE'
      ),

      array(
        'key'     =>  'course_category',
        'value'    =>  $_POST['keyword'],
        'compare'  => 'LIKE'
      ),

    );
  }

  $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
  $blog_args = array(
    'post_type' => 'education',
    'post_status' => 'publish',
    'meta_key'    => 'university_type',
    'meta_value'  => 'Higher education India',
    'posts_per_page' => 10,
    'paged' => $paged, 
    'meta_query'     =>  array(
      array(
        'relation' => 'AND',
        $sts_location,
        $sts_subject,
        $sts_course,
        $keyw
      )
    )
  );

  $blog_posts = new WP_Query($blog_args);
                            //echo "<pre>";
                            //print_r($blog_posts);

  $tot_blog_args = array(
    'post_type' => 'education',
    'post_status' => 'publish',
    'meta_key'    => 'university_type',
    'meta_value'  => 'Higher education India',
    'posts_per_page' => -1,
    'meta_query'     =>  array(
      array(
        'relation' => 'AND',
        $sts_location,
        $sts_subject,
        $sts_course,
        $keyw
      )
    )
  );
  $tot_blog_posts = new WP_Query($tot_blog_args);
  ?>
  <div class="col-12 col-lg-8 nf-listing-c-width">

    <?php if(!empty($_POST['state']) or !empty($_POST['course']) ){?>
      <div class="nf-state-listing-block">
       <div class="row">
        <?php if(!empty($_POST['state'])){?>
          <div class="col-12 col-lg-4">
            <a href="#">
              <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/know-your-approvals/state.png" class="nf-w-t1">
              <span><?php if(is_array($_POST['state'])) echo Implode(',<br>',$_POST['state']);else echo $_POST['state'];?></span>
            </a>
          </div>
        <?php }?>

        <?php if(!empty($_POST['course'])){?>
         <div class="col-12 col-lg-4">
          <a href="#">
            <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/icon/subject.png" class="nf-w-t2">
            <span><?php if(is_array($_POST['course'])) echo Implode(',<br>',$_POST['course']);else echo $_POST['course'];?></span>
          </a>
        </div>
      <?php }?>
      <?php if(!empty($_POST['subject'])){?>
         <div class="col-12 col-lg-4">
          <a href="#">
            <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/icon/subject.png" class="nf-w-t2">
            <span><?php if(is_array($_POST['subject'])) echo Implode(',<br>',$_POST['subject']);else echo $_POST['subject'];?></span>
          </a>
        </div>
      <?php }?>


    </div> 
  </div>
<?php }?>

<div class="nf-top-filter-wrap">
  <h2 class="nf-f-size-20 nf-strong mb-0">Total Results (<span id="totcount"><?php echo $tot_blog_posts->post_count;?></span>)</h2>
  <div class="nf-search-form">
    <input placeholder="Search here" type="text" name="keyword" value="<?php echo $_POST['keyword']?>">
    <button type="submit">
      <i class="ti-search"></i>
    </button>
  </div>
</div>
<div>* Institutions are not presented in the order of ranking</div>
<div class="nf-top-result-list">
  <div class="nf-high-education mt-4">
    <div class="nf-cart">
      <div class="table-responsive">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Name</th>
              <th>Location</th>
              <th>State</th>
              <th>Website</th>
            </tr>
          </thead>
          <tbody>


            <?php
            $record=0;
            while($blog_posts->have_posts()) {
              $blog_posts->the_post(); 

              $values= get_fields();

              if($values)
              {
                $state='';
                $application_link='';
                $name='';
                $course_category='';
                $subject='';
                $location_name='';

                foreach($values as $key => $value)
                {
                  if($key=='higher_education_state'){ $state = $value;  }
                  if($key=='application_link'){ $application_link = $value;  }
                  if($key=='name'){ $name = $value;  }
                  if($key=='course_category'){ $course_category = $value;  }
                  if($key=='subject'){ $subject = $value;  }
                  if($key=='location_name'){ $location_name = $value;  }

                }
              }


              $record=$record+1;         
              ?>
              <tr>
                <td><?php echo $name;?></td>
                <td><?php echo $location_name;?></td>
                <td><?php echo $state;?></td>
                <td><a target="_blank" href="<?php echo $application_link;?>"><?php echo $application_link;?></a></td>
              </tr>
            <?php }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <?php


  if($record==0) echo 'No Record Found.';


  if (function_exists("cpt_pagination")) {
   cpt_pagination($blog_posts->max_num_pages); 
 }
 ?>
</div>
</div>
</div>
</div>
</div>

<div class="nf-education-loan">
          <div class="container">
            <div class="nf-loan-card">
              <div class="row">
                <div class="col-lg-4">
                  <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/education/education-img.png" alt="edcation-img">
                </div>
                <div class="col-lg-4">
                  <div class="nf-data">
                    <h2><span>EDUCATION</span> LOAN</h2>
                    <p>Pursue higher education in India &amp; overseas</p>
                    <a href="<?php echo site_url()?>/education-loan" class="btn-know-more">Know More</a>
                  </div>
                </div>
                <div class="col-lg-4">
                  <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/education/education-money.png" alt="edcation-money">
                </div>
              </div>
            </div>
          </div>
        </div>

</form>
<!-- End Study tour in north section  -->
<!-- footer start -->   
<?php get_footer(); ?> 

<script type="text/javascript">

  function myFunction() {
    var x = document.getElementById("nf-hide-list");
    if (x.style.display === "none") {
      x.style.display = "block";
    } else {
      x.style.display = "none";
    }
  }

  window.onload = function(){
//jQuery("#totcount").html('<?php //echo $record;?>');
};

document.body.scrollTop = 450;
document.documentElement.scrollTop = 450;

$( ".page-link" ).click(function() {
  $('#form_id').attr('action',this.href); 
  $( "#form_id" ).submit();
  //alert(this.href);
  return false;
});

$(document).ready(function(){
  $('.check_state').click(function() {
    $('.check_state').not(this).prop('checked', false);
    document.getElementById("form_id").submit();
  });
});
$(document).ready(function(){
  $('.check_subject').click(function() {
    $('.check_subject').not(this).prop('checked', false);
    document.getElementById("form_id").submit();
  });
});
$(document).ready(function(){
  $('.check_course').click(function() {
    $('.check_course').not(this).prop('checked', false);
    document.getElementById("form_id").submit();
  });
});

</script>
