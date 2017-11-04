<?php
$account = $this->session->userdata('account');
$level = $this->session->userdata('level');

?>

<div id="leftSide" style="padding-top:30px;">

    <!-- Account panel -->

    <div class="sideProfile">
        <a href="#" title="" class="profileFace"><img src="<?php echo public_url('admin'); ?>/images/user.png"
                                                      width="40"></a>
        <span>Xin chào: <strong><?php echo $account['TEN']; ?></strong></span>
        <span>Chức vụ :<?php echo $level; ?></span>
        <div class="clear"></div>
    </div>
    <div class="sidebarSep"></div>
    <!-- Left navigation -->

    <ul id="menu" class="nav">
        <li class="home">
            <a href="<?php echo admin_url() ?>" class="active" id="current">
                <span>Bảng điều khiển</span>
                <strong></strong>
            </a>
        </li>
        <li class="tran">

            <a href="admin/tran.html" class=" exp">
                <span>Quản lý bán hàng</span>
                <strong>3</strong>
            </a>

            <ul class="sub">
                <li>
                    <a href="<?php echo admin_url('transaction'); ?>">
                        Giao dịch </a>
                </li>
                <li>
                    <a href="#">
                        Đơn hàng sản phẩm </a>
                </li>
                <li>
                    <a href="<?php echo admin_url('store') ?>">
                        Quản lý kho </a>
                </li>
            </ul>

        </li>
        <li class="product">

            <a href="#" class=" exp">
                <span>Sản phẩm</span>
                <strong><?php echo ($level == 'Employee') ? '4' : '3'; ?> </strong>
            </a>

            <ul class="sub">
                <li>
                    <a href="<?php echo admin_url('product') ?>">
                        Sản phẩm </a>
                </li>
                <li>
                    <a href="<?php echo admin_url('group') ?>">
                        Nhóm sản phẩm </a>
                </li>
                <li>
                    <a href="<?php echo admin_url('catelog') ?>">
                        Loại sản phẩm </a>
                </li>
                <?php if ($level == 'Employee') { ?>
                    <li>
                        <a href="<?php echo admin_url('import') ?>">
                            Nhập hàng </a>
                    </li>
                    <?php
                }
                ?>
            </ul>

        </li>
        <li class="account">

            <a href="#" class=" exp">
                <span>Tài khoản</span>
                <strong><?php echo ($level =='Admin') ? '3':'1';?></strong>
            </a>

            <ul class="sub">
                <!--                neu la admin moi duoc phep xem quan tri-->
                <?php if ($level == 'Admin') { ?>
                    <li>
                        <a href="<?php echo admin_url('admin'); ?>">
                            Nhóm quản trị </a>
                    </li>

                    <li>
                        <a href="<?php echo admin_url('admin/employee'); ?>">
                            Nhóm Nhân viên </a>
                    </li>
                    <?php

                }
                ?>
                <li>
                    <a href="<?php echo admin_url('customer'); ?>">
                        Khách hàng </a>
                </li>
            </ul>

        </li>
        <li class="content">

            <a href="#" class=" exp">
                <span>Nội dung và đối tác</span>
                <strong>1</strong>
            </a>

            <ul class="sub">
                <li>
                    <a href="<?php echo admin_url('providers') ?>">
                        Nhà cung cấp </a>
                </li>
                <li>
                    <a href="<?php echo admin_url('promotions') ?>">
                        Khuyến mãi </a>
                </li>
            </ul>

        </li>

    </ul>

</div>
<div class="clear"></div>
	