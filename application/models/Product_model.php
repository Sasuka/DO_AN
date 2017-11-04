<?php
/**
 * Created by PhpStorm.
 * User: tient
 * Date: 30/7/2017
 * Time: 9:06
 */

class Product_model extends MY_Model
{
    var $table = 'sanpham';
    var $table1 = 'chitiet_khuyenmai';
    var $table2 = 'khuyenmai';

    public function __construct()
    {
        parent::__construct();
    }

    public function getProductPromotion($item=array())
    {
        $this->db->select('*');
        $this->db->from('sanpham');
        $this->db->join('chitiet_khuyenmai', 'sanpham.MA_SANPHAM = chitiet_khuyenmai.MA_SANPHAM');
        $this->db->join('khuyenmai', 'chitiet_khuyenmai.MA_KHUYENMAI=khuyenmai.MA_KHUYENMAI');
        if($item !=null){
            $this->db->where('NGAY_BATDAU <', $item['NGAY_CAPNHAT']);
            $this->db->or_where('NGAY_BATDAU', $item['NGAY_CAPNHAT']);
            $this->db->where('NGAY_KETTHUC >', $item['NGAY_CAPNHAT']);
            $this->db->or_where('NGAY_KETTHUC', $item['NGAY_CAPNHAT']);
        }
        $query = $this->db->get();
        if($query->num_rows() != 0){
            return $query ->result_array();
        }else{
            return false;
        }

    }
}