<?php /*Template Name: Horticulture Details */

if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
  $url = "https://";else $url = "http://";
$url.= $_SERVER['HTTP_HOST'];   
$url.= $_SERVER['REQUEST_URI'];
$url = explode('?',$url);   
$url = explode('&loginerror',$url[1]);  
$title = str_replace('-',' ',$url[0]);

//new line
if(!empty($wp_query->query_vars['flag'])){ $title= $wp_query->query_vars['flag']; $title = str_replace('-',' ',$title);}

if($title!='')
{
    $_POST['state'] = 'Arunachal Pradesh';
    $_POST['crop'] = 'Kiwi';
    $_POST['horticulture_type'] = 'Fruits';
}

if($_POST['horticulture_type']=='')
{  
  wp_redirect(site_url('fruits')); 
  exit;  
}
get_header(); 

//echo '>>'.$_POST['horticulture_type'];exit;

//if(!isset($_POST['state'])) $_POST['state']='';
//if(!isset($_POST['season'])) $_POST['season']='';

$months = array('','January','February','March','April','May','June','July ','August','September','October','November','December');




$record=0;
if($_POST['horticulture_type']!='Apiculture' && $_POST['horticulture_type']!='Mushroom' && $_POST['horticulture_type']!='Exotic Spices'){
  $blog_args = array(
    'post_type' => 'horticulture',
    'post_status' => 'publish',
    'title' =>$_POST['crop'],
    'orderby' => 'post_title',
    'order'   => 'ASC',
    'posts_per_page' => '1',

    'meta_query'     =>  array(

      array(
        'key'     =>  'horticulture_type',
        'value'   =>  $_POST['horticulture_type']
      ),

      array(
        'key'     =>  'state',
        'value'   =>  $_POST['state']
      ),
                                /*array(
                                    'key'     =>  'sowing_season',
                                    'value'   =>  $_POST['season']
                                  )*/
                                // array(
                                //   'relation' => 'OR',
                                // array(
                                //     'key'     =>  'sowing_season_from',
                                //     'value'    =>  array($_POST['season_from'] , $_POST['season_to']),
                                //     'compare'  => 'between'
                                // ),
                              //   array(
                              //       'key'     =>  'sowing_season_to',
                              //       'value'    =>  array($_POST['season_from'] , $_POST['season_to']),
                              //       'compare'  => 'between'
                              //   ),
                              //   array(
                              //       'key'     =>  'sowing_season_from',
                              //       'value'    =>  $_POST['season_from'],
                              //       'compare'  => '='
                              //   ),
                              //   array(
                              //       'key'     =>  'sowing_season_to',
                              //       'value'    =>  $_POST['season_from'],
                              //       'compare'  => '='
                              //   ),
                              //   array(
                              //       'key'     =>  'sowing_season_from',
                              //       'value'    =>  $_POST['season_to'],
                              //       'compare'  => '='
                              //   ),
                              //   array(
                              //       'key'     =>  'sowing_season_to',
                              //       'value'    =>  $_POST['season_to'],
                              //       'compare'  => '='
                              //   )
                              // )



                                )   


  );
}
if($_POST['horticulture_type']=='Apiculture')
{
  $blog_args = array(
    'post_type' => 'horticulture',
    'post_status' => 'publish',
    'title' =>$_POST['crop'],
    'posts_per_page' => '1',
    'orderby' => 'post_title',
    'order'   => 'ASC',
    'meta_key'     =>  'horticulture_type',
    'meta_value'   =>  $_POST['horticulture_type']
  );
}
if($_POST['horticulture_type']=='Exotic Spices')
{
  $blog_args = array(
    'post_type' => 'horticulture',
    'post_status' => 'publish',
    'title' =>$_POST['crop'],
    'orderby' => 'post_title',
    'order'   => 'ASC',
    'posts_per_page' => '1',
    'meta_key'     =>  'horticulture_type',
    'meta_value'   =>  $_POST['horticulture_type']
  );
}
if($_POST['horticulture_type']=='Mushroom')
{
  $blog_args = array(
    'post_type' => 'horticulture',
    'post_status' => 'publish',
    'orderby' => 'post_title',
    'order'   => 'ASC',
    'title' =>$_POST['crop'],
    'posts_per_page' => '1',
    'meta_query'     =>  array(

      array(
        'key'     =>  'horticulture_type',
        'value'   =>  $_POST['horticulture_type']
      ),
                                /*array(
                                    'key'     =>  'growing_season',
                                    'value'   =>  $_POST['season']
                                  )*/
                              //   array(
                              //     'relation' => 'OR',
                              //   array(
                              //       'key'     =>  'growing_season_from',
                              //       'value'    =>  array($_POST['season_from'] , $_POST['season_to']),
                              //       'compare'  => 'between'
                              //   ),
                              //   array(
                              //       'key'     =>  'growing_season_to',
                              //       'value'    =>  array($_POST['season_from'] , $_POST['season_to']),
                              //       'compare'  => 'between'
                              //   ),
                              //   array(
                              //       'key'     =>  'growing_season_from',
                              //       'value'    =>  $_POST['season_from'],
                              //       'compare'  => '='
                              //   ),
                              //   array(
                              //       'key'     =>  'growing_season_to',
                              //       'value'    =>  $_POST['season_from'],
                              //       'compare'  => '='
                              //   ),
                              //   array(
                              //       'key'     =>  'growing_season_from',
                              //       'value'    =>  $_POST['season_to'],
                              //       'compare'  => '='
                              //   ),
                              //   array(
                              //       'key'     =>  'growing_season_to',
                              //       'value'    =>  $_POST['season_to'],
                              //       'compare'  => '='
                              //   )
                              // )
                                )   


  );
}

