<?php

/**
 * Created by PhpStorm.
 * User: tient
 * Date: 07/8/2017
 * Time: 10:20
 */
class Promotions extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('promotion_model'));
    }

    public function index()
    {
        //thuc hien load danh sach khuyen mai
        //lay noi dung cua messager
        $this->data['message'] = $this->session->flashdata('message');

        //lay tông số lượng tất cả các sản phẩm
        $total_rows = $this->promotion_model->get_total();
        $this->data['total_rows'] = $total_rows;

        //thuc hien load phan trang
        $this->load->library('pagination');
        $config = array();
        $config['total_rows'] = $total_rows;;//tong tat ca cac sản phẩm trên webiste
        $config['base_url'] = admin_url('promotions/index');//link hien thi ra danh sach san pham
        $config['per_page'] = 10;//hien thi so luong san pham tren 1 trang
        $config['uri_segment'] = 4;//hien thi so trang
        $config['next_link'] = "Trang kế tiếp";
        $config['prev_link'] = "Trang trước";

        //khoi tao phan trang
        $this->pagination->initialize($config);

        $segment = $this->uri->segment(4);
        $segment = intval($segment);
        //lay tat ca cac ma khuyen mai trong chi tiet khuyen mai ra xem no da lap hay chua
        $this->load->model('promotionDetail_model');
        $this->data['detailPro']= $this->promotionDetail_model->getList();
       // pre($this->data['detailPro']);

        //thuc hien load danh sach khyên mai ra
        $list = $this->promotion_model->getList();
        $this->data['list'] = $list;
        $this->data['temp'] = 'admin/promotions/index';//khung tieu de cua admin duoc giu lai
        $this->load->view('admin/main', $this->data);
    }

    public function add()
    {
        //load thu vien validate de su dung kiem tra khi upload
        $this->load->library('form_validation');
        $this->load->helper('form');
        //khi nhan submit thi kiem tra du lieu ok xong thì thuc hien submit
        if ($this->input->post()) {
            $name = $this->input->post('name',true);
            $begin = $this->input->post('begin',true);
            $end = $this->input->post('end',true);
            $begin = date('Y-m-d', strtotime($begin));//ep kieu them vao database
            $end  = date('Y-m-d', strtotime($end));//ep kieu them vao database


            $data = array(
                'TEN_KHUYENMAI'=>$name,
                'NGAY_BATDAU'=>$begin,
                'NGAY_KETTHUC'=>$end
            );
            if ($this->promotion_model->add($data)) {
                //tao noi dung thong bao
                $this->session->set_flashdata('message', 'Thêm khuyến mãi thành công!');
                redirect(admin_url('promotions'));
            } else {
                $this->session->set_flashdata('message', 'Thêm khuyến mãi thất bại');
               redirect(admin_url('promtion/add'));
            }

        }

        $this->data['temp'] = 'admin/promotions/add';//khung tieu de cua admin duoc giu lai
        $this->load->view('admin/main', $this->data);
    }
    public function edit()
    {
        $this->load->library('form_validation');
        $this->load->helper('form');

        $id = $this->uri->rsegment(3);
        $id = intval($id);

        //lấy thong tin của quản trị viên
        $input = array('MA_KHUYENMAI' => $id);
        $info = $this->promotion_model->get_info_rule($input);

        if (!$info) {
            $this->session->set_flashdata('message', 'Không tồn tại khuyến mãi này!');
            redirect(admin_url('promotions'));
        }
        //thuc hien kiem tra ma phieu nhap da nhap hang chua
        //dau vao ma nhan vien,ma nha cung cap,ngay


        //khi nhan submit thi kiem tra du lieu ok xong thì thuc hien submit
        if ($this->input->post()) {
            $name = $this->input->post('name',true);
            $begin = $this->input->post('begin',true);
            $end = $this->input->post('end',true);
            $begin = date('Y-m-d', strtotime($begin));//ep kieu them vao database
            $end  = date('Y-m-d', strtotime($end));//ep kieu them vao database

            $data = array(
                'TEN_KHUYENMAI'=>$name,
                'NGAY_BATDAU'=>$begin,
                'NGAY_KETTHUC'=>$end
            );
            if ($this->promotion_model->update_rule($input,$data)) {
                //tao noi dung thong bao
                $this->session->set_flashdata('message', 'Cập nhật khuyến mãi thành công!');
                redirect(admin_url('promotions'));
            } else {
                $this->session->set_flashdata('message', 'Cập nhật khuyến mãi thất bại');
                redirect(admin_url('promtion/edit'));
            }

        }
        $this->data['info']=$info;

        $this->data['temp'] = 'admin/promotions/edit';//khung tieu de cua admin duoc giu lai
        $this->load->view('admin/main', $this->data);
    }
    public function delete(){
        $this->load->library('form_validation');
        $this->load->helper('form');

        $id = $this->uri->rsegment(3);
        $id = intval($id);

        //lấy thong tin của quản trị viên
        $input = array('MA_KHUYENMAI' => $id);
        $info = $this->promotion_model->get_info_rule($input);

        if (!$info) {
            $this->session->set_flashdata('message', 'Không tồn tại khuyến mãi này!');
            redirect(admin_url('promotions'));
        }

        //neu chua co gi het co quyen dc xoa
        if ($this->promotion_model->del_rule($input)) {
            $this->session->set_flashdata('message', 'Delete success!');
        } else {
            $this->session->set_flashdata('message', 'Delete Fail!');
        }
        // pre($info);

        redirect(admin_url('promotions'));
    }
}