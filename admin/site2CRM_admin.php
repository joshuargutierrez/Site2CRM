<?php
/* Copyright (C) 2019  JoshuaRG*/
defined( 'ABSPATH' ) or die( ':: NO INDIRECT ACCESS ALLOWED ::' );

echo '<div class="wrap" id="site2crm-admin-page">'; // START Admin Page

include 'site2CRM_logo.php';

echo '<div class="site2crm-admin-page-section ui-state-default" >'; // START Admin section
include 'site2CRM_choose_crm.php';
echo '</div>'; // End Admin Section

echo '<div class="site2crm-admin-page-section ui-state-default" >'; // START Admin section
include 'site2CRM_form_fields.php';
echo '</div>'; // End Admin Section

echo '<div class="site2crm-admin-page-section ui-state-default" >'; // START Admin section
include 'site2CRM_form_options.php';
echo '</div>'; // End Admin Section

echo '<div class="site2crm-admin-page-section ui-state-default" >'; // START Admin section
switch(get_option('site2CRM_user_CRM') )
{
    case 'nutshell' : include 'site2CRM_nutshell_admin_form.php'; break;
    case 'pipedrive' : include 'site2CRM_pipedrive_admin_form.php'; break;
    case 'hubspot' : include 'site2CRM_hubspot_admin_form.php'; break;
    default: 
        echo ('<h2 class="site2crm-admin-page-section-header" title="Drag to reorganize your admin page.">Select a CRM to Continue</h2>');
        echo ('<h3 class="site2crm-warning">You have not selected a CRM</b></h3>');
        break;

} // end switch

echo '</div>'; // End Admin Section

echo '</div>'; // END Admin Page