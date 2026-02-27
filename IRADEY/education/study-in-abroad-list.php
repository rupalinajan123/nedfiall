<?php /* Template Name: study-in-abroad-list */
?>
<?php get_header(); 

if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
  $url = "https://";else $url = "http://";
$url.= $_SERVER['HTTP_HOST'];   
$url.= $_SERVER['REQUEST_URI'];
$url = explode('?',$url);   
$url = explode('&loginerror',$url[1]);  
$title = str_replace('-',' ',$url[0]);
$title = str_replace(':',' - ',$title);
if($title!='') $_POST['keyword'] = $title;

//new line
if(!empty($wp_query->query_vars['flag'])){ $title= $wp_query->query_vars['flag']; $_POST['keyword'] = str_replace('-',' ',$title);}

$category_id = get_cat_ID ('Study in Abroad');
$categories = get_category( $category_id );

//echo '<pre>';
//print_r($_POST);
//exit;

$page_data = get_page_by_path( 'study-in-abroad' );
$logo_image = get_field( "logo", $page_data->ID );
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
  <li class="breadcrumb-item active"><?php echo $page_data->post_title;?></li>
   <?php 
  $_SESSION['cramb_session'] = '<li class="breadcrumb-item"><a href="#">Education</a></li>
            <li class="breadcrumb-item">'.$page_data->post_title.'</li>';
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
<form method="post" action="<?php echo site_url()?>/study-in-abroad-list" id="form_id">
<div class="inner-body">
<div class="container">
<div class="row">
<div class="col-12 col-lg-4 nf-sidebar-c-width">
  
  <div class="courses-details-sidebar-area search-sidebar nf-sidebar">
    <div class="widget mb-20 widget-padding white-bg">
      <?php $var = get_field_object('field_60b23ac2b3053');?>
      <a class="btn-link nf-color-1" data-toggle="collapse" href="#state-filter">
        <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/state-white.png" alt="state-white"> <span> Country (<?php echo count($var['choices']);?>) </span></a>
        <div class="widget-link collapse show" id="state-filter">
          <ul class="sidebar-link nf-sidebar-scroll">

                   <?php 
                      
                      
                        $k=0;
                        sort($var['choices']);
                        foreach($var['choices'] as $choice)
                        {
                          if($_POST['country']==$choice) $checked = 'checked'; 
                          else if(is_array($_POST['country']) && in_array($choice,$_POST['country'])) $checked = 'checked'; 
                          else  $checked = ''; 
                          echo '
                          <li>
                            <div class="nf-checkbox-wrap">
                              <input class="check_country" value="'.$choice.'" type="checkbox" '.$checked.' id="country_'.$k.'" name="country[]">
                              <label for="country_'.$k.'">'.$choice.'</label>
                            </div>
                          </li>
                          ';
                          $k++;
                        }
                        ?>
                      

            
          </ul>
        </div>
        <?php 
        //ajax start
        if(!empty($_POST['country']) )
              {
                if(!is_array($_POST['country'])) $_POST['country']=[$_POST['country']];
                $sts_country = array(
                              'key'     =>  'country',
                              'value'    =>  $_POST['country'],
                              'compare'  => 'IN'
                          );
              }
            $args = array(
              'post_type' => 'education',
                'post_status' => 'publish',
                'posts_per_page' => -1,
                'meta_key'    => 'university_type',
                'meta_value'  => 'Study Abroad',
                'meta_query'     =>  array(
                              array(
                                  'relation' => 'AND',
                                  $sts_country
                                )
                            )
            );
            
            $the_query = new WP_Query( $args );
            $return_dept=array();
            
            if( $the_query->have_posts() ){
              while( $the_query->have_posts() ){ 
                $the_query->the_post(); 
                $values= get_fields();
                $return_dept[]=$values['department'];
            }
          }

          $return_dept = array_filter(array_unique($return_dept));
          if(!empty($_POST['dept']) && !in_array($_POST['dept'], $return_dept)) $_POST['dept']='';
          wp_reset_query();
          //ajax end


        $var = get_field_object('field_60b23932b3044');?>
        <a class="btn-link nf-color-2" data-toggle="collapse" href="#department-filter">
          <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/department.png" alt="department"> <span>  Department (<?php echo count($return_dept);//count($var['choices']);?>)</span>
        </a>
        <div class="widget-link collapse show" id="department-filter">
          <ul class="sidebar-link nf-sidebar-scroll">


            <?php 
                
                  $k=0;
                  sort(($return_dept));
                  //foreach($var['choices'] as $choice)
                  foreach($return_dept as $choice)
                  {
                    if($_POST['dept']==$choice) $checked = 'checked'; 
                    else if(is_array($_POST['dept']) && in_array($choice,$_POST['dept'])) $checked = 'checked'; 
                    else  $checked = '';
                    echo '
                    <li>
                      <div class="nf-checkbox-wrap">
                        <input class="check_dept" value="'.$choice.'" type="checkbox" '.$checked.' id="dept_'.$k.'" name="dept">
                        <label for="dept_'.$k.'">'.$choice.'</label>
                      </div>
                    </li>
                    ';
                    $k++;
                  }
                  ?>
                      

            
            
            
          </ul>
        </div>


        <?php
        //ajax start
        if(!empty($_POST['country']) )
              {
                if(!is_array($_POST['country'])) $_POST['country']=[$_POST['country']];

                $sts_country = array(
                              'key'     =>  'country',
                              'value'    =>  $_POST['country'],
                              'compare'  => 'IN'
                          );
              }
              if(!empty($_POST['dept']) )
              {
                if(!is_array($_POST['dept'])) $_POST['dept']=[$_POST['dept']];

                $sts_dept = array(
                              'key'     =>  'department',
                              'value'    =>  $_POST['dept'],
                              'compare'  => 'IN'
                          );
              }

            $args = array(
              'post_type' => 'education',
                'post_status' => 'publish',
                'posts_per_page' => -1,
                'meta_key'    => 'university_type',
                'meta_value'  => 'Study Abroad',
                'meta_query'     =>  array(
                              array(
                                  'relation' => 'AND',
                                  $sts_country,
                                  $sts_dept
                                )
                            )
            );
            
            $the_query = new WP_Query( $args );
            $return_level=array();
            
            if( $the_query->have_posts() ){
              while( $the_query->have_posts() ){ 
                $the_query->the_post(); 
                $values= get_fields();
                $return_level[]=$values['education_level'];
                
            }
          }
          $return_level = array_filter(array_unique($return_level));
          if(!empty($_POST['level']) && !in_array($_POST['level'], $return_level)) $_POST['level']='';
          wp_reset_query();
          //ajax end


         $var = get_field_object('field_60b239acb3048');?>
        <a class="btn-link nf-color-5" data-toggle="collapse" href="#department-filter">
          <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/study.png" alt="department"> <span>  Study Level (<?php echo count($return_level);//count($var['choices']);?>)</span>
        </a>
        <div class="widget-link collapse show" id="department-filter">
          <ul class="sidebar-link nf-sidebar-scroll">


            <?php 
                
                  $k=0;
                  sort($return_level);
                  //foreach($var['choices'] as $choice)
                  foreach($return_level as $choice)
                  {
                    if($_POST['level']==$choice) $checked = 'checked'; 
                    else if(is_array($_POST['level']) && in_array($choice,$_POST['level'])) $checked = 'checked'; 
                    else  $checked = '';
                    echo '
                    <li>
                      <div class="nf-checkbox-wrap">
                        <input class="check_level" value="'.$choice.'" type="checkbox" '.$checked.' id="level_'.$k.'" name="level">
                        <label for="level_'.$k.'">'.$choice.'</label>
                      </div>
                    </li>
                    ';
                    $k++;
                  }
                  ?>
                      

            
            
            
          </ul>
        </div>
        
      </div>
      
      
    </div>
  
  </div>
  <?php
  if(!empty($_POST['country']) )
  {
    if(!is_array($_POST['country'])) $_POST['country']=[$_POST['country']];

    $sts_location = array(
                  'key'     =>  'country',
                  'value'    =>  $_POST['country'],
                  'compare'  => 'IN'
              );
  }
  
  if(!empty($_POST['dept']))
  {
    if(!is_array($_POST['dept'])) $_POST['dept']=[$_POST['dept']];

    $sts_dept = array(
                  'key'     =>  'department',
                  'value'    =>  $_POST['dept'],
                  'compare'  => 'IN'
              );
  }
  if(!empty($_POST['level']))
  {
    if(!is_array($_POST['level'])) $_POST['level']=[$_POST['level']];

    $sts = array(
                  'key'     =>  'education_level',
                  'value'    =>  $_POST['level'],
                  'compare'  => 'IN'
              );
  }
  if($_POST['keyword']!='')
  {
    $keyw = array(
        'relation' => 'OR',
        array(
            'key'     =>  'country',
                  'value'    =>  $_POST['keyword'],
                  'compare'  => 'LIKE'
        ),
        array(
            'key'     =>  'university_name',
                  'value'    =>  $_POST['keyword'],
                  'compare'  => 'LIKE'
        ),
        array(
            'key'     =>  'state',
                  'value'    =>  $_POST['keyword'],
                  'compare'  => 'LIKE'
        ),
        array(
            'key'     =>  'fee_range',
                  'value'    =>  $_POST['keyword'],
                  'compare'  => 'LIKE'
        ),
        array(
            'key'     =>  'duration',
                  'value'    =>  $_POST['keyword'],
                  'compare'  => 'LIKE'
        ),
        array(
            'key'     =>  'education_level',
                  'value'    =>  $_POST['keyword'],
                  'compare'  => 'LIKE'
        ),
        array(
            'key'     =>  'standarised_test',
                  'value'    =>  $_POST['keyword'],
                  'compare'  => 'LIKE'
        ),
        array(
            'key'     =>  'medium_of_instruction',
                  'value'    =>  $_POST['keyword'],
                  'compare'  => 'LIKE'
        ),
        array(
            'key'     =>  'contact',
                  'value'    =>  $_POST['keyword'],
                  'compare'  => 'LIKE'
        ),
        array(
            'key'     =>  'address',
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
                            'meta_value'  => 'Study Abroad',
                            'posts_per_page' => 10,
                             'paged' => $paged, 
                            'meta_query'     =>  array(
                              array(
                                  'relation' => 'AND',
                                  $sts,
                                  $sts_dept,
                                  $sts_location,
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
                            'meta_value'  => 'Study Abroad',
                            'posts_per_page' => -1,
                            'meta_query'     =>  array(
                              array(
                                  'relation' => 'AND',
                                  $sts,
                                  $sts_dept,
                                  $sts_location,
                                  $keyw
                                )
                            )
                            );
      $tot_blog_posts = new WP_Query($tot_blog_args);
      ?>
  <div class="col-12 col-lg-8 nf-listing-c-width">

    <?php if(!empty($_POST['country']) or !empty($_POST['dept']) or !empty($_POST['level'])){?>
      <div class="nf-state-listing-block">
             <div class="row">
              <?php if(!empty($_POST['country'])){?>
              <div class="col-12 col-lg-4">
                <a href="#">
                  <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/know-your-approvals/state.png" class="nf-w-t1">
                  <span><?php if(is_array($_POST['country'])) echo Implode(',<br>',$_POST['country']);else echo $_POST['country'];?></span>
                </a>
              </div>
            <?php }?>
            <?php if(!empty($_POST['dept'])){?>
         <div class="col-12 col-lg-4">
                <a href="#">
                  <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/department.png" class="nf-w-t2">
                  <span><?php if(is_array($_POST['dept'])) echo Implode(',<br>',$_POST['dept']);else echo $_POST['dept'];?></span>
                </a>
              </div>
              <?php }?>
              
              <?php if(!empty($_POST['level'])){?>
         <div class="col-12 col-lg-4">
                <a href="#">
                  <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/study.png" class="nf-w-t2">
                  <span><?php if(is_array($_POST['level'])) echo Implode(',<br>',$_POST['level']);else echo $_POST['level'];?></span>
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
    <div>** Fee range is given in USD</div>
    <div class="nf-top-result-list study-abroad">


      <?php
      $record=0;
                            while($blog_posts->have_posts()) {
                                $blog_posts->the_post(); 

                                $values= get_fields();
                                
                                if($values)
                                {
                                    $university_type=''; 
                                    $scholershop_name='';  
                                    $university_name='';

                                    $department=''; 
                                    $affiliation='';  
                                    $course_name='';

                                    $duration=''; 
                                    $education_level='';  
                                    $mode_of_education='';
                                    $email='';
                                    $contact='';

                                    $address='';
                                    $fee_range='';
                                    $standarised_test='';
                                    $degree_and_duration='';

                                    $medium_of_instruction='';
                                    $official_website='';
                                    $state='';
                                    $country='';
                                    $logo='';
                                    $courses_offered=''; 
                                    $application_link='';
                                    $city='';

                                    foreach($values as $key => $value)
                                    {
                                        if($key=='university_type'){ $university_type = $value; }
                                        if($key=='scholershop_name'){ $scholershop_name = $value;  }
                                        if($key=='university_name'){ $university_name = $value;  }

                                        if($key=='department'){ $department = $value; }
                                        if($key=='affiliation'){ $affiliation = $value;  }
                                        if($key=='city'){ $city = $value;  }
                                        if($key=='course_name'){ $course_name = $value;  }

                                        if($key=='duration'){ $duration = $value; }
                                        if($key=='education_level'){ $education_level = $value;  }
                                        if($key=='mode_of_education'){ $mode_of_education = $value;  }
                                        if($key=='email'){ $email = $value;  }
                                        if($key=='contact'){ $contact = $value;  }

                                        if($key=='address'){ $address = $value;  }
                                        if($key=='fee_range'){ $fee_range = $value;  }
                                        if($key=='standarised_test'){ $standarised_test = $value;  }
                                        if($key=='degree_and_duration'){ $degree_and_duration = $value;  }

                                        if($key=='medium_of_instruction'){ $medium_of_instruction = $value;  }
                                        if($key=='official_website'){ $official_website = $value;  }
                                        if($key=='state'){ $state = $value;  }
                                        if($key=='country'){ $country = $value;  }
                                        if($key=='logo'){ $logo = $value;  }
                                        if($key=='courses_offered'){ $courses_offered = $value;  }
                                        if($key=='application_link'){ $application_link = $value;  }
                                        
                                    }
                                }

            /*if(((isset($_POST) && 
              ($_POST['country']==$country or $_POST['country']=='' or (is_array($_POST['country']) && in_array($country,$_POST['country']))) &&
              ($_POST['state']==$state or $_POST['state']=='' or (is_array($_POST['state']) && in_array($state,$_POST['state'])))
              && ($_POST['dept']==$department or $_POST['dept']=='' or (is_array($_POST['dept']) && in_array($department,$_POST['dept'])))
              && ($_POST['course']==$course_name or $_POST['course']=='' or (is_array($_POST['course']) && in_array($course_name,$_POST['course'])))
              && ($_POST['educ']==$mode_of_education or $_POST['educ']=='' or (is_array($_POST['educ']) && in_array($mode_of_education,$_POST['educ'])))
              && ($_POST['level']==$education_level or $_POST['level']=='' or (is_array($_POST['level']) && in_array($education_level,$_POST['level'])))

              && (($_POST['keyword']!='' && (strpos($country, $_POST['keyword']) !== false or strpos($university_name, $_POST['keyword']) !== false or strpos($state, $_POST['keyword']) !== false or strpos($fee_range, $_POST['keyword']) !== false or strpos($duration, $_POST['keyword']) !== false or strpos($education_level, $_POST['keyword']) !== false or strpos($standarised_test, $_POST['keyword']) !== false or strpos($medium_of_instruction, $_POST['keyword']) !== false or strpos($contact, $_POST['keyword']) !== false or strpos($address, $_POST['keyword']) !== false)) or $_POST['keyword']=='')

            ) or !isset($_POST)) && $university_type=='Study Abroad'){ */
            $record=$record+1;         
      ?>


      

        <div class="nf-cart">
                  <div class="nf-cart-header">
                    <div class="nf-left-content">
                      <div class="nf-l-img">
                        <img src="<?php //echo get_template_directory_uri(). '/assets/img/study-in-north/university-logo.png'?><?php echo $logo_image;?>" alt="university-logo.png">
                      </div>
                      <div class="nf-l-title">
                        <h3><?php echo $university_name;?></h3>
                        <p><?php echo $city;?></p>
                      </div>
                    </div>
                    <div class="nf-location-name">
                      <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/map-2.png" alt="map">
                      <span><?php echo $country;?></span>
                    </div>
                  </div>
                  <div class="nf-cart-body">
                    <div class="row">
                      <div class="col-12 col-lg-6">
                        <div class="nf-listing">
                          <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/education-1.png" alt="education-1">
                          <h4><span>Study Level</span><?php echo $education_level;?></h4>
                        </div>
                        <div class="nf-listing">
                          <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/fees.png" alt="fees">
                          <h4><span>Fee Range</span><?php echo $fee_range;?></h4>
                        </div>
                        <div class="nf-listing">
                          <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/medium.png" alt="medium">
                          <h4><span>Medium of Instruction</span><?php echo $medium_of_instruction;?></h4>
                        </div>
                      </div>

                      <div class="col-12 col-lg-6">
                        <div class="nf-listing">
                          <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/time.png" alt="time">
                          <h4><span>Duration</span><?php echo $duration;?></h4>
                        </div>
                        <div class="nf-listing">
                          <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/test.png" alt="test">
                          <h4><span>Standarised Test</span><?php echo $standarised_test;?></h4>
                        </div>
                      </div>
                       
                    </div>
                  </div>
                  <div class="sab-address-block">
                    <div class="nf-address-block">
                      <h4><img src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/course-2.png" alt="course-2">Courses offered</h4>
                      <div class="row">
                        
                          <?php
                          $i=0;
                          $k=0;
                          $courses_offered = explode(',',$courses_offered);
                          foreach($courses_offered as $offer)
                          { $k++; if($i==0){?><div class="col-lg-4 col-md-6"><?php }?>
                          
                          <p><?php echo $offer?></p> 
                          <?php $i++; if($i == 3 or count($courses_offered)==$k){ $i=0; ?></div><?php }?>
                          <?php  }?>
                          <!--<p>Landscape Architecture</p>
                          <p>Urban and Regional Studies</p>-->
                        
                         <!--<div class="col-lg-4 col-md-6">
                          <p>Architecture</p> 
                          <p>Landscape Architecture</p>
                          <p>Urban and Regional Studies</p>
                        </div>-->

                        <div class="col-md-3">
                          <?php if($application_link!=''){?>
                          <a target="_blank" href="<?php echo $application_link;?>" class="nf-white-button">
                            Visit Website
                          </a>
                        <?php }?>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

    <?php //}

  }

  if($record==0) echo 'No Record Found.';

  // Step  3 : Call the Pagination Function Here  
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

document.body.scrollTop = 500;
document.documentElement.scrollTop = 500;

$( ".page-link" ).click(function() {
  $('#form_id').attr('action',this.href); 
  $( "#form_id" ).submit();
  //alert(this.href);
  return false;
});

$(document).ready(function(){
    $('.check_country').click(function() {
        $('.check_country').not(this).prop('checked', false);
        document.getElementById("form_id").submit();
    });
});
$(document).ready(function(){
    $('.check_dept').click(function() {
        $('.check_dept').not(this).prop('checked', false);
        document.getElementById("form_id").submit();
    });
});
$(document).ready(function(){
    $('.check_level').click(function() {
        $('.check_level').not(this).prop('checked', false);
        document.getElementById("form_id").submit();
    });
});

</script>
