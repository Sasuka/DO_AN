<?php

class Login extends MY_Controller
{
    protected $employee ='nhanvien';
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->library('form_validation');
        $this->load->helper('form');
        if($this->input->post()){
            $this->form_validation->set_rules('login','Login','callback_check_login');
            //khi vao trong run thi co nghia la no da chay dung roi
            if ($this->form_validation->run()){
                //kiem tra cho biet da dang nhap thanh cong hay chua
                $this->session->set_userdata('login',true);
                redirect(admin_url('home'));
            }
        }
        $this->load->view('admin/login/index');
    }
    public function check_login()
    {

        $userName = $this->input->post('username',true);
        $password = $this->input->post('password',true);
//        $data =$this->db->get_where($this->employee,)
        $password = md5(md5($password));
        $this->load->model('admin_model');
        $where = array('EMAIL' =>$userName,'MATKHAU' =>$password);
        if ($this->admin_model->check_exists($where, $this->employee)){
            $this->session->set_userdata('username',$userName);
            $this->session->set_userdata('password',$password);
            return true;
        }else{
            $this->form_validation->set_message(__FUNCTION__,'Đăng nhập thất bại!');
            return false;
        }
    }


}