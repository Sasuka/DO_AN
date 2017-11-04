<?php

$this->load->view('admin/product/head', $this->data);
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
            <span class="titleIcon"><input id="titleCheck" name="titleCheck" type="checkbox"></span>
            <h6>
                Danh sách sản phẩm </h6>
            <div class="num f12">Số lượng: <b><?php echo $total_rows; ?></b></div>
        </div>

        <table class="sTable mTable myTable" id="checkAll" width="100%" cellspacing="0" cellpadding="0">

            <thead class="filter">
            <tr>
                <td colspan="6">
                    <form class="list_filter form" action="<?php echo admin_url('product');?>" method="get">
                        <table width="100%" cellspacing="0" cellpadding="0">
                            <tbody>

                            <tr>
                                <td class="label" style="width:40px;"><label for="filter_id">Mã số</label></td>
                                <td class="item"><input name="id" value="<?php echo $this->input->get('id');?>" id="filter_id" style="width:55px;"
                                                        type="text"></td>

                                <td class="label" style="width:40px;"><label for="filter_id">Tên</label></td>
                                <td class="item" style="width:155px;"><input name="name" value="<?php echo $this->input->get('name');?>" id="filter_iname"
                                                                             style="width:155px;" type="text"></td>

                                <td class="label" style="width:60px;"><label for="filter_status">Nhóm:</label></td>
                                <td class="item">
                                    <select name="group" id="group-product">
                                        <option value="0">Chọn nhóm</option>
                                        <?php
                                        foreach ($listGroup as $itemGroup) {
                                            ?>
                                            <option value="<?= $itemGroup['MA_NHOM_SANPHAM']; ?>"><?= $itemGroup['TEN_NHOM_SANPHAM']; ?></option>
                                            <?php
                                        }
                                        ?>

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
                                           onclick="window.location.href = '<?php echo admin_url("product")?>'; "
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
                <td>Tên</td>
                <td>Giá</td>
                <td style="width:75px;">Ngày tạo</td>
                <td style="width:120px;">Hành động</td>
            </tr>
            </thead>

            <tfoot class="auto_check_pages">
            <tr>
                <td colspan="6">
                    <div class="list_action itemActions">
                        <a href="#submit" id="submit" class="button blueB" url="<?php echo admin_url('product/dell_all');?>">
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
            foreach ($list as $item) {
                ?>
                <tr class="row_<?php echo $item['MA_SANPHAM'];?>">
                    <td><input name="id[]" value="<?= $item['MA_SANPHAM'] ?>" type="checkbox"></td>

                    <td class="textC"><?= $item['MA_SANPHAM'] ?></td>

                    <td>
                        <div class="image_thumb">
                            <img src="<?php echo base_url('uploads/product/' . $item['HINH_DAIDIEN']) ?>"
                                 height="50">
                            <div class="clear"></div>
                        </div>

                        <a href="product/view/9.html" class="tipS" title="" target="_blank">
                            <b><?php echo $item['TEN_SANPHAM']; ?></b>
                        </a>

                        <div class="f11">
                            Loại: <?php echo $item['LOAI']; ?> | Kinh doanh:<span style="color:red;"> <?php echo ($item['TRANGTHAI']=='0') ? 'Hết' :'<span style="color:forestgreen;">Còn</span>'; ?></span>
                        </div>

                    </td>

                    <td class="textR">
                        <b style="font-weight: bold;">
                            <?php
                            $dongia = $item['DONGIA_BAN'];
                            foreach ($listDis as $itemDis) {
                                if (
                                    $item['MA_SANPHAM'] == $itemDis['MA_SANPHAM']
                                    && (date('d-m-Y', strtotime($item['NGAY_CAPNHAT'])) >= date('d-m-Y', strtotime($itemDis['NGAY_BATDAU'])))
                                    && (date('d-m-Y', strtotime($item['NGAY_CAPNHAT'])) <= date('d-m-Y', strtotime($itemDis['NGAY_KETTHUC'])))
                                ) {
                                    echo '<p style="color: red;">';
                                    //gia-=gia*%roi format don gia

                                    echo number_format($dongia -= $dongia * $itemDis['PHANTRAM_KM'] * 0.01, 3, '.', '.') . ' đ';
                                    echo '</p>';
                                }

                            }
                            ?>
                        </b>

                        <b style="text-decoration: line-through"><?php echo number_format($item['DONGIA_BAN'], 3, '.', '.'); ?></b>
                        đ
                    </td>


                    <td class="textC"><?php echo date('d-m-Y', strtotime($item['NGAY_CAPNHAT'])); ?></td>

                    <td class="option textC">
                        <a href="" title="Gán là nhạc tiêu biểu" class="tipE">
                            <img src="<?php echo public_url('admin/images') ?>/icons/color/star.png">
                        </a>
                        <a href="product/view/9.html" target="_blank" class="tipS" title="Xem chi tiết sản phẩm">
                            <img src="<?php echo public_url('admin/images') ?>/icons/color/view.png">
                        </a>
                        <a href="<?php echo admin_url('product/edit/'.$item['MA_SANPHAM']);?>" title="Chỉnh sửa" class="tipS">
                            <img src="<?php echo public_url('admin/images') ?>/icons/color/edit.png">
                        </a>

                        <a href="<?php echo admin_url('product/delete/'.$item['MA_SANPHAM']);?>" title="Xóa" class="tipS verify_action">
                            <img src="<?php echo public_url('admin/images') ?>/icons/color/delete.png">
                        </a>
                    </td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
    </div>
</div>

