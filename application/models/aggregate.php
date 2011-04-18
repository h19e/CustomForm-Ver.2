<?php

class Aggregate extends CI_Model
{

    public function aggregate($question,$answer)
    {
    }




    public function radio($question,$answer)
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
