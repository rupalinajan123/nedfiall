<?php /*Template Name: Act North East dialogue */ ?>
<?php get_header();
$page_data = get_page_by_path( 'act-north-east-dialogue' );
?>
    <!-- inner-banner-start -->
    <div class="inner-banner">
      <div class="container">
        <div class="banner-title">
          <h3><?php echo $page_data->post_title;?></h3>
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Resources </a></li>
            <li class="breadcrumb-item"><a href="#">E- Learning </a></li>
            <li class="breadcrumb-item active"><?php echo $page_data->post_title;?></li>
            
          </ul>
        </div>
        <div class="banner-content">
          <div class="row">
            <div class="col-md-4 banner-img pr-0"><?php echo get_the_post_thumbnail(); ?></div>
            <div class="col-md-8  pl-0">
              <div class="bannerbg nf-gradient-14 justify-content-start pt-3 nf-height-100">
                <h4 class="nf-f-size-24"><?php echo $page_data->post_title;?></h4>
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
    <div class="inner-body">
      <div class="container">
        <div class="row">
          <?php

           if($_POST['keyword']!='')
                        {
                            $keyw = array(
                                'relation' => 'OR',
                                array(
                                    'key'     =>  'act_north_east_dialogue_title_for_act_north_east_dialogue',
                                    'value'    =>  $_POST['keyword'],
                                    'compare'  => 'LIKE'
                                )
                                
                            );
                        }
                  $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
                  $blog_args = array(
                                        'post_type' => 'e_learning',
                                        'post_status' => 'publish',
                                        'paged' => $paged,
                                        'posts_per_page' => 12,
                                         'meta_key'    => 'region',
                                         'meta_value'  => 'Advancing North East Dialogue',
                                         'meta_query'     =>  array(
                                            $keyw
                                         )
                                        );

                  $blog_posts = new WP_Query($blog_args);
                                        //echo "<pre>";
                                        //print_r($blog_posts);
                  $tot_blog_args = array(
                                        'post_type' => 'e_learning',
                                        'post_status' => 'publish',
                                        'posts_per_page' => -1,
                                         'meta_key'    => 'region',
                                         'meta_value'  => 'Advancing North East Dialogue',
                                         'meta_query'     =>  array(
                                            $keyw
                                         )
                                        );
                  $tot_blog_posts = new WP_Query($tot_blog_args);
                  ?>
          <div class="col-12 col-lg-12">
                 
            <div class="nf-top-filter-wrap">
              <h2 class="nf-f-size-20 nf-strong mb-0"></h2>
              <form action="<?php echo site_url()?>/act-north-east-dialogue" method="post" id="form_id">
                <div class="nf-search-form">
                <input placeholder="Search here" name="keyword" type="text" value="<?php echo $_POST['keyword']?>">
                <button type="submit">
                <i class="ti-search"></i>
                </button>
              </div>
              </form>
            </div>
            <div class="nf-know-listing-block  nf-dialogue-section mt-4">
              <h4>Dialogue Videos (<span id="totcount"><?php echo count($tot_blog_posts->posts);?></span>)</h4>
              
              <section class="nf-s-stories-section">
                <div class="row">
                    <?php
      $record=0;
                            while($blog_posts->have_posts()) {
                                $blog_posts->the_post(); 

                                $values= get_fields();

                               // echo '>>'.$values['act_north_east_dialogue']['description'];//exit;
                                //echo '<pre>';
                                //print_r($values);
                               // echo '</pre>';
                                if($values)
                                {
                                    $title_for_act_north_east_dialogue=''; 
                                    $url='';  
                                    $description='';


                                    foreach($values as $key => $value)
                                    {
                                    	//echo '>>'.$key.'>>'.$value;
                                        if($key=='region'){ $region = $value; }
                                        //if($key=='url'){ $url = $value;  }
                                        //if($key=='description'){ $description = $value['act_north_east_dialogue'];  }
                                        //if($key=='title_for_act_north_east_dialogue'){ $title_for_act_north_east_dialogue = $value;  }

                                        $url = $values['act_north_east_dialogue']['url'];
                                        $description = $values['act_north_east_dialogue']['description'];
                                        $title_for_act_north_east_dialogue = $values['act_north_east_dialogue']['title_for_act_north_east_dialogue'];



                                       

                                    }
                                }
                                
                      /*if(((isset($_POST) && 
                        ($_POST['title_for_act_north_east_dialogue']==$state or $_POST['title_for_act_north_east_dialogue']=='' or (is_array($_POST['title_for_act_north_east_dialogue']) && in_array($title_for_act_north_east_dialogue,$_POST['title_for_act_north_east_dialogue'])))
                        

                         && (($_POST['keyword']!='' && (strpos(strtolower($title_for_act_north_east_dialogue), strtolower($_POST['keyword'])) !== false or strpos(strtolower($description), strtolower($_POST['keyword'])) !== false)) or $_POST['keyword']=='')

                      ) or !isset($_POST))){ */
                      $record=$record+1; 

                      if(strpos($url,'youtu')!=false && strpos($url,'=')!=false) 
                      {
                          $end_str = strstr($url, '='); 
                          $final_str = str_replace('=', '', $end_str);
                          $youtube_url = 'https://www.youtube.com/embed/';
                      } 
                      else
                      {
                        $final_str='';
                        $youtube_url= $url;
                      }

                      if (function_exists("convertYoutube")) {
                        $final_str='';
                        $youtube_url =  convertYoutube($url); 
                      }            
                ?>
                <div class="col-12 col-lg-3">
                  <div class="nf-ss-inner">
                    
                    <div class=""> <!--nf-ss-img-inner-->
                      
                      <a href="<?php echo $url;?>" target="_blank">
                        <iframe width="100%" height="200" src="<?php echo $youtube_url.$final_str; ?>" frameborder="0" allowfullscreen=""></iframe>
                       
                      </a>
                    </div>
                    <div class="nf-ss-text-inner">
                      <h5><?php echo $title_for_act_north_east_dialogue;?></h5>
                      <p><?php echo $description;?></p>
                     
                    </div>
                    <div class="col-12 col-lg-12">
                    <input type="hidden" id="copylink<?php echo $record?>" value="<?php echo $youtube_url.$final_str; ?>">
                    <a href="javascript:void(0)" title="Copy Link" class="copylink-class" onclick="copyLinkFunction(<?php echo $record?>)">Copy Link</a>
                  </div>
                  </div>
                </div>
                <?php //}

                }

                if($record==0) echo 'No Record Found.';
                
                ?>
               
              </div>
              <? if($record>0){?>
               <!--<div class="row">
                <div class="col-lg-12 text-center col-md-12 mb-2 mb-lg-0 vm-vc-detail nf-btn_2">
                  <a class="btn nf-button-v-small w-50" href="#" role="button">View more</a>
                </div>
               </div>-->
               <?php }?>
              </section>
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