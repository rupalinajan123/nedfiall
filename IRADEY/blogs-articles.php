<?php /*Template Name: Blogs-Articles */ ?>
<?php get_header(); 

$page_data = get_page_by_path( 'blogs-articles' );
?>

     <!-- inner-banner-start -->
    <div class="inner-banner">
      <div class="container">
        <div class="banner-title">
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Blogs & Articles</li>
          </ul>
        </div>
      </div>
    </div>
    <!-- inner-banner-end -->

    <div class="inner-body pt-0">
      <div class="container">
       
        <div class="row">
          <div class="col-12">
            <div class="nf-banner-tab" style="background-image:url('<?php  echo get_template_directory_uri(). '/assets/'?>img/home/alvaro-reyes.png');">
              <h2>BLOGS & ARTICLES</h2>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-12 col-lg-12">
              <div class="table-responsive nf-table-responsive">
            <table class="nf-right-table-wrap nf-event-table">
              <thead>
                <th colspan="4">BLOGS & ARTICLES</th>
              </thead>
              <tbody>
                <tr>
                  <td width="40%">
                    Nagaland to become  Hub of exotic musroom Production.
                  </td>
                  <td>
                    Published Date : 1 June,2021
                  </td>
                  <td>
                    Laste Date : 7 June, 2021
                  </td>
                  <td>
                    <a href="<?php echo site_url()?>/blogs-articles-details">Click here</a>
                  </td>
                </tr>  
              </tbody>
            </table>
          </div>
          </div>
        </div>

        <div class="row">
        
          <div class="col-12 col-lg-12">
              <div class="table-responsive nf-table-responsive">
            <table class="nf-right-table-wrap">
              <thead>
                <th colspan="4">BLOGS & ARTICLES</th>
              </thead>
              <tbody>
                <tr>
                  <td width="40%">
                    10 things you need to know about german biotech industry
                  </td>
                  <td>
                    Published Date : 1 June,2021
                  </td>
                  <td>
                    Laste Date : 7 June, 2021
                  </td>
                  <td>
                    <a href="<?php echo site_url()?>/blogs-articles-details">Click here</a>
                  </td>
                </tr>  
              </tbody>
            </table>
          </div>
          </div>
        </div>

        <div class="row">
       
          <div class="col-12 col-lg-12">
            <div class="table-responsive nf-table-responsive">
            <table class="nf-right-table-wrap">
              <thead>
                <th colspan="4">BLOGS & ARTICLES</th>
              </thead>
              <tbody>
                <tr>
                  <td width="40%">
                    North east - the new destination of OTT film Shooting
                  </td>
                  <td>
                    Published Date : 1 June,2021
                  </td>
                  <td>
                    Laste Date : 7 June, 2021
                  </td>
                  <td>
                    <a href="<?php echo site_url()?>/blogs-articles-details">Click here</a>
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


