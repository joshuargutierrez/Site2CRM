<?php
/*
Plugin Name: Site2CRM
Plugin URI: http://joshuarg.net/wordpress-plugins/site2crm
Description: CRM Lead creation and web form
Version: 1.1.0
Author: Joshua Gutierrez
Author URI: http://joshuarg.net
Text Domain: site2crm
Domain Path: /lang

Copyright 2019 Joshua R G
*/

defined( 'ABSPATH' ) or die( '::NO INDIRECT ACCESS ALLOWED::' );

require_once 'admin/options.php';
require_once 'admin/analytics_functions.php';
require_once 'handler/site2crm_handler.php';
require_once 'form/site2crm_form_functions.php';
require_once 'form/site2crm_shortcode_form.php';

//Create a CRM lead/deal object on form submission for logged in users
add_action( 'admin_post_create_lead', 'site2CRM_create_lead' );

//Create a CRM lead/deal object on form submission for non-logged in users
add_action( 'admin_post_nopriv_create_lead', 'site2CRM_create_lead' );

//redirects logged in user to required page on form submission
add_action( 'admin_post_site2crm_redirect', 'site2crm_redirect');

//redirects non-logged in user to required page on form submission
add_action( 'admin_post_nopriv_site2crm_redirect', 'site2crm_redirect');

//Initialize Custom Post Type (CPT) 'lead'
add_action( 'init', 'site2crm_cpt_init' );

//Sets columns for viewing CPT 'lead'
add_action( 'manage_lead_posts_custom_column', 'site2crm_manage_lead_columns', 10, 2 );

//Add custom css for admin sections
add_action( 'admin_enqueue_scripts', 'site2crm_add_stylesheet_to_admin' );

//Add custom JS for admin sections
add_action( 'admin_menu', 'site2crm_add_jquery_to_admin' );

// Jquery sortable
add_action('wp_enqueue_scripts','enqueue_site2crm_scripts_jqueryUI_sortable');

//Ensure CPT gets added to the DB on hook activation
register_activation_hook( __FILE__, 'site2crm_rewrite_flush' );

//registers how CPT 'lead' is displayed
add_filter( 'post_updated_messages', 'codex_lead_updated_messages' );

//determine which columns will be displayed when viewing CPT 'lead' 
add_filter( 'manage_edit-lead_columns', 'site2crm_edit_lead_columns' ) ;

// create shortcode for adding form to page with other content
function shortcodes_init()
{
    add_shortcode('Site2CRM_web_form', 'site2crm_shortcode_form_function');

} // end function shortcode_init

add_action('init', 'shortcodes_init');

//add stylesheet
function site2crm_add_stylesheet_to_admin() 
{
    wp_enqueue_style( 'prefix-style', plugins_url('assets/css/site2crm_styles.css', __FILE__) );
}

// Add JavaScript
function site2crm_add_jquery_to_admin( $hook ) 
{
    wp_register_script( 'site2crm_jquery', plugins_url( 'assets/js/site2crm_jquery.js', __FILE__ ), array( 'jquery' ));

    wp_enqueue_script( 'site2crm_jquery' );

    wp_enqueue_script('jquery-ui');
}

function enqueue_site2crm_scripts_jqueryUI_sortable() {
    wp_register_script('jquery-ui-sortable');
    wp_enqueue_script('jquery-ui-sortable');
}
  
