<?php

class Catelog extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('catelog_model', 'group_model'));
    }

    public function index()
    {
        $list = $this->catelog_model->getCatelog();

        $this->data['list'] = $list;
        $listGroup = $this->group_model->getList();
        $this->data['listGroup'] = $listGroup;
        //lay noi dung cua messager
        $this->data['message'] = $this->session->flashdata('message');
        $this->data['temp'] = 'admin/catelog/index';//khung tieu de cua admin duoc giu lai
        $this->load->view('admin/main', $this->data);
    }

//   ================KIEM TRA  LOAI SAN PHAM================================//
    public function checkCatelogByGroup()
    {
        $data = json_decode($_GET['data'], true);
//        print_r($arr[0]);

        $data['catelogName'] = strtoupper($data['catelogName']);
        $input = array('TEN_LOAI_SANPHAM' => $data['catelogName'], 'MA_NHOM_SANPHAM' => $data['groupID']);
//        echo $data['groupID'];
//
        if ($this->catelog_model->check_exist($input)) {
            echo '1';
        } else {
            echo '0';
        }
    }
//   ================INSERT  LOAI SAN PHAM================================//
    public function addCateGroup()
    {
        $data = json_decode($_GET['data'], true);
//        print_r($arr[0]);

        $data['catelogName'] = strtoupper($data['catelogName']);
        $input = array('TEN_LOAI_SANPHAM' => $data['catelogName'], 'MA_NHOM_SANPHAM' => $data['groupID'],'MA_NHA_CUNGCAP' =>$data['providersID']);

//        echo $data['groupID'];
//
        if ($this->catelog_model->check_exist($input)) {
            echo '1';
        } else {
            $this->catelog_model->add($input);
            echo '0';
        }
    }
//   ================LẤY DS LOAI SAN PHAM THEO NHOM================================//
    public function getListCateLogByGroup()
    {
        if (isset($_POST["groupId"]) && !empty($_POST["groupId"])) {
            $groupId = $_POST["groupId"];
            $input['where'] = array('MA_NHOM_SANPHAM' => $groupId);
            // print_r($this->catelog_model->getList($input));
            $listCate = $this->catelog_model->getList($input);
            if (!$listCate) {
                echo '<option value="0">Không có</option>';
            }
            if ($listCate > 0) {
                ?>
                <option value="0">Chọn loại sản phẩm</option>
                <?php
                foreach ($listCate as $itemCate) {
                    ?>
                    <option value="<?= $itemCate['MA_LOAI_SANPHAM']; ?>"><?= $itemCate['TEN_LOAI_SANPHAM']; ?></option>
                    <?php
                }
            }

        }

    }

    //   ================LẤY DS LOAI SAN PHAM THEO NHA CUNG CAP================================//
    public function getCateByProviders()
    {
        if (isset($_POST["providersId"]) && !empty($_POST["providersId"])) {
            $providersId = $_POST["providersId"];
            $input['where'] = array('MA_NHA_CUNGCAP' => $providersId );
            // print_r($this->catelog_model->getList($input));
            $listCate = $this->catelog_model->getList($input);
           // pre($listCate);
            if (!$listCate) {
                echo '<option value="0">Không có</option>';
            }
            if ($listCate > 0) {
                ?>
                <option value="0">Chọn loại sản phẩm</option>
                <?php
                foreach ($listCate as $itemCate) {
                    ?>
                    <option value="<?= $itemCate['MA_LOAI_SANPHAM']; ?>"><?= $itemCate['TEN_LOAI_SANPHAM']; ?></option>
                    <?php
                }
            }

        }

    }
//   ================THEM LOAI SAN PHAM================================//
    public function add()
    {

        // pre($this->getListCateLogByGroup());
        //load thu vien validate de su dung kiem tra khi upload
        $this->load->library('form_validation');
        $this->load->helper('form');

        //khi nhan submit
        if ($this->input->post()) {
            $this->form_validation->set_rules('catelogName', 'Tên loại sản phẩm', 'callback_checkCatelogByGroup');

            //kiem tra dieu kien validate co form_validation thi no chay ham nay
            if ($this->form_validation->run()) {
                $catelogName = $this->input->post('catelogName', true);
                $groupID = $this->input->post('groupID', true);
                $providersID = $this->input->post('providersID');

                $dt = array(
                    'TEN_LOAI_SANPHAM' => $catelogName,
                    'MA_NHOM_SANPHAM' => $groupID,
                    'MA_NHA_CUNGCAP' => $providersID
                );

                if ($this->catelog_model->add($dt)) {
                    $this->session->set_flashdata('message', 'Thêm loại thành công!');
                } else {
                    $this->session->set_flashdata('message', 'Thêm loại thất bại');
                }

                redirect(admin_url('catelog'));
            }
        }

        //thuc hien load du lieu khi chua submit
        $input = array();
        $input['select'] = array('MA_NHOM_SANPHAM', 'TEN_NHOMSANPHAM');
        $listGroup = $this->group_model->getList();
        $this->load->model('providers_model');
        $list = $this->providers_model->getList();
        $this->data['listGroup'] = $listGroup;
        $this->data['list'] = $list;

        $this->data['temp'] = 'admin/catelog/add';
        $this->load->view('admin/main', $this->data);
    }

