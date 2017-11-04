<!-- head -->
<script>
    $(function () {
        $('#birthday').datepicker();
        $('#phone').keyup(function (e) {
            e.preventDefault();
            var phone = $(this).val();
            if (isNaN(phone) == true) {
                $('#phone_error').html('<span style="color: #0000FF;">Điện thoại phải là số là số</span>');
//                alert(phone);
                return false;
            } else if (phone < 8) {
                $('#phone_error').html('Số điện thoại tối thiểu là 8 số');
                return false;
            } else {
                $('#phone_error').html('');
                return true;
            }

        });
        $('#level').change(function (e) {
            var level = $(this).val();

            if (level == -1) {
                alert('Vui lòng chọn chức vụ');
                return false;
            } else {
                $('#level_error').html('');
                $(this).val(level);
            }

        });
        $('#form-employ').submit(function (e) {

            if ($('#level').val() == -1) {
                e.preventDefault();
                $(this).focus();
                $('#level_error').html('<span style="color:red;">Vui lòng chọn chức vụ</span>');
                return false;
            } else {
                $('#level_error').html('');
                $('#level').attr('selected');

            }
            if ($('#fname').val() == '') {
                e.preventDefault();
                $(this).focus();
                $('#fname_error').html('<span style="color:red;">Vui lòng điền vào</span>');
                return false;
            } else {
                $('#fname_error').html('');
            }
            if ($('#lname').val() == '') {
                e.preventDefault();
                $(this).focus();
                $('#lname_error').html('<span style="color:red;">Vui lòng điền vào</span>');
                return false;
            } else {
                $('#lname_error').html('');
            }
            if ($('#password').val() == '') {
                e.preventDefault();
                $(this).focus();
                $('#password_error').html('<span style="color:red;">Vui lòng điền vào</span>');
                return false;
            } else {
                $('#password_error').html('');
            }
            if ($('#re-pass').val() == '') {
                e.preventDefault();
                $(this).focus();
                $('#re-pass_error').html('<span style="color:red;">Vui lòng điền vào</span>');
                return false;
            } else {
                $('#re-pass_error').html('');
            }
            if ($('#email').val() == '') {
                e.preventDefault();
                $(this).focus();
                $('#email_error').html('<span style="color:red;">Vui lòng điền vào</span>');
                return false;
            } else {
                $('#email_error').html('');
            }
        })

    })

    function check() {
        var level = document.getElementById('level').val();
        if (level == -1)
            return false;
        else
            return true;
    }
