<?php
/* Copyright (C) 2019  Site2CRM*/
defined( 'ABSPATH' ) or die( '::NO INDIRECT ACCESS ALLOWED::' );
echo '<div class="wrap"></br>';
include 'site2CRM_logo.php';
echo '<h1>Site2CRM Admin Panel for NutshellCRM <img style="position:fixed; right:2vw; bottom:14vh;" alt="logo" src="https://site2crm.com/wp-content/uploads/2019/07/nutshell_logo_long.png" ></img></h1></br>';
echo '<hr>';
echo '<h2>API Data</h2>';
echo '<h4>&nbsp;To allow this plug-in to create leads in your NutshellCRM account, </br>';
echo 'please enter your NutshellCRM username and API Key below.</h4>';
echo '<hr>';
echo '<h4>Current NutshellCRM Username : ' . get_option('nutshellcrm_username').'</h4>';
echo '<h4>Current NutshellCRM API Key : ' . get_option('nutshellcrm_api_key').'</h4>';
echo '<hr>';
echo '<form method="POST" action="options.php">';
settings_fields( 'site2CRM_options_group_0' );
echo '&nbsp;&nbsp;<label for="nutshellcrm_username">New NutshellCRM Username: </label>';
echo '<input type="email" id="nutshellcrm_username" '
. 'name="nutshellcrm_username" placeholder="NutshellCRM Username" required="true">';
do_settings_sections( 'site2CRM_options_group_0' );
submit_button('Update Username');
echo '</form>';
echo '<hr>';
echo '<form method="POST" action="options.php">';
settings_fields( 'site2CRM_options_group_1' );
echo '&nbsp;&nbsp;<label for="nutshellcrm_api_key">New NutshellCRM API Key: </label>';
echo '<input type="text" id="nutshellcrm_api_key" name="nutshellcrm_api_key" '
. 'placeholder="NutshellCRM API Key" minlength="40" maxlength="40" required="true">';
do_settings_sections( 'site2CRM_options_group_1' );
submit_button('Update API Key');
echo '</form>';
echo '<hr>';
echo '</div>';
