<?php
/*
* Theme Functions File
*/
flush_rewrite_rules( false );
define( 'DISALLOW_FILE_EDIT', true );

function iradey_theme_setup() {

    add_theme_support('custom-logo');

    add_theme_support('title-tag');

    add_theme_support('post-thumbnails');

    add_image_size ('slider-featured', 956, 436, array('center', 'center'));
    add_image_size ('home-featured', 680, 400, array('center', 'center'));
    add_image_size ('single-post', 580, 272, array('center', 'center'));
    add_image_size ('portfolio-thumb', 374, 260, array('center', 'center'));

    add_theme_support('automatic-feed-links');

    register_nav_menus( array(
        'primary'   => __( 'Primary Menu', 'iradey' )
    ) );
    
};
add_action('after_setup_theme', 'iradey_theme_setup');

function iradey_scripts(){


  wp_enqueue_style('lib', get_template_directory_uri(). '/assets/css/lib.css','','5.22');
  wp_enqueue_style('style', get_stylesheet_uri(),'','5.34');

  wp_enqueue_style('megamenu-new', get_template_directory_uri(). '/assets/css/megamenu.css');
  wp_enqueue_style('swiper', get_template_directory_uri(). '/assets/css/swiper-bundle.min.css');

  wp_enqueue_script('modernizr-3.5.0.min.js', get_template_directory_uri(). '/assets/js/vendor/modernizr-3.5.0.min.js');
  wp_enqueue_script('jquery-1', get_template_directory_uri(). '/assets/js/vendor/jquery-1.12.4.min.js', array(), false, true);


  wp_enqueue_script('sweetalert2', get_template_directory_uri(). '/assets/js/sweetalert2.all.min.js', array(), false, true);

  wp_enqueue_script('popper', get_template_directory_uri(). '/assets/js/popper.min.js', array(), false, true);
  wp_enqueue_script('boots', get_template_directory_uri(). '/assets/js/bootstrap.min.js', array(), false, true);

  wp_enqueue_script('carousel', get_template_directory_uri(). '/assets/js/owl.carousel.min.js', array(), false, true);
  wp_enqueue_script('isotope', get_template_directory_uri(). '/assets/js/isotope.pkgd.min.js', array(), false, true);
  wp_enqueue_script('one', get_template_directory_uri(). '/assets/js/one-page-nav-min.js', array(), false, true);

  wp_enqueue_script('slick', get_template_directory_uri(). '/assets/js/slick.min.js', array(), false, true);

  wp_enqueue_script('ajax1', get_template_directory_uri(). '/assets/js/ajax-form.js', array(), false, true);
  wp_enqueue_script('wow', get_template_directory_uri(). '/assets/js/wow.min.js', array(), false, true);
  wp_enqueue_script('meanmenu', get_template_directory_uri(). '/assets/js/jquery.meanmenu.min.js', array(), false, true);
  wp_enqueue_script('menuzord.js', get_template_directory_uri(). '/assets/js/menuzord.js', array(), false, true);


  wp_enqueue_script('barfiller', get_template_directory_uri(). '/assets/js/jquery.barfiller.js', array(), false, true);
  wp_enqueue_script('scrollUp', get_template_directory_uri(). '/assets/js/jquery.scrollUp.min.js', array(), false, true);

  wp_enqueue_script('pkgd', get_template_directory_uri(). '/assets/js/imagesloaded.pkgd.min.js', array(), false, true);
  wp_enqueue_script('counterup', get_template_directory_uri(). '/assets/js/jquery.counterup.min.js', array(), false, true);
  wp_enqueue_script('waypoints', get_template_directory_uri(). '/assets/js/waypoints.min.js', array(), false, true);
  wp_enqueue_script('magnific', get_template_directory_uri(). '/assets/js/jquery.magnific-popup.min.js', array(), false, true);
  wp_enqueue_script('plugins3', get_template_directory_uri(). '/assets/js/plugins.js', array(), false, true);
  wp_enqueue_script('mCustomScrollbar', get_template_directory_uri(). '/assets/js/jquery.mCustomScrollbar.js', array(), false, true);
  
  wp_enqueue_script('aos', get_template_directory_uri(). '/assets/js/aos.js', array(), '5.14', true);
  wp_enqueue_script('main', get_template_directory_uri(). '/assets/js/main.js', array(), false, true);

  wp_enqueue_script('select', get_template_directory_uri(). '/assets/js/bootstrap-select.min.js', array(), false, true);
  wp_enqueue_script('swiper', get_template_directory_uri(). '/assets/js/swiper-bundle.min.js', array(), '5.14', true);
  wp_enqueue_script('comman', get_template_directory_uri(). '/assets/js/comman.js', array(), '5.14', true);


  wp_enqueue_script('jquery.menu-aim', get_template_directory_uri(). '/assets/js/jquery.menu-aim.js', array(), false, true);

  //wp_enqueue_script('easing', get_template_directory_uri(). '/assets/js/jquery.easing.1.3.js', array(), '5.14', true);
}
add_action('wp_enqueue_scripts', 'iradey_scripts');


//change sender for email
/*add_filter( 'wp_mail_from', 'itsg_mail_from_address' );
function itsg_mail_from_address( $email ) {
return 'priyanka.dalvi@esds.co.in';
}
add_filter( 'wp_mail_from_name', 'itsg_mail_from_name' );
function itsg_mail_from_name( $from_name ) {
return 'NEDFi';
}*/
//change sender for email end



function iradey_admin_scripts(){

    //wp_enqueue_script('jquery');
    //wp_enqueue_script('iradey-browser', get_template_directory_uri(). '/assets/js/jquery.min.js');
    wp_enqueue_script('iradey-validate', get_template_directory_uri(). '/assets/js/jquery.validate.min.js');
    wp_enqueue_script('iradey-browser', get_template_directory_uri(). '/assets/js/custom.js','','5.16');
}
add_action('admin_enqueue_scripts', 'iradey_admin_scripts');


function iradey_widgets_init() {

    register_sidebar( array(
        'name'          => __( 'Primary Sidebar', 'iradey' ),
        'id'            => 'main-sidebar',
        'description'   => 'Main Sidebar on Left Side',
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '',
        'after_title'   => '',
    ) );

    register_sidebar( array(
        'name'          => __( 'Contact Information', 'iradey' ),
        'id'            => 'contact_info',
        'description'   => 'Contact Info on top bar Homepage',
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '',
        'after_title'   => '',
    ) );
    register_sidebar( array(
        'name'          => __( 'Tab Menu', 'iradey' ),
        'id'            => 'tab_info',
        'description'   => 'dynamic Tab menu',
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '',
        'after_title'   => '',
    ) );


    register_sidebar( array(
        'name'          => __( 'Social Media', 'iradey' ),
        'id'            => 'social_media',
        'description'   => 'Social Media on Homepage top bar',
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '',
        'after_title'   => '',
    ) );
    register_sidebar( array(
        'name'          => __( 'Home - Resources For Student', 'iradey' ),
        'id'            => 'home-info-1',
        'description'   => 'Home Information Below Slider',
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '',
        'after_title'   => '',
    ) );
    register_sidebar( array(
        'name'          => __( 'Home - Advancing North East Dialogue', 'iradey' ),
        'id'            => 'home-info-6',
        'description'   => 'Home Information Below Slider',
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '',
        'after_title'   => '',
    ) );
    
    register_sidebar( array(
        'name'          => __( 'Home - Defence Services', 'iradey' ),
        'id'            => 'home-info-2',
        'description'   => 'Home Information Below Slider',
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '',
        'after_title'   => '',
    ) );
    register_sidebar( array(
        'name'          => __( 'Home - Know Your Entrance Exam', 'iradey' ),
        'id'            => 'home-info-3',
        'description'   => 'Home Information Below Slider',
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '',
        'after_title'   => '',
    ) );
    register_sidebar( array(
        'name'          => __( 'Home - Explore Support Ecosystem', 'iradey' ),
        'id'            => 'home-info-4',
        'description'   => 'Home Information Below Slider',
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '',
        'after_title'   => '',
    ) );
    register_sidebar( array(
        'name'          => __( 'Home - Career Beyond Boundries', 'iradey' ),
        'id'            => 'home-info-5',
        'description'   => 'Home Information Below Slider',
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '',
        'after_title'   => '',
    ) );
    register_sidebar( array(
        'name'          => __( 'Home Footer Links', 'iradey' ),
        'id'            => 'home-footer-1',
        'description'   => 'Home Page Links above footer ',
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '',
        'after_title'   => '',
    ) );
    register_sidebar( array(
        'name'          => __( 'Footer Widget 1', 'iradey' ),
        'id'            => 'footer-1',
        'description'   => 'Footer 1',
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '',
        'after_title'   => '',
    ) );
    register_sidebar( array(
        'name'          => __( 'Footer Widget 2', 'iradey' ),
        'id'            => 'footer-2',
        'description'   => 'Footer 2',
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '',
        'after_title'   => '',
    ) );
    register_sidebar( array(
        'name'          => __( 'Footer Widget 3', 'iradey' ),
        'id'            => 'footer-3',
        'description'   => 'Footer 3',
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '',
        'after_title'   => '',
    ) );
}
add_action( 'widgets_init', 'iradey_widgets_init' );

function remove_footer_admin () {
    echo 'Copyright 2021 NEDFi';
}
add_filter('admin_footer_text', 'remove_footer_admin');

/*Remove Add media Buttons*/
//function RemoveAddMediaButtons(){
//remove_action( 'media_buttons', 'media_buttons' );
//}
//add_action('admin_head', 'RemoveAddMediaButtons');

function check_post_type_and_remove_media_buttons() {
    global $current_screen;
// Replace following array items with your own custom post types
    $post_types = array('work_abroad');
    if (!in_array($current_screen->post_type,$post_types)) {
        remove_action('media_buttons', 'media_buttons');
    }
}
add_action('admin_head','check_post_type_and_remove_media_buttons');

/*function wpartisan_excerpt_label( $translation, $original ) {
    if ( 'Excerpt' == $original ) {
        return __( 'Full Name' );
    } elseif ( false !== strpos( $original, 'Excerpts are optional hand-crafted summaries of your' ) ) {
        return __( '' );
    }
    return $translation;
}
add_filter( 'gettext', 'wpartisan_excerpt_label', 10, 2 );*/

add_filter( 'gettext', 'change_excerpt_info', 10, 2 );
function change_excerpt_info ( $translation, $original ) {
    $post_types = array( "entrance_exam" );
    $post = get_post(); //$post
    $posttype = '';
    if ( $post ) {
        $posttype =  $post->post_type;
    }
    if ( in_array($posttype, $post_types) ) {
        if ( 'Excerpt' == $original ) {
             return ' Full Name';  // Will appear as Service Teaser, Team Teaser, etc.
         } else $pos = strpos($original, 'Excerpts are optional hand-crafted summaries');
         if ($pos !== false) {
            // The Summary will incorporate the post_type into the description.
            $summary = '';
            return $summary;
        }
    }
    return $translation;
}

/**
 * Create Custo Post Type for Slideres
 */

function create_slider_post_type() {

    $labels = array(
        'name' => __( 'Home Slider' ),
        'singular_name' => __( 'Sliders' ),
        'all_items'           => __( 'All Sliders' ),
        'view_item'           => __( 'View Slider' ),
        'add_new_item'        => __( 'Add New Slider' ),
        'add_new'             => __( 'Add New Slider' ),
        'edit_item'           => __( 'Edit Slider' ),
        'update_item'         => __( 'Update Slider' ),
        'search_items'        => __( 'Search Slider' ),
        'search_items' => __('Sliders')
    );

    $args = array(
        'labels' => $labels,
        'description' => 'Add New Slider contents',
        'menu_position' => 21,
        'public' => true,
        'has_archive' => true,
        'map_meta_cap' => true,
        'capability_type' => 'post',
        'hierarchical' => true,
        'rewrite' => array('slug' => false),
        'menu_icon'=>'dashicons-format-image',
        'supports' => array(
            'title',
            'thumbnail',
            //'excerpt'
        ),
    );
    register_post_type( 'slider', $args);

}
add_action( 'init', 'create_slider_post_type' );

add_action( 'init', function() {
    //remove_post_type_support( 'slider', 'editor' );
    //remove_post_type_support( 'slider', 'slug' );
} );


function cih_theme_support(){

 add_theme_support( 'post-thumbnails' );
 add_image_size( 'slider_image','1024','720',true);
 
}
add_action('after_setup_theme','cih_theme_support');



function sliderLink_add_meta_box() {
 add_meta_box('slider_link','Slider Image','slider_link_callback','slider111');
}

function slider_link_callback( $post ) {

 wp_nonce_field('slider_link_save','slider_link_meta_box_nonce');
 $value = get_post_meta($post->ID,'_slider_link_value_key',true);
 ?>
 Set featured Image.<br>
 <input type="hidden" name="slider_link_field" id="slider_link_field" value="<?php echo esc_attr( $value ); ?>" size="100" />
 <?php
}
add_action('add_meta_boxes','sliderLink_add_meta_box');


function slider_link_save( $post_id ) {
 if( ! isset($_POST['slider_link_meta_box_nonce'])) {
  return;
}
if( ! wp_verify_nonce( $_POST['slider_link_meta_box_nonce'], 'slider_link_save') ) {
  return;
}
if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
  return;
}
if( ! current_user_can('edit_post', $post_id)) {
  return;
}
if( ! isset($_POST['slider_link_field'])) {
  return;
}
$slider_link = sanitize_text_field($_POST['slider_link_field']);
update_post_meta( $post_id,'_slider_link_value_key', $slider_link );
}
add_action('save_post','slider_link_save');

//===================================
// entrance_exam Custom Post Type
function event_init() {

    $labels = array(
        'name' => 'Entrance Exam',
        'singular_name' => 'Entrance Exam',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New Exam',
        'edit_item' => 'Edit Exam',
        'new_item' => 'New Exam',
        'all_items' => 'All Exam',
        'view_item' => 'View Exam',
        'search_items' => 'Search Exam',
        'not_found' =>  'No Exam Found',
        'not_found_in_trash' => 'No Exam found in Trash', 
        'parent_item_colon' => '',
        'menu_name' => 'Entrance Exam',
    );
    


    // register post type
    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'rewrite' => array('slug' => 'entrance_exam'),
        'query_var' => true,
        'menu_icon' => 'dashicons-admin-post',
        'taxonomies'  => array( 'category' ),
        'show_in_rest' =>true,
        'menu_position' => 24, 
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            //'trackbacks',
            'custom-fields',
            //'comments',
            //'revisions',
            //'thumbnail',
            //'author',
            'page-attributes'
        ),


    );
    register_post_type( 'entrance_exam', $args );
    
    
}
add_action( 'init', 'event_init' );
//add custom  in entrance_exam post


//add related major in entrance_exam post type
function eventAddmajor_add_meta_box() {

    $screens = array( 'entrance_exam','nursery' );

      foreach ( $screens as $screen ) {

        $labels = 'Related Majors'; 
        if($screen=='nursery') $labels = 'Land Development Cost';

        add_meta_box('event_major',$labels,'event_major_callback',$screen);
    }



 
}

function event_major_callback( $post ) {

 wp_nonce_field('event_major_save','event_major_meta_box_nonce');
 $value = get_post_meta($post->ID,'_event_major_value_key',true);

 $value = explode('*****',$value);
 ?>
 <table id="addRows_div_major">
     <?php
     for($i=0;$i<count($value);$i++)
     {
         ?>

         <tr id="addRows_major_<?php echo $i;?>"><td>
            <input required type="text" name="event_major_field[]" id="event_major_field" value="<?php echo esc_attr( $value[$i] ); ?>" size="50" placeholder="Details" /></td><td>
                <?php if($i==0){?>
                    <button type="button" id="addrows_major" onclick="add_rows_major()" class="acf-button button">Add Row</button>
                <?php }else{?>
                    <button type="button" class="acf-button button" id="delrows_major" onclick="del_rows_major(<?php echo $i;?>)">Delete Row</button>
                <?php }?>
            </td></tr>

            <?php
        }
        ?>
    </table>
    <input type="hidden" name="event_major_cnt" id="event_major_cnt" value="<?php echo count($value);?>"  />
    <?php
}
add_action('add_meta_boxes','eventAddmajor_add_meta_box');

function event_major_save( $post_id ) {
 if( ! isset($_POST['event_major_meta_box_nonce'])) {
  return;
}
if( ! wp_verify_nonce( $_POST['event_major_meta_box_nonce'], 'event_major_save') ) {
  return;
}
if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
  return;
}
if( ! current_user_can('edit_post', $post_id)) {
  return;
}
if( ! isset($_POST['event_major_field'])) {
  return;
}
$event_link = implode('*****',$_POST['event_major_field']);
update_post_meta( $post_id,'_event_major_value_key', $event_link );
}
add_action('save_post','event_major_save');
//add related major in entrance_exam post type end


//---------------------------------




//------------------------------

// entrance_exam type law Custom Post Type
function event_type_init() {

    $labels = array(
        'name' => 'Exam Type',
        'singular_name' => 'Exam Type',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New Exam Type',
        'edit_item' => 'Edit Exam Type',
        'new_item' => 'New Exam Type',
        'all_items' => 'All Exam Type',
        'view_item' => 'View Exam Type',
        'search_items' => 'Search Exam Type',
        'not_found' =>  'No Exam Type Found',
        'not_found_in_trash' => 'No Exam Type found in Trash', 
        'parent_item_colon' => '',
        'menu_name' => 'Exam Type',
    );
    
    // register post type
    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,

        //'publicly_queryable' => false,
        'exclude_from_search' => true,
        'menu_position' => 23, 

        'rewrite' => array('slug' => 'exam_type'),
        'query_var' => true,
        'menu_icon' => 'dashicons-admin-post',
        'taxonomies'  => array( 'category' ),
        'supports' => array(
            'title',
            'editor',
            //'excerpt',
            //'trackbacks',
            'custom-fields',
            //'comments',
            //'revisions',
            //'thumbnail',
            //'author',
            'page-attributes'
        )
    );
    register_post_type( 'exam_type', $args );
    
    
}
add_action( 'init', 'event_type_init' );
// exam type law Custom Post Type end

//========career type post 
// entrance_exam type law Custom Post Type
function career_type_init() {

    $labels = array(
        'name' => 'Career Type',
        'singular_name' => 'Career Type',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New Career Type',
        'edit_item' => 'Edit Career Type',
        'new_item' => 'New Career Type',
        'all_items' => 'All Career Type',
        'view_item' => 'View Career Type',
        'search_items' => 'Search Career Type',
        'not_found' =>  'No Career Type Found',
        'not_found_in_trash' => 'No Career Type found in Trash', 
        'parent_item_colon' => '',
        'menu_name' => 'Career Type',
    );
    
    // register post type
    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,

        //'publicly_queryable' => false,
        'exclude_from_search' => true,
        'menu_position' => 23, 

        'rewrite' => array('slug' => 'career_type'),
        'query_var' => true,
        'menu_icon' => 'dashicons-admin-post',
        'taxonomies'  => array( 'category' ),
        'supports' => array(
            'title',
            'editor',
            //'excerpt',
            //'trackbacks',
            'custom-fields',
            //'comments',
            //'revisions',
            //'thumbnail',
            //'author',
            'page-attributes'
        )
    );
    register_post_type( 'career_type', $args );
    
    
}
add_action( 'init', 'career_type_init' );


//career type post end

//----------------

// education type law Custom Post Type
function education_init() {

    $labels = array(
        'name' => 'Education',
        'singular_name' => 'Education',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New Education',
        'edit_item' => 'Edit Education',
        'new_item' => 'New Education',
        'all_items' => 'All Education',
        'view_item' => 'View Education',
        'search_items' => 'Search Education',
        'not_found' =>  'No Education Found',
        'not_found_in_trash' => 'No Education found in Trash', 
        'parent_item_colon' => '',
        'menu_name' => 'Education',
    );
    
    // register post type
    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,

        //'publicly_queryable' => false,
        'exclude_from_search' => true,
        'menu_position' => 22, 

        'rewrite' => array('slug' => 'education'),
        'query_var' => true,
        'menu_icon' => 'dashicons-admin-post',
        //'taxonomies'  => array( 'category' ),
        'supports' => array(
            'title',
            //'editor',
            //'excerpt',
            //'trackbacks',
            'custom-fields',
            //'comments',
            //'revisions',
            //'thumbnail',
            //'author',
            'page-attributes'
        )
    );
    register_post_type( 'education', $args );
    
    
}
add_action( 'init', 'education_init' );
// Education Custom Post Type end

//========remove comment menu section in admin panel
   // Removes from admin menu
   /*add_action( 'admin_menu', 'pk_remove_admin_menus' );
   function pk_remove_admin_menus() {
       remove_menu_page( 'edit-comments.php' );
   }
 
   // Removes from post and pages
   add_action('init', 'pk_remove_comment_support', 100);
   function pk_remove_comment_support() {
      remove_post_type_support( 'post', 'comments' );
      remove_post_type_support( 'page', 'comments' );
   }
 
   // Removes from admin bar
   add_action( 'wp_before_admin_bar_render', 'pk_remove_comments_admin_bar' );
   function pk_remove_comments_admin_bar() {
       global $wp_admin_bar;
       $wp_admin_bar->remove_menu('comments');
   }*/
//========remove comment menu section in admin panel end

/*function deep_templates( $post_templates, $theme, $post, $post_type ){
   $post_templates['/education/single-education.php'] = "Page Style One";
   $post_templates['/education/north-education.php']  = "Page Style Two";
   return $post_templates;
}
add_filter( 'theme_education_templates', 'deep_templates' );*/
//apply_filters( "theme_education_templates", $post_templates, $this, $post, $post_type );

//===========

/*add_filter( 'template_include', 'wpse119820_use_different_template' );
function wpse119820_use_different_template( $template ){

   if( is_post_type_archive( 'education' ) ){
       //"Entry" Post type archive. Find template in sub-dir. Look in child then parent theme
        echo '>>'; exit;
       if( $_template = locate_template( 'education/archive-education.php' ) ){
            //Template found, - use that
            $template = $_template;
       }
   }            
   return $template;
}*/

// career type law Custom Post Type
function career_init() {

    $labels = array(
        'name' => 'Career',
        'singular_name' => 'Career',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New Career',
        'edit_item' => 'Edit Career',
        'new_item' => 'New Career',
        'all_items' => 'All Career',
        'view_item' => 'View Career',
        'search_items' => 'Search Career',
        'not_found' =>  'No Career Found',
        'not_found_in_trash' => 'No Career found in Trash', 
        'parent_item_colon' => '',
        'menu_name' => 'Career',
    );
    
    // register post type
    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,

        //'publicly_queryable' => false,
        'exclude_from_search' => true,
        'menu_position' => 22, 

        'rewrite' => array('slug' => 'career'),
        'query_var' => true,
        'menu_icon' => 'dashicons-admin-post',
        'taxonomies'  => array( 'category' ),
        'supports' => array(
            'title',
            'editor',
            //'excerpt',
            //'trackbacks',
            'custom-fields',
            //'comments',
            //'revisions',
            //'thumbnail',
            //'author',
            'page-attributes'
        )
    );
    register_post_type( 'career', $args );
    
    
}
add_action( 'init', 'career_init' );
// career Custom Post Type end



//add career roles in career post type
function eventAddrole_add_meta_box() {
 add_meta_box('event_role','What can I do (Roles Available)?','event_role_callback','career');
}

function event_role_callback( $post ) {

 wp_nonce_field('event_role_save','event_role_meta_box_nonce');
 $value = get_post_meta($post->ID,'_event_role_value_key',true);

 $value = explode('*****',$value);
 ?>
 <table id="addRows_div_role">
     <?php
     for($i=0;$i<count($value);$i++)
     {
         ?>

         <tr id="addRows_role_<?php echo $i;?>"><td>
            <input required type="text" name="event_role_field[]" id="event_role_field" value="<?php echo esc_attr( $value[$i] ); ?>" size="50" placeholder="Role" /></td><td>
                <?php if($i==0){?>
                    <button type="button" id="addrows_role" onclick="add_rows_role()" class="acf-button button">Add Row</button>
                <?php }else{?>
                    <button type="button" class="acf-button button" id="delrows_role" onclick="del_rows_role(<?php echo $i;?>)">Delete Row</button>
                <?php }?>
            </td></tr>

            <?php
        }
        ?>
    </table>
    <input type="hidden" name="event_role_cnt" id="event_role_cnt" value="<?php echo count($value);?>"  />
    <?php
}
add_action('add_meta_boxes','eventAddrole_add_meta_box');

function event_role_save( $post_id ) {
 if( ! isset($_POST['event_role_meta_box_nonce'])) {
  return;
}
if( ! wp_verify_nonce( $_POST['event_role_meta_box_nonce'], 'event_role_save') ) {
  return;
}
if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
  return;
}
if( ! current_user_can('edit_post', $post_id)) {
  return;
}
if( ! isset($_POST['event_role_field'])) {
  return;
}
$event_link = implode('*****',$_POST['event_role_field']);
update_post_meta( $post_id,'_event_role_value_key', $event_link );
}
add_action('save_post','event_role_save');
//add career roles in career post type end


//add keyskill in career post type
function eventAddkeyskill_add_meta_box() {
 add_meta_box('event_keyskill','Key Skills Required','event_keyskill_callback','career');
}

function event_keyskill_callback( $post ) {

 wp_nonce_field('event_keyskill_save','event_keyskill_meta_box_nonce');
 $value = get_post_meta($post->ID,'_event_keyskill_value_key',true);

 $value = explode('*****',$value);
 ?>
 <table id="addRows_div_keyskill">
     <?php
     for($i=0;$i<count($value);$i++)
     {
         ?>

         <tr id="addRows_keyskill_<?php echo $i;?>"><td>
            <input required type="text" name="event_keyskill_field[]" id="event_keyskill_field" value="<?php echo esc_attr( $value[$i] ); ?>" size="50" placeholder="Keyskill" /></td><td>
                <?php if($i==0){?>
                    <button type="button" id="addrows_keyskill" onclick="add_rows_keyskill()" class="acf-button button">Add Row</button>
                <?php }else{?>
                    <button type="button" class="acf-button button" id="delrows_keyskill" onclick="del_rows_keyskill(<?php echo $i;?>)">Delete Row</button>
                <?php }?>
            </td></tr>

            <?php
        }
        ?>
    </table>
    <input type="hidden" name="event_keyskill_cnt" id="event_keyskill_cnt" value="<?php echo count($value);?>"  />
    <?php
}
add_action('add_meta_boxes','eventAddkeyskill_add_meta_box');

function event_keyskill_save( $post_id ) {
 if( ! isset($_POST['event_keyskill_meta_box_nonce'])) {
  return;
}
if( ! wp_verify_nonce( $_POST['event_keyskill_meta_box_nonce'], 'event_keyskill_save') ) {
  return;
}
if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
  return;
}
if( ! current_user_can('edit_post', $post_id)) {
  return;
}
if( ! isset($_POST['event_role_field'])) {
  return;
}
$event_link = implode('*****',$_POST['event_keyskill_field']);
update_post_meta( $post_id,'_event_keyskill_value_key', $event_link );
}
add_action('save_post','event_keyskill_save');
//add keyskill in career post type end


//add benefit in career post type
function eventAddbenefit_add_meta_box() {
 add_meta_box('event_benefit','Positives','event_benefit_callback','career');
}

function event_benefit_callback( $post ) {

 wp_nonce_field('event_benefit_save','event_benefit_meta_box_nonce');
 $value = get_post_meta($post->ID,'_event_benefit_value_key',true);
   //$value1 = get_post_meta($post->ID,'_event_benefit1_value_key',true);
 $value = explode('*****',$value);
   //$value1 = explode('*****',$value1);
 ?>
 <table id="addbenefit_div" >
     <?php
     for($i=0;$i<count($value);$i++)
     {
         ?>

         <tr id="addbenefit_div_<?php echo $i;?>"><td>
            <input required type="text" style="vertical-align: top;" name="event_benefit_field[]" id="event_benefit_field" value="<?php echo esc_attr( $value[$i] ); ?>" size="50" placeholder="Title" /></td>
    <!--<td>
        <textarea type="text" name="event_benefit1_field[]" id="event_benefit1_field" value="" size="50" placeholder="Description" style="width: 350px;" ><?php //echo esc_attr( $value1[$i] ); ?></textarea></td>-->
        <td>
            <?php if($i==0){?>
                <button type="button" id="addbenefit" onclick="add_benefit()" class="acf-button button">Add Row</button>
            <?php }else{?>
                <button type="button" class="acf-button button" id="delbenefit" onclick="del_benefit(<?php echo $i;?>)">Delete Row</button>
            <?php }?>
        </td></tr>

        <?php
    }
    ?>
</table>
<input type="hidden" name="event_benefit_cnt" id="event_benefit_cnt" value="<?php echo count($value);?>"  />
<?php
}
add_action('add_meta_boxes','eventAddbenefit_add_meta_box');

function event_benefit_save( $post_id ) {
 if( ! isset($_POST['event_benefit_meta_box_nonce'])) {
  return;
}
if( ! wp_verify_nonce( $_POST['event_benefit_meta_box_nonce'], 'event_benefit_save') ) {
  return;
}
if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
  return;
}
if( ! current_user_can('edit_post', $post_id)) {
  return;
}
if( ! isset($_POST['event_benefit_field'])) {
  return;
}
$event_link = implode('*****',$_POST['event_benefit_field']);
update_post_meta( $post_id,'_event_benefit_value_key', $event_link );

   //$event_link1 = implode('*****',$_POST['event_benefit1_field']);
   //update_post_meta( $post_id,'_event_benefit1_value_key', $event_link1 );
}
add_action('save_post','event_benefit_save');
//add benefit in career post type end


//add challenge in career post type
function eventAddchallenge_add_meta_box() {
 add_meta_box('event_challenge','Challenges','event_challenge_callback','career');
}

function event_challenge_callback( $post ) {

 wp_nonce_field('event_challenge_save','event_challenge_meta_box_nonce');
 $value = get_post_meta($post->ID,'_event_challenge_value_key',true);
   //$value1 = get_post_meta($post->ID,'_event_challenge1_value_key',true);
 $value = explode('*****',$value);
   //$value1 = explode('*****',$value1);
 ?>
 <table id="addchallenge_div" >
     <?php
     for($i=0;$i<count($value);$i++)
     {
         ?>

         <tr id="addchallenge_div_<?php echo $i;?>"><td>
            <input required type="text" style="vertical-align: top;" name="event_challenge_field[]" id="event_challenge_field" value="<?php echo esc_attr( $value[$i] ); ?>" size="50" placeholder="Title" /></td>
    <!--<td>
        <textarea  type="text" name="event_challenge1_field[]" id="event_challenge1_field" value="" size="50" placeholder="Description" style="width: 350px;"><?php echo esc_attr( $value1[$i] ); ?></textarea></td>-->
        <td>
            <?php if($i==0){?>
                <button type="button" id="addchallenge" onclick="add_challenge()" class="acf-button button">Add Row</button>
            <?php }else{?>
                <button type="button" class="acf-button button" id="delchallenge" onclick="del_challenge(<?php echo $i;?>)">Delete Row</button>
            <?php }?>
        </td></tr>

        <?php
    }
    ?>
</table>
<input type="hidden" name="event_challenge_cnt" id="event_challenge_cnt" value="<?php echo count($value);?>"  />
<?php
}
add_action('add_meta_boxes','eventAddchallenge_add_meta_box');

function event_challenge_save( $post_id ) {
 if( ! isset($_POST['event_challenge_meta_box_nonce'])) {
  return;
}
if( ! wp_verify_nonce( $_POST['event_challenge_meta_box_nonce'], 'event_challenge_save') ) {
  return;
}
if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
  return;
}
if( ! current_user_can('edit_post', $post_id)) {
  return;
}
if( ! isset($_POST['event_challenge_field'])) {
  return;
}
$event_link = implode('*****',$_POST['event_challenge_field']);
update_post_meta( $post_id,'_event_challenge_value_key', $event_link );

   //$event_link1 = implode('*****',$_POST['event_challenge1_field']);
   //update_post_meta( $post_id,'_event_challenge1_value_key', $event_link1 );
}
add_action('save_post','event_challenge_save');
//add challenge in career post type end

//add workplace in entrance_exam post type
function eventAddworkplace_add_meta_box() {
 add_meta_box('event_workplace','Where can I work?<br><p class="description">Note: Add max 8 records for one sector</p>','event_workplace_callback','career');
}

function event_workplace_callback( $post ) {

 wp_nonce_field('event_workplace_save','event_workplace_meta_box_nonce');
 $value = get_post_meta($post->ID,'_event_workplace_value_key',true);
 $value2 = get_post_meta($post->ID,'_event_workplaceuniv_value_key',true);
 $value = explode('*****',$value);
 $value2 = explode('*****',$value2);
 ?>
 <table id="addRows_workplace">
     <?php
     for($i=0;$i<count($value);$i++)
     {
         ?>

         <tr id="addRows_workplace_<?php echo $i;?>"><td>
            <input  type="text" name="event_workplace_field[]" id="event_workplace_field" value="<?php echo esc_attr( $value[$i] ); ?>" size="30" placeholder="work place" /></td><td>
                <select  type="text" name="event_workplaceuniv_field[]" id="event_workplaceuniv_field"  placeholder="Place" />
                <option value="">-Select Sector-</option>
                <option value="Government" <?php if(esc_attr( $value2[$i] )=='Government') echo 'selected';?>>Government</option>
                <option value="Corporate / Private" <?php if(esc_attr( $value2[$i] )=='Corporate / Private') echo 'selected';?>>Corporate / Private</option>
                <option value="Startup" <?php if(esc_attr( $value2[$i] )=='Startup') echo 'selected';?>>Startup</option>
                <option value="Self-Employed" <?php if(esc_attr( $value2[$i] )=='Self-Employed') echo 'selected';?>>Self-Employed</option>
            </select></td><td>
                <?php if($i==0){?>
                    <button type="button" id="addrows" onclick="add_workplace()" class="acf-button button">Add Row</button>
                <?php }else{?>
                    <button type="button" class="acf-button button" id="delworkplace" onclick="del_workplace(<?php echo $i;?>)">Delete Row</button>
                <?php }?>
            </td></tr>

            <?php
        }
        ?>
    </table>
    <input type="hidden" name="event_workplace_cnt" id="event_workplace_cnt" value="<?php echo count($value);?>"  />
    <?php
}
add_action('add_meta_boxes','eventAddworkplace_add_meta_box');

function event_workplace_save( $post_id ) {
 if( ! isset($_POST['event_workplace_meta_box_nonce'])) {
  return;
}
if( ! wp_verify_nonce( $_POST['event_workplace_meta_box_nonce'], 'event_workplace_save') ) {
  return;
}
if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
  return;
}
if( ! current_user_can('edit_post', $post_id)) {
  return;
}
if( ! isset($_POST['event_workplace_field'])) {
  return;
}
$event_link = implode('*****',$_POST['event_workplace_field']);
update_post_meta( $post_id,'_event_workplace_value_key', $event_link );

$event_link2 = implode('*****',$_POST['event_workplaceuniv_field']);
update_post_meta( $post_id,'_event_workplaceuniv_value_key', $event_link2 );
}
add_action('save_post','event_workplace_save');
//add rows in entrance_exam post type end

// state_about_us type law Custom Post Type
function state_about_us_init() {

    $labels = array(
        'name' => 'State About Us',
        'singular_name' => 'State About Us',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New State About Us',
        'edit_item' => 'Edit State About Us',
        'new_item' => 'New State About Us',
        'all_items' => 'All State About Us',
        'view_item' => 'View State About Us',
        'search_items' => 'Search State About Us',
        'not_found' =>  'No Career State About Us',
        'not_found_in_trash' => 'No State About Us found in Trash', 
        'parent_item_colon' => '',
        'menu_name' => 'State About Us',
    );
    
    // register post type
    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,

        //'publicly_queryable' => false,
        'exclude_from_search' => true,
        'menu_position' => 22, 

        'rewrite' => array('slug' => 'state_about_us'),
        'query_var' => true,
        'menu_icon' => 'dashicons-admin-post',
        //'taxonomies'  => array( 'category' ),
        'supports' => array(
            'title',
            //'editor',
            //'excerpt',
            //'trackbacks',
            'custom-fields',
            //'comments',
            //'revisions',
            //'thumbnail',
            //'author',
            'page-attributes'
        )
    );
    register_post_type( 'state_about_us', $args );
    
   
}
add_action( 'init', 'state_about_us_init' );
// state_about_us Custom Post Type end

