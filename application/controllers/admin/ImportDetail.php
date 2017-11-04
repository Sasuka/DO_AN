<?php

class ImportDetail extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('importDetail_model', 'import_model'));
        $this->data['infoAcc']=$this->checkImportEmployee();
    }

    public function checkImportEmployee()
    {
        $id = $this->uri->rsegment(3);//lay id kiem tra co ton tai phieu nhap do hay chua
        $id = intval($id);
        $input = array('MA_PHIEUNHAP' => $id);
        $data = $this->import_model->get_info_rule($input);
        return $data;
    }

    public function index()
    {
        //lay noi dung cua messager
        $this->data['message'] = $this->session->flashdata('message');

        //lay tông số lượng tất cả các sản phẩm
        $total_rows = $this->importDetail_model->get_total();
        $this->data['total_rows'] = $total_rows;

        $this->load->library('form_validation');
        $this->load->helper('form');

        $id = $this->uri->rsegment(3);//lay id kiem tra co ton tai phieu nhap do hay chua
        $id = intval($id);
//            pre($id);


        //thuc hien load phan trang
        $this->load->library('pagination');
        $config = array();
        $config['total_rows'] = $total_rows;;//tong tat ca cac sản phẩm trên webiste
        $config['base_url'] = admin_url('importDetail/index/' . $id . '');//link hien thi ra danh sach san pham
        $config['per_page'] = 10;//hien thi so luong san pham tren 1 trang
        $config['uri_segment'] = 4;//hien thi so trang
        $config['next_link'] = "Trang kế tiếp";
        $config['prev_link'] = "Trang trước";

        //khoi tao phan trang
        $this->pagination->initialize($config);
        //  pre($list);
        $this->data['id'] = $id;
        //thuc hien load danh sach chi tiet nhap dua vao id
        $input = array('MA_PHIEUNHAP' => $id);
        // pre($id);
        $list = $this->importDetail_model->getListThreeJoin('phieunhap', 'MA_PHIEUNHAP', 'sanpham', 'MA_SANPHAM', $id);
        $this->data['list'] = $list;

        //  pre($this->data['list']);


        $this->data['temp'] = 'admin/import_detail/index';//khung tieu de cua admin duoc giu lai
        $this->load->view('admin/main', $this->data);
    }

    public function add()
    {

        $this->load->library('form_validation');
        $this->load->helper('form');

        $id = $this->uri->rsegment(3);//lay id kiem tra co ton tai phieu nhap do hay chua
        $id = intval($id);

        //lấy thong tin của quản trị viên
        $input = array('MA_PHIEUNHAP' => $id);
        $info = $this->import_model->get_info_rule($input);
        // pre($info['MA_NHA_CUNGCAP']);
        if (!$info) {
            $this->session->set_flashdata('message', 'Không tồn tại phiếu nhập này!');
            redirect(admin_url('import'));
        }
        if ($this->input->post()) {
            $providersId = $this->input->post('providersId');
            $catelog_import_add = $this->input->post('catelog-import-add');
            $product_import_add = $this->input->post('product');
            // pre($product_import_add);
            $amount = $this->input->post('amount');
            $price = $this->input->post('price');
            $per_price = $this->input->post('per_price');
            $total_cost = $this->input->post('total_cost');

            //thuc hien insert vao bang chi tiet phieu nhap
            $data = array('MA_PHIEUNHAP' => $id,
                'MA_SANPHAM' => $product_import_add,
                'SOLUONGNHAP' => $amount,
                'DONGIA_NHAP' => $price);

            if ($this->addInput($data, $per_price)) {
                $this->session->set_flashdata('message', 'Lập phiếu nhập thành công!');
            } else {
                $this->session->set_flashdata('message', 'Lập phiếu nhập thất bại');
            }
            ?>
            <!--          //  <script>-->
            <!--               var conf = confirm('Bạn có muốn tiếp tục không ?');-->
            <!--                if (conf) {-->
            <!--                    //tiep tuc them-->
            <!--                                        --><?php //echo admin_url('importDetail/add/'.$id) ;?>
            <!--//                    window.location = "--><?php ////echo admin_url('importDetail/add/' . $id) ?><!--//";-->
            <!--//                } else {-->
            <!--//                    //huy bo-->
            <!--//                    --><?php ////redirect(admin_url('importDetail')); ?>
            <!--//                }-->
            <!--//-->
            <!--//            </script>-->
            <?php
            redirect(admin_url('importDetail/index/' . $id));
        }


        //dua vao MA_NHA_CUNG CAP tìm dc ten nha cung cap
        $this->load->model('providers_model');
        $providersId = array('MA_NHA_CUNGCAP' => $info['MA_NHA_CUNGCAP']);
        $this->data['providers'] = $this->providers_model->get_info_rule($providersId);
        //  pre($this->data['providers']);
        //thuc hien load danh sach sản phảm da co trong kho va nha cung cap dap ung
        /*load danh sach ma loai co cung ma nha cung cap*/
        $this->load->model('catelog_model');
        $cateByProviders = $this->catelog_model->getListThreeJoin('nha_cungcap', 'MA_NHA_CUNGCAP', 'kho', 'MA_LOAI_SANPHAM', $info['MA_NHA_CUNGCAP']);


        /*so sanh ma loai san pham co trong kho hay khong*/
        $this->data['cate'] = $cateByProviders;

        //thuc hien kiem tra ma phieu nhap da nhap hang chua
        //dau vao ma nhan vien,ma nha cung cap,ngay
        $this->data['id'] = $id;
        $this->data['temp'] = 'admin/import_detail/add';
        $this->load->view('admin/main', $this->data);
    }

    public function edit()
    {

        $this->load->library('form_validation');
        $this->load->helper('form');

        $id = $this->uri->rsegment(3);
        $id = intval($id);
        pre($id);
        //lấy thong tin của quản trị viên
        $input = array('MA_PHIEUNHAP' => $id);
        $info = $this->importDetail_model->get_info_rule($input);

        if (!$info) {
            $this->session->set_flashdata('message', 'Không tồn tại phiếu nhập này!');
            redirect(admin_url('import'));
        }
        //thuc hien kiem tra ma phieu nhap da nhap hang chua
        //dau vao ma nhan vien,ma nha cung cap,ngay
        $this->data['temp'] = 'admin/import_detail/edit';
        $this->load->view('admin/main', $this->data);
    }

//su dung cac ham duoc goi
    public function addInput($data, $per_price)
    {
        //run transaction theo cach thong thuong
        $this->db->trans_begin();
        //execute sql
        //thuc hien insert phieu nhap
        $this->importDetail_model->add($data);
        $input = array('DONGIA_BAN' => $data['DONGIA_NHAP'] * (1 + $per_price * 0.01));
        $where = array('MA_SANPHAM' => $data['MA_SANPHAM']);
        $this->load->model('product_model');
        $this->product_model->update_rule($where, $input);

        //thuc hien cap nhat lai gia

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }


    }

//kiem tra san pham do da nhap trong ngay do hay chua
    public function checkProduct()
    {
        $data = json_decode($_POST['data'], true);
        //thuc hien kiem tra ma phieu nhap va ma san pham
        if (isset($data["inputId"]) && !empty($data["inputId"])
            && isset($data["productId"]) && !empty($data["productId"])) {
            $inputId = $data["inputId"];
            $productId = $data['productId'];
            $input = array('MA_PHIEUNHAP' => $inputId,
                'MA_SANPHAM' => $productId);
            // print_r($this->catelog_model->getList($input));
            $listProduct = $this->importDetail_model->check_exist($input);
            if ($listProduct) {
                echo 'Sản phẩm này hôm nay đã nhập rồi...!';
            } else {
                echo '';
            }


        }
    }
}