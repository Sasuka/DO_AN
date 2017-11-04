
<?php

/**
 * Created by PhpStorm.
 * User: tient
 * Date: 07/8/2017
 * Time: 11:41
 */
class PromotionsDetail extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('promotionDetail_model','product_model'));
    }
//kiem tra su ton tai ma san pham trong chi tiet khuyen mai
    public function checkExistPromotion(){

        $data = json_decode($_POST['data'], true);
        //thuc hien kiem tra ma phieu nhap va ma san pham
        if (isset($data["inputId"]) && !empty($data["inputId"])
            && isset($data["productId"]) && !empty($data["productId"])) {
            $inputId = $data["inputId"];
            $productId = $data['productId'];
            $input = array('MA_KHUYENMAI' => $inputId,
                'MA_SANPHAM' => $productId);
            // print_r($this->catelog_model->getList($input));
            $listProduct = $this->promotionDetail_model->check_exist($input);
            $price['where'] = array('MA_SANPHAM'=>$productId);
            if ($listProduct) {
                echo '1';
            } else {
                //thuc hien lay gia trong san pham dua vao ma
                $price = $this->product_model->getList($price);
                echo $price[0]['DONGIA_BAN'];
              //  pre($price);
               // echo 'OK';
            }
        }
    }
    public function index()
    {
        //lay noi dung cua messager
        $this->data['message'] = $this->session->flashdata('message');

        //lay tông số lượng tất cả các sản phẩm
        $total_rows = $this->promotionDetail_model->get_total();
        $this->data['total_rows'] = $total_rows;

        $this->load->library('form_validation');
        $this->load->helper('form');

        $id = $this->uri->rsegment(3);//lay id kiem tra co ton tai phieu nhap do hay chua
        $id = intval($id);
        //  pre($id);


        //thuc hien load phan trang
        $this->load->library('pagination');
        $config = array();
        $config['total_rows'] = $total_rows;;//tong tat ca cac sản phẩm trên webiste
        $config['base_url'] = admin_url('promotionsDetail/index/' . $id . '');//link hien thi ra danh sach san pham
        $config['per_page'] = 10;//hien thi so luong san pham tren 1 trang
        $config['uri_segment'] = 4;//hien thi so trang
        $config['next_link'] = "Trang kế tiếp";
        $config['prev_link'] = "Trang trước";

        //khoi tao phan trang
        $this->pagination->initialize($config);
        //  pre($list);
        $this->data['id'] = $id;
        //thuc hien load danh sach chi tiet nhap dua vao id
        $input = array('MA_KHUYEMAI' => $id);
        // pre($id);
        //load danh sach khuyen mai
        $list = $this->promotionDetail_model->getListThreeJoin('khuyenmai', 'MA_KHUYENMAI', 'sanpham', 'MA_SANPHAM', $id);
        $this->data['list'] = $list;
      //   pre($list);


        $this->data['temp'] = 'admin/promotions_detail/index';//khung tieu de cua admin duoc giu lai
        $this->load->view('admin/main', $this->data);
    }

    public function add()
    {

        $this->load->library('form_validation');
        $this->load->helper('form');

        $id = $this->uri->rsegment(3);//lay id kiem tra co ton tai phieu nhap do hay chua
        $id = intval($id);

        //thuc hien load thong tin khuyen mai dua vao ma khuyen mai
        $this->load->model('promotion_model');
        $condition = array('MA_KHUYENMAI'=>$id);
        $info = $this->promotion_model->get_info_rule($condition);
        $this->data['info']= $info;//thong tin khuyen mai
        if (empty($info)){
            $this->session->set_flashdata('message', 'Không tồn tại khuyến mãi này!');
            redirect(admin_url('promotions'));
        }

        if ($this->input->post()){
            $promotionId = $this->input->post('inputId');
            $productId = $this->input->post('product');
            $percent = $this->input->post('per_price');
            $gif = $this->input->post('gift');

            $dt = array(
                'MA_KHUYENMAI'=>$promotionId,
                'MA_SANPHAM' =>$productId,
                'PHANTRAM_KM'=>$percent,
                'TANGPHAM'=>$gif
            );
            if ($this->promotionDetail_model->add($dt)) {
                //tao noi dung thong bao
                $this->session->set_flashdata('message', 'Thêm chi tiết khuyến mãi thành công!');
                redirect(admin_url('promotions'));
            } else {
                $this->session->set_flashdata('message', 'Thêm chi tiết khuyến mãi thất bại');
//                    echo 'Them thất bại';
                redirect(admin_url('promotions/add/'.$id));
            }


        }



//thuc hien load san pham con ban TT=1;+ chua duoc khuyen mai trong cung ma khuyen mai,++don gia ban >0
        $this->load->model('product_model');
        $input['where'] = array('TRANGTHAI'=>'1','DONGIA_BAN >' =>'0');
        $this->data['product']= $this->product_model->getList($input);
     //   pre($this->data['product']);



        $this->data['id'] = $id;
        $this->data['temp'] = 'admin/promotions_detail/add';
        $this->load->view('admin/main', $this->data);
    }
}