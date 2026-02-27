<?php get_header(); ?>
    <!-- slider-start -->
    <div class="slider-area">
        <div class="page-title">
            <div class="single-slider slider-height slider-height-breadcrumb d-flex align-items-center" style="background-image: url(<?php echo get_template_directory_uri(). '/assets/img/bg/others_bg.jpg'?>);">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="slider-content slider-content-breadcrumb text-center">
                                <h1 class="white-color f-700">Our Course</h1>
                                <nav class="text-center" aria-label="breadcrumb">
                                    <ol class="breadcrumb justify-content-center">
                                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Courses</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider-end -->
    <?php
//if(have_posts()) {
  //  while(have_posts()) {
    //    the_post(); ?>
    <div class="course-details-area gray-bg pt-70 pb-50">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-3 col-lg-3">
                    <?php get_sidebar() ?>
                </div>
                <!-- Blog -->
                <!-- Blog -->
                <div class="col-xl-9 col-lg-9">
                    <div class="row">

                        <?php
                        $record=0;
                        $categories = get_the_category();

                        $search_keyword = $_GET['txtsearch'];
                        //$slug = $_GET['category'];
                        //$cat = get_category_by_slug($slug); 
                        //$catID = $cat->term_id;
                        $catID = $categories[0]->cat_ID;

                        //echo '>>'.$catID;exit;
                        if($catID>0)
                        {
                            $blog_args = array(
                                'post_type' => 'post',
                                'cat' => $catID
                            );

                            $blog_posts = new WP_Query($blog_args);
                            //echo '<pre>';
                            //print_r($blog_posts);
                            //echo '</pre>';exit;
                            while($blog_posts->have_posts()) {
                                $blog_posts->the_post();
                                
                                $values= get_fields();
                                //echo '<pre>';
                                //print_r($values);
                                //echo '</pre>';
                                if($values)
                                {
                                    $img=''; $title='';  $link='';
                                    foreach($values as $key => $value)
                                    {
                                        if($key=='image'){ $img = $value; }
                                        if($key=='title'){ $title = $value;  }
                                        if($key=='link'){ $link = $value;  }
                                    }
                        if(($title!='' and $search_keyword=='') or ($search_keyword!='' and strpos(strtolower($title), strtolower($search_keyword)) !== false))
                        { 
                        $record=1;          
                        ?>
                        <div class="col-xl-3 col-lg-3 col-md-3">
                            <div class="courses-wrapper courses-wrapper-3 mb-30">
                                <div class="courses-thumb">
                                    <a href="#"><img src="<?php echo $img; ?>" alt=""></a>
                                </div>
                                <div class="courses-content courses-content-3 clearfix">
                                    <div class="courses-heading d-flex">
                                        <div class="course-title-3">
                                            <h1><a href="#"><?php echo $title; ?></a></h1>
                                        </div>
                                    </div>
                                    <div class="courses-wrapper-bottom clearfix mt-35">
                                        <div class="courses-button">
                                            <a target="_blank" href="<?php echo $link; //the_permalink(); ?>">View Details</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                            <?php }
                                }
                            ?>

                        <?php } 
                        }

                        if($record==0)
                        {
                            echo 'No record found.';
                        }

                        ?>
                        
                         </div>
                    </div>
                
            </div>
        </div>
    </div>
    <?php 
     //   }
    //}
    ?>
 <!-- footer start -->   
<?php get_footer(); ?>
<script type="text/javascript">
    $(function() {
     var splittedStr = window.location.href;
     var splitted = splittedStr.split('?');
     var pgurl = splitted[0];
     $("#nav ul li a").each(function(){
          if($(this).attr("href") == pgurl || $(this).attr("href") == '' )
          $(this).addClass("active");
     })
});


$(document).ready(function () {
    //$(".sub-menu").hide();
    //$(".menu-item .sub-menu").show();
    $("li.menu-item").click(function () { // mouse CLICK instead of hover
        // Only prevent the click on the topmost buttons
        //if ($('.sub-menu', this).length >=1) {
           // event.preventDefault();
        //}
        $(this).find(".sub-menu").toggle('slow'); // First hide any open menu items
        //$(this).find(".sub-menu").show(); // display child
        event.stopPropagation();
        //event.preventDefault();
    });
});

//$(".nedfi-sidebar li a:before").removeAttr("href");
//$("#nav ul li a").removeAttr("href");

</script> 