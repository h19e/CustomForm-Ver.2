<?php

class Customform extends CI_Controller {

	public function index($offset = 0)
	{
        $limit = 3;
        $data = array();

        $this->load->model('dao/dao_customform');
        $data['count'] = $this->dao_customform->getCount();
        
        $data['list'] = $this->dao_customform->getList($limit,$offset);
        
        $this->load->model('pager');
        $data['pagination'] = $this->pager->make($data['count'],$limit);
        
        if ($offset > 0) {
            $data['offset'] = $offset;
        }
        $this->parser->parse('manage/customform/list',$data);


	}

    public function regist()
    {
        
        if ($this->input->server('REQUEST_METHOD') == "POST") {
            
            $this->load->library('form_validation');
            $this->form_validation->set_message('required',"%s に値が入力されていません");
            $this->form_validation->set_rules('customform_title','フォームタイトル','required');

            if ($this->form_validation->run() == FALSE) {
                $data['validation_errors'] = validation_errors();
                $data['customform_title'] = $this->input->post('customform_title');
                $data['design_id'] = $this->input->post('design_id');
            
            } else {
                //登録
                $this->load->model('dao_customform');
                $customform_id = $this->dao_customform->regist();
                
                $this->output->set_header('Location: /manage/customform/index/');
                return; 
            }
        }

        $this->load->model('dao/dao_design');
        $designList = $this->dao_design->getList();
        $data['designList'] = $designList;

        $this->parser->parse('manage/customform/regist',$data);

    }


    public function update()
    {
        
        if ($this->input->server('REQUEST_METHOD') == "POST") {
            
            $this->load->model('dao/dao_customform');
            $customform_id = $this->dao_customform->update();
                
            $this->output->set_header('Location: /index.php/manage/customform/index/');
            return; 
        
        } else {

            $this->load->model('dao/dao_customform');
            $data = $this->dao_customform->getInfo();
        }

        $this->load->model('dao/dao_design');
        $designList = $this->dao_design->getList();
        $data['designList'] = $designList;
        
        
        $this->parser->parse('manage/customform/update',$data);
    }

    public function release($offset)
    {

        //カスタムフォーム情報取得
        $this->load->model('dao/dao_customform');
        $customform = $this->dao_customform->get($this->cookie->get('user_id'));
        
        $currentTime = time();
        $endTime = strtotime($customform['end_time'] . " +1 day");
        $cacheTime = $endTime - $currentTime;

        $this->load->driver('cache');
        $this->cache->file->save('customform_' . $this->input->get('customform_id'),serialize($customform),$cacheTime);

        $currentUri = $this->input->server('REQUEST_URI');
        
        $this->output->set_header('Location: /manage/customform/index/' . $offset );
    
    }


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
