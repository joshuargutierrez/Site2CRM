<?php
/* Copyright (C) 2019  Site2CRM*/
defined( 'ABSPATH' ) or die( '::NO INDIRECT ACCESS ALLOWED::' );
echo '<h2 id="site2crm_submission_settings_form" class="site2crm-admin-page-section-header">Form Redirect Settings</h2>';
echo '<h4 class="site2crm-admin-page-section-subheader">Choose a page to redirect your users to.';
echo '<h4>Current Redirect Page: ' . get_post(get_option('site2crm_redirect_path'))->post_title.'</h4>';
echo '<form method="POST" action="options.php#site2crm_submission_settings_form">';
settings_fields( 'site2CRM_options_settings_group' );
echo '<div id="site2crm_redirect_path">';
echo '<select name="site2crm_redirect_path" >';
$all_pages = get_pages();
foreach ( $all_pages as $page ) {
    echo '<option value="'.$page->ID.'">'.$page->post_title.'</option>';
}
echo '</select></br>';
echo '</div>';
do_settings_sections( 'site2CRM_options_settings_group' );
submit_button('Update Redirect Path', 'form-redirect-submit', 'choose-crm-submit', false);
echo '</form>';
