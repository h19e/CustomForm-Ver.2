<?php

/**
 * Parser Class
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @category	Parser
 * @author		ExpressionEngine Dev Team
 * @link		http://codeigniter.com/user_guide/libraries/parser.html
 */
class My_Dao 
{

    const DSN = 'mysql:host=localhost; dbname=customform';
    const USER = 'h19e';
    const PASSWORD = 'password';

    public function __construct()
    {
        $this->pdo = new PDO(self::DSN,self::USER,self::PASSWORD);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $this->pdo->setAttribute(PDO::ATTR_ORACLE_NULLS,PDO::NULL_TO_STRING);
    }

    public function connect()
    {
        return $this->pdo;
    }


}
