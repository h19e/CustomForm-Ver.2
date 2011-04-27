<?php

class Dao_question extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('dao');
        $this->pdo = $this->dao->connect();
    }

    public function getList()
    {

        $stmt = $this->pdo->prepare('select * 
                from question q inner join customform c 
                on q.customform_id = c.customform_id
                where q.customform_id = :customform_id 
                and c.user_id = :user_id 
                order by sort_number asc ');
        $stmt->bindValue(':customform_id',$this->input->get('customform_id'));
        $stmt->bindValue(':user_id',$this->cookie->get('user_id'));
        $stmt->execute();
        $list = $stmt->fetchAll();
        return $list;
    }

    public function getInfo()
    {
        $stmt = $this->pdo->prepare('select * from question q inner join customform c
                on q.customform_id = c.customform_id
                where q.question_id = :question_id
                and user_id = :user_id');
        $stmt->bindValue(':question_id',$this->input->get('question_id'));
        $stmt->bindValue(':user_id',$this->cookie->get('user_id'));
        $stmt->execute();
        $info = $stmt->fetch(PDO::FETCH_ASSOC);
        return $info;

    }


    public function regist()
    {
        $current_time = date('Y-m-d H:i:s'); 
        $stmt = $this->pdo->prepare('insert into question (
                customform_id,
                question_title,
                input_type,
                required,
                disp_limit,
                text_size,
                max_size,
                textarea_rows,
                textarea_cols,
                validate_type,
                line_num,
                create_time,
                update_time,
                sort_number
                ) values (
                :customform_id,
                :question_title,
                :input_type,
                :required,
                :disp_limit,
                :text_size,
                :max_size,
                :textarea_rows,
                :textarea_cols,
                :validate_type,
                :line_num,
                :create_time,
                :update_time,
                :sort_number ) ');
        $stmt->bindValue(':customform_id',$this->input->get('customform_id'));
        $stmt->bindValue(':question_title',$this->input->post('question_title'));
        $stmt->bindValue(':input_type',$this->input->post('input_type'));
        $stmt->bindValue(':required',$this->input->post('required'));
        $stmt->bindValue(':disp_limit',$this->input->post('disp_limit'));
        $stmt->bindValue(':text_size',$this->input->post('text_size'));
        $stmt->bindValue(':max_size',$this->input->post('max_size'));
        $stmt->bindValue(':textarea_rows',$this->input->post('textarea_rows'));
        $stmt->bindValue(':textarea_cols',$this->input->post('textarea_cols'));
        $stmt->bindValue(':validate_type',$this->input->post('validate_type'));
        $stmt->bindValue(':line_num',$this->input->post('line_num'));
        $stmt->bindValue(':create_time',$current_time);
        $stmt->bindValue(':update_time',$current_time);
        $stmt->bindValue(':sort_number',time());
        $stmt->execute();

        $question_id = $this->pdo->lastInsertId();

        return $question_id;
    }

    public function update()
    {
        $current_time = date('Y-m-d H:i:s'); 
        $info = $this->getInfo();
        $question_id = $info['question_id'];

        $stmt = $this->pdo->prepare('update question set 
                question_title = :question_title,
                input_type = :input_type,
                required = :required,
                disp_limit = :disp_limit,
                text_size = :text_size,
                max_size = :max_size,
                textarea_rows = :textarea_rows,
                textarea_cols = :textarea_cols,
                validate_type = :validate_type,
                line_num = :line_num,
                update_time = :update_time
                where question_id = :question_id ');


        $stmt->bindValue(':question_id',$question_id);
        $stmt->bindValue(':question_title',$this->input->post('question_title'));
        $stmt->bindValue(':input_type',$this->input->post('input_type'));
        $stmt->bindValue(':required',$this->input->post('required'));
        $stmt->bindValue(':disp_limit',$this->input->post('disp_limit'));
        $stmt->bindValue(':text_size',$this->input->post('text_size'));
        $stmt->bindValue(':max_size',$this->input->post('max_size'));
        $stmt->bindValue(':textarea_rows',$this->input->post('textarea_rows'));
        $stmt->bindValue(':textarea_cols',$this->input->post('textarea_cols'));
        $stmt->bindValue(':validate_type',$this->input->post('validate_type'));
        $stmt->bindValue(':line_num',$this->input->post('line_num'));
        $stmt->bindValue(':update_time',$current_time);
        $stmt->execute();

        return $question_id;
    }

    public function sort($sort) 
    {
        $stmt = $this->pdo->prepare('update question set 
                sort_number = :sort_number
                where question_id = :question_id ');
        
        foreach ($sort as $key => $value) {
            $stmt->bindValue(':sort_number',$key + 1);
            $stmt->bindValue(':question_id',$value);
            $stmt->execute();
        }
    }



}
