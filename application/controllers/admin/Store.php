<?php
class Store extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('store_model'));
    }
//kiem tra kho co chua loai hay khong
    public function checkCateInStore(){
        $cateId = $_POST['cateId'];
        $input = array('MA_LOAI_SANPHAM'=>$cateId);
      // pre($this->store_model->check_exist($input));
        if ($this->store_model->check_exist($input)){
            echo '1';
        }else{
            echo '0';
        }
    }
    public function getCateByProvider($condition=array()){

    }
    public function index()
    {
//       //lay noi dung cua messager
        $this->data['message'] = $this->session->flashdata('message');

        //lay tông số lượng tất cả các sản phẩm
        $total_rows = $this->store_model->get_total();
        $this->data['total_rows'] = $total_rows;

        //thuc hien load phan trang
        $this->load->library('pagination');
        $config = array();
        $config['total_rows'] = $total_rows;;//tong tat ca cac sản phẩm trên webiste
        $config['base_url'] = admin_url('store/index');//link hien thi ra danh sach san pham
        $config['per_page'] = 10;//hien thi so luong san pham tren 1 trang
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
        //kiem tra theo id
        $id = $this->input->get('id');
        $idProduct = intval($id);




    //thuc hien lay danh sach kho
        $this->data['list'] = $this->store_model->getListJoin('loai_sanpham','MA_LOAI_SANPHAM');

        $this->data['temp'] = 'admin/store/index';//khung tieu de cua admin duoc giu lai
        $this->load->view('admin/main', $this->data);
    }
    public function add(){
//load thu vien validate de su dung kiem tra khi upload
        $this->load->library('form_validation');
        $this->load->helper('form');
        //khi nhan submit
        if ($this->input->post()){
            $name = $this->input->post('name', true);
            $cate = $this->input->post('cate', true);
            $data = array('TEN_KHO' =>$name,'MA_LOAI_SANPHAM' =>$cate);
            if ($this->store_model->add($data)) {
                $this->session->set_flashdata('message', 'Thêm kho thành công!');
            } else {
                $this->session->set_flashdata('message', 'Thêm kho thất bại');
            }
            redirect(admin_url('store'));
        }

        //thuc hien load load san phẩm
        $this->load->model('catelog_model');
        $this->data['listCate'] = $this->catelog_model->getList();
        $this->data['temp'] = 'admin/store/add';//khung tieu de cua admin duoc giu lai
        $this->load->view('admin/main', $this->data);
    }
    public function edit(){

    }
}