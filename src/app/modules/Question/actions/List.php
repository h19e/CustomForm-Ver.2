<?php

class Action_List
{
	public function execute()
	{
        $parameter = Parameter::getInstance();
       
        $userId = Cookie::get('user_id');        
        $formId = $parameter->get('form_id');
        
        $limit  = 10;
        $offset = 0;
        
        $dbh = Factory::pdo();
        $sth = $dbh->prepare("select 
        question_id,
        form_id,
        tbl_form.title as form_title,
        tbl_question.title,
        input_type,
        disp_order
        from tbl_form inner join tbl_question using(form_id)
        where user_id = :user_id 
        and form_id = :form_id
        and del_flg = false
        order by disp_order asc
        limit {$limit} offset {$offset}");
        $sth->bindValue(":user_id",$userId);
        $sth->bindValue(":form_id",$formId);
        $sth->execute();
        $questionList = $sth->fetchAll(PDO::FETCH_ASSOC);
        
        $parameter->set('question_list',$questionList);

	}
}
