<?php

class Forms_textarea extends CI_Model
{

    public function aggregate($optionList,$answers)
    {
        $result = array();
        foreach ($answers as $answer) {
            $item = json_decode($answer['value']);
            $result[] = $item;
        }
        
        return $result;
    }

    



}
