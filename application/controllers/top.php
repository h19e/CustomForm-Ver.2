<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Top extends CI_Controller {

    public function index()
    {
        $data = array();

        if ($this->input->server('REQUEST_METHOD') == "POST") {

            $this->load->model('dao/dao_user');
            $result = $this->dao_user->loginCheck();

            if ($result !== false) {       
                $this->cookie->set('user_id',$result['user_id']);
                $this->output->set_header('Location: /manage/customform/index/');
            }
            $data['account'] = $this->input->post('account');
        }

        $this->parser->parse('top',$data);
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
