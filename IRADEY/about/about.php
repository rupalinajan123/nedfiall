<?php /*Template Name: About */ ?>
<?php get_header(); 

$current_slug = add_query_arg( array(), $wp->request );
$current_slug = explode('/',$current_slug);
$the_slug = end($current_slug);
$type = $current_slug[count($current_slug) - 2];

//echo $the_slug;exit;

$page_data = get_page_by_path( $the_slug );

?>
<!-- header-end -->

    <!-- inner-banner-start -->
    <div class="inner-banner">
        <div class="container">
            <div class="banner-title">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"><?php echo $page_data->post_title;?></a></li>
                    <li class="breadcrumb-item active">Northeast</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- inner-banner-end -->

    <div class="inner-body pt-0">
        <div class="container">
        	<?php echo $page_data->post_content;?>
           <!--<div class="row mb-md-5">
				<div class="col-xl-3 col-lg-12 col-sm-12 text-center mb-4 mb-xl-2">
					<div class="nf-gradient-16 px-3 py-5 rounded"><h2 class="mb-0 text-white nf-f-size-24 nf-strong text-uppercase">Vision & Mission</h2></div>
				</div>
				<div class="col-xl-3 col-lg-12 col-sm-12 mb-4 mb-xl-2">
					<div class="p-3 nf-ligtbg-gray nf-graybox-shadow rounded">
						<p class="mb-0 text-dark">
						<strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently 
						</p>
					</div>
				</div>
				<div class="col-xl-6 col-lg-12 mb-4 mb-xl-2">
					<video width="100%" height="300" controls poster="<?php //echo get_template_directory_uri(). '/assets/'?>img/about/about-video-poster.png" >
					  <source src="mov_bbb.mp4" type="video/mp4">
					  <source src="mov_bbb.ogg" type="video/ogg">
					  Your browser does not support the video tag.
					</video>
					<?php /* ?> <iframe width="100%" height="320" src="https://www.youtube.com/embed/Dn2ZSX-PiRk" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe><?php */ ?>
				</div>
		   </div> 
		   
		   
		   <div class="row">
		   <div class="col-sm-12 mb-4">
				<div class="col-md-4 text-center">
					<div class="nf-gradient-4 px-3 py-5 rounded"><h2 class="text-white nf-f-size-24 nf-strong text-uppercase">Act Northeast</h2></div>
				</div>
				<div class="col-12 nf-act-northest">
					<div class="p-5 nf-ligtbg-gray nf-graybox-shadow rounded">
						<h2 class="nf-f-size-24 nf-strong mb-3">SAREC PROJECT</h2>
						<p class="mb-0 text-dark">
						<strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
						</p>
					</div>
				</div>
			</div>
			</div>-->
			
			
		    <div class="row mb-4">
				<div class="col-12">
					<h2 class="nf-f-size-24 nf-strong">Explore North Eastern States</h2>
				</div>
			</div>
			<div class="row nf-about-state">

				<?php
                    $args = array(
                      'post_type'   => 'state_about_us',
                      'order'   => 'ASC',
                      'post_status' => 'publish',
                      'posts_per_page' => -1
                    );
                    $the_query = new WP_Query( $args );
                    ?>
                    <?php if( $the_query->have_posts() ): ?>
                      <?php while( $the_query->have_posts() ) : $the_query->the_post(); 
                        $banner_image = get_field( "banner_image", $the_query->ID );
                        ?>
                        <div class="col-lg-4 col-md-6 col-sm-12 pb-4">
							<div class="position-relative">
								<!--<img  src="<?php //echo $banner_image; ?>" class="img-fluid" alt="State image">-->
								<?php
								if($post->post_title=='Arunachal Pradesh') $videofile = 'Arunachal-Pradesh-Video';
								else if($post->post_title=='Assam') $videofile = 'Assam';
								else if($post->post_title=='Manipur') $videofile = 'Manipur';
								else if($post->post_title=='Meghalaya') $videofile = 'Meghalaya';
								else if($post->post_title=='Mizoram') $videofile = 'Mizoram';
								else if($post->post_title=='Nagaland') $videofile = 'Nagaland';
								else if($post->post_title=='Sikkim') $videofile = 'Sikkim';
								else if($post->post_title=='Tripura') $videofile = 'Tripura';
								else if($post->post_title=='NorthEast') $videofile = 'Northeast';
								else $videofile = 'Northeast';
								?>

								<video loop autoplay="autoplay" width="100%" >
					              <source src="<?php echo get_template_directory_uri(). '/assets/'?>img/about/video/<?php echo $videofile;?>.m4v" type="video/mp4">
					              <source src="<?php echo get_template_directory_uri(). '/assets/'?>img/about/video/<?php echo $videofile;?>.ogg" type="video/ogg">
					            </video>
								<span><a href="<?php the_permalink()?>"><?php the_title()?></a></span>
							</div>
						</div>


                      <?php endwhile; ?>
                    <?php endif;  ?>
 				<!--<div class="col-lg-4 col-md-6 col-sm-12 pb-4">
					<div class="position-relative">-->
						<!--<span><a href="<?php //echo site_url()?>/act-north-east-dialogue/;">NorthEast</a></span>-->
						<!--<span><a href="<?php //echo site_url()?>/state_about_us/northeast">NorthEast</a></span>
					</div>
				</div>-->

                   <?php  wp_reset_postdata();
                    ?>

				<!--<div class="col-lg-4 col-md-6 col-sm-12 pb-4">
					<div class="position-relative">
						<img src="<?php //echo get_template_directory_uri(). '/assets/'?>img/about/about-ns1.png" class="img-fluid" alt="State image">
						<span><a href="<?php //echo site_url()?>/state_about_us/arunachal-pradesh/">Arunachal Pradesh</a></span>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 col-sm-12 pb-4">
					<div class="position-relative">
						<img src="<?php //echo get_template_directory_uri(). '/assets/'?>img/about/about-ns2.png" class="img-fluid" alt="State image">
						<span><a href="<?php //echo site_url()?>/state_about_us/assam/">Assam</a></span>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 col-sm-12 pb-4">
					<div class="position-relative">
						<img src="<?php //echo get_template_directory_uri(). '/assets/'?>img/about/about-ns3.png" class="img-fluid" alt="State image">
						<span><a href="<?php //echo site_url()?>/state_about_us/manipur/">MANIPUR</a></span>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 col-sm-12 pb-4">
					<div class="position-relative">
						<img src="<?php //echo get_template_directory_uri(). '/assets/'?>img/about/about-ns4.png" class="img-fluid" alt="State image">
						<span><a href="<?php //echo site_url()?>/state_about_us/meghalaya/">Meghalaya</a></span>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 col-sm-12 pb-4">
					<div class="position-relative">
						<img src="<?php //echo get_template_directory_uri(). '/assets/'?>img/about/about-ns5.png" class="img-fluid" alt="State image">
						<span><a href="<?php //echo site_url()?>/state_about_us/mizoram/">Mizoram</a></span>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 col-sm-12 pb-4">
					<div class="position-relative">
						<img src="<?php //echo get_template_directory_uri(). '/assets/'?>img/about/about-ns6.png" class="img-fluid" alt="State image">
						<span><a href="<?php //echo site_url()?>/state_about_us/nagaland/">Nagaland</a></span>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 col-sm-12 pb-4">
					<div class="position-relative">
						<img src="<?php //echo get_template_directory_uri(). '/assets/'?>img/about/about-ns7.png" class="img-fluid" alt="State image">
						<span><a href="<?php //echo site_url()?>/state_about_us/tripura/">Tripura</a></span>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 col-sm-12 pb-4">
					<div class="position-relative">
						<img src="<?php //echo get_template_directory_uri(). '/assets/'?>img/about/about-ns8.png" class="img-fluid" alt="State image">
						<span><a href="<?php //echo site_url()?>/state_about_us/sikkim/">SIKKIM</a></span>
					</div>
				</div>-->
				<!--<div class="col-lg-4 col-md-6 col-sm-12 pb-4">
					<div class="position-relative">
						<span><a href="<?php //echo site_url()?>/assam">NorthEast</a></span>
					</div>
				</div>-->
				
		   </div> 
		   
		   
        </div>
    </div>
<?php get_footer(); ?>