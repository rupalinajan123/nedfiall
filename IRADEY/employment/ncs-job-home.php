<?php /*Template Name: NCS Job Home */ ?>

<!-- header part start -->
<!doctype html>
<html class="no-js" lang="zxx">
<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>One Stop Solution for Career and Livelihod</title>
  <meta name="description" content="One Stop Solution for Career and Livelihod">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" type="image/x-icon" href="<?php echo get_template_directory_uri();?>/assets/img/favicon.png">
  <!-- CSS here -->
  <?php wp_head() ?>
  <script>
    var $ = jQuery;
  </script>
</head>

<body <?php body_class('homepage is-preload launchpage-height') ?>>
  <!-- Add your site or application content here -->

  <!-- header-start -->

  <header id="home">
    <div class="header-area">
      <!-- header-top -->
      <div class="header-top">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-lg-9 col-md-6">
              <div class="topbar-logo">
                <a href="https://mdoner.gov.in/" target="_blank"><img src="<?php echo get_template_directory_uri();?>/assets/img/home/mdner-logo.jpg" alt="NER Logo">
                  <a href="http://necouncil.gov.in/" target="_blank"><img src="<?php echo get_template_directory_uri();?>/assets/img/home/nec-toplogo.png" alt="NEC Logo">
                    <a href="https://wcd.nic.in/schemes/beti-bachao-beti-padhao-scheme" target="_blank"><img src="<?php echo get_template_directory_uri();?>/assets/img/home/Beti_Bachao_Beti_Padhao_logo.jpg" alt="emblem of india">
                    </div>
                  </div>
                  <div class="col-lg-3 col-md-6 top-right">
                    <div class="nf-social-links-top">
                      <?php dynamic_sidebar( 'social_media' ); ?>
                      <?php global $current_user; wp_get_current_user(); ?>
                    </div>
                    <div class="header-contact">
                      <div class="phone-number dropdown-toggle" id="dropdownMenuLink" data-toggle="dropdown"><span class="user"><img src="<?php echo get_template_directory_uri();?>/assets/img/icon/user.png"></span></div>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <?php
                        if ( is_user_logged_in() ) {  //echo $current_user->user_login; ?>

                          <a class="dropdown-item" href="<?php echo site_url()?>/edit-profile">Profile</a>

                        <?php }else{?>



                          <a class="dropdown-item" id="loginpopid" href="#" data-toggle="modal" data-target="#loginModal" data-backdrop="static" data-keyboard="false">Login</a>

                        <?php }?>

                        <?php if(is_user_logged_in()) {  ?>

                          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal" data-backdrop="static" data-keyboard="false">Logout </a>

                        <?php }?>

                      </div> 

                    </div>
                  </div>

                </div>

              </div>

            </div>

            <!-- /end header-top -->

            <!-- header-bottom -->

            <div class="header-bottom-area header-sticky" style="transition: .6s;">

              <div class="container">

                <div class="row">

                  <div class="col-md-6 menu-left">

                    <div class="logo">

                      <a href="<?php echo site_url()?>/ncs-landing-page/"><!--ACT NORTH EAST LOGO-->

                        <?php the_custom_logo() ?></a>

                      </div>

              <!--<div class="lang">

                <select id="lang" class="lang-dropdown">

                  <option>English</option>

                  <option>Hindi</option>

                </select>

              </div>-->

            </div>

            <div class="col-md-6 menu-right">

              <div class="header-bottom-icon f-right">

                <div class="toggle-search-box">

                  <?php //echo get_search_form();?>

                  <form action="<?php echo site_url()?>" method="get" id="searchbox">

                    <input placeholder="Search here" name="s" type="text" value="<?php echo $_GET['s']?>">

                    <button class="button-search"><span class="ti-search"></span></button>

                  </form>



                </div>

              </div>

            </div>

          </div>

          <div id="menuzord" class="menuzord">

            <ul class="menuzord-menu">

              <!--<li><a href="<?php echo site_url()?>/">Home</a></li>-->

              <li><a href="<?php echo site_url()?>/ncs-landing-page/">About</a>

                <!--<ul class="dropdown">

                  <li><a href="#">Mission</a></li>

                  <li><a href="#">Vission</a></li>

                </ul>-->

              </li>

              <li><a href="<?php echo site_url()?>/ncs-job-home/">Jobs at NCS</a></li>

              <li><a href="<?php echo site_url(); ?>/jobportal_dev/Employer/login">Post a Job</a></li>

              <li><a href="<?php echo site_url(); ?>/jobportal_dev/Jobseeker/login">Apply for job</a></li>
              <li><a href="javascript:void(0)">Explore CV database</a></li>
              <li><a href="javascript:void(0)">Resources</a></li>

            </ul>

          </div>




          <!-- Global site tag (gtag.js) - Google Analytics -->

          <script async src="https://www.googletagmanager.com/gtag/js?id=G-4H5HK4J3TV"></script>

          <script>

            window.dataLayer = window.dataLayer || [];

            function gtag(){dataLayer.push(arguments);}

            gtag('js', new Date());



            gtag('config', 'G-4H5HK4J3TV');

          </script>





        </header>

        <!-- header-end -->

        <!-- Button trigger modal -->

        <!-- Modal -->

        <!--------logout popup----------->

        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel" aria-hidden="true">

          <div class="modal-dialog modal-lg" role="document" >

            <div class="modal-content">

              <div class="modal-header">

                <h5 class="modal-title" id="logoutModalLabel">

                  Logout

                </h5>

        <!--<button type="button" class="close" data-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">&times;</span>

        </button>-->

      </div>

      <div class="modal-body">

       <section class="nf-faq-section">

        <div class="row">

          <div class="col-xl-10 offset-xl-1">

            <div class="nf-faq-a-block">

              <div id="accordion">  

                Are you sure you want to logout?

                <div class="nf-btnreg">   

                  <input type="button" name="wp-submit" id="wppb-submit" class="btn-skyblue" value="Ok" onclick="window.location='<?php echo wp_logout_url(site_url())?>'">

                  <input type="button" name="wp-submit" id="wppb-submit" class="btn-navyblue ml-2" value="Cancel" data-dismiss="modal">

                </div>

              </div>

            </div>

          </div>

        </div>

      </section>

    </div>

      <!--<div class="modal-footer">

        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

        <button type="button" class="btn btn-primary">Save changes</button>

      </div>-->

    </div>

  </div>

