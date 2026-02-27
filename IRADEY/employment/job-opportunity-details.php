<?php /*Template Name: Job opportunity Details */ ?>
<?php 

if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
  $url = "https://";else $url = "http://";
$url.= $_SERVER['HTTP_HOST'];   
$url.= $_SERVER['REQUEST_URI'];
$url = explode('?',$url);   
$url = explode('&loginerror',$url[1]);  
$title = str_replace('-',' ',$url[0]);

//new line
if(!empty($wp_query->query_vars['flag'])){ $title= $wp_query->query_vars['flag']; $title = str_replace('-',' ',$title);}

if($title!='') $_POST['sector'] = $title;


if($_POST['sector']=='')
{  
      wp_redirect(site_url('job-opportunity'));
      exit; 
}
get_header();



$page_data = get_page_by_path( 'job-opportunity-details' );
$qucklinkheading1 = get_field('quick_links_1', $page_data->post_id);
$qucklinkheading2 = get_field('quick_links_2', $page_data->post_id);
$qucklinkheading3 = get_field('quick_links_3', $page_data->post_id);
$qucklinkheading4 = get_field('quick_links_4', $page_data->post_id);
?>

    <!-- header-end -->
    <!-- inner-banner-start -->
    <div class="inner-banner">
      <div class="container">
        <div class="banner-title">
          <h3><?php echo $page_data->post_title;?> </h3>
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Employment</a></li>
            <li class="breadcrumb-item active"><?php echo $page_data->post_title;?></li>
          </ul>
        </div>
        <div class="banner-content">
          <div class="row">
            <?php $url = wp_get_attachment_url( get_post_thumbnail_id($post_id) );?>
            <div class="col-md-4 banner-img pr-0"><img class="" src="<?php echo $url?>"></div>
            <div class="col-md-8  pl-0">
              <div class="bannerbg nf-gradient-e-1 justify-content-start pt-3 nf-height-100">
                <h4 class="nf-f-size-24"><?php echo $page_data->post_content;?></h4>
                <h5></h5>
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
        <div class="row">
          <div class="col-12 col-lg-4 nf-sidebar-c-width">
            <form id="form_id" method="post" action="<?php echo site_url()?>/job-opportunity-details">
            <div class="courses-details-sidebar-area search-sidebar nf-sidebar mt-0">
              <div class="widget mb-20 widget-padding white-bg">
                <?php $var = get_field_object('field_60d31d4ad0c54');?>
                <a class="btn-link nf-color-1" data-toggle="collapse" href="#state-filter">
                  <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/state-white.png" alt="state-white"> <span> Sectors (<?php echo count($var['choices']);?>) </span></a>
                  <div class="widget-link collapse show" id="state-filter">
                    <ul class="sidebar-link">
                      <?php 
                      
                      
                        $k=0;
                        sort($var['choices']);
                        foreach($var['choices'] as $choice)
                        {
                          if($_POST['sector']==$choice) $checked = 'checked'; 
                          else if(is_array($_POST['sector']) && in_array($choice,$_POST['sector'])) $checked = 'checked'; 
                          else  $checked = ''; 
                          echo '
                          <li>
                            <div class="nf-checkbox-wrap">
                              <input value="'.$choice.'" class="check_sector" type="checkbox" '.$checked.' id="sector_'.$k.'" name="sector">
                              <label for="sector_'.$k.'">'.$choice.'</label>
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
              </form>
            </div>

    <div class="col-12 col-lg-8 nf-listing-c-width">
                <?php if(!empty($_POST['sector'])){?>
      <div class="nf-state-listing-block">
             <div class="row">
              <?php if(!empty($_POST['sector'])){?>
              <div class="col-12 col-lg-6">
                <a href="#">
                  <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/department.png" class="nf-w-t1">
                  <span><?php if(is_array($_POST['sector'])) echo Implode(',<br>',$_POST['sector']);else echo $_POST['sector'];?></span>
                </a>
              </div>
            <?php }?>
            
              

            </div> 
          </div>
      <?php }?>
            <?php

            $blog_args = array(
                                  'post_type' => 'job_opportunities',
                                  'post_status' => 'publish',
                                  //'cat' => $category_id
                                  'meta_key'    => 'sector',
                                  'meta_value'  => $_POST['sector'],
								  'orderby' => 'post_id',
								  'order'   => 'DESC',
								  'posts_per_page' => '1'
                                  );

            $blog_posts = new WP_Query($blog_args);
                                  //echo "<pre>";
                                  //print_r($blog_posts);

                      $record=0;
                            while($blog_posts->have_posts()) {
                                $blog_posts->the_post(); 

                                $values= get_fields();
                                
                                if($values)
                                {
                                    $sector='';
                                    $technical_skills='';
                                    $soft_skills='';
                                    $job_roles='';
                                    
                                    

                                    foreach($values as $key => $value)
                                    {
                                        if($key=='sector'){ $sector = $value;  }  
                                        if($key=='technical_skills'){ $technical_skills = $value;  } 
                                        if($key=='soft_skills'){ $soft_skills = $value;  } 
                                        if($key=='job_roles'){ $job_roles = $value;  } 
                                         
                                    }
                                }
                                $record++;
              
            ?>
    
            
              <div class="nf-top-result-list">
              <h4 class="nf-f-size-20 nf-strong nf-emp-ttl text-uppercase"><?php echo $_POST['sector'];?></h4>
                <div class="row">
                <div class="col-12 nf-jobdetails-card1 ">
                <div class="nf-cart">
                  <div class="nf-cart-header p-3">
                    <div class="nf-left-content">
                      <div class="nf-l-title">
                        <h3 class="text-white nf-f-size-16 mt-0">Key Skill in Demand</h3>
                      </div>
                    </div>
                  </div>
                  <div class="cart-body nf-employment-listing p-3">
           
          
          <div class="row border rounded mx-0 pt-2 mb-3">
            <label class="col-lg-4 col-md-5 col-12 border-right">Technical Skills</label>
            <span class="col-lg-8 col-md-7 col-12 pl-3 pl-lg-5 mb-2"><?php echo $technical_skills?></span>
          </div>

          <div class="row border rounded mx-0 pt-2 mb-3">
            <label class="col-lg-4 col-md-5 col-12 border-right">Soft Skills </label>
            <span class="col-lg-8 col-md-7 col-12 pl-3 pl-lg-5 mb-2"><?php echo $soft_skills?></span>
          </div>
                     
           
          
                  </div>
                </div>
                </div>
        
        <div class="col-12">
                <div class="nf-cart">
                  <div class="nf-cart-header nf-gradient-7 p-3">
                    <div class="nf-left-content">
                      <div class="nf-l-title">
                        <h3 class="text-white nf-f-size-16  mt-0">Job Roles</h3>
                      </div>
                    </div>
                  </div>
                  <div class="cart-body nf-employment-listing  bgwithtext-section p-3">
          <div class="row mb-4 nf-jobrole">
             <div class="col-12">
              <ul>
                <?php if($job_roles!='') $job_roles = explode(',',$job_roles);
                $k=1;
                if(!empty($job_roles)){
                  foreach ($job_roles as $key => $value) {
                    
                    if($k==6) $k=1;

                    $k= $k+1;
                  
                ?>
               <li><div class="box"><span class="bg<?php echo $k +1?>"></span> <?php echo $value;?></div></li>
             <?php } }?>
               
             </ul>
            </div>
            </div>
                  </div>
                </div>
                </div>
        
        <div class="col-12">
                <div class="nf-cart">
                  <div class="nf-cart-header nf-gradient-9 p-3">
                    <div class="nf-left-content">
                      <div class="nf-l-title">
                        <h3 class="text-white nf-f-size-16 mt-0">Major Recruiter</h3>
                      </div>
                    </div>
                  </div>
                  <div class="cart-body nf-employment-listing p-3">
          <!--<h4 class="nf-f-size-16 nf-strong nf-emp-ttl mb-4">Private Sector</h4>-->
          <?php 
                $college = get_post_meta( $post->ID, '_event_recruiter_value_key', true ); 
                $collegedesc = get_post_meta( $post->ID, '_event_recruitername_value_key', true );
                $collegeuniv = get_post_meta( $post->ID, '_event_recruitersector_value_key', true ); 

                if(!empty($college)){

                    if(!empty($college))
                                {
                                    $college = explode('*****',$college);
                                    $collegedesc = explode('*****',$collegedesc);
                                    $collegeuniv = explode('*****',$collegeuniv);
                                    $k=0;
                                    for($i=0;$i<count($college);$i++) 
                                    {
                                        if($k==4) $k=0;
                                        $k = $k+1; 
                                        //if($collegeuniv[$i]=='Private Sector'){
                                ?>

          <div class="row border rounded mx-0 pt-2 mb-3">
            <label class="col-lg-4 col-md-5 col-12 border-right"><?php echo $college[$i];?></label>
            <span class="col-lg-8 col-md-7 col-12 pl-3 pl-lg-5 mb-2"><?php echo $collegedesc[$i];?></span>
          </div>
        <?php //}
              }
            } 
        }?>
         
          <?php /*?>
          <h4 class="nf-f-size-16 nf-strong nf-emp-ttl mt-5 mb-4">Government Sector</h4>

          <?php
          if(!empty($college)){

                    if(!empty($college))
                                {
                                   
                                    $k=0;
                                    for($i=0;$i<count($college);$i++) 
                                    {
                                        if($k==4) $k=0;
                                        $k = $k+1; 
                                        if($collegeuniv[$i]=='Government Sector'){
                                ?>

                          <div class="row border rounded mx-0 pt-2 mb-3">
                            <label class="col-lg-4 col-md-5 col-12 border-right"><?php echo $college[$i];?></label>
                            <span class="col-lg-8 col-md-7 col-12 pl-3 pl-lg-5 text-uppercase mb-2"><strong><?php echo $collegedesc[$i];?></strong></span>
                          </div>
                        <?php }
                              }
                            } 
                        }?><?php */?>
          
                  </div>
                </div>
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

          <?php }

          if($record==0) echo 'No Record Found';
          ?>

          </div>
          
        </div>
      </div>
      <!-- End Study tour in north section  -->

      <!-- footer start -->
    <?php get_footer(); ?>
    <script type="text/javascript">

$(document).ready(function(){
    $('.check_sector').click(function() {
        $('.check_sector').not(this).prop('checked', false);
        document.getElementById("form_id").submit();
    });
});

    document.body.scrollTop = 500;
    document.documentElement.scrollTop = 500;
    </script>