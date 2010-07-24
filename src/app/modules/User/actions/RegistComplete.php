<?php

class Action_RegistComplete
{
    public function execute()
    {
        $paramater = Parameter::getInstance();

        $account = $paramater->get('account');
        $password = md5($paramater->get('password'));
        $email_address = $paramater->get('email_address');
             
        $dbh = Factory::pdo();
        $query = "insert into tbl_user (account,password,email_address)
        values (:account,:password,:email_address)";
        
        $sth = $dbh->prepare($query); 
        $sth->bindValue(':account',$account);
        $sth->bindValue(':password',$password);
        $sth->bindValue(':email_address',$email_address);
        $sth->execute();
        

    }
}
        
