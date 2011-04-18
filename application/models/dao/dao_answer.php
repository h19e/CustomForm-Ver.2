<?php

class Dao_answer extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('dao');
        $this->pdo = $this->dao->connect();
    }

    public function get($question_id)
    {
        $stmt = $this->pdo->prepare('select value from answer where question_id = :question_id');
        $stmt->bindValue(':question_id',$question_id);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }


    public function regist($question_id)
    {
        $current_time = date('Y-m-d H:i:s'); 
        $stmt = $this->pdo->prepare('insert into answer (
                question_id,
                value,
                create_time
                ) values (
                :question_id,
                :value,
                :create_time ) ');
        $stmt->bindValue(':question_id',$question_id);
        $stmt->bindValue(':value',json_encode($this->input->post('question_' . $question_id)));
        $stmt->bindValue(':create_time',$current_time);
        $stmt->execute();

        return true;
    }


}
