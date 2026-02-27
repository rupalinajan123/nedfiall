<?php /*Template Name: Find an Intern Details */ 

if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
  $url = "https://";else $url = "http://";
$url.= $_SERVER['HTTP_HOST'];   
$url.= $_SERVER['REQUEST_URI'];
$url = explode('?',$url);   
$url = explode('&loginerror',$url[1]);  
$title = str_replace('-',' ',$url[0]);
//if(!empty($title)){ $_POST['keyword'] = $title; }

//new line
if(!empty($wp_query->query_vars['flag'])){ $title= $wp_query->query_vars['flag']; $title = str_replace('-',' ',$title);}

?>
<?php get_header(); 


$page_data = get_page_by_path( 'find-an-intern-details' );
$qucklinkheading1 = get_field('quick_links_1', $page_data->post_id);
$qucklinkheading2 = get_field('quick_links_2', $page_data->post_id);
$qucklinkheading3 = get_field('quick_links_3', $page_data->post_id);
$qucklinkheading4 = get_field('quick_links_4', $page_data->post_id);

$logo_image = get_field( "logo", $page_data->ID );
?>

<!-- header-end -->
<!-- inner-banner-start -->
<div class="inner-banner">
<div class="container">
<div class="banner-title">
  <h3><?php echo $page_data->post_title;?> <!-- <a href="#" class="changeTopic">Change Exam</a> --></h3>
  <ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Employment</a></li>
    <li class="breadcrumb-item">Internships</li>
    <li class="breadcrumb-item active"><?php echo $page_data->post_title;?></li>
  </ul>
</div>
<div class="banner-content">
  <div class="row">
    <?php $url = wp_get_attachment_url( get_post_thumbnail_id($post_id) );?>
    <div class="col-md-4 banner-img pr-0"><img src="<?php echo $url?>"></div>
    <div class="col-md-8  pl-0">
      <div class="bannerbg nf-gradient-e-1 justify-content-start pt-3 nf-height-100">
        <h4 class="nf-f-size-24"><?php echo $page_data->post_title;?></h4>
        <h5><?php echo $page_data->post_content;?></h5>
        
      </div>
    </div>
  </div>
