<?php
/*$args = array( 
    'taxonomy'     => 'category',
    'orderby'      => 'name',
    'show_count'   => 1,
    'pad_counts'   => 0, 
    'hierarchical' => 1,
    'echo'         => 0,
    'hide_empty' => 0
);
$categories = get_categories( $args );
echo '<pre>';
print_r($categories);
echo '</pre>';exit;
foreach($categories as $category) {
   echo '<div class="col-md-12"><a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a></div>';
}*/
?>


 <?php /*?>
 <div class="widget mb-40 widget-padding white-bg">
            <div class="widget-link">
                <nav id="nav">
                <ul class="nedfi-sidebar" id="sidebar-accordian">
                <li>
<?php
$args = array(
    'show_option_all'    => '',
    'show_option_none'   => __('No categories'),
    'orderby'            => 'name',
    'order'              => 'ASC',
    'style'              => 'list',
    'show_count'         => 0,
    'hide_empty'         => 1,
    'use_desc_for_title' => 1,
    'child_of'           => 0,
    'feed'               => '',
    'feed_type'          => '',
    'feed_image'         => '',
    'exclude'            => '',
    'exclude_tree'       => '',
    'include'            => '',
    'hierarchical'       => true,
    'title_li'           => __( 'Categories' ),
    'number'             => NULL,
    'echo'               => 1,
    'depth'              => 0,
    'current_category'   => 0,
    'pad_counts'         => 0,
    'taxonomy'           => 'category',
    'walker'             => 'Walker_Category',
    'hide_title_if_empty' => false,
    'separator'          => '<br />',
);

echo '<ul>';
    wp_list_categories( $args );
echo '</ul>';

?>
                </li>
            </ul>
            </nav>
        </div>
    </div>

<?php */?>


<div class="courses-details-sidebar-area">
        <div class="widget mb-20 white-bg">
            <div class="sidebar-form">
                <form action="<?php echo site_url()?>/courses" method="get">
                    <input placeholder="Search course category" type="text" name="txtsearch" value="<?php echo $_GET['txtsearch'];?>">
                    <button type="submit"><i class="ti-search"></i></button>
                </form>
            </div>
        </div>
         <div class="widget mb-40 widget-padding white-bg">
            <div class="widget-link">
                <nav id="nav">
                <ul class="nedfi-sidebar" id="sidebar-accordian">
                <li>
                    <?php dynamic_sidebar( 'main-sidebar' ) ?>
                </li>
            </ul>
            </nav>
        </div>
    </div>
</div>


<?php /*?>
<div class="courses-details-sidebar-area">
                        <div class="widget mb-20 white-bg">
                            <div class="sidebar-form">
                                <form action="" method="get">
                                    <input placeholder="Search course" type="text" name="txtsearch" value="<?php echo $_GET['txtsearch'];?>">
                                    <button type="submit"><i class="ti-search"></i></button>
                                </form>
                            </div>
                        </div>

                       <nav>

                        <div class="widget mb-40 widget-padding white-bg">
                            <div class="widget-link">
                                <ul class="nedfi-sidebar" id="sidebar-accordian">
                                    <li>
                                        <a class="active" href="#" data-toggle="collapse" data-target="#sidemenu1">Education</a>
                                        <ul class="collapse show" id="sidemenu1" data-parent="#sidebar-accordian">
                                            <li>
                                                <a href="#" data-toggle="collapse" data-target="#sidemenu2">Entrance Exams</a>
                                                <ul class="collapse show" id="sidemenu2">
                                                    <li><a href="#" data-toggle="collapse" data-target="#sidemenu3">Law</a>
                                                        <ul class="collapse show" id="sidemenu3" data-parent="#sidebar-accordian">
                                                            <li><a href="#" class="" data-toggle="collapse" data-target="#sidemenu4">National Level Exam</a>
                                                                <ul class="collapse show" id="sidemenu4" data-parent="#sidemenu3">
                                                                    <li><a href="#">CLAT</a></li>
                                                                    <li><a href="#">AILET</a></li>
                                                                    <li><a href="#">CUET</a></li>
                                                                </ul>
                                                            </li>
                                                            <li><a href="#" data-toggle="collapse" data-target="#sidemenu5">Regional Level Exam</a>
                                                                <ul class="collapse" id="sidemenu5" data-parent="#sidemenu3">
                                                                    <li><a href="#">Medical</a></li>
                                                                    <li><a href="#">Liberal Studies</a></li>
                                                                    <li><a href="#">Allied Medicine</a></li>
                                                                    <li><a href="#">Commerce</a></li>
                                                                </ul>
                                                            </li>
                                                            <li><a href="#" data-toggle="collapse" data-target="#sidemenu6">Abroad Standardised Tests</a>
                                                                <ul class="collapse" id="sidemenu6" data-parent="#sidemenu3">
                                                                    <li><a href="#">Test 1</a></li>
                                                                    <li><a href="#">Test 2</a></li>
                                                                    <li><a href="#">Test 3</a></li>
                                                                    <li><a href="#">Test 4</a></li>
                                                                </ul>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li><a href="#">Defence</a></li>
                                                    <li><a href="#">Architecture</a></li>
                                                    <li><a href="#">Engeering</a></li>
                                                    <li><a href="#">Medical</a></li>
                                                    <li><a href="#">Liberal Studies</a></li>
                                                    <li><a href="#">Allied Medicine</a></li>
                                                    <li><a href="#">Commerce</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#">Career</a></li>
                                            <li><a href="#">Study In North-East</a></li>
                                            <li><a href="#">Study Abroad</a></li>
                                            <li><a href="#">Scholarship</a></li>
                                            <li><a href="#">Events/Competition</a></li>
                                      </ul>
                                    </li>
                                    <li>
                                        <a href="#">Employment </a>
                                    </li>
                                    <li>
                                        <a href="#">Entrepreneurship</a>
                                    </li>
                                    <li>
                                        <a href="#">Resources</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        
                    </div>            
                    <?php */?>