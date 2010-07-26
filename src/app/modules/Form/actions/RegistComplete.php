<?php

class Action_RegistComplete
{
    public function execute()
    {
        $paramater = Parameter::getInstance();

             
        $dbh = Factory::pdo();
        $query = "insert into tbl_form (
        user_id,
        title,
        input_msg,
        complete_msg,
        design_type,
        start_date,
        end_date,
        create_date,
        update_date,
        status,
        del_flg
        ) values (
        :user_id,
        :title,
        :input_msg,
        :complete_msg,
        :design_type,
        :start_date,
        :end_date,
        :create_date,
        :update_date,
        1,
        false )";
            
        $sth = $dbh->prepare($query); 
        
        $startDate = $paramater->get('start_date_y') 
        . "-" . $paramater->get('start_date_m')
        . "-" . $paramater->get('start_date_d') . " 00:00:00";
        
        $endDate = $paramater->get('end_date_y') 
        . "-" . $paramater->get('end_date_m')
        . "-" . $paramater->get('end_date_d') . " 23:59:59";

        
        $sth->bindValue(':user_id',Cookie::get('user_id'));
        $sth->bindValue(':title',$paramater->get('title'));
        $sth->bindValue(':input_msg',$paramater->get('input_msg'));
        $sth->bindValue(':complete_msg',$paramater->get('complete_msg'));
        $sth->bindValue(':design_type',$paramater->get('design_type'));
        $sth->bindValue(':start_date',$startDate);
        $sth->bindValue(':end_date',$endDate);
        $sth->bindValue(':create_date',date("Y-m-d H:i:s"));
        $sth->bindValue(':update_date',date("Y-m-d H:i:s"));
       
        
        try {
        $sth->execute();
        } catch (PDOException $e) {
            var_dump($e->getMessage());
        }

    }
}
        
