<?php 
/*Template Name: career_details */
/* Template Post Type: career */ 
?>
<?php get_header(); ?>


<?php
global $wp;


$current_slug = add_query_arg( array(), $wp->request );
$current_slug = explode('/',$current_slug);

$the_slug = end($current_slug);

$type = $current_slug[count($current_slug) - 2];


                            
                            $blog_args = array(
                                'post_type' => 'career',
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
                                    $banner_image='';
                                    $icon='';

                                    $pathway_1='';
                                    $pathway_2='';
                                    $pathway_3='';
                                    $top_colleges_in_india='';
                                    $top_colleges_in_abroad='';


                                    foreach($values as $key => $value)
                                    {
                                        if($key=='banner_image'){ $banner_image = $value;  }
                                        if($key=='icon'){ $icon = $value; }

                                        if($key=='pathway_1'){ $pathway_1 = $value; }
                                        if($key=='pathway_2'){ $pathway_2 = $value; }
                                        if($key=='pathway_3'){ $pathway_3 = $value; }
                                        if($key=='top_colleges_in_india'){ $top_colleges_in_india = $value; }
                                        if($key=='top_colleges_in_abroad'){ $top_colleges_in_abroad = $value; }
                                        
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
                     <li class="breadcrumb-item">
                    <?php $cur_category = get_the_category($post->ID);
                    echo get_cat_name($cur_category[0]->category_parent);
                    ?></li>
                    <li class="breadcrumb-item"><?php echo $cur_category[0]->name;?></li>
                    <li class="breadcrumb-item active"><?php echo $post->post_title;?></li>
                    
                    <?php
                    
						    $_SESSION['cramb_session'] = '<li class="breadcrumb-item"><a href="#">Education</a></li>
						    					<li class="breadcrumb-item">'.get_cat_name($cur_category[0]->category_parent).'</li>
						    					<li class="breadcrumb-item">'.$cur_category[0]->name.'</li>
						    					<li class="breadcrumb-item ">'.$post->post_title.'</li>';
						
                    ?>
                    
                </ul>
            </div>
            <div class="banner-content">
                <div class="row"><!---banner-img  h-100-->
                    <div class="col-md-4 banner-img pr-0"><img src="<?php echo $banner_image; ?>" class="" alt="banner"></div>
                    <div class="col-md-8 pl-0">
                        <div class="bannerbg nf-gradient-4 justify-content-start nf-height-100">
                          <h4><?php the_content();?></h4>
                        <h5><?php //the_excerpt();?></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- inner-banner-end -->

    <div class="inner-body advocate">
        <div class="container">
          <div class="roles-sec">
            <?php $rows = get_post_meta( $post->ID, '_event_role_value_key', true );
              //print_r($rows);
              if(!empty($rows)){ $rows = explode('*****',$rows); }else{ $rows=array();}
             ?>
            <h4>What can I do (Roles Available) ? </h4>
            <div class="roles-slider">

              <?php 
                                if(!empty($rows))
                                {
                                    //$rows = explode('*****',$rows);
                                    
                                    $k=0;
                                    for($i=0;$i<count($rows);$i++) 
                                    {
                                        $k = $k+1; 
                                        if($k==7) $k=1;
                                        echo '<div class="panel"><div class="panel-body brl-bg'.$k.'"> '.$rows[$i].'</div></div>';
                                    } 
                                }

                            ?>


              
            </div>
          </div>

          <hr>
          <?php
          $rows = get_post_meta( $post->ID, '_event_workplace_value_key', true ); 
          $rows1 = get_post_meta( $post->ID, '_event_workplaceuniv_value_key', true ); 
                    $forloop='';
                    $k=0;
                    $mainbut= '';
                    if(!empty($rows))
                    {
          ?>
          <div class="workplace-sec">
            <h4>Where can I work?</h4>

              <?php
                
                        $rows = explode('*****',$rows);
                        $rows1 = explode('*****',$rows1);
                    
                        $prefm ='<div class="row">';
                        $prefendm ='</div>';
                          $pref='<div class="col-xl-10 col-md-9">
                              <div class="alert alert-danger">
                                <ul class="">';
                          $prefend ='</ul>
                              </div>
                            </div>
                          ';      
                        for($i=0;$i<count($rows);$i++) 
                        {
                           if($rows1[$i]=='Government'){
                            $k = $k+1;
                            if($k==1) 
                            $mainbut= '
                            
                            <div class="col-xl-2 col-md-3">
                              <button type="button" class="btn purple-bg"><img src="'.get_template_directory_uri(). '/assets/img/education/gov-ic.png"> Government</button>
                            </div>';

                            $forloop.= '<li>'.$rows[$i].'</li>';  
                          }
                        } 
                        if($mainbut!='') echo $prefm.$mainbut.$pref.$forloop.$prefend.$prefendm;
                        $forloop='';
                        $mainbut= '';
                        $k=0;

                        $prefm ='<div class="row">';
                        $prefendm ='</div>';
                          $pref='<div class="col-xl-10 col-md-9">
                              <div class="alert alert-secondary">
                                <ul class="">';
                          $prefend ='</ul>
                              </div>
                            </div>
                          ';      

                        for($i=0;$i<count($rows);$i++) 
                        {
                           if($rows1[$i]=='Corporate / Private'){
                            $k = $k+1;
                            if($k==1) 
                            $mainbut= '
                            
                            <div class="col-xl-2 col-md-3">
                              <button type="button" class="btn darkblue-bg"><img src="'.get_template_directory_uri(). '/assets/img/education/corporate.png"> Corporate / Private</button>
                            </div>';
                            
                            $forloop.= '<li>'.$rows[$i].'</li>';  
                          }
                        } 
                        if($mainbut!='') echo $prefm.$mainbut.$pref.$forloop.$prefend.$prefendm;
                        $forloop='';
                        $mainbut= '';
                        $k=0;

                        $prefm ='<div class="row">';
                        $prefendm ='</div>';
                          $pref='<div class="col-xl-10 col-md-9">
                              <div class="alert alert-info">
                                <ul>';
                          $prefend ='</ul>
                              </div>
                            </div>
                          ';      

                        for($i=0;$i<count($rows);$i++) 
                        {
                           if($rows1[$i]=='Startup'){
                            $k = $k+1;
                            if($k==1) 
                            $mainbut= '
                            
                            <div class="col-xl-2 col-md-3">
                              <button type="button" class="btn green-bg"><img src="'.get_template_directory_uri(). '/assets/img/education/startup-ic.png"> Startup</button>
                            </div>';
                            
                            $forloop.= '<li>'.$rows[$i].'</li>';  
                          }
                        } 
                        if($mainbut!='') echo $prefm.$mainbut.$pref.$forloop.$prefend.$prefendm;
                        $forloop='';
                        $mainbut= '';
                        $k=0;

                        $prefm ='<div class="row">';
                        $prefendm ='</div>';
                          $pref='<div class="col-xl-10 col-md-9">
                              <div class="alert alert-warning">
                                <ul>';
                          $prefend ='</ul>
                              </div>
                            </div>
                          ';      

                        for($i=0;$i<count($rows);$i++) 
                        {
                           if($rows1[$i]=='Self-Employed'){
                            $k = $k+1;
                            if($k==1) 
                            $mainbut= '
                            
                            <div class="col-xl-2 col-md-3">
                              <button type="button" class="btn orange-bg"><img src="'.get_template_directory_uri(). '/assets/img/education/selfemp-ic.png"> Self-Employed</button>
                            </div>';
                            
                            $forloop.= '<li>'.$rows[$i].'</li>';  
                          }
                        } 
                        if($mainbut!='') echo $prefm.$mainbut.$pref.$forloop.$prefend.$prefendm;
                    

                ?>




            
          </div>
          <hr>
        <?php }?>

          

          

          <div class="bgwithtext-section">
              <div class="row">
                <div class="col-md-6">
                  <h4>Positives</h4>

                  <?php 
              $rows = get_post_meta( $post->ID, '_event_benefit_value_key', true );
              //$rows1 = get_post_meta( $post->ID, '_event_benefit1_value_key', true );
              $rows1 = array();
                                if(!empty($rows))
                                {
                                    $rows = explode('*****',$rows);
                                    //$rows1 = explode('*****',$rows1);
                                    $j=0;
                                    
                          
                                    for($i=0;$i<count($rows);$i++) 
                                    {
                                        $j++;
                                        $k = $i+1;
                                        $last = count($rows)-1;

                                        if($j==1) echo '<div class="row">';

                                        echo '<div class="col-md-6">
                                            <div class="box"><span class="nf-grnbg'.$k.'"></span> <h5>'.$rows[$i].'</h5>
                                              
                                            </div>
                                        </div> '; 

                                    if($j==2 or $last==$i){ echo '</div>'; $j=0;}

                                    } 
                                }

                            ?>




                  
                </div>

                <div class="col-md-6">
                  <h4>Challenges</h4>

                  <?php 
              $rows = get_post_meta( $post->ID, '_event_challenge_value_key', true );
              //$rows1 = get_post_meta( $post->ID, '_event_challenge1_value_key', true );
              $rows1 = array();
                                if(!empty($rows))
                                {
                                    $rows = explode('*****',$rows);
                                    //$rows1 = explode('*****',$rows1);
                                    $j=0;
                                    
                          
                                    for($i=0;$i<count($rows);$i++) 
                                    {
                                        $j++;
                                        $k = $i+1;
                                        $last = count($rows)-1;

                                        if($j==1) echo '<div class="row">';

                                        echo '<div class="col-md-6">
                                            <div class="box"><span class="nf-orgbg'.$k.'"></span> <h5>'.$rows[$i].'</h5>
                                              
                                            </div>
                                        </div> '; 

                                    
                                    if($j==2 or $last==$i){ echo '</div>'; $j=0;}

                                    } 
                                }

                            ?>
                  
                </div>

              </div>
              
          </div>

          <hr>

          <div class="roles-sec keyskill-sec">
            <h4>Key Skills Required</h4>
            <div class="">

              <?php 
              $rows = get_post_meta( $post->ID, '_event_keyskill_value_key', true );
                                if(!empty($rows))
                                {
                                    $rows = explode('*****',$rows);
                                    $k=0;
                                    for($i=0;$i<count($rows);$i++) 
                                    {
                                        $k = $k+1; 
                                        if($k==7) $k=1;
                                        echo '
                                        <div class="panel"><div class="panel-body brl-bg'.$k.'">'.$rows[$i].'</div></div>';
                                    } 
                                }

                            ?>

              
            </div>
          </div>

          <hr>

          <div class="nf-whystudy-sec">
            <h4>What Should I study ?</h4>
            <div class="row">
              <div class="col-md-3">
                <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/education/undraw_pie_graph.png">
              </div>
              <div class="col-md-9">
                <div class="row">
                  <div class="col-md-4">
                    <div class="card">
                      <div class="card-body">
                        <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/icon/pathway1.png">
                        <h6 class="purpleTxt">Pathway 1</h6>
                        <h5><?php echo $pathway_1?></h5>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="card">
                      <div class="card-body">
                        <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/icon/pathway2.png">
                        <h6 class="darkblueTxt">Pathway 2</h6>
                        <h5><?php echo $pathway_2?></h5>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="card">
                      <div class="card-body">
                        <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/icon/pathway3.png">
                        <h6 class="graphsTxt">Pathway 3</h6>
                        <h5><?php echo $pathway_3?></h5>
                      </div>
                    </div>
                  </div>

                </div>

              </div>
            </div>
          </div>

          


        </div>
        <?php 
        $institutei = get_post_meta( $post->ID, '_event_collegeindia_value_key', true );
        $institutea = get_post_meta( $post->ID, '_event_collegeabroad_value_key', true );
        if(!empty($institutei) or !empty($institutea))
        {
        ?>

        <div class="institute-list-sec sec-padd">
            <div class="container">
                <h4 class="mb-3">Top colleges in India <?php if(!empty($institutea)){?> and Abroad <?php }?></h4>
                <div class="row">
                  <div class="col-lg-6">
                    <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/education/india-map.png" alt="India map">
                    <ul class="top-colglist">

              <?php 
           
                $institute = get_post_meta( $post->ID, '_event_collegeindia_value_key', true ); 
                $instituteurl = get_post_meta( $post->ID, '_event_collegeindiaurl_value_key', true );
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
                    <?php //echo $top_colleges_in_india?>
                  </div>

                  <?php
                $institute = get_post_meta( $post->ID, '_event_collegeabroad_value_key', true ); 
                $instituteurl = get_post_meta( $post->ID, '_event_collegeabroadurl_value_key', true );
                if(!empty($institute))
                {
                  ?>
                  <div class="col-lg-6">
                    <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/education/abroad-map.png" alt="Abroad map">
                    <ul class="top-colglist aborad-clg">
            <?php 
                    $institute = explode('*****',$institute);
                    $instituteurl = explode('*****',$instituteurl);
                    
                    $k=0;
                    for($i=0;$i<count($institute);$i++) 
                    {
            ?>
                <li><span><?php echo $institute[$i]?> </span>
                   <a href="<?php echo $instituteurl[$i]?>" target="_blank"><?php echo $instituteurl[$i]?></a> 
                  </li>
                  <?php
                  }
            
                  ?>
                    </ul>
                    <?php //echo $top_colleges_in_abroad?>
                  </div>
                <?php }?>

                </div>
            </div>
        </div>
      <?php }?>
      
      
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
  </section>
  <?php 
              }
          ?>
  
     <hr> 

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
		  
		  

          <?php }

?>



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
	
</div>
    
  
   
 <!-- footer start -->   
<?php get_footer(); ?>
