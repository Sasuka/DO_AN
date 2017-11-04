<!-- head -->
<?php
$this->load->view('admin/admin/head', $this->_data);
$account = $this->session->userdata('account');
$level = $this->session->userdata('level');

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
        $this->load->view('admin/admin/messager', $this->_data);
    }
    ?>
    <div class="widget">

        <div class="title">
            <span class="titleIcon">
               <img src="<?php echo public_url('admin/images/userPic.png') ?>">
            </span>
            <h6>Danh sách Nhân viên</h6>
            <div class="num f12">Tổng số: <b><?php echo count($listEmploy); ?></b></div>
        </div>

        <form action="<?php echo public_url('admin') ?>/user.html" method="get" class="form" name="filter">
            <table class="sTable mTable myTable withCheck" id="checkAll" width="100%" cellspacing="0" cellpadding="0">
                <thead>
                <tr>

                    <td style="width:80px;">Mã số</td>
                    <td>Tên</td>
                    <td>Email</td>
                    <td>Điện thoại</td>
                    <td style="overflow: hidden;text-overflow: ellipsis;">Địa chỉ</td>
                    <td style="width:100px;">Hành động</td>
                </tr>
                </thead>

                <tfoot>
                <tr>
                    <td colspan="6">

                    </td>
                </tr>
                </tfoot>

                <tbody>
                <!-- Filter -->
                <!-- thuc hien danh sach nguoi quan tri -->
                <?php
                foreach ($listEmploy as $personal) {
                    ?>
                    <tr>


                        <td class="textC"><?= $personal['MA_NHANVIEN'] ?></td>


                        <td><span title="<?= $personal['TEN_CHUCVU']; ?>" class="tipS">
							<?= $personal['HO'] . ' ' . $personal['TEN']; ?></span></td>


                        <td><span title="<?= $personal['EMAIL'] ?>" class="tipS">
							<?= $personal['EMAIL'] ?>					</span></td>

                        <td>
                            <span title="SDT là duy nhất" class="tipS">
                                <?= $personal['SDT'] ?></span>
                        </td>

                        <td>
                            <?= $personal['DIACHI'] ?>
                        </td>


                        <td class="option">
                            <?php if ($account['MA_NHANVIEN'] == $personal['MA_NHANVIEN']||$level ==='Admin') { ?>
                                <a href="<?php echo admin_url('admin/edit/' . $personal['MA_NHANVIEN']) ?>"
                                   title="Chỉnh sửa" class="tipS ">
                                    <img src="<?php echo public_url('admin') ?>/images/icons/color/edit.png">
                                </a>
                                <?php
                                if ($personal['TRANGTHAI'] == 1) { ?>
                                    <a href="<?php echo admin_url('admin/delete/' . $personal['MA_NHANVIEN']) ?>"
                                       title="Xóa" class="tipS verify_action">
                                        <img src="<?php echo public_url('admin') ?>/images/icons/color/delete.png">
                                    </a>
                                    <?php
                                }
                                ?>
                                <?php
                            } else {
                                ?>
                                <a href="#"
                                   title="Chỉnh sửa" class="tipS " disabled>
                                    <img src="<?php echo public_url('admin') ?>/images/icons/color/edit.png">
                                </a>
                                <?php
                                if ($personal['TRANGTHAI'] == 1) { ?>
                                    <a href="#"
                                       title="Xóa" class="tipS" disabled>
                                        <img src="<?php echo public_url('admin') ?>/images/icons/color/delete.png">
                                    </a>
                                    <?php
                                }
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