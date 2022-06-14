<?php
/* Copyright (C) 2019  JoshuaRG*/
defined( 'ABSPATH' ) or die( ':: NO INDIRECT ACCESS ALLOWED ::' );

echo '<div class="wrap"></br>';
include 'site2CRM_logo.php';

_e ('<h1>Site2CRM Admin Panel </br>Choose your CRM</h1></br>', 'site2crm');
_e ('<h3>Your Current CRM is <b style="text-transform:capitalize;">'.get_option('site2CRM_user_CRM').'.</b></h3>', 'site2crm');

echo '</br>';

echo '<form method="POST" action="options.php">';
settings_fields('site2CRM_choose_crm_options_group');

if(get_option('site2CRM_user_CRM') !== 'nutshell')
{
	$dir = plugin_dir_url( __DIR__ ).'assets/images/nutshell_logo_long.png';
	echo '<label class="site2crm-radio-button-label">';
	echo '<input type="radio" class="site2crm-choose-crm-radio" name="site2CRM_user_CRM" value="nutshell">';
	echo '<img alt="Nutshell CRM" id="site2crm-choose-crm-image-nutshell" src="'.$dir.'" ></img>';
	echo '</label></br></br>';
}

if(get_option('site2CRM_user_CRM') !== 'pipedrive')
{
	$dir = plugin_dir_url( __DIR__ ).'assets/images/pipedrive_logo_long.png';
	echo '<label class="site2crm-radio-button-label">';
	echo '<input type="radio" class="site2crm-choose-crm-radio" name="site2CRM_user_CRM" value="pipedrive">';
	echo '<img alt="PipeDrive CRM" id="site2crm-choose-crm-image-pipedrive" src="'.$dir.'" ></img>';
	echo '</label></br></br>';
}

if(get_option('site2CRM_user_CRM') !== 'hubspot')
{
	echo '<label class="site2crm-radio-button-label">';
	$dir = plugin_dir_url( __DIR__ ).'assets/images/hubspot_logo_long.png';
	echo '<input type="radio" class="site2crm-choose-crm-radio" name="site2CRM_user_CRM" value="hubspot">';
	echo '<img alt="HubSpot CRM" id="site2crm-choose-crm-image-hubspot"  src="'.$dir.'" ></img>';
	echo '</label></br>';
}
do_settings_sections( 'site2CRM_choose_crm_options_group' );
submit_button('Update your CRM', 'choose-crm-submit');

echo '</form>';
echo '</div>';

function site2crm_contextual_help($contextual_help, $screen_id, $screen) {	
	ob_start(); 

	_e('<h3>Site2CRM Help</h3>', 'site2crm');

	_e('<p>Use this page to choose your correct CRM</p>', 'site2crm');
	
	return ob_get_clean();
}
if (isset($_GET['page']) && $_GET['page'] == 'site2CRM-admin') 
{
	add_action('contextual_help', 'site2crm_contextual_help', 10, 3);
}