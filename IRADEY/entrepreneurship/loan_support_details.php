<?php /* Template Name: Loan Support Details */
 ?>
<?php get_header();

if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
  $url = "https://";else $url = "http://";
$url.= $_SERVER['HTTP_HOST'];   
$url.= $_SERVER['REQUEST_URI'];
$url = explode('?',$url);   
$url = explode('&loginerror',$url[1]);  
$title = str_replace('-',' ',$url[0]);

//new line
if(!empty($wp_query->query_vars['flag'])){ $title= $wp_query->query_vars['flag']; $title = str_replace('-',' ',$title);}

if($title=='Loans for ST Rural Women')
{
    $_POST['loan_amount']='50,001 to 5,00,000';
    $_POST['cast']='ST';
    $_POST['gender']='Female';
    $_POST['habitat']='Rural';
}
if($title=='Loans upto 5 lakhs')
{
    $_POST['loan_amount']='50,001 to 5,00,000';
    $_POST['cast']='General';
    $_POST['gender']='Male';
    $_POST['habitat']='Urban';
}
if($title=='NEDFi MSME Loans')
{
    $_POST['loan_amount']='More than 23,75 Lakh to 1 Cr';
    $_POST['cast']='General';
    $_POST['gender']='Male';
    $_POST['habitat']='Urban';
}
if($title=='Loans upto 10 Cr')
{
    $_POST['loan_amount']='5 Cr to 10 Cr';
    $_POST['cast']='General';
    $_POST['gender']='Female';
    $_POST['habitat']='Rural';
}





$page_data = get_page_by_path( 'credit-linkage-support-details' );
$logo_image = get_field( "scheme_logo", $page_data->ID );

$qucklinkheading1 = get_field('quick_links_1', $page_data->post_id);
$qucklinkheading2 = get_field('quick_links_2', $page_data->post_id);
$qucklinkheading3 = get_field('quick_links_3', $page_data->post_id);
$qucklinkheading4 = get_field('quick_links_4', $page_data->post_id);

