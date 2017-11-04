<?php

/*Trang home của giao diện admin*/

class Home extends MY_Controller
{
    protected $_data;

    public function __construct()
    {
        parent::__construct();
//        $this->load->model('admin_model');
    }

    //lay ma chuc vu
    public function index()
    {
        $this->load->model('admin_model');
        $username = $this->session->userdata('username');
        $password = $this->session->userdata('password');
        $input = array('EMAIL'=>$username,'MATKHAU'=>$password);
        $info = $this->admin_model->get_info_rule($input);
        $level = $this->admin_model->get_rule($info['MA_CHUCVU']);
        $this->session->set_userdata('level',$level[0]['TEN_CHUCVU']);
        $this->session->set_userdata('account',$info);
        $this->_data['temp'] = 'admin/home/index';//khung tieu de cua admin duoc giu lai

        $this->load->view('admin/main', $this->_data);
    }
}