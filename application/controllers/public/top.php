<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Top extends CI_Controller {

    private $data = array();
    
    public function logout()
    {
        $this->cookie->clean('user_id');
        $this->output->set_header('Location: /');
        return true;
    }


    public function sandbox()
    {
        $this->cookie->set('user_id',1);
        $this->cookie->set('account','sandbox-user');
        $this->output->set_header('Location: /manage/customform/index/');
        return true;
    }


    public function index()
    {

        if ($this->input->server('REQUEST_METHOD') == "POST") {

            $this->load->model('dao/dao_user');
            $result = $this->dao_user->loginCheck();

            if ($result !== false) {       
                $this->cookie->set('user_id',$result['user_id']);
                $this->cookie->set('account',$result['account']);
                $this->output->set_header('Location: /manage/customform/index/');
                return true;
            }
            $this->data['account'] = $this->input->post('account');
        }

        $this->parser->parse('public/top/index',$this->data);
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