//add rows in entrance_exam post type
function eventAddinstitute_add_meta_box() {
 add_meta_box('event_institute','EDUCATION INSTITUTE','event_institute_callback','state_about_us');
}

function event_institute_callback( $post ) {

 wp_nonce_field('event_institute_save','event_institute_meta_box_nonce');
 $value = get_post_meta($post->ID,'_event_institute_value_key',true);
 $value1 = get_post_meta($post->ID,'_event_instituteno_value_key',true);
 $value2 = get_post_meta($post->ID,'_event_institutedesc_value_key',true);
 $value = explode('*****',$value);
 $value1 = explode('*****',$value1);
 $value2 = explode('*****',$value2);
 ?>
 <table id="addinstitute_div" class="acf-table">
     <?php
     for($i=0;$i<count($value);$i++)
     {
         ?>

         <tr id="addinstitute_div_<?php echo $i;?>"><td>
            <input required type="text" name="event_institute_field[]" id="event_institute_field" value="<?php echo esc_attr( $value[$i] ); ?>" size="40" placeholder="Institute Name" /></td><td>
                <input required type="text" name="event_instituteno_field[]" id="event_instituteno_field" value="<?php echo esc_attr( $value1[$i] ); ?>" size="20" placeholder="No of institutes" /></td><td>
                    <textarea required type="text" name="event_institutedesc_field[]" id="event_institutedesc_field"  cols="30" placeholder="Description" ><?php echo esc_attr( $value2[$i] ); ?></textarea></td><td>
                        <?php if($i==0){?>
                            <button type="button" id="addinstitute" onclick="add_institute()" class="acf-button button">Add Row</button>
                        <?php }else{?>
                            <button type="button" class="acf-button button" id="delinstitute" onclick="del_institute(<?php echo $i;?>)">Delete Row</button>
                        <?php }?>
                    </td></tr>

                    <?php
                }
                ?>
            </table>
            <input type="hidden" name="event_institute_cnt" id="event_institute_cnt" value="<?php echo count($value);?>"  />
            <?php
        }
        add_action('add_meta_boxes','eventAddinstitute_add_meta_box');

        function event_institute_save( $post_id ) {
         if( ! isset($_POST['event_institute_meta_box_nonce'])) {
          return;
      }
      if( ! wp_verify_nonce( $_POST['event_institute_meta_box_nonce'], 'event_institute_save') ) {
          return;
      }
      if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
          return;
      }
      if( ! current_user_can('edit_post', $post_id)) {
          return;
      }
      if( ! isset($_POST['event_institute_field'])) {
          return;
      }
      $event_link = implode('*****',$_POST['event_institute_field']);
      update_post_meta( $post_id,'_event_institute_value_key', $event_link );

      $event_link1 = implode('*****',$_POST['event_instituteno_field']);
      update_post_meta( $post_id,'_event_instituteno_value_key', $event_link1 );

      $event_link2 = implode('*****',$_POST['event_institutedesc_field']);
      update_post_meta( $post_id,'_event_institutedesc_value_key', $event_link2 );
  }
  add_action('save_post','event_institute_save');
//add rows in entrance_exam post type end

// horticulture type law Custom Post Type
  function horticulture_init() {

    $labels = array(
        'name' => 'Horticulture',
        'singular_name' => 'Horticulture',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New Horticulture',
        'edit_item' => 'Edit Horticulture',
        'new_item' => 'New Horticulture',
        'all_items' => 'All Horticulture',
        'view_item' => 'View Horticulture',
        'search_items' => 'Search Horticulture',
        'not_found' =>  'No Horticulture',
        'not_found_in_trash' => 'No Horticulture found in Trash', 
        'parent_item_colon' => '',
        'menu_name' => 'Horticulture',
    );
    
    // register post type
    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,

        //'publicly_queryable' => false,
        'exclude_from_search' => true,
        'menu_position' => 22, 

        'rewrite' => array('slug' => 'horticulture'),
        'query_var' => true,
        'menu_icon' => 'dashicons-admin-post',
        //'taxonomies'  => array( 'category' ),
        'supports' => array(
            'title',
            'editor',
            //'excerpt',
            //'trackbacks',
            'custom-fields',
            //'comments',
            //'revisions',
            //'thumbnail',
            //'author',
            'page-attributes'
        )
    );
    register_post_type( 'horticulture', $args );
    
    
}
add_action( 'init', 'horticulture_init' );
// horticulture Custom Post Type end


// animal_husbandry Custom Post Type
function animal_husbandry_init() {

    $labels = array(
        'name' => 'Animal Husbandry',
        'singular_name' => 'Animal Husbandry',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New Animal Husbandry',
        'edit_item' => 'Edit Animal Husbandry',
        'new_item' => 'New Animal Husbandry',
        'all_items' => 'All Animal Husbandry',
        'view_item' => 'View Animal Husbandry',
        'search_items' => 'Search Animal Husbandry',
        'not_found' =>  'No Animal Husbandry',
        'not_found_in_trash' => 'No Animal Husbandry found in Trash', 
        'parent_item_colon' => '',
        'menu_name' => 'Animal Husbandry',
    );
    
    // register post type
    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,

        //'publicly_queryable' => false,
        'exclude_from_search' => true,
        'menu_position' => 22, 

        'rewrite' => array('slug' => 'animal_husbandry'),
        'query_var' => true,
        'menu_icon' => 'dashicons-admin-post',
        //'taxonomies'  => array( 'category' ),
        'supports' => array(
            'title',
            'editor',
            //'excerpt',
            //'trackbacks',
            'custom-fields',
            //'comments',
            //'revisions',
            //'thumbnail',
            //'author',
            'page-attributes'
        )
    );
    register_post_type( 'animal_husbandry', $args );
    
    
}
add_action( 'init', 'animal_husbandry_init' );
// animal_husbandry Custom Post Type end

// map Custom Post Type
function map_init() {

    $labels = array(
        'name' => 'Map',
        'singular_name' => 'Map',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New Map',
        'edit_item' => 'Edit Map',
        'new_item' => 'New Map',
        'all_items' => 'All Map',
        'view_item' => 'View Map',
        'search_items' => 'Search Map',
        'not_found' =>  'No Map',
        'not_found_in_trash' => 'No Map found in Trash', 
        'parent_item_colon' => '',
        'menu_name' => 'Map',
    );
    
    // register post type
    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,

        //'publicly_queryable' => false,
        'exclude_from_search' => true,
        'menu_position' => 22, 

        'rewrite' => array('slug' => 'map'),
        'query_var' => true,
        'menu_icon' => 'dashicons-admin-post',
        //'taxonomies'  => array( 'category' ),
        'supports' => array(
            'title',
            'editor',
            //'excerpt',
            //'trackbacks',
            'custom-fields',
            //'comments',
            //'revisions',
            //'thumbnail',
            //'author',
            'page-attributes'
        )
    );
    register_post_type( 'map', $args );
    
    
}
add_action( 'init', 'map_init' );
// map Custom Post Type end

// Nursery Custom Post Type
function nursery_init() {

    $labels = array(
        'name' => 'Nursery',
        'singular_name' => 'Nursery',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New Nursery',
        'edit_item' => 'Edit Nursery',
        'new_item' => 'New Nursery',
        'all_items' => 'All Nursery',
        'view_item' => 'View Nursery',
        'search_items' => 'Search Nursery',
        'not_found' =>  'No Nursery',
        'not_found_in_trash' => 'No Nursery found in Trash', 
        'parent_item_colon' => '',
        'menu_name' => 'Nursery',
    );
    
    // register post type
    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,

        //'publicly_queryable' => false,
        'exclude_from_search' => true,
        'menu_position' => 22, 

        'rewrite' => array('slug' => 'nursery'),
        'query_var' => true,
        'menu_icon' => 'dashicons-admin-post',
        //'taxonomies'  => array( 'category' ),
        'supports' => array(
            'title',
            'editor',
            //'excerpt',
            //'trackbacks',
            'custom-fields',
            //'comments',
            //'revisions',
            //'thumbnail',
            //'author',
            'page-attributes'
        )
    );
    register_post_type( 'nursery', $args );
    
    
}
add_action( 'init', 'nursery_init' );
// Nursery Custom Post Type end

// aquaculture Custom Post Type
function aquaculture_init() {

    $labels = array(
        'name' => 'Aquaculture',
        'singular_name' => 'Aquaculture',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New Aquaculture',
        'edit_item' => 'Edit Aquaculture',
        'new_item' => 'New Aquaculture',
        'all_items' => 'All Aquaculture',
        'view_item' => 'View Aquaculture',
        'search_items' => 'Search Aquaculture',
        'not_found' =>  'No Aquaculture',
        'not_found_in_trash' => 'No Aquaculture found in Trash', 
        'parent_item_colon' => '',
        'menu_name' => 'Aquaculture',
    );
    
    // register post type
    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,

        //'publicly_queryable' => false,
        'exclude_from_search' => true,
        'menu_position' => 22, 

        'rewrite' => array('slug' => 'aquaculture'),
        'query_var' => true,
        'menu_icon' => 'dashicons-admin-post',
        //'taxonomies'  => array( 'category' ),
        'supports' => array(
            'title',
            'editor',
            //'excerpt',
            //'trackbacks',
            'custom-fields',
            //'comments',
            //'revisions',
            //'thumbnail',
            //'author',
            'page-attributes'
        )
    );
    register_post_type( 'aquaculture', $args );
    
    
}
add_action( 'init', 'aquaculture_init' );
// aquaculture Custom Post Type end

// aquaculture Custom Post Type
function sericulture_init() {

    $labels = array(
        'name' => 'Sericulture',
        'singular_name' => 'Sericulture',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New Sericulture',
        'edit_item' => 'Edit Sericulture',
        'new_item' => 'New Sericulture',
        'all_items' => 'All Sericulture',
        'view_item' => 'View Sericulture',
        'search_items' => 'Search Sericulture',
        'not_found' =>  'No Sericulture',
        'not_found_in_trash' => 'No Sericulture found in Trash', 
        'parent_item_colon' => '',
        'menu_name' => 'Sericulture',
    );
    
    // register post type
    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,

        //'publicly_queryable' => false,
        'exclude_from_search' => true,
        'menu_position' => 22, 

        'rewrite' => array('slug' => 'sericulture'),
        'query_var' => true,
        'menu_icon' => 'dashicons-admin-post',
        //'taxonomies'  => array( 'category' ),
        'supports' => array(
            'title',
            'editor',
            //'excerpt',
            //'trackbacks',
            'custom-fields',
            //'comments',
            //'revisions',
            //'thumbnail',
            //'author',
            'page-attributes'
        )
    );
    register_post_type( 'sericulture', $args );
    
    
}
add_action( 'init', 'sericulture_init' );
// aquaculture Custom Post Type end

//==================================
//faq custom post type
//===================================
function faq_init() {

    $labels = array(
        'name' => 'FAQ',
        'singular_name' => 'FAQ',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New FAQ',
        'edit_item' => 'Edit FAQ',
        'new_item' => 'New FAQ',
        'all_items' => 'All FAQ',
        'view_item' => 'View FAQ',
        'search_items' => 'Search FAQ',
        'not_found' =>  'No FAQ',
        'not_found_in_trash' => 'No FAQ found in Trash', 
        'parent_item_colon' => '',
        'menu_name' => 'FAQ',
    );
    
    // register post type
    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,

        //'publicly_queryable' => false,
        'exclude_from_search' => true,
        'menu_position' => 22, 

        'rewrite' => array('slug' => 'faq'),
        'query_var' => true,
        'menu_icon' => 'dashicons-admin-post',
        //'taxonomies'  => array( 'category' ),
        'supports' => array(
            'title',
            'editor',
            //'excerpt',
            //'trackbacks',
            'custom-fields',
            //'comments',
            //'revisions',
            //'thumbnail',
            //'author',
            //'page-attributes'
        )
    );
    register_post_type( 'faq', $args );
    
    
}
add_action( 'init', 'faq_init' );
// faq Custom Post Type end

//==================================
//new_and_event custom post type
//===================================
function new_and_event_init() {

    $labels = array(
        'name' => 'Events & Competition',
        'singular_name' => 'Events & Competition',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New Events & Competition',
        'edit_item' => 'Edit Events & Competition',
        'new_item' => 'New Events & Competition',
        'all_items' => 'All Events & Competition',
        'view_item' => 'View Events & Competition',
        'search_items' => 'Search Events & Competition',
        'not_found' =>  'No Events & Competition',
        'not_found_in_trash' => 'No Events & Competition found in Trash', 
        'parent_item_colon' => '',
        'menu_name' => 'Events & Competition',
    );
    
    // register post type
    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,

        //'publicly_queryable' => false,
        'exclude_from_search' => true,
        'menu_position' => 22, 

        'rewrite' => array('slug' => 'new_and_event'),
        'query_var' => true,
        'menu_icon' => 'dashicons-admin-post',
        //'taxonomies'  => array( 'category' ),
        'supports' => array(
            'title',
            //'editor',
            //'excerpt',
            //'trackbacks',
            'custom-fields',
            //'comments',
            //'revisions',
            //'thumbnail',
            //'author',
            //'page-attributes'
        )
    );
    register_post_type( 'new_and_event', $args );
    
    
}
add_action( 'init', 'new_and_event_init' );
// new_and_event Custom Post Type end

//==================================
//notice custom post type
//===================================
function notice_init() {

    $labels = array(
        'name' => 'Notices',
        'singular_name' => 'Notices',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New Notice',
        'edit_item' => 'Edit Notice',
        'new_item' => 'New Notice',
        'all_items' => 'All Notices',
        'view_item' => 'View Notice',
        'search_items' => 'Search Notices',
        'not_found' =>  'No Notice',
        'not_found_in_trash' => 'No Notice found in Trash', 
        'parent_item_colon' => '',
        'menu_name' => 'Notices',
    );
    
    // register post type
    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,

        //'publicly_queryable' => false,
        'exclude_from_search' => true,
        'menu_position' => 22, 

        'rewrite' => array('slug' => 'notice'),
        'query_var' => true,
        'menu_icon' => 'dashicons-admin-post',
        //'taxonomies'  => array( 'category' ),
        'supports' => array(
            'title',
            //'editor',
            //'excerpt',
            //'trackbacks',
            'custom-fields',
            //'comments',
            //'revisions',
            //'thumbnail',
            //'author',
            //'page-attributes'
        )
    );
    register_post_type( 'notice', $args );
    
    
}
add_action( 'init', 'notice_init' );
// new_and_event Custom Post Type end

//==================================
//find an intern custom post type
//===================================
/*function find_an_intern_init() {
    
    $labels = array(
        'name' => 'Find an Intern',
        'singular_name' => 'Find an Intern',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New Find an Intern',
        'edit_item' => 'Edit Find an Intern',
        'new_item' => 'New Find an Intern',
        'all_items' => 'All Find an Intern',
        'view_item' => 'View Find an Intern',
        'search_items' => 'Search Find an Intern',
        'not_found' =>  'No Find an Intern',
        'not_found_in_trash' => 'No Find an Intern found in Trash', 
        'parent_item_colon' => '',
        'menu_name' => 'Find an Intern',
    );
    
    // register post type
    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,

        //'publicly_queryable' => false,
        'exclude_from_search' => true,
        'menu_position' => 22, 

        'rewrite' => array('slug' => 'find_an_intern'),
        'query_var' => true,
        'menu_icon' => 'dashicons-admin-post',
        //'taxonomies'  => array( 'category' ),
        'supports' => array(
            'title',
            //'editor',
            //'excerpt',
            //'trackbacks',
            'custom-fields',
            //'comments',
            //'revisions',
            //'thumbnail',
            //'author',
            //'page-attributes'
        )
    );
    register_post_type( 'find_an_intern', $args );
    
    
}
add_action( 'init', 'find_an_intern_init' );
// new_and_event Custom Post Type end*/

//==================================
//training custom post type
//===================================
function training_init() {

    $labels = array(
        'name' => 'Training',
        'singular_name' => 'Training',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New Training',
        'edit_item' => 'Edit Training',
        'new_item' => 'New Training',
        'all_items' => 'All Training',
        'view_item' => 'View Training',
        'search_items' => 'Search Training',
        'not_found' =>  'No Training',
        'not_found_in_trash' => 'No Training found in Trash', 
        'parent_item_colon' => '',
        'menu_name' => 'Training',
    );
    
    // register post type
    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,

        //'publicly_queryable' => false,
        'exclude_from_search' => true,
        'menu_position' => 22, 

        'rewrite' => array('slug' => 'training'),
        'query_var' => true,
        'menu_icon' => 'dashicons-admin-post',
        //'taxonomies'  => array( 'category' ),
        'supports' => array(
            'title',
            //'editor',
            //'excerpt',
            //'trackbacks',
            'custom-fields',
            //'comments',
            //'revisions',
            //'thumbnail',
            //'author',
            //'page-attributes'
        )
    );
    register_post_type( 'training', $args );
    
    
}
add_action( 'init', 'training_init' );
// training Custom Post Type end

//==================================
//upskills custom post type
//===================================
function upskills_init() {

    $labels = array(
        'name' => 'Upskills',
        'singular_name' => 'Upskills',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New Upskills',
        'edit_item' => 'Edit Upskills',
        'new_item' => 'New Upskills',
        'all_items' => 'All Upskills',
        'view_item' => 'View Upskills',
        'search_items' => 'Search Upskills',
        'not_found' =>  'No Upskills',
        'not_found_in_trash' => 'No Upskills found in Trash', 
        'parent_item_colon' => '',
        'menu_name' => 'Upskills',
    );
    
    // register post type
    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,

        //'publicly_queryable' => false,
        'exclude_from_search' => true,
        'menu_position' => 22, 

        'rewrite' => array('slug' => 'upskills'),
        'query_var' => true,
        'menu_icon' => 'dashicons-admin-post',
        //'taxonomies'  => array( 'category' ),
        'supports' => array(
            'title',
            //'editor',
            //'excerpt',
            //'trackbacks',
            'custom-fields',
            //'comments',
            //'revisions',
            //'thumbnail',
            //'author',
            //'page-attributes'
        )
    );
    register_post_type( 'upskills', $args );
    
   
}
add_action( 'init', 'upskills_init' );
// upskills Custom Post Type end



//==================================
//Apps and Journals custom post type
//===================================
function apps_and_journals_init() {

    $labels = array(
        'name' => 'Apps and Journals',
        'singular_name' => 'Apps and Journals',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New Apps and Journals',
        'edit_item' => 'Edit Apps and Journals',
        'new_item' => 'New Apps and Journals',
        'all_items' => 'All Apps and Journals',
        'view_item' => 'View Apps and Journals',
        'search_items' => 'Search Apps and Journals',
        'not_found' =>  'No Apps and Journals',
        'not_found_in_trash' => 'No Apps and Journals found in Trash', 
        'parent_item_colon' => '',
        'menu_name' => 'Apps and Journals',
    );
    
    // register post type
    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,

        //'publicly_queryable' => false,
        'exclude_from_search' => true,
        'menu_position' => 22, 

        'rewrite' => array('slug' => 'apps_and_journals'),
        'query_var' => true,
        'menu_icon' => 'dashicons-admin-post',
        //'taxonomies'  => array( 'category' ),
        'supports' => array(
            'title',
            //'editor',
            //'excerpt',
            //'trackbacks',
            'custom-fields',
            //'comments',
            //'revisions',
            //'thumbnail',
            //'author',
            //'page-attributes'
        )
    );
    register_post_type( 'apps_and_journals', $args );
    
    
}
add_action( 'init', 'apps_and_journals_init' );
// apps_and_journals Custom Post Type end

//==================================
//Mentors & Incubators custom post type
//===================================
function mentors_and_incub_init() {

    $labels = array(
        'name' => 'Mentors & Incubators',
        'singular_name' => 'Mentors & Incubators',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New Mentors & Incubators',
        'edit_item' => 'Edit Mentors & Incubators',
        'new_item' => 'New Mentors & Incubators',
        'all_items' => 'All Mentors & Incubators',
        'view_item' => 'View Mentors & Incubators',
        'search_items' => 'Search Mentors & Incubators',
        'not_found' =>  'No Mentors & Incubators',
        'not_found_in_trash' => 'No Mentors & Incubators found in Trash', 
        'parent_item_colon' => '',
        'menu_name' => 'Mentors & Incubators',
    );
    
    // register post type
    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,

        //'publicly_queryable' => false,
        'exclude_from_search' => true,
        'menu_position' => 23, 

        'rewrite' => array('slug' => 'mentors_and_incub'),
        'query_var' => true,
        'menu_icon' => 'dashicons-admin-post',
        //'taxonomies'  => array( 'category' ),
        'supports' => array(
            'title',
            //'editor',
            //'excerpt',
            //'trackbacks',
            'custom-fields',
            //'comments',
            //'revisions',
            //'thumbnail',
            //'author',
            //'page-attributes'
        )
    );
    register_post_type( 'mentors_and_incub', $args );
    
    
}
add_action( 'init', 'mentors_and_incub_init' );
// apps_and_journals Custom Post Type end

//==================================
//emp_entrance_exam custom post type
//===================================
function emp_entrance_exam_init() {

    $labels = array(
        'name' => 'Employment Entrance Exam',
        'singular_name' => 'Emp Entrance Exam',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New Employment Entrance Exam',
        'edit_item' => 'Edit Employment Entrance Exam',
        'new_item' => 'New Employment Entrance Exam',
        'all_items' => 'All Employment Entrance Exam',
        'view_item' => 'View Employment Entrance Exam',
        'search_items' => 'Search Employment Entrance Exam',
        'not_found' =>  'No Employment Entrance Exam',
        'not_found_in_trash' => 'No Employment Entrance Exam found in Trash', 
        'parent_item_colon' => '',
        'menu_name' => 'Employment Entrance Exam',
    );
    
    // register post type
    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,

        //'publicly_queryable' => false,
        'exclude_from_search' => true,
        'menu_position' => 23, 

        'rewrite' => array('slug' => 'emp_entrance_exam'),
        'query_var' => true,
        'menu_icon' => 'dashicons-admin-post',
        //'taxonomies'  => array( 'category' ),
        'supports' => array(
            'title',
            //'editor',
            //'excerpt',
            //'trackbacks',
            'custom-fields',
            //'comments',
            //'revisions',
            //'thumbnail',
            //'author',
            //'page-attributes'
        )
    );
    register_post_type( 'emp_entrance_exam', $args );
    
    
}
add_action( 'init', 'emp_entrance_exam_init' );
// apps_and_journals Custom Post Type end


//add rows in entrance_exam post type
function eventAddrow_new_add_meta_box() {
   //add_meta_box('event_rows','Key Elements/Skills Evaluated in the exam','event_new_rows_callback','emp_entrance_exam');


    $screens = array( 'emp_entrance_exam', 'entrance_exam' ); //

    foreach ( $screens as $screen ) {

      if($screen=='emp_entrance_exam') $labels = 'Key Elements Evaluated';
      else $labels='Key Elements/Skills Evaluated in the exam';


      add_meta_box(
        'event_rowsx',
        $labels,
        'event_new_rows_callback',
        $screen
    );
  }
}

function event_new_rows_callback( $post ) {

 wp_nonce_field('event_new_rows_save','event_rows_meta_box_nonce');
 $value = get_post_meta($post->ID,'_event_rows_value_key',true);
 $value1 = get_post_meta($post->ID,'_event_rows1_value_key',true);
 $value = explode('*****',$value);
 $value1 = explode('*****',$value1);
 ?>
 <table id="addRows_div" class="acf-table">
     <?php
     for($i=0;$i<count($value);$i++)
     {
         ?>

         <tr id="addRows_div_<?php echo $i;?>"><td>
            <input required type="text" name="event_rows_field[]" id="event_rows_field" value="<?php echo esc_attr( $value[$i] ); ?>" size="45" placeholder="Subject" /></td><td>
                <input required type="text" name="event_rows1_field[]" id="event_rows1_field" value="<?php echo esc_attr( $value1[$i] ); ?>" size="50" placeholder="Weightage" /></td><td>
                    <?php if($i==0){?>
                        <button type="button" id="addrows" onclick="add_rows()" class="acf-button button">Add Row</button>
                    <?php }else{?>
                        <button type="button" class="acf-button button" id="delrows" onclick="del_rows(<?php echo $i;?>)">Delete Row</button>
                    <?php }?>
                </td></tr>

                <?php
            }
            ?>
        </table>
        <input type="hidden" name="event_rows_cnt" id="event_rows_cnt" value="<?php echo count($value);?>"  />
        <?php
    }
    add_action('add_meta_boxes','eventAddrow_new_add_meta_box');

    function event_new_rows_save( $post_id ) {
     if( ! isset($_POST['event_rows_meta_box_nonce'])) {
      return;
  }
  if( ! wp_verify_nonce( $_POST['event_rows_meta_box_nonce'], 'event_new_rows_save') ) {
      return;
  }
  if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
      return;
  }
  if( ! current_user_can('edit_post', $post_id)) {
      return;
  }
  if( ! isset($_POST['event_rows_field'])) {
      return;
  }
  $event_link = implode('*****',$_POST['event_rows_field']);
  update_post_meta( $post_id,'_event_rows_value_key', $event_link );

  $event_link1 = implode('*****',$_POST['event_rows1_field']);
  update_post_meta( $post_id,'_event_rows1_value_key', $event_link1 );
}
add_action('save_post','event_new_rows_save');
//add rows in entrance_exam post type end


//==================================
//Employable Skills custom post type
//===================================
function employable_skills_init() {

    $labels = array(
        'name' => 'Employable Skills',
        'singular_name' => 'Employable Skills',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New Employable Skills',
        'edit_item' => 'Edit Employable Skills',
        'new_item' => 'New Employable Skills',
        'all_items' => 'All Employable Skills',
        'view_item' => 'View Employable Skills',
        'search_items' => 'Search Employable Skills',
        'not_found' =>  'No Employable Skills',
        'not_found_in_trash' => 'No Employable Skills found in Trash', 
        'parent_item_colon' => '',
        'menu_name' => 'Employable Skills',
    );
    
    // register post type
    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,

        //'publicly_queryable' => false,
        'exclude_from_search' => true,
        'menu_position' => 23, 

        'rewrite' => array('slug' => 'employable_skills'),
        'query_var' => true,
        'menu_icon' => 'dashicons-admin-post',
        //'taxonomies'  => array( 'category' ),
        'supports' => array(
            'title',
            //'editor',
            //'excerpt',
            //'trackbacks',
            'custom-fields',
            //'comments',
            //'revisions',
            //'thumbnail',
            //'author',
            //'page-attributes'
        )
    );
    register_post_type( 'employable_skills', $args );
    
    
}
add_action( 'init', 'employable_skills_init' );
// apps_and_journals Custom Post Type end

//==================================
//Job Alert custom post type
//===================================
function job_alert_init() {

    $labels = array(
        'name' => 'Job Alert',
        'singular_name' => 'Job Alert',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New Job Alert',
        'edit_item' => 'Edit Job Alert',
        'new_item' => 'New Job Alert',
        'all_items' => 'All Job Alert',
        'view_item' => 'View Job Alert',
        'search_items' => 'Search Job Alert',
        'not_found' =>  'No Job Alert',
        'not_found_in_trash' => 'No Job Alert found in Trash', 
        'parent_item_colon' => '',
        'menu_name' => 'Job Alert',
    );
    
    // register post type
    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,

        //'publicly_queryable' => false,
        'exclude_from_search' => true,
        'menu_position' => 23, 

        'rewrite' => array('slug' => 'job_alert'),
        'query_var' => true,
        'menu_icon' => 'dashicons-admin-post',
        //'taxonomies'  => array( 'category' ),
        'supports' => array(
            'title',
            //'editor',
            //'excerpt',
            //'trackbacks',
            'custom-fields',
            //'comments',
            //'revisions',
            //'thumbnail',
            //'author',
            //'page-attributes'
        )
    );
    register_post_type( 'job_alert', $args );
    
    
}
add_action( 'init', 'job_alert_init' );
// apps_and_journals Custom Post Type end

//==================================
//Job Opportunities custom post type
//===================================
function job_Opportunities_init() {

    $labels = array(
        'name' => 'Job Opportunities',
        'singular_name' => 'Job Opportunities',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New Job Opportunities',
        'edit_item' => 'Edit Job Opportunities',
        'new_item' => 'New Job Opportunities',
        'all_items' => 'All Job Opportunities',
        'view_item' => 'View Job Opportunities',
        'search_items' => 'Search Job Opportunities',
        'not_found' =>  'No Job Opportunities',
        'not_found_in_trash' => 'No Job Opportunities found in Trash', 
        'parent_item_colon' => '',
        'menu_name' => 'Job Opportunities',
    );
    
    // register post type
    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,

        //'publicly_queryable' => false,
        'exclude_from_search' => true,
        'menu_position' => 23, 

        'rewrite' => array('slug' => 'job_Opportunities'),
        'query_var' => true,
        'menu_icon' => 'dashicons-admin-post',
        //'taxonomies'  => array( 'category' ),
        'supports' => array(
            'title',
            //'editor',
            //'excerpt',
            //'trackbacks',
            'custom-fields',
            //'comments',
            //'revisions',
            //'thumbnail',
            //'author',
            //'page-attributes'
        )
    );
    register_post_type( 'job_Opportunities', $args );
    
    
}
add_action( 'init', 'job_Opportunities_init' );
// apps_and_journals Custom Post Type end

//add colleges in entrance_exam post type
function eventAddcollege_add_meta_box() {
 add_meta_box('event_college','Major Recruiter','event_college_callback','job_Opportunities');
}

function event_college_callback( $post ) {

 wp_nonce_field('event_college_save','event_college_meta_box_nonce');
 $value = get_post_meta($post->ID,'_event_recruiter_value_key',true);
 $value1 = get_post_meta($post->ID,'_event_recruitername_value_key',true);
 $value2 = get_post_meta($post->ID,'_event_recruitersector_value_key',true);
 $value = explode('*****',$value);
 $value1 = explode('*****',$value1);
 $value2 = explode('*****',$value2);
 ?>
 <table id="addRows_college" class="acf-table">
     <?php
     for($i=0;$i<count($value);$i++)
     {
         ?>

         <tr id="addRows_college_<?php echo $i;?>"><td>
            <input required type="text" name="event_college_field[]" id="event_college_field" value="<?php echo esc_attr( $value[$i] ); ?>" size="30" placeholder="Sector Name" /></td><td>
                <input required type="text" name="event_collegedesc_field[]" id="event_collegedesc_field" value="<?php echo esc_attr( $value1[$i] ); ?>" size="50" placeholder="Recruiters Name" /></td><td>
                    <select required type="text" name="event_collegeuniv_field[]" id="event_collegeuniv_field"  placeholder="University" style="display: none;">
                    <option value="Private Sector" <?php if(esc_attr( $value2[$i] )=='Private Sector') echo 'selected';?>>Private Sector</option>
                    <option value="Government Sector" <?php if(esc_attr( $value2[$i] )=='Government Sector') echo 'selected';?>>Government Sector</option>
                </select></td><td>
                    <?php if($i==0){?>
                        <button type="button" id="addrows" onclick="add_college()" class="acf-button button">Add Row</button>
                    <?php }else{?>
                        <button type="button" class="acf-button button" id="delcollege" onclick="del_college(<?php echo $i;?>)">Delete Row</button>
                    <?php }?>
                </td></tr>

                <?php
            }
            ?>
        </table>
        <input type="hidden" name="event_college_cnt" id="event_college_cnt" value="<?php echo count($value);?>"  />
        <?php
    }
    add_action('add_meta_boxes','eventAddcollege_add_meta_box');

    function event_college_save( $post_id ) {
     if( ! isset($_POST['event_college_meta_box_nonce'])) {
      return;
  }
  if( ! wp_verify_nonce( $_POST['event_college_meta_box_nonce'], 'event_college_save') ) {
      return;
  }
  if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
      return;
  }
  if( ! current_user_can('edit_post', $post_id)) {
      return;
  }
  if( ! isset($_POST['event_college_field'])) {
      return;
  }
  $event_link = implode('*****',$_POST['event_college_field']);
  update_post_meta( $post_id,'_event_recruiter_value_key', $event_link );

  $event_link1 = implode('*****',$_POST['event_collegedesc_field']);
  update_post_meta( $post_id,'_event_recruitername_value_key', $event_link1 );

  $event_link2 = implode('*****',$_POST['event_collegeuniv_field']);
  update_post_meta( $post_id,'_event_recruitersector_value_key', $event_link2 );
}
add_action('save_post','event_college_save');
//add rows in entrance_exam post type end


//==================================
//learn_and_earn custom post type
//===================================
function learn_and_earn_init() {

    $labels = array(
        'name' => 'Learn & Earn',
        'singular_name' => 'Learn & Earn',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New Learn & Earn',
        'edit_item' => 'Edit Learn & Earn',
        'new_item' => 'New Learn & Earn',
        'all_items' => 'All Learn & Earn',
        'view_item' => 'View Learn & Earn',
        'search_items' => 'Search Learn & Earn',
        'not_found' =>  'No Learn & Earn',
        'not_found_in_trash' => 'No Learn & Earn found in Trash', 
        'parent_item_colon' => '',
        'menu_name' => 'Learn & Earn',
    );
    
    // register post type
    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,

        //'publicly_queryable' => false,
        'exclude_from_search' => true,
        'menu_position' => 23, 

        'rewrite' => array('slug' => 'learn_and_earn'),
        'query_var' => true,
        'menu_icon' => 'dashicons-admin-post',
        //'taxonomies'  => array( 'category' ),
        'supports' => array(
            'title',
            //'editor',
            //'excerpt',
            //'trackbacks',
            'custom-fields',
            //'comments',
            //'revisions',
            //'thumbnail',
            //'author',
            //'page-attributes'
        )
    );
    register_post_type( 'learn_and_earn', $args );
    
    
}
add_action( 'init', 'learn_and_earn_init' );
// apps_and_journals Custom Post Type end

//======
//success_stories Custom Post Type
//======
function success_stories_init() {

    $labels = array(
        'name' => 'Success Stories',
        'singular_name' => 'Success Stories',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New Success Stories',
        'edit_item' => 'Edit Success Stories',
        'new_item' => 'New Success Stories',
        'all_items' => 'All Success Stories',
        'view_item' => 'View Success Stories',
        'search_items' => 'Search Success Stories',
        'not_found' =>  'No Success Stories',
        'not_found_in_trash' => 'No Success Stories found in Trash', 
        'parent_item_colon' => '',
        'menu_name' => 'Success Stories',
    );
    
    // register post type
    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,

        //'publicly_queryable' => false,
        'exclude_from_search' => true,
        'menu_position' => 22, 

        'rewrite' => array('slug' => 'success_stories'),
        'query_var' => true,
        'menu_icon' => 'dashicons-admin-post',
        //'taxonomies'  => array( 'category' ),
        'supports' => array(
            'title',
            //'editor',
            //'excerpt',
            //'trackbacks',
            'custom-fields',
            //'comments',
            //'revisions',
            //'thumbnail',
            //'author',
            //'page-attributes'
        )
    );
    register_post_type( 'success_stories', $args );
    
    
}
add_action( 'init', 'success_stories_init' );
//======
//success_stories Custom Post Type end
//======

//add related career in entrance_exam post type
function eventAddcareer_add_meta_box() {
   //add_meta_box('event_career','Training Institute','event_career_callback','horticulture');

  $screens = array( 'horticulture', 'animal_husbandry', 'map','aquaculture','sericulture','horticulture_int','polyculture','adventure_tourism' ); //,'tourism_adventure'

  foreach ( $screens as $screen ) {
    add_meta_box(
        'event_career',
        'Training Institute',
        'event_career_callback',
        $screen
    );
}
}

