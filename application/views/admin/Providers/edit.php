<?php
$this->load->view('admin/providers/head', $this->data);

$tmp['TEN_NHA_CUNGCAP'] = (isset($_POST['name']) ? $_POST['name'] : $providers['TEN_NHA_CUNGCAP']);
$tmp['SDT'] = (isset($_POST['phone']) ? $_POST['phone'] : $providers['SDT']);
$tmp['EMAIL'] = (isset($_POST['email']) ? $_POST['email'] : $providers['EMAIL']);
$tmp['WEBSITE'] = (isset($_POST['website']) ? $_POST['website'] : $providers['WEBSITE']);
$tmp['DIACHI_NHA_CUNGCAP'] = (isset($_POST['address']) ? $_POST['address'] : $providers['DIACHI_NHA_CUNGCAP']);
$tmp['TRANGTHAI'] = (isset($_POST['status']) ? $_POST['status'] : $providers['TRANGTHAI']);


?>
<div class="line"></div>
<div class="wrapper">

    <!-- Form -->
    <form class="form" id="form" action="" method="post">
        <fieldset>
            <div class="widget">
                <div class="title">
                    <img src="<?php echo public_url('admin/images') ?>/icons/dark/add.png" class="titleIcon">
                    <h6>Chỉnh sửa nhà cung cấp</h6>
                </div>

                <ul class="tabs">
                    <li><a href="#tab1">Chỉnh sửa nhà cung cấp</a></li>


                </ul>

                <div class="tab_container">
                    <div id="tab1" class="tab_content pd0">
                        <!-- TEN NHÀ CUNG CAP -->
                        <div class="formRow">
                            <label class="formLeft" for="name">Tên nhà cung cấp:<span class="req">*</span></label>
                            <div class="formRight">
                                <span class="oneTwo"><input name="name" id="name" _autocheck="true"
                                                            type="text"
                                                            value="<?php echo $tmp['TEN_NHA_CUNGCAP'] ?>"></span>
                                <span name="name_autocheck" id="name_autocheck" class="autocheck"></span>
                                <div name="name_error" id="name_error"
                                     class="clear error"><?php echo form_error('name'); ?></div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <!-- sdt -->
                        <div class="formRow">
                            <label class="formLeft" for="param_name">Số điện thoại:<span class="req">*</span></label>
                            <div class="formRight">
                                <span class="oneTwo"><input name="phone" id="phone" _autocheck="true"
                                                            type="text" value="<?php echo $tmp['SDT'] ?>"
                                                            maxlength="15"></span>
                                <span name="phone_autocheck" id="phone_autocheck" class="autocheck"></span>
                                <div name="phone_error" class="clear error"
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
                                                            value="<?php echo $tmp['EMAIL'] ?>"
                                                            class="check_email"></span>
                                <span name="email_autocheck" class="autocheck" id="email_autocheck"></span>
                                <div name="email_error" class="clear error"
                                     id="email_error"><?php echo form_error('email'); ?></div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <!-- website -->
                        <div class="formRow">
                            <label class="formLeft" for="param_name">Webiste:</label>
                            <div class="formRight">
                                <span class="oneTwo"><input name="website" id="website" _autocheck="true"
                                                            type="text"
                                                            value="<?php echo $tmp['WEBSITE'] ?>"
                                                            class="check_website"></span>
                                <span name="web_autocheck" class="autocheck" id="web_autocheck"></span>
                                <div name="web_error" class="clear error"
                                     id="web_error"><?php echo form_error('website'); ?></div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <!-- diachi -->
                        <div class="formRow">
                            <label class="formLeft" for="param_site_title">Địa chỉ:</label>
                            <div class="formRight">
                            <span class="oneTwo"><textarea name="address" id="address" _autocheck="true" rows="4"
                                                           cols=""><?php echo $tmp['DIACHI_NHA_CUNGCAP'] ?> </textarea></span>
                                <span name="address_autocheck" id="address_autocheck" class="autocheck"></span>
                                <div name="address_error" class="clear error"></div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <!-- TRANG THAI -->
                        <div class="formRow">
                            <label class="formLeft" for="param_name">Trạng thái:<span class="req">*</span></label>
                            <div class="formRight">
                                <span class="one-two"><input name="status" id="param_status" _autocheck="true"
                                                             type="radio" value="0"
                                    <?php echo ($tmp['TRANGTHAI'] ==0 ? 'checked': '');?>
                                    >
                                </span><label>Hết hoạt động</label>
                                <span class="one-two"><input name="status" id="param_status" _autocheck="true"
                                                             type="radio" value="1"
                                        <?php echo ($tmp['TRANGTHAI'] ==1 ? 'checked': '');?>
                                    >
                                </span><label>Hoạt động</label>
                                <span name="status_autocheck" class="autocheck"></span>
                                <div name="status_error" class="clear error">
                                    <?php echo form_error('status'); ?></div>

                            </div>
                </div><!-- End tab_container-->

                <div class="formSubmit">
                    <input value="Cập nhật" class="redB" type="submit">
                    <input value="Hủy bỏ" class="basic" type="reset">
                </div>
                <div class="clear"></div>
            </div>
        </fieldset>
    </form>
</div>
<div class="clear"></div>
<script>
    $(document).ready(function () {
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
        //kiem tra truoc khi submit
        $('#form').submit(function (e) {
            if ($('#name').val() == '') {
                $('#name').focus();
                e.preventDefault();
                $('#name_autocheck').html('<span style="color:blue;">Vui lòng điền nhà cung cấp !</span>');

                return false;
            } else {
                $('#name_autocheck').html('');
            }
            if ($('#phone').val() == '') {
                e.preventDefault();
                $('#phone').focus();
                $('#phone_autocheck').html('<span style="color:blue;">Vui lòng điền số điện thoại</span>');
                return false;
            } else {
                $('#phone_autocheck').html('');

            }
            if ($('#email').val() == '') {
                $('#email').focus();
                e.preventDefault();
                $('#email_autocheck').html('<span style="color:blue;">Vui lòng điền email</span>');
                return false;
            } else {
                $('#email_autocheck').html('');

            }


        })
    });
</script>