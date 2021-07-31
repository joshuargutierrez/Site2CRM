<?php
/* Copyright (C) 2019  Site2CRM*/
defined( 'ABSPATH' ) or die( '::NO INDIRECT ACCESS ALLOWED::' );
/**
 * Creates a contact, company, and lead object in Nutshell CRM with user input
 * 
 * @param type $text Message with all user input saved
 * @param type $contact_name 
 * @param type $contact_last_name 
 * @param type $company_name 
 * @param type $contact_phone
 * @param type $contact_email
 * @param type $contact_address
 * @param type $contact_city
 * @param type $contact_state_region
 * @param type $contact_postal_code
 * @param type $contact_country
 * @param type $contact_web_address
 */
function site2CRM_nutshell_create_lead($text,$contact_name,$contact_last_name,
        $company_name,$contact_phone,$contact_email,$contact_address,$contact_city,
        $contact_state_region,$contact_postal_code,$contact_country,
        $contact_web_address){
    $site2crm_data_set=false;//Initialize as false (No data available)
    //Assign Values to all variables; either as unknown or as input data
    if($contact_name!==''){
        $contact['name'] = $contact_name;
        $site2crm_data_set=true;
    }else{
        $contact['name'] = 'Name Not Provided';
        $site2crm_data_set=true;
    }
    if($contact_last_name!=='' && $contact_name!== 'Name Not Provided'){
        $contact['name'] = $contact_name . ' ' . $contact_last_name; 
        $site2crm_data_set=true;
    }
    if($contact_phone!==''){
        $contact['phone'] = $contact_phone;
        $site2crm_data_set=true;
    }        
    if($contact_email!==''){
        $contact['email'] = $contact_email;
        $site2crm_data_set=true;
    }
    if($contact_web_address!==''){
        $contact['url'] = array($contact_web_address);
        $site2crm_data_set=true;
    }
    if($contact_address!==''){
        $contact['address'] = array('Office'=>array('address_1'=>$contact_address,'city'=>$contact_city,'state'=>$contact_state_region,'postalCode'=>$contact_postal_code,'country'=>$contact_country));
        $site2crm_data_set=true;
    }
    if($company_name!==''){
        $account['name'] = $company_name;$site2crm_data_set=true;
    }else{
        $account['name']='N/A';
        $site2crm_data_set=true;
    }
    //IF data available
    if($site2crm_data_set){
        $contact_params['contact'] = $contact;//Assign an array of contact info to array key 'contact'
        //Open API connection
        $api = new NutshellApi(get_option('nutshellcrm_username'),get_option('nutshellcrm_api_key'));
        //create contact and add to Nutshell
        $newContact = $api->call('newContact', $contact_params);
        //get new contact unique id
        $newContactId = $newContact->id;
        //add contact to account
        $account['contacts'] = array(array( 'id'=>$newContactId,'relationship'=>'First Contact'));
        $company_params['account'] = $account;//Assign an array of account info to array key 'account'
        $newAccount = $api->newAccount($company_params);
        $newAccountId = $newAccount->id;
        $params = array('lead' => array('primaryAccount' => array('id' => $newAccountId),'contacts' => array(array( 'id'=>$newContactId,'relationship'=>'First Contact'))));
        $result = $api->newLead($params);
        $api->newNote($result, $text);
    }// -- end site2CRM_nutshell_create_lead --
}
/**
 * 
 * @param type $text Message with all user input saved
 * @param string $contact_name
 * @param type $contact_last_name
 * @param type $company_name
 * @param type $contact_phone
 * @param type $contact_email
 * @param type $contact_address
 * @param type $contact_city
 * @param type $contact_state_region
 * @param type $contact_postal_code
 * @param type $contact_country
 */
