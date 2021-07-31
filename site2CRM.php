<?php
/**
 * Plugin Name: Site2CRM-PRO
 * Plugin URI:  https://joshuarg.net/site2crm
 * Description: CRM Lead Creation with Web Form
 * Version:     1.0
 * Author:      Site2CRM
 * Author URI:  https://joshuarg.net/site2crm
 * Text Domain: Site2CRM.com
 * Domain Path: /languages
 * 
 * Copyright (C) 2019  Site2CRM
 */
defined( 'ABSPATH' ) or die( '::NO INDIRECT ACCESS ALLOWED::' );

require_once 'admin/options.php';
require_once 'admin/analytics_functions.php';
require_once 'handler/site2crm_handler.php';
require_once 'form/site2crm_form_functions.php';

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

//Sets columns for viewing CTP 'lead'
add_action( 'manage_lead_posts_custom_column', 'site2crm_manage_lead_columns', 10, 2 );

//Add custom css for admin sections
add_action( 'admin_enqueue_scripts', 'site2crm_add_stylesheet_to_admin' );

//Ensure CPT gets added to the DB on hook activation
register_activation_hook( __FILE__, 'site2crm_rewrite_flush' );

//registers how CPT 'lead' is displayed
add_filter( 'post_updated_messages', 'codex_lead_updated_messages' );

//determine which columns will be displayed when viewing CPT 'lead' 
add_filter( 'manage_edit-lead_columns', 'site2crm_edit_lead_columns' ) ;

//add stylesheet
function site2crm_add_stylesheet_to_admin() {
    wp_enqueue_style( 'prefix-style', plugins_url('assets/css/styles.css', __FILE__) );
}