function event_career_callback( $post ) {

 wp_nonce_field('event_career_save','event_institute_meta_box_nonce');
 $value = get_post_meta($post->ID,'_event_institute_value_key',true);
 $value1 = get_post_meta($post->ID,'_event_institute_link_key',true);

 $value = explode('*****',$value);
 $value1 = explode('*****',$value1);
 ?>
 <table id="addRows_div_career" class="acf-table">
     <?php
     for($i=0;$i<count($value);$i++)
     {
         ?>

         <tr id="addRows_career_<?php echo $i;?>"><td>
            <input required type="text" name="event_career_field[]" id="event_career_field" value="<?php echo esc_attr( $value[$i] ); ?>" size="45" placeholder="Institute Name" /></td><td>
                <input required type="url" name="event_career_link[]" id="event_career_link" value="<?php echo esc_attr( $value1[$i] ); ?>" size="50" placeholder="Institute URL" /> 
            </td><td>
                <?php if($i==0){?>
                    <button type="button" id="addrows_career" onclick="add_rows_career()" class="acf-button button">Add Row</button>
                <?php }else{?>
                    <button type="button" class="acf-button button" id="delrows_career" onclick="del_rows_career(<?php echo $i;?>)">Delete Row</button>
                <?php }?>
            </td></tr>

            <?php
        }
        ?>
    </table>
    <input type="hidden" name="event_career_cnt" id="event_career_cnt" value="<?php echo count($value);?>"  />
    <?php
}
add_action('add_meta_boxes','eventAddcareer_add_meta_box');

function event_career_save( $post_id ) {
 if( ! isset($_POST['event_institute_meta_box_nonce'])) {
  return;
}
if( ! wp_verify_nonce( $_POST['event_institute_meta_box_nonce'], 'event_career_save') ) {
  return;
}
if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
  return;
}
if( ! current_user_can('edit_post', $post_id)) {
  return;
}
if( ! isset($_POST['event_career_field'])) {
  return;
}
$event_link = implode('*****',$_POST['event_career_field']);
update_post_meta( $post_id,'_event_institute_value_key', $event_link );

$event_link1 = implode('*****',$_POST['event_career_link']);
update_post_meta( $post_id,'_event_institute_link_key', $event_link1 );
}
add_action('save_post','event_career_save');
//add related career in entrance_exam post type end


//add rows in entrance_exam post type
function eventAddrowgov_add_meta_box() {

  $screens = array( 'horticulture', 'animal_husbandry', 'map','aquaculture','sericulture','entrance_exam' ,'polyculture','adventure_tourism'); //,'tourism_adventure'

  foreach ( $screens as $screen ) {

      if($screen=='entrance_exam') 
          $labels='Institutes you must explore with the related exam';
      else $labels='Related Government Schemes';

      add_meta_box(
        'event_rows',
        $labels,
        'event_gov_callback',
        $screen
    );
  }
}

function event_gov_callback( $post ) {

 wp_nonce_field('event_gov_save','event_gov_meta_box_nonce');
 $value = get_post_meta($post->ID,'_event_gov_value_key',true);
 $value1 = get_post_meta($post->ID,'_event_govurl_value_key',true);
 $value = explode('*****',$value);
 $value1 = explode('*****',$value1);
 ?>
 <table id="addgov_div" class="acf-table">
     <?php
     for($i=0;$i<count($value);$i++)
     {
         ?>

         <tr id="addgov_div_<?php echo $i;?>"><td>
            <input required type="text" name="event_gov_field[]" id="event_gov_field" value="<?php echo esc_attr( $value[$i] ); ?>" size="45" placeholder="Title" /></td><td>
                <input required type="url" name="event_gov1_field[]" id="event_gov1_field" value="<?php echo esc_attr( $value1[$i] ); ?>" size="50" placeholder="Url" /></td><td>
                    <?php if($i==0){?>
                        <button type="button" id="addrows" onclick="add_govlink()" class="acf-button button">Add Row</button>
                    <?php }else{?>
                        <button type="button" class="acf-button button" id="delrows" onclick="del_govlink(<?php echo $i;?>)">Delete Row</button>
                    <?php }?>
                </td></tr>

                <?php
            }
            ?>
        </table>
        <input type="hidden" name="event_gov_cnt" id="event_gov_cnt" value="<?php echo count($value);?>"  />
        <?php
    }
    add_action('add_meta_boxes','eventAddrowgov_add_meta_box');

    function event_gov_save( $post_id ) {
     if( ! isset($_POST['event_gov_meta_box_nonce'])) {
      return;
  }
  if( ! wp_verify_nonce( $_POST['event_gov_meta_box_nonce'], 'event_gov_save') ) {
      return;
  }
  if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
      return;
  }
  if( ! current_user_can('edit_post', $post_id)) {
      return;
  }
  if( ! isset($_POST['event_gov_field'])) {
      return;
  }
  $event_link = implode('*****',$_POST['event_gov_field']);
  update_post_meta( $post_id,'_event_gov_value_key', $event_link );

  $event_link1 = implode('*****',$_POST['event_gov1_field']);
  update_post_meta( $post_id,'_event_govurl_value_key', $event_link1 );
}
add_action('save_post','event_gov_save');
//add rows in entrance_exam post type end


//add rows in entrance_exam post type
function eventAddrowsuccess_add_meta_box() {

  $screens = array( 'horticulture', 'animal_husbandry', 'map','aquaculture','sericulture','polyculture','adventure_tourism','career','entrance_exam'  );// //,'tourism_adventure'

  foreach ( $screens as $screen ) {
      
    if($screen=='career' || $screen=='entrance_exam') $lbl = 'Videos';else $lbl = 'Success Stories';     
      
    add_meta_box(
        'event_suc',
        //'Success Stories',
        $lbl,
        'event_successstory_callback',
        $screen
    );
}
}

function event_successstory_callback( $post ) {

 wp_nonce_field('event_suc_save','event_suc_meta_box_nonce');
 $value = get_post_meta($post->ID,'_event_suc_value_key',true);
 $value1 = get_post_meta($post->ID,'_event_sucurl_value_key',true);
 $value2 = get_post_meta($post->ID,'_event_sucdesc_value_key',true);
 $value = explode('*****',$value);
 $value1 = explode('*****',$value1);
 $value2 = explode('*****',$value2);
 ?>
 <table id="addsuc_div" class="acf-table">
     <?php
     for($i=0;$i<count($value);$i++)
     {
         ?>

         <tr id="addsuc_div_<?php echo $i;?>"><td> <!--'required' removed here as per requrst by chandni for career video page-->
            <input  type="text" name="event_title_field[]" id="event_title_field" value="<?php echo esc_attr( $value[$i] ); ?>" size="30" placeholder="Title" /></td><td>
                <input  type="url" name="event_url1_field[]" id="event_url1_field" value="<?php echo esc_attr( $value1[$i] ); ?>" size="30" placeholder="Video Url" /></td><td>
                    <textarea  name="event_desc2_field[]" id="event_desc2_field"  cols="30" placeholder="Description" ><?php echo esc_attr( $value2[$i] ); ?></textarea></td><td>
                        <?php if($i==0){?>
                            <button type="button" id="addsuc" onclick="add_suc()" class="acf-button button">Add Row</button>
                        <?php }else{?>
                            <button type="button" class="acf-button button" id="delsuc" onclick="del_suc(<?php echo $i;?>)">Delete Row</button>
                        <?php }?>
                    </td></tr>

                    <?php
                }
                ?>
            </table>
            <input type="hidden" name="event_suc_cnt" id="event_suc_cnt" value="<?php echo count($value);?>"  />
            <?php
        }
        add_action('add_meta_boxes','eventAddrowsuccess_add_meta_box');

        function event_suc_save( $post_id ) {
         if( ! isset($_POST['event_suc_meta_box_nonce'])) {
          return;
      }
      if( ! wp_verify_nonce( $_POST['event_suc_meta_box_nonce'], 'event_suc_save') ) {
          return;
      }
      if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
          return;
      }
      if( ! current_user_can('edit_post', $post_id)) {
          return;
      }
      if( ! isset($_POST['event_title_field'])) {
          return;
      }
      $event_link = implode('*****',$_POST['event_title_field']);
      update_post_meta( $post_id,'_event_suc_value_key', $event_link );

      $event_link1 = implode('*****',$_POST['event_url1_field']);
      update_post_meta( $post_id,'_event_sucurl_value_key', $event_link1 );

      $event_link2 = implode('*****',$_POST['event_desc2_field']);
      update_post_meta( $post_id,'_event_sucdesc_value_key', $event_link2 );
  }
  add_action('save_post','event_suc_save');
//add rows in entrance_exam post type end

//=============================================================================================
//=============================================================================================
//add rows in entrance_exam post type
  function eventAddrowlearn_add_meta_box() {

  $screens = array( 'horticulture', 'animal_husbandry', 'map','aquaculture','sericulture','horticulture_int' ,'polyculture','adventure_tourism','work_abroad'); //,'tourism_adventure'

  foreach ( $screens as $screen ) {
      
      $labels = 'Learning Videos';
    if($screen=='work_abroad') $labels = 'Videos';
      
    add_meta_box(
        'event_learn',
        $labels,
        'event_learn_callback',
        $screen
    );
}
}

function event_learn_callback( $post ) {

 wp_nonce_field('event_learn_save','event_learn_meta_box_nonce');
 $value = get_post_meta($post->ID,'_event_learn_value_key',true);
 $value1 = get_post_meta($post->ID,'_event_learnurl_value_key',true);

 $value = explode('*****',$value);
 $value1 = explode('*****',$value1);

 ?>
 <table id="addlearn_div" class="acf-table">
     <?php
     for($i=0;$i<count($value);$i++)
     {
         ?>

         <tr id="addlearn_div_<?php echo $i;?>"><td>
            <input required type="text" name="event_learn_field[]" id="event_learn_field" value="<?php echo esc_attr( $value[$i] ); ?>" size="45" placeholder="Title" /></td><td>
                <input required type="url" name="event_learnurl1_field[]" id="event_learnurl1_field" value="<?php echo esc_attr( $value1[$i] ); ?>" size="50" placeholder="Video Url" /></td><td>

                    <?php if($i==0){?>
                        <button type="button" id="addlearn" onclick="add_learn()" class="acf-button button">Add Row</button>
                    <?php }else{?>
                        <button type="button" class="acf-button button" id="dellearn" onclick="del_learn(<?php echo $i;?>)">Delete Row</button>
                    <?php }?>
                </td></tr>

                <?php
            }
            ?>
        </table>
        <input type="hidden" name="event_learn_cnt" id="event_learn_cnt" value="<?php echo count($value);?>"  />
        <?php
    }
    add_action('add_meta_boxes','eventAddrowlearn_add_meta_box');

    function event_learn_save( $post_id ) {
     if( ! isset($_POST['event_learn_meta_box_nonce'])) {
      return;
  }
  if( ! wp_verify_nonce( $_POST['event_learn_meta_box_nonce'], 'event_learn_save') ) {
      return;
  }
  if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
      return;
  }
  if( ! current_user_can('edit_post', $post_id)) {
      return;
  }
  if( ! isset($_POST['event_learn_field'])) {
      return;
  }
  $event_link = implode('*****',$_POST['event_learn_field']);
  update_post_meta( $post_id,'_event_learn_value_key', $event_link );

  $event_link1 = implode('*****',$_POST['event_learnurl1_field']);
  update_post_meta( $post_id,'_event_learnurl_value_key', $event_link1 );

}
add_action('save_post','event_learn_save');
//add rows in entrance_exam post type end


//======
//Hire an intern Custom Post Type
//======
function hire_an_intern_init() {
    $labels = array(
        'name' => 'Hire an Intern',
        'singular_name' => 'Hire an Intern',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New Hire an Intern',
        'edit_item' => 'Edit Hire an Intern',
        'new_item' => 'New Hire an Intern',
        'all_items' => 'All Hire an Intern',
        'view_item' => 'View Hire an Intern',
        'search_items' => 'Search Hire an Intern',
        'not_found' =>  'No Hire an Intern',
        'not_found_in_trash' => 'No Hire an Intern found in Trash', 
        'parent_item_colon' => '',
        'menu_name' => 'Hire an Intern',
    );
    
    // register post type
    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,

        //'publicly_queryable' => false,
        'exclude_from_search' => true,
        'menu_position' => 22, 

        'rewrite' => array('slug' => 'hire_an_intern'),
        'query_var' => true,
        'menu_icon' => 'dashicons-admin-post',
        //'taxonomies'  => array( 'category' ),
        'supports' => array(
            'title',
            //'editor',
            //'excerpt',
            //'trackbacks',
            'custom-fields',
            //'comments',
            //'revisions',
            //'thumbnail',
            //'author',
            //'page-attributes'
        )
    );
    register_post_type( 'hire_an_intern', $args );
    
    
}
add_action( 'init', 'hire_an_intern_init' );
//======
//Hire an intern Custom Post Type end
//======

//======
//Schemes and Policies Custom Post Type
//======
function schemes_and_policies_init() {
    $labels = array(
        'name' => 'Schemes and Policies',
        'singular_name' => 'Schemes and Policies',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New Schemes and Policies',
        'edit_item' => 'Edit Schemes and Policies',
        'new_item' => 'New Schemes and Policies',
        'all_items' => 'All Schemes and Policies',
        'view_item' => 'View Schemes and Policies',
        'search_items' => 'Search Schemes and Policies',
        'not_found' =>  'No Schemes and Policies',
        'not_found_in_trash' => 'No Schemes and Policies found in Trash', 
        'parent_item_colon' => '',
        'menu_name' => 'Schemes and Policies',
    );
    
    // register post type
    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,

        //'publicly_queryable' => false,
        'exclude_from_search' => true,
        'menu_position' => 22, 

        'rewrite' => array('slug' => 'schemes_and_policies'),
        'query_var' => true,
        'menu_icon' => 'dashicons-admin-post',
        //'taxonomies'  => array( 'category' ),
        'supports' => array(
            'title',
            //'editor',
            //'excerpt',
            //'trackbacks',
            'custom-fields',
            //'comments',
            //'revisions',
            //'thumbnail',
            //'author',
            //'page-attributes'
        )
    );
    register_post_type( 'schemes_and_policies', $args );
    
    
}
add_action( 'init', 'schemes_and_policies_init' );
//======
//Schemes and Policies Custom Post Type end
//======

//======
//E-Learning Custom Post Type
//======
function e_Learning_init() {
    $labels = array(
        'name' => 'E-Learning',
        'singular_name' => 'E-Learning',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New E-Learning',
        'edit_item' => 'Edit E-Learning',
        'new_item' => 'New E-Learning',
        'all_items' => 'All E-Learning',
        'view_item' => 'View E-Learning',
        'search_items' => 'Search E-Learning',
        'not_found' =>  'No E-Learning',
        'not_found_in_trash' => 'No E-Learning found in Trash', 
        'parent_item_colon' => '',
        'menu_name' => 'E-Learning',
    );
    
    // register post type
    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,

        //'publicly_queryable' => false,
        'exclude_from_search' => true,
        'menu_position' => 22, 

        'rewrite' => array('slug' => 'e_Learning'),
        'query_var' => true,
        'menu_icon' => 'dashicons-admin-post',
        //'taxonomies'  => array( 'category' ),
        'supports' => array(
            'title',
            //'editor',
            //'excerpt',
            //'trackbacks',
            'custom-fields',
            //'comments',
            //'revisions',
            //'thumbnail',
            //'author',
            //'page-attributes'
        )
    );
    register_post_type( 'e_Learning', $args );
    
    
}
add_action( 'init', 'e_Learning_init' );
//======
//E-learning Custom Post Type end
//======

//======
//Market & Infrastructure Custom Post Type
//======
function resource_infra_init() {
    $labels = array(
        'name' => 'Market & Infrastructure',
        'singular_name' => 'Market & Infrastructure',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New Market & Infrastructure',
        'edit_item' => 'Edit Market & Infrastructure',
        'new_item' => 'New Market & Infrastructure',
        'all_items' => 'All Market & Infrastructure',
        'view_item' => 'View Market & Infrastructure',
        'search_items' => 'Search Market & Infrastructure',
        'not_found' =>  'No Market & Infrastructure',
        'not_found_in_trash' => 'No Market & Infrastructure found in Trash', 
        'parent_item_colon' => '',
        'menu_name' => 'Market & Infrastructure',
    );
    
    // register post type
    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,

        //'publicly_queryable' => false,
        'exclude_from_search' => true,
        'menu_position' => 22, 

        'rewrite' => array('slug' => 'resource_infra'),
        'query_var' => true,
        'menu_icon' => 'dashicons-admin-post',
        //'taxonomies'  => array( 'category' ),
        'supports' => array(
            'title',
            //'editor',
            //'excerpt',
            //'trackbacks',
            'custom-fields',
            //'comments',
            //'revisions',
            //'thumbnail',
            //'author',
            //'page-attributes'
        )
    );
    register_post_type( 'resource_infra', $args );
    
    
}
add_action( 'init', 'resource_infra_init' );
//======
//Market & Infrastructure Custom Post Type end
//======

//======
//tourism-adventure Custom Post Type
//======
/*function tourism_adventure_init() {
    $labels = array(
        'name' => 'Tourism & Hospitality',
        'singular_name' => 'Tourism & Hospitality',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New Tourism & Hospitality',
        'edit_item' => 'Edit Tourism & Hospitality',
        'new_item' => 'New Tourism & Hospitality',
        'all_items' => 'All Tourism & Hospitality',
        'view_item' => 'View Tourism & Hospitality',
        'search_items' => 'Search Tourism & Hospitality',
        'not_found' =>  'No Tourism & Hospitality',
        'not_found_in_trash' => 'No Tourism & Hospitality found in Trash', 
        'parent_item_colon' => '',
        'menu_name' => 'Tourism & Hospitality',
    );
    
    // register post type
    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,

        //'publicly_queryable' => false,
        'exclude_from_search' => true,
        'menu_position' => 22, 

        'rewrite' => array('slug' => 'tourism_adventure'),
        'query_var' => true,
        'menu_icon' => 'dashicons-admin-post',
        //'taxonomies'  => array( 'category' ),
        'supports' => array(
            'title',
            'editor',
            //'excerpt',
            //'trackbacks',
            'custom-fields',
            //'comments',
            //'revisions',
            //'thumbnail',
            //'author',
            'page-attributes'
        )
    );
    register_post_type( 'tourism_adventure', $args );
    
    // register taxonomy
    //register_taxonomy('product_category', 'product', array('hierarchical' => true, 'label' => 'Category', 'query_var' => true, 'rewrite' => array( 'slug' => 'product-category' )));
}
add_action( 'init', 'tourism_adventure_init' );*/
//======
//Resource Infrastructure Custom Post Type end
//======

//add Potential Location in entrance_exam post type
function eventAddploc_add_meta_box() {
 add_meta_box('event_major','Potential Location','event_ploc_callback','notavailable');//,'tourism_adventure'
}

function event_ploc_callback( $post ) {

 wp_nonce_field('event_ploc_save','event_ploc_meta_box_nonce');
 $value = get_post_meta($post->ID,'_event_ploc_value_key',true);

 $value = explode('*****',$value);
 ?>
 <table id="addRows_div_ploc">
     <?php
     for($i=0;$i<count($value);$i++)
     {
         ?>

         <tr id="addRows_ploc_<?php echo $i;?>"><td>
            <input required type="text" name="event_ploc_field[]" id="event_ploc_field" value="<?php echo esc_attr( $value[$i] ); ?>" size="50" placeholder="Potential Location" /></td><td>
                <?php if($i==0){?>
                    <button type="button" id="addrows_ploc" onclick="add_rows_ploc()" class="acf-button button">Add Row</button>
                <?php }else{?>
                    <button type="button" class="acf-button button" id="delrows_ploc" onclick="del_rows_ploc(<?php echo $i;?>)">Delete Row</button>
                <?php }?>
            </td></tr>

            <?php
        }
        ?>
    </table>
    <input type="hidden" name="event_ploc_cnt" id="event_ploc_cnt" value="<?php echo count($value);?>"  />
    <?php
}
add_action('add_meta_boxes','eventAddploc_add_meta_box');

function event_ploc_save( $post_id ) {
 if( ! isset($_POST['event_ploc_meta_box_nonce'])) {
  return;
}
if( ! wp_verify_nonce( $_POST['event_ploc_meta_box_nonce'], 'event_ploc_save') ) {
  return;
}
if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
  return;
}
if( ! current_user_can('edit_post', $post_id)) {
  return;
}
if( ! isset($_POST['event_ploc_field'])) {
  return;
}
$event_link = implode('*****',$_POST['event_ploc_field']);
update_post_meta( $post_id,'_event_ploc_value_key', $event_link );
}
add_action('save_post','event_ploc_save');
//add Potential Location in entrance_exam post type end

//================================............

function eventAddrowequip_add_meta_box() {
	
$screens = array( 'adventure_tourism' );//'tourism_adventure',

    foreach ( $screens as $screen ) {
	
	add_meta_box('event_equip','Equipment Requirement (for 50 perspon)','event_equip_callback',$screen);
 
	 }
}

function event_equip_callback( $post ) {

 wp_nonce_field('event_equip_save','event_equip_meta_box_nonce');
 $value = get_post_meta($post->ID,'_event_equip_value_key',true);
 $value1 = get_post_meta($post->ID,'_event_equipno_value_key',true);
 $value2 = get_post_meta($post->ID,'_event_equiprate_value_key',true);
 $value3 = get_post_meta($post->ID,'_event_equiptot_value_key',true);

 $value = explode('*****',$value);
 $value1 = explode('*****',$value1);
 $value2 = explode('*****',$value2);
 $value3 = explode('*****',$value3);

 ?>
 <table id="addequip_div" class="acf-table">
     <?php
     for($i=0;$i<count($value);$i++)
     {
         ?>

         <tr id="addequip_div_<?php echo $i;?>"><td>
            <input required type="text" name="event_equip_field[]" id="event_equip_field" value="<?php echo esc_attr( $value[$i] ); ?>" size="20" placeholder="Equipment" /></td><td>
                <input required type="text" name="event_equipno_field[]" id="event_equipno_field" value="<?php echo esc_attr( $value1[$i] ); ?>" size="15" placeholder="Equipment No" /></td><td>
                    <input required type="text" name="event_equiprate_field[]" id="event_equiprate_field" value="<?php echo esc_attr( $value2[$i] ); ?>" size="20" placeholder="Equipment Rate" /></td><td>
                        <input required type="text" name="event_equiptot_field[]" id="event_equiptot_field" value="<?php echo esc_attr( $value3[$i] ); ?>" size="20" placeholder="Equipment Total" /></td><td>

                            <?php if($i==0){?>
                                <button type="button" id="addequip" onclick="add_equip()" class="acf-button button">Add Row</button>
                            <?php }else{?>
                                <button type="button" class="acf-button button" id="delequip" onclick="del_equip(<?php echo $i;?>)">Delete Row</button>
                            <?php }?>
                        </td></tr>

                        <?php
                    }
                    ?>
                </table>
                <input type="hidden" name="event_equip_cnt" id="event_equip_cnt" value="<?php echo count($value);?>"  />
                <?php
            }
            add_action('add_meta_boxes','eventAddrowequip_add_meta_box');

            function event_equip_save( $post_id ) {
             if( ! isset($_POST['event_equip_meta_box_nonce'])) {
              return;
          }
          if( ! wp_verify_nonce( $_POST['event_equip_meta_box_nonce'], 'event_equip_save') ) {
              return;
          }
          if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
              return;
          }
          if( ! current_user_can('edit_post', $post_id)) {
              return;
          }
          if( ! isset($_POST['event_equip_field'])) {
              return;
          }
          $event_link = implode('*****',$_POST['event_equip_field']);
          update_post_meta( $post_id,'_event_equip_value_key', $event_link );

          $event_link1 = implode('*****',$_POST['event_equipno_field']);
          update_post_meta( $post_id,'_event_equipno_value_key', $event_link1 );

          $event_link2 = implode('*****',$_POST['event_equiprate_field']);
          update_post_meta( $post_id,'_event_equiprate_value_key', $event_link2 );

          $event_link3 = implode('*****',$_POST['event_equiptot_field']);
          update_post_meta( $post_id,'_event_equiptot_value_key', $event_link3 );

      }
      add_action('save_post','event_equip_save');
//add rows in entrance_exam post type end
//- Polyculture

//======
//Polyculture Custom Post Type
//======
      function polyculture_init() {
        $labels = array(
            'name' => 'Polyculture',
            'singular_name' => 'Polyculture',
            'add_new' => 'Add New',
            'add_new_item' => 'Add New Polyculture',
            'edit_item' => 'Edit Polyculture',
            'new_item' => 'New Polyculture',
            'all_items' => 'All Polyculture',
            'view_item' => 'View Polyculture',
            'search_items' => 'Search Polyculture',
            'not_found' =>  'No Polyculture',
            'not_found_in_trash' => 'No Polyculture found in Trash', 
            'parent_item_colon' => '',
            'menu_name' => 'Polyculture',
        );

    // register post type
        $args = array(
            'labels' => $labels,
            'public' => true,
            'has_archive' => true,
            'show_ui' => true,
            'capability_type' => 'post',
            'hierarchical' => false,

        //'publicly_queryable' => false,
            'exclude_from_search' => true,
            'menu_position' => 22, 

            'rewrite' => array('slug' => 'polyculture'),
            'query_var' => true,
            'menu_icon' => 'dashicons-admin-post',
        //'taxonomies'  => array( 'category' ),
            'supports' => array(
                'title',
                'editor',
            //'excerpt',
            //'trackbacks',
                'custom-fields',
            //'comments',
            //'revisions',
            //'thumbnail',
            //'author',
            //'page-attributes'
            )
        );
        register_post_type( 'polyculture', $args );

    
    }
    add_action( 'init', 'polyculture_init' );
//======
//polyculture Custom Post Type end
//======

//======
//food_processing Post Type
//======
    function food_processing_init() {
        $labels = array(
            'name' => 'Food Processing',
            'singular_name' => 'Food Processing',
            'add_new' => 'Add New',
            'add_new_item' => 'Add New Food Processing',
            'edit_item' => 'Edit Food Processing',
            'new_item' => 'New Food Processing',
            'all_items' => 'All Food Processing',
            'view_item' => 'View Food Processing',
            'search_items' => 'Search Food Processing',
            'not_found' =>  'No Food Processing',
            'not_found_in_trash' => 'No Food Processing found in Trash', 
            'parent_item_colon' => '',
            'menu_name' => 'Food Processing',
        );

    // register post type
        $args = array(
            'labels' => $labels,
            'public' => true,
            'has_archive' => true,
            'show_ui' => true,
            'capability_type' => 'post',
            'hierarchical' => false,

        //'publicly_queryable' => false,
            'exclude_from_search' => true,
            'menu_position' => 22, 

            'rewrite' => array('slug' => 'food_processing'),
            'query_var' => true,
            'menu_icon' => 'dashicons-admin-post',
        //'taxonomies'  => array( 'category' ),
            'supports' => array(
                'title',
                'editor',
            //'excerpt',
            //'trackbacks',
                'custom-fields',
            //'comments',
            //'revisions',
            //'thumbnail',
            //'author',
            //'page-attributes'
            )
        );
        register_post_type( 'food_processing', $args );

    
    }
    add_action( 'init', 'food_processing_init' );
//======
//food_processing Post Type end
//======

//add project cost rows in food_processing post type
    function eventAddrowpcost_add_meta_box() {

      $screens = array( 'post_harvest' );//,'nursery'  //'food_processing',

      foreach ( $screens as $screen ) {

        $labels = 'Project Cost In Lakhs';
        if($screen=='post_harvest') $labels = 'Plant and Machinery Cost';
		//if($screen=='nursery') $labels = 'Land Development Cost';

        add_meta_box(
            'event_pcost',
            $labels,
            'event_pcost_callback',
            $screen
        );
    }
}

function event_pcost_callback( $post ) {

 wp_nonce_field('event_pcost_save','event_pcost_meta_box_nonce');
 $value = get_post_meta($post->ID,'_event_pcost1_value_key',true);
 $value1 = get_post_meta($post->ID,'_event_pcost2_value_key',true);
   //$value2 = get_post_meta($post->ID,'_event_pcost3_value_key',true);
 $value = explode('*****',$value);
 $value1 = explode('*****',$value1);
   //$value2 = explode('*****',$value2);
 ?>
 <table id="addsuc_div" class="acf-table">
     <?php
     for($i=0;$i<count($value);$i++)
     {
         ?>

         <tr id="addsuc_div_<?php echo $i;?>"><td>
            <input required type="text" name="event_title_field[]" id="event_title_field" value="<?php echo esc_attr( $value[$i] ); ?>" size="50" placeholder="Details" /></td><td>
                <input required type="text" name="event_url1_field[]" id="event_url1_field" value="<?php echo esc_attr( $value1[$i] ); ?>" size="40" placeholder="In INR in Lakhs" /></td><td>
                    <?php if($i==0){?>
                        <button type="button" id="addpcost" onclick="add_pcost()" class="acf-button button">Add Row</button>
                    <?php }else{?>
                        <button type="button" class="acf-button button" id="delpcost" onclick="del_pcost(<?php echo $i;?>)">Delete Row</button>
                    <?php }?>
                </td></tr>

                <?php
            }
            ?>
        </table>
        <input type="hidden" name="event_suc_cnt" id="event_suc_cnt" value="<?php echo count($value);?>"  />
        <?php
    }
    add_action('add_meta_boxes','eventAddrowpcost_add_meta_box');

    function event_pcost_save( $post_id ) {
     if( ! isset($_POST['event_pcost_meta_box_nonce'])) {
      return;
  }
  if( ! wp_verify_nonce( $_POST['event_pcost_meta_box_nonce'], 'event_pcost_save') ) {
      return;
  }
  if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
      return;
  }
  if( ! current_user_can('edit_post', $post_id)) {
      return;
  }
  if( ! isset($_POST['event_title_field'])) {
      return;
  }
  $event_link = implode('*****',$_POST['event_title_field']);
  update_post_meta( $post_id,'_event_pcost1_value_key', $event_link );

  $event_link1 = implode('*****',$_POST['event_url1_field']);
  update_post_meta( $post_id,'_event_pcost2_value_key', $event_link1 );

   //$event_link2 = implode('*****',$_POST['event_desc2_field']);
   //update_post_meta( $post_id,'_event_pcost3_value_key', $event_link2 );
}
add_action('save_post','event_pcost_save');
//add project cost rows in food_processing post type end

//Quick links
//add rows in entrance_exam post type
function eventAddrowqlinks_add_meta_box() {

  $screens = array( 'career', 'entrance_exam','food_processing','conventional_sector','bamboo','services','nursery','service_trading' ); //,'know_your_approvals' //,'post_harvest'

  foreach ( $screens as $screen ) {
    add_meta_box(
        'event_qlinks',
        'Quick Links (Explore)',
        'event_qlinks_callback',
        $screen
    );
}
}

function event_qlinks_callback( $post ) {

 wp_nonce_field('event_qlinks_save','event_qlinks_meta_box_nonce');
 $value = get_post_meta($post->ID,'_event_qlinks_value_key',true);
 $value1 = get_post_meta($post->ID,'_event_qlinksurl_value_key',true);

 $value = explode('*****',$value);
 $value1 = explode('*****',$value1);

 ?>
 <table id="addqlinks_div" class="acf-table">
     <?php
     for($i=0;$i<count($value);$i++)
     {
         ?>

         <tr id="addqlinks_div_<?php echo $i;?>"><td>
            <input required type="text" name="event_qlinks_field[]" id="event_qlinks_field" value="<?php echo esc_attr( $value[$i] ); ?>" size="45" placeholder="Title" /></td><td>
                <input required type="url" name="event_qlinksurl1_field[]" id="event_qlinksurl1_field" value="<?php echo esc_attr( $value1[$i] ); ?>" size="50" placeholder="Url" /></td><td>

                    <?php if($i==0){?>
                        <button type="button" id="addqlinks" onclick="add_qlinks()" class="acf-button button">Add Row</button>
                    <?php }else{?>
                        <button type="button" class="acf-button button" id="delqlinks" onclick="del_qlinks(<?php echo $i;?>)">Delete Row</button>
                    <?php }?>
                </td></tr>

                <?php
            }
            ?>
        </table>
        <input type="hidden" name="event_qlinks_cnt" id="event_qlinks_cnt" value="<?php echo count($value);?>"  />
        <?php
    }
    add_action('add_meta_boxes','eventAddrowqlinks_add_meta_box');

    function event_qlinks_save( $post_id ) {
     if( ! isset($_POST['event_qlinks_meta_box_nonce'])) {
      return;
  }
  if( ! wp_verify_nonce( $_POST['event_qlinks_meta_box_nonce'], 'event_qlinks_save') ) {
      return;
  }
  if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
      return;
  }
  if( ! current_user_can('edit_post', $post_id)) {
      return;
  }
  if( ! isset($_POST['event_qlinks_field'])) {
      return;
  }
  $event_link = implode('*****',$_POST['event_qlinks_field']);
  update_post_meta( $post_id,'_event_qlinks_value_key', $event_link );

  $event_link1 = implode('*****',$_POST['event_qlinksurl1_field']);
  update_post_meta( $post_id,'_event_qlinksurl_value_key', $event_link1 );

}
add_action('save_post','event_qlinks_save');
//add rows in entrance_exam post type end

/*//======
//Know Your Approvals Post Type
//======
function know_your_approvals_init() {
    $labels = array(
        'name' => 'Know Your Approvals',
        'singular_name' => 'Know Your Approvals',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New Know Your Approvals',
        'edit_item' => 'Edit Know Your Approvals',
        'new_item' => 'New Know Your Approvals',
        'all_items' => 'All Know Your Approvals',
        'view_item' => 'View Know Your Approvals',
        'search_items' => 'Search Know Your Approvals',
        'not_found' =>  'No Know Your Approvals',
        'not_found_in_trash' => 'No Know Your Approvals found in Trash', 
        'parent_item_colon' => '',
        'menu_name' => 'Know Your Approvals',
    );
    
    // register post type
    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,

        //'publicly_queryable' => false,
        'exclude_from_search' => true,
        'menu_position' => 22, 

        'rewrite' => array('slug' => 'know_your_approvals'),
        'query_var' => true,
        'menu_icon' => 'dashicons-admin-post',
        //'taxonomies'  => array( 'category' ),
        'supports' => array(
            'title',
            //'editor',
            //'excerpt',
            //'trackbacks',
            'custom-fields',
            //'comments',
            //'revisions',
            //'thumbnail',
            //'author',
            //'page-attributes'
        )
    );
    register_post_type( 'know_your_approvals', $args );
    
    
}
add_action( 'init', 'know_your_approvals_init' );
//======
//Know Your Approvals Post Type end
//======


//add approval in post type post type
function eventAddrowapproval_add_meta_box() {
   
  $screens = array( 'know_your_approvals' );

    foreach ( $screens as $screen ) {
        add_meta_box(
            'event_approval',
            'Know Your Approval',
            'event_approval_callback',
            $screen
        );
    }
}
 
function event_approval_callback( $post ) {
 
   wp_nonce_field('event_approval_save','event_approval_meta_box_nonce');
   $value = get_post_meta($post->ID,'_event_approval_value_key',true);
   $value1 = get_post_meta($post->ID,'_event_nature_value_key',true);
   $value2 = get_post_meta($post->ID,'_event_description_value_key',true);
   $value3 = get_post_meta($post->ID,'_event_issue_value_key',true);
   $value = explode('*****',$value);
   $value1 = explode('*****',$value1);
   $value2 = explode('*****',$value2);
   $value3 = explode('*****',$value3);
   ?>
   <table id="addapproval_div">
   <?php
   for($i=0;$i<count($value);$i++)
   {
   ?>
   
    <tr id="addapproval_div_<?php echo $i;?>"><td>
    <input required type="text" name="event_title_field[]" id="event_title_field" value="<?php echo esc_attr( $value[$i] ); ?>" size="20" placeholder="Approval Name" /></td><td>
    <input type="text" name="event_nature_field[]" id="event_nature_field" value="<?php echo esc_attr( $value1[$i] ); ?>" size="20" placeholder="Nature" /></td><td>
    <textarea required name="event_desc2_field[]" id="event_desc2_field"  cols="27" placeholder="Description" ><?php echo esc_attr( $value2[$i] ); ?></textarea></td><td>
    <input required type="text" name="event_issue_field[]" id="event_issue_field" value="<?php echo esc_attr( $value3[$i] ); ?>" size="20" placeholder="Issuing Authority" /></td><td>
    <?php if($i==0){?>
    <button type="button" id="addapproval" onclick="add_approval()" class="acf-button button">Add Row</button>
    <?php }else{?>
    <button type="button" class="acf-button button" id="delapproval" onclick="del_approval(<?php echo $i;?>)">Delete Row</button>
    <?php }?>
  </td></tr>
    
   <?php
  }
  ?>
  </table>
  <input type="hidden" name="event_approval_cnt" id="event_approval_cnt" value="<?php echo count($value);?>"  />
  <?php
}
add_action('add_meta_boxes','eventAddrowapproval_add_meta_box');

function event_approval_save( $post_id ) {
   if( ! isset($_POST['event_approval_meta_box_nonce'])) {
      return;
   }
   if( ! wp_verify_nonce( $_POST['event_approval_meta_box_nonce'], 'event_approval_save') ) {
      return;
   }
   if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
      return;
   }
   if( ! current_user_can('edit_post', $post_id)) {
      return;
   }
   if( ! isset($_POST['event_title_field'])) {
      return;
   }
   $event_link = implode('*****',$_POST['event_title_field']);
   update_post_meta( $post_id,'_event_approval_value_key', $event_link );

   $event_link1 = implode('*****',$_POST['event_nature_field']);
   update_post_meta( $post_id,'_event_nature_value_key', $event_link1 );

   $event_link2 = implode('*****',$_POST['event_desc2_field']);
   update_post_meta( $post_id,'_event_description_value_key', $event_link2 );

   $event_link3 = implode('*****',$_POST['event_issue_field']);
   update_post_meta( $post_id,'_event_issue_value_key', $event_link3);
}
add_action('save_post','event_approval_save');
//add approval in post type end*/


