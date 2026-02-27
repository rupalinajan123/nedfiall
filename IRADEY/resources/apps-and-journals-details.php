<?php /*Template Name: Apps & Journals Details*/ ?>
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

if($title=='Aquaculture')
{
    $_POST['sectors']='Aquaculture';
    $_POST['platform']='Mobile Apps';
}
if($title=='Strawberry Cultivation')
{
    $_POST['sectors']='Horticulture';
    $_POST['platform']='Journal/Newspaper';
}
if($title=='Turkey Management')
{
    $_POST['sectors']='Animal Husbandry';
    $_POST['platform']='Journal/Newspaper';
}
if($title=='Animal Disease Reporting System')
{
    $_POST['sectors']='Animal Husbandry';
    $_POST['platform']='Website Portal';
}


$page_data = get_page_by_path( 'apps-journals' );
?>  
    <!-- inner-banner-start -->
    <div class="inner-banner">
        <div class="container">
            <div class="banner-title">
                     <h3><?php echo $page_data->post_title;?> </h3>
        <ul class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Resources</a></li>
          <li class="breadcrumb-item active"><?php echo $page_data->post_title;?></li>
        </ul>
            </div>
            <div class="banner-content">
                <div class="row">
                    <div class="col-md-4 banner-img pr-0"><?php echo get_the_post_thumbnail(); ?></div>
                    <div class="col-md-8  pl-0">
                        <div class="bannerbg nf-gradient-14 justify-content-start pt-3 nf-height-100">
                          <!-- <h4 class="nf-f-size-24"><?php echo $page_data->post_title;?></h4> -->
                          <h5><?php echo $page_data->post_content;?></h5>
                            <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/know-your-approvals/layers-3.png" alt="linear background"
                                class="nf-layes-bg">
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
          <form method="post" action="<?php echo site_url()?>/apps-journal-details" id="form_id">
            <div class="row">
                <div class="col-12 col-lg-4 nf-sidebar-c-width">
                    
                    <div class="courses-details-sidebar-area search-sidebar nf-sidebar nf-kyal">
                        <div class="widget mb-20 widget-padding white-bg">
                            <?php $var = get_field_object('field_60cdd5fa4bb7e');?>
                            <a class="btn-link nf-color-2" data-toggle="collapse" href="#department-filter">
                                <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/entrepreneurship-and-resources/sectorsIcon.png" alt="Sectors"> <span>
                                    Sectors (<?php echo count($var['choices']);?>)</span>
                            </a>

                            <div class="widget-link collapse show" id="state-filter">
                                <ul class="sidebar-link nf-sidebar-scroll">
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
                                              <input class="check_sectors" value="'.$choice.'" type="checkbox" '.$checked.' id="state_'.$k.'" name="sectors[]">
                                              <label for="state_'.$k.'">'.$choice.'</label>
                                            </div>
                                          </li>
                                          ';
                                          $k++;
                                        }
                                        ?>
                                    
                                </ul>
                            </div>
                            <?php $var = get_field_object('field_60cdd63f4bb7f');?>
                            <a class="btn-link nf-color-5" data-toggle="collapse" href="#Study-filter">
                              <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/icon/platform.png" alt="study"> <span> Platform (<?php echo count($var['choices']);?>)</span>
                            </a>
                            <div class="widget-link collapse show" id="Study-filter">
                              <ul class="sidebar-link">

                                <?php 
                
                                      $k=0;
                                      sort($var['choices']);
                                      foreach($var['choices'] as $choice)
                                      {
                                        if($_POST['platform']==$choice) $checked = 'checked'; 
                                        else if(is_array($_POST['platform']) && in_array($choice,$_POST['platform'])) $checked = 'checked'; 
                                        else  $checked = '';
                                        echo '
                                        <li>
                                          <div class="nf-checkbox-wrap">
                                            <input class="check_platform" value="'.$choice.'" type="checkbox" '.$checked.' id="dept_'.$k.'" name="platform[]">
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
    
    $sts_dept = array(
                  'key'     =>  'sectors',
                  'value'    =>  $_POST['sectors'],
                  'compare'  => 'IN'
              );

  }
  if(!empty($_POST['platform']))
  {
    if(!is_array($_POST['platform'])) $_POST['platform']=[$_POST['platform']];

    $sts = array(
                  'key'     =>  'platform',
                  'value'    =>  $_POST['platform'],
                  'compare'  => 'IN'
              );
  }
  if($_POST['keyword']!='')
  {
    $keyw = array(
        'relation' => 'OR',
        array(
            'key'     =>  'title',
                  'value'    =>  $_POST['keyword'],
                  'compare'  => 'LIKE'
        ),
        array(
            'key'     =>  'website_link',
                  'value'    =>  $_POST['keyword'],
                  'compare'  => 'LIKE'
        ),
        array(
            'key'     =>  'platform',
                  'value'    =>  $_POST['keyword'],
                  'compare'  => 'LIKE'
        ),
        array(
            'key'     =>  'sectors',
                  'value'    =>  $_POST['keyword'],
                  'compare'  => 'LIKE'
        ),
    );
  }

      $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

                  $blog_args = array(
                                        'post_type' => 'apps_and_journals',
                                        'post_status' => 'publish',
                                        'posts_per_page' => 10,
                                        'paged' => $paged, 
                                            'meta_query'     =>  array(
                                              array(
                                                  'relation' => 'AND',
                                                  $sts,
                                                  $sts_dept,
                                                  $keyw
                                                )
                                            )
                                
                                        );

                  $blog_posts = new WP_Query($blog_args);
                                        

                  $tot_blog_args = array(
                            'post_type' => 'apps_and_journals',
                            'post_status' => 'publish',
                            'posts_per_page' => -1,
                            'meta_query'     =>  array(
                              array(
                                  'relation' => 'AND',
                                  $sts,
                                  $sts_dept,
                                  $keyw
                                )
                            )
                            );
      $tot_blog_posts = new WP_Query($tot_blog_args);
                                       // echo "<pre>";
                                        //print_r($tot_blog_posts);
                  ?>
                <div class="col-12 col-lg-8 nf-listing-c-width">


           <?php if(!empty($_POST['sectors']) or !empty($_POST['platform'])){?>
      <div class="nf-state-listing-block">
             <div class="row">
              <?php if(!empty($_POST['sectors'])){?>
              <div class="col-12 col-lg-6">
                <a href="#">
                  <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/know-your-approvals/state.png" class="nf-w-t1">
                  <span><?php if(is_array($_POST['sectors'])) echo Implode(',<br>',$_POST['sectors']);else echo $_POST['sectors'];?></span>
                </a>
              </div>
            <?php }?>
            <?php if(!empty($_POST['platform'])){?>
         <div class="col-12 col-lg-6">
                <a href="#">
                  <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/department.png" class="nf-w-t2">
                  <span><?php if(is_array($_POST['platform'])) echo Implode(',<br>',$_POST['platform']);else echo $_POST['platform'];?></span>
                </a>
              </div>
              <?php }?>
          
            </div> 
          </div>
      <?php }?>

                    <div class="nf-top-filter-wrap">
                        <h2 class="nf-f-size-20 nf-strong mb-0">Total Results (<span id="totcount"><?php echo $tot_blog_posts->post_count;?></span>)</h2>
                        <div class="nf-search-form">
                            <input placeholder="Search here" name="keyword" type="text" value="<?php echo $_POST['keyword']?>">
                            <button type="submit">
                                <i class="ti-search"></i>
                            </button>
                        </div>
                    </div>
                    <h4><?php //if(!empty($_POST['platform'])) echo implode(',',$_POST['platform']);?></h4>
                    <div class="nf-know-listing-block mt-4">
                    <div class="row">
                      <?php
                      $record=0;
                                            while($blog_posts->have_posts()) {
                                                $blog_posts->the_post(); 

                                                $values= get_fields();
                                                
                                                if($values)
                                                {
                                                    $sectors=''; 
                                                    $platform='';  
                                                    $title='';
                                                    $website_link=''; 
                                                   

                                                    
                                                    foreach($values as $key => $value)
                                                    {
                                                        if($key=='sectors'){ $sectors = $value; }
                                                        if($key=='platform'){ $platform = $value;  }
                                                        if($key=='title'){ $title = $value;  }
                                                        if($key=='website_link'){ $website_link = $value; }
                                                    }
                                                }
                                                

                            /*if(((isset($_POST) && 
                              ($_POST['sectors']==$sectors or $_POST['sectors']=='' or (is_array($_POST['sectors']) && in_array($sectors,$_POST['sectors'])))
                              && ($_POST['platform']==$platform or $_POST['platform']=='' or (is_array($_POST['platform']) && in_array($platform,$_POST['platform'])))
                              
                              

                               && (($_POST['keyword']!='' && (strpos($sectors, $_POST['keyword']) !== false or strpos($platform, $_POST['keyword']) !== false or strpos($title, $_POST['keyword']) !== false or strpos($website_link, $_POST['keyword']) !== false)) or $_POST['keyword']=='')

                            ) or !isset($_POST))){ */
                            $record=$record+1;         
                      ?>

                        
                            <div class="col-lg-6 col-12 mb-4">
                                <div class="nf-know-listing-block">
                                    <div class="mentor-table-two">
                                        <div class="goverment-nameHeading">
                                            <h3><?php echo $title; ?></h3>
                                        </div>
                                        <div class="infoNewAlltabs">
                                            <p><?php echo $platform;?> : <a target="_blank" href="<?php echo $website_link; ?>"><?php echo $website_link; ?></a></p>
                                        </div>

                                    </div>

                                </div>
                            </div>

                           
                            
                        
                      <?php //}

                          }
                          
                          ?>
                          </div>

                    </div>
                        <?php
                          if($record==0) echo 'No Record Found.';
                          // Step  3 : Call the Pagination Function Here  
                            if (function_exists("cpt_pagination")) {
                             cpt_pagination($blog_posts->max_num_pages); 
                            }
                          ?>
                </div>

            </div>
            </form>
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


$(document).ready(function(){
    $('.check_sectors').click(function() {
        $('.check_sectors').not(this).prop('checked', false);
        document.getElementById("form_id").submit();
    });
});

$(document).ready(function(){
    $('.check_platform').click(function() {
        $('.check_platform').not(this).prop('checked', false);
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
