<!-- head -->
<?php
$this->load->view('admin/providers/head', $this->data);
?>
<!-- table member -->
<div class="line">
</div>
<!-- MAIN CONTENT -->
<div class="wrapper">

    <?php
    //  var_dump($this->session->flashdata('message'));
    if ($this->session->flashdata('message') != '') {
        $this->data['message'] = $this->session->flashdata('message');
        $this->load->view('admin/admin/messager', $this->data);
    }
    ?>
    <div class="widget">

        <div class="title">
            <span class="titleIcon"><input id="titleCheck" name="titleCheck" type="checkbox"></span>
            <h6>Danh sách Nhà cung cấp</h6>
            <div class="num f12">Tổng số: <b><?php echo count($list);?></b></div>
        </div>

        <form action="<?php echo public_url('admin') ?>/user.html" method="get" class="form" name="filter">
            <table class="sTable mTable myTable withCheck" id="checkAll" width="100%" cellspacing="0" cellpadding="0">
                <thead>
                <tr>
                    <td style="width:10px;"><img src="<?php echo public_url('admin') ?>/images/icons/tableArrows.png">
                    </td>
                    <td style="width:80px;">Mã số</td>
                    <td>Tên nhà cung cấp</td>
                    <td>Địa chỉ</td>
                    <td>Điện thoại</td>
                    <td>Email</td>
                    <td style="width:100px;">Hành động</td>
                </tr>
                </thead>

                <tfoot>
                <tr>
                    <td colspan="7">
                        <div class="list_action itemActions">
                            <a href="#submit" id="submit" class="button blueB" url="<?php echo admin_url('providers/dell_all');?>">
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

                <tbody>
                <!-- Filter -->
                <!-- thuc hien danh sach nguoi quan tri -->
                <?php
                foreach ($list as $itemProvider) {
                    ?>
                    <tr class="row_<?php echo $itemProvider['MA_NHA_CUNGCAP'];?>">
                    <?php if ($itemProvider['TRANGTHAI'] == 1) { ?>
                        <td><input name="id[]" value="<?= $itemProvider['MA_NHA_CUNGCAP'] ?>" type="checkbox"></td>
                    <?php } else{?>
                        <td></td>
                    <?php }?>
                        <td class="textC">
                            <span title="<?php echo ($itemProvider['TRANGTHAI'] == 1) ? 'Hoạt động' : 'Tạm dừng'; ?>"
                                  class="tipS">
                                 <?= $itemProvider['MA_NHA_CUNGCAP'] ?>
                            </span>
                        </td>


                        <td><span title="<?= $itemProvider['WEBSITE'] ?>" class="tipS">
							<?= $itemProvider['TEN_NHA_CUNGCAP'] ?></span></td>

                        <td><span title="<?= $itemProvider['DIACHI_NHA_CUNGCAP'] ?>" class="tipS">
							<?= $itemProvider['DIACHI_NHA_CUNGCAP'] ?></span></td>

                        <td>
                            <span title="SDT là duy nhất" class="tipS">
                                <?= $itemProvider['SDT'] ?></span>
                        </td>
                        <td><span title="<?= $itemProvider['EMAIL'] ?>" class="tipS">
							<?= $itemProvider['EMAIL'] ?></span></td>

                        <td class="option">
                            <a href="<?php echo admin_url('providers/edit/' . $itemProvider['MA_NHA_CUNGCAP']) ?>"
                               title="Chỉnh sửa" class="tipS ">
                                <img src="<?php echo public_url('admin') ?>/images/icons/color/edit.png">
                            </a>
                            <!--                        neu con hoat dong thi hien nut xoa va nguoc-->
                            <?php if ($itemProvider['TRANGTHAI'] == 1) { ?>
                                <a href="<?php echo admin_url('providers/delete/' . $itemProvider['MA_NHA_CUNGCAP']) ?>"
                                   title="Xóa"
                                   class="tipS verify_action">
                                    <img src="<?php echo public_url('admin') ?>/images/icons/color/delete.png">
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
        </form>
    </div>
</div>
<!-- END MAIN -->
<div class="clear mt30"></div>
<!-- end table -->