</div>
</div>
</div>
<!-- inner-banner-end -->
<!-- Study tour in north section  -->
<form method="post" action="<?php echo site_url()?>/find-an-intern-details" id="form_id">
<div class="inner-body">
<div class="container">
<div class="row">
  <div class="col-12 col-lg-4 nf-sidebar-c-width">
    
    <div class="courses-details-sidebar-area search-sidebar nf-sidebar">
      <div class="widget mb-20 widget-padding white-bg">
        <a class="btn-link nf-color-1" data-toggle="collapse" href="#state-filter">
          <?php $var = get_field_object('field_60d6c3e559268');?>
          <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/state-white.png" alt="state-white"> <span> State (<?php echo count($var['choices']);?>) </span></a>
          <div class="widget-link collapse show" id="state-filter">
            <ul class="sidebar-link">

              <?php 
                      
                      
                        $k=0;
                        sort($var['choices']);
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
          <?php $var = get_field_object('field_60d6c40359269');?>
          <a class="btn-link nf-color-2" data-toggle="collapse" href="#department-filter">
            <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/department.png" alt="department"> <span>  Industry (<?php echo count($var['choices']);?>)</span>
          </a>
          <div class="widget-link collapse show" id="department-filter">
            <ul class="sidebar-link">
              <?php 
                
                  $k=0;
                  sort($var['choices']);
                  foreach($var['choices'] as $choice)
                  {
                    if($_POST['dept']==$choice) $checked = 'checked'; 
                    else if(is_array($_POST['dept']) && in_array($choice,$_POST['dept'])) $checked = 'checked'; 
                    else if($choice==$title) $checked = 'checked'; 
                    else  $checked = '';
                    echo '
                    <li>
                    
                      <div class="nf-checkbox-wrap">
                        <input class="check_dept" value="'.$choice.'" type="checkbox" '.$checked.' id="dept_'.$k.'" name="dept[]">
                        <label for="dept_'.$k.'">'.$choice.'</label>
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
    if(!empty($_POST['state']))
  {

    if(!is_array($_POST['state'])) $_POST['state']=[$_POST['state']];
    
    $sts_dept = array(
                  'key'     =>  'state',
                  'value'    =>  $_POST['state'],
                  'compare'  => 'IN'
              );

  }
  if(!empty($_POST['dept']))
  {
    if(!is_array($_POST['dept'])) $_POST['dept']=[$_POST['dept']];

    $sts = array(
                  'key'     =>  'department',
                  'value'    =>  $_POST['dept'],
                  'compare'  => 'IN'
              );
  }
  
  if(!empty($title))
  {
    /*$title_arr = array(
                  'key'     =>  'name_of_the_organization',
                  'value'    =>  $title,
                  'compare'  => '='
              );*/

          $title_arr = array(
            'relation' => 'OR',
            array(
                'key'     =>  'name_of_the_organization',
                      'value'    =>  $title,
                      'compare'  => '='
            ),
            array(
                'key'     =>  'department',
                      'value'    =>  $title,
                      'compare'  => '='
            ),
            
            
        );          
  }
  
  if($_POST['keyword']!='')
  {
    $keyw = array(
        'relation' => 'OR',
        array(
            'key'     =>  'name_of_the_organization',
                  'value'    =>  $_POST['keyword'],
                  'compare'  => 'LIKE'
        ),
        array(
            'key'     =>  'type_of_entity',
                  'value'    =>  $_POST['keyword'],
                  'compare'  => 'LIKE'
        ),
        array(
            'key'     =>  'industry_location',
                  'value'    =>  $_POST['keyword'],
                  'compare'  => 'LIKE'
        ),
        array(
            'key'     =>  'stipend_range',
                  'value'    =>  $_POST['keyword'],
                  'compare'  => 'LIKE'
        ),
        array(
            'key'     =>  'state',
                  'value'    =>  $_POST['keyword'],
                  'compare'  => 'LIKE'
        ),
        array(
            'key'     =>  'type',
                  'value'    =>  $_POST['keyword'],
                  'compare'  => 'LIKE'
        ),
        array(
            'key'     =>  'nature_of_internship',
                  'value'    =>  $_POST['keyword'],
                  'compare'  => 'LIKE'
        ),
        array(
            'key'     =>  'application_details',
                  'value'    =>  $_POST['keyword'],
                  'compare'  => 'LIKE'
        ),
        array(
            'key'     =>  'department',
                  'value'    =>  $_POST['keyword'],
                  'compare'  => 'LIKE'
        ),
    );
  }
      $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
      $blog_args = array(
                            'post_type' => 'hire_an_intern',
                            'post_status' => 'publish',
                            'posts_per_page' => 10,
                            'paged' => $paged, 
                                'meta_query'     =>  array(
                                  array(
                                      'relation' => 'AND',
                                      $sts,
                                      $sts_dept,
                                      $keyw,
                                      $title_arr
                                    )
                                )
                            );

      $blog_posts = new WP_Query($blog_args);
                            //echo "<pre>";
                            //print_r($blog_posts);

      $tot_blog_args = array(
                            'post_type' => 'hire_an_intern',
                            'post_status' => 'publish',
                            'posts_per_page' => -1,
                            'meta_query'     =>  array(
                              array(
                                  'relation' => 'AND',
                                  $sts,
                                  $sts_dept,
                                  $keyw,
                                  $title_arr
                                )
                            )
                            );
      $tot_blog_posts = new WP_Query($tot_blog_args);
      ?>
    <div class="col-12 col-lg-8 nf-listing-c-width">
        <?php if(!empty($_POST['state']) or !empty($_POST['dept'])){?>
      <div class="nf-state-listing-block">
             <div class="row">
              <?php if(!empty($_POST['state'])){?>
              <div class="col-12 col-lg-6">
                <a href="#">
                  <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/know-your-approvals/state.png" class="nf-w-t1">
                  <span><?php if(is_array($_POST['state'])) echo Implode(',<br>',$_POST['state']);else echo $_POST['state'];?></span>
                </a>
              </div>
            <?php }?>
            <?php if(!empty($_POST['dept'])){?>
         <div class="col-12 col-lg-6">
                <a href="#">
                  <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/department.png" class="nf-w-t2">
                  <span><?php if(is_array($_POST['dept'])) echo Implode(',<br>',$_POST['dept']);else echo $_POST['dept'];?></span>
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

      <?php
      $record=0;

                            while($blog_posts->have_posts()) {

                                $blog_posts->the_post(); 

                                $values= get_fields();

                                
                                if($values)
                                {

                                  $name_of_the_organization='';
                                    $department=''; 
                                    $state=''; 
                                     
                                    $type_of_entity=''; 
                                    $location=''; 
                                    $stipend_range=''; 
                                    $type=''; 
                                    $nature_of_internship=''; 
                                    $last_date_of_application=''; 
                                    $duration=''; 
                                    $application_details=''; 
                                    $duration_start_date='';
                                    $$duration_end_date='';
                                    $industry='';

                                    foreach($values as $key => $value)
                                    {
                                        if($key=='name_of_the_organization'){ $name_of_the_organization = $value; }
                                        if($key=='department'){ $department = $value; }
                                        if($key=='state'){ $state = $value;  }
                                       

                                        if($key=='type_of_entity'){ $type_of_entity = $value; }
                                        if($key=='industry_location'){ $location = $value; }
                                        if($key=='industry'){ $industry = $value; }
                                        if($key=='stipend_range'){ $stipend_range = $value; }
                                        if($key=='type'){ $type = $value; }
                                        if($key=='nature_of_internship'){ $nature_of_internship = $value; }
                                        if($key=='last_date_of_application'){ $last_date_of_application = $value; }
                                        if($key=='duration'){ $duration = $value; }
                                        if($key=='application_details'){ $application_details = $value; }

                                        if($key=='duration_start_date'){ $duration_start_date = $value; }
                                        if($key=='duration_end_date'){ $duration_end_date = $value; }
                                        
                                        
                                    }
                                }

                                

            /*if(((isset($_POST) && 
              ($_POST['state']==$state or $_POST['state']=='' or (is_array($_POST['state']) && in_array($state,$_POST['state'])))
              && ($_POST['dept']==$department or $_POST['dept']=='' or (is_array($_POST['dept']) && in_array($department,$_POST['dept'])))

              && (($_POST['keyword']!='' && (strpos($post->post_title, $_POST['keyword']) !== false or strpos($name_of_the_organization, $_POST['keyword']) !== false or strpos($type_of_entity, $_POST['keyword']) !== false or strpos($location, $_POST['keyword']) !== false or strpos($state, $_POST['keyword']) !== false or strpos($stipend_range, $_POST['keyword']) !== false or strpos($type, $_POST['keyword']) !== false or strpos($nature_of_internship, $_POST['keyword']) !== false or  strpos($application_details, $_POST['keyword']) !== false or strpos($department, $_POST['keyword']) !== false)) or $_POST['keyword']=='')
              

            ) or !isset($_POST)) ){ */
            $record=$record+1;  



            $date1 = date_create(date('Y-m-d',strtotime($duration_start_date)));
            $date2 = date_create(date('Y-m-d',strtotime($duration_end_date))); 
            $diff = date_diff($date1,$date2); 
            $duration = $diff->format("%a").' Days';

            //$ts1 = strtotime($duration_start_date);
            //$ts2 = strtotime($duration_end_date);
            //$year1 = date('Y', $ts1);
            //$year2 = date('Y', $ts2);
            //$month1 = date('m', $ts1);
            //$month2 = date('m', $ts2);
            //$duration = (($year2 - $year1) * 12) + ($month2 - $month1).' Month';       
      ?>

      <div class="nf-top-result-list">
        <div class="nf-cart">
          <div class="nf-cart-header">
            <div class="nf-left-content">
              <div class="nf-l-img">
                <img src="<?php echo $logo_image; ?>">
              </div>
              <div class="nf-l-title">
                <h3><?php echo $name_of_the_organization; ?></h3>
                <p><?php echo $type_of_entity; ?></p>
              </div>
            </div>
            <div class="nf-location-name">
              <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/map.png" alt="map">
              <span><?php echo $state; ?></span>
            </div>
          </div>
          <div class="nf-cart-body nf-employment-listing pb-5">
            <div class="row">
              <div class="col-12 col-lg-6">
                <div class="nf-listing">
                  <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/employment/icon-1.png" alt="employment icon 1">
                  <h4><span>Location</span><?php echo $location; ?></h4>
                </div>
                <div class="nf-listing">
                  <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/employment/icon-6.png" alt="employment icon 6">
                  <h4><span>Type</span><?php echo $type; ?></h4>
                </div>
                <div class="nf-listing">
                  <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/employment/icon-4.png" alt="employment icon 4">
                  <h4><span class="">Last Date of Application</span> <?php echo $last_date_of_application; ?></h4>
                </div>

                 
                  

                         <div class="nf-listing">
                          <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/employment/icon-5.png" alt="employment icon 5">
                          <h4><span class="">Application Link</span> <a href="<?php echo $application_details; ?>" target="_blank"><?php echo $application_details; ?></a></h4>
                        </div> 
                
               

               
              </div>
              <div class="col-12 col-lg-6">
                <div class="nf-listing">
                  <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/employment/icon-7.png" alt="employment icon 7">
                  <h4><span>Industry</span><?php echo $department;//$stipend_range; ?></h4>
                </div>
                <div class="nf-listing">
                  <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/employment/icon-2.png" alt="employment icon 2">
                  <h4><span>Nature of Internship</span><?php echo $nature_of_internship; ?></h4>
                </div>
                <div class="nf-listing">
                  <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/employment/icon-3.png" alt="employment icon 3">
                  <h4><span>Duration</span><?php echo $duration; ?></h4>
                </div>
                
                <div class="nf-listing">
                <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/employment/icon-5.png" alt="employment icon 5">
                <input type="hidden" id="copylink<?php echo $record?>" value="<?php echo site_url()?>/find-an-intern-details/?<?php echo str_replace(' ','-',$name_of_the_organization)?>">
                <h4><span class="">Copy Link</span> <a href="javascript:void(0)" title="Copy Link" onclick="copyLinkFunction('<?php echo $record?>')">Copy this Internship </a></h4>
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
    <div>&nbsp;</div>
    <div class="nf-product-block nf-quick-block-wrap nf-quick-wrap-2">
              <h4 class="nf-f-size-20 nf-strong">Quick Links </h4>
              <div class="clat-carrer-slider vm-training-slider">
			  <?php if($qucklinkheading1['quick_link_heading']!=''){?>
                <a class="item grd-bg1" href="<?php echo $qucklinkheading1['quick_link_url'];?>" ><?php echo $qucklinkheading1['quick_link_heading'];?></a>
			  <?php }?>
				<?php if($qucklinkheading2['quick_link_heading']!=''){?>
                <a class="item grd-bg2" href="<?php echo $qucklinkheading2['quick_link_url'];?>" ><?php echo $qucklinkheading2['quick_link_heading'];?></a>
			  <?php }?>
				<?php if($qucklinkheading3['quick_link_heading']!=''){?>
                <a class="item grd-bg3" href="<?php echo $qucklinkheading3['quick_link_url'];?>" ><?php echo $qucklinkheading3['quick_link_heading'];?></a>
			  <?php }?>
				<?php if($qucklinkheading4['quick_link_heading']!=''){?>
                <a class="item grd-bg4" href="<?php echo $qucklinkheading4['quick_link_url'];?>" ><?php echo $qucklinkheading4['quick_link_heading'];?></a>
			  <?php }?>
              </div>
            </div>
    </div>
  </div>
</div>
</div>
</form>
<!-- End Study tour in north section  -->
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


function copyLinkFunction(id) {
  /* Get the text field */

  var videoLink = document.getElementById("copylink"+id);

  videoLink.setAttribute('type','text');

  /* Select the text field */
  videoLink.select();
  //videoLink.setSelectionRange(0, 99999); /* For mobile devices */
//alert(id);
/* Copy the text inside the text field */
document.execCommand("copy");

videoLink.setAttribute('type','hidden');

/* Alert the copied text */
  //alert("Copied the text: " + videoLink.value);
  Swal.fire(
    'Link Copied',
    videoLink.value,
    'success'
    )
}

</script>