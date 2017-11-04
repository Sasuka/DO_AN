<?php
class Store_model extends MY_Model
{
    var $table = 'kho';

    public function __construct()
    {
        parent::__construct();
    }
    public function getListStore(){
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->join('loai_sanpham','loai_sanpham.MA_LOAI_SANPHAM=kho.MA_LOAI_SANPHAM');
        return $this->db->get()->result_array();

    }
}