//===============================================...........>>>>>>>>
//Top colleges in India for career
function eventAddrowcollegeindia_add_meta_box() {

  $screens = array( 'career' );

  foreach ( $screens as $screen ) {

    add_meta_box(
        'event_india',
        'Top colleges in India',
        'event_collegeindia_callback',
        $screen
    );
}
}

function event_collegeindia_callback( $post ) {

 wp_nonce_field('event_collegeindia_save','event_collegeindia_meta_box_nonce');
 $value = get_post_meta($post->ID,'_event_collegeindia_value_key',true);
 $value1 = get_post_meta($post->ID,'_event_collegeindiaurl_value_key',true);
 $value = explode('*****',$value);
 $value1 = explode('*****',$value1);
 ?>
 <table id="addcollegeindia_div" class="acf-table">
     <?php
     for($i=0;$i<count($value);$i++)
     {
         ?>

         <tr id="addcollegeindia_div_<?php echo $i;?>"><td>
            <input required type="text" name="event_collegeindia_field[]" id="event_collegeindia_field" value="<?php echo esc_attr( $value[$i] ); ?>" size="45" placeholder="Title" /></td><td>
                <input required type="url" name="event_collegeindia1_field[]" id="event_collegeindia1_field" value="<?php echo esc_attr( $value1[$i] ); ?>" size="50" placeholder="Url" /></td><td>
                    <?php if($i==0){?>
                        <button type="button" id="addcollegeindia" onclick="add_collegeindialink()" class="acf-button button">Add Row</button>
                    <?php }else{?>
                        <button type="button" class="acf-button button" id="delcollegeindia" onclick="del_collegeindialink(<?php echo $i;?>)">Delete Row</button>
                    <?php }?>
                </td></tr>

                <?php
            }
            ?>
        </table>
        <input type="hidden" name="event_collegeindia_cnt" id="event_collegeindia_cnt" value="<?php echo count($value);?>"  />
        <?php
    }
    add_action('add_meta_boxes','eventAddrowcollegeindia_add_meta_box');

    function event_collegeindia_save( $post_id ) {
     if( ! isset($_POST['event_collegeindia_meta_box_nonce'])) {
      return;
  }
  if( ! wp_verify_nonce( $_POST['event_collegeindia_meta_box_nonce'], 'event_collegeindia_save') ) {
      return;
  }
  if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
      return;
  }
  if( ! current_user_can('edit_post', $post_id)) {
      return;
  }
  if( ! isset($_POST['event_collegeindia_field'])) {
      return;
  }
  $event_link = implode('*****',$_POST['event_collegeindia_field']);
  update_post_meta( $post_id,'_event_collegeindia_value_key', $event_link );

  $event_link1 = implode('*****',$_POST['event_collegeindia1_field']);
  update_post_meta( $post_id,'_event_collegeindiaurl_value_key', $event_link1 );
}
add_action('save_post','event_collegeindia_save');
//Top colleges in India for career  end

//-------------
//Top colleges in Abroad for career 
function eventAddrowcollegeabroad_add_meta_box() {

  $screens = array( 'career','gallery' );

  foreach ( $screens as $screen ) {
      
       if($screen=='gallery') $labels = 'Add Multiple Videos<br><p class="description">Note: If you do not want to add title then add - in title box. </p>'; else $labels = 'Top colleges in Abroad';

    add_meta_box(
        'event_abroad',
        $labels,//'Top colleges in Abroad',
        'event_collegeabroad_callback',
        $screen
    );
}
}

function event_collegeabroad_callback( $post ) {

 wp_nonce_field('event_collegeabroad_save','event_collegeabroad_meta_box_nonce');
 $value = get_post_meta($post->ID,'_event_collegeabroad_value_key',true);
 $value1 = get_post_meta($post->ID,'_event_collegeabroadurl_value_key',true);
 $value = explode('*****',$value);
 $value1 = explode('*****',$value1);
 ?>
 <table id="addcollegeabroad_div" class="acf-table">
     <?php
     for($i=0;$i<count($value);$i++)
     {
         ?>

         <tr id="addcollegeabroad_div_<?php echo $i;?>"><td>
            <input  type="text" name="event_collegeabroad_field[]" id="event_collegeabroad_field" value="<?php echo esc_attr( $value[$i] ); ?>" size="45" placeholder="Title" /></td><td>
                <input  type="url" name="event_collegeabroad1_field[]" id="event_collegeabroad1_field" value="<?php echo esc_attr( $value1[$i] ); ?>" size="50" placeholder="Url" /></td><td>
                    <?php if($i==0){?>
                        <button type="button" id="addcollegeabroad" onclick="add_collegeabroadlink()" class="acf-button button">Add Row</button>
                    <?php }else{?>
                        <button type="button" class="acf-button button" id="delcollegeabroad" onclick="del_collegeabroadlink(<?php echo $i;?>)">Delete Row</button>
                    <?php }?>
                </td></tr>

                <?php
            }
            ?>
        </table>
        <input type="hidden" name="event_collegeabroad_cnt" id="event_collegeabroad_cnt" value="<?php echo count($value);?>"  />
        <?php
    }
    add_action('add_meta_boxes','eventAddrowcollegeabroad_add_meta_box');

    function event_collegeabroad_save( $post_id ) {
     if( ! isset($_POST['event_collegeabroad_meta_box_nonce'])) {
      return;
  }
  if( ! wp_verify_nonce( $_POST['event_collegeabroad_meta_box_nonce'], 'event_collegeabroad_save') ) {
      return;
  }
  if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
      return;
  }
  if( ! current_user_can('edit_post', $post_id)) {
      return;
  }
  if( ! isset($_POST['event_collegeabroad_field'])) {
      return;
  }
  $event_link = implode('*****',$_POST['event_collegeabroad_field']);
  update_post_meta( $post_id,'_event_collegeabroad_value_key', $event_link );

  $event_link1 = implode('*****',$_POST['event_collegeabroad1_field']);
  update_post_meta( $post_id,'_event_collegeabroadurl_value_key', $event_link1 );
}
add_action('save_post','event_collegeabroad_save');
//Top colleges in Abroad for career  end


//======
//horticulture_integrate Post Type
//======
function horticulture_integrate_init() {
    $labels = array(
        'name' => 'Horticulture Integrated',
        'singular_name' => 'Horticulture Integrated',
        'add_new' => 'Add New',
        'add_new_item' => 'Add Horticulture Integrated',
        'edit_item' => 'Edit Horticulture Integrated',
        'new_item' => 'New Horticulture Integrated',
        'all_items' => 'All Horticulture Integrated',
        'view_item' => 'View Horticulture Integrated',
        'search_items' => 'Search Horticulture Integrated',
        'not_found' =>  'No Horticulture Integrated',
        'not_found_in_trash' => 'No Horticulture Integrated found in Trash', 
        'parent_item_colon' => '',
        'menu_name' => 'Horticulture Integrated',
    );
    
    // register post type
    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,

        //'publicly_queryable' => false,
        'exclude_from_search' => true,
        'menu_position' => 22, 

        'rewrite' => array('slug' => 'horticulture_int'),
        'query_var' => true,
        'menu_icon' => 'dashicons-admin-post',
        //'taxonomies'  => array( 'category' ),
        'supports' => array(
            'title',
            'editor',
            //'excerpt',
            //'trackbacks',
            'custom-fields',
            //'comments',
            //'revisions',
            //'thumbnail',
            //'author',
            'page-attributes'
        )
    );
    register_post_type( 'horticulture_int', $args );
    
    
}
add_action( 'init', 'horticulture_integrate_init' );
//======
//horticulture_integrate Post Type end
//======


//======
//conventional_sector Post Type
//======
function conventional_sector_init() {
    $labels = array(
        'name' => 'Conventional Sector',
        'singular_name' => 'Conventional Sector',
        'add_new' => 'Add New',
        'add_new_item' => 'Add Conventional Sector',
        'edit_item' => 'Edit Conventional Sector',
        'new_item' => 'New Conventional Sector',
        'all_items' => 'All Conventional Sector',
        'view_item' => 'View Conventional Sector',
        'search_items' => 'Search Conventional Sector',
        'not_found' =>  'No Conventional Sector',
        'not_found_in_trash' => 'No Conventional Sector found in Trash', 
        'parent_item_colon' => '',
        'menu_name' => 'Conventional Sector',
    );
    
    // register post type
    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,

        //'publicly_queryable' => false,
        'exclude_from_search' => true,
        'menu_position' => 22, 

        'rewrite' => array('slug' => 'conventional_sector'),
        'query_var' => true,
        'menu_icon' => 'dashicons-admin-post',
        //'taxonomies'  => array( 'category' ),
        'supports' => array(
            'title',
            'editor',
            //'excerpt',
            //'trackbacks',
            'custom-fields',
            //'comments',
            //'revisions',
            //'thumbnail',
            //'author',
            'page-attributes'
        )
    );
    register_post_type( 'conventional_sector', $args );
    
    
}
add_action( 'init', 'conventional_sector_init' );
//======
//conventional Post Type end
//======

//add project cost rows in food_processing post type
function eventAddrowpcostnew_add_meta_box() {

  $screens = array( 'conventional_sector','bamboo','services','nursery','service_trading','food_processing' );

  foreach ( $screens as $screen ) {

      $labels='Project Cost In Lakhs';
      if($screen=='bamboo' or $screen=='services' or $screen=='nursery' or $screen=='service_trading') 
          $labels='Project Cost (subject to respective DPR) In Lakhs';

      add_meta_box(
        'event_pcostnew',
        $labels,
        'event_pcostnew_callback',
        $screen
    );
  }
}

function event_pcostnew_callback( $post ) {

 wp_nonce_field('event_pcostnew_save','event_pcostnew_meta_box_nonce');
 $value = get_post_meta($post->ID,'_event_pcostnew1_value_key',true);
 $value1 = get_post_meta($post->ID,'_event_pcostnew2_value_key',true);
 $value2 = get_post_meta($post->ID,'_event_pcostnew3_value_key',true);
 $value = explode('*****',$value);
 $value1 = explode('*****',$value1);
 $value2 = explode('*****',$value2);
 ?>
 <table id="addsucnew_div" class="acf-table">
     <?php
     for($i=0;$i<count($value);$i++)
     {
         ?>

         <tr id="addsucnew_div_<?php echo $i;?>"><td>
            <input required type="text" name="event_pcostnew_field[]" id="event_pcostnew_field" value="<?php echo esc_attr( $value[$i] ); ?>" size="40" placeholder="Details" /></td><td>
                <input required type="text" name="event_pcostnewurl_field[]" id="event_pcostnewurl_field" value="<?php echo esc_attr( $value1[$i] ); ?>" size="35" placeholder="In INR in Lakhs" /></td><td>
                  <select required type="text" name="event_pcostnewbold_field[]" id="event_pcostnewbold_field"  placeholder="Place" />
                  <option value="Normal Text" <?php if(esc_attr( $value2[$i] )=='Normal Text') echo 'selected';?>>Normal Text</option>
                  <option value="Bold Text" <?php if(esc_attr( $value2[$i] )=='Bold Text') echo 'selected';?>>Bold Text</option>
              </select></td><td>

                <?php if($i==0){?>
                    <button type="button" id="addpcostnew" onclick="add_pcostnew()" class="acf-button button">Add Row</button>
                <?php }else{?>
                    <button type="button" class="acf-button button" id="delpcostnew" onclick="del_pcostnew(<?php echo $i;?>)">Delete Row</button>
                <?php }?>
            </td></tr>

            <?php
        }
        ?>
    </table>
    <input type="hidden" name="event_sucnew_cnt" id="event_sucnew_cnt" value="<?php echo count($value);?>"  />
    <?php
}
add_action('add_meta_boxes','eventAddrowpcostnew_add_meta_box');

function event_pcostnew_save( $post_id ) {
 if( ! isset($_POST['event_pcostnew_meta_box_nonce'])) {
  return;
}
if( ! wp_verify_nonce( $_POST['event_pcostnew_meta_box_nonce'], 'event_pcostnew_save') ) {
  return;
}
if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
  return;
}
if( ! current_user_can('edit_post', $post_id)) {
  return;
}
if( ! isset($_POST['event_pcostnew_field'])) {
  return;
}
$event_link = implode('*****',$_POST['event_pcostnew_field']);
update_post_meta( $post_id,'_event_pcostnew1_value_key', $event_link );

$event_link1 = implode('*****',$_POST['event_pcostnewurl_field']);
update_post_meta( $post_id,'_event_pcostnew2_value_key', $event_link1 );

$event_link2 = implode('*****',$_POST['event_pcostnewbold_field']);
update_post_meta( $post_id,'_event_pcostnew3_value_key', $event_link2 );


}
add_action('save_post','event_pcostnew_save');
//add project cost rows in food_processing post type end


//==========================

//add project cost rows in food_processing post type
function eventAddrowfinance_add_meta_box() {

  $screens = array( 'conventional_sector','bamboo','services','nursery','service_trading','food_processing' );

  foreach ( $screens as $screen ) {
    add_meta_box(
        'event_finance',
        'Means of Finance In Lakhs',
        'event_finance_callback',
        $screen
    );
}
}

function event_finance_callback( $post ) {

 wp_nonce_field('event_finance_save','event_finance_meta_box_nonce');
 $value = get_post_meta($post->ID,'_event_finance1_value_key',true);
 $value1 = get_post_meta($post->ID,'_event_finance2_value_key',true);
 $value2 = get_post_meta($post->ID,'_event_finance3_value_key',true);
 $value3 = get_post_meta($post->ID,'_event_finance4_value_key',true);
 $value = explode('*****',$value);
 $value1 = explode('*****',$value1);
 $value2 = explode('*****',$value2);
 $value3 = explode('*****',$value3);
 ?>
 <table id="addfinance_div" class="acf-table">
     <?php
     for($i=0;$i<count($value);$i++)
     {
         ?>

         <tr id="addfinance_div_<?php echo $i;?>"><td>
            <input required type="text" name="event_finance_field[]" id="event_finance_field" value="<?php echo esc_attr( $value[$i] ); ?>" size="30" placeholder="Details" /></td><td>
                <input required type="text" name="event_financeurl_field[]" id="event_financeurl_field" value="<?php echo esc_attr( $value1[$i] ); ?>" size="20" placeholder="In INR in Lakhs" /></td>
                <td>
                    <input required type="text" name="event_finance_percentage_field[]" id="event_finance_percentage_field" value="<?php echo esc_attr( $value3[$i] ); ?>" size="15" placeholder="Percentage" /></td>


                    <td>
                      <select required type="text" name="event_financebold_field[]" id="event_financebold_field"  placeholder="Place" />
                      <option value="Normal Text" <?php if(esc_attr( $value2[$i] )=='Normal Text') echo 'selected';?>>Normal Text</option>
                      <option value="Bold Text" <?php if(esc_attr( $value2[$i] )=='Bold Text') echo 'selected';?>>Bold Text</option>
                  </select></td><td>
                    <?php if($i==0){?>
                        <button type="button" id="addfinance" onclick="add_finance()" class="acf-button button">Add Row</button>
                    <?php }else{?>
                        <button type="button" class="acf-button button" id="delfinance" onclick="del_finance(<?php echo $i;?>)">Delete Row</button>
                    <?php }?>
                </td></tr>

                <?php
            }
            ?>
        </table>
        <input type="hidden" name="event_finance_cnt" id="event_finance_cnt" value="<?php echo count($value);?>"  />
        <?php
    }
    add_action('add_meta_boxes','eventAddrowfinance_add_meta_box');

    function event_finance_save( $post_id ) {
     if( ! isset($_POST['event_finance_meta_box_nonce'])) {
      return;
  }
  if( ! wp_verify_nonce( $_POST['event_finance_meta_box_nonce'], 'event_finance_save') ) {
      return;
  }
  if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
      return;
  }
  if( ! current_user_can('edit_post', $post_id)) {
      return;
  }
  if( ! isset($_POST['event_finance_field'])) {
      return;
  }
  $event_link = implode('*****',$_POST['event_finance_field']);
  update_post_meta( $post_id,'_event_finance1_value_key', $event_link );

  $event_link1 = implode('*****',$_POST['event_financeurl_field']);
  update_post_meta( $post_id,'_event_finance2_value_key', $event_link1 );

  $event_link2 = implode('*****',$_POST['event_financebold_field']);
  update_post_meta( $post_id,'_event_finance3_value_key', $event_link2 );

  $event_link3 = implode('*****',$_POST['event_finance_percentage_field']);
  update_post_meta( $post_id,'_event_finance4_value_key', $event_link3 );


}
add_action('save_post','event_finance_save');
//add project cost rows in food_processing post type end

//==========================

//add project cost rows in food_processing post type
function eventAddrowbasicas_add_meta_box() {

  $screens = array( 'conventional_sector','bamboo','services','nursery','service_trading' );

  foreach ( $screens as $screen ) {
	  $labels= 'Basic Assumptions';
	  //if($screen == 'nursery') $labels= 'Farm Land';
		  
    add_meta_box(
        'event_basicas',
        $labels,
        'event_basicas_callback',
        $screen
    );
}
}

function event_basicas_callback( $post ) {

 wp_nonce_field('event_basicas_save','event_basicas_meta_box_nonce');
 $value = get_post_meta($post->ID,'_event_basicas1_value_key',true);
 $value1 = get_post_meta($post->ID,'_event_basicas2_value_key',true);
 $value = explode('*****',$value);
 $value1 = explode('*****',$value1);
 ?>
 <table id="addbasicas_div" class="acf-table">
     <?php
     for($i=0;$i<count($value);$i++)
     {
         ?>

         <tr id="addbasicas_div_<?php echo $i;?>"><td>
            <input required type="text" name="event_basicas_field[]" id="event_basicas_field" value="<?php echo esc_attr( $value[$i] ); ?>" size="45" placeholder="Details" /></td><td>
                <input required type="text" name="event_basicasurl_field[]" id="event_basicasurl_field" value="<?php echo esc_attr( $value1[$i] ); ?>" size="50" placeholder="Value" /></td><td>
                    <?php if($i==0){?>
                        <button type="button" id="addbasicas" onclick="add_basicas()" class="acf-button button">Add Row</button>
                    <?php }else{?>
                        <button type="button" class="acf-button button" id="delbasicas" onclick="del_basicas(<?php echo $i;?>)">Delete Row</button>
                    <?php }?>
                </td></tr>

                <?php
            }
            ?>
        </table>
        <input type="hidden" name="event_basicas_cnt" id="event_basicas_cnt" value="<?php echo count($value);?>"  />
        <?php
    }
    add_action('add_meta_boxes','eventAddrowbasicas_add_meta_box');

    function event_basicas_save( $post_id ) {
     if( ! isset($_POST['event_basicas_meta_box_nonce'])) {
      return;
  }
  if( ! wp_verify_nonce( $_POST['event_basicas_meta_box_nonce'], 'event_basicas_save') ) {
      return;
  }
  if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
      return;
  }
  if( ! current_user_can('edit_post', $post_id)) {
      return;
  }
  if( ! isset($_POST['event_basicas_field'])) {
      return;
  }
  $event_link = implode('*****',$_POST['event_basicas_field']);
  update_post_meta( $post_id,'_event_basicas1_value_key', $event_link );

  $event_link1 = implode('*****',$_POST['event_basicasurl_field']);
  update_post_meta( $post_id,'_event_basicas2_value_key', $event_link1 );


}
add_action('save_post','event_basicas_save');
//add project cost rows in food_processing post type end

//==========

//add project cost rows in food_processing post type
function eventAddrowother_add_meta_box() {

  $screens = array( 'conventional_sector','bamboo','services','nursery','service_trading' );

  foreach ( $screens as $screen ) {
    add_meta_box(
        'event_other',
        'Others',
        'event_other_callback',
        $screen
    );
}
}

function event_other_callback( $post ) {

 wp_nonce_field('event_other_save','event_other_meta_box_nonce');
 $value = get_post_meta($post->ID,'_event_other1_value_key',true);
 $value1 = get_post_meta($post->ID,'_event_other2_value_key',true);
 $value = explode('*****',$value);
 $value1 = explode('*****',$value1);
 ?>
 <table id="addother_div" class="acf-table">
     <?php
     for($i=0;$i<count($value);$i++)
     {
         ?>

         <tr id="addother_div_<?php echo $i;?>"><td>
            <input required type="text" name="event_other_field[]" id="event_other_field" value="<?php echo esc_attr( $value[$i] ); ?>" size="45" placeholder="Title" /></td><td>
                <input required type="text" name="event_otherurl_field[]" id="event_otherurl_field" value="<?php echo esc_attr( $value1[$i] ); ?>" size="50" placeholder="Description" /></td><td>
                    <?php if($i==0){?>
                        <button type="button" id="addother" onclick="add_other()" class="acf-button button">Add Row</button>
                    <?php }else{?>
                        <button type="button" class="acf-button button" id="delother" onclick="del_other(<?php echo $i;?>)">Delete Row</button>
                    <?php }?>
                </td></tr>

                <?php
            }
            ?>
        </table>
        <input type="hidden" name="event_other_cnt" id="event_other_cnt" value="<?php echo count($value);?>"  />
        <?php
    }
    add_action('add_meta_boxes','eventAddrowother_add_meta_box');

    function event_other_save( $post_id ) {
     if( ! isset($_POST['event_other_meta_box_nonce'])) {
      return;
  }
  if( ! wp_verify_nonce( $_POST['event_other_meta_box_nonce'], 'event_other_save') ) {
      return;
  }
  if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
      return;
  }
  if( ! current_user_can('edit_post', $post_id)) {
      return;
  }
  if( ! isset($_POST['event_other_field'])) {
      return;
  }
  $event_link = implode('*****',$_POST['event_other_field']);
  update_post_meta( $post_id,'_event_other1_value_key', $event_link );

  $event_link1 = implode('*****',$_POST['event_otherurl_field']);
  update_post_meta( $post_id,'_event_other2_value_key', $event_link1 );


}
add_action('save_post','event_other_save');
//add project cost rows in food_processing post type end

//==========

//add project cost rows in food_processing post type
function eventAddrowyearwise_add_meta_box() {

  $screens = array( 'conventional_sector','bamboo','services','nursery','service_trading' );

  foreach ( $screens as $screen ) {
    $label = 'Year wise capacity utilization';
    if($screen=='nursery' or $screen=='service_trading' or $screen=='conventional_sector' or $screen=='bamboo' or $screen=='services') $label = 'Financial Benchmarks';
    add_meta_box(
        'event_yearwise',
        $label,
        'event_yearwise_callback',
        $screen
    );
}
}

function event_yearwise_callback( $post ) {

 wp_nonce_field('event_yearwise_save','event_yearwise_meta_box_nonce');
 $value = get_post_meta($post->ID,'_event_yearwise1_value_key',true);
 $value1 = get_post_meta($post->ID,'_event_yearwise2_value_key',true);
 $value2 = get_post_meta($post->ID,'_event_yearwise3_value_key',true);
 $value3 = get_post_meta($post->ID,'_event_yearwise4_value_key',true);
 $value = explode('*****',$value);
 $value1 = explode('*****',$value1);
 $value2 = explode('*****',$value2);
 $value3 = explode('*****',$value3);
 ?>
 <table id="addyearwise_div" class="acf-table">
     <?php
     for($i=0;$i<count($value);$i++)
     {
         ?>

         <tr id="addyearwise_div_<?php echo $i;?>"><td>
            <input required type="text" name="event_yearwise_field[]" id="event_yearwise_field" value="<?php echo esc_attr( $value[$i] ); ?>" size="20" placeholder="Year" /></td>
            <td>
                <input required type="text" name="event_yearwise2_field[]" id="event_yearwise2_field" value="<?php echo esc_attr( $value2[$i] ); ?>" size="15" placeholder="Break Even Point %" /></td>
                <td>
                    <input type="text" name="event_yearwise1_field[]" id="event_yearwise1_field" value="<?php echo esc_attr( $value1[$i] ); ?>" size="20" placeholder="Target Revenue" /></td>
                    <td>
                        <input type="text" name="event_yearwise3_field[]" id="event_yearwise3_field" value="<?php echo esc_attr( $value3[$i] ); ?>" size="20" placeholder="DSCR including Principal Repayment" /></td>
                        <td>
                            <?php if($i==0){?>
                                <button type="button" id="addyearwise" onclick="add_yearwise()" class="acf-button button">Add Row</button>
                            <?php }else{?>
                                <button type="button" class="acf-button button" id="delyearwise" onclick="del_yearwise(<?php echo $i;?>)">Delete Row</button>
                            <?php }?>
                        </td></tr>

                        <?php
                    }
                    ?>
                </table>
                <input type="hidden" name="event_yearwise_cnt" id="event_yearwise_cnt" value="<?php echo count($value);?>"  />
                <?php
            }
            add_action('add_meta_boxes','eventAddrowyearwise_add_meta_box');

            function event_yearwise_save( $post_id ) {
             if( ! isset($_POST['event_yearwise_meta_box_nonce'])) {
              return;
          }
          if( ! wp_verify_nonce( $_POST['event_yearwise_meta_box_nonce'], 'event_yearwise_save') ) {
              return;
          }
          if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
              return;
          }
          if( ! current_user_can('edit_post', $post_id)) {
              return;
          }
          if( ! isset($_POST['event_yearwise_field'])) {
              return;
          }
          $event_link = implode('*****',$_POST['event_yearwise_field']);
          update_post_meta( $post_id,'_event_yearwise1_value_key', $event_link );

          $event_link1 = implode('*****',$_POST['event_yearwise1_field']);
          update_post_meta( $post_id,'_event_yearwise2_value_key', $event_link1 );

          $event_link2 = implode('*****',$_POST['event_yearwise2_field']);
          update_post_meta( $post_id,'_event_yearwise3_value_key', $event_link2 );

          $event_link3 = implode('*****',$_POST['event_yearwise3_field']);
          update_post_meta( $post_id,'_event_yearwise4_value_key', $event_link3 );


      }
      add_action('save_post','event_yearwise_save');
//add project cost rows in food_processing post type end


//======
//Incense Sticks Post Type
//======
      function bamboo_init() {
        $labels = array(
            'name' => 'Bamboo',
            'singular_name' => 'Bamboo',
            'add_new' => 'Add New',
            'add_new_item' => 'Add Bamboo',
            'edit_item' => 'Edit Bamboo',
            'new_item' => 'New Bamboo',
            'all_items' => 'All Bamboo',
            'view_item' => 'View Bamboo',
            'search_items' => 'Search Bamboo',
            'not_found' =>  'No Bamboo',
            'not_found_in_trash' => 'No Bamboo found in Trash', 
            'parent_item_colon' => '',
            'menu_name' => 'Bamboo',
        );

    // register post type
        $args = array(
            'labels' => $labels,
            'public' => true,
            'has_archive' => true,
            'show_ui' => true,
            'capability_type' => 'post',
            'hierarchical' => false,

        //'publicly_queryable' => false,
            'exclude_from_search' => true,
            'menu_position' => 22, 

            'rewrite' => array('slug' => 'bamboo'),
            'query_var' => true,
            'menu_icon' => 'dashicons-admin-post',
        //'taxonomies'  => array( 'category' ),
            'supports' => array(
                'title',
                'editor',
            //'excerpt',
            //'trackbacks',
                'custom-fields',
            //'comments',
            //'revisions',
            //'thumbnail',
            //'author',
                'page-attributes'
            )
        );
        register_post_type( 'bamboo', $args );

    
    }
    add_action( 'init', 'bamboo_init' );
//======
//Incense Sticks Post Type end
//======

//======
//Internet Service Post Type
//======
    function services_init() {
        $labels = array(
            'name' => 'Services',
            'singular_name' => 'Services',
            'add_new' => 'Add New',
            'add_new_item' => 'Add Services',
            'edit_item' => 'Edit Services',
            'new_item' => 'New Services',
            'all_items' => 'All Services',
            'view_item' => 'View Services',
            'search_items' => 'Search Services',
            'not_found' =>  'No Services',
            'not_found_in_trash' => 'No Services found in Trash', 
            'parent_item_colon' => '',
            'menu_name' => 'Services',
        );

    // register post type
        $args = array(
            'labels' => $labels,
            'public' => true,
            'has_archive' => true,
            'show_ui' => true,
            'capability_type' => 'post',
            'hierarchical' => false,

        //'publicly_queryable' => false,
            'exclude_from_search' => true,
            'menu_position' => 22, 

            'rewrite' => array('slug' => 'services'),
            'query_var' => true,
            'menu_icon' => 'dashicons-admin-post',
        //'taxonomies'  => array( 'category' ),
            'supports' => array(
                'title',
                'editor',
            //'excerpt',
            //'trackbacks',
                'custom-fields',
            //'comments',
            //'revisions',
            //'thumbnail',
            //'author',
                'page-attributes'
            )
        );
        register_post_type( 'services', $args );

    
    }
    add_action( 'init', 'services_init' );
//======
//Internet Service Post Type end
//======

//======
//post harvest Post Type
//======
    function post_harvest_init() {
        $labels = array(
            'name' => 'Post Harvest',
            'singular_name' => 'Post Harvest',
            'add_new' => 'Add New',
            'add_new_item' => 'Add New Post Harvest',
            'edit_item' => 'Edit Post Harvest',
            'new_item' => 'New Post Harvest',
            'all_items' => 'All Post Harvest',
            'view_item' => 'View Post Harvest',
            'search_items' => 'Search Post Harvest',
            'not_found' =>  'No Post Harvest',
            'not_found_in_trash' => 'No Post Harvest found in Trash', 
            'parent_item_colon' => '',
            'menu_name' => 'Post Harvest',
        );

    // register post type
        $args = array(
            'labels' => $labels,
            'public' => true,
            'has_archive' => true,
            'show_ui' => true,
            'capability_type' => 'post',
            'hierarchical' => false,

        //'publicly_queryable' => false,
            'exclude_from_search' => true,
            'menu_position' => 23, 

            'rewrite' => array('slug' => 'post_harvest'),
            'query_var' => true,
            'menu_icon' => 'dashicons-admin-post',
        //'taxonomies'  => array( 'category' ),
            'supports' => array(
                'title',
                'editor',
            //'excerpt',
            //'trackbacks',
                'custom-fields',
            //'comments',
            //'revisions',
            //'thumbnail',
            //'author',
                'page-attributes'
            )
        );
        register_post_type( 'post_harvest', $args );

    
    }
    add_action( 'init', 'post_harvest_init' );
//======
//post_harvest Post Type end
//======

//  Custom post type pagination function 
    function cpt_pagination($pages = '', $range = 2)
    {
      $showitems = ($range * 2)+1;
      global $paged;
      if(empty($paged)) $paged = 1;
      if($pages == '')
      {
          global $wp_query;
          $pages = $wp_query->max_num_pages;
          if(!$pages)
          {
              $pages = 1;
          }
      }
      if(1 != $pages)
      {
          echo "<nav aria-label='Page navigation example' style='float: right;'>  <ul class='pagination' style='padding-bottom: 10px;'> <span style='padding-top:7px;'>Page ".$paged." of ".$pages."</span>&nbsp;&nbsp;&nbsp;";
          if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<li class='page-item'><a class='page-link' href='".get_pagenum_link(1)."'>First</a></li>";
          if($paged > 1 && $showitems < $pages) echo "<li class='page-item'><a class='page-link' href='".get_pagenum_link($paged - 1)."'>Prev</a></li>";
          for ($i=1; $i <= $pages; $i++)
          {
              if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
              {
                  echo ($paged == $i)? "<li class=\"page-item active\"><a class='page-link'>".$i."</a></li>":"<li class='page-item'> <a href='".get_pagenum_link($i)."' class=\"page-link\">".$i."</a></li>";
              }
          }
          if ($paged < $pages && $showitems < $pages) echo " <li class='page-item'><a class='page-link' href=\"".get_pagenum_link($paged + 1)."\">Next </a></li>";
          if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo " <li class='page-item'><a class='page-link' href='".get_pagenum_link($pages)."'>Last </a></li>";
          echo "</ul></nav>\n";
      }
  }
//  Custom post type pagination function end


  function myadminscript() {

    if(is_admin()){
        wp_enqueue_script('admin_script', get_template_directory_uri().'/assets/js/admin_script.js', array(), false, true);
    }   
}

add_action( 'admin_enqueue_scripts', 'myadminscript' ); 


 //==========================================
 //new know your approval

//======
//Know Your Approval Post Type
//======
function know_your_approval_init() {
    $labels = array(
        'name' => 'Know Your Approval',
        'singular_name' => 'Know Your Approval',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New Know Your Approval',
        'edit_item' => 'Edit Know Your Approval',
        'new_item' => 'New Know Your Approval',
        'all_items' => 'All Know Your Approval',
        'view_item' => 'View Know Your Approval',
        'search_items' => 'Search Know Your Approval',
        'not_found' =>  'No Know Your Approval',
        'not_found_in_trash' => 'No Know Your Approvals found in Trash', 
        'parent_item_colon' => '',
        'menu_name' => 'Know Your Approvals',
    );
    
    // register post type
    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,

        //'publicly_queryable' => false,
        'exclude_from_search' => true,
        'menu_position' => 22, 

        'rewrite' => array('slug' => 'know_your_approval'),
        'query_var' => true,
        'menu_icon' => 'dashicons-admin-post',
        //'taxonomies'  => array( 'category' ),
        'supports' => array(
            'title',
            //'editor',
            //'excerpt',
            //'trackbacks',
            'custom-fields',
            //'comments',
            //'revisions',
            //'thumbnail',
            //'author',
            //'page-attributes'
        )
    );
    register_post_type( 'know_your_approval', $args );
    
    
}
add_action( 'init', 'know_your_approval_init' );
//======
//Know Your Approvals Post Type end
//======


//add approval in post type post type
function eventAddrowspecific_add_meta_box() {

  $screens = array( 'know_your_approval' );

  foreach ( $screens as $screen ) {
    add_meta_box(
        'event_specific',
        'Pre-Establishment (Specific)',
        'event_specific_callback',
        $screen
    );
}
}

