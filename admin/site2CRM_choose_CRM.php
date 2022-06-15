<?php
/* Copyright (C) 2019  JoshuaRG*/
defined( 'ABSPATH' ) or die( ':: NO INDIRECT ACCESS ALLOWED ::' );
echo ('<h2 class="site2crm-admin-page-section-header" title="Drag to reorganize your admin page.">Choose your CRM</h2>');

if(get_option('site2CRM_user_CRM') === '' || get_option('site2CRM_user_CRM') === null)
	echo ('<h3 class="site2crm-warning">You have not selected a CRM</b></h3>');

else echo ('<h3 class="site2crm-admin-page-section-subheader">Your are currently using <b style="text-transform:capitalize;">'.get_option('site2CRM_user_CRM').' CRM.</b></h3></br>');

echo '<form method="POST" action="options.php" class="site2crm-choose-crm-form">';

settings_fields('site2CRM_choose_crm_options_group');

if(get_option('site2CRM_user_CRM') !== 'nutshell')
{
	$dir = plugin_dir_url( __DIR__ ).'assets/images/nutshell_logo_long.png';
	echo '<label class="site2crm-radio-button-label" title="Click Here to Select Nutshell CRM">';
	echo '<input type="radio" class="site2crm-choose-crm-radio" name="site2CRM_user_CRM" value="nutshell">';
	echo '<img alt="Nutshell CRM" id="site2crm-choose-crm-image-nutshell" src="'.$dir.'" ></img>';
	echo '</label></br></br>';
}

if(get_option('site2CRM_user_CRM') !== 'pipedrive')
{
	$dir = plugin_dir_url( __DIR__ ).'assets/images/pipedrive_logo_long.png';
	echo '<label class="site2crm-radio-button-label" title="Click Here to Select PipeDrive CRM">';
	echo '<input type="radio" class="site2crm-choose-crm-radio" name="site2CRM_user_CRM" value="pipedrive">';
	echo '<img alt="PipeDrive CRM" id="site2crm-choose-crm-image-pipedrive" src="'.$dir.'" ></img>';
	echo '</label></br></br>';
}

if(get_option('site2CRM_user_CRM') !== 'hubspot')
{
	echo '<label class="site2crm-radio-button-label" title="Click Here to Select HubSpot CRM">';
	$dir = plugin_dir_url( __DIR__ ).'assets/images/hubspot_logo_long.png';
	echo '<input type="radio" class="site2crm-choose-crm-radio" name="site2CRM_user_CRM" value="hubspot">';
	echo '<img alt="HubSpot CRM" id="site2crm-choose-crm-image-hubspot"  src="'.$dir.'" ></img>';
	echo '</label></br>';
}

do_settings_sections( 'site2CRM_choose_crm_options_group' );
submit_button('Update your CRM', 'choose-crm-submit', 'choose-crm-submit', false);

echo '</br></br></form>';