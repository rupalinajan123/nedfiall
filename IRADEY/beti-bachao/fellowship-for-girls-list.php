<?php /* Template Name: Fellowship for Girls List */
 ?>
<?php get_header(); 

$category_id = get_cat_ID ('Fellowship for Girls');
$categories = get_category( $category_id );

//echo '<pre>';
//print_r($_POST);
//exit;
if($_POST['dept_all']!='') $_POST['dept']=$_POST['dept_all'];
if($_POST['state_all']!='') $_POST['state']=$_POST['state_all'];

$page_data = get_page_by_path( 'fellowship-for-girls-list' );
$logo_image = get_field( "university_logo", $page_data->ID );

?>
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
    <form method="post" action="<?php echo site_url()?>/fellowship-for-girls-list" id="form_id">
    <div class="inner-body">
      <div class="container">
        <div class="row">
          
          <div class="col-12 col-lg-4 nf-sidebar-c-width">
            
            <div class="courses-details-sidebar-area search-sidebar nf-sidebar">
              <div class="widget mb-20 widget-padding white-bg">
                <?php $var = get_field_object('field_610cd5d47a2b9');?>
                <a class="btn-link nf-color-1" data-toggle="collapse" href="#state-filter">
                  <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/state-white.png" alt="state-white"> <span> Region (<?php echo count($var['choices']);?>) </span></a>
                  <div class="widget-link collapse show" id="state-filter">
                    <ul class="sidebar-link">

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
                              <input class="check_region" value="'.$choice.'" type="checkbox" '.$checked.' id="region_'.$k.'" name="region[]">
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
        if(!empty($_POST['region']) )
              {
                if(!is_array($_POST['region'])) $_POST['region']=[$_POST['region']];
                $sts_state = array(
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
				'meta_value'  => 'Fellowship for Girls',
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
                $return_department[]=$values['category_of_fellowship'];
            }
          }

          $return_department = array_filter(array_unique($return_department));
          if(!empty($_POST['category_of_fellowship']) && !in_array($_POST['category_of_fellowship'], $return_department)) $_POST['category_of_fellowship']='';
          wp_reset_query();
        //=======ajax end
				  
				  $var = get_field_object('field_6110f78f2543f');?>
                  <a class="btn-link nf-color-5" data-toggle="collapse" href="#Study-filter">
                    <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/education/fellowship.png" alt="fellowship"> <span> Category of Fellowship (<?php echo count($return_department);?>)</span>
                  </a>
                  <div class="widget-link collapse show" id="Study-filter">
                    <ul class="sidebar-link">
                      <?php 
                        
                        $k=0;
                        sort($return_department);
                        foreach($return_department as $choice)
                        {
                          if($_POST['category_of_fellowship']==$choice) $checked = 'checked'; 
                          else if(is_array($_POST['category_of_fellowship']) && in_array($choice,$_POST['category_of_fellowship'])) $checked = 'checked'; 
                          else  $checked = ''; 
                          echo '
                          <li>
                            <div class="nf-checkbox-wrap">
                              <input class="check_category_of_fellowship" value="'.$choice.'" type="checkbox" '.$checked.' id="category_of_fellowship_'.$k.'" name="category_of_fellowship">
                              <label for="category_of_fellowship_'.$k.'">'.$choice.'</label>
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
                              <input class="check_type" value="'.$choice.'" type="checkbox" '.$checked.' id="type_'.$k.'" name="type[]" onclick="javascript:this.form.submit()">
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
  //print_r($_POST['region']);
  if(!empty($_POST['region']) )
  {
    if(!is_array($_POST['region'])) $_POST['region'] = [$_POST['region']];

    $sts_region = array(
                  'key'     =>  'region',
                  'value'    =>  $_POST['region'],
                  'compare'  => 'IN'
              );
  }
  
  if(!empty($_POST['category_of_fellowship']))
  {
    if(!is_array($_POST['category_of_fellowship'])) $_POST['category_of_fellowship']=[$_POST['category_of_fellowship']];

    $sts_dept = array(
                  'key'     =>  'category_of_fellowship',
                  'value'    =>  $_POST['category_of_fellowship'],
                  'compare'  => 'IN'
              );
  }
  if(!empty($_POST['type_of_fellowship']))
  {
    if(!is_array($_POST['type_of_fellowship'])) $_POST['type_of_fellowship']=[$_POST['type_of_fellowship']];

    $sts = array(
                  'key'     =>  'type_of_fellowship',
                  'value'    =>  $_POST['type_of_fellowship'],
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
                            'post_type' => 'beti_bachao',
                            'post_status' => 'publish',
                            'meta_key'    => 'category',
                            'meta_value'  => 'Fellowship for Girls',
                            'posts_per_page' => 10,
                            'paged' => $paged, 
                            'meta_query'     =>  array(
                              array(
                                  'relation' => 'AND',
                                  $sts,
                                  $sts_dept,
                                  $sts_region,
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
                            'meta_value'  => 'Fellowship for Girls',
                            'posts_per_page' => -1,
                            'meta_query'     =>  array(
                              array(
                                  'relation' => 'AND',
                                  $sts,
                                  $sts_dept,
                                  $sts_region,
                                  $keyw
                                )
                            )
                            );
      $tot_blog_posts = new WP_Query($tot_blog_args);
      ?>


            <div class="col-12 col-lg-8 nf-listing-c-width">

          <?php if(!empty($_POST['region']) or !empty($_POST['category_of_fellowship']) or !empty($_POST['type_of_fellowship'])){?>
      <div class="nf-state-listing-block">
             <div class="row">
              <?php if(!empty($_POST['region'])){?>
              <div class="col-12 col-lg-4">
                <a href="#">
                  <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/know-your-approvals/state.png" class="nf-w-t1">
                  <span><?php if(is_array($_POST['region'])) echo Implode(',<br>',$_POST['region']);else echo $_POST['region'];?></span>
                </a>
              </div>
            <?php }?>
            <?php if(!empty($_POST['category_of_fellowship'])){?>
         <div class="col-12 col-lg-4">
                <a href="#">
                  <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/department.png" class="nf-w-t2">
                  <span><?php if(is_array($_POST['category_of_fellowship'])) echo Implode(',<br>',$_POST['category_of_fellowship']);else echo $_POST['category_of_fellowship'];?></span>
                </a>
              </div>
              <?php }?>
              
              <?php if(!empty($_POST['type_of_fellowship'])){?>
         <div class="col-12 col-lg-4">
                <a href="#">
                  <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/choices.png" class="nf-w-t2">
                  <span><?php if(is_array($_POST['type_of_fellowship'])) echo Implode(',<br>',$_POST['type_of_fellowship']);else echo $_POST['type_of_fellowship'];?></span>
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
                                    $category=''; 
                                    $region='';  
                                    $category_of_fellowship='';

                                    $type_of_fellowship=''; 
                                    $fellowship_name='';  
                                    $fellowship_authority='';

                                    $fellowship_description=''; 
                                    $portal__application___website__link='';  
                                    
                                   

                                    foreach($values as $key => $value)
                                    {
                                        if($key=='category'){ $category = $value; }
                                        if($key=='region'){ $region = $value;  }
                                        if($key=='category_of_fellowship'){ $category_of_fellowship = $value;  }

                                        if($key=='type_of_fellowship'){ $type_of_fellowship = $value; }
                                        if($key=='fellowship_name'){ $fellowship_name = $value;  }
                                        if($key=='fellowship_authority'){ $fellowship_authority = $value;  }

                                        if($key=='fellowship_description'){ $fellowship_description = $value; }
                                        if($key=='portal__application___website__link'){ $portal__application___website__link = $value;  }
                                    
                                        if($key=='logo'){ $logo = $value;  }
                                        
                                    }
                                }

            /*if(((isset($_POST) && 
              ($_POST['region']==$region or $_POST['region']=='' or (is_array($_POST['region']) && in_array($region,$_POST['region'])))
              && ($_POST['category']==$category_of_fellowship or $_POST['category']=='' or (is_array($_POST['category']) && in_array($category_of_fellowship,$_POST['category'])))
              && ($_POST['type']==$type_of_fellowship or $_POST['type']=='' or (is_array($_POST['type']) && in_array($type_of_fellowship,$_POST['type'])))
              && (($_POST['keyword']!='' && (strpos($region, $_POST['keyword']) !== false or strpos($fellowship_name, $_POST['keyword']) !== false or strpos($fellowship_authority, $_POST['keyword']) !== false or strpos($fellowship_description, $_POST['keyword']) !== false or strpos($application_link, $_POST['keyword']) !== false or strpos($category_of_fellowship, $_POST['keyword']) !== false or strpos($type_of_fellowship, $_POST['keyword']) !== false)) or $_POST['keyword']=='')

            ) or !isset($_POST)) && $category=='Fellowship'){ */
            $record=$record+1;         
      ?>
              
              
                <div class="nf-know-listing-block">
                  <div class="mentor-table">
                    <div class="nameHeading-five heading">
                      <div class="nf-title-head">
                        <div class="textIcon">
                         
                          <div class="nf-l-img">
                            <img src="<?php echo $logo_image;?>" alt="university-logo.png">
                          </div>
                        
                        </div>
                        <h3><?php echo $fellowship_name?> </h3>
                        <p class="text-white mb-0"><?php echo $fellowship_authority?> </p>
                      </div>
                      <div class="nf-location-name">
                        <span><?php echo $region?></span>
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
                              <p>Application Link</p>
                              <a target="_blank" href="<?php echo $portal__application___website__link?>" class="nf-visit-portal-btn">Visit Portal</a>
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
    $('.check_region').click(function() {
        $('.check_region').not(this).prop('checked', false);
        document.getElementById("form_id").submit();
    });
});
$(document).ready(function(){
    $('.check_category_of_fellowship').click(function() {
        $('.check_category_of_fellowship').not(this).prop('checked', false);
        document.getElementById("form_id").submit();
    });
});
$(document).ready(function(){
    $('.check_type_of_fellowship').click(function() {
        $('.check_type_of_fellowship').not(this).prop('checked', false);
        document.getElementById("form_id").submit();
    });
});

</script>