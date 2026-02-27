<?php /* Template Name: scholership-list */
 ?>
<?php get_header();

 if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
$url = "https://";else $url = "http://";
$url.= $_SERVER['HTTP_HOST'];   
$url.= $_SERVER['REQUEST_URI'];
$url = explode('?',$url);   
$url = explode('&loginerror',$url[1]);  
$title = str_replace('-',' ',$url[0]);
$title = str_replace(':','-',$title);
if($title!='') $_POST['keyword'] = $title;

//new line
if(!empty($wp_query->query_vars['flag'])){ $title= $wp_query->query_vars['flag']; $_POST['keyword'] = str_replace('-',' ',$title);}

$category_id = get_cat_ID ('Scholership');
$categories = get_category( $category_id );

//echo '<pre>';
//print_r($_POST);
//exit;
if($_POST['dept_all']!='') $_POST['dept']=$_POST['dept_all'];
if($_POST['state_all']!='') $_POST['state']=$_POST['state_all'];

$page_data = get_page_by_path( 'scholarships' );
$logo_image = get_field( "logo", $page_data->ID );

if(isset($_POST['location']) && !is_array($_POST['location'])) $_POST['location']=[$_POST['location']];
?>
<!-- /end header-bottom -->

<!-- header-end -->
<!-- inner-banner-start -->
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
<form method="post" action="<?php echo site_url()?>/scholarships-list/" id="form_id">
<div class="inner-body">
<div class="container">
<div class="row">
<div class="col-12 col-lg-4 nf-sidebar-c-width">
  
  <div class="courses-details-sidebar-area search-sidebar nf-sidebar">
    <div class="widget mb-20 widget-padding white-bg">
      <?php $var = get_field_object('field_60c9c1c8d11fe');?>
      <a class="btn-link nf-color-1" data-toggle="collapse" href="#state-filter">
        <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/state-white.png" alt="state-white"> <span> Location (<?php echo count($var['choices']);?>) </span></a>
        <div class="widget-link collapse show" id="state-filter">
          <ul class="sidebar-link nf-sidebar-scroll">

            <li>
              <div class="nf-checkbox-wrap">
                <input class="check_location" <?php if($_POST['location']=='All') $checked = 'checked'; 
                          else if(is_array($_POST['location']) && in_array('All',$_POST['location'])) $checked = 'checked'; 
                          else  $checked = ''; echo $checked;?> type="checkbox" id="all" name="location[]" value="All">
                <label for="all">All </label>
              </div>
            </li>
            <?php 
                      
                      
                        $k=0;
                        sort($var['choices']);
                        foreach($var['choices'] as $choice)
                        {
                          if($_POST['location']==$choice) $checked = 'checked'; 
                          else if(is_array($_POST['location']) && in_array($choice,$_POST['location'])) $checked = 'checked'; 
                          else  $checked = ''; 
                          echo '
                          <li>
                            <div class="nf-checkbox-wrap">
                              <input class="check_location" value="'.$choice.'" type="checkbox" '.$checked.' id="location_'.$k.'" name="location[]">
                              <label for="location_'.$k.'">'.$choice.'</label>
                            </div>
                          </li>
                          ';
                          $k++;
                        }
                        ?>
            
          </ul>
        </div>
        <?php $var = get_field_object('field_60b239acb3048');?>
        <a class="btn-link nf-color-2" data-toggle="collapse" href="#department-filter">
          <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/study.png" alt="department"> <span>  Study Level (<?php echo count($var['choices']);?>)</span>
        </a>
        <div class="widget-link collapse show" id="department-filter">
          <ul class="sidebar-link nf-sidebar-scroll">
            <?php 
                
                  $k=0;
                  sort($var['choices']);
                  foreach($var['choices'] as $choice)
                  {
                    if($_POST['level']==$choice) $checked = 'checked'; 
                    else if(is_array($_POST['level']) && in_array($choice,$_POST['level'])) $checked = 'checked'; 
                    else  $checked = '';
                    echo '
                    <li>
                      <div class="nf-checkbox-wrap">
                        <input class="check_level" value="'.$choice.'" type="checkbox" '.$checked.' id="level_'.$k.'" name="level[]">
                        <label for="level_'.$k.'">'.$choice.'</label>
                      </div>
                    </li>
                    ';
                    $k++;
                  }
                  ?>

            
            
          </ul>
        </div>
        <?php /*?><?php $var = get_field_object('field_60b23a80b3051');?>
        <a class="btn-link nf-color-2" data-toggle="collapse" href="#department-filter">
          <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/department.png" alt="department"> <span>  Type Of Scholarship (<?php echo count($var['choices']);?>)</span>
        </a>
        <div class="widget-link collapse show" id="department-filter">
          <ul class="sidebar-link nf-sidebar-scroll">
            <?php 
                
                  $k=0;
                  foreach($var['choices'] as $choice)
                  {
                    if($_POST['type_of_scholarship']==$choice) $checked = 'checked'; 
                    else if(is_array($_POST['type_of_scholarship']) && in_array($choice,$_POST['type_of_scholarship'])) $checked = 'checked'; 
                    else  $checked = '';
                    echo '
                    <li>
                      <div class="nf-checkbox-wrap">
                        <input value="'.$choice.'" type="checkbox" '.$checked.' id="type_of_scholarship_'.$k.'" name="type_of_scholarship[]">
                        <label for="type_of_scholarship_'.$k.'">'.$choice.'</label>
                      </div>
                    </li>
                    ';
                    $k++;
                  }
                  ?>

            
            
          </ul>
        </div><?php */?>
      </div>
    </div>
  
  </div>