//   ================SUA LOAI SAN PHAM================================//
    public function edit()
    {
        $this->load->library('form_validation');
        $this->load->helper('form');
        //lay id cua loại cần chỉnh sửa
        $id = $this->uri->segment('4');
        $id = intval($id);
        $this->load->model('providers_model');

        //lấy thong tin của quản trị viên
        $input = array('MA_LOAI_SANPHAM' => $id);

        $list = $this->providers_model->getList();
        $info = $this->catelog_model->get_info_rule($input);
//        pre($info);
        if (!$info) {
            $this->session->set_flashdata('message', 'Không tồn tại loại này!');
            redirect(admin_url('catelog'));
        }
        $this->data['info'] = $info;
        //khi nhan submit
        if ($this->input->post()) {

            $this->form_validation->set_rules('catelogName', 'Tên loại sản phẩm', 'required');

            //kiem tra dieu kien validate co form_validation thi no chay ham nay
            if ($this->form_validation->run()) {
                $catelogName = $this->input->post('catelogName', true);
                $groupID = $this->input->post('groupID');
//                pre($groupID);
                $dt = array(
                    'TEN_LOAI_SANPHAM' => $catelogName,
                    'MA_NHOM_SANPHAM' => $groupID
                );

//                pre($input);
                if ($this->catelog_model->update_rule($input, $dt)) {
                    $this->session->set_flashdata('message', 'Update thành công!');
                } else {
                    $this->session->set_flashdata('message', 'Update thất bại');
                }

                redirect(admin_url('catelog'));
            }
        }
        //thuc hien load du lieu khi chua submit
        $input = array();
        $input['select'] = array('MA_NHOM_SANPHAM', 'TEN_NHOMSANPHAM');
        $listGroup = $this->group_model->getList();
        $this->data['listGroup'] = $listGroup;

//        $this->load->model('providers_model');
//        $list = $this->providers_model->getList();
        $this->data['list'] = $list;
        $this->data['temp'] = 'admin/catelog/edit';
        $this->load->view('admin/main', $this->data);
    }

//   ================XOA LOAI SAN PHAM================================//
    public function delete()
    {
        $this->load->library('form_validation');
        $this->load->helper('form');
        //lay id cua loại cần chỉnh sửa
        $id = $this->uri->segment('4');
        $id = intval($id);

        $this->del($id);

        $this->session->set_flashdata('message', 'Xóa thành công!');
        redirect(admin_url('catelog'));
    }


    //xoa nhieu du lieu
    public function delete_all()
    {
        $ids = $this->input->post('ids');
        foreach ($ids as $id) {
            $this->del($id, false);
        }

    }

    private function del($id, $redirect = true)
    {
        //lay thong tin cua mot san pham
        $input = array('MA_LOAI_SANPHAM' => $id);
        $info = $this->catelog_model->get_info_rule($input);
        if (!$info) {
            $this->session->set_flashdata('message', 'Không tồn tại loại này');
            if ($redirect) {
                redirect(admin_url('catelog'));
            } else {
                return false;
            }
        }
        //kiem tra loai nay co chua san pham khong
        $this->load->model('product_model');
        $product = $this->product_model->get_info_rule(array('MA_LOAI_SANPHAM' => $id), 'MA_LOAI_SANPHAM');
        if ($product) {
            $this->session->set_flashdata('message', 'Loại ' . $info['TEN_LOAI_SANPHAM'] . 'có chưa sản phẩm nên không thể xóa');
            if ($redirect) {
                redirect(admin_url('catelog'));
            } else {
                return false;
            }
        }
        //xoa du lieu
        $this->catelog_model->del_rule($input);
    }

}