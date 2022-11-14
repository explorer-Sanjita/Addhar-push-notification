<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Api extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function updateAddress($addhar_no = '', $updated_address = '')
    {
        try {
            $method             = $this->input->server('REQUEST_METHOD');
            if ($method != 'GET') {
                json_output(405, array('status' => 405, 'message' => 'Bad request : Method Not Allowed'));
            } else {
                $check_auth_client = true;
                if ($check_auth_client == true) {
                    $conditions['where']    =  ['ll.status' => 'ACTIVE', 'll.is_deleted' => 'NO', 'addhar_number' => number_format($addhar_no)];
                    $results                = $this->Admin_model->getRows('users ll', 'll.user_id', $conditions);

                    if (!empty($results)) {
                        $this->Admin_model->edit('users', ['user_address' => $updated_address], ['addhar_number' => $addhar_no]);
                        $data = array(
                            'status'   => 200,
                            'message'  => 'Records Update Successfully',
                            'result'   => null,
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