$blog_posts = new WP_Query($blog_args);
        //echo "<pre>";
        //print_r($blog_posts);

$banner_image = get_field( "banner_image", $blog_posts->posts[0]->ID );

if($banner_image=='') $banner_image= get_template_directory_uri(). '/assets/img/no_record_found_banner.png';


if($_POST['crop']=='') $_POST['crop'] = $blog_posts->posts[0]->post_title;

?>
<!-- header-end -->
<!-- inner-banner-start -->
<?php //if($banner_image!=''){?>
  <div class="inner-banner">
    <div class="container">
      <div class="banner-title">
        <h3><?php echo $_POST['horticulture_type'];?> <a href="#" class="changeTopic" data-toggle="collapse" data-target="#changeTopic">Change Topic</a></h3>
        <ul class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Entrepreneurship</a></li>
          <li class="breadcrumb-item"><a href="#">Know your Business</a></li>
          <li class="breadcrumb-item"><a href="#">Agri-Business</a></li>
          <li class="breadcrumb-item"><a href="#">Production</a></li>
          <li class="breadcrumb-item"><a href="<?php echo site_url()?>/fruits/">Horticulture</a></li>
          <?php if($_POST['horticulture_type']!='Apiculture'){?>
            <li class="breadcrumb-item">Crop wise</li>
          <?php }?>
          <li class="breadcrumb-item"><?php echo $_POST['horticulture_type'];?></li>
          <li class="breadcrumb-item active"><?php echo $_POST['crop'];?></li>
        </ul>
      </div>

      <div class="chagetopic-modal changeTopic-collapse">
        <div class="collapse " id="changeTopic" style="">
          <a href="#" id="changeTopic_close"><i class="fa fa-close"></i></a>
          <div class="card card-body">
            <div class="row">

              <?php
              $k=0;
              $t=0;
              $var = get_field_object('field_60bf6ad8fa6f9');

              $k=0;
              foreach($var['choices'] as $choice)
              {
                ?>

                <?php 
                if($k==0){ ?>
                  <div class="col-md-4">
                    <h4><?php if($t==0){?>Crop-wise <?php }else echo '&nbsp;'; ?></h4>
                    <ul>
                    <?php }
                    $curslug = str_replace(' ','-',strtolower($choice));
                    if($the_slug!=$curslug){
                      ?>      
                      <li>
                        <a class="box" href="<?php echo site_url()?>/<?php echo $curslug; ?>"><?php echo $choice;?></a>
                      </li>
                      <?php
                    } 
                    $totk=count($var['choices'])-1;
                    if($k==7 or $totk==$t){ $k=0;?>
                    </ul>
                  </div>
                <?php }else{ $k++;} $t++; ?>

                <?php
              }
              wp_reset_postdata();
              ?>

              <div class="col-md-4">
                <h4>Type-wise &nbsp;</h4>
                <ul>
                  <li>
                    <a class="box" href="<?php echo site_url()?>/horticulture_int/integrated-farming/">Integrated</a>
                  </li>
                  <li>
                    <a class="box" href="#">Hi-Tech</a>
                  </li>
                  <li>
                    <a class="box" href="#">Traditional</a>
                  </li>
                  <li>
                    <a class="box" href="#">Organic Farming</a>
                  </li>

                </ul>
              </div>

            </div>
          </div>
        </div>
      </div>

      <div class="banner-content">
        <div class="row">
          <div class="col-md-4 banner-img pr-0"><img src="<?php echo $banner_image;  ?>"></div>
          <div class="col-md-8  pl-0">
            <div class="bannerbg nf-gradient-3 justify-content-start pt-3 nf-height-100">
              <h4 class="nf-f-size-24"><?php echo $_POST['crop'];?></h4>
              <p class="text-white pr-md-5"><?php echo $blog_posts->posts[0]->post_content;?>
            </p>
            <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/layers-bg.png" alt="layers background" class="nf-layes-bg">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php //}?>
