<?php /* Template Name: scholership for girls list */
?>
<?php get_header(); 

$category_id = get_cat_ID ('Scholarship for Girls');
$categories = get_category( $category_id );

$page_data = get_page_by_path( 'scholarship-for-girls-list' ); 
$logo_image = get_field( "scheme_logo", $page_data->ID ); 
?>

<!-- header-end -->
<!-- inner-banner-start -->
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
          <div class="bannerbg nf-gradient-28 justify-content-start pt-3 nf-height-100">
            <h4 class="nf-f-size-24"><?php echo $page_data->post_content;?></h4>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- inner-banner-end -->
<!-- Study tour in north section  -->
<form method="post" action="<?php echo site_url()?>/scholarship-for-girls-list/" id="form_id">
  <div class="inner-body">
    <div class="container">
      <div class="row">
        <div class="col-12 col-lg-4 nf-sidebar-c-width">
          <?php $var = get_field_object('field_610cd5d47a2b9');?>
          <div class="courses-details-sidebar-area search-sidebar nf-sidebar">
            <div class="widget mb-20 widget-padding white-bg">
              <a class="btn-link nf-color-1" data-toggle="collapse" href="#state-filter">
                <img src="<?php echo get_template_directory_uri(). '/assets/'?>/img/study-in-north/state-white.png" alt="state-white"> <span> Location (<?php echo count($var['choices']);?>) </span></a>
                <div class="widget-link collapse show" id="state-filter">
                  <ul class="sidebar-link nf-sidebar-scroll">

                    <li>
                      <div class="nf-checkbox-wrap">
                        <input class="check_region" <?php if($_POST['region']=='All') $checked = 'checked'; 
                        else if(is_array($_POST['region']) && in_array('All',$_POST['region'])) $checked = 'checked'; 
                        else  $checked = ''; echo $checked;?> type="checkbox" id="all" name="region" value="All">
                        <label for="all">All </label>
                      </div>
                    </li>

                    <?php 

                    $k=0;
                    sort($var['choices']);
                    foreach($var['choices'] as $choice)
                    {
                      if($_POST['region']==$choice) $checked = 'checked'; 
                      else if(is_array($_POST['region']) && in_array($choice,$_POST['region'])) $checked = 'checked'; 
                      else  $checked = ''; 
                      echo '
                      <li>
                      <div class="nf-checkbox-wrap">
                      <input class="check_region" value="'.$choice.'" type="checkbox" '.$checked.' id="region_'.$k.'" name="region">
                      <label for="region_'.$k.'">'.$choice.'</label>
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
                if(!empty($_POST['region']) &&  $_POST['region']!='All')
                {
                  if(!is_array($_POST['region'])) $_POST['region']=[$_POST['region']];
                  $sts_region = array(
                    'key'     =>  'region',
                    'value'    =>  $_POST['region'],
                    'compare'  => 'IN'
                  );
                }

                $args = array(
                  'post_type' => 'beti_bachao',
                  'post_status' => 'publish',
                  'posts_per_page' => -1,
                  'meta_key'    => 'category',
                  'meta_value'  => 'Scholarship for Girls',
                  'meta_query'     =>  array(
                    array(
                      'relation' => 'AND',
                      $sts_region
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
                if(!empty($_POST['department']) && !in_array($_POST['department'], $return_department)) $_POST['department']='';
                wp_reset_query();

                $var = get_field_object('field_610b8b3599e75');?>
                <a class="btn-link nf-color-2" data-toggle="collapse" href="#department-filter">
                  <img src="<?php echo get_template_directory_uri(). '/assets/'?>/img/study-in-north/department.png" alt="department"> <span>  Department (<?php echo count($return_department);?>)</span>
                </a>
                <div class="widget-link collapse show" id="department-filter">
                  <ul class="sidebar-link nf-sidebar-scroll">

                   <?php 

                   $k=0;
                   sort($return_department);
                        //foreach($var['choices'] as $choice)
                   foreach($return_department as $choice)
                   {
                    if($_POST['department']==$choice) $checked = 'checked'; 
                    else if(is_array($_POST['department']) && in_array($choice,$_POST['department'])) $checked = 'checked'; 
                    else  $checked = ''; 
                    echo '
                    <li>
                    <div class="nf-checkbox-wrap">
                    <input class="check_department" value="'.$choice.'" type="checkbox" '.$checked.' id="department_'.$k.'" name="department">
                    <label for="department_'.$k.'">'.$choice.'</label>
                    </div>
                    </li>
                    ';
                    $k++;
                  }
                  ?>

                </ul>
              </div>
              <?php 
              if(!empty($_POST['region']) &&  $_POST['region']!='All')
              {
                if(!is_array($_POST['region'])) $_POST['region']=[$_POST['region']];
                $sts_region = array(
                  'key'     =>  'region',
                  'value'    =>  $_POST['region'],
                  'compare'  => 'IN'
                );
              }
              if(!empty($_POST['department']) )
              {
                if(!is_array($_POST['department'])) $_POST['department']=[$_POST['department']];
                $sts_department = array(
                  'key'     =>  'department',
                  'value'    =>  $_POST['department'],
                  'compare'  => 'IN'
                );
              }
              

              $args = array(
                'post_type' => 'beti_bachao',
                'post_status' => 'publish',
                'posts_per_page' => -1,
                'meta_key'    => 'category',
                'meta_value'  => 'Scholarship for Girls',
                'meta_query'     =>  array(
                  array(
                    'relation' => 'AND',
                    $sts_region,
                    $sts_department
                  )
                )
              );

              $the_query = new WP_Query( $args );
              $return_study_level=array();

              if( $the_query->have_posts() ){
                while( $the_query->have_posts() ){ 
                  $the_query->the_post(); 
                  $values= get_fields();
                  $return_study_level[]=$values['study_level'];
                }
              }
              $return_study_level = array_filter(array_unique($return_study_level));
              if(!empty($_POST['study_level']) && !in_array($_POST['study_level'], $return_study_level)) $_POST['study_level']='';
              wp_reset_query();
        //=======ajax end 


              $var = get_field_object('field_610b8b5d99e76');?>
              <a class="btn-link nf-color-5" data-toggle="collapse" href="#department-filter">
                <img src="<?php echo get_template_directory_uri(). '/assets/'?>/img/study-in-north/department.png" alt="department"> <span>  Study Level (<?php echo count($return_study_level);?>) </span>
              </a>
              <div class="widget-link collapse show" id="department-filter">
                <ul class="sidebar-link nf-sidebar-scroll">

                 <?php 

                 $k=0;
                 sort($return_study_level);
                        //foreach($var['choices'] as $choice)
                 foreach($return_study_level as $choice)
                 {
                  if($_POST['study_level']==$choice) $checked = 'checked'; 
                  else if(is_array($_POST['study_level']) && in_array($choice,$_POST['study_level'])) $checked = 'checked'; 
                  else  $checked = ''; 
                  echo '
                  <li>
                  <div class="nf-checkbox-wrap">
                  <input class="check_level" value="'.$choice.'" type="checkbox" '.$checked.' id="level_'.$k.'" name="study_level">
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
      if(!empty($_POST['region']) && $_POST['region']!='All' )
      {
        if(!is_array($_POST['region'])) $_POST['region']=[$_POST['region']];

        $sts_location = array(
          'key'     =>  'region',
          'value'    =>  $_POST['region'],
          'compare'  => 'IN'
        );
      }
      if(!empty($_POST['study_level']) )
      {
        if(!is_array($_POST['study_level'])) $_POST['study_level']=[$_POST['study_level']];

        $sts_level = array(
          'key'     =>  'study_level',
          'value'    =>  $_POST['study_level'],
          'compare'  => 'IN'
        );
      }

      if(!empty($_POST['department']))
      {
        if(!is_array($_POST['department'])) $_POST['department']=[$_POST['department']];

        $sts_dept = array(
          'key'     =>  'department',
          'value'    =>  $_POST['department'],
          'compare'  => 'IN'
        );
      }

      if($_POST['keyword']!='')
      {
        $keyw = array(
          'relation' => 'OR',
          array(
            'key'     =>  'region',
            'value'    =>  $_POST['keyword'],
            'compare'  => 'LIKE'
          ),
          array(
            'key'     =>  'university_name',
            'value'    =>  $_POST['keyword'],
            'compare'  => 'LIKE'
          ),
          array(
            'key'     =>  'study_level',
            'value'    =>  $_POST['keyword'],
            'compare'  => 'LIKE'
          ),
          array(
            'key'     =>  'scholarship_name',
            'value'    =>  $_POST['keyword'],
            'compare'  => 'LIKE'
          ),
          array(
            'key'     =>  'issuing_authority',
            'value'    =>  $_POST['keyword'],
            'compare'  => 'LIKE'
          ),
          array(
            'key'     =>  'type_of_scholarship',
            'value'    =>  $_POST['keyword'],
            'compare'  => 'LIKE'
          )

        );
      }

      $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
      $blog_args = array(
        'post_type' => 'beti_bachao',
        'post_status' => 'publish',
        'meta_key'    => 'category',
        'meta_value'  => 'Scholarship for Girls',
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
        'post_type' => 'beti_bachao',
        'post_status' => 'publish',
        'meta_key'    => 'category',
        'meta_value'  => 'Scholarship for Girls',
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

       <?php if(!empty($_POST['region']) or !empty($_POST['department']) or !empty($_POST['study_level'])){?>
      <div class="nf-state-listing-block">
             <div class="row">
              <?php if(!empty($_POST['region'])){?>
              <div class="col-12 col-lg-4">
                <a href="#">
                  <img src="<?php echo get_template_directory_uri(). '/assets/'?>/img/know-your-approvals/state.png" class="nf-w-t1">
                  <span><?php if(is_array($_POST['region'])) echo Implode(',<br>',$_POST['region']);else echo $_POST['region'];?></span>
                </a>
              </div>
            <?php }?>
            <?php if(!empty($_POST['department'])){?>
         <div class="col-12 col-lg-3">
                <a href="#">
                  <img src="<?php echo get_template_directory_uri(). '/assets/'?>/img/study-in-north/department.png" class="nf-w-t2">
                  <span><?php if(is_array($_POST['department'])) echo Implode(',<br>',$_POST['department']);else echo $_POST['department'];?></span>
                </a>
              </div>
              <?php }?>
              <?php if(!empty($_POST['study_level'])){?>
         <div class="col-12 col-lg-3">
                <a href="#">
                  <img src="<?php echo get_template_directory_uri(). '/assets/'?>/img/study-in-north/department.png" class="nf-w-t2">
                  <span><?php if(is_array($_POST['study_level'])) echo Implode(',<br>',$_POST['study_level']);else echo $_POST['study_level'];?></span>
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

         
        if($values)
        {
          $category=''; 
          $location='';
          $scholarship_name='';  
          $university_name='';
          $department=''; 
          $issuing_authority='';  
          $brief_of_the_scholarship='';
          $type_of_scholarship='';
          $state='';
          $country='';
          $application__link=''; 

          foreach($values as $key => $value)
          {
            if($key=='category'){ $category = $value; }
            if($key=='region'){ $location = $value; }
            if($key=='scholarship_name'){ $scholarship_name = $value;  }
            if($key=='university_name'){ $university_name = $value;  }
            if($key=='department'){ $department = $value; }
            if($key=='issuing_authority'){ $issuing_authority = $value;  }
            if($key=='brief_of_the_scholarship'){ $brief_of_the_scholarship = $value;  }
            if($key=='type_of_scholarship'){ $type_of_scholarship = $value;  }
            if($key=='state'){ $state = $value;  }
            if($key=='application__link'){ $application__link = $value;  }

            $type_of_scholarship = $values['type_of_scholarship'];

            $type_of_scholarship_arr = $type_of_scholarship;


            $type_of_scholarship = implode(',',$type_of_scholarship);



          }
        }

              $record=$record+1;         
              ?>

              <div class="col-md-12 col-xl-6 mb-4">
                <div class="nf-know-listing-block">
                  <div class="mentor-table">
                    <div class="nameHeading-five heading">
                      <div class="textIcon"><img src="<?php //echo get_template_directory_uri(). '/assets/img/study-in-north/university-logo.png' ?><?php echo $logo_image;?>" alt="university-logo.png"></div>
                      <h3><?php echo $scholarship_name;?></h3>
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
                              <p>Application Link</p>
                              <a target="_blank" href="<?php echo $application__link;?>" class="nf-visit-portal-btn">Visit Portal</a>
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
  $('.check_region').click(function() {
    $('.check_region').not(this).prop('checked', false);
    document.getElementById("form_id").submit();
  });
});
$(document).ready(function(){
  $('.check_department').click(function() {
    $('.check_department').not(this).prop('checked', false);
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
