<?php

class Forms_selectmenu extends CI_Model
{

    public function aggregate($optionList,$answers)
    {
        $result = array();
        foreach ($optionList as $key => $option) {
            $result[$option['item']] = 0;
        }
        foreach ($answers as $answer) {
            $item = json_decode($answer['value']);
            $result[$item] = $result[$item] + 1;
        }
        
        return $result;
    }

    

}