</div>

<!--------login popup----------->

<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">

  <div class="modal-dialog modal-lg" role="document" >

    <div class="modal-content">

      <div class="modal-header">

        <h5 class="modal-title" id="loginModalLabel">

          Login

        </h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="loginCancelButton">

          <span aria-hidden="true">&times;</span>

        </button>

      </div>

      <div class="modal-body">

       <section class="nf-faq-section">

        <div class="row">

          <div class="col-xl-10 offset-xl-1">

            <div class="nf-faq-a-block">

              <div id="accordion">

                <?php

                echo do_shortcode(

                  '[wppb-login]'

                );

                ?>



                <div class="nf-btnreg">   

                  <input type="button" name="wp-submit" id="wppb-submit" class="btn-skyblue" value="Register" onclick="window.location='<?php echo site_url()?>/register'">

                  <input type="button" name="wp-submit" id="wppb-submit" class="btn-navyblue ml-2" value="Lost Password" onclick="window.location='<?php echo site_url()?>/lost-password'">

                </div>

              </div>

            </div>

          </div>

        </div>

      </section>

    </div>

    <!--<div class="modal-footer">    </div>-->

  </div>

</div>

</div>

<?php if(!empty($_GET['loginerror']) && add_query_arg( array(), $wp->request )!='log-in'){?>

  <script type="text/javascript">

    jQuery(function(){

      document.getElementById("loginpopid").click();

    });

  </script>

<?php }?>







<?php

//auto open login popup start

$time_variable_set = get_option( 'my_login_popup_field' );

if(!isset($_SESSION['login_popup_time']) && $time_variable_set!='' && !is_user_logged_in())

  $_SESSION['login_popup_time']=strtotime('+'.$time_variable_set.' seconds');



if(is_user_logged_in()) unset($_SESSION['login_popup_time']);



if($time_variable_set!='' && add_query_arg( array(), $wp->request )!='log-in' && add_query_arg( array(), $wp->request )!='register' && add_query_arg( array(), $wp->request )!='lost-password' && !is_user_logged_in())

