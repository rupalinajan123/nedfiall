<?php /*Template Name: Home Beti Bachao */ ?>
<?php get_header(); ?>

  <div class="inner-banner">
    <div class="container">
      <div class="banner-title">
          <h3>Advancing Girls Advancing North East</h3>
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Advancing Girls Advancing North East</li>
          </ul>
        </div>
     <!-- <div class="banner-content">
        <div class="row">
          <div class="col-md-4 banner-img pr-0"><img src="<?php //echo get_template_directory_uri(). '/assets/'?>img/home/beti-bachao-banner.png" alt="Beti Bachao, Beti Padhao"></div>
          <div class="col-md-8  pl-0">
            <div class="bannerbg nf-gradient-12 justify-content-start pt-3 nf-height-100">
              <h4 class="nf-f-size-24">Beti Bachao, Beti Padhao</h4>
              <h5>Beti Bachao, Beti Padhao, is an initiative taken by the government fo INDIA...</h5>
            </div>
          </div>
        </div>
      </div>-->
    </div>
  </div>

  <div class="inner-body pt-0">
    <div class="container">
      <div class="nf-betibachao-features">
        <ul>
          <li class="item">
            <a href="<?php echo site_url()?>/scholarship-for-girls/" class="box">
              <div class="img">
                <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/home/scholarship.png" class="img-fluid" alt="scholarship">
              </div>
              <div class="data">
                <h2>Scholarship</h2>
                <h4>for Girls</h4>
              </div>
            </a>
          </li>
          <li class="item">
            <a href="<?php echo site_url()?>/fellowship-for-girls/" class="box">
              <div class="img">
                <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/home/fellowship-girl.png" class="img-fluid" alt="Fellowship">
              </div>
              <div class="data">
                <h2>Fellowship</h2>
                <h4>for Girls</h4>
              </div>
            </a>
          </li>
          <li class="item">
            <a href="<?php echo site_url()?>/inspiring-women-of-north-east/" class="box">
              <div class="img">
                <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/home/inspiring-1.jpg" class="img-fluid" alt="Inspiring">
              </div>
              <div class="data">
                <h2>Inspiring </h2>
                <h4>Women of North East</h4>
              </div>
            </a>
          </li>
          <li class="item">
            <a href="<?php echo site_url()?>/institutes-for-women/" class="box">
              <div class="img">
                <img src="<?php echo get_template_directory_uri(). '/assets/'?>img/home/institute.png" class="img-fluid" alt="Institutes">
              </div>
              <div class="data">
                <h2>Institutes</h2>
                <h4>For Women</h4>
              </div>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>
   <!-- footer start -->   
<?php get_footer(); ?>