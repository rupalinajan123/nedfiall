<?php /*Template Name: Horticulture Integrated */ 
/* Template Post Type: horticulture_int */

get_header();  

$current_slug = add_query_arg( array(), $wp->request );
$current_slug = explode('/',$current_slug);
$the_slug = end($current_slug);
$type = $current_slug[count($current_slug) - 2];

/*$page_data = get_page_by_path( $the_slug );*/

//=========

$record=0;
$blog_args = array(
                            'post_type' => 'horticulture_int',
                            'post_status' => 'publish',
                            'name'        => $the_slug,
                            'posts_per_page' => '1'
                            );


$blog_posts = new WP_Query($blog_args);
     //  echo "<pre>";
     //   print_r($blog_posts);exit;

$banner_image = get_field( "banner_image", $blog_posts->posts[0]->ID );
if($_POST['animal']=='') $_POST['animal'] = $blog_posts->posts[0]->post_title;

if($banner_image=='') $banner_image= get_template_directory_uri(). '/assets/img/no_record_found_banner.png';

while($blog_posts->have_posts()) {
                $blog_posts->the_post(); 

                $values= get_fields();
                
                if($values)
                {
                    $integrated_farming_in_uttrakhand_video_link='';
                    $integrated_farming_video_link='';
                    $poultry_cum_fishery_video_link='';
                    $integrated_rice_fish_farming_video_link='';
                    $integrated_house_for_goats_and_cows_video_link='';
                    $best_way_to_utilize_agricultural_land_mixedintegrate_farming_video_link='';
                    $integrated_waterchestnut_fish_farming_video_link='';
                    $duck_cum_fishery_video_link='';

                    foreach($values as $key => $value)
                    {
                        /*if($key=='integrated_farming_in_uttrakhand_video_link'){ $integrated_farming_in_uttrakhand_video_link = $value; }

                        if($key=='integrated_farming_video_link'){ $integrated_farming_video_link = $value; }

                        if($key=='poultry_cum_fishery_video_link'){ $poultry_cum_fishery_video_link = $value; }

                        if($key=='integrated_rice_fish_farming_video_link'){ $integrated_rice_fish_farming_video_link = $value; }

                        if($key=='integrated_house_for_goats_and_cows_video_link'){ $integrated_house_for_goats_and_cows_video_link = $value; }

                        if($key=='best_way_to_utilize_agricultural_land_mixedintegrate_farming_video_link'){ $best_way_to_utilize_agricultural_land_mixedintegrate_farming_video_link = $value; }

                        if($key=='integrated_waterchestnut_fish_farming_video_link'){ $integrated_waterchestnut_fish_farming_video_link = $value; }
                        if($key=='duck_cum_fishery_video_link'){ $duck_cum_fishery_video_link = $value; }*/
                        
                    }
                }

?>
    <!-- header-end -->
    <!-- inner-banner-start -->
    <div class="inner-banner">
      <div class="container">
        <div class="banner-title">
          <h3><?php echo $blog_posts->posts[0]->post_title;?> <a href="#" class="changeTopic" data-toggle="collapse" data-target="#changeTopic">Change Topic</a></h3>
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Entrepreneurship</a></li>
            <li class="breadcrumb-item"><a href="#">Know your Business</a></li>
            <li class="breadcrumb-item"><a href="#">Agri-Business</a></li>
            <li class="breadcrumb-item"><a href="#">Production</a></li>
            <li class="breadcrumb-item"><a href="#">Horticulture</a></li>
            <li class="breadcrumb-item">Type wise</li>
            <li class="breadcrumb-item active"><?php echo $blog_posts->posts[0]->post_title;?></li>
          </ul>
        </div>

        <div class="chagetopic-modal changeTopic-collapse">
          <div class="collapse " id="changeTopic" style="">
            <a href="#" id="changeTopic_close"><i class="fa fa-close"></i></a>
            <div class="card card-body">
              <div class="row">
                
                        <?php
                        $k=0;
                        $t=0;
                        $var = get_field_object('field_60bf6ad8fa6f9');
                      
                        $k=0;
                        foreach($var['choices'] as $choice)
                        {
                        ?>
                        
                          <?php 
                          if($k==0){ ?>
                            <div class="col-md-4">
                              <h4><?php if($t==0){?>Crop-wise <?php }else echo '&nbsp;'; ?></h4>
                            <ul>
                          <?php }
                          $curslug = str_replace(' ','-',strtolower($choice));
                          if($the_slug!=$curslug){
                          ?>      
                            <li>
                              <a class="box" href="<?php echo site_url()?>/<?php echo $curslug; ?>"><?php echo $choice;?></a>
                            </li>
                            <?php
                            } 
                            $totk=count($var['choices'])-1;
                            if($k==7 or $totk==$t){ $k=0;?>
                            </ul>
                            </div>
                          <?php }else{ $k++;} $t++; ?>
                          
                        <?php
                        }
                        wp_reset_postdata();
                        ?>
                          
                          <div class="col-md-4">
                              <h4>Type-wise &nbsp;</h4>
                            <ul>
                              <li>
                                <a class="box" href="<?php echo site_url()?>/horticulture_int/integrated-farming/">Integrated</a>
                              </li>
                              <li>
                                <a class="box" href="<?php echo site_url()?>/horticulture_int/hi-tech/">Hi-Tech</a>
                              </li>
                              <li>
                                <a class="box" href="<?php echo site_url()?>/horticulture_int/traditional/">Traditional</a>
                              </li>
                              <li>
                                <a class="box" href="<?php echo site_url()?>/horticulture_int/organic-farming/">Organic Farming</a>
                              </li>
                            
                            </ul>
                          </div>
                    
              </div>
            </div>
          </div>
        </div>
        
        <div class="banner-content">
          <div class="row">
            <?php //$banner_image = wp_get_attachment_url( get_post_thumbnail_id($post_id) );?>
            <div class="col-md-4 banner-img pr-0"><img src="<?php echo $banner_image;?>"></div>
            <div class="col-md-8  pl-0">
              <div class="bannerbg nf-gradient-3 justify-content-start p-3 nf-height-100">
                <h4 class="nf-f-size-24 pl-0"><?php echo $blog_posts->posts[0]->post_title;?></h4>
                <p class="text-white pr-md-5">
                  <?php echo $blog_posts->posts[0]->post_content;?>
                </p>
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
            
            	<div class="col-12 col-lg-12">
               <section class="nf-s-stories-section nf-tommoto-section">
                  <div class="container">
                    <div class="row">
                      <div class="col-12">
                        <h2><?php echo $blog_posts->posts[0]->post_title;?></h2>
                      </div>
                    </div>
                    <div class="row">



                      

                       <?php
                       $suc = get_post_meta( $post->ID, '_event_learn_value_key', true ); 
                        $sucurl = get_post_meta( $post->ID, '_event_learnurl_value_key', true );
                    if(!empty($suc))
                                {
                                    $suc = explode('*****',$suc);
                                    $sucurl = explode('*****',$sucurl);
                                
                                    $k=0;
                                    for($i=0;$i<count($suc);$i++) 
                                    {
                                        if($k==4) $k=0;
                                        $k = $k+1; 

                                          
                                        

                                        if(strpos($sucurl[$i],'youtu')!=false && strpos($sucurl[$i],'=')!=false) 
                                        {
                                            $end_str = strstr($sucurl[$i], '='); 
                                            $final_str = str_replace('=', '', $end_str);
                                            $youtube_url = 'https://www.youtube.com/embed/';
                                        } 
                                        else
                                        {
                                          $final_str='';
                                          $youtube_url= $sucurl[$i];
                                        }

                                        if (function_exists("convertYoutube")) {
                                          $final_str='';
                                          $youtube_url =  convertYoutube($sucurl[$i]); 
                                        }
                                ?>

                    


                    <div class="col-12 col-lg-4 mb-5">
                        <div class="nf-ss-inner">
                          <div class="nf-ss-img-inner">

                            
                              <iframe width="100%" height="200" src="<?php echo $youtube_url.$final_str; ?>" frameborder="0" allowfullscreen=""></iframe>
                           
                            
                          </div>
                          <div class="nf-ss-text-inner">
                            <h5><?php echo $suc[$i];?></h5>
                          <!--<p>  <a target="_blank" href="<?php echo $sucurl[$i]; ?>">Watch Video</a></p>-->
                          <p><input type="hidden" id="copylink<?php echo $i?>" value="<?php echo $youtube_url.$final_str; ?>">
                            <a href="javascript:void(0)" title="Copy Link" class="copylink-class" onclick="copyLinkFunction('<?php echo $i?>')">Copy Link</a></p>
                          </div>
                        </div>
                      </div>

                      <?php 
                      }
                    }
                    ?>


                       
                    </div>
                  </div>
                </section>
                
                <?php
                    $rows = get_post_meta( $post->ID, '_event_institute_value_key', true );
                     $rows1 = get_post_meta( $post->ID, '_event_institute_link_key', true );

                        if(!empty($rows))
                        {
                                  ?>
                <h4 class="nf-f-size-16 nf-strong my-3 mb-4 mt-4">Training Institute</h4>

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

                <section class="nf-calculator-section nf-cal-tommoto-wrap">
                  <div class="container">
                    <div class="row">
                      <div class="col-12">
                        <div class="nf-calculator-block">
                          <div class="nf-left-block">
                            <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/home/calendar.png" alt="calendar">
                            <h2>Farm Cost Calculator <span>Know your Farming cost in advance </span></h2>
                          </div>
                          <div class="nf-right-block">
                            <a href="<?php echo site_url()?>/horticulture-cost-calculator" class="nf-button-v-small">Calculate Now</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </section>

                

                <div class="circle_bg2">
                  <div class="row">
                    <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/circle-bg2.png" alt="background image" class="img-fluid">
					</div>
				</div>
                </div>

              </div>
            </div>
          </div>
			  </div>
      <?php }?>
    <?php get_footer(); ?>
    
    <script>
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