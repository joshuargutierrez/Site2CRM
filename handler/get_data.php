<?php
/* Copyright (C) 2019  Site2CRM*/
defined( 'ABSPATH' ) or die( '::NO INDIRECT ACCESS ALLOWED::' );
//get user input and sanitize data for security
if(filter_input(INPUT_POST, 'site2crm_company_name_live')){
    $site2crm_company_name_live = sanitize_text_field(filter_input(INPUT_POST, 'site2crm_company_name_live'));
    $site2crm_text .= 'COMPANY: ' . $site2crm_company_name_live . " | \r\n";
    if(!$site2crm_input){$site2crm_input=true;}
}
if(filter_input(INPUT_POST, 'site2crm_contact_name_live')){
    $site2crm_contact_name_live = sanitize_text_field(filter_input(INPUT_POST, 'site2crm_contact_name_live'));
    $site2crm_text .= 'CONTACT NAME: ' . $site2crm_contact_name_live . " |\r\n";
    if(!$site2crm_input){$site2crm_input=true;}
}
if(filter_input(INPUT_POST, 'site2crm_contact_last_name_live')){
    $site2crm_contact_last_name_live = sanitize_text_field(filter_input(INPUT_POST, 'site2crm_contact_last_name_live'));
    $site2crm_text .= 'CONTACT LAST NAME: ' . $site2crm_contact_last_name_live . " |\r\n";
    if(!$site2crm_input){$site2crm_input=true;}
}
if(filter_input(INPUT_POST, 'site2crm_contact_email_live')){
    $site2crm_contact_email_live = sanitize_email(filter_input(INPUT_POST, 'site2crm_contact_email_live'));
    $site2crm_text .= 'EMAIL: ' . $site2crm_contact_email_live . " | \r\n";
    if(!$site2crm_input){$site2crm_input=true;}
}
if(filter_input(INPUT_POST, 'site2crm_contact_phone_live')){
    $site2crm_contact_phone_live = sanitize_text_field(filter_input(INPUT_POST, 'site2crm_contact_phone_live'));
    $site2crm_text .= 'PHONE: ' . $site2crm_contact_phone_live . " | \r\n";
    if(!$site2crm_input){$site2crm_input=true;}
}
if(filter_input(INPUT_POST, 'site2crm_contact_address_live')){
    $site2crm_contact_address_live = sanitize_text_field(filter_input(INPUT_POST, 'site2crm_contact_address_live'));
    $site2crm_text .= 'ADDRESS: ' . $site2crm_contact_address_live . " | \r\n";
    if(!$site2crm_input){$site2crm_input=true;}
}
if(filter_input(INPUT_POST, 'site2crm_contact_city_live')){
    $site2crm_contact_city_live = sanitize_text_field(filter_input(INPUT_POST, 'site2crm_contact_city_live'));
    $site2crm_text .= 'CITY: ' . $site2crm_contact_city_live . " | \r\n";
    if(!$site2crm_input){$site2crm_input=true;}
}
if(filter_input(INPUT_POST, 'site2crm_contact_state_region_live')){
    $site2crm_contact_state_region_live = sanitize_text_field(filter_input(INPUT_POST, 'site2crm_contact_state_region_live'));
    $site2crm_text .= 'STATE/REGION: ' . $site2crm_contact_state_region_live . " | \r\n";
    if(!$site2crm_input){$site2crm_input=true;}
}
if(filter_input(INPUT_POST, 'site2crm_contact_postal_code_live')){
    $site2crm_contact_postal_code_live = sanitize_text_field(filter_input(INPUT_POST, 'site2crm_contact_postal_code_live'));
    $site2crm_text .= 'POSTAL CODE: ' . $site2crm_contact_postal_code_live . " | \r\n";
    if(!$site2crm_input){$site2crm_input=true;}
}
if(filter_input(INPUT_POST, 'site2crm_contact_country_live')){
    $site2crm_contact_country_live = sanitize_text_field(filter_input(INPUT_POST, 'site2crm_contact_country_live'));
    $site2crm_text .= 'COUNTRY: ' . $site2crm_contact_country_live . " | \r\n";
    if(!$site2crm_input){$site2crm_input=true;}
}
if(filter_input(INPUT_POST, 'site2crm_web_address_live')){
    $site2crm_web_address_live = sanitize_text_field(filter_input(INPUT_POST, 'site2crm_web_address_live'));
    $site2crm_text .= 'COMPANY URL: ' . $site2crm_web_address_live . " | \r\n";
    if(!$site2crm_input){$site2crm_input=true;}
}
if(filter_input(INPUT_POST, 'site2crm_contact_message_live')){
    $site2crm_contact_message_live = sanitize_text_field(filter_input(INPUT_POST, 'site2crm_contact_message_live'));
    $site2crm_text .= 'QUESTIONS/COMMENTS: ' . $site2crm_contact_message_live . " | \r\n";
    if(!$site2crm_input){$site2crm_input=true;}
}
if(!$site2crm_text==''){
    $site2crm_text .= "Lead Created On: ". date('l jS \of F Y h:i:s A') . " | \r\n";
    $site2crm_text = sanitize_text_field($site2crm_text);
}else{
    $site2crm_input = false;
}