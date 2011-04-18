<?php

class Dao_customform extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('dao');
        $this->pdo = $this->dao->connect();
    }

    public function get($user_id)
    {

        //ベース
        $stmt = $this->pdo->prepare('select * from customform c inner join design d 
                on c.design_id = d.design_id
                where customform_id = :customform_id
                and user_id = :user_id');
        $stmt->bindValue(':customform_id',$this->input->get('customform_id'));
        $stmt->bindValue(':user_id',$user_id);
        $stmt->execute();
        $customform = $stmt->fetch(PDO::FETCH_ASSOC);
        
        //質問
        $stmt = $this->pdo->prepare('select * from question where customform_id = :customform_id');
        $stmt->bindValue(':customform_id',$this->input->get('customform_id'));
        $stmt->execute();
        $questionList = $stmt->fetchAll(PDO::FETCH_ASSOC);

        //各選択肢
        foreach ($questionList as $key => $value) {
            $stmt = $this->pdo->prepare('select * from options where question_id = :question_id');
            $stmt->bindValue(':question_id',$value['question_id']);
            $stmt->execute();
            $questionList[$key]['optionList'] = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $questionList[$key]['name'] = 'question_' . $value['question_id'];
        }

        $customform['questionList'] = $questionList;

        return $customform;
    }



    public function getCount()
    {

        $stmt = $this->pdo->prepare('select count(*) from customform where user_id = :user_id');
        $stmt->bindValue(':user_id',$this->cookie->get('user_id'));
        $stmt->execute();
        $count = $stmt->fetchColumn();
        return $count;

    }

    public function getList($limit,$offset)
    {
        
        $stmt = $this->pdo->prepare('select * from customform c inner join design d
        on c.design_id = d.design_id
        where user_id = :user_id
        limit ' . $limit . ' offset ' . $offset );
        $stmt->bindValue(':user_id',$this->cookie->get('user_id'));
        $stmt->execute();
        $list = $stmt->fetchAll();
        return $list;

    }
    
    public function getInfo()
    {
        $stmt = $this->pdo->prepare('select * from customform 
                where user_id = :user_id 
                and customform_id = :customform_id');
        $stmt->bindValue(':user_id',$this->cookie->get('user_id'));
        $stmt->bindValue(':customform_id',$this->input->get('customform_id'));
        $stmt->execute();
        $info = $stmt->fetch(PDO::FETCH_ASSOC);
        
        list($date,$time) = explode(" ",$info['end_time']);
        list($year,$month,$day) = explode("-",$date);

        $info['end_time_year'] = $year;
        $info['end_time_month'] = $month;
        $info['end_time_day'] = $day;

        return $info;
    }


    public function regist()
    {

        $current_time = date("Y-m-d H:i:s");
        $end_time = 
                $this->input->post('end_time_year') . '-' .
                $this->input->post('end_time_month') . '-' .
                $this->input->post('end_time_day') . ' 00:00:00';
        
        $stmt = $this->pdo->prepare('insert into customform (
                user_id,
                customform_title,
                input_message,
                confirm_message,
                complete_message,
                design_id,
                end_time,
                create_time,
                update_time 
                ) values (
                :user_id,
                :customform_title,
                :input_message,
                :confirm_message,
                :complete_message,
                :design_id,
                :end_time,
                :create_time,
                :update_time )');
        
        $stmt->bindValue(':user_id',$this->cookie->get('user_id')); 
        $stmt->bindValue(':customform_title',$this->input->post('customform_title')); 
        $stmt->bindValue(':input_message',$this->input->post('input_message')); 
        $stmt->bindValue(':confirm_message',$this->input->post('confirm_message')); 
        $stmt->bindValue(':complete_message',$this->input->post('complete_message')); 
        $stmt->bindValue(':design_id',$this->input->post('design_id')); 
        $stmt->bindValue(':end_time',$end_time); 
        $stmt->bindValue(':create_time',$current_time); 
        $stmt->bindValue(':update_time',$current_time); 

        try {
        $stmt->execute();
        } catch (Exception $e) {
            echo $e->getMessage();
            exit;
        }
        $customform_id = $this->pdo->lastInsertId();

        return $customform_id;

    }

    public function update()
    {
        $current_time = date("Y-m-d H:i:s");
        $end_time = 
                $this->input->post('end_time_year') . '-' .
                $this->input->post('end_time_month') . '-' .
                $this->input->post('end_time_day') . ' 00:00:00';
        
        
        $stmt = $this->pdo->prepare('update customform set 
                customform_title = :customform_title,
                input_message = :input_message,
                confirm_message = :confirm_message,
                complete_message = :complete_message,
                design_id = :design_id,
                end_time = :end_time,
                update_time = :update_time
                where customform_id = :customform_id
                and user_id = :user_id ');
         
        $stmt->bindValue(':user_id',$this->cookie->get('user_id')); 
        $stmt->bindValue(':customform_id',$this->input->post('customform_id')); 
        $stmt->bindValue(':customform_title',$this->input->post('customform_title')); 
        $stmt->bindValue(':input_message',$this->input->post('input_message')); 
        $stmt->bindValue(':confirm_message',$this->input->post('confirm_message')); 
        $stmt->bindValue(':complete_message',$this->input->post('complete_message')); 
        $stmt->bindValue(':design_id',$this->input->post('design_id')); 
        $stmt->bindValue(':end_time',$end_time); 
        $stmt->bindValue(':update_time',$current_time); 

        try {
            $stmt->execute();
        } catch (Exception $e) {
            echo $e->getMessage();
            exit;
        }

        return $this->input->get('customform_id');

    }




}
