<?php /* Template Name: Institutes For Women */
 ?>
<?php get_header(); 

$category_id = get_cat_ID ('Institutes For Women');
$categories = get_category( $category_id );

$page_data = get_page_by_path( 'institutes-for-women' );
$logo = get_field( "logo", $page_data->ID );
?>
    <!-- inner-banner-start -->
    <div class="inner-banner">
      <div class="container">
        <div class="banner-title">
          <h3><?php echo $page_data->post_title;?></h3>
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Advancing Girls Advancing North East</a></li>
            <li class="breadcrumb-item active"><?php echo $page_data->post_title;?></li>
          </ul>
        </div>
        <div class="banner-content">
          <div class="row">
            <?php $url = wp_get_attachment_url( get_post_thumbnail_id($post_id) );?>
          <div class="col-md-4 banner-img pr-0"><img src="<?php echo $url?>"></div>
            <div class="col-md-8  pl-0">
              <div class="bannerbg nf-gradient-12 justify-content-start pt-3 nf-height-100">
                <h4 class="nf-f-size-24"><?php echo $page_data->post_content;?></h4>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- inner-banner-end -->
    <!-- Study tour in north section  -->
    <form method="post" action="<?php echo site_url()?>/institutes-for-women/" id="form_id">
    <div class="inner-body">
      <div class="container">
          <div class="row">
            <div class="col-12 col-lg-4 nf-sidebar-c-width">
              <?php $var = get_field_object('field_610b8a3699e74');?>
              <div class="courses-details-sidebar-area search-sidebar nf-sidebar">
                <div class="widget mb-20 widget-padding white-bg">
                  <a class="btn-link nf-color-1" data-toggle="collapse" href="#state-filter">
                    <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/state-white.png" alt="state-white"> <span> State (<?php echo count($var['choices']);?>)</span></a>
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
                              <input class="check_state" value="'.$choice.'" type="checkbox" '.$checked.' id="state_'.$k.'" name="state[]" onclick="javascript:this.form.submit()">
                              <label for="state_'.$k.'">'.$choice.'</label>
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
  if(!empty($_POST['state']) )
  {
    if(!is_array($_POST['state'])) $_POST['state']=[$_POST['state']];

    $sts_location = array(
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
            'key'     =>  'state',
                  'value'    =>  $_POST['keyword'],
                  'compare'  => 'LIKE'
        ),
        array(
            'key'     =>  'college_name',
                  'value'    =>  $_POST['keyword'],
                  'compare'  => 'LIKE'
        ),
        array(
            'key'     =>  'location',
                  'value'    =>  $_POST['keyword'],
                  'compare'  => 'LIKE'
        )
        
    );
  }

      $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
      $blog_args = array(
                            'post_type' => 'beti_bachao',
                            'post_status' => 'publish',
                            'meta_key'    => 'category',
                            'meta_value'  => 'Institutes For Women',
                            'posts_per_page' => 10,
                            'paged' => $paged, 
                            'meta_query'     =>  array(
                              array(
                                  'relation' => 'AND',
                                  $sts,
                                  $sts_dept,
                                  $sts_location,
                                  $sts_level,
                                  $keyw
                                )
                            )
                            );

      $blog_posts = new WP_Query($blog_args);
                            //echo "<pre>";
                            //print_r($blog_posts);

      $tot_blog_args = array(
                            'post_type' => 'beti_bachao',
                            'post_status' => 'publish',
                            'meta_key'    => 'category',
                            'meta_value'  => 'Institutes For Women',
                            'posts_per_page' => -1,
                            'meta_query'     =>  array(
                              array(
                                  'relation' => 'AND',
                                  $sts,
                                  $sts_dept,
                                  $sts_location,
                                  $sts_level,
                                  $keyw
                                )
                            )
                            );
      $tot_blog_posts = new WP_Query($tot_blog_args);
      ?>
              <div class="col-12 col-lg-8 nf-listing-c-width">
                 <?php if(!empty($_POST['state'])){?>
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
                <div class="nf-top-result-list nf-updetails-wrap women-institute">
                  <div class="row">
                
                      <?php
                            $record=0;
                            while($blog_posts->have_posts()) {
                                $blog_posts->the_post(); 

                                $values= get_fields();
                                
                                if($values)
                                {
                                    $state=''; 
                                    $college_name='';  
                                    $location='';
                                   
                                    $official_website='';
                                    
                                    

                                    foreach($values as $key => $value)
                                    {
                                        if($key=='state'){ $state = $value; }
                                        if($key=='college_name'){ $college_name = $value;  }
                                        if($key=='location'){ $location = $value;  }
                                        
                                         if($key=='official_website'){ $official_website = $value; }
                                                                               
                                  }
                                }

            $record=$record+1;            
      ?>
                
                    <div class="col-xl-6 col-lg-12">
                      <div class="nf-cart">
                        <div class="nf-cart-header greenbg">
                          <div class="nf-left-content">
                            <span class="nf-updetails-logo"><img src="<?php echo $logo;?>" alt="university-logo-2.png"></span>
                            <div class="nf-l-title">
                              <h3 class="text-white nf-f-size-16"><?php echo $college_name;?></h3>
                            </div>
                          </div>
                        </div>
                        <div class="cart-body nf-employment-listing p-4">
                          <div class="row mb-2">
                            <span class="col-12 col-md-3 nf-f-size-14">State</span>
                            <label class="col-12 col-md-9 nf-f-size-14"><?php echo $state;?></label>
                          </div>
                          <div class="row">
                            <span class="col-12 col-md-3 nf-f-size-14">Location:</span>
                            <label class="col-12 col-md-9 nf-f-size-14"><?php echo $location;?></label>
                          </div>
                          <hr>
                          <div class="row">
                            <span class="col-12 col-md-3 nf-f-size-14"><?php if($official_website!='') echo 'Website:';else echo '&nbsp;';?></span>
                            <label class="col-12 col-md-9 nf-f-size-14"><a target="_blank" href="<?php if($official_website!='') echo $official_website;else echo '&nbsp;';?>"><?php echo $official_website;?> </a></label>
                          </div>
                        </div>
                      </div>
  
                    </div>

                    
  <?php //}

  }

  
  ?>
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

document.body.scrollTop = 500;
document.documentElement.scrollTop = 500;

$( ".page-link" ).click(function() {
  $('#form_id').attr('action',this.href); 
  $( "#form_id" ).submit();
  //alert(this.href);
  return false;
});

$(document).ready(function(){
    $('.check_state').click(function() {
        $('.check_state').not(this).prop('checked', false);
        document.getElementById("form_id").submit();
    });
});
</script>

