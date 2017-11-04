<?php
$this->load->view('admin/product/head', $this->data);
$tmp['TEN_SANPHAM'] = (isset($_POST['namepro']) ? $_POST['namepro'] : $product['TEN_SANPHAM']);
$tmp['HINH_DAIDIEN'] = (isset($_POST['image']) ? $_POST['image'] : $product['HINH_DAIDIEN']);
$tmp['DONGIA_BAN'] = (isset($_POST['price']) ? $_POST['price'] : $product['DONGIA_BAN']);
$tmp['BAOHANH'] = (isset($_POST['warranty']) ? $_POST['warranty'] : $product['BAOHANH']);
$tmp['LOAI'] = (isset($_POST['catelog_dis']) ? $_POST['catelog_dis'] : $product['LOAI']);
$tmp['MOTA'] = (isset($_POST['description']) ? $_POST['description'] : $product['MOTA']);
$tmp['MA_XUATXU'] = (isset($_POST['MA_XUATXU']) ? $_POST['MA_XUATXU'] : $product['MA_XUATXU']);
$tmp['TRANGTHAI'] = (isset($_POST['status']) ? $_POST['status'] : $product['TRANGTHAI']);
//pre($product);
?>
<div class="line"></div>
<div class="wrapper">

    <!-- Form -->
    <form class="form" id="form-product-edit" action="" method="post" enctype="multipart/form-data">
        <fieldset>
            <div class="widget">
                <div class="title">
                    <img src="<?php echo public_url('admin/images') ?>/icons/dark/add.png" class="titleIcon">
                    <h6>Cập nhật Sản phẩm</h6>
                </div>


                <div class="tab_container">
                    <div id="tab1" class="tab_content pd0">
                        <!-- TEN SAN PHAM -->
                        <div class="formRow">
                            <label class="formLeft" for="param_name">Tên:<span class="req">*</span></label>
                            <div class="formRight">
                                <span class="oneTwo"><input name="namepro" id="namepro" _autocheck="true"
                                                            type="text"
                                                            value="<?php echo $tmp['TEN_SANPHAM']; ?>" required></span>
                                <span name="namepro_autocheck" class="autocheck"></span>
                                <div name="namepro_error" id="namepro_error"
                                     class="clear error"><?php echo form_error('namepro'); ?></div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <!-- HINH DAI DIEN -->
                        <div class="formRow">
                            <label class="formLeft">Hình ảnh:<span class="req">*</span></label>
                            <div class="formRight">
                                <div class="left">
                                    <input id="image" name="image" type="file">
                                    <img src="<?php echo base_url('uploads/product/' . $product['HINH_DAIDIEN']) ?>"
                                         style="width: 100px;height: 70px;">
                                </div>
                                <div name="image_error" class="clear error"
                                     value="<?php echo set_value('image'); ?>"><?php echo form_error('image'); ?></div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <!-- HINH ANH KEM THEO -->

                        <div class="formRow">
                            <label class="formLeft">Ảnh kèm theo:</label>
                            <div class="formRight">
                                <div class="left">
                                    <input id="image_list" name="image_list[]" multiple="" type="file">
                                    <?php
                                    $list_image = json_decode($product['DS_HINHANH']);
                                    if ($list_image != '') {
                                        foreach ($list_image as $item_image) {
                                            ?>

                                            <img src="<?php echo base_url('uploads/product/' . $product['HINH_DAIDIEN']) ?>"
                                                 style="width: 100px;height: 70px; margin: 5px;">

                                            <?php
                                        }
                                    }
                                    ?>
                                </div>
                                <div name="image_list_error" class="clear error"
                                     value="<?php echo set_value('image_list'); ?>"><?php echo form_error('image_list'); ?></div>
                            </div>
                            <div class="clear"></div>
                        </div>

                        <!-- Price -->
                        <?php

                        if ($tmp['DONGIA_BAN'] > 0) {
                            ?>
                            <div class="formRow">
                                <label class="formLeft" for="param_price">
                                    Giá :
                                    <span class="req">*</span>
                                </label>
                                <div class="formRight">
                                <span class="oneTwo">
                                    <input name="price" style="width:100px" id="param_price" class="format_number"
                                           _autocheck="true" value="<?php echo $tmp['DONGIA_BAN']; ?>"
                                           type="text">
                                    <img class="tipS" title="Giá bán sử dụng để giao dịch" style="margin-bottom:-8px"
                                         src="
    <?php echo public_url('admin') ?>/crown/images/icons/notifications/information.png">
                                </span>
                                    <span name="price_autocheck" class="autocheck"></span>
                                    <div name="price_error" class="clear error"></div>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <?php
                        }
                        ?>

                        <!-- warranty -->
                        <div class="formRow">
                            <label class="formLeft" for="param_warranty">
                                Bảo hành :
                            </label>
                            <div class="formRight">
                                <span class="oneFour"><input name="warranty" id="param_warranty" type="text"
                                                             value="<?php echo $tmp['BAOHANH']; ?>" required></span>
                                <span name="warranty_autocheck" class="autocheck"></span>
                                <div name="warranty_error"
                                     class="clear error"><?php echo form_error('warranty'); ?></div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <!-- PHAN LOẠI -->
                        <div class="formRow">
                            <label class="formLeft" for="param_catelog">Phân loại:<span class="req">*</span></label>
                            <div class="formRight">
                                <span class="oneFour">
                                    <input name="catelog_dis" id="param_catelog_dis" _autocheck="true"
                                           type="text" value="<?php echo $tmp['LOAI']; ?>">
                                </span>
                                <span name="catelog_dis_autocheck" class="autocheck"></span>
                                <div name="catelog_dis_error"
                                     class="clear error"><?php echo form_error('catelog-dis'); ?></div>
                            </div>
                            <div class="clear"></div>
                        </div>

                        <!-- MA XUAT XU -->
                        <div class="formRow">
                            <label class="formLeft" for="param_cat">XUẤT XỨ:<span class="req">*</span></label>
                            <div class="formRight">
                                <select name="idmade" _autocheck="true" id="made-product-edit" class="left"
                                        value="<?php echo set_value('idmade'); ?>">
                                    <option value="0">Chọn xuất xứ</option>
                                    <?php
                                    //  var_dump($madeIn);
                                    foreach ($madeIn as $item) {
                                        ?>
                                        <option value="<?= $item['MA_XUATXU']; ?>"
                                            <?php
                                            echo ($item['MA_XUATXU'] == $tmp['MA_XUATXU']) ? 'selected' : '';
                                            ?>
                                        >
                                            <?= $item['TEN_XUATXU']; ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                                <span name="idmade_autocheck" class="autocheck"></span>
                                <div name="idmade_error" class="clear error"
                                     id="made_error"><?php echo form_error('idmade'); ?></div>
                            </div>
                            <div class="clear"></div>
                        </div>


                        <div class="formRow">
                            <label class="formLeft" for="param_sale">Mô tả:</label>
                            <div class="formRight">
                                <span class="oneTwo"><textarea name="description" id="param_description" rows="4"
                                                               cols="""><?php echo $tmp['MOTA']; ?></textarea></span>
                                <span name="description_autocheck" class="autocheck"></span>
                                <div name="description_error"
                                     class="clear error"><?php echo form_error('description'); ?></div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <!-- TRANG THAI -->
                        <div class="formRow">
                            <label class="formLeft" for="param_name">Trạng thái:<span class="req">*</span></label>
                            <div class="formRight">

                                <label class="radio-inline"><input type="radio" id="param_status" name="status"
                                                                   value="0"
                                        <?php echo $tmp['TRANGTHAI'] == '0' ? 'checked' : ''; ?>
                                    >Hết hàng</label>
                                <label class="radio-inline"><input type="radio" id="param_status" name="status"
                                                                   value="1"
                                        <?php echo $tmp['TRANGTHAI'] == '1' ? 'checked' : ''; ?>

                                    >Còn hàng</label>
                                <span name="status_autocheck" class="autocheck"></span>
                                <div name="status_error" class="clear error">
                                    <?php echo form_error('status'); ?></div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="formRow hide"></div>
                    </div>


                </div><!-- End tab_container-->
<input type="hidden" value="<?php echo $product['MA_LOAI_SANPHAM'] ;?>" name="group">
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

        $('#form-product-edit').submit(function (e) {
            var nampro = $('#namepro').val();
            if (nampro == '') {
                e.preventDefault();
                $('#namepro_error').html('Không được để trống');
                return false;
            }
            var idgroup = $('#group-product-edit').val();

            if (idgroup == 0) {
                e.preventDefault();
                $('#group_error').html('Không được để trống');
                return false;
            }
            var idcatalog = $('#catelog-product-edit').val();

            if (idcatalog == 0) {
                e.preventDefault();
                $('#catalog_error').html('Không được để trống');
                return false;
            }
            var idmade = $('#made-product-edit').val();
            if (idmade == 0) {
                e.preventDefault();
                $('#made_error').html('Không được để trống');
                return false;
            }
        });
        //jquery tab
        var main = $('#form');
        // Tabs
        main.contentTabs();
    });
</script>

