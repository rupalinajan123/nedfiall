<?php /*Template Name: Map Details */ 
/* Template Post Type: map */
?>
<?php 
//if($_GET['map']!='') $_POST['map'] = $_GET['map'];

if($_POST['map']=='')
{  
      //wp_redirect(site_url('map'));
      //exit; 
}

get_header();  

$months = array('','January','February','March','April','May','June','July ','August','September','October','November','December');

$record=0;
if($_POST['map']!='')
{
                $blog_args = array(
                            'post_type' => 'map',
                            'post_status' => 'publish',
                            'title' =>$_POST['map'],
                            'posts_per_page' => '1'
                            );
}
else
{
              $current_slug = add_query_arg( array(), $wp->request );
              $current_slug = explode('/',$current_slug);
              $the_slug = end($current_slug);
              $type = $current_slug[count($current_slug) - 2];

              $blog_args = array(
                            'post_type' => 'map',
                            'post_status' => 'publish',
                            'name' =>$the_slug,
                            'posts_per_page' => '1'
                            );
}


$blog_posts = new WP_Query($blog_args);
     //  echo "<pre>";
     //   print_r($blog_posts);exit;

$banner_image = get_field( "banner_image", $blog_posts->posts[0]->ID );
if($_POST['map']=='') $_POST['map'] = $blog_posts->posts[0]->post_title;

if($banner_image=='') $banner_image= get_template_directory_uri(). '/assets/img/no_record_found_banner.png';


$page_data = get_page_by_path( 'maps' );

 ?>
<!-- header-end -->

    <!-- inner-banner-start -->
    <div class="inner-banner">
        <div class="container">
           <div class="banner-title">
                <!--<h3><?php //echo $_POST['map'];?> <a href="javascript:void(0)"  class="changeTopic">Change Topic</a></h3>--> <!--onclick="history.go(-1);"-->
                <!--<h3><?php //echo $blog_posts->posts[0]->post_title;?> <a href="#" class="changeTopic" data-toggle="collapse" data-target="#changeTopic">Change Topic</a></h3>-->
                <h3><?php echo $_POST['map']; //$_POST['animal'];?> <a href="#" class="changeTopic" data-toggle="collapse" data-target="#changeTopic" >Change Topic</a></h3>

                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Entrepreneurship</a></li>
                    <li class="breadcrumb-item"><a href="#">Know your Business</a></li>
                    <li class="breadcrumb-item"><a href="#">Agri-Business</a></li>
                    <li class="breadcrumb-item"><a href="#">Production</a></li>
                    <li class="breadcrumb-item"><a href="#">Map</a></li>
                    <li class="breadcrumb-item active"><?php echo $_POST['map'];?></li>
                </ul>
            </div>

