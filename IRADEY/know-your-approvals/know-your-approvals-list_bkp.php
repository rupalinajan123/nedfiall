<?php /*Template Name: Know your approval list */ ?>
<?php get_header(); 

//$current_slug = add_query_arg( array(), $wp->request );
//$current_slug = explode('/',$current_slug);
//$the_slug = end($current_slug);
//$type = $current_slug[count($current_slug) - 2];
//echo $the_slug;exit;

if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
  $url = "https://";else $url = "http://";
$url.= $_SERVER['HTTP_HOST'];   
$url.= $_SERVER['REQUEST_URI'];
$url = explode('?',$url);   
$url = explode('&loginerror',$url[1]);  
$title = str_replace('-',' ',$url[0]);

//new line
if(!empty($wp_query->query_vars['flag'])){ $title= $wp_query->query_vars['flag']; $title = str_replace('-',' ',$title);}

if($title=='Oxygen & Nitrogen Gas Plant')
{
    $_POST['state'] = 'Manipur';
    $_POST['enterprise']='Oxygen And Nitrogen Gas Plant';
    $_POST['industry']='Chemicals with Petroleum Products';
}
if($title=='Homestay in Tripura')
{
    $_POST['state'] = 'Tripura';
    $_POST['enterprise']='Homestay';
    $_POST['industry']='Tourism & Hospitality';
}
if($title=='Spices & Seasoning')
{
    $_POST['state'] = 'Nagaland';
    $_POST['enterprise']='Spices & Seasoning';
    $_POST['industry']='Food Processing';
}
if($title=='Solar Power Plant in Sikkim')
{
    $_POST['state'] = 'Sikkim';
    $_POST['enterprise']='Solar Power Plant(energy)';
    $_POST['industry']='Electrical & Electronics';
}



$page_data = get_page_by_path( 'know-your-approvals-list' );
?>

