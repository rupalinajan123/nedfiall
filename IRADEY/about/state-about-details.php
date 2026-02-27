<?php /*Template Name: State About Details*/ 
/* Template Post Type: state_about_us */
?>
<?php get_header(); 


$current_slug = add_query_arg( array(), $wp->request );
$current_slug = explode('/',$current_slug);
$the_slug = end($current_slug);
$type = $current_slug[count($current_slug) - 2];

$blog_args = array(
                    'post_type' => 'state_about_us',
                    'name'        => $the_slug,
                    'post_status' => 'publish',
                    'posts_per_page' => 1
                );

                            $blog_posts = new WP_Query($blog_args);
                            //echo "<pre>";
                            //print_r($blog_posts);

                            while($blog_posts->have_posts()) {
                                $blog_posts->the_post(); 


                                $values= get_fields();
                                
                                if($values)
                                {
                                    
                                    $banner_image='';
                                    $date_of_formation = '';
                                    $location='';
                                    $population='';
                                    $male_population='';

                                    $female_population = '';
                                    $kids_ratio = '';
                                    $population_density = '';
                                    $per_capita_income = '';

                                    $state_gdp = '';
                                    $state_map = '';
                                    $number_of_district = '';
                                    $number_of_tehsil = '';

                                    $blocksrevenue_blocks = '';
                                    $lok_shabha_seats = '';
                                    $lac_assembly_seats = '';
                                    $rabha_shabha_seats = '';
                                    $major_highways = '';

                                    $airports = ''; 
                                    $waterways = '';
                                    $river_ports = '';
                                    $inland_container_depot = ''; 
                                    $railway_stations = ''; 
                                    $major_cities = ''; 
                                    $total_forest_area = ''; 

                                    $annual_rainfall = '';
                                    $summer_weather = '';
                                    $monsoon_weather = '';
                                    $winter_weather = '';
                                        
                                    $area_under_irrigation = '';
                                    $area_under_horticulture = ''; 
                                    $major_horticulture_crop = '';

                                    $major_spices_crop = '';
                                    $gi_varieties_spices = '';

                                    foreach($values as $key => $value)
                                    {
                                        if($key=='banner_image'){ $banner_image = $value;  } 
                                        if($key=='date_of_formation'){ $date_of_formation = $value; } 
                                        if($key=='location'){ $location = $value; } 
                                        if($key=='population'){ $population = $value; } 
                                        if($key=='male_population'){ $male_population = $value; }
                                        if($key=='female_population'){ $female_population = $value; }
                                        if($key=='kids_ratio'){ $kids_ratio = $value; }
                                        if($key=='population_density'){ $population_density = $value; }
                                        if($key=='per_capita_income'){ $per_capita_income = $value; } 

                                        if($key=='state_gdp'){ $state_gdp = $value; } 
                                        if($key=='state_map'){ $state_map = $value; } 
                                        if($key=='number_of_district'){ $number_of_district = $value; } 
                                        if($key=='number_of_tehsil'){ $number_of_tehsil = $value; } 

                                        if($key=='blocksrevenue_blocks'){ $blocksrevenue_blocks = $value; } 
                                        if($key=='lok_shabha_seats'){ $lok_shabha_seats = $value; } 
                                        if($key=='lac_assembly_seats'){ $lac_assembly_seats = $value; } 
                                        if($key=='rabha_shabha_seats'){ $rabha_shabha_seats = $value; } 
                                        if($key=='major_highways'){ $major_highways = $value; } 

                                        if($key=='airports'){ $airports = $value; } 
                                        if($key=='waterways'){ $waterways = $value; } 
                                        if($key=='river_ports'){ $river_ports = $value; } 
                                        if($key=='inland_container_depot'){ $inland_container_depot = $value; } 
                                        if($key=='railway_stations'){ $railway_stations = $value; } 
                                        if($key=='major_cities'){ $major_cities = $value; } 
                                        if($key=='total_forest_area'){ $total_forest_area = $value; } 

                                        if($key=='annual_rainfall'){ $annual_rainfall = $value; } 
                                        if($key=='summer_weather'){ $summer_weather = $value; } 
                                        if($key=='monsoon_weather'){ $monsoon_weather = $value; } 
                                        if($key=='winter_weather'){ $winter_weather = $value; } 
                                        
                                        if($key=='area_under_irrigation'){ $area_under_irrigation = $value; } 
                                        if($key=='area_under_horticulture'){ $area_under_horticulture = $value; } 
                                        if($key=='major_horticulture_crop'){ $major_horticulture_crop = $value; } 

                                        if($key=='major_spices_crop'){ $major_spices_crop = $value; }
                                        if($key=='gi_varieties_spices'){ $gi_varieties_spices = $value; }



                                    }
                                }
?>

    <!-- inner-banner-start -->
    <div class="inner-banner">
        <div class="container">
            <div class="banner-title">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">About</a></li>
                    <li class="breadcrumb-item"><a href="#">Northeast</a></li>
                    <li class="breadcrumb-item active"><?php the_title()?></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- inner-banner-end -->

    <div class="inner-body pt-0">
        <div class="container">
		<div class="row nf-state-banner">
			<div class="col-12 pb-4">
				<div class="position-relative">
					<!--<img src="<?php //echo $banner_image;?>" class="img-fluid w-100" alt="assam-banner">-->
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
					<span><a href="javascript:void(0);"><?php the_title()?></a></span>
				</div>
			</div>
		</div>
<?php if($the_slug!='northeast'){?>
  <div class="row nf-gradient-1 mx-0 nf-dt-formation py-2 rounded mb-4 align-items-center">
        <div class="col-lg-4 py-1 nf-abt-dateformation">
          <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/about/date-formation1.png" alt="capacity">
          <span class="text-white"><strong>Date of Formation :  <?php echo $date_of_formation; ?></strong>  </span>
        </div>
		 <div class="col-lg-4 py-1 nf-abt-dateformation">
          <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/about/date-formation2.png" alt="capacity">
          <span class="text-white"><strong>Capital :  <?php echo $location;?></strong>  </span>
        </div>
		 <div class="col-lg-4 py-1 nf-abt-dateformation">
          <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/about/date-formation3.png" alt="capacity">
          <span class="text-white"><strong>Population :  <?php echo $population;?></strong>  </span>
        </div>
  </div>  
  <?PHP }?>
  
		<div class="row nf-abt-popn">
          <div class="col-md-6 col-sm-12 col-lg-4 mb-4">
            <div class="nf-gradient-4 d-flex rounded py-4 px-2 align-items-center">
              <img class="img-fluid" src="<?php echo get_template_directory_uri(). '/assets/'?>img/about/population1.png" alt="icon-1.png">
              <span class="text-white px-2">Male Population</span>
              <h2 class="text-white mb-0 nf-strong-600 nf-f-size-24"><?php echo $male_population;?> </h2>
            </div>
          </div>
		   <div class="col-md-6 col-sm-12 col-lg-4 mb-4">
            <div class="nf-gradient-17 d-flex rounded py-4 px-2 align-items-center">
              <img class="img-fluid" src="<?php echo get_template_directory_uri(). '/assets/'?>img/about/population2.png" alt="icon-1.png">
              <span class="text-white px-2">Female Population</span>
              <h2 class="text-white mb-0 nf-strong-600 nf-f-size-24"><?php echo $female_population;?></h2>
            </div>
          </div>
          <?php if($the_slug!='northeast'){?>
		   <div class="col-md-6 col-sm-12 col-lg-4 mb-4">
            <div class="nf-gradient-18 d-flex rounded py-4 px-2 align-items-center">
              <img class="img-fluid" src="<?php echo get_template_directory_uri(). '/assets/'?>img/about/population3.png" alt="icon-1.png">
              <span class="text-white px-2">Kids Ratio</span>
              <h2 class="text-white mb-0 nf-strong-600 nf-f-size-24"><?php echo $kids_ratio;?></h2>
            </div>
          </div>
      	<?php }else{?>
      		<div class="col-md-6 col-sm-12 col-lg-4 mb-4">
            <div class="nf-gradient-18 d-flex rounded py-4 px-2 align-items-center">
              <img class="img-fluid" src="<?php echo get_template_directory_uri(). '/assets/'?>img/about/population1.png" alt="icon-1.png">
              <img class="img-fluid" src="<?php echo get_template_directory_uri(). '/assets/'?>img/about/population2.png" alt="icon-1.png">
              <span class="text-white px-2">Population</span>
              <h2 class="text-white mb-0 nf-strong-600 nf-f-size-24"><?php echo $population;?></h2>
            </div>
          </div>
      	<?php }?>

        </div>
		
		
		<div class="row nf-polution-wrap rounded border mx-0 mb-4 py-2">
			<div class="col-md-12 col-sm-12 col-lg-4 d-flex align-items-center mb-3 mb-lg-0">
              <span class="nf-f-size-14">Population Density</span>
              <h2 class="nf-f-size-18 mb-0 nf-strong-600"><?php echo $population_density;?></h2>
			  <span class="nf-f-size-14"><small>people per square meter</small></span>
            </div>
			<div class="col-md-12 col-sm-12 col-lg-4 d-flex align-items-center mb-3 mb-lg-0">
              <span class="nf-f-size-14">Per Capita Income</span>
              <h2 class="nf-f-size-18 mb-0 nf-strong-600"><?php echo $per_capita_income;?></h2>
			  <span class="nf-f-size-14"><small></small></span>
            </div>
			<div class="col-md-12 col-sm-12 col-lg-4 d-flex align-items-center mb-3 mb-lg-0">
              <span class="nf-f-size-14"><?php if($the_slug!='northeast'){?>State GDP<?php }else{?>GDP<?php }?></span>
              <h2 class="nf-f-size-18 mb-0 nf-strong-600 "><?php echo $state_gdp;?></h2>
			  <span class="nf-f-size-14"><small></small></span>
            </div>
        </div>
		
		
		<div class="row nf-map-wrap mb-4">
			<div class="col-lg-5 col-sm-12 px-0">
			<img class="img-fluid" src="<?php echo $state_map;?>" alt="map">
            </div>
			<div class="col-lg-7 col-sm-12">
				<div class="nf-map-bluebg rounded mb-4">
					<div class="col-4">
						<h2 class="text-white nf-strong-600"><?php echo $number_of_district;?></h2>
						<span class="nf-f-size-14">Number of District<span>
					</div>
					<div class="col-4">
						<h2 class="text-white nf-strong-600"><?php echo $number_of_tehsil;?></h2>
						<span class="nf-f-size-14">Tehsil<span>
					</div>
					<div class="col-4">
						<h2 class="text-white nf-strong-600"><?php echo $blocksrevenue_blocks;?></h2>
						<span class="nf-f-size-14">Blocks/Revenue Blocks<span>
					</div>
				</div>
				
				<div class="col-12 px-0">
					<h2 class="nf-f-size-20 mb-3 nf-strong text-uppercase">Political seats</h2>
				</div>
				
				<div class="nf-poly-seats row">
					<div class="col-md-6 col-lg-5 col-sm-12">
					<div class="border px-1 py-1 rounded">
						<img class="img-fluid" src="<?php echo get_template_directory_uri(). '/assets/'?>img/about/polytical-seat1.png" alt="image">
						<h2 class="mb-0 nf-strong-600 nf-f-size-28"><?php echo $lok_shabha_seats;?></h2>
						<span class="nf-f-size-14">Lok Sabha Seats<span>
					</div>
					</div>
					<div class="col-md-6 col-lg-5 col-sm-12">
					<div class="border px-1 py-1 rounded">
						<img class="img-fluid" src="<?php echo get_template_directory_uri(). '/assets/'?>img/about/polytical-seat2.png" alt="image">
						<h2 class="mb-0 nf-strong-600 nf-f-size-28"><?php echo $lac_assembly_seats;?></h2>
						<span class="nf-f-size-14">LAC Assembly Seats<span>
					</div>
					</div>
					<div class="col-md-6 col-lg-5 col-sm-12">
					<div class="border px-1 py-1 rounded">
						<img class="img-fluid" src="<?php echo get_template_directory_uri(). '/assets/'?>img/about/polytical-seat3.png" alt="image">
						<h2 class="mb-0 nf-strong-600 nf-f-size-28"><?php echo $rabha_shabha_seats;?></h2>
						<span class="nf-f-size-14">Rajya Sabha Seats<span>
					</div>
					</div>
				</div>
            </div>
        </div>
		
		
		
		<hr/>
		
		<div class="row mb-4">
			<div class="col-12">
				<h2 class="nf-f-size-20 nf-strong text-uppercase">Communication Mode</h2>
			</div>
		</div>
		
		<div class="row mb-4 mb-md-3 align-items-center">
			<div class="col-lg-3 col-md-4 col-sm-12 nf-commn-mode-l">
				<div class="px-1 py-2 rounded nf-cm-gradient1  mb-3 mb-md-0">
					<img class="img-fluid" src="<?php echo get_template_directory_uri(). '/assets/'?>img/about/communication-mode1.png" alt="image" />

					<h2 class="mb-0 text-white nf-strong-600 nf-f-size-28">
						<?php if(!empty($major_highways) && $major_highways=='NIL') echo 0; else if(!empty($major_highways)) echo count(explode(',',$major_highways));else echo '0'; ?>
					</h2>
					<span class="nf-f-size-14">Major Highways<span>
				</div>
            </div>
			<div class="col-lg-9 col-md-8 col-sm-12">
              <p class="mb-0 text-dark">
			  <?php echo $major_highways;?>
			  </p>
            </div>
        </div>
		<div class="row mb-4 mb-md-3 align-items-center">
			<div class="col-lg-3 col-md-4 col-sm-12 nf-commn-mode-l">
				<div class="px-1 py-2 rounded nf-cm-gradient2  mb-3 mb-md-0">
					<img class="img-fluid" src="<?php echo get_template_directory_uri(). '/assets/'?>img/about/communication-mode2.png" alt="image" />
					<h2 class="mb-0 text-white nf-strong-600 nf-f-size-28">
						<?php if(!empty($airports) && $airports=='NIL') echo 0; else if(!empty($airports)) echo count(explode(',',$airports)); else echo '0'; ?>
					</h2>
					<span class="nf-f-size-14">Airports<span>
				</div>
            </div>
			<div class="col-lg-9 col-md-8 col-sm-12">
              <p class="mb-0 text-dark">
			  <?php echo $airports;?>
			  </p>
            </div>
        </div>
		<div class="row mb-4 mb-md-3 align-items-center">
			<div class="col-lg-3 col-md-4 col-sm-12 nf-commn-mode-l">
				<div class="px-1 py-2 rounded nf-cm-gradient3 mb-3 mb-md-0">
					<img class="img-fluid" src="<?php echo get_template_directory_uri(). '/assets/'?>img/about/communication-mode3.png" alt="image" />
					<h2 class="mb-0 text-white nf-strong-600 nf-f-size-28">
						<?php if(!empty($waterways) && $waterways=='NIL') echo 0; else if(!empty($waterways)) echo count(explode(',',$waterways));else echo '0'; ?>
					</h2>
					<span class="nf-f-size-14">Waterways<span>
				</div>
            </div>
			<div class="col-lg-9 col-md-8 col-sm-12">
              <p class="mb-0 text-dark">
			  <?php echo $waterways;?>
			  </p>
            </div>
        </div>
		<div class="row mb-3 align-items-center">
			<div class="col-lg-3 col-md-4 col-sm-12 nf-commn-mode-l">
				<div class="px-1 py-2 rounded nf-cm-gradient4 mb-3 mb-md-0">
					<img class="img-fluid" src="<?php echo get_template_directory_uri(). '/assets/'?>img/about/communication-mode4.png" alt="image" />
					<h2 class="mb-0 text-white nf-strong-600 nf-f-size-28">
						<?php if(!empty($river_ports) && $river_ports=='NIL') echo 0; else if(!empty($river_ports)) echo count(explode(',',$river_ports));else echo '0'; ?>
					</h2>
					<span class="nf-f-size-14">River Ports<span>
				</div>
            </div>
			<div class="col-lg-9 col-md-8 col-sm-12">
              <p class="mb-0 text-dark">
			 <?php echo $river_ports;?>
			  </p>
            </div>
        </div>
		<div class="row mb-4 mb-md-3 align-items-center">
			<div class="col-lg-3 col-md-4 col-sm-12 nf-commn-mode-l">
				<div class="px-1 py-2 rounded nf-cm-gradient5 mb-3 mb-md-0">
					<img class="img-fluid" src="<?php echo get_template_directory_uri(). '/assets/'?>img/about/communication-mode5.png" alt="image" />
					<h2 class="mb-0 text-white nf-strong-600 nf-f-size-28">
						<?php if(!empty($inland_container_depot) && $inland_container_depot=='NIL') echo 0; else if(!empty($inland_container_depot)) echo count(explode(',',$inland_container_depot));else echo '0'; ?>
					</h2>
					<span class="nf-f-size-14">Inland Container Depot<span>
				</div>
            </div>
			<div class="col-lg-9 col-md-8 col-sm-12">
              <p class="mb-0 text-dark">
			  <?php echo $inland_container_depot;?> 
			  </p>
            </div>
        </div>
		<div class="row mb-4 mb-md-3 align-items-center">
			<div class="col-lg-3 col-md-4 col-sm-12 nf-commn-mode-l">
				<div class="px-1 py-2 rounded nf-cm-gradient6 mb-3 mb-md-0">
					<img class="img-fluid" src="<?php echo get_template_directory_uri(). '/assets/'?>img/about/communication-mode6.png" alt="image" />
					<h2 class="mb-0 text-white nf-strong-600 nf-f-size-28">
						<?php if(!empty($railway_stations) && $railway_stations=='NIL') echo 0; else if(!empty($railway_stations)) echo count(explode(',',$railway_stations));else echo '0'; ?>
					</h2>
					<span class="nf-f-size-14">Railway Junction<span>
				</div>
            </div>
			<div class="col-lg-9 col-md-8 col-sm-12">
              <p class="mb-0 text-dark">
			<?php echo $railway_stations;?> 

			  </p>
            </div>
        </div>
		
		
		<hr/>
		
		<div class="row mb-2">
			<div class="col-12">
				<h2 class="nf-f-size-20 nf-strong text-uppercase">Major Cities</h2>
			</div>
		</div>
		
		<div class="row mb-4 nf-major-cities">
			<div class="col-12">
				<ul>
					<?php if(!empty($major_cities)){
						$citites = explode(',',$major_cities);
						$k=0;
						foreach ($citites as $key => $value) {
							$k++;
							if($k==10) $k=1;
					?>
					<li><div class="box"><span class="bg<?php echo $k;?>"></span><?php echo $value;?></div></li>
				<?php 
				}
			}?>

					
				</ul>
			</div>
		</div>
		
		<hr/>
		   
		<div class="row">
			<div class="col-lg-6 nf-forest-area mb-4">
				<div>
				<div class="px-5 pt-5 pb-5">
					<h2 class="nf-f-size-20 text-white mb-0">Total Forest Area in <?php the_title()?></h2>
					<h2 class="nf-strong mb-0"><?php echo $total_forest_area;?></h2>
					<small class="text-white"></small>
				</div>
					<img class="img-fluid px-2" src="<?php echo get_template_directory_uri(). '/assets/'?>img/about/forest-bg.png" alt="image" />
					
				</div>
			</div>
			<div class="col-lg-6 nf-weather mb-4">
			<div class="nf-weather-col1 d-flex align-items-center mb-3">
				<img class="img-fluid mt-3 px-2" src="<?php echo get_template_directory_uri(). '/assets/'?>img/about/rainfall.png" alt="rainfall" />
				<div><h4 class="nf-strong nf-f-size-18">Annual Rainfall in <?php the_title()?></h4>
				<h2 class="nf-f-size-24 nf-strong"><?php echo $annual_rainfall;?></h2></div>
			</div>
			<div class="row">
				<div class="col-md-4 col-sm-12  px-1 mb-3">
					<div class="nf-weather-col2 h-100">
						<img class="img-fluid mt-1 mb-1" src="<?php echo get_template_directory_uri(). '/assets/'?>img/about/summer.png" alt="image" />
						<h2 class="nf-f-size-16 nf-strong text-white mb-0">Summer</h2>
						<p class="mb-0 text-white nf-f-size-12"><?php echo $summer_weather;?></p>
						<!--<p class="text-white nf-f-size-12 mb-1">April and June</p>
						<h4 class="text-white nf-f-size-12 nf-strong">32 - 38 C</h4>-->
					</div>
				</div>
				<div class="col-md-4 col-sm-12  px-1 mb-3">
					<div class="nf-weather-col2 h-100">
						<img class="img-fluid mt-1 mb-1" src="<?php echo get_template_directory_uri(). '/assets/'?>img/about/monsoon.png" alt="image" />
						<h2 class="nf-f-size-16 nf-strong text-white mb-0">Monsoon</h2>
						<p class="mb-0 text-white nf-f-size-12"><?php echo $monsoon_weather;?></p>
						<!--<p class="text-white nf-f-size-12 mb-1">July to September</p>
						<h4 class="text-white nf-f-size-12 nf-strong">26 - 32 C</h4>-->
					</div>
				</div>
				<div class="col-md-4 col-sm-12 px-1 mb-3">
					<div class="nf-weather-col2 h-100">
						<img class="img-fluid mt-1 mb-1" src="<?php echo get_template_directory_uri(). '/assets/'?>img/about/winter.png" alt="image" />
						<h2 class="nf-f-size-16 nf-strong text-white mb-0">Winter</h2>
						<p class="mb-0 text-white nf-f-size-12"><?php echo $winter_weather;?></p>
						<!--<p class="text-white nf-f-size-12 mb-1">October to March</p>
						<h4 class="text-white nf-f-size-12 nf-strong">8 - 20 C</h4>-->
					</div>
				</div>
			</div>
		</div>  
        </div>
		
		<div class="row nf-state-scenario rounded p-3 mb-4 mx-0">
			<div class="col-lg-6 d-flex align-items-center mb-2 mb-lg-0">
				<img class="img-fluid px-3" src="<?php echo get_template_directory_uri(). '/assets/'?>img/about/horticulture-scenario.png" alt="image" />
				<h2 class="nf-f-size-20 nf-strong mb-0">State Horticulture Scenario</h2>
			</div>
			<div class="col-lg-3  mb-2 mb-lg-0">
				<p class="mb-0 text-dark">Area Under Irrigation</span>
				<h2 class="nf-f-size-20 nf-strong"><?php echo $area_under_irrigation;?> <small></small></h2>
			</div>
			<div class="col-lg-3  mb-2 mb-lg-0">
				<p class="mb-0 text-dark">Area Under Horticulture</span>
				<h2 class="nf-f-size-20 nf-strong"><?php echo $area_under_horticulture;?> <small></small></h2>
			</div>
		</div>	
    </div>
  
   
   <div class="nf-hort-ul py-5 mb-4">
	   <div class="container">
		   <div class="row mb-5 mb-lg-3">
		   <div class="col-lg-3 col-md-12"><h4 class="text-white nf-strong-600 nf-f-size-18 border-right ">Major Horticulture Crop</h4></div>
				<div class="col-lg-9 col-md-12">
				<ul>

					<?php if(!empty($major_horticulture_crop)){
						$crops = explode(',',$major_horticulture_crop);
						$k=0;
						foreach ($crops as $key => $value) {
					?>
					<li><?php echo $value;?></li>
					<?php 
						}
					}?>

					
					
				</ul>
				</div>
		   </div>
		   <div class="row mb-5 mb-lg-3">
		   <div class="col-lg-3 col-md-12"><h4 class="text-white nf-strong-600 nf-f-size-18 border-right">Major Spices Crop</h4></div>
				<div class="col-lg-9 col-md-12">
				<ul>

					<?php if(!empty($major_spices_crop)){
						$crops = explode(',',$major_spices_crop);
						$k=0;
						foreach ($crops as $key => $value) {
					?>
					<li><?php echo $value;?></li>
					<?php 
						}
					}?>
					
				</ul>
			</div>
		   </div>
		   <div class="row mb-5 mb-lg-0">
		   <div class="col-lg-3 col-md-12"><h4 class="text-white nf-strong-600 nf-f-size-18 border-right">G.I. Varieties Spices</h4></div>
				<div class="col-lg-9 col-md-12">
				<ul>
					<?php if(!empty($gi_varieties_spices)){
						$crops = explode(',',$gi_varieties_spices);
						$k=0;
						foreach ($crops as $key => $value) {
					?>
					<li><?php echo $value;?></li>
					<?php 
						}
					}?>
				</ul>
				</div>
		   </div>
	   </div>
   </div>
   
   
   <div class="container">
		<div class="row mb-2">
			<div class="col-12">
				<h2 class="nf-f-size-20 nf-strong text-uppercase">Education Institute</h2>
			</div>
		</div>
		<div class="row mb-2">
			<div class="col-lg-3">
				<img class="img-fluid p-4" src="<?php echo get_template_directory_uri(). '/assets/'?>img/about/edu-institute-left.png" alt="image" />
			</div>
			<div class="col-lg-9 nf-edu-institute">
				<div class="row">

					<?php
                            $rows = get_post_meta( $post->ID, '_event_institute_value_key', true ); 
                            $rows1 = get_post_meta( $post->ID, '_event_instituteno_value_key', true );
                            $rows2 = get_post_meta( $post->ID, '_event_institutedesc_value_key', true ); 
                                
                                if(!empty($rows))
                                {
                                    $rows = explode('*****',$rows);
                                    $rows1 = explode('*****',$rows1);
                                    $rows2 = explode('*****',$rows2);
                                
                                    //echo 'Event Rows: ';echo '<br>';
                                    $classArray = array('nf-bg-yellow','nf-bg-green','nf-bg-purple','nf-bg-blue','nf-bg-pink');
                                    $k=0;
                                    for($i=0;$i<count($rows);$i++) 
                                    {
                                    	if($k==5) $k=0;
                                         if($rows1[$i]!=0)
                                        {
                                        echo '<div class="col-lg-4 col-md-6"><div><span class="'.$classArray[$k].'">'.$rows1[$i].'</span><a data-toggle="popover" data-placement="bottom" data-trigger="hover" data-html="true" data-content="'.nl2br($rows2[$i]).'" data-original-title="" title="">'.$rows[$i].'</a></div></div>';
                                        $k++;
                                        }
                                    } 
                                }

                            ?>



					
				</div>
			</div>
		</div>
   </div>
<?php }?>
   

   <?php get_footer(); ?>
