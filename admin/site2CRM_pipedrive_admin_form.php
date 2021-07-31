<?php
/* Copyright (C) 2019  Site2CRM*/
defined( 'ABSPATH' ) or die( '::NO INDIRECT ACCESS ALLOWED::' );
echo '<div class="wrap"></br>';
include 'site2CRM_logo.php';
echo '<h1>Site2CRM Admin Panel for Pipedrive <img style="position:fixed; right:2vw; bottom:13vh;" alt="logo" src="https://site2crm.com/wp-content/uploads/2019/07/pipedrive_logo_long.png" ></img></h1></br>';
echo '<hr>';
echo '<h2>API Data</h2>';
echo '<h4>&nbsp;To allow this plug-in to create leads in your Pipedrive account, </br>';
echo 'please enter your Pipedrive username and API Key below.</h4>';
echo '<hr>';
echo '<h4>Current Pipedrive Username : ' . get_option('pipedrive_username').'</h4>';
echo '<h4>Current Pipedrive API Key : ' . get_option('pipedrive_api_key').'</h4>';
echo '<hr>';
echo '<form method="POST" action="options.php">';
settings_fields( 'site2CRM_options_group_2' );
echo '&nbsp;&nbsp;<label for="pipedrive_username">New Pipedrive Username: </label>';
echo '<input type="email" id="pipedrive_username" '
. 'name="pipedrive_username" placeholder="Pipedrive Username" required="true">';
do_settings_sections( 'site2CRM_options_group_2' );
submit_button('Update Username');
echo '</form>';
echo '<hr>';
echo '<form method="POST" action="options.php">';
settings_fields( 'site2CRM_options_group_3' );
echo '&nbsp;&nbsp;<label for="pipedrive_api_key">New Pipedrive API Key: </label>';
echo '<input type="text" id="pipedrive_api_key" name="pipedrive_api_key" '
. 'placeholder="Pipedrive API Key" minlength="40" maxlength="40" required="true">';
do_settings_sections( 'site2CRM_options_group_3' );
submit_button('Update API Key');
echo '</form>';
echo '<hr>';
echo '</div>';
