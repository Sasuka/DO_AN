<?php

class Import extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('import_model');
    }

    public function checkRepeat()
    {
        if (isset($_POST["providersId"]) && !empty($_POST["providersId"])) {
            $providersId = $_POST["providersId"];//kiem tra nha cung cap
            $timeSetBill = new DateTime('now');
            $timeSetBill = $timeSetBill->format('Y-m-d');
            $dt = array('MA_NHA_CUNGCAP' => $providersId);
            if ($this->import_model->check_exist_providers($dt, $timeSetBill)) {
                echo 'Trùng ! Vui lòng chờ ngày mai...';
            } else {
                echo '';
            }
        }
    }

    public function index()
    {
        //lay noi dung cua messager
        $this->data['message'] = $this->session->flashdata('message');

        //lay tông số lượng tất cả các sản phẩm
        $total_rows = $this->import_model->get_total();
        $this->data['total_rows'] = $total_rows;

        //thuc hien load phan trang
        $this->load->library('pagination');
        $config = array();
        $config['total_rows'] = $total_rows;;//tong tat ca cac sản phẩm trên webiste
        $config['base_url'] = admin_url('import/index');//link hien thi ra danh sach san pham
        $config['per_page'] = 5;//hien thi so luong san pham tren 1 trang
        $config['uri_segment'] = 4;//hien thi so trang
        $config['next_link'] = "Trang kế tiếp";
        $config['prev_link'] = "Trang trước";

        //khoi tao phan trang
        $this->pagination->initialize($config);


        //thuc hien kiem tra no da lap chi tiet chua neu chua moi dc phep sua va xoa
        //lay danh sach trong chi tiet phieu nhap kiem tra xem no da lap chi tiet phieu nhap hay
        $this->load->model('importDetail_model');
        $this->data['importDe'] = $this->importDetail_model->getList();
        $dt = $this->import_model->getListJoin('chitiet_nhap','MA_PHIEUNHAP');
      //  $dt = $this->importDetail_model->getListJoinLRB($table1,$condition,'left');
     //   pre($dt);
//        pre($this->data['importDe']);

        //lay danh sach  phieu nhap
        $list = $this->import_model->getListThreeJoin('nhanvien', 'MA_NHANVIEN', 'nha_cungcap', 'MA_NHA_CUNGCAP');
        $this->data['list'] = $list;

         // pre($list);
        $this->data['temp'] = 'admin/import/index';//khung tieu de cua admin duoc giu lai
        $this->load->view('admin/main', $this->data);
    }

    public function add()
    {

        $this->load->library('form_validation');
        $this->load->helper('form');
        //thuc hien submit
        if ($this->input->post()) {
            //thuc hien insert
            $employeeId = $this->input->post('employeeId');
            $providerId = $this->input->post('nameProviders');
            $data = array(
                'MA_NHANVIEN' => $employeeId,
                'MA_NHA_CUNGCAP' => $providerId
            );
            if ($this->import_model->add($data)) {
                $this->session->set_flashdata('message', 'Lập phiếu nhập thành công!');
            } else {
                $this->session->set_flashdata('message', 'Lập phiếu nhập thất bại');
            }
            redirect(admin_url('import'));
        }


        /*thuc hien load nhan vien đang đăng nhâp vào
        chỉ có nhân viên mới được phếp nhập
        */
        // $this->data['employee'] = $this->import_model->getList();
        /*thuc hien load nha cung cap con hoat dong TT =1*/
        $this->load->model('providers_model');
        $input['where'] = array('TRANGTHAI' => '1');//hoat dong
        $list = $this->providers_model->getList($input);//danh sach nha cung cap con hoat dong

//        pre($list);
        /*thuc hien load thong tin san pham dua vao loai ma nha cung cap co*/

        /**/
        $this->data['list'] = $list;
        $this->data['temp'] = 'admin/import/add';
        $this->load->view('admin/main', $this->data);
    }

    public function edit()
    {

        $this->load->library('form_validation');
        $this->load->helper('form');

        $id = $this->uri->rsegment(3);
        $id = intval($id);

        //lấy thong tin của quản trị viên
        $input = array('MA_PHIEUNHAP' => $id);
        $info = $this->import_model->get_info_rule($input);

        if (!$info) {
            $this->session->set_flashdata('message', 'Không tồn tại phiếu nhập này!');
            redirect(admin_url('import'));
        }
        //thuc hien kiem tra ma phieu nhap da nhap hang chua
        //dau vao ma nhan vien,ma nha cung cap,ngay


        $this->data['import'] = $info;
        //thuc hien submit
        if ($this->input->post()) {
            //thuc hien insert
            $employeeId = $this->input->post('employeeId');
            $providerId = $this->input->post('nameProviders');
            $data = array(
                'MA_NHANVIEN' => $employeeId,
                'MA_NHA_CUNGCAP' => $providerId
            );

            if ($this->import_model->update_rule($input, $data)) {
                $this->session->set_flashdata('message', 'Update thành công!');
            } else {
                $this->session->set_flashdata('message', 'Update thất bại');
            }
            redirect(admin_url('import'));
        }


        /*thuc hien load nhan vien đang đăng nhâp vào
        chỉ có nhân viên mới được phếp nhập
        */
        // $this->data['employee'] = $this->import_model->getList();
        /*thuc hien load nha cung cap con hoat dong TT =1*/
        $this->load->model('providers_model');
        $input['where'] = array('TRANGTHAI' => '1');//hoat dong
        $list = $this->providers_model->getList($input);//danh sach nha cung cap con hoat dong

//        pre($list);
        /*thuc hien load thong tin san pham dua vao loai ma nha cung cap co*/

        /**/
        $this->data['list'] = $list;
        $this->data['temp'] = 'admin/import/edit';
        $this->load->view('admin/main', $this->data);
    }

    public function delete()
    {
        $this->id = $this->uri->segment(4);
        $this->id = intval($this->id);
        $input = array('MA_PHIEUNHAP'=>$this->id);


        //lay thong tin cua quan tri kiem tra xem co ton tai hay khong
        $info = $this->import_model->get_info_rule($input);

        if (sizeof($info) == 0) {
            $this->session->set_flashdata('message', 'Không tồn tại phiếu nhấp này!');
            redirect(admin_url('import'));
        }
        //thuc hien xoa
        if ($this->import_model->del_rule($input)) {
            $this->session->set_flashdata('message', 'Delete success!');
        } else {
            $this->session->set_flashdata('message', 'Delete Fail!');
        }
        // pre($info);

            redirect(admin_url('import'));
    }

}