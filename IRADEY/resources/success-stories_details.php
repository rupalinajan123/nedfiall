<?php /*Template Name: success stories details */ ?>
<?php get_header();
$page_data = get_page_by_path( 'success-stories-details' );
?>
    <!-- inner-banner-start -->
    <div class="inner-banner">
        <div class="container">
            <div class="banner-title">
                     <h3><?php echo $page_data->post_title;?> </h3>
        <ul class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Resources</a></li>
          <li class="breadcrumb-item active"> <?php echo $page_data->post_title;?></li>
        </ul>
            </div>
            <div class="banner-content">
                <div class="row">
                    <div class="col-md-4 banner-img pr-0"><?php echo get_the_post_thumbnail(); ?></div>
                    <div class="col-md-8  pl-0">
                        <div class="bannerbg nf-gradient_2 justify-content-start pt-3 nf-height-100">
                         <!--  <h4 class="nf-f-size-24 nf-color-m-grey"><?php echo $page_data->post_title;?></h4> -->
                            <h5 class="nf-color-m-grey"><?php echo $page_data->post_content;?></h5>
                            <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/know-your-approvals/layers-3.png" alt="linear background"
                                class="nf-layes-bg">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- inner-banner-end -->
    <!-- Study tour in north section  -->
<!-- <?php echo "<pre>";print_r($_POST); ?> -->
<form method="post" action="<?php echo site_url()?>/success-stories-details" id="form_id">
    <div class="inner-body">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-4 nf-sidebar-c-width">
                    
                    <div class="courses-details-sidebar-area search-sidebar nf-sidebar nf-kyal">
                        <div class="widget mb-20 widget-padding white-bg">
                            <a class="btn-link nf-color-1" data-toggle="collapse" href="#state-filter">
                                <?php $var = get_field_object('field_60d428da876b5');?>
                                <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/state-white.png" alt="state-white"> <span> State (<?php echo count($var['choices']);?>)
                                </span></a>
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
                                              <input class="check_state" value="'.$choice.'" type="checkbox" '.$checked.' id="state_'.$k.'" name="state" class="check_state">
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
                                //=========ajax start
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
                                        'post_type' => 'success_stories',
                                          'post_status' => 'publish',
                                          'posts_per_page' => -1,
                                          'meta_query'     =>  array(
                                                        array(
                                                            'relation' => 'AND',
                                                            $sts_state
                                                          )
                                                      )
                                      );
                                      
                                      $the_query = new WP_Query( $args );
                                      $return_sectors=array();
                                      if( $the_query->have_posts() ){
                                        while( $the_query->have_posts() ){ 
                                          $the_query->the_post(); 
                                          $values= get_fields();
                                          $return_sectors[]=$values['sectors'];
                                      }
                                    }

                                    $return_sectors = array_filter(array_unique($return_sectors));
                                    if(!empty($_POST['sectors']) && !in_array($_POST['sectors'], $return_sectors)) $_POST['sectors']='';
                                    wp_reset_query();
                                  //=======ajax end
                                ?>


                            <a class="btn-link nf-color-2" data-toggle="collapse" href="#department-filter">
                                <?php $var = get_field_object('field_60d4291c876b7');?>
                                <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entrepreneurship-and-resources/sectorsIcon.png" alt="Sectors"> <span>
                                    Sectors (<?php echo count($return_sectors);?>)</span>
                            </a>

                            <div class="widget-link collapse show" id="state-filter">
                                <ul class="sidebar-link nf-sidebar-scroll">
                                    <?php
                                      $k=0;
                                      sort($return_sectors);
                                      foreach($return_sectors as $choice)
                                      //foreach($var['choices'] as $choice)
                                      {
                                        if($_POST['sectors']==$choice) $checked = 'checked'; 
                                        else if(is_array($_POST['sectors']) && in_array($choice,$_POST['sectors'])) $checked = 'checked'; 
                                        else  $checked = '';
                                        echo '
                                        <li>
                                          <div class="nf-checkbox-wrap">
                                            <input class="check_sectors" value="'.$choice.'" type="checkbox" '.$checked.' id="sectors_'.$k.'" name="sectors" class="check_sector">
                                            <label for="sectors_'.$k.'">'.$choice.'</label>
                                          </div>
                                        </li>
                                        ';
                                        $k++;
                                      }
                                    ?>
                                </ul>
                            </div>

                            <?php/*?>
                            <?php
                                //=========ajax start
                                  if(!empty($_POST['state']) )
                                        {
                                          if(!is_array($_POST['state'])) $_POST['state']=[$_POST['state']];
                                          $sts_state = array(
                                                        'key'     =>  'state',
                                                        'value'    =>  $_POST['state'],
                                                        'compare'  => 'IN'
                                                    );
                                        }
                                        if(!empty($_POST['sectors']) )
                                        {
                                          if(!is_array($_POST['sectors'])) $_POST['sectors']=[$_POST['sectors']];
                                          $sts_sectors = array(
                                                        'key'     =>  'sectors',
                                                        'value'    =>  $_POST['sectors'],
                                                        'compare'  => 'IN'
                                                    );
                                        }

                                      $args = array(
                                        'post_type' => 'success_stories',
                                          'post_status' => 'publish',
                                          'posts_per_page' => -1,
                                          'meta_query'     =>  array(
                                                        array(
                                                            'relation' => 'AND',
                                                            $sts_state,
                                                            $sts_sectors
                                                          )
                                                      )
                                      );
                                      
                                      $the_query = new WP_Query( $args );
                                      $return_sub_sectors=array();
                                      if( $the_query->have_posts() ){
                                        while( $the_query->have_posts() ){ 
                                          $the_query->the_post(); 
                                          $values= get_fields();
                                          $return_sub_sectors[]=$values['sub_sectors'];
                                      }
                                    }

                                    $return_sub_sectors = array_filter(array_unique($return_sub_sectors));
                                    if(!empty($_POST['sub_sectors']) && !in_array($_POST['sub_sectors'], $return_sub_sectors)) $_POST['sub_sectors']='';
                                    wp_reset_query();
                                  //=======ajax end
                                ?>


                            <a class="btn-link nf-color-2" data-toggle="collapse" href="#department-filter">
                                <?php $var = get_field_object('field_60d4291c876b7');?>
                                <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entrepreneurship-and-resources/sectorsIcon.png" alt="Sectors"> <span>
                                    Sub Sectors (<?php echo count($return_sub_sectors);?>)</span>
                            </a>

                            <div class="widget-link collapse show" id="state-filter">
                                <ul class="sidebar-link nf-sidebar-scroll">
                                    <?php
                                      $k=0;
                                      sort($return_sub_sectors);
                                      foreach($return_sub_sectors as $choice)
                                      //foreach($var['choices'] as $choice)
                                      {
                                        if($_POST['sub_sectors']==$choice) $checked = 'checked'; 
                                        else if(is_array($_POST['sub_sectors']) && in_array($choice,$_POST['sub_sectors'])) $checked = 'checked'; 
                                        else  $checked = '';
                                        echo '
                                        <li>
                                          <div class="nf-checkbox-wrap">
                                            <input class="check_sub_sectors" value="'.$choice.'" type="checkbox" '.$checked.' id="sub_sectors_'.$k.'" name="sub_sectors" class="check_sub_sectors">
                                            <label for="sub_sectors_'.$k.'">'.$choice.'</label>
                                          </div>
                                        </li>
                                        ';
                                        $k++;
                                      }
                                    ?>
                                </ul>
                            </div><?php*/?>
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
  if(!empty($_POST['sub_sectors']))
  {

    if(!is_array($_POST['sub_sectors'])) $_POST['sub_sectors']=[$_POST['sub_sectors']];
    
    $sts_sub_sec = array(
                  'key'     =>  'sub_sectors',
                  'value'    =>  $_POST['sub_sectors'],
                  'compare'  => 'IN'
              );

  }
  if($_POST['keyword']!='')
  {
    $keyw = array(
        'relation' => 'OR',
        array(
            'key'     =>  'description',
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
                                        'post_type' => 'success_stories',
                                        'post_status' => 'publish',
                                        'posts_per_page' => 9,
                                        'paged' => $paged,
                                        //'orderby' => 'post_modified',
                                        //'order'   => 'DESC',  
                                        'meta_key' => 'flag',
                                        'orderby'   => 'meta_value post_modified',
                                        'order' => 'DESC',
                                            'meta_query'     =>  array(
                                              array(
                                                  'relation' => 'AND',
                                                  $sts,
                                                  $sts_dept,
                                                  $sts_sub_sec,
                                                  $keyw
                                                )
                                            )
                                
                                        );

                  $blog_posts = new WP_Query($blog_args);
                                        

                  $tot_blog_args = array(
                            'post_type' => 'success_stories',
                            'post_status' => 'publish',
                            'posts_per_page' => -1,
                            'meta_query'     =>  array(
                              array(
                                  'relation' => 'AND',
                                  $sts,
                                  $sts_dept,
                                  $sts_sub_sec,
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
              <div class="col-12 col-lg-4">
                <a href="#">
                  <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/know-your-approvals/state.png" class="nf-w-t1">
                  <span><?php if(is_array($_POST['state'])) echo Implode(',<br>',$_POST['state']);else echo $_POST['state'];?></span>
                </a>
              </div>
            <?php }?>
            <?php if(!empty($_POST['sectors'])){?>
         <div class="col-12 col-lg-4">
                <a href="#">
                  <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/department.png" class="nf-w-t2">
                  <span><?php if(is_array($_POST['sectors'])) echo Implode(',<br>',$_POST['sectors']);else echo $_POST['sectors'];?></span>
                </a>
              </div>
              <?php }?>
              <?php if(!empty($_POST['sub_sectors'])){?>
         <div class="col-12 col-lg-4">
                <a href="#">
                  <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/department.png" class="nf-w-t2">
                  <span><?php if(is_array($_POST['sub_sectors'])) echo Implode(',<br>',$_POST['sub_sectors']);else echo $_POST['sub_sectors'];?></span>
                </a>
              </div>
              <?php }?>
          
            </div> 
          </div>
      <?php }?>

                    <div class="nf-top-filter-wrap">
                        <h2 class="nf-f-size-20 nf-strong mb-0">Total Results (<span id="totcount"><?php echo count($tot_blog_posts->posts);?></span>)</h2>
                        <div class="nf-search-form">
                            <input placeholder="Search here" type="text" name="keyword" value="<?php echo $_POST['keyword']?>">
                            <button type="submit">
                            <i class="ti-search"></i>
                            </button>
                        </div>
                    </div>

                    <div class="nf-know-listing-block mt-4">
                        <div class="row">
                            <div class="col-lg-12 success-storyGallery">

                               <!--  <ul>
                                    <li class="btn-default filter-button" data-filter="all">All</li>
                                    <li class="btn-default filter-button" data-filter="Recent">Recent</li> -->
                                    <!-- <li class="btn-default filter-button" data-filter="Trending">Trending</li>
                                    <li class="btn-default filter-button" data-filter="Title">Title 1</li>
                                    <li class="btn-default filter-button" data-filter="Title2">Title 2</li> -->
                               <!--  </ul> -->
                            </div>
                           
                                              <?php
                                                $record = 0;
                                                while ($blog_posts->have_posts()) {
                                                    $blog_posts->the_post();
                                                    $values = get_fields();
                                       
                                                    // Determine if the URL is a YouTube video, YouTube Short, or youtu.be
                                                    $youtube_url = '';
                                                    $video_url = $values['video_url'];
                                        
                                                    if (strpos($video_url, 'youtube.com/watch') !== false) {
                                                        // Standard YouTube Video
                                                        $video_id = substr($video_url, strpos($video_url, '=') + 1);
                                                        // print_r($video_id);
                                                        $youtube_url = 'https://www.youtube.com/embed/' . $video_id;
                                                    } elseif (strpos($video_url, 'youtube.com/shorts') !== false) {
                                                        // YouTube Shorts
                                                        $video_id = substr($video_url, strrpos($video_url, '/') + 1);
                                                        $video_id = strtok($video_id, '?'); // Remove any query parameters
                                                        // print_r($video_id);
                                                        $youtube_url = 'https://www.youtube.com/embed/' . $video_id;
                                                    } elseif (strpos($video_url, 'youtu.be') !== false) {
                                                        // youtu.be Shortened URL
                                                        $video_id = substr($video_url, strrpos($video_url, '/') + 1);
                                                        $youtube_url = 'https://www.youtube.com/embed/' . $video_id;
                                                    } else {
                                                        // Other URLs (fallback)
                                                        $youtube_url = $video_url;
                                                    }
                                        
                                                    $record++;
                                                ?>

                                        <div class="gallery_product col-lg-4 col-md-6 col-sm-6 col-xs-12 filter Recent">
                                            <div class="galleryBox">
                                                <div class="infoGallery">
                                                    <input type="hidden" id="copylink<?php echo $record?>" value="<?php echo $youtube_url.$final_str; ?>">
                                                    <iframe width="100%" height="300" src="<?php echo $youtube_url.$final_str ?>" frameborder="0" allowfullscreen=""></iframe>
                                                    
                                                    <h4><?php //echo $values['description'];//echo $values['state']; 
                                                    /*if (strlen($values['description']) > 150) {
                                                        $stringCut = substr($values['description'], 0, 150);
                                                        $endPoint = strrpos($stringCut, ' ');
                                                        $values['description'] = $endPoint? substr($stringCut, 0, $endPoint).'...':substr($stringCut, 0).'...';
                                                      } */
                                                      echo $values['description'];
                                                    ?></h4>
                                                
                                                     
                                                    <!--<a id="copylink<?php //echo $record?>" href="<?php// echo $youtube_url.$final_str; ?>" ></a>-->
                                                    <a href="javascript:void(0)" title="Copy Link" class="text-center pt-3"onclick="copyLinkFunction(<?php echo $record?>)">Copy Link</a>
                                                    <!-- <ul>
                                                        <li>17k views</li>
                                                        <li>1 months ago</li>
                                                    </ul> -->
                                                </div>
                                            </div>
                                        </div>
              
                                   

                            
                        <?php } ?>
                        </div>

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
  <?php 
   
 
  get_footer(); 

// function get_youtube($url='https://youtu.be/dyjucZ8EATk')
// {   

//   $video_ID = 'dyjucZ8EATk';
//   $JSON = file_get_contents("https://gdata.youtube.com/feeds/api/videos/{$video_ID}?v=2&alt=json");
//   $JSON_Data = json_decode($JSON);
//   $views = $JSON_Data->{'entry'}->{'yt$statistics'}->{'viewCount'};
//   echo $views;
    
// } 
 
 

  ?>

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
$(document).ready(function(){
    $('.check_sub_sectors').click(function() {
        $('.check_sub_sectors').not(this).prop('checked', false);
        document.getElementById("form_id").submit();
    });
});

$( ".page-link" ).click(function() {
  $('#form_id').attr('action',this.href); 
  $( "#form_id" ).submit();
  //alert(this.href);
  return false;
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
