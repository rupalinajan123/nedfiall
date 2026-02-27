<?php /*Template Name: E-learning Details */ ?>
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

$title = explode(':',$title);
if($title[1]!='')
{
    $_POST['sectors']=$title[0];
    $_POST['keyword']=$title[1];
}


$page_data = get_page_by_path( 'e-learning-details' );
?>
    <!-- inner-banner-start --> 
    <div class="inner-banner">
        <div class="container">
            <div class="banner-title">
                <h3><?php echo $page_data->post_title;?> </h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Resources </a></li>
                    <li class="breadcrumb-item active"><?php echo $page_data->post_title;?> </li>
                </ul>
            </div> 
            <div class="banner-content">
                <div class="row">
                    <div class="col-md-4 banner-img pr-0"><?php echo get_the_post_thumbnail(); ?></div>
                    <div class="col-md-8  pl-0">
                        <div class="bannerbg nf-gradient-14 justify-content-start pt-3 nf-height-100">
                          <!-- <h4 class="nf-f-size-24"><?php echo $page_data->post_title;?> </h4> -->
                            <h5 class=""><?php echo $page_data->post_content;?></h5>
                            <img src="<?php echo get_template_directory_uri(). '/assets/'?>/img/know-your-approvals/layers-3.png" alt="linear background"
                                class="nf-layes-bg">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- inner-banner-end -->
    <!-- Study tour in north section  -->
  <form method="post" action="<?php echo site_url()?>/e-learning-details" id="form_id">
    <div class="inner-body">
      <div class="container">
        <div class="row">
          <div class="col-12 col-lg-4 nf-sidebar-c-width">
            <div class="courses-details-sidebar-area search-sidebar nf-sidebar nf-kyal">
              <div class="widget mb-20 widget-padding white-bg">

                <a class="btn-link nf-color-1" data-toggle="collapse" href="#state-filter">
                  <img src="<?php echo get_template_directory_uri(). '/assets/'?>/img/study-in-north/state-white.png" alt="state-white"> <span> Select (2)
                  </span></a>
                  <div class="widget-link collapse show" id="state-filter">
                    <ul class="sidebar-link">
                      
                        <li>
                        <div class="nf-radio-wrap">
                          <div class="custom-control custom-radio custom-control-inline pl-0">
                            <input type="radio" id="customRadioInline2" name="region" class="custom-control-input" <? if($_POST['region']=='Global') echo 'checked';?> value="Global" onclick="document.getElementById('form_id').submit();">
                            <label class="custom-control-label" for="customRadioInline2">Global</label>
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="nf-radio-wrap">
                          <div class="custom-control custom-radio custom-control-inline pl-0">
                            <input <? if($_POST['region']=='India') echo 'checked';?> type="radio" id="customRadioInline1" name="region" class="custom-control-input"  value="India" onclick="document.getElementById('form_id').submit();">
                            <label class="custom-control-label" for="customRadioInline1">India</label>
                          </div>
                        </div>
                      </li>
                      
                    </ul>
                  </div>
                  <?php $var = get_field_object('field_60d6cd69119e1');?>
                  <a class="btn-link nf-color-5" data-toggle="collapse" href="#department-filter">
                    <img src="<?php echo get_template_directory_uri(). '/assets/'?>/img/entreprenuearship/sowing-season.png" alt="department"> <span>  Sector (<?php echo count($var['choices'])?>)</span>
                  </a>
                    <div class="widget-link collapse show" id="department-filter">
                      <ul class="sidebar-link">
                        <?php 
                              
                                $k=0;
                                sort($var['choices']);
                                foreach($var['choices'] as $choice)
                                {
                                  if($_POST['sectors']==$choice) $checked = 'checked'; 
                                  else if(is_array($_POST['sectors']) && in_array($choice,$_POST['sectors'])) $checked = 'checked'; 
                                  else  $checked = '';
                                  echo '
                                  <li>
                                    <div class="nf-checkbox-wrap">
                                      <input class="check_sectors" value="'.$choice.'" type="checkbox" '.$checked.' id="dept_'.$k.'" name="sectors[]">
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

                if(!empty($_POST['sectors']))
                        {

                            if(!is_array($_POST['sectors'])) $_POST['sectors']=[$_POST['sectors']];

                            $sts_sector = array(
                              'key'     =>  'sector',
                              'value'    =>  $_POST['sectors'],
                              'compare'  => 'IN'
                          );

                        }
                        if(!empty($_POST['region']))
                        {
                            if(!is_array($_POST['region'])) $_POST['region']=[$_POST['region']];

                            $sts_region = array(
                              'key'     =>  'region',
                              'value'    =>  $_POST['region'],
                              'compare'  => 'IN'
                          );
                        }
                        if($_POST['keyword']!='')
                        {
                            /*$keyw = array(
                                'relation' => 'OR',
                                array(
                                    'key'     =>  'region',
                                    'value'    =>  $_POST['keyword'],
                                    'compare'  => 'LIKE'
                                ),
                                array(
                                    'key'     =>  'sector',
                                    'value'    =>  $_POST['keyword'],
                                    'compare'  => 'LIKE'
                                ),
                            );*/
                        }


                  $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
                  $blog_args = array(
                                        'post_type' => 'e_learning',
                                        'post_status' => 'publish',
                                        's'=>trim($_POST['keyword']),
                                        'paged' => $paged,
                                        'posts_per_page' => 9,
                                        'meta_query'     =>  array(
 
                                            array(
                                                'key'     =>  'region',
                                                'value'   =>  'Advancing North East Dialogue',
                                                'compare'=>'!='
                                                ),
                                            $sts_sector,
                                            $sts_region,
                                            $keyw

                                         )   
                                        
                                        );

                  $blog_posts = new WP_Query($blog_args);
                                        //echo "<pre>";
                                        //print_r($blog_posts);
                  $tot_blog_args = array(
                                        'post_type' => 'e_learning',
                                        'post_status' => 'publish',
                                        's'=>trim($_POST['keyword']),
                                        'posts_per_page' => -1,
                                        'meta_query'     =>  array(
 
                                            array(
                                                'key'     =>  'region',
                                                'value'   =>  'Advancing North East Dialogue',
                                                'compare'=>'!='
                                                ),
                                            $sts_sector,
                                            $sts_region,
                                            $keyw

                                         )   
                                        
                                        );
                        $tot_blog_posts = new WP_Query($tot_blog_args);
                  ?>
                <div class="col-12 col-lg-8 nf-listing-c-width">
                  

           <?php if(!empty($_POST['region']) or !empty($_POST['sectors'])){?>
      <div class="nf-state-listing-block">
             <div class="row">
              <?php if(!empty($_POST['region'])){?>
              <div class="col-12 col-lg-6">
                <a href="#">
                  <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/know-your-approvals/state.png" class="nf-w-t1">
                  <span><?php if(is_array($_POST['region'])) echo Implode(',<br>',$_POST['region']);else echo $_POST['region'];?></span>
                </a>
              </div>
            <?php }?>
            <?php if(!empty($_POST['sectors'])){?>
         <div class="col-12 col-lg-6">
                <a href="#">
                  <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/department.png" class="nf-w-t2">
                  <span><?php if(is_array($_POST['sectors'])) echo Implode(',<br>',$_POST['sectors']);else echo $_POST['sectors'];?></span>
                </a>
              </div>
              <?php }?>

               </div> 
          </div>
      <?php }?>
          

                    <div class="nf-top-filter-wrap">
                        <h2 class="nf-f-size-20 nf-strong mb-0">Total Results (<span id="totcount"><?php echo count($tot_blog_posts->posts);?><!--*2--></span>)</h2>
                       <div class="nf-search-form">
                            <input placeholder="Search here" name="keyword" type="text" value="<?php echo $_POST['keyword']?>">
                            <button type="submit">
                                <i class="ti-search"></i>
                            </button>
                        </div>
                    </div>
                    <div class="nf-know-listing-block  nf-learning-section mt-4">
                      <h4>Videos <a href="#"><!--See More--></a></h4>
                      <div class="row">
                        <?php
                         $record=0;
                            while($blog_posts->have_posts()) {
                                $blog_posts->the_post(); 

                                $values= get_fields();
                                
                                if($values)
                                {
                                    $region=''; 
                                    $sector='';  
                                    $video_url='';

                                    $tag_for_blog=''; 
                                    $blog_title='';  
                                    $blog_url='';

                                    $extra_link_title=''; 
                                    $external_link='';  

                                    foreach($values as $key => $value)
                                    {
                                        if($key=='region'){ $region = $value; }
                                        if($key=='sector'){ $sector = $value;  }
                                        //if($key=='video_url'){ $video_url = $value;  }

                                        //if($key=='tag_for_blog'){ $tag_for_blog = $value; }
                                        //if($key=='blog_title'){ $blog_title = $value;  }
                                        //if($key=='blog_url'){ $blog_url = $value;  }

                                        //if($key=='extra_link_title'){ $extra_link_title = $value; }
                                        //if($key=='external_link'){ $external_link = $value;  }

                                        $video_url = $values['video']['video_url'];
                                        $tag_for_blog = $values['blog']['tag_for_blog'];
                                        $blog_title = $values['blog']['blog_title'];
                                        $blog_url = $values['blog']['blog_url'];

                                        $extra_link_title = $values['links']['extra_link_title'];
                                        $external_link = $values['links']['external_link'];

                                    }
                                }

                      /*if(((isset($_POST) && 
                        ($_POST['sectors']==$sector or $_POST['sectors']=='' or (is_array($_POST['sectors']) && in_array($sector,$_POST['sectors'])))
                        && 
                        ($_POST['region']==$region or $_POST['region']=='' or (is_array($_POST['region']) && in_array($region,$_POST['region'])))
                        

                         && (($_POST['keyword']!='' && (strpos($state, $_POST['keyword']) !== false or strpos($blog_title, $_POST['keyword']) !== false)) or $_POST['keyword']=='')

                      ) or !isset($_POST))){ */
                      
                      if($video_url!=''){
                      $record=$record+1; 

                      if(strpos($video_url,'youtu')!=false && strpos($video_url,'=')!=false) 
                      {
                          $end_str = strstr($video_url, '='); 
                          $final_str = str_replace('=', '', $end_str);
                          $youtube_url = 'https://www.youtube.com/embed/';
                      } 
                      else
                      {
                        $final_str='';
                        $youtube_url= $video_url;
                      }   

                      if (function_exists("convertYoutube")) {
                        $final_str='';
                        $youtube_url =  convertYoutube($video_url); 
                      }    
                ?>

                        <div class="col-12 col-lg-4">
                          <!--<a target="_blank" href="<?php echo $video_url;?>" class="nf-v-image">
                            <img src="<?php echo get_template_directory_uri(). '/assets/'?>/img/entrepreneurship-and-resources/v-img.png"><?php echo $video_url;?>
                          </a>-->
                        
                    <input type="hidden" id="copylink<?php echo $record?>" value="<?php echo $youtube_url.$final_str; ?>">
                      <a href="<?php echo $video_url;?>" target="_blank">
                        <iframe width="100%" height="300" src="<?php echo $youtube_url.$final_str ?>" frameborder="0" allowfullscreen=""></iframe></a>
                        <h6><b><?php echo $post->post_title;//echo $values['video']['video_description'];?></b></h6>
                        <a href="javascript:void(0)" title="Copy Link" class="text-center pt-3"onclick="copyLinkFunction(<?php echo $record?>)">Copy Link</a>
                        </div>

                <?php //} 
                  }
                }
                if($record==0) echo 'No Record Found';

                 $recordx=$record;
                ?>        


                       
                       
                      </div>


                       <h4 id="blogid">Blogs <a href="#"><!--See More--></a></h4>
                         <div class="row">

                          <?php
      $record=0;
                            while($blog_posts->have_posts()) {
                                $blog_posts->the_post(); 

                                $values= get_fields();
                                
                                if($values)
                                {
                                    $region=''; 
                                    $sector='';  
                                    $video_url='';

                                    $tag_for_blog=''; 
                                    $blog_title='';  
                                    $blog_url='';

                                    $extra_link_title=''; 
                                    $external_link=''; 
                                    $blog_image='';

                                    foreach($values as $key => $value)
                                    {
                                        if($key=='region'){ $region = $value; }
                                        if($key=='sector'){ $sector = $value;  }
                                       // if($key=='video_url'){ $video_url = $value;  }

                                        //if($key=='tag_for_blog'){ $tag_for_blog = $value; }
                                        //if($key=='blog_title'){ $blog_title = $value;  }
                                        //if($key=='blog_url'){ $blog_url = $value;  }

                                        //if($key=='extra_link_title'){ $extra_link_title = $value; }
                                        //if($key=='external_link'){ $external_link = $value;  }
                                        //if($key=='blog_image'){ $blog_image = $value;  }

                                        $video_url = $values['video']['video_url'];
                                        $tag_for_blog = $values['blog']['tag_for_blog'];
                                        $blog_title = $values['blog']['blog_title'];
                                        $blog_url = $values['blog']['blog_url'];

                                        $extra_link_title = $values['links']['extra_link_title'];
                                        $external_link = $values['links']['external_link'];
                                        $blog_image = $values['blog']['blog_image'];

                                    }
                                }

                      /*if(((isset($_POST) && 
                        ($_POST['sectors']==$sector or $_POST['sectors']=='' or (is_array($_POST['sectors']) && in_array($sector,$_POST['sectors'])))
                        && 
                        ($_POST['region']==$region or $_POST['region']=='' or (is_array($_POST['region']) && in_array($region,$_POST['region'])))
                        

                         && (($_POST['keyword']!='' && (strpos($state, $_POST['keyword']) !== false or strpos($blog_title, $_POST['keyword']) !== false)) or $_POST['keyword']=='')

                      ) or !isset($_POST))){ */
                      if($tag_for_blog!=''){
                      $record=$record+1;         
                ?>
                        <div class="col-12 col-lg-4">
                          <div class="nf-blog-wrap">
                            <div class="bf-blog-image-wrap">
                              <img src="<?php echo $blog_image;?>">
                            </div>
                             <div class="bf-blog-text-wrap">
                               <span><?php echo $tag_for_blog;?></span>
                               <a target="_blank" href="<?php echo $blog_url;?>"><?php echo $blog_title;?></a>
                             </div>
                          </div>
                        </div>

                        <?php //} 
                      }
                    }
                //if($record==0) echo 'No Record Found';
                $recordblog = $record;
                $recordx=$recordx+$record;
                ?> 
                          
                      </div>
                       <h4 id="linkid">Links <a href="#"><!--See More--></a></h4>
                        <div class="row">
                          <?php
      $record=0;
                            while($blog_posts->have_posts()) {
                                $blog_posts->the_post(); 

                                $values= get_fields();
                                
                                if($values)
                                {
                                    $region=''; 
                                    $sector='';  
                                    $video_url='';

                                    $tag_for_blog=''; 
                                    $blog_title='';  
                                    $blog_url='';

                                    $extra_link_title=''; 
                                    $external_link='';  

                                    foreach($values as $key => $value)
                                    {
                                        if($key=='region'){ $region = $value; }
                                        if($key=='sector'){ $sector = $value;  }
                                        //if($key=='video_url'){ $video_url = $value;  }

                                        //if($key=='tag_for_blog'){ $tag_for_blog = $value; }
                                        //if($key=='blog_title'){ $blog_title = $value;  }
                                        //if($key=='blog_url'){ $blog_url = $value;  }

                                        //if($key=='extra_link_title'){ $extra_link_title = $value; }
                                        //if($key=='external_link'){ $external_link = $value;  }

                                        $video_url = $values['video']['video_url'];
                                        $tag_for_blog = $values['blog']['tag_for_blog'];
                                        $blog_title = $values['blog']['blog_title'];
                                        $blog_url = $values['blog']['blog_url'];

                                        $extra_link_title = $values['links']['extra_link_title'];
                                        $external_link = $values['links']['external_link'];
                                        

                                    }
                                }

                      /*if(((isset($_POST) && 
                        ($_POST['sectors']==$sector or $_POST['sectors']=='' or (is_array($_POST['sectors']) && in_array($sector,$_POST['sectors'])))
                        && 
                        ($_POST['region']==$region or $_POST['region']=='' or (is_array($_POST['region']) && in_array($region,$_POST['region'])))
                        

                         && (($_POST['keyword']!='' && (strpos($state, $_POST['keyword']) !== false or strpos($blog_title, $_POST['keyword']) !== false)) or $_POST['keyword']=='')

                      ) or !isset($_POST))){ */
                      if($extra_link_title!=''){
                      $record=$record+1;         
                ?>
                            <div class="col-md-6">
                                <div class="nf-links-wrap">
                                    <ul>
                                        <li><span><?php echo $extra_link_title;?></span>
                                            <a target="_blank" href="<?php echo $external_link;?>"><?php echo $external_link;?></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <?php //}
                             }
                        }
               // if($record==0) echo 'No Record Found';
               $recordlink = $record;
                $recordx=$recordx+$record;
                ?> 
                            
                        </div>
                        <?php
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
//jQuery("#totcount").html('<?php //echo $recordx;?>');
};

$(document).ready(function(){
<?php if($recordlink==0){?>
    $('#linkid').hide();
<?php }?>

<?php if($recordblog==0){?>
    $('#blogid').hide();
<?php }?>

});

$(document).ready(function(){
    $('.check_sectors').click(function() {
        $('.check_sectors').not(this).prop('checked', false);
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

$( ".page-link" ).click(function() {
  $('#form_id').attr('action',this.href); 
  $( "#form_id" ).submit();
  //alert(this.href);
  return false;
});
</script> 