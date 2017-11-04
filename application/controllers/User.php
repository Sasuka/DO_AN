<?php

class User extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('customer_model');
    }

    //kiem tra so dien thoai da dang ky chua
    public function check_phone_exists()
    {
        $phone = $this->input->post('phone');
        $where = array('SDT' => $phone, 'MATKHAU !=' => '');
        //kiem tra table column phone
        if ($this->customer_model->check_exist($where)) {
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
        $where = array('EMAIL' => $email, 'MATKHAU !=' => '');
        //kiem tra check_exists trong MY_MODEL
        if ($this->customer_model->check_exist($where)) {
            //return error
            $this->form_validation->set_message(__FUNCTION__, 'Email này đã đăng ký');
            return false;
        } else
            return true;
    }

    //kiem tra so dien thoai da dang ky chua de update
    public function check_phone_update()
    {
        $userId = $this->session->userdata('login');

        if (empty($userId)) {
            $this->session->set_flashdata('message', 'Update thất bại');
            redirect(site_url());
        } else {
            $input = array();
            $input['where'] = array('MA_KHACHHANG' => $userId);
            $info = $this->customer_model->getList($input);
//            pre($info);
            $this->data['info'] = $info;
            $id = $info[0]['MA_KHACHHANG'];
//            pre($this->id);

            $phone = $this->input->post('phone');
            $where = array('SDT =' => $phone, 'MA_KHACHHANG !=' => $id);
            //kiem tra table column phone
            if ($this->customer_model->check_exist($where)) {
                //return error
                $this->form_validation->set_message(__FUNCTION__, 'Số điện thoại này thành viên khác đã đk rồi');
                return false;
            } else
                return true;
        }
    }

    //kiem tra so dien thoai da dang ky chua de update
    public function check_email_update()
    {
        $userId = $this->session->userdata('login');

        if (empty($userId)) {
            $this->session->set_flashdata('message', 'Update thất bại');
            redirect(site_url());
        } else {
            $input = array();
            $input['where'] = array('MA_KHACHHANG' => $userId);
            $info = $this->customer_model->getList($input);
//            pre($info);
            $this->data['info'] = $info;
            $id = $info[0]['MA_KHACHHANG'];
//            pre($this->id);

            $email = $this->input->post('email');
            $where = array('EMAIL =' => $email, 'MA_KHACHHANG !=' => $id);
            //kiem tra check_exists trong MY_MODEL
            if ($this->customer_model->check_exist($where)) {
                //return error
                $this->form_validation->set_message(__FUNCTION__, 'Email này đã đăng ký');
                return false;
            } else
                return true;
        }
    }

    //kiem tra so dien thoai co ai dang ky chua


    public
    function register()
    {
        $this->load->library('form_validation');
        $this->load->helper('form');
        if ($this->input->post()) {
            //tien hanh kiem tra du lieu

            $this->form_validation->set_rules('phone', 'Số điện thoại', 'callback_check_phone_exists');
            $this->form_validation->set_rules('email', 'Email', 'callback_check_email_exists');

            //kiem tra dieu kien validate co form_validation thi no chay ham nay
            if ($this->form_validation->run()) {

                $ho = $this->input->post('fname', true);
                $ten = $this->input->post('lname', true);
                $matkhau = $this->input->post('password', true);
                $sdt = $this->input->post('phone', true);
                $email = $this->input->post('email', true);
                $address = $this->input->post('address', true);
                $dt = array(
                    'HO' => $ho,
                    'TEN' => $ten,
                    'MATKHAU' => md5(md5($matkhau)),
                      'SDT' => $sdt,
                    'EMAIL' => $email,
                    'DIACHI' => $address,
                );
               //    pre($dt);
                //thuc hien kiem tra do co phai khach vang lai khong thong qua so dt hoac email
                $condition = array('SDT' => $sdt, 'MATKHAU ' => '');
                $checkClient = $this->customer_model->get_info_rule($condition);//  CLIENT DA DANG KY SDT

                $condition1 = array('EMAIL' => $email, 'MATKHAU ' => '');
                $checkClient1 = $this->customer_model->get_info_rule($condition1);//CLIENT DA DANG KY EMAIL
                // pre($checkClient1);

                $condition2 = array('EMAIL' => $email, 'SDT' => $sdt, 'MATKHAU ' => '');
                $checkClient2 = $this->customer_model->get_info_rule($condition1);//CLIENT DA DANG KY EMAIL HOAC SDT

                if (!empty($checkClient) || !empty($checkClient1) || !empty($checkClient2)) {
                    if (!empty($checkClient)) {
                        //co nghia la khach vang lai dk thuc hien update dua theo so dien thoai hoac email
                        $where = array('SDT' => $sdt);
                        $dt = array(
                            'HO' => $ho,
                            'TEN' => $ten,
                            'MATKHAU' => md5(md5($matkhau)),
                         //     'SDT' => $sdt,
                             'EMAIL' => $email,
                            'DIACHI' => $address,
                        );
                      //  pre($checkClient);

                    } else if (!empty($checkClient1)) {
                        //neu ton tai email
                        $where = array('EMAIL' => $email);
                        $dt = array(
                            'HO' => $ho,
                            'TEN' => $ten,
                            'MATKHAU' => md5(md5($matkhau)),
                              'SDT' => $sdt,
//                            'EMAIL' => $email,
                            'DIACHI' => $address,
                        );
                     //   pre($checkClient1);

                    }else{
                            //neu ton tai email va sdt
                        $dt = array(
                            'HO' => $ho,
                            'TEN' => $ten,
                            'MATKHAU' => md5(md5($matkhau)),
//                            'SDT' => $sdt,
//                            'EMAIL' => $email,
                            'DIACHI' => $address,
                        );
                            $where = array('EMAIL' => $email,'SDT'=>$sdt);

                    }
                 //   pre($dt);
                    if ($this->customer_model->update_rule($where, $dt)) {
                        $this->session->set_flashdata('message', 'Đăng ký thành công!');
                    } else {
                        $this->session->set_flashdata('message', 'Đăng ký thất bại');
                    }
                } else {
                    //dk moi
                    if ($this->customer_model->add($dt)) {
                        //tao noi dung thong bao
                        $this->session->set_flashdata('message', 'Đăng ký thành công!');
                    } else {
                        $this->session->set_flashdata('message', 'Đăng ký thất bại');
                    }
                }


                redirect(site_url());
            }
        }
        $this->data['temp'] = 'site/user/register';
        $this->load->view('site/layout', $this->data);
    }

    public function update()
    {
        $this->load->library('form_validation');
        $this->load->helper('form');
        $userId = $this->session->userdata('login');

        if (empty($userId)) {
            $this->session->set_flashdata('message', 'Update thất bại');
            redirect(site_url());
        } else {
            $input = array();
            $input['where'] = array('MA_KHACHHANG' => $userId);
            $info = $this->customer_model->getList($input);
//            pre($info);
            $this->data['info'] = $info;
            $this->id = $info[0]['MA_KHACHHANG'];
//            pre($this->id);
        }
        if ($this->input->post()) {
            //tien hanh kiem tra du lieu

            $this->form_validation->set_rules('phone', 'Số điện thoại', 'callback_check_phone_update');
            $this->form_validation->set_rules('email', 'Email', 'callback_check_email_update');

            //kiem tra dieu kien validate co form_validation thi no chay ham nay
            if ($this->form_validation->run()) {

                $ho = $this->input->post('fname', true);
                $ten = $this->input->post('lname', true);
                $matkhau = $this->input->post('password', true);
                $sdt = $this->input->post('phone', true);
                $email = $this->input->post('email', true);
                $address = $this->input->post('address', true);
                $dt = array(
                    'HO' => $ho,
                    'TEN' => $ten,
                    'MATKHAU' => md5(md5($matkhau)),
                    'SDT' => $sdt,
                    'EMAIL' => $email,
                    'DIACHI' => $address,
                );
                //  pre($dt);
                $where = array();
                $where = array('MA_KHACHHANG' => $userId);
                if ($this->customer_model->update_rule($where, $dt)) {
                    //tao noi dung thong bao
                    $this->session->set_flashdata('message', 'Cập nhật thành công!');
                } else {
                    $this->session->set_flashdata('message', 'Cập nhật thất bạithất bại');
                    redirect(site_url('user/update'));

                }
                redirect(site_url());
            }
        }
        $this->data['temp'] = 'site/user/update';
        $this->load->view('site/layout', $this->data);
    }

    public
    function login()
    {
        $this->load->library('form_validation');
        $this->load->helper('form');
        if ($this->input->post()) {
//            pre('aa');
            $sdt = $this->input->post('phone', true);
            $matkhau = $this->input->post('password', true);
            $dt = array(
                'MATKHAU' => md5(md5($matkhau)),
                'SDT' => $sdt,
            );
            $info = $this->customer_model->get_info_rule($dt);
            if (empty($info)) {
                $this->session->set_flashdata('message', 'Đăng nhập thất bại!');
                redirect(site_url('user/login'));
            } else {
                $this->session->set_flashdata('message', 'Đăng nhập thành công');
                $this->session->set_userdata('login', $info['MA_KHACHHANG']);
                redirect(site_url());
            }

        }

        $this->data['temp'] = 'site/user/login';
        $this->load->view('site/layout', $this->data);
    }

    // thuc hien logout
    public
    function logout()
    {
        if ($this->session->userdata('login')) {
//            $this->session->sess_destroy();
            $this->session->unset_userdata('login');
        }
        redirect(site_url());

    }
}