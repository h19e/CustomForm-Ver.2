<?php

class Dao_options extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('dao');
        $this->pdo = $this->dao->connect();
    }

    public function getList($question_id)
    {
        $stmt = $this->pdo->prepare('select * from options
                where question_id = :question_id');

        $stmt->bindValue(':question_id',$question_id);
        $stmt->execute();
        
        $num = 0;
        while ($info = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $num++;
            $list[$num] = $info;
        }

        return $list;

    }

    public function delete($question_id)
    {
        $stmt = $this->pdo->prepare('delete from options where question_id = :question_id');
        $stmt->bindValue(':question_id',$question_id);
        $stmt->execute();
    }


    public function regist($question_id,$option)
    {
        foreach ($option['optionList'] as $num => $value) {
            $stmt = $this->pdo->prepare('insert into options (
                        question_id,
                        item,
                        default_check
                        ) values (
                        :question_id,
                        :item,
                        :default_check)');
            $stmt->bindValue(':question_id',$question_id);
            $stmt->bindValue(':item',$value['item']);
            $stmt->bindValue(':default_check',intval($value['default_check'] != ""));
            $stmt->execute();
        }
        return true;

    }

}
