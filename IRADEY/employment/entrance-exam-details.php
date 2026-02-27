<?php /*Template Name: Employment Entrance Exam Details */ ?>
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

$title = explode(':',$title);

if($title[0]!='')
{
    if($title[1]==' National Defence Academy and Naval Academy Examination ') $title[1]=' National Defence Academy and Naval Academy Examination (I) ';
    
    $_POST['entrance_exam_type'] = $title[0];
    $_POST['department'] = $title[0];
    $_POST['exam'] = $title[1];
    $_POST['level'] = 'National Level';
}


if($_POST['entrance_exam_type']=='')
{  
      wp_redirect(site_url('engineering'));
      exit; 
}

get_header(); 
$qucklinkheading1 = get_field('quick_links_1', $page_data->post_id);
$qucklinkheading2 = get_field('quick_links_2', $page_data->post_id);
$qucklinkheading3 = get_field('quick_links_3', $page_data->post_id);
$qucklinkheading4 = get_field('quick_links_4', $page_data->post_id);


$record=0;
if(!empty($_POST['exam']) )
{
    //echo '>>'.$_POST['exam'];exit;
  if(!is_array($_POST['exam'])) $_POST['exam']=[$_POST['exam']];
  $sts_exam = array(
                'key'     =>  'exam_name',
                'value'    =>  $_POST['exam'],
                'compare'  => 'IN'
            );
}

$blog_args = array(
                            'post_type' => 'emp_entrance_exam',
                            'post_status' => 'publish',
                            //'meta_key'=>'exam_name',
                            //'meta_value'=>$_POST['exam'],
                            'posts_per_page' => '1',
                            'meta_query'     =>  array(
 
                                array(
                                    'key'     =>  'entrance_exam_type',
                                    'value'   =>  $_POST['entrance_exam_type']
                                    ),
                                array(
                                    'key'     =>  'department',
                                    'value'   =>  $_POST['department']
                                ),
                                array(
                                    'key'     =>  'level',
                                    'value'   =>  $_POST['level']
                                ),
                                $sts_exam
                                
                            )   


                    );

      $blog_posts = new WP_Query($blog_args);
       // echo "<pre>";
       // print_r($blog_posts);

      if($blog_posts->post_count==0)
      {
          $blog_args = array(
                            'post_type' => 'emp_entrance_exam',
                            'post_status' => 'publish',
                            //'meta_key'=>'exam_name',
                            //'meta_value'=>$_POST['exam'],
                            'posts_per_page' => '1',
                            'meta_query'     =>  array(
 
                                array(
                                    'key'     =>  'entrance_exam_type',
                                    'value'   =>  $_POST['entrance_exam_type']
                                    ),
                                array(
                                    'key'     =>  'department',
                                    'value'   =>  $_POST['department']
                                ),
                                array(
                                    'key'     =>  'level',
                                    'value'   =>  $_POST['level']
                                )
                            )   


                    );

          $blog_posts = new WP_Query($blog_args);
      }


        $banner_image = get_field( "banner_image", $blog_posts->posts[0]->ID );
        $description = get_field( "description", $blog_posts->posts[0]->ID );
        $department = get_field( "department", $blog_posts->posts[0]->ID );
        $exam_name = get_field( "exam_name", $blog_posts->posts[0]->ID );
        if($_POST['department']=='') $_POST['department'] = $department;
        $_POST['exam'] = $exam_name;

        if($banner_image=='') $banner_image= get_template_directory_uri(). '/assets/img/no_record_found_banner.png';
        