{

  if($_SESSION['login_popup_time'] < time())

  {

    ?>

    <script type="text/javascript">

      jQuery(function(){

        document.getElementById("loginCancelButton").remove();

        document.getElementById("loginpopid").click();

      });

    </script>

    <?php

  }

  ?>



  <script type="text/javascript">

    function show_login_popup()

    {

      if(!$('#loginModal').hasClass('show'))

      {

        $.ajax({

          data: {'action': 'my_action_show_login_popup'},

          url: "<?php echo site_url()?>/wp-admin/admin-ajax.php",

          type: "post",

          success: function(data) {

           if(data=='open')

           {

            if(!$('#loginModal').hasClass('show'))

            {

              document.getElementById("loginCancelButton").remove();

              document.getElementById("loginpopid").click();

            }

          }

        }

      });

      }

    }

    setInterval(function() { show_login_popup(); }, 3000);

  </script>



  <?php

}

//auto open login popup end  

?>
<!-- header part end -->

<?php $page_data = get_page_by_path( 'ncs-job-details' );


global $wpdb;

$escaped_string = $_SERVER['QUERY_STRING'];
$pageId = $value = substr($escaped_string, 1);


$stateData = $wpdb->get_results("SELECT * FROM `wp_states_master` ORDER BY 'name' " );


if(!empty($wp_query->query_vars['flag'])){ $pageId= $wp_query->query_vars['flag']; }


// Define pagination variables

$page = ($pageId==0) ? 1 : absint($pageId);
$per_page = 10; // Number of records per page
$offset = ($page - 1) * $per_page;


$jobKeyword = $_POST['search_job'];
$locKeyword = $_POST['search_loc'];
$jobType = $_POST['jobType'];
$stateName = $_POST['statename'];



$query = "SELECT * FROM `wp_ncs_api_response` WHERE ";
if ($jobKeyword || $locKeyword) {
  $query.=" (`JobTitle` LIKE '%$jobKeyword%' AND `StateName` LIKE '%$locKeyword%') AND";
}


if ($jobType) {
  $query.=" `SectorName` = '$jobType' AND ";
} 

if ($stateName) {
  $query.=" `StateName` LIKE '%$stateName%' AND ";
}

if ($industryName) {
  $query.=" `IndustryName` = '$industryName' AND ";
}

if ($JobNatureName) {
  $query.=" `JobNatureName` = '$JobNatureName' AND ";
}
$queryall.= $query." `manual_flag`=0 AND `is_deleted`=0 ORDER BY `last_updated` DESC ";
// Custom SQL query to fetch data from your custom table

$getApiDataCountAll = $wpdb->get_results($queryall);

$query.= " `manual_flag`=0 AND `is_deleted`=0 ORDER BY `last_updated` DESC LIMIT $per_page OFFSET $offset";
// Custom SQL query to fetch data from your custom table


$getApiData = $wpdb->get_results($query);


?>


<!-- header-end -->
<div class="inner-banner">
  <div class="container">
    <div class="banner-title">
      <h3>Vacancies at NCS</h3>
      <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Employment</a></li>
        <li class="breadcrumb-item active">Vacancies at NCS</li>
      </ul>
    </div>
    <div class="banner-content">
      <div class="row">
       <div class="col-lg-7">
        <div class="banner-slider">
          <div>
            <img class="image_img" src="<?php echo get_template_directory_uri() ?>/assets/img/emp-job/ban-img1.png" alt="Banner image" title="Banner image">
          </div>
          <div>
            <img class="image_img" src="<?php echo get_template_directory_uri() ?>/assets/img/emp-job/ban-img2.png" alt="compant logo" title="compant logo">
          </div>
          <div>
            <img class="image_img" src="<?php echo get_template_directory_uri() ?>/assets/img/emp-job/ban-img3.jpg" alt="compant logo" title="compant logo">
          </div>


        </div>
      </div>
      <div class="col-lg-5">
        <h4>About <span>NCS Portal</span></h4>
        <p>Ready to dive into the job market? Say hello to the National Career Service (NCS), your go-to platform for job hunting across India.<br>
        Picture this: you're a driven youth in the Northeast, itching to start your career journey. With NCS partnering up with Advancing NE, you've got a backstage pass to a wealth of job opportunities. From tech hubs to creative corners, there's a world of options waiting for you. But here's the kicker: with this collaboration, we're not just opening doors—we're tearing down barriers. By bringing NCS listings directly to you, we're making job hunting easier and more accessible than ever before !!</p>
      </div>

    </div>

  </div>
</div>
</div>

