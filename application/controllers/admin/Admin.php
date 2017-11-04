<?php

class Admin extends MY_Controller
{
   public $lv ='';
    protected $employee ='nhanvien';

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin_model');

    }

    public function getLevel()
    {
        return $this->admin_model->getChucVu();
    }

    public function index()
    {

        $input = array('TEN_CHUCVU'=>'Admin');

        //thuc hien load danh sach nhan vien dau tien
        $this->_data['listEmploy'] = $this->admin_model->listEmploy($input);


        //lay noi dung cua messager
        $this->_data['message'] = $this->session->flashdata('message');
        $this->_data['temp'] = 'admin/admin/index';
        $this->load->view('admin/main', $this->_data);
    }
    public function employee()
    {
        $input = array();
        $lv ='2';
        //thuc hien load danh sach nhan vien dau tien
        $this->_data['listEmploy'] = $this->admin_model->listEmploy();


        //lay noi dung cua messager
        $this->_data['message'] = $this->session->flashdata('message');
        $this->_data['temp'] = 'admin/admin/index';
        $this->load->view('admin/main', $this->_data);
    }

    //kiem tra so dien thoai da dang ky chua
    public function check_phone_exists()
    {
        $phone = $this->input->post('phone');
        $where = array('SDT' => $phone);
        //kiem tra table column phone
        if ($this->admin_model->check_exists($where, 'nhanvien')) {
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
        if ($this->admin_model->check_exists($where, 'nhanvien')) {
            //return error
            $this->form_validation->set_message(__FUNCTION__, 'Email này đã đăng ký');
            return false;
        } else
            return true;
    }

    //kiem tra so dien thoai da dang ky chua de update
    public function check_phone_update()
    {
        $phone = $this->input->post('phone');
        $where = array('SDT =' => $phone, 'MA_NHANVIEN !=' => $this->id);
        //kiem tra table column phone
        if ($this->admin_model->check_exists($where, 'nhanvien')) {
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
        $where = array('EMAIL =' => $email, 'MA_NHANVIEN !=' => $this->id);
        //kiem tra check_exists trong MY_MODEL
        if ($this->admin_model->check_exists($where, 'nhanvien')) {
            //return error
            $this->form_validation->set_message(__FUNCTION__, 'Email này đã đăng ký');
            return false;
        } else
            return true;
    }
    //kiem tra so dien thoai co ai dang ky chua


//====================ADD QUAN TRỊ VIÊN=======================//

    public function add()
    {
        $this->_data['level'] = $this->getLevel();
        $this->load->library('form_validation');
        $this->load->helper('form');
        //khi nhan submit
        if ($this->input->post()) {
            //tien hanh kiem tra du lieu
//            echo 'Nhap submit';

            $this->form_validation->set_rules('fname', 'Tên', 'min_length[2]');
            $this->form_validation->set_rules('lname', 'Họ', 'min_length[2]');
            $this->form_validation->set_rules('password', 'Mật khẩu', 'min_length[2]');
            $this->form_validation->set_rules('re-pass', 'Nhập lại mật khẩu', 'matches[password]');
            $this->form_validation->set_rules('phone', 'Số điện thoại', 'min_length[9]|callback_check_phone_exists');
            $this->form_validation->set_rules('email', 'Email', 'valid_email|callback_check_email_exists');
//            $this->form_validation->set_rules('address', 'address', 'required');
//            $this->form_validation->set_rules('birthday', 'Ngày sinh', 'required');
//            $this->form_validation->set_rules('gender', 'Giới tính', 'required');
//            $this->form_validation->set_rules('level', 'Chức vụ', 'required');

            //kiem tra dieu kien validate co form_validation thi no chay ham nay
            if ($this->form_validation->run()) {

                $ho = $this->input->post('fname', true);
                $ten = $this->input->post('lname', true);
                $matkhau = $this->input->post('password', true);
                $sdt = $this->input->post('phone', true);
                $email = $this->input->post('email', true);
                $diachi = $this->input->post('address', true);
                $ngaysinh = $this->input->post('birthday', true);
                $ngaysinh = date('Y-m-d', strtotime($ngaysinh));//ep kieu them vao database
                $gioitinh = $this->input->post('gender');
                $chucvu = $this->input->post('level');
                //  var_dump($ho);
                $dt = array(
                    'HO' => $ho,
                    'TEN' => $ten,
                    'MATKHAU' => md5(md5($matkhau)),
//                    'MATKHAU' => $matkhau,
                    'SDT' => $sdt,
                    'EMAIL' => $email,
                    'DIACHI' => $diachi,
                    'NGAYSINH' => $ngaysinh,
                    'GIOITINH' => $gioitinh,
                    'MA_CHUCVU' => $chucvu
                );

                if ($_FILES['image']['name'] != '') {

                    $hinhanh = 'avatar/' . $_FILES['image']['name'];
                    $dt['HINHANH'] = $hinhanh;
                }

                if ($this->admin_model->add($dt)) {
                    //tao noi dung thong bao
                    $this->session->set_flashdata('message', 'Thêm quản trị viên thành công!');
                } else {
                    $this->session->set_flashdata('message', 'Thêm quản trị viên thất bại');
//                    echo 'Them thất bại';
                }
////
//                //chuyen toi trang quan trị viên
                if ($chucvu==1){
                    redirect(admin_url('admin'));
                }else{

                    redirect(admin_url('admin/employee'));

                }
////
           //     var_dump($dt);
                echo 'Form ok';
            }
        }

        $this->_data['temp'] = 'admin/admin/add';
        $this->load->view('admin/main', $this->_data);
    }

//====================EDIT QUAN TRỊ VIÊN=======================//
    public function edit()
    {
        $this->load->library('form_validation');
        $this->load->helper('form');
        //lay id cua quan trị viên cần chỉnh sửa
        $this->id = $this->uri->segment('4');
        $this->id = intval($this->id);
        //lấy thong tin của quản trị viên
        $info = $this->admin_model->getInfo($this->id);
        if (sizeof($info) == 0) {
            $this->session->set_flashdata('message', 'Không tồn tại quản trị viên này!');
            redirect(admin_url('admin'));
        }
        $this->_data['level'] = $this->getLevel();
        $this->_data['info'] = $info;
        if ($this->input->post()) {
            $this->form_validation->set_rules('fname', 'Tên', 'required|min_length[2]');
            $this->form_validation->set_rules('lname', 'Họ', 'required|min_length[2]');

            $this->form_validation->set_rules('phone', 'Số điện thoại', 'required|min_length[9]|callback_check_phone_update');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_check_email_update');
            $this->form_validation->set_rules('address', 'address', 'required');
            $this->form_validation->set_rules('birthday', 'Ngày sinh', 'required');
            $this->form_validation->set_rules('gender', 'Giới tính', 'required');
            $this->form_validation->set_rules('level', 'Chức vụ', 'required');
            //kiem tra neu co nhap mat khau
            $password = $this->input->post('password');
            if ($password) {
                $this->form_validation->set_rules('password', 'Mật khẩu', 'required|min_length[2]');
                $this->form_validation->set_rules('re-pass', 'Nhập lại mật khẩu', 'matches[password]');
            }

            if ($this->form_validation->run()) {
//              //thuc thi khi ham kiem tra xong dieu kien
//                $this->id = $this->input->post('id');
                $ho = $this->input->post('fname', true);
                $ten = $this->input->post('lname');
                $sdt = $this->input->post('phone');
                $email = $this->input->post('email');
                $diachi = $this->input->post('address');
                $ngaysinh = $this->input->post('birthday');
                $ngaysinh = date('Y-m-d', strtotime($ngaysinh));//ep kieu them vao database
                $gioitinh = $this->input->post('gender');
                $chucvu = $this->input->post('level');
                $trangthai = $this->input->post('status');

                $dt = array(
                    'HO' => $ho,
                    'TEN' => $ten,
                    'SDT' => $sdt,
                    'EMAIL' => $email,
                    'DIACHI' => $diachi,
                    'NGAYSINH' => $ngaysinh,
                    'GIOITINH' => $gioitinh,
                    'MA_CHUCVU' => $chucvu,
                    'TRANGTHAI' => $trangthai
                );
                //neu co  nhap mat khau thi cap nhat lai mat khau
                if ($password) {
                    $dt['MATKHAU'] = md5(md5($password));
                }
                $where = array('MA_NHANVIEN' => $this->id);
                if ($this->admin_model->_update('nhanvien', $dt, $where))
                    $this->session->set_flashdata('message', 'Update thành công!');
                else {
                    $this->session->set_flashdata('message', 'Update thất bại');

                }
                // pre($info);
                if ($info[0]['TEN_CHUCVU']=='Admin'){
                    redirect(admin_url('admin'));
                }else{
                    redirect(admin_url('admin/employee'));
                }
            }
        }

        $this->_data['temp'] = 'admin/admin/edit';
        $this->load->view('admin/main', $this->_data);
    }

//====================XOA QUAN TRỊ VIÊN=======================//
    public function delete()
    {
        $this->id = $this->uri->segment(4);
        $this->id = intval($this->id);
        $where ='MA_NHANVIEN ='.$this->id;

        //lay thong tin cua quan tri kiem tra xem co ton tai hay khong
        $info = $this->admin_model->getInfo($this->id);

        if (sizeof($info) == 0) {
            $this->session->set_flashdata('message', 'Không tồn tại quản trị viên này!');
            if ($info['TEN_CHUCVU']=='Admin'){
                redirect(admin_url('admin'));
            }else{
                redirect(admin_url('admin/employee'));
            }
        }
        //thuc hien xoa
        $data = array('TRANGTHAI' => '0');//hang nay ngung kinh doanh
        if ($this->admin_model->update_rule($where, $data)) {
            $this->session->set_flashdata('message', 'Delete success!');
        } else {
            $this->session->set_flashdata('message', 'Delete Fail!');
        }
        // pre($info);
        if ($info[0]['TEN_CHUCVU']=='Admin'){
            redirect(admin_url('admin'));
        }else{
            redirect(admin_url('admin/employee'));
        }
    }

//    load danh sach nhan vien
    public function listEmp()
    {
        // do mac dinh trang admin ->index da load danh sach nhan vien
        redirect(admin_url('admin'));
    }

    public function addAccount()
    {

        $data = array();
        $data['TEN_TAIKHOAN'] = 'tientai';
        $data['EMAIL'] = 'a@f.com';
        $data['MATKHAU'] = 'asd';

        $data['HO'] = 'Lê Tiến';
        $data['TEN'] = 'Tài';
        $data['GIOITINH'] = '0';
        $data['NGAYSINH'] = '20/06/1995';
        $data['DIACHI'] = 'Thăng Bình Quảng Nam';
        $data['HINHANH'] = 'images/taitien.png';
        $data['SDT'] = '0917077025';
        $data['MA_CHUCVU'] = '2';
        $data['NGAYTAO'] = 'CT Hội Đồng QT';
        $data['LOAI_TAIKHOAN'] = 'CT Hội Đồng QT';

        if ($this->admin_model->addAccount($data)) {
            echo 'Thêm Thành công';
        } else {
            echo 'Thêm Thất Bại';
        }
    }


    public function delAccount($User = '')
    {
        if ($this->admin_model->delAccount($User)) {
            echo 'Success';
        } else
            echo 'Failure';
    }

    public function updateAccount($user = '', $data = '')
    {
        $data = array();
        $data['MATKHAU'] = '223';
        $data['EMAIL'] = 'a123@gmail.com';

        $data['HO'] = 'Lê ';
        $data['TEN'] = 'Tài';
        $data['GIOITINH'] = '1';
        $data['NGAYSINH'] = '1995/20/06';
        $data['DIACHI'] = 'Thăng Bình ';
        $data['AVARTA'] = 'images/taitien.png';
        $data['SDT'] = '00908009';
        $data['CHUCVU'] = 'CTHD Quản Trị';


        if ($this->admin_model->editAccount($user, $data)) {
            echo 'Update Thành công';
        } else {
            echo 'Update Thất Bại';
        }
        echo $this->db->last_query();
    }

    public function update($user = '')
    {
        $data = array();
        $data['EMAIL'] = 'kira@agmail.com';
        $data['MATKHAU'] = '223';
        print_r($this->admin_model->edit($user, $data));
        echo $this->db->last_query();
//        if ($this->admin_model->edit($user,$data)){
//           echo 'Success';
//        }else {
//               echo 'Failure';
//        }


    }
}