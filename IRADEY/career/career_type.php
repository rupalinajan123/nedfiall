<?php 
/*Template Name: career_type */
/* Template Post Type: career_type */ ?>
<?php get_header(); 

global $wp;


$current_slug = add_query_arg( array(), $wp->request );
$current_slug = explode('/',$current_slug);

$the_slug = end($current_slug);

$type = $current_slug[count($current_slug) - 2];


    $blog_args = array(
                                'post_type' => 'career_type',
                                //'post_id' => $mypost_id,
                                'name'        => $the_slug,
                                'post_status' => 'publish',
                                'posts_per_page' => 1
                            );

                            $blog_posts = new WP_Query($blog_args);
                            //echo "<pre>";
                             //   print_r($blog_posts);
                            while($blog_posts->have_posts()) {
                                $blog_posts->the_post(); 
                                $values= get_fields();
                                
                                if($values)
                                {
                                    $banner_image='';
                                    foreach($values as $key => $value)
                                    {
                                        if($key=='banner_image'){ $banner_image = $value;  }
                                    }
                                }
                            $cur_category = get_the_category($post->ID);
                            

    ?>

    <!-- inner-banner-start -->
    <div class="inner-banner">
        <div class="container">
            <div class="banner-title">
                <h3><?php the_title();?> <a href="#" class="changeTopic" data-toggle="collapse" data-target="#changeTopic">Change Topic</a></h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Education</a></li>
                    <li class="breadcrumb-item">Career</li>
                    <li class="breadcrumb-item active"><?php the_title();?></li>
                </ul>
            </div>
            <div class="chagetopic-modal changeTopic-collapse">
          <div class="collapse " id="changeTopic" style="">
          	<a href="#" id="changeTopic_close"><i class="fa fa-close"></i></a>
            <div class="card card-body">
              <div class="row">
                
                        <?php
                        $k=0;
                        $t=0;
                        $args = array(
                          'post_type'   => 'career_type',
                          'orderby' => 'post_title',
                          'order'   => 'ASC',
                          'post_status' => 'publish',
                          'posts_per_page' => -1
                        );
                        $the_query = new WP_Query( $args );
                        ?>
                        <?php if( $the_query->have_posts() ): ?>
                          <?php while( $the_query->have_posts() ) : $the_query->the_post();
                          if($k==0){ ?>
                            <div class="col-md-4">
                              <h4><?php if($t==0){?>Select Course<?php }else echo '&nbsp;'; ?></h4>
                            <ul>
                          <?php }
                          if($the_slug!=$post->post_name){
                          ?>      
                            <li>
                              <a class="box" href="<?php the_permalink()?>"><?php the_title();?></a>
                            </li>
                            <?php
                            } 
                            $totk=count($the_query->posts)-1;
                            if($k==7 or $totk==$t){ $k=0;?>
                            </ul>
                            </div>
                          <?php }else{ $k++;} $t++; ?>

                          <?php 
                        endwhile; ?>
                        <?php endif; 
                        wp_reset_postdata();
                        ?>
                    
                <!--<div class="col-md-6">
                  <h4>Type-Wise</h4>
                    <ul>
                      <li><a href="#">Integrated</a></li>
                      <li><a href="#">Hi-Tech</a></li>
                      <li><a href="#">Traditional</a></li>
                      <li><a href="#">Organic Farming</a></li>
                    </ul>
                </div>-->
              </div>
            </div>
          </div>
        </div>
            <div class="banner-content">
                <div class="row"> <!--banner-img-->
                    <div class="col-md-4 banner-img pr-0"><img src="<?php echo $banner_image; ?>"></div>
                    <div class="col-md-8 pl-0">
                        <div class="bannerbg justify-content-start pt-3 nf-height-100">
                          <h4><?php the_content();?></h4>
                          <h5><?php //the_excerpt();?></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- inner-banner-end -->

    <div class="inner-body">
        <div class="container">
            <div class="national-level icon-text-box">
                <!--<div class="row mb-2">
                    <div class="col-md-8">
                        <h4>&nbsp;</h4>
                    </div>
                    <div class="col-md-4">
                        <ul class="filter">
                            <li><a href="#">All</a></li>|
                            <li><a href="#"><i class="fa fa-filter"></i></a></li>
                        </ul>
                    </div>
                </div>-->

                <?php
                $j=0;
                foreach($cur_category as $category) { 

                    if($_POST['study_level']!='')
                    {
                        $blog_args = array(
                                'post_type' => 'career',
                                'posts_per_page' => -1,
                                'post_status' => 'publish',
                                'category'=> $category->term_id,
                                'meta_key'    => 'study_level',
                                'meta_value'  => $_POST['study_level']
                            );
                    }
                    else
                    {
                        $blog_args = array(
                                'post_type' => 'career',
                                'posts_per_page' => -1,
                                'post_status' => 'publish',
                                'category'=> $category->term_id
                                
                            );
                    }
                    $posts_array = get_posts($blog_args);
                ?>

                <div class="row mb-2">
                    <div class="col-md-8">
                        <h4>Career Option <span>|</span> <?php echo count($posts_array)?></h4>
                    </div>
                    
                </div>

                <div class="row mb-4">
                <?php
                    foreach($posts_array as $post)
                    {

                        $values= get_fields();
                                
                                if($values)
                                {
                                    $icon='';
                                    foreach($values as $key => $value)
                                    {
                                        if($key=='icon'){ $icon = $value; }
                                    }
                                }
                ?>

                    <div class="col-md-3" >
                    <span data-toggle="popover" data-placement="right" data-trigger="hover" data-content="<?php echo strip_tags($post->post_content)?>" data-original-title="" title="">
                        <a href="<?php echo get_permalink($post->ID);?>" class="box">
                            <img src="<?php echo $icon; ?>">
                                <h4><?php the_title()?></h4>
                        </a>
                    </span>
                    </div>
                    <?php /* ?>
                    <div class="col-md-3">
                        <a href="<?php echo get_permalink($post->ID);?>" class="box">
                            <h4><?php echo $post->post_title;?></h4>
                            <p class="darkblueTxt"><?php echo $post->post_excerpt;?></p>
                        </a>
                    </div>
                    <?php */?>
                  
                <?php }?>  
                </div>

                <?php $j++; }?>    
            </div>
            <!--<div class="jumbotron">              
              <span data-toggle="popover" data-placement="right" data-trigger="hover" data-content="Description - Civil Lawyer">Description - Civil Lawyer</span>
            </div>-->
        </div>
    </div>


<?php
    }

?>    
 <!-- footer start -->   
<?php get_footer(); ?>
<script type="text/javascript">
document.body.scrollTop = 250;
document.documentElement.scrollTop = 250;

function showhideFun()
{
    if($('#showhide').hasClass('show')){
    $('#showhide').removeClass('show');
    }else{
      $('#showhide').addClass('show');
    }
}
</script>