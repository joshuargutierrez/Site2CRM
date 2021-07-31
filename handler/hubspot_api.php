<?php
/* Copyright (C) 2019  Site2CRM*/
defined( 'ABSPATH' ) or die( '::NO INDIRECT ACCESS ALLOWED::' );
/**
 * @class HubspotApi
 * @brief Easy access to the Hubspot CRM API
 * 
 * This class is instantiated with a url, parameters array, call type
 * 
 * Requires PHP 5.0+ Wordpress and JSON modules.
 * wp_remote_post: https://codex.wordpress.org/Function_Reference/wp_remote_post
 * JSON Module: http://pecl.php.net/package/json
 * 
 * @version 2.0
 * @date July 6, 2019
 */
class HubspotApi{
    
    protected $object_id;//unique identifier for created object
    
    protected $text;//note containing
    
    /**
     * Initializes the HubsotAPI class.
     * 
     * @param type $url
     * @param type $params
     * @param type $type
     * @throws HubspotApiException
     */
    function __construct($url, $params, $type) {
        try{
            //add api token to endpoint $url
            $endpoint = $url . get_option('hubspot_api_key');
            //Set parameter args for wp_remote_post
            $args = array(
                'method' => 'POST',
                'timeout' => 45,
                'redirection' => 5,
                'headers' => array('Content-Type' => 'application/json; charset=utf-8'),
                'data_format' => 'body',
                'body' => json_encode($params, true),
            );
            //get the value of the POST return
            $response = wp_remote_post($endpoint, $args);
            //retrieve body of $response
            $response_body = json_decode(wp_remote_retrieve_body($response));
            //assigns an id based on the type of call made to the API
            switch($type){
                case 'company': $this->object_id = $response_body->companyId; break;
                case 'contact': $this->object_id = $response_body->vid; break;
                case 'deal': $this->object_id = $response_body->dealId; break;
                case 'engagement': $this->object_id = $response_body->engagement->id; break;
                default: break;
            }
        }
        catch(Exception $e){
            new HubspotApiException($e);
        }
    }
    /**
     * returns the objects unique identifier
     * @return type
     */
    function get_id(){
        try{
            return $this->object_id;
        } catch(Exception $e){
            new HubspotApiException($e);
        }
    }
}

class HubspotApiException extends Exception {
    protected $data;
    public function __construct($message, $code = 0, $data = NULL) {
        parent::__construct($message, $code);
        $this->data = $data;
        mail(get_option('hubspot_username'),"Site2CRM::Hubspot Lead Creation Error Occurred:", 'Error: ' . $this->data .$this->text);
    }
    public function getData() {
        return $this->data;
    }
}