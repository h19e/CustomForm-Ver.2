<?php

class Pager extends CI_Model 
{
    public function make($total,$limit)
    {
        $this->load->library('pagination');
        $urls = explode("/",$this->input->server('REQUEST_URI'));
        $config['base_url'] = '/' . $urls[1] . '/' . $urls[2] . '/' . $urls[3] . '/';
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
        $this->pagination->initialize($config);
        return $this->pagination->create_links();
    }
}
