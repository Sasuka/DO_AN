<?php
$this->load->view('admin/promotions/head', $this->data);


?>
<div class="line"></div>
<div class="wrapper">
    <?php
    if ($this->session->flashdata('message') != '') {
        $this->data['message'] = $this->session->flashdata('message');
        $this->load->view('admin/messager', $this->data);
    }
    ?>
    <!-- Form -->
    <form class="form" id="form-promotion-add" action="" method="post">
        <fieldset>
            <div class="widget">
                <div class="title">
                    <img src="<?php echo public_url('admin/images') ?>/icons/dark/add.png" class="titleIcon">
                    <h6>Thêm mới khuyến mãi</h6>
                </div>


                <div class="tab_container">
                    <div id="tab1" class="tab_content pd0">
                        <!-- TEN KHUYEM MAI -->
                        <div class="formRow">
                            <label class="formLeft" for="param_name">Tên khuyến mãi:<span class="req">*</span></label>
                            <div class="formRight">
                                <span class="oneTwo"><input name="name" id="name" _autocheck="true"
                                                            type="text"
                                                            value="<?php echo set_value('name'); ?>"></span>
                                <span name="name_autocheck" class="autocheck"></span>
                                <div name="name_error" id="name_error"
                                     class="clear error"><?php echo form_error('name'); ?></div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <!-- NGAY BAT DAU -->
                        <div class="formRow">
                            <label class="formLeft" for="param_name">Ngày bắt đầu:</label>
                            <div class="formRight">
                                <span class="oneTwo"><input name="begin" id="begin" class="date" _autocheck="true"
                                                            type="text"
                                                            value="<?php echo set_value('begin') ?>"></span>
                                <span name="begin_autocheck" class="autocheck"></span>
                                <div name="begin_error" id="begin_error"
                                     class="clear error"><?php echo form_error('begin'); ?></div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <!-- NGAY KET THUC -->
                        <div class="formRow">
                            <label class="formLeft" for="param_name">Ngày kết thúc:</label>
                            <div class="formRight">
                                <span class="oneTwo"><input name="end" id="end" class="date" _autocheck="true"
                                                            type="text"
                                                            value="<?php echo set_value('end') ?>"></span>
                                <span name="end_autocheck" class="autocheck"></span>
                                <div name="end_error" id="end_error"
                                     class="clear error"><?php echo form_error('end'); ?></div>
                            </div>
                            <div class="clear"></div>
                        </div>

                        <div class="formRow hide"></div>
                    </div>


                </div><!-- End tab_container-->

                <div class="formSubmit">
                    <input value="Thêm mới" class="redB" type="submit">
                    <input value="Hủy bỏ" class="basic" type="reset">
                </div>
                <div class="clear"></div>
            </div>
        </fieldset>
    </form>
</div>
<div class="clear"></div>
<script>
    $(function () {
        $('.date').datepicker();

        //bat buoc nhat het khi submit
        $('#form-promotion-add').submit(function (e) {
//
            var name = $('#name').val();
            var begin = $('#begin').val();
            var end = $('#end').val();
            if ($('#name').val() == '') {
                e.preventDefault();
                $(this).focus();
                $('#name_error').html('<span style="color:red;">Vui lòng không để trống</span>');
                return false;
            } else {
                $('#name_error').html('');
                $('#name').val(name);

            }
            if ($('#begin').val() == '') {
                e.preventDefault();
                $(this).focus();
                $('#begin_error').html('<span style="color:red;">Vui lòng không để trống</span>');
                return false;
            } else {
                $('#begin_error').html('');
                $('#begin').val(begin);
            }
            if ($('#end').val() == '') {
                e.preventDefault();
                $(this).focus();
                $('#end_error').html('<span style="color:red;">Vui lòng không để trống</span>');
                return false;
            } else {
                alert(end);

                $('#end_error').html('');
                $('#end').val(end);
            }
        });
    });

</script>

