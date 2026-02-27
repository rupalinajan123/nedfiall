<?php /* Template Name: Education Loan */
?>
<?php get_header(); 
$page_data = get_page_by_path( 'education-loan' );
$logo_image = get_field( "scheme_logo", $page_data->ID );
?>
<!-- header-end -->
    <!-- inner-banner-start -->
    <div class="inner-banner">
      <div class="container">
        <div class="banner-title">
          <h3><?php echo $page_data->post_title;?> </h3>
          <ul class="breadcrumb">
             <?php if($_SESSION['cramb_session']){ echo stripcslashes($_SESSION['cramb_session']); }else{?>
              <li class="breadcrumb-item"><a href="#">Education</a></li>
             <?php }?>
            <li class="breadcrumb-item active"><?php echo $page_data->post_title;?> </li>
           
          </ul>
        </div>
        <div class="banner-content">
          <div class="row">
            <?php $url = wp_get_attachment_url( get_post_thumbnail_id($post_id) );?>
            <div class="col-md-4 banner-img pr-0"><img src="<?php echo $url;?>" alt="Education Loan"></div>
            <div class="col-md-8  pl-0">
              <div class="bannerbg nf-gradient-24 justify-content-start pt-3 nf-height-100">
                <h4 class="nf-f-size-24"><?php echo $page_data->post_content;?> </h4>
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
           <div class="col-12 col-lg-12">
          <?php
  if(!empty($_POST['bank_type']) )
  {
    if(!is_array($_POST['bank_type'])) $_POST['bank_type']=[$_POST['bank_type']];

    $sts_location = array(
                  'key'     =>  'bank_type',
                  'value'    =>  $_POST['bank_type'],
                  'compare'  => 'IN'
              );
  }
  if(!empty($_POST['bank_name']) )
  {
    if(!is_array($_POST['bank_name'])) $_POST['bank_name']=[$_POST['bank_name']];

    $sts_level = array(
                  'key'     =>  'bank_name',
                  'value'    =>  $_POST['bank_name'],
                  'compare'  => 'IN'
              );
  }
  
  
  
  if($_POST['keyword']!='')
  {
    $keyw = array(
        'relation' => 'OR',
        array(
            'key'     =>  'bank_type',
                  'value'    =>  $_POST['keyword'],
                  'compare'  => 'LIKE'
        ),
        array(
            'key'     =>  'bank_name',
                  'value'    =>  $_POST['keyword'],
                  'compare'  => 'LIKE'
        )
        
    );
  }

      //$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
      $blog_args = array(
                            'post_type' => 'education_loan',
                            'post_status' => 'publish',
                             'meta_key'    => 'bank_type',
                             'meta_value'  => 'Public Sector Banks',
                             'posts_per_page' => -1,
                            //'posts_per_page' => 4,
                            //'paged' => $paged, 
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
                            'post_type' => 'education_loan',
                            'post_status' => 'publish',
                            'meta_key'    => 'bank_type',
                             'meta_value'  => 'Public Sector Banks',
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
         

            <div class="nf-top-filter-wrap">
              <h2 class="nf-f-size-20 nf-strong mb-0">Public Sector Banks for Education Loan</h2>
              <form method="post" action="<?php echo site_url()?>/education-loan" id="form_id1">
              <div class="nf-search-form">
               <input placeholder="Search here" type="text" name="keyword" value="<?php echo $_POST['keyword']?>">
                <button type="submit">
                  <i class="ti-search"></i>
                </button>
              </div>
            </form>
            </div>
            
            <div class="nf-cart mt-4">
            	<div class="table-responsive">
            	 <table class="table table-striped theadbg1">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th width="60%">Link/Website</th>
                    </tr>
                  </thead>
                  <tbody>
                <?php
                $record=0;
                            while($blog_posts->have_posts()) {
                                $blog_posts->the_post(); 

                                $values= get_fields();
                                
                                if($values)
                                {
                                    $bank_type=''; 
                                    $bank_name='';  
                                    $bank_linkwebsite='';
                                    

                                    foreach($values as $key => $value)
                                    {
                                        if($key=='bank_type'){ $bank_type = $value; }
                                        if($key=='bank_name'){ $bank_name = $value;  }
                                        if($key=='bank_linkwebsite'){ $bank_linkwebsite = $value;  }
                                       }
                                        
                                    }
                                
            $record=$record+1;         
      ?>

              
                <?php if ($bank_type=='Public Sector Banks') { ?>
                 
              
               
                    <tr>
                      <td><?php echo $bank_name; ?> </td>
                      <td><a target="_blank" href="<?php echo $bank_linkwebsite; ?>"><?php echo $bank_linkwebsite; ?></a></td>
                    </tr>
                 
               <?php } ?>
  <?php //}

  }
  ?>
   </tbody>
                </table>
              </div>
  <?php

  if($record==0) echo 'No Record Found.';

  // Step  3 : Call the Pagination Function Here  
  //if (function_exists("cpt_pagination")) {
   //cpt_pagination($blog_posts->max_num_pages); 
  //}
  ?>
            </div>

          </div>

          <div class="col-12 col-lg-12 mt-4">
   <?php
  if(!empty($_POST['bank_type']) )
  {
    if(!is_array($_POST['bank_type'])) $_POST['bank_type']=[$_POST['bank_type']];

    $sts_location = array(
                  'key'     =>  'bank_type',
                  'value'    =>  $_POST['bank_type'],
                  'compare'  => 'IN'
              );
  }
  if(!empty($_POST['bank_name']) )
  {
    if(!is_array($_POST['bank_name'])) $_POST['bank_name']=[$_POST['bank_name']];

    $sts_level = array(
                  'key'     =>  'bank_name',
                  'value'    =>  $_POST['bank_name'],
                  'compare'  => 'IN'
              );
  }
  
  
  
  if($_POST['keyword']!='')
  {
    $keyw = array(
        'relation' => 'OR',
        array(
            'key'     =>  'bank_type',
                  'value'    =>  $_POST['keyword'],
                  'compare'  => 'LIKE'
        ),
        array(
            'key'     =>  'bank_name',
                  'value'    =>  $_POST['keyword'],
                  'compare'  => 'LIKE'
        )
        
    );
  }

      //$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
      $blog_args = array(
                            'post_type' => 'education_loan',
                            'post_status' => 'publish',
                            'meta_key'    => 'bank_type',
                             'meta_value'  => 'Private Sector Banks',
                             'posts_per_page' => -1,
                            //'posts_per_page' => 4,
                            //'paged' => $paged, 
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
                            'post_type' => 'education_loan',
                            'post_status' => 'publish',
                            'meta_key'    => 'bank_type',
                             'meta_value'  => 'Private Sector Banks',
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
         

            <div class="nf-top-filter-wrap">
              <h2 class="nf-f-size-20 nf-strong mb-0">Private Sector Banks for Education Loan</h2>
             <!-- <form method="post" action="<?php echo site_url()?>/education-loan" id="form_id2">
              <div class="nf-search-form">
                 <input placeholder="Search here" type="text" name="keyword" value="<?php echo $_POST['keyword']?>">
                <button type="submit">
                  <i class="ti-search"></i>
                </button>
              </div>
            </form>-->
            </div>
            
            <div class="nf-cart mt-4">
            	<div class="table-responsive">
            	<table class="table table-striped theadbg2">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th width="60%">Link/Website</th>
                    </tr>
                  </thead>
                  <tbody>
               <?php
                $record=0;
                            while($blog_posts->have_posts()) {
                                $blog_posts->the_post(); 

                                $values= get_fields();
                                
                                if($values)
                                {
                                    $bank_type=''; 
                                    $bank_name='';  
                                    $bank_linkwebsite='';
                                    

                                    foreach($values as $key => $value)
                                    {
                                        if($key=='bank_type'){ $bank_type = $value; }
                                        if($key=='bank_name'){ $bank_name = $value;  }
                                        if($key=='bank_linkwebsite'){ $bank_linkwebsite = $value;  }
                                       }
                                        
                                    }
                                
            $record=$record+1;         
      ?>
              
                <?php if ($bank_type=='Private Sector Banks') { ?>
                 
             
                
                    <tr>
                      <td><?php echo $bank_name; ?> </td>
                      <td><a target="_blank" href="<?php echo $bank_linkwebsite; ?>"><?php echo $bank_linkwebsite; ?></a></td>
                    </tr>
                  
              <?php   } ?>
              <?php //}

  }?>
  </tbody>
                </table>
              </div>
  <?php

  if($record==0) echo 'No Record Found.';

  // Step  3 : Call the Pagination Function Here  
  //if (function_exists("cpt_pagination")) {
   //cpt_pagination($blog_posts->max_num_pages); 
  //}
  ?>
            </div>

          </div>

          <div class="col-12 col-lg-12 mt-4">
             <?php
  if(!empty($_POST['bank_type']) )
  {
    if(!is_array($_POST['bank_type'])) $_POST['bank_type']=[$_POST['bank_type']];

    $sts_location = array(
                  'key'     =>  'bank_type',
                  'value'    =>  $_POST['bank_type'],
                  'compare'  => 'IN'
              );
  }
  if(!empty($_POST['bank_name']) )
  {
    if(!is_array($_POST['bank_name'])) $_POST['bank_name']=[$_POST['bank_name']];

    $sts_level = array(
                  'key'     =>  'bank_name',
                  'value'    =>  $_POST['bank_name'],
                  'compare'  => 'IN'
              );
  }
  
  
  
  if($_POST['keyword']!='')
  {
    $keyw = array(
        'relation' => 'OR',
        array(
            'key'     =>  'bank_type',
                  'value'    =>  $_POST['keyword'],
                  'compare'  => 'LIKE'
        ),
        array(
            'key'     =>  'bank_name',
                  'value'    =>  $_POST['keyword'],
                  'compare'  => 'LIKE'
        )
        
    );
  }

     // $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
      $blog_args = array(
                            'post_type' => 'education_loan',
                            'post_status' => 'publish',
                             'meta_key'    => 'bank_type',
                             'meta_value'  => 'Other Institution',
                             'posts_per_page' => -1,
                            //'posts_per_page' => 4,
                            //'paged' => $paged, 
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
                            'post_type' => 'education_loan',
                            'post_status' => 'publish',
                            'meta_key'    => 'bank_type',
                             'meta_value'  => 'Other Institution',
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
           <div class="nf-top-filter-wrap">
              <h2 class="nf-f-size-20 nf-strong mb-0">Other Institution for Education Loan</h2>
             <!--<form method="post" action="<?php echo site_url()?>/education-loan" id="form_id3">
              <div class="nf-search-form">
                 <input placeholder="Search here" type="text" name="keyword" value="<?php echo $_POST['keyword']?>">
                <button type="submit">
                  <i class="ti-search"></i>
                </button>
              </div>
            </form>-->
            </div>
            
            <div class="nf-cart mt-4">
            	<div class="table-responsive">
            	<table class="table table-striped theadbg3">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th width="60%">Link/Website</th>
                    </tr>
                  </thead>
                  <tbody>
               <?php
                $record=0;
                            while($blog_posts->have_posts()) {
                                $blog_posts->the_post(); 

                                $values= get_fields();
                                
                                if($values)
                                {
                                    $bank_type=''; 
                                    $bank_name='';  
                                    $bank_linkwebsite='';
                                    

                                    foreach($values as $key => $value)
                                    {
                                        if($key=='bank_type'){ $bank_type = $value; }
                                        if($key=='bank_name'){ $bank_name = $value;  }
                                        if($key=='bank_linkwebsite'){ $bank_linkwebsite = $value;  }
                                       }
                                        
                                    }
                                
            $record=$record+1;         
      ?>
              
                <?php if ($bank_type=='Other Institution') { ?>
                  
              
                
                    <tr>
                      <td><?php echo $bank_name; ?> </td>
                      <td><a target="_blank" href="<?php echo $bank_linkwebsite; ?>"><?php echo $bank_linkwebsite; ?></a></td>
                    </tr>
                  
               <?php } ?>
               <?php //}

  }?>
  </tbody>
                </table>
              </div>
  <?php

  if($record==0) echo 'No Record Found.';

  // Step  3 : Call the Pagination Function Here  
  //if (function_exists("cpt_pagination")) {
  // cpt_pagination($blog_posts->max_num_pages); 
  //}
  ?>
            </div>

          </div>

          </div>
        </div>
      </div>
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
  $('#form_id1').attr('action',this.href); 
  $( "#form_id1" ).submit();
  //alert(this.href);
  return false;
});

$( ".page-link" ).click(function() {
  $('#form_id2').attr('action',this.href); 
  $( "#form_id2" ).submit();
  //alert(this.href);
  return false;
});

$( ".page-link" ).click(function() {
  $('#form_id3').attr('action',this.href); 
  $( "#form_id3" ).submit();
  //alert(this.href);
  return false;
});



</script>
