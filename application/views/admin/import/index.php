<?php
$this->load->view('admin/import/head', $this->data);
$account = $this->session->userdata('account');
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
            <div class="num f12">Số lượng: <b><?php echo $total_rows; ?></b></div>
        </div>

        <table class="sTable mTable myTable" id="checkAll" width="100%" cellspacing="0" cellpadding="0">

            <thead class="filter">
            <tr>
                <td colspan="6">
                    <form class="list_filter form" action="<?php echo admin_url('import');?>" method="get">
                        <table width="100%" cellspacing="0" cellpadding="0">
                            <tbody>

                            <tr>
                                <td class="label" style="width:40px;"><label for="filter_id">Mã số</label></td>
                                <td class="item"><input name="id" value="<?php echo $this->input->get('id');?>" id="filter_id" style="width:55px;"
                                                        type="text"></td>

                                <td class="label" style="width:40px;"><label for="filter_id">Tên </label></td>
                                <td class="item" style="width:155px;"><input name="name" value="<?php echo $this->input->get('name');?>" id="filter_iname"
                                                                             style="width:155px;" type="text"></td>

                                <td class="label" style="width:60px;"><label for="filter_status">Nhóm:</label></td>
                                <td class="item">
                                    <select name="group" id="group-product">
                                        <option value="0">Chọn nhóm</option>
<!--                                        --><?php
//                                        foreach ($listGroup as $itemGroup) {
//                                            ?>
<!--                                            <option value="--><?//= $itemGroup['MA_NHOM_SANPHAM']; ?><!--">--><?//= $itemGroup['TEN_NHOM_SANPHAM']; ?><!--</option>-->
<!--                                            --><?php
//                                        }
//                                        ?>

                                    </select>
                                </td>
                                <td class="label" style="width:60px;"><label for="filter_status">Thể loại</label></td>
                                <td class="item">
                                    <select name="catalog" id="catelog-product">
                                        <option value="0">Chọn loại trước</option>
                                    </select>
                                </td>
                                <td style="width:150px">
                                    <input class="button blueB" value="Lọc" type="submit">
                                    <input class="basic" value="Reset"
                                           onclick="window.location.href = '<?php echo admin_url("import")?>'; "
                                           type="reset">
                                </td>

                            </tr>
                            </tbody>
                        </table>
                    </form>
                </td>
            </tr>
            </thead>

            <thead>
            <tr>
                <td style="width:21px;"><img src="<?php echo public_url('admin/images') ?>/icons/tableArrows.png"></td>
                <td style="width:60px;">Mã số</td>
                <td>Tên nhân viên</td>
                <td>Tên nhà cung cấp</td>
                <td>Tổng thành tiền</td>
                <td style="width:75px;">Ngày lập</td>
                <td style="width:120px;">Hành động</td>
            </tr>
            </thead>

            <tfoot class="auto_check_pages">
            <tr>
                <td colspan="6">
                    <div class="list_action itemActions">
                        <a href="#submit" id="submit" class="button blueB" url="<?php echo admin_url('import/dell_all');?>">
                            <span style="color:white;">Xóa hết</span>
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
            $i =0;
            foreach ($list as $item) {
                ?>
                <tr class="row_<?php echo $item['MA_PHIEUNHAP'];?>">
                    <td><input name="id[]" value="<?= $item['MA_PHIEUNHAP'] ?>" type="checkbox"></td>

                    <td class="textC"><?= $item['MA_PHIEUNHAP'] ?></td>

                    <td>
                        <a href="product/view/9.html" class="tipS" title="" target="_blank">
                            <b><?php echo $item['HO'].' '.$item['TEN']; ?></b>
                        </a>
                    </td>
                    <td>
                        <a href="product/view/9.html" class="tipS" title="<?php echo $item['DIACHI_NHA_CUNGCAP']; ?>" target="_self">
                            <b><?php echo $item['TEN_NHA_CUNGCAP']; ?></b>
                        </a>
                    </td>
                    <td>
                        <a class="tipS" title="">
                            <b><?php echo $item['TONG_THANHTIEN']; ?></b>
                        </a>
                    </td>
                    <td class="textC">
                        <?php echo date('d-m-Y', strtotime($item['NGAYLAP_PHIEUNHAP'])); ?>
                    </td>

                    <td class="option textC">

<!--                        chinh nhan vien lap phieu nhap nao thi moi duoc sua va xoa phieu nhap do-->
<!--                        dong thoi khong co chua ma phieu nhap-->
                        <a href="<?php echo admin_url('importDetail/index/' . $item['MA_PHIEUNHAP']); ?>" target="_self" class="tipS" title="Xem chi tiết sản phẩm">
                            <img src="<?php echo public_url('admin/images') ?>/icons/color/view.png">
                        </a>
                        <?php

                        if(($item['MA_NHANVIEN']==$account['MA_NHANVIEN']) &&
                        ($item['TONG_THANHTIEN'] == 0)) { ?>

                            <a href="<?php echo admin_url('import/edit/' . $item['MA_PHIEUNHAP']); ?>" title="Chỉnh sửa" target="_self"
                               class="tipS">
                                <img src="<?php echo public_url('admin/images') ?>/icons/color/edit.png">
                            </a>

                            <a href="<?php echo admin_url('import/delete/' . $item['MA_PHIEUNHAP']); ?>" title="Xóa"
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

