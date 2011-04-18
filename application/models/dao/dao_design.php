<?php

class Dao_design extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('dao');
        $this->pdo = $this->dao->connect();
    }

    public function getList()
    {
        $stmt = $this->pdo->prepare('select design_id,design_type from design');
        $stmt->execute();
        $list = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $list;

    }


}
