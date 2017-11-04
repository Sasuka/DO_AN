<?php

class Product extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('product_model');
    }

    public function index()
    {
        //lay noi dung cua messager
        $this->data['message'] = $this->session->flashdata('message');

        //lay tông số lượng tất cả các sản phẩm
        $where['where'] = array('TRANGTHAI' => '1');
        $total_rows = $this->product_model->get_total();
        $this->data['total_rows'] = $total_rows;

        //thuc hien load phan trang
        $this->load->library('pagination');
        $config = array();
        $config['total_rows'] = $total_rows;;//tong tat ca cac sản phẩm trên webiste
        $config['base_url'] = base_url('product/index');//link hien thi ra danh sach san pham
        $config['per_page'] = 5;//hien thi so luong san pham tren 1 trang
        $config['uri_segment'] = 3;//hien thi so trang
        $config['next_link'] = "Trang kế tiếp";
        $config['prev_link'] = "Trang trước";

        //khoi tao phan trang
        $this->pagination->initialize($config);
        $segment = $this->uri->segment(3);
        $segment = intval($segment);

        $input['limit'] = array($config['per_page'], $segment);

        $list = $this->product_model->getList($input);
        $this->data['list'] = $list;
        $this->data['temp'] = 'site/home/index';
        $this->load->view('site/layout', $this->data);

    }

    public function getProduct1()
    {
        $id = $this->uri->segment(3);
        pre($id);
        $idCate = $_GET['sendId'];
        // var_dump($idCate);
        $input['where'] = array('TRANGTHAI' => '1', 'DONGIA_BAN >' => '0', 'MA_LOAI_SANPHAM' => $idCate);//con ban va da nhap ve
        $query = $this->product_model->getList($input);
//      echo json_encode($query);
        foreach ($query as $item) {
            ?>
            <div class="col-md-3 text-center">
                <img src="<?php echo public_url('images/product/') . $item['HINH_DAIDIEN']; ?>"
                     width="150px"
                     height="150px">
                <br>
                <strong><?php echo $item['TEN_SANPHAM'] ?></strong>
                <strong><?php echo $item['DONGIA_BAN'] ?></strong>
                <br>
                <button id="btnid" class="btn btn-danger my-cart-btn" data-id="<?php echo $item['MA_SANPHAM'] ?>"
                        data-name="<?php echo $item['TEN_SANPHAM'] ?>"
                        data-summary="summary 1"
                        data-price="<?php echo $item['DONGIA_BAN'] ?>" data-quantity="1"
                        data-image="<?php echo public_url('images/product/') . $item['HINH_DAIDIEN']; ?>">
                    Add
                    to Cart
                </button>
                <a href="#" class="btn btn-info">Details</a>
                <div class="clear" style="margin-bottom: 10px;"></div>
            </div>
            <?php
        }
    }

    public function getProduct()
    {
        //lay id loai va kiem tra co ton tai kkhong
        $id = $this->uri->segment(3);
        $this->load->model('catelog_model');
        $data = array('MA_LOAI_SANPHAM' => $id);
        $infoCate = $this->catelog_model->get_info_rule($data);
        if (empty($infoCate)) {
            redirect();
        }

        $this->data['infoCate'] = $infoCate;
        $input['where'] = array('TRANGTHAI' => '1', 'DONGIA_BAN >' => '0', 'MA_LOAI_SANPHAM' => $id);//con ban va da nhap v
        $total_rows = $this->product_model->get_total($input);//lay so luong theo loai
        $this->data['total_rows'] = $total_rows;


        //tao phan tran
        $this->load->library('pagination');
        $config = array();
        $config['total_rows'] = $total_rows;;//tong tat ca cac sản phẩm trên webiste
        $config['base_url'] = base_url('product/getProduct/' . $id);//link hien thi ra danh sach san pham
        $config['per_page'] = 3;//hien thi so luong san pham tren 1 trang
        $config['uri_segment'] = 4;//hien thi so trang
        $config['next_link'] = "Next";
        $config['prev_link'] = "Prev";

        //khoi tao phan trang
        $this->pagination->initialize($config);

        $segment = $this->uri->segment(4);
        $segment = intval($segment);
//           pre($segment);
        $input['limit'] = array($config['per_page'], $segment);

        //thuc hien load danh sach san pham dua vao id loai
        $query = $this->product_model->getList($input);
        $this->data['listProduct'] = $query;
        //thuc hien goi qua view
        $this->data['temp'] = 'site/product/product';
        $this->load->view('site/layout', $this->data);


    }