<!-- inner body starts -->
<div class="inner-body">
  <div class="container">
    <h5 class="page-title">Vacancies at National Career Service(NCS) Portal</h5>
    <form id="form_id" method="post" action="<?php echo site_url()?>/ncs-job-home/">
      <div class="empsearch-wrapper empform">
        <div class="emp-search empbox">
          <img src="<?php echo get_template_directory_uri() ?>/assets/img/emp-job/search.svg" alt="f-img">
          <input type="text" name="search_job" class="form-control" placeholder="What position are you looking for ?" value="<?php echo $_POST['search_job'];?>">
        </div>
        <div class="emp-location empbox">
          <img src="<?php echo get_template_directory_uri() ?>/assets/img/emp-job/mappin.svg" alt="f-img">
          <input type="text" name="search_loc" class="form-control" placeholder="Location" value="<?php echo $_POST['search_loc'];?>">
        </div>
        <div class="emp-btn empbox">
          <button type="submit" class="nf-button-v-small">Search Job</button>
        </div>
      </div>

      <div class="empjob-wrapper">
        <div class="row">

          <!-- side filter start  -->
          <div class="col-lg-3">
            <div class="sidebar-wrapper">
              <h4>All Filter</h4>
              <div class="box">
                <h5>Type</h5>
                <ul>
                  <li>
                    <div class="custom-control custom-checkbox">
                      <?php if($_POST['jobType']== 'Government') $checked = 'checked'; ?>
                      <input type="checkbox" class="custom-control-input jobCheck" id="type1" name="jobType" value="Government" <?php if($_POST['jobType']== 'Government') { echo 'checked'; } else {echo '';} ?>>
                      <label class="custom-control-label" for="type1">Government </label>
                    </div>
                  </li>
                  <li>
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input jobCheck" id="type2" name="jobType" value="Private" <?php if($_POST['jobType']== 'Private') { echo 'checked'; } else {echo '';} ?>>
                      <label class="custom-control-label" for="type2">Private </label>
                    </div>
                  </li>
                  <li>
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input jobCheck" id="type3" name="jobType" value="Proprietorship" <?php if($_POST['jobType']== 'Proprietorship') { echo 'checked'; } else {echo '';} ?>>
                      <label class="custom-control-label" for="type3">Proprietorship </label>
                    </div>
                  </li>
                  <li>
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input jobCheck" id="type4" name="jobType" name="jobType" value="Others" <?php if($_POST['jobType']== 'Others') { echo 'checked'; } else {echo '';} ?>>
                      <label class="custom-control-label" for="type4">Others </label>
                    </div>
                  </li>
                </ul>
              </div>

              <div class="box">
                <h5>Location</h5>

                <ul>
                  <?php 
                  $k=0;
                  foreach($stateData as $val)
                  {

                    if($_POST['statename']==$val->name) $checked = 'checked'; 
                    else if(is_array($_POST['statename']) && in_array($val->name,$_POST['statename'])) $checked = 'checked'; 
                    else  $checked = ''; 
                    echo '
                    <li>
                    <div class="custom-control custom-checkbox">
                    <input class="custom-control-input check_statename" value="'.$val->name.'" type="checkbox" '.$checked.' id="statename_'.$k.'" name="statename">
                    <label class="custom-control-label" for="statename_'.$k.'">'.$val->name.'</label>
                    </div>
                    </li>
                    ';
                    $k++;
                  }
                  ?>
                </ul>
              </div>
            </form>
            <div class="box">
              <h5>Sector</h5>
              <ul>
                <li>
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input industryCheck" id="sector1" name="IndustryName" value="Manufacturing" <?php if($_POST['IndustryName']== 'Manufacturing') { echo 'checked'; } else {echo '';} ?>>
                    <label class="custom-control-label" for="sector1">Manufacturing </label>
                  </div>
                </li>
                <li>
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input industryCheck" id="sector2" name="IndustryName" value="Agriculture and Related" <?php if($_POST['IndustryName']== 'Agriculture and Related') { echo 'checked'; } else {echo '';} ?>>
                    <label class="custom-control-label" for="sector2">Agriculture and Related </label>
                  </div>
                </li>
                <li>
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input industryCheck" id="sector3" name="IndustryName" value="Education" <?php if($_POST['IndustryName']== 'Education') { echo 'checked'; } else {echo '';} ?>>
                    <label class="custom-control-label" for="sector3">Education </label>
                  </div>
                </li>
                <li>
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input industryCheck" id="sector4" name="IndustryName" value="Public Administration and Defense" <?php if($_POST['IndustryName']== 'Public Administration and Defense') { echo 'checked'; } else {echo '';} ?>>
                    <label class="custom-control-label" for="sector4">Public Administration and Defense</label>
                  </div>
                </li>
                <li>
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input industryCheck" id="sector5" name="IndustryName" value="Operations and Support" <?php if($_POST['IndustryName']== 'Operations and Support') { echo 'checked'; } else {echo '';} ?>>
                    <label class="custom-control-label" for="sector5">Operations and Support </label>
                  </div>
                </li>
                <li>
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input industryCheck" id="sector6" name="IndustryName" value="Power and Energy " <?php if($_POST['IndustryName']== 'Power and Energy ') { echo 'checked'; } else {echo '';} ?>>
                    <label class="custom-control-label" for="sector6">Power and Energy </label>
                  </div>
                </li>
              </ul>
            </div>
            <!-- <div class="box">
              <h5>Work experience</h5>
              <ul>
                <li>
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input workCheck" id="exp1" id="sector6" name="IndustryName" value="Power and Energy " <?php if($_POST['IndustryName']== 'Power and Energy ') { echo 'checked'; } else {echo '';} ?>>
                    <label class="custom-control-label" for="exp1">Any experience </label>
                  </div>
                </li>
                <li>
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="exp2" id="sector6" name="IndustryName" value="Power and Energy " <?php if($_POST['IndustryName']== 'Power and Energy ') { echo 'checked'; } else {echo '';} ?>>
                    <label class="custom-control-label" for="exp2">Internship </label>
                  </div>
                </li>
                <li>
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="exp3" id="sector6" name="IndustryName" value="Power and Energy " <?php if($_POST['IndustryName']== 'Power and Energy ') { echo 'checked'; } else {echo '';} ?>>
                    <label class="custom-control-label" for="exp3">Work remotely </label>
                  </div>
                </li>
              </ul>
            </div>
 -->            <div class="box">
              <h5>Nature of Job</h5>
              <ul>
                <li>
                  <div class="custom-control custom-checkbox jobNatureCheck">
                    <input type="checkbox" class="custom-control-input" id="job1" id="sector6" name="IndustryName" value="Full Time" <?php if($_POST['IndustryName']== 'Full Time') { echo 'checked'; } else {echo '';} ?>>
                    <label class="custom-control-label" for="job1">Full Time </label>
                  </div>
                </li>
                <li>
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input jobNatureCheck" id="job2" id="sector6" name="IndustryName" value="Temporary" <?php if($_POST['IndustryName']== 'Temporary') { echo 'checked'; } else {echo '';} ?>>
                    <label class="custom-control-label" for="job2">Temporary </label>
                  </div>
                </li>
                <li>
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input jobNatureCheck" id="job3" id="sector6" name="IndustryName" value="Part Time" <?php if($_POST['IndustryName']== 'Part Time') { echo 'checked'; } else {echo '';} ?>>
                    <label class="custom-control-label" for="job3">Part Time </label>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>

        <!-- side filter end -->
        <!-- main job listing starts -->
        <?php if ($getApiData) { ?>

          <div class="col-lg-9">
            <div class="empmiddle-wrapper">
              <h3><?php echo count($getApiDataCountAll); ?> Jobs</h3>

              <?php foreach ($getApiData as $row) { ?>

                <div class="card card-body">
                  <div class="emp-head">
                    <div class>
                      <p><?php echo $row->OrganizationName; ?></p>
                      <h3><?php echo $row->JobTitle; ?></h3>
                    </div>
                    <div class="d-flex align-items-center">

                      <a href="<?php echo $row->VacancyURL; ?>" class="nf-button-v-small ml-2">Apply Job</a>

                    </div>
                  </div>
                  <ul class="job-details">
                    <li>
                      <i class="fa fa-map-marker"></i>
                      <span><strong>Location :</strong> <?php echo $row->StateName; ?></span>
                    </li>
                    <li>
                      <i class="fa fa-briefcase"></i>
                      <span><strong>Nature of Job :</strong> <?php echo $row->JobNatureName; ?></span>
                    </li>
                    <li>
                      <i class="fa fa-credit-card"></i>
                      <span><strong>Salary :</strong> <?php echo $row->MaximunWages; ?></span>
                    </li>
                    <li>
                      <i class="fa fa-calendar-o"></i>

                      <?php
                      $date=date_create($row->PostedDate);
                      $Posted_date=date_format($date,"d/m/Y");
                      ?>
                      <span><strong>Posted On :</strong> <?php echo $Posted_date ?></span>
                    </li>
                    <li>
                      <i class="fa fa-industry"></i>
                      <span><strong>Sector :</strong> <?php echo $row->MinimumWages; ?></span>
                    </li>
                    <li>
                      <i class="fa fa-clock-o"></i>
                      <span><strong>Work Experience :</strong> NA</span>
                    </li>
                    <li>
                      <i class="fa fa-graduation-cap"></i>
                      <span><strong>Min Qualification :</strong> <?php echo $row->Qualification; ?></span>
                    </li>
                  </ul>

                  <?php 


                  ?>

                  <a href="<?php echo site_url()?>/ncs-job-details/<?php echo $row->id; ?>" class="empRead-more">Read More <img src="<?php echo get_template_directory_uri() ?>/assets/img/emp-job/arrow-right.svg"></a>
                </div>

              <? } 




          // Pagination
              $cond='';
              if ($jobKeyword || $locKeyword) {
                $cond.=" (`JobTitle` LIKE '%$jobKeyword%' AND `StateName` LIKE '%$locKeyword%') AND";
              }

              if ($jobType) {
                $cond.=" `SectorName` = '$jobType' AND ";
              } 

              if ($stateName) {
                $cond.=" `StateName` LIKE '%$stateName%' AND ";
              }
              $total_items = $wpdb->get_var("SELECT COUNT(*) FROM `wp_ncs_api_response` WHERE $cond `manual_flag`=0  AND `is_deleted`=0 ORDER BY `last_updated` DESC;");
              $total_pages = ceil($total_items / $per_page);

              ?>


              <nav aria-label="...">
                <ul class="pagination justify-content-center">

                  <?php 
                  $redirectUrl = site_url()."/ncs-job-home/";

                  echo paginate_links(array(
                    'base' => str_replace('?=','',add_query_arg('', '%#%', $redirectUrl)),
                //'base' => $redirectUrl.$page,
                    'format' => '',
                    'prev_text' => __('&laquo; Previous'),
                    'next_text' => __('Next &raquo;'),
                    'total' => $total_pages,
                    'current' => $page,
                  ));


                  ?>

                </ul>
              </nav>
            <?php } else{ echo "No Record Found"; } ?>
          </div>
        </div>

        <!-- main job listing end -->
      </div>
    </div>
  </div>
