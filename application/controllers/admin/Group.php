<?php

class Group extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('group_model');
    }

    public function index()
    {
        $list = $this->group_model->getList();
//       pre($list);
        $this->data['list'] = $list;
        //lay noi dung cua messager
        $this->data['message'] = $this->session->flashdata('message');
        $this->data['temp'] = 'admin/group/index';//khung tieu de cua admin duoc giu lai
        $this->load->view('admin/main', $this->data);
    }

//   ================KIEM TRA CO TRUNG TEN NHOM SAN PHAM================================//
    public function checkNameExists()
    {
        $catelogName = strtoupper($this->input->post('groupName', true));
        $where = array('TEN_NHOM_SANPHAM' =>$catelogName);
        if ($this->group_model->check_exist($where)){
            $this->form_validation->set_message(__FUNCTION__, 'Tên nhóm này đã tồn tại');
            return false;
        }else{
            return true;
        }
    }

//   ================THEM NHÓM SAN PHAM================================//
    public function add()
    {
        $this->load->library('form_validation');
        $this->load->helper('form');

        //khi nhan submit
        if ($this->input->post()) {
            $this->form_validation->set_rules('groupName', 'Tên nhóm sản phẩm', 'callback_checkNameExists');

            //kiem tra dieu kien validate co form_validation thi no chay ham nay
            if ($this->form_validation->run()) {
                $groupName = strtoupper($this->input->post('groupName', true));

                //upload hinh logo
                $this->load->library('upload_library');
                $upload_path = './uploads/logo/';

                $upload_data = $this->upload_library->upload($upload_path, 'image');

                //   pre($upload_data);
                if (isset($upload_data['file_name'])) {
                    $upload_data['raw_name'] = strtolower($groupName . $upload_data['file_ext']);
                    $upload_data['orig_name'] = strtolower($groupName . $upload_data['file_ext']);
                    $upload_data['file_name'] = strtolower($groupName . $upload_data['file_ext']);
                    $upload_data['client_name'] = strtolower($groupName . $upload_data['file_ext']);
                    $namePicture = $upload_data['file_name'];


                } else {
                    $namePicture = '';
                }
                pre($upload_data);
                $dt = array(

                );

                if ($this->catelog_model->add($dt)) {
                    $this->session->set_flashdata('message', 'Thêm nhóm thành công!');
                } else {
                    $this->session->set_flashdata('message', 'Thêm nhóm thất bại');
                }

                redirect(admin_url('group'));
            }
        }

        //thuc hien load du lieu khi chua submi
        $this->data['temp'] = 'admin/group/add';
        $this->load->view('admin/main', $this->data);
    }

}