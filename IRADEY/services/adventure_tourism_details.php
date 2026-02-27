<?php /* Template Name: Tourism Adventure Details */
?>
<?php get_header(); 

$page_data = get_page_by_path( 'tourism-adventure-details' ); 
$logo_image = get_field( "scheme_logo", $page_data->ID ); 

$qucklinkheading1 = get_field('quick_links_1', $page_data->post_id);
$qucklinkheading2 = get_field('quick_links_2', $page_data->post_id);
$qucklinkheading3 = get_field('quick_links_3', $page_data->post_id);
$qucklinkheading4 = get_field('quick_links_4', $page_data->post_id);

$record=0;
$blog_args = array(
  'post_type' => 'adventure_tourism',  //tourism_adventure
  'post_status' => 'publish', 
  'posts_per_page' => '1',
  'meta_query'     =>  array(


    array(
      'key'     =>  'sports_category',
      'value'   =>  $_POST['sports_category']
    ),

    array(
      'key'     =>  'sports',
      'value'   =>  $_POST['sports']
    )
  ) 
);


$blog_posts = new WP_Query($blog_args);
     //  echo "<pre>";
     //   print_r($blog_posts);exit;

$banner_image = get_field( "banner_image", $blog_posts->posts[0]->ID );
$sportstitle = get_field( "sports", $blog_posts->posts[0]->ID );

//echo '>>'.$banner_image;

if($banner_image=='') $banner_image= get_template_directory_uri(). '/assets/img/no_record_found_banner.png';
$sports_img = $_POST['sports'];
?>

