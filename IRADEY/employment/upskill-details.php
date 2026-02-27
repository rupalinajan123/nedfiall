<?php /*Template Name: Upskill Details */ ?>
<?php 

if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
  $url = "https://";else $url = "http://";
$url.= $_SERVER['HTTP_HOST'];   
$url.= $_SERVER['REQUEST_URI'];
$url = explode('?',$url);   
$url = explode('&loginerror',$url[1]);  
$sector = str_replace('-',' ',$url[0]);

//new line
if(!empty($wp_query->query_vars['flag'])){ $sector= $wp_query->query_vars['flag']; $sector = str_replace('-',' ',$sector);}

if(!empty($sector)) $_POST['sector']=$sector;

get_header(); 

$page_data = get_page_by_path( 'upskill-details' );

$qucklinkheading1 = get_field('quick_links_1', $page_data->post_id);
$qucklinkheading2 = get_field('quick_links_2', $page_data->post_id);
$qucklinkheading3 = get_field('quick_links_3', $page_data->post_id);
$qucklinkheading4 = get_field('quick_links_4', $page_data->post_id);

$logo_image = get_field( "logo", $page_data->ID ); 

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
            <div class="col-md-4 banner-img pr-0"><img class="h-135" src="<?php echo $url?>"></div>
            <div class="col-md-8  pl-0">
              <div class="bannerbg nf-gradient-21 justify-content-start pt-3 nf-height-100">
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
    <form method="post" action="<?php echo site_url()?>/upskill-details" id="form_id">
    <div class="inner-body">
      <div class="container">
        <div class="row">
          <div class="col-12 col-lg-4 nf-sidebar-c-width">
            
            <div class="courses-details-sidebar-area search-sidebar nf-sidebar">
              <div class="widget mb-20 widget-padding white-bg">
                <?php/*?>
                <?php $var = get_field_object('field_60cd7d52ed7e6');?>
                
                  <a class="btn-link nf-color-5" data-toggle="collapse" href="#department-filter">
                    <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/study.png" alt="department"> <span>  Certification Level (<?php echo count($var['choices']);?>)</span>
                  </a>
                  <div class="widget-link collapse show" id="department-filter">
                    <ul class="sidebar-link">

                      <?php 
                      
                      
                        $k=0;
                        foreach($var['choices'] as $choice)
                        {
                          if($_POST['level']==$choice) $checked = 'checked'; 
                          else if(is_array($_POST['level']) && in_array($choice,$_POST['level'])) $checked = 'checked'; 
                          else  $checked = ''; 
                          echo '
                          <li>
                            <div class="nf-checkbox-wrap">
                              <input value="'.$choice.'" type="checkbox" '.$checked.' id="level_'.$k.'" name="level[]" onclick="javascript:this.form.submit()">
                              <label for="level_'.$k.'">'.$choice.'</label>
                            </div>
                          </li>
                          ';
                          $k++;
                        }
                        ?>
                    </ul>
                  </div><?php*/?>
                <?php $var = get_field_object('field_60cc9a861aae5');?>
                
                  <a class="btn-link nf-color-2" data-toggle="collapse" href="#department-filter">
                    <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/department.png" alt="department"> <span>  Sector (<?php echo count($var['choices']);?>)</span>
                  </a>
                  <div class="widget-link collapse show" id="department-filter">
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
                              <input class="check_sector" value="'.$choice.'" type="checkbox" '.$checked.' id="sector_'.$k.'" name="sector[]">
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
            
            </div>
            <?php
  if(!empty($_POST['sector']))
  {

    if(!is_array($_POST['sector'])) $_POST['sector']=[$_POST['sector']];
    
    $sts_dept = array(
                  'key'     =>  'sector',
                  'value'    =>  $_POST['sector'],
                  'compare'  => 'IN'
              );

  }
  if(!empty($_POST['level']))
  {
    if(!is_array($_POST['level'])) $_POST['level']=[$_POST['level']];

    $sts = array(
                  'key'     =>  'certification_level',
                  'value'    =>  $_POST['level'],
                  'compare'  => 'IN'
              );
  }
  if($_POST['keyword']!='')
  {
    $keyw = array(
        'relation' => 'OR',
        array(
            'key'     =>  'sector',
                  'value'    =>  $_POST['keyword'],
                  'compare'  => 'LIKE'
        ),
        array(
            'key'     =>  'name',
                  'value'    =>  $_POST['keyword'],
                  'compare'  => 'LIKE'
        ),
        array(
            'key'     =>  'brief_description',
                  'value'    =>  $_POST['keyword'],
                  'compare'  => 'LIKE'
        ),
        array(
            'key'     =>  'issuing_authority',
                  'value'    =>  $_POST['keyword'],
                  'compare'  => 'LIKE'
        ),
        array(
            'key'     =>  'fees_range',
                  'value'    =>  $_POST['keyword'],
                  'compare'  => 'LIKE'
        ),
        array(
            'key'     =>  'website_link',
                  'value'    =>  $_POST['keyword'],
                  'compare'  => 'LIKE'
        ),
        array(
            'key'     =>  'certification_level',
                  'value'    =>  $_POST['keyword'],
                  'compare'  => 'LIKE'
        ),
    );
  }      
      $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
      $blog_args = array(
                            'post_type' => 'upskills',
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
                            //echo "<pre>";
                            //print_r($blog_posts);

      $tot_blog_args = array(
                            'post_type' => 'upskills',
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
      ?>


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
              <div class="nf-top-filter-wrap">
                <h2 class="nf-f-size-20 nf-strong mb-0">Total Results (<span id="totcount"><?php echo $tot_blog_posts->post_count;?></span>)</h2>
                <div class="nf-search-form">
                  <input placeholder="Search here" type="text" name="keyword" value="<?php echo $_POST['keyword']?>">
                  <button type="submit">
                  <i class="ti-search"></i>
                  </button>
                </div>
              </div>
              <div class="nf-top-result-list nf-updetails-wrap">
                <?php
      $record=0;
                            while($blog_posts->have_posts()) {
                                $blog_posts->the_post(); 

                                $values= get_fields();
                                
                                if($values)
                                {
                                    $sector=''; 
                                    $logo=''; 
                                    $name=''; 
                                    $brief_description=''; 
                                    $issuing_authority=''; 
                                    $fees_range=''; 
                                    $website_link=''; 
                                    $certification_level='';

                                    foreach($values as $key => $value)
                                    {
                                        
                                        if($key=='logo'){ $logo = $value;  }
                                        if($key=='sector'){ $sector = $value;  }

                                        if($key=='name'){ $name = $value;  }
                                        if($key=='brief_description'){ $brief_description = $value;  }
                                        if($key=='issuing_authority'){ $issuing_authority = $value;  }
                                        if($key=='fees_range'){ $fees_range = $value;  }
                                        if($key=='website_link'){ $website_link = $value;  }
                                        if($key=='certification_level'){ $certification_level = $value;  }
                                        
                                        
                                    }
                                }

            /*if(((isset($_POST) && 
              ($_POST['sector']==$sector or $_POST['sector']=='' or (is_array($_POST['sector']) && in_array($sector,$_POST['sector'])))

              && ($_POST['level']==$certification_level or $_POST['level']=='' or (is_array($_POST['level']) && in_array($certification_level,$_POST['level'])))

               && (($_POST['keyword']!='' && (strpos($sector, $_POST['keyword']) !== false or strpos($name, $_POST['keyword']) !== false or strpos($issuing_authority, $_POST['keyword']) !== false or strpos($fees_range, $_POST['keyword']) !== false or strpos($website_link, $_POST['keyword']) !== false or strpos($brief_description, $_POST['keyword']) !== false )) or $_POST['keyword']=='')

            ) or !isset($_POST))){ */
            $record=$record+1;         
      ?>



                <div class="nf-cart">
                  <div class="nf-cart-header">
                    <div class="nf-left-content">
                        <span class="nf-updetails-logo"><img src="<?php echo $logo_image;?>" alt="university-logo.png"></span>
                      <div class="nf-l-title">
                        <h3 class="text-white nf-f-size-16"><?php echo $name;?></h3>
                      </div>
                    </div>
                    <div class="nf-location-name">
                      <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/state-white.png" alt="map">
                     <h3 class="text-white nf-f-size-16 pl-3 mb-0"><?php echo $certification_level;?></h3>
                    </div>
                  </div>
                  <div class="cart-body nf-employment-listing p-4 px-5">
                    <div class="row">
                      <div class="col-12 col-lg-8 border-right mb-lg-0 mb-3">
						 <h3 class="nf-f-size-16">Brief</h3>
						 <p class="mb-0"><?php echo $brief_description;?></p>
                      </div>
                      <div class="col-12 col-lg-4">
						<div class="row">
							<div class="col-12 col-md-6 col-lg-8">Issuing Authority</div>
							<label class="col-12 col-md-6 col-lg-4"><?php echo $issuing_authority;?></label>
						</div>
						<div class="row">
							<div class="col-12 col-md-6 col-lg-8">Fees Range</div>
							<label class="col-12 col-md-6 col-lg-4"><?php echo $fees_range;?></label>
						</div>
						<div class="row">
							<div class="col-12 col-md-6 col-lg-8">Website</div>
							<label class="col-12 col-md-6 col-lg-4"><a class="word-break-all" target="_blank" href="<?php echo $website_link;?>">Link</a></label>
						</div>
                      </div>
                    </div>
                  </div>
                </div>

                <?php //}

  }

  if($record==0) echo 'No Record Found.';

  // Step  3 : Call the Pagination Function Here  
  if (function_exists("cpt_pagination")) {
   cpt_pagination($blog_posts->max_num_pages); 
  }
  ?>
  <div>&nbsp;</div>
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

    document.body.scrollTop = 550;
    document.documentElement.scrollTop = 550;

  $( ".page-link" ).click(function() {
  $('#form_id').attr('action',this.href); 
  $( "#form_id" ).submit();
  //alert(this.href);
  return false;
});

$(document).ready(function(){
    $('.check_sector').click(function() {
        $('.check_sector').not(this).prop('checked', false);
        document.getElementById("form_id").submit();
    });
});
    </script>