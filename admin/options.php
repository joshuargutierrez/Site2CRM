<?php
/* Copyright (C) 2019  Site2CRM*/
defined( 'ABSPATH' ) or die( '::NO INDIRECT ACCESS ALLOWED::' );
//add admin menu if logged in user is admin
if ( is_admin()){
    add_action( 'admin_menu', 'site2CRM_plugin_menu', 9);
    add_action( 'admin_init', 'site2CRM_register_site2crm_settings' );
    add_action( 'admin_init', 'site2CRM_register_site2crm_form_fields' );
    add_action( 'admin_init', 'site2CRM_register_site2crm_options_settings' );
    add_action( 'admin_init', 'site2CRM_register_chooseCRM_settings' );
}
/**
 * register options for choose CRM page
 */
function site2CRM_register_chooseCRM_settings(){
    register_setting( 'site2CRM_choose_crm_options_group', 'site2CRM_user_CRM' );
}
/**
 * register settings for API settings page
 */
function site2CRM_register_site2crm_settings() { 
  register_setting( 'site2CRM_options_group_0', 'nutshellcrm_username' );
  register_setting( 'site2CRM_options_group_1', 'nutshellcrm_api_key' );
  register_setting( 'site2CRM_options_group_2', 'pipedrive_username' );
  register_setting( 'site2CRM_options_group_3', 'pipedrive_api_key' );
  register_setting( 'site2CRM_options_group_4', 'zoho_username' );
  register_setting( 'site2CRM_options_group_5', 'zoho_password' );
  register_setting( 'site2CRM_options_group_6', 'zoho_api_key' );
  register_setting( 'site2CRM_options_group_7', 'hubspot_username' );
  register_setting( 'site2CRM_options_group_8', 'hubspot_api_key' );
  register_setting( 'site2CRM_options_group_9', 'salesforce_username' );
  register_setting( 'site2CRM_options_group_10', 'salesforce_api_key' );
}
/**
 * register settings for form Fields page
 */
function site2CRM_register_site2crm_form_fields() { 
  register_setting( 'site2CRM_forms_group', 'site2crm_contact_name' );
  register_setting( 'site2CRM_forms_group', 'site2crm_contact_name_required' );
  register_setting( 'site2CRM_forms_group', 'site2crm_contact_last_name' );
  register_setting( 'site2CRM_forms_group', 'site2crm_contact_last_name_required' );
  register_setting( 'site2CRM_forms_group', 'site2crm_company_name' );
  register_setting( 'site2CRM_forms_group', 'site2crm_company_name_required' );
  register_setting( 'site2CRM_forms_group', 'site2crm_contact_phone' );
  register_setting( 'site2CRM_forms_group', 'site2crm_contact_phone_required' );
  register_setting( 'site2CRM_forms_group', 'site2crm_contact_email' );
  register_setting( 'site2CRM_forms_group', 'site2crm_contact_email_required' );
  register_setting( 'site2CRM_forms_group', 'site2crm_contact_address' );
  register_setting( 'site2CRM_forms_group', 'site2crm_contact_address_required' );
  register_setting( 'site2CRM_forms_group', 'site2crm_contact_city' );
  register_setting( 'site2CRM_forms_group', 'site2crm_contact_city_required' );
  register_setting( 'site2CRM_forms_group', 'site2crm_contact_state_region' );
  register_setting( 'site2CRM_forms_group', 'site2crm_contact_state_region_required' );
  register_setting( 'site2CRM_forms_group', 'site2crm_contact_postal_code' );
  register_setting( 'site2CRM_forms_group', 'site2crm_contact_postal_code_required' );
  register_setting( 'site2CRM_forms_group', 'site2crm_contact_country' );
  register_setting( 'site2CRM_forms_group', 'site2crm_contact_country_required' );
  register_setting( 'site2CRM_forms_group', 'site2crm_web_address' );
  register_setting( 'site2CRM_forms_group', 'site2crm_web_address_required' );  
  register_setting( 'site2CRM_forms_group', 'site2crm_form_message' );
  register_setting( 'site2CRM_forms_group', 'site2crm_form_message_required' );
}
/**
 * register settings for redirect settings page
 */
