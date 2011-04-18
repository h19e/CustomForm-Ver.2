<?php

class Preview extends CI_Controller {


    public function input()
    {
        
        //ページコントロール        
        if ($this->input->server('REQUEST_METHOD') == "POST") {
            if ($this->input->post('complete') != "") {
                $this->complete();
                return;
            }
        }
        
        //カスタムフォーム情報取得
        $this->load->model('dao/dao_customform');
        $customform = $this->dao_customform->get($this->cookie->get('user_id'));

        //質問作成
        foreach ($customform['questionList'] as $key => $question) {
            
            //質問タイトル
            $questionBodys[$question['question_id']]['question_title'] = $question['question_title'];
            
            //入力値 
            $question['answer'] = $this->input->post($question['name']);
            
            //質問内容
            $questionBodys[$question['question_id']]['body'] = 
                    $this->parser->parse('parts/forms/' . $question['input_type'] . '/input',$question,true);
        }
        
        //フォーム情報セット
        $data = array();
        $data['customform_id'] = $this->input->get('customform_id');
        $data['customform_title'] = $customform['customform_title'];
        $data['message'] = $customform['input_message'];
        $data['questionBodys'] = $questionBodys;
        
        //テンプレートデザイン
        $data['original_design'] = "layout/original/" . $customform['design_type'] . '.html';
      
       
        $this->parser->parse('manage/preview/input',$data);

    }        

    public function confirm()
    {
        
        //カスタムフォーム情報取得
        $this->load->model('dao/dao_customform');
        $customform = $this->dao_customform->get($this->cookie->get('user_id'));
    
        //質問作成
        foreach ($customform['questionList'] as $key => $question) {
            
            //質問タイトル
            $questionBodys[$question['question_id']]['question_title'] = $question['question_title'];
            
            //入力値 
            $question['answer'] = $this->input->post($question['name']);
            
            //質問内容
            $questionBodys[$question['question_id']]['body'] = 
                    $this->parser->parse('parts/forms/' . $question['input_type'] . '/confirm',$question,true);
        }
        
        $data = array();
        
        $data['customform_id'] = $this->input->get('customform_id');
        $data['customform_title'] = $customform['customform_title'];
        $data['message'] = $customform['confirm_message'];
        $data['questionBodys'] = $questionBodys;
        
        //テンプレートデザイン
        $data['original_design'] = "layout/original/" . $customform['design_type'] . '.html';
        
        $this->parser->parse('manage/preview/confirm',$data);

    }        

    public function complete()
    {
        if ($this->input->server('REQUEST_METHOD') == "POST") {
            $this->output->set_header('Location: /manage/preview/complete/?customform_id=' 
                    . $this->input->get('customform_id'));
        
            return;
        
        } 
        

        //カスタムフォーム情報取得
        $this->load->model('dao/dao_customform');
        $customform = $this->dao_customform->get($this->cookie->get('user_id'));
        
        $data['customform_id'] = $this->input->get('customform_id');
        $data['customform_title'] = $customform['customform_title'];
        $data['message'] = $customform['complete_message'];
        
        //テンプレートデザイン
        $data['original_design'] = "layout/original/" . $customform['design_type'] . '.html';
        
        $this->parser->parse('manage/preview/complete',$data);
        
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
