<?php
class  AutoCheck extends MY_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('autoCheck_model');
    }
    public function checkDataExists(){

//        $data = $_GET['sendData'];
//        $table = $_GET['table'];
//        $aData = array($data);
//        $nData  = $this->autoCheck_model->check_exists($aData,$table);
//        if($nData){
//            echo 'Đã tồn tại';
//        }else{
//            echo '';
//        }
        return 'ádfgh';

    }
}