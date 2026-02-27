<?php /*Template Name: Job Alert Details */ ?>
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

//echo $title;exit;

if($title =='Information Technology') $title='Information Technology (IT)';

if($title!='') $_POST['sector'] = $title;

$slug = $_GET['slug'];

if($_POST['sector']=='' && $slug=='')
{  
      wp_redirect(site_url('job-alert'));
      exit; 
}

get_header(); 

$page_data = get_page_by_path( 'job-alert-details' );
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
          <h3>Job Alert </h3>
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Employment</a></li>
            <li class="breadcrumb-item active"><?php echo $page_data->post_title;?></li>
          </ul>
        </div>
        <div class="banner-content">
          <div class="row">
            <?php $url = wp_get_attachment_url( get_post_thumbnail_id($post_id) );?>
            <div class="col-md-4 banner-img pr-0"><img class="" src="<?php echo $url?>"></div><!--h-135--->
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
            <form action="<?php echo site_url()?>/job-alert-details" id="form_id" method="post">
              <input type="hidden" name="sort" id="sort" value="<?php echo $_POST['sort']?>">
            <div class="courses-details-sidebar-area search-sidebar nf-sidebar">
              <div class="widget mb-20 widget-padding white-bg">
                <?php $var = get_field_object('field_60d31343fc238');?>
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

            <?php

              $sts = array(
                            'key'     =>  'status',
                            'value'    =>  'Active',
                            'compare'  => '='
                        );
              $sts_sector = array(
                            'key'     =>  'sector',
                            'value'    =>  $_POST['sector'],
                            'compare'  => '='
                        );

              

        $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
        if($slug==''){
            $blog_args = array(
                                  'post_type' => 'job_alert',
                                  'post_status' => 'publish',
                                  //'meta_key'    => 'sector',
                                  //'meta_value'  => $_POST['sector'],
                                  'posts_per_page' => 10,
                                  'paged' => $paged,
                                  'meta_query'     =>  array(
                                      array(
                                          'relation' => 'AND',
                                          $sts,
                                          $sts_sector,
                                          $keyw
                                        )
                                    )
                                  );

            if($_POST['sort']!='')
              {
                $blog_args['meta_key'] = 'published_date';
                $blog_args['orderby']   = 'meta_value';
                $blog_args['order']  = 'DESC'; 
              }

            $blog_posts = new WP_Query($blog_args);
                                  //echo "<pre>";
                                  //print_r($blog_posts);
            $tot_blog_args = array(
                            'post_type' => 'job_alert',
                            'post_status' => 'publish',
                            'meta_key'    => 'sector',
                            'meta_value'  => $_POST['sector'],
                            'posts_per_page' => -1,
                            'meta_query'     =>  array(
                              array(
                                  'relation' => 'AND',
                                  $sts,
                                  $sts_sector,
                                  $keyw
                                )
                            )
                            );
            $tot_blog_posts = new WP_Query($tot_blog_args);
      }
      else
      {
          $blog_args = array(
                                  'post_type' => 'job_alert',
                                  'post_status' => 'publish',
                                  'name'    => $slug,
                            
                                  'posts_per_page' => 10,
                                  'paged' => $paged,
                                  );

            if($_POST['sort']!='')
              {
                $blog_args['meta_key'] = 'published_date';
                $blog_args['orderby']   = 'meta_value';
                $blog_args['order']  = 'DESC'; 
              }

            $blog_posts = new WP_Query($blog_args);
                                  //echo "<pre>";
                                  //print_r($blog_posts);
            $tot_blog_args = array(
                            'post_type' => 'job_alert',
                            'post_status' => 'publish',
                            'name'    => $slug,
                            'posts_per_page' => -1,
                            );
            $tot_blog_posts = new WP_Query($tot_blog_args);
            
            $_POST['sector'] = get_field( "sector", $blog_posts->posts[0]->ID );
      }
       
            ?>


            <div class="col-12 col-lg-8 nf-listing-c-width">
              <div class="nf-top-filter-wrap justify-content-end">
                <?php if(count($tot_blog_posts->posts)!=0){?>
				<label onclick="sort_function();" class="text-right mb-0">Sort by Latest <a href="javascript:void(0);" class="pl-2"> <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/employment/sort.png" alt="sort"></a></label><?php }?>
              </div>
              <div class="nf-top-result-list nf-updetails-wrap">
                <div class="row">
                <div class="col-12 nf-nedetails-cardblue">
                <div class="nf-cart">
                  <div class="nf-cart-header">
                    <div class="nf-left-content">
                      <div class="nf-l-title">
                        <h3 class="text-white nf-f-size-16"><?php echo $_POST['sector'];?> (<?php echo $tot_blog_posts->post_count;?>)</h3>
                      </div>
                    </div>
                  </div>
                  <div class="cart-body nf-employment-listing p-3">
					

            <?php
                      $record=0;
                            while($blog_posts->have_posts()) {
                                $blog_posts->the_post(); 

                                $values= get_fields();
                                
                                if($values)
                                {
                                    $sector='';
                                    $post_title='';
                                    $no_of_post='';
                                    $post_link='';
                                    $published_date ='';
                                    

                                    foreach($values as $key => $value)
                                    {
                                        if($key=='sector'){ $sector = $value;  }  
                                        if($key=='post_title'){ $post_title = $value;  } 
                                        if($key=='no_of_post'){ $no_of_post = $value;  } 
                                        if($key=='post_link'){ $post_link = $value;  } 
                                        if($key=='published_date'){ $published_date = $value;  } 
                                    }
                                }
                                $record=$record+1;  
              ?>                  

          <div class="nf-cart nf-bxshadow-unset">
					  <div class="nf-cart-header row mx-0 nf-tarquish-bg">
							<h3 class="text-dark nf-f-size-16 mt-0 col-lg-7 col-md-12 mb-0 pl-0"><strong><?php echo $post_title;?> - Post <?php echo $no_of_post;?></strong></h3>
							<h3 class="text-dark nf-f-size-16 mt-0 font-weight-normal col-lg-5 pr-0 col-md-12 text-lg-right mb-0">Published Date <?php echo $published_date;?></h3>
						  </div>

					 <div class="cart-body nf-employment-listing p-3 bg-light">
						<a href="<?php echo $post_link;?>" target="_blank" class="word-break-all text-dark"><?php echo $post_link;?></a>
					  </div>
					  <div class="cart-body nf-employment-listing p-3 ">
                        <input type="hidden" id="copylink<?php echo $record?>" value="<?php echo site_url()?>/job-alert-details/?slug=<?php echo $post->post_name;?>">
                        <a class="" href="javascript:void(0)" title="Copy Link" onclick="copyLinkFunction('<?php echo $record?>')">Copy this Job Alert </a>
                       </div> 

					</div>
          <?php }

          ?>
					
					
                  </div>
                </div>
                </div>
                </div>
                <?php
          if(count($blog_posts->posts)==0) echo 'No Record Found';
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

      $( ".page-link" ).click(function() {
      $('#form_id').attr('action',this.href); 
      $( "#form_id" ).submit();
      //alert(this.href);
      return false;
    });

      function sort_function()
      {
        if($( "#sort" ).val()=='')
        $( "#sort" ).val('sort');
        else
        $( "#sort" ).val('');

        $('#form_id').attr('action',this.href); 
        $( "#form_id" ).submit();
      }
      
      
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