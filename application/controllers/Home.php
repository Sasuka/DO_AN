<?php

/*Trang home của giao diện người dùng*/

class Home extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
    }



    public function index()
    {
        $this->data['temp']= 'site/home/index';
        $this->load->view('site/layout', $this->data);
    }
    public function demo(){
        $this->load->model('catelog_model');
        $cate = $this->catelog_model->getList();
        //pre($cate);
        $this->data['cate']= $cate;
        $this->load->view('site/layout',$this->data);
    }



}