<?php
if(!empty($_POST['location']) && (is_array($_POST['location']) && !in_array('All', $_POST['location'])) && $_POST['location']!='All')
  {
    if(!is_array($_POST['location'])) $_POST['location']=[$_POST['location']];

    $sts_location = array(
                  'key'     =>  'location',
                  'value'    =>  $_POST['location'],
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
            'key'     =>  'scholershop_name',
                  'value'    =>  $_POST['keyword'],
                  'compare'  => 'LIKE'
        ),
        array(
            'key'     =>  'university_name',
                  'value'    =>  $_POST['keyword'],
                  'compare'  => 'LIKE'
        ),
        array(
            'key'     =>  'location',
                  'value'    =>  $_POST['keyword'],
                  'compare'  => 'LIKE'
        ),
        array(
            'key'     =>  'issuing_authority',
                  'value'    =>  $_POST['keyword'],
                  'compare'  => 'LIKE'
        ),
        array(
            'key'     =>  'brief_of_the_scholarship',
                  'value'    =>  $_POST['keyword'],
                  'compare'  => 'LIKE'
        ),
        array(
            'key'     =>  'type_of_scholarship',
                  'value'    =>  $_POST['keyword'],
                  'compare'  => 'LIKE'
        ),
        

    );
  }

        //pagination
       $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
      $blog_args = array(
                            'post_type' => 'education',
                            'post_status' => 'publish',
                            'meta_key'    => 'university_type',
                            'meta_value'  => 'Scholarships',
                             'posts_per_page' => 10,
                             'paged' => $paged, 
                            'meta_query'     =>  array(
                              array(
                                  'relation' => 'AND',
                                  $sts,
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
                            'posts_per_page' => -1,
                            'meta_value'  => 'Scholarships',
                            'meta_query'     =>  array(
                              array(
                                  'relation' => 'AND',
                                  $sts,
                                  $sts_location,
                                  $keyw
                                )
                            )
                            );
      $tot_blog_posts = new WP_Query($tot_blog_args);
      ?>


  <div class="col-12 col-lg-8 nf-listing-c-width">

    <?php if(!empty($_POST['location']) or !empty($_POST['level'])){?>
      <div class="nf-state-listing-block">
             <div class="row">
              <?php if(!empty($_POST['location'])){?>
              <div class="col-12 col-lg-6">
                <a href="#">
                  <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/know-your-approvals/state.png" class="nf-w-t1">
                  <span><?php if(is_array($_POST['location'])) echo Implode(',<br>',$_POST['location']);else echo $_POST['location'];?></span>
                </a>
              </div>
            <?php }?>
            
              <?php if(!empty($_POST['level'])){?>
         <div class="col-12 col-lg-6">
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
    <div class="nf-know-listing-block nf-scholarship mt-4">
    <div class="row">


       <?php
      $record=0;
                            while($blog_posts->have_posts()) {
                                $blog_posts->the_post(); 

                                $values= get_fields();

                                //echo '<pre>';
                                //print_r($values);exit();
                                
                                if($values)
                                {
                                    $university_type=''; 
                                    $scholershop_name='';  
                                    $university_name='';

                                    $department=''; 
                                    $affiliation='';
                                    $issuing_authority='';  
                                    $course_name='';

                                    $duration=''; 
                                    $education_level='';  
                                    $mode_of_education='';
                                    $email='';
                                    $contact='';

                                    $address='';
                                    $fee_range='';
                                    $standarised_test='';
                                    $brief_of_the_scholarship='';

                                    $medium_of_instruction='';
                                    $type_of_scholarship='';
                                    $state='';
                                    $country='';
                                    $logo=''; 
                                    $location='';
                                    $application_link='';

                                    foreach($values as $key => $value)
                                    {
                                        if($key=='university_type'){ $university_type = $value; }
                                        if($key=='scholershop_name'){ $scholershop_name = $value;  }
                                        if($key=='university_name'){ $university_name = $value;  }

                                        if($key=='department'){ $department = $value; }
                                        if($key=='affiliation'){ $affiliation = $value;  }
                                        if($key=='issuing_authority'){ $issuing_authority = $value;  }
                                        if($key=='course_name'){ $course_name = $value;  }

                                        if($key=='duration'){ $duration = $value; }
                                        if($key=='education_level'){ $education_level = $value;  }
                                        if($key=='mode_of_education'){ $mode_of_education = $value;  }
                                        if($key=='email'){ $email = $value;  }
                                        if($key=='contact'){ $contact = $value;  }

                                        if($key=='address'){ $address = $value;  }
                                        if($key=='fee_range'){ $fee_range = $value;  }
                                        if($key=='standarised_test'){ $standarised_test = $value;  }
                                        if($key=='brief_of_the_scholarship'){ $brief_of_the_scholarship = $value;  }

                                        if($key=='medium_of_instruction'){ $medium_of_instruction = $value;  }
                                        if($key=='type_of_scholarship'){ $type_of_scholarship = $value;  }
                                        if($key=='state'){ $state = $value;  }
                                        if($key=='country'){ $country = $value;  }
                                        if($key=='logo'){ $logo = $value;  }
                                        if($key=='location'){ $location = $value;  }
                                        if($key=='application_link'){ $application_link = $value;  }

                                        
                                        $type_of_scholarship = $values['type_of_scholarship'];

                                        $type_of_scholarship_arr = $type_of_scholarship;


                                        $type_of_scholarship = implode(',',$type_of_scholarship);


                                        
                                    }
                                }

            /*if(((isset($_POST) && 
              ($_POST['location']==$location or $_POST['location']=='All' or $_POST['location']=='' or (is_array($_POST['location']) && (in_array($location,$_POST['location']) or in_array('All',$_POST['location']) )))

              && ($_POST['type_of_scholarship']==$type_of_scholarship or $_POST['type_of_scholarship']=='' or (is_array($_POST['type_of_scholarship']) && in_array($type_of_scholarship,$_POST['type_of_scholarship'])) or (!is_array($_POST['type_of_scholarship']) && in_array($_POST['type_of_scholarship'],$type_of_scholarship_arr)) or !empty(array_intersect($type_of_scholarship_arr, $_POST['type_of_scholarship'])) or !empty(array_intersect($_POST['type_of_scholarship'],$type_of_scholarship_arr)) )

              && ($_POST['course']==$course_name or $_POST['course']=='' or (is_array($_POST['course']) && in_array($course_name,$_POST['course'])))
              && ($_POST['educ']==$mode_of_education or $_POST['educ']=='' or (is_array($_POST['educ']) && in_array($mode_of_education,$_POST['educ'])))
              && ($_POST['level']==$education_level or $_POST['level']=='' or (is_array($_POST['level']) && in_array($education_level,$_POST['level']))) 

              && (($_POST['keyword']!='' && (strpos($scholershop_name, $_POST['keyword']) !== false or strpos($university_name, $_POST['keyword']) !== false or strpos($location, $_POST['keyword']) !== false or strpos($fee_range, $_POST['keyword']) !== false or strpos($standarised_test, $_POST['keyword']) !== false or strpos($brief_of_the_scholarship, $_POST['keyword']) !== false or strpos($medium_of_instruction, $_POST['keyword']) !== false or strpos($type_of_scholarship, $_POST['keyword']) !== false)) or $_POST['keyword']=='')

            ) or !isset($_POST)) && $university_type=='Scholarships'){ */
            $record=$record+1;         
      ?>

              <div class="col-md-12 col-xl-6 mb-4">
                    <div class="nf-know-listing-block">
                      <div class="mentor-table">
                        <div class="nameHeading-five heading">
                          <div class="textIcon"><img src="<?php //echo get_template_directory_uri(). '/assets/img/study-in-north/university-logo.png' ?><?php echo $logo_image;?>" alt="university-logo.png"></div>
                          <h3><?php echo $scholershop_name;?></h3>
                          <div class="nf-location-name">
                            <span><?php echo $location;?></span>
                            <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/state-white.png" alt="map">
                          </div>
                        </div>
                        <div class="infoNewAlltabs">
                          <div class="row">
                            <div class="col-12 col-lg-7">
                              <h4>Brief of the scholarship</h4>
                              <p><?php echo $brief_of_the_scholarship;?></p>

                              <h4>Issuing Authority </h4>
                              <h5><?php echo $issuing_authority;?></h5>
                            </div>

                            <div class="col-12 col-lg-5 pl-0">
                              <div class="nf-type-scolr">
                                <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/test.png" alt="test">
                                <div class="data">
                                  <span>Type of Scholarship</span>
                                  <h5><?php echo $type_of_scholarship;?></h5>
                                  <?php if($application_link!=''){?>
                                  <p>Application Link</p>
                                  <a target="_blank" href="<?php echo $application_link;?>" class="nf-visit-portal-btn">Visit Portal</a>
                                <?php }?>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

    <?php //}

	}
	?>

 <div class="col-sm-12"> <?php if($record==0) echo 'No Record Found.'; 


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
</div>
</div>
</form>
<!-- End Study tour in north section  -->
<!-- footer start -->
<!-- footer start -->   
<?php get_footer(); ?> 


<script type="text/javascript">

/*js for view more checkbox list hide show*/
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
    $('.check_location').click(function() {
        $('.check_location').not(this).prop('checked', false);
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
