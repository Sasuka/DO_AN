<?php

class MY_Controller extends CI_Controller
{
    //transtion data to view
    public $data = array();

    //lay danh sach nhom san pham
    public function getListGroup()
    {
        return $this->site_model->groupMenu();
    }

    public function getListCate()
    {
        return $this->site_model->cateMenu();
    }

//    ====================PRODUCT====================//
    public function getAllProduct()
    {
        $this->product_model->getAllListProduct();
    }

    public function listProct($product = '')
    {
        $this->site_model->addProduct($product);


    }

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('site_model', 'product_model', 'catelog_model'));

        $controler = $this->uri->segment(1);
        switch ($controler) {

            case 'admin': {
//                echo 'Bạn đang là admin';
                $this->load->helper('admin');
                $this->_check_login();
                break;
            }
            case 'process': {
                $this->load->helper('process');
                break;
            }
            default: {

                $this->load->model(array('product_model', 'catelog_model'));
                //lay noi dung cua messager
                $this->data['message'] = $this->session->flashdata('message');


                $input = array();
                //dem so luong loai trong cung mot nhom
                $input['select'] = 'MA_NHOM_SANPHAM';
                $input['count'] = 'MA_LOAI_SANPHAM';
                $input['group_by'] = 'MA_NHOM_SANPHAM';
                $input['order_by'] = 'DESC';
                $this->data['countGroup'] = $this->catelog_model->count($input);
                //  pre( $this->_data['countGroup']);
                //dem so luong  san pham trong cung 1 loai : EX: NOKIA 20 SAMSUNG 10 COUNT 2
                $input['select'] = 'MA_LOAI_SANPHAM';
                $input['where'] = array('TRANGTHAI' => '1', 'DONGIA_BAN >' => '0');
                $input['count'] = 'MA_SANPHAM';
                $input['group_by'] = 'MA_LOAI_SANPHAM';
                $input['order_by'] = 'DESC';
                $this->data['countCate'] = $this->product_model->count($input);
                // print_r($this->_data['countCate']);
//         pre($this->_data['countGroup']);

                $this->data['listCate'] = $this->getListCate();
                $this->data['listGroup'] = $this->getListGroup();
//       $this->_data['cateProduct'] = $this->getCateToGroup($parentId);
//        $this->_data['']

                $userId = $this->session->userdata('login');
//                $this->data['infoAcc'] = $userId;
             //   $this->session->sess_destroy();
                if (!empty($userId)){
                    $this->load->model('customer_model');

                    $input =array();
                    $input['where'] = array('MA_KHACHHANG'=>$userId);
                    $user_info = $this->customer_model->getList($input);
                   // pre($user_info);
                    $this->data['user_info']= $user_info;
                }

                $this->load->library('cart');
                $this->data['total_rows'] = $this->cart->total_items();
            }

        }
    }

    //   thuc hien kiem tra khi nguoi dung co tinh vao admin
    public function _check_login()
    {
        $controller = $this->uri->rsegment(1);
        $controller = strtolower($controller);
        //lay session
        $login = $this->session->userdata('login');
        //khi chua dang nhap ma vao controller khac login thi cho quay lai cho dang nhap la bat buoc
        //giong nnhu vao nha thi phai mo cua chinh
        if (!$login && $controller != 'login') {
            redirect(admin_url('login'));
        }
        //neu ma da login roi ma dang nhap lai nua thi khong cho
        //giong nhu o trong nha roi thì khong duoc mo cua vao lai nha
        //cai nay la de phan quyen cho no khong dc tron lan cac quyen khac
        if (!empty($login) && $controller == 'login') {
            redirect(admin_url('home'));
        }
    }

    // thuc hien logout
    public function logout()
    {
        if ($this->session->userdata('login')) {
//            $this->session->sess_destroy();
            $this->session->unset_userdata('login');
        }
        redirect(admin_url('login'));

    }
}