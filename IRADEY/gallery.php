<?php /* Template Name: Gallery */
/* Template Post Type: Gallery */
?>
<?php get_header(); 
$page_data = get_page_by_path( 'gallary' );

$current_slug = add_query_arg( array(), $wp->request );
$current_slug = explode('/',$current_slug);

$the_slug = end($current_slug);
//echo '>>'.$the_slug;
if($the_slug=='gallary') $the_slug='';


$k=0;
     $blog_args = array(
      'post_type' => 'gallery',
      'post_status' => 'publish',
      'posts_per_page' => -1,
      'orderby' => 'post_id',
      'order'   => 'DESC',
    );
     $blog_posts = new WP_Query($blog_args);

?>
<!-- header-end -->
<!-- inner-banner-start -->
<?php $url = wp_get_attachment_url( get_post_thumbnail_id($page_data->ID) );?>
<div class="gallery-banner" style="background-image: url('<?php echo $url;?>');"> 
  <div class="banner-textimg">
        <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/gallery/advancing-northImg.png" alt="advancing-northImg">
    </div> 
    <h2>PHOTO AND VIDEO GALLERY</h2>
    <div class="container">
    <ul class="nav nav-pills gallery-items mb-3 event-gallery-slider" id="pills-tab" role="tablist">
        <!--<li class="nav-item" role="presentation">
        <button onclick="act_fun(this,'all')"  class="nav-link <?php if($the_slug==''){?> active<?php }?>" id="pills-home-tab-all" data-toggle="pill" data-target="#pills-home-all">ALL</button>
      </li>-->
    	<?php
    	while($blog_posts->have_posts()) {
                  $blog_posts->the_post(); 
                  
                  if($the_slug=='')
                  {
                      $the_slug=$post->post_name;
                  }
        if($the_slug==$post->post_name){          
    	?>
      <li class="nav-item" role="presentation">
        <a href="<?php echo get_permalink( $post->ID )?>"   class="nav-link <?php if($the_slug==$post->post_name){?> active<?php }?>" id="pills-home-tab-<?php echo $post->ID?>" ><?php echo  $post->post_title;?></a>
      </li>
  		<?php } }?>
  		
  		<?php
    	while($blog_posts->have_posts()) {
                  $blog_posts->the_post(); 
                  
                  if($the_slug=='')
                  {
                      $the_slug=$post->post_name;
                  }
        if($the_slug!=$post->post_name){   
    	?>
      <li class="nav-item" role="presentation">
        <a href="<?php echo get_permalink( $post->ID )?>"   class="nav-link <?php if($the_slug==$post->post_name){?> active<?php }?>" id="pills-home-tab-<?php echo $post->ID?>" ><?php echo  $post->post_title;?></a>
      </li>
  		<?php } }?>
      
    </ul>
    </div>
</div>

