<?php

class Input_type extends CI_Model
{
    public function get()
    {
        $item = array(
                'radio'       => 'ラジオボタン',
                'checkbox'    => 'チェックボックス',
                'selectmenu' => 'セレクトメニュー',
                'textbox'     => 'テキストボックス',
                'textarea'    => 'テキストエリア');

        return $item;
    }


}
