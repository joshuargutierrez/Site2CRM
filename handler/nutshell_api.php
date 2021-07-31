<?php
/* Copyright (C) 2019  Site2CRM*/
defined( 'ABSPATH' ) or die( '::NO INDIRECT ACCESS ALLOWED::' );
/**
 * @class NutshellApi
 * @brief Easy access to the Nutshell JSON-RPC API
 * 
 * This class is instantiated with a username and API key. Once it has been
 * instantiated, the call() method is used to make calls to the Nutshell API.
 * 
 * Rather than using call(), you can also call any Nutshell API methods on 
 * this class. For example, rather than calling
 * @code
 *  $api->call('getContact', $params);
 * @endcode
 * you can call
 * @code
 *  $api->getContact($params);
 * @endcode
 * 
 * Calls made using this class are synchronous - the method blocks until the
 * request is completed.
 * 
 * Requires PHP 5.0+ Wordpress and JSON modules.
 * wp_remote_post: https://codex.wordpress.org/Function_Reference/wp_remote_post
 * JSON Module: http://pecl.php.net/package/json
 * 
 * @version 2.0
 * @date July 6, 2019
 */
class NutshellApi {
    //URl to get API endpoint from
    const ENDPOINT_DISCOVER_URL = 'https://api.nutshell.com/v1/json';
    //URL endpoint for API access
    protected $endpoint = NULL;
    // wp_remote_post() args array
    protected $args = NULL;
    /**
     * Initializes the API access class. Takes care of endpoint discovery.
     * 
     * @param type $username Nutshell API username
     * @param type $apiKey Nutshell API token
     * @throws NutshellApiException extends Exception
     */
    function __construct($username, $apiKey) {
        try{
            $this->endpoint = self::_getApiEndpointForUser($username);
            $authHeader = base64_encode($username . ':' . $apiKey);
            $this->args['headers'] = array('Authorization: Basic ' => $authHeader);
            $this->args['cookies'] = array();
            $this->args['sslverify'] = true;
            $this->args['sslcertificates'] = dirname(__FILE__) . '/geotrust_global_ca.crt';
        }catch(Exception $e){throw new NutshellApiException($e);}
    }
    /**
    * Calls a Nutshell API method.
    * 
    * Returns the result from that call or, if there was an error on the server, 
    * catches and throws an exception.
    * 
    * @param string $method
    * @param array|null $params
    * @return array
    * @throws NutshellApiException
    */
    public function call($method, array $params = NULL) {
        try{
            $payload = array('method' => $method, 'params' => $params, 'id' => $this->_generateRequestId());
            $this->args['body'] = json_encode($payload);
            $response = wp_remote_post($this->endpoint, $this->args);
            $result = wp_remote_retrieve_body( $response );
            $decoded = json_decode($result);
            return $decoded->result;
        }catch(Exception $e){throw new NutshellApiException($e);}
    }
    /**
     * Calls a Nutshell API method - magic method
     * 
     * See call() for detailed specs.
     * 
     * @return array
     * @throws NutshellApiException
     */
    public function __call($name, $args) {
        $params = null;
        try{
            if (count($args) === 1 && is_array($args[0])) {
                $params = $args[0];
            } else {
                $params = $args;
            }
            return $this->call($name, $params);
        }catch(Exception $e){throw new NutshellApiException($e);}
    }
    /**
    * Finds the appropriate API endpoint for the given user.
    * 
    * Info on endpoint discovery: http://nutshell.com/api/endpoint-discovery.html
    * 
    * @param string $username
    * @return string API endpoint
    * @throws NutshellApiException
    */
    protected function _getApiEndpointForUser($username) {
        try{
            $payload = array('method' => 'getApiForUsername', 'params' => array('username' => $username), 'id' => $this->_generateRequestId(),);
            $args['body'] = json_encode($payload);
            $args['header'] = false;
            $args['sslverify'] = true;
            $args['sslcertificates'] = dirname(__FILE__) . '/geotrust_global_ca.crt';
            $response = wp_remote_post(self::ENDPOINT_DISCOVER_URL, $args);
            $result = wp_remote_retrieve_body( $response );
            $decoded = json_decode($result);
            var_dump($decoded->result->api);
            $this->endpoint = 'https://' . $decoded->result->api . '/api/v1/json';
            return $this->endpoint;
        }catch(Exception $e){throw new NutshellApiException($e);}
    }
    /**
     * Generates a random JSON request ID
     * 
     * @return string
     */
    protected function _generateRequestId() {
        try{
            return substr(md5(rand()), 0, 8);
        }catch(Exception $e){throw new NutshellApiException($e);}
    }
}

class NutshellApiException extends Exception {
    protected $data;
    public function __construct($message, $code = 0, $data = NULL) {
        parent::__construct($message, $code);
        $this->data = $data;
    }
    public function getData() {
        return $this->data;
    }
}