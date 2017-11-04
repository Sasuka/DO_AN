<?php
/**
 * Created by PhpStorm.
 * User: tient
 * Date: 14/8/2017
 * Time: 4:05
 */
class  Customer extends MY_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('customer_model');
    }
    public function index(){
        //lay tông số lượng tất cả các sản phẩm
        $input['where'] = array('TRANGTHAI'=>1);
        $total_rows = $this->customer_model->get_total($input);
        $this->data['total_rows'] = $total_rows;
        //lay danh sách kach hang
        $list = $this->customer_model->getList($input);
       // pre($list);

        //lay noi dung cua messager
        $this->data['list'] = $list;
        $this->data['message'] = $this->session->flashdata('message');
        $this->data['temp'] = 'admin/customer/index';
        $this->load->view('admin/main', $this->data);
    }
}