</div>
<!-- inner body ends -->

<?php //get_footer(); ?>

<!-- footer start -->
<footer id="Contact">
  <div class="footer-area primary-bg pt-70">
    <div class="container">
      <div class="footer-mid mb-0">
        <div class="row">
          <div class="col-lg-2 col-md-6">
            <div class="logo">
              <img src="<?php echo get_template_directory_uri() ?>/assets/img/emp-job/advancing-logo.png" class="img-fluid">
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <h5>Contact us</h5>
            <div class="footer-menu">
              <p class="mb-0">
                <a href="#" class="__cf_email__" data-cfemail="b4dddad2dbf4d5d0c2d5dad7dddad3dadbc6c0dcd1d5c7c09addda">info@advancingnortheast.in</a>
              </p>
              <p><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="85e2f0ece1e0e8e0c5e4e1f3e4ebe6ecebe2ebeaf7f1ede0e4f6f1abeceb">guideme@advancingnortheast.in</a></p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <h5>Quick Links</h5>
            <div class="row">
              <div class="col-lg-6 col-md-5">
                <div class="footer-widget">
                  <div class="footer-menu clearfix">
                    <ul>
                      <li><a href="#">Advancing NE Portal</a></li>
                      <li><a href="#">NCS Portal</a></li>
                      <li><a href="#">MDoNER</a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-12 col-lg-6 col-md-7">
                <div class="footer-widget">
                  <div class="footer-menu clearfix">
                    <ul>
                      <li><a href="#">NEC</a></li>
                      <li><a href="#">NEDFI </a></li>
                      <li><a href="#">Feedback </a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-2 col-md-6">
            <div class="row">
              <div class="col-12 col-lg-12">
                <div class="footer-widget mb-30">
                  <div class="footer-menu clearfix">
                    <a href="https://www.advancingnortheast.in/get-your-cv-reviewed/" target="_blank"><button class="btn nf-cv-btn mb-3">Get Your CV Reviewed</button></a>
                    <div class="nf-social-icons">
                      <ul>
                        <li>
                          <a href="#">
                            <img src="<?php echo get_template_directory_uri() ?>/assets/img/home/s-icon-1.png" alt="facebook">
                          </a>
                        </li>
                        <li>
                          <a href="#">
                            <img src="<?php echo get_template_directory_uri() ?>/assets/img/home/s-icon-2.png" alt="twitter">
                          </a>
                        </li>
                        <li>
                          <a href="#">
                            <img src="<?php echo get_template_directory_uri() ?>/assets/img/home/s-icon-3.png" alt="instagram">
                          </a>
                        </li>
                        <li>
                          <a href="#">
                            <img src="<?php echo get_template_directory_uri() ?>/assets/img/home/s-icon-4.png" alt="youtube">
                          </a>
                        </li>

                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <p class="nf-all-right mb-0">All copyrights @ jobs.advancingne.in | 2024</p>
      </div>
    </div>
  </div>
