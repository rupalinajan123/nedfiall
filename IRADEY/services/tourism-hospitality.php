<?php /*Template Name: Tourism & Hospitality */
/* Template Post Type: tourism_adventure */
 ?>
<?php get_header(); 

$page_data = get_page_by_path( 'tourism-adventure' );

$current_slug = add_query_arg( array(), $wp->request );
$current_slug = explode('/',$current_slug);
$the_slug = end($current_slug);
$type = $current_slug[count($current_slug) - 2];


$record=0;
$blog_args = array(
                            'post_type' => 'tourism_adventure',
                            'post_status' => 'publish',
                            'name' =>$the_slug,
                            'posts_per_page' => '1'
                            );


$blog_posts = new WP_Query($blog_args);
     //  echo "<pre>";
     //   print_r($blog_posts);exit;

$banner_image = get_field( "banner_image", $blog_posts->posts[0]->ID );

if($banner_image=='') $banner_image= get_template_directory_uri(). '/assets/img/no_record_found_banner.png';

?>

    <!-- header-end -->
    <!-- inner-banner-start -->
    <div class="inner-banner">
      <div class="container">
        <div class="banner-title">
         <h3><?php echo $blog_posts->posts[0]->post_title?> <a href="#" class="changeTopic" data-toggle="collapse" data-target="#changeTopic" >Change Topic</a></h3>
         <ul class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Entrepreneurship</a></li>
          <li class="breadcrumb-item"><a href="#">Know your Business</a></li>
          <li class="breadcrumb-item"><a href="#">Services</a></li>
          <li class="breadcrumb-item"><a href="#">Tourism & Hospitality</a></li>
          <li class="breadcrumb-item active"><?php echo $blog_posts->posts[0]->post_title?></li>
        </ul>
      </div>
      <div class="chagetopic-modal changeTopic-collapse">
          <div class="collapse " id="changeTopic" style="">
            <a href="#" id="changeTopic_close"><i class="fa fa-close"></i></a>
            <div class="card card-body">
              <div class="row">
                  <div class="col-md-6">
                  <h4>Select topic</h4>
                    <ul>
                      <li><a href="<?php echo site_url();?>/hotels-and-resorts"> Hotels & Resorts</a></li>
                      <li><a href="<?php echo site_url();?>/tourism_adventure/homestay/"> Homestay</a></li>
                      <li><a href="<?php echo site_url();?>/tourism-adventure">Adventure Tourism</a></li>
                      <li><a href="<?php echo site_url();?>/tourism_adventure/nature-eco-tourism/"> Nature & Eco Tourism</a></li>
                      <li><a href="<?php echo site_url();?>/tourism_adventure/rural-eco-tourism/"> Rural & Eco Tourism</a></li>
                    </ul>
                </div>
                      
              </div>
            </div>
          </div>
        </div>
      <div class="banner-content">
        <div class="row">
          <?php //$url = wp_get_attachment_url( get_post_thumbnail_id($post_id) );?>
          <div class="col-md-4 banner-img pr-0"><img src="<?php echo $banner_image;?>"></div>
          <div class="col-md-8  pl-0">
            <div class="bannerbg nf-gradient-30 justify-content-start p-3 nf-height-100">
              <!--<h4 class="nf-f-size-24 pl-0"><?php //echo $page_data->post_title;?></h4>-->
              <p class="text-white pr-md-5"><?php echo $blog_posts->posts[0]->post_content;?>
              </p>
              <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/layers-bg.png" alt="layers background" class="nf-layes-bg">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- inner-banner-end -->
  <!-- Study tour in north section  -->
  <div class="inner-body">
    <div class="container">
      <div class="nf-form-wrap">
        <div class="row">
             
              <div class="col-12 col-lg-12 "> <!--nf-listing-c-width-->
                <h4 class="nf-f-size-20 nf-strong mb-4">Important Parameters</h4>

                <?php 

              while($blog_posts->have_posts()) {
                $blog_posts->the_post(); 

                $values= get_fields();
                
                if($values)
                {
                    $category_of_sports='';
                    $name_of_activity = '';
                    $state='';
                    $favourable_time='';
                    $market_linkage='';
                    $guidelines='';
                    

                    foreach($values as $key => $value)
                    {
                        
                        if($key=='category_of_sports'){ $category_of_sports = $value; }
                        if($key=='name_of_activity'){ $name_of_activity = $value; }
                        if($key=='state'){ $state = $value; }
                        if($key=='favourable_time'){ $favourable_time = $value; }
                        if($key=='market_linkage'){ $market_linkage = $value; }
                        if($key=='guidelines'){ $guidelines = $value; }
                        
                    }
                }


        //if($map_type=='Map'){
        $record=$record+1;
    ?>
                <div class="row">
                  <div class="col-12 col-lg-10">

                    <div class="row">
                      <div class="col-lg-4 col-md-6  mb-4 parameter_box ">
                        <div class="nf-gradient-4">
                          <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/climate.png" alt="image" class="img-fluid">
                          <h4 class="nf-f-size-16 text-white">Favourable Time</h4>
                          <h4 class="nf-f-size-16 text-white"><?php echo $favourable_time;?></h4>

                        </div>
                      </div>
                      <div class="col-lg-4 col-md-6  mb-4 parameter_box ">
                        <div class="nf-gradient-3">
                          <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/soil-ph.png" alt="image" class="img-fluid">
                          <h4 class="nf-f-size-16 text-white">Market Linkage</h4>
                          <h4 class="nf-f-size-16 text-white"><?php echo $market_linkage;?></h4>

                        </div>
                      </div>
                      <div class="col-lg-4 col-md-6  mb-4 parameter_box ">
                        <div class="nf-gradient-5">
                          <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/sowing-season2.png" alt="image" class="img-fluid">
                          <h4 class="nf-f-size-16 text-white">Guidelines</h4>
                          <h4 class="nf-f-size-16 text-white"><?php echo $guidelines;?></h4>

                        </div>
                      </div>
                      
                      
                    </div>
                    <div class="row">
                      <div class="col-lg-4 col-md-6  mb-4 parameter_box ">
                        <div class="nf-gradient-5">
                          <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/soil-ph.png" alt="image" class="img-fluid">
                          <h4 class="nf-f-size-16 text-white"> Category </h4>
                          <h4 class="nf-f-size-16 text-white"><?php echo $category_of_sports;?></h4>

                        </div>
                      </div>
                      <div class="col-lg-4 col-md-6  mb-4 parameter_box ">
                        <div class="nf-gradient-4">
                          <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/sowing-season2.png" alt="image" class="img-fluid">
                          <h4 class="nf-f-size-16 text-white">Activity</h4>
                          <h4 class="nf-f-size-16 text-white"><?php echo $name_of_activity;?></h4>

                        </div>
                      </div>
                      <div class="col-lg-4 col-md-6  mb-4 parameter_box ">
                        <div class="nf-gradient-3">
                          <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/sowing-season2.png" alt="image" class="img-fluid">
                          <h4 class="nf-f-size-16 text-white">State</h4>
                          <h4 class="nf-f-size-16 text-white"><?php echo $state;?></h4>

                        </div>
                      </div>
                    </div>
                    
                  </div>
                </div>

                <h4 class="nf-f-size-16 nf-strong my-3 mb-4">Potential Location</h4>

                <div class="bg-gray p-4 row mx-0 mb-3">
                  <ul class="five_col_ul vm-variety-wrap-2">

                    <?php
                    $rows = get_post_meta( $post->ID, '_event_ploc_value_key', true ); 
                    $rows = explode('*****',$rows);
                    //echo 'Event Rows: ';echo '<br>';
                    for($i=0;$i<count($rows);$i++) 
                    {
                       
                    ?>

                    <li><a href="javascript:void(0);"><?php echo $rows[$i];?></a></li>

                    <?php } 
                      ?>

                    

                  </ul>
                </div>
                <div class="row nf-f-accordion">
                  <div class="col-lg-12">
                    <div class="panel-group" id="accordion">
                      <div class="panel panel-default">
                        <div class="panel-heading accordion_bg_2" role="tab" id="headingTwo">
                          <h4 class="panel-title mb-0">
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#finance" aria-expanded="false" aria-controls="finance">
                            Equipment Requirement (for 50 perspon)                                        </a>
                          </h4>
                        </div>
                        <div id="finance" class="panel-collapse collapse show" role="tabpanel" aria-labelledby="headingTwo">
                          <div class="panel-body">
                           <div class="table-responsive"> 
                              <table class="table table_border_0 nf-strong-600"> 
                                <tbody>
                                  <tr class="bg-gray nf-strong">

                                    <td>Items</td>
                                    <td align="right">Numbers</td>
                                    <td align="right">Rate</td>
                                    <td align="right">Total (in Rs.)</td>
                                  </tr>
                                  <?php
                                  $totd=0;
                                  $rows = get_post_meta( $post->ID, '_event_equip_value_key', true );
                                  $rowsno = get_post_meta( $post->ID, '_event_equipno_value_key', true );
                                  $rowsrate = get_post_meta( $post->ID, '_event_equiprate_value_key', true );
                                  $rowstot = get_post_meta( $post->ID, '_event_equiptot_value_key', true ); 

                                  $rows = explode('*****',$rows);
                                  $rowsno = explode('*****',$rowsno);
                                  $rowsrate = explode('*****',$rowsrate);
                                  $rowstot = explode('*****',$rowstot);
                                  //echo 'Event Rows: ';echo '<br>';
                                  for($i=0;$i<count($rows);$i++) 
                                  { 
                                  ?>
                                  <tr>
                                    <td ><?php echo $rows[$i]?></td>
                                    <td align="right"><?php echo $rowsno[$i]?></td>
                                    <td align="right"><?php echo $rowsrate[$i]?></td>
                                    <td align="right"><?php echo $rowstot[$i]?></td>
                                  </tr>
                                  <?php
                                  $rowstot[$i] =str_replace(',', '', $rowstot[$i]);
                                  if(is_numeric($rowstot[$i])) $totd = $rowstot[$i]+$totd;
                                } 
                                ?>
                                  
                                  <tr>
                                    <td> Total : </td>
                                    <td align="right"></td>
                                    <td align="right"></td>
                                    <td align="right"><b><?php echo number_format($totd,2);?></b></td>

                                  </tr>
                                </tbody>
                              </table>  
                           </div>   
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                  


                
                

                 <?php 
                $suc = get_post_meta( $post->ID, '_event_suc_value_key', true ); 
                $sucurl = get_post_meta( $post->ID, '_event_sucurl_value_key', true );
                $sucdesc = get_post_meta( $post->ID, '_event_sucdesc_value_key', true ); 
                    if(!empty($suc))
                                {
                                  ?>

    <section class="nf-s-stories-section nf-tommoto-section">
                  <div class="container">
                    <div class="row">
                      <div class="col-12">
                        <h2>Success Stories <a href="<?php echo site_url()?>/success-stories/" class="nf-explore-bgbtn">Explore All </a> </h2> 
                      </div>
                    </div>
                    <div class="row">

                      <?php
                                    $suc = explode('*****',$suc);
                                    $sucurl = explode('*****',$sucurl);
                                    $sucdesc = explode('*****',$sucdesc);
                                    $k=0;
                                    for($i=0;$i<count($suc);$i++) 
                                    {
                                        if($k==4) $k=0;
                                        $k = $k+1;     

                                        $end_str = strstr($sucurl[$i], '='); 
                                        $final_str = str_replace('=', '', $end_str);
                                        $youtube_url = 'https://www.youtube.com/embed/';  
                                ?>

          
        

                      <div class="col-12 col-lg-4">
                        <div class="nf-ss-inner">
                          <div class="nf-ss-img-inner">
                            <!--<img src="<?php //echo get_template_directory_uri(). '/assets/'?>img/home/video-img.png" alt="video image">
                            <a href="#">
                              <img src="<?php //echo get_template_directory_uri(). '/assets/'?>img/home/play.png" alt="play">
                            </a>-->
                            <iframe width="100%" height="200" src="<?php echo $youtube_url.$final_str; ?>" frameborder="0" allowfullscreen=""></iframe>
                          </div>
                          <div class="nf-ss-text-inner">
                            <h5><?php echo $suc[$i];?></h5>
                            <p><?php echo $sucdesc[$i];?></p>
                          </div>
                          <input type="hidden" id="copylink<?php echo $i?>" value="<?php echo $youtube_url.$final_str; ?>">
                    <a href="javascript:void(0)" title="Copy Link" class="copylink-class"onclick="copyLinkFunction('<?php echo $i?>')">Copy Link</a>

                        </div>
                      </div>

                      <?php 
                      }
                    ?>

                      
                    </div>
                  </div>
                </section>
                <?php
                } 
                ?>
                <?php
                    $rows = get_post_meta( $post->ID, '_event_institute_value_key', true ); 
                    $rows1 = get_post_meta( $post->ID, '_event_institute_link_key', true );

                        if(!empty($rows))
                        {
                                  ?>
                <h4 class="nf-f-size-16 nf-strong my-3 mb-4 mt-4 nf-btnTitle">Training Institute <a href="<?php echo site_url()?>/training_page/" class="nf-explore-bgbtn">Explore All </a></h4>

                <div class="clat-carrer-slider vm-training-slider">

                  <?php
                                    $k=0;
                                    $rows = explode('*****',$rows);
                                    $rows1 = explode('*****',$rows1);

                                    //echo 'Event Rows: ';echo '<br>';
                                    for($i=0;$i<count($rows);$i++) 
                                    {
                                       //echo  $rows[$i].' - '.$rows1[$i];
                                       if($k==4) $k=0;  
                                        $k = $k+1; 
                                        echo '<a href="'.$rows1[$i].'" target="_blank"><div class="item grd-bg'.$k.'">'.$rows[$i].'</div></a>';
                                    } 
                                ?>

                  

                </div>
                <?php
                }

                ?>

                
                <?php 
                $suc = get_post_meta( $post->ID, '_event_learn_value_key', true ); 
                $sucurl = get_post_meta( $post->ID, '_event_learnurl_value_key', true );
                    if(!empty($suc))
                                {
                                  ?>

                <section class="nf-learing-section mt-3">
                  <h4 class="nf-btnTitle">Learning Videos <a href="<?php echo site_url()?>/e-learning/" class="nf-explore-bgbtn">Explore All </a></h4>
                  <div class="row">


                    <?php
                                    $suc = explode('*****',$suc);
                                    $sucurl = explode('*****',$sucurl);
                                
                                    $k=0;
                                    for($i=0;$i<count($suc);$i++) 
                                    {
                                        if($k==4) $k=0;
                                        $k = $k+1;     

                                        $end_str = strstr($sucurl[$i], '='); 
                                        $final_str = str_replace('=', '', $end_str);
                                        $youtube_url = 'https://www.youtube.com/embed/';  
                                ?>

                    <div class="col-12 col-lg-4">
                      <a href="#">
                        <iframe width="100%" height="200" src="<?php echo $youtube_url.$final_str; ?>" frameborder="0" allowfullscreen=""></iframe>
                        <h5><?php echo $suc[$i];?></h5>
                      </a>
                      <input type="hidden" id="copylink<?php echo $i?>1" value="<?php echo $youtube_url.$final_str; ?>">
                    <a href="javascript:void(0)" title="Copy Link" class="copylink-class"onclick="copyLinkFunction('<?php echo $i?>1')">Copy Link</a>

                    </div>

                      <?php 
                      }
                    ?>

                    

                    
                  </div>
                </section>
                <?php
                } 
                ?>

                <?php 
              $view_complete_details=$values['view_complete_details'];
              if($view_complete_details!=''){?>
            <div class="row">
              <div class="col-lg-12 text-center col-md-12 mb-2 mb-lg-0 vm-vc-detail"><a class="btn nf-button-v-small w-50" href="<?php echo $view_complete_details?>" target="_blank" role="button">View Complete Details</a></div>
            </div>
            <?php }?>

                <?php 
                      $suc = get_post_meta( $post->ID, '_event_gov_value_key', true ); 
                      $sucurl = get_post_meta( $post->ID, '_event_govurl_value_key', true );
                    if(!empty($suc))
                                {
                                  ?>

                <section class="nf-rgs">
                  <h4>Related Government Schemes</h4>
                  <div class="row">

                      <?php
                                    $suc = explode('*****',$suc);
                                    $sucurl = explode('*****',$sucurl);
                                
                                    $k=0;
                                    for($i=0;$i<count($suc);$i++) 
                                    {
                                         
                                ?>

                      <div class="col-12 col-lg-4">
                      <ul>
                        <li><a target="_blank" href="<?php echo $sucurl[$i]; ?>"><?php echo $suc[$i];?></a></li>                        
                    </ul>
                    </div>

                      <?php 
                      }
                    ?>

                  </div>
                </section>
                <?php
                } 
                ?>

                <div class="circle_bg2">
                  <div class="row">
                    <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/circle-bg2.png" alt="background image" class="img-fluid">
                  </div>
                </div>

                <?php //}
      }

      if($record==0) $msg= '<b>No Record Found.</b>';
      if($record==0 or count($blog_posts->posts)==0) $msg= '<b>No Record Found.</b>';
      echo $msg;

      ?> 

              </div>
            </div>
          </div>
        </div>
      </div>  


    </div>

  </div>

</div>



<!-- End Study tour in north section  -->

<?php get_footer(); ?>
<script> 
$(document).ready(function(){
    $('.check_sport').click(function() {
        $('.check_sport').not(this).prop('checked', false);
        document.getElementById("form_id").submit();
    });
});
$(document).ready(function(){
    $('.check_activity').click(function() {
        $('.check_activity').not(this).prop('checked', false);
        document.getElementById("form_id").submit();
    });
});
$(document).ready(function(){
    $('.check_state').click(function() {
        $('.check_state').not(this).prop('checked', false);
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

//document.body.scrollTop = 650;
//document.documentElement.scrollTop = 650;
</script> 