function event_specific_callback( $post ) {

 wp_nonce_field('event_approval_save','event_specific_meta_box_nonce');
 $value = get_post_meta($post->ID,'_event_specific_value_key',true);
 $value1 = get_post_meta($post->ID,'_event_snature_value_key',true);
 $value2 = get_post_meta($post->ID,'_event_sdescription_value_key',true);
 $value3 = get_post_meta($post->ID,'_event_sissue_value_key',true);
 $value4 = get_post_meta($post->ID,'_event_slink_value_key',true);
 $value5 = get_post_meta($post->ID,'_event_sentity_value_key',true);
 $value = explode('*****',$value);
 $value1 = explode('*****',$value1);
 $value2 = explode('*****',$value2);
 $value3 = explode('*****',$value3);
 $value4 = explode('*****',$value4);
 $value5 = explode('*****',$value5);
 ?>
 <table id="addspecific_div">
     <?php
     for($i=0;$i<count($value);$i++)
     {
         ?>

         <tr id="addspecific_div_<?php echo $i;?>"><td>
            <input required type="text" name="event_stitle_field[]" id="event_stitle_field" value="<?php echo esc_attr( $value[$i] ); ?>" size="30" placeholder="Approval Name" /></td><td>
                <input type="text" name="event_snature_field[]" id="event_snature_field" value="<?php echo esc_attr( $value1[$i] ); ?>" size="40" placeholder="Nature" /></td><td>
                    <textarea required name="event_sdesc2_field[]" id="event_sdesc2_field"  cols="40" placeholder="Description" ><?php echo esc_attr( $value2[$i] ); ?></textarea></td></tr>
                    <tr id="addspecific_div1_<?php echo $i;?>"><td>
                        <input required type="text" name="event_sissue_field[]" id="event_sissue_field" value="<?php echo esc_attr( $value3[$i] ); ?>" size="30" placeholder="Issuing Authority" /></td><td >
                            <textarea required name="event_slink_field[]" id="event_slink_field" cols="40" placeholder="Apply" ><?php echo esc_attr( $value4[$i] ); ?></textarea></td><td >
                                <select required type="text" style="width: 180px;" name="event_sentity_field[]" id="event_sentity_field">
                                  <option value="">-Select Entity-</option>
                                  <option value="Proprietorship" <?php if(esc_attr( $value5[$i] )=='Proprietorship') echo 'selected';?>>Proprietorship</option>
                                  <option value="Partnership" <?php if(esc_attr( $value5[$i] )=='Partnership') echo 'selected';?>>Partnership</option>
                                  <option value="LLP" <?php if(esc_attr( $value5[$i] )=='LLP') echo 'selected';?>>LLP</option>
                                  <option value="Company" <?php if(esc_attr( $value5[$i] )=='Company') echo 'selected';?>>Company</option>
                                  <option value="Society" <?php if(esc_attr( $value5[$i] )=='Society') echo 'selected';?>>Society</option>
                                  <option value="Trust" <?php if(esc_attr( $value5[$i] )=='Trust') echo 'selected';?>>Trust</option>
                              </select>

                              <?php if($i==0){?>
                                <button type="button" id="addspecific" onclick="add_specific()" class="acf-button button">Add Row</button>
                            <?php }else{?>
                                <button type="button" class="acf-button button" id="delspecific" onclick="del_specific(<?php echo $i;?>)">Delete Row</button>
                            <?php }?>
                        </td></tr>
                        <tr id="addspecific_div2_<?php echo $i;?>"><td colspan="3"><hr></td></tr>
                        <?php
                    }
                    ?>
                </table>
                <input type="hidden" name="event_specific_cnt" id="event_specific_cnt" value="<?php echo count($value);?>"  />
                <?php
            }
            add_action('add_meta_boxes','eventAddrowspecific_add_meta_box');

            function event_specific_save( $post_id ) {
             if( ! isset($_POST['event_specific_meta_box_nonce'])) {
              return;
          }
          if( ! wp_verify_nonce( $_POST['event_specific_meta_box_nonce'], 'event_approval_save') ) {
              return;
          }
          if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
              return;
          }
          if( ! current_user_can('edit_post', $post_id)) {
              return;
          }
          if( ! isset($_POST['event_stitle_field'])) {
              return;
          }
          $event_link = implode('*****',$_POST['event_stitle_field']);
          update_post_meta( $post_id,'_event_specific_value_key', $event_link );

          $event_link1 = implode('*****',$_POST['event_snature_field']);
          update_post_meta( $post_id,'_event_snature_value_key', $event_link1 );

          $event_link2 = implode('*****',$_POST['event_sdesc2_field']);
          update_post_meta( $post_id,'_event_sdescription_value_key', $event_link2 );

          $event_link3 = implode('*****',$_POST['event_sissue_field']);
          update_post_meta( $post_id,'_event_sissue_value_key', $event_link3);

          $event_link4 = implode('*****',$_POST['event_slink_field']);
          update_post_meta( $post_id,'_event_slink_value_key', $event_link4);

          $event_link5 = implode('*****',$_POST['event_sentity_field']);
          update_post_meta( $post_id,'_event_sentity_value_key', $event_link5);
      }
      add_action('save_post','event_specific_save');
//add approval in post type end

//====================================================
//====================================================
//add approval in post type post type
      function eventAddrowcomman_add_meta_box() {

          $screens = array( 'know_your_approval' );

          foreach ( $screens as $screen ) {
            add_meta_box(
                'event_comman',
                'Pre-Establishment (Comman)',
                'event_comman_callback',
                $screen
            );
        }
    }

    function event_comman_callback( $post ) {

     wp_nonce_field('event_approval_save','event_comman_meta_box_nonce');
     $value = get_post_meta($post->ID,'_event_comman_value_key',true);
     $value1 = get_post_meta($post->ID,'_event_cnature_value_key',true);
     $value2 = get_post_meta($post->ID,'_event_cdescription_value_key',true);
     $value3 = get_post_meta($post->ID,'_event_cissue_value_key',true);
     $value4 = get_post_meta($post->ID,'_event_clink_value_key',true);
     $value5 = get_post_meta($post->ID,'_event_centity_value_key',true);
     $value = explode('*****',$value);
     $value1 = explode('*****',$value1);
     $value2 = explode('*****',$value2);
     $value3 = explode('*****',$value3);
     $value4 = explode('*****',$value4);
     $value5 = explode('*****',$value5);
     ?>
     <table id="addcomman_div">
         <?php
         for($i=0;$i<count($value);$i++)
         {
             ?>

             <tr id="addcomman_div_<?php echo $i;?>"><td>
                <input  type="text" name="event_ctitle_field[]" id="event_ctitle_field" value="<?php echo esc_attr( $value[$i] ); ?>" size="30" placeholder="Approval Name" /></td><td>
                    <input type="text" name="event_cnature_field[]" id="event_cnature_field" value="<?php echo esc_attr( $value1[$i] ); ?>" size="40" placeholder="Nature" /></td><td>
                        <textarea  name="event_cdesc2_field[]" id="event_cdesc2_field"  cols="40" placeholder="Description" ><?php echo esc_attr( $value2[$i] ); ?></textarea></td></tr>
                        <tr id="addcomman_div1_<?php echo $i;?>"><td>
                            <input  type="text" name="event_cissue_field[]" id="event_cissue_field" value="<?php echo esc_attr( $value3[$i] ); ?>" size="30" placeholder="Issuing Authority" /></td><td >
                                <textarea name="event_clink_field[]" id="event_clink_field" cols="40" placeholder="Apply" ><?php echo esc_attr( $value4[$i] ); ?></textarea></td><td style="text-align: right;">
                                    <select  type="text" style="width: 180px;display: none; " name="event_centity_field[]" id="event_centity_field">
                                      <option value="">-Select Entity-</option>
                                      <option value="Proprietorship" <?php if(esc_attr( $value5[$i] )=='Proprietorship') echo 'selected';?>>Proprietorship</option>
                                      <option value="Partnership" <?php if(esc_attr( $value5[$i] )=='Partnership') echo 'selected';?>>Partnership</option>
                                      <option value="LLP" <?php if(esc_attr( $value5[$i] )=='LLP') echo 'selected';?>>LLP</option>
                                      <option value="Company" <?php if(esc_attr( $value5[$i] )=='Company') echo 'selected';?>>Company</option>
                                      <option value="Society" <?php if(esc_attr( $value5[$i] )=='Society') echo 'selected';?>>Society</option>
                                  </select>

                                  <?php if($i==0){?>
                                    <button type="button" id="addcomman" onclick="add_comman()" class="acf-button button">Add Row</button>
                                <?php }else{?>
                                    <button type="button" class="acf-button button" id="delcomman" onclick="del_comman(<?php echo $i;?>)">Delete Row</button>
                                <?php }?>
                            </td></tr>
                            <tr id="addcomman_div2_<?php echo $i;?>"><td colspan="3"><hr></td></tr>
                            <?php
                        }
                        ?>
                    </table>
                    <input type="hidden" name="event_comman_cnt" id="event_comman_cnt" value="<?php echo count($value);?>"  />
                    <?php
                }
                add_action('add_meta_boxes','eventAddrowcomman_add_meta_box');

                function event_comman_save( $post_id ) {
                 if( ! isset($_POST['event_comman_meta_box_nonce'])) {
                  return;
              }
              if( ! wp_verify_nonce( $_POST['event_comman_meta_box_nonce'], 'event_approval_save') ) {
                  return;
              }
              if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
                  return;
              }
              if( ! current_user_can('edit_post', $post_id)) {
                  return;
              }
              if( ! isset($_POST['event_ctitle_field'])) {
                  return;
              }
              $event_link = implode('*****',$_POST['event_ctitle_field']);
              update_post_meta( $post_id,'_event_comman_value_key', $event_link );

              $event_link1 = implode('*****',$_POST['event_cnature_field']);
              update_post_meta( $post_id,'_event_cnature_value_key', $event_link1 );

              $event_link2 = implode('*****',$_POST['event_cdesc2_field']);
              update_post_meta( $post_id,'_event_cdescription_value_key', $event_link2 );

              $event_link3 = implode('*****',$_POST['event_cissue_field']);
              update_post_meta( $post_id,'_event_cissue_value_key', $event_link3);

              $event_link4 = implode('*****',$_POST['event_clink_field']);
              update_post_meta( $post_id,'_event_clink_value_key', $event_link4);

              $event_link5 = implode('*****',$_POST['event_centity_field']);
              update_post_meta( $post_id,'_event_centity_value_key', $event_link5);
          }
          add_action('save_post','event_comman_save');
//add approval in post type end

//====================================================
//====================================================
//add approval in post type post type
          function eventAddrowoperation_add_meta_box() {

              $screens = array( 'know_your_approval' );

              foreach ( $screens as $screen ) {
                add_meta_box(
                    'event_operation',
                    'Pre-Operation',
                    'event_operation_callback',
                    $screen
                );
            }
        }

        function event_operation_callback( $post ) {

         wp_nonce_field('event_approval_save','event_operation_meta_box_nonce');
         $value = get_post_meta($post->ID,'_event_operation_value_key',true);
         $value1 = get_post_meta($post->ID,'_event_onature_value_key',true);
         $value2 = get_post_meta($post->ID,'_event_odescription_value_key',true);
         $value3 = get_post_meta($post->ID,'_event_oissue_value_key',true);
         $value4 = get_post_meta($post->ID,'_event_olink_value_key',true);
         $value5 = get_post_meta($post->ID,'_event_oentity_value_key',true);
         $value = explode('*****',$value);
         $value1 = explode('*****',$value1);
         $value2 = explode('*****',$value2);
         $value3 = explode('*****',$value3);
         $value4 = explode('*****',$value4);
         $value5 = explode('*****',$value5);
         ?>
         <table id="addoperation_div">
             <?php
             for($i=0;$i<count($value);$i++)
             {
                 ?>

                 <tr id="addoperation_div_<?php echo $i;?>"><td>
                    <input required type="text" name="event_otitle_field[]" id="event_otitle_field" value="<?php echo esc_attr( $value[$i] ); ?>" size="30" placeholder="Approval Name" /></td><td>
                        <input type="text" name="event_onature_field[]" id="event_onature_field" value="<?php echo esc_attr( $value1[$i] ); ?>" size="40" placeholder="Nature" /></td><td>
                            <textarea required name="event_odesc2_field[]" id="event_odesc2_field"  cols="40" placeholder="Description" ><?php echo esc_attr( $value2[$i] ); ?></textarea></td></tr>
                            <tr id="addoperation_div1_<?php echo $i;?>"><td>
                                <input required type="text" name="event_oissue_field[]" id="event_oissue_field" value="<?php echo esc_attr( $value3[$i] ); ?>" size="30" placeholder="Issuing Authority" /></td><td >
                                    <textarea required name="event_olink_field[]" id="event_olink_field" cols="40" placeholder="Apply" ><?php echo esc_attr( $value4[$i] ); ?></textarea></td><td style="text-align: right;">
                                        <select  type="text" style="width: 180px; display: none;" name="event_oentity_field[]" id="event_oentity_field">
                                          <option value="">-Select Entity-</option>
                                          <option value="Proprietorship" <?php if(esc_attr( $value5[$i] )=='Proprietorship') echo 'selected';?>>Proprietorship</option>
                                          <option value="Partnership" <?php if(esc_attr( $value5[$i] )=='Partnership') echo 'selected';?>>Partnership</option>
                                          <option value="LLP" <?php if(esc_attr( $value5[$i] )=='LLP') echo 'selected';?>>LLP</option>
                                          <option value="Company" <?php if(esc_attr( $value5[$i] )=='Company') echo 'selected';?>>Company</option>
                                          <option value="Society" <?php if(esc_attr( $value5[$i] )=='Society') echo 'selected';?>>Society</option>
                                      </select>

                                      <?php if($i==0){?>
                                        <button type="button" id="addoperation" onclick="add_operation()" class="acf-button button">Add Row</button>
                                    <?php }else{?>
                                        <button type="button" class="acf-button button" id="deloperation" onclick="del_operation(<?php echo $i;?>)">Delete Row</button>
                                    <?php }?>
                                </td></tr>
                                <tr id="addoperation_div2_<?php echo $i;?>"><td colspan="3"><hr></td></tr>
                                <?php
                            }
                            ?>
                        </table>
                        <input type="hidden" name="event_operation_cnt" id="event_operation_cnt" value="<?php echo count($value);?>"  />
                        <?php
                    }
                    add_action('add_meta_boxes','eventAddrowoperation_add_meta_box');

                    function event_operation_save( $post_id ) {
                     if( ! isset($_POST['event_operation_meta_box_nonce'])) {
                      return;
                  }
                  if( ! wp_verify_nonce( $_POST['event_operation_meta_box_nonce'], 'event_approval_save') ) {
                      return;
                  }
                  if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
                      return;
                  }
                  if( ! current_user_can('edit_post', $post_id)) {
                      return;
                  }
                  if( ! isset($_POST['event_otitle_field'])) {
                      return;
                  }
                  $event_link = implode('*****',$_POST['event_otitle_field']);
                  update_post_meta( $post_id,'_event_operation_value_key', $event_link );

                  $event_link1 = implode('*****',$_POST['event_onature_field']);
                  update_post_meta( $post_id,'_event_onature_value_key', $event_link1 );

                  $event_link2 = implode('*****',$_POST['event_odesc2_field']);
                  update_post_meta( $post_id,'_event_odescription_value_key', $event_link2 );

                  $event_link3 = implode('*****',$_POST['event_oissue_field']);
                  update_post_meta( $post_id,'_event_oissue_value_key', $event_link3);

                  $event_link4 = implode('*****',$_POST['event_olink_field']);
                  update_post_meta( $post_id,'_event_olink_value_key', $event_link4);

                  $event_link5 = implode('*****',$_POST['event_oentity_field']);
                  update_post_meta( $post_id,'_event_oentity_value_key', $event_link5);
              }
              add_action('save_post','event_operation_save');
//add approval in post type end


 //==new know your approval end


//add project cost rows in food_processing post type
              function eventAddrowpolyc_add_meta_box() {

                  $screens = array( 'polyculture' );

                  foreach ( $screens as $screen ) {
                    add_meta_box(
                        'event_polyc',
                        'Breed Information',
                        'event_polyc_callback',
                        $screen
                    );
                }
            }

            function event_polyc_callback( $post ) {

             wp_nonce_field('event_polyc_save','event_polyc_meta_box_nonce');
             $value = get_post_meta($post->ID,'_event_polyc1_value_key',true);
             $value1 = get_post_meta($post->ID,'_event_polyc2_value_key',true);
             $value2 = get_post_meta($post->ID,'_event_polyc3_value_key',true);
             $value3 = get_post_meta($post->ID,'_event_polyc4_value_key',true);
             $value4 = get_post_meta($post->ID,'_event_polyc5_value_key',true);
             $value = explode('*****',$value);
             $value1 = explode('*****',$value1);
             $value2 = explode('*****',$value2);
             $value3 = explode('*****',$value3);
             $value4 = explode('*****',$value4);
             ?>
             <table id="addpolyc_div" class="acf-table">
                <tr>
                  <td rowspan="2" style="vertical-align: middle;"><b>Breed <span class="acf-required">*</span></b></td>
                  <td rowspan="2" style="vertical-align: middle;"><b>Percentage Combination <span class="acf-required">*</span></b></td>
                  <td colspan="2" style="text-align: center;"><b>Yield</b></td>                      
                  <td rowspan="2" style="vertical-align: middle;"><b>Farm Gate Price <span class="acf-required">*</span></b></td>
                  <td rowspan="2" style="vertical-align: middle;"></td>
              </tr>
              <tr>
                  <td style="border: 1px solid #eee;"><b>Pond <span class="acf-required">*</span></b></td>
                  <td><b>Cage <span class="acf-required">*</span></b></td>
              </tr>

              <?php
              for($i=0;$i<count($value);$i++)
              {
                 ?>

                 <tr id="addpolyc_div_<?php echo $i;?>"><td>
                    <input required type="text" name="event_polyc_field[]" id="event_polyc_field" value="<?php echo esc_attr( $value[$i] ); ?>" size="20" placeholder="Breed" /></td>
                    <td>
                        <input required type="text" name="event_polyc2_field[]" id="event_polyc2_field" value="<?php echo esc_attr( $value2[$i] ); ?>" size="10" placeholder="Percentage Combination" /></td>
                        <td>
                            <input required type="text" name="event_polyc1_field[]" id="event_polyc1_field" value="<?php echo esc_attr( $value1[$i] ); ?>" size="10" placeholder="Yield Pond" /></td>
                            <td>
                                <input required type="text" name="event_polyc3_field[]" id="event_polyc3_field" value="<?php echo esc_attr( $value3[$i] ); ?>" size="10" placeholder="Yield Cage" /></td>
                                <td>
                                    <input required type="text" name="event_polyc4_field[]" id="event_polyc4_field" value="<?php echo esc_attr( $value4[$i] ); ?>" size="10" placeholder="Farm Gate Price" /></td>
                                    <td>
                                        <?php if($i==0){?>
                                            <button type="button" id="addpolyc" onclick="add_polyc()" class="acf-button button">Add Row</button>
                                        <?php }else{?>
                                            <button type="button" class="acf-button button" id="delpolyc" onclick="del_polyc(<?php echo $i;?>)">Delete Row</button>
                                        <?php }?>
                                    </td></tr>

                                    <?php
                                }
                                ?>
                            </table>
                            <input type="hidden" name="event_polyc_cnt" id="event_polyc_cnt" value="<?php echo count($value);?>"  />
                            <?php
                        }
                        add_action('add_meta_boxes','eventAddrowpolyc_add_meta_box');

                        function event_polyc_save( $post_id ) {
                         if( ! isset($_POST['event_polyc_meta_box_nonce'])) {
                          return;
                      }
                      if( ! wp_verify_nonce( $_POST['event_polyc_meta_box_nonce'], 'event_polyc_save') ) {
                          return;
                      }
                      if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
                          return;
                      }
                      if( ! current_user_can('edit_post', $post_id)) {
                          return;
                      }
                      if( ! isset($_POST['event_polyc_field'])) {
                          return;
                      }
                      $event_link = implode('*****',$_POST['event_polyc_field']);
                      update_post_meta( $post_id,'_event_polyc1_value_key', $event_link );

                      $event_link1 = implode('*****',$_POST['event_polyc1_field']);
                      update_post_meta( $post_id,'_event_polyc2_value_key', $event_link1 );

                      $event_link2 = implode('*****',$_POST['event_polyc2_field']);
                      update_post_meta( $post_id,'_event_polyc3_value_key', $event_link2 );

                      $event_link3 = implode('*****',$_POST['event_polyc3_field']);
                      update_post_meta( $post_id,'_event_polyc4_value_key', $event_link3 );

                      $event_link4 = implode('*****',$_POST['event_polyc4_field']);
                      update_post_meta( $post_id,'_event_polyc5_value_key', $event_link4 );


                  }
                  add_action('save_post','event_polyc_save');
//add project cost rows in food_processing post type end


//======
//- Credit Linkage Custom Post Type
//======
                  function credit_linkage_init() {
                    $labels = array(
                        'name' => 'Loan Support',
                        'singular_name' => 'Loan Support',
                        'add_new' => 'Add New',
                        'add_new_item' => 'Add New Loan Support',
                        'edit_item' => 'Edit Loan Support',
                        'new_item' => 'New Loan Support',
                        'all_items' => 'All Loan Support',
                        'view_item' => 'View Loan Support',
                        'search_items' => 'Search Loan Support',
                        'not_found' =>  'No Loan Support',
                        'not_found_in_trash' => 'No Loan Support found in Trash', 
                        'parent_item_colon' => '',
                        'menu_name' => 'Loan Support',
                    );

    // register post type
                    $args = array(
                        'labels' => $labels,
                        'public' => true,
                        'has_archive' => true,
                        'show_ui' => true,
                        'capability_type' => 'post',
                        'hierarchical' => false,

        //'publicly_queryable' => false,
                        'exclude_from_search' => true,
                        'menu_position' => 22, 

                        'rewrite' => array('slug' => 'credit_linkage'),
                        'query_var' => true,
                        'menu_icon' => 'dashicons-admin-post',
        //'taxonomies'  => array( 'category' ),
                        'supports' => array(
                            'title',
            //'editor',
            //'excerpt',
            //'trackbacks',
                            'custom-fields',
            //'comments',
            //'revisions',
            //'thumbnail',
            //'author',
            //'page-attributes'
                        )
                    );
                    register_post_type( 'credit_linkage', $args );

    
                }
                add_action( 'init', 'credit_linkage_init' );
//======
//credit_linkage Custom Post Type end
//======

/*//======
//- Loan Support Custom Post Type
//======
function loan_support_init() {
    $labels = array(
        'name' => 'Loan Support',
        'singular_name' => 'Loan Support',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New Loan Support',
        'edit_item' => 'Edit Loan Support',
        'new_item' => 'New Loan Support',
        'all_items' => 'All Loan Support',
        'view_item' => 'View Loan Support',
        'search_items' => 'Search Loan Support',
        'not_found' =>  'No Loan Support',
        'not_found_in_trash' => 'No Loan Support found in Trash', 
        'parent_item_colon' => '',
        'menu_name' => 'Loan Support',
    );
    
    // register post type
    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,

        //'publicly_queryable' => false,
        'exclude_from_search' => true,
        'menu_position' => 22, 

        'rewrite' => array('slug' => 'loan_support'),
        'query_var' => true,
        'menu_icon' => 'dashicons-admin-post',
        //'taxonomies'  => array( 'category' ),
        'supports' => array(
            'title',
            //'editor',
            //'excerpt',
            //'trackbacks',
            'custom-fields',
            //'comments',
            //'revisions',
            //'thumbnail',
            //'author',
            //'page-attributes'
        )
    );
    register_post_type( 'loan_support', $args );
    
    // register taxonomy
    //register_taxonomy('product_category', 'product', array('hierarchical' => true, 'label' => 'Category', 'query_var' => true, 'rewrite' => array( 'slug' => 'product-category' )));
}
add_action( 'init', 'loan_support_init' );
//======
//loan_support Custom Post Type end
//======*/


//ajax call start
//ajax for north east page
add_action('wp_ajax_my_action_get_northeast_department','my_action_get_northeast_department' );
add_action('wp_ajax_nopriv_my_action_get_northeast_department','my_action_get_northeast_department');
function my_action_get_northeast_department(){
  //global $wpdb;

    if(!empty($_POST['state']) )
    {
        $sts_state = array(
          'key'     =>  'state',
          'value'    =>  $_POST['state'],
          'compare'  => '='
      );
    }
    if(!empty($_POST['dept']) )
    {
        $sts_dept = array(
          'key'     =>  'department',
          'value'    =>  $_POST['dept'],
          'compare'  => '='
      );
    }
    if(!empty($_POST['educ']) )
    {
        $sts_educ = array(
          'key'     =>  'mode_of_education',
          'value'    =>  $_POST['educ'],
          'compare'  => '='
      );
    }

    $args = array(
      'post_type' => 'education',
      'post_status' => 'publish',
      'meta_key'    => 'university_type',
      'meta_value'  => 'Study North-East',
      'posts_per_page' => -1,
      'meta_query'     =>  array(
          array(
              'relation' => 'AND',
              $sts_state,
              $sts_dept,
              $sts_educ
          )
      )
  );

    $the_query = new WP_Query( $args );
    $return_department=array();
    $return_education=array();
    $return_level=array();
    $returnTxt_department='<option value="">Select Department</option>';
    $returnTxt_education='<option value="">Select Mode</option>';
    $returnTxt_level='<option value="">Select Level</option>';
    if( $the_query->have_posts() ){
      while( $the_query->have_posts() ){ 
        $the_query->the_post(); 
        $values= get_fields();
        $return_department[]=$values['department'];
        $return_education[]=$values['mode_of_education'];
        $return_level[]=$values['education_level'];
    }
}

$return_department = array_filter(array_unique($return_department));
$return_education = array_filter(array_unique($return_education));
$return_level = array_filter(array_unique($return_level));

sort($return_department);
sort($return_education);
sort($return_level);

foreach($return_department as $res)
{
  $returnTxt_department.='<option value="'.$res.'">'.$res.'</option>';
}
foreach($return_education as $res)
{
  $returnTxt_education.='<option value="'.$res.'">'.$res.'</option>';
}
foreach($return_level as $res)
{
  $returnTxt_level.='<option value="'.$res.'">'.$res.'</option>';
}
if(!empty($_POST['educ']) )
  echo $returnTxt_level;
else if(!empty($_POST['dept']) )  
  echo $returnTxt_education.'*****'.$returnTxt_level;
else if(!empty($_POST['state']) )    
  echo $returnTxt_department.'*****'.$returnTxt_education.'*****'.$returnTxt_level;

wp_die();
}
//=============
//ajax market infrastructure
add_action('wp_ajax_my_action_get_infrastructure','my_action_get_infrastructure' );
add_action('wp_ajax_nopriv_my_action_get_infrastructure','my_action_get_infrastructure');
function my_action_get_infrastructure(){
  //global $wpdb;

    $args = array(
      'post_type' => 'resource_infra',
      'post_status' => 'publish',
      'meta_key'    => 'type',
      'meta_value'  => 'Industry Infrastructure',
      'posts_per_page' => -1,
      'meta_query'     =>  array(
          array(
              'relation' => 'AND',
              array(
                  'key'     =>  'state',
                  'value'    =>  $_POST['state'],
                  'compare'  => '='
              )
          )
      )
  );

    $the_query = new WP_Query( $args );


    $return_infrastructure=array();
    $returnTxt_infrastructure='<option value="">Select Type</option>';

    if( $the_query->have_posts() ){
      while( $the_query->have_posts() ){ 
        $the_query->the_post(); 
        $values= get_fields();
        $return_infrastructure[]=$values['type_of_infrastructure'];
    }
}

$return_infrastructure = array_filter(array_unique($return_infrastructure));
sort($return_infrastructure);


foreach($return_infrastructure as $res)
{
  $returnTxt_infrastructure.='<option value="'.$res.'">'.$res.'</option>';
}

echo $returnTxt_infrastructure;
wp_die();
}

//ajax for loan support
add_action('wp_ajax_my_action_get_loan_support','my_action_get_loan_support' );
add_action('wp_ajax_nopriv_my_action_get_loan_support','my_action_get_loan_support');
function my_action_get_loan_support(){
  //global $wpdb;

    if(!empty($_POST['loan_amount']) )
    {
        $sts_loan_amount = array(
          'key'     =>  'loan_amount',
          'value'    =>  $_POST['loan_amount'],
          'compare'  => '='
      );
    }
    if(!empty($_POST['cast']) )
    {
        $sts_cast = array(
          'key'     =>  'cast',
          'value'    =>  $_POST['cast'],
          'compare'  => '='
      );
    }
    if(!empty($_POST['gender']) )
    {
        $sts_gender = array(
          'key'     =>  'gender',
          'value'    =>  $_POST['gender'],
          'compare'  => '='
      );
    }


    $args = array(
      'post_type' => 'credit_linkage',
      'post_status' => 'publish',
      'posts_per_page' => -1,
      'meta_query'     =>  array(
          array(
              'relation' => 'AND',
              $sts_loan_amount,
              $sts_cast,
              $sts_gender

          )
      )
  );

    $the_query = new WP_Query( $args );
    $return_cast=array();
    $return_gender=array();
    $return_habitat=array();
    $returnTxt_cast='<option value="">Select Cast</option>';
    $returnTxt_gender='<option value="">Select Gender</option>';
    $returnTxt_habitat='<option value="">Select Habitat</option>';
    if( $the_query->have_posts() ){
      while( $the_query->have_posts() ){ 
        $the_query->the_post(); 
        $values= get_fields();
        $return_cast[]=$values['cast'];
        $return_gender[]=$values['gender'];
        $return_habitat[]=$values['habitat'];
    }
}

$return_cast = array_filter(array_unique($return_cast));
$return_gender = array_filter(array_unique($return_gender));
$return_habitat = array_filter(array_unique($return_habitat));

sort($return_cast);
sort($return_gender);
sort($return_habitat);

foreach($return_cast as $res)
{
  $returnTxt_cast.='<option value="'.$res.'">'.$res.'</option>';
}
foreach($return_gender as $res)
{
  $returnTxt_gender.='<option value="'.$res.'">'.$res.'</option>';
}
foreach($return_habitat as $res)
{
  $returnTxt_habitat.='<option value="'.$res.'">'.$res.'</option>';
}
if(!empty($_POST['gender']) )
  echo $returnTxt_habitat;
else if(!empty($_POST['cast']) )  
  echo $returnTxt_gender.'*****'.$returnTxt_habitat;
else if(!empty($_POST['loan_amount']) )    
  echo $returnTxt_cast.'*****'.$returnTxt_gender.'*****'.$returnTxt_habitat;

wp_die();
}
//ajax call for loan support end
//=============


//ajax for schemes and policies
add_action('wp_ajax_my_action_get_schemes_and_policies','my_action_get_schemes_and_policies' );
add_action('wp_ajax_nopriv_my_action_get_schemes_and_policies','my_action_get_schemes_and_policies');
function my_action_get_schemes_and_policies(){
  //global $wpdb;

    if(!empty($_POST['state']) )
    {
        $sts_state = array(
          'key'     =>  'state',
          'value'    =>  $_POST['state'],
          'compare'  => '='
      );
    }
    

    $args = array(
      'post_type' => 'schemes_and_policies',
      'post_status' => 'publish',
       'posts_per_page' => -1,
      'meta_query'     =>  array(
          array(
              'relation' => 'AND',
              $sts_state

          )
      )
  );

    $the_query = new WP_Query( $args );
    $return_department=array();
    
    $returnTxt_department='<option value="">Select Department</option>';
    
    if( $the_query->have_posts() ){
      while( $the_query->have_posts() ){ 
        $the_query->the_post(); 
        $values= get_fields();
        $return_department[]=$values['department'];
    }
}

$return_department = array_filter(array_unique($return_department));
sort($return_department);



foreach($return_department as $res)
{
  $returnTxt_department.='<option value="'.$res.'">'.$res.'</option>';
}

if(!empty($_POST['state']) )    
  echo $returnTxt_department.'*****';

wp_die();
}
//ajax call for schemes and policies end
//=============


//ajax for scholarship for girls
add_action('wp_ajax_my_action_get_scholarship_for_girls','my_action_get_scholarship_for_girls' );
add_action('wp_ajax_nopriv_my_action_get_scholarship_for_girls','my_action_get_scholarship_for_girls');
function my_action_get_scholarship_for_girls(){
  //global $wpdb;

    if(!empty($_POST['region']) && $_POST['region']!='All')
    {
        $sts_region = array(
          'key'     =>  'region',
          'value'    =>  $_POST['region'],
          'compare'  => '='
      );
    }
    if(!empty($_POST['department']) )
    {
        $sts_department = array(
          'key'     =>  'department',
          'value'    =>  $_POST['department'],
          'compare'  => '='
      );
    }  


    $args = array(
      'post_type' => 'beti_bachao',
      'post_status' => 'publish',
       'posts_per_page' => -1,
      'meta_query'     =>  array(
          array(
              'relation' => 'AND',
              $sts_region,
              $sts_department

          )
      )
  );

    $the_query = new WP_Query( $args );
    $return_department=array();
    $return_study_level=array();
    
    $returnTxt_department='<option value="">Select Department</option>';
    $returnTxt_study_level='<option value="">Select Study Level</option>';
    
    if( $the_query->have_posts() ){
      while( $the_query->have_posts() ){ 
        $the_query->the_post(); 
        $values= get_fields();
        $return_department[]=$values['department'];
        $return_study_level[]=$values['study_level'];
        
    }
}

$return_department = array_filter(array_unique($return_department));
$return_study_level = array_filter(array_unique($return_study_level));
sort($return_department);
sort($return_study_level);

foreach($return_department as $res)
{
  $returnTxt_department.='<option value="'.$res.'">'.$res.'</option>';
}
foreach($return_study_level as $res)
{
  $returnTxt_study_level.='<option value="'.$res.'">'.$res.'</option>';
}

if(!empty($_POST['department']) )  
  echo $returnTxt_study_level.'*****';
else if(!empty($_POST['region']) )    
  echo $returnTxt_department.'*****'.$returnTxt_study_level;

wp_die();
}
//ajax call for scholarship for girls end
//=============


//ajax for career coach
add_action('wp_ajax_my_action_get_career_coach','my_action_get_career_coach' );
add_action('wp_ajax_nopriv_my_action_get_career_coach','my_action_get_career_coach');
function my_action_get_career_coach(){
  //global $wpdb;

    if(!empty($_POST['sector']) )
    {
        $sts_sector = array(
          'key'     =>  'sector',
          'value'    =>  $_POST['sector'],
          'compare'  => '='
      );
    }

    $sector = str_replace(' ','_',strtolower($_POST['sector']));
    $args = array(
      'post_type' => 'career_coach',
      'post_status' => 'publish',
       'posts_per_page' => -1,
      'meta_query'     =>  array(
          array(
              'relation' => 'AND',
              $sts_sector

          )
      )
  );

    $the_query = new WP_Query( $args );
    $return_field=array();

    $returnTxt_field='<option value="">Select field</option>';


    if( $the_query->have_posts() ){
      while( $the_query->have_posts() ){ 
        $the_query->the_post(); 
        $values= get_fields();
        $return_field[]=$values['fields_for_'.$sector];

    }
}

$return_field = array_filter(array_unique($return_field));
sort($return_field);



foreach($return_field as $res)
{
  $returnTxt_field.='<option value="'.$res.'">'.$res.'</option>';
}


if(!empty($_POST['sector']) )    
  echo $returnTxt_field.'*****';

wp_die();
}
//ajax call for career coach end
//=============


