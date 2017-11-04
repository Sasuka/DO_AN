<?php
$this->load->view('admin/promotions_detail/head', $this->data);
$account = $this->session->userdata('account');
$level = $this->session->userdata('level');

?>
<div class="line"></div>
<div class="wrapper" id="main_import">
    <?php
    //  var_dump($this->session->flashdata('message'));
    if ($this->session->flashdata('message') != '') {
        $this->data['message'] = $this->session->flashdata('message');
        $this->load->view('admin/messager', $this->data);
    }
    ?>
    <div class="widget">

        <div class="title">
            <span class="titleIcon" style="width: 18px;">
                <img src="#">
            </span>
            <h6>
                Danh sách chi tiết khuyến mãi </h6>
            <div class="num f12">Số lượng: <b><?php echo count($list); ?></b></div>
        </div>

        <table class="sTable mTable myTable" id="checkAll" width="100%" cellspacing="0" cellpadding="0">

            <thead>
            <tr>
                <td style="width: 20px;">STT</td>
                <td style="width:10px;">Mã khuyến mãi</td>
                <td>Tên tên khuyến mãi</td>
                <td>Tên sản phẩm</td>
                <td>Phần trăm khuyến mãi (%)</td>
                <td>Tặng phẩm</td>
            </tr>
            </thead>

            <tfoot class="auto_check_pages">
            <tr>
                <td colspan="6">
                    <div style="padding: 10px;float: right; ">
                        <a href="<?php echo admin_url('promotions'); ?>" class="button blueB">
                            <span style="color:white;">Trở lại</span>
                        </a>
                    </div>

                    <div class="pagination">
                        <?php
                        echo $this->pagination->create_links();
                        ?>
                    </div>
                </td>
            </tr>
            </tfoot>

            <tbody class="list_item">
            <div id="loading" style="width: 50px;height: 50px;position: absolute;z-index: 99;margin:15% 45%;"></div>
            <?php
            //      pre($importDe);
            $i = 0;
            //   pre($list);
            for ($i = 0; $i < count($list); $i++) {
                ?>
                <tr class="row_<?php echo $list[$i]['MA_KHUYENMAI']; ?>">
                    <td style="text-align: center;">
                        <?php echo $i+1;?>
                    </td>
                    <td>
                        <?php echo $list[$i]['MA_KHUYENMAI']; ?>
                    </td>
                    <td>
                        <b><?php echo $list[$i]['TEN_KHUYENMAI']; ?></b>
                    </td>
                    <td class="tipS" title="<?php echo $list[$i]['MA_SANPHAM']; ?>" >
                            <b><?php echo $list[$i]['TEN_SANPHAM']; ?></b>
                    </td>
                    <td>
                        <b><?php echo $list[$i]['PHANTRAM_KM']; ?></b>
                    </td>
                    <td>
                        <b><?php echo ($list[$i]['TANGPHAM'] == '') ? 'Không có' : ($list[$i]['TANGPHAM']); ?></b>
                    </td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
    </div>
</div>

