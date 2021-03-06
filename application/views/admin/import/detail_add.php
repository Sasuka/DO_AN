<?php
$this->load->view('admin/import/head', $this->data);
$account = $this->session->userdata('account');
$tmp['fname']= $account['HO'].' '.$account['TEN'];
//pre($list);


?>
<div class="line">
</div>
<div class="wrapper">
    <?php
    if ($this->session->flashdata('message') != '') {
        $this->data['message'] = $this->session->flashdata('message');
        $this->load->view('admin/messager', $this->data);
    }
    ?>
    <!-- Form -->
    <div class="widget">
        <div class="title">
            <img src="<?php echo public_url('admin') ?>/images/icons/dark/add.png" class="titleIcon">
            <h6>Thêm nhập hàng</h6>
        </div>

        <form class="form" id="form-employ" action="add" method="post" enctype="multipart/form-data"
              onclick="return check();">
            <fieldset>
                <!-- nhan vien nhap -->
                <div class="formRow">
                    <label class="formLeft" for="param_fname">Nhân viên lập phiếu :<span class="req">*</span></label>
                    <div class="formRight">
                                <span class="oneTwo"><input name="fname"  id="fname" _autocheck="true"
                                                            type="text" value="<?php echo $tmp['fname']; ?>" readonly></span>
                        <span name="fname_autocheck" class="autocheck"></span>
                        <div name="fname_error" id="fname_error"  class="clear error"><?php echo form_error('fname'); ?></div>
                    </div>
                    <div class="clear"></div>
                </div>
                <!-- Tên nhà cung cấp -->

                <div class="formRow">
                    <label class="formLeft" for="param_cat">Tên nhà cung cấp:<span class="req">*</span></label>
                    <div class="formRight">
                        <select name="nameProviders" _autocheck="true" id='nameProviders' class="left">
                            <option value="-1">&nbsp;Lựa chọn nhà cung cấp &nbsp;</option>

                            <?php

                            for ($i=0;$i<count($list);$i++) {

                                ?>
                                <option value="<?= $list[$i]['MA_NHA_CUNGCAP']; ?>"><?= $list[$i]['TEN_NHA_CUNGCAP']; ?></option>
                                <?php
                            }
                            //                         print_r($level);
                            ?>
                        </select>
                        <span name="nameProviders_autocheck" class="autocheck"></span>
                        <div name="nameProviders_error" class="clear error" id="level_error"></div>
                    </div>
                    <div class="clear"></div>
                </div>
                <!-- row loại -->
                <div class="formRow">
                    <label class="formLeft" for="param_cat">Loại sản phẩm:<span class="req">*</span></label>
                    <div class="formRight">
                        <select name="catelog" id="catelog-import-add" _autocheck="true" class="left"
                                value="<?php echo set_value('catelog'); ?>">
                            <option value="0">Chọn nhà cung cấp trước</option>
                        </select>
                        <span name="catalog_autocheck" class="autocheck"></span>
                        <div name="catalog_error" id="catalog_error"
                             class="clear error"><?php echo form_error('catalog'); ?></div>
                    </div>
                    <div class="clear"></div>
                </div>
                <!-- row loại -->
                <div class="formRow">
                    <label class="formLeft" for="param_cat">Sản phẩm:<span class="req">*</span></label>
                    <div class="formRight">
                        <select name="product" id="product-import-add" _autocheck="true" class="left"
                                value="<?php echo set_value('product'); ?>">
                            <option value="0">Chọn loai truoc</option>
                        </select>
                        <span name="product_autocheck" class="autocheck"></span>
                        <div name="product_error" id="product_error"
                             class="clear error"><?php echo form_error('product'); ?></div>
                    </div>
                    <div class="clear"></div>
                </div>
                <!-- ho -->
                <div class="formRow">
                    <label class="formLeft" for="param_fname">Họ:<span class="req">*</span></label>
                    <div class="formRight">
                                <span class="oneTwo"><input name="fname"  id="fname" _autocheck="true"
                                                            type="text" value="<?php echo set_value('fname') ?>"></span>
                        <span name="fname_autocheck" class="autocheck"></span>
                        <div name="fname_error" id="fname_error"  class="clear error"><?php echo form_error('fname'); ?></div>
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
                        <div name="lname_error" id="lname_error" class="clear error"><?php echo form_error('lname'); ?></div>
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
                        <div name="name_error" id="password_error" class="clear error"><?php echo form_error('password'); ?></div>
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
                        <div name="name_error" id="re-pass_error" class="clear error"><?php echo form_error('re-pass'); ?></div>
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
                        <div name="name_error" class="clear error" id="email_error"><?php echo form_error('email'); ?></div>
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
<script>
    $(document).ready(function () {
        //jquery  group-catelog
        $('#nameProviders').on('change', function () {
            var nameProviders = $(this).val();
            if (nameProviders == '0') {
                alert('Vui lòng chọn nhà cung cấp');
            }
            if (nameProviders) {
                $.ajax({
                    type: 'POST',
                    url: '../catelog/getCateByProviders',
                    data: 'providersId=' +nameProviders,
                    success: function (html) {
                        $('#catelog-import-add').html(html);
                    }
                });
            }
        });
//dua nhom lay loai
        $('#catelog-import-add').on('change', function () {
            var catelog = $(this).val();
            if (catelog) {

                $.ajax({
                    type: 'POST',
                    url: '../product/getListProductOption',
                    data: 'catelogId=' + catelog,
                    success: function (html) {
                        $('#product-import-add').html(html);
                    }
                });
            }
        });
    });
</script>