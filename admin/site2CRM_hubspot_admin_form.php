<?php
/* Copyright (C) 2019  Site2CRM*/
defined( 'ABSPATH' ) or die( '::NO INDIRECT ACCESS ALLOWED::' );
echo '<div class="wrap"></br>';
include 'site2CRM_logo.php';
$dir = plugin_dir_url( __DIR__ ).'assets/images/hubspot_logo_long.png';
echo '<h1>Site2CRM Admin Panel for Hubspot <img class="site2crm-admin-menu-hubspot-logo" style="position:fixed; opacity:0.4; right:1vw; bottom:13vh;" alt="" src="'.$dir.'" ></img></h1></br>';
echo '<hr>';
echo '<h2>API Data</h2>';
echo '<h4>To allow this plug-in to create leads in your Hubspot account, </br>';
echo 'please enter your Hubspot username and API Key below.</br></br>';
echo '<i>Please note that Hubspot will not allow contacts to be added with duplicate emails, ';
echo 'however, Site2CRM will still collect the data, store it on your analytics page, and send it to your inbox.</i></h4>';
echo '<hr class="site2crm-seperator">';
echo '<h4>Current Hubspot Username : ' . get_option('hubspot_username').'</h4>';
echo '<h4>Current Hubspot API Key : ' . get_option('hubspot_api_key').'</h4>';
echo '<hr class="site2crm-seperator">';
echo '<form method="POST" action="options.php" class="site2crm-api-credentials-form">';
settings_fields( 'site2CRM_options_group_7' );
echo '&nbsp;&nbsp;<label for="hubspot_username" class="site2crm-crm-username-label">New Hubspot Username: </label>';
echo '<input type="email" id="hubspot_username" '
. 'name="hubspot_username" placeholder="Hubspot Username" required="true">';
do_settings_sections( 'site2CRM_options_group_7' );
submit_button('Update Username', 'site2crm-admin-submit');
echo '</form>';
echo '</br><hr class="site2crm-seperator"></br>';
echo '<form method="POST" action="options.php" class="site2crm-api-credentials-form">';
settings_fields( 'site2CRM_options_group_8' );
echo '&nbsp;&nbsp;<label for="hubspot_api_key" class="site2crm-crm-username-label">New Hubspot API Key </label>';
echo '<input type="text" id="hubspot_api_key" name="hubspot_api_key" '
. 'placeholder="Hubspot API Key" required="true">';
do_settings_sections( 'site2CRM_options_group_8' );
submit_button('Update API Key', 'site2crm-admin-submit');
echo '</form>';
echo '<hr>';
echo '</div>';