<!-- inner-banner-end -->
<!-- Study tour in north section  -->
<form method="post" id="form_id" action="<?php echo site_url()?>/horticulture-details">
  <div class="inner-body">
    <div class="container">
      <div class="nf-form-wrap">
        <div class="row">
          <input type="hidden" name="horticulture_type" value="<?php echo $_POST['horticulture_type'];?>">
          <?php
          if($_POST['horticulture_type'] == 'Spices')
          { 
           $icon_image ="saffron.png";
           $heading='Spices';
         }
         else if($_POST['horticulture_type'] == 'Mushroom')
          { 
           $icon_image ="mushroom.png";
            $heading='Mushroom';
         }
         else if($_POST['horticulture_type'] == 'Floriculture')
          { 
           $icon_image ="floriculture.png";
            $heading='Floriculture';
         }
         else
         {
          $icon_image ="fruit.png";
          $heading='Spices ';
        }
        ?>
        <div class="col-12 col-lg-4 nf-sidebar-c-width">
          <div class="courses-details-sidebar-area search-sidebar nf-sidebar mt-md-5">
            <div class="widget mb-20 widget-padding white-bg">
              <?php if($_POST['horticulture_type']!='Apiculture' && $_POST['horticulture_type']!='Mushroom' && $_POST['horticulture_type']!='Exotic Spices'){?>

                <?php $var = get_field_object('field_60bf6af7fa6fa');?>
                <a class="btn-link nf-color-1" data-toggle="collapse" href="#state-filter">
                  <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/state-white.png" alt="state-white"> <span> State (<?php echo count($var['choices'])?>) </span></a>
                  <div class="widget-link collapse show" id="state-filter">
                    <ul class="sidebar-link nf-sidebar-scroll">

                     <?php 
                     

                     $k=0;
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
               <?php }?>
               <?php if($_POST['horticulture_type']!='Apiculture'){?>
          <?php/*?> <a class="btn-link nf-color-2" data-toggle="collapse" href="#department-filter">
            <img src="<?php echo get_template_directory_uri(). '/assets/'?>/img/entreprenuearship/sowing-season.png" alt="department"> <span>  

              <?php
              if($_POST['horticulture_type']!='Mushroom')
              echo 'Sowing Season';
              else echo 'Growing Season';
            ?>
            </span>
          </a> <?php*/?>

          
              <?php/*?>
              <?php 
                      if($page_data->post_title!='Mushroom')
                      $var = get_field_object('field_60bf6b6cfa6fd');
                      else
                      $var = get_field_object('field_60e1b40510d8c');  
                      
                        $k=0;
                        foreach($var['choices'] as $choice)
                        {
                          if($_POST['season']==$choice) $checked = 'checked'; 
                          else if(is_array($_POST['season']) && in_array($choice,$_POST['season'])) $checked = 'checked'; 
                          else  $checked = ''; 
                          echo '
                          <li>
                            <div class="nf-checkbox-wrap">
                              <input value="'.$choice.'" class="check_season" type="checkbox" '.$checked.' id="season_'.$k.'" name="season[]">
                              <label for="season_'.$k.'">'.$choice.'</label>
                            </div>
                          </li>
                          ';
                          $k++;
                        }
                        ?><?php */?>
                   <?php/*?>      <div class="widget-link collapse show" id="Season-Sowing-filter">
                      <div class="nf-filter-season">
                        <label class="">Select Season From</label>
                        <div class="nf-select-wrap">
                         <div class="nf-select-field">
                          <?php 
                          if($page_data->post_title!='Mushroom')
                          $var = get_field_object('field_60bf6b6cfa6fd');
                          else
                          $var = get_field_object('field_60e1b40510d8c');  
                          ?>
                          <select class="form-control selectpicker" name="season_from" id="season_from" onchange="javascript:this.form.submit()">
                            
                            <option value="0">Select Season From</option>
                            
                            <?php
                            foreach($var['choices'] as $value => $label)
                            {
                              if($_POST['season_from']==$value) $selected = 'selected'; 
                              else if(is_array($_POST['season_from']) && in_array($value,$_POST['season_from'])) $selected = 'selected'; 
                              else  $selected = ''; 

                              echo '<option value="'.$value.'" '.$selected.'>'.$label.'</option>';
                            }
                            ?>
                          </select>
                            
                          </div>
                        </div>
                      </div>

                      <div class="nf-filter-season">
                        <label class="">Select Season To</label>
                        <div class="nf-select-wrap">
                         <div class="nf-select-field">

                          <?php 
                              if($page_data->post_title!='Mushroom')
                              $var = get_field_object('field_60e6e32e9a1c2');
                              else
                              $var = get_field_object('field_60e6e3749a1c3');  
                              ?>
                              <select class="form-control selectpicker" name="season_to" id="season_to" onchange="javascript:this.form.submit()">
                                
                                <option value="0">Select Season To</option>
                                
                                <?
                                

                                foreach($var['choices'] as $value => $label)
                                {
                                  if($_POST['season_to']==$value) $selected = 'selected'; 
                                  else if(is_array($_POST['season_to']) && in_array($value,$_POST['season_to'])) $selected = 'selected'; 
                                  else  $selected = '';

                                  echo '<option value="'.$value.'" '.$selected.'>'.$label.'</option>';
                                }
                                ?>
                              </select>
                            
                          </div>
                        </div>
                      </div>
                    </div> <?php*/?>

                  <?php }?>

                  <?php
                      if(!empty($_POST['state']) )
                      {
                        if(!is_array($_POST['state'])) $_POST['state']=[$_POST['state']];

                        $sts_state = array(
                          'key'     =>  'state',
                          'value'    =>  $_POST['state'],
                          'compare'  => 'IN'
                        );
                      }
            // args
                      $g=0;
                      $args = array(
                        'post_type'   => 'horticulture',
                        'meta_key'    => 'horticulture_type',
                        'meta_value'  => $_POST['horticulture_type'],
                        'orderby' => 'post_title',
                        'order'   => 'ASC',
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
                      $return_title=array();

            //echo "<pre>";
            //print_r($the_query);exit;
                      ?>
                  <a class="btn-link nf-color-3" data-toggle="collapse" href="#Courses-filter">

                    <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/<?php echo $icon_image;?>" alt="course"> <span> <?php echo $_POST['horticulture_type'];?> (<?php echo $the_query->post_count;?>)</span>
                  </a>
                  <div class="widget-link collapse show" id="Courses-filter">
                    <ul class="sidebar-link nf-sidebar-scroll">

                      
                      <?php if( $the_query->have_posts() ): ?>
                        <?php while( $the_query->have_posts() ) : $the_query->the_post(); 
                          $g++;
                          $croptile = $post->post_title;
                          if($_POST['crop']==$croptile) $checked = 'checked'; 
                          else if(is_array($_POST['crop']) && in_array($croptile,$_POST['crop'])) $checked = 'checked'; 
                          else  $checked = ''; 
                          if($croptile_new!=$croptile){
                            $return_title[]=$croptile;
                            ?>
                            <li>
                              <div class="nf-checkbox-wrap">
                                <input type="checkbox" class="check_crop" name="crop" <?php echo $checked;?> id="crop<?php echo $g;?>" value="<?php the_title(); ?>" onclick="">
                                <label for="crop<?php echo $g;?>"><?php the_title(); ?> </label>
                              </div>
                            </li>

                            <?php 
                          }
                          $croptile_new = $post->post_title;
                        endwhile; ?>
                      <?php endif; 
                      $return_title = array_filter(array_unique($return_title));
                      if(!empty($_POST['crop']) && !in_array($_POST['crop'], $return_title)) $_POST['crop']='';
                      ?>



                    </ul>
                  </div>

                </div>


              </div>
            </div>
            <div class="col-12 col-lg-8 nf-listing-c-width">
              <?php if(!empty($_POST['state']) or !empty($_POST['crop'])){?>
                <div class="nf-state-listing-block">
                 <div class="row">
                  <?php if(!empty($_POST['state'])){?>
                    <div class="col-12 col-lg-6">
                      <a href="#">
                        <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/know-your-approvals/state.png" class="nf-w-t1">
                        <span><?php if(is_array($_POST['state'])) echo Implode(',<br>',$_POST['state']);else echo $_POST['state'];?></span>
                      </a>
                    </div>
                  <?php }?>
                  <?php if(!empty($_POST['crop'])){?>
                   <div class="col-12 col-lg-6">
                    <a href="#">
                      <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/<?php echo $icon_image;?>" class="nf-w-t2">
                      <span><?php if(is_array($_POST['crop'])) echo Implode(',<br>',$_POST['crop']);else echo $_POST['crop'];?></span>
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

            $view_complete_details = $values['view_complete_details'];

            if($values)
            {
              $horticulture_type='';
              $state=''; 
              $climate = '';
              $soil_ph='';
              $sowing_season_from='';

              $harvesting_period='';
              $yieldha='';
              $variety='';
              $life_span='';
              $number_of_cells='';
              $feed='';
              $banner_image='';
              $spacing='';
              $explore_raw_material='';
              $growing_season_from='';
              $growing_season_to='';

              foreach($values as $key => $value)
              {
                if($key=='horticulture_type'){ $horticulture_type = $value; } 
                if($key=='state'){ $state = $value; }
                if($key=='climate'){ $climate = $value; }
                if($key=='soil_ph'){ $soil_ph = $value; }
                if($key=='sowing_season_from'){ $sowing_season_from = $value; }
                        // if($key=='sowing_season_to'){ $sowing_season_to = $value; }
                if($key=='harvesting_period'){ $harvesting_period = $value; }
                if($key=='yieldha'){ $yieldha = $value; }
                if($key=='variety'){ $variety = $value; }
                if($key=='life_span'){ $life_span = $value; }
                if($key=='number_of_cells'){ $number_of_cells = $value; }
                if($key=='feed'){ $feed = $value; }
                if($key=='banner_image'){ $banner_image = $value; }
                if($key=='spacing'){ $spacing = $value; }
                if($key=='explore_raw_material'){ $explore_raw_material = $value; }
                if($key=='growing_season_from'){ $growing_season_from = $value; }
                if($key=='growing_season_to'){ $growing_season_to = $value; }
              }
            }
            if((isset($_POST)  
              && ($_POST['state']==$state or $_POST['state']=='' or (is_array($_POST['state']) && in_array($state,$_POST['state'])))
              //&& ($_POST['season']==$sowing_season or $_POST['season']=='' or (is_array($_POST['season']) && in_array($sowing_season,$_POST['season'])))
              //&& ($_POST['season']==$growing_season or $_POST['season']=='' or (is_array($_POST['season']) && in_array($growing_season,$_POST['season'])))
            )){ 




              if($horticulture_type!='Apiculture' && $horticulture_type!='Mushroom'){
                $record=$record+1;
                ?>


                <h4 class="nf-f-size-20 nf-strong mb-4">Important Parameters</h4>
                <div class="row">
                  <div class="col-12 col-lg-10">
                    <div class="row">
                      <div class="col-lg-4 col-md-6  mb-4 parameter_box ">
                        <div class="nf-gradient-4">
                          <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/climate.png" alt="image" class="img-fluid">
                          <h4 class="nf-f-size-16 text-white">Climate</h4>
                          <h2><?php echo $climate;?> <!--<span>Degree</span>--></h2>
                        </div>
                      </div>
                      <div class="col-lg-4 col-md-6  mb-4 parameter_box ">
                        <div class="nf-gradient-3">
                          <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/soil-ph.png" alt="image" class="img-fluid">
                          <h4 class="nf-f-size-16 text-white">Soil pH</h4>
                          <h2><?php echo $soil_ph;?> </h2>
                        </div>
                      </div>

                      <!--<div class="col-lg-4 col-md-6  mb-4 parameter_box ">-->
                        <!--  <div class="nf-gradient-5">-->
                          <!--    <img src="<?php //echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/sowing-season2.png" alt="image" class="img-fluid">-->
                          <!--    <h4 class="nf-f-size-16 text-white">Sowing Season</h4>-->
                          <!--    <h2><?php //echo $sowing_season_from;?></h2>-->
                          <!--  </div>-->
                          <!--</div>-->
                          <div class="col-lg-4 col-md-6  mb-4 parameter_box ">
                            <div class="nf-gradient-6">
                              <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/harvesting.png" alt="image" class="img-fluid">
                              <h4 class="nf-f-size-16 text-white">Harvesting period</h4>
                              <h2><?php echo $harvesting_period;?><!--<span>Days</span>--></h2>
                            </div>
                          </div>
                        </div>

                        <div class="row">

                          <div class="col-lg-4 col-md-6  mb-4 parameter_box ">
                            <div class="nf-gradient-7">
                              <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/wheat-sack.png" alt="image" class="img-fluid">
                              <h4 class="nf-f-size-16 text-white">Yield</h4>
                              <h2><?php echo $yieldha;?><!--<span>Mt/Ha</span>--></h2>
                            </div>
                          </div>
                          <?php if($horticulture_type != 'Spices' && $horticulture_type != 'Exotic Spices' && $horticulture_type != 'Mushroom' && $horticulture_type != 'Floriculture') { ?>
                            <div class="col-lg-4 col-md-6  mb-4 parameter_box ">
                              <div class="nf-gradient-7">
                                <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/wheat-sack.png" alt="image" class="img-fluid">
                                <h4 class="nf-f-size-16 text-white">Spacing</h4>
                                <h2><?php echo $spacing;?><!--<span>Mt/Ha</span>--></h2>
                              </div>
                            </div>
                          <?php } ?>
                          <?php if($horticulture_type == 'Mushroom'){ ?>
                            <div class="col-lg-12 col-md-6  mb-4 parameter_box ">
                              <div class="nf-gradient-5">
                                <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/sowing-season2.png" alt="image" class="img-fluid">
                                <h4 class="nf-f-size-16 text-white">Growing Season</h4>
                                <h2><?php echo $months[$growing_season_from].'-'.$months[$growing_season_to];?></h2>
                              </div>
                            </div>
                          <?php } else{ ?>
                            <div class="col-lg-12 col-md-6  mb-4 parameter_box ">
                              <div class="nf-gradient-5">
                                <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/sowing-season2.png" alt="image" class="img-fluid">
                                <h4 class="nf-f-size-16 text-white">Sowing Season</h4>
                                <h2><?php echo $sowing_season_from;?></h2>
                              </div>
                            </div>
                          <?php } ?>
                        </div>
                      </div>
                      <?php if($explore_raw_material!=''){ ?>
                        <div class="col 12 col-lg-2 parameter_box databank_box">
                          <div class="nf-gradient-20">
                            <h4 class="nf-f-size-16 text-white">Explore Raw Material</h4>
                            <a href="<?php echo $explore_raw_material;?>" target="_blank">NER DATABASE</a>
                          </div>
                        </div>
                      <?php }?>
                    </div>

                    <h4 class="nf-f-size-20 nf-strong my-3">Variety</h4>

                    <div class="bg-gray p-4 row mx-0 mb-3">
                      <ul class="five_col_ul vm-variety-wrap-2">
                        <?php if(!empty($variety))
                        {
                         $variety = explode(',',$variety); 
                         foreach($variety as $vari)
                          echo '<li><a href="javascript:void(0);">'.$vari.'</a></li>';
                      }
                      ?>

                    </ul>
                  </div>
      <!--<div class="row">
        <div class="col-lg-6 col-md-12 mb-2 mb-lg-0"><a class="btn nf-button-v-small w-100" href="#" role="button">View Complete Details</a></div>
        <div class="col-lg-6 col-md-12"><a class="btn nf-button-v-orange w-100" href="#" role="button">Download Model Project Profile</a></div>
      </div>-->
      
      <div class="circle_bg2">
        <div class="row">
          <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/circle-bg2.png" alt="background image" class="img-fluid">
        </div>
      </div>

    <?php }else if($horticulture_type=='Mushroom'){ $record=$record+1; ?>

      <h4 class="nf-f-size-20 nf-strong mb-4">Important Parameters</h4>
      <div class="row">
        <div class="col-12 col-lg-10">
          <div class="row">
            <div class="col-lg-6 col-md-6  mb-4 parameter_box ">
              <div class="nf-gradient-4">
                <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/climate.png" alt="image" class="img-fluid">
                <h4 class="nf-f-size-16 text-white">Climate</h4>
                <h2><?php echo $climate;?> <!--<span>Degree</span>--></h2>
              </div>
            </div>
            <!--<div class="col-lg-4 col-md-6  mb-4 parameter_box ">
              <div class="nf-gradient-3">
                <img src="<?php //echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/soil-ph.png" alt="image" class="img-fluid">
                <h4 class="nf-f-size-16 text-white">Soil pH</h4>
                <h2><?php //echo $soil_ph;?> </h2>
              </div>
            </div>-->
            
            <!--<div class="col-lg-4 col-md-6  mb-4 parameter_box ">-->
              <!--  <div class="nf-gradient-5">-->
                <!--    <img src="<?php //echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/sowing-season2.png" alt="image" class="img-fluid">-->
                <!--    <h4 class="nf-f-size-16 text-white">Sowing Season</h4>-->
                <!--    <h2><?php //echo $sowing_season_from;?></h2>-->
                <!--  </div>-->
                <!--</div>-->
                <div class="col-lg-6 col-md-6  mb-4 parameter_box ">
                  <div class="nf-gradient-6">
                    <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/harvesting.png" alt="image" class="img-fluid">
                    <h4 class="nf-f-size-16 text-white">Harvesting period</h4>
                    <h2><?php echo $harvesting_period;?><!--<span>Days</span>--></h2>
                  </div>
                </div>
              </div>

              <div class="row">

                <div class="col-lg-8 col-md-6  mb-4 parameter_box ">
                  <div class="nf-gradient-7">
                    <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/wheat-sack.png" alt="image" class="img-fluid">
                    <h4 class="nf-f-size-16 text-white">Yield</h4>
                    <h2><?php echo $yieldha;?><!--<span>Mt/Ha</span>--></h2>
                  </div>
                </div>


                <div class="col-lg-4 col-md-6  mb-4 parameter_box ">
                  <div class="nf-gradient-5">
                    <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/sowing-season2.png" alt="image" class="img-fluid">
                    <h4 class="nf-f-size-16 text-white">Growing Season</h4>
                    <h2><?php echo $values['growing_season'];//$months[$growing_season_from].'-'.$months[$growing_season_to];?></h2>
                  </div>
                </div>

              </div>
            </div>
            <?php if($explore_raw_material!=''){ ?>
              <div class="col 12 col-lg-2 parameter_box databank_box">
                <div class="nf-gradient-20">
                  <h4 class="nf-f-size-16 text-white">Explore Raw Material</h4>
                  <a href="<?php echo $explore_raw_material;?>" target="_blank">NER DATABASE</a>
                </div>
              </div>
            <?php }?>
          </div>

          <h4 class="nf-f-size-20 nf-strong my-3">Variety</h4>

          <div class="bg-gray p-4 row mx-0 mb-3">
            <ul class="five_col_ul vm-variety-wrap-2">
              <?php if(!empty($variety))
              {
               $variety = explode(',',$variety); 
               foreach($variety as $vari)
                echo '<li><a href="javascript:void(0);">'.$vari.'</a></li>';
            }
            ?>

          </ul>
        </div>


        <div class="circle_bg2">
          <div class="row">
            <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/circle-bg2.png" alt="background image" class="img-fluid">
          </div>
        </div>

        <?php 
      }else if($horticulture_type=='Apiculture'){
        $record=$record+1;
        ?>

        
        <h4 class="nf-f-size-20 nf-strong mb-4">Important Parameters</h4>
        <div class="row">
          <div class="col-12 col-lg-10">
            <div class="row">
              <div class="col-lg-4 col-md-6  mb-4 parameter_box ">
                <div class="nf-gradient-4">
                  <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/climate.png" alt="image" class="img-fluid">
                  <h4 class="nf-f-size-16 text-white">Life Span</h4>
                  <h2><?php echo $life_span;?> <!--<span>Degree</span>--></h2>
                </div>
              </div>
              <div class="col-lg-4 col-md-6  mb-4 parameter_box ">
                <div class="nf-gradient-3">
                  <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/soil-ph.png" alt="image" class="img-fluid">
                  <h4 class="nf-f-size-16 text-white">Number of cells</h4>
                  <h2><?php echo $number_of_cells;?> </h2>
                </div>
              </div>
              <div class="col-lg-4 col-md-6  mb-4 parameter_box ">
                <div class="nf-gradient-6">
                  <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/harvesting.png" alt="image" class="img-fluid">
                  <h4 class="nf-f-size-16 text-white">Harvesting period</h4>
                  <h2><?php echo $harvesting_period;?><!--<span>Days</span>--></h2>
                </div>
              </div>
            <!--<div class="col-lg-4 col-md-6  mb-4 parameter_box ">
              <div class="nf-gradient-5">
                <img src="<?php //echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/sowing-season2.png" alt="image" class="img-fluid">
                <h4 class="nf-f-size-16 text-white">Season</h4>
                <h2><?php //echo $sowing_season_from; //$months[$sowing_season_from].'-'.$months[$sowing_season_to];?></h2>
              </div>
            </div>-->
          </div>
          <div class="row">

            <div class="col-lg-4 col-md-6  mb-4 parameter_box ">
              <div class="nf-gradient-7">
                <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/wheat-sack.png" alt="image" class="img-fluid">
                <h4 class="nf-f-size-16 text-white">Yield/Ha</h4>
                <h2><?php echo $yieldha;?><!--<span>Mt/Ha</span>--></h2>
              </div>
            </div>
          </div>
        </div>
        <?php if($explore_raw_material!=''){ ?>
          <div class="col 12 col-lg-2 parameter_box databank_box">
            <div class="nf-gradient-20">
              <h4 class="nf-f-size-16 text-white">Explore Raw Material</h4>
              <a href="<?php echo $explore_raw_material;?>" target="_blank">NER DATABASE</a>
            </div>
          </div>
        <?php } ?>
      </div>
      
      
      <h4 class="nf-f-size-20 nf-strong my-3">Feed</h4>
      
      <div class="bg-gray p-4 row mx-0 mb-3">
        <?php echo $feed;?>
      </div>
      <!--<div class="row">
        <div class="col-lg-6 col-md-12 mb-2 mb-lg-0"><a class="btn nf-button-v-small w-100" href="#" role="button">View Complete Details</a></div>
        <div class="col-lg-6 col-md-12"><a class="btn nf-button-v-orange w-100" href="#" role="button">Download Model Project Profile</a></div>
      </div>-->
      
      <div class="circle_bg2">
        <div class="row">
          <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entreprenuearship/circle-bg2.png" alt="background image" class="img-fluid">
        </div>
      </div>
      

    <?php }
  }
  if($record==0) $msg= '<b>No Record Found.</b>';

  $postid = $post->ID;
  
  
  ?>


  

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
			    'value'    => 'Horticulture',
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
                  $stringCut = substr($description, 0, 150);
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
			    'value'    => 'Horticulture',
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
                  $stringCut = substr($description, 0, 150);
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
			    'value'    => 'Horticulture',
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
                  $stringCut = substr($description, 0, 150);
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
			    'value'    => 'Horticulture',
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
                  $stringCut = substr($description, 0, 150);
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



<?php/*?>
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
          ?>

          


          <div class="col-12 col-lg-4">
            <div class="nf-ss-inner">
              <div class="nf-ss-img-inner">
                            <!--<img src="<?php echo get_template_directory_uri(). '/assets/'?>img/home/video-img.png" alt="video image">
                            <a href="#">
                              <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/home/play.png" alt="play">
                            </a>-->
                            <iframe width="100%" height="200" src="<?php echo $youtube_url.$final_str; ?>" frameborder="0" allowfullscreen=""></iframe>
                          </div>
                          <div class="nf-ss-text-inner">
                            <h5><?php echo $suc[$i];?></h5>
                            <p><?php echo $sucdesc[$i];?></p>
                            <div><input type="hidden" id="copylink<?php echo $i?>" value="<?php echo $youtube_url.$final_str; ?>">
                              <a href="javascript:void(0)" title="Copy Link" class="copylink-class" onclick="copyLinkFunction('<?php echo $i?>')">Copy Link</a></div>
                            </div>

                          </div>
                        </div>

                        <?php 
                      }
                      ?>


                    </div>
                  </div>
                </section>
                <?php
              } 
              ?>
              <?php*/?>

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

              <section class="nf-calculator-section nf-cal-tommoto-wrap">
                <div class="container">
                  <div class="row">
                    <div class="col-12">
                      <div class="nf-calculator-block">
                        <div class="nf-left-block">
                          <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/home/calendar.png" alt="calendar">
                          <h2>Farm Cost Calculator <span>Know your Farming cost in advance </span></h2>
                        </div>
                        <div class="nf-right-block">
                          <a href="<?php echo site_url()?>/horticulture-cost-calculator" class="nf-button-v-small">Calculate Now</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </section>
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

          </div>



        </div>
      </div>
    </div>
  </div>

<?php }

if($record==0 or count($blog_posts->posts)==0) $msg= '<b>No Record Found.</b>';

echo $msg;
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
<script>
//$(document).ready(function(){
 //   $('input:checkbox').click(function() {
 //       $('input:checkbox').not(this).prop('checked', false);
 //       document.getElementById("form_id").submit();
 //   });
//});
$(document).ready(function(){
  $('.check_state').click(function() {
    $('.check_state').not(this).prop('checked', false);
    $("input[name=crop]").val('');
    document.getElementById("form_id").submit();
  });
});
$(document).ready(function(){
  $('.check_season').click(function() {
    $('.check_season').not(this).prop('checked', false);
    document.getElementById("form_id").submit();
  });
});
$(document).ready(function(){
  $('.check_crop').click(function() {
    $('.check_crop').not(this).prop('checked', false);
    document.getElementById("form_id").submit();
  });
});

document.body.scrollTop = 500;
document.documentElement.scrollTop = 500;

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