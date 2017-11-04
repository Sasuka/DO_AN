<?php
$this->load->view('admin/import_detail/head', $this->data);
$account = $this->session->userdata('account');
$tmp['fname'] = $account['HO'] . ' ' . $account['TEN'];
//pre($id);


?>
<div class="line">
</div>
<div class="wrapper">
    <?php
    if ($this->session->flashdata('message') != '') {
        $this->data['message'] = $this->session->flashdata('message');
        $this->load->view('admin/messager', $this->data);
    }
    //    pre($providers);
    ?>
    <!-- Form -->
    <div class="widget">
        <div class="title">
            <img src="<?php echo public_url('admin') ?>/images/icons/dark/add.png" class="titleIcon">
            <h6>Thêm nhập hàng</h6>
        </div>

        <form class="form" id="form-import_detail" action="" method="post">
            <fieldset>
                <!-- nhan vien nhap -->
                <div class="formRow">
                    <input type="hidden" name="inputId" id="inputId" value="<?php echo $id;?>">
                    <label class="formLeft" for="param_fname">Nhân viên lập phiếu :<span class="req">*</span></label>
                    <div class="formRight">
                                <span class="oneTwo">
                                    <input type="hidden" name="employeeId"
                                           value="<?php echo $account['MA_NHANVIEN']; ?>">
                                    <input name="fname" id="fname" _autocheck="true"
                                           type="text" value="<?php echo $tmp['fname']; ?>"
                                           readonly></span>
                        <span name="fname_autocheck" class="autocheck"></span>
                        <div name="fname_error" id="fname_error"
                             class="clear error"><?php echo form_error('fname'); ?></div>
                    </div>
                    <div class="clear"></div>
                </div>

                <!-- Tên nhà cung cấp -->
                <div class="formRow">
                    <label class="formLeft" for="param_fname">Tên nhà cung cấp :<span class="req">*</span></label>
                    <div class="formRight">
                                <span class="oneTwo">
                                    <input type="hidden" name="providersId"
                                           value="<?php echo $providers['MA_NHA_CUNGCAP']; ?>">
                                    <input name="providers" id="providers" _autocheck="true"
                                           type="text"
                                           value="<?php echo $providers['TEN_NHA_CUNGCAP']; ?>"
                                           readonly></span>
                        <span name="providers_autocheck" class="autocheck"></span>
                        <div name="providers_error" id="providers_error"
                             class="clear error"><?php echo form_error('fname'); ?></div>
                    </div>
                    <div class="clear"></div>
                </div>
                <!-- row loại -->
                <div class="formRow">
                    <label class="formLeft" for="param_cat">Loại sản phẩm:<span class="req">*</span></label>
                    <div class="formRight">
                        <select name="catelog" id="catelog-import-add" _autocheck="true" class="left"
                                value="<?php echo set_value('catelog'); ?>">
                            <option value="0">Loại sản phẩm</option>
                            <?php

                            if (empty($cate)) {
                                ?>
                                <script>
                                    alert("Nhà cung cấp loại không có trong kho");
                                </script>;
                            <?php
                            // redirect(admin_url('import'));
                            }else{
                            foreach ($cate as $itemcate){
                            ?>
                                <option value="<?php echo $itemcate['MA_LOAI_SANPHAM']; ?>"><?php echo $itemcate['TEN_LOAI_SANPHAM']; ?></option>
                                <?php
                            }
                            }
                            ?>
                        </select>
                        <span name="catalog_autocheck" class="autocheck"></span>
                        <div name="catalog_error" id="catelog_error"
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
                <!-- so luong -->
                <div class="formRow">
                    <label class="formLeft" for="param_name">Số lượng:<span class="req">*</span></label>
                    <div class="formRight">
                                <span class="oneTwo"><input name="amount" id="amount" _autocheck="true"
                                                            type="text" value=""></span>
                        <span name="amount_autocheck" class="autocheck"></span>
                        <div name="amount_error" id="amount_error"
                             class="clear error"><?php echo form_error('amount'); ?></div>
                    </div>
                    <div class="clear"></div>
                </div>
                <!-- don gia nhap -->
                <div class="formRow">
                    <label class="formLeft" for="param_name">Đơn giá nhập:<span class="req">*</span></label>
                    <div class="formRight">
                                <span class="oneTwo"><input name="price" id="price" _autocheck="true"
                                                            type="text" value=""></span>
                        <span name="price_autocheck" class="autocheck"></span>
                        <div name="price_error" id="price_error"
                             class="clear error"><?php echo form_error('price'); ?></div>
                    </div>
                    <div class="clear"></div>
                </div>
                <!-- chenh lenh -->
                <div class="formRow">
                    <label class="formLeft" for="param_name">Phần trăm chênh lệch<span class="req">*</span></label>
                    <div class="formRight">
                                <span class="oneTwo"><input name="per_price" id="per_price" _autocheck="true"
                                                            type="text"
                                                            value="<?php echo set_value('per_price') ?>"></span>
                        <span name="per_price_autocheck" class="autocheck"></span>
                        <div name="per_price_error" id="per_price_error"
                             class="clear error"><?php echo form_error('per_price'); ?></div>
                    </div>
                    <div class="clear"></div>
                </div>
                <!-- thanh tien -->
                <!-- nhan vien nhap -->
                <div class="formRow">
                    <label class="formLeft" for="param_total_cost">Thành tiền :</label>
                    <div class="formRight">
                                <span class="oneTwo"><input name="total_cost" id="total_cost" _autocheck="true"
                                                            type="text" value=""
                                                            readonly></span>
                        <span name="total_cost_autocheck" class="autocheck"></span>
                        <div name="total_cost_error" id="total_cost_error"
                             class="clear error"><?php echo form_error('total_cost'); ?></div>
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
        $('#amount').val('');
        $('#per_price').keyup(function (e) {
            per_price = $(this).val();
            if (isNaN(per_price) == true) {
                e.preventDefault();
                $('#per_price_error').html('<span style="color: #0000FF;">Phải là số</span>');
                $(this).val('');

                return false;
            } else if (per_price > 100) {
                $(this).val('');
                e.preventDefault();
                $('#per_price_error').html('Số phải nhỏ hơn 100');
                return false;
            } else {
                $('#per_price_error').html('');

            }

        });

        $('#catelog-import-add').on('change', function () {
            var catelog = $(this).val();
            if (catelog) {

                $.ajax({
                    type: 'POST',
                    url: '../../product/getListProductOption',
                    data: 'catelogId=' + catelog,
                    success: function (html) {
                        $('#product-import-add').html(html);
                    }
                });
            }
        });

        //kiem tra loai do co trong phieu nhap do hay chua
        $('#product-import-add').on('change', function () {
            var product = $(this).val();
            var inputId = $('#inputId').val();
            data = {'productId': product, 'inputId': inputId};

            if (product) {
                $.ajax({
                    type: 'POST',
                    url: '../checkProduct',
                    data: {'data': JSON.stringify(data)},
                    success: function (html) {
                        if(html !=''){
                            alert(html);
                            $('#product-import-add').val(0);
                        }
                    }
                });
            }
        });

        $('#price').keyup(function (e) {
            caculator(e);
        });
        $('#amount').keyup(function (e) {
            caculator(e);
        });
        $('#form-import_detail').submit(function (e) {

            if ($('#catelog-import-add').val() == '0') {
                //  alert($(this).val());
                e.preventDefault();
                $(this).focus();
                $('#catelog_error').html('<span style="color:red;">Vui lòng chọn chức vụ</span>');
                return false;
            } else {
                $('#catelog_error').html('');
                $('#catelog-import-add').attr('selected');
            }
            if ($('#product-import-add').val() == '0') {
                e.preventDefault();
                $(this).focus();
                $('#product_error').html('<span style="color:red;">Vui lòng chọn</span>');
                return false;
            } else {
                $('#product_error').html('');
                $('#product-import-add').attr('selected');
            }
            if ($('#amount').val() == '') {
                e.preventDefault();
                $(this).focus();
                $('#amount_error').html('<span style="color:red;">Vui lòng điền</span>');
                return false;
            } else {
                $('#amount_error').html('');
            }
            if ($('#price').val() == '') {
                e.preventDefault();
                $(this).focus();
                $('#price_error').html('<span style="color:red;">Vui lòng điền</span>');
                return false;
            } else {
                $('#price_error').html('');
            }
            if ($('#per_price').val() == '') {
                e.preventDefault();
                $(this).focus();
                $('#per_price_error').html('<span style="color:red;">Vui lòng điền</span>');
                return false;
            } else {
                $('#per_price_error').html('');
            }

        })

    });

    function caculator(e) {
        price = $('#price').val();
        amount = $('#amount').val();

        if (Number(price) == 'NaN') {
            e.preventDefault();
            $('#price_error').html('Nó là số');
            $('#price').val('');
            $('#price').focus();
            cost = '0';
            return false;
        } else {
            $('#price_error').html('');
        }
        if (Number(amount) == 'NaN') {
            e.preventDefault();
            $('#amount').val('');
            $('#amount_error').html('Nó là số');
            $('#amount').focus();
            cost = '0';
            return false;
        } else {
            $('#amount_error').html('');
        }
        cost = Number(price) * Number(amount);
        $('#total_cost').val(cost);

    }

</script>