//ajax for know your approval
add_action('wp_ajax_my_action_get_knowapproval','my_action_get_knowapproval' );
add_action('wp_ajax_nopriv_my_action_get_knowapproval','my_action_get_knowapproval');
function my_action_get_knowapproval(){
  //global $wpdb;

    if(!empty($_POST['state']) )
    {
        $sts_state = array(
          'key'     =>  'state',
          'value'    =>  $_POST['state'],
          'compare'  => '='
      );
    }
    if(!empty($_POST['industry']) )
    {
        $sts_industry = array(
          'key'     =>  'industry',
          'value'    =>  $_POST['industry'],
          'compare'  => '='
      );
    }

    $args = array(
      'post_type' => 'know_your_approval',
      'post_status' => 'publish',
      'posts_per_page' => -1,
      'meta_query'     =>  array(
          array(
              'relation' => 'AND',
              $sts_state,
              $sts_industry
          )
      )
  );

    $the_query = new WP_Query( $args );
    $return_industry=array();
    $return_enterprise=array();

    $returnTxt_industry='<option value="">Select Industry</option>';
    $returnTxt_enterprise='<option value="">Select Enterprise</option>';

    if( $the_query->have_posts() ){
      while( $the_query->have_posts() ){ 
        $the_query->the_post(); 
        $values= get_fields();
        $return_industry[]=$values['industry'];
        $return_enterprise[]=$values['enterprise'];

    }
}

$return_industry = array_filter(array_unique($return_industry));
$return_enterprise = array_filter(array_unique($return_enterprise));

sort($return_industry);
sort($return_enterprise);


foreach($return_industry as $res)
{
  $returnTxt_industry.='<option value="'.$res.'">'.$res.'</option>';
}
foreach($return_enterprise as $res)
{
  $returnTxt_enterprise.='<option value="'.$res.'">'.$res.'</option>';
}
if(!empty($_POST['industry']) )
  echo $returnTxt_enterprise;
else if(!empty($_POST['state']) )
  echo $returnTxt_industry.'*****'.$returnTxt_enterprise;
wp_die();
}
//ajax horticulture
add_action('wp_ajax_my_action_get_horticulture','my_action_get_horticulture' );
add_action('wp_ajax_nopriv_my_action_get_horticulture','my_action_get_horticulture');
function my_action_get_horticulture(){
  //global $wpdb;

    $args = array(
      'post_type'   => 'horticulture',
      'post_status' => 'publish',
      'posts_per_page' => -1,
      'meta_key'    => 'horticulture_type',
      'orderby' => 'post_id',
      'order'   => 'ASC',
      'meta_value'  => $_POST['type'],
      'meta_query'     =>  array(
          array(
              'relation' => 'AND',
              array(
                  'key'     =>  'state',
                  'value'    =>  $_POST['state'],
                  'compare'  => '='
              )
          )
      )
  );

    $the_query = new WP_Query( $args );

    $return_title=array();
    $returnTxt_title='<option value="">Select '.$_POST['type'].'</option>';
    $j=0;
    if( $the_query->have_posts() ){
      while( $the_query->have_posts() ){ 
        $the_query->the_post(); 
        $croptile = $the_query->posts[$j]->post_title;

        $return_title[]=$croptile;
        $j++;
    }
}

$return_title = array_filter(array_unique($return_title));
sort($return_title);


foreach($return_title as $res)
{
  $returnTxt_title.='<option value="'.$res.'">'.$res.'</option>';
}

echo $returnTxt_title;
wp_die();
}
//ajax Learn&earn
add_action('wp_ajax_my_action_get_learnearn','my_action_get_learnearn' );
add_action('wp_ajax_nopriv_my_action_get_learnearn','my_action_get_learnearn');
function my_action_get_learnearn(){
  //global $wpdb;

    $args = array(
      'post_type'   => 'learn_and_earn',
      'post_status' => 'publish',
      'posts_per_page' => -1,
      'meta_key'    => 'sector',
      'meta_value'  => $_POST['sector'],
      'meta_query'     =>  array(
          array(
              'relation' => 'AND',
              array(
                  'key'     =>  'state',
                  'value'    =>  $_POST['state'],
                  'compare'  => '='
              )
          )
      )
  );

    $the_query = new WP_Query( $args );

    $return_course=array();
    $returnTxt_course='<option value="">Select Course</option>';

    if( $the_query->have_posts() ){
      while( $the_query->have_posts() ){ 
        $the_query->the_post(); 
        $values= get_fields();
        $return_course[]=$values['course'];
    }
}

$return_course = array_filter(array_unique($return_course));
sort($return_course);

foreach($return_course as $res)
{
  $returnTxt_course.='<option value="'.$res.'">'.$res.'</option>';
}

echo $returnTxt_course;
wp_die();
}
//ajax for study abroad
add_action('wp_ajax_my_action_get_studyabroad','my_action_get_studyabroad' );
add_action('wp_ajax_nopriv_my_action_get_studyabroad','my_action_get_studyabroad');
function my_action_get_studyabroad(){
  //global $wpdb;

    if(!empty($_POST['country']) )
    {
        $sts_country = array(
          'key'     =>  'country',
          'value'    =>  $_POST['country'],
          'compare'  => '='
      );
    }
    if(!empty($_POST['dept']) )
    {
        $sts_dept = array(
          'key'     =>  'department',
          'value'    =>  $_POST['dept'],
          'compare'  => '='
      );
    }

    $args = array(
      'post_type' => 'education',
      'post_status' => 'publish',
      'posts_per_page' => -1,
      'meta_key'    => 'university_type',
      'meta_value'  => 'Study Abroad',
      'meta_query'     =>  array(
          array(
              'relation' => 'AND',
              $sts_country,
              $sts_dept
          )
      )
  );

    $the_query = new WP_Query( $args );
    $return_dept=array();
    $return_level=array();

    $returnTxt_dept='<option value="">Select Department</option>';
    $returnTxt_level='<option value="">Select Level</option>';

    if( $the_query->have_posts() ){
      while( $the_query->have_posts() ){ 
        $the_query->the_post(); 
        $values= get_fields();
        $return_dept[]=$values['department'];
        $return_level[]=$values['education_level'];

    }
}

$return_dept = array_filter(array_unique($return_dept));
$return_level = array_filter(array_unique($return_level));
sort($return_dept);
sort($return_level);


foreach($return_dept as $res)
{
  $returnTxt_dept.='<option value="'.$res.'">'.$res.'</option>';
}
foreach($return_level as $res)
{
  $returnTxt_level.='<option value="'.$res.'">'.$res.'</option>';
}

if(!empty($_POST['dept']) )
  echo $returnTxt_level;
else if(!empty($_POST['country']) )
  echo $returnTxt_dept.'*****'.$returnTxt_level;
wp_die();
}
//ajax for tourism adventure
add_action('wp_ajax_my_action_get_touradventure','my_action_get_touradventure' );
add_action('wp_ajax_nopriv_my_action_get_touradventure','my_action_get_touradventure');
function my_action_get_touradventure(){
  //global $wpdb;

    if(!empty($_POST['sports_category']) )
    {
        $sts_sports_category = array(
          'key'     =>  'sports_category',
          'value'    =>  $_POST['sports_category'],
          'compare'  => '='
      );
    }
    

    $args = array(
      'post_type' => 'adventure_tourism',
      'post_status' => 'publish',
      'posts_per_page' => -1,
      'meta_query'     =>  array(
          array(
              'relation' => 'AND',
              $sts_sports_category
          )
      )
  );

    $the_query = new WP_Query( $args );
    $return_sports=array();

    $returnTxt_sports='<option value="">Select Sport</option>';
    

    if( $the_query->have_posts() ){
      while( $the_query->have_posts() ){ 
        $the_query->the_post(); 
        $values= get_fields();
        $return_sports[]=$values['sports'];

    }
}

$return_sports = array_filter(array_unique($return_sports));
sort($return_sports);



foreach($return_sports as $res)
{
  $returnTxt_sports.='<option value="'.$res.'">'.$res.'</option>';
}

if(!empty($_POST['sports_category']) )
  echo $returnTxt_sports.'*****';
wp_die();
}
//ajax call end

//======
//- career-coach Custom Post Type
//======
function career_coach_init() {
    $labels = array(
        'name' => 'Career Coach',
        'singular_name' => 'Career Coach',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New Career Coach',
        'edit_item' => 'Edit Career Coach',
        'new_item' => 'New Career Coach',
        'all_items' => 'All Career Coach',
        'view_item' => 'View Career Coach',
        'search_items' => 'Search Career Coach',
        'not_found' =>  'No Career Coach',
        'not_found_in_trash' => 'No Career Coach found in Trash', 
        'parent_item_colon' => '',
        'menu_name' => 'Career Coach',
    );
    
    // register post type
    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,

        //'publicly_queryable' => false,
        'exclude_from_search' => true,
        'menu_position' => 22, 

        'rewrite' => array('slug' => 'career_coach'),
        'query_var' => true,
        'menu_icon' => 'dashicons-admin-post',
        //'taxonomies'  => array( 'category' ),
        'supports' => array(
            'title',
            //'editor',
            //'excerpt',
            //'trackbacks',
            'custom-fields',
            //'comments',
            //'revisions',
            //'thumbnail',
            //'author',
            //'page-attributes'
        )
    );
    register_post_type( 'career_coach', $args );
    
    
}
add_action( 'init', 'career_coach_init' );
//======
//loan_support Custom Post Type end
//======

//======
//- education_loan Custom Post Type
//======
function education_loan_init() {
    $labels = array(
        'name' => 'Education Loan',
        'singular_name' => 'Education Loan',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New Education Loan',
        'edit_item' => 'Edit Education Loan',
        'new_item' => 'New Education Loan',
        'all_items' => 'All Education Loan',
        'view_item' => 'View Education Loan',
        'search_items' => 'Search Education Loan',
        'not_found' =>  'No Education Loan',
        'not_found_in_trash' => 'No Education Loan found in Trash', 
        'parent_item_colon' => '',
        'menu_name' => 'Education Loan',
    );
    
    // register post type
    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,

        //'publicly_queryable' => false,
        'exclude_from_search' => true,
        'menu_position' => 22, 

        'rewrite' => array('slug' => 'education_loan'),
        'query_var' => true,
        'menu_icon' => 'dashicons-admin-post',
        //'taxonomies'  => array( 'category' ),
        'supports' => array(
            'title',
            //'editor',
            //'excerpt',
            //'trackbacks',
            'custom-fields',
            //'comments',
            //'revisions',
            //'thumbnail',
            //'author',
            //'page-attributes'
        )
    );
    register_post_type( 'education_loan', $args );
    
    
}
add_action( 'init', 'education_loan_init' );
//======
//education_loan Custom Post Type end
//======

//redirect to forum after login
function login_redirect( $redirect_to, $request, $user )
{    
    //echo '>>'.$_POST['wppb_referer_url'];
    //echo '>>'.site_url('log-in/');
    //exit;
  if( is_array( $user->roles ) ) {
    if( in_array( 'administrator', $user->roles ) ) {
      return admin_url();
  } else {
      if(isset($_POST['wppb_referer_url']) && !empty($_POST['wppb_referer_url']) && $_POST['wppb_referer_url']!=site_url('log-in/'))
      return $_POST['wppb_referer_url'];
      else
      return site_url(); //'/forums'
  }
}
}
add_filter( 'login_redirect', 'login_redirect', 10, 3 );
//=================================================================================================================================================

// Redirect Registration Page
/*function my_registration_page_redirect()
{
  global $pagenow;
  if((strtolower($pagenow) == 'wp-login.php') && (strtolower($_GET['action']) == 'register') )
  {
    wp_redirect(home_url('/registration/'));
  }
  else if((strtolower($pagenow) == 'wp-login.php') && (strtolower($_GET['checkemail']) == 'registered'))
  {
    wp_redirect( home_url('/login/') );
  }
  else if((strtolower($pagenow) == 'wp-login.php'))
  {
    wp_redirect( home_url('/login/') );
  }
}
add_filter( 'init', 'my_registration_page_redirect' );*/
// Redirect Registration Page end

// on your theme -> functions.php or code snippet
//add_action('wp_logout','auto_redirect_after_logout');
//function auto_redirect_after_logout(){
//wp_safe_redirect( home_url() );
//exit;
//}


//======
//- beti_bachao Custom Post Type
//======
function beti_bachao_init() {
    $labels = array(
        'name' => 'Beti Bachao',
        'singular_name' => 'Beti Bachao',
        'add_new' => 'Add New',
        'add_new_item' => 'Add Beti Bachao',
        'edit_item' => 'Edit Beti Bachao',
        'new_item' => 'New Beti Bachao',
        'all_items' => 'All Beti Bachao',
        'view_item' => 'View Beti Bachao',
        'search_items' => 'Search Beti Bachao',
        'not_found' =>  'No Beti Bachao',
        'not_found_in_trash' => 'No Beti Bachao found in Trash', 
        'parent_item_colon' => '',
        'menu_name' => 'Beti Bachao',
    );
    
    // register post type
    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,

        //'publicly_queryable' => false,
        'exclude_from_search' => true,
        'menu_position' => 22, 

        'rewrite' => array('slug' => 'beti_bachao'),
        'query_var' => true,
        'menu_icon' => 'dashicons-admin-post',
        //'taxonomies'  => array( 'category' ),
        'supports' => array(
            'title',
            //'editor',
            //'excerpt',
            //'trackbacks',
            'custom-fields',
            //'comments',
            //'revisions',
            //'thumbnail',
            //'author',
            'page-attributes'
        )
    );
    register_post_type( 'beti_bachao', $args );
    
    
}
add_action( 'init', 'beti_bachao_init' );
//======
//beti_bachao Custom Post Type end
//======

//======
//- polyculture_calculator Custom Post Type
//======
function polyculture_calc_init() {
    $labels = array(
        'name' => 'Ployculture Calculator',
        'singular_name' => 'Ployculture Calculator',
        'add_new' => 'Add New',
        'add_new_item' => 'Add Ployculture Calculator',
        'edit_item' => 'Edit Ployculture Calculator',
        'new_item' => 'New Ployculture Calculator',
        'all_items' => 'All Ployculture Calculator',
        'view_item' => 'View Ployculture Calculator',
        'search_items' => 'Search Ployculture Calculator',
        'not_found' =>  'No Ployculture Calculator',
        'not_found_in_trash' => 'No Ployculture Calculator found in Trash', 
        'parent_item_colon' => '',
        'menu_name' => 'Ployculture Calculator',
    );
    
    // register post type
    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,

        //'publicly_queryable' => false,
        'exclude_from_search' => true,
        'menu_position' => 22, 

        'rewrite' => array('slug' => 'polyculture_calc'),
        'query_var' => true,
        'menu_icon' => 'dashicons-admin-post',
        //'taxonomies'  => array( 'category' ),
        'supports' => array(
            'title',
            //'editor',
            //'excerpt',
            //'trackbacks',
            'custom-fields',
            //'comments',
            //'revisions',
            //'thumbnail',
            //'author',
            //'page-attributes'
        )
    );
    register_post_type( 'polyculture_calc', $args );
    
    
}
add_action( 'init', 'polyculture_calc_init' );
//======
//polyculture_calculator Custom Post Type end
//======

//======
//-monoculture_calculator Custom Post Type
//======
function monoculture_calc_init() {
    $labels = array(
        'name' => 'Monoculture Calculator',
        'singular_name' => 'Monoculture Calculator',
        'add_new' => 'Add New',
        'add_new_item' => 'Add Monoculture Calculator',
        'edit_item' => 'Edit Monoculture Calculator',
        'new_item' => 'New Monoculture Calculator',
        'all_items' => 'All Monoculture Calculator',
        'view_item' => 'View Monoculture Calculator',
        'search_items' => 'Search Monoculture Calculator',
        'not_found' =>  'No Monoculture Calculator',
        'not_found_in_trash' => 'No Monoculture Calculator found in Trash', 
        'parent_item_colon' => '',
        'menu_name' => 'Monoculture Calculator',
    );
    
    // register post type
    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,

        //'publicly_queryable' => false,
        'exclude_from_search' => true,
        'menu_position' => 22, 

        'rewrite' => array('slug' => 'monoculture_calc'),
        'query_var' => true,
        'menu_icon' => 'dashicons-admin-post',
        //'taxonomies'  => array( 'category' ),
        'supports' => array(
            'title',
            //'editor',
            //'excerpt',
            //'trackbacks',
            'custom-fields',
            //'comments',
            //'revisions',
            //'thumbnail',
            //'author',
            //'page-attributes'
        )
    );
    register_post_type( 'monoculture_calc', $args );
    
    
}
add_action( 'init', 'monoculture_calc_init' );
//======
//monoculture_calculator Custom Post Type end
//======

//======
//-Pigeon Farm Custom Post Type
//======
function pigeon_farm_calc_init() {
    $labels = array(
        'name' => 'Bird Farm Calculator',
        'singular_name' => 'Bird Farm Calculator',
        'add_new' => 'Add New',
        'add_new_item' => 'Add Bird Farm Calculator',
        'edit_item' => 'Edit Bird Farm Calculator',
        'new_item' => 'New Bird Farm Calculator',
        'all_items' => 'All Bird Farm Calculator',
        'view_item' => 'View Bird Farm Calculator',
        'search_items' => 'Search Bird Farm Calculator',
        'not_found' =>  'No Bird Farm Calculator',
        'not_found_in_trash' => 'No Bird Farm Calculator found in Trash', 
        'parent_item_colon' => '',
        'menu_name' => 'Bird Farm Calculator',
    );
    
    // register post type
    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,

        //'publicly_queryable' => false,
        'exclude_from_search' => true,
        'menu_position' => 22, 

        'rewrite' => array('slug' => 'pigeon_farm_calc'),
        'query_var' => true,
        'menu_icon' => 'dashicons-admin-post',
        //'taxonomies'  => array( 'category' ),
        'supports' => array(
            'title',
            //'editor',
            //'excerpt',
            //'trackbacks',
            'custom-fields',
            //'comments',
            //'revisions',
            //'thumbnail',
            //'author',
            //'page-attributes'
        )
    );
    register_post_type( 'pigeon_farm_calc', $args );
    
    
}
add_action( 'init', 'pigeon_farm_calc_init' );
//======
//Pigeon Farm Custom Post Type end
//======

//======
//-animal Farm Custom Post Type
//======
function animal_farm_calc_init() {
    $labels = array(
        'name' => 'Animal Farm Calculator',
        'singular_name' => 'Animal Farm Calculator',
        'add_new' => 'Add New',
        'add_new_item' => 'Add Animal Farm Calculator',
        'edit_item' => 'Edit Animal Farm Calculator',
        'new_item' => 'New Animal Farm Calculator',
        'all_items' => 'All Animal Farm Calculator',
        'view_item' => 'View Animal Farm Calculator',
        'search_items' => 'Search Animal Farm Calculator',
        'not_found' =>  'No Animal Farm Calculator',
        'not_found_in_trash' => 'No Animal Farm Calculator found in Trash', 
        'parent_item_colon' => '',
        'menu_name' => 'Animal Farm Calculator',
    );
    
    // register post type
    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,

        //'publicly_queryable' => false,
        'exclude_from_search' => true,
        'menu_position' => 22, 

        'rewrite' => array('slug' => 'animal_farm_calc'),
        'query_var' => true,
        'menu_icon' => 'dashicons-admin-post',
        //'taxonomies'  => array( 'category' ),
        'supports' => array(
            'title',
            //'editor',
            //'excerpt',
            //'trackbacks',
            'custom-fields',
            //'comments',
            //'revisions',
            //'thumbnail',
            //'author',
            //'page-attributes'
        )
    );
    register_post_type( 'animal_farm_calc', $args );
    
    
}
add_action( 'init', 'animal_farm_calc_init' );
//======
//animal Farm Custom Post Type end
//======

//======
//-Integrated Farm Custom Post Type
//======
function integrated_farm_calc_init() {
    $labels = array(
        'name' => 'Integrated Farm Calculator',
        'singular_name' => 'Integrated Farm Calculator',
        'add_new' => 'Add New',
        'add_new_item' => 'Add Integrated Farm Calculator',
        'edit_item' => 'Edit Integrated Farm Calculator',
        'new_item' => 'New Integrated Farm Calculator',
        'all_items' => 'All Integrated Farm Calculator',
        'view_item' => 'View Integrated Farm Calculator',
        'search_items' => 'Search Integrated Farm Calculator',
        'not_found' =>  'No Integrated Farm Calculator',
        'not_found_in_trash' => 'No Integrated Farm Calculator found in Trash', 
        'parent_item_colon' => '',
        'menu_name' => 'Integrated Farm Calculator',
    );
    
    // register post type
    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,

        //'publicly_queryable' => false,
        'exclude_from_search' => true,
        'menu_position' => 22, 

        'rewrite' => array('slug' => 'integrated_farm_calc'),
        'query_var' => true,
        'menu_icon' => 'dashicons-admin-post',
        //'taxonomies'  => array( 'category' ),
        'supports' => array(
            'title',
            //'editor',
            //'excerpt',
            //'trackbacks',
            'custom-fields',
            //'comments',
            //'revisions',
            //'thumbnail',
            //'author',
            //'page-attributes'
        )
    );
    register_post_type( 'integrated_farm_calc', $args );
    
    
}
add_action( 'init', 'integrated_farm_calc_init' );
//======
//integrated Farm Custom Post Type end
//======

//======
//- Work Abroad Custom Post Type
//======
function work_abroad_init() {
    $labels = array(
        'name' => 'Work Abroad',
        'singular_name' => 'Work Abroad',
        'add_new' => 'Add New',
        'add_new_item' => 'Add Work Abroad',
        'edit_item' => 'Edit Work Abroad',
        'new_item' => 'New Work Abroad',
        'all_items' => 'All Work Abroad',
        'view_item' => 'View Work Abroad',
        'search_items' => 'Search Work Abroad',
        'not_found' =>  'No Work Abroad',
        'not_found_in_trash' => 'No Work Abroad found in Trash', 
        'parent_item_colon' => '',
        'menu_name' => 'Work Abroad',
    );
    
    // register post type
    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,

        //'publicly_queryable' => false,
        'exclude_from_search' => true,
        'menu_position' => 22, 

        'rewrite' => array('slug' => 'work_abroad'),
        'query_var' => true,
        'menu_icon' => 'dashicons-admin-post',
        //'taxonomies'  => array( 'category' ),
        'supports' => array(
            'title',
            'editor',
            //'excerpt',
            //'trackbacks',
            'custom-fields',
            //'comments',
            //'revisions',
            'thumbnail',
            //'author',
            'page-attributes'
        )
    );
    register_post_type( 'work_abroad', $args );
}
add_action( 'init', 'work_abroad_init' );
//======
//work_abroad Custom Post Type end
//======



//=====================================================================================================================

//add capital in post type post type
function eventAddrowcapital_add_meta_box() {

  $screens = array( 'polyculture_calc','monoculture_calc','pigeon_farm_calc','integrated_farm_calc','animal_farm_calc','horticulture_calc' );

  foreach ( $screens as $screen ) {

  	if($screen=='horticulture_calc') $labels = 'Cost of Cultivation';
  	else $labels = 'Capital Cost (In Lacs)';
    add_meta_box(
        'event_capital',
        $labels,
        'event_capital_callback',
        $screen
    );
}
}

function event_capital_callback( $post ) {

 wp_nonce_field('event_capital_save','event_capital_meta_box_nonce');
 $value = get_post_meta($post->ID,'_event_capital_value_key',true);
 $value1 = get_post_meta($post->ID,'_event_crate_value_key',true);
 $value2 = get_post_meta($post->ID,'_event_cvalue_value_key',true);
 $value3 = get_post_meta($post->ID,'_event_cmult_value_key',true);
 $value = explode('*****',$value);
 $value1 = explode('*****',$value1);
 $value2 = explode('*****',$value2);
 $value3 = explode('*****',$value3);
 ?>
 <table id="addcapital_div" class="acf-table">
    <tr>
      <td><b>Title <span class="acf-required">*</span></b></td>
      <td><b>Rate</b></td>
      <td><b>Value <span class="acf-required">*</span></b></td>                      
      <td><b>Multiplication? <span class="acf-required">*</span></b></td>
      <td></td>
  </tr>

  <?php
  for($i=0;$i<count($value);$i++)
  {
     ?>

     <tr id="addcapital_div_<?php echo $i;?>"><td>
        <input required type="text" name="event_ctitle_field[]" id="event_ctitle_field" value="<?php echo esc_attr( $value[$i] ); ?>" size="30" placeholder="Title" /></td><td>
            <textarea name="event_crate_field[]" id="event_crate_field" cols="30" placeholder="Rate" ><?php echo esc_attr( $value1[$i] ); ?></textarea></td><td>
                <input type="text" required name="event_cvalue_field[]" id="event_cvalue_field"  size="10" placeholder="Value" value="<?php echo esc_attr( $value2[$i] ); ?>" ></td><td>
                    <select required name="event_cmult_field[]" id="event_cmult_field">
                        <option value="Yes" <?php if($value3[$i]=='Yes') echo 'Selected'; ?>>Yes</option>
                        <option value="No" <?php if($value3[$i]=='No') echo 'Selected'; ?>>No</option>
                    </select></td><td>
                        <?php if($i==0){?>
                            <button type="button" id="addcapital" onclick="add_capital()" class="acf-button button">Add Row</button>
                        <?php }else{?>
                            <button type="button" class="acf-button button" id="delcapital" onclick="del_capital(<?php echo $i;?>)">Delete Row</button>
                        <?php }?>
                    </td></tr>

                    <?php
                }
                ?>
            </table>
            <input type="hidden" name="event_capital_cnt" id="event_capital_cnt" value="<?php echo count($value);?>"  />
            <?php
        }
        add_action('add_meta_boxes','eventAddrowcapital_add_meta_box');

        function event_capital_save( $post_id ) {
         if( ! isset($_POST['event_capital_meta_box_nonce'])) {
          return;
      }
      if( ! wp_verify_nonce( $_POST['event_capital_meta_box_nonce'], 'event_capital_save') ) {
          return;
      }
      if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
          return;
      }
      if( ! current_user_can('edit_post', $post_id)) {
          return;
      }
      if( ! isset($_POST['event_ctitle_field'])) {
          return;
      }
      $event_link = implode('*****',$_POST['event_ctitle_field']);
      update_post_meta( $post_id,'_event_capital_value_key', $event_link );

      $event_link1 = implode('*****',$_POST['event_crate_field']);
      update_post_meta( $post_id,'_event_crate_value_key', $event_link1 );

      $event_link2 = implode('*****',$_POST['event_cvalue_field']);
      update_post_meta( $post_id,'_event_cvalue_value_key', $event_link2 );

      $event_link3 = implode('*****',$_POST['event_cmult_field']);
      update_post_meta( $post_id,'_event_cmult_value_key', $event_link3);
  }
  add_action('save_post','event_capital_save');
//add capital in post type end

  function eventAddrowrecurring_add_meta_box() {

      $screens = array( 'polyculture_calc','monoculture_calc','pigeon_farm_calc','integrated_farm_calc','animal_farm_calc' );

      foreach ( $screens as $screen ) {
        add_meta_box(
            'event_recurring',
            'Recurring Cost',
            'event_recurring_callback',
            $screen
        );
    }
}

function event_recurring_callback( $post ) {

 wp_nonce_field('event_recurring_save','event_recurring_meta_box_nonce');
 $value = get_post_meta($post->ID,'_event_recurring_value_key',true);
 $value1 = get_post_meta($post->ID,'_event_rrate_value_key',true);
 $value2 = get_post_meta($post->ID,'_event_rvalue_value_key',true);
 $value3 = get_post_meta($post->ID,'_event_rmult_value_key',true);
 $value = explode('*****',$value);
 $value1 = explode('*****',$value1);
 $value2 = explode('*****',$value2);
 $value3 = explode('*****',$value3);
 ?>
 <table id="addrecurring_div" class="acf-table">
    <tr>
      <td><b>Title <span class="acf-required">*</span></b></td>
      <td><b>Rate</b></td>
      <td><b>Value <span class="acf-required">*</span></b></td>                      
      <td><b>Multiplication? <span class="acf-required">*</span></b></td>
      <td></td>
  </tr>

  <?php
  for($i=0;$i<count($value);$i++)
  {
     ?>

     <tr id="addrecurring_div_<?php echo $i;?>"><td>
        <input required type="text" name="event_rtitle_field[]" id="event_rtitle_field" value="<?php echo esc_attr( $value[$i] ); ?>" size="30" placeholder="Title" /></td><td>
            <textarea name="event_rrate_field[]" id="event_rrate_field" cols="30" placeholder="Rate"><?php echo esc_attr( $value1[$i] ); ?></textarea></td><td>
                <input type="text" required name="event_rvalue_field[]" id="event_rvalue_field"  size="10" placeholder="Value" value="<?php echo esc_attr( $value2[$i] ); ?>" ></td><td>
                    <select required name="event_rmult_field[]" id="event_rmult_field">
                        <option value="Yes" <?php if($value3[$i]=='Yes') echo 'Selected'; ?>>Yes</option>
                        <option value="No" <?php if($value3[$i]=='No') echo 'Selected'; ?>>No</option>
                    </select></td><td>
                        <?php if($i==0){?>
                            <button type="button" id="addrecurring" onclick="add_recurring()" class="acf-button button">Add Row</button>
                        <?php }else{?>
                            <button type="button" class="acf-button button" id="delrecurring" onclick="del_recurring(<?php echo $i;?>)">Delete Row</button>
                        <?php }?>
                    </td></tr>

                    <?php
                }
                ?>
            </table>
            <input type="hidden" name="event_recurring_cnt" id="event_recurring_cnt" value="<?php echo count($value);?>"  />
            <?php
        }
        add_action('add_meta_boxes','eventAddrowrecurring_add_meta_box');

        function event_recurring_save( $post_id ) {
         if( ! isset($_POST['event_recurring_meta_box_nonce'])) {
          return;
      }
      if( ! wp_verify_nonce( $_POST['event_recurring_meta_box_nonce'], 'event_recurring_save') ) {
          return;
      }
      if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
          return;
      }
      if( ! current_user_can('edit_post', $post_id)) {
          return;
      }
      if( ! isset($_POST['event_rtitle_field'])) {
          return;
      }
      $event_link = implode('*****',$_POST['event_rtitle_field']);
      update_post_meta( $post_id,'_event_recurring_value_key', $event_link );

      $event_link1 = implode('*****',$_POST['event_rrate_field']);
      update_post_meta( $post_id,'_event_rrate_value_key', $event_link1 );

      $event_link2 = implode('*****',$_POST['event_rvalue_field']);
      update_post_meta( $post_id,'_event_rvalue_value_key', $event_link2 );

      $event_link3 = implode('*****',$_POST['event_rmult_field']);
      update_post_meta( $post_id,'_event_rmult_value_key', $event_link3);
  }
  add_action('save_post','event_recurring_save');
//add recurring in post type end

//====
  function eventAddrowincome_add_meta_box() {

      $screens = array( 'polyculture_calc','monoculture_calc','pigeon_farm_calc','integrated_farm_calc','animal_farm_calc','horticulture_calc' );

      foreach ( $screens as $screen ) {
        add_meta_box(
            'event_income',
            'Income Cost',
            'event_income_callback',
            $screen
        );
    }
}

function event_income_callback( $post ) {

 wp_nonce_field('event_income_save','event_income_meta_box_nonce');
 $value = get_post_meta($post->ID,'_event_income_value_key',true);
 $value1 = get_post_meta($post->ID,'_event_irate_value_key',true);
 $value2 = get_post_meta($post->ID,'_event_ivalue_value_key',true);
 $value3 = get_post_meta($post->ID,'_event_imult_value_key',true);
 $value = explode('*****',$value);
 $value1 = explode('*****',$value1);
 $value2 = explode('*****',$value2);
 $value3 = explode('*****',$value3);
 ?>
 <table id="addincome_div" class="acf-table">
    <tr>
      <td ><b>Title <span class="acf-required">*</span></b></td>
      <td ><b>Rate</b></td>
      <td ><b>Value <span class="acf-required">*</span></b></td>                      
      <td ><b>Multiplication? <span class="acf-required">*</span></b></td>
      <td ></td>
  </tr>

  <?php
  for($i=0;$i<count($value);$i++)
  {
     ?>

     <tr id="addincome_div_<?php echo $i;?>"><td>
        <input required type="text" name="event_ititle_field[]" id="event_ititle_field" value="<?php echo esc_attr( $value[$i] ); ?>" size="30" placeholder="Title" /></td><td>
            <textarea name="event_irate_field[]" id="event_irate_field"  cols="30" placeholder="Rate" ><?php echo esc_attr( $value1[$i] ); ?></textarea></td><td>
                <input type="text" required name="event_ivalue_field[]" id="event_ivalue_field"  size="10" placeholder="Value" value="<?php echo esc_attr( $value2[$i] ); ?>" ></td><td>
                    <select required name="event_imult_field[]" id="event_imult_field">
                        <option value="Yes" <?php if($value3[$i]=='Yes') echo 'Selected'; ?>>Yes</option>
                        <option value="No" <?php if($value3[$i]=='No') echo 'Selected'; ?>>No</option>
                    </select></td><td>
                        <?php if($i==0){?>
                            <button type="button" id="addincome" onclick="add_income()" class="acf-button button">Add Row</button>
                        <?php }else{?>
                            <button type="button" class="acf-button button" id="delincome" onclick="del_income(<?php echo $i;?>)">Delete Row</button>
                        <?php }?>
                    </td></tr>

                    <?php
                }
                ?>
            </table>
            <input type="hidden" name="event_income_cnt" id="event_income_cnt" value="<?php echo count($value);?>"  />
            <?php
        }
        add_action('add_meta_boxes','eventAddrowincome_add_meta_box');

        function event_income_save( $post_id ) {
         if( ! isset($_POST['event_income_meta_box_nonce'])) {
          return;
      }
      if( ! wp_verify_nonce( $_POST['event_income_meta_box_nonce'], 'event_income_save') ) {
          return;
      }
      if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
          return;
      }
      if( ! current_user_can('edit_post', $post_id)) {
          return;
      }
      if( ! isset($_POST['event_ititle_field'])) {
          return;
      }
      $event_link = implode('*****',$_POST['event_ititle_field']);
      update_post_meta( $post_id,'_event_income_value_key', $event_link );

      $event_link1 = implode('*****',$_POST['event_irate_field']);
      update_post_meta( $post_id,'_event_irate_value_key', $event_link1 );

      $event_link2 = implode('*****',$_POST['event_ivalue_field']);
      update_post_meta( $post_id,'_event_ivalue_value_key', $event_link2 );

      $event_link3 = implode('*****',$_POST['event_imult_field']);
      update_post_meta( $post_id,'_event_imult_value_key', $event_link3);
  }
  add_action('save_post','event_income_save');
//add income cost in post type end

//======
//adventure_tourism Custom Post Type
//======
function adventure_tourism_init() {
    $labels = array(
        'name' => 'Adventure Tourism',
        'singular_name' => 'Adventure Tourism',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New Adventure Tourism',
        'edit_item' => 'Edit Adventure Tourism',
        'new_item' => 'New Adventure Tourism',
        'all_items' => 'All Adventure Tourism',
        'view_item' => 'View Adventure Tourism',
        'search_items' => 'Search Adventure Tourism',
        'not_found' =>  'No Adventure Tourism',
        'not_found_in_trash' => 'No Adventure Tourism found in Trash', 
        'parent_item_colon' => '',
        'menu_name' => 'Adventure Tourism',
    );
    
    // register post type
    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,

        //'publicly_queryable' => false,
        'exclude_from_search' => true,
        'menu_position' => 22, 

        'rewrite' => array('slug' => 'adventure_tourism'),
        'query_var' => true,
        'menu_icon' => 'dashicons-admin-post',
        //'taxonomies'  => array( 'category' ),
        'supports' => array(
            'title',
            'editor',
            //'excerpt',
            //'trackbacks',
            'custom-fields',
            //'comments',
            //'revisions',
            //'thumbnail',
            //'author',
            'page-attributes'
        )
    );
    register_post_type( 'adventure_tourism', $args );
}
add_action( 'init', 'adventure_tourism_init' );
//======


//add Potential Location in entrance_exam post type
function eventAddplocstate_add_meta_box() {
 add_meta_box('event_plocstate','Potential Location','event_plocstate_callback','adventure_tourism');
}

function event_plocstate_callback( $post ) {

 wp_nonce_field('event_plocstate_save','event_plocstate_meta_box_nonce');
 $value = get_post_meta($post->ID,'_event_plocstate_value_key',true);
 $value1 = get_post_meta($post->ID,'_event_state_value_key',true);

 $value = explode('*****',$value);
 $value1 = explode('*****',$value1);
 ?>
 <table id="addRows_div_plocstate">
     <?php
     for($i=0;$i<count($value);$i++)
     {
         ?>

         <tr id="addRows_plocstate_<?php echo $i;?>"><td>
            <input required type="text" name="event_plocstate_field[]" id="event_plocstate_field" value="<?php echo esc_attr( $value[$i] ); ?>" size="50" placeholder="Potential Location" /></td><td>
			 <select required name="event_state_field[]" id="event_state_field">
                        <option value="" >-Select-</option>
                        <option value="Arunachal Pradesh" <?php if($value1[$i]=='Arunachal Pradesh') echo 'Selected'; ?>>Arunachal Pradesh</option>
                        <option value="Assam" <?php if($value1[$i]=='Assam') echo 'Selected'; ?>>Assam</option>
						<option value="Manipur" <?php if($value1[$i]=='Manipur') echo 'Selected'; ?>>Manipur</option>
						<option value="Meghalaya" <?php if($value1[$i]=='Meghalaya') echo 'Selected'; ?>>Meghalaya</option>
						<option value="Mizoram" <?php if($value1[$i]=='Mizoram') echo 'Selected'; ?>>Mizoram</option>
						<option value="Nagaland" <?php if($value1[$i]=='Nagaland') echo 'Selected'; ?>>Nagaland</option>
						<option value="Sikkim" <?php if($value1[$i]=='Sikkim') echo 'Selected'; ?>>Sikkim</option>
						<option value="Tripura" <?php if($value1[$i]=='Tripura') echo 'Selected'; ?>>Tripura</option>
                    </select>
			</td><td>
                <?php if($i==0){?>
                    <button type="button" id="addrows_plocstate" onclick="add_rows_plocstate()" class="acf-button button">Add Row</button>
                <?php }else{?>
                    <button type="button" class="acf-button button" id="delrows_plocstate" onclick="del_rows_plocstate(<?php echo $i;?>)">Delete Row</button>
                <?php }?>
            </td></tr>

            <?php
        }
        ?>
    </table>
    <input type="hidden" name="event_plocstate_cnt" id="event_plocstate_cnt" value="<?php echo count($value);?>"  />
    <?php
}
add_action('add_meta_boxes','eventAddplocstate_add_meta_box');

