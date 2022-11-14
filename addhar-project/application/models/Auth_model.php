<?php

use Guzzle\Service\Resource\Model;

defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{

    public $auth_key       = AUTH_KEY;
    public $client_service = CLIENT_SERVICE;

    public function __construct()
    {
        parent::__construct();
    }

    public function check_auth_client()
    {
        $client_service = $this->input->get_request_header('Client-Service', true);
        $auth_key       = $this->input->get_request_header('Auth-Key', true);
        if ($client_service == $this->client_service && $auth_key == $this->auth_key) {
            return true;
        } else {
            return json_output(401, array('status' => 401, 'message' => 'Bad request : Unauthorized.'));
        }
    }
}
