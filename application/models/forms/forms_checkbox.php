<?php

class Forms_checkbox extends CI_Model
{

    public function aggregate($optionList,$answers)
    {
        $result = array();
        foreach ($optionList as $key => $option) {
            $result[$option['item']] = 0;
        }
        foreach ($answers as $answer) {
            $items = json_decode($answer['value']);
            foreach ($items as $item) {
                $result[$item] = $result[$item] + 1;
            }
        }
        
        return $result;
    }


}