<!-- header-end -->
<!-- inner-banner-start -->
<div class="inner-banner">
  <div class="container">
    <div class="banner-title">
     <h3><?php if($sportstitle!='') echo $sportstitle;else 
     echo 'Adventure Tourism';//$page_data->post_title; ?><a href="<?php echo site_url()?>/tourism-adventure" class="changeTopic">Change Topic</a></h3>
     <ul class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Entrepreneurship</a></li>
      <li class="breadcrumb-item"><a href="#">Know your Business</a></li>
      <li class="breadcrumb-item"><a href="#">Services</a></li>
      <li class="breadcrumb-item"><a href="#">Tourism & Hospitality</a></li>
      <li class="breadcrumb-item ">Adventure Tourism</li>
      <?php if($sportstitle!=''){ ?>
      <li class="breadcrumb-item active"><?php echo $sportstitle;?></li>
    <?php }?>
    </ul>
  </div>
  <div class="banner-content">
    <div class="row">
      <div class="col-md-4 banner-img pr-0"><?php //echo get_the_post_thumbnail(); ?><img src="<?php echo $banner_image ;?>"></div>
      <div class="col-md-8  pl-0">
        <div class="bannerbg nf-gradient-3 justify-content-start p-3 nf-height-100">
          <h4 class="nf-f-size-24 pl-0"><?php echo $blog_posts->posts[0]->post_content;?><?php //echo $page_data->post_content;?></h4>

          <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/layer-shape.png" alt="layers babanner_imageckground" class="nf-layes-bg posr-0">
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<!-- inner-banner-end -->
<!-- Study tour in north section  -->
<form method="post" action="<?php echo site_url()?>/tourism-adventure-details/" id="form_id">
  <div class="inner-body">
    <div class="container">
      <div class="nf-form-wrap">
        <div class="row">
          <div class="col-12 col-lg-4 nf-sidebar-c-width">
            <div class="courses-details-sidebar-area search-sidebar nf-sidebar mt-md-5">
              <div class="widget mb-20 widget-padding white-bg">
                <a class="btn-link nf-color-5" data-toggle="collapse" href="#state-filter">
                  <?php $var = get_field_object('field_611f969f9585e'); ?>
                  <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/sport-category.png" alt="Sports Category"> <span> Sports Category (<?php echo count($var['choices']);?>)</span></a>
                  <div class="widget-link collapse show" id="state-filter">
                   <ul class="sidebar-link">
                    <?php 


                    $k=0;
                    sort($var['choices']);
                    foreach($var['choices'] as $choice)

                    {
                      if($_POST['sports_category']==$choice) $checked = 'checked'; 
                      else if(is_array($_POST['sports_category']) && in_array($choice,$_POST['sports_category'])) $checked = 'checked'; 
                      else  $checked = ''; 
                      echo '
                      <li>
                      <div class="nf-checkbox-wrap">
                      <input value="'.$choice.'" class="check_sports_category" type="checkbox" '.$checked.' id="sports_category_'.$k.'" name="sports_category">
                      <label for="sports_category_'.$k.'">'.$choice.'</label>
                      </div>
                      </li>
                      ';
                      $k++;
                    }
                    ?>

                  </ul>

                  <?php 
                  //=========ajax start
                  if(!empty($_POST['sports_category']) )
                  {
                    if(!is_array($_POST['sports_category'])) $_POST['sports_category']=[$_POST['sports_category']];
                    $sts_sports_category = array(
                      'key'     =>  'sports_category',
                      'value'    =>  $_POST['sports_category'],
                      'compare'  => 'IN'
                    );
                  }

                  $args = array(
                    'post_type' => 'adventure_tourism',
                    'post_status' => 'publish',
                    'posts_per_page' => -1,
                    'meta_query'     =>  array(
                      array(
                        'relation' => 'AND',
                        $sts_sports_category
                      )
                    )
                  );

                  $the_query = new WP_Query( $args ); 
                  $return_sports=array();
                  if( $the_query->have_posts() ){
                    while( $the_query->have_posts() ){ 
                      $the_query->the_post(); 
                      $values= get_fields();
                      $return_sports[]=$values['sports'];
                    }
                  }

                  $return_sports = array_filter(array_unique($return_sports));
                  if(!empty($_POST['sports']) && !in_array($_POST['sports'], $return_sports)) $_POST['sports']='';
                  wp_reset_query(); ?>


                  <a class="btn-link nf-color-1" data-toggle="collapse" href="#department-filter">
                    <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/sports.png" alt="Sports"> <span>  Sports (<?php echo count($return_sports);?>)</span>
                  </a>
                  <div class="widget-link collapse show" id="department-filter">
                    <ul class="sidebar-link">
                      <?php 
                      $var = get_field_object('field_611f96ce9585f');

                      $k=0;
                      sort($return_sports);
                        //foreach($var['choices'] as $choice)
                      foreach($return_sports as $choice)
                      {
                        if($_POST['sports']==$choice) $checked = 'checked'; 
                        else if(is_array($_POST['sports']) && in_array($choice,$_POST['sports'])) $checked = 'checked'; 
                        else  $checked = ''; 
                        echo '
                        <li>
                        <div class="nf-checkbox-wrap">
                        <input value="'.$choice.'" class="check_sports" type="checkbox" '.$checked.' id="sports_'.$k.'" name="sports">
                        <label for="sports_'.$k.'">'.$choice.'</label>
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
          </div>

          <?php

          if(!is_array($_POST['sports_category'])) $_POST['sports_category']=[$_POST['sports_category']];

          $sts_sports_category = array(
            'key'     =>  'sports_category',
            'value'    =>  $_POST['sports_category'],
            'compare'  => 'IN'
          );

          //if(!empty($_POST['sports']) )
          //{
            if(!is_array($_POST['sports'])) $_POST['sports']=[$_POST['sports']];

            $sts_sports = array(
              'key'     =>  'sports',
              'value'    =>  $_POST['sports'],
              'compare'  => 'IN'
            );
          //}



          if($_POST['keyword']!='')
          {
            $keyw = array(
              'relation' => 'OR',
              array(
                'key'     =>  'sports_category',
                'value'    =>  $_POST['keyword'],
                'compare'  => 'LIKE'
              ),
              array(
                'key'     =>  'sports',
                'value'    =>  $_POST['keyword'],
                'compare'  => 'LIKE'
              ),
              array(
                'key'     =>  'guidesinstructors_skills',
                'value'    =>  $_POST['keyword'],
                'compare'  => 'LIKE'
              )

            );
          }

          $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
          $blog_args = array(
            'post_type' => 'adventure_tourism',
            'post_status' => 'publish',
            'posts_per_page' => 4,
            'paged' => $paged, 
            'meta_query'     =>  array(
              array(
                'relation' => 'AND',
                $sts_sports_category,
                $sts_sports,
                $keyw
              )
            )
          );

          $blog_posts = new WP_Query($blog_args);
                            //echo "<pre>";
                            //print_r($blog_posts);

          $tot_blog_args = array(
            'post_type' => 'adventure_tourism',
            'post_status' => 'publish',
            'posts_per_page' => -1,
            'meta_query'     =>  array(
              array(
                'relation' => 'AND',
                $sts_sports_category,
                $sts_sports,
                $keyw
              )
            )
          );
          $tot_blog_posts = new WP_Query($tot_blog_args);
          ?>
          <div class="col-12 col-lg-8 nf-listing-c-width">

            <?php if((!empty($_POST['sports_category']) && !empty($_POST['sports_category'][0])) or (!empty($_POST['sports']) && !empty($_POST['sports'][0])) ){?>
		      <div class="nf-state-listing-block">
		             <div class="row">
		              <?php if(!empty($_POST['sports_category']) && !empty($_POST['sports_category'][0])){?>
		              <div class="col-12 col-lg-6">
		               <a href="#">
                          <img src="<?php echo get_template_directory_uri(). '/assets/'?>/img/entreprenuearship/sport-category.png" class="nf-w-t1">
                          <span><?php if(is_array($_POST['sports_category'])) echo Implode(',<br>',$_POST['sports_category']);else echo $_POST['sports_category'];?></span>
                        </a>
		              </div>
		            <?php }?>
		            <?php if(!empty($_POST['sports']) && !empty($_POST['sports'][0])){?>
		         <div class="col-12 col-lg-6">
		                <a href="#">
                          <img src="<?php echo get_template_directory_uri(). '/assets/'?>/img/sports-icon/<?php echo str_replace(' ','-',$sports_img)?>.png" class="nf-w-t1">
                          <span><?php if(is_array($_POST['sports'])) echo Implode(',<br>',$_POST['sports']);else echo $_POST['sports'];?></span>
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

              if($values)
              {
                $sports_category='';
                $sports= '';
                $guidesinstructors_skills='';
                $qualifications_required='';
                $formal_training_of_instructor_download_link='';
                $sops='';
                $documentations='';
                $risk_mitigation='';
                $emergencies_and_rescues='';
                $medical_concern='';
                $view_complete_details='';
                $formal_training_of_instructor_required='';


                foreach($values as $key => $value)
                {

                  if($key=='sports_category'){ $sports_category = $value; }
                  if($key=='sports'){ $sports = $value; }
                  if($key=='guidesinstructors_skills'){ $guidesinstructors_skills = $value; }
                  if($key=='qualifications_required'){ $qualifications_required = $value; }
                  if($key=='formal_training_of_instructor_download_link'){ $formal_training_of_instructor_download_link = $value; }
                  if($key=='sops'){ $sops = $value; }
                  if($key=='documentations'){ $documentations = $value; }
                  if($key=='risk_mitigation'){ $risk_mitigation = $value; }
                  if($key=='emergencies_and_rescues'){ $emergencies_and_rescues = $value; }
                  if($key=='medical_concern'){ $medical_concern = $value; }
                  if($key=='view_complete_details'){ $view_complete_details = $value; } 
                  if($key=='formal_training_of_instructor_required'){ $formal_training_of_instructor_required = $value; } 

                }
              }


              $record=$record+1;
              ?>

              
                
              <div class="nf-know-listing-block">

            <h4 class="nf-f-size-20 nf-strong mb-4">Potential Locations</h4>

            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
              <li class="nav-item" role="presentation">
                <a class="nav-link active" data-toggle="pill" href="#nf-knowlist-tab1">Arunachal Pradesh</a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link" data-toggle="pill" href="#nf-knowlist-tab2">Assam</a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link" data-toggle="pill" href="#nf-knowlist-tab3">Manipur</a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link" data-toggle="pill" href="#nf-knowlist-tab4">Meghalaya</a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link" data-toggle="pill" href="#nf-knowlist-tab5">Mizoram</a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link" data-toggle="pill" href="#nf-knowlist-tab6">Nagaland</a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link" data-toggle="pill" href="#nf-knowlist-tab7">Sikkim</a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link" data-toggle="pill" href="#nf-knowlist-tab8">Tripura</a>
              </li>
            </ul>
          </div>
          <div class="tab-content" id="pills-tabContent">
            <?php
                  $locval = get_post_meta( $post->ID, '_event_plocstate_value_key', true ); 
                  $stateval = get_post_meta( $post->ID, '_event_state_value_key', true );
                  
                  
                        
                        ?>

            <div class="tab-pane fade show active" id="nf-knowlist-tab1">
              <ul class="potential-location">
                <?php
                $k=0; 
                    if(!empty($locval))
                    {
                        $locval = explode('*****',$locval);
                        $stateval = explode('*****',$stateval);
                      for($i=0;$i<count($locval);$i++) 
                        {
                          if($stateval[$i]=='Arunachal Pradesh'){
                            $k++;
                ?>

                          <li><span><?php echo $k;?></span> <?php echo $locval[$i];?></li>
              <?php }
                  }
                }if($k==0) { echo '<li>No Record Found</li>';}?>
                
              </ul>
            </div>
            <div class="tab-pane fade" id="nf-knowlist-tab2">
              <ul class="potential-location">
                <?php
                $k=0; 
                    if(!empty($locval))
                    {
                        
                      for($i=0;$i<count($locval);$i++) 
                        {
                          if($stateval[$i]=='Assam'){
                            $k++;
                ?>

                          <li><span><?php echo $k;?></span> <?php echo $locval[$i];?></li>
              <?php }
                  }
                }if($k==0) { echo '<li>No Record Found</li>';}?>
              </ul>
            </div>
            <div class="tab-pane fade" id="nf-knowlist-tab3">
              <ul class="potential-location">
                <?php
                $k=0; 
                    if(!empty($locval))
                    {
                        
                      for($i=0;$i<count($locval);$i++) 
                        {
                          if($stateval[$i]=='Manipur'){
                            $k++;
                ?>

                          <li><span><?php echo $k;?></span> <?php echo $locval[$i];?></li>
              <?php }
                  }
                }if($k==0) { echo '<li>No Record Found</li>';}?>
              </ul>
            </div>
            <div class="tab-pane fade" id="nf-knowlist-tab4">
              <ul class="potential-location">
                <?php
                $k=0; 
                    if(!empty($locval))
                    {
                        
                      for($i=0;$i<count($locval);$i++) 
                        {
                          if($stateval[$i]=='Meghalaya'){
                            $k++;
                ?>

                          <li><span><?php echo $k;?></span> <?php echo $locval[$i];?></li>
              <?php }
                  }
                }if($k==0) { echo '<li>No Record Found</li>';}?>
              </ul>
            </div>
            <div class="tab-pane fade" id="nf-knowlist-tab5">
              <ul class="potential-location">
                <?php
                $k=0; 
                    if(!empty($locval))
                    {
                        
                      for($i=0;$i<count($locval);$i++) 
                        {
                          if($stateval[$i]=='Mizoram'){
                            $k++;
                ?>

                          <li><span><?php echo $k;?></span> <?php echo $locval[$i];?></li>
              <?php }
                  }
                }if($k==0) { echo '<li>No Record Found</li>';}?>
              </ul>
            </div>
            <div class="tab-pane fade" id="nf-knowlist-tab6">
              <ul class="potential-location">
                <?php
                $k=0; 
                    if(!empty($locval))
                    {
                        
                      for($i=0;$i<count($locval);$i++) 
                        {
                          if($stateval[$i]=='Nagaland'){
                            $k++;
                ?>

                          <li><span><?php echo $k;?></span> <?php echo $locval[$i];?></li>
              <?php }
                  }
                }if($k==0) { echo '<li>No Record Found</li>';}?>
              </ul>
            </div>
            <div class="tab-pane fade" id="nf-knowlist-tab7">
              <ul class="potential-location">
                <?php
                $k=0; 
                    if(!empty($locval))
                    {
                        
                      for($i=0;$i<count($locval);$i++) 
                        {
                          if($stateval[$i]=='Sikkim'){
                            $k++;
                ?>

                          <li><span><?php echo $k;?></span> <?php echo $locval[$i];?></li>
              <?php }
                  }
                }if($k==0) { echo '<li>No Record Found</li>';}?>
              </ul>
            </div>
            <div class="tab-pane fade" id="nf-knowlist-tab8">
              <ul class="potential-location">
                <?php
                $k=0; 
                    if(!empty($locval))
                    {
                        
                      for($i=0;$i<count($locval);$i++) 
                        {
                          if($stateval[$i]=='Tripura'){
                            $k++;
                ?>

                          <li><span><?php echo $k;?></span> <?php echo $locval[$i];?></li>
              <?php }
                  }
                }if($k==0) { echo '<li>No Record Found</li>';}?>
              </ul>
            </div>
          </div>

          <hr>

          <div class="row">
            <div class="col-12">
              <div class="nf-product-block nf-plan-block pt-0 mt-0 border-0">
                <h4 class="nf-f-size-20 nf-strong">Guides/Instructors' Skills</h4>
                <div class="nf-plan-listing">
                  <?php if(!empty($guidesinstructors_skills)){
                    $guidesinstructors_skills = explode(',',$guidesinstructors_skills);
                    $k=$j=0;
                    foreach ($guidesinstructors_skills as $key => $value) {
                      $k++; $j++; 
                      if($k==11) $k=1;
                      ?>
                      <h5><span class="nf-ico-color-<?php echo $k;?>"><?php echo $j; ?></span><?php echo  $value ; ?> </h5>
                      <?php 
                    }
                  }?>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-12">
              <div class="nf-product-block nf-plan-block mt-0">
                <h4 class="nf-f-size-20 nf-strong">Qualifications Required</h4>
                <div class="nf-plan-listing nf-fulllisting nf-bluecolor-scheme">
                  <?php if(!empty($qualifications_required)){
                    $qualifications_required = explode(',',$qualifications_required);
                    $k=$j=0;
                    foreach ($qualifications_required as $key => $value) {
                      $k++; $j++; 
                      if($k==11) $k=1;
                      ?>
                      <h5><span class="nf-ico-color-<?php echo $k;?>"><?php echo $j; ?></span><?php echo  $value ; ?> </h5>
                      <?php 
                    }
                  }?>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-12">
              <div class="nf-product-block nf-plan-block mt-2 pt-4">
                
                <div class="row">
                  
                  <div class="col-md-6">
                  <h4 class="nf-f-size-20 nf-strong">Formal Training of Instructor Required</h4>
                  </div>
                  <div class="col-md-2">
                    <div class="nf-checkbox-wrap">
                      <?php if($formal_training_of_instructor_required=='No'){?>
                      <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/wrong.png" alt="" width="20" height="20">
                    <?php }else{
                      ?>
                      <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/success.png" alt="" width="20" height="20">
                      <?php
                    }?>
                      <span><b><?php echo $formal_training_of_instructor_required?> </b></span>
                    </div>
                  </div>
                  <?php if($formal_training_of_instructor_download_link!='' && $formal_training_of_instructor_required=='Yes'){?>
                  <div class="col-md-4">
                    <label>Download Guidline :</label>
                    <a target="_blank" href="<?php echo $formal_training_of_instructor_download_link; ?>"><?php echo $formal_training_of_instructor_download_link; ?></a>
                  </div>
                <?php }?>
                </div>

              </div>
            </div>
          </div>

          <div class="row nf-f-accordion">
            <div class="col-lg-12">
              <div class="nf-product-block mt-3 pt-4">
                <div class="panel-group" id="accordion">
                  <div class="panel-default">
                    <div class="panel-heading accordion_bg_2" role="tab" id="headingTwo">
                      <h4 class="panel-title mb-0">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#finance" aria-expanded="false" aria-controls="finance">
                        Equipment Requirement (for 50 perspon) </a>
                      </h4>
                    </div>
                    <div id="finance" class="panel-collapse collapse show" role="tabpanel" aria-labelledby="headingTwo">
                      <div class="panel-body">
                       <div class="table-responsive card equipment-table"> 
                        <table class="table table-striped table_border_0 nf-strong-600"> 
                          <thead>
                            <tr>
                              <td>Items</td>
                              <td align="right">Numbers</td>
                              <td align="right">Rate</td>
                              <td align="right">Total (in Rs.)</td>
                            </tr>
                          </thead>
                          <tbody>
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
                          </tbody>
                        </table>  
                      </div>   
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-12">
            <div class="nf-product-block nf-plan-block mt-4">
              <h4 class="nf-f-size-20 nf-strong">SOPs</h4>
              <div class="nf-plan-listing nf-fulllisting ">
                <?php if(!empty($sops)){
                  $sops = explode(',',$sops);
                  $k=$j=0;
                  foreach ($sops as $key => $value) {
                    $k++; $j++; 
                    if($k==11) $k=1;
                    ?>
                    <h5><span class="nf-ico-color-<?php echo $k;?>"><?php echo $j; ?></span><?php echo  $value ; ?> </h5>
                    <?php 
                  }
                }?>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-12">
            <div class="nf-product-block nf-plan-block mt-0 pt-4">
              <h4 class="nf-f-size-20 nf-strong">Documentations</h4>
              <div class="nf-plan-listing nf-fulllisting nf-greencolor-scheme">
                <?php if(!empty($documentations)){
                  $documentations = explode(',',$documentations);
                  $k=$j=0;
                  foreach ($documentations as $key => $value) {
                    $k++; $j++; 
                    if($k==11) $k=1;
                    ?>
                    <h5><span class="nf-ico-color-<?php echo $k;?>"><?php echo $j; ?></span><?php echo  $value ; ?> </h5>
                    <?php 
                  }
                }?>
              </div>
            </div>
          </div>
        </div>


        <div class="row">
          <div class="col-12">
            <div class="nf-product-block nf-plan-block mt-0 pt-4">
              <h4 class="nf-f-size-20 nf-strong">Risk Mitigation</h4>
              <div class="nf-plan-listing nf-fulllisting nf-greencolor-scheme">
                <?php if(!empty($risk_mitigation)){
                  $risk_mitigation = explode(',',$risk_mitigation);
                  $k=$j=0;
                  foreach ($risk_mitigation as $key => $value) {
                    $k++; $j++; 
                    if($k==11) $k=1;
                    ?>
                    <h5><span class="nf-ico-color-<?php echo $k;?>"><?php echo $j; ?></span><?php echo  $value ; ?> </h5>
                    <?php 
                  }
                }?>
              </div>
            </div>
          </div>
        </div>


        <div class="row">
          <div class="col-12">
            <div class="nf-product-block nf-plan-block mt-0 pt-4">
              <h4 class="nf-f-size-20 nf-strong">Emergencies and Rescues</h4>
              <div class="nf-plan-listing nf-fulllisting nf-greencolor-scheme">
                <?php if(!empty($emergencies_and_rescues)){
                  $emergencies_and_rescues = explode(',',$emergencies_and_rescues);
                  $k=$j=0;
                  foreach ($emergencies_and_rescues as $key => $value) {
                    $k++; $j++; 
                    if($k==11) $k=1;
                    ?>
                    <h5><span class="nf-ico-color-<?php echo $k;?>"><?php echo $j; ?></span><?php echo  $value ; ?> </h5>
                    <?php 
                  }
                }?>
              </div>
            </div>
          </div>
        </div>


        <div class="row">
          <div class="col-12">
            <div class="nf-product-block nf-plan-block mt-0 pt-4">
              <h4 class="nf-f-size-20 nf-strong">Medical Concern</h4>
              <div class="row">
                <div class="col-lg-6">
                  <div class="nf-plan-listing nf-fulllisting nf-greencolor-scheme">
                    <?php if(!empty($medical_concern)){
                      $medical_concern = explode(',',$medical_concern);
                      $k=$j=0;
                      foreach ($medical_concern as $key => $value) {
                        $k++; $j++; 
                        if($k==5) $k=1;
                        ?>
                        <h5><span class="nf-ico-color-<?php echo $k;?>"><?php echo $j; ?></span><?php echo  $value ; ?> </h5>
                        <?php 
                      }
                    }?>
                  </div>
                </div>
              </div>
            
          </div>
        </div>
      </div>
    
 
<hr>


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
          'value'    => 'Hospitality and tourism',
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
          'value'    => 'Hospitality and tourism',
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
          'value'    => 'Hospitality and tourism',
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
          'value'    => 'Hospitality and tourism',
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

                
                <br>
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
              //$view_complete_details=$values['view_complete_details'];
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

  document.body.scrollTop = 650;
  document.documentElement.scrollTop = 650;

  $( ".page-link" ).click(function() {
    $('#form_id').attr('action',this.href); 
    $( "#form_id" ).submit();
  //alert(this.href);
  return false;
});

  $(document).ready(function(){
    $('.check_sports_category').click(function() {
      $('.check_sports_category').not(this).prop('checked', false);
      document.getElementById("form_id").submit();
    });
  });
  $(document).ready(function(){
    $('.check_sports').click(function() {
      $('.check_sports').not(this).prop('checked', false);
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
</script>