function site2CRM_register_site2crm_options_settings() { 
  register_setting( 'site2CRM_options_settings_group', 'site2crm_redirect_path' );  
}
/**
 * create admin menu and submenus
 */
function site2CRM_plugin_menu() {
    add_menu_page( 'Site2CRM Plugin Settings', ' Site2CRM', 'manage_options', 'site2CRM-admin', 'site2crm_display_faq_page', 'dashicons-rest-api', 21);
    add_submenu_page('site2CRM-admin', 'Site2CRM Admin', 'Site2CRM Admin', 'manage_options', 'Site2CRM_Admin_Page', 'site2crm_display_admin_page');    
    add_submenu_page('site2CRM-admin', 'Site2CRM API Settings', ' API Settings', 'manage_options', 'Site2CRM_API_Settings', 'site2crm_display_api_settings');    
    add_submenu_page('site2CRM-admin', 'Site2CRM Form Fields', ' Form Fields', 'manage_options', 'Site2CRM_Form_Field_Settings', 'site2crm_display_form_fields');    
    add_submenu_page('site2CRM-admin', 'Site2CRM Redirect Settings', ' Redirect Settings', 'manage_options', 'site2crm_display_redirect_settings', 'site2crm_display_redirect_settings');    
    # add_submenu_page('site2CRM-admin', 'Site2CRM FAQ Page', 'FAQ', 'manage_options', 'Site2CRM_FAQ_Page', 'site2crm_display_faq_page');    
}
/**
 * display choose CRM page
 */
function site2crm_display_admin_page(){
    site2crm_verify_credentials();
    echo '<div class="wrap"></br>';
    include 'site2CRM_admin.php';
    echo '</div>';
}
/**
 * display API Settings page
 */
function site2crm_display_api_settings(){
    site2crm_verify_credentials();
    echo '<div class="wrap"></br>';
    include 'site2CRM_'.get_option('site2CRM_user_CRM').'_admin_form.php';
    echo '</div>';
}
/**
 * display Form Fields page
 */
function site2crm_display_form_fields(){
    site2crm_verify_credentials();
    echo '<div class="wrap"></br>';
    include 'site2CRM_form_fields.php';
    echo '</div>';
}
/**
 * display Redirect Settings page
 */
function site2crm_display_redirect_settings(){
    site2crm_verify_credentials();
    echo '<div class="wrap"></br>';
    include 'site2CRM_form_options.php';
    echo '</div>';
}
/**
 * display FAQ page
 */
function site2crm_display_faq_page(){
    site2crm_verify_credentials();
    echo '<div class="wrap"></br>';
    include 'site2CRM_FAQ_page.php';
    echo '</div>';
}
/**
 * Verify logged in user can manage options
 */
function site2crm_verify_credentials(){
    if ( !current_user_can( 'manage_options' ) )  {
            wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
    }
}

//add options to wp_options table in DB
add_option('nutshellcrm_username');
add_option('nutshellcrm_api_key');
add_option('pipedrive_username');
add_option('pipedrive_api_key');
add_option('zoho_username');
add_option('zoho_password');
add_option('zoho_api_key');
add_option('hubspot_username');
add_option('hubspot_api_key');
add_option('salesforce_username');
add_option('salesforce_api_key');
add_option('site2crm_contact_name');
add_option('site2crm_contact_name_required');
add_option('site2crm_contact_last_name');
add_option('site2crm_contact_last_name_required');
add_option('site2crm_company_name');
add_option('site2crm_company_name_required');
add_option('site2crm_contact_phone');
add_option('site2crm_contact_phone_required');
add_option('site2crm_contact_email');
add_option('site2crm_contact_email_required');
add_option('site2crm_contact_address');
add_option('site2crm_contact_address_required');
add_option('site2crm_contact_city');
add_option('site2crm_contact_city_required');
add_option('site2crm_contact_state_region');
add_option('site2crm_contact_state_region_required');
add_option('site2crm_contact_postal_code');
add_option('site2crm_contact_postal_code_required');
add_option('site2crm_contact_country');
add_option('site2crm_contact_country_required');
add_option('site2crm_web_address');
add_option('site2crm_web_address_required');
add_option('site2crm_redirect_path');
add_option('site2CRM_user_CRM');
