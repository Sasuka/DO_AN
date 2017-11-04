<?php
class Site_model extends MY_Model {
    protected $tGroupPro ='nhom_sanpham';
    protected $tCatePro ='loai_sanpham';
    protected $tLevel ='chucvu';
    public function __construct()
    {
        parent::__construct();
    }
    //lay nhom sản phẩm
    public function groupMenu(){
        return $this->db->get($this->tGroupPro)->result_array();
    }
    //lấy loại sản phẩm
    public function cateMenu(){
        return $this->db->get($this->tCatePro)->result_array();
    }
    //sắp xép sản phẩm theo nhóm
    public function catelogyMenu($parentId){
            $this->db->where('MA_NHOM_SANPHAM',$parentId);
           return  $this->db->get($this->tCatePro)->result_array();
    }

}