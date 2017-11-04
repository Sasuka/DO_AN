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
//        if($('#phone').val() <8 ||$('#phone').val() > 15){
//            $('#phone_error').html('Số điện thoại tối thiểu là 8 số và tối đa là 15 số');
//        }

        $('#level').change(function (e) {
            var level = $(this).val();

            if (level == -1) {
                alert('Vui lòng chọn chức vụ');
                return false;
            } else {
                $('#level_error').html('');
            }

        });
        $('#form-employ-update').submit(function (e) {
            if ($('#level').val() == -1) {
                e.preventDefault();
                $('#level_error').html('<span style="color:red;">Vui lòng chọn chức vụ</span>');
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

$tmp['HO'] = (isset($_POST['fname']) ? $_POST['fname'] : $info[0]['HO']);
$tmp['TEN'] = (isset($_POST['lname']) ? $_POST['lname'] : $info[0]['TEN']);
$tmp['SDT'] = (isset($_POST['phone']) ? $_POST['phone'] : $info[0]['SDT']);
$tmp['EMAIL'] = (isset($_POST['email']) ? $_POST['email'] : $info[0]['EMAIL']);
$tmp['DIACHI'] = (isset($_POST['address']) ? $_POST['address'] : $info[0]['DIACHI']);
$tmp['NGAYSINH'] = (isset($_POST['birthday']) ? $_POST['birthday'] : $info[0]['NGAYSINH']);
$tmp['GIOITINH'] = (isset($_POST['gender']) ? $_POST['gender'] : $info[0]['GIOITINH']);
$tmp['GIOITINH'] = (isset($_POST['status']) ? $_POST['status'] : $info[0]['GIOITINH']);
$tmp['TRANGTHAI'] = (isset($_POST['status']) ? $_POST['status'] : $info[0]['TRANGTHAI']);


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

        <form class="form" id="form-employ-update" action="" method="post" enctype="multipart/form-data"
              onclick="return check();">
            <fieldset>

                <!-- chức vụ -->
                <div class="formRow">
                    <input type="hidden" value="<?php echo $info[0]['MA_NHANVIEN']; ?>" name="id">
                    <label class="formLeft" for="param_cat">Chức vụ:<span class="req">*</span></label>
                    <div class="formRight">
                        <select name="level" _autocheck="true" id='level' class="left">
                            <option value="-1"> Lựa chọn chức vụ</option>
                            <?php
                            foreach ($level as $item) {
                                ?>
                                <option value="<?= $item['MA_CHUCVU']; ?>"
                                    <?php if ($info[0]['MA_CHUCVU'] == $item['MA_CHUCVU']) {
                                        ?>
                                        selected
                                        <?php
                                    } ?>>

                                    <?= $item['TEN_CHUCVU']; ?></option>
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
                                <span class="oneTwo"><input name="fname" id="param_fname" _autocheck="true"
                                                            type="text" value="<?php echo $tmp['HO']; ?>">
                                </span>
                        <span name="fname_autocheck" class="autocheck"></span>
                        <div name="fname_error" class="clear error"><?php echo form_error('fname'); ?></div>
                    </div>
                    <div class="clear"></div>
                </div>
                <!-- ten -->
                <div class="formRow">
                    <label class="formLeft" for="param_lname">Tên:<span class="req">*</span></label>
                    <div class="formRight">
                                <span class="oneTwo"><input name="lname" id="param_lname" _autocheck="true"
                                                            type="text" value="<?php echo $tmp['TEN']; ?>"></span>
                        <span name="name_autocheck" class="autocheck"></span>
                        <div name="name_error" class="clear error"><?php echo form_error('lname'); ?></div>
                    </div>
                    <div class="clear"></div>
                </div>
                <!-- mat khau -->
                <div class="formRow">
                    <label class="formLeft" for="param_name">Mật khẩu:<span class="req">*</span></label>
                    <div class="formRight">
                                <span class="oneTwo"><input name="password" id="param_name" _autocheck="true"
                                                            type="password"
                                                            value="<?php echo set_value('password') ?>"></span>
                        <span name="name_autocheck" class="autocheck"></span>
                        <div name="name_error" class="clear error"><?php echo form_error('password'); ?></div>
                        <p> Nếu cập nhật lại mật khẩu thì lấy giá trị</p>
                    </div>
                    <div class="clear"></div>
                </div>
                <!-- nhap lai mat khau -->
                <div class="formRow">
                    <label class="formLeft" for="param_name">Nhập lại mật khẩu:<span class="req">*</span></label>
                    <div class="formRight">
                                <span class="oneTwo"><input name="re-pass" id="param_name" _autocheck="true"
                                                            type="password"
                                                            value="<?php echo set_value('re-pass') ?>"></span>
                        <span name="name_autocheck" class="autocheck"></span>
                        <div name="name_error" class="clear error"><?php echo form_error('re-pass'); ?></div>
                    </div>
                    <div class="clear"></div>
                </div>
                <!-- sdt -->
                <div class="formRow">
                    <label class="formLeft" for="param_name">Số điện thoại:<span class="req">*</span></label>
                    <div class="formRight">
                                <span class="oneTwo"><input name="phone" id="phone" _autocheck="true"
                                                            type="text" value="<?php echo $tmp['SDT']; ?>"
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
                                <span class="oneTwo"><input name="email" id="param_name" _autocheck="true"
                                                            type="email"
                                                            value="<?php echo $tmp['EMAIL']; ?>"></span>
                        <span name="name_autocheck" class="autocheck"></span>
                        <div name="name_error" class="clear error"><?php echo form_error('email'); ?></div>
                    </div>
                    <div class="clear"></div>
                </div>
                <!-- diachi -->
                <div class="formRow">
                    <label class="formLeft" for="param_site_title">Địa chỉ:</label>
                    <div class="formRight">
                            <span class="oneTwo"><textarea name="address" id="address" _autocheck="true" rows="4"
                                                           cols=""><?php echo $tmp['DIACHI']; ?></textarea></span>
                        <span name="address_autocheck" class="autocheck"></span>
                        <div name="address_error" class="clear error"></div>
                    </div>
                    <div class="clear"></div>
                </div>

                <!-- ngay sinh -->
                <div class="formRow">
                    <label class="formLeft" for="param_name">Ngày sinh:<span class="req">*</span></label>
                    <div class="formRight">
                                <span class="oneTwo"><input name="birthday" id="birthday" _autocheck="true"
                                                            type="text"
                                                            value="<?php echo $tmp['NGAYSINH']; ?>"></span>
                        <span name="name_autocheck" class="autocheck"></span>
                        <div name="name_error" class="clear error"><?php echo form_error('birthday'); ?></div>
                    </div>
                    <div class="clear"></div>
                </div>

                <!-- gioi tinh -->
                <div class="formRow">
                    <label class="formLeft" for="param_name">Giới tính:<span class="req">*</span></label>
                    <div class="formRight">
                                <span class="one-two"><input name="gender" id="param_name" _autocheck="true"
                                                             type="radio"
                                                             value="0" <?php echo $tmp['GIOITINH'] == '0' ? 'checked' : ''; ?>>
                                </span><label>Nam</label>

                        <span class="one-two"><input name="gender" id="param_name" _autocheck="true"
                                                     type="radio"
                                                     value="1" <?php echo $tmp['GIOITINH'] == '1' ? 'checked' : ''; ?>>
                                </span><label>Nữ</label>
                        <span name="name_autocheck" class="autocheck"></span>
                        <div name="name_error" class="clear error"><?php echo form_error('gender'); ?></div>
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
                                </span><label>Nghỉ việc</label>
                        <span class="one-two"><input name="status" id="param_status" _autocheck="true"
                                                     type="radio" value="1"
                                <?php echo ($tmp['TRANGTHAI'] ==1 ? 'checked': '');?>
                            >
                                </span><label>Làm việc</label>
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
            </fieldset>
        </form>
    </div>

</div>

