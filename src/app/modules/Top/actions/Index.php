<?php

class Action_Index
{
	public function execute()
	{


        Cookie::set('test','h19e');
        

        var_dump(Cookie::get('test'));

	}
}
