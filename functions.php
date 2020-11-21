<?php
/**
 * Uku child theme functions and definitions
 */



/*-----------------------------------------------------------------------------------*/
/* Include the parent theme style.css
/*-----------------------------------------------------------------------------------*/


/**
 * Dequeue the Parent Theme styles.
 * https://impress.org/removing-styles-scripts-from-your-wordpress-parent-theme/
 * Hooked to the wp_enqueue_scripts action, with a late priority (100),
 * so that it runs after the parent style was enqueued.
 * wp_dequeue_style('additional-parent-style');
 */

function give_dequeue_plugin_css() {
    wp_deregister_style('uku-serif-style');
    wp_deregister_style('uku-woocommerce-style');	
}
add_action('wp_enqueue_scripts','give_dequeue_plugin_css', 100);




add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'child-uku-serif-style', get_stylesheet_directory_uri() . '/assets/css/serif-style.css' );
	wp_enqueue_style( 'child-uku-woocommerce-style', get_stylesheet_directory_uri() . '/assets/css/woocommerce.css' );
}


/*-----------------------------------------------------------------------------------*/
/* Include the parent theme custom.js
/*-----------------------------------------------------------------------------------*/

function my_custom_scripts() {
    wp_enqueue_script( 'custom-js', get_stylesheet_directory_uri() . '/assets/js/custom.js', array( 'jquery' ),'',true );
}
add_action( 'wp_enqueue_scripts', 'my_custom_scripts' );


/*-----------------------------------------------------------------------------------*/
/* Include helpers
/*-----------------------------------------------------------------------------------*/

// Last Login
require_once( get_stylesheet_directory() . '/helpers/gafi_users_last_login.php');

// Add Custom USER_META Fields (Wie wurden Sie auf uns aufmerksam) Account Form (https://foodnation.ch/mein-konto/edit-account/)
require_once( get_stylesheet_directory() . '/helpers/gafi_add_user_meta_fields_to_account_form.php');

// Add fields to Register Form
require_once( get_stylesheet_directory() . '/helpers/gafi_add_fields_to_register_form.php');

// Add fields to blling and shipping adress
require_once( get_stylesheet_directory() . '/helpers/gafi_add_fields_to_billing_and_shipping_address.php');

// Make Changes to shopping Cart Page
require_once( get_stylesheet_directory() . '/helpers/gafi_shopping_cart.php');

// Make Changes to Checkout Page
require_once( get_stylesheet_directory() . '/helpers/gafi_checkout.php');

// Chane WooComerce E-Mails
require_once( get_stylesheet_directory() . '/helpers/gafi_e-mail_customizer.php'); 

// Change/Add WordPress Customizer Settings
require_once( get_stylesheet_directory() . '/helpers/gafi_theme_customizer.php');  

// Change SMTP Settings
require_once( get_stylesheet_directory() . '/helpers/gafi_smtp_e-mail.php');  

// Loead More Button BETA
// require_once( get_stylesheet_directory() . '/helpers/gafi_loadmore.php');  




// Update Coupon amount after use (BETA_VERSION)
// require_once( get_stylesheet_directory() . '/helpers/gafi_update_coupon_amount.php');


