<?php

class Question extends CI_Controller {

	public function index()
	{
        $this->load->model('dao/dao_question');
        $data['list'] = $this->dao_question->getList();
        $data['customform_id'] = $this->input->get('customform_id');        
        $this->parser->parse('manage/question/list',$data);

	}

    public function sort()
    {
        $data = $this->input->get('data');
        $sort = explode(",",$data);
        $this->load->model('dao/dao_question');
        $this->dao_question->sort($sort);

    }


    public function regist()
    {
        $this->load->model('input_type');
        $data['typeOption'] = $this->input_type->get();
        
        $this->load->model('input_option');
        $option = $this->input_option->get();
        
        if ($this->input->server('REQUEST_METHOD') == "POST") {
            
            
            $this->load->model('dao/dao_question');
            $question_id = $this->dao_question->regist();

            $this->load->model('dao/dao_options');
            $this->dao_options->regist($question_id,$option);

            $this->output->set_header('Location: /manage/question/index/?customform_id=' 
                    . $this->input->get('customform_id'));
            return;

        }

        $data['optionList'] = $option['optionList'];
        $data['option_num'] = $option['option_num'];
        $data['customform_id'] = $this->input->get('customform_id');
        $this->parser->parse('manage/question/regist',$data);

    }
        



    public function update()
    {
        if ($this->input->server('REQUEST_METHOD') == "POST") {
        
            $this->load->model('input_option');
            $option = $this->input_option->get();
            
            $this->load->model('dao/dao_question');
            $question_id = $this->dao_question->update();

            $this->load->model('dao/dao_options');
            //一旦削除
            $this->dao_options->delete($question_id);
            
            //その後登録
            $this->dao_options->regist($question_id,$option);

            $this->output->set_header('Location: /index.php/manage/question/index/?customform_id=' 
                    . $this->input->get('customform_id'));
            return;


        } else {

            $this->load->model('dao/dao_question');
            $data = $this->dao_question->getInfo();

            $this->load->model('dao/dao_options');
            $list = $this->dao_options->getList($data['question_id']);
            
            //radioとか以外の対応も追加必要
            $data['option_num'] = (string)count($list);
            $data['optionList'] = $list;

            $this->load->model('input_type');
            $data['typeOption'] = $this->input_type->get();
            
            $this->parser->parse('manage/question/update',$data);
        }

    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
