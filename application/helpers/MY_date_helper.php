<?php
//$time : la thoi gian muon hien thi ngay
//$fulltime la co muon hien thi gio phu giay khong
function get_date($time, $fulltime = true)
{
    $format = '%d - %m - %Y';
    if ($fulltime){
        $format =$format.' %H:%i:%s';
    }
    return mdate($format,$time);
}