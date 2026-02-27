<?php /* Template Name: Career Mentor */
?>
<?php get_header(); 

$page_data = get_page_by_path( 'career-mentor' );
//$logo_image = get_field( "logo", $page_data->ID );
$logo_image = get_field( "logo", $page_data->ID ); 

?>


<!-- header-end -->

<!-- inner-banner-start -->
<div class="inner-banner">
  <div class="container">
    <div class="banner-title">
      <h3><?php if($_POST['sector']!='') echo $_POST['sector'];else echo $page_data->post_title; ?></h3>
      <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Resources</a></li>
        <li class="breadcrumb-item"><?php echo $page_data->post_title;?></li>
        <?php if($_POST['sector']!='') {?>
          <li class="breadcrumb-item active"><?php echo $_POST['sector'];?></li>
        <?php }?>
      </ul>
    </div>
    <div class="banner-content">
      <div class="row">
        <div class="col-md-4 banner-img pr-0"><?php echo get_the_post_thumbnail(); ?></div>
        <div class="col-md-8  pl-0">
          <div class="bannerbg nf-gradient-25 justify-content-start pt-3 nf-height-100">
            <h4 class="nf-f-size-24"><?php echo $page_data->post_content;?></h4>
            <h5></h5>
            <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/know-your-approvals/layers-3.png" alt="linear background" class="nf-layes-bg">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- inner-banner-end -->
