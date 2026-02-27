<?php /* Template Name: Work Abroad */
?>
<?php get_header(); 
$page_data = get_page_by_path( 'work-abroad' );
?>

<!-- header-end -->
<!-- inner-banner-start -->
<div class="inner-banner" >
  <div class="container">
    <div class="banner-title">
      <h3><?php echo $page_data->post_title;?> </h3>
      <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Employment</a></li>
        <li class="breadcrumb-item active"><?php echo $page_data->post_title;?> </li>
      </ul>
    </div>
    <div class="banner-content">
      <div class="row">
        <?php $img = wp_get_attachment_url( get_post_thumbnail_id($post_id) );?>
        <div class="col-md-4 banner-img pr-0"><img src="<?php echo $img;?>" alt="Work Abroad"></div>
        <div class="col-md-8 pl-0">
          <div class="bannerbg nf-gradient-6 justify-content-start pt-3 nf-height-100">
            <h4 class="nf-f-size-24 nf-color-m-grey"><?php echo $page_data->post_content;?></h4>
            <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/know-your-approvals/layers-3.png" alt="linear background" class="nf-layes-bg">
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
<!-- inner-banner-end -->
<!-- Study tour in north section  -->

<?php
$record=0;
?>
<div class="inner-body">
  <div class="container">

    <div class="tab">
      <button id="firsttext" class="tablinks" onclick="openCity(event, 'London')">Videos</button>
      <button id="secondtext" class="tablinks" onclick="openCity(event, 'Paris')">Blog</button>
    </div>
    <form method="post" action="<?php echo site_url()?>/work-abroad" id="form_id">
      <div id="London" class="tabcontent">

        <div class="inner-body" >
          <div class="container">
            <div class="row">

              <div class="col-12 col-lg-4 nf-sidebar-c-width">

                <div class="courses-details-sidebar-area search-sidebar nf-sidebar nf-kyal">
                  <div class="widget mb-20 widget-padding white-bg">
                    <a class="btn-link nf-color-1" data-toggle="collapse" href="#state-filter">
                     <?php
                     if($_POST['state']=='') $_POST['state']='All';
                     $k=0;
                     $blog_args = array(
                      'post_type' => 'work_abroad',
                      'post_status' => 'publish',
                      'posts_per_page' => -1,
                      'orderby' => 'post_id',
                      'order'   => 'ASC',
                    );
                     $blog_posts = new WP_Query($blog_args);
                     ?>
                     <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/study-in-north/state-white.png" alt="state-white"> <span> State (<?php echo count($blog_posts->posts);?>) 
                     </span></a>
                     <div class="widget-link collapse show" id="state-filter">
                      <ul class="sidebar-link "><!--nf-sidebar-scroll-->
                        <?php
                        if($_POST['state']=='All') $checked = 'checked';
                        echo '
                          <li>
                          <div class="nf-checkbox-wrap">
                          <input class="check_state" value="All" type="checkbox" '.$checked.' id="state_'.$k.'" name="state" class="check_state">
                          <label for="state_'.$k.'">All</label>
                          </div>
                          </li>
                          ';
                        $k++;
                        
                        while($blog_posts->have_posts()) {
                          $blog_posts->the_post(); 
                          $choice = $post->post_title;
                          if($_POST['state']==$choice) $checked = 'checked'; 
                          else if(is_array($_POST['state']) && in_array($choice,$_POST['state'])) $checked = 'checked'; 
                          else  $checked = ''; 
                          echo '
                          <li>
                          <div class="nf-checkbox-wrap">
                          <input class="check_state" value="'.$choice.'" type="checkbox" '.$checked.' id="state_'.$k.'" name="state" class="check_state">
                          <label for="state_'.$k.'">'.$choice.'</label>
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

              <div class="col-12 col-lg-8 nf-listing-c-width">
                <div class="nf-top-filter-wrap">
                  <h2 class="nf-f-size-20 nf-strong mb-0">Total Results (<span id="totcount"></span>)</h2>
                  <div class="nf-search-form">
                    <input placeholder="Search here" type="text" name="keyword" value="<?php echo $_POST['keyword']?>">
                    <button type="submit">
                      <i class="ti-search"></i>
                    </button>
                  </div>
                </div>
                <div class="nf-know-listing-block mt-4">
                  <div class="success-storyGallery">
                  <div class="row">
                      <?php
                      if($_POST['state']=='All') $_POST['state']='';
                      $blog_args = array(
                        'post_type' => 'work_abroad',
                        'post_status' => 'publish',
                        'title'=>$_POST['state'],
                        'posts_per_page' => -1,
                        'orderby' => 'post_id',
                        'order'   => 'ASC',
                      );
                      $post_posts = new WP_Query($blog_args);

                      while($post_posts->have_posts()) {
                        $post_posts->the_post(); 

                        $suc = get_post_meta( $post->ID, '_event_learn_value_key', true ); 
                        $sucurl = get_post_meta( $post->ID, '_event_learnurl_value_key', true );
                        if(!empty($suc))
                        {

                          $suc = explode('*****',$suc);
                          $sucurl = explode('*****',$sucurl);

                          $k=0;
                          for($i=0;$i<count($suc);$i++) 
                          {

                            if($_POST['keyword']=='' or (strpos(strtolower($suc[$i]), strtolower($_POST['keyword'])) !== false)){
                              $record=$record+1;
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
                              <div class="gallery_product col-12 col-lg-4 mb-5">
                                <div class="galleryBox">
                                  <div class="infoGallery">
                                    <iframe width="100%" height="200" src="<?php echo $youtube_url.$final_str; ?>" frameborder="0" allowfullscreen=""></iframe>
                                  
                                  <div class="nf-ss-text-inner">
                                    <h4><?php echo $suc[$i];?></h4>
                                    <!--<p>  <a target="_blank" href="<?php echo $sucurl[$i]; ?>">Watch Video</a></p>-->
                                    <p><input type="hidden" id="copylink<?php echo $i?>" value="<?php echo $youtube_url.$final_str; ?>">
                                      <a href="javascript:void(0)" title="Copy Link" class="copylink-class" onclick="copyLinkFunction('<?php echo $i?>')">Copy Link</a></p>
                                    </div>
                                  </div>
                                </div>
                              </div>

                              <?php }
                            }
                          }
                        }
                        if($record==0) echo '&nbsp;&nbsp;&nbsp;&nbsp;No Record Found';
                        ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
      <div id="Paris" class="tabcontent">
       <div class="inner-body">
       <div class="container"> 
        <div class="nf-work-abroad">
          <div class="nf-top-filter-wrap">
            <h2 class="nf-f-size-20 nf-strong mb-0">Total Countries (<?php echo $blog_posts->post_count;?>)</h2>
          </div>
          <section class="workabroad-blog mt-4">
            <div class="row">
                <?php
                while($blog_posts->have_posts()) {
                  $blog_posts->the_post(); 
                  $values= get_fields();

                  ?>
           <?php /*?><div class="col-lg-4 col-md-6 col-sm-6">
            <a href="<?php the_permalink()?>">
            <div class="card">
              <?php $img = wp_get_attachment_url( get_post_thumbnail_id($post_id) );?>
              <img src="<?php echo $img?>" alt=" Flag">
              <h3><?php the_title()?></h3>
            </div>
            </a>
            </div><?php */?>

            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 filter Recent">
              <div class="box">
                <div class="img-wrap">
                  <?php $image = wp_get_attachment_url( get_post_thumbnail_id($post_id) );?>
                  <img src="<?php echo $image; ?>" alt="blog img">
                  <a href="<?php echo get_post_permalink($post_id); ?>" class="view-btn" tabindex="0">View</a>
                </div>
                <div class="data-wrwp">
                  <h6><?php echo  $post->post_title;?></h6>
                  <p>
                    <?php
                        $description = $post->post_content;
                        if (strlen($description) > 150) {
                          $stringCut = substr($description, 0, 150);
                          $endPoint = strrpos($stringCut, ' ');
                          $description = $endPoint? substr($stringCut, 0, $endPoint).'...':substr($stringCut, 0).'...';
                        } 
                        echo strip_tags($description);
                      ?>
                  </p>
                </div>
              </div>
            </div>

            <?php }
            ?>
          </div>
        </section>
      </div>
      </div>
    </div>
  </div>
</div>




</div>
</div>
<!-- End Work Abroad section  -->
<!-- End Study tour in north section  -->
<!-- footer start -->   
<?php get_footer(); ?>
<script>
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
//===
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}


$(document).ready(function(){
  $('.check_state').click(function() {
    $('.check_state').not(this).prop('checked', false);
    document.getElementById("form_id").submit();
  });
});

document.body.scrollTop = 500;
document.documentElement.scrollTop = 500;

window.onload = function(){
  jQuery("#totcount").html('<?php echo $record;?>');

  document.getElementById('London').style.display = "block";
  $('#firsttext').addClass('active');

//document.getElementById('Paris').style.display = "block";
//$('#secondtext').addClass('active');

};
</script>