</footer>

<!-- footer end -->




<!-- JS here -->
   <!--  <script src="js/vendor/modernizr-3.5.0.min.js"></script>
    <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/isotope.pkgd.min.js"></script>
    <script src="js/one-page-nav-min.js"></script>
    <script src="js/slick.min.js"></script>
    <script src="js/ajax-form.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/jquery.meanmenu.min.js"></script>
    <script src="js/menuzord.js"></script>
    <script src="js/jquery.barfiller.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/imagesloaded.pkgd.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/jquery.mCustomScrollbar.js"></script>
    <script src="js/main.js"></script> 
    <script src="js/video_link.js"></script>-->
    <script>$=jQuery.noConflict(true);</script>
    <?php wp_footer() ?>
    <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>

    <!--<script type="text/javascript">
        jQuery(document).ready(function(){
          jQuery("#menuzord").menuzord({
            align: "center",
            effect: "fade",
            animation: "none"
          });
        });
      </script>-->

      

      <div id="chat_tracking" style="display:block"></div>
      <script language="JavaScript" type="text/javascript"> var chat_config;  var script = document.createElement("script"); script.type="text/javascript";var src = "https://chatbot.esdsconnect.com/tracker_v1.php?accId=6&projId=8&nse="+Math.random(); setTimeout("script.src=src;document.getElementById('chat_tracking').appendChild(script)",5000); </script>

    </body>

    <style type="text/css">
      .chatbox-open {
        display: none !important;
      }
