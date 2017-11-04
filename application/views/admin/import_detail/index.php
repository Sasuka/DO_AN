<?php
$this->load->view('admin/import_detail/head', $this->data);
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
            <span class="titleIcon"><input id="titleCheck" name="titleCheck" type="checkbox"></span>
            <h6>
                Danh sách phiếu nhập </h6>
            <div class="num f12">Số lượng: <b><?php echo count($list); ?></b></div>
        </div>

        <table class="sTable mTable myTable" id="checkAll" width="100%" cellspacing="0" cellpadding="0">

            <thead class="filter">
            <tr>
                <td colspan="6">
            <tbody>
            <tr style="text-align: center;color: #ff0a10; font-size: 1.1em;">
                <td colspan="6">Mã phiếu nhâp: <?php echo $id; ?></td>
            </tr>
            </tbody>
            </td>
            </tr>
            </thead>

            <thead>
            <tr>
                <td style="width:21px;"><img src="<?php echo public_url('admin/images') ?>/icons/tableArrows.png"></td>
                <td style="width:60px;">Mã sản phẩm</td>
                <td>Tên sản phẩm</td>
                <td>Số lượng nhập</td>
                <td>Đơn giá nhập</td>
                <td>Thành tiền</td>
                <td style="width:120px;">Hành động</td>
            </tr>
            </thead>

            <tfoot class="auto_check_pages">
            <tr>
                <td colspan="6">
                    <div  style="padding: 10px;float: right; ">
                        <a href="<?php echo admin_url('import'); ?>"  class="button blueB">
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
                <tr class="row_<?php echo $list[$i]['MA_SANPHAM']; ?>">
                    <td><input name="id[]" value="<?= $list[$i]['MA_SANPHAM'] ?>" type="checkbox"></td>

                    <td class="textC"><?= $list[$i]['MA_SANPHAM'] ?></td>

                    <td>
                        <a href="product/view/9.html" class="tipS" title="" target="_blank">
                            <b><?php echo $list[$i]['TEN_SANPHAM']; ?></b>
                        </a>
                    </td>
                    <td>
                        <a href="product/view/9.html" class="tipS" title="" target="_blank">
                            <b><?php echo $list[$i]['SOLUONGNHAP']; ?></b>
                        </a>
                    </td>

                    <td class="textC">
                        <a class="tipS" title="">
                            <b><?php echo number_format($list[$i]['DONGIA_NHAP'], 3, '.', '.'); ?></b>
                        </a>
                    </td>
                    <!-- THANH TIEN -->
                    <td class="textC">
                        <a class="tipS" title="">
                            <b><?php echo number_format($list[$i]['THANHTIEN'], 3, '.', '.'); ?></b>
                        </a>
                    </td>

                    <td class="option textC">
                        <!-- chi co nhan vien moi duoc them chi tiet phieu nhap cua chinh minh -->
                        <?php if ($level == 'Employee' && $account['MA_NHANVIEN'] == $list[$i]['MA_NHANVIEN']) { ?>

                            <a href="<?php echo admin_url('import/edit/' . $list[$i]['MA_PHIEUNHAP']); ?>"
                               title="Chỉnh sửa"
                               class="tipS">
                                <img src="<?php echo public_url('admin/images') ?>/icons/color/edit.png">
                            </a>

                            <a href="<?php echo admin_url('import/delete/' . $list[$i]['MA_PHIEUNHAP']); ?>" title="Xóa"
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

