<?php /*Template Name: training details */ ?>
<?php get_header();

if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
  $url = "https://";else $url = "http://";
$url.= $_SERVER['HTTP_HOST'];   
$url.= $_SERVER['REQUEST_URI'];
$url = explode('?',$url);   
$url = explode('&loginerror',$url[1]);  
$title = str_replace('-',' ',$url[0]);

//new line
if(!empty($wp_query->query_vars['flag'])){ $title= $wp_query->query_vars['flag']; $title = str_replace('-',' ',$title);}

//if($title!='') $_POST['keyword'] = $title;
if($title=='Orchid')
{
    $_POST['state']='Arunachal Pradesh';
    $_POST['sectors']='Floriculture';
}
if($title=='Rural Self Employment Training Institute')
{
    $_POST['state']='Assam';
    $_POST['sectors']='Entrepreneurship';
}
if($title=='Rubber')
{
    //$_POST['state']='Arunachal Pradesh';
    $_POST['sectors']='Rubber';
}
if($title=='Sericulture')
{
    $_POST['state']='Assam';
    $_POST['sectors']='Sericulture';
}

$page_data = get_page_by_path( 'training-details' );

?> 
  <!-- header-end -->
  <!-- inner-banner-start -->
  <div class="inner-banner">
    <div class="container">
      <div class="banner-title">
        <h3><?php echo $page_data->post_title;?></h3>
        <ul class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Resources </a></li>
            <li class="breadcrumb-item"><a href="#">Training and Capacity Building </a></li>
          <li class="breadcrumb-item active"><?php echo $page_data->post_title;?></li>
        </ul>
      </div>
      <div class="banner-content">
        <div class="row">
          <?php $url = wp_get_attachment_url( get_post_thumbnail_id($post_id) );?>
          <div class="col-md-4 banner-img pr-0"><img class="nf-height-auto"
              src="<?php echo $url?>"></div>
          <div class="col-md-8  pl-0">
            <div class="bannerbg nf-gradient-14 justify-content-start pt-3 nf-height-100">
              <h4 class="nf-f-size-24"><?php echo $page_data->post_content;?></h4>
              
              <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/know-your-approvals/layers-3.png" alt="linear background" class="nf-layes-bg">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- inner-banner-end -->
  <!-- Study tour in north section  -->
  <form method="post" action="<?php echo site_url()?>/training-details" id="form_id">
  <div class="inner-body">
    <div class="container">
      <div class="row">
        <div class="col-12 col-lg-4 nf-sidebar-c-width">
            
          <?php $var = get_field_object('field_60cc9978f90b7');?>
          <div class="courses-details-sidebar-area search-sidebar nf-sidebar nf-kyal">
            <div class="widget mb-20 widget-padding white-bg">
              <a class="btn-link nf-color-1" data-toggle="collapse" href="#state-filter">
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
              <?php $var = get_field_object('field_60cc9cbc03192');?>
              <a class="btn-link nf-color-2" data-toggle="collapse" href="#department-filter">
                <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entrepreneurship-and-resources/sectorsIcon.png" alt="Sectors"> <span> Sectors (<?php echo count($var['choices']);?>)</span>
              </a>

              <div class="widget-link collapse show" id="state-filter">
                <ul class="sidebar-link">

                  <?php 
                
                  $k=0;
                  foreach($var['choices'] as $choice)
                  {
                    if($_POST['sectors']==$choice) $checked = 'checked'; 
                    else if(is_array($_POST['sectors']) && in_array($choice,$_POST['sectors'])) $checked = 'checked'; 
                    else  $checked = '';
                    echo '
                    <li>
                      <div class="nf-checkbox-wrap">
                        <input class="check_sectors" value="'.$choice.'" type="checkbox" '.$checked.' id="dept_'.$k.'" name="sectors[]">
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
if(!empty($_POST['sectors']))
  {

    if(!is_array($_POST['sectors'])) $_POST['sectors']=[$_POST['sectors']];
    
    $sts_dept = array(
                  'key'     =>  'sectors',
                  'value'    =>  $_POST['sectors'],
                  'compare'  => 'IN'
              );

  }
  if(!empty($_POST['state']))
  {
    if(!is_array($_POST['state'])) $_POST['state']=[$_POST['state']];

    $sts = array(
                  'key'     =>  'state',
                  'value'    =>  $_POST['state'],
                  'compare'  => 'IN'
              );
  }
  if($_POST['keyword']!='')
  {
    $keyw = array(
        'relation' => 'OR',
        array(
            'key'     =>  'title',
                  'value'    =>  $_POST['keyword'],
                  'compare'  => 'LIKE'
        ),
        array(
            'key'     =>  'website_link',
                  'value'    =>  $_POST['keyword'],
                  'compare'  => 'LIKE'
        ),
        array(
            'key'     =>  'state',
                  'value'    =>  $_POST['keyword'],
                  'compare'  => 'LIKE'
        ),
        array(
            'key'     =>  'sectors',
                  'value'    =>  $_POST['keyword'],
                  'compare'  => 'LIKE'
        ),
    );
  }

      $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

                  $blog_args = array(
                                        'post_type' => 'training',
                                        'post_status' => 'publish',
                                        'posts_per_page' => 10,
                                        'paged' => $paged, 
                                            'meta_query'     =>  array(
                                              array(
                                                  'relation' => 'AND',
                                                  $sts,
                                                  $sts_dept,
                                                  $keyw
                                                )
                                            )
                                
                                        );

                  $blog_posts = new WP_Query($blog_args);
                                        

                  $tot_blog_args = array(
                            'post_type' => 'training',
                            'post_status' => 'publish',
                            'posts_per_page' => -1,
                            'meta_query'     =>  array(
                              array(
                                  'relation' => 'AND',
                                  $sts,
                                  $sts_dept,
                                  $keyw
                                )
                            )
                            );
      $tot_blog_posts = new WP_Query($tot_blog_args);
                                       // echo "<pre>";
                                        //print_r($tot_blog_posts);
                  ?>
       
       
        <div class="col-12 col-lg-8 nf-listing-c-width">

           <?php if(!empty($_POST['state']) or !empty($_POST['dept']) or !empty($_POST['educ']) or !empty($_POST['level'])){?>
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
            <?php if(!empty($_POST['sectors'])){?>
         <div class="col-12 col-lg-6">
                <a href="#">
                  <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/department.png" class="nf-w-t2">
                  <span><?php if(is_array($_POST['sectors'])) echo Implode(',<br>',$_POST['sectors']);else echo $_POST['sectors'];?></span>
                </a>
              </div>
              <?php }?>
          
            </div> 
          </div>
      <?php }?>

          <div class="nf-top-filter-wrap">
            <h2 class="nf-f-size-20 nf-strong mb-0">Total Results (<span id="totcount"><?php echo $tot_blog_posts->post_count;?></span>)</h2>
            <div class="nf-search-form">
              <input placeholder="Search here" name="keyword" type="text" value="<?php echo $_POST['keyword']?>">
              <button type="submit">
                <i class="ti-search"></i>
              </button>
            </div>
          </div>
          <div class="nf-know-listing-block">
           
            <?php
                  $record=0;
                            while($blog_posts->have_posts()) {
                                $blog_posts->the_post(); 

                                $values= get_fields();
                                
                                if($values)
                                {
                                    $title=''; 
                                    $training_area='';  
                                    $address='';

                                    $contact=''; 
                                    $website_link='';  
                                    $sectors=''; 
                                    $state=''; 
                                    

                                    foreach($values as $key => $value)
                                    {
                                        if($key=='title'){ $title = $value; }
                                        if($key=='training'){ $training_area = $value;  }
                                        if($key=='address'){ $address = $value;  }

                                        if($key=='contact_details'){ $contact = $value; }
                                        if($key=='website_link'){ $website_link = $value;  }
                                        if($key=='state'){ $state = $value;  }
                                        if($key=='sectors'){ $sectors = $value;  }
                                       
                                        
                                    }
                                }

            /*if(((isset($_POST) && 
              ($_POST['state']==$state or $_POST['state']=='' or (is_array($_POST['state']) && in_array($state,$_POST['state'])))
              && ($_POST['sectors']==$sectors or $_POST['sectors']=='' or (is_array($_POST['sectors']) && in_array($sectors,$_POST['sectors'])))
              

               && (($_POST['keyword']!='' && (strpos($title, $_POST['keyword']) !== false or strpos($training_area, $_POST['keyword']) !== false or strpos($state, $_POST['keyword']) !== false or strpos($contact, $_POST['keyword']) !== false)) or $_POST['keyword']=='')

            ) or !isset($_POST))){ */
            $record=$record+1;         
      ?>

            <div class="nf-cart mt-4">
              <div class="nf-cart-header tr-cap-builHeader">
                <div class="nf-left-content">

                  <div class="nf-l-title">
                    <h3><?php echo $title; ?></h3>
                  </div>
                </div>
                <div class="nf-location-name widthNone">
                  <span><?php echo $state; ?></span>
                  <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entrepreneurship-and-resources/map.png" alt="map">
                </div>
              </div>
              <div class="tr-cap-buil-cart-body">
                <div class="row">
                  <div class="col-12 col-lg-12">
                    <div class="tr-cap-builInfo">
                      <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entrepreneurship-and-resources/training-areasIcon.png" alt="training-areasIcon">
                      <h4><span>Training Areas</span></h4>

                    </div>
                    <div class="tr-cap-builInfoText">
                      <p><?php echo $training_area; ?></p>
                    </div>
                  </div>

                  <div class="contectTr-cap-buil">
                    <div class="tr-cap-buil-cart-body">
                      <div class="row">
                        <div class="col-12 col-lg-12">
                          <div class="contectTrInfo">
                            <ul>
                              <li class="addressIcon">Address
                                <span><?php if($address!='') echo $address; else echo '-'; ?></span>
                              </li>
                              <li class="callIcon">Contact Details
                                <span><?php if($contact!='') echo $contact; else echo '-'; ?></span>
                              </li>
                              <li class="mailIcon">Website Link
                                <span>
								<?php if($website_link!=''){?>
								<a href="<?php echo $website_link; ?>"><?php echo $website_link; ?></a>
								<?php }else{ echo '-'; }?>
								</span>
                              </li>
                            </ul>
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
 

            
          
          </div>
          <?php
                          if($record==0) echo 'No Record Found.';
                          // Step  3 : Call the Pagination Function Here  
                            if (function_exists("cpt_pagination")) {
                             cpt_pagination($blog_posts->max_num_pages); 
                            }
                          ?>
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

$(document).ready(function(){
    $('.check_state').click(function() {
        $('.check_state').not(this).prop('checked', false);
        document.getElementById("form_id").submit();
    });
});

$(document).ready(function(){
    $('.check_sectors').click(function() {
        $('.check_sectors').not(this).prop('checked', false);
        document.getElementById("form_id").submit();
    });
});

document.body.scrollTop = 500;
document.documentElement.scrollTop = 500;


$( ".page-link" ).click(function() {
  $('#form_id').attr('action',this.href); 
  $( "#form_id" ).submit();
  //alert(this.href);
  return false;
});
</script>