?>
    <!-- header-end -->
    <!-- inner-banner-start -->
    <div class="inner-banner">
      <div class="container">
        <div class="banner-title"> <!----->
          <h3><?php echo $_POST['entrance_exam_type'];?> <a href="<?php echo site_url()?>/<?php echo str_replace(' ', '-', $_POST['entrance_exam_type']);?>"  class="changeTopic">Change Topic</a></h3>
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Employment</a></li>
            <li class="breadcrumb-item">Govt. Job Exams</li>
            <li class="breadcrumb-item"><?php echo $_POST['entrance_exam_type'];?></li>
            <li class="breadcrumb-item active"><?php echo $_POST['department'];?></li>
          </ul>
        </div>
        <div class="banner-content">
          <div class="row">
            <div class="col-md-4 banner-img pr-0"><img src="<?php echo $banner_image ?>"></div>
            <div class="col-md-8 pl-0">
              <div class="bannerbg nf-gradient-e-1 justify-content-start pt-3 nf-height-100">
                <h4><?php echo $description;?></h5>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- inner-banner-end -->
    <div class="inner-body">
      <div class="container">
    
    
    <div class="row">

        <div class="col-12 col-lg-4 nf-sidebar-c-width">
          <form method="post" id="form_id" action="<?php echo site_url()?>/employment-entrance-exam-details">
         <input type="hidden" name="entrance_exam_type" value="<?php echo $_POST['entrance_exam_type'];?>">
            <div class="courses-details-sidebar-area search-sidebar nf-sidebar">
              <div class="widget mb-20 widget-padding white-bg">
                <?php $var = get_field_object('field_60db0e77ba2f4');?>
                <a class="btn-link nf-color-1" data-toggle="collapse" href="#state-filter">
                  <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/state-white.png" alt="state-white"> <span> Level (<?php echo count($var['choices']);?>)  </span></a>
                  <div class="widget-link collapse show" id="state-filter">
                    <ul class="sidebar-link">

                      <?php 
                      
                      
                        $k=0;
                        sort($var['choices']);
                        foreach($var['choices'] as $choice)
                        {
                          if($_POST['level']==$choice) $checked = 'checked'; 
                          else if(is_array($_POST['level']) && in_array($choice,$_POST['level'])) $checked = 'checked'; 
                          else  $checked = ''; 
                          echo '
                          <li>
                            <div class="nf-checkbox-wrap">
                              <input value="'.$choice.'" class="check_level" type="checkbox" '.$checked.' id="level_'.$k.'" name="level">
                              <label for="level_'.$k.'">'.$choice.'</label>
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
                  if(!empty($_POST['level']) )
                        {
                          if(!is_array($_POST['level'])) $_POST['level']=[$_POST['level']];
                          $sts_state = array(
                                        'key'     =>  'level',
                                        'value'    =>  $_POST['level'],
                                        'compare'  => 'IN'
                                    );
                        }

                      $args = array(
                          'post_type'   => 'emp_entrance_exam',
                          'meta_key'    => 'entrance_exam_type',
                          'meta_value'  => $_POST['entrance_exam_type'],
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
                      $return_department=array();
                      if( $the_query->have_posts() ){
                        while( $the_query->have_posts() ){ 
                          $the_query->the_post(); 
                          $values= get_fields();
                          $return_department[]=$values['department'];
                      }
                    }

                    $return_department = array_filter(array_unique($return_department));
                    if(!empty($_POST['department']) && !in_array($_POST['department'], $return_department)) $_POST['department']='';
                    wp_reset_query();
                  //=======ajax end
                  ?>


                  <a class="btn-link nf-color-2" data-toggle="collapse" href="#department-filter">
                    <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/department.png" alt="department"> <span>  Department (<?php echo count($return_department);?>) </span>
                  </a>
                  <div class="widget-link collapse show" id="department-filter">
                    <ul class="sidebar-link">

                      <?php 
                      $var = get_field_object('field_60d2f2cf17b9f');
                      
                        $k=0;
                        sort($return_department);
                        //foreach($var['choices'] as $choice)
                        foreach($return_department as $choice)
                        
                        {
                          if($_POST['department']==$choice) $checked = 'checked'; 
                          else if(is_array($_POST['department']) && in_array($choice,$_POST['department'])) $checked = 'checked'; 
                          else  $checked = ''; 
                          echo '
                          <li>
                            <div class="nf-checkbox-wrap">
                              <input value="'.$choice.'" class="check_dept" type="checkbox" '.$checked.' id="dept_'.$k.'" name="department">
                              <label for="dept_'.$k.'">'.$choice.'</label>
                            </div>
                          </li>
                          ';
                          $k++;
                        }
                        ?>

                      
                    

                    </ul>
                  </div>
                  <?php
                      if(!empty($_POST['department']) )
                      {
                        if(!is_array($_POST['department'])) $_POST['department']=[$_POST['department']];

                        $sts_department = array(
                          'key'     =>  'department',
                          'value'    =>  $_POST['department'],
                          'compare'  => 'IN'
                        );
                      }
                      if(!empty($_POST['level']) )
                      {
                        if(!is_array($_POST['level'])) $_POST['level']=[$_POST['level']];

                        $sts_level = array(
                          'key'     =>  'level',
                          'value'    =>  $_POST['level'],
                          'compare'  => 'IN'
                        );
                      }
            // args
                      $g=0;
                      $args = array(
                        'post_type'   => 'emp_entrance_exam',
                        'meta_key'    => 'entrance_exam_type',
                        'meta_value'  => $_POST['entrance_exam_type'],
                        //'orderby' => 'post_id',
                        //'order'   => 'ASC',
                        'post_status' => 'publish',
                        'posts_per_page' => -1,
                        'meta_query'     =>  array(
                          array(
                            'relation' => 'AND',
                            $sts_department,
                            $sts_level
                          )
                        )
                      );
                      $the_query = new WP_Query( $args );
                      $return_title=array();

            //echo "<pre>";
            //print_r($the_query);exit;
                      ?>
                  <a class="btn-link nf-color-3" data-toggle="collapse" href="#Courses-filter">

                    <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/icon/megamenu/University.png" alt="course"> <span> Exam (<?php echo $the_query->post_count;?>)</span>
                  </a>
                  <div class="widget-link collapse show" id="Courses-filter">
                    <ul class="sidebar-link nf-sidebar-scroll">

                      
                      <?php if( $the_query->have_posts() ): ?>
                        <?php while( $the_query->have_posts() ) : $the_query->the_post(); 
                          $values= get_fields();
                          $g++;
                          $croptile = $values['exam_name'];
                          if($_POST['exam']==$croptile) $checked = 'checked'; 
                          else if(is_array($_POST['exam']) && in_array($croptile,$_POST['exam'])) $checked = 'checked'; 
                          else  $checked = ''; 
                          
                            $return_title[]=$values['exam_name'];
                            ?>
                            <li>
                              <div class="nf-checkbox-wrap">
                                <input type="checkbox" class="check_exam" name="exam" <?php echo $checked;?> id="exam<?php echo $g;?>" value="<?php echo $values['exam_name'] ?>" onclick="">
                                <label for="exam<?php echo $g;?>"><?php echo $values['exam_name'] ?> </label>
                              </div>
                            </li>

                            <?php 
                        endwhile; ?>
                      <?php endif; 
                      $return_title = array_filter(array_unique($return_title));
                      //if(!empty($_POST['exam']) && !in_array($_POST['exam'], $return_title)) $_POST['exam']='';
                      ?>



                    </ul>
                  </div>
                </div>
              </div>
              </form>
            </div>
          
    
     <div class="col-12 col-lg-8 nf-listing-c-width">  
    <?php if(!empty($_POST['level']) or !empty($_POST['department'])){?>
      <div class="nf-state-listing-block">
             <div class="row">
              <?php if(!empty($_POST['level'])){?>
              <div class="col-12 col-lg-4">
                <a href="#">
                  <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/state.png" class="nf-w-t1">
                  <span><?php if(is_array($_POST['level'])) echo Implode(',<br>',$_POST['level']);else echo $_POST['level'];?></span>
                </a>
              </div>
            <?php }?>
            <?php if(!empty($_POST['department'])){?>
         <div class="col-12 col-lg-4">
                <a href="#">
                  <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/department.png" class="nf-w-t2">
                  <span><?php if(is_array($_POST['department'])) echo Implode(',<br>',$_POST['department']);else echo $_POST['department'];?></span>
                </a>
              </div>
              <?php }?>
              <?php if(!empty($_POST['exam'])){?>
         <div class="col-12 col-lg-4">
                <a href="#">
                  <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/icon/megamenu/University.png" class="nf-w-t2">
                  <span><?php if(is_array($_POST['exam'])) echo Implode(',<br>',$_POST['exam']);else echo $_POST['exam'];?></span>
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
                    $entrance_exam_type='';
                    $banner_image='';
                    $department='';
                    $description='';
                    $job_role='';
                    $exam_name='';
                    $website='';
                    $conducting_authority='';
                    $age_limit='';
                    $eligibility_stream='';
                    $mode_of_exam='';
                    $score_marks='';
                    $time_duration='';
                    $application_process='';
                    $organisations_associated='';
                    $link_for_the_syllabus_of_the_exam='';
                    $level='';

                    foreach($values as $key => $value)
                    {
                        if($key=='entrance_exam_type'){ $entrance_exam_type = $value; } 
                        if($key=='banner_image'){ $banner_image = $value; }
                        if($key=='department'){ $department = $value; }

                        if($key=='description'){ $description = $value; }
                        if($key=='job_role'){ $job_role = $value; }
                        if($key=='exam_name'){ $exam_name = $value; }
                        if($key=='website'){ $website = $value; }
                        if($key=='conducting_authority'){ $conducting_authority = $value; }
                        if($key=='age_limit'){ $age_limit = $value; }
                        if($key=='eligibility_stream'){ $eligibility_stream = $value; }
                        if($key=='mode_of_exam'){ $mode_of_exam = $value; }
                        if($key=='score_marks'){ $score_marks = $value; }
                        if($key=='time_duration'){ $time_duration = $value; }
                        if($key=='application_process'){ $application_process = $value; }
                        if($key=='organisations_associated'){ $organisations_associated = $value; }
                        if($key=='link_for_the_syllabus_of_the_exam'){ $link_for_the_syllabus_of_the_exam = $value; }
                        if($key=='level'){ $level = $value; }
                    }
                }
              if((isset($_POST) && 
              ($_POST['department']==$department or $_POST['department']=='' or (is_array($_POST['department']) && in_array($department,$_POST['department'])))

              && ($_POST['level']==$level or $_POST['level']=='' or (is_array($_POST['level']) && in_array($level,$_POST['level'])))

                )){ 




        
          $record=$record+1;
    ?>
    
    
    
    
    
      
    
        <div class="basic-info">
          <h3 class="info-title d-flex justify-content-between"><span><?php echo $department;?></span></h3>

      <div class="row nf-engg-jobrole">
        <div class="col-lg-6 col-12">
          <span>Job Role  |  </span>
          <label><strong><?php echo $job_role;?></strong></label>
        </div>
        <div class="col-lg-6 col-12">
          <span>Exam Name  |  </span>
          <label><strong><?php echo $exam_name;?></strong></label>
        </div>
        <div class="col-lg-6 col-12">
          <span>Website  |  </span>
          <label><strong><a target="_blank" href="<?php echo $website;?>"><?php echo $website;?></a></strong></label>
        </div>
      </div>
      
<hr/>

<div class="badge-gray"><label class="m-0">Conducting Authority :</label> <span><?php echo $conducting_authority;?></span></div>
            <div class="row">
              <div class="col-lg-6 col-12">
                <div class="data">
                  <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/icon/time.png" alt="icon">
                  <label>Age Limit:</label>
                  <span><?php echo $age_limit;?></span>
                </div>
              </div>
              <div class="col-lg-6 col-12">
                <div class="data">
                  <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/icon/eligibility.png" alt="icon">
                  <label>Eligibility Stream:</label>
                  <span><?php echo $eligibility_stream;?></span>
                </div>
              </div>
              <div class="col-lg-6 col-12">
                <div class="data">
                  <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/icon/list.png" alt="icon">
                  <label>Mode of Exam:</label>
                  <span><?php echo $mode_of_exam;?></span>
                </div>
              </div>
              <div class="col-lg-6 col-12">
                <div class="data">
                  <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/icon/musicnode.png" alt="icon">
                  <label>Score Marks:</label>
                  <span><?php echo $score_marks;?></span>
                </div>
              </div>
              <div class="col-lg-9 col-sm-12">
                <div class="data">
                  <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/icon/time.png" alt="icon">
                  <label>Time Duration:</label>
                  <span><?php echo $time_duration;?></span>
                </div>
              </div>
            </div>
          </div>
      
      

          
          <!-- End of basic-info -->
          <!-- Start Key Skill Section -->

          <div class="keyskills-section">
            <div class="row">
              <div class="col-lg-4 col-md-12 mb-3">
                <h5>Key Elements Evaluated:</h5>
                <ul class="skill-list">

                  <?php
                            $rows = get_post_meta( $post->ID, '_event_rows_value_key', true ); 
                            $rows1 = get_post_meta( $post->ID, '_event_rows1_value_key', true ); 
                                
                                if(!empty($rows))
                                {
                                    $rows = explode('*****',$rows);
                                    $rows1 = explode('*****',$rows1);
                                
                                    //echo 'Event Rows: ';echo '<br>';
                                    for($i=0;$i<count($rows);$i++) 
                                    {
                                       //echo  $rows[$i].' - '.$rows1[$i]; 
                                        $k = $i+1; 
                                        echo '<li><span class="bg'.$k.'"></span> '.$rows[$i].'</li>';
                                    } 
                                }

                            ?>
                 <!-- <li><span class="bg1"></span> General Studies</li>
                  <li><span class="bg2"></span> Electrical Engineering</li>-->

                </ul>
              </div>
              <div class="col-lg-8 col-md-12">
                <h5>Paper Pattern, Marks Distribution & Time:</h5>
                <div class="table-responsive card">
                  <table class="table progress-table">
                    <tr>
                      <th width="90"><span>Section</span></th>
                      <th><span>Subject</span></th>
                      <th width="100"><span>Weightage</span></th>
                    </tr>
                    <tbody>
                      <?php 
                                    if(!empty($rows))
                                    {
                                       $tot=0;
                                       $maxval = max($rows1);
                                        for($i=0;$i<count($rows);$i++) 
                                        {
                                          $per = $rows1[$i]/$maxval*100;
                                    ?>
                                    <tr>
                                        <td><?php $k = $i+1; echo $k; ?></td>
                                        <td><label><?php echo $rows[$i];?></label>
                                            <div class="progress">
                                              <div class="progress-bar bg-<?php echo $k;?>" role="progressbar" style="width: <?php echo $per; ?>%" aria-valuenow="<?php echo $rows1[$i];?>" aria-valuemin="0" aria-valuemax="<?php echo $maxval;?>"></div>
                                            </div>
                                            
                                        </td>
                                        <td><?php echo $rows1[$i];  
                                        if(is_numeric($rows1[$i]))
                                        $tot = $tot+$rows1[$i]; 

                                    ?></td>
                                    <?php } 
                                ?>
                                
                                  <tr>
                                  <td colspan="2"> </td>
                                  <td colspan=""><?php echo $tot;?> (Total)</td>
                                </tr>
                                <?php
                            }?>
                      
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <!-- End of Key Skill Section -->
          <hr>
         

     <div class="row">
       <div class="col-lg-6 mb-4">
                <h3 class="w-100 nf-f-size-16 nf-strong-600 mb-3">Application Process</h3>
                <div class="box d-flex w-100 nf-engg-approcesss">
                      <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/icon/online-reg.png" alt="icon" class="pr-3">
                      <a href="<?php echo $application_process;?>" class="text-white" target="_blank"><?php echo $application_process;?></a>
                </div>
              </div>
              <div class="col-lg-6 mb-4">
                <h3 class="w-100 nf-f-size-16 nf-strong-600 mb-3">Organisations Associated</h3>
                <div class="box d-flex w-100 nf-engg-orgass">
                      <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/department.png" style="filter: brightness(10);" alt="icon" class="pr-3">
                      <h3 class="nf-f-size-16 mb-0 text-white"><?php echo $organisations_associated;?></h3>
                </div>
              </div>
            </div>

<hr>
     
     
     <div class="row mb-5 mx-0">
      <h3 class="w-100 nf-f-size-16 nf-strong-600 mb-3">Link for the Syllabus of the exam (if available)</h3>
      <a class="word-break-all" href="<?php echo $link_for_the_syllabus_of_the_exam;?>" target="_blank"><?php echo $link_for_the_syllabus_of_the_exam;?></a>
     </div>
     
      

    <?php }
  }

  if($record==0) $msg= '<b>No Record Found.</b>';

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
			&nbsp;
  
  </div>
      </div>
      </div>
     <!-- footer start -->
<?php get_footer(); ?>
<script type="text/javascript">
  $(document).ready(function(){
    $('.check_dept').click(function() {
        $('.check_dept').not(this).prop('checked', false);
        document.getElementById("form_id").submit();
    });
});
  $(document).ready(function(){
    $('.check_level').click(function() {
        $('.check_level').not(this).prop('checked', false);
        document.getElementById("form_id").submit();
    });
});
  $(document).ready(function(){
    $('.check_exam').click(function() {
        $('.check_exam').not(this).prop('checked', false);
        document.getElementById("form_id").submit();
    });
});

  document.body.scrollTop = 500;
document.documentElement.scrollTop = 500;
</script>