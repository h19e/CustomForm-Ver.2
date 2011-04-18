<?php

class Answer extends CI_Controller 
{
    
    public function summary()
    {
        $this->load->driver('cache');
        $result = $this->cache->file->get('customform_' . $this->input->get('customform_id'));
        $customform = unserialize($result);

        $this->load->model('dao/dao_answer');
        foreach ($customform['questionList'] as $key => $question) {
            $answers = $this->dao_answer->get($question['question_id']);
            $inputType = $question['input_type'];
            
            $className = 'forms_' . $question['input_type'];
            $this->load->model('forms/' . $className);
            $result = $this->$className->aggregate($question['optionList'],$answers);
            
            $answerData = array();
            $answerData['result'] = $result;
            $answerData['max_count'] = max($result);

            $answerBodys[$question['question_id']]['name'] = $question['question_title'];                 
            $answerBodys[$question['question_id']]['body'] =
                    $this->parser->parse('parts/forms/' . $inputType . '/answer',$answerData,true);
        
        }
        
        $data = array();
        $data['customform_id'] = $this->input->get('customform_id');
        $data['customform_title'] = $customform['customform_title'];
        $data['answerBodys'] = $answerBodys;
        $data['original_design'] = "layout/original/" . $customform['design_type'] . '.html';

        $this->parser->parse('manage/answer/summary',$data);
        
    }


}
