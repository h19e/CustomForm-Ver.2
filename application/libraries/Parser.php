<?php

require_once APPPATH . 'third_party/Twig/Autoloader.php';
/**
 * Parser Class
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @category	Parser
 * @author		ExpressionEngine Dev Team
 * @link		http://codeigniter.com/user_guide/libraries/parser.html
 */
class My_Parser 
{

    public function __construct()
    {

        Twig_Autoloader::register();
        $loader = new Twig_Loader_Filesystem(APPPATH . 'views/');
        $this->twig = new Twig_Environment($loader,array());
    }

	/**
	 *  Parse a template
	 *
	 * Parses pseudo-variables contained in the specified template view,
	 * replacing them with the data in the second param
	 *
	 * @access	public
	 * @param	string
	 * @param	array
	 * @param	bool
	 * @return	string
	 */
	public function parse($template, $data = array(), $return = FALSE)
	{
        $twigTemplate = $this->twig->loadTemplate($template . '.html');
        if ($return === true) {
		    return $twigTemplate->render($data);
        } else {
            echo $twigTemplate->render($data);
        }
	}
}
