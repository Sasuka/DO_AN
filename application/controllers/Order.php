<?php

/**
 * Created by PhpStorm.
 * User: tient
 * Date: 12/8/2017
 * Time: 1:27
 */
class Order extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('transaction_model', 'transactionDetail_model'));

    }

//    lay thong tin cua khach hang
    public function checkout()
    {
        //thong tin cua gio hang
        $id = $this->session->userdata('login');
        $this->load->model('customer_model');
        $input = array();
        $input['where'] = array('MA_KHACHHANG' => $id);
        $info = $this->customer_model->getList($input);
        //xem khach hang da dang nhap hay chua
//         neu chua thi thuc hien bat khach hang dk
        if (empty($info)) {
            $this->session->set_flashdata('message', 'Mời nhập thông tin trước khi mua hàng!');

            redirect(base_url('client/register'));
        }
        //xem gio hang co san pham hay chua
        $carts = $this->cart->contents();
        $total_item = $this->cart->total_items();
        if ($total_item <= 0) {
            $this->session->set_flashdata('message', ' Giỏ hàng trống !');
            redirect(site_url('cart/index'));
        }
        $total_amount = 0;
        foreach ($carts as $row) {
            $total_amount += $row['subtotal'];
        }
        //  pre($total_amount);

        //thuc hien thanh toan
        $this->load->library('form_validation');
        $this->load->helper('form');
        if ($this->input->post()) {
            $id = $this->input->post('idcustomer');
            $diachi_giao = $this->input->post('address');
            $tong_thanhtien = $this->input->post('subtotal');
            $ma_hinhthuc = $this->input->post('transaction');
            $dt = array(
                'MA_KHACHHANG' => $id,
                'TONG_THANHTIEN' => $tong_thanhtien,
                'DIACHI_GIAO' => $diachi_giao,
                'MA_HINHTHUC' => $ma_hinhthuc
            );


            $this->db->trans_start();
            $this->transaction_model->add($dt);
            $transactionId = $this->db->insert_id();//lay id cua giao dich

            //thuc hien them chi tiet giao dich
            $carts = $this->cart->contents();
            foreach ($carts as $row) {
                $dataDetail = array(
                    'MA_GIAODICH' => $transactionId,
                    'MA_SANPHAM' => $row['id'],
                    'SOLUONG' => $row['qty'],
                    'THANHTIEN' => $row['subtotal']
                );
                $this->transactionDetail_model->add($dataDetail);
            }

            $this->db->trans_complete();
            if ($this->db->trans_status() === FALSE) {
                $this->session->set_flashdata('message', 'Mua hàng thất bại');
                redirect(site_url('site/cart'));
            }

            //sau khi thanh ccong thi xoa gio hàng
            // pre($dt['MA_HINHTHUC']);
            $this->cart->destroy();
            //neu la thanh toan tien mat
            if ($dt['MA_HINHTHUC'] == '4') {
                //tao noi dung thong bao
                $this->session->set_flashdata('message', 'Mua hàng thành công!');
                redirect(site_url());

            } else if ($dt['MA_HINHTHUC'] == '3') {
                //load thu vien thanh toan la bao kim
                $this->load->library('payment/baokim_payment');
                $total_amount *= 1000;
                $this->baokim_payment->payment($transactionId, $total_amount);
            }
        }


        $this->data['info_cus'] = $info;
//        pre($carts);
        $this->data['sum_total'] = $total_amount;
        $this->data['temp'] = 'site/order/checkout';
        $this->load->view('site/layout', $this->data);
    }

//    nhan kết quả trả về từ cổng thanh toán
    public function result()
    {
        //load thư vien thanh toán
        $this->load->library('payment/baokim_payment');
        //id cua giao dich
        $tran_id = $this->input->post('order_id');
        //lay thong tin cua giao dich
        $transactionId = array('MA_GIAODICH' =>$tran_id);
        $transaction = $this->model->transactionDetail_model->get_info_rule($transactionId);
        if (!$transaction) {
            redirect();
        } else {
            //neu lay dc thi goi toi ham kiem tra thanh toan
            $status = $this->baokim_payment->result($tran_id, $transaction['amount']);
            if ($status) {
                //cập nhật trang thai giao dich
                $data = array();
                $data['TRANGTHAI'] = 1;

                 $this->transactionDetail_model->update_rule($transactionId, $data);

            }else{
                //cập nhật trang thai giao dich
                $data = array();
                $data['TRANGTHAI'] = 2;
                $transactionId = array('MA_GIAODICH' =>$tran_id);
                $this->transactionDetail_model->update_rule($transactionId, $data);
            }
        }


    }

    public function themgiaodich($dt = array())
    {
        if (empty($dt)) {
            return false;
        } else {

            $this->db->trans_start();

            $this->transaction_model->add($dt);
            $transactionId = $this->db->insert_id();//lay id cua giao dich

            //thuc hien them chi tiet giao dich
            $carts = $this->cart->contents();
            foreach ($carts as $row) {
                $dataDetail = array(
                    'MA_GIAODICH' => $transactionId,
                    'MA_SANPHAM' => $row['id'],
                    'SOLUONG' => $row['qty'],
                    'THANHTIEN' => $row['subtotal']
                );
                $this->transactionDetail_model->add($dataDetail);
            }

            $this->db->trans_complete();
            if ($this->db->trans_status() === FALSE) {
                return false;
            }


            return true;
        }
    }
}