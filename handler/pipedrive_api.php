<?php
/* Copyright (C) 2019  Site2CRM*/
defined( 'ABSPATH' ) or die( '::NO INDIRECT ACCESS ALLOWED::' );
/**
 * @class PipedriveApi
 * @brief Easy access to the Hubspot CRM API
 * 
 * This class is instantiated with a parameter(call type) and a 
 * parameters array (input data)
 * 
 * Requires PHP 5.0+ Wordpress and JSON modules.
 * wp_remote_post: https://codex.wordpress.org/Function_Reference/wp_remote_post
 * JSON Module: http://pecl.php.net/package/json
 * 
 * @version 2.0
 * @date July 6, 2019
 */
class PipedriveApi{
    const ENDPOINT_PREFIX = 'https://companydomain.pipedrive.com/v1/';
    private $parameter;
    private $object_id;
    /**
     * 
     * @param type $parameter - Valid[organizations, persons, deals, notes]
     * @param type $params - array to be passed to wp_remote_post($url, $args)
     */
    function __construct($parameter, $params) {
        try{
            get_option('pipedrive_api_key');
            $this->parameter = $parameter;
            $url = 'https://companydomain.pipedrive.com/v1/'.$parameter.'?api_token=' . get_option('pipedrive_api_key');
            $args = array('body' => 
                $params,
                'timeout' => '5',
                'redirection' => '5',
                'httpversion' => '1.0',
                'blocking' => true,
                'headers' => array(),
                'cookies' => array()
            );
            $response = wp_remote_post( $url, $args );
            $response_body = json_decode(wp_remote_retrieve_body($response));
            $this->object_id = $response_body->data->id;
        }catch(Exception $e){
            new PipedriveApiException($e);
        }
    }
    /**
     * 
     * @return type integer
     */
    function get_id(){
        try{
            return $this->object_id;
        }catch(Exception $e){
            new PipedriveApiException($e);
        }
    }
}

class PipedriveApiException extends Exception {
    protected $data;
    public function __construct($message, $code = 0, $data = NULL) {
        parent::__construct($message, $code);
        $this->data = $data;
    }
    public function getData() {
        return $this->data;
    }
}