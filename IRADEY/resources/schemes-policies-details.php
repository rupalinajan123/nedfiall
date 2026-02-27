<?php /* Template Name: schemes-policies-details */
?>
<?php get_header();   

if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
  $url = "https://";else $url = "http://";
$url.= $_SERVER['HTTP_HOST'];   
$url.= $_SERVER['REQUEST_URI'];
$url = explode('?',$url);   
$url = explode('&loginerror',$url[1]);  
$title1 = str_replace('-',' ',$url[0]);

//new line
if(!empty($wp_query->query_vars['flag'])){ $title1= $wp_query->query_vars['flag']; $title1 = str_replace('-',' ',$title1);}

if($title1=='Commerce and Industries')
{
    $_POST['state'] = 'Arunachal Pradesh';
    $_POST['department']=$title1;
}
if($title1=='Agriculture and Horticulture')
{
    $_POST['state'] = 'Nagaland';
    $_POST['department']=$title1;
}
if($title1=='Animal Husbandry and Veterinary Sciences')
{
    $_POST['state'] = 'Manipur';
    $_POST['department']=$title1;
}
if($title1=='Skill Development and Entrepreneurship')
{
    $_POST['state'] = 'Arunachal Pradesh';
    $_POST['department']=$title1;
}

$page_data = get_page_by_path( 'schemes-policies-details' );

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
          <li class="breadcrumb-item"><a href="#">Resources</a></li>
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
<form method="post" action="<?php echo site_url()?>/schemes-policies-details" id="form_id">
    <div class="inner-body">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-4 nf-sidebar-c-width">
                    <div class="courses-details-sidebar-area search-sidebar nf-sidebar nf-kyal">
                        <div class="widget mb-20 widget-padding white-bg">
                           <?php $var = get_field_object('field_60d5c03dbf00b');?>
                           <a class="btn-link nf-color-1" data-toggle="collapse" href="#state-filter">
                            <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/state-white.png" alt="state-white"> <span> State (<?php echo count($var['choices']);?>) 
                            </span></a>
                            <div class="widget-link collapse show" id="state-filter">
                                <ul class="sidebar-link">
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
                                    <input class="check_state" value="'.$choice.'" type="checkbox" '.$checked.' id="state_'.$k.'" name="state[]">
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
                  'post_type' => 'schemes_and_policies',
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

            $var = get_field_object('field_60d5c09bbf00c');?>
            <a class="btn-link nf-color-2" data-toggle="collapse" href="#department-filter">
                <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/department.png" alt="Department"> <span>
                    Department (<?php echo count( $return_department);?>)</span>
                </a>

                <div class="widget-link collapse show" id="state-filter">
                    <ul class="sidebar-link">
                      <?php 

                      $k=0;
                      //foreach($var['choices'] as $choice)
                        foreach($return_department as $choice)
                      {
                          if($_POST['department']==$choice) $checked = 'checked'; 
                          else if(is_array($_POST['department']) && in_array($choice,$_POST['department'])) $checked = 'checked'; 
                          else  $checked = '';
                          echo '
                          <li>
                          <div class="nf-checkbox-wrap">
                          <input class="check_department" value="'.$choice.'" type="checkbox" '.$checked.' id="department_'.$k.'" name="department">
                          <label for="department_'.$k.'">'.$choice.'</label>
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
            if(!empty($_POST['state']))
            {

                if(!is_array($_POST['state'])) $_POST['state']=[$_POST['state']];

                $sts_department = array(
                  'key'     =>  'state',
                  'value'    =>  $_POST['state'],
                  'compare'  => 'IN'
              );

            }
            if(!empty($_POST['department']))
            {
                if(!is_array($_POST['department'])) $_POST['department']=[$_POST['department']];

                $sts = array(
                  'key'     =>  'department',
                  'value'    =>  $_POST['department'],
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
                        'key'     =>  'department',
                        'value'    =>  $_POST['keyword'],
                        'compare'  => 'LIKE'
                    ),
                    array(
                        'key'     =>  'state',
                        'value'    =>  $_POST['keyword'],
                        'compare'  => 'LIKE'
                    ),
                );
            }

            $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

            $blog_args = array(
                'post_type' => 'schemes_and_policies',
                'post_status' => 'publish',
                'posts_per_page' => 10,
                'paged' => $paged, 
                'meta_query'     =>  array(
                  array(
                      'relation' => 'AND',
                      $sts,
                      $sts_department,
                      $keyw
                  )
              )

            );

            $blog_posts = new WP_Query($blog_args);


            $tot_blog_args = array(
                'post_type' => 'schemes_and_policies',
                'post_status' => 'publish',
                'posts_per_page' => -1,
                'meta_query'     =>  array(
                  array(
                      'relation' => 'AND',
                      $sts,
                      $sts_department,
                      $keyw
                  )
              )
            );
            $tot_blog_posts = new WP_Query($tot_blog_args);
                                       // echo "<pre>";
                                        //print_r($tot_blog_posts);
            ?>
            <div class="col-12 col-lg-8 nf-listing-c-width">

             <?php if(!empty($_POST['state']) or !empty($_POST['department'])){?>
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
              <?php if(!empty($_POST['department'])){?>
                 <div class="col-12 col-lg-6">
                    <a href="#">
                      <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/department.png" class="nf-w-t2">
                      <span><?php if(is_array($_POST['department'])) echo Implode(',<br>',$_POST['department']);else echo $_POST['department'];?></span>
                  </a>
              </div>
          <?php }?>

      </div> 
  </div>
<?php }?>

