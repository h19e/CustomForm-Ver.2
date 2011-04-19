<?php

class Register extends CI_Controller {

    private $data = array();

    public function input()
    {
        
        //ページコントロール        
        if ($this->input->server('REQUEST_METHOD') == "POST") {
            if ($this->input->post('complete') != "") {
                $this->complete();
                return;
            }
        }
        
        $this->parser->parse('public/register/input',$this->data);

    }        

    public function confirm()
    {
        
        $this->parser->parse('public/register/confirm',$this->data);

    }        

    public function complete()
    {
        $this->parser->parse('public/register/complete',$this->data);
        
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
