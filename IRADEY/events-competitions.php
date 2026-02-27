<?php /*Template Name: Events-Competitions */ ?>
<?php get_header(); 

$page_data = get_page_by_path( 'events-competitions' );
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
          <div class="col-1 col-lg-1">
            <div class="nf-left-label-wrap">
              <span>Career  </span>
            </div>
          </div>
          <div class="col-11 col-lg-11">
              <div class="table-responsive nf-table-responsive">
            <table class="nf-right-table-wrap">
              <thead>
                <th>Events and Competition</th>
                <th >Event Date</th>
                <th >Last date of Application</th>
                <th></th>
              </thead>
              <tbody>

            <?php

                  $sts = array(
                    'key'     =>  'status',
                    'value'    => 'Active',
                    'compare'  => '='
                  );

                 $blog_args = array(
                                  'post_type' => 'new_and_event',
                                  'post_status' => 'publish',
                                  'meta_key'    => 'type',
                                  'meta_value'  => 'Career',
                                  'posts_per_page' => -1,
                                  'meta_query'     =>  array(
                                      array(
                                        'relation' => 'AND',
                                        $sts
                                      )
                                    )
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
                                    $type='';
                                    $published_date='';
                                    $laste_date='';
                                    $link='';
                                    
                                    

                                    foreach($values as $key => $value)
                                    {
                                        if($key=='type'){ $type = $value;  }  
                                        if($key=='published_date'){ $published_date = $value;  } 
                                        if($key=='laste_date'){ $laste_date = $value;  } 
                                        if($key=='link'){ $link = $value;  } 
                                         
                                    }
                                }
                                
								
					//if(strtotime($published_date)<=strtotime(date('Y-m-d')) && strtotime($laste_date)>=strtotime(date('Y-m-d'))){
					$record++;						
                ?>

                <tr>
                  <td style="width: 45%;">
                    <?php echo $post->post_title;?>
                  </td>
                  <td>
                    <?php echo $published_date;?>
                  </td>
                  <td>
                   <?php echo $laste_date;?>
                  </td>
                  <td>
                    <a href="<?php echo $link;?>" target="_blank">Click here</a>
                  </td>
                </tr>
			<?php //}
			}
			?>
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

        <div class="row">
          <div class="col-1 col-lg-1">
            <div class="nf-left-label-wrap nf_label_color_1">
              <span>   Entrepreneurship   </span>
            </div>
          </div>
          <div class="col-11 col-lg-11">
              <div class="table-responsive nf-table-responsive">
            <table class="nf-right-table-wrap">
              <thead>
                <th>Events and Competition</th>
                <th >Event Date</th>
                <th >Last date of Application</th>
                <th></th>
              </thead>
              <tbody>
                <?php
                $sts = array(
                    'key'     =>  'status',
                    'value'    => 'Active',
                    'compare'  => '='
                  );
                 $blog_args = array(
                                  'post_type' => 'new_and_event',
                                  'post_status' => 'publish',
                                  'meta_key'    => 'type',
                                  'meta_value'  => 'Entrepreneurship',
                                  'posts_per_page' => -1,
                                  'meta_query'     =>  array(
                                      array(
                                        'relation' => 'AND',
                                        $sts
                                      )
                                    )
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
                                    $type='';
                                    $published_date='';
                                    $laste_date='';
                                    $link='';
                                    
                                    

                                    foreach($values as $key => $value)
                                    {
                                        if($key=='type'){ $type = $value;  }  
                                        if($key=='published_date'){ $published_date = $value;  } 
                                        if($key=='laste_date'){ $laste_date = $value;  } 
                                        if($key=='link'){ $link = $value;  } 
                                         
                                    }
                                }
                                
					//if(strtotime($published_date)<=strtotime(date('Y-m-d')) && strtotime($laste_date)>=strtotime(date('Y-m-d'))){
						$record++;
                ?>

                <tr>
                  <td style="width: 45%;">
                    <?php echo $post->post_title;?>
                  </td>
                  <td>
                     <?php echo $published_date;?>
                  </td>
                  <td>
                     <?php echo $laste_date;?>
                  </td>
                  <td>
                    <a href="<?php echo $link;?>" target="_blank">Click here</a>
                  </td>
                </tr>
              <?php //}
			}
              ?>
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

        <div class="row">
          <div class="col-1 col-lg-1">
            <div class="nf-left-label-wrap nf_label_color_2">
              <span>   Employment  </span>
            </div>
          </div>
          <div class="col-11 col-lg-11">
            <div class="table-responsive nf-table-responsive">
            <table class="nf-right-table-wrap">
              <thead>
                <th>Events and Competition</th>
                <th >Event Date</th>
                <th >Last date of Application</th>
                <th></th>
              </thead>
              <tbody>
                <?php
                $sts = array(
                    'key'     =>  'status',
                    'value'    => 'Active',
                    'compare'  => '='
                  );
                 $blog_args = array(
                                  'post_type' => 'new_and_event',
                                  'post_status' => 'publish',
                                  'meta_key'    => 'type',
                                  'meta_value'  => 'Employment',
                                  'posts_per_page' => -1,
                                  'meta_query'     =>  array(
                                      array(
                                        'relation' => 'AND',
                                        $sts
                                      )
                                    )
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
                                    $type='';
                                    $published_date='';
                                    $laste_date='';
                                    $link='';
                                    
                                    

                                    foreach($values as $key => $value)
                                    {
                                        if($key=='type'){ $type = $value;  }  
                                        if($key=='published_date'){ $published_date = $value;  } 
                                        if($key=='laste_date'){ $laste_date = $value;  } 
                                        if($key=='link'){ $link = $value;  } 
                                         
                                    }
                                }
                                
					//if(strtotime($published_date)<=strtotime(date('Y-m-d')) && strtotime($laste_date)>=strtotime(date('Y-m-d'))){
					$record++;			
                ?>

                <tr>
                  <td style="width: 45%;">
                    <?php echo $post->post_title;?>
                  </td>
                  <td>
                    <?php echo $published_date;?>
                  </td>
                  <td>
                    <?php echo $laste_date;?>
                  </td>
                  <td>
                    <a href="<?php echo $link;?>" target="_blank">Click here</a>
                  </td>
                </tr>
              <?php //}
			}
              ?>
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


