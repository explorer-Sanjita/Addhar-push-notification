<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('encode')) {
    function encode($data = '')
    {
        $encode = '';
        if (!empty($data)) {
            $encode         = encryptor('encrypt',$data);
        }
        return $encode;
    }
}

if (!function_exists('decode')) {
    function decode($data = '')
    {
        $decode = '';
        if (!empty($data)) {
            $decode_data    = urldecode($data);
            $decode         = encryptor('decrypt',$decode_data);
        }
        return $decode;
    }
}

function encryptor($action, $string) {
    $output = false;

    $encrypt_method = "AES-256-CBC";
    
    $secret_key = ENCRYPT_KEY;
    $secret_iv = hexdec(ENCRYPT_KEY);

    // hash
    $key = hash('sha256', $secret_key);

    // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
    $iv = substr(hash('sha256', $secret_iv), 0, 16);

    //do the encyption given text/string/number
    if( $action == 'encrypt' ) {
        $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
        $output = base64_encode($output);
    }
    else if( $action == 'decrypt' ){
    	//decrypt the given text/string/number
        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
    }

    return $output;
}

if (!function_exists('json_output')) {
    function json_output($statusHeader,$response)
    {
        $ci =& get_instance();
        $ci->output->set_content_type('application/json');
        $ci->output->set_status_header($statusHeader);
        $ci->output->set_output(json_encode($response));
    }
}
