<!doctype html>
<html lang="vi">
<head>
    <?php
    $this->load->view('admin/head');
    ?>
</head>
<body>
<!-- menu left -->
<div id="left_content">
    <?php $this->load->view('admin/left'); ?>
</div>
<!-- content -->
<div id="rightSide">
    <?php $this->load->view('admin/header'); ?>
    <!-- Content -->
        <?php $this->load->view($temp);?>
    <!-- End Content -->
    <?php $this->load->view('admin/footer'); ?>
</div>
<div class="clear"></div>
</body>
</html>