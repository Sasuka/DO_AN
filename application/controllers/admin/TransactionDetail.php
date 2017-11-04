<?php

class TransactionDetail extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('transactionDetail_model', 'transaction_model'));
    }

    public function index()
    {
        //lay noi dung cua messager
        $this->data['message'] = $this->session->flashdata('message');
        $segment = $this->uri->segment(4);
        $segment = intval($segment);
        $this->data['transactionId']=$segment;
        $where = array('MA_GIAODICH' => $segment);
        $transactionId = $this->transaction_model->get_info_rule($where);
        if (empty($transactionId)) {
            $this->session->set_flashdata('message', 'Không tồn tại!');
            redirect(admin_url('transaction'));
        }
        $input['where'] = array('MA_GIAODICH' =>$segment);
        //lay tông số lượng tất cả các sản phẩm
        $total_rows = $this->transactionDetail_model->get_total($input);
        $this->data['total_rows'] = $total_rows;

        $tabl1 ='sanpham';
        $condition ='MA_SANPHAM';
        $list = $this->transactionDetail_model->getListJoin($tabl1, $condition, $where);

        $id = $this->uri->rsegment(4);
        $id = intval($id);
//   pre($list);
        //thuc hien load phan trang
        $this->load->library('pagination');
        $config = array();
        $config['total_rows'] = $total_rows;;//tong tat ca cac sản phẩm trên webiste
        $config['base_url'] = admin_url('transactionDetail/index/' . $id . '');
        $config['per_page'] = 6;//hien thi so luong giao dich tren 1 trang
        $config['uri_segment'] = 5;//hien thi so trang
        $config['next_link'] = "Next page";
        $config['prev_link'] = "Prev page";

        //khoi tao phan trang
        $this->pagination->initialize($config);


        $input = array();
        $input['limit'] = array($config['per_page'], $segment);
        //kiem tra theo id

        $this->data['list'] = $list;//danh sach tat ca giao dich
        $this->data['temp'] = 'admin/transaction_detail/index';//khung tieu de cua admin duoc giu lai
        $this->load->view('admin/main', $this->data);
    }

}
