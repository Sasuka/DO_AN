<!-- head -->
<?php
$this->load->view('admin/catelog/head', $this->data);
?>
<!-- table member -->
<div class="line">
</div>
<!-- MAIN CONTENT -->
<div class="wrapper">

    <?php
    //  var_dump($this->session->flashdata('message'));
    if ($this->session->flashdata('message') != '') {
        $this->_data['message'] = $this->session->flashdata('message');
        $this->load->view('admin/messager', $this->_data);
    }
    ?>
    <div class="widget">

        <div class="title">
            <span class="titleIcon"><input id="titleCheck" name="titleCheck" type="checkbox"></span>
            <h6>Danh sách loại sản phẩm</h6>
            <div class="num f12">Tổng số: <b> <?php echo count($list); ?></b></div>
        </div>

        <form action="<?php echo public_url('admin') ?>/user.html" method="get" class="form" name="filter">
            <table class="sTable mTable myTable withCheck" id="checkAll" width="100%" cellspacing="0" cellpadding="0">
                <thead>
                <tr>
                    <td style="width:10px;"><img src="<?php echo public_url('admin') ?>/images/icons/tableArrows.png">
                    </td>
                    <td style="width:80px;">Mã số</td>
                    <td>Tên loại sản phẩm</td>
                    <td>Thuộc nhóm</td>
                    <td>Nhà cung cấp</td>
                    <td style="width:100px;">Hành động</td>
                </tr>
                </thead>

                <tfoot>
                <tr>
                    <td colspan="7">
                        <div class="list_action itemActions">
                            <a href="#submit" id="submit" class="button blueB" url="<?php echo admin_url('catelog/delete_all')?>">
                                <span style="color:white;">Xóa hết</span>
                            </a>
                        </div>

                        <div class="pagination">
                        </div>
                    </td>
                </tr>
                </tfoot>

                <tbody>
                <!-- Filter -->
                <!-- thuc hien danh sach nguoi quan tri -->
                <?php
                foreach ($list as $row) {
                    ?>
                    <tr class="row_<?php echo $row['MA_LOAI_SANPHAM'];?>">
                        <td><input name="id[]" value="<?= $row['MA_LOAI_SANPHAM'] ?>" type="checkbox"></td>
                        <td class="textC"><?= $row['MA_LOAI_SANPHAM'] ?></td>

                        <td>
                            <span title="<?= $row['TEN_LOAI_SANPHAM'] ?>" class="tipS">
							<?= $row['TEN_LOAI_SANPHAM'] ?>	</span>
                        </td>
                        <td>
                            <?php foreach ($listGroup as $itemGroup) { ?>
                                <span title="<?= $itemGroup['MA_NHOM_SANPHAM'] ?>" class="tipS">
							<?php
                            if ($row['MA_NHOM_SANPHAM'] == $itemGroup['MA_NHOM_SANPHAM']) {
                                echo $itemGroup['TEN_NHOM_SANPHAM'];
                                break;
                            }
                            ?>
                            </span>
                                <?php
                            }
                            ?>
                        </td>
                        <td><?php echo $row['TEN_NHA_CUNGCAP'];?></td>
                        <td class="option">
                            <a href="<?php echo admin_url('catelog/edit/' . $row['MA_LOAI_SANPHAM']) ?>"
                               title="Chỉnh sửa"
                               class="tipS ">
                                <img src="<?php echo public_url('admin') ?>/images/icons/color/edit.png">
                            </a>

                            <a href="<?php echo admin_url('catelog/delete/' . $row['MA_LOAI_SANPHAM']) ?>" title="Xóa"
                               class="tipS verify_action">
                                <img src="<?php echo public_url('admin') ?>/images/icons/color/delete.png">
                            </a>
                        </td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>
        </form>
    </div>
</div>
<!-- END MAIN -->
<div class="clear mt30"></div>
<!-- end table -->