<?php

class Action_LoginConfirm
{
	public function execute()
	{
        $parameter = Parameter::getInstance();
        $account = $parameter->get('account');
        $password = md5($parameter->get('password'));
        
        $dbh = Factory::pdo();
        $sth = $dbh->prepare("select user_id from tbl_user 
        where account = :account and password = :password");
        $sth->bindValue(":account",$account);
        $sth->bindValue(":password",$password);
        $sth->execute();
        $userInfo = $sth->fetch(PDO::FETCH_ASSOC);

        $controller = Controller::getInstance(); 
        if (isset($userInfo['user_id'])) {
            Cookie::set('user_id',$userInfo['user_id']);
            header ('Location: ' . ENTRY_PATH . '?MO=Top&AC=Home');
        } else {
            $parameter->set('error_msg','アカウントとパスワードが一致しません');
            $controller->forward('Top','Index');
        }   

        return false; 

	}
}