<!-- header-end -->
<!-- inner-banner-start -->
<div class="inner-banner">
  <div class="container">
    <div class="banner-title">
      <h3><?php echo $page_data->post_title;?> </h3>
      <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Entrepreneurship </a></li>
        <li class="breadcrumb-item active"><?php echo $page_data->post_title;?> </li>
      </ul>
    </div>
    <div class="banner-content">
      <div class="row">
        <?php $url = wp_get_attachment_url( get_post_thumbnail_id($post_id) );?>
        <div class="col-md-4 banner-img pr-0"><img class="nf-height-auto" src="<?php echo $url?>"></div>
        <div class="col-md-8  pl-0">
          <div class="bannerbg nf-gradient-13 justify-content-start pt-3 nf-height-100 nf-ester-section">
            <h4 class="nf-f-size-24"><?php echo $page_data->post_title;?> </h4>
            <h5><?php echo $page_data->post_content;?> </h5>
            <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/know-your-approvals/layers-3.png" alt="linear background" class="nf-layes-bg">
            <small>Disclaimer : The list mentioned below is indicative and not exhaustive. You are requested to take guidance of relevant authority in this regard.</small>
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
        <form method="post" action="<?php echo site_url()?>/know-your-approvals-list" id="form_id">
        <div class="courses-details-sidebar-area search-sidebar nf-sidebar nf-kyal">
          <div class="widget mb-20 widget-padding white-bg">
            <?php $var = get_field_object('field_60f82577d9f8a');?>
            <a class="btn-link nf-color-1" data-toggle="collapse" href="#state-filter">
              <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/state-white.png" alt="state-white"> <span> State (<?php echo count($var['choices']);?>) </span></a>
              <div class="widget-link collapse show" id="state-filter">
                <ul class="sidebar-link">
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
                              <input value="'.$choice.'" class="check_state" type="checkbox" '.$checked.' id="state_'.$k.'" name="state[]">
                              <label for="state_'.$k.'">'.$choice.'</label>
                            </div>
                          </li>
                          ';
                          $k++;
                        }
                        ?>
                  
                </ul>
              </div>
              <?php //$var = get_field_object('field_60deacce6c931');?>
              <?php/*?><a class="btn-link nf-color-2" data-toggle="collapse" href="#department-filter">
                <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/know-your-approvals/entity-1.png" alt="industry"> <span>  Entity Type (<?php echo count($var['choices']);?>)</span>
              </a>
              <div class="widget-link collapse show" id="department-filter">
                <ul class="sidebar-link">
                  <?php 
                      
                      
                        $k=0;
                        foreach($var['choices'] as $choice)
                        {
                          if($_POST['entity']==$choice) $checked = 'checked'; 
                          else if(is_array($_POST['entity']) && in_array($choice,$_POST['entity'])) $checked = 'checked'; 
                          else  $checked = ''; 
                          echo '
                          <li>
                            <div class="nf-checkbox-wrap">
                              <input value="'.$choice.'" class="check_entity" type="checkbox" '.$checked.' id="entity_'.$k.'" name="entity[]">
                              <label for="entity_'.$k.'">'.$choice.'</label>
                            </div>
                          </li>
                          ';
                          $k++;
                        }
                        ?>
                 
                </ul>
              </div><?php*/?>
              <?php 
              //ajax start
              if(!empty($_POST['state']) )
              {
                if(!is_array($_POST['state'])) $_POST['state']=[$_POST['state']];
                $sts_state = array(
                              'key'     =>  'state',
                              'value'    =>  $_POST['state'],
                              'compare'  => 'IN'
                          );
              }

            $args = array(
              'post_type' => 'know_your_approval',
                'post_status' => 'publish',
                'posts_per_page' => -1,
                'meta_query'     =>  array(
                              array(
                                  'relation' => 'AND',
                                  $sts_state
                                )
                            )
            );
            
            $the_query = new WP_Query( $args );
            $return_industry=array();
            
            if( $the_query->have_posts() ){
              while( $the_query->have_posts() ){ 
                $the_query->the_post(); 
                $values= get_fields();
                $return_industry[]=$values['industry'];
            }
          }
          $return_industry = array_filter(array_unique($return_industry));
          if(!empty($_POST['industry']) && !in_array($_POST['industry'], $return_industry)) $_POST['industry']='';
          wp_reset_query();
          //ajax end

              $var = get_field_object('field_60f825acd9f8b');?>
              <a class="btn-link nf-color-pink" data-toggle="collapse" href="#Courses-filter">
                <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/know-your-approvals/industry-1.png" alt="industry"> <span> Industry Type (<?php echo count($return_industry);//count($var['choices']);?>)</span>
              </a>
              <div class="widget-link collapse show" id="Courses-filter">
                <ul class="sidebar-link">
                  <?php 
                      
                      
                        $k=0;
                        sort($return_industry);
                        //foreach($var['choices'] as $choice)
                        foreach($return_industry as $choice)
                        {
                          if($_POST['industry']==$choice) $checked = 'checked'; 
                          else if(is_array($_POST['industry']) && in_array($choice,$_POST['industry'])) $checked = 'checked'; 
                          else  $checked = ''; 
                          echo '
                          <li>
                            <div class="nf-checkbox-wrap">
                              <input value="'.$choice.'" class="check_industry" type="checkbox" '.$checked.' id="industry_'.$k.'" name="industry">
                              <label for="industry_'.$k.'">'.$choice.'</label>
                            </div>
                          </li>
                          ';
                          $k++;
                        }
                        ?>
                  
                </ul>
              </div>
              <?php 
              //ajax start
              if(!empty($_POST['state']) )
              {
                if(!is_array($_POST['state'])) $_POST['state']=[$_POST['state']];
                $sts_state = array(
                              'key'     =>  'state',
                              'value'    =>  $_POST['state'],
                              'compare'  => 'IN'
                          );
              }
              if(!empty($_POST['industry']) )
              {
                if(!is_array($_POST['industry'])) $_POST['industry']=[$_POST['industry']];
                $sts_industry = array(
                              'key'     =>  'industry',
                              'value'    =>  $_POST['industry'],
                              'compare'  => 'IN'
                          );
              }

            $args = array(
              'post_type' => 'know_your_approval',
                'post_status' => 'publish',
                'posts_per_page' => -1,
                'meta_query'     =>  array(
                              array(
                                  'relation' => 'AND',
                                  $sts_state,
                                  $sts_industry
                                )
                            )
            );
            
            $the_query = new WP_Query( $args );
            $return_enterprise=array();
            
            if( $the_query->have_posts() ){
              while( $the_query->have_posts() ){ 
                $the_query->the_post(); 
                $values= get_fields();
                $return_enterprise[]=$values['enterprise'];
                
            }
          }
          $return_enterprise = array_filter(array_unique($return_enterprise));
          if(!empty($_POST['enterprise']) && !in_array($_POST['enterprise'], $return_enterprise)) $_POST['enterprise']='';
          wp_reset_query();
          //ajax end

              $var = get_field_object('field_60f825c5d9f8c');?>
              <a class="btn-link nf-color-5" data-toggle="collapse" href="#Education-filter">
                <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/know-your-approvals/category.png" alt="category"> <span> Enterprise (<?php echo count($return_enterprise);//count($var['choices']);?>)</span>
              </a>
              <div class="widget-link collapse show" id="Education-filter">
                <ul class="sidebar-link">
                  <?php 
                      
                      
                        $k=0;
                        sort($return_enterprise);
                        //foreach($var['choices'] as $choice)
                        foreach($return_enterprise as $choice)
                        {
                          if($_POST['enterprise']==$choice) $checked = 'checked'; 
                          else if(is_array($_POST['enterprise']) && in_array($choice,$_POST['enterprise'])) $checked = 'checked'; 
                          else  $checked = ''; 
                          echo '
                          <li>
                            <div class="nf-checkbox-wrap">
                              <input value="'.$choice.'" class="check_enterprise" type="checkbox" '.$checked.' id="enterprise_'.$k.'" name="enterprise">
                              <label for="enterprise_'.$k.'">'.$choice.'</label>
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
          <?php if($_POST['state']!='' or $_POST['industry']!='' or $_POST['enterprise']!='' or $_POST['entity']!=''){?>
          <div class="nf-state-listing-block">
             <div class="row">
              <?php if($_POST['state']!=''){?>
              <div class="col-12 col-lg-4">
                <a href="#">
                  <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/know-your-approvals/state.png" class="nf-w-t1">
                  <span><?php if(is_array($_POST['state'])) echo Implode(',<br>',$_POST['state']);else echo $_POST['state'];?></span>
                </a>
              </div>
            <?php }?>
            <?php if($_POST['industry']!=''){?>
         <div class="col-12 col-lg-4">
                <a href="#">
                  <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/know-your-approvals/industry.png" class="nf-w-t2">
                  <span><?php if(is_array($_POST['industry'])) echo Implode(',<br>',$_POST['industry']);else echo $_POST['industry'];?></span>
                </a>
              </div>
              <?php }?>
              <?php if($_POST['enterprise']!=''){?>
        <div class="col-12 col-lg-4">
                <a href="#">
                  <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/know-your-approvals/category-1.png" class="nf-w-t3">
                  <span><?php if(is_array($_POST['enterprise'])) echo Implode(',<br>',$_POST['enterprise']);else echo $_POST['enterprise'];?></span>
                </a>
              </div>
              <?php }?>
              
            </div> 
          </div>
        <?php }?>
  <div class="nf-know-listing-block">
  <?php
  /*if(!empty($_POST['entity']))
  {
    if(!is_array($_POST['entity'])) $_POST['entity']=[$_POST['entity']];
    
    $sts_dept = array(
                  'key'     =>  'entity',
                  'value'    =>  $_POST['entity'],
                  'compare'  => 'IN'
              );

  }*/
  //if(!empty($_POST['state']))
  //{
    if(!is_array($_POST['state'])) $_POST['state']=[$_POST['state']];

    $sts = array(
                  'key'     =>  'state',
                  'value'    =>  $_POST['state'],
                  'compare'  => 'IN'
              );
  //}
  //if(!empty($_POST['enterprise']))
  //{
    if(!is_array($_POST['enterprise'])) $_POST['enterprise']=[$_POST['enterprise']];

    $sts_c = array(
                  'key'     =>  'enterprise',
                  'value'    =>  $_POST['enterprise'],
                  'compare'  => 'IN'
              );
  //}
  //if(!empty($_POST['industry']))
  //{
    if(!is_array($_POST['industry'])) $_POST['industry']=[$_POST['industry']];

    $sts_cc = array(
                  'key'     =>  'industry',
                  'value'    =>  $_POST['industry'],
                  'compare'  => 'IN'
              );
  //}
  
  //$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
      $blog_args = array(
                            'post_type' => 'know_your_approval',
                            'post_status' => 'publish',
                            //'meta_key' => 'type',
          					        //'orderby'   => 'meta_value',
          					        //'order' => 'DESC',
                            'posts_per_page' => 10,
                                  //'paged' => $paged, 
                                  'meta_query'     =>  array(
                                      array(
                                          'relation' => 'AND',
                                          $sts_c,
                                          $sts,
                                          $sts_dept,
                                          $sts_cc
                                        )
                                    )
                            );

      $blog_posts = new WP_Query($blog_args);
                            //echo "<pre>";
                            //print_r($blog_posts);

      /*$tot_blog_args = array(
                            'post_type' => 'know_your_approval',
                            'post_status' => 'publish',
                            //'meta_key' => 'type',
          					        //'orderby'   => 'meta_value',
          					        //'order' => 'DESC',
                            'posts_per_page' => -1,
                            'meta_query'     =>  array(
                              array(
                                  'relation' => 'AND',
                                  $sts_c,
                                  $sts,
                                  $sts_dept,
                                  $sts_cc
                                )
                            )
                            );
      $tot_blog_posts = new WP_Query($tot_blog_args);*/

      $record=0;
                            while($blog_posts->have_posts()) {
                                $blog_posts->the_post(); 

                                $values= get_fields();

            /*if(((isset($_POST) && 
              ($_POST['state']==$state or $_POST['state']=='' or (is_array($_POST['state']) && in_array($state,$_POST['state'])))
              && ($_POST['industry']==$industry or $_POST['industry']=='' or (is_array($_POST['industry']) && in_array($industry,$_POST['industry'])))
              && ($_POST['entity']==$entity or $_POST['entity']=='' or (is_array($_POST['entity']) && in_array($entity,$_POST['entity'])))
              && ($_POST['enterprise']==$enterprise or $_POST['enterprise']=='' or (is_array($_POST['enterprise']) && in_array($enterprise,$_POST['enterprise'])))  

            ) or !isset($_POST))){ */
            $record=$record+1;

      ?>
           
            <h2>Pre-Establishment <span class="nf-sub-info-tag nf-tag-color-3 ml-2">Specific</span></h2>

            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
              <li class="nav-item" role="presentation">
                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#nf-knowlist-tab1">Proprietorship</a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#nf-knowlist-tab2">Partnership</a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#nf-knowlist-tab3">LLP</a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#nf-knowlist-tab4">Company</a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#nf-knowlist-tab5">Society</a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#nf-knowlist-tab6">Trust</a>
              </li>
              <!--<li class="nav-item" role="presentation">
                <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#nf-knowlist-tab8">Section 8 Company</a>
              </li>-->
            </ul>

            <div class="tab-content" id="pills-tabContent">
              <div class="tab-pane fade show active" id="nf-knowlist-tab1">
                <div class="nf-k-list-table">
                  <div class="table-responsive">
                    <table>
                      <thead class="nf-thead-color-1">
                        <th>Approval Name </th>
                        <th>Nature </th>
                        <th width="25%">Description</th>
                        <th>Issuing Authority </th>
                        <th width="20%">Apply </th>
                      </thead>
                      <tbody>
                        <?php
                  $specific = get_post_meta( $post->ID, '_event_specific_value_key', true ); 
                  $snature = get_post_meta( $post->ID, '_event_snature_value_key', true );
                  $sdescription = get_post_meta( $post->ID, '_event_sdescription_value_key', true ); 
                  $sissue = get_post_meta( $post->ID, '_event_sissue_value_key', true ); 
                  $slink = get_post_meta( $post->ID, '_event_slink_value_key', true );
                  $sentity = get_post_meta( $post->ID, '_event_sentity_value_key', true );
                  $k=0; 
                    if(!empty($specific))
                    {
                        $specific = explode('*****',$specific);
                        $snature = explode('*****',$snature);
                        $sdescription = explode('*****',$sdescription);
                        $sissue = explode('*****',$sissue);
                        $slink = explode('*****',$slink);
                        $sentity = explode('*****',$sentity);
                    
                        
                        for($i=0;$i<count($specific);$i++) 
                        {
                          if($sentity[$i]=='Proprietorship'){
                            $k++;
                    ?>
                        <tr>
                          <td><?php echo $specific[$i]?></td>
                          <td><?php echo $snature[$i]?></td>
                          <td><?php echo $sdescription[$i]?></td>                      
                          <td><?php echo $sissue[$i]?></td>
                          <td><a href="<?php echo $slink[$i]?>" target="_blank"><?php echo $slink[$i]?></a></td>
                        </tr>
                      <?php }
                        }
                      }
                      if($k==0) { echo '<tr><td colspan="5">No Record Found</td></tr>';} ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="nf-knowlist-tab2">
                <div class="nf-k-list-table">
                  <div class="table-responsive">
                    <table>
                      <thead>
                        <th>Approval Name </th>
                        <th>Nature </th>
                        <th width="25%">Description</th>
                        <th>Issuing Authority </th>
                        <th width="20%">Apply </th>
                      </thead>
                      <tbody class="nf-thead-color-1">
                        <?php
                        $k=0;
                  $specific = get_post_meta( $post->ID, '_event_specific_value_key', true ); 
                  $snature = get_post_meta( $post->ID, '_event_snature_value_key', true );
                  $sdescription = get_post_meta( $post->ID, '_event_sdescription_value_key', true ); 
                  $sissue = get_post_meta( $post->ID, '_event_sissue_value_key', true ); 
                  $slink = get_post_meta( $post->ID, '_event_slink_value_key', true );
                  $sentity = get_post_meta( $post->ID, '_event_sentity_value_key', true ); 
                    if(!empty($specific))
                    {
                        $specific = explode('*****',$specific);
                        $snature = explode('*****',$snature);
                        $sdescription = explode('*****',$sdescription);
                        $sissue = explode('*****',$sissue);
                        $slink = explode('*****',$slink);
                        $sentity = explode('*****',$sentity);
                    
                        
                        for($i=0;$i<count($specific);$i++) 
                        {
                          if($sentity[$i]=='Partnership'){
                             $k++;
                    ?>
                        <tr>
                          <td><?php echo $specific[$i]?></td>
                          <td><?php echo $snature[$i]?></td>
                          <td><?php echo $sdescription[$i]?></td>                      
                          <td><?php echo $sissue[$i]?></td>
                          <td><a href="<?php echo $slink[$i]?>" target="_blank"><?php echo $slink[$i]?></a></td>
                        </tr>
                      <?php }
                        }
                      } if($k==0) { echo '<tr><td colspan="5">No Record Found</td></tr>';}?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="nf-knowlist-tab3">
                <div class="nf-k-list-table">
                  <div class="table-responsive">
                    <table>
                      <thead class="nf-thead-color-1">
                        <th>Approval Name </th>
                        <th>Nature </th>
                        <th width="25%">Description</th>
                        <th>Issuing Authority </th>
                        <th width="20%">Apply </th>
                      </thead>
                      <tbody>
                        <?php
                        $k=0;
                  $specific = get_post_meta( $post->ID, '_event_specific_value_key', true ); 
                  $snature = get_post_meta( $post->ID, '_event_snature_value_key', true );
                  $sdescription = get_post_meta( $post->ID, '_event_sdescription_value_key', true ); 
                  $sissue = get_post_meta( $post->ID, '_event_sissue_value_key', true ); 
                  $slink = get_post_meta( $post->ID, '_event_slink_value_key', true );
                  $sentity = get_post_meta( $post->ID, '_event_sentity_value_key', true ); 
                    if(!empty($specific))
                    {
                        $specific = explode('*****',$specific);
                        $snature = explode('*****',$snature);
                        $sdescription = explode('*****',$sdescription);
                        $sissue = explode('*****',$sissue);
                        $slink = explode('*****',$slink);
                        $sentity = explode('*****',$sentity);
                    
                        
                        for($i=0;$i<count($specific);$i++) 
                        {
                          if($sentity[$i]=='LLP'){
                             $k++;
                    ?>
                        <tr>
                          <td><?php echo $specific[$i]?></td>
                          <td><?php echo $snature[$i]?></td>
                          <td><?php echo $sdescription[$i]?></td>                      
                          <td><?php echo $sissue[$i]?></td>
                          <td><a href="<?php echo $slink[$i]?>" target="_blank"><?php echo $slink[$i]?></a></td>
                        </tr>
                      <?php }
                        }
                      } if($k==0) { echo '<tr><td colspan="5">No Record Found</td></tr>';}?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="nf-knowlist-tab4">
                <div class="nf-k-list-table">
                  <div class="table-responsive">
                    <table>
                      <thead class="nf-thead-color-1">
                        <th>Approval Name </th>
                        <th>Nature </th>
                        <th width="25%">Description</th>
                        <th>Issuing Authority </th>
                        <th width="20%">Apply </th>
                      </thead>
                      <tbody>
                        <?php
                        $k=0;
                  $specific = get_post_meta( $post->ID, '_event_specific_value_key', true ); 
                  $snature = get_post_meta( $post->ID, '_event_snature_value_key', true );
                  $sdescription = get_post_meta( $post->ID, '_event_sdescription_value_key', true ); 
                  $sissue = get_post_meta( $post->ID, '_event_sissue_value_key', true ); 
                  $slink = get_post_meta( $post->ID, '_event_slink_value_key', true );
                  $sentity = get_post_meta( $post->ID, '_event_sentity_value_key', true ); 
                    if(!empty($specific))
                    {
                        $specific = explode('*****',$specific);
                        $snature = explode('*****',$snature);
                        $sdescription = explode('*****',$sdescription);
                        $sissue = explode('*****',$sissue);
                        $slink = explode('*****',$slink);
                        $sentity = explode('*****',$sentity);
                    
                        
                        for($i=0;$i<count($specific);$i++) 
                        {
                          if($sentity[$i]=='Company'){
                             $k++;
                    ?>
                        <tr>
                          <td><?php echo $specific[$i]?></td>
                          <td><?php echo $snature[$i]?></td>
                          <td><?php echo $sdescription[$i]?></td>                      
                          <td><?php echo $sissue[$i]?></td>
                          <td><a href="<?php echo $slink[$i]?>" target="_blank"><?php echo $slink[$i]?></a></td>
                        </tr>
                      <?php }
                        }
                      } if($k==0) { echo '<tr><td colspan="5">No Record Found</td></tr>';}?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="nf-knowlist-tab5">
                <div class="nf-k-list-table">
                  <div class="table-responsive">
                    <table>
                      <thead class="nf-thead-color-1">
                        <th>Approval Name </th>
                        <th>Nature </th>
                        <th width="25%">Description</th>
                        <th>Issuing Authority </th>
                        <th width="20%">Apply </th>
                      </thead>
                      <tbody>
                        <?php
                        $k=0;
                  $specific = get_post_meta( $post->ID, '_event_specific_value_key', true ); 
                  $snature = get_post_meta( $post->ID, '_event_snature_value_key', true );
                  $sdescription = get_post_meta( $post->ID, '_event_sdescription_value_key', true ); 
                  $sissue = get_post_meta( $post->ID, '_event_sissue_value_key', true ); 
                  $slink = get_post_meta( $post->ID, '_event_slink_value_key', true );
                  $sentity = get_post_meta( $post->ID, '_event_sentity_value_key', true ); 
                    if(!empty($specific))
                    {
                        $specific = explode('*****',$specific);
                        $snature = explode('*****',$snature);
                        $sdescription = explode('*****',$sdescription);
                        $sissue = explode('*****',$sissue);
                        $slink = explode('*****',$slink);
                        $sentity = explode('*****',$sentity);
                    
                        
                        for($i=0;$i<count($specific);$i++) 
                        {
                          if($sentity[$i]=='Society'){
                             $k++;
                    ?>
                        <tr>
                          <td><?php echo $specific[$i]?></td>
                          <td><?php echo $snature[$i]?></td>
                          <td><?php echo $sdescription[$i]?></td>                      
                          <td><?php echo $sissue[$i]?></td>
                          <td><a href="<?php echo $slink[$i]?>" target="_blank"><?php echo $slink[$i]?></a></td>
                        </tr>
                      <?php }
                        }
                      } if($k==0) { echo '<tr><td colspan="5">No Record Found</td></tr>';}?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="nf-knowlist-tab6">
                <div class="nf-k-list-table">
                  <div class="table-responsive">
                    <table>
                      <thead class="nf-thead-color-1">
                        <th>Approval Name </th>
                        <th>Nature </th>
                        <th width="25%">Description</th>
                        <th>Issuing Authority </th>
                        <th width="20%">Apply </th>
                      </thead>
                      <tbody>
                        <?php
                        $k=0;
                  $specific = get_post_meta( $post->ID, '_event_specific_value_key', true ); 
                  $snature = get_post_meta( $post->ID, '_event_snature_value_key', true );
                  $sdescription = get_post_meta( $post->ID, '_event_sdescription_value_key', true ); 
                  $sissue = get_post_meta( $post->ID, '_event_sissue_value_key', true ); 
                  $slink = get_post_meta( $post->ID, '_event_slink_value_key', true );
                  $sentity = get_post_meta( $post->ID, '_event_sentity_value_key', true ); 
                    if(!empty($specific))
                    {
                        $specific = explode('*****',$specific);
                        $snature = explode('*****',$snature);
                        $sdescription = explode('*****',$sdescription);
                        $sissue = explode('*****',$sissue);
                        $slink = explode('*****',$slink);
                        $sentity = explode('*****',$sentity);
                    
                        
                        for($i=0;$i<count($specific);$i++) 
                        {
                          if($sentity[$i]=='Trust'){
                             $k++;
                    ?>
                        <tr>
                          <td><?php echo $specific[$i]?></td>
                          <td><?php echo $snature[$i]?></td>
                          <td><?php echo $sdescription[$i]?></td>                      
                          <td><?php echo $sissue[$i]?></td>
                          <td><a href="<?php echo $slink[$i]?>" target="_blank"><?php echo $slink[$i]?></a></td>
                        </tr>
                      <?php }
                        }
                      } if($k==0) { echo '<tr><td colspan="5">No Record Found</td></tr>';}?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            
            
            <?php
                  $k=0;
                  $comman = get_post_meta( $post->ID, '_event_comman_value_key', true ); 
                  $cnature = get_post_meta( $post->ID, '_event_cnature_value_key', true );
                  $cdescription = get_post_meta( $post->ID, '_event_cdescription_value_key', true ); 
                  $cissue = get_post_meta( $post->ID, '_event_cissue_value_key', true ); 
                  $clink = get_post_meta( $post->ID, '_event_clink_value_key', true );
                  $centity = get_post_meta( $post->ID, '_event_centity_value_key', true ); 
                    if(!empty($comman))
                    {
            ?>
            <h2>Pre-Establishment <span class="nf-sub-info-tag nf-tag-color-1 ml-2">Common</span></h2>
            <?php /*?><ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
              <li class="nav-item" role="presentation">
                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#nf-knowlist-tab12">Proprietorship</a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#nf-knowlist-tab22">Partnership</a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#nf-knowlist-tab32">LLP</a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#nf-knowlist-tab42">Company</a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#nf-knowlist-tab52">Cooperate Society</a>
              </li>
            </ul><?php */ ?>

            
            <div class="tab-content" id="pills-tabContent">
              <div class="tab-pane fade show active" id="nf-knowlist-tab12">
                <div class="nf-k-list-table">
                  <div class="table-responsive">
                    <table>
                      <thead class="nf-thead-color-2">
                        <th>Approval Name </th>
                        <th>Nature </th>
                        <th width="25%">Description</th>
                        <th>Issuing Authority </th>
                        <th width="20%">Apply </th>
                      </thead>
                      <tbody>
                        <?php
                        $comman = explode('*****',$comman);
                        $cnature = explode('*****',$cnature);
                        $cdescription = explode('*****',$cdescription);
                        $cissue = explode('*****',$cissue);
                        $clink = explode('*****',$clink);
                        $centity = explode('*****',$centity);
                    
                        
                        for($i=0;$i<count($comman);$i++) 
                        {
                          //if($centity[$i]=='Proprietorship'){
                             $k++;
                    ?>
                        <tr>
                          <td><?php echo $comman[$i]?></td>
                          <td><?php echo $cnature[$i]?></td>
                          <td><?php echo $cdescription[$i]?></td>                      
                          <td><?php echo $cissue[$i]?></td>
                          <td><a href="<?php echo $clink[$i]?>" target="_blank"><?php echo $clink[$i]?></a></td>
                        </tr>
                      <?php //}
                        }
                      //} if($k==0) { echo '<tr><td colspan="5">No Record Found</td></tr>';} ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <?php /*?><div class="tab-pane fade" id="nf-knowlist-tab22">
                <div class="nf-k-list-table">
                  <div class="table-responsive">
                    <table>
                      <thead class="nf-thead-color-2">
                        <th>Approval Name </th>
                        <th>Nature </th>
                        <th width="25%">Description</th>
                        <th>Issuing Authority </th>
                        <th width="20%">Apply </th>
                      </thead>
                      <tbody>
                        <?php
                        $k=0;
                  $comman = get_post_meta( $post->ID, '_event_comman_value_key', true ); 
                  $cnature = get_post_meta( $post->ID, '_event_cnature_value_key', true );
                  $cdescription = get_post_meta( $post->ID, '_event_cdescription_value_key', true ); 
                  $cissue = get_post_meta( $post->ID, '_event_cissue_value_key', true ); 
                  $clink = get_post_meta( $post->ID, '_event_clink_value_key', true );
                  $centity = get_post_meta( $post->ID, '_event_centity_value_key', true ); 
                    if(!empty($comman))
                    {
                        $comman = explode('*****',$comman);
                        $cnature = explode('*****',$cnature);
                        $cdescription = explode('*****',$cdescription);
                        $cissue = explode('*****',$cissue);
                        $clink = explode('*****',$clink);
                        $centity = explode('*****',$centity);
                    
                        
                        for($i=0;$i<count($comman);$i++) 
                        {
                          if($centity[$i]=='Partnership'){
                             $k++;
                    ?>
                        <tr>
                          <td><?php echo $comman[$i]?></td>
                          <td><?php echo $cnature[$i]?></td>
                          <td><?php echo $cdescription[$i]?></td>                      
                          <td><?php echo $cissue[$i]?></td>
                          <td><a href="<?php echo $clink[$i]?>" target="_blank"><?php echo $clink[$i]?></a></td>
                        </tr>
                      <?php }
                        }
                      } if($k==0) { echo '<tr><td colspan="5">No Record Found</td></tr>';}?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="nf-knowlist-tab32">
                <div class="nf-k-list-table">
                  <div class="table-responsive">
                    <table>
                      <thead class="nf-thead-color-2">
                        <th>Approval Name </th>
                        <th>Nature </th>
                        <th width="25%">Description</th>
                        <th>Issuing Authority </th>
                        <th width="20%">Apply </th>
                      </thead>
                      <tbody>
                        <?php
                        $k=0;
                  $comman = get_post_meta( $post->ID, '_event_comman_value_key', true ); 
                  $cnature = get_post_meta( $post->ID, '_event_cnature_value_key', true );
                  $cdescription = get_post_meta( $post->ID, '_event_cdescription_value_key', true ); 
                  $cissue = get_post_meta( $post->ID, '_event_cissue_value_key', true ); 
                  $clink = get_post_meta( $post->ID, '_event_clink_value_key', true );
                  $centity = get_post_meta( $post->ID, '_event_centity_value_key', true ); 
                    if(!empty($comman))
                    {
                        $comman = explode('*****',$comman);
                        $cnature = explode('*****',$cnature);
                        $cdescription = explode('*****',$cdescription);
                        $cissue = explode('*****',$cissue);
                        $clink = explode('*****',$clink);
                        $centity = explode('*****',$centity);
                    
                        
                        for($i=0;$i<count($comman);$i++) 
                        {
                          if($centity[$i]=='LLP'){
                             $k++;
                    ?>
                        <tr>
                          <td><?php echo $comman[$i]?></td>
                          <td><?php echo $cnature[$i]?></td>
                          <td><?php echo $cdescription[$i]?></td>                      
                          <td><?php echo $cissue[$i]?></td>
                          <td><a href="<?php echo $clink[$i]?>" target="_blank"><?php echo $clink[$i]?></a></td>
                        </tr>
                      <?php }
                        }
                      } if($k==0) { echo '<tr><td colspan="5">No Record Found</td></tr>';}?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="nf-knowlist-tab42">
                <div class="nf-k-list-table">
                  <div class="table-responsive">
                    <table>
                      <thead class="nf-thead-color-2">
                        <th>Approval Name </th>
                        <th>Nature </th>
                        <th width="25%">Description</th>
                        <th>Issuing Authority </th>
                        <th width="20%">Apply </th>
                      </thead>
                      <tbody>
                        <?php
                        $k=0;
                  $comman = get_post_meta( $post->ID, '_event_comman_value_key', true ); 
                  $cnature = get_post_meta( $post->ID, '_event_cnature_value_key', true );
                  $cdescription = get_post_meta( $post->ID, '_event_cdescription_value_key', true ); 
                  $cissue = get_post_meta( $post->ID, '_event_cissue_value_key', true ); 
                  $clink = get_post_meta( $post->ID, '_event_clink_value_key', true );
                  $centity = get_post_meta( $post->ID, '_event_centity_value_key', true ); 
                    if(!empty($comman))
                    {
                        $comman = explode('*****',$comman);
                        $cnature = explode('*****',$cnature);
                        $cdescription = explode('*****',$cdescription);
                        $cissue = explode('*****',$cissue);
                        $clink = explode('*****',$clink);
                        $centity = explode('*****',$centity);
                    
                        
                        for($i=0;$i<count($comman);$i++) 
                        {
                          if($centity[$i]=='Company'){
                             $k++;
                    ?>
                        <tr>
                          <td><?php echo $comman[$i]?></td>
                          <td><?php echo $cnature[$i]?></td>
                          <td><?php echo $cdescription[$i]?></td>                      
                          <td><?php echo $cissue[$i]?></td>
                          <td><a href="<?php echo $clink[$i]?>" target="_blank"><?php echo $clink[$i]?></a></td>
                        </tr>
                      <?php }
                        }
                      } if($k==0) { echo '<tr><td colspan="5">No Record Found</td></tr>';}?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="nf-knowlist-tab52">
                <div class="nf-k-list-table">
                  <div class="table-responsive">
                    <table>
                      <thead class="nf-thead-color-2">
                        <th>Approval Name </th>
                        <th>Nature </th>
                        <th width="25%">Description</th>
                        <th>Issuing Authority </th>
                        <th width="20%">Apply </th>
                      </thead>
                      <tbody>
                        <?php
                        $k=0;
                  $comman = get_post_meta( $post->ID, '_event_comman_value_key', true ); 
                  $cnature = get_post_meta( $post->ID, '_event_cnature_value_key', true );
                  $cdescription = get_post_meta( $post->ID, '_event_cdescription_value_key', true ); 
                  $cissue = get_post_meta( $post->ID, '_event_cissue_value_key', true ); 
                  $clink = get_post_meta( $post->ID, '_event_clink_value_key', true );
                  $centity = get_post_meta( $post->ID, '_event_centity_value_key', true ); 
                    if(!empty($comman))
                    {
                        $comman = explode('*****',$comman);
                        $cnature = explode('*****',$cnature);
                        $cdescription = explode('*****',$cdescription);
                        $cissue = explode('*****',$cissue);
                        $clink = explode('*****',$clink);
                        $centity = explode('*****',$centity);
                    
                        
                        for($i=0;$i<count($comman);$i++) 
                        {
                          if($centity[$i]=='Society'){
                             $k++;
                    ?>
                        <tr>
                          <td><?php echo $comman[$i]?></td>
                          <td><?php echo $cnature[$i]?></td>
                          <td><?php echo $cdescription[$i]?></td>                      
                          <td><?php echo $cissue[$i]?></td>
                          <td><a href="<?php echo $clink[$i]?>" target="_blank"><?php echo $clink[$i]?></a></td>
                        </tr>
                      <?php }
                        }
                      } if($k==0) { echo '<tr><td colspan="5">No Record Found</td></tr>';}?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div><?php */?>
            </div>
          <?php }?>
            
            <h2>Pre-Operation <!--<span class="nf-sub-info-tag nf-tag-color-1 ml-2">Common</span>--></h2>
            <?php /*?><ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
              <li class="nav-item" role="presentation">
                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#nf-knowlist-tab13">Proprietorship</a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#nf-knowlist-tab23">Partnership</a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#nf-knowlist-tab33">LLP</a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#nf-knowlist-tab43">Company</a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#nf-knowlist-tab53">Cooperate Society</a>
              </li>
              
            </ul><?php */?>
            <div class="tab-content" id="pills-tabContent">
              <div class="tab-pane fade show active" id="nf-knowlist-tab13">
                <div class="nf-k-list-table">
                  <div class="table-responsive">
                    <table>
                      <thead class="nf-thead-color-3">
                        <th>Approval Name </th>
                        <th>Nature </th>
                        <th width="25%">Description</th>
                        <th>Issuing Authority </th>
                        <th width="20%">Apply </th>
                      </thead>
                      <tbody>
                        <?php
                        $k=0;
                  $operation = get_post_meta( $post->ID, '_event_operation_value_key', true ); 
                  $onature = get_post_meta( $post->ID, '_event_onature_value_key', true );
                  $odescription = get_post_meta( $post->ID, '_event_odescription_value_key', true ); 
                  $oissue = get_post_meta( $post->ID, '_event_oissue_value_key', true ); 
                  $olink = get_post_meta( $post->ID, '_event_olink_value_key', true );
                  $oentity = get_post_meta( $post->ID, '_event_oentity_value_key', true ); 
                    if(!empty($operation))
                    {
                        $operation = explode('*****',$operation);
                        $onature = explode('*****',$onature);
                        $odescription = explode('*****',$odescription);
                        $oissue = explode('*****',$oissue);
                        $olink = explode('*****',$olink);
                        $oentity = explode('*****',$oentity);
                    
                        
                        for($i=0;$i<count($operation);$i++) 
                        {
                          //if($oentity[$i]=='Proprietorship'){
                             $k++;
                    ?>
                        <tr>
                          <td><?php echo $operation[$i]?></td>
                          <td><?php echo $onature[$i]?></td>
                          <td><?php echo $odescription[$i]?></td>                      
                          <td><?php echo $oissue[$i]?></td>
                          <td><a href="<?php echo $olink[$i]?>" target="_blank"><?php echo $olink[$i]?></a></td>
                        </tr>
                      <?php //}
                        }
                      } if($k==0) { echo '<tr><td colspan="5">No Record Found</td></tr>';}?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <?php /* ?><div class="tab-pane fade" id="nf-knowlist-tab23">
                <div class="nf-k-list-table">
                  <div class="table-responsive">
                    <table>
                      <thead class="nf-thead-color-3">
                        <th>Approval Name </th>
                        <th>Nature </th>
                        <th width="25%">Description</th>
                        <th>Issuing Authority </th>
                        <th width="20%">Apply </th>
                      </thead>
                      <tbody>
                        <?php
                        $k=0;
                  $operation = get_post_meta( $post->ID, '_event_operation_value_key', true ); 
                  $onature = get_post_meta( $post->ID, '_event_onature_value_key', true );
                  $odescription = get_post_meta( $post->ID, '_event_odescription_value_key', true ); 
                  $oissue = get_post_meta( $post->ID, '_event_oissue_value_key', true ); 
                  $olink = get_post_meta( $post->ID, '_event_olink_value_key', true );
                  $oentity = get_post_meta( $post->ID, '_event_oentity_value_key', true ); 
                    if(!empty($operation))
                    {
                        $operation = explode('*****',$operation);
                        $onature = explode('*****',$onature);
                        $odescription = explode('*****',$odescription);
                        $oissue = explode('*****',$oissue);
                        $olink = explode('*****',$olink);
                        $oentity = explode('*****',$oentity);
                    
                        
                        for($i=0;$i<count($operation);$i++) 
                        {
                          if($oentity[$i]=='Partnership'){
                             $k++;
                    ?>
                        <tr>
                          <td><?php echo $operation[$i]?></td>
                          <td><?php echo $onature[$i]?></td>
                          <td><?php echo $odescription[$i]?></td>                      
                          <td><?php echo $oissue[$i]?></td>
                          <td><a href="<?php echo $olink[$i]?>" target="_blank"><?php echo $olink[$i]?></a></td>
                        </tr>
                      <?php }
                        }
                      } if($k==0) { echo '<tr><td colspan="5">No Record Found</td></tr>';}?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="nf-knowlist-tab33">
                <div class="nf-k-list-table">
                  <div class="table-responsive">
                    <table>
                      <thead class="nf-thead-color-3">
                        <th>Approval Name </th>
                        <th>Nature </th>
                        <th width="25%">Description</th>
                        <th>Issuing Authority </th>
                        <th width="20%">Apply </th>
                      </thead>
                      <tbody>
                        <?php
                        $k=0;
                  $operation = get_post_meta( $post->ID, '_event_operation_value_key', true ); 
                  $onature = get_post_meta( $post->ID, '_event_onature_value_key', true );
                  $odescription = get_post_meta( $post->ID, '_event_odescription_value_key', true ); 
                  $oissue = get_post_meta( $post->ID, '_event_oissue_value_key', true ); 
                  $olink = get_post_meta( $post->ID, '_event_olink_value_key', true );
                  $oentity = get_post_meta( $post->ID, '_event_oentity_value_key', true ); 
                    if(!empty($operation))
                    {
                        $operation = explode('*****',$operation);
                        $onature = explode('*****',$onature);
                        $odescription = explode('*****',$odescription);
                        $oissue = explode('*****',$oissue);
                        $olink = explode('*****',$olink);
                        $oentity = explode('*****',$oentity);
                    
                        
                        for($i=0;$i<count($operation);$i++) 
                        {
                          if($oentity[$i]=='LLP'){
                             $k++;
                    ?>
                        <tr>
                          <td><?php echo $operation[$i]?></td>
                          <td><?php echo $onature[$i]?></td>
                          <td><?php echo $odescription[$i]?></td>                      
                          <td><?php echo $oissue[$i]?></td>
                          <td><a href="<?php echo $olink[$i]?>" target="_blank"><?php echo $olink[$i]?></a></td>
                        </tr>
                      <?php }
                        }
                      } if($k==0) { echo '<tr><td colspan="5">No Record Found</td></tr>';}?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="nf-knowlist-tab43">
                <div class="nf-k-list-table">
                  <div class="table-responsive">
                    <table>
                      <thead class="nf-thead-color-3">
                        <th>Approval Name </th>
                        <th>Nature </th>
                        <th width="25%">Description</th>
                        <th>Issuing Authority </th>
                        <th width="20%">Apply </th>
                      </thead>
                      <tbody>
                        <?php
                        $k=0;
                  $operation = get_post_meta( $post->ID, '_event_operation_value_key', true ); 
                  $onature = get_post_meta( $post->ID, '_event_onature_value_key', true );
                  $odescription = get_post_meta( $post->ID, '_event_odescription_value_key', true ); 
                  $oissue = get_post_meta( $post->ID, '_event_oissue_value_key', true ); 
                  $olink = get_post_meta( $post->ID, '_event_olink_value_key', true );
                  $oentity = get_post_meta( $post->ID, '_event_oentity_value_key', true ); 
                    if(!empty($operation))
                    {
                        $operation = explode('*****',$operation);
                        $onature = explode('*****',$onature);
                        $odescription = explode('*****',$odescription);
                        $oissue = explode('*****',$oissue);
                        $olink = explode('*****',$olink);
                        $oentity = explode('*****',$oentity);
                    
                        
                        for($i=0;$i<count($operation);$i++) 
                        {
                          if($oentity[$i]=='Company'){
                             $k++;
                    ?>
                        <tr>
                          <td><?php echo $operation[$i]?></td>
                          <td><?php echo $onature[$i]?></td>
                          <td><?php echo $odescription[$i]?></td>                      
                          <td><?php echo $oissue[$i]?></td>
                          <td><a href="<?php echo $olink[$i]?>" target="_blank"><?php echo $olink[$i]?></a></td>
                        </tr>
                      <?php }
                        }
                      } if($k==0) { echo '<tr><td colspan="5">No Record Found</td></tr>';}?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="nf-knowlist-tab53">
                <div class="nf-k-list-table">
                  <div class="table-responsive">
                    <table>
                      <thead class="nf-thead-color-3">
                        <th>Approval Name </th>
                        <th>Nature </th>
                        <th width="25%">Description</th>
                        <th>Issuing Authority </th>
                        <th width="20%">Apply </th>
                      </thead>
                      <tbody>
                        <?php
                        $k=0;
                  $operation = get_post_meta( $post->ID, '_event_operation_value_key', true ); 
                  $onature = get_post_meta( $post->ID, '_event_onature_value_key', true );
                  $odescription = get_post_meta( $post->ID, '_event_odescription_value_key', true ); 
                  $oissue = get_post_meta( $post->ID, '_event_oissue_value_key', true ); 
                  $olink = get_post_meta( $post->ID, '_event_olink_value_key', true );
                  $oentity = get_post_meta( $post->ID, '_event_oentity_value_key', true ); 
                    if(!empty($operation))
                    {
                        $operation = explode('*****',$operation);
                        $onature = explode('*****',$onature);
                        $odescription = explode('*****',$odescription);
                        $oissue = explode('*****',$oissue);
                        $olink = explode('*****',$olink);
                        $oentity = explode('*****',$oentity);
                    
                        
                        for($i=0;$i<count($operation);$i++) 
                        {
                          if($oentity[$i]=='Society'){
                            $k++;
                    ?>
                        <tr>
                          <td><?php echo $operation[$i]?></td>
                          <td><?php echo $onature[$i]?></td>
                          <td><?php echo $odescription[$i]?></td>                      
                          <td><?php echo $oissue[$i]?></td>
                          <td><a href="<?php echo $olink[$i]?>" target="_blank"><?php echo $olink[$i]?></a></td>
                        </tr>
                      <?php }
                        }
                      } if($k==0) { echo '<tr><td colspan="5">No Record Found</td></tr>';}?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div><?php */?>
            </div>

          <?php }

          if($record==0) echo '<b>No Record Found.</b>';
          ?>
          
            
            <div class="nf-product-block nf-quick-block-wrap nf-quick-wrap-2">
              <h4 class="nf-f-size-20 nf-strong">Quick Links </h4>
              <div class="clat-carrer-slider vm-training-slider">

             <?php /*?>    <?php
                $k=0;
                    $args = array(
                      'post_type'   => 'state_about_us',
                      'order'   => 'ASC',
                      'posts_per_page' => '100'
                    );
                    $the_query = new WP_Query( $args );
                    ?>
                    <?php if( $the_query->have_posts() ): ?>
                      <?php while( $the_query->have_posts() ) : $the_query->the_post(); 
                        if($k==4) $k=0;
                        $k++;

                        ?>

                    <a target="_blank" href="<?php the_permalink()?>"><div class="item grd-bg<?php echo $k?>">EODB <?php the_title()?></div></a>


                <?php endwhile; ?>
                    <?php endif;  ?> <?php */?>
                   <a class="item grd-bg1" href="https://serviceonline.gov.in/ " target="_blank">Service Plus </a>

<a class="item grd-bg2" href="http://indarun.gov.in/htm/doingbusiness.htm" target="_blank">EODB Arunachal Pradesh</a>
<a class="item grd-bg3" href="https://www.eodb.assam.gov.in/" target="_blank">EODB ASSAM</a>
<a class="item grd-bg4" href="https://www.eservicesmanipur.gov.in/eda/" target="_blank">E Service Manipur </a>

<a class="item grd-bg1" href="https://investmeghalaya.gov.in/resources/homePage/17/megeodb/about-eodb.html" target="_blank">EODB Meghalaya</a>

<a class="item grd-bg2" href="https://eodbmizoram.gov.in/" target="_blank">EODB Mizoram</a>
<a class="item grd-bg3" href="https://ebiz.nagaland.gov.in/ " target="_blank">EODB Nagaland</a>


<a class="item grd-bg4" href="https://pwd.tripura.gov.in/index.php/ease-of-doing-business-eodb" target="_blank">EODB Tripura</a>
<a class="item grd-bg1" href="https://eservices.sikkim.gov.in/" target="_blank">E Service Sikkim</a>
<a class="item grd-bg2" href="https://services.india.gov.in/service/detail/e-services-login" target="_blank">E Service National Government Services Portal </a> 
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


document.body.scrollTop = 550;
document.documentElement.scrollTop = 550;

$(document).ready(function(){
    $('.check_state').click(function() {
        $('.check_state').not(this).prop('checked', false);
        document.getElementById("form_id").submit();
    });
});
$(document).ready(function(){
    $('.check_industry').click(function() {
        $('.check_industry').not(this).prop('checked', false);
        document.getElementById("form_id").submit();
    });
});
$(document).ready(function(){
    $('.check_entity').click(function() {
        $('.check_entity').not(this).prop('checked', false);
        document.getElementById("form_id").submit();
    });
});
$(document).ready(function(){
    $('.check_enterprise').click(function() {
        $('.check_enterprise').not(this).prop('checked', false);
        document.getElementById("form_id").submit();
    });
});

$( ".page-link" ).click(function() {
      $('#form_id').attr('action',this.href); 
      $( "#form_id" ).submit();
      //alert(this.href);
      return false;
    });
</script>