<style>
    .col-md-3 text-center > img {
        border-radius: 3px;
        border: 1px solid #00CC00;
    }
</style>

<?php

class GetList extends MY_Controller
{
    protected $_product;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('product_model');

    }

    public function index()
    {
        echo 't';
    }

    public function getListCateProduct()
    {
        $idCate = $_GET['dataSend'];
       // var_dump($idCate);
        $input['where'] = array('TRANGTHAI' => '1', 'DONGIA_BAN >' => '0', 'MA_LOAI_SANPHAM' => $idCate);//con ban va da nhap ve
        $query = $this->product_model->getList($input);
//      echo json_encode($query);
        foreach ($query as $item) {
            ?>
            <div class="col-md-3 text-center">
                <img src="<?php echo public_url('images/product/') .$item['HINH_DAIDIEN']; ?>"
                     width="150px"
                     height="150px">
                <br>
                <strong><?php echo $item['TEN_SANPHAM'] ?></strong>
                <strong><?php echo $item['DONGIA_BAN'] ?></strong>
                <br>
                <button class="btn btn-danger my-cart-btn" id="btnId" data-id="<?php echo $item['MA_SANPHAM'] ?>"
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

    public function sortbyProduct()
    {
        $dataArr = '';
        $id = $_GET['sendId'];

        $input['limit'] = array('20', '0');
        if ($id == 1) {
            //san pham moi nhat
            //trang thai :0  het ban,1 la con ban
            // don gia: 0 la sap ve nguoc lai xet TH tren
            $input['where'] = array('TRANGTHAI' => '1', 'DONGIA_BAN >' => '0');//con ban va da nhap ve
            $input['order'] = array('NGAY_CAPNHAT', 'DESC');

            $dataArr = $this->product_model->getList($input);
        } else if ($id == 2) {
            //san pham ban chay nhat
            $input['where'] = array('TRANGTHAI' => '1', 'DONGIA_BAN >' => '0');//con ban va da nhap ve
            $input['order'] = array('DABAN', 'DESC');//sap xep so luong giam dan
            $dataArr = $this->product_model->getList($input);

        } else if ($id == 3) {
            //san pham không còn bán
            $input['where'] = array('TRANGTHAI' => '0');// san pham khong con ban
            $dataArr = $this->product_model->getList($input);
        } else if ($id == 4) {
            //san pham sap nhap ve
            $input['where'] = array('DONGIA_BAN' => '0');// san pham sap nhap ve
            $dataArr = $this->product_model->getList($input);
        } else {
            //san pham khong loc theo mac dinh
            $dataArr = $this->product_model->getList();

        }
        if ($dataArr != '') {
            foreach ($dataArr as $item) {
                ?>
                <div class="col-md-3 text-center">
                    <img src="<?php echo base_url(); ?>uploads/product/<?php echo $item['HINH_DAIDIEN']; ?>"
                         width="150px"
                         height="150px" style="border-radius: 3px;">
                    <br>
                    <?php echo $item['TEN_SANPHAM']; ?> <strong>Giá :<?php echo $item['DONGIA_BAN']; ?></strong>
                    <br>
                    <?php
                    if ($item['DONGIA_BAN'] > 0 && $item['TRANGTHAI'] == 1) {
                        ?>
                        <button class="btn btn-danger my-cart-btn"
                                data-id="<?= $item['MA_SANPHAM']; ?>" data-name="<?= $item['TEN_SANPHAM']; ?>"
                                data-summary="<?= $item['TRANGTHAI']; ?>"
                                data-price="<?= $item['DONGIA_BAN']; ?>" data-quantity="<?= $item['DABAN']; ?>"
                                data-image="<?php echo base_url(); ?>uploads/product/<?php echo $item['HINH_DAIDIEN']; ?>">
                            Add to Cart
                        </button>
                        <?php
                    } else {
                        ?>
                        <button class="btn btn-danger my-cart-btn" style="cursor:not-allowed" disabled> Add to Cart</button>
                        <?php
                    }
                    ?>

                    <a href="#" class="btn btn-info">Details</a>
                </div>
                <?php
            }
        } else {
            echo 'Not found';
        }
    }

}