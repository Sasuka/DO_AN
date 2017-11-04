<?php
$this->load->view('admin/promotions_detail/head', $this->data);
$account = $this->session->userdata('account');
$tmp['fname'] = $account['HO'] . ' ' . $account['TEN'];


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
            <h6>Thêm chi tiết khuyến mãi</h6>
        </div>

        <form class="form" id="form-promotion_detail" action="" method="post">
            <fieldset>
                <!-- nhan vien nhap -->
                <div class="formRow">
                    <input type="hidden" name="inputId" id="inputId" value="<?php echo $id; ?>">
                    <label class="formLeft" for="param_fname">Tên khuyến mãi:<span class="req">*</span></label>
                    <div class="formRight">
                                <span class="oneTwo">
                                    <input type="hidden" name="promotionId"
                                           value="<?php echo $info['MA_KHUYENMAI']; ?>">
                                    <input name="namePromotion" id="namePromotion" _autocheck="true"
                                           type="text" value="<?php echo $info['TEN_KHUYENMAI']; ?>"
                                           readonly></span>
                        <span name="namePromotion_autocheck" class="autocheck"></span>
                        <div name="namePromotion_error" id="namePromotion_error"
                             class="clear error"><?php echo form_error('namePromotion'); ?></div>
                    </div>
                    <div class="clear"></div>
                </div>

                <!-- row loại -->
                <div class="formRow">
                    <label class="formLeft" for="param_cat">Sản phẩm:<span class="req">*</span></label>
                    <div class="formRight">
                        <select name="product" id="product-promotions-add" _autocheck="true" class="left"
                                value="<?php echo set_value('catelog'); ?>">
                            <option value="0">Chọn sản phẩm</option>
                            <?php
                            for ($i = 0; $i < count($product); $i++) {
                                ?>
                                <option value="<?php echo $product[$i]['MA_SANPHAM']; ?>"><?php echo $product[$i]['TEN_SANPHAM']; ?></option>
                                <?php
                            }
                            ?>

                        </select>
                        <span name="product_autocheck" class="autocheck"></span>
                        <div name="product_error" id="product_error"
                             class="clear error"><?php echo form_error('product'); ?></div>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="formRow">
                    <label class="formLeft" for="param_price">Đơn giá bán hiện tại:</label>
                    <div class="formRight">
                                <span class="oneTwo">
                                    <input name="price" id="price" _autocheck="true"
                                           type="text" value="" readonly></span>
                        <span name="price_autocheck" class="autocheck"></span>
                        <div name="price_error" id="price_error"
                             class="clear error"><?php echo form_error('price'); ?></div>
                    </div>
                    <div class="clear"></div>
                </div>
                <!-- chenh lenh -->
                <div class="formRow">
                    <label class="formLeft" for="param_name">Phần trăm chiết khấu<span class="req">*</span></label>
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

                <!-- Tang pham -->
                <div class="formRow">
                    <label class="formLeft" for="param_gift">Tặng phẩm :</label>
                    <div class="formRight">
                                <span class="oneTwo"><input name="gift" id="gift" _autocheck="true"
                                                            type="text" value=""></span>
                        <span name="gift_autocheck" class="autocheck"></span>
                        <div name="gift_error" id="gift_error"
                             class="clear error"><?php echo form_error('gift'); ?></div>
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

        //kiem tra loai do co trong phieu nhap do hay chua
        $('#product-promotions-add').on('change', function () {
            var product = $(this).val();
            var inputId = $('#inputId').val();
            data = {'productId': product, 'inputId': inputId};
            //  alert(JSON.stringify(data));
            if (product) {
                $.ajax({
                    type: 'POST',
                    url: '../checkExistPromotion',
                    data: {'data': JSON.stringify(data)},
                    success: function (html) {
                        if (html == '1') {
                            alert('Sản phẩm này đã có trong chương trình khuyến mãi rồi...!');

                            $('#product-promotions-add').val(0);
                        } else {
                            $('#price').val(html);
                        }
                    }
                });
            }
        });

        $('#per_price').keyup(function (e) {
            caculator(e);
        });

        $('#form-promotion_detail').submit(function (e) {


            if ($('#product-promotions-add').val() == '0') {
                e.preventDefault();
                $(this).focus();
                $('#product_error').html('<span style="color:red;">Vui lòng chọn</span>');
                return false;
            } else {
                $('#product_error').html('');
                $('#product-promotions-add').attr('selected');
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
//        alert(price);
//        return false;
        percen = $('#per_price').val();
        if(percen ==''){
            $('#price').val(price);
        }
        if (price == '') {
            e.preventDefault();
            $(this).focus();
            $('#product_error').html('<span style="color:red;">Vui lòng chọn</span>');
            return false;
        } else {
            price1 = (1 - 0.01 * Number(percen)) * Number(price);
            $('#price').val(price1);
        }

    }

</script>