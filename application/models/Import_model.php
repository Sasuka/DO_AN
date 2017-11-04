<?php

class Import_model extends MY_Model
{
    public $table = 'phieunhap';

    public function __construct()
    {
        parent::__construct();
    }

//  kiem tra su ton tai theo ngay
    public function check_exist_providers($where = array(), $like)
    {
        $this->db->where($where);
        $this->db->like("NGAYLAP_PHIEUNHAP", $like, 'after');
        $query = $this->db->get($this->table);
        if ($query->num_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }


}