<div class="nf-top-filter-wrap">
    <h2 class="nf-f-size-20 nf-strong mb-0">Total Results (<span id="totcount"><?php echo count($tot_blog_posts->posts);?></span>)  <span class="smallText"><?php echo $state;?> 
    <?php echo $department;?></span></h2>
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
        $state=''; 
        $department='';  
        $title='';

        $scheme_name=''; 
        $name_of_the_umbrella_scheme='';  
        $nodal_agency='';

        $pattern_of_assistance=''; 
        $eligibility_criteria='';  
        $how_to_avail='';
        $download_scheme_guideline='';
        $relevant_link='';



        foreach($values as $key => $value)
        {
            if($key=='state'){ $state = $value; }
            if($key=='department'){ $department = $value;  }
            if($key=='title'){ $title = $value;  }

            if($key=='scheme_name'){ $scheme_name = $value; }
            if($key=='name_of_the_umbrella_scheme'){ $name_of_the_umbrella_scheme = $value;  }
            if($key=='nodal_agency'){ $nodal_agency = $value;  }

            if($key=='pattern_of_assistance'){ $pattern_of_assistance = $value; }
            if($key=='eligibility_criteria'){ $eligibility_criteria = $value;  }
            if($key=='how_to_avail'){ $how_to_avail = $value;  }
            if($key=='download_scheme_guideline'){ $download_scheme_guideline = $value;  }
            if($key=='relevant_link'){ $relevant_link = $value;  }

        }
    }

                      /*if(((isset($_POST) && 
                        ($_POST['state']==$state or $_POST['state']=='' or (is_array($_POST['state']) && in_array($state,$_POST['state'])))
                        && ($_POST['department']==$department or $_POST['department']=='' or (is_array($_POST['department']) && in_array($department,$_POST['department'])))
                        
                        
                        

                         && (($_POST['keyword']!='' && (strpos($state, $_POST['keyword']) !== false or strpos($title, $_POST['keyword']) !== false or strpos($scheme_name, $_POST['keyword']) !== false or strpos($nodal_agency, $_POST['keyword']) !== false)) or $_POST['keyword']=='')

                     ) or !isset($_POST))){ */
                      $record=$record+1;         
                      ?>

                     <div class="nf-know-listing-block mt-4">
                        <div class="row">
                            <div class="col-lg-12 goverment-schemes">
                                <a href="#" class="btnAgriMechanisation"><?php echo $scheme_name;?></a>
                                <div class="borderBottom"></div>
                                <div class="table-responsive">
                                    <table class="table">

                                        <tbody>
                                            <tr>
                                                <!--<td>Scheme Name</td>
                                                <td>Name of the Umbrella Scheme</td>-->
                                                <?php if($eligibility_criteria!=''){?>
                                                <td>Eligibility</td>
                                                <?php }?>
                                                <?php if($pattern_of_assistance!=''){?>
                                                <td colspan="2">Pattern of Assistance</td>
                                                <?php }?>
                                                <?php if($nodal_agency!=''){?>
                                                <td>Nodal Agency</td>
                                                <?php }?>
                                                
                                            </tr>
                                            <tr>
                                                <!--<td><span><?php //echo $scheme_name;?></span></td>
                                                <td><span><?php //echo $name_of_the_umbrella_scheme;?></span></td>-->
                                                <?php if($eligibility_criteria!=''){?>
                                                <td><span><?php echo $eligibility_criteria;?></span></td>
                                                <?php }?>
                                                <?php if($pattern_of_assistance!=''){?>
                                                <td colspan="2"><span><?php echo $pattern_of_assistance;?></span></td>
                                                <?php }?>
                                                <?php if($nodal_agency!=''){?>
                                                <td><span><?php echo $nodal_agency;?></span></td>
                                                <?php }?>
                                                
                                            </tr>

                                            <tr>
                                                <?php if($relevant_link!=''){?>
                                                <td colspan="2">Relevant Link</td>
                                                <?php }?>
                                                <?php if($how_to_avail!=''){?>
                                                <td colspan="2">How to Avail</td>
                                                <?php }?>
                                                
                                            </tr>
                                            <tr>
                                                <?php if($relevant_link!=''){?>
                                                <td colspan="2"><span><a style="word-break:break-all;" href="<?php echo $relevant_link;?>" target="_blank"><?php echo $relevant_link;?></a></span></td>
                                                <?php }?>
                                                <?php if($how_to_avail!=''){?>
                                                <td colspan="2"><span><?php echo $how_to_avail;?></span></td>
                                                <?php }?>
                                                
                                                
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <?php if($download_scheme_guideline!=''){?>
                                <div class="goverment-schemes borderTop">
                                    <ul>
                                        
                                        <li class="w-100">Download Scheme Guideline
                                            <span><a href="<?php echo $download_scheme_guideline;?>" target="_blank"><?php echo $download_scheme_guideline;?></a></span>
                                        </li>
                                        
                                        <?php /*?><li>Relevant Link
                                                <span><a
                                                    href="<?php echo $relevant_link;?>" target="_blank"><?php echo $relevant_link;?></a></span>
                                            </li><?php */?>
                                            </ul>
                                        </div>
                                <?php }?>        
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <?php
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

$(document).ready(function(){
    $('.check_state').click(function() {
        $('.check_state').not(this).prop('checked', false);
        document.getElementById("form_id").submit();
    });
});

$(document).ready(function(){
    $('.check_department').click(function() {
        $('.check_department').not(this).prop('checked', false);
        document.getElementById("form_id").submit();
    });
});

document.body.scrollTop = 500;
document.documentElement.scrollTop = 500;

$( ".page-link" ).click(function() {
  $('#form_id').attr('action',this.href); 
  $( "#form_id" ).submit();
  //alert(this.href);
  return false;
});
</script> 