<!-- Study tour in north section  -->
<form method="post" action="<?php echo site_url()?>/career-mentor" id="form_id">
  <div class="inner-body">
    <div class="container">
      <div class="row">
        <div class="col-12 col-lg-4 nf-sidebar-c-width">
          <div class="courses-details-sidebar-area search-sidebar nf-sidebar">
            <div class="widget mb-20 widget-padding white-bg">
             <?php $var = get_field_object('field_61090437ef1e4');?>
             <a class="btn-link nf-color-1" data-toggle="collapse" href="#state-filter">
              <img src="<?php  echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/sector.png" alt="sector.png"> <span> Sectors (<?php echo count($var['choices']);?>)</span></a>
              <div class="widget-link collapse show" id="state-filter">
               <ul class="sidebar-link nf-sidebar-scroll">

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
                  <input class="check_sector" value="'.$choice.'" type="checkbox" '.$checked.' id="state_'.$k.'" name="sector">
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
            $sector = str_replace(' ','_',strtolower($_POST['sector']));
            if(!empty($_POST['sector']) )
            {
              if(!is_array($_POST['sector'])) $_POST['sector']=[$_POST['sector']];
              $sts_sector = array(
                'key'     =>  'sector',
                'value'    =>  $_POST['sector'],
                'compare'  => 'IN'
              );
            }

            $args = array(
              'post_type' => 'career_coach',
              'post_status' => 'publish',
              'posts_per_page' => -1,
              'meta_query'     =>  array(
                array(
                  'relation' => 'AND',
                  $sts_sector
                )
              )
            );
            
            $the_query = new WP_Query( $args );
            $return_field=array();
            if( $the_query->have_posts() ){
              while( $the_query->have_posts() ){ 
                $the_query->the_post(); 
                $values= get_fields();
                $return_field[]=$values['fields_for_'.$sector];
              }
            }

            $return_field = array_filter(array_unique($return_field));
            if(!empty($_POST['field']) && !in_array($_POST['field'], $return_field)) $_POST['field']='';
            wp_reset_query(); 
        //=======ajax end  

            $var = get_field_object('field_61090574ef1e5');?>

            <a class="btn-link nf-color-2" data-toggle="collapse" href="#department-filter">
              <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/department.png" alt="department"> <span>  Field (<?php echo count($return_field);?>)</span>
            </a>



            <div class="widget-link collapse show" id="department-filter">
              <ul class="sidebar-link nf-sidebar-scroll">



                <?php 

                $k=0;
                sort($return_field);
                //foreach($var['choices'] as $choice)
                foreach($return_field as $choice)
                {
                  if($_POST['field']==$choice) $checked = 'checked'; 
                  else if(is_array($_POST['field']) && in_array($choice,$_POST['field'])) $checked = 'checked'; 
                  else  $checked = '';
                  echo '
                  <li>
                  <div class="nf-checkbox-wrap">
                  <input class="check_field" value="'.$choice.'" type="checkbox" '.$checked.' id="dept_'.$k.'" name="field">
                  <label for="dept_'.$k.'">'.$choice.'</label>
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
      if(!empty($_POST['sector']) )
      {
        if(!is_array($_POST['sector'])) $_POST['sector']=[$_POST['sector']];

        $sts_location = array(
          'key'     =>  'sector',
          'value'    =>  $_POST['sector'],
          'compare'  => 'IN'
        );
      }
      if(!empty($_POST['field']) )
      {
        if(!is_array($_POST['field'])) $_POST['field']=[$_POST['field']];

        $sts_level = array(
          'key'     =>  'fields_for_'.$sector,
          'value'    =>  $_POST['field'],
          'compare'  => 'IN'
        );
      }



      if($_POST['keyword']!='')
      {
        $keyw = array(
          'relation' => 'OR',
          array(
            'key'     =>  'name',
            'value'    =>  $_POST['keyword'],
            'compare'  => 'LIKE'
          ),
          array(
            'key'     =>  'sector',
            'value'    =>  $_POST['keyword'],
            'compare'  => 'LIKE'
          ),
          array(
            'key'     =>  'fields_for_'.$sector,
            'value'    =>  $_POST['keyword'],
            'compare'  => 'LIKE'
          ),



        );
      }

      $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
      $blog_args = array(
        'post_type' => 'career_coach',
        'post_status' => 'publish',
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
        'post_type' => 'career_coach',
        'post_status' => 'publish',
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

        <?php if(!empty($_POST['sector']) or !empty($_POST['field'])) {?>
          <div class="nf-state-listing-block">
           <div class="row">
            <?php if(!empty($_POST['sector'])){?>
              <div class="col-12 col-lg-6">
                <a href="#">
                  <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/sector.png" class="nf-w-t1">
                  <span><?php if(is_array($_POST['sector'])) echo Implode(',<br>',$_POST['sector']);else echo $_POST['sector'];?></span>
                </a>
              </div>
            <?php }?>
          <?php if (!empty($_POST['field'])){ ?>
            <div class="col-12 col-lg-6">
              <a href="#">
                <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/department.png" class="nf-w-t2">
                <span><?php if(is_array($_POST['field'])) echo Implode(',<br>',$_POST['field']);else echo $_POST['field'];?></span>
              </a>
            </div>
          <?php } ?>
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
    <?php
    $record=0;
    while($blog_posts->have_posts()) {
      $blog_posts->the_post(); 

      $values= get_fields();

      if($values)
      {
        $sector=''; 
        $field='';  
        $name='';

        $contact=''; 
        $description='';  
        $link='';


        foreach($values as $key => $value)
        {
          if($key=='sector'){ $sector = $value; }
          $sector1 = str_replace(' ','_',strtolower($sector));
          if($key=='fields_for_'.$sector1){ $field = $value;  }
          if($key=='name'){ $name = $value;  }

          if($key=='contact'){ $contact = $value; }
          if($key=='description'){ $description = $value;  }
          if($key=='link'){ $link = $value;  }

        }
      }
      $record=$record+1;         
      ?>

      <div class="nf-top-result-list career-mentor">
        <div class="row">
          <div class="col-xl-12 col-lg-12">
            <div class="nf-cart">
              <div class="nf-cart-header">
               <div class="nf-left-content">
                <div class="nf-l-img">
                  <img src="<?php echo $logo_image; ?>" alt="university-logo.png">
                </div>
                <div class="nf-l-title">
                  <h3><?php echo $name; ?></h3>
                  <p><?php echo $field; ?></p>
                </div>
              </div>
              <div class="nf-location-name">
                <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/sector.png" alt="sector">
                <span><?php echo $sector; ?></span>
              </div>
            </div>
            <div class="cart-body p-3 ml-4">
              <div class="row mb-3">
                <div class="col-lg-6 col-md-12">
                  <label class="font-weight-normal mb-0 w-100"><img class="nf-img-w-25" src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/course-1.png" alt="call"> Brief Description</label>
                  <label><?php echo $description; ?></label>
                </div>
                <div class="col-lg-6 col-md-12">
                 <span>
                  <label class="font-weight-normal mb-0 w-100"><img class="nf-img-w-25" src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/call.png" alt="call"> Contact</label>
                  <label><?php echo $contact; ?></label>
                </span>

                <label class="w-100 mb-3"><img src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/email.png" alt="link"> Link</label>
                <a href="<?php echo $link; ?>"><?php echo $link; ?></a>
              </div>
            </div>

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
  $('.check_sector').click(function() {
    $('.check_sector').not(this).prop('checked', false);
    document.getElementById("form_id").submit();
  });
});
$(document).ready(function(){
  $('.check_field').click(function() {
    $('.check_field').not(this).prop('checked', false);
    document.getElementById("form_id").submit();
  });
});

</script>
