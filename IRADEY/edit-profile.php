<?php /*Template Name: Edit Profile */ ?>
<?php get_header(); ?>

<?php
if(is_user_logged_in()) {
  $exp_checkbox=array();

  $rowcount= $wpdb->get_var("SELECT COUNT(*) FROM wp_sendpress_subscribers WHERE email = '".$current_user->user_email."' ");
  if($rowcount==0)
  {
      $wpdb->query("INSERT INTO `wp_sendpress_subscribers` (`email`, `join_date`, `status`, `registered_ip`, `identity_key`, `bounced`, `firstname`, `lastname`, `wp_user_id`, `phonenumber`, `salutation`) VALUES ('".$current_user->user_email."', '".date('Y-m-d H:i:s')."', '1', '', '".time()."', '0', '".$current_user->user_firstname."', '".$current_user->user_lastname."', '".get_current_user_id()."', NULL, NULL)");
  }
  $subres= $wpdb->get_results("SELECT subscriberID FROM wp_sendpress_subscribers WHERE email = '".$current_user->user_email."' ");
  $subscriberID = $subres[0]->subscriberID;

  if(isset($_POST['edit_preference']))
  {
      /*$checkbox = $_POST['checkbox'];
      if(!empty($checkbox)) $imp_checkbox = implode(',',$checkbox);
      else $imp_checkbox='';

      $query = "UPDATE wp_users set preference = '".$imp_checkbox."'  where ID='".get_current_user_id()."' ";
      $wpdb->query($query);*/
      
      $exp_checkbox = $_POST['checkbox'];

      $result = $wpdb->get_results("SELECT ID, post_title FROM wp_posts where post_type='sendpress_list' and ID in (select post_id from wp_postmeta where meta_key='sync_role' and meta_value='none')");
      foreach($result as $row) 
      {
          $post_id=$row->ID;
          $post_title=$row->post_title;

          if($subscriberID>0)
          {
              $subscriberquerylist= $wpdb->get_results("SELECT id FROM wp_sendpress_list_subscribers WHERE listID = '".$post_id."' and subscriberID='".$subscriberID."' ");
              $rowcount_list = $subscriberquerylist->num_rows;
              if($rowcount_list==0)
              $wpdb->query("INSERT INTO `wp_sendpress_list_subscribers` (`listID`, `subscriberID`, `status`, `updated`) VALUES ('".$post_id."', '".$subscriberID."', 3, '".date('Y-m-d H:i:s')."')");

          
              if(in_array($post_title,$exp_checkbox))
              $wpdb->query("UPDATE wp_sendpress_list_subscribers set status = 2,updated='".date('Y-m-d H:i:s')."' WHERE listID = '".$post_id."' and subscriberID='".$subscriberID."' ");
              else
              $wpdb->query("UPDATE wp_sendpress_list_subscribers set status = 3,updated='".date('Y-m-d H:i:s')."' WHERE listID = '".$post_id."' and subscriberID='".$subscriberID."' ");  
          }
      }


      echo '<script>window.location="'.site_url().'/edit-profile/?success=1#newsletterid"</script>';
  }
  ///=============prefence linking with sendpress start
  $result = $wpdb->get_results("SELECT ID, post_title FROM wp_posts where post_type='sendpress_list' and ID in (select post_id from wp_postmeta where meta_key='sync_role' and meta_value='none')");
      foreach($result as $row) 
      {
          $post_id=$row->ID;
          $post_title=$row->post_title;

          if($subscriberID>0)
          {
              $subres_list= $wpdb->get_results("SELECT status FROM wp_sendpress_list_subscribers WHERE listID = '".$post_id."' and subscriberID='".$subscriberID."' ");
              $subscriberStatus = $subres_list[0]->status;

              if($subscriberStatus==2) $exp_checkbox[]=$post_title;   
          }
      }
  ///=============prefence linking with sendpress end

}




if(have_posts()) {
    while(have_posts()) {
        the_post(); ?>
    <div class="course-details-area gray-bg pt-70 pb-50">
        <div class="container-fluid">
            <div class="row">
                <!--<div class="col-xl-3 col-lg-3">
                    <?php //get_sidebar() ?>
                </div>-->
                <!-- Blog -->
                <div class="col-xl-12 col-lg-12">
                    <div class="container">
                          
                          <section class="nf-faq-section">
                              <div class="container">
                                <div class="row">
                                  <div class="col-12">
                                    <h2> Edit Profile</h2>
                                    <div class="nf-faq-a-block">
                                      <div id="accordion">
                                        <?php
                                                echo do_shortcode(
                                                  '[wppb-edit-profile]'
                                                );
                                              ?>  
                                       
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </section>

                            <?php if(is_user_logged_in()) {  ?>
                            <section class="nf-faq-section" id="newsletterid">
                              <div class="container">
                                <div class="row">
                                  <div class="col-12">
                                    <h2> Newsletter Preferences </h2>
                                    <div class="nf-faq-a-block">
                                      <div id="accordion">
                                        <?php if($_GET['success']==1){?>
                                        <p class="alert wppb-success" id="wppb_form_general_message">Your Preference has been successfully updated!</p>
                                      <?php }?>
                                        <form action="" method="post">
                                        <ul>
                                        <li class="wppb-form-field wppb-default-about-yourself-heading" id="wppb-form-element-10">
                                        <h4>Set Your Preferences</h4><span class="wppb-description-delimiter "></span>
                                        </li>

                                        <?php
                                        global $wpdb;


                                        $result = $wpdb->get_results("SELECT ID, post_title FROM wp_posts where post_type='sendpress_list' and ID in (select post_id from wp_postmeta where meta_key='sync_role' and meta_value='none')");
                                        foreach($result as $row) 
                                        {
                                        ?>

                                        <li class="wppb-form-field wppb-gdpr-checkbox wppb-checkbox" id="wppb-form-element-14">
                                        <label for="user_consent_gdpr">
                                        <input  name="checkbox[]" id="checkbox2" type="checkbox" class="custom_field_gdpr" value="<?php echo $row->post_title;?>" <?php if(in_array($row->post_title,$exp_checkbox)) echo 'checked';?>>&nbsp; <?php echo $row->post_title;?> </label></li>

                                        <?php
                                      }
                                        ?>
                                        </ul>
                                        <p class="form-submit">
                                        <input name="edit_preference" type="submit" id="edit_preference" class="submit button" value="Update">
                                       </p>
                                     </form>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </section>
                          <?php }?>
                    
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <?php 
        }
    }
    ?>
 <!-- footer start -->   
<?php get_footer(); ?>