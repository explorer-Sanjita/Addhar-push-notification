<?php defined('BASEPATH') or exit('No direct script access allowed');

class Adhharapi
{

    private $AuthKey        = AUTH_KEY;
    private $ClientService  = CLIENT_SERVICE;

    public function __construct()
    {
        $this->CI = &get_instance();
    }

    public function getAddressNotification($agency_code = '')
    {
        if ($agency_code != '') {

            /* Endpoint */
            $url = 'http://addhar.localhost/api/getUpdatedAddress/' . $agency_code;

            /* eCurl */
            $curl = curl_init($url);

            /* Define content type */
            curl_setopt($curl, CURLOPT_HTTPHEADER, array(
                'Content-Type:application/json; charset=utf-8;',
                'Auth-Key:' . $this->AuthKey,
                'Client-Service:' . $this->ClientService
            ));
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLINFO_HEADER_OUT, true);

            /* Return json */
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

            /* make request */
            $result = curl_exec($curl);

            /* close curl */
            curl_close($curl);

            return $result;
        } else {
            return false;
        }
    }

    public function verifyAddhar($input = [])
    {
        if (!empty($input)) {

            /* Endpoint */
            $url = 'http://addhar.localhost/api/verifyAddhar';

            /* eCurl */
            $curl = curl_init($url);

            /* Set JSON data to POST */
            // curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($input));

            /* Define content type */
            curl_setopt($curl, CURLOPT_HTTPHEADER, array(
                'Content-Type:multipart/form-data;',
                'Auth-Key:' . $this->AuthKey,
                'Client-Service:' . $this->ClientService
            ));
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLINFO_HEADER_OUT, true);
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $input);

            /* Return json */
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

            /* make request */
            $result = curl_exec($curl);

            /* close curl */
            curl_close($curl);

            return $result;
        } else {
            return false;
        }
    }

    public function readNotification($id = '')
    {
        if ($id != '') {

            /* Endpoint */
            $url = 'http://addhar.localhost/api/readNotification/' . $id;

            /* eCurl */
            $curl = curl_init($url);

            /* Define content type */
            curl_setopt($curl, CURLOPT_HTTPHEADER, array(
                'Content-Type:application/json; charset=utf-8;',
                'Auth-Key:' . $this->AuthKey,
                'Client-Service:' . $this->ClientService
            ));
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLINFO_HEADER_OUT, true);

            /* Return json */
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

            /* make request */
            $result = curl_exec($curl);

            /* close curl */
            curl_close($curl);

            return $result;
        } else {
            return false;
        }
    }

    public function updateAddress($addhar_number = '', $updated_address = '')
    {
        if ($addhar_number != '' && $updated_address) {

            /* Endpoint */
            $url = 'http://addharbank.localhost/api/updateAddress/' . $addhar_number . '/' . $updated_address;

            /* eCurl */
            $curl = curl_init($url);

            /* Define content type */
            curl_setopt($curl, CURLOPT_HTTPHEADER, array(
                'Content-Type:application/json; charset=utf-8;',
                'Auth-Key:' . $this->AuthKey,
                'Client-Service:' . $this->ClientService
            ));
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLINFO_HEADER_OUT, true);

            /* Return json */
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

            /* make request */
            $result = curl_exec($curl);

            /* close curl */
            curl_close($curl);

            return $result;
        } else {
            return false;
        }
    }
}