//    hien thi trang chi tiet san pham
    public function view()
    {
        $this->load->model('madeIn_model');
        $this->load->model('promotionDetail_model');
        //thuc hien lay thong tin chi tiet cua san pham
        $id = $this->uri->rsegment('3');
        $condition = array('MA_SANPHAM' => $id);
        $info = $this->product_model->get_info_rule($condition);
        if (empty($info)) {
            redirect();
        }
        //update lai luot view
        $view = $info['VIEW'] + 1;
        $where = array('MA_SANPHAM' => $id);
        $data = array('VIEW' => $view);
        $this->product_model->update_rule($where, $data);


        $condition1 = array('MA_XUATXU' => $info['MA_XUATXU']);
        $madeIn = $this->madeIn_model->get_info_rule($condition1);

        $condition2 = array('MA_LOAI_SANPHAM' => $info['MA_LOAI_SANPHAM']);
        $this->load->model('catelog_model');
        $catePro = $this->catelog_model->get_info_rule($condition2);


        $promotion = $this->promotionDetail_model->get_info_rule($condition);
        //xem san pham do thuc ma nao loai nao
        $this->load->model('productDetail_model');
        $condition4 = array('MA_SANPHAM' => $id, 'MA_LOAI_SANPHAM' => $info['MA_SANPHAM']);
        $detailProduct = $this->productDetail_model->get_info_rule($condition4);
        //  pre($detailProduct);

        //  pre($madeIn);
//            pre($info);

        //thuc hien load file chi thiet
        $this->data['product'] = $info;
        $this->data['madeIn'] = $madeIn;
        $this->data['cate'] = $catePro;
        $this->data['detail'] = $detailProduct;
        $this->data['promotion'] = $promotion;

        $this->data['temp'] = 'site/product/view';
        $this->load->view('site/layout', $this->data);


    }

    public function search()
    {
        $id = $this->uri->segment(3);
        if ($this->uri->rsegment(3) == 1) {
            //co su dung auto complate
            $key_search = $this->input->get('term');
        } else {
            $key_search = $this->input->get('key-search');
        }
        $this->data['key'] = trim($key_search);
        $input = array();
        $input['where'] = array('DONGIA_BAN>' => 0, 'TRANGTHAI' => 1);
        $input['like'] = array('TEN_SANPHAM', $key_search);

        $total_rows = $this->product_model->get_total($input);//lay so luong theo loai
        $this->data['total_rows'] = $total_rows;


        //tao phan tran
        $this->load->library('pagination');
        $config = array();
        $config['total_rows'] = $total_rows;;//tong tat ca cac sản phẩm trên webiste
        $config['base_url'] = base_url('product/search/' . $id);//link hien thi ra danh sach san pham
        $config['per_page'] = 3;//hien thi so luong san pham tren 1 trang
        $config['uri_segment'] = 4;//hien thi so trang
        $config['next_link'] = "Next";
        $config['prev_link'] = "Prev";

        //khoi tao phan trang
        $this->pagination->initialize($config);

        $segment = $this->uri->segment(4);
        $segment = intval($segment);
//           pre($segment);

        $input['limit'] = array($config['per_page'], $segment);
        $list = $this->product_model->getList($input);
//        pre($list);
//       pre($list);
        $this->data['list'] = $list;
        if ($this->uri->rsegment(3) == 1) {
            $result = array();
            // print_r($list);
            $i = -1;
            foreach ($list as $row) {
                $i++;
                $item = array();
                $item['id'] = $row[$i]['MA_SANPHAM'];
                $item['label'] = $row[$i]['TEN_SANPHAM'];
                $item['value'] = $row[$i]['TEN_SANPHAM'];
                $result[] = $item;
            }
            die(json_encode($result));
        }


        $this->data['temp'] = 'site/product/search';
        $this->load->view('site/layout', $this->data);
    }

    public function search_price()
    {
        $id = $this->uri->segment(3);

        $price_from = intval($this->input->get('price_from'));
        $price_to = intval($this->input->get('price_to'));
        $this->data['price_from'] = $price_from;
        $this->data['price_to'] = $price_to;
       // pre($price_from.'-'.$price_to);
        $input = array();
        $input['where'] = array('DONGIA_BAN>=' => $price_from, 'DONGIA_BAN<=' => $price_to, 'TRANGTHAI' => 1);

        $total_rows = $this->product_model->get_total($input);//lay so luong theo loai
        $this->data['total_rows'] = $total_rows;


        //tao phan tran
        $this->load->library('pagination');
        $config = array();
        $config['total_rows'] = $total_rows;;//tong tat ca cac sản phẩm trên webiste
        $config['base_url'] = base_url('product/search/' . $id);//link hien thi ra danh sach san pham
        $config['per_page'] = 3;//hien thi so luong san pham tren 1 trang
        $config['uri_segment'] = 4;//hien thi so trang
        $config['next_link'] = "Next";
        $config['prev_link'] = "Prev";

        //khoi tao phan trang
        $this->pagination->initialize($config);
        $segment = $this->uri->segment(4);
        $segment = intval($segment);
        $input['limit'] = array($config['per_page'], $segment);


        $list = $this->product_model->getList($input);
        $this->data['list'] = $list;

        $this->data['temp'] = 'site/product/price_search';
        $this->load->view('site/layout', $this->data);
    }
}