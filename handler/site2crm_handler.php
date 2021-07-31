<?php
/* Copyright (C) 2019  Site2CRM*/
defined( 'ABSPATH' ) or die( '::NO INDIRECT ACCESS ALLOWED::' );
require_once( ABSPATH . "wp-includes/pluggable.php" );
$site2crm_input=false;//true if there is POST data matching required names 
$site2crm_text='';//all data saved to single variable
$site2crm_contact_name_live=''; 
$site2crm_contact_last_name_live=''; 
$site2crm_company_name_live=''; 
$site2crm_contact_phone_live=''; 
$site2crm_contact_email_live=''; 
$site2crm_contact_address_live=''; 
$site2crm_contact_city_live=''; 
$site2crm_contact_state_region_live=''; 
$site2crm_contact_postal_code_live=''; 
$site2crm_contact_country_live=''; 
$site2crm_web_address_live='';
$site2crm_contact_message_live='';
//if $_POST array is not empty
if (!empty($_POST)){
    include 'get_data.php';//collect POST data
    include 'site2crm_functions.php';
    //Site2CRM fields do esist in $_POST array
    if($site2crm_input){
        //Create a Lead CPT
        $lead = array(
            'post_title' => $site2crm_company_name_live,
            'content' => $site2crm_text,
            'post_type'  => 'lead',
        );
        $lead_id = wp_insert_post($lead);//get custom id for lead CPT
        //adds id metadata to lead CPT
        if (!add_post_meta($lead_id, 'company', $site2crm_company_name_live, true)){
            add_post_meta($lead_id, 'Company', $site2crm_company_name_live);
        } 
        //add all other metadata to lead CPT
        add_post_meta($lead_id, 'firstname', $site2crm_contact_name_live, true);
        add_post_meta($lead_id, 'lastname', $site2crm_contact_last_name_live, true);
        add_post_meta($lead_id, 'phone', $site2crm_contact_phone_live, true);
        add_post_meta($lead_id, 'email', $site2crm_contact_email_live, true);
        add_post_meta($lead_id, 'address', $site2crm_contact_address_live, true);
        add_post_meta($lead_id, 'city', $site2crm_contact_city_live, true);
        add_post_meta($lead_id, 'state', $site2crm_contact_state_region_live, true);
        add_post_meta($lead_id, 'zip', $site2crm_contact_postal_code_live, true);
        add_post_meta($lead_id, 'country', $site2crm_contact_country_live, true);
        add_post_meta($lead_id, 'website', $site2crm_web_address_live, true);
        add_post_meta($lead_id, 'message', $site2crm_contact_message_live, true);
        //Email Headers
        $subject = 'Site2CRm Lead Created: ' . date(DATE_RFC2822);
        $from = 'donotreply@site2crm.com';
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers .= 'From: '.$from."\r\n".
        'Reply-To: '.$from. "\r\n" .'X-Mailer: PHP/' . phpversion();
        //Lead data
        $message = $site2crm_text;
        //Message when monthly limit has been reached
        $renew_message = '<h1><a target="_blank" href="https://www.site2crm.com/pro">'
                . 'Please upgrade to Site2CRM Pro for unlimited lead creation</a></h1>' 
                . "\r\n " . '<h4 style="text-transform: capitalize ;">no lead was created in ' 
                . get_option('site2CRM_user_CRM') . '</h4>' . "\r\n";
        //Checks which CRM the user has chosen
        switch(get_option('site2CRM_user_CRM')){
            case 'nutshell': 
                $to = get_option('nutshellcrm_username'); 
                mail($to, $subject, $message, $headers);
                require_once 'nutshell_api.php'; 
                site2CRM_nutshell_create_lead($site2crm_text,$site2crm_contact_name_live,
                        $site2crm_contact_last_name_live,$site2crm_company_name_live,
                        $site2crm_contact_phone_live,$site2crm_contact_email_live,
                        $site2crm_contact_address_live,$site2crm_contact_city_live,
                        $site2crm_contact_state_region_live,$site2crm_contact_postal_code_live,
                        $site2crm_contact_country_live,$site2crm_web_address_live); 
                break;
            case 'pipedrive': 
                $to = get_option('pipedrive_username'); 
                mail($to, $subject, $message, $headers); 
                require_once 'pipedrive_api.php'; 
                site2CRM_pipedrive_create_deal($site2crm_text,$site2crm_contact_name_live,
                        $site2crm_contact_last_name_live,$site2crm_company_name_live,
                        $site2crm_contact_phone_live,$site2crm_contact_email_live,
                        $site2crm_contact_address_live,$site2crm_contact_city_live,
                        $site2crm_contact_state_region_live,$site2crm_contact_postal_code_live,
                        $site2crm_contact_country_live); 
                break; 
            case 'hubspot': 
                $to = get_option('hubspot_username');
                mail($to, $subject, $message, $headers); 
                require_once 'hubspot_api.php'; 
                site2CRM_hubspot_create_deal($site2crm_text,$site2crm_contact_name_live,
                        $site2crm_contact_last_name_live,$site2crm_company_name_live,
                        $site2crm_contact_phone_live,$site2crm_contact_email_live,
                        $site2crm_contact_address_live, $site2crm_contact_city_live,
                        $site2crm_contact_state_region_live,$site2crm_contact_postal_code_live,
                        $site2crm_contact_country_live,$site2crm_web_address_live); 
                break;
            default: break;
        }
        //set text and input states to empty
        $site2crm_text = '';
        $site2crm_input = false;
    }
}