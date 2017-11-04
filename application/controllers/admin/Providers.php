<?php

class Providers extends MY_Controller
{
    protected $id;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('providers_model');
    }

    public function index()
    {
        //lay noi dung cua messager
        $this->data['message'] = $this->session->flashdata('message');

        //lay tông số lượng tất cả các sản phẩm
        $total_rows = $this->providers_model->get_total();
        $this->data['total_rows'] = $total_rows;

        //thuc hien load phan trang
        $this->load->library('pagination');
        $config = array();
        $config['total_rows'] = $total_rows;;//tong tat ca cac sản phẩm trên webiste
        $config['base_url'] = admin_url('providers/index');//link hien thi ra danh sach san pham
        $config['per_page'] = 5;//hien thi so luong san pham tren 1 trang
        $config['uri_segment'] = 4;//hien thi so trang
        $config['next_link'] = "Trang kế tiếp";
        $config['prev_link'] = "Trang trước";

        //khoi tao phan trang
        $this->pagination->initialize($config);

        $segment = $this->uri->segment(4);
        $segment = intval($segment);
        //   pre($segment);
        $input = array();
        $input['limit'] = array($config['per_page'], $segment);
        $input['order']=array('TRANGTHAI','DESC');
        //kiem tra theo id
        $this->id = $this->input->get('id');
        $idProviders = intval($this->id);
        if ($this->id != 0) {
            //  $input['where'] = array('MA_SANPHAM' =>  $idProviders);
        }

        //tim theo ten san pham
//        $nameProduct = $this->input->get('name');
//        if ($nameProduct) {
//            $input['like'] = array('TEN_SANPHAM', $nameProduct);
//        }

        $list = $this->providers_model->getList($input);
        $this->data['list'] = $list;//danh sach tat ca nha cung cap

        //load group

        $this->data['temp'] = 'admin/providers/index';//khung tieu de cua admin duoc giu lai
        $this->load->view('admin/main', $this->data);
    }

    //kiem tra so dien thoai da dang ky chua
    public function check_phone_exists()
    {
        $phone = $this->input->post('phone');
        $where = array('SDT' => $phone);
        //kiem tra table column phone
        if ($this->providers_model->check_exists($where, 'nha_cungcap')) {
            //return error
            $this->form_validation->set_message(__FUNCTION__, 'Số điện thoại này đã đăng ký');
            return false;
        } else
            return true;
    }

    //kiem tra so dien thoai da dang ky chua
    public function check_email_exists()
    {
        $email = $this->input->post('email');
        $where = array('EMAIL' => $email);
        //kiem tra check_exists trong MY_MODEL
        if ($this->providers_model->check_exists($where, 'nha_cungcap')) {
            //return error
            $this->form_validation->set_message(__FUNCTION__, 'Email này đã đăng ký');
            return false;
        } else
            return true;
    }

    //kiem tra so dien thoai da dang ky chua
    public function check_web_exists()
    {
        $website = $this->input->post('website');
        $where = array('WEBSITE' => $website);
        //kiem tra check_exists trong MY_MODEL
        if ($this->providers_model->check_exists($where, 'nha_cungcap')) {
            //return error
            if ($website == '') {
                return true;
            }
            $this->form_validation->set_message(__FUNCTION__, 'Website này đã đăng ký');
            return false;
        } else
            return true;
    }

    //kiem tra so dien thoai da dang ky chua de update
    public function check_phone_update()
    {
        $phone = $this->input->post('phone');
        $where = array('SDT =' => $phone, 'MA_NHA_CUNGCAP !=' => $this->id);
        //kiem tra table column phone
        if ($this->providers_model->check_exist($where, 'nha_cungcap')) {
            //return error
            $this->form_validation->set_message(__FUNCTION__, 'Số điện thoại này thành viên khác đã đk rồi');
            return false;
        } else
            return true;
    }

    //kiem tra so dien thoai da dang ky chua de update
    public function check_email_update()
    {
        $email = $this->input->post('email');
        $where = array('EMAIL =' => $email, 'MA_NHA_CUNGCAP !=' => $this->id);
        //kiem tra check_exists trong MY_MODEL
        if ($this->providers_model->check_exist($where, 'nha_cungcap')) {
            //return error
            $this->form_validation->set_message(__FUNCTION__, 'Email này đã đăng ký');
            return false;
        } else
            return true;
    }

    //kiem tra so dien thoai da dang ky chua de update
    public function check_web_update()
    {
        $web = $this->input->post('website');
        if ($web ==''){
            return true;
        }
        $where = array('WEBSITE =' => $web, 'MA_NHA_CUNGCAP !=' => $this->id);
        //kiem tra check_exists trong MY_MODEL
        if ($this->providers_model->check_exist($where, 'nha_cungcap')) {
            //return error

            $this->form_validation->set_message(__FUNCTION__, 'Website này đã đăng ký');
            return false;
        } else
            return true;
    }
    //kiem tra so dien thoai co ai dang ky chua
    //====================ADD NHA CUNG CAP=======================//
    public function add()
    {
        //load thu vien validate de su dung kiem tra khi upload
        $this->load->library('form_validation');
        $this->load->helper('form');
        //khi nhan submit
        if ($this->input->post()) {
            $this->form_validation->set_rules('phone', 'Số điện thoại', 'min_length[9]|callback_check_phone_exists');
            $this->form_validation->set_rules('email', 'Email', 'callback_check_email_exists');
            $this->form_validation->set_rules('website', 'Website', 'callback_check_web_exists');
            if ($this->form_validation->run()) {
                $name = $this->input->post('name', true);
                $phone = $this->input->post('phone', true);
                $email = $this->input->post('email', true);
                $website = $this->input->post('website', true);
                $address = $this->input->post('address', true);
                $address = $this->input->post('address', true);
                $dt = array(
                    'TEN_NHA_CUNGCAP' => $name,
                    'SDT' => $phone,
                    'WEBSITE' => $website,
                    'EMAIL' => $email,
                    'DIACHI_NHA_CUNGCAP' => $address,
                );
                //  pre($dt);
                if ($this->providers_model->add($dt)) {
                    $this->session->set_flashdata('message', 'Thêm nhà cung cấp thành công!');
                } else {
                    $this->session->set_flashdata('message', 'Thêm nhà cung cấp thất bại');
                }
                redirect(admin_url('providers'));
            }
        }

        $input['select'] = array('MA_NHOM_SANPHAM', 'TEN_NHOM_SANPHAM');
        $this->load->model('group_model');
        $this->data['listGroup'] = $this->group_model->getList($input);
        //   pre($data['listGroup']);
        $this->data['temp'] = 'admin/providers/add';
        $this->load->view('admin/main', $this->data);
    }

    //====================EDIT NHA CUNG CAP=======================//
    public function edit()
    {
        //load thu vien validate de su dung kiem tra khi upload
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->id = $this->uri->rsegment(3);
        $this->id = intval($this->id);

        //lấy thong tin của quản trị viên
        $input = array('MA_NHA_CUNGCAP' => $this->id);
        $info = $this->providers_model->get_info_rule($input);
//        pre($info);
        if (!$info) {
            $this->session->set_flashdata('message', 'Không tồn tại!');
            redirect(admin_url('providers'));
        }
        $this->data['providers'] = $info;
        //khi nhan submit
        if ($this->input->post()) {
            $this->form_validation->set_rules('phone', 'Số điện thoại', 'min_length[9]|callback_check_phone_update');
            $this->form_validation->set_rules('email', 'Email', 'callback_check_email_update');
            $this->form_validation->set_rules('website', 'Website', 'callback_check_web_update');
            if ($this->form_validation->run()) {
                $name = $this->input->post('name', true);
                $phone = $this->input->post('phone', true);
                $email = $this->input->post('email', true);
                $website = $this->input->post('website', true);
                $address = $this->input->post('address', true);
                $status = $this->input->post('status', true);
                $dt = array(
                    'TEN_NHA_CUNGCAP' => $name,
                    'SDT' => $phone,
                    'WEBSITE' => $website,
                    'EMAIL' => $email,
                    'DIACHI_NHA_CUNGCAP' => $address,
                    'TRANGTHAI' => $status
                );
                //  pre($dt);
                $where = array('MA_NHA_CUNGCAP' => $this->id);
                if ($this->providers_model->update_rule($where, $dt)) {
                    $this->session->set_flashdata('message', 'Update thành công!');
                } else {
                    $this->session->set_flashdata('message', 'Update cấp thất bại');
                }
                redirect(admin_url('providers'));
            }
        }

        $input['select'] = array('MA_NHOM_SANPHAM', 'TEN_NHOM_SANPHAM');
        $this->load->model('group_model');
        $this->data['listGroup'] = $this->group_model->getList($input);
        //   pre($data['listGroup']);
        $this->data['temp'] = 'admin/providers/edit';
        $this->load->view('admin/main', $this->data);
    }

    //====================XOA NHA CUNG CAP=======================//
    public function delete()
    {
        $this->id = $this->uri->rsegment(3);
        $this->id = intval($this->id);
        $this->dell($this->id);

        redirect(admin_url('providers'));
    }
    //===================XOA  ALL SAN PHAM=================================//
    public function dell_all()
    {
        $ids = $this->input->POST('ids');
//        pre($ids);
        foreach ($ids as $id){
            $this->dell($id,false);
        }
    }
    //xoa thong tin san pham dua vao id
    public function dell($id,$redirect = true)
    {
        //lấy thong tin của quản trị viên
        $input = array('MA_NHA_CUNGCAP' => $id);
        $info = $this->providers_model->get_info_rule($input);
//        pre($info);
        if (!$info) {
            $this->session->set_flashdata('message', 'Không tồn tại nhà cung cấp  này!');
            if ($redirect){
                redirect(admin_url('providers'));
            }else{
                return false;
            }
        }
        //co thuc hien giao dich thi chi cap nhat lai trang
        $data = array('TRANGTHAI' => '0');//hang nay ngung kinh doanh
        if ($this->providers_model->update_rule($input, $data)) {
            $this->session->set_flashdata('message', 'Delete success!');
        } else {
            $this->session->set_flashdata('message', 'Delete Fail!');
        }

    }
}