/*manage  subscription page setting sendpress*/
.sendpress-content{
  padding-bottom: 20px;
}
</style>
<script type="text/javascript">
  /*manage  subscription page setting sendpress*/
  jQuery(document).ready(function(){
    jQuery(".sendpress").addClass('container');
  }); 

//removed form resubmission message
  if ( window.history.replaceState ) {
    window.history.replaceState( null, null, window.location.href );
  }       
</script>


</html>

<script>
  $( ".page-numbers" ).click(function() {
    $('#form_id').attr('action',this.href); 
    $( "#form_id" ).submit();
  //alert(this.href);
    return false;
  });


  $(document).ready(function(){
    $('.jobCheck').click(function() {
      $('.jobCheck').not(this).prop('checked', false);
      document.getElementById("form_id").submit();
    });
  });

  $(document).ready(function(){
    $('.check_statename').click(function() {
      $('.check_statename').not(this).prop('checked', false);
      document.getElementById("form_id").submit();
    });
  });

   $(document).ready(function(){
    $('.industryCheck').click(function() {
      $('.industryCheck').not(this).prop('checked', false);
      document.getElementById("form_id").submit();
    });
  });

   $(document).ready(function(){
    $('.jobNatureCheck').click(function() {
      $('.jobNatureCheck').not(this).prop('checked', false);
      document.getElementById("form_id").submit();
    });
  });


</script>

<!--slick banner slider script-->
<script>
  $('.banner-slider').slick({
    dots: true,
    infinite: true,
    speed: 300,
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: true,

  });
</script>
  <!--slick banner slider script-->