<?php

class Input_option extends CI_Model
{
    public function get()
    {
        $optionList = array();
        $num = 0;
        $optionCheck = $this->input->post('option_check');

        if (is_array($this->input->post('option'))) {
            foreach ($this->input->post('option') as $key => $value) {
                if ($value == "") {
                    continue;
                }
                $num++;
                $optionList[$num]['item'] = $value;
                $optionList[$num]['default_check'] = $optionCheck[$key];
            }
        }
        if ($num == 0) {
            $optionList[1]['item'] = '';
            $optionList[1]['default_check'] = '';
            $num = 1;
        }

        $option['option_num'] = (string)$num;
        $option['optionList'] = $optionList;
        return $option;
    }



}