function site2CRM_pipedrive_create_deal($text,$contact_name,$contact_last_name,
        $company_name,$contact_phone,$contact_email,$contact_address,
        $contact_city,$contact_state_region,$contact_postal_code,
        $contact_country){
    //If first and last name provided, combine into single variable $contact_name
    if($contact_last_name !== '' && $contact_name!==''){
        $contact_name = $contact_name . ' ' . $contact_last_name;
    }
    //Sets company name to N/A by default if not set  --Start set company name--
    if($company_name!==''){
        $organization_args['name']=$company_name;
    }else{
        $organization_args['name']='N/A';
    }//  --End set company name--
    //  If $contact_address is not empty sets all address fields into single 
    //  field in the address key of $organization_args array
    if($contact_address!==''){
        $organization_args['address']=$contact_address.' '.$contact_city.' '.
            $contact_state_region.' '.$contact_postal_code.' '.$contact_country;
    }
    //Create a new organization entity in Ppipedrive using pipedrive_api.php
    $organization = new PipedriveApi('organizations', $organization_args);
    //get new organization unique indentifier
    $organization_id = $organization->get_id();
    //Sets contact name to No Name by default if not set 
    //--Start set contact name--
    if($contact_name!==''){
        $person_args['name']=$contact_name;
    }else{
        $person_args['name']='No Name';
    }//--End set contact name--
    //Sets org_id field in $person_args array as organization unique identifier
    $person_args['org_id']=$organization_id;
    //If phone provided save to $person_args array
    if($contact_phone!==''){
        $person_args['phone']=$contact_phone;
    }
    //If email provided save to $person_args array
    if($contact_email!==''){
        $person_args['email']=$contact_email;
    }
    //Create a new person entity in Ppipedrive using pipedrive_api.php
    new PipedriveApi('persons', $person_args);
    //Sets deal title to N/A by default if not set --Start set deal name--
    if($company_name!==''){
        $deal_args['title']=$company_name;
    }else{
        $deal_args['title']='N/A';
    }//--End set deal name--
    //Sets org_id field in $person_args array as person unique identifier
    $deal_args['org_id']=$organization_id;
    //Create a new deal entity in Ppipedrive using pipedrive_api.php
    $deal = new PipedriveApi('deals', $deal_args);
    //get new deal unique indentifier
    $deal_id = $deal->get_id();
    //If text variable not empty add a note object to the new deal
    if($text!==''){
        $note_args['content'] = 'Deal Details: ' . "\r\n" . $text;
        $note_args['deal_id'] = $deal_id;
        new PipedriveApi('notes', $note_args);
    }
} // -- end site2CRM_pipedrive_create_deal --

/**
 * Creates a deal object in the Hubspot CRM using hubspot_api.php
 * @param type $text Message with all user input saved
 * @param type $contact_name
 * @param type $contact_last_name
 * @param type $company_name
 * @param type $contact_phone
 * @param type $contact_email
 * @param type $contact_address
 * @param type $contact_city
 * @param type $contact_state_region
 * @param type $contact_postal_code
 * @param type $contact_country
 * @param type $contact_url
 */
