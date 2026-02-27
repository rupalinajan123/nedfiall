<?php /*Template Name: Conclave Registration */ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    
    <?php wp_head(); ?>
    
    <!--<link href="<?php //echo get_template_directory_uri(). '/assets/conclave_event/'?>css/main.css" rel="stylesheet" media="all">
    <link href="<?php //echo get_template_directory_uri(). '/assets/conclave_event/'?>css/style.css" rel="stylesheet">-->
    <!-- end document-->
    <style type="text/css">
    
     .wpcf7 input[type="text"],
     .wpcf7 input[type="email"],
     .wpcf7 input[type="number"],
     .wpcf7 input[type="date"],
     .wpcf7 input[type="tel"],
     textarea {
         font-size: 16px;
         /*border-color: #e9e9e9;*/
         width: 100%;
         padding: 2%;
     }
     
     .wpcf7 input[type="submit"] {
         color: #ffffff;
         font-size: 18px;
         font-weight: 700;
         background: #E2272E;
         padding: 15px 25px 15px 25px;
         border: none;
         border-radius: 5px;
         width: auto;
         text-transform: uppercase;
         letter-spacing: 5px;
     }
     .wpcf7 input:hover[type="submit"] {
         background: #494949;
         transition: all 0.4s ease 0s;
     }
     .wpcf7 input:active[type="submit"] {
         background: #000000;
     }
     #scrollUp { display:none !important;} 
    </style>
</head>
<body>
<div class="wrapper wrapper--w680">
        <div class="card card-4">
            <div class="card-body">
            	<?php
                    echo do_shortcode(
                      '[contact-form-7 id="28043" title="New Age Career Conclave- Season 1"]'
                    );
                  ?> 
            </div>
        </div>
</div>
<?php wp_footer(); ?>
    <!-- Main JS-->
<script src="<?php echo get_template_directory_uri(). '/assets/conclave_event/'?>js/global.js"></script>

</body>
</html>
<script>
$('.wpcf7-form').submit(function(){
    
    $.ajax({
              data: {'action': 'my_action_get_uniqueno'},
              url: "<?php echo site_url()?>/wp-admin/admin-ajax.php",
              type: "post",
              success: function(data) {
                 $("#ref_no").val('RFN_'+data);
              }
          });
        
    });

document.addEventListener( 'wpcf7submit', function( event ) {
    
            $.ajax({
              data: {'action': 'my_action_get_uniqueno'},
              url: "<?php echo site_url()?>/wp-admin/admin-ajax.php",
              type: "post",
              success: function(data) {
                 $("#ref_no").val('RFN_'+data);
              }
          });
    
}, false );
</script>

<script>
jQuery(function ($) {
    
    $("#ref_no").val('RFN_<?php echo time()?>');
    //$("#ref_no").hide();

});
</script>