</script>
<?php
$this->load->view('admin/admin/head', $this->data);
?>
<div class="line">
</div>
<div class="wrapper">
    <?php
    if ($this->session->flashdata('message') != '') {
        $this->_data['message'] = $this->session->flashdata('message');
        $this->load->view('admin/admin/messager', $this->_data);
    }
    ?>
    <!-- Form -->
    <div class="widget">
        <div class="title">
            <img src="<?php echo public_url('admin') ?>/images/icons/dark/add.png" class="titleIcon">
            <h6>Thêm mới quản trị viên</h6>
        </div>

        <form class="form" id="form-employ" action="add" method="post" enctype="multipart/form-data"
              onclick="return check();">
            <fieldset>

                <!-- chức vụ -->
                <div class="formRow">
                    <label class="formLeft" for="param_cat">Chức vụ:<span class="req">*</span></label>
                    <div class="formRight">
                        <select name="level" _autocheck="true" id='level' class="left">
                            <option value="-1">&nbsp;Lựa chọn chức vụ &nbsp;</option>

                            <?php
                            foreach ($level as $item) {
                                ?>
                                <option value="<?= $item['MA_CHUCVU']; ?>"><?= $item['TEN_CHUCVU']; ?></option>
                                <?php
                            }
                            //                         print_r($level);
                            ?>
                        </select>
                        <span name="cat_autocheck" class="autocheck"></span>
                        <div name="level_error" class="clear error" id="level_error"></div>
                    </div>
                    <div class="clear"></div>
                </div>

                <!-- ho -->
                <div class="formRow">
                    <label class="formLeft" for="param_fname">Họ:<span class="req">*</span></label>
                    <div class="formRight">
                                <span class="oneTwo"><input name="fname" id="fname" _autocheck="true"
                                                            type="text" value="<?php echo set_value('fname') ?>"></span>
                        <span name="fname_autocheck" class="autocheck"></span>
                        <div name="fname_error" id="fname_error"
                             class="clear error"><?php echo form_error('fname'); ?></div>
                    </div>
                    <div class="clear"></div>
                </div>
                <!-- ten -->
                <div class="formRow">
                    <label class="formLeft" for="param_name">Tên:<span class="req">*</span></label>
                    <div class="formRight">
                                <span class="oneTwo"><input name="lname" id="lname" _autocheck="true"
                                                            type="text" value="<?php echo set_value('lname') ?>"></span>
                        <span name="lname_autocheck" class="autocheck"></span>
                        <div name="lname_error" id="lname_error"
                             class="clear error"><?php echo form_error('lname'); ?></div>
                    </div>
                    <div class="clear"></div>
                </div>
                <!-- mat khau -->
                <div class="formRow">
                    <label class="formLeft" for="param_name">Mật khẩu:<span class="req">*</span></label>
                    <div class="formRight">
                                <span class="oneTwo"><input name="password" id="password" _autocheck="true"
                                                            type="password"
                                                            value="<?php echo set_value('password') ?>"></span>
                        <span name="name_autocheck" class="autocheck"></span>
                        <div name="name_error" id="password_error"
                             class="clear error"><?php echo form_error('password'); ?></div>
                    </div>
                    <div class="clear"></div>
                </div>
                <!-- nhap lai mat khau -->
                <div class="formRow">
                    <label class="formLeft" for="param_name">Nhập lại mật khẩu:<span class="req">*</span></label>
                    <div class="formRight">
                                <span class="oneTwo"><input name="re-pass" id="re-pass" _autocheck="true"
                                                            type="password"
                                                            value="<?php echo set_value('re-pass') ?>"></span>
                        <span name="name_autocheck" class="autocheck"></span>
                        <div name="name_error" id="re-pass_error"
                             class="clear error"><?php echo form_error('re-pass'); ?></div>
                    </div>
                    <div class="clear"></div>
                </div>
                <!-- sdt -->
                <div class="formRow">
                    <label class="formLeft" for="param_name">Số điện thoại:<span class="req">*</span></label>
                    <div class="formRight">
                                <span class="oneTwo"><input name="phone" id="phone" _autocheck="true"
                                                            type="text" value="<?php echo set_value('phone') ?>"
                                                            maxlength="15"></span>
                        <span name="name_autocheck" class="autocheck"></span>
                        <div name="name_error" class="clear error"
                             id="phone_error"><?php echo form_error('phone'); ?></div>
                    </div>
                    <div class="clear"></div>
                </div>
                <!-- email -->
                <div class="formRow">
                    <label class="formLeft" for="param_name">Email:<span class="req">*</span></label>
                    <div class="formRight">
                                <span class="oneTwo"><input name="email" id="email" _autocheck="true"
                                                            type="email"
                                                            value="<?php echo set_value('email') ?>"
                                                            class="check_email"></span>
                        <span name="name_autocheck" class="autocheck" id="mail_autocheck"></span>
                        <div name="name_error" class="clear error"
                             id="email_error"><?php echo form_error('email'); ?></div>
                    </div>
                    <div class="clear"></div>
                </div>
                <!-- diachi -->
                <div class="formRow">
                    <label class="formLeft" for="param_site_title">Địa chỉ:</label>
                    <div class="formRight">
                            <span class="oneTwo"><textarea name="address" id="address" _autocheck="true" rows="4"
                                                           cols=""><?php echo set_value('address') ?> </textarea></span>
                        <span name="address_autocheck" class="autocheck"></span>
                        <div name="address_error" id="address_error" class="clear error"></div>
                    </div>
                    <div class="clear"></div>
                </div>

                <!-- ngay sinh -->
                <div class="formRow">
                    <label class="formLeft" for="param_name">Ngày sinh:</label>
                    <div class="formRight">
                                <span class="oneTwo"><input name="birthday" id="birthday" _autocheck="true"
                                                            type="text"
                                                            value="<?php echo set_value('birthday') ?>"></span>
                        <span name="name_autocheck" class="autocheck"></span>
                        <div name="name_error" class="clear error"><?php echo form_error('birthday'); ?></div>
                    </div>
                    <div class="clear"></div>
                </div>
                <!-- hinh anh -->
                <div class="formRow">
                    <label class="formLeft">Hình ảnh:<span class="req"></span></label>
                    <div class="formRight">
                        <div class="left"><input id="image" name="image" type="file"
                                                 value="<?php echo set_value('avatar') ?>"></div>
                        <div name="image_error" class="clear error"><?php echo form_error('avatar'); ?></div>
                    </div>
                    <div class="clear"></div>
                </div>
                <!-- gioi tinh -->
                <div class="formRow">
                    <label class="formLeft" for="param_name">Giới tính:</label>
                    <div class="formRight">
                                <span class="one-two"><input name="gender" id="param_name" _autocheck="true"
                                                             type="radio" value="0" checked>
                                </span><label>Nam</label>
                        <span class="one-two"><input name="gender" id="param_name" _autocheck="true"
                                                     type="radio" value="1">
                                </span><label>Nữ</label>
                        <span name="name_autocheck" class="autocheck"></span>
                        <div name="name_error" class="clear error"><?php echo form_error('gender'); ?></div>
                    </div>
                    <div class="clear"></div>
                </div>

                <div class="formSubmit">
                    <input value="Thêm mới" class="redB" type="submit">
                    <input value="Hủy bỏ" class="basic" type="reset">
                </div>
                <div class="clear"></div>
            </fieldset>
        </form>
    </div>

</div>

