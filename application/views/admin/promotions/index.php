<?php
$this->load->view('admin/promotions/head', $this->data);
//pre($list);
?>
<div class="line"></div>
<div class="wrapper" id="main_product">
    <?php
    //  var_dump($this->session->flashdata('message'));
    if ($this->session->flashdata('message') != '') {
        $this->data['message'] = $this->session->flashdata('message');
        $this->load->view('admin/messager', $this->data);
    }
    ?>
    <div class="widget">

        <div class="title">
            <span class="titleIcon">
                <img src="<?php echo public_url(''); ?>">
            </span>
            <h6>
                Danh sách khuyến mãi </h6>
            <div class="num f12">Số lượng: <b><?php echo $total_rows; ?></b></div>
        </div>

        <table class="sTable mTable myTable" id="checkAll" width="100%" cellspacing="0" cellpadding="0">


            <thead>
            <tr>
                <td style="width:60px;">Mã số</td>
                <td>Tên khuyến mãi</td>
                <td>Ngày bắt đầu</td>
                <td style="width:75px;">Ngày kết thúc</td>
                <td style="width:120px;">Hành động</td>
            </tr>
            </thead>

            <tfoot class="auto_check_pages">
            <tr>
                <td colspan="6">
                    <div class="itemActions">
                        <a href="<?php echo admin_url();?>" id="submit" class="button blueB" url="<?php echo admin_url('#'); ?>">
                            <span style="color:white;">Quay lại</span>
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
            for ($i = 0; $i < count($list); $i++) {
                ?>
                <tr class="row_<?php echo $list[$i]['MA_KHUYENMAI']; ?>">


                    <td class="textC"><?= $list[$i]['MA_KHUYENMAI'] ?></td>

                    <td class="tipS" title="">
                        <b><?php echo $list[$i]['TEN_KHUYENMAI']; ?></b>
                    </td>

                    <td class="textC">
                        <?php echo date('d-m-Y', strtotime($list[$i]['NGAY_BATDAU'])); ?>
                    </td>

                    <td class="textC"><?php echo date('d-m-Y', strtotime($list[$i]['NGAY_KETTHUC'])); ?></td>

                    <td class="option textC">
                        <a href="" title="Gán là nhạc tiêu biểu" class="tipE">
                            <img src="<?php echo public_url('admin/images') ?>/icons/color/star.png">
                        </a>
                        <a href="<?php echo admin_url('promotionsDetail/index/' . $list[$i]['MA_KHUYENMAI']); ?>"
                           target="_self" class="tipS" title="Xem chi tiết sản phẩm">
                            <img src="<?php echo public_url('admin/images') ?>/icons/color/view.png">
                        </a>
                        <?php
                        $flag = false;
                        for ($j = 0; $j < count($detailPro); $j++) {
                            //k co ma phieu nhap trong nay moi dc phep sua va xoa
                            if ($detailPro[$j]['MA_KHUYENMAI'] == $list[$i]['MA_KHUYENMAI']) {
                                $flag = true;
                                break;
                            }
                        }
                        if (!$flag) {

                            ?>

                            <a href="<?php echo admin_url('promotions/edit/' . $list[$i]['MA_KHUYENMAI']); ?>"
                               title="Chỉnh sửa"
                               class="tipS">
                                <img src="<?php echo public_url('admin/images') ?>/icons/color/edit.png">
                            </a>

                            <a href="<?php echo admin_url('promotions/delete/' . $list[$i]['MA_KHUYENMAI']); ?>"
                               title="Xóa"
                               class="tipS verify_action">
                                <img src="<?php echo public_url('admin/images') ?>/icons/color/delete.png">
                            </a>
                            <?php
                        }
                        ?>
                    </td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
    </div>
</div>

