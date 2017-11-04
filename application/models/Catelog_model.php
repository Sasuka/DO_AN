<?php
class Catelog_model extends MY_Model
{
    var $table ='loai_sanpham';
    public function __construct()
    {
        parent::__construct();
    }
    public function getCatelog(){
        $this->db->select('*');
        $this->db->from('loai_sanpham');
        $this->db->join('nha_cungcap','nha_cungcap.MA_NHA_CUNGCAP=loai_sanpham.MA_NHA_CUNGCAP');
        return $this->db->get()->result_array();
    }

}