<?php

/**
 * Created by PhpStorm.
 * User: tient
 * Date: 30/7/2017
 * Time: 23:17
 */
class Upload_library
{
    var $CI = '';

    public function __construct()
    {
        $this->CI = &get_instance();//trong library thi khong dc goi truc tiep nhu mode controller

    }

//    thuc hien upload file
    /*$upload_path : ten duong dan save file
        $file_name ten cua the input upload file
     * */
    public function upload($upload_path = '', $file_name)
    {
        $config = $this->config($upload_path);
        $this->CI->load->library('upload', $config);
        if ($this->CI->upload->do_upload($file_name)) {
            $data = $this->CI->upload->data();

        } else {
            //neu upload that bai
            $data = $this->CI->upload->display_errors();
        }
        return $data;
    }

//thuc hien upload nhieu file
    public function upload_file($upload_path = '', $file_name)
    {
        $config = $this->config($upload_path);
        //tao bien moi truong khi upload
        $file = $_FILES['image_list'];
        $image_list = array();//luu ten cac file anh upload thanh cong
        $count = count($file['name']);
        for ($i = 0; $i < $count; $i++) {
            $_FILES['userfile']['name'] = $file['name'][$i];//khai bao ten cua file i
            $_FILES['userfile']['type'] = $file['type'][$i];//khai bao kieu cua file i
            $_FILES['userfile']['tmp_name'] = $file['tmp_name'][$i];//khai bao duong dan tam cua file i
            $_FILES['userfile']['error'] = $file['error'][$i];//khai bao loi cua file i
            $_FILES['userfile']['size'] = $file['size'][$i];//khai bao kich thuoc cua file i
            //load thu vien upload va cau hinh
            $this->CI->load->library('upload', $config);
            //thuc hien upload tung file
            if ($this->CI->upload->do_upload()) {
                //neu upload thanh cong chi luu toan bo du lieu
                $data = $this->CI->upload->data();
                //in cau truc du lieu cua file
                $image_list[]= $data['file_name'];

            }

        }
        return $image_list;
    }

//    cau hinh upload file
    public function config($upload_path = '')
    {
        $config = array();//khai bao bien cho config
        $config['upload_path'] = $upload_path;
        $config['allowed_types'] = 'gif|jpg|png';
//        $config['max_size'] = '1200';
   //     $config['max_width'] = '1024';
  //      $config['max_height'] = '768';
        return $config;
    }

}