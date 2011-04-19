<?php

class Dao_user extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('dao');
        $this->pdo = $this->dao->connect();
    }
    
    public function loginCheck()
    {
        $stmt = $this->pdo->prepare('select user_id,account from user 
                where account = :account
                and password = :password');
        $stmt->bindValue(':account',$this->input->post('account'));
        $stmt->bindValue(':password',md5($this->input->post('password')));
        $stmt->execute();
        $info = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if (isset($info['user_id'])) { 
            return $info; 
        } 
        return false;
        
    }
}
