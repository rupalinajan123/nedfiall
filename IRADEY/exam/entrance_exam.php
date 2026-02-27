<?php 
/* Template Name: entrance_exam */
/* Template Post Type: entrance_exam */ 
?>
<?php get_header(); ?>

<?php
global $wp;


$current_slug = add_query_arg( array(), $wp->request );
$current_slug = explode('/',$current_slug);

$the_slug = end($current_slug);

$type = $current_slug[count($current_slug) - 2];


                            //echo 'Post Dynamic fields: ';echo '<br>';
                            $blog_args = array(
                                'post_type' => 'entrance_exam',
                                //'post_id' => $mypost_id,
                                'name'        => $the_slug,
                                'post_status' => 'publish',
                                'posts_per_page' => 1
                            );

                            $blog_posts = new WP_Query($blog_args);
                            //echo "<pre>";
                             //   print_r($blog_posts);
                            while($blog_posts->have_posts()) {
                                $blog_posts->the_post(); 
                               
                                $values= get_fields();
                                
                                if($values)
                                {
                                    $age_limit=''; 
                                    $level_of_study='';  
                                    $degree_offer='';

                                    $qualification=''; 
                                    $eligibility_stream='';  
                                    $conducting_authority='';

                                    $mode_of_exam=''; 
                                    $frequency_per_year='';  
                                    $score_range='';
                                    $institutes='';
                                    $banner_image='';

                                    $available_date='';
                                    $deadline_date='';
                                    $exam_date='';
                                    $result_date='';

                                    $application_process='';
                                    $link_for_the_syllabus_of_the_exam_if_available='';
                                    $link_for_the_official_past_papers_if_available='';

                                    $score_validity='';
                                    $time_duration='';

                                    foreach($values as $key => $value)
                                    {
                                        if($key=='age_limit'){ $age_limit = $value; }
                                        if($key=='level_of_study'){ $level_of_study = $value;  }
                                        if($key=='degree_offer'){ $degree_offer = $value;  }

                                        if($key=='qualification'){ $qualification = $value; }
                                        if($key=='eligibility_stream'){ $eligibility_stream = $value;  }
                                        if($key=='conducting_authority'){ $conducting_authority = $value;  }

                                        if($key=='mode_of_exam'){ $mode_of_exam = $value; }
                                        if($key=='frequency_per_year'){ $frequency_per_year = $value;  }
                                        if($key=='score_range'){ $score_range = $value;  }
                                        if($key=='institutes'){ $institutes = $value;  }
                                        if($key=='banner_image'){ $banner_image = $value;  }

                                        if($key=='available_date'){ $available_date = $value;  }
                                        if($key=='deadline_date'){ $deadline_date = $value;  }
                                        if($key=='exam_date'){ $exam_date = $value;  }
                                        if($key=='result_date'){ $result_date = $value;  }

                                        if($key=='application_process'){ $application_process = $value;  }
                                    if($key=='link_for_the_syllabus_of_the_exam_if_available'){ $link_for_the_syllabus_of_the_exam_if_available = $value;  }
                                    if($key=='link_for_the_official_past_papers_if_available'){ $link_for_the_official_past_papers_if_available = $value;  }

                                        if($key=='score_validity'){ $score_validity = $value;  }
                                        if($key=='time_duration'){ $time_duration = $value;  }
                                        
                                    }
                                }
                       ?>                   

    <!-- inner-banner-start -->
    <div class="inner-banner">
        <div class="container">
            <div class="banner-title">
                <h3><?php the_title();?> <a href="javascript:void(0)" onclick="history.go(-1);" class="changeTopic">Change Topic</a></h3>
                <ul class="breadcrumb">
                    

                    <li class="breadcrumb-item"><a href="#">Education</a></li>
                    <li class="breadcrumb-item">Entrance Exam</li>
                    <li class="breadcrumb-item">
                    <?php $cur_category = get_the_category($post->ID);
                    echo get_cat_name($cur_category[0]->category_parent);
                    ?></li>
                    <li class="breadcrumb-item"><?php echo $cur_category[0]->name;?></li>
                    <li class="breadcrumb-item active"><?php the_title();?></li>

                    <?php
                    
                            $_SESSION['cramb_session'] = '<li class="breadcrumb-item"><a href="#">Education</a></li>
                                                <li class="breadcrumb-item">Entrance Exam</li>
                                                <li class="breadcrumb-item">'.get_cat_name($cur_category[0]->category_parent).'</li>
                                                <li class="breadcrumb-item">'.$cur_category[0]->name.'</li>
                                                <li class="breadcrumb-item ">'.$post->post_title.'</li>';
                        
                    ?>
                </ul>
            </div>
            <div class="banner-content">
                <div class="row">
                    <?php
                    //$attach_ids = get_post_meta( $post->ID, 'post_banner_img', true ); 
                    //if(!empty($attach_ids))
                    //$attach_ids = explode('*****',$attach_ids);
                    //$bimg= wp_get_attachment_image( $attach_ids[0], 'original'); 
                    ?>
                    <div class="col-md-4 banner-img pr-0"><img src="<?php echo $banner_image?>"></div>
                    <div class="col-md-8 pl-0">
                      <div class="bannerbg nd-darkgray justify-content-start pt-3 nf-height-100">
                        <h4><?php the_content();?></h4>
                        <h5><?php //the_excerpt();?></h5>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- inner-banner-end -->



    <div class="inner-body">
        <div class="container">
            <div class="basic-info">
                <h3 class="info-title"><span>Basic Information</span></h3>
                <div class="row">
                    <div class="col-md-4 col-sm-12">
                        <div class="data">
                            <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/icon/time.png" alt="icon">
                            <label>Age Limit:</label>
                            <span><?php echo $age_limit;?></span>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="data">
                            <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/icon/book.png" alt="icon">
                            <label>Level of Study:</label>
                            <span><?php echo $level_of_study;?></span>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="data">
                            <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/icon/degree.png" alt="icon">
                            <label>Degree Offer:</label>
                            <span><?php echo $degree_offer;?></span>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="data">
                            <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/icon/qualification.png" alt="icon">
                            <label>Qualification:</label>
                            <span><?php echo $qualification;?></span>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="data">
                            <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/icon/eligibility.png" alt="icon">
                            <label>Eligibility Stream:</label>
                            <span><?php echo $eligibility_stream;?></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="basic-info">
                <div class="badge-gray"><label class="m-0">Conducting Authority :</label> <span><?php echo $conducting_authority;?></span></div>                
                <div class="row">
                    <div class="col-md-4 col-sm-12">
                        <div class="data">
                            <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/icon/list.png" alt="icon">
                            <label>Mode of Exam:</label>
                            <span><?php echo $mode_of_exam;?></span>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="data">
                            <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/icon/calendar.png" alt="icon">
                            <label>Frequency per year:</label>
                            <span><?php echo $frequency_per_year;?></span>
                        </div>
                    </div>
                   
                    <div class="col-md-4 col-sm-12">
                        <div class="data">
                            <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/icon/musicnode.png" alt="icon">
                            <label>Score Range:</label>
                            <span><?php echo $score_range;?></span>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-12">
                        <div class="data">
                          <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/icon/score.png" alt="score">
                          <label>Score Validity:</label>
                          <span><?php echo $score_validity;?></span>
                        </div>
                      </div>
                      <div class="col-md-4 col-sm-12">
                        <div class="data">
                          <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/icon/clock.png" alt="clock">
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
                    <div class="col-md-4">
                        <h5>Key Elements/Skills Evaluated in the exam:</h5>
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



                            
                        </ul>
                    </div>
                    <div class="col-md-8">
                        <h5>Paper Pattern and Marks Distribution in the paper</h5>
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
                                    </tr>
                                <?php } 
                                ?>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td><span><?php echo $tot;?></span></td>
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

            <div class="bgwithtext-section">
                <?php
                $rows_major = get_post_meta( $post->ID, '_event_major_value_key', true );  
                                
                if(!empty($rows_major)){
                ?>
                <h5>Related Major: <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="right" title="Related Major for <?php the_title();?>"></i></h5>
                <div class="row">

                    <?php
                                if(!empty($rows_major))
                                {
                                    $rows_major = explode('*****',$rows_major);
                                    $k=0;
                                    for($i=0;$i<count($rows_major);$i++) 
                                    {
                                        if($k==9) $k=0;
                                        $k = $k+1;
                                        echo '<div class="col-lg-3 col-md-4">
                                            <div class="box"><span class="bg'.$k.'"></span> '.$rows_major[$i].'</div>
                                        </div>';
                                    } 
                                }

                            ?>

                    
                </div>
            <?php }?>
            </div>

        </div>

        <div class="keydate-appPro-sec">
            <div class="container">
            <div class="row">
                <?php if($available_date!=''){?>
              <div class="col-lg-5 keydate">
                <h3>Key Dates</h3>
                <div class="box mb-4">
                  <ul>
                    <li class="collg">
                      <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/education/clock-white.png" alt="icon">
                      <p>Form Available- <?php echo $available_date;?></p>
                    </li>
                  </ul>
                </div>
              </div>
          <?php }?>

              <div class="col-lg-5 application-process">
                <h3>Application Process</h3>
                <div class="box">
                  <ul>
                    <li class="collg">
                      <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/icon/online-reg.png" alt="icon">
                      <p><a href="<?php echo $application_process;?>" class="text-white" target="_blank"><?php echo $application_process;?></a></p>
                    </li>
                  </ul>
                </div>
              </div>
              </div>
            </div>
            
        </div>

        
        <div class="container">
		<hr class="my-3 my-md-4">
        <div class="institute-list-sec">
          <h4 class="mb-3">Institutes you must explore with the related exam</h4>
          <div class="row">
            <div class="col-xl-6 col-lg-12 mb-4 mb-xl-0">
            <ul>
            <?php //echo $institutes;
           
                $institute = get_post_meta( $post->ID, '_event_gov_value_key', true ); 
                $instituteurl = get_post_meta( $post->ID, '_event_govurl_value_key', true );
                if(!empty($institute))
                {
                    $institute = explode('*****',$institute);
                    $instituteurl = explode('*****',$instituteurl);
                    
                    $k=0;
                    for($i=0;$i<count($institute);$i++) 
                    {
                                 

            ?>
                <li><span><?php echo $institute[$i]?></span>
                  <a href="<?php echo $instituteurl[$i]?>" target="_blank"><?php echo $instituteurl[$i]?></a>
                  </li>
                  <?php
                  }
            }
                  ?>
            
                    
                </ul>
              </div>
              <div class="col-lg-6 col-xl-3 syllabus-link mb-4 mb-lg-0">
                <p>Link for the Syllabus of the exam (if available)</p>
                <div class="data">
                  <a href="<?php echo $link_for_the_syllabus_of_the_exam_if_available;?>" target="_blank"><?php echo $link_for_the_syllabus_of_the_exam_if_available;?></a>
                </div>
              </div>

              <div class="col-lg-6 col-xl-3 syllabus-link">
                <p>Link for the official past papers (if available)</p>
                <div class="data">
                  <a target="_blank" href="<?php echo $link_for_the_official_past_papers_if_available;?>"><?php echo $link_for_the_official_past_papers_if_available;?></a>
                </div>
              </div>

              </div>
            </div><hr>
          </div>
          
          <?php
              $suc = get_post_meta( $post->ID, '_event_suc_value_key', true ); 
              $sucurl = get_post_meta( $post->ID, '_event_sucurl_value_key', true );
              $sucdesc = get_post_meta( $post->ID, '_event_sucdesc_value_key', true ); 
              if(!empty($suc))
              {?>      
        <section class="nf-blog-article" style="padding: 0px;">
              <div class="container">
                <h4 class="mb-3">Videos</h4>
                <div class=" blog-slider">
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
                  if (function_exists("convertYoutube")) {
                    $final_str='';
                    $youtube_url =  convertYoutube($sucurl[$i]); 
                  } 
                  ?>
                    <div>
                        <div class="img-frame">
                          <iframe width="100%" height="200" src="<?php echo $youtube_url.$final_str; ?>" frameborder="0" allowfullscreen=""></iframe>
                          
                        </div>
                       
                        <div class="data-wrwp">
                          <h6><?php echo $suc[$i];?></h6>
                          <p><?php echo $sucdesc[$i];?></p>
                        </div>
                        </div>            
                    <?php 
                      }
                  ?>
              </div>
            </div>
          </section><hr>   
          <?php 
                      }
                  ?>
          

        <?php 
            $qsuc = get_post_meta( $post->ID, '_event_qlinks_value_key', true ); 
            $qsucurl = get_post_meta( $post->ID, '_event_qlinksurl_value_key', true );
            if(!empty($qsuc))
            {
            ?>
        <div class="container">
        <div class="nf-explore-sec">
            <h3 class="mb-3">Explore</h3>
            <ul>
              <?php
                    $qsuc = explode('*****',$qsuc);
                    $qsucurl = explode('*****',$qsucurl);
                                
                    $k=0;
                    for($i=0;$i<count($qsuc);$i++) 
                    {
                      if($k==4) $k=0;
                      $k=$k+1;
                                         
                                ?>
              <li>
                <a href="<?php echo $qsucurl[$i]?>" class="box grd-bg<?php echo $k?>"><?php echo $qsuc[$i]?></a>
              </li>
              <?php 
                      }
                    ?>

              
            </ul>
          </div>
          </div>
          <?php }?>


    </div>
    <div class="nf-education-loan">
          <div class="container">
            <div class="nf-loan-card">
              <div class="row">
                <div class="col-lg-4">
                  <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/education/education-img.png" alt="edcation-img">
                </div>
                <div class="col-lg-4">
                  <div class="nf-data">
                    <h2><span>EDUCATION</span> LOAN</h2>
                    <p>Pursue higher education in India &amp; overseas</p>
                    <a href="<?php echo site_url()?>/education-loan" class="btn-know-more">Know More</a>
                  </div>
                </div>
                <div class="col-lg-4">
                  <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/education/education-money.png" alt="edcation-money">
                </div>
              </div>
            </div>
          </div>
        </div>
<?php }

?>

<!-- footer start -->   
<?php get_footer(); ?> 