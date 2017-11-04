<?php

class Upload extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('image_lib');
    }

    public function index()
    {
        if ($this->input->post('submit')) {
            $this->load->library('upload_library');
            $upload_path = './uploads/product';

            $data = $this->upload_library->upload($upload_path, 'image');
           // $image_data = $this->upload->data();
          pre($data);
        }
        $this->data['temp'] = 'admin/upload/index';
        $this->load->view('admin/main', $this->data);
    }

    public function upload_file()
    {


        $this->data['temp'] = 'admin/upload/upload_file';
        $this->load->view('admin/main', $this->data);
    }
}