<?php /* Template Name: fellowship-list */
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
$title = explode(',',$title);  
if($title!='') $_POST['keyword'] = $title[0];

//new line
if(!empty($wp_query->query_vars['flag'])){ $title= $wp_query->query_vars['flag']; $_POST['keyword'] = str_replace('-',' ',$title);}

$category_id = get_cat_ID ('Fellowship');
$categories = get_category( $category_id );

//echo '<pre>';
//print_r($_POST);
//exit;
if($_POST['dept_all']!='') $_POST['dept']=$_POST['dept_all'];
if($_POST['state_all']!='') $_POST['state']=$_POST['state_all'];

$page_data = get_page_by_path( 'fellowships' );
$logo_image = get_field( "logo", $page_data->ID );

?>
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
              <div class="bannerbg nf-gradient-22 justify-content-start pt-3 nf-height-100">
                <!--<h4 class="nf-f-size-24"><?php //echo $page_data->post_title;?></h4>-->
                <h5><?php echo $page_data->post_content;?></h5>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- inner-banner-end -->
    <!-- Study tour in north section  -->
    <form method="post" action="<?php echo site_url()?>/fellowship-list" id="form_id">
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
                    <ul class="sidebar-link">

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


                      <!--<li>
                        <div class="nf-checkbox-wrap">
                          <input type="checkbox" id="India" name="checkbox-group">
                          <label for="India">India </label>
                        </div>
                      </li>
                      <li>
                        <div class="nf-checkbox-wrap">
                          <input type="checkbox" id="Abroad" name="checkbox-group">
                          <label for="Abroad">Abroad </label>
                        </div>
                      </li>-->
                    </ul>
                  </div>
                  <?php $var = get_field_object('field_60c9c203d11ff');?>
                  <a class="btn-link nf-color-5" data-toggle="collapse" href="#Study-filter">
                    <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/education/fellowship.png" alt="fellowship"> <span> Category of Fellowship (<?php echo count($var['choices']);?>)</span>
                  </a>
                  <div class="widget-link collapse show" id="Study-filter">
                    <ul class="sidebar-link">
                      <?php 
                        
                        $k=0;
                        sort($var['choices']);
                        foreach($var['choices'] as $choice)
                        {
                          if($_POST['category']==$choice) $checked = 'checked'; 
                          else if(is_array($_POST['category']) && in_array($choice,$_POST['category'])) $checked = 'checked'; 
                          else  $checked = ''; 
                          echo '
                          <li>
                            <div class="nf-checkbox-wrap">
                              <input class="check_category" value="'.$choice.'" type="checkbox" '.$checked.' id="category_'.$k.'" name="category[]">
                              <label for="category_'.$k.'">'.$choice.'</label>
                            </div>
                          </li>
                          ';
                          $k++;
                        }
                        ?>
                      
                    </ul>
                  </div>

                  <?php /*?><a class="btn-link nf-color-2" data-toggle="collapse" href="#department-filter">
                    <?php $var = get_field_object('field_60c9c250d1200');?>

                    <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/education/choice-wht.png" alt="Fellowship"> <span>  Type of Fellowship (<?php echo count($var['choices']);?>)</span>
                  </a>
                  <div class="widget-link collapse show" id="department-filter">
                    <ul class="sidebar-link">
                      <?php 
                        
                        $k=0;
                        foreach($var['choices'] as $choice)
                        {
                          if($_POST['type']==$choice) $checked = 'checked'; 
                          else if(is_array($_POST['type']) && in_array($choice,$_POST['type'])) $checked = 'checked'; 
                          else  $checked = ''; 
                          echo '
                          <li>
                            <div class="nf-checkbox-wrap">
                              <input class="check_type" value="'.$choice.'" type="checkbox" '.$checked.' id="type_'.$k.'" name="type[]">
                              <label for="type_'.$k.'">'.$choice.'</label>
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
  //print_r($_POST['location']);
  if(!empty($_POST['location']) )
  {
    if(!is_array($_POST['location'])) $_POST['location'] = [$_POST['location']];

    $sts_location = array(
                  'key'     =>  'location',
                  'value'    =>  $_POST['location'],
                  'compare'  => 'IN'
              );
  }
  
  if(!empty($_POST['category']))
  {
    if(!is_array($_POST['category'])) $_POST['category']=[$_POST['category']];

    $sts_dept = array(
                  'key'     =>  'category_of_fellowship',
                  'value'    =>  $_POST['category'],
                  'compare'  => 'IN'
              );
  }
  if(!empty($_POST['type']))
  {
    if(!is_array($_POST['type'])) $_POST['type']=[$_POST['type']];

    $sts = array(
                  'key'     =>  'type_of_fellowship',
                  'value'    =>  $_POST['type'],
                  'compare'  => 'IN'
              );
  }
  if($_POST['keyword']!='')
  {
    $keyw = array(
        'relation' => 'OR',
        array(
            'key'     =>  'location',
                  'value'    =>  $_POST['keyword'],
                  'compare'  => 'LIKE'
        ),
        array(
            'key'     =>  'fellowship_name',
                  'value'    =>  $_POST['keyword'],
                  'compare'  => 'LIKE'
        ),
        array(
            'key'     =>  'fellowship_authority',
                  'value'    =>  $_POST['keyword'],
                  'compare'  => 'LIKE'
        ),
        array(
            'key'     =>  'application_link',
                  'value'    =>  $_POST['keyword'],
                  'compare'  => 'LIKE'
        ),
        array(
            'key'     =>  'fellowship_description',
                  'value'    =>  $_POST['keyword'],
                  'compare'  => 'LIKE'
        ),
        array(
            'key'     =>  'category_of_fellowship',
                  'value'    =>  $_POST['keyword'],
                  'compare'  => 'LIKE'
        ),
        array(
            'key'     =>  'type_of_fellowship',
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
                            'meta_value'  => 'Fellowship',
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
                            'meta_value'  => 'Fellowship',
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

          <?php if(!empty($_POST['location']) or !empty($_POST['category']) or !empty($_POST['type'])){?>
      <div class="nf-state-listing-block">
             <div class="row">
              <?php if(!empty($_POST['location'])){?>
              <div class="col-12 col-lg-4">
                <a href="#">
                  <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/know-your-approvals/state.png" class="nf-w-t1">
                  <span><?php if(is_array($_POST['location'])) echo Implode(',<br>',$_POST['location']);else echo $_POST['location'];?></span>
                </a>
              </div>
            <?php }?>
            <?php if(!empty($_POST['category'])){?>
         <div class="col-12 col-lg-4">
                <a href="#">
                  <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/department.png" class="nf-w-t2">
                  <span><?php if(is_array($_POST['category'])) echo Implode(',<br>',$_POST['category']);else echo $_POST['category'];?></span>
                </a>
              </div>
              <?php }?>
              
              <?php if(!empty($_POST['type'])){?>
         <div class="col-12 col-lg-4">
                <a href="#">
                  <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/choices.png" class="nf-w-t2">
                  <span><?php if(is_array($_POST['type'])) echo Implode(',<br>',$_POST['type']);else echo $_POST['type'];?></span>
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
      <?php
      $record=0;
                            while($blog_posts->have_posts()) {
                                $blog_posts->the_post(); 

                                $values= get_fields();
                                
                                if($values)
                                {
                                    $university_type=''; 
                                    $location='';  
                                    $category_of_fellowship='';

                                    $type_of_fellowship=''; 
                                    $fellowship_name='';  
                                    $fellowship_authority='';

                                    $fellowship_description=''; 
                                    $application_link='';  
                                    
                                    $logo=''; 

                                    foreach($values as $key => $value)
                                    {
                                        if($key=='university_type'){ $university_type = $value; }
                                        if($key=='location'){ $location = $value;  }
                                        if($key=='category_of_fellowship'){ $category_of_fellowship = $value;  }

                                        if($key=='type_of_fellowship'){ $type_of_fellowship = $value; }
                                        if($key=='fellowship_name'){ $fellowship_name = $value;  }
                                        if($key=='fellowship_authority'){ $fellowship_authority = $value;  }

                                        if($key=='fellowship_description'){ $fellowship_description = $value; }
                                        if($key=='application_link'){ $application_link = $value;  }
                                    
                                        if($key=='logo'){ $logo = $value;  }
                                        
                                    }
                                }

            /*if(((isset($_POST) && 
              ($_POST['location']==$location or $_POST['location']=='' or (is_array($_POST['location']) && in_array($location,$_POST['location'])))
              && ($_POST['category']==$category_of_fellowship or $_POST['category']=='' or (is_array($_POST['category']) && in_array($category_of_fellowship,$_POST['category'])))
              && ($_POST['type']==$type_of_fellowship or $_POST['type']=='' or (is_array($_POST['type']) && in_array($type_of_fellowship,$_POST['type'])))
              && (($_POST['keyword']!='' && (strpos($location, $_POST['keyword']) !== false or strpos($fellowship_name, $_POST['keyword']) !== false or strpos($fellowship_authority, $_POST['keyword']) !== false or strpos($fellowship_description, $_POST['keyword']) !== false or strpos($application_link, $_POST['keyword']) !== false or strpos($category_of_fellowship, $_POST['keyword']) !== false or strpos($type_of_fellowship, $_POST['keyword']) !== false)) or $_POST['keyword']=='')

            ) or !isset($_POST)) && $university_type=='Fellowship'){ */
            $record=$record+1;         
      ?>
              
              
                <div class="nf-know-listing-block">
                  <div class="mentor-table">
                    <div class="nameHeading-five heading">
                      <div class="nf-title-head">
                        <div class="textIcon">
                         
                          <div class="nf-l-img">
                            <img src="<?php //echo get_template_directory_uri(). '/assets/img/study-in-north/university-logo.png'?><?php echo $logo_image;?>" alt="university-logo.png">
                          </div>
                        
                        </div>
                        <h3><?php echo $fellowship_name?> </h3>
                        <p class="text-white mb-0"><?php echo $fellowship_authority?> </p>
                      </div>
                      <div class="nf-location-name">
                        <span><?php echo $location?></span>
                        <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/state-white.png" alt="map">
                      </div>
                    </div>
                    <div class="infoNewAlltabs fellowship-pl">
                      <div class="row">
                        <div class="col-12 col-lg-8 col-xl-9">
                          <h4>Brief of the Fellowship</h4>
                          <p><?php echo $fellowship_description?></p>
                        </div>

                        <div class="col-12 col-lg-4 col-xl-3 pl-0">
                          <div class="nf-type-scolr">
                            <div class="data">
                              <?php if($application_link!=''){?>
                              <p>Application Link</p>
                              <a target="_blank" href="<?php echo $application_link?>" class="nf-visit-portal-btn">Visit Portal</a>
                              <?php }?>
                            </div>
                          </div>
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
      </form>
      <!-- End Study tour in north section  -->
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
    $('.check_category').click(function() {
        $('.check_category').not(this).prop('checked', false);
        document.getElementById("form_id").submit();
    });
});
$(document).ready(function(){
    $('.check_type').click(function() {
        $('.check_type').not(this).prop('checked', false);
        document.getElementById("form_id").submit();
    });
});

</script>