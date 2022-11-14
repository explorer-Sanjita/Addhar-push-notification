<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model{
    protected $userdata = '';
    function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->userdata = $this->session->userdata('userdata_adm');
    }

    public function getRow($table, $select='*', $conditions = [])
    {
        try {
            $this->db->select($select);
            $this->db->from($table);
            if(!empty($conditions)){
                if(array_key_exists("where",$conditions) && !empty($conditions["where"])){
                    foreach($conditions["where"] as $k=>$v){
                        if(is_array($v)) $this->db->where_in($k, $v);
                        else $this->db->where($k, $v);
                    }
                }
                if(array_key_exists("where_in",$conditions) && !empty($conditions["where_in"])){
                    foreach($conditions["where_in"] as $k=>$v){
                        if(is_array($v)) $this->db->where_in($k, $v);
                    }
                }
                if(array_key_exists("where_not_in",$conditions) && !empty($conditions["where_not_in"])){
                    foreach($conditions["where_not_in"] as $k=>$v){
                        if(is_array($v)) $this->db->where_not_in($k, $v);
                    }
                }
                if(array_key_exists("where_raw",$conditions) && !empty($conditions["where_raw"])){    
                    $this->db->where($conditions["where_raw"], NULL, FALSE);
                }
                if(array_key_exists("join",$conditions) && !empty($conditions["join"])){
                    foreach($conditions["join"] as $j){
                        $this->db->join($j[0], $j[1], $j[2]);
                    }
                }
                if(array_key_exists("like",$conditions) && !empty($conditions["like"])){
                    foreach($conditions["like"] as $k=>$v){
                        $this->db->like($k, $v);
                    }
                }
                if(array_key_exists("group_by",$conditions) && !empty($conditions["group_by"])){
                    $this->db->group_by($conditions["group_by"]);
                }
                if(array_key_exists("order_by",$conditions) && !empty($conditions["order_by"])){
                    if(is_array($conditions["order_by"]))
                        $this->db->order_by($conditions["order_by"][0], $conditions["order_by"][1]);
                    else $this->db->order_by($conditions["order_by"]);
                }
                if(array_key_exists("limit",$conditions) && !empty($conditions["limit"])){
                    if(is_array($conditions["limit"]))
                        $this->db->limit($conditions["limit"][0], $conditions["limit"][1]);
                    else $this->db->limit($conditions["limit"]);
                }
            }
            $query = $this->db->get();
            $db_error = $this->db->error();
            if (!empty($db_error) && $db_error['code'] != 0) {
                throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
                return false; 
            }   
            return $query->row();
        } catch (Exception $e) {    
            log_message('error',$e->getMessage());
            return;
        }
    }

    public function add($table, $rowInfo)
    {
        try {
            $this->userdata = $this->session->userdata('userdata_adm');

            $this->db->trans_start();

            if(!isset($rowInfo['created_at'])) $rowInfo['created_at'] = time();
            if(!isset($rowInfo['created_by']) && isset($this->userdata->user_id))
                $rowInfo['created_by'] = $this->userdata->user_id;

            if(is_array($table)){
                foreach($table as $t){
                    $rowInfo['created_by'] = 0;
                    $this->db->insert($t, $rowInfo);
                }
            }
            else $this->db->insert($table, $rowInfo);
            $db_error = $this->db->error();
            if (!empty($db_error) && $db_error['code'] != 0) {
                throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
                return false; 
            }   
            $insert_id = $this->db->insert_id();

            if($insert_id == 0) $insert_id = $this->db->affected_rows();

            $this->db->trans_complete();

            return $insert_id;
        } catch (Exception $e) {    
            log_message('error',$e->getMessage());
            return;
        }
    }

    public function getCount($table, $conditions = [])
    {
        try {
            $this->db->from($table);
            if(!empty($conditions)){
                if(array_key_exists("where",$conditions) && !empty($conditions["where"])){
                    foreach($conditions["where"] as $k=>$v){
                        if(is_array($v)) $this->db->where_in($k, $v);
                        else $this->db->where($k, $v);
                    }
                }
                if(array_key_exists("where_in",$conditions) && !empty($conditions["where_in"])){
                    foreach($conditions["where_in"] as $k=>$v){
                        if(is_array($v)) $this->db->where_in($k, $v);
                    }
                }
                if(array_key_exists("where_not_in",$conditions) && !empty($conditions["where_not_in"])){
                    foreach($conditions["where_not_in"] as $k=>$v){
                        if(is_array($v)) $this->db->where_not_in($k, $v);
                    }
                }
                if(array_key_exists("where_raw",$conditions) && !empty($conditions["where_raw"])){    
                    $this->db->where($conditions["where_raw"], NULL, FALSE);
                }
                if(array_key_exists("join",$conditions) && !empty($conditions["join"])){
                    foreach($conditions["join"] as $j){
                        $this->db->join($j[0], $j[1], $j[2]);
                    }
                }
                if(array_key_exists("like",$conditions) && !empty($conditions["like"])){
                    foreach($conditions["like"] as $k=>$v){
                        $this->db->like($k, $v);
                    }
                }
                if(array_key_exists("group_by",$conditions) && !empty($conditions["group_by"])){
                    $this->db->group_by($conditions["group_by"]);
                }
                if(array_key_exists("order_by",$conditions) && !empty($conditions["order_by"])){
                    if(is_array($conditions["order_by"]))
                        $this->db->order_by($conditions["order_by"][0], $conditions["order_by"][1]);
                    else $this->db->order_by($conditions["order_by"]);
                }
                if(array_key_exists("limit",$conditions) && !empty($conditions["limit"])){
                    if(is_array($conditions["limit"]))
						$this->db->limit($conditions["limit"][0], $conditions["limit"][1]);
					else $this->db->limit($conditions["limit"]);
                }
            }
            $query = $this->db->get();
            $db_error = $this->db->error();
            if (!empty($db_error) && $db_error['code'] != 0) {
                throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
                return false; 
            }     
            $count = $query->num_rows();  
            return $count;
        } catch (Exception $e) {    
            log_message('error',$e->getMessage());
            return;
        }

    }

    public function getRows($table, $select='*', $conditions = [])
    {
        try {
            $this->db->select($select);
            $this->db->from($table);
            if(!empty($conditions)){
                if(array_key_exists("where",$conditions) && !empty($conditions["where"])){
                    foreach($conditions["where"] as $k=>$v){
                        if(is_array($v)) $this->db->where_in($k, $v);
                        else $this->db->where($k, $v);
                    }
                }
                if(array_key_exists("where_in",$conditions) && !empty($conditions["where_in"])){
                    foreach($conditions["where_in"] as $k=>$v){
                        if(is_array($v)) $this->db->where_in($k, $v);
                    }
                }
                if(array_key_exists("where_not_in",$conditions) && !empty($conditions["where_not_in"])){
                    foreach($conditions["where_not_in"] as $k=>$v){
                        if(is_array($v)) $this->db->where_not_in($k, $v);
                    }
                }
                if(array_key_exists("where_raw",$conditions) && !empty($conditions["where_raw"])){    
                    $this->db->where($conditions["where_raw"], NULL, FALSE);
                }
                if(array_key_exists("join",$conditions) && !empty($conditions["join"])){
                    foreach($conditions["join"] as $j){
                        $this->db->join($j[0], $j[1], $j[2]);
                    }
                }
                if(array_key_exists("like",$conditions) && !empty($conditions["like"])){
                    foreach($conditions["like"] as $k=>$v){
                        $this->db->like($k, $v);
                    }
                }
                if(array_key_exists("group_by",$conditions) && !empty($conditions["group_by"])){
                    $this->db->group_by($conditions["group_by"]);
                }
                if(array_key_exists("order_by",$conditions) && !empty($conditions["order_by"])){
                    if(is_array($conditions["order_by"]))
                        $this->db->order_by($conditions["order_by"][0], $conditions["order_by"][1]);
                    else $this->db->order_by($conditions["order_by"]);
                }
                if(array_key_exists("limit",$conditions) && !empty($conditions["limit"])){
					if(is_array($conditions["limit"]))
						$this->db->limit($conditions["limit"][0], $conditions["limit"][1]);
					else $this->db->limit($conditions["limit"]);
                }
            }
            $query = $this->db->get();
            $db_error = $this->db->error();
            if (!empty($db_error) && $db_error['code'] != 0) {
                throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
                return false; 
            }   
            $result = $query->result();
            return $result;
        } catch (Exception $e) {    
            log_message('error',$e->getMessage());
            return;
        }
    }

    public function edit($table, $rowInfo, $where = [])
    {
        try {
            if(!empty($where)){
                foreach($where as $k=>$v){
                    $this->db->where($k, $v);
                }
            }
            $rowInfo['updated_at'] = time();
            // if(!isset($rowInfo['updated_by']) && isset($this->userdata->user_id))
            //     $rowInfo['updated_by'] = $this->userdata->user_id;
            if(is_array($table)){
                foreach($table as $t){
                    // $rowInfo['updated_by'] = 0;
                    $this->db->update($t, $rowInfo);
                }
            }
            else $this->db->update($table, $rowInfo);
            $db_error = $this->db->error();
            if (!empty($db_error) && $db_error['code'] != 0) {
                throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
                return false; 
            }   
            return $this->db->affected_rows();
        } catch (Exception $e) {    
            log_message('error',$e->getMessage());
            return;
        }
    }

    public function delete($table, $where = [])
    {
        try {
            if(!empty($where)){
                foreach($where as $k=>$v){
                    $this->db->where($k, $v);
                }
            }
            $this->db->delete($table);
            $db_error = $this->db->error();
            if (!empty($db_error) && $db_error['code'] != 0) {
                throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
                return false; 
            }   
            return $this->db->affected_rows();
        } catch (Exception $e) {    
            log_message('error',$e->getMessage());
            return;
        }
    }

    public function add_department($table, $rowInfo)
    {
    if(isset($rowInfo['id'])){
       
       $this->db->where('id',$rowInfo['id']);
        $result=$this->db->update($table, $rowInfo);
        
    }else{
    
        $result=$this->db->insert($table, $rowInfo);
    }
    return $result; 
        
    }
    
    public function getRecord($table, $select='*', $where = [])
    {
        $this->db->select($select);
        $this->db->from($table);
        if(!empty($where)){
            foreach($where as $k=>$v){
                $this->db->where($k, $v);
            }
        }
        $query = $this->db->get();
        
        return $query->result_array();
    }
    
    public function deleteRecord($table,$id)
    {
        $this->db->where('id',$id);
        $data=array('is_deleted'=>'YES');
        $this->db->update($table,$data);
        return TRUE;
    }

}
?>