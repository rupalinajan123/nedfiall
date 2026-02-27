<?php /*Template Name: Market Support Details */ ?>
<?php get_header();

if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
  $url = "https://";else $url = "http://";
$url.= $_SERVER['HTTP_HOST'];   
$url.= $_SERVER['REQUEST_URI'];
$url = explode('?',$url);   
$url = explode('&loginerror',$url[1]);  
$title1 = str_replace('-',' ',$url[0]);

//new line
if(!empty($wp_query->query_vars['flag'])){ $title1= $wp_query->query_vars['flag']; $title1 = str_replace('-',' ',$title1);}

if($title1=='Cold Chain Storage')
{
    $_POST['state'] = 'Assam';
    $_POST['infrastructure']=$title1;
}
if($title1=='Export Promotion Park')
{
    $_POST['state'] = 'Meghalaya';
    $_POST['infrastructure']=$title1;
}
if($title1=='Food Park')
{
    $_POST['state'] = 'Mizoram';
    $_POST['infrastructure']=$title1;
}


$page_data = get_page_by_path( 'market-support-infrastructure-details' );
$logo_image = get_field( "logo", $page_data->ID );
// echo '<pre>';
// print_r($logo_image);
// exit;
?>
  <!-- header-end -->
</div>
</header>
<!-- header-end -->
<!-- inner-banner-start -->
<div class="inner-banner">
  <div class="container">
    <div class="banner-title">
      <h3><?php echo $page_data->post_title;?></h3> 
      <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Entrepreneurship  </a></li>
        <li class="breadcrumb-item active">Market Support & Infrastructure</li>
        <li class="breadcrumb-item active"><?php echo $page_data->post_title;?></li>
      </ul>
    </div>
    <div class="banner-content">
      <div class="row">
        <?php $url = wp_get_attachment_url( get_post_thumbnail_id($post_id) );?>
        <div class="col-md-4 banner-img pr-0"><img src="<?php echo $url?>"></div>
        <div class="col-md-8  pl-0">
          <div class="bannerbg nf-bluebg justify-content-start pt-3 nf-height-100">
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
<form method="post" action="<?php echo site_url()?>/market-support-infrastructure-details" id="form_id">
<div class="inner-body">
  <div class="container">
    <div class="row">
      <div class="col-12 col-lg-4 nf-sidebar-c-width">
        <div class="courses-details-sidebar-area search-sidebar nf-sidebar">
          <div class="widget mb-20 widget-padding white-bg">
            <?php $var = get_field_object('field_60d5da2e639d3'); ?>
            <a class="btn-link nf-color-1" data-toggle="collapse" href="#state-filter">
              <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/state-white.png" alt="state-white"> <span> State (<?php echo count($var['choices'])?>)</span></a>
              <div class="widget-link collapse show" id="state-filter">
                <ul class="sidebar-link nf-sidebar-scroll">
                  
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
              <?php
              //ajax start
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
              'post_type' => 'resource_infra',
                'post_status' => 'publish',
                'posts_per_page' => -1,
                'meta_key'    => 'type',
                'meta_value'  => 'Industry Infrastructure',
                'meta_query'     =>  array(
                              array(
                                  'relation' => 'AND',
                                  $sts_state
                                )
                            )
            );
            $the_query = new WP_Query( $args );
            $return_infrastructure=array();
           
            if( $the_query->have_posts() ){
              while( $the_query->have_posts() ){ 
                $the_query->the_post(); 
                $values= get_fields();
                $return_infrastructure[]=$values['type_of_infrastructure'];
            }
          }

          $return_infrastructure = array_filter(array_unique($return_infrastructure));
          if(!empty($_POST['infrastructure']) && !in_array($_POST['infrastructure'], $return_infrastructure)) $_POST['infrastructure']='';
          wp_reset_query();
          //ajax end
              ?>
              <a class="btn-link nf-color-2" data-toggle="collapse" href="#department-filter">
                <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/harvesting.png" alt="department"> <span>  Infrastructure (<?php echo count($return_infrastructure);?>)</span>
              </a>
              <div class="widget-link collapse show" id="department-filter">
                <ul class="sidebar-link nf-sidebar-scroll">
                  <?php $var = get_field_object('field_60d5dadb639d4');?>
                    <?php
                      $k=0;
                      sort($return_infrastructure);
                      //foreach($var['choices'] as $choice)
                      foreach($return_infrastructure as $choice)
                      {
                        if($_POST['infrastructure']==$choice) $checked = 'checked'; 
                        else if(is_array($_POST['infrastructure']) && in_array($choice,$_POST['infrastructure'])) $checked = 'checked'; 
                        else  $checked = '';
                        echo '
                        <li>
                          <div class="nf-checkbox-wrap">
                            <input class="check_infrastructure" value="'.$choice.'" type="checkbox" '.$checked.' id="infrastructure_'.$k.'" name="infrastructure">
                            <label for="infrastructure_'.$k.'">'.$choice.'</label>
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
if(!empty($_POST['infrastructure']))
  {

    if(!is_array($_POST['infrastructure'])) $_POST['infrastructure']=[$_POST['infrastructure']];
    
    $sts_dept = array(
                  'key'     =>  'type_of_infrastructure',
                  'value'    =>  $_POST['infrastructure'],
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
            'key'     =>  'infrastructure_name',
                  'value'    =>  $_POST['keyword'],
                  'compare'  => 'LIKE'
        ),
        array(
            'key'     =>  'type_of_infrastructure',
                  'value'    =>  $_POST['keyword'],
                  'compare'  => 'LIKE'
        ),
        array(
            'key'     =>  'state',
                  'value'    =>  $_POST['keyword'],
                  'compare'  => 'LIKE'
        ),
        array(
            'key'     =>  'infrastructure',
                  'value'    =>  $_POST['keyword'],
                  'compare'  => 'LIKE'
        ),
    );
  }

      $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

                  $blog_args = array(
                                        'post_type' => 'resource_infra',
                                        'post_status' => 'publish',
                                        'posts_per_page' => 10,
                                        'paged' => $paged, 
                                            'meta_query'     =>  array(
                                              array(
                                                  'relation' => 'AND',
                                                  array(
                                                        'key'     =>  'type',
                                                        'value'   =>  'Industry Infrastructure'
                                                        ),
                                                  $sts,
                                                  $sts_dept,
                                                  $keyw
                                                )
                                            )
                                
                                        );

                  $blog_posts = new WP_Query($blog_args);
                                        

                  $tot_blog_args = array(
                            'post_type' => 'resource_infra',
                            'post_status' => 'publish',
                            'posts_per_page' => -1,
                            'meta_query'     =>  array(
                              array(
                                  'relation' => 'AND',
                                  array(
                                                        'key'     =>  'type',
                                                        'value'   =>  'Industry Infrastructure'
                                                        ),
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

     <?php if(!empty($_POST['state']) or !empty($_POST['infrastructure'])){?>
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
            <?php if(!empty($_POST['infrastructure'])){?>
         <div class="col-12 col-lg-6">
                <a href="#">
                  <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/harvesting.png" class="nf-w-t2">
                  <span><?php if(is_array($_POST['infrastructure'])) echo Implode(',<br>',$_POST['infrastructure']);else echo $_POST['infrastructure'];?></span>
                </a>
              </div>
              <?php }?>
          
            </div> 
          </div>
      <?php }?>

          <div class="nf-top-filter-wrap">
            <h2 class="nf-f-size-20 nf-strong mb-0">Total Results (<span id="totcount"><?php echo count($tot_blog_posts->posts);?></span>)</h2>
            <div class="nf-search-form">
              <input placeholder="Search here" type="text" name="keyword" value="<?php echo $_POST['keyword']; ?>">
              <button type="submit">
              <i class="ti-search"></i>
              </button>
            </div>
          </div>
          <div class="nf-top-result-list">


              <?php
                $record=0;
                $k=0;
                while($blog_posts->have_posts()) { 
                  $blog_posts->the_post();
                  $values= get_fields();

                  /*if(isset($_POST) && ($_POST['state']==$values['state'] or $_POST['state']=='' or (is_array($_POST['state']) && in_array($values['state'],$_POST['state']))) && ($_POST['infrastructure']==$values['type_of_infrastructure'] or $_POST['infrastructure']=='' or (is_array($_POST['infrastructure']) && in_array($values['type_of_infrastructure'],$_POST['infrastructure'])))
                    && (($_POST['keyword']!='' && (strpos($values['state'], $_POST['keyword']) !== false or strpos($values['type_of_infrastructure'], $_POST['keyword']) !== false or strpos($values['facilities_available'], $_POST['keyword']) !== false or strpos($values['connectivity'], $_POST['keyword']) !== false or strpos($values['infrastructure_name'], $_POST['keyword']) !== false  or strpos($values['facilities_available'], $_POST['keyword']) !== false or strpos($values['contact_details'], $_POST['keyword']) !== false or strpos($values['weblinks'], $_POST['keyword']) !== false or strpos($values['address'], $_POST['keyword']) !== false )) or $_POST['keyword']=='')
                  )

                  { */
                    $record=$record+1;   ?> 

                    <div class="nf-cart mkt-sup-details">
                      <div class="nf-cart-header">
                        <div class="nf-left-content">
                          <div class="nf-l-img">
                            <img src="<?php echo $logo_image; ?>" alt="university-logo.png">
                          </div>
                          <div class="nf-l-title">
                            <h3><?php echo $values['infrastructure_name']; ?></h3>
                            <p>&nbsp;</p>
                          </div>
                        </div>
                        <div class="nf-location-name">
                          <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/map.png" alt="map">
                          <span><?php echo $values['state'] ?></span>
                        </div>
                      </div>
                      <div class="nf-cart-body">
                        <div class="row">
                          <div class="col-12 col-lg-4">
                            <div class="nf-listing">
                              <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/harvesting.png" alt="Infrastructure">
                              <h4><span>Type of Infrastructure</span><?php echo $values['type_of_infrastructure']; ?></h4>
                            </div>
                            <div class="nf-listing">
                              <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/scheme.png" alt="connectivity">
                              <h4><span>Connectivity</span><?php echo $values['connectivity']; ?></h4>
                            </div>
                            <?php if($values['types_of_support']!=''){?>
                            <!--<div class="nf-listing">
                              <img src="<?php //echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/support.png" alt="Support">
                              <h4><span>Types of Support</span><?php //echo $values['types_of_support']; ?></h4>
                            </div>-->
                          <?php }?>
                          </div>
                          <div class="col-12 col-lg-4">
                            <div class="nf-listing">
                              <img class="nf-img-w-25" src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/call.png" alt="call">
                              <h4><span>Contact</span><?php echo $values['contact_details']; ?></h4>
                            </div>
                            <!-- <div class="nf-listing">
                              <img class="nf-img-w-25" src="<?php //echo get_template_directory_uri(). '/assets/'?>img/study-in-north/fax.png" alt="fax">
                              <h4><span>Weblinks</span><a href="<?php //echo $values['weblinks']; ?>" class="nf-call-link" target="_blank"><?php //echo $values['weblinks']; ?></a></h4>
                            </div> -->
                            <div class="nf-listing">
                              <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/course-1.png" alt="course-1">
                              <h4><span>Facilities Available</span><?php echo $values['facilities_available']; ?></h4>
                            </div>
                          </div>
                          <div class="col-12 col-lg-3">
                            <div class="nf-address-block">
                              <h4><img src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/address.png" alt="address">Address</h4>
                              <h6><?php echo $values['address']; ?></h6>
                              <a href="<?php echo $values['link']; ?>" class="nf-white-button" target="_blank">
                                View Details
                              </a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>           
            <?php } ?>

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
</div>
</form>
  <!-- End Study tour in north section  -->
  <!-- footer start -->
  <?php get_footer(); ?>

<script type="text/javascript">
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
    $('.check_infrastructure').click(function() {
        $('.check_infrastructure').not(this).prop('checked', false);
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