?>
<!-- /end header-bottom -->
    <!-- inner-banner-start -->
    <div class="inner-banner">
      <div class="container">
        <div class="banner-title">
          <h3><?php echo $page_data->post_title;?> </h3>
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Entreprenuearship</a></li>
            <li class="breadcrumb-item active"><?php echo $page_data->post_title;?> </li>
          </ul>
        </div>
        <div class="banner-content">
          <div class="row">
            <?php $url = wp_get_attachment_url( get_post_thumbnail_id($post_id) );?>
            <div class="col-md-4 banner-img pr-0"><img src="<?php echo $url?>" alt="Credit Linkage Support"></div>
            <div class="col-md-8  pl-0">
              <div class="bannerbg nf-gradient-23 justify-content-start pt-3 nf-height-100">
                <h4 class="nf-f-size-24"><?php echo $page_data->post_title;?> </h4>
                <h5><?php echo $page_data->post_content;?></h5>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> 
    <!-- inner-banner-end -->
    <!-- Study tour in north section  -->
    <form method="post" action="<?php echo site_url()?>/credit-linkage-support-details" id="form_id">
    <div class="inner-body">
      <div class="container">
        <div class="row">
          <div class="col-12 col-lg-4 nf-sidebar-c-width">
            <div class="courses-details-sidebar-area search-sidebar nf-sidebar">
              <div class="widget mb-20 widget-padding white-bg">
                <?php $var = get_field_object('field_61011b5f67441');?>
                <a class="btn-link nf-color-pink" data-toggle="collapse" href="#state-filter">
                  <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/loan.png" alt="Loan Amount"> <span> Loan Amount (<?php echo count($var['choices']);?>) </span></a>
                  <div class="widget-link collapse show" id="state-filter">
                    <ul class="sidebar-link nf-sidebar-scroll">
                       <?php 
                      
                      
                        $k=0;
                        foreach($var['choices'] as $choice)
                        {
                          if($_POST['loan_amount']==$choice) $checked = 'checked'; 
                          else if(is_array($_POST['loan_amount']) && in_array($choice,$_POST['loan_amount'])) $checked = 'checked'; 
                          else  $checked = ''; 
                          echo '
                          <li>
                            <div class="nf-checkbox-wrap">
                              <input class="check_loan" value="'.$choice.'" type="checkbox" '.$checked.' id="state_'.$k.'" name="loan_amount[]" >
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
        if(!empty($_POST['loan_amount']) )
              {
                if(!is_array($_POST['loan_amount'])) $_POST['loan_amount']=[$_POST['loan_amount']];
                $sts_loan_amount = array(
                              'key'     =>  'loan_amount',
                              'value'    =>  $_POST['loan_amount'],
                              'compare'  => 'IN'
                          );
              }

            $args = array(
              'post_type' => 'credit_linkage',
                'post_status' => 'publish',
                'posts_per_page' => -1,
                'meta_query'     =>  array(
                              array(
                                  'relation' => 'AND',
                                  $sts_loan_amount
                                )
                            )
            );
            
            $the_query = new WP_Query( $args );
            $return_cast=array();
            if( $the_query->have_posts() ){
              while( $the_query->have_posts() ){ 
                $the_query->the_post(); 
                $values= get_fields();
                $return_cast[]=$values['cast'];
            }
          }

          $return_cast = array_filter(array_unique($return_cast));
          if(!empty($_POST['cast']) && !in_array($_POST['cast'], $return_cast)) $_POST['cast']='';
          wp_reset_query(); 
        //=======ajax end

                   $var = get_field_object('field_61011aa56743d');?>
                  <a class="btn-link nf-color-3" data-toggle="collapse" href="#department-filter">
                    <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/cast.png" alt="Cast"> <span> Caste (<?php echo count($return_cast);?>)</span>
                  </a>

                  <div class="widget-link collapse show" id="department-filter">
                    <ul class="sidebar-link nf-sidebar-scroll">
                     <?php 
                      
                      
                        $k=0;
                        sort($return_cast);
                        //foreach($var['choices'] as $choice)

                        foreach($return_cast as $choice)
                        {
                          if($_POST['cast']==$choice) $checked = 'checked'; 
                          else if(is_array($_POST['cast']) && in_array($choice,$_POST['cast'])) $checked = 'checked'; 
                          else  $checked = ''; 
                          echo '
                          <li>
                            <div class="nf-checkbox-wrap">
                              <input class="check_cast" value="'.$choice.'" type="checkbox" '.$checked.' id="cast_'.$k.'" name="cast" >
                              <label for="cast_'.$k.'">'.$choice.'</label>
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
        if(!empty($_POST['loan_amount']) )
              {
                if(!is_array($_POST['loan_amount'])) $_POST['loan_amount']=[$_POST['loan_amount']];
                $sts_loan_amount = array(
                              'key'     =>  'loan_amount',
                              'value'    =>  $_POST['loan_amount'],
                              'compare'  => 'IN'
                          );
              }
              if(!empty($_POST['cast']) )
              {
                if(!is_array($_POST['cast'])) $_POST['cast']=[$_POST['cast']];
                $sts_cast = array(
                              'key'     =>  'cast',
                              'value'    =>  $_POST['cast'],
                              'compare'  => 'IN'
                          );
              }
              

            $args = array(
              'post_type' => 'credit_linkage',
                'post_status' => 'publish',
                'posts_per_page' => -1,
                'meta_query'     =>  array(
                              array(
                                  'relation' => 'AND',
                                  $sts_loan_amount,
                                  $sts_cast
                                )
                            )
            );
            
            $the_query = new WP_Query( $args );
            $return_gender=array();
         
            if( $the_query->have_posts() ){
              while( $the_query->have_posts() ){ 
                $the_query->the_post(); 
                $values= get_fields();
                $return_gender[]=$values['gender'];
            }
          }
          $return_gender = array_filter(array_unique($return_gender));
          if(!empty($_POST['gender']) && !in_array($_POST['gender'], $return_gender)) $_POST['gender']='';
          wp_reset_query();
        //=======ajax end ?>

                  <?php $var = get_field_object('field_61011aff6743e');?>
                  <a class="btn-link nf-color-5" data-toggle="collapse" href="#Gender-filter">
                    <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/gender.png" alt="Gender"> <span> Gender (<?php echo count($return_gender);?>)</span>
                  </a>
                  <div class="widget-link collapse show" id="Gender-filter">
                    <ul class="sidebar-link">
                       <?php 
                      
                      
                        $k=0;
                        sort($return_gender);
                        //foreach($var['choices'] as $choice)
                        foreach($return_gender as $choice)
                        {
                          if($_POST['gender']==$choice) $checked = 'checked'; 
                          else if(is_array($_POST['gender']) && in_array($choice,$_POST['gender'])) $checked = 'checked'; 
                          else  $checked = ''; 
                          echo '
                          <li>
                            <div class="nf-checkbox-wrap">
                              <input class="check_gender" value="'.$choice.'" type="checkbox" '.$checked.' id="gender_'.$k.'" name="gender" >
                              <label for="gender_'.$k.'">'.$choice.'</label>
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
        if(!empty($_POST['loan_amount']) )
              {
                if(!is_array($_POST['loan_amount'])) $_POST['loan_amount']=[$_POST['loan_amount']];
                $sts_loan_amount = array(
                              'key'     =>  'loan_amount',
                              'value'    =>  $_POST['loan_amount'],
                              'compare'  => 'IN'
                          );
              }
              if(!empty($_POST['cast']) )
              {
                if(!is_array($_POST['cast'])) $_POST['cast']=[$_POST['cast']];
                $sts_cast = array(
                              'key'     =>  'cast',
                              'value'    =>  $_POST['cast'],
                              'compare'  => 'IN'
                          );
              }
              if(!empty($_POST['gender']) )
              {
                if(!is_array($_POST['gender'])) $_POST['gender']=[$_POST['gender']];
                $sts_gender = array(
                              'key'     =>  'gender',
                              'value'    =>  $_POST['gender'],
                              'compare'  => 'IN'
                          );
              }

            $args = array(
              'post_type' => 'credit_linkage',
                'post_status' => 'publish',
                'posts_per_page' => -1,
                'meta_query'     =>  array(
                              array(
                                  'relation' => 'AND',
                                  $sts_loan_amount,
                                  $sts_cast,
                                  $sts_gender
                                )
                            )
            );
            
            $the_query = new WP_Query( $args );
            $return_habitat=array();
            
            if( $the_query->have_posts() ){
              while( $the_query->have_posts() ){ 
                $the_query->the_post(); 
                $values= get_fields();
                $return_habitat[]=$values['habitat'];
            }
          }
          $return_habitat = array_filter(array_unique($return_habitat));
          if(!empty($_POST['habitat']) && !in_array($_POST['habitat'], $return_habitat)) $_POST['habitat']='';
          wp_reset_query();
        //=======ajax end  ?>

                  <?php $var = get_field_object('field_61011b1d6743f');?>
                  <a class="btn-link nf-color-1" data-toggle="collapse" href="#Habitat-filter">
                    <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/habitat.png" alt="Habitat"> <span> Habitat (<?php echo count($return_habitat);?>)</span>
                  </a>
                  <div class="widget-link collapse show" id="Habitat-filter">
                    <ul class="sidebar-link">
                        <?php 
                      
                      
                        $k=0;
                        sort($return_habitat);
                        //foreach($var['choices'] as $choice)
                        foreach($return_habitat as $choice)
                        {
                          if($_POST['habitat']==$choice) $checked = 'checked'; 
                          else if(is_array($_POST['habitat']) && in_array($choice,$_POST['habitat'])) $checked = 'checked'; 
                          else  $checked = ''; 
                          echo '
                          <li>
                            <div class="nf-checkbox-wrap">
                              <input class="check_habitat" value="'.$choice.'" type="checkbox" '.$checked.' id="habitat_'.$k.'" name="habitat" >
                              <label for="habitat_'.$k.'">'.$choice.'</label>
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
  if(!empty($_POST['loan_amount']) )
  {
    if(!is_array($_POST['loan_amount'])) $_POST['loan_amount']=[$_POST['loan_amount']];

    $sts_location = array(
                  'key'     =>  'loan_amount',
                  'value'    =>  $_POST['loan_amount'],
                  'compare'  => 'IN'
              );
  }
  if(!empty($_POST['cast']) )
  {
    if(!is_array($_POST['cast'])) $_POST['cast']=[$_POST['cast']];

    $sts_level = array(
                  'key'     =>  'cast',
                  'value'    =>  $_POST['cast'],
                  'compare'  => 'IN'
              );
  }
  
  if(!empty($_POST['gender']))
  {
    if(!is_array($_POST['gender'])) $_POST['gender']=[$_POST['gender']];

    $sts_dept = array(
                  'key'     =>  'gender',
                  'value'    =>  $_POST['gender'],
                  'compare'  => 'IN'
              );
  }
  if(!empty($_POST['habitat']))
  {
    if(!is_array($_POST['habitat'])) $_POST['habitat']=[$_POST['habitat']];

    $sts = array(
                  'key'     =>  'habitat',
                  'value'    =>  $_POST['habitat'],
                  'compare'  => 'IN'
              );
  }
  if($_POST['keyword']!='')
  {
    $keyw = array(
        'relation' => 'OR',
        array(
            'key'     =>  'scheme_name',
                  'value'    =>  $_POST['keyword'],
                  'compare'  => 'LIKE'
        ),
        array(
            'key'     =>  'funding_agency',
                  'value'    =>  $_POST['keyword'],
                  'compare'  => 'LIKE'
        ),
        array(
            'key'     =>  'whom_to_contact',
                  'value'    =>  $_POST['keyword'],
                  'compare'  => 'LIKE'
        ),
        array(
            'key'     =>  'scheme_benefit',
                  'value'    =>  $_POST['keyword'],
                  'compare'  => 'LIKE'
        )
        
    );
  }

      $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
      $blog_args = array(
                            'post_type' => 'credit_linkage',
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
                            'post_type' => 'credit_linkage',
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

            <div class="col-12 col-lg-3 nf-listing-c-width">

    <?php if(!empty($_POST['loan_amount']) or !empty($_POST['cast']) or !empty($_POST['gender']) or !empty($_POST['habitat'])){?>
      <div class="nf-state-listing-block">
             <div class="row">
              <?php if(!empty($_POST['loan_amount'])){?>
              <div class="col-12 col-lg-3">
                <a href="#">
                  <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/loan.png" class="nf-w-t1">
                  <span><?php if(is_array($_POST['loan_amount'])) echo Implode(',<br>',$_POST['loan_amount']);else echo $_POST['loan_amount'];?></span>
                </a>
              </div>
            <?php }?>
            <?php if(!empty($_POST['cast'])){?>
         <div class="col-12 col-lg-3">
                <a href="#">
                  <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/cast.png" class="nf-w-t2">
                  <span><?php if(is_array($_POST['cast'])) echo Implode(',<br>',$_POST['cast']);else echo $_POST['cast'];?></span>
                </a>
              </div>
              <?php }?>
              <?php if(!empty($_POST['gender'])){?>
         <div class="col-12 col-lg-3">
                <a href="#">
                  <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/gender.png" class="nf-w-t2">
                  <span><?php if(is_array($_POST['gender'])) echo Implode(',<br>',$_POST['gender']);else echo $_POST['gender'];?></span>
                </a>
              </div>
              <?php }?>
              <?php if(!empty($_POST['habitat'])){?>
         <div class="col-12 col-lg-3">
                <a href="#">
                  <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/habitat.png" class="nf-w-t2">
                  <span><?php if(is_array($_POST['habitat'])) echo Implode(',<br>',$_POST['habitat']);else echo $_POST['habitat'];?></span>
                </a>
              </div>
              <?php }?>

            </div> 
          </div>
      <?php }?>
              <div class="nf-top-filter-wrap">
                <h2 class="nf-f-size-20 nf-strong mb-0">Total Results(<span id="totcount"><?php echo $tot_blog_posts->post_count;?></span>)</h2>
                <div class="nf-search-form">
                  <input placeholder="Search here" type="text" name="keyword" value="<?php echo $_POST['keyword']?>">
                  <button type="submit">
                    <i class="ti-search"></i>
                  </button>
                </div>
              </div>
              <div class="nf-top-result-list loan-support-details">


      <?php
      $record=0;
                            while($blog_posts->have_posts()) {
                                $blog_posts->the_post(); 

                                $values= get_fields();
                                
                                if($values)
                                {
                                    $loan_amount=''; 
                                    $cast='';  
                                    $gender='';
                                    $habitat='';
                                    $country='';
                                    $scheme_name=''; 
                                    $funding_agency='';
                                    $whom_to_contact='';  
                                    $scheme_benefit='';

                                    $related_link=''; 

                                    foreach($values as $key => $value)
                                    {
                                        if($key=='loan_amount'){ $loan_amount = $value; }
                                        if($key=='cast'){ $cast = $value;  }
                                        if($key=='gender'){ $gender = $value;  }

                                        if($key=='habitat'){ $habitat = $value; }
                                        if($key=='scheme_name'){ $scheme_name = $value;  }
                                        if($key=='country'){ $country = $value;  }
                                        if($key=='funding_agency'){ $funding_agency = $value;  }
                                        if($key=='whom_to_contact'){ $whom_to_contact = $value;  }
                                        if($key=='scheme_benefit'){ $scheme_benefit = $value;  }

                                        if($key=='related_link'){ $related_link = $value; }
                                       }
                                        
                                    }
                                

            /*if(((isset($_POST) && 
              ($_POST['state']==$state or $_POST['state']=='' or (is_array($_POST['state']) && in_array($state,$_POST['state'])))
              && ($_POST['dept']==$department or $_POST['dept']=='' or (is_array($_POST['dept']) && in_array($department,$_POST['dept'])))
              && ($_POST['course']==$course_name or $_POST['course']=='' or (is_array($_POST['course']) && in_array($course_name,$_POST['course'])))
              && ($_POST['educ']==$mode_of_education or $_POST['educ']=='' or (is_array($_POST['educ']) && in_array($mode_of_education,$_POST['educ'])))
              && ($_POST['level']==$education_level or $_POST['level']=='' or (is_array($_POST['level']) && in_array($education_level,$_POST['level'])))

               && (($_POST['keyword']!='' && (strpos($country, $_POST['keyword']) !== false or strpos($university_name, $_POST['keyword']) !== false or strpos($state, $_POST['keyword']) !== false or strpos($course_name, $_POST['keyword']) !== false or strpos($duration, $_POST['keyword']) !== false or strpos($education_level, $_POST['keyword']) !== false or strpos($mode_of_education, $_POST['keyword']) !== false or strpos($email, $_POST['keyword']) !== false or strpos($contact, $_POST['keyword']) !== false or strpos($address, $_POST['keyword']) !== false)) or $_POST['keyword']=='')

            ) or !isset($_POST)) && $university_type=='Study North-East'){*/ 
            $record=$record+1;         
      ?>


                <div class="nf-cart">
                  <div class="nf-cart-header">
                    <div class="nf-left-content">
                      <div class="nf-l-img">
                        <img src="<?php echo $logo_image; ?>" alt="university-logo.png">
                      </div>
                      <div class="nf-l-title">
                        <h3><?php echo $scheme_name;?></h3>
                        
                      </div>
                    </div>
                    <?php if($country!=''){?>
                    <div class="nf-location-name">
                      <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/map-2.png" alt="map">
                      <span><?php echo $country;?></span>
                    </div>
                  <?php }?>
                  </div>
                  <div class="nf-cart-body">
                    <div class="row">
                      <div class="col-12 col-lg-6">
                        <div class="nf-listing">
                          <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/fees.png" alt="fees">
                          <h4><span>Funding Agency </span><?php echo $funding_agency;?> </h4>
                        </div>
                        <div class="nf-listing">
                          <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/scheme_benefit.png" alt="scheme">
                          <h4><span>Scheme Benefit </span> <?php echo $scheme_benefit;?></h4>
                        </div>                        
                      </div>

                      <div class="col-12 col-lg-6">
                        <div class="nf-listing">
                          <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/call.png" alt="call">
                          <h4><span> Whom to Contact</span> <?php echo $whom_to_contact;?></h4>
                        </div>
                        <div class="nf-listing">
                          <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/test.png" alt="test">
                          <h4><span>Related Link </span> <a href="<?php echo $related_link;?>"><?php echo $related_link;?></a></h4>
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

document.body.scrollTop = 500;
document.documentElement.scrollTop = 500;

$( ".page-link" ).click(function() {
  $('#form_id').attr('action',this.href); 
  $( "#form_id" ).submit();
  //alert(this.href);
  return false;
});

$(document).ready(function(){
    $('.check_loan').click(function() {
        $('.check_loan').not(this).prop('checked', false);
        document.getElementById("form_id").submit();
    });
});
$(document).ready(function(){
    $('.check_cast').click(function() {
        $('.check_cast').not(this).prop('checked', false);
        document.getElementById("form_id").submit();
    });
});
$(document).ready(function(){
    $('.check_gender').click(function() {
        $('.check_gender').not(this).prop('checked', false);
        document.getElementById("form_id").submit();
    });
});
$(document).ready(function(){
    $('.check_habitat').click(function() {
        $('.check_habitat').not(this).prop('checked', false);
        document.getElementById("form_id").submit();
    });
});
</script>
