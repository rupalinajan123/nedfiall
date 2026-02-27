<?php /*Template Name: Employable Skills */ ?>
<?php get_header(); 

$page_data = get_page_by_path( 'employable-skills' );

$qucklinkheading1 = get_field('quick_links_1', $page_data->post_id);
$qucklinkheading2 = get_field('quick_links_2', $page_data->post_id);
$qucklinkheading3 = get_field('quick_links_3', $page_data->post_id);
$qucklinkheading4 = get_field('quick_links_4', $page_data->post_id);


?>
  <!-- header-end -->
  <!-- inner-banner-start -->
  <div class="inner-banner">
    <div class="container">
      <div class="banner-title">
        <h3><?php echo $page_data->post_title;?> </h3>
        <ul class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Employment</a></li>
          <li class="breadcrumb-item active"><?php echo $page_data->post_title;?></li>
        </ul>
      </div>
      <div class="banner-content">
        <div class="row">
          <?php $url = wp_get_attachment_url( get_post_thumbnail_id($post_id) );?>
          <div class="col-md-4 banner-img pr-0"><img src="<?php echo $url?>"></div>
          <div class="col-md-8  pl-0">
            <div class="bannerbg nf-gradient-e-1 justify-content-start pt-3 nf-height-100">
              <h4 class="nf-f-size-24"><?php echo $page_data->post_title;?></h4>
              <h4 class="nf-f-size-24"><?php echo $page_data->post_content;?></h4>
              <!-- <img src="../img/study-in-north/layers-bg.png" alt="layers background" class="nf-layes-bg"> -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- inner-banner-end -->
  <!-- Study tour in north section  -->

  <?php
		   
  $employebleskills = get_field_object('field_60d308ff3a99d');
                  

                ?>
  <div class="inner-body">


    <div class="container">
        
    	<?php 
	foreach($employebleskills['choices'] as $choice)
	{
		

    	?>
        <div class="row mb-2">
          <div class="col-md-8">
            <h4 class="nf-f-size-20 nf-strong nf-emp-ttl text-uppercase"><?php echo $choice; ?></h4>
          </div>
        </div>
          <div class="row nf-emp-skills mb-3">
          	<?php
          		$record=0;
				$blog_args = array(
				                            'post_type' => 'employable_skills',
				                            'post_status' => 'publish',
                                    'posts_per_page' => -1,
				                            'meta_query'     =>  array(
				                                array(
				                                    'key'     =>  'tip_for',
				                                    'value'   =>   $choice  
				                                    )
				                            )
				                    );

				$blog_posts = new WP_Query($blog_args);
				while($blog_posts->have_posts()) {
                $blog_posts->the_post(); 

                $values= get_fields();
                
                if($values)
                {
                    $title='';
                    $tip_for='';
                    $blog_type='';
                    $blog_link='';

                    foreach($values as $key => $value)
                    {
                        if($key=='title'){ $title = $value; } 
                        if($key=='tip_for'){ $tip_for = $value; } 
	                    if($key=='blog_type'){ $blog_type = $value; } 
	                    if($key=='blog_link'){ $blog_link = $value; } 
                       
                    }
                }
              
          		$record=$record+1;
          	?>
            <div class="col-12 col-lg-6 nf-emp-skills-type1">
				<div class="card mb-4">
					<div class="card-title">
						<label class="mb-0"><?php echo $title;?></label>
					</div>
					<div class="card-body">
						<span class="ml-0 ml-md-4"><strong class="nf-f-size-14"><?php echo $blog_type;?></strong>  <a target="_blank" href="<?php echo $blog_link;?>" class="nf-f-size-14"> <?php echo $blog_link;?></a></span>
					</div>
				</div>    
            </div>
        <?php }?>
			 
          </div>
	<?php } ?>  
		<?php/*?>   <div class="row mb-2">
          <div class="col-md-8">
            <h4 class="nf-f-size-20 nf-strong nf-emp-ttl text-uppercase">How to Search Jobs</h4>
          </div>
        </div>
          <div class="row nf-emp-skills">
          	<?php
          		$record=0;
				$blog_args = array(
				                            'post_type' => 'employable_skills',
				                            'post_status' => 'publish',
                                    'posts_per_page' => -1,
				                            'meta_query'     =>  array(
				                                array(
				                                    'key'     =>  'tip_for',
				                                    'value'   =>  'How to Search Jobs'
				                                    )
				                            )
				                    );

				$blog_posts = new WP_Query($blog_args);
				while($blog_posts->have_posts()) {
                $blog_posts->the_post(); 

                $values= get_fields();
                
                if($values)
                {
                    $title='';
                    $tip_for='';
                    $blog_type='';
                    $blog_link='';

                    foreach($values as $key => $value)
                    {
                        if($key=='title'){ $title = $value; } 
                        if($key=='tip_for'){ $tip_for = $value; } 
	                    if($key=='blog_type'){ $blog_type = $value; } 
	                    if($key=='blog_link'){ $blog_link = $value; } 
                       
                    }
                }
              
          		$record=$record+1;
          	?>
            <div class="col-12 col-lg-6 nf-emp-skills-type2">
				<div class="card mb-4">
					<div class="card-title">
						<label class="mb-0"><?php echo $title;?></label>
					</div>
					<div class="card-body">
						<span class="ml-0 ml-md-4"><strong class="nf-f-size-14"><?php echo $blog_type;?></strong>  <a target="_blank" href="<?php echo $blog_link;?>" class="nf-f-size-14"><?php echo $blog_link;?></a></span>
					</div>
				</div>    
            </div>
            <?php }?>
			 
          </div> <?php*/?>
		  
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
  <!-- End Study tour in north section  -->
  
  


  <!-- footer start -->
    <?php get_footer(); ?>