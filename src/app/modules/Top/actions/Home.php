<?php

class Action_Home
{
	public function execute()
	{
        $parameter = Parameter::getInstance();
       
        $userId = Cookie::get('user_id');        
        
        $limit  = 10;
        $offset = 0;
        
        $dbh = Factory::pdo();
        $sth = $dbh->prepare("select 
        form_id,
        title,
        start_date,
        end_date,
        create_date,
        update_date
        from tbl_form
        where user_id = :user_id 
        and del_flg = false
        order by create_date desc
        limit {$limit} offset {$offset}");
        $sth->bindValue(":user_id",$userId);
        $sth->execute();
        $formList = $sth->fetchAll(PDO::FETCH_ASSOC);
        
        $parameter->set('form_list',$formList);

	}
}