function event_plocstate_save( $post_id ) {
 if( ! isset($_POST['event_plocstate_meta_box_nonce'])) {
  return;
}
if( ! wp_verify_nonce( $_POST['event_plocstate_meta_box_nonce'], 'event_plocstate_save') ) {
  return;
}
if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
  return;
}
if( ! current_user_can('edit_post', $post_id)) {
  return;
}
if( ! isset($_POST['event_plocstate_field'])) {
  return;
}
$event_link = implode('*****',$_POST['event_plocstate_field']);
update_post_meta( $post_id,'_event_plocstate_value_key', $event_link );
$event_link1 = implode('*****',$_POST['event_state_field']);
update_post_meta( $post_id,'_event_state_value_key', $event_link1 );
}
add_action('save_post','event_plocstate_save');
//add Potential Location in entrance_exam post type end

//////////////////////////////////////Search for custom fileds in admin panel start
add_filter( 'posts_join', 'segnalazioni_search_join' );
function segnalazioni_search_join ( $join ) {
    global $pagenow, $wpdb;

    // I want the filter only when performing a search on edit page of Custom Post Type named "segnalazioni".
    if ( is_admin() && 'edit.php' === $pagenow && $_GET['post_type'] === $_GET['post_type'] && ! empty( $_GET['s'] ) ) {    
        $join .= 'LEFT JOIN ' . $wpdb->postmeta . ' ON ' . $wpdb->posts . '.ID = ' . $wpdb->postmeta . '.post_id ';
    }
    return $join;
}

add_filter( 'posts_where', 'segnalazioni_search_where' );
function segnalazioni_search_where( $where ) {
    global $pagenow, $wpdb;

    // I want the filter only when performing a search on edit page of Custom Post Type named "segnalazioni".
    if ( is_admin() && 'edit.php' === $pagenow && $_GET['post_type'] === $_GET['post_type'] && ! empty( $_GET['s'] ) ) 
    {
        $people_post = array("education");

        if (in_array($_GET['post_type'], $people_post))
        {
            $key_fields = array ( 'university_type' );
            $where = preg_replace(
            "/\(\s*".$wpdb->posts.".post_title\s+LIKE\s*(\'[^\']+\')\s*\)/",
            //(".$wpdb->posts.".post_title LIKE $1) OR 
            "  ("
                 .$wpdb->postmeta. ".meta_value LIKE $1 AND "
                 .$wpdb->postmeta. ".meta_key IN ('" .implode("','", $key_fields). "') )", $where );
        }
        else
        {
            $where = preg_replace(
            "/\(\s*" . $wpdb->posts . ".post_title\s+LIKE\s*(\'[^\']+\')\s*\)/",
            "(" . $wpdb->posts . ".post_title LIKE $1) OR (" . $wpdb->postmeta . ".meta_value LIKE $1)", $where );
            $where.= " GROUP BY {$wpdb->posts}.id"; // Solves duplicated results
        }
        
    }
    return $where;
}
function cf_search_distinct( $where ) {
    global $wpdb;

    if ( is_search() ) {
        return "DISTINCT";
    }

    return $where;
}
add_filter( 'posts_distinct', 'cf_search_distinct' );
//////////////////////////////////////Search for custom fileds in admin panel end


//ajax cost calc tot bird animal count
add_action('wp_ajax_my_action_get_final_tot_cost_calculate','my_action_get_final_tot_cost_calculate' );
add_action('wp_ajax_nopriv_my_action_get_final_tot_cost_calculate','my_action_get_final_tot_cost_calculate');
function my_action_get_final_tot_cost_calculate(){
  //global $wpdb;

if($_POST['sub_type']=='Animal')
{
$args = array(
                            'post_type' => 'animal_farm_calc',
                            'post_status' => 'publish',
                            'posts_per_page' => '1',
                            'meta_query'     =>  array(
                                array(
                                    'key'     =>  'type',
                                    'value'   =>  $_POST['type']
                                    ),
                                array(
                                    'key'     =>  'sub_type',
                                    'value'   =>  $_POST['sub_type']
                                ),
                                array(
                                    'key'     =>  'species',
                                    'value'   =>  $_POST['species']
                                ),
                                array(
                                    'key'     =>  'culture_system',
                                    'value'   =>  $_POST['culture_system']
                                )
                                
                              )
                            );
}
else if($_POST['sub_type']=='Bird')
{
      $args = array(
                            'post_type' => 'pigeon_farm_calc',
                            'post_status' => 'publish',
                            'posts_per_page' => '1',
                            'meta_query'     =>  array(
                                array(
                                    'key'     =>  'type',
                                    'value'   =>  $_POST['type']
                                    ),
                                array(
                                    'key'     =>  'sub_type',
                                    'value'   =>  $_POST['sub_type']
                                ),
                                array(
                                    'key'     =>  'species',
                                    'value'   =>  $_POST['species']
                                ),
                                array(
                                    'key'     =>  'culture_system',
                                    'value'   =>  $_POST['culture_system']
                                )
                                
                              )
                            );
}
else
{ //for egg production
  $args = array(
                            'post_type' => 'pigeon_farm_calc',
                            'post_status' => 'publish',
                            'posts_per_page' => -1,
                            'meta_query'     =>  array(
                                array(
                                    'key'     =>  'type',
                                    'value'   =>  $_POST['type']
                                    ),
                                array(
                                    'key'     =>  'sub_type',
                                    'value'   =>  $_POST['sub_type']
                                ),
                                array(
							          'key'     =>  'species',
							          'value'    =>  $_POST['species']
							      ),
                                array(
                                    'key'     =>  'culture_system',
                                    'value'   =>  $_POST['culture_system']
                                )
                              )
                            );
}
    $mortality=0;
    $final_tot =0;
    $total=0;
    $the_query = new WP_Query( $args );
    $return_field=array();
    //$mortality = get_field( "mortality", $the_query->posts[0]->ID );
    if( $the_query->have_posts() ){
      while( $the_query->have_posts() ){ 
        $the_query->the_post(); 
        $values= get_fields();
        $mortality=$values['mortality'];
        $total=$values['total'];


    }
}
if($_POST['total']!='')
{
   $final_tot = $_POST['total']/100*$mortality;
   $final_tot = $_POST['total'] - $final_tot;
}

echo round($final_tot).'*****'.$total;
wp_die();
}
//==============
//ajax cost calculator animal hubandry
add_action('wp_ajax_my_action_get_cost_calc_animal','my_action_get_cost_calc_animal' );
add_action('wp_ajax_nopriv_my_action_get_cost_calc_animal','my_action_get_cost_calc_animal');
function my_action_get_cost_calc_animal(){
  //global $wpdb;

  if(!empty($_POST['species']) )
    {
        $sts_species = array(
          'key'     =>  'species',
          'value'    =>  $_POST['species'],
          'compare'  => '='
      );
    }

if($_POST['sub_type']=='Animal')
{
  
$args = array(
                            'post_type' => 'animal_farm_calc',
                            'post_status' => 'publish',
                            'posts_per_page' => -1,
                            'meta_query'     =>  array(
                                array(
                                    'key'     =>  'type',
                                    'value'   =>  $_POST['type']
                                    ),
                                array(
                                    'key'     =>  'sub_type',
                                    'value'   =>  $_POST['sub_type']
                                ),
                                $sts_species
                              )
                            );
}
else if($_POST['sub_type']=='Bird')
{
      $args = array(
                            'post_type' => 'pigeon_farm_calc',
                            'post_status' => 'publish',
                            'posts_per_page' => -1,
                            'meta_query'     =>  array(
                                array(
                                    'key'     =>  'type',
                                    'value'   =>  $_POST['type']
                                    ),
                                array(
                                    'key'     =>  'sub_type',
                                    'value'   =>  $_POST['sub_type']
                                ),
                                $sts_species
                              )
                            );
}else
{ //for egg production
  $args = array(
                            'post_type' => 'pigeon_farm_calc',
                            'post_status' => 'publish',
                            'posts_per_page' => -1,
                            'meta_query'     =>  array(
                                array(
                                    'key'     =>  'type',
                                    'value'   =>  $_POST['type']
                                    ),
                                array(
                                    'key'     =>  'sub_type',
                                    'value'   =>  $_POST['sub_type']
                                ),
                                $sts_species
                              )
                            );
}

    $the_query = new WP_Query( $args );


    $return_species=array();
    $return_culture_system=array();
    $returnTxt_species='<option value="">Select</option>';
    $returnTxt_culture_system='<option value="">Select</option>';

    if( $the_query->have_posts() ){
      while( $the_query->have_posts() ){ 
        $the_query->the_post(); 
        $values= get_fields();
        $return_species[]=$values['species'];
        $return_culture_system[]=$values['culture_system'];
    }
}

$return_species = array_filter(array_unique($return_species));
$return_culture_system = array_filter(array_unique($return_culture_system));
sort($return_species);
sort($return_culture_system);

foreach($return_species as $res)
{
  $returnTxt_species.='<option value="'.$res.'">'.$res.'</option>';
}
foreach($return_culture_system as $res)
{
  $returnTxt_culture_system.='<option value="'.$res.'">'.$res.'</option>';
}
if(!empty($_POST['species']) )
echo $returnTxt_culture_system;
else
echo $returnTxt_species.'*****'.$returnTxt_culture_system;
wp_die();
}

/////////////////////////////My custom in admin page start
function my_admin_menu() {
    add_menu_page(
        __( 'Login Popup Setting', 'my-textdomain' ),
        __( 'Login Popup Setting', 'my-textdomain' ),
        'manage_options',
        'sample-page',
        'my_admin_page_contents',
        'dashicons-schedule',
        100
    );
}
add_action( 'admin_menu', 'my_admin_menu' );

function my_admin_page_contents() {
    ?>
    <h1> <?php esc_html_e( 'Settings', 'my-plugin-textdomain' ); ?> </h1>
    <form method="POST" action="options.php">
    <?php
    settings_fields( 'sample-page' );
    do_settings_sections( 'sample-page' );
    submit_button();
    ?>
    </form>
    <?php
}


add_action( 'admin_init', 'my_settings_init' );

function my_settings_init() {

    add_settings_section(
        'sample_page_setting_section',
        __( '', 'my-textdomain' ),
        'my_setting_section_callback_function',
        'sample-page'
    );

    add_settings_field(
       'my_login_popup_field',
       __( 'Show Login Popup to User After Time Setting:', 'my-textdomain' ),
       'my_setting_markup',
       'sample-page',
       'sample_page_setting_section'
    );

    register_setting( 'sample-page', 'my_login_popup_field' );
    //register_setting( 'sample-page', 'my_setting_field2' );
}


function my_setting_section_callback_function() {
   // echo '<p>Show Login Popup Time Setting</p>';
}


function my_setting_markup() {
    ?>
    <label for="my-input"><?php _e( 'Time' ); ?></label>
    <select id="my_login_popup_field" name="my_login_popup_field" value="<?php //echo get_option( 'my_login_popup_field' ); ?>">
      <option value="">Don't Show Popup</option>
      <option value="60" <?php if(get_option( 'my_login_popup_field' )=='60') echo 'selected';?>>1 Minutes</option>
      <option value="120" <?php if(get_option( 'my_login_popup_field' )=='120') echo 'selected';?>>2 Minutes</option>
      <option value="300" <?php if(get_option( 'my_login_popup_field' )=='300') echo 'selected';?>>5 Minutes</option>
      <option value="1800" <?php if(get_option( 'my_login_popup_field' )=='1800') echo 'selected';?>>30 Minutes</option>
      <option value="3600" <?php if(get_option( 'my_login_popup_field' )=='3600') echo 'selected';?>>1 Hours</option>
      <option value="7200" <?php if(get_option( 'my_login_popup_field' )=='7200') echo 'selected';?>>2 Hours</option>
      <option value="18000" <?php if(get_option( 'my_login_popup_field' )=='18000') echo 'selected';?>>5 Hours</option>
    </select>
    <!--<input type="text" id="my_setting_field2" name="my_setting_field2" value="<?php //echo get_option( 'my_setting_field2' ); ?>">-->
    <?php
}
/////////////////////////////My custom in admin page end

add_action('wp_ajax_my_action_show_login_popup','my_action_show_login_popup' );
add_action('wp_ajax_nopriv_my_action_show_login_popup','my_action_show_login_popup');
function my_action_show_login_popup()
{
    if($_SESSION['login_popup_time'] < time())
    {
        echo 'open';
    }
    else
    {
        echo 'close';
    }
    wp_die();
}

//======
//blog_and_articles Custom Post Type
//======
function blogs_and_articles_init() {

    $labels = array(
        'name' => 'Blogs & Articles',
        'singular_name' => 'Blogs & Articles',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New Blogs & Articles',
        'edit_item' => 'Edit Blogs & Articles',
        'new_item' => 'New Blogs & Articles',
        'all_items' => 'All Blogs & Articles',
        'view_item' => 'View Blogs & Articles',
        'search_items' => 'Search Blogs & Articles',
        'not_found' =>  'No Blogs & Articles',
        'not_found_in_trash' => 'No Blogs & Articles found in Trash', 
        'parent_item_colon' => '',
        'menu_name' => 'Blogs & Articles',
    );
    
    // register post type
    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,

        //'publicly_queryable' => false,
        'exclude_from_search' => true,
        'menu_position' => 22, 

        'rewrite' => array('slug' => 'blogs_and_articles'),
        'query_var' => true,
        'menu_icon' => 'dashicons-admin-post',
        //'taxonomies'  => array( 'category' ),
        'supports' => array(
            'title',
            //'editor',
            //'excerpt',
            //'trackbacks',
            'custom-fields',
            //'comments',
            //'revisions',
            //'thumbnail',
            //'author',
            //'page-attributes'
        )
    );
    register_post_type( 'blogs_and_articles', $args );
    
    
}
add_action( 'init', 'blogs_and_articles_init' );
//======
//blog_and_articles Custom Post Type end
//======

//ajax for emp entrance exam
add_action('wp_ajax_my_action_get_emp_entrance_exam','my_action_get_emp_entrance_exam' );
add_action('wp_ajax_nopriv_my_action_get_emp_entrance_exam','my_action_get_emp_entrance_exam');
function my_action_get_emp_entrance_exam(){
  //global $wpdb;

    if(!empty($_POST['level']) )
    {
        $sts_state = array(
          'key'     =>  'level',
          'value'    =>  $_POST['level'],
          'compare'  => '='
      );
    }
    if(!empty($_POST['department']) )
    {
        $sts_dept = array(
          'key'     =>  'department',
          'value'    =>  $_POST['department'],
          'compare'  => '='
      );
    }
    

    $args = array(
      'post_type' => 'emp_entrance_exam',
      'post_status' => 'publish',
      'meta_key'    => 'entrance_exam_type',
      'meta_value'  => $_POST['entrance_exam_type'],
      'posts_per_page' => -1,
      'meta_query'     =>  array(
          array(
              'relation' => 'AND',
              $sts_state,
              $sts_dept
          )
      )
  );

    $the_query = new WP_Query( $args );
    $return_department=array();
    $return_exam=array();
    $returnTxt_department='<option value="">Select Department</option>';
    $returnTxt_exam='<option value="">Select Exam</option>';
    
    if( $the_query->have_posts() ){
      while( $the_query->have_posts() ){ 
        $the_query->the_post(); 
        $values= get_fields();
        $return_department[]=$values['department'];
        $return_exam[]=$values['exam_name'];
        
    }
}

$return_department = array_filter(array_unique($return_department));
$return_exam = array_filter(array_unique($return_exam));

sort($return_department);
sort($return_exam);


foreach($return_department as $res)
{
  $returnTxt_department.='<option value="'.$res.'">'.$res.'</option>';
}
foreach($return_exam as $res)
{
  $returnTxt_exam.='<option value="'.$res.'">'.$res.'</option>';
}


if(!empty($_POST['department']) )  
  echo $returnTxt_exam;
else if(!empty($_POST['level']) )    
  echo $returnTxt_department.'*****'.$returnTxt_exam;

wp_die();
}
//======
/**
 * Add inline script to modify ACF datepicker settings- hide previous dates
 */
function themeprefix_admin_print_scripts() {
    if(function_exists('get_current_screen'))
    $screen     = get_current_screen();

    $mod_arr    = array( 'new_and_event','job_alert' );
    if( ! in_array( $screen->post_type, $mod_arr ) ) {
        return;
    }
  ?>
    <script>
        ( function( $ ) {
            acf.add_filter( 'date_picker_args', function( args ) {
                //alert(args);
                if(args['altField'][0]['id']=='acf-field_60d4343f6a569')
                {
                    args['minDate'] = 0;
                }
                if(args['altField'][0]['id']=='acf-field_60d312cca2bac')
                {
                    args['minDate'] = 0;
                }
                return args;
            } );
        } )( jQuery );
    </script>
    
  <?php
    
}
add_action( 'acf/input/admin_footer', 'themeprefix_admin_print_scripts' );
//datepicker settings- hide previous dates ends

////////////////////////////////////////////////////////////13/09/2021

//add farmland rows in nursery post type start
function eventAddrowfarmland_add_meta_box() {

  $screens = array( 'nursery' );

  foreach ( $screens as $screen ) {
    $labels= 'Farm Land';
    //if($screen == 'nursery') $labels= 'Farm Land';
      
    add_meta_box(
        'event_farmland',
        $labels,
        'event_farmland_callback',
        $screen
    );
}
}

function event_farmland_callback( $post ) {

 wp_nonce_field('event_farmland_save','event_farmland_meta_box_nonce');
 $value = get_post_meta($post->ID,'_event_farmland1_value_key',true);
 $value1 = get_post_meta($post->ID,'_event_farmland2_value_key',true);
 $value = explode('*****',$value);
 $value1 = explode('*****',$value1);
 ?>
 <table id="addfarmland_div" class="acf-table">
     <?php
     for($i=0;$i<count($value);$i++)
     {
         ?>

         <tr id="addfarmland_div_<?php echo $i;?>"><td>
            <input required type="text" name="event_farmland_field[]" id="event_farmland_field" value="<?php echo esc_attr( $value[$i] ); ?>" size="45" placeholder="Details" /></td><td>
                <input required type="text" name="event_farmlandurl_field[]" id="event_farmlandurl_field" value="<?php echo esc_attr( $value1[$i] ); ?>" size="50" placeholder="Value" /></td><td>
                    <?php if($i==0){?>
                        <button type="button" id="addfarmland" onclick="add_farmland()" class="acf-button button">Add Row</button>
                    <?php }else{?>
                        <button type="button" class="acf-button button" id="delfarmland" onclick="del_farmland(<?php echo $i;?>)">Delete Row</button>
                    <?php }?>
                </td></tr>

                <?php
            }
            ?>
        </table>
        <input type="hidden" name="event_farmland_cnt" id="event_farmland_cnt" value="<?php echo count($value);?>"  />
        <?php
    }
    add_action('add_meta_boxes','eventAddrowfarmland_add_meta_box');

    function event_farmland_save( $post_id ) {
     if( ! isset($_POST['event_farmland_meta_box_nonce'])) {
      return;
  }
  if( ! wp_verify_nonce( $_POST['event_farmland_meta_box_nonce'], 'event_farmland_save') ) {
      return;
  }
  if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
      return;
  }
  if( ! current_user_can('edit_post', $post_id)) {
      return;
  }
  if( ! isset($_POST['event_farmland_field'])) {
      return;
  }
  $event_link = implode('*****',$_POST['event_farmland_field']);
  update_post_meta( $post_id,'_event_farmland1_value_key', $event_link );

  $event_link1 = implode('*****',$_POST['event_farmlandurl_field']);
  update_post_meta( $post_id,'_event_farmland2_value_key', $event_link1 );


}
add_action('save_post','event_farmland_save');
//add farmland rows in nursery post type end

//add nurserycycle rows in nursery post type start
function eventAddrownurserycycle_add_meta_box() {

  $screens = array( 'nursery' );

  foreach ( $screens as $screen ) {
    $labels= 'Nursery Cycle(Ready to be transplanted after)';
      
    add_meta_box(
        'event_nurserycycle',
        $labels,
        'event_nurserycycle_callback',
        $screen
    );
}
}

function event_nurserycycle_callback( $post ) {

 wp_nonce_field('event_nurserycycle_save','event_nurserycycle_meta_box_nonce');
 $value = get_post_meta($post->ID,'_event_nurserycycle1_value_key',true);
 $value1 = get_post_meta($post->ID,'_event_nurserycycle2_value_key',true);
 $value = explode('*****',$value);
 $value1 = explode('*****',$value1);
 ?>
 <table id="addnurserycycle_div" class="acf-table">
     <?php
     for($i=0;$i<count($value);$i++)
     {
         ?>

         <tr id="addnurserycycle_div_<?php echo $i;?>"><td>
            <input required type="text" name="event_nurserycycle_field[]" id="event_nurserycycle_field" value="<?php echo esc_attr( $value[$i] ); ?>" size="45" placeholder="Details" /></td><td>
                <input required type="text" name="event_nurserycycleurl_field[]" id="event_nurserycycleurl_field" value="<?php echo esc_attr( $value1[$i] ); ?>" size="50" placeholder="Months" /></td><td>
                    <?php if($i==0){?>
                        <button type="button" id="addnurserycycle" onclick="add_nurserycycle()" class="acf-button button">Add Row</button>
                    <?php }else{?>
                        <button type="button" class="acf-button button" id="delnurserycycle" onclick="del_nurserycycle(<?php echo $i;?>)">Delete Row</button>
                    <?php }?>
                </td></tr>

                <?php
            }
            ?>
        </table>
        <input type="hidden" name="event_nurserycycle_cnt" id="event_nurserycycle_cnt" value="<?php echo count($value);?>"  />
        <?php
    }
    add_action('add_meta_boxes','eventAddrownurserycycle_add_meta_box');

    function event_nurserycycle_save( $post_id ) {
     if( ! isset($_POST['event_nurserycycle_meta_box_nonce'])) {
      return;
  }
  if( ! wp_verify_nonce( $_POST['event_nurserycycle_meta_box_nonce'], 'event_nurserycycle_save') ) {
      return;
  }
  if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
      return;
  }
  if( ! current_user_can('edit_post', $post_id)) {
      return;
  }
  if( ! isset($_POST['event_nurserycycle_field'])) {
      return;
  }
  $event_link = implode('*****',$_POST['event_nurserycycle_field']);
  update_post_meta( $post_id,'_event_nurserycycle1_value_key', $event_link );

  $event_link1 = implode('*****',$_POST['event_nurserycycleurl_field']);
  update_post_meta( $post_id,'_event_nurserycycle2_value_key', $event_link1 );


}
add_action('save_post','event_nurserycycle_save');
//add nurserycycle rows in nursery post type end

//add costrevenue rows in nursery post type start
function eventAddrowcostrevenue_add_meta_box() {

  $screens = array( 'nursery' );

  foreach ( $screens as $screen ) {
    $labels= 'Cost and Revenue Analysis';
      
    add_meta_box(
        'event_costrevenue',
        $labels,
        'event_costrevenue_callback',
        $screen
    );
}
}

function event_costrevenue_callback( $post ) {

 wp_nonce_field('event_costrevenue_save','event_costrevenue_meta_box_nonce');
 $value = get_post_meta($post->ID,'_event_costrevenue1_value_key',true);
 $value1 = get_post_meta($post->ID,'_event_costrevenue2_value_key',true);
 $value2 = get_post_meta($post->ID,'_event_costrevenue3_value_key',true);
 $value = explode('*****',$value);
 $value1 = explode('*****',$value1);
 $value2 = explode('*****',$value2);
 ?>
 <table id="addcostrevenue_div" class="acf-table">
     <?php
     for($i=0;$i<count($value);$i++)
     {
         ?>

         <tr id="addcostrevenue_div_<?php echo $i;?>"><td>
            <input required type="text" name="event_costrevenue_field[]" id="event_costrevenue_field" value="<?php echo esc_attr( $value[$i] ); ?>" size="30" placeholder="Details" /></td><td>
                <input required type="text" name="event_costrevenueurl_field[]" id="event_costrevenueurl_field" value="<?php echo esc_attr( $value1[$i] ); ?>" size="30" placeholder="Value" /></td>
                <td>
                <select required name="event_costrevenueselect_field[]" id="event_costrevenueselect_field">
                  <option value="">-Select Type-</option>
                  <option value="Cost(variable) per Sapling" <?php if($value2[$i]=='Cost(variable) per Sapling') echo 'selected';?>>Cost(variable) per Sapling</option>
                  <option value="Selling Price per Sapling" <?php if($value2[$i]=='Selling Price per Sapling') echo 'selected';?>>Selling Price per Sapling</option>
                </select></td>
                <td>
                    <?php if($i==0){?>
                        <button type="button" id="addcostrevenue" onclick="add_costrevenue()" class="acf-button button">Add Row</button>
                    <?php }else{?>
                        <button type="button" class="acf-button button" id="delcostrevenue" onclick="del_costrevenue(<?php echo $i;?>)">Delete Row</button>
                    <?php }?>
                </td></tr>

                <?php
            }
            ?>
        </table>
        <input type="hidden" name="event_costrevenue_cnt" id="event_costrevenue_cnt" value="<?php echo count($value);?>"  />
        <?php
    }
    add_action('add_meta_boxes','eventAddrowcostrevenue_add_meta_box');

    function event_costrevenue_save( $post_id ) {
     if( ! isset($_POST['event_costrevenue_meta_box_nonce'])) {
      return;
  }
  if( ! wp_verify_nonce( $_POST['event_costrevenue_meta_box_nonce'], 'event_costrevenue_save') ) {
      return;
  }
  if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
      return;
  }
  if( ! current_user_can('edit_post', $post_id)) {
      return;
  }
  if( ! isset($_POST['event_costrevenue_field'])) {
      return;
  }
  $event_link = implode('*****',$_POST['event_costrevenue_field']);
  update_post_meta( $post_id,'_event_costrevenue1_value_key', $event_link );

  $event_link1 = implode('*****',$_POST['event_costrevenueurl_field']);
  update_post_meta( $post_id,'_event_costrevenue2_value_key', $event_link1 );

  $event_link2 = implode('*****',$_POST['event_costrevenueselect_field']);
  update_post_meta( $post_id,'_event_costrevenue3_value_key', $event_link2 );


}
add_action('save_post','event_costrevenue_save');
//add costrevenue rows in nursery post type end


////////////////////////////14/09/2021
//======
//-horticulture Farm Custom Post Type
//======
function horticulture_calc_init() {
    $labels = array(
        'name' => 'Horticulture Farm Calculator',
        'singular_name' => 'Horticulture Farm Calculator',
        'add_new' => 'Add New',
        'add_new_item' => 'Add Horticulture Farm Calculator',
        'edit_item' => 'Edit Horticulture Farm Calculator',
        'new_item' => 'New Horticulture Farm Calculator',
        'all_items' => 'All Horticulture Farm Calculator',
        'view_item' => 'View Horticulture Farm Calculator',
        'search_items' => 'Search Horticulture Farm Calculator',
        'not_found' =>  'No Horticulture Farm Calculator',
        'not_found_in_trash' => 'No Horticulture Farm Calculator found in Trash', 
        'parent_item_colon' => '',
        'menu_name' => 'Horticulture Farm Calculator',
    );
    
    // register post type
    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,

        //'publicly_queryable' => false,
        'exclude_from_search' => true,
        'menu_position' => 22, 

        'rewrite' => array('slug' => 'horticulture_calc'),
        'query_var' => true,
        'menu_icon' => 'dashicons-admin-post',
        //'taxonomies'  => array( 'category' ),
        'supports' => array(
            'title',
            //'editor',
            //'excerpt',
            //'trackbacks',
            'custom-fields',
            //'comments',
            //'revisions',
            //'thumbnail',
            //'author',
            //'page-attributes'
        )
    );
    register_post_type( 'horticulture_calc', $args );
    
    
}
add_action( 'init', 'horticulture_calc_init' );
//======
//horticulture Farm Custom Post Type end
//======

//my_action_get_cost_calc_horticulture
//ajax cost calculator animal hubandry
add_action('wp_ajax_my_action_get_cost_calc_horticulture','my_action_get_cost_calc_horticulture' );
add_action('wp_ajax_nopriv_my_action_get_cost_calc_horticulture','my_action_get_cost_calc_horticulture');
function my_action_get_cost_calc_horticulture(){
  //global $wpdb;

if($_POST['ftype']=='Integrated')
{
        if(!empty($_POST['fish_species']))
        {
            $sts_fish_species = array(
              'key'     =>  'fish_species',
              'value'    =>  $_POST['fish_species'],
              'compare'  => '='
          );
        }
        if(!empty($_POST['bird_species']))
        {
            $sts_bird_species = array(
              'key'     =>  'bird_species',
              'value'    =>  $_POST['bird_species'],
              'compare'  => '='
          );
        }
        if(!empty($_POST['culture_system']))
        {
            $sts_culture_system = array(
              'key'     =>  'culture_system',
              'value'    =>  $_POST['culture_system'],
              'compare'  => '='
          );
        }
        
        

            $args = array(
                            'post_type' => 'integrated_farm_calc',
                            'post_status' => 'publish',
                            'posts_per_page' => -1,
                            'meta_query'     =>  array(
                                array(
                                    'key'     =>  'type',
                                    'value'   =>  $_POST['type']
                                    ),
                                $sts_fish_species,
                                $sts_bird_species,
                                $sts_culture_system
                              )
                            );
            
}
else
{
        $args = array(
                            'post_type' => 'horticulture_calc',
                            'post_status' => 'publish',
                            'posts_per_page' => -1,
                            'meta_query'     =>  array(
                                array(
                                    'key'     =>  'type',
                                    'value'   =>  $_POST['type']
                                    )
                              )
                            );
}


    $the_query = new WP_Query( $args );


    $return_species=array();
    $return_fish_species=array();
    $return_bird_species=array();
    $return_culture_system=array();
    $return_culture_medium=array();
    $returnTxt_species='<option value="">Select</option>';
    $returnTxt_fish_species='<option value="">Select</option>';
    $returnTxt_bird_species='<option value="">Select</option>';
    $returnTxt_culture_system='<option value="">Select</option>';
    $returnTxt_culture_medium='<option value="">Select</option>';

    if( $the_query->have_posts() ){
      while( $the_query->have_posts() ){ 
        $the_query->the_post(); 
        $values= get_fields();
        $return_species[]=$values['species'];
        $return_fish_species[]=$values['fish_species'];
        $return_bird_species[]=$values['bird_species'];
        $return_culture_system[]=$values['culture_system'];
        $return_culture_medium[]=$values['culture_medium'];
    }
}

$return_species = array_filter(array_unique($return_species));
$return_fish_species = array_filter(array_unique($return_fish_species));
$return_bird_species = array_filter(array_unique($return_bird_species));
$return_culture_system = array_filter(array_unique($return_culture_system));
$return_culture_medium = array_filter(array_unique($return_culture_medium));

sort($return_species);
sort($return_fish_species);
sort($return_bird_species);
sort($return_culture_system);
sort($return_culture_medium);


foreach($return_species as $res)
{
  $returnTxt_species.='<option value="'.$res.'">'.$res.'</option>';
}
foreach($return_fish_species as $res)
{
  $returnTxt_fish_species.='<option value="'.$res.'">'.$res.'</option>';
}
foreach($return_bird_species as $res)
{
  $returnTxt_bird_species.='<option value="'.$res.'">'.$res.'</option>';
}
foreach($return_culture_system as $res)
{
  $returnTxt_culture_system.='<option value="'.$res.'">'.$res.'</option>';
}
foreach($return_culture_medium as $res)
{
  $returnTxt_culture_medium.='<option value="'.$res.'">'.$res.'</option>';
}

if(!empty($_POST['culture_system']))
echo $returnTxt_culture_medium;
else if(!empty($_POST['bird_species']))
echo $returnTxt_culture_system.'*****'.$returnTxt_culture_medium;
else if(!empty($_POST['fish_species']))
echo $returnTxt_bird_species.'*****'.$returnTxt_culture_system.'*****'.$returnTxt_culture_medium;
else
echo $returnTxt_species.'*****'.$returnTxt_fish_species.'*****'.$returnTxt_bird_species.'*****'.$returnTxt_culture_system.'*****'.$returnTxt_culture_medium;
wp_die();
}
//==get total
add_action('wp_ajax_my_action_get_cost_calc_horticulture_total','my_action_get_cost_calc_horticulture_total' );
add_action('wp_ajax_nopriv_my_action_get_cost_calc_horticulture_total','my_action_get_cost_calc_horticulture_total');
function my_action_get_cost_calc_horticulture_total(){
  //global $wpdb;

if($_POST['ftype']=='Integrated')
{
        if(!empty($_POST['fish_species']))
        {
            $sts_fish_species = array(
              'key'     =>  'fish_species',
              'value'    =>  $_POST['fish_species'],
              'compare'  => '='
          );
        }
        if(!empty($_POST['bird_species']))
        {
            $sts_bird_species = array(
              'key'     =>  'bird_species',
              'value'    =>  $_POST['bird_species'],
              'compare'  => '='
          );
        }
        if(!empty($_POST['culture_system']))
        {
            $sts_culture_system = array(
              'key'     =>  'culture_system',
              'value'    =>  $_POST['culture_system'],
              'compare'  => '='
          );
        }
        if(!empty($_POST['culture_medium']))
        {
            $sts_culture_medium = array(
              'key'     =>  'culture_medium',
              'value'    =>  $_POST['culture_medium'],
              'compare'  => '='
          );
        }
        
        

            $args = array(
                            'post_type' => 'integrated_farm_calc',
                            'post_status' => 'publish',
                            'posts_per_page' => -1,
                            'meta_query'     =>  array(
                                array(
                                    'key'     =>  'type',
                                    'value'   =>  $_POST['type']
                                    ),
                                $sts_fish_species,
                                $sts_bird_species,
                                $sts_culture_system,
                                $sts_culture_medium
                              )
                            );
            
}
else
{
        $args = array(
                            'post_type' => 'horticulture_calc',
                            'post_status' => 'publish',
                            'posts_per_page' => -1,
                            'meta_query'     =>  array(
                                array(
                                    'key'     =>  'type',
                                    'value'   =>  $_POST['type']
                                    ),
                                array(
							          'key'     =>  'species',
							          'value'    =>  $_POST['species']
							      )
                              )
                            );
}


    $the_query = new WP_Query( $args );

    if( $the_query->have_posts() ){
      while( $the_query->have_posts() ){ 
        $the_query->the_post(); 
        $values= get_fields();
        $total_areas_in_ha = $values['total_areas_in_ha'];
        $water_areas_in_ha = $values['water_areas_in_ha'];
        
    }
}

if($_POST['ftype']=='Integrated')
echo $water_areas_in_ha;
else
echo $total_areas_in_ha;


wp_die();
}

