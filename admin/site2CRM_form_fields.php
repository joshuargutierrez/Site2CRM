<?php
/* Copyright (C) 2019  Site2CRM*/
defined( 'ABSPATH' ) or die( '::NO INDIRECT ACCESS ALLOWED::' );

echo '<h2 id="site2crm_form_fields_form" class="site2crm-admin-page-section-header">Form Fields</h2>';
echo 'Choose which fields below will be used in your contact form.</h4>';
echo '<h4><u>Current Active Fields:</u></h4>';

if(get_option('site2crm_contact_name')){
    echo '<small>&#10004;</small> Contact First Name - ';
    echo get_option('site2crm_contact_name_required', 'true')?'Required':'Not Required';
}
if(get_option('site2crm_contact_last_name')){
    echo '</br><small>&#10004;</small> Contact last Name - ';
    echo get_option('site2crm_contact_last_name_required', 'true')?'Required':'Not Required';
}
if(get_option('site2crm_company_name')){
    echo '</br><small>&#10004;</small> Company Name  - ';
    echo get_option('site2crm_company_name_required', 'true')?'Required':'Not Required';
}
if(get_option('site2crm_contact_phone')){
    echo '</br><small>&#10004;</small> Phone Number  - ';
    echo get_option('site2crm_contact_phone_required', 'true')?'Required':'Not Required';
}
if(get_option('site2crm_contact_email')){
    echo '</br><small>&#10004;</small> Email Address  - ';
    echo get_option('site2crm_contact_email_required', 'true')?'Required':'Not Required';
}
if(get_option('site2crm_contact_address')){
    echo '</br><small>&#10004;</small> Mailing Address  - ';
    echo get_option('site2crm_contact_address_required', 'true')?'Required':'Not Required';
}
if(get_option('site2crm_contact_city')){
    echo '</br><small>&#10004;</small> City  - ';
    echo get_option('site2crm_contact_city_required', 'true')?'Required':'Not Required';
}
if(get_option('site2crm_contact_state_region')){
    echo '</br><small>&#10004;</small> State  - ';
    echo get_option('site2crm_contact_state_region_required', 'true')?'Required':'Not Required';
}
if(get_option('site2crm_contact_postal_code')){
    echo '</br><small>&#10004;</small> Postal Code  - ';
    echo get_option('site2crm_contact_postal_code_required', 'true')?'Required':'Not Required';
}
if(get_option('site2crm_contact_country')){
    echo '</br><small>&#10004;</small> Country  - ';
    echo get_option('site2crm_contact_country_required', 'true')?'Required':'Not Required';
}
if(get_option('site2crm_web_address')){
    echo '</br><small>&#10004;</small> Website URL  - ';
    echo get_option('site2crm_web_address_required', 'true')?'Required':'Not Required';
}
if(get_option('site2crm_form_message')){
    echo '</br><small>&#10004;</small> Message  - ';
    echo get_option('site2crm_form_message_required', 'true')?'Required':'Not Required';
}

echo '<h4><u>Choose which fields to include in your form:</u></h4>';
echo '<form method="POST" action="options.php#site2crm_form_fields_form" class="site2crm-form-fields-form">';
settings_fields( 'site2CRM_forms_group' );
echo '<input type="checkbox" id="site2crm_contact_name" name="site2crm_contact_name" value="Name"><b class="site2crm-form-fields-option-value">Name</b> ';
echo '|&nbsp;&nbsp;&nbsp; <input type="checkbox" id="site2crm_contact_name_required" name="site2crm_contact_name_required" value="true">Required? <br> ';
echo '<input type="checkbox" id="site2crm_contact_last_name" name="site2crm_contact_last_name" value="Last Name"><b class="site2crm-form-fields-option-value">Last Name</b> ';
echo '|&nbsp;&nbsp;&nbsp;  <input type="checkbox" id="site2crm_contact_last_name_required" name="site2crm_contact_last_name_required" value="true">Required? <br>';
echo '<input type="checkbox" id="site2crm_company_name" name="site2crm_company_name" value="Company"><b class="site2crm-form-fields-option-value">Company</b> ';
echo '|&nbsp;&nbsp;&nbsp;  <input type="checkbox" id="site2crm_company_name_required" name="site2crm_company_name_required" value="true">Required? <br>';
echo '<input type="checkbox" id="site2crm_contact_phone" name="site2crm_contact_phone" value="Phone"><b class="site2crm-form-fields-option-value">Phone</b> ';
echo '|&nbsp;&nbsp;&nbsp; <input type="checkbox" id="site2crm_contact_phone_required" name="site2crm_contact_phone_required" value="true">Required? <br>';
echo '<input type="checkbox" id="site2crm_contact_email" name="site2crm_contact_email" value="Email"><b class="site2crm-form-fields-option-value">Email</b> ';
echo '|&nbsp;&nbsp;&nbsp; <input type="checkbox" id="site2crm_contact_email_required" name="site2crm_contact_email_required" value="true">Required? <br>';
echo '<input type="checkbox" id="site2crm_contact_address" name="site2crm_contact_address" value="Address"><b class="site2crm-form-fields-option-value">Address</b> ';
echo '|&nbsp;&nbsp;&nbsp; <input type="checkbox" id="site2crm_contact_address_required" name="site2crm_contact_address_required" value="true">Required? <br>';
echo '<input type="checkbox" id="site2crm_contact_city" name="site2crm_contact_city" value="City"><b class="site2crm-form-fields-option-value">City</b> ';
echo '|&nbsp;&nbsp;&nbsp; <input type="checkbox" id="site2crm_contact_city_required" name="site2crm_contact_city_required" value="true">Required? <br>';
echo '<input type="checkbox" id="site2crm_contact_state_region" name="site2crm_contact_state_region" value="State"><b class="site2crm-form-fields-option-value">State</b> ';
echo '|&nbsp;&nbsp;&nbsp; <input type="checkbox" id="site2crm_contact_state_region_required" name="site2crm_contact_state_region_required" value="true">Required? <br>';
echo '<input type="checkbox" id="site2crm_contact_postal_code" name="site2crm_contact_postal_code" value="Zip"><b class="site2crm-form-fields-option-value">Zip</b> ';
echo '|&nbsp;&nbsp;&nbsp; <input type="checkbox" id="site2crm_contact_postal_code_required" name="site2crm_contact_postal_code_required" value="true">Required? <br>';
echo '<input type="checkbox" id="site2crm_contact_country" name="site2crm_contact_country" value="Country"><b class="site2crm-form-fields-option-value">Country</b> ';
echo '|&nbsp;&nbsp;&nbsp; <input type="checkbox" id="site2crm_contact_country_required" name="site2crm_contact_country_required" value="true">Required? <br>';
echo '<input type="checkbox" id="site2crm_web_address" name="site2crm_web_address" value="Website"><b class="site2crm-form-fields-option-value">Website</b> ';
echo '|&nbsp;&nbsp;&nbsp; <input type="checkbox" id="site2crm_web_address_required" name="site2crm_web_address_required" value="true">Required? <br>';
echo '<input type="checkbox" id="site2crm_form_message" name="site2crm_form_message" value="Message"><b class="site2crm-form-fields-option-value">Message</b> ';
echo '|&nbsp;&nbsp;&nbsp; <input type="checkbox" id="site2crm_form_message_required" name="site2crm_form_message_required" value="true">Required? <br>';

do_settings_sections( 'site2CRM_forms_group' );
submit_button('Update Form Fields', 'choose-crm-submit', 'choose-crm-submit', false);
echo '</br></br></form>';