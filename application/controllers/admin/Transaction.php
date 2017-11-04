<?php

class Transaction extends MY_Controller
{
    public $idTransaction ;
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('transaction_model', 'transactionDetail_model', 'store_model'));
    }

    public function index()
    {
        //lay noi dung cua messager
        $this->data['message'] = $this->session->flashdata('message');

        //lay tông số lượng tất cả các sản phẩm
        $total_rows = $this->transaction_model->get_total();
        $this->data['total_rows'] = $total_rows;

        //thuc hien load phan trang
        $this->load->library('pagination');
        $config = array();
        $config['total_rows'] = $total_rows;;//tong tat ca cac sản phẩm trên webiste
        $config['base_url'] = admin_url('transaction/index');//link hien thi ra danh sach giao dich
        $config['per_page'] = 6;//hien thi so luong giao dich tren 1 trang
        $config['uri_segment'] = 4;//hien thi so trang
        $config['next_link'] = "Next page";
        $config['prev_link'] = "Prev page";

        //khoi tao phan trang
        $this->pagination->initialize($config);

        $segment = $this->uri->segment(4);
        $segment = intval($segment);
        //   pre($segment);
        $input = array();
        $input['limit'] = array($config['per_page'], $segment);
        //kiem tra theo id
        $id = $this->input->get('id');
        $idProduct = intval($id);
        if ($id != 0) {
            $input['where'] = array('MA_GIAODICH' => $idProduct);
        }


        //lay danh sach giao dich
        $list = $this->transaction_model->getList($input);
        // pre($list);
        $this->data['list'] = $list;//danh sach tat ca giao dich
        $this->data['temp'] = 'admin/transaction/index';//khung tieu de cua admin duoc giu lai
        $this->load->view('admin/main', $this->data);
    }

    public function view()
    {
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->model('transactionDetail_model', 'store_model');

        //lay id cua quan trị viên cần chỉnh sửa
        $idTransaction = $this->uri->segment('4');
        if ($this->input->post()) {
            $status = $this->input->post('status');

            if ($status == 1) {
                //neu la giao hang
                $this->transaction_suc();
            } else if ($status == 2) {
                //neu la huy don hang
                $this->transaction_cancell();
            }

        }
        $this->data['temp'] = 'admin/bill/index';
        $this->load->view('admin/main', $this->data);

    }
    public function transaction_suc(){
        $idEmployee = $this->input->post('employeeId');
        $status = $this->input->post('status');


        $data = array(
            'MA_NHANVIEN' => $idEmployee,
            'TRANGTHAI' => $status
        );
        //thuc hien cac cau lenh khi lap hoa don
        $this->db->trans_start();
        $idTransaction = $this->uri->rsegment(3);

        $input['where'] = array(
            'MA_GIAODICH' => $idTransaction
        );

        $where = array('MA_GIAODICH' => $idTransaction);
        $list = $this->transactionDetail_model->getListJoin('sanpham', 'MA_SANPHAM', $where);


       // pre($list);
        //thuc hien kiem tra san pham do co so luong khach dat ton hay khong
        foreach ($list as $item) {
            if ($item['SOLUONG'] > $item['SOLUONG_BAN']) {
                $this->session->set_flashdata('message', 'Lập hóa đơn thất bại!');
                redirect(admin_url('transaction'));
                return false;
            }
        }
        //neu thuc hien dung thi
        foreach ($list as $item) {

            $item['SOLUONG_BAN'] = $item['SOLUONG_BAN'] - $item['SOLUONG'];
            $wh = array('MA_SANPHAM' => $item['MA_SANPHAM']);
            $dt = array('SOLUONG_BAN' => $item['SOLUONG_BAN']);
            $this->product_model->update_rule($wh, $dt);

            $storeInfo = $this->store_model->get_info_rule(array('MA_LOAI_SANPHAM' => $item['MA_LOAI_SANPHAM']));
//                pre($storeInfo);
            $storeInfo['SOLUONG_TON'] -= $item['SOLUONG'];
            //pre($storeInfo);
//                //thuc hien update
            $wh1 = array('MA_LOAI_SANPHAM' => $item['MA_LOAI_SANPHAM']);
            $dt1 = array('SOLUONG_TON' => $storeInfo['SOLUONG_TON']);
            if($this->store_model->update_rule($wh1, $dt1)){
                //sau khi thuc hien thanh cong thi update lai bang giao dich
//                pre($this->store_model->getList());

                $data = array(
                    'MA_NHANVIEN' => $idEmployee,
                    'TRANGTHAI' => '1'
                );
                $where1 = array('MA_GIAODICH'=>$idTransaction);
               if($this->transaction_model->update_rule($where1, $data)){
                   $this->data['status']='1';
                   $this->session->set_flashdata('message', 'Đang giao hàng!');
               }
            }

        }


        // thuc cap nhat lai trang thai cua


        $this->db->trans_complete();
      //  pre($storeInfo);

    }

}
