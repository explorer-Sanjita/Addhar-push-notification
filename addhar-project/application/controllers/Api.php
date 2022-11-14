<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Api extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getUpdatedAddress($agency_code)
    {
        try {
            $method             = $this->input->server('REQUEST_METHOD');
            if ($method != 'GET') {
                json_output(405, array('status' => 405, 'message' => 'Bad request : Method Not Allowed'));
            } else {
                $check_auth_client = $this->auth_model->check_auth_client();
                if ($check_auth_client == true) {
                    $conditions['where']    =  ['ll.status' => 'ACTIVE', 'll.is_deleted' => 'NO', 'agency_code' => $agency_code];
                    $results                = $this->Admin_model->getRows('agency_notification ll', 'll.id, ll.addhar_number, ll.updated_address', $conditions);

                    if (!empty($results)) {
                        $data = array(
                            'status'   => 200,
                            'message'  => 'Records Found',
                            'result'   => $results,
                        );
                        json_output(200, $data);
                    } else {
                        json_output(404, array('status' => 404, 'message' => 'Not Found : No Record Found.'));
                    }
                } else {
                    json_output(401, array('status' => 401, 'message' => 'Bad request : Unauthorized Headers'));
                }
            }
        } catch (Exception $e) {
            log_message('error', $e->getMessage());
            return;
        }
    }

    public function verifyAddhar()
    {
        try {
            $method             = $this->input->server('REQUEST_METHOD');
            if ($method != 'POST') {
                json_output(405, array('status' => 405, 'message' => 'Bad request : Method Not Allowed'));
            } else {
                $check_auth_client = $this->auth_model->check_auth_client();
                if ($check_auth_client == true) {
                    $addhar_number  = $this->input->post('addhar_number');
                    $agency_url     = $this->input->post('agency_url');
                    $agency_code    = $this->input->post('agency_code');

                    if ($addhar_number != '' && $agency_url != '' && $agency_code != '') {
                        $conditions['where']    = ['ur.addhar_number' => $addhar_number, 'ur.status' => 'ACTIVE', 'ur.is_deleted' => 'NO'];
                        $user                   = $this->Admin_model->getRow('users ur', 'ur.user_id, ur.user_phone, ur.addhar_number', $conditions);

                        if (!empty($user)) {
                            $otp            = mt_rand(100000, 999999);
                            $sendSMS        = false;

                            /*
                            $sender_details = array(
                                'template_id' => '622057e06c0e4e2fb107b8b9',
                                'variables'   => [
                                    'OTP'     => $otp,
                                ],
                            );
                            $sendSMS    = $this->msg91->sendSMS($user->user_phone,$sender_details);
                            */
                            $conditions['where']    = ['ur.addhar_number' => $addhar_number, 'ur.agency_code' => $agency_code, 'ur.status' => 'ACTIVE', 'ur.is_deleted' => 'NO'];
                            $user_link              = $this->Admin_model->getCount('agency_link ur', $conditions);

                            if ($user_link == 0) {
                                $data = array(
                                    'agency_url'     => $agency_url,
                                    'agency_code'     => $agency_code,
                                    'addhar_number' => $addhar_number,
                                    'status'         => "ACTIVE",
                                    'is_deleted'     => "NO",
                                );
                                $this->Admin_model->add('agency_link', $data);
                            }
                            $sendSMS = true;
                            if ($sendSMS) {
                                $data = array(
                                    'status'    => 200,
                                    'message'   => 'OTP sent',
                                    'data'      => [
                                        'addhar_number' => $user->addhar_number,
                                        'otp'           => $otp,
                                    ],
                                );
                                json_output(200, $data);
                            } else {
                                json_output(400, array('status' => 400, 'message' => 'OTP not sent', 'data' => null));
                            }
                        } else {
                            json_output(404, array('status' => 404, 'message' => 'Not Found : Invalide Addhar Number.', 'data' => null));
                        }
                    } else {
                        json_output(400, array('status' => 400, 'message' => 'Bad request : all fields are required.'));
                    }
                } else {
                    json_output(401, array('status' => 401, 'message' => 'Bad request : Unauthorized.'));
                }
            }
        } catch (Exception $e) {
            log_message('error', $e->getMessage());
            return;
        }
    }

    public function readNotification($id = '')
    {
        try {
            $method             = $this->input->server('REQUEST_METHOD');
            if ($method != 'GET') {
                json_output(405, array('status' => 405, 'message' => 'Bad request : Method Not Allowed'));
            } else {
                $check_auth_client = $this->auth_model->check_auth_client();
                if ($check_auth_client == true) {
                    
                    $results                = $this->Admin_model->edit('agency_notification',  ['status' => 'INACTIVE', 'is_deleted' => 'YES'], ['id' => $id ]);

                    if (!empty($results)) {
                        $data = array(
                            'status'   => 200,
                            'message'  => 'Records update',
                           
                        );
                        json_output(200, $data);
                    } else {
                        json_output(404, array('status' => 404, 'message' => 'Not Found : No Record Found.'));
                    }
                } else {
                    json_output(401, array('status' => 401, 'message' => 'Bad request : Unauthorized Headers'));
                }
            }
        } catch (Exception $e) {
            log_message('error', $e->getMessage());
            return;
        }
    }
}