<div class="chagetopic-modal changeTopic-collapse">
          <div class="collapse " id="changeTopic" style="">
            <a href="#" id="changeTopic_close"><i class="fa fa-close"></i></a>
            <div class="card card-body">
              <h4>Categories</h4>
              <div class="row">
                          <div class="col-md-4">
                            <ul>
                              <li>
                                <a href="<?php echo site_url()?>/maps/agar-aquilaria-agallocha">Agar (Aquilaria agallocha)</a>
                              </li>
                              <li>
                                <a class="box" href="<?php echo site_url()?>/maps/patchouli-pogostemon-cablin">Patchouli (Pogostemon cablin)</a>
                              </li>
                              <li>
                                <a class="box" href="<?php echo site_url()?>/maps/stevia-stevia-rebaudiana/">Stevia (Stevia rebaudiana)</a>
                              </li>
                              <li>
                                <a class="box" href="<?php echo site_url()?>/maps/lemongrass-cymbopogon-flexuosus">Lemongrass (Cymbopogon flexuosus)</a>
                              </li>
                              <li>
                                <a class="box" href="<?php echo site_url()?>/maps/citronella-cymbopogon-winterianus">Citronella (Cymbopogon Winterianus)</a>
                              </li>
                              <li>
                                <a class="box" href="<?php echo site_url()?>/maps/vetiver-vetiveria-zizaniodes">Vetiver (Vetiveria zizaniodes)</a>
                              </li>
                            </ul>
                          </div>
                          
                          <div class="col-md-4">
                            <ul>
                              <li>
                                <a class="box" href="<?php echo site_url()?>/maps/sugandhmantri-gondhi-homalomena-aromatica">Sugandhmantri / Gondhi (Homalomena aromatica)</a>
                              </li>
                              <li>
                                <a class="box" href="<?php echo site_url()?>/maps/sarpagandha-rauvolfia-serpentina-family-apocynaceae">Sarpagandha (Rauvolfia serpentina, Family: Apocynaceae)</a>
                              </li>
                              <li>
                                <a class="box" href="<?php echo site_url()?>/maps/tulshi-ocimum-tenuiflorum">Tulshi (Ocimum tenuiflorum)</a>
                              </li>
                              <li>
                                <a class="box" href="<?php echo site_url()?>/maps/brahmi-bacopa-monnieri">Brahmi (Bacopa monnieri)</a>
                              </li>
                              <li>
                                <a class="box" href="<?php echo site_url()?>/maps/ghritkumari-aloe-vera">Ghritkumari (Aloe vera)</a>
                              </li>
                            </ul>
                          </div> 

                          <div class="col-md-4">
                            <h4></h4>
                            <ul>
                              <li>
                                <a class="box" href="<?php echo site_url()?>/maps/pipli">Pipli (Piper longum)</a>
                              </li>
                              <li>
                                <a class="box" href="<?php echo site_url()?>/maps/rosemary-rosemarinus-officinalis">Rosemary (Rosemarinus officinalis)</a>
                              </li>
                              <li>
                                <a class="box" href="<?php echo site_url()?>/maps/coleus-coleus-forskohlii">Coleus (Coleus forskohlii)</a>
                              </li>
                              <li>
                                <a class="box" href="<?php echo site_url()?>/maps/kokum-garcinia-indica">Kokum (Garcinia Indica)</a>
                              </li>
                              <li>
                                <a class="box" href="<?php echo site_url()?>/maps/curry-leaves-murraya-koenigii">Curry leaves (Murraya koenigii)</a>
                              </li>
                            </ul>
                          </div> 
                    
              </div>
            </div>
          </div>
        </div>

            <div class="banner-content">
                <div class="row">
                    <div class="col-md-4 banner-img pr-0"><img src="<?php echo $banner_image; ?>"></div>
                    <div class="col-md-8  pl-0">
                      <div class="bannerbg nf-gradient-3 justify-content-start p-3 nf-height-100">
                        <h4 class="nf-f-size-24 pl-0"></h4>
                        <p class="text-white pr-md-5"><?php echo $blog_posts->posts[0]->post_content;?></p>
                        <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/layers-bg.png" alt="layers background" class="nf-layes-bg">
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- inner-banner-end -->
   <!-- Study tour in north section  -->
   <form method="post" id="form_id" action="<?php echo site_url()?>/map-details">
      <div class="inner-body">
        <div class="container">
            <div class="nf-form-wrap">
              <div class="row">
                <div class="col-12 col-lg-4 nf-sidebar-c-width">
  <div class="courses-details-sidebar-area search-sidebar nf-sidebar mt-md-5">
    <div class="widget mb-20 widget-padding white-bg">
      <?php
            // args
              $g=0;
            $args = array(
              'post_type'   => 'map',
              //'meta_key'    => 'map_type',
              //'meta_value'  => $_POST['map_type'],
              'orderby' => 'post_title',
              'order'   => 'ASC',
              'posts_per_page' => '100'
            );
            $the_query = new WP_Query( $args );

            //echo "<pre>";
            //print_r($the_query);
            ?>
      <a class="btn-link nf-color-1" data-toggle="collapse" href="#state-filter">
        <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/fruit.png" alt="state-white"> <span> Crop (<?php echo $the_query->post_count?>)</span></a>
        <div class="widget-link collapse show" id="state-filter">
          <ul class="sidebar-link nf-sidebar-scroll">
            
            <?php if( $the_query->have_posts() ): ?>
              <?php while( $the_query->have_posts() ) : $the_query->the_post(); 
                $g++;
                $croptile = $post->post_title;
                if($_POST['map']==$croptile) $checked = 'checked'; 
                else if(is_array($_POST['map']) && in_array($croptile,$_POST['map'])) $checked = 'checked'; 
                else  $checked = ''; 
                if($croptile_new!=$croptile){
                ?>
                <li>
                <div class="nf-checkbox-wrap"><!----->
                  <input type="checkbox" class="check_map" name="map" <?php echo $checked;?> id="map<?php echo $g;?>" name="checkbox-group" value="<?php the_title(); ?>" onclick="window.location='<?php echo get_permalink( $post->ID ); ?>'">
                  <label for="map<?php echo $g;?>"><?php the_title(); ?> </label>
                </div>
              </li>

              <?php 
              }
              $croptile_new = $post->post_title;
            endwhile; ?>
            <?php endif; ?>
           
          </ul>
        </div> 
      </div>
    </div>
  </div>
  <div class="col-12 col-lg-8 nf-listing-c-width">
    <?php if(!empty($_POST['map'])){?>
      <div class="nf-state-listing-block">
             <div class="row">
              <?php if(!empty($_POST['map'])){?>
              <div class="col-12 col-lg-12">
                <a href="#">
                  <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/fruit.png" class="nf-w-t1">
                  <span><?php if(is_array($_POST['map'])) echo Implode(',<br>',$_POST['map']);else echo $_POST['map'];?></span>
                </a>
              </div>
            <?php }?>
            

            </div> 
          </div>
      <?php }?>

        <?php 

      while($blog_posts->have_posts()) {
                $blog_posts->the_post(); 

                $values= get_fields();

                $view_complete_details=$values['view_complete_details'];
                
                if($values)
                {
                    $banner_image='';
                    $climate = '';
                    $soil_ph='';
                    $sowing_season_from='';
                    $sowing_season_to='';
                    $harvesting_period='';
                    $yieldha='';
                    $variety='';

                    foreach($values as $key => $value)
                    {
                        
                        if($key=='banner_image'){ $banner_image = $value; }
                        if($key=='climate'){ $climate = $value; }
                        if($key=='soil_ph'){ $soil_ph = $value; }
                        if($key=='sowing_season_from'){ $sowing_season_from = $value; }
                        if($key=='sowing_season_to'){ $sowing_season_to = $value; }
                        if($key=='harvesting_period'){ $harvesting_period = $value; }
                        if($key=='yieldha'){ $yieldha = $value; }
                        if($key=='variety'){ $variety = $value; }
                    }
                }


        //if($map_type=='Map'){
        $record=$record+1;
    ?>
        
      <h4 class="nf-f-size-20 nf-strong mb-4">Important Parameters</h4>
      <div class="row">
        <div class="col-lg-4 col-md-6  mb-4 parameter_box ">
          <div class="nf-gradient-4">
            <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/climate.png" alt="image" class="img-fluid">
            <h4 class="nf-f-size-16 text-white">Climate</h4>
            <h2><?php echo $climate;?> <!--<span>Degree</span>--></h2>
          </div>
        </div>
        <div class="col-lg-4 col-md-6  mb-4 parameter_box ">
          <div class="nf-gradient-3">
            <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/soil-ph.png" alt="image" class="img-fluid">
            <h4 class="nf-f-size-16 text-white">Soil pH</h4>
            <h2><?php echo $soil_ph;?> </h2>
          </div>
        </div>
        <div class="col-lg-4 col-md-6  mb-4 parameter_box ">
          <div class="nf-gradient-5">
            <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/sowing-season2.png" alt="image" class="img-fluid">
            <h4 class="nf-f-size-16 text-white">Sowing Season</h4>
            <h2><?php echo $months[$sowing_season_from].'-'.$months[$sowing_season_to];?></h2>
          </div>
        </div>
		 <div class="col-lg-4 col-md-6  mb-4 parameter_box ">
          <div class="nf-gradient-6">
            <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/harvesting.png" alt="image" class="img-fluid">
            <h4 class="nf-f-size-16 text-white">Harvesting period</h4>
            <h2><?php echo $harvesting_period;?><!--<span>Days</span>--></h2>
          </div>
        </div>
        <div class="col-lg-4 col-md-6  mb-4 parameter_box ">
          <div class="nf-gradient-7">
            <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/wheat-sack.png" alt="image" class="img-fluid">
            <h4 class="nf-f-size-16 text-white">Yield/Hac</h4>
            <h2><?php echo $yieldha;?><!--<span>Mt/Ha</span>--></h2>
          </div>
        </div>
      </div>
      <div class="row">
       
      </div>
      
      <h4 class="nf-f-size-20 nf-strong my-3">Variety</h4>
      
      <div class="bg-gray p-4 row mx-0 mb-3">
        <ul class="five_col_ul vm-variety-wrap-2">
          <?php if(!empty($variety))
          {
             $variety = explode(',',$variety); 
             foreach($variety as $vari)
              echo '<li><a href="javascript:void(0);">'.$vari.'</a></li>';
          }
          ?>
        </ul>
      </div>
      <!--<div class="row">
        <div class="col-lg-6 col-md-12 mb-2 mb-lg-0"><a class="btn nf-button-v-small w-100" href="#" role="button">View Complete Details</a></div>
        <div class="col-lg-6 col-md-12"><a class="btn nf-button-v-orange w-100" href="#" role="button">Download Model Project Profile</a></div>
      </div>-->
      
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




    <?php $postid = $post->ID; ?>


    <section class="nf-s-stories-section nf-tommoto-section">
                  <div class="container">
                    <div class="row">
                      <div class="col-12">
                        <h2>Success Stories <div class="explore-div"><a href="<?php echo site_url()?>/success-stories-details/" class="nf-explore-bgbtn">Explore All Videos </a> <a href="<?php echo site_url()?>/blogs-articles-list/" class="nf-explore-bgbtn ml-3">Explore All Blogs</a></div> </h2>
                      </div>

                    </div>
                    <div class=" success-story-slider">

      <?php
      $suc = get_post_meta( $postid, '_event_suc_value_key', true ); 
      $sucurl = get_post_meta( $postid, '_event_sucurl_value_key', true );
      $sucdesc = get_post_meta( $postid, '_event_sucdesc_value_key', true ); 
      if(!empty($suc))
      {
        $suc = explode('*****',$suc);
        $sucurl = explode('*****',$sucurl);
        $sucdesc = explode('*****',$sucdesc);
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

          <div class="item-box">
            <div class="nf-ss-inner">
              <div class="nf-ss-img-inner">
                            <iframe width="100%" height="200" src="<?php echo $youtube_url.$final_str; ?>" frameborder="0" allowfullscreen=""></iframe>
                          </div>
                          <div class="nf-ss-text-inner">
                            <h5><?php echo $suc[$i];?></h5>
                            <p><?php echo $sucdesc[$i];?></p>
                            <div><input type="hidden" id="copylink<?php echo $i?>ss" value="<?php echo $youtube_url.$final_str; ?>">
                              <a href="javascript:void(0)" title="Copy Link" class="copylink-class" onclick="copyLinkFunction('<?php echo $i?>ss')">Copy Link</a></div>
                            </div>

                          </div>
                        </div>

            <?php 
              }
            }
            ?>
            <?php/*?><?php
          //videos
                      $i=0;
                      $sts = array(
                        'key'     =>  'flag',
                        'value'    => 'In-House',
                        'compare'  => '='
                      );
                      $sts_dept = array(
                        'key'     =>  'sectors',
                        'value'    => 'MAP',
                        'compare'  => '='
                      );
                      
                      $tot_blog_args = array(
                        'post_type' => 'success_stories',
                        'post_status' => 'publish',
                        'posts_per_page' => 5,
                        'meta_query'     =>  array(
                          array(
                            'relation' => 'AND',
                            $sts,
                            $sts_dept

                          )
                        )
                      );
                      $tot_blog_posts = new WP_Query($tot_blog_args);
                      if(count($tot_blog_posts->posts)>0){
                        
                        while($tot_blog_posts->have_posts()) { 

                          $tot_blog_posts->the_post();
                          $values= get_fields();
                          if(strpos($values['video_url'],'youtu')!=false && strpos($values['video_url'],'=')!=false) 
                          {
                            $end_str = strstr($values['video_url'], '='); 
                            $final_str = str_replace('=', '', $end_str);
                            $youtube_url = 'https://www.youtube.com/embed/';
                          } 
                          else
                          {
                            $final_str='';
                            $youtube_url= $values['video_url'];
                          }
                          $description = $values['description'];
                          
                          $i++;
                          ?>
                          <div class="item-box">
                            <div class="nf-ss-inner">
                              <div class="nf-ss-img-inner">

                               <iframe width="100%" height="300" src="<?php echo $youtube_url.$final_str ?>" frameborder="0" allowfullscreen=""></iframe>
                             </div>
                             <div class="nf-ss-text-inner">
                              <h5><?php echo $post->post_title;?></h5>
                              <p><?php
                              if (strlen($description) > 150) {
                                $stringCut = substr($description, 0, 80);
                                $endPoint = strrpos($stringCut, ' ');
                                $description = $endPoint? substr($stringCut, 0, $endPoint).'...':substr($stringCut, 0).'...';
                              } 
                              echo $description;
                            ?></p>
                            <div>


                             <input type="hidden" id="copylink<?php echo $i?>si" value="<?php echo $youtube_url.$final_str; ?>">
                             <a href="javascript:void(0)" title="Copy Link" class="copylink-class" onclick="copyLinkFunction('<?php echo $i?>si')">Copy Link</a>
                             
                             
                           </div>
                           
                         </div>

                       </div>
                     </div>

                   <?php }?>
                 <?php }
                 wp_reset_query();
                 ?><?php */?>
                 <?php
          //blogs=======
                 $i=0;
                 $sts = array(
                  'key'     =>  'flag',
                  'value'    => 'In-House',
                  'compare'  => '='
                );
                 $sts_dept = array(
                  'key'     =>  'sectors',
                  'value'    => 'MAP',
                  'compare'  => '='
                );
                 
                 $tot_blog_args = array(
                  'post_type' => 'blogs_and_articles',
                  'post_status' => 'publish',
                  'posts_per_page' => 5,
                  'meta_query'     =>  array(
                    array(
                      'relation' => 'AND',
                      $sts,
                      $sts_dept

                    )
                  )
                );
                 $tot_blog_posts = new WP_Query($tot_blog_args);
                 if(count($tot_blog_posts->posts)>0){
                  
                  while($tot_blog_posts->have_posts()) { 

                    $tot_blog_posts->the_post();
                    $values= get_fields();
                    if ($values) {
                      $type = '';
                      $flag = '';
                      $image = '';
                      $blog_description = '';
                      $blog_link = '';
                      $description='';

                      foreach($values as $key => $value)
                      {
                        if($key=='image'){ $image = $value; }
                        if($key=='blog_link'){ $blog_link = $value;  }
                        if($key=='blog_description'){ $blog_description = $value;}
                        if($key=='description'){ $description = $value;}
                        if($key=='type'){ $type = $value;} 
                        if($key=='flag'){ $flag = $value;}
                      }
                    }
                    $i++;
                    ?>
                    <div class="item-box">
                      <div class="nf-ss-inner">
                        <div class="nf-ss-img-inner">

                         <img width="100%" height="300" src="<?php echo $image; ?>"></img>
                       </div>
                       <div class="nf-ss-text-inner">
                        <h5><?php echo $post->post_title;?></h5>
                        <p><?php
                        if (strlen($description) > 150) {
                          $stringCut = substr($description, 0, 80);
                          $endPoint = strrpos($stringCut, ' ');
                          $description = $endPoint? substr($stringCut, 0, $endPoint).'...':substr($stringCut, 0).'...';
                        } 
                        echo $description;
                      ?></p>
                      <div>
                       
                       <input type="hidden" id="copylink<?php echo $i?>bi" value="<?php echo get_permalink( $post->ID ); ?>">
                       <a href="javascript:void(0)" title="Copy Link" class="copylink-class" onclick="copyLinkFunction('<?php echo $i?>bi')">Copy Link</a>
                       
                       
                     </div>
                     
                   </div>

                 </div>
               </div>

             <?php }?>
           <?php }
           wp_reset_query();
           ?>

           <?php/*?><?php
          //videos
           $i=0;
           $sts = array(
            'key'     =>  'flag',
            'value'    => 'External',
            'compare'  => '='
          );
           $sts_dept = array(
            'key'     =>  'sectors',
            'value'    => 'MAP',
            'compare'  => '='
          );
           
           $tot_blog_args = array(
            'post_type' => 'success_stories',
            'post_status' => 'publish',
            'posts_per_page' => 5,
            'meta_query'     =>  array(
              array(
                'relation' => 'AND',
                $sts,
                $sts_dept

              )
            )
          );
           $tot_blog_posts = new WP_Query($tot_blog_args);
           if(count($tot_blog_posts->posts)>0){
            
            while($tot_blog_posts->have_posts()) { 

              $tot_blog_posts->the_post();
              $values= get_fields();
              if(strpos($values['video_url'],'youtu')!=false && strpos($values['video_url'],'=')!=false) 
              {
                $end_str = strstr($values['video_url'], '='); 
                $final_str = str_replace('=', '', $end_str);
                $youtube_url = 'https://www.youtube.com/embed/';
              } 
              else
              {
                $final_str='';
                $youtube_url= $values['video_url'];
              }
              $description = $values['description'];
              
              $i++;
              ?>
              <div class="item-box">
                <div class="nf-ss-inner">
                  <div class="nf-ss-img-inner">

                   <iframe width="100%" height="300" src="<?php echo $youtube_url.$final_str ?>" frameborder="0" allowfullscreen=""></iframe>
                 </div>
                 <div class="nf-ss-text-inner">
                  <h5><?php echo $post->post_title;?></h5>
                  <p><?php
                  if (strlen($description) > 150) {
                    $stringCut = substr($description, 0, 80);
                    $endPoint = strrpos($stringCut, ' ');
                    $description = $endPoint? substr($stringCut, 0, $endPoint).'...':substr($stringCut, 0).'...';
                  } 
                  echo $description;
                ?></p>
                <div>


                 <input type="hidden" id="copylink<?php echo $i?>se" value="<?php echo $youtube_url.$final_str; ?>">
                 <a href="javascript:void(0)" title="Copy Link" class="copylink-class" onclick="copyLinkFunction('<?php echo $i?>se')">Copy Link</a>
                 
                 
               </div>
               
             </div>

           </div>
         </div>

       <?php }?>
     <?php }
     wp_reset_query();
     ?><?php*/?>
     
     <?php
     $i=0;
     $sts = array(
      'key'     =>  'flag',
      'value'    => 'External',
      'compare'  => '='
    );
     $sts_dept = array(
      'key'     =>  'sectors',
      'value'    => 'MAP',
      'compare'  => '='
    );
     
     $tot_blog_args = array(
      'post_type' => 'blogs_and_articles',
      'post_status' => 'publish',
      'posts_per_page' => 5,
      'meta_query'     =>  array(
        array(
          'relation' => 'AND',
          $sts,
          $sts_dept

        )
      )
    );
     $tot_blog_posts = new WP_Query($tot_blog_args);
     if(count($tot_blog_posts->posts)>0){
      
      while($tot_blog_posts->have_posts()) { 

        $tot_blog_posts->the_post();
        $values= get_fields();
        if ($values) {
          $type = '';
          $flag = '';
          $image = '';
          $blog_description = '';
          $blog_link = '';
          $description='';

          foreach($values as $key => $value)
          {
            if($key=='image'){ $image = $value; }
            if($key=='blog_link'){ $blog_link = $value;  }
            if($key=='blog_description'){ $blog_description = $value;}
            if($key=='description'){ $description = $value;}
            if($key=='type'){ $type = $value;} 
            if($key=='flag'){ $flag = $value;}
          }
        }
        $i++;
        ?>
        <div class="item-box">
          <div class="nf-ss-inner">
            <div class="nf-ss-img-inner">

             <img width="100%" height="300" src="<?php echo $image; ?>"></img>
           </div>
           <div class="nf-ss-text-inner">
            <h5><?php echo $post->post_title;?></h5>
            <p><?php
            if (strlen($description) > 150) {
              $stringCut = substr($description, 0, 80);
              $endPoint = strrpos($stringCut, ' ');
              $description = $endPoint? substr($stringCut, 0, $endPoint).'...':substr($stringCut, 0).'...';
            } 
            echo $description;
          ?></p>
          <div>
            
           <input type="hidden" id="copylink<?php echo $i?>be" value="<?php echo $blog_link; ?>">
           <a href="javascript:void(0)" title="Copy Link" class="copylink-class" onclick="copyLinkFunction('<?php echo $i?>be')">Copy Link</a>
           
           
         </div>
         
       </div>

     </div>
   </div>

 <?php }?>
<?php }
wp_reset_query();
?>