function site2CRM_hubspot_create_deal($text,$contact_name,$contact_last_name,$company_name,$contact_phone,$contact_email,$contact_address, $contact_city,$contact_state_region,$contact_postal_code,$contact_country,$contact_url){
    //url endpoint for company creation in Hubspot API
    $companies_url = 'https://api.hubapi.com/companies/v2/companies?hapikey=';
	
    //name of key value pair
    $company_args['name'] = 'name';
	
    //value of key value pair [N/A if empty]
    $company_args['value'] = $company_name !== '' ? $company_name : 'N/A';
	
    //name of key value pair
    $company_description['name'] = 'description';
	
    //value of key value pair [N/A if empty]
    $company_description['value'] = $company_name !== '' ? $company_name : 'N/A';
	
    //new company object properties, $company_args + $company_description
    $company_data['properties'] = array($company_args,$company_description,);
	
    //create new company object in Hubspot CRM using hubspot_api.php
    $company = new HubspotApi($companies_url, $company_data, 'company');
	
    //assign unique identifier to new company
    $company_id = $company->get_id();
	
    //url endpoint for person creation in Hubspot API
    $person_url = 'https://api.hubapi.com/contacts/v1/contact/?hapikey=';
	
    //set contact first name [N/A if empty]
    $contact_first_name = ($contact_name !== '') ? $contact_name : 'N/A';
	
    //create array for contact data properties
    $contact_data_properties = array();
	
    //add firstname to $contact_data_properties
    array_push($contact_data_properties, array(
        'property' => 'firstname',
        'value' => $contact_first_name));
		
    //add lastname to $contact_data_properties
    array_push($contact_data_properties, array(
        'property' => 'lastname',
        'value' => $contact_last_name));
		
    //add phone number to $contact_data_properties
    array_push($contact_data_properties, array(
        'property' => 'phone',
        'value' => $contact_phone));
		
    //add email address to $contact_data_properties
    array_push($contact_data_properties, array(
        'property' => 'email',
        'value' => $contact_email));
		
    //add physical address to $contact_data_properties
    array_push($contact_data_properties, array(
        'property' => 'address',
        'value' => $contact_address));
		
    //add city address to $contact_data_properties
    array_push($contact_data_properties, array(
        'property' => 'city',
        'value' => $contact_city));
		
    //add state address to $contact_data_properties
    array_push($contact_data_properties, array(
        'property' => 'state',
        'value' => $contact_state_region));
		
    //add zip code to $contact_data_properties
    array_push($contact_data_properties, array(
        'property' => 'zip',
        'value' => $contact_postal_code));
		
    //add website url to $contact_data_properties
    array_push($contact_data_properties, array(
        'property' => 'website',
        'value' => $contact_url));
		
    //add $contact_data_properties array to properties key of $contact_data array
    $contact_data['properties'] = $contact_data_properties;
	
    //create new contact object in Hubspot CRM using hubspot_api.php
    $contact = new HubspotApi($person_url, $contact_data, 'contact');
	
    //assign unique identifier to new contact
    $contact_id = $contact->get_id();
	
    //url endpoint for deal creation in Hubspot API
    $deal_url = 'https://api.hubapi.com/deals/v1/deal?hapikey=';
	
    //entities to add to deal - company and contact
    $deal_associations = array(
            'associatedCompanyIds' => array($company_id,),
            'associatedVids' => array($contact_id,)
    );
	
    //add stage and name to new deal
    $deal_properties = array(
        array(
            'value' => $company_name,
            'name' => 'dealname'
        ),array(
            'value' => 'appointmentscheduled',
            'name' => 'dealstage'
        ),
    );
	
    //add associations and properties to $deal_data array
    $deal_data['associations'] = $deal_associations;
    $deal_data['properties'] = $deal_properties;
	
    //create new deal object in Hubspot CRM using hubspot_api.php
    $deal = new HubspotApi($deal_url, $deal_data, 'deal');
	
    //get unique identifier for new deal object
    $deal_id = $deal->get_id();
	
    //url endpoint for engagament(note) creation in Hubspot API
    $engagement_url = 'https://api.hubapi.com/engagements/v1/engagements?hapikey=';
	
    $date = new DateTime();
	
    //set note parameters
    $engagement_details = array(
            'active' => true,
            'type' => 'NOTE',
            'timestamp' => $date->getTimestamp(),
    );
	
    //set note to attach to new deal object
    $engagement_associations = array(
        'dealIds' => array($deal_id)
    );
	
    //add $text variable as content of note
    $engagement_metadata = array(
        'body' => $text
    );
	
    //push details, associations, and metadata arrays into the Engagement_data array
    $engagement_data['engagement'] = $engagement_details;
    $engagement_data['associations'] = $engagement_associations;
    $engagement_data['metadata'] = $engagement_metadata;
	
    //create new engagement(note) object in Hubspot CRM using hubspot_api.php
    new HubspotApi($engagement_url, $engagement_data, 'engagement');  
	
} // site2CRM_hubspot_create_deal

/**
 * redirect user to admin determined page on form submission
 */
function site2crm_redirect(){
    if(wp_redirect(get_page(get_option('site2crm_redirect_path'))->guid)){
        $_POST = array();
        exit;
    }
}