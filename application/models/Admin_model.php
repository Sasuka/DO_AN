<?php

class Admin_model extends MY_Model
{
    protected $employee = 'nhanvien';
    protected $tLevel = 'chucvu';

    public $table ='nhanvien';

    public function __construct()
    {
        parent::__construct();
    }

    //thuc hien them nguoi quan tri
    public function addEmploy($data)
    {
        if ($data == '')
            return false;
        try {
            if ($this->db->insert($this->employee, $data))
                return true;
            else
                return false;
        } catch (Exception $e) {
            return false;
        }

    }

    //thuc hien sua nguoi quan trij
    public function updateEmploy($table = '', $data = array(), $where = array())
    {
        $this->db->where($where);
        if ($this->db->update($table, $data)) {
            return true;
        } else
            return false;
    }

    //thuc hien load danh sach nguoi quan tri la tat ca nhung thong tin
    public function listEmploy($nameLevel = array('TEN_CHUCVU!='=>"Admin"))
    {
        $this->db->select('*');
        $this->db->from('nhanvien');
        $this->db->join('chucvu', "chucvu.MA_CHUCVU=nhanvien.MA_CHUCVU");

        $this->db->where($nameLevel);
        $this->db->order_by('TRANGTHAI','DESC');
        return $this->db->get()->result_array();
    }

    //lay thong tin của quan trị viên theo $id
    public function getInfo($id = '')
    {

        $this->db->select('*');
        $this->db->from('nhanvien');
        $this->db->join('chucvu','nhanvien.MA_CHUCVU=chucvu.MA_CHUCVU');
        $this->db->where('MA_NHANVIEN', $id);

        return $this->db->get()->result_array();

//         pre($result);
    }

    //kiem tra su ton tai cua so dien thoai hay chua
    public function phone_exists()
    {
        //da co trong MY_MODEL mma this extends it
    }

//   1.================THEM XOA SUA TAI KHOAN  ============================//



//   1.================THEM XOA SUA NHA CUNG CAP  ============================//

//   2.================THEM XOA SUA  SAN PHAM  ============================//
//   3.================THEM XOA SUA UU DAI   ============================//
//   4.================THEM XOA SUA DAT HANG   ============================//
//   5.================THEM XOA SUA PHIEU NHAP   ============================//
//   6.================THEM XOA SUA PHIEU NHAP   ============================//
//   6.================XEM TAT CA CAC CHUC VU   ============================//
    //lấy tất cả các chức vụ
    public function getChucVu()
    {
        return $this->db->get($this->tLevel)->result_array();
    }

}