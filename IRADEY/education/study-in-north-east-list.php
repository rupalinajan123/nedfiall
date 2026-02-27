<?php /* Template Name: study-in-north-east-list */
?>
<?php get_header(); 

if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
  $url = "https://";else $url = "http://";
$url.= $_SERVER['HTTP_HOST'];   
$url.= $_SERVER['REQUEST_URI'];
$url = explode('?',$url);   
$url = explode('&loginerror',$url[1]);  
$title = str_replace('-',' ',$url[0]);
if($title!='') $_POST['keyword'] = $title;

//new line
if(!empty($wp_query->query_vars['flag'])){ $title= $wp_query->query_vars['flag']; $_POST['keyword'] = str_replace('-',' ',$title);}

$category_id = get_cat_ID ('Study in North-East');
$categories = get_category( $category_id );

$page_data = get_page_by_path( 'study-in-north-east' );
$logo_image = get_field( "logo", $page_data->ID );

//echo '<pre>';
//print_r($logo_image);
//exit;
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
<form method="post" action="<?php echo site_url()?>/study-in-north-east-list" id="form_id">
<div class="inner-body">
<div class="container">
<div class="row">
<div class="col-12 col-lg-4 nf-sidebar-c-width">
  
  <div class="courses-details-sidebar-area search-sidebar nf-sidebar">
    <div class="widget mb-20 widget-padding white-bg">
      <?php $var = get_field_object('field_60b23a93b3052');?>
      <a class="btn-link nf-color-1" data-toggle="collapse" href="#state-filter">
        <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/state-white.png" alt="state-white"> <span> State (<?php echo count($var['choices']);?>) </span></a>
        <div class="widget-link collapse show" id="state-filter">
          <ul class="sidebar-link nf-sidebar-scroll">

                   <?php 
                      
                      
                        $k=0;
                        foreach($var['choices'] as $choice)
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
                              'key'     =>  'state',
                              'value'    =>  $_POST['state'],
                              'compare'  => 'IN'
                          );
              }

            $args = array(
              'post_type' => 'education',
                'post_status' => 'publish',
                'meta_key'    => 'university_type',
                'posts_per_page' => -1,
                'meta_value'  => 'Study North-East',
                'meta_query'     =>  array(
                              array(
                                  'relation' => 'AND',
                                  $sts_state
                                )
                            )
            );
            
            $the_query = new WP_Query( $args );
            $return_department=array();
            if( $the_query->have_posts() ){
              while( $the_query->have_posts() ){ 
                $the_query->the_post(); 
                $values= get_fields();
                $return_department[]=$values['department'];
            }
          }

          $return_department = array_filter(array_unique($return_department));
          if(!empty($_POST['dept']) && !in_array($_POST['dept'], $return_department)) $_POST['dept']='';
          wp_reset_query();
        //=======ajax end


        $var = get_field_object('field_60b23932b3044');?>
        <a class="btn-link nf-color-2" data-toggle="collapse" href="#department-filter">
          <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/department.png" alt="department"> <span>  Department (<?php echo count($return_department);//count($var['choices']);?>)</span>
        </a>
        <div class="widget-link collapse show" id="department-filter">
          <ul class="sidebar-link nf-sidebar-scroll">

            

            <?php 
                
                  $k=0;
                  sort($return_department);
                  //foreach($var['choices'] as $choice)
                  foreach($return_department as $choice)
                  
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
        <?php /*?>
        <?php $var = get_field_object('field_60b23968b3046');?>
        <a class="btn-link nf-color-3" data-toggle="collapse" href="#Courses-filter">
          <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/course.png" alt="education"> <span>  Course (<?php echo count($var['choices']);?>)</span>
        </a>
        <div class="widget-link collapse show" id="Courses-filter">
          <ul class="sidebar-link nf-sidebar-scroll">
            
            
            <?php 
            
                
                  $k=0;
                  foreach($var['choices'] as $choice)
                  {
                    if($_POST['course']==$choice) $checked = 'checked'; 
                    else if(is_array($_POST['course']) && in_array($choice,$_POST['course'])) $checked = 'checked';
                    else  $checked = '';
                    echo '
                    <li>
                      <div class="nf-checkbox-wrap">
                        <input value="'.$choice.'" type="checkbox" '.$checked.' id="course_'.$k.'" name="course[]">
                        <label for="course_'.$k.'">'.$choice.'</label>
                      </div>
                    </li>
                    ';
                    $k++;
                  }
                  ?>
            
            
          </ul>
        </div><?php */?>
        <?php 
        //=========ajax start
        if(!empty($_POST['state']) )
              {
                if(!is_array($_POST['state'])) $_POST['state']=[$_POST['state']];
                $sts_state = array(
                              'key'     =>  'state',
                              'value'    =>  $_POST['state'],
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
                'meta_value'  => 'Study North-East',
                'meta_query'     =>  array(
                              array(
                                  'relation' => 'AND',
                                  $sts_state,
                                  $sts_dept
                                )
                            )
            );
            
            $the_query = new WP_Query( $args );
            $return_education=array();
         
            if( $the_query->have_posts() ){
              while( $the_query->have_posts() ){ 
                $the_query->the_post(); 
                $values= get_fields();
                $return_education[]=$values['mode_of_education'];
            }
          }
          $return_education = array_filter(array_unique($return_education));
          if(!empty($_POST['educ']) && !in_array($_POST['educ'], $return_education)) $_POST['educ']='';
          wp_reset_query();
        //=======ajax end


        $var = get_field_object('field_60b239c7b3049');?>
        <a class="btn-link nf-color-4" data-toggle="collapse" href="#Education-filter">
          <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/course.png" alt="course"> <span> Mode of Education (<?php echo count($return_education);//count($var['choices']);?>)</span>
        </a>
        <div class="widget-link collapse show" id="Education-filter">
          <ul class="sidebar-link nf-sidebar-scroll">
           

            <?php 
                
                  $k=0;
                  //foreach($var['choices'] as $choice)
                  sort($return_education);
                  foreach($return_education as $choice)
                  {
                    if($_POST['educ']==$choice) $checked = 'checked'; 
                    else if(is_array($_POST['educ']) && in_array($choice,$_POST['educ'])) $checked = 'checked';
                    else  $checked = '';
                    echo '
                    <li>
                      <div class="nf-checkbox-wrap">
                        <input class="check_educ" value="'.$choice.'" type="checkbox" '.$checked.' id="educ_'.$k.'" name="educ">
                        <label for="educ_'.$k.'">'.$choice.'</label>
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
                              'key'     =>  'state',
                              'value'    =>  $_POST['state'],
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
              if(!empty($_POST['educ']) )
              {
                if(!is_array($_POST['educ'])) $_POST['educ']=[$_POST['educ']];
                $sts_educ = array(
                              'key'     =>  'mode_of_education',
                              'value'    =>  $_POST['educ'],
                              'compare'  => 'IN'
                          );
              }

            $args = array(
              'post_type' => 'education',
                'post_status' => 'publish',
                'posts_per_page' => -1,
                'meta_key'    => 'university_type',
                'meta_value'  => 'Study North-East',
                'meta_query'     =>  array(
                              array(
                                  'relation' => 'AND',
                                  $sts_state,
                                  $sts_dept,
                                  $sts_educ
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
        //=======ajax end

        $var = get_field_object('field_60b239acb3048');?>
        <a class="btn-link nf-color-5" data-toggle="collapse" href="#Study-filter">
          <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/study.png" alt="study"> <span> Study Level (<?php echo count($return_level);//count($var['choices']);?>)</span>
        </a>
        <div class="widget-link collapse show" id="Study-filter">
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
  if(!empty($_POST['state']) )
  {
    if(!is_array($_POST['state'])) $_POST['state']=[$_POST['state']];

    $sts_location = array(
                  'key'     =>  'state',
                  'value'    =>  $_POST['state'],
                  'compare'  => 'IN'
              );
  }
  if(!empty($_POST['level']) )
  {
    if(!is_array($_POST['level'])) $_POST['level']=[$_POST['level']];

    $sts_level = array(
                  'key'     =>  'education_level',
                  'value'    =>  $_POST['level'],
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
  if(!empty($_POST['educ']))
  {
    if(!is_array($_POST['educ'])) $_POST['educ']=[$_POST['educ']];

    $sts = array(
                  'key'     =>  'mode_of_education',
                  'value'    =>  $_POST['educ'],
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
        array(
            'key'     =>  'email',
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
                            'meta_value'  => 'Study North-East',
                            'posts_per_page' => 10,
                            'paged' => $paged, 
                            'meta_query'     =>  array(
                              array(
                                  'relation' => 'AND',
                                  $sts,
                                  $sts_dept,
                                  $sts_location,
                                  $sts_level,
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
                            'meta_value'  => 'Study North-East',
                            'posts_per_page' => -1,
                            'meta_query'     =>  array(
                              array(
                                  'relation' => 'AND',
                                  $sts,
                                  $sts_dept,
                                  $sts_location,
                                  $sts_level,
                                  $keyw
                                )
                            )
                            );
      $tot_blog_posts = new WP_Query($tot_blog_args);
      ?>
  <div class="col-12 col-lg-8 nf-listing-c-width">

    <?php if(!empty($_POST['state']) or !empty($_POST['dept']) or !empty($_POST['educ']) or !empty($_POST['level'])){?>
      <div class="nf-state-listing-block">
             <div class="row">
              <?php if(!empty($_POST['state'])){?>
              <div class="col-12 col-lg-3">
                <a href="#">
                  <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/know-your-approvals/state.png" class="nf-w-t1">
                  <span><?php if(is_array($_POST['state'])) echo Implode(',<br>',$_POST['state']);else echo $_POST['state'];?></span>
                </a>
              </div>
            <?php }?>
            <?php if(!empty($_POST['dept'])){?>
         <div class="col-12 col-lg-3">
                <a href="#">
                  <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/department.png" class="nf-w-t2">
                  <span><?php if(is_array($_POST['dept'])) echo Implode(',<br>',$_POST['dept']);else echo $_POST['dept'];?></span>
                </a>
              </div>
              <?php }?>
              <?php if(!empty($_POST['educ'])){?>
         <div class="col-12 col-lg-3">
                <a href="#">
                  <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/course.png" class="nf-w-t2">
                  <span><?php if(is_array($_POST['educ'])) echo Implode(',<br>',$_POST['educ']);else echo $_POST['educ'];?></span>
                </a>
              </div>
              <?php }?>
              <?php if(!empty($_POST['level'])){?>
         <div class="col-12 col-lg-3">
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
    <div class="nf-top-result-list">


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
                                    $degrees_offered='';  
                                    $mode_of_education='';
                                    $email='';
                                    $contact='';
                                    $education_level='';

                                    $address='';
                                    $fee_range='';
                                    $standarised_test='';
                                    $degree_and_duration='';

                                    $medium_of_instruction='';
                                    $official_website='';
                                    $state='';
                                    $country='';
                                    $logo=''; 
                                    $application_link='';

                                    foreach($values as $key => $value)
                                    {
                                        if($key=='university_type'){ $university_type = $value; }
                                        if($key=='scholershop_name'){ $scholershop_name = $value;  }
                                        if($key=='university_name'){ $university_name = $value;  }

                                        if($key=='department'){ $department = $value; }
                                        if($key=='affiliation'){ $affiliation = $value;  }
                                        if($key=='course_name'){ $course_name = $value;  }
                                        if($key=='education_level'){ $education_level = $value;  }

                                        if($key=='duration'){ $duration = $value; }
                                        if($key=='degrees_offered'){ $degrees_offered = $value;  }
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
                                        if($key=='application_link'){ $application_link = $value;  }
                                        
                                    }
                                }

            /*if(((isset($_POST) && 
              ($_POST['state']==$state or $_POST['state']=='' or (is_array($_POST['state']) && in_array($state,$_POST['state'])))
              && ($_POST['dept']==$department or $_POST['dept']=='' or (is_array($_POST['dept']) && in_array($department,$_POST['dept'])))
              && ($_POST['course']==$course_name or $_POST['course']=='' or (is_array($_POST['course']) && in_array($course_name,$_POST['course'])))
              && ($_POST['educ']==$mode_of_education or $_POST['educ']=='' or (is_array($_POST['educ']) && in_array($mode_of_education,$_POST['educ'])))
              && ($_POST['level']==$education_level or $_POST['level']=='' or (is_array($_POST['level']) && in_array($education_level,$_POST['level'])))

               && (($_POST['keyword']!='' && (strpos($country, $_POST['keyword']) !== false or strpos($university_name, $_POST['keyword']) !== false or strpos($state, $_POST['keyword']) !== false or strpos($course_name, $_POST['keyword']) !== false or strpos($duration, $_POST['keyword']) !== false or strpos($education_level, $_POST['keyword']) !== false or strpos($mode_of_education, $_POST['keyword']) !== false or strpos($email, $_POST['keyword']) !== false or strpos($contact, $_POST['keyword']) !== false or strpos($address, $_POST['keyword']) !== false)) or $_POST['keyword']=='')

            ) or !isset($_POST)) && $university_type=='Study North-East'){*/ 
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
              <p><?php echo $affiliation;?></p>
            </div>
          </div>
          <div class="nf-location-name">
            <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/map.png" alt="map">
            <span><?php echo $state;?></span>
          </div>
        </div>
        <div class="nf-cart-body">
          <div class="row">
            <div class="col-12 col-lg-4">
              <div class="nf-listing">
                <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/course-1.png" alt="course-1">
                <h4><span>Department Name</span><?php echo $department;?></h4>
              </div>
              <div class="nf-listing">
                <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/education-1.png" alt="education-1">
                <h4><span>Degrees Offered</span><?php echo $degrees_offered;?></h4>
              </div>
              <div class="nf-listing">
                <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/education-1.png" alt="education-1">
                <h4><span>Study Level</span><?php echo $education_level;?></h4>
              </div>
              <div class="nf-listing">
                <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/email.png" alt="email">
                <h4><span>Email</span><a href="mailto:<?php echo $email;?>"><?php echo $email;?></a></h4>
              </div>
              
            </div>
            <div class="col-12 col-lg-4">
              <div class="nf-listing">
                <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/time.png" alt="time">
                <h4><span>Duration</span><?php echo $duration;?></h4>
              </div>
              <div class="nf-listing">
                <img class="nf-img-w-25" src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/education-2.png" alt="education-2 ">
                <h4><span>Mode Of Education</span><?php echo $mode_of_education;?></h4>
              </div>
              <div class="nf-listing">
                <img class="nf-img-w-25" src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/call.png" alt="call">
                <h4><span>Contact</span><a href="tel:<?php echo $contact;?>" class="nf-call-link"><?php echo $contact;?></a></h4>
              </div>
            </div>
            <div class="col-12 col-lg-3">
              <div class="nf-address-block">
                <h4><img src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/address.png" alt="address">Address</h4>
                <h5><?php echo $address;?></h5>
                <?php if($application_link!=''){?>
                <a target="_blank" href="<?php echo $application_link; ?>" class="nf-white-button">
                  View Details
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
    $('.check_state').click(function() {
        $('.check_state').not(this).prop('checked', false);
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
$(document).ready(function(){
    $('.check_educ').click(function() {
        $('.check_educ').not(this).prop('checked', false);
        document.getElementById("form_id").submit();
    });
});
</script>