<div class="gallery-wrapper">
    <div class="tab-content" id="pills-tabContent">
        
        <?php /*?><div class="tab-pane fade  <?php if($the_slug==''){?>show active<?php }?>" id="pills-home-all" role="tabpanel" aria-labelledby="pills-home-tab-all">
            <div class="container">
                <div class="row">
        <?php
    	while($blog_posts->have_posts()) {
                  $blog_posts->the_post(); 
                  $values= get_fields();

                  if ($values) {
                      $type = '';
                      $photo = '';
                      $video_url = '';
                      $description='';
        
                      foreach($values as $key => $value)
                      {
                        if($key=='photo'){ $photo = $value; }
                        if($key=='video_url'){ $video_url = $value;  }
                        if($key=='description'){ $description = $value;}
                        if($key=='type'){ $type = $value;} 
                      }
                    }
    	?>
      
        
          
          	<?php if($photo!=''){ ?>
            <div class="col-md-3">
              <div class="img-box">
              	 <img src="<?php echo $photo; ?>" alt="blog img" onclick="$('#modtitle').html('<?php echo ucfirst($post->post_title)?>');$('#imgx').attr('src', '<?php echo $photo; ?>'); javascript:$('#myModal').modal('show')">
              </div>
            </div>
        	<?php }

        	$mult_image= get_post_meta( $post->ID, 'gallery_multi_img', true );
        	if(!empty($mult_image)){
        		 $mult_image_val = explode(',',$mult_image);
                    for($i=0;$i<count($mult_image_val);$i++) { 
                    $img_url=wp_get_attachment_image_url($mult_image_val[$i], "original");		
            ?>
            <div class="col-md-3">
              <div class="img-box">
                <img src="<?php echo $img_url;?>" alt="banner" onclick="$('#modtitle').html('<?php echo ucfirst($post->post_title)?>');$('#imgx').attr('src', '<?php echo $img_url; ?>'); javascript:$('#myModal').modal('show')">
              </div>
            </div>
        	<?php } }?>
            
          
            <?php }?>
            <!--<h3>Event Videos</h3>-->
            <?php
            
    	while($blog_posts->have_posts()) {
                  $blog_posts->the_post(); 
                  $values= get_fields();

                  if ($values) {
                      $type = '';
                      $photo = '';
                      $video_url = '';
                      $description='';
        
                      foreach($values as $key => $value)
                      {
                        if($key=='photo'){ $photo = $value; }
                        if($key=='video_url'){ $video_url = $value;  }
                        if($key=='description'){ $description = $value;}
                        if($key=='type'){ $type = $value;} 
                      }
                    }
    	
            ?>
            
            
          <?php 
          $mult_video= get_post_meta( $post->ID, '_event_collegeabroadurl_value_key', true );
        	if(!empty($mult_video) || $video_url!=''){?>
        		 

          
          
          <?php
          if($video_url!=''){
          if (function_exists("convertYoutube")) {
                    $final_str='';
                    $youtube_url =  convertYoutube($video_url); 
                  } ?>
          
            <div class="col-md-3">
              <div class="img-box">
                <a href="<?php echo $youtube_url;?>" target="_blank">
                   <iframe width="100%" height="212" src="<?php echo $youtube_url;?>" frameborder="0" allowfullscreen=""></iframe>
                </a>
              </div>
            </div>
        	<?php }?>


          
          	<?php
          	if(!empty($mult_video)){
          	$mult_video_val = explode('*****',$mult_video);
                    for($i=0;$i<count($mult_video_val);$i++) { 

                if (function_exists("convertYoutube")) {
                    $final_str='';
                    $youtube_url =  convertYoutube($mult_video_val[$i]); 
                } 
            ?>
        
            <div class="col-md-3">
              <div class="img-box">
                <a href="<?php echo $youtube_url;?>" target="_blank">
                   <iframe width="100%" height="212" src="<?php echo $youtube_url;?>" frameborder="0" allowfullscreen=""></iframe>
                </a>
              </div>
            </div>
        	<?php } }?>
            
        
    	<?php }?>
    	<?php }?>
    	</div>
        </div>
        
      </div><?php */?>
     
  
      
        
    	<?php
    	$blog_args = array(
          'post_type' => 'gallery',
          'post_status' => 'publish',
          'posts_per_page' => -1,
          'name'=>$the_slug,
          'orderby' => 'post_id',
          'order'   => 'DESC',
        );
     $blog_posts = new WP_Query($blog_args);
    	
    	while($blog_posts->have_posts()) {
                  $blog_posts->the_post(); 
                  $values= get_fields();

                  if ($values) {
                      $type = '';
                      $photo = '';
                      $video_url = '';
                      $description='';
        
                      foreach($values as $key => $value)
                      {
                        if($key=='photo'){ $photo = $value; }
                        if($key=='video_url'){ $video_url = $value;  }
                        if($key=='description'){ $description = $value;}
                        if($key=='type'){ $type = $value;} 
                      }
                    }
    	?>
      <div class="tab-pane fade <?php if($the_slug==$post->post_name){?>show active<?php }?>" id="pills-home-<?php echo $post->ID?>" role="tabpanel" aria-labelledby="pills-home-tab-<?php echo $post->ID?>">
        <div class="container">
          <div class="row">
          	<?php if($photo!=''){ ?>
            <div class="col-lg-3 col-md-4">
              <div class="img-box">
              	 <img src="<?php echo $photo; ?>" alt="blog img" onclick="$('#modtitle').html('<?php echo ucfirst($post->post_title)?>');$('#imgx').attr('src', '<?php echo $photo; ?>'); javascript:$('#myModal').modal('show')">
              </div>
            </div>
        	<?php }

        	$mult_image= get_post_meta( $post->ID, 'gallery_multi_img', true );
        	if(!empty($mult_image)){
        		 $mult_image_val = explode(',',$mult_image);
                    for($i=0;$i<count($mult_image_val);$i++) { 
                    $img_url=wp_get_attachment_image_url($mult_image_val[$i], "original");		
            ?>
            <div class="col-lg-3 col-md-4">
              <div class="img-box">
                <img src="<?php echo $img_url;?>" alt="banner" onclick="$('#modtitle').html('<?php echo ucfirst($post->post_title)?>');$('#imgx').attr('src', '<?php echo $img_url; ?>'); javascript:$('#myModal').modal('show')">
              </div>
            </div>
        	<?php } }?>
            
          </div>

          <?php 
          $mult_video= get_post_meta( $post->ID, '_event_collegeabroadurl_value_key', true );
        	if(!empty($mult_video) || $video_url!=''){?>
        		 

          <!--<h3>Event Videos</h3>-->
          <div class="row">
          <?php
          if($video_url!=''){
          if (function_exists("convertYoutube")) {
                    $final_str='';
                    $youtube_url =  convertYoutube($video_url); 
                  } ?>
          
            <div class="col-lg-3 col-md-4">
              <div class="img-box">
                <a href="<?php echo $youtube_url;?>" target="_blank">
                   <iframe width="100%" height="212" src="<?php echo $youtube_url;?>" frameborder="0" allowfullscreen=""></iframe>
                </a>
              </div>
            </div>
        	<?php }?>


          
          	<?php
          	if(!empty($mult_video)){
          	$mult_video_val = explode('*****',$mult_video);
                    for($i=0;$i<count($mult_video_val);$i++) { 

                if (function_exists("convertYoutube")) {
                    $final_str='';
                    $youtube_url =  convertYoutube($mult_video_val[$i]); 
                } 
            ?>
        
            <div class="col-lg-3 col-md-4">
              <div class="img-box">
                <a href="<?php echo $youtube_url;?>" target="_blank">
                   <iframe width="100%" height="212" src="<?php echo $youtube_url;?>" frameborder="0" allowfullscreen=""></iframe>
                </a>
              </div>
            </div>
        	<?php } }?>
            
        </div>
    	<?php }?>
        </div>
      </div>
     
  <?php }?>

    </div>
</div>


 <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="display: block;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h6 class="modal-title" id="modtitle"></h6>
        </div>
        <div class="modal-body">
            
          <p><img style="width: 100%;" id="imgx" src="#" alt="blog img"></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
  
<?php get_footer(); ?>

  <script>
  
  function act_fun(thisTab,id)
  {
      $('.nav-link').removeClass('active'); 
      $(thisTab).addClass('active');
      $('.tab-pane').removeClass('active show');
      $('#pills-home-'+id).addClass('active show');
      
  }
  
  $('.event-gallery-slider').slick({
  arrows: true,
  dots: false,
  lazyLoad: 'ondemand',
  infinite: false,
  speed: 300,
  variableWidth: true,
  slidesToShow: 5,
  slidesToScroll: 1,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        variableWidth: false
      }
    },
    {
      breakpoint: 768,
      settings: {
        slidesToShow: 2,
        variableWidth: false
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        variableWidth: false
      }
    }
  ]
});  
    
  </script>
