<?php /*Template Name: Hotels and Resorts Details */ ?>
<?php get_header(); 

$page_data = get_page_by_path( 'hotels-and-resorts' );

$qucklinkheading1 = get_field('quick_links_1', $page_data->post_id);
$qucklinkheading2 = get_field('quick_links_2', $page_data->post_id);
$qucklinkheading3 = get_field('quick_links_3', $page_data->post_id);
$qucklinkheading4 = get_field('quick_links_4', $page_data->post_id);


$record=0;


if($_POST['hotel']!='')
{
              $blog_args = array(
                      'post_type' => 'tourism_adventure',
                      'post_status' => 'publish',
                      'title' =>$_POST['hotel'],
                      'posts_per_page' => '1',
					  'meta_query'     =>  array(

							array(
							  'key'     =>  'types',
							  'value'   =>  'Hotels & Resorts'
							)
						)
                  );
}
else
{
  $current_slug = add_query_arg( array(), $wp->request );
  $current_slug = explode('/',$current_slug);
  $the_slug = end($current_slug);
  $type = $current_slug[count($current_slug) - 2];

	$blog_args = array(
                      'post_type' => 'tourism_adventure',
                      'post_status' => 'publish',
                      'name' =>$the_slug,
                      'posts_per_page' => '1',
					  'meta_query'     =>  array(

							array(
							  'key'     =>  'types',
							  'value'   =>  'Hotels & Resorts'
							)
						)
                  );

}
   


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
     <h3><?php echo $page_data->post_title;?> <a href="<?php echo site_url()?>/hotels-and-resorts/" class="changeTopic">Change Topic</a></h3>
     <ul class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Entrepreneurship</a></li>
      <li class="breadcrumb-item"><a href="#">Know your Business</a></li>
      <li class="breadcrumb-item"><a href="#">Services</a></li>
      <li class="breadcrumb-item"><a href="#">Tourism & Hospitality</a></li>
      <li class="breadcrumb-item"><?php echo $page_data->post_title;?></li>
      <li class="breadcrumb-item active"><?php echo $_POST['activity'];?></li>
    </ul>
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
     
       <div class="col-12 col-lg-4 nf-sidebar-c-width">
        <form method="post" id="form_id" action="<?php echo site_url()?>/hotels-and-resorts-details/">
          <div class="courses-details-sidebar-area search-sidebar nf-sidebar mt-md-5">
            <div class="widget mb-20 widget-padding white-bg">
              <?php $var = get_field_object('field_60d6f5c4de2f5');?>
              <a class="btn-link nf-color-2" data-toggle="collapse" href="#department-filter">
                <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/hotels.png" alt="department"> <span> Hotels</span>
              </a>
              <div class="widget-link collapse show" id="department-filter">
                <ul class="sidebar-link">
            
			<?php
			$args = array(
              'post_type'   => 'tourism_adventure',
              'meta_key'    => 'types',
              'meta_value'  => 'Hotels & Resorts',
              'orderby' => 'post_title',
              'order'   => 'ASC',
              'post_status' => 'publish',
              'posts_per_page' => -1
            );
            $the_query = new WP_Query( $args );

            //echo "<pre>";
            //print_r($the_query);exit;
            ?>
            <?php if( $the_query->have_posts() ): ?>
              <?php while( $the_query->have_posts() ) : $the_query->the_post(); 
                $g++;
                $croptile = $post->post_title;
                if($_POST['hotel']==$croptile) $checked = 'checked'; 
                else if(is_array($_POST['hotel']) && in_array($croptile,$_POST['hotel'])) $checked = 'checked'; 
                else  $checked = ''; 
                if($croptile_new!=$croptile){
                ?>
                <li>
                <div class="nf-checkbox-wrap">
                  <input type="checkbox" class="check_crop" name="hotel" <?php echo $checked;?> id="hotel<?php echo $g;?>" name="checkbox-group" value="<?php the_title(); ?>" onclick="">
                  <label for="hotel<?php echo $g;?>"><?php the_title(); ?> </label>
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
          <?php if(!empty($_POST['hotel']) ) {?>
            <div class="nf-state-listing-block">
             <div class="row">
              <?php if(!empty($_POST['hotel'])){?>
                <div class="col-12 col-lg-4">
                  <a href="#">
                    <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/hotels.png" class="nf-w-t1">
                    <span><?php if(is_array($_POST['hotel'])) echo Implode(',<br>',$_POST['hotel']);else echo $_POST['hotel'];?></span>
                  </a>
                </div>
              <?php }?>
              

        </div> 
      </div>
    <?php }?>
    <div class="nf-top-filter-wrap">
      <h4 class="nf-f-size-20 nf-strong mb-4">Important Parameters</h4>
      <div class="nf-search-form">
        <input placeholder="Search here" type="text" name="keyword" value="<?php echo $_POST['keyword']?>">
        <button type="submit">
          <i class="ti-search"></i>
        </button>
      </div>
    </div>

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
              </form>



                <!--<div class="row">
                  <div class="col-lg-6 col-md-12 mb-2 mb-lg-0"><a class="btn nf-button-v-small w-100" href="#" role="button">View Complete Details</a></div>
                  <div class="col-lg-6 col-md-12"><a class="btn nf-button-v-orange w-100" href="#" role="button">Download Model Project Profile</a></div>
                </div>
                <br>-->
                


                <?php $postid = $post->ID; ?>

  <?php 
  $sts = array(
    'key'     =>  'type',
    'value'    => 'Blog',
    'compare'  => '='
  );
  $sts_dept = array(
    'key'     =>  'sectors',
    'value'    => 'Hospitality and tourism',
    'compare'  => '='
  );
  $tot_blog_args = array(
    'post_type' => 'success_stories',
    'post_status' => 'publish',
    'posts_per_page' => 3,
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
    ?>

    <section class="nf-s-stories-section nf-tommoto-section">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <h2>Success Stories Blog <a href="<?php echo site_url()?>/success-stories/" class="nf-explore-bgbtn">Explore All </a> </h2>
          </div>
        </div>
        <div class="row">

          <?php
          $i=0;
          while($tot_blog_posts->have_posts()) { 

            $tot_blog_posts->the_post();
            $values= get_fields();
            if ($values) {
              $type = '';
              $flag = '';
              $image = '';
              $blog_description = '';
              $blog_link = '';

              foreach($values as $key => $value)
              {
                if($key=='image'){ $image = $value; }
                if($key=='blog_link'){ $blog_link = $value;  }
                if($key=='blog_description'){ $blog_description = $value;}
                if($key=='type'){ $type = $value;} 
                if($key=='flag'){ $flag = $value;}
              }
            }
            $i++;
            ?>
            <div class="col-12 col-lg-4">
              <div class="nf-ss-inner">
                <div class="nf-ss-img-inner">

                 <img width="100%" height="300" src="<?php echo $image; ?>"></img>
               </div>
               <div class="nf-ss-text-inner">
                <h5><?php echo $post->post_title;?></h5>
                <p><?php
                if (strlen($blog_description) > 150) {
                  $stringCut = substr($blog_description, 0, 80);
                  $endPoint = strrpos($stringCut, ' ');
                  $blog_description = $endPoint? substr($stringCut, 0, $endPoint):substr($stringCut, 0);
                } 
                echo $blog_description;
              ?>...</p></br>
              <div>


             <?php if ($flag=='External'): ?>
             <input type="hidden" id="copylink<?php echo $i?>b" value="<?php echo $blog_link; ?>">
               <a href="javascript:void(0)" title="Copy Link" class="copylink-class" onclick="copyLinkFunction('<?php echo $i?>b')">Copy Link</a>
             <?php endif ?>
              
             </div>
                
              </div>

            </div>
          </div>

        <?php }?>



      </div>
    </div>
  </section> <br>
<?php }?>





                <?php 
                $suc = get_post_meta( $postid, '_event_suc_value_key', true ); 
                $sucurl = get_post_meta( $postid, '_event_sucurl_value_key', true );
                $sucdesc = get_post_meta( $postid, '_event_sucdesc_value_key', true ); 
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
                            <input type="hidden" id="copylink<?php echo $i?>" value="<?php echo $youtube_url.$final_str; ?>">
                            <a href="javascript:void(0)" title="Copy Link" class="copylink-class"onclick="copyLinkFunction('<?php echo $i?>')">Copy Link</a>

                          </div>
                          
                        </div>
                      </div>

                      <?php 
                    }
                    ?>

                      <!--<div class="col-12 col-lg-4">
                        <div class="nf-ss-inner">
                          <div class="nf-ss-img-inner">
                            <img src="<?php //echo get_template_directory_uri(). '/assets/'?>img/home/video-img.png" alt="video image">
                            <a href="#">
                              <img src="<?php //echo get_template_directory_uri(). '/assets/'?>img/home/play.png" alt="play">
                            </a>
                          </div>
                          <div class="nf-ss-text-inner">
                            <h5>Organic Farmning</h5>
                            <p>The Commerce and Industry Ministry has suggested business community in the north-east region.</p>
                          </div>
                        </div>
                      </div>
                      <div class="col-12 col-lg-4">
                        <div class="nf-ss-inner">
                          <div class="nf-ss-img-inner">
                            <img src="<?php //echo get_template_directory_uri(). '/assets/'?>img/home/video-img.png" alt="video image">
                            <a href="#">
                              <img src="<?php //echo get_template_directory_uri(). '/assets/'?>img/home/play.png" alt="play">
                            </a>
                          </div>
                          <div class="nf-ss-text-inner">
                            <h5>Handloom & Handicraft</h5>
                            <p>The Commerce and Industry Ministry has suggested business community in the north-east region.</p>
                          </div>
                        </div>
                      </div>-->
                    </div>
                  </div>
                </section>
                <?php
              } 
              ?>
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

                  <!--<div class="item grd-bg1">Agriculture Institute of Guwahati</div>
                  <div class="item grd-bg2">Agriculture Institute of Guwahati</div>
                  <div class="item grd-bg3">Agriculture Institute of Guwahati</div>
                  <div class="item grd-bg4">Agriculture Institute of Guwahati</div>
                  <div class="item grd-bg1">Agriculture Institute of Guwahati</div>
                  <div class="item grd-bg2">Agriculture Institute of Guwahati</div>-->

                </div>
                <?php
              }

              ?>

                <!-- <section class="nf-calculator-section nf-cal-tommoto-wrap">
                  <div class="container">
                    <div class="row">
                      <div class="col-12">
                        <div class="nf-calculator-block">
                          <div class="nf-left-block">
                            <img src="<?php //echo get_template_directory_uri(). '/assets/'?>img/home/calendar.png" alt="calendar">
                            <h2>Farm Cost Calculator <span>Know your Farming cost in advance </span></h2>
                          </div>
                          <div class="nf-right-block">
                            <a href="<?php //echo site_url()?>/cost-calculate" class="nf-button-v-small">Calculate Now</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </section> -->
                <?php 
                $suc = get_post_meta( $postid, '_event_learn_value_key', true ); 
                $sucurl = get_post_meta( $postid, '_event_learnurl_value_key', true );
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



                    <!--<div class="col-12 col-lg-4">
                      <a href="#">
                        <img src="<?php //echo get_template_directory_uri(). '/assets/'?>img/home/startupindia.png" alt="startupindia">
                        <h5>Video Titles</h5>
                      </a>
                    </div>
                    <div class="col-12 col-lg-4">
                      <a href="#">
                        <img src="<?php //echo get_template_directory_uri(). '/assets/'?>img/home/startupindia.png" alt="startupindia">
                        <h5>Video Titles</h5>
                      </a>
                    </div>-->
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
              $suc = get_post_meta( $postid, '_event_gov_value_key', true ); 
              $sucurl = get_post_meta( $postid, '_event_govurl_value_key', true );
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





                    
                    <!--<div class="col-12 col-lg-4">
                      <ul>
                        <li><a href="#"> Finding Purpose & Meaning in Life</a></li>
                        <li><a href="#"> Understanding Medical Research</a></li>
                        <li><a href="#"> Japanese for Beginners</a></li>
                        <li><a href="#"> Introduction to Cloud Computing</a></li>
                        <li><a href="#"> Foundations of Mindfulness</a></li>
                        <li><a href="#"> Fundamentals of Finance</a></li>
                      </ul>
                    </div>
                    <div class="col-12 col-lg-4">
                      <ul>
                        <li><a href="#"> Finding Purpose & Meaning in Life</a></li>
                        <li><a href="#"> Understanding Medical Research</a></li>
                        <li><a href="#"> Japanese for Beginners</a></li>
                        <li><a href="#"> Introduction to Cloud Computing</a></li>
                        <li><a href="#"> Foundations of Mindfulness</a></li>
                        <li><a href="#"> Fundamentals of Finance</a></li>
                      </ul>
                    </div>-->
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
    </div>	


  </div>

</div>

</div>




<!-- End Study tour in north section  -->

<?php get_footer(); ?>
<script> 
  $(document).ready(function(){
    $('.check_crop').click(function() {
        $('.check_crop').not(this).prop('checked', false);
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

document.body.scrollTop = 650;
document.documentElement.scrollTop = 650;
</script> 