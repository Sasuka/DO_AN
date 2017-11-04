<?php
$this->load->view('admin/providers/head', $this->data);
?>
<div class="line"></div>
<div class="wrapper">
    
    <!-- Form -->
    <form class="form" id="form" action="" method="post">
        <fieldset>
            <div class="widget">
                <div class="title">
                    <img src="<?php echo public_url('admin/images') ?>/icons/dark/add.png" class="titleIcon">
                    <h6>Thêm mới nhà cung cấp</h6>
                </div>

                <ul class="tabs">
                    <li><a href="#tab1">Thêm nhà cung cấp</a></li>
                    <li><a href="#tab2">Loại sản phẩm nhà cung cấp</a></li>

                </ul>

                <div class="tab_container">
                    <div id="tab1" class="tab_content pd0">
                        <!-- TEN NHÀ CUNG CAP -->
                        <div class="formRow">
                            <label class="formLeft" for="name">Tên nhà cung cấp:<span class="req">*</span></label>
                            <div class="formRight">
                                <span class="oneTwo"><input name="name" id="name" _autocheck="true"
                                                            type="text"
                                                            value="<?php echo set_value('name'); ?>"></span>
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
                                                            type="text" value="<?php echo set_value('phone') ?>"
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
                                                            value="<?php echo set_value('email') ?>"
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
                                                            type="email"
                                                            value="<?php echo set_value('website') ?>"
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
                                                           cols=""><?php echo set_value('address') ?> </textarea></span>
                                <span name="address_autocheck" id="address_autocheck" class="autocheck"></span>
                                <div name="address_error" class="clear error"></div>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>

                    <div id="tab2" class="tab_content pd0">
                        <!--                        nhom san pham-->
                        <table class="sTable mTable myTable" id="checkAll" width="100%" cellspacing="0" cellpadding="0">

                            <thead class="filter">
                            <tr>
                                <td colspan="6">
                                    <form class="list_filter form" action="" method="get">
                                        <table width="100%" cellspacing="0" cellpadding="0">
                                            <tbody>

                                            <tr>

                                                <td class="label" style="width:60px;"><label
                                                            for="filter_status">Nhóm:</label></td>
                                                <td class="item">
                                                    <select name="group" id="group-product">
                                                        <option value="0">Chọn nhóm</option>
                                                        <?php

                                                        foreach ($listGroup as $item){
                                                            ?>
                                                            <option value="<?php echo $item['MA_NHOM_SANPHAM'];?>"><?php echo $item['TEN_NHOM_SANPHAM'];?></option>

                                                            <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </form>
                                </td>
                            </tr>
                            </thead>

                            <thead>
                            <tr>
                                <td style="width:21px;"><img
                                            src="http://localhost/www/DO_AN/public/admin/images/icons/tableArrows.png">
                                </td>
                                <td style="width:60px;">Mã số</td>
                                <td>Tên</td>
                            </tr>
                            </thead>

                            <tfoot class="auto_check_pages">
                            <tr>
                                <td colspan="6">
                                    <div class="list_action itemActions">
                                        <a href="#submit" id="submit" class="button blueB"
                                           url="http://localhost/www/DO_AN/admin/product/dell_all">
                                            <span style="color:white;">Xóa hết</span>
                                        </a>
                                    </div>

                                    <div class="pagination">
                                        <strong>1</strong><a href="http://localhost/www/DO_AN/admin/product/index/10"
                                                             data-ci-pagination-page="2">2</a><a
                                                href="http://localhost/www/DO_AN/admin/product/index/10"
                                                data-ci-pagination-page="2" rel="next">Trang kế tiếp</a></div>
                                </td>
                            </tr>
                            </tfoot>

                            <tbody class="list_item">
                            <tr class="row_1">
                                <td>
                                    <div class="checker" id="uniform-undefined"><span><input name="id[]" value="1"
                                                                                             style="opacity: 0;"
                                                                                             type="checkbox"></span>
                                    </div>
                                </td>

                                <td class="textC">1</td>

                                <td>
                                    <div class="image_thumb">
                                        <img src="http://localhost/www/DO_AN/uploads/product/toyota/kira_thumb2.png"
                                             height="50">
                                        <div class="clear"></div>
                                    </div>

                                    <a href="product/view/9.html" class="tipS" target="_blank" original-title="">
                                        <b>Đèn pha</b>
                                    </a>

                                    <div class="f11">
                                        Loại: 1 | Kinh doanh:<span style="color:red;"> <span style="color:forestgreen;">Còn</span></span>
                                    </div>

                                </td>
                            </tr>
                            </tbody>
                        </table>
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