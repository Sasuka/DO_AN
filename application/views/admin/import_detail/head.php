<?php
//co id phieu nhap thuc hien kiem tra
$account = $this->session->userdata('account');

?>

<div class="titleArea">
    <div class="wrapper">
        <div class="pageTitle">
            <h5>NHẬP HÀNG</h5>
            <span>Quản lý  chi tiết phiếu nhập</span>
        </div>

        <div class="horControlB menu_action">
            <ul>
                <?php if ($infoAcc['MA_NHANVIEN'] == $account['MA_NHANVIEN']) { ?>
                    <li><a href="<?php echo admin_url('importDetail/add/' . $id) ?>">
                            <img src="<?php echo public_url('admin') ?>/images/icons/control/16/add.png">
                            <span>Thêm mới</span>
                        </a></li>
                <?php } ?>
                <li><a href="<?php echo admin_url('importDetail/index/' . $id); ?>">
                        <img src="<?php echo public_url('admin') ?>/images/icons/control/16/list.png">
                        <span>Danh sách</span>
                    </a></li>
            </ul>
        </div>

        <div class="clear"></div>
    </div>
</div>
