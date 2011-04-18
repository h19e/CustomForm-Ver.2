<?php

class Forms_radio extends CI_Model
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

    
    public function selectmenu($question,$answer)
    {
        $aggregate = array();
        foreach ($question['optionList'] as $key => $option) {
            $aggregate[$option['item']] = 0;
        }

        foreach ($answer as $value) {
            $item = json_decode($value['value']);
            $aggregate[$item] = $aggregate[$item] + 1;
        }

        return $aggregate;
    }

    public function checkbox($question,$answer)
    {
        $aggregate = array();
        foreach ($question['optionList'] as $key => $option) {
            $aggregate[$option['item']] = 0;
        }

        foreach ($answer as $value) {
            $items = json_decode($value['value']);
            foreach ($items as $item) {
                $aggregate[$item] = $aggregate[$item] + 1;
            }
        }

        return $aggregate;
    }
    
    public function textbox($question,$answer)
    {
        foreach ($answer as $value) {
            $item = json_decode($value['value']);
            $result[] = $item;
        }
        return $result;
    }
    
    public function textarea($question,$answer)
    {
        foreach ($answer as $value) {
            $item = json_decode($value['value']);
            $result[] = $item;
        }
        return $result;
    }



}
