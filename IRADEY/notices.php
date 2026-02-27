<?php /*Template Name: Notices */ ?>
<?php get_header(); 

$page_data = get_page_by_path( 'notices' );
?>

    <!-- header-end -->

    <!-- inner-banner-start -->
    <div class="inner-banner">
      <div class="container">
        <div class="banner-title">
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active"><?php echo $page_data->post_title;?></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- inner-banner-end -->

    <div class="inner-body pt-0">
      <div class="container">
       
        <div class="row">
          <div class="col-12">
            <?php $img = wp_get_attachment_url( get_post_thumbnail_id($post_id) );?>
            <div class="nf-banner-tab" style="background-image:url('<?php echo $img?>');">
              <h2><?php echo $page_data->post_title;?></h2>
            </div>
          </div>
        </div>

        <div class="row">
          
          <div class="col-12 col-lg-12">
              <div class="table-responsive nf-table-responsive">
            <table class="nf-right-table-wrap">
              <thead>
                <th colspan="4">Notices</th>
              </thead>
              <tbody>

            <?php
                 $blog_args = array(
                                  'post_type' => 'notice',
                                  'post_status' => 'publish',
                                  'posts_per_page' => -1
                                  );

            $blog_posts = new WP_Query($blog_args);
                                  //echo "<pre>";
                                  //print_r($blog_posts);
            $record=0;
            while($blog_posts->have_posts()) {
                                $blog_posts->the_post(); 

                                $values= get_fields();
                                
                                if($values)
                                {
                                    $date='';
                                    $attachment='';

                                    foreach($values as $key => $value)
                                    {
                                        if($key=='date'){ $date = $value;  } 
                                        if($key=='attachment'){ $attachment = $value;  } 
                                         
                                    }
                                }
                                $record++;
                ?>

                <tr>
                  <td style="width: 60%;">
                    <?php echo $post->post_title;?>
                  </td>
                  <td>
                    Date : <?php echo $date;?>
                  </td>
                  <td>
                    <a href="<?php echo $attachment;?>" target="_blank">Attachment</a>
                  </td>
                </tr>
              <?php }?>
              <tr>
              <td colspan="4">
                    <?php  if($record==0) echo 'No Record Found.' ?>
              </td>
            </tr>

                
              </tbody>
            </table>
          </div>
          </div>
        </div>

</div>
</div>

<?php get_footer(); ?>