//=========
//ajax for scholarship for girls
add_action('wp_ajax_my_action_get_mentor_incub_sector','my_action_get_mentor_incub_sector' );
add_action('wp_ajax_nopriv_my_action_get_mentor_incub_sector','my_action_get_mentor_incub_sector');
function my_action_get_mentor_incub_sector(){
  //global $wpdb;

    if(!empty($_POST['type']))
    {
        $sts_type = array(
          'key'     =>  'type',
          'value'    =>  $_POST['type'],
          'compare'  => '='
      );
    }
    if(!empty($_POST['state']) )
    {
        $sts_state = array(
          'key'     =>  'state',
          'value'    =>  $_POST['state'],
          'compare'  => '='
      );
    }  


    $args = array(
      'post_type' => 'mentors_and_incub',
      'post_status' => 'publish',
       'posts_per_page' => -1,
      'meta_query'     =>  array(
          array(
              'relation' => 'AND',
              $sts_type,
              $sts_state

          )
      )
  );

    $the_query = new WP_Query( $args );
    $return_state=array();
    $return_sectors=array();
    
    $returnTxt_state='<option value="">Select State</option>';
    $returnTxt_sectors='<option value="">Select Sector</option>';
    
    if( $the_query->have_posts() ){
      while( $the_query->have_posts() ){ 
        $the_query->the_post(); 
        $values= get_fields();
        $return_state[]=$values['state'];
        if($_POST['type']=='Mentor')
          $return_sectors[]=$values['sectors'];
        else
          $return_sectors[]=$values['incubator_sectors'];
        
    }
}

$return_state = array_filter(array_unique($return_state));
$return_sectors = array_filter(array_unique($return_sectors));

sort($return_state);
sort($return_sectors);


foreach($return_state as $res)
{
  $returnTxt_state.='<option value="'.$res.'">'.$res.'</option>';
}
foreach($return_sectors as $res)
{
  $returnTxt_sectors.='<option value="'.$res.'">'.$res.'</option>';
}

if(!empty($_POST['state']) )  
  echo $returnTxt_sectors;
else if(!empty($_POST['type']) )    
  echo $returnTxt_state.'*****'.$returnTxt_sectors;

wp_die();
}
//ajax call for scholarship for girls end
//=============

//ajax cost calculator fishary
add_action('wp_ajax_my_action_get_cost_calc_fishary','my_action_get_cost_calc_fishary' );
add_action('wp_ajax_nopriv_my_action_get_cost_calc_fishary','my_action_get_cost_calc_fishary');
function my_action_get_cost_calc_fishary(){
  //global $wpdb;


        if(!empty($_POST['species1']))
        {
            $sts_species = array(
              'key'     =>  'polyculture_species',
              'value'    =>  $_POST['species1'],
              'compare'  => '='
          );
        }
        if(!empty($_POST['culture_system']))
        {
            $sts_culture_system = array(
              'key'     =>  'culture_system',
              'value'    =>  $_POST['culture_system'],
              'compare'  => '='
          );
        }
        
        

            $args = array(
                            'post_type' => 'polyculture_calc',
                            'post_status' => 'publish',
                            'posts_per_page' => -1,
                            'meta_query'     =>  array(
                                array(
                                    'key'     =>  'sub_type',
                                    'value'   =>  $_POST['sub_type']
                                    ),
                                $sts_species,
                                $sts_culture_system
                              )
                            );
            




    $the_query = new WP_Query( $args );


    $return_species=array();
    $return_fish_species=array();
    $return_bird_species=array();
    $return_culture_system=array();
    $return_culture_medium=array();
    $returnTxt_species='<option value="">Select</option>';
    $returnTxt_culture_system='<option value="">Select</option>';
    $returnTxt_culture_medium='<option value="">Select</option>';

    if( $the_query->have_posts() ){
      while( $the_query->have_posts() ){ 
        $the_query->the_post(); 
        $values= get_fields();
        $return_species[]=$values['polyculture_species'];
        $return_culture_system[]=$values['culture_system'];
        $return_culture_medium[]=$values['culture_medium'];
    }
}

$return_species = array_filter(array_unique($return_species));
$return_culture_system = array_filter(array_unique($return_culture_system));
$return_culture_medium = array_filter(array_unique($return_culture_medium));

sort($return_species);
sort($return_culture_system);
sort($return_culture_medium);


foreach($return_species as $res)
{
  $returnTxt_species.='<option value="'.$res.'">'.$res.'</option>';
}
foreach($return_culture_system as $res)
{
  $returnTxt_culture_system.='<option value="'.$res.'">'.$res.'</option>';
}
foreach($return_culture_medium as $res)
{
  $returnTxt_culture_medium.='<option value="'.$res.'">'.$res.'</option>';
}

if(!empty($_POST['culture_system']))
echo $returnTxt_culture_medium;
else if(!empty($_POST['species1']))
echo $returnTxt_culture_system.'*****'.$returnTxt_culture_medium;
else
echo $returnTxt_species.'*****'.$returnTxt_culture_system.'*****'.$returnTxt_culture_medium;

wp_die();
}

add_action('wp_ajax_my_action_get_cost_calc_fishary_total','my_action_get_cost_calc_fishary_total' );
add_action('wp_ajax_nopriv_my_action_get_cost_calc_fishary_total','my_action_get_cost_calc_fishary_total');
function my_action_get_cost_calc_fishary_total(){
  //global $wpdb;


        if(!empty($_POST['species1']))
        {
            $sts_species = array(
              'key'     =>  'polyculture_species',
              'value'    =>  $_POST['species1'],
              'compare'  => '='
          );
        }
        if(!empty($_POST['culture_system']))
        {
            $sts_culture_system = array(
              'key'     =>  'culture_system',
              'value'    =>  $_POST['culture_system'],
              'compare'  => '='
          );
        }
        if(!empty($_POST['culture_medium']))
        {
            $sts_culture_medium= array(
              'key'     =>  'culture_medium',
              'value'    =>  $_POST['culture_medium'],
              'compare'  => '='
          );
        }
        
        $water_areas_in_ha='0';

        if($_POST['type']=='Polyculture')
        {
            $args = array(
                            'post_type' => 'polyculture_calc',
                            'post_status' => 'publish',
                            'posts_per_page' => -1,
                            'meta_query'     =>  array(
                                array(
                                    'key'     =>  'sub_type',
                                    'value'   =>  $_POST['sub_type']
                                    ),
                                $sts_species,
                                $sts_culture_system,
                                $sts_culture_medium
                              )
                            );
    }
    else
    {
        $args = array(
                            'post_type' => 'monoculture_calc',
                            'post_status' => 'publish',
                            'posts_per_page' => '1',
                            'meta_query'     =>  array(
                                array(
                                    'key'     =>  'type',
                                    'value'   =>  $_POST['type']
                                    ),
                                
                                array(
                                    'key'     =>  'monoculture_species',
                                    'value'   =>  $_POST['species2']
                                )
                                
                              )
                            );
    }
            
    $the_query = new WP_Query( $args );

    if( $the_query->have_posts() ){
      while( $the_query->have_posts() ){ 
        $the_query->the_post(); 
        $values= get_fields();
        $water_areas_in_ha=$values['water_areas_in_ha'];
    }
    }


echo $water_areas_in_ha;

wp_die();
}
//ajax cost calculator fishary end

//embed youtube link
function convertYoutube($string) {
    return preg_replace(
        "/\s*[a-zA-Z\/\/:\.]*youtu(be.com\/watch\?v=|.be\/)([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i",
        "https://www.youtube.com/embed/$2",
        $string
    );
}
//embed youtube link end

/** "New user" email to john@snow.com instead of admin. */
/*add_filter( 'wp_new_user_notification_email_admin', 'my_wp_new_user_notification_email_admin', 10, 3 );
function my_wp_new_user_notification_email_admin( $notification, $user, $blogname ) {
    $notification['to'] = 'sbachhav5@gmail.com';
    return $notification;
}*/

/*add_action( 'user_register', 'so27450945_user_register', 10, 1 );
function so27450945_user_register( $user_id )
{
    $user = get_user_by( 'id', $user_id );

    $blogname = wp_specialchars_decode( get_option( 'blogname' ), ENT_QUOTES );

    $message  = sprintf( __( 'New user registration on your site %s:' ), $blogname ) . "\r\n\r\n";
    $message .= sprintf( __( 'Username: %s'), $user->user_login ) . "\r\n\r\n";
    $message .= sprintf( __( 'E-mail: %s'), $user->user_email ) . "\r\n";

    @wp_mail( get_option( 'admin_email' ), sprintf( __( '[%s] New User Registration' ), $blogname ), $message);
}*/

//======
//trading Service Post Type
//======
    function service_trading_init() {
        $labels = array(
            'name' => 'Services Trading',
            'singular_name' => 'Services Trading',
            'add_new' => 'Add New',
            'add_new_item' => 'Add Services Trading',
            'edit_item' => 'Edit Services Trading',
            'new_item' => 'New Services Trading',
            'all_items' => 'All Services Trading',
            'view_item' => 'View Services Trading',
            'search_items' => 'Search Services Trading',
            'not_found' =>  'No Services Trading',
            'not_found_in_trash' => 'No Services Trading found in Trash', 
            'parent_item_colon' => '',
            'menu_name' => 'Services Trading',
        );

    // register post type
        $args = array(
            'labels' => $labels,
            'public' => true,
            'has_archive' => true,
            'show_ui' => true,
            'capability_type' => 'post',
            'hierarchical' => false,

        //'publicly_queryable' => false,
            'exclude_from_search' => true,
            'menu_position' => 22, 

            'rewrite' => array('slug' => 'service_trading'),
            'query_var' => true,
            'menu_icon' => 'dashicons-admin-post',
        //'taxonomies'  => array( 'category' ),
            'supports' => array(
                'title',
                'editor',
            //'excerpt',
            //'trackbacks',
                'custom-fields',
            //'comments',
            //'revisions',
            //'thumbnail',
            //'author',
                'page-attributes'
            )
        );
        register_post_type( 'service_trading', $args );

    
    }
    add_action( 'init', 'service_trading_init' );
//======
//trading Service Post Type end
//======

//new code for yearwise capacity conventional sector
//add project cost rows in food_processing post type
function eventAddrowyearwise_con_add_meta_box() {

  $screens = array( 'conventional_sector','bamboo','services' );

  foreach ( $screens as $screen ) {
    $label = 'Year wise capacity utilization';
    add_meta_box(
        'event_yearwise_con',
        $label,
        'event_yearwise_con_callback',
        $screen
    );
}
}

function event_yearwise_con_callback( $post ) {

 wp_nonce_field('event_yearwise_con_save','event_yearwise_con_meta_box_nonce');
 $value = get_post_meta($post->ID,'_event_yearwise1_con_value_key',true);
 $value1 = get_post_meta($post->ID,'_event_yearwise2_con_value_key',true);
 $value2 = get_post_meta($post->ID,'_event_yearwise3_con_value_key',true);
 $value3 = get_post_meta($post->ID,'_event_yearwise4_con_value_key',true);
 $value = explode('*****',$value);
 $value1 = explode('*****',$value1);
 $value2 = explode('*****',$value2);
 $value3 = explode('*****',$value3);
 ?>
 <table id="addyearwise_con_div" class="acf-table">
     <?php
     for($i=0;$i<count($value);$i++)
     {
         ?>

         <tr id="addyearwise_con_div_<?php echo $i;?>"><td>
            <input required type="text" name="event_yearwise_con_field[]" id="event_yearwise_con_field" value="<?php echo esc_attr( $value[$i] ); ?>" size="40" placeholder="Year" /></td>
            <td>
                <input required type="text" name="event_yearwise2_con_field[]" id="event_yearwise2_con_field" value="<?php echo esc_attr( $value2[$i] ); ?>" size="40" placeholder="Year %" /></td>
                        <td>
                            <?php if($i==0){?>
                                <button type="button" id="addyearwise_con" onclick="add_yearwise_con()" class="acf-button button">Add Row</button>
                            <?php }else{?>
                                <button type="button" class="acf-button button" id="delyearwise_con" onclick="del_yearwise_con(<?php echo $i;?>)">Delete Row</button>
                            <?php }?>
                        </td></tr>

                        <?php
                    }
                    ?>
                </table>
                <input type="hidden" name="event_yearwise_con_cnt" id="event_yearwise_con_cnt" value="<?php echo count($value);?>"  />
                <?php
            }
            add_action('add_meta_boxes','eventAddrowyearwise_con_add_meta_box');

            function event_yearwise_con_save( $post_id ) {
             if( ! isset($_POST['event_yearwise_con_meta_box_nonce'])) {
              return;
          }
          if( ! wp_verify_nonce( $_POST['event_yearwise_con_meta_box_nonce'], 'event_yearwise_con_save') ) {
              return;
          }
          if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
              return;
          }
          if( ! current_user_can('edit_post', $post_id)) {
              return;
          }
          if( ! isset($_POST['event_yearwise_con_field'])) {
              return;
          }
          $event_link = implode('*****',$_POST['event_yearwise_con_field']);
          update_post_meta( $post_id,'_event_yearwise1_con_value_key', $event_link );

          $event_link2 = implode('*****',$_POST['event_yearwise2_con_field']);
          update_post_meta( $post_id,'_event_yearwise3_con_value_key', $event_link2 );

      }
      add_action('save_post','event_yearwise_con_save');
//add project cost rows in food_processing post type end

//ajax contact form unique no
add_action('wp_ajax_my_action_get_uniqueno','my_action_get_uniqueno' );
add_action('wp_ajax_nopriv_my_action_get_uniqueno','my_action_get_uniqueno');
function my_action_get_uniqueno(){
echo time();
wp_die();
}


//======
//home_top_link Custom Post Type
//======
function home_top_link_init() {

    $labels = array(
        'name' => 'Home Top Link',
        'singular_name' => 'Home Top Link',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New Home Top Link',
        'edit_item' => 'Edit Home Top Link',
        'new_item' => 'New Home Top Link',
        'all_items' => 'All Home Top Link',
        'view_item' => 'View Home Top Link',
        'search_items' => 'Search Home Top Link',
        'not_found' =>  'No Home Top Link',
        'not_found_in_trash' => 'No Home Top Link found in Trash', 
        'parent_item_colon' => '',
        'menu_name' => 'Home Top Link',
    );
    
    // register post type
    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,

        //'publicly_queryable' => false,
        'exclude_from_search' => true,
        'menu_position' => 22, 

        'rewrite' => array('slug' => 'home_top_link'),
        'query_var' => true,
        'menu_icon' => 'dashicons-admin-post',
        //'taxonomies'  => array( 'category' ),
        'supports' => array(
            'title',
            //'editor',
            //'excerpt',
            //'trackbacks',
            'custom-fields',
            //'comments',
            //'revisions',
            //'thumbnail',
            //'author',
            //'page-attributes'
        )
    );
    register_post_type( 'home_top_link', $args );
    
    
}
add_action( 'init', 'home_top_link_init' );
//======
//home_top_link Custom Post Type end
//======


//new changes - 12-12-2022
//======
//gallery Custom Post Type
//======
function gallery_init() {

    $labels = array(
        'name' => 'Gallery',
        'singular_name' => 'Gallery',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New Gallery',
        'edit_item' => 'Edit Gallery',
        'new_item' => 'New Gallery',
        'all_items' => 'All Gallery',
        'view_item' => 'View Gallery',
        'search_items' => 'Search Gallery',
        'not_found' =>  'No Gallery',
        'not_found_in_trash' => 'No Gallery found in Trash', 
        'parent_item_colon' => '',
        'menu_name' => 'Gallery',
    );
    
    // register post type
    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,

        //'publicly_queryable' => false,
        'exclude_from_search' => true,
        'menu_position' => 22, 

        'rewrite' => array('slug' => 'gallery'),
        'query_var' => true,
        'menu_icon' => 'dashicons-admin-post',
        //'taxonomies'  => array( 'category' ),
        'supports' => array(
            'title',
            //'editor',
            //'excerpt',
            //'trackbacks',
            'custom-fields',
            //'comments',
            //'revisions',
            //'thumbnail',
            //'author',
            //'page-attributes'
        )
    );
    register_post_type( 'gallery', $args );
    
    
}
add_action( 'init', 'gallery_init' );
//======
//gallery Custom Post Type end
//======





//multiple image upload in gallery post type start
// Add Meta Box to post
add_action( 'add_meta_boxes', 'multi_media_uploader_meta_box' );

function multi_media_uploader_meta_box() {
  add_meta_box( 'my-post-box', 'Add Multiple Photos<br><p class="description">Note: Select multiple photos by pressing Ctrl</p>', 'multi_media_uploader_meta_box_func', 'gallery', 'normal', 'high' );
}

function multi_media_uploader_meta_box_func($post) {
  $banner_img = get_post_meta($post->ID,'gallery_multi_img',true);
  ?>
  <style type="text/css">
    .multi-upload-medias ul li .delete-img { position: absolute; right: 3px; top: 2px; background: aliceblue; border-radius: 50%; cursor: pointer; font-size: 14px; line-height: 20px; color: red; }
    .multi-upload-medias ul li { width: 120px; display: inline-block; vertical-align: middle; margin: 5px; position: relative; }
    .multi-upload-medias ul li img { width: 100%; }
  </style>

  <table cellspacing="10" cellpadding="10">
    <tr>
      <td>Photos</td>
      <td>
        <?php echo multi_media_uploader_field( 'gallery_multi_img', $banner_img ); ?>
      </td>
    </tr>
  </table>

  <script type="text/javascript">
    jQuery(function($) {

      $('body').on('click', '.wc_multi_upload_image_button', function(e) {
        e.preventDefault();

        var button = $(this),
        custom_uploader = wp.media({
          title: 'Insert Photos',
          button: { text: 'Use this Photo' },
          multiple: true,
          library: {
            type: [ 'image' ]
          }
        }).on('select', function() {
          var attech_ids = '';
          attachments
          var attachments = custom_uploader.state().get('selection'),
          attachment_ids = new Array(),
          i = 0;
          attachments.each(function(attachment) {
            attachment_ids[i] = attachment['id'];
            attech_ids += ',' + attachment['id'];
            if (attachment.attributes.type == 'image') {
              $(button).siblings('ul').append('<li data-attechment-id="' + attachment['id'] + '"><a href="' + attachment.attributes.url + '" target="_blank"><img class="true_pre_image" src="' + attachment.attributes.url + '" /></a><i class=" dashicons dashicons-no delete-img"></i></li>');
            } else {
              $(button).siblings('ul').append('<li data-attechment-id="' + attachment['id'] + '"><a href="' + attachment.attributes.url + '" target="_blank"><img class="true_pre_image" src="' + attachment.attributes.icon + '" /></a><i class=" dashicons dashicons-no delete-img"></i></li>');
            }

            i++;
          });

          var ids = $(button).siblings('.attechments-ids').attr('value');
          if (ids) {
            var ids = ids + attech_ids;
            $(button).siblings('.attechments-ids').attr('value', ids);
          } else {
            $(button).siblings('.attechments-ids').attr('value', attachment_ids);
          }
          $(button).siblings('.wc_multi_remove_image_button').show();
        })
        .open();
      });

      $('body').on('click', '.wc_multi_remove_image_button', function() {
        $(this).hide().prev().val('').prev().addClass('button').html('Add Media');
        $(this).parent().find('ul').empty();
        return false;
      });

    });

    jQuery(document).ready(function() {
      jQuery(document).on('click', '.multi-upload-medias ul li i.delete-img', function() {
        var ids = [];
        var this_c = jQuery(this);
        jQuery(this).parent().remove();
        jQuery('.multi-upload-medias ul li').each(function() {
          ids.push(jQuery(this).attr('data-attechment-id'));
        });
        jQuery('.multi-upload-medias').find('input[type="hidden"]').attr('value', ids);
      });
    })
  </script>

  <?php
}


function multi_media_uploader_field($name, $value = '') {
  $image = '">Add Media';
  $image_str = '';
  $image_size = 'full';
  $display = 'none';
  $value = explode(',', $value);

  if (!empty($value)) {
    foreach ($value as $values) {
      if ($image_attributes = wp_get_attachment_image_src($values, $image_size)) {
        $image_str .= '<li data-attechment-id=' . $values . '><a href="' . $image_attributes[0] . '" target="_blank"><img src="' . $image_attributes[0] . '" /></a><i class="dashicons dashicons-no delete-img"></i></li>';
      }
    }

  }

  if($image_str){
    $display = 'inline-block';
  }

  return '<div class="multi-upload-medias"><ul>' . $image_str . '</ul><a href="#" class="wc_multi_upload_image_button button' . $image . '</a><input type="hidden" class="attechments-ids ' . $name . '" name="' . $name . '" id="' . $name . '" value="' . esc_attr(implode(',', $value)) . '" /><a href="#" class="wc_multi_remove_image_button button" style="display:inline-block;display:' . $display . '">Remove media</a></div>';
}



function wc_meta_box_save( $post_id ) {
  if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
   // return; 
  }

  if( !current_user_can( 'edit_post' ) ){
   // return; 
  }
  
  if( isset( $_POST['gallery_multi_img'] ) ){
    update_post_meta( $post_id, 'gallery_multi_img', $_POST['gallery_multi_img'] );
  }
}
// Save Meta Box values.
add_action( 'save_post', 'wc_meta_box_save' );
//multiple image upload in gallery post type end

//rewrite url for highrer education
add_action('init', 'dcc_rewrite_tags');
function dcc_rewrite_tags() {
    add_rewrite_tag('%flag%', '([^&]+)');
}
function custom_rewrite_basic() {
    
    $request = remove_query_arg( 'paged' );
	

    //echo '>>'.$pagenum;
	$home_root = parse_url( home_url() );
	$home_root = ( isset( $home_root['path'] ) ) ? $home_root['path'] : '';
	$home_root = preg_quote( $home_root, '|' );

	$request = preg_replace( '|^' . $home_root . '|i', '', $request );
	$request = preg_replace( '|^/+|', '', $request );
	$request = explode('/',$request);
	
	$cust_arr= array('higher-education-india-list',
	'learn-and-earn-details',
	'career-coach-search',
	'study-in-north-east-list',
	'study-in-abroad-list','scholarships-list','fellowship-list','e-learning-details',
	'find-an-intern-details', 'employment-entrance-exam-details', 'conventional-sector-details',
	'upskill-details','job-alert-details','job-opportunity-details','horticulture-details',
	'know-your-approvals-list','schemes-policies-details','market-support-infrastructure-details',
	'market-support-details','credit-linkage-support-details','training-details','mentors',
	'incubators','apps-journal-details','ncs-job-details','ncs-job-home');
	
    if($request[1]!='page' && in_array($request[0],$cust_arr))
    {
        
    $page_data = get_page_by_path( $request[0] );
    $prolist_pageid = $page_data->ID;
    add_rewrite_rule('^'.$request[0].'/([a-zA-Z0-9\-:,&]+)/?', 'index.php?flag=$matches[1]&page_id='.$prolist_pageid.'', 'top');
    
    /*$page_data = get_page_by_path( 'learn-and-earn-details' );
    $prolist_pageid = $page_data->ID;
    add_rewrite_rule('^learn-and-earn-details/([a-zA-Z0-9\-]+)/?', 'index.php?flag=$matches[1]&page_id='.$prolist_pageid.'', 'top');
    
    $page_data = get_page_by_path( 'career-coach-search' );
    $prolist_pageid = $page_data->ID;
    add_rewrite_rule('^career-coach-search/([a-zA-Z0-9\-]+)/?', 'index.php?flag=$matches[1]&page_id='.$prolist_pageid.'', 'top');
    
    
    $page_data = get_page_by_path( 'study-in-north-east-list' );
    $prolist_pageid = $page_data->ID;
    add_rewrite_rule('^study-in-north-east-list/([a-zA-Z0-9\-]+)/?', 'index.php?flag=$matches[1]&page_id='.$prolist_pageid.'', 'top');
    
    $page_data = get_page_by_path( 'study-in-abroad-list' );
    $prolist_pageid = $page_data->ID;
    add_rewrite_rule('^study-in-abroad-list/([a-zA-Z0-9\-]+)/?', 'index.php?flag=$matches[1]&page_id='.$prolist_pageid.'', 'top');
    
    $page_data = get_page_by_path( 'scholarships-list' );
    $prolist_pageid = $page_data->ID;
    add_rewrite_rule('^scholarships-list/([a-zA-Z0-9\-]+)/?', 'index.php?flag=$matches[1]&page_id='.$prolist_pageid.'', 'top');
    
    $page_data = get_page_by_path( 'fellowship-list' );
    $prolist_pageid = $page_data->ID;
    add_rewrite_rule('^fellowship-list/([a-zA-Z0-9\-]+)/?', 'index.php?flag=$matches[1]&page_id='.$prolist_pageid.'', 'top');

    
    $page_data = get_page_by_path( 'e-learning-details' );
    $prolist_pageid = $page_data->ID;
    add_rewrite_rule('^e-learning-details/([a-zA-Z0-9\-:]+)/?', 'index.php?flag=$matches[1]&page_id='.$prolist_pageid.'', 'top');

    //new code 11-09-2023
    
    $page_data = get_page_by_path( 'find-an-intern-details' );
    $prolist_pageid = $page_data->ID;
    add_rewrite_rule('^find-an-intern-details/([a-zA-Z0-9\-:]+)/?', 'index.php?flag=$matches[1]&page_id='.$prolist_pageid.'', 'top');
    
    $page_data = get_page_by_path( 'employment-entrance-exam-details' );
    $prolist_pageid = $page_data->ID;
    add_rewrite_rule('^employment-entrance-exam-details/([a-zA-Z0-9\-:]+)/?', 'index.php?flag=$matches[1]&page_id='.$prolist_pageid.'', 'top');
    
    $page_data = get_page_by_path( 'conventional-sector-details' );
    $prolist_pageid = $page_data->ID;
    add_rewrite_rule('^conventional-sector-details/([a-zA-Z0-9\-:]+)/?', 'index.php?flag=$matches[1]&page_id='.$prolist_pageid.'', 'top');
    
     $page_data = get_page_by_path( 'upskill-details' );
    $prolist_pageid = $page_data->ID;
    add_rewrite_rule('^upskill-details/([a-zA-Z0-9\-:]+)/?', 'index.php?flag=$matches[1]&page_id='.$prolist_pageid.'', 'top');
    
    $page_data = get_page_by_path( 'job-alert-details' );
    $prolist_pageid = $page_data->ID;
    add_rewrite_rule('^job-alert-details/([a-zA-Z0-9\-:,&]+)/?', 'index.php?flag=$matches[1]&page_id='.$prolist_pageid.'', 'top');
    
    $page_data = get_page_by_path( 'job-opportunity-details' );
    $prolist_pageid = $page_data->ID;
    add_rewrite_rule('^job-opportunity-details/([a-zA-Z0-9\-:,&]+)/?', 'index.php?flag=$matches[1]&page_id='.$prolist_pageid.'', 'top');
    
    $page_data = get_page_by_path( 'horticulture-details' );
    $prolist_pageid = $page_data->ID;
    add_rewrite_rule('^horticulture-details/([a-zA-Z0-9\-:,&]+)/?', 'index.php?flag=$matches[1]&page_id='.$prolist_pageid.'', 'top');
  
    $page_data = get_page_by_path( 'know-your-approvals-list' );
    $prolist_pageid = $page_data->ID;
    add_rewrite_rule('^know-your-approvals-list/([a-zA-Z0-9\-:,&]+)/?', 'index.php?flag=$matches[1]&page_id='.$prolist_pageid.'', 'top');
    
    $page_data = get_page_by_path( 'schemes-policies-details' );
    $prolist_pageid = $page_data->ID;
    add_rewrite_rule('^schemes-policies-details/([a-zA-Z0-9\-:,&]+)/?', 'index.php?flag=$matches[1]&page_id='.$prolist_pageid.'', 'top');
    
    $page_data = get_page_by_path( 'market-support-infrastructure-details' );
    $prolist_pageid = $page_data->ID;
    add_rewrite_rule('^market-support-infrastructure-details/([a-zA-Z0-9\-:,&]+)/?', 'index.php?flag=$matches[1]&page_id='.$prolist_pageid.'', 'top');
    
    $page_data = get_page_by_path( 'market-support-details' );
    $prolist_pageid = $page_data->ID;
    add_rewrite_rule('^market-support-details/([a-zA-Z0-9\-:,&]+)/?', 'index.php?flag=$matches[1]&page_id='.$prolist_pageid.'', 'top');
    
    $page_data = get_page_by_path( 'credit-linkage-support-details' );
    $prolist_pageid = $page_data->ID;
    add_rewrite_rule('^credit-linkage-support-details/([a-zA-Z0-9\-:,&]+)/?', 'index.php?flag=$matches[1]&page_id='.$prolist_pageid.'', 'top');

    $page_data = get_page_by_path( 'training-details' );
    $prolist_pageid = $page_data->ID;
    add_rewrite_rule('^training-details/([a-zA-Z0-9\-:,&]+)/?', 'index.php?flag=$matches[1]&page_id='.$prolist_pageid.'', 'top');
    
    $page_data = get_page_by_path( 'mentors' );
    $prolist_pageid = $page_data->ID;
    add_rewrite_rule('^mentors/([a-zA-Z0-9\-:,&]+)/?', 'index.php?flag=$matches[1]&page_id='.$prolist_pageid.'', 'top');
    
    $page_data = get_page_by_path( 'incubators' );
    $prolist_pageid = $page_data->ID;
    add_rewrite_rule('^incubators/([a-zA-Z0-9\-:,&]+)/?', 'index.php?flag=$matches[1]&page_id='.$prolist_pageid.'', 'top');
    
    $page_data = get_page_by_path( 'apps-journal-details' );
    $prolist_pageid = $page_data->ID;
    add_rewrite_rule('^apps-journal-details/([a-zA-Z0-9\-:,&]+)/?', 'index.php?flag=$matches[1]&page_id='.$prolist_pageid.'', 'top');*/
    }
}
add_action('init', 'custom_rewrite_basic');
//rewrite url for highrer education end


/**
 * Create Custo Post Type for testamonial
 */

function create_testamonial_post_type() {

    $labels = array(
        'name' => __( 'Testamonial' ),
        'singular_name' => __( 'Testamonial' ),
        'all_items'           => __( 'All Testamonial' ),
        'view_item'           => __( 'View Testamonial' ),
        'add_new_item'        => __( 'Add New Testamonial' ),
        'add_new'             => __( 'Add New Testamonial' ),
        'edit_item'           => __( 'Edit Testamonial' ),
        'update_item'         => __( 'Update Testamonial' ),
        'search_items'        => __( 'Search Testamonial' ),
        'search_items' => __('Testamonial')
    );

    $args = array(
        'labels' => $labels,
        'description' => 'Add New Testamonial contents',
        'menu_position' => 21,
        'public' => true,
        'has_archive' => true,
        'map_meta_cap' => true,
        'capability_type' => 'post',
        'hierarchical' => true,
        'rewrite' => array('slug' => false),
        'menu_icon'=>'dashicons-format-image',
        'supports' => array(
            'title',
            'thumbnail',
            //'excerpt'
        ),
    );
    register_post_type( 'testamonial', $args);

}
add_action( 'init', 'create_testamonial_post_type' );

// NCS visitor hit count code 
function ncs_portal_hit_count() {
    // Get the current count from the database
    $current_count = get_option('ncs_portal_hit_count', 0);
    
    // Increment the count
    $current_count++;
    
    // Update the count in the database
    update_option('ncs_portal_hit_count', $current_count);
    
    // Return a JSON response
    wp_send_json_success($current_count);
}

// Hook for logged-in users
add_action('wp_ajax_ncs_portal_hit_count', 'ncs_portal_hit_count');

// Hook for non-logged-in users
add_action('wp_ajax_nopriv_ncs_portal_hit_count', 'ncs_portal_hit_count');

//===============================12-05-2025===================================



//add approval in post type post type
        //   function eventAddrowoperation_add_meta_box_post() {

        //       $screens = array( 'know_your_approval' );

        //       foreach ( $screens as $screen ) {
        //         add_meta_box(
        //             'event_operation_post',
        //             'Post-Operation',
        //             'event_operation_callback_post',
        //             $screen
        //         );
        //     }
        // }

        function event_operation_callback_post( $post ) {

         wp_nonce_field('event_approval_save_post','event_operation_post_meta_box_nonce');
         $value = get_post_meta($post->ID,'_event_operation_post_value_key',true);
         $value1 = get_post_meta($post->ID,'_event_onature_post_value_key',true);
         $value2 = get_post_meta($post->ID,'_event_odescription_post_value_key',true);
         $value3 = get_post_meta($post->ID,'_event_oissue_post_value_key',true);
         $value4 = get_post_meta($post->ID,'_event_olink_post_value_key',true);
         $value5 = get_post_meta($post->ID,'_event_oentity_post_value_key',true);
         $value = explode('*****',$value);
         $value1 = explode('*****',$value1);
         $value2 = explode('*****',$value2);
         $value3 = explode('*****',$value3);
         $value4 = explode('*****',$value4);
         $value5 = explode('*****',$value5);
         ?>
         <table id="addoperation_post_div">
             <?php
             for($i=0;$i<count($value);$i++)
             {
                 ?>

                 <tr id="addoperation_post_div_<?php echo $i;?>"><td>
                    <input required type="text" name="event_otitle_post_field[]" id="event_otitle_post_field" value="<?php echo esc_attr( $value[$i] ); ?>" size="30" placeholder="Approval Name" /></td><td>
                        <input type="text" name="event_onature_post_field[]" id="event_onature_post_field" value="<?php echo esc_attr( $value1[$i] ); ?>" size="40" placeholder="Nature" /></td><td>
                            <textarea required name="event_odesc2_post_field[]" id="event_odesc2_post_field"  cols="40" placeholder="Description" ><?php echo esc_attr( $value2[$i] ); ?></textarea></td></tr>
                            <tr id="addoperation_div1_<?php echo $i;?>"><td>
                                <input required type="text" name="event_oissue_post_field[]" id="event_oissue_post_field" value="<?php echo esc_attr( $value3[$i] ); ?>" size="30" placeholder="Issuing Authority" /></td><td >
                                    <textarea required name="event_olink_post_field[]" id="event_olink_post_field" cols="40" placeholder="Apply" ><?php echo esc_attr( $value4[$i] ); ?></textarea></td><td style="text-align: right;">
                                        <select  type="text" style="width: 180px; display: none;" name="event_oentity_field[]" id="event_oentity_field">
                                          <option value="">-Select Entity-</option>
                                          <option value="Proprietorship" <?php if(esc_attr( $value5[$i] )=='Proprietorship') echo 'selected';?>>Proprietorship</option>
                                          <option value="Partnership" <?php if(esc_attr( $value5[$i] )=='Partnership') echo 'selected';?>>Partnership</option>
                                          <option value="LLP" <?php if(esc_attr( $value5[$i] )=='LLP') echo 'selected';?>>LLP</option>
                                          <option value="Company" <?php if(esc_attr( $value5[$i] )=='Company') echo 'selected';?>>Company</option>
                                          <option value="Society" <?php if(esc_attr( $value5[$i] )=='Society') echo 'selected';?>>Society</option>
                                      </select>

                                      <?php if($i==0){?>
                                        <button type="button" id="addoperation_post" onclick="add_operation_post()" class="acf-button button">Add Row</button>
                                    <?php }else{?>
                                        <button type="button" class="acf-button button" id="deloperation_post" onclick="del_operation_post(<?php echo $i;?>)">Delete Row</button>
                                    <?php }?>
                                </td></tr>
                                <tr id="addoperation_post_div2_<?php echo $i;?>"><td colspan="3"><hr></td></tr>
                                <?php
                            }
                            ?>
                        </table>
                        <input type="hidden" name="event_operation_post_cnt" id="event_operation_post_cnt" value="<?php echo count($value);?>"  />
                        <?php
                    }
                    add_action('add_meta_boxes','eventAddrowoperation_add_meta_box_post');

                    function event_operation_save_post( $post_id ) {
                     if( ! isset($_POST['event_operation_post_meta_box_nonce'])) {
                      return;
                  }
                  if( ! wp_verify_nonce( $_POST['event_operation_post_meta_box_nonce'], 'event_approval_save_post') ) {
                      return;
                  }
                  if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
                      return;
                  }
                  if( ! current_user_can('edit_post', $post_id)) {
                      return;
                  }
                  if( ! isset($_POST['event_otitle_post_field'])) {
                      return;
                  }
                  $event_link = implode('*****',$_POST['event_otitle_post_field']);
                  update_post_meta( $post_id,'_event_operation_post_value_key', $event_link );

                  $event_link1 = implode('*****',$_POST['event_onature_post_field']);
                  update_post_meta( $post_id,'_event_onature_post_value_key', $event_link1 );

                  $event_link2 = implode('*****',$_POST['event_odesc2_post_field']);
                  update_post_meta( $post_id,'_event_odescription_post_value_key', $event_link2 );

                  $event_link3 = implode('*****',$_POST['event_oissue_post_field']);
                  update_post_meta( $post_id,'_event_oissue_post_value_key', $event_link3);

                  $event_link4 = implode('*****',$_POST['event_olink_post_field']);
                  update_post_meta( $post_id,'_event_olink_post_value_key', $event_link4);

                  $event_link5 = implode('*****',$_POST['event_oentity_post_field']);
                  update_post_meta( $post_id,'_event_oentity_post_value_key', $event_link5);
              }
              add_action('save_post','event_operation_save_post');
//add approval in post type end


