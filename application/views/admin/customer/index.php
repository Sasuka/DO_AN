<!-- head -->
<?php
$this->load->view('admin/customer/head', $this->data);
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
        $this->data['message'] = $this->session->flashdata('message');
        $this->load->view('admin/messager', $this->data);
    }
    ?>
    <div class="widget">

        <div class="title">
            <span class="titleIcon">
               <img src="<?php echo public_url('admin/images/userPic.png') ?>">
            </span>
            <h6>Danh sách khách hàng</h6>
            <div class="num f12">Tổng số: <b><?php echo $total_rows; ?></b></div>
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
                foreach ($list
                as $personal) {
                ?>
                <tr>


                    <td class="textC"><?= $personal['MA_KHACHHANG'] ?></td>


                    <td>
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
                </tr>
                <?php } ?>
                </tbody>
            </table>
        </form>
    </div>
</div>
<!-- END MAIN -->
<div class="clear mt30"></div>
<!-- end table -->