<?php
/* Copyright (C) 2019  Site2CRM*/
defined( 'ABSPATH' ) or die( '::NO INDIRECT ACCESS ALLOWED::' );
echo '<div class="wrap"></br>';
include 'site2CRM_logo.php';
echo '<h1>Site2CRM Admin Panel for Hubspot <img style="position:fixed; right:1vw; bottom:13vh;" alt="logo" src="https://site2crm.com/wp-content/uploads/2019/07/hubspot_logo_long.png" ></img></h1></br>';
echo '<hr>';
echo '<h2>API Data</h2>';
echo '<h4>To allow this plug-in to create leads in your Hubspot account, </br>';
echo 'please enter your Hubspot username and API Key below.</br></br>';
echo '<i>Please note that Hubspot will not allow contacts to be added with duplicate emails, ';
echo 'however, Site2CRM will still collect the data, store it on your analytics page, and send it to your inbox.</i></h4>';
echo '<hr>';
echo '<h4>Current Hubspot Username : ' . get_option('hubspot_username').'</h4>';
echo '<h4>Current Hubspot API Key : ' . get_option('hubspot_api_key').'</h4>';
echo '<hr>';
echo '<form method="POST" action="options.php">';
settings_fields( 'site2CRM_options_group_7' );
echo '&nbsp;&nbsp;<label for="hubspot_username">New Hubspot Username: </label>';
echo '<input type="email" id="hubspot_username" '
. 'name="hubspot_username" placeholder="Hubspot Username" required="true">';
do_settings_sections( 'site2CRM_options_group_7' );
submit_button('Update Username');
echo '</form>';
echo '<hr>';
echo '<form method="POST" action="options.php">';
settings_fields( 'site2CRM_options_group_8' );
echo '&nbsp;&nbsp;<label for="hubspot_api_key">New Hubspot API Key: </label>';
echo '<input type="text" id="hubspot_api_key" name="hubspot_api_key" '
. 'placeholder="Hubspot API Key" required="true">';
do_settings_sections( 'site2CRM_options_group_8' );
submit_button('Update API Key');
echo '</form>';
echo '<hr>';
echo '</div>';