</div>
</div>
</section>



                <?php
                    $rows = get_post_meta( $postid, '_event_institute_value_key', true );
                    $rows1 = get_post_meta( $postid, '_event_institute_link_key', true );

                        if(!empty($rows))
                        {
                                  ?>
                <!--<h4 class="nf-f-size-16 nf-strong my-3 mb-4 mt-4">Training Institute</h4>-->
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
                            <a href="<?php echo site_url()?>/cost-calculate" class="nf-button-v-small">Calculate Now</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </section>
                <?php 
                $suc = get_post_meta( $postid, '_event_learn_value_key', true ); 
                $sucurl = get_post_meta( $postid, '_event_learnurl_value_key', true );
                    if(!empty($suc))
                                {
                                  ?>

                <section class="nf-learing-section">
                  <!--<h4>Learning Videos</h4>-->
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
              
              if($view_complete_details!=''){?>
            <div class="row">
              <div class="col-lg-12 text-center col-md-12 mb-2 mb-lg-0 vm-vc-detail"><a class="btn nf-button-v-small w-50" href="<?php echo $view_complete_details?>" target="_blank" role="button">View Complete Details</a></div>
            </div>
            <?php }?>
                <?php 
                      $suc = get_post_meta( $postid, '_event_gov_value_key', true ); 
                      $sucurl = get_post_meta( $postid, '_event_govurl_value_key', true );
                    if(!empty($suc))
                                {
                                  ?>

                <section class="nf-rgs">
                 <h4 class="nf-btnTitle">Related Government Schemes <a href="<?php echo site_url()?>/schemes-policies/"  class="nf-explore-bgbtn">Explore All </a></h4>
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
                
              </div>


								
              </div>
            </div>
        </div>
		<div class="circle_bg2 right-0">
			<div class="row mx-0">
			  <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/circle-bg2.png" alt="background image" class="img-fluid">
			</div>
		</div>



      </div>
    </form>
       
   <!-- End Study tour in north section  -->

    <!-- footer start -->   
<?php get_footer(); ?>

<script> 
$(document).ready(function(){
    $('.check_map').click(function() {
        $('.check_map').not(this).prop('checked', false);
        //document.getElementById("form_id").submit();
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
document.body.scrollTop = 500;
document.documentElement.scrollTop = 500;
</script> 