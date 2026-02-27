<?php /*Template Name: Infrastructure Details */ ?>
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

if($title1=='Apiculture')
{
    $_POST['sectors']=$title1;
}


$page_data = get_page_by_path( 'market-support-details' );
$logo = get_field("logo", $page_data->ID);
?>
<!-- header-end -->
<!-- inner-banner-start -->
<div class="inner-banner">
  <div class="container">
    <div class="banner-title">
      <h3><?php echo $page_data->post_title;?></h3>
      <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Entrepreneurship</a></li>
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
<form method="post" action="<?php echo site_url()?>/market-support-details" id="form_id">
  <div class="inner-body">
    <div class="container">
      <div class="row">
        <div class="col-12 col-lg-4 nf-sidebar-c-width">
         <form method="post" action="<?php echo site_url()?>/market-support-details" id="form_id">
          <div class="courses-details-sidebar-area search-sidebar nf-sidebar">
            <div class="widget mb-20 widget-padding white-bg">
              <!--<a class="btn-link nf-color-1" data-toggle="collapse" href="#state-filter">-->
                <!--<img src="<?php //echo get_template_directory_uri(). '/assets/'?>img/study-in-north/state-white.png" alt="state-white"> <span> State</span></a>-->
                <!--         <ul class="sidebar-link">-->
                  <?php $var = get_field_object('field_60d5da2e639d3'); ?>
                  <?php
                    // $k=0;
                    // foreach($var['choices'] as $choice)
                    // {
                    //   if($_POST['state']==$choice) $checked = 'checked'; 
                    //   else if(is_array($_POST['state']) && in_array($choice,$_POST['state'])) $checked = 'checked'; 
                    //   else  $checked = ''; 
                    //   echo '
                    //   <li>
                    //     <div class="nf-checkbox-wrap">
                    //       <input value="'.$choice.'" type="checkbox" '.$checked.' id="state_'.$k.'" name="state[]" class="check_state">
                    //       <label for="state_'.$k.'">'.$choice.'</label>
                    //     </div>
                    //   </li>
                    //   ';
                    //   $k++;
                    //}
                  ?>
                  <!--  </ul>-->
                  <!--</div>-->
                  <?php $var = get_field_object('field_60d6eb75829e3');?>
                  <a class="btn-link nf-color-2" data-toggle="collapse" href="#department-filter">
                    <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/sector.png" alt="Sectors"> <span> Sectors (<?php echo count($var['choices'])?>)</span>
                  </a>
                  <div class="widget-link collapse show" id="department-filter">
                    <ul class="sidebar-link nf-sidebar-scroll">
                      
                      <?php
                      $k=0;
                      sort($var['choices']);
                      foreach($var['choices'] as $choice)
                      {
                        if($_POST['sectors']==$choice) $checked = 'checked'; 
                        else if(is_array($_POST['sectors']) && in_array($choice,$_POST['sectors'])) $checked = 'checked'; 
                        else  $checked = '';
                        echo '
                        <li>
                        <div class="nf-checkbox-wrap">
                        <input value="'.$choice.'" type="checkbox" '.$checked.' id="sectors_'.$k.'" name="sectors[]" class="check_sectors">
                        <label for="sectors_'.$k.'">'.$choice.'</label>
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
                  'key'     =>  'sectors_name',
                  'value'    =>  $_POST['keyword'],
                  'compare'  => 'LIKE'
                ),
                array(
                  'key'     =>  'contact_details',
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
              'post_type' => 'resource_infra',
              'post_status' => 'publish',
              'posts_per_page' => 10,
              'paged' => $paged, 
              'meta_query'     =>  array(
                array(
                  'relation' => 'AND',
                  array(
                    'key'     =>  'type',
                    'value'   =>  'Market Support Agency'
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
                    'value'   =>  'Market Support Agency'
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

              <?php if(!empty($_POST['state']) or !empty($_POST['sectors'])){?>
                <div class="nf-state-listing-block">
                 <div class="row">
                  <?php if(!empty($_POST['state'])){?>
                    <!--<div class="col-12 col-lg-6">-->
                      <!--  <a href="#">-->
                        <!--    <img src="<?php //echo get_template_directory_uri(). '/assets/'?>img/know-your-approvals/state.png" class="nf-w-t1">-->
                        <!--    <span><?php //if(is_array($_POST['state'])) echo Implode(',<br>',$_POST['state']);else echo $_POST['state'];?></span>-->
                        <!--  </a>-->
                        <!--</div>-->
                      <?php }?>
                      <?php if(!empty($_POST['sectors'])){?>
                       <div class="col-12 col-lg-6">
                        <a href="#">
                          <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/sector.png" class="nf-w-t2" alt="sectors">
                          <span><?php if(is_array($_POST['sectors'])) echo Implode(',<br>',$_POST['sectors']);else echo $_POST['sectors'];?></span>
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

                  /*if(isset($_POST) && ($_POST['state']==$values['state'] or $_POST['state']=='' or (is_array($_POST['state']) && in_array($values['state'],$_POST['state']))) && ($_POST['sectors']==$values['sectors'] or $_POST['sectors']=='' or (is_array($_POST['sectors']) && in_array($values['sectors'],$_POST['sectors'])))
                    && (($_POST['keyword']!='' && (strpos($values['state'], $_POST['keyword']) !== false or strpos($values['sectors'], $_POST['keyword']) !== false or strpos($values['facilities_available'], $_POST['keyword']) !== false or strpos($values['infrastructure_name'], $_POST['keyword']) !== false  or strpos($values['facilities_available'], $_POST['keyword']) !== false or strpos($values['contact_details'], $_POST['keyword']) !== false or strpos($values['weblinks'], $_POST['keyword']) !== false or strpos($values['fax'], $_POST['keyword']) !== false )) or $_POST['keyword']=='')
                  )

                  { */
                    $record=$record+1;   ?> 

                    <div class="nf-cart">
                      <div class="nf-cart-header">
                        <div class="nf-left-content">
                          <div class="nf-l-img">
                            <img src="<?php echo $logo; ?>" alt="university-logo.png">
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
                              <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/sector.png" alt="Sectors">
                              <h4><span>Sectors</span><?php echo $values['sectors']; ?></h4>
                            </div>
                            <!-- <div class="nf-listing">
                              <img src="<?php //echo get_template_directory_uri(). '/assets/'?>img/study-in-north/course-1.png" alt="course-1">
                              <h4><span>Connectivity</span><?php //echo $values['connectivity']; ?></h4>
                            </div> -->
                            <?php if($values['types_of_support']!=''){?>
                              <div class="nf-listing">
                                <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/harvesting.png" alt="Types of Support">
                                <h4><span>Types of Support</span><?php echo $values['types_of_support']; ?></h4>
                              </div>
                            <?php }?>
                            <!-- <div class="nf-listing">
                              <img src="<?php //echo get_template_directory_uri(). '/assets/'?>img/study-in-north/course-1.png" alt="course-1">
                              <h4><span>Fax</span><?php //echo $values['fax']; ?></h4>
                            </div> -->
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
                            <?php if($values['facilities_available']!=''){?>
                            <!--<div class="nf-listing">
                              <img src="<?php //echo get_template_directory_uri(). '/assets/'?>img/study-in-north/course-1.png" alt="course-1">
                              <h4><span>Facilities Available</span><?php //echo $values['facilities_available']; ?></h4>
                            </div>-->
                          <?php }?>
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

  document.body.scrollTop = 500;
  document.documentElement.scrollTop = 500;


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

  $( ".page-link" ).click(function() {
    $('#form_id').attr('action',this.href); 
    $( "#form_id" ).submit();
  //alert(this.href);
  return false;
});

</script>