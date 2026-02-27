<?php /*Template Name: Aquaculture Culturetype polyculture1 */ ?>
<?php get_header(); 
$page_data = get_page_by_path( 'aquaculture-polyculture-search' );



$blog_args = array(
  'post_type' => 'polyculture',
  'post_status' => 'publish',
  'title'=>$_POST['polyculture_search'],
  'posts_per_page' => '1',
  
);

$blog_posts = new WP_Query($blog_args);
                            //echo "<pre>";
                            //print_r($blog_posts);



$banner_image = get_field( "banner_image", $blog_posts->posts[0]->ID );
$breed = get_field( "breed", $blog_posts->posts[0]->ID );
if($banner_image=='') $banner_image= get_template_directory_uri(). '/assets/img/no_record_found_banner.png';
?>
<!-- inner-banner-start -->
<div class="inner-banner">
  <div class="container">
    <div class="banner-title">
      <h3><?php echo $page_data->post_title;?><a href="javascript:void(0)" onclick="history.go(-1);" class="changeTopic">Change Topic</a></h3>
      <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Entrepreneurship</a></li>
        <li class="breadcrumb-item"><a href="#">Know your Business</a></li>
        <li class="breadcrumb-item"><a href="#">Agri-Business</a></li>
        <li class="breadcrumb-item"><a href="#">Production</a></li>
        <li class="breadcrumb-item"><a href="#">Aquaculture</a></li>
        <li class="breadcrumb-item">Culture Type</li>
        
        <li class="breadcrumb-item active"><?php echo $page_data->post_title;?></li>
      </ul>
    </div>
    <div class="banner-content">
      <div class="row">
        <div class="col-md-4 banner-img pr-0"><img src="<?php echo $banner_image?>"></div>
        <div class="col-md-8  pl-0">
          <div class="bannerbg nf-gradient-17 justify-content-start p-3 nf-height-100">
            <h4 class="nf-f-size-24 pl-0"><?php echo $breed;//$blog_posts->posts[0]->post_title;?></h4>
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
<div class="inner-body">
  <div class="container">
    <div class="nf-form-wrap">
      <div class="row">
        <div class="col-12 col-lg-4 nf-sidebar-c-width">
          <form method="post" id="form_id">
            <div class="courses-details-sidebar-area search-sidebar nf-sidebar mt-md-5">
              <div class="widget mb-20 widget-padding white-bg">
               
               <?php
               $g=0;
               $args = array(
                'post_type'   => 'polyculture',
                'orderby' => 'post_id',
                'order'   => 'ASC',
                'post_status' => 'publish',
                'posts_per_page' => -1
              );
               $the_query = new WP_Query( $args );
               ?>
               <a class="btn-link nf-color-3" data-toggle="collapse" href="#Crop-filter">
                
                <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/fish-value-chain.png" alt="education"> <span>Polyculture (<?php echo $the_query->post_count?>)</span>
              </a>
              <div class="widget-link collapse show" id="Crop-filter">
                <ul class="sidebar-link">
                 
                 <?php
                 
                 if( $the_query->have_posts() ): 
                   while( $the_query->have_posts() ) : $the_query->the_post(); 
                    $g++;
                    $croptile = $post->post_title;
                    $checked='';
                    if($_POST['polyculture_search']==$croptile) $checked = 'checked';
                    ?>
                    <li>
                      <div class="nf-checkbox-wrap">
                        <input value="<?php the_title();?>" <?php echo $checked;?> class="check_imc" type="checkbox"  id="state_<?php echo $g;?>" name="polyculture_search" >
                        <label for="state_<?php echo $g;?>"><?php the_title();?></label>
                      </div>
                    </li>
                  <?php endwhile; ?>
                <?php endif; ?>
                
                
                

              </ul>
            </div>
            
            
          </div>

        </form>
      </div>
    </div>
    

    <div class="col-12 col-lg-8 nf-listing-c-width">

      <?php if(!empty($_POST['polyculture_search']) ){?>
        <div class="nf-state-listing-block">
         <div class="row">
          <?php if(!empty($_POST['polyculture_search'])){?>
            <div class="col-12 col-lg-6">
              <a href="#">
                <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/fish-value-chain.png" class="nf-w-t1">
                <span><?php if(is_array($_POST['polyculture_search'])) echo Implode(',<br>',$_POST['polyculture_search']);else echo $_POST['polyculture_search'];?></span>
              </a>
            </div>
          <?php }?>
          
        </div> 
      </div>
    <?php }?>

    <!--<h4 class="nf-f-size-20 nf-strong mb-4">Imporatnat Parameters</h4>-->
    <div class="row">
      
      <?php
      $record=0;
      while($blog_posts->have_posts()) {
        $blog_posts->the_post(); 

        $values= get_fields();

        $view_complete_details=$values['view_complete_details'];
        
        if($values)
        {
          $imc=''; 
          $breed=''; 
          $percentage_combination='';  
          $farm_gate='';

          $stocking_density_mthayear=''; 
          $water_ph='';  
          $dissolved_oxygen=''; 
          $ammonia_concentration=''; 
          $pond='';
          $cage='';
          $explore_raw_material='';
          

          foreach($values as $key => $value)
          {
            if($key=='imc'){ $imc = $value; }
            if($key=='breed'){ $breed = $value;  }
            if($key=='percentage_combination'){ $percentage_combination = $value;  }

            if($key=='farm_gate'){ $farm_gate = $value; }
            if($key=='stocking_density_mthayear'){ $stocking_density_mthayear = $value;  }
            if($key=='water_ph'){ $water_ph = $value;  }
            if($key=='dissolved_oxygen'){ $dissolved_oxygen = $value;  }
            if($key=='ammonia_concentration'){ $ammonia_concentration = $value;  }
            if($key=='pond'){ $pond = $value;  }
            if($key=='cage'){ $cage = $value;  }
            if($key=='explore_raw_material'){ $explore_raw_material = $value;  }

            $water_ph = $values['water_parameter']['water_ph'];
            $dissolved_oxygen = $values['water_parameter']['dissolved_oxygen'];
            $ammonia_concentration = $values['water_parameter']['ammonia_concentration'];
            $stocking_density_mthayear = $values['water_parameter']['stocking_density_mthayear'];
            
          }
        }

            /*if(((isset($_POST) && 
              ($_POST['imc']==$imc or $_POST['imc']=='' or (is_array($_POST['imc']) && in_array($imc,$_POST['imc'])))
              
              

               && (($_POST['keyword']!='' && (strpos($breed, $_POST['keyword']) !== false)) or $_POST['keyword']=='')

             ) or !isset($_POST))){ */
              $record=$record+1;         
              ?>
              <div class="col-12 col-lg-12">
                <h4 class="nf-f-size-20 nf-strong mb-4">Water Parameters</h4>
                <div class="row">
                  <div class="col-lg-4 col-md-6  mb-4 parameter_box ">
                    <div class="nf-gradient-5">
                      <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/soil-ph.png" alt="image" class="img-fluid">
                      <h4 class="nf-f-size-16 text-white">Water pH</h4>
                      <h2><?php echo $water_ph; ?></h2>
                    </div>
                  </div>
                  
                  <div class="col-lg-3 col-md-6  mb-4 parameter_box ">
                    <div class="nf-gradient-4">
                      <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/soil-ph.png" alt="image" class="img-fluid">
                      <h4 class="nf-f-size-16 text-white">Dissolved Oxygen</h4>
                      <h2><?php echo $dissolved_oxygen; ?></h2>
                    </div>
                  </div>

                  <div class="col-lg-3 col-md-6  mb-4 parameter_box ">
                    <div class="nf-gradient-3">
                      <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/soil-ph.png" alt="image" class="img-fluid">
                      <h4 class="nf-f-size-16 text-white">Ammonia Concentration</h4>
                      <h2><?php echo $ammonia_concentration; ?></h2>
                    </div>
                  </div>
                  <?php if($explore_raw_material!=''){ ?>
                    <div class="col-12 col-lg-2">
                      <div class="row">
                        <div class="col-lg-12 col-md-12 parameter_box databank_box">
                          <div class="nf-gradient-20">

                            <h4 class="nf-f-size-16 text-white">Explore Raw Material  </h4>
                             <a href="<?php echo $explore_raw_material;?>" target="_blank">NER DATABASE</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  <?php }?>
                </div>
                <div class="row">
                  <div class="col-lg-6 col-md-6  mb-4 parameter_box ">
                    <div class="nf-gradient-3">
                      <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/soil-ph.png" alt="image" class="img-fluid">
                      <h4 class="nf-f-size-16 text-white">Stocking Density (MT/Ha/Year)</h4>
                      <h2><?php echo $stocking_density_mthayear; ?></h2>
                    </div>
                  </div>
                </div>
                
                
              </div>
              <div class="col-12 col-lg-12">
                <h4 class="nf-f-size-20 nf-strong mb-4"></h4>
                <div class="nf-top-result-list">
                  <div class="nf-high-education mt-4">
                    <div class="nf-cart">
                      <div class="table-responsive">
                        <table class="table table-striped" border="1" style="border: 1px solid #ccd0d4;">
                          <thead>
                            <tr>
                              <th rowspan="2" style="vertical-align: middle;">Breed</th>
                              <th rowspan="2" style="vertical-align: middle;">Percentage Combination</th>
                              <th colspan="2" style="text-align: center;">Yield</th>                      
                              <th rowspan="2" style="vertical-align: middle;">Farm Gate Price</th>
                            </tr>
                            <tr>
                              <th >Pond</th>
                              <th>Cage</th>
                            </tr>
                          </thead>
                          <tbody>

                            <?php
                            $polyc1 = get_post_meta( $post->ID, '_event_polyc1_value_key', true ); 
                            $polyc2 = get_post_meta( $post->ID, '_event_polyc2_value_key', true );
                            $polyc3 = get_post_meta( $post->ID, '_event_polyc3_value_key', true ); 
                            $polyc4 = get_post_meta( $post->ID, '_event_polyc4_value_key', true ); 
                            $polyc5 = get_post_meta( $post->ID, '_event_polyc5_value_key', true ); 
                            if(!empty($polyc1))
                            {
                              $polyc1 = explode('*****',$polyc1);
                              $polyc2 = explode('*****',$polyc2);
                              $polyc3 = explode('*****',$polyc3);
                              $polyc4 = explode('*****',$polyc4);
                              $polyc5 = explode('*****',$polyc5);
                              
                              $k=0;
                              for($i=0;$i<count($polyc1);$i++) 
                              {
                                ?>
                                
                                <tr>
                                  <td><?php echo $polyc1[$i];?></td>
                                  <td><?php echo $polyc3[$i];?></td>
                                  <td><?php echo $polyc2[$i];?></td>
                                  
                                  <td><?php echo $polyc4[$i];?></td>
                                  <td><?php echo $polyc5[$i];?></td>
                                </tr>
                                <?php
                              }
                            }
                            ?>
                            
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                  
                </div>
                
                


                

              </div>
              <div class="col-12 col-lg-12">

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
                        'value'    => 'Aquaculture',
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
                 ?><?php*/?>

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
                  'value'    => 'Aquaculture',
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
            'value'    => 'Aquaculture',
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
      'value'    => 'Aquaculture',
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
        <?php }

          //}

        if($record==0) echo 'No Record Found.';
        ?>
      </div>
    </div>
  </div>


</div>


</div>

</div>

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

// window.onload = function(){
// jQuery("#totcount").html('<?php //echo $record;?>');
// };

document.body.scrollTop = 650;
document.documentElement.scrollTop = 650;

$(document).ready(function(){
  $('.check_imc').click(function() {
    $('.check_imc').not(this).prop('checked', false);
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
document.body.scrollTop = 500;
document.documentElement.scrollTop = 500;
</script>