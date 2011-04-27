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

    public function __construct()
    {
		
        $file_path = APPPATH.'config/'.ENVIRONMENT.'/database'.EXT;
    	
		if ( ! file_exists($file_path))
		{
			log_message('debug', 'Database config for '.ENVIRONMENT.' environment is not found. Trying global config.');
			$file_path = APPPATH.'config/database'.EXT;
			
			if ( ! file_exists($file_path))
			{
				continue;
			}
		}
		
		include($file_path);
        $dsn = $db['default']['dbdriver'] . ":host=" . $db['default']['hostname'] . "; ";
        $dsn .= "dbname=" . $db['default']['database'];
        $this->pdo = new PDO($dsn,$db['default']['username'],$db['default']['password']);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $this->pdo->setAttribute(PDO::ATTR_ORACLE_NULLS,PDO::NULL_TO_STRING);
    }

    public function connect()
    {
        return $this->pdo;
    }


}
