<?php
/* Copyright (C) 2019  Site2CRM*/
defined( 'ABSPATH' ) or die( '::NO INDIRECT ACCESS ALLOWED::' );
echo '<div class="wrap"></br>';
include 'site2CRM_logo.php';
echo '<h2 id="site2crm_submission_settings_form">Form Redirect Settings</h2>';
echo '<h4>&nbsp;Please choose a page to redirect your users to when the contact form is submitted, </br>';
echo '<hr>';
echo '<h4>Current Redirect Page: ' . get_post(get_option('site2crm_redirect_path'))->post_title.'</h4>';
echo '<hr>';
echo '<form method="POST" action="options.php#site2crm_submission_settings_form">';
settings_fields( 'site2CRM_options_settings_group' );
echo '&nbsp;&nbsp;<label for="site2crm_redirect_path">Choose which page to redirect to when form is submitted:</label><br>';
echo '<select name="site2crm_redirect_path" id="site2crm_redirect_path">';
$get_pages = get_pages();
foreach ( $get_pages as $page ) {
    echo '<option value="'.$page->ID.'">'.$page->post_title.'</option>';
}
echo '</select>';
do_settings_sections( 'site2CRM_options_settings_group' );
submit_button('Update Redirect Path');
echo '<br></form>';
echo '<hr>';
echo '</div>';