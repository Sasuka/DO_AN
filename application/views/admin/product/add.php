<?php
$this->load->view('admin/product/head', $this->data);


?>
<div class="line"></div>
<div class="wrapper">

    <!-- Form -->
    <form class="form" id="form-product-add" action="" method="post" enctype="multipart/form-data">
        <fieldset>
            <div class="widget">
                <div class="title">
                    <img src="<?php echo public_url('admin/images') ?>/icons/dark/add.png" class="titleIcon">
                    <h6>Thêm mới Sản phẩm</h6>
                </div>



                <div class="tab_container">
                    <div id="tab1" class="tab_content pd0">
                        <!-- TEN SAN PHAM -->
                        <div class="formRow">
                            <label class="formLeft" for="param_name">Tên:<span class="req">*</span></label>
                            <div class="formRight">
                                <span class="oneTwo"><input name="namepro" id="namepro" _autocheck="true"
                                                            type="text"
                                                            value="<?php echo set_value('namepro'); ?>"></span>
                                <span name="namepro_autocheck" class="autocheck"></span>
                                <div name="namepro_error"  id="namepro_error" class="clear error"><?php echo form_error('namepro'); ?></div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <!-- HINH DAI DIEN -->
                        <div class="formRow">
                            <label class="formLeft">Hình ảnh:<span class="req">*</span></label>
                            <div class="formRight">
                                <div class="left"><input id="image" name="image" type="file"></div>
                                <div name="image_error" class="clear error" id="image_error"
                                     value="<?php echo set_value('image'); ?>"><?php echo form_error('image'); ?></div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <!-- HINH ANH KEM THEO -->
                        <div class="formRow">
                            <label class="formLeft">Ảnh kèm theo:</label>
                            <div class="formRight">
                                <div class="left"><input id="image_list" name="image_list[]" multiple="" type="file">
                                </div>
                                <div name="image_list_error" class="clear error"
                                     value="<?php echo set_value('image_list'); ?>"><?php echo form_error('image_list'); ?></div>
                            </div>
                            <div class="clear"></div>
                        </div>

                        <!-- Price -->
                        <!--                        <div class="formRow">-->
                        <!--                            <label class="formLeft" for="param_price">-->
                        <!--                                Giá :-->
                        <!--                                <span class="req">*</span>-->
                        <!--                            </label>-->
                        <!--                            <div class="formRight">-->
                        <!--                                <span class="oneTwo">-->
                        <!--                                    <input name="price" style="width:100px" id="param_price" class="format_number" _autocheck="true"-->
                        <!--                                           type="text">-->
                        <!--                                    <img class="tipS" title="Giá bán sử dụng để giao dịch" style="margin-bottom:-8px"-->
                        <!--                                         src="-->
                        <?php //echo public_url('admin') ?><!--/crown/images/icons/notifications/information.png">-->
                        <!--                                </span>-->
                        <!--                                <span name="price_autocheck" class="autocheck"></span>-->
                        <!--                                <div name="price_error" class="clear error"></div>-->
                        <!--                            </div>-->
                        <!--                            <div class="clear"></div>-->
                        <!--                        </div>-->

                        <!-- warranty -->
                        <div class="formRow">
                            <label class="formLeft" for="param_warranty">
                                Bảo hành :<span class="req">*</span>
                            </label>
                            <div class="formRight">
                                <span class="oneFour"><input name="warranty" id="warranty" type="text"
                                                             value="<?php echo set_value('warranty'); ?>"></span>
                                <span name="warranty_autocheck" class="autocheck"></span>
                                <div name="warranty_error"  id="warranty_error"
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
                                           type="text" value="<?php echo set_value('catelog-dis'); ?>">
                                </span>
                                <span name="catelog_dis_autocheck" class="autocheck"></span>
                                <div name="catelog_dis_error"
                                     class="clear error"><?php echo form_error('catelog-dis'); ?></div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <!-- row group -->
                        <div class="formRow">
                            <label class="formLeft" for="param_cat">Thể loại:<span class="req">*</span></label>
                            <div class="formRight">
                                <select name="group" _autocheck="true" id="group-product-add" class="left"
                                        value="<?php echo set_value('group'); ?>">
                                    <option value="0">Chọn nhóm</option>
                                    <?php
                                    foreach ($listGroup as $itemGroup) {
                                        ?>
                                        <option value="<?= $itemGroup['MA_NHOM_SANPHAM']; ?>"><?= $itemGroup['TEN_NHOM_SANPHAM']; ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                                <span name="group_autocheck" class="autocheck"></span>
                                <div name="group_error" id="group_error"
                                     class="clear error"><?php echo form_error('group'); ?></div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <!-- row loại -->
                        <div class="formRow">
                            <label class="formLeft" for="param_cat">Loại sản phẩm:<span class="req">*</span></label>
                            <div class="formRight">
                                <select name="catelog" id="catelog-product-add" _autocheck="true" class="left"
                                        value="<?php echo set_value('catelog'); ?>">
                                    <option value="0">Chọn nhóm trước</option>
                                </select>
                                <span name="catalog_autocheck" class="autocheck"></span>
                                <div name="catalog_error" id="catalog_error"
                                     class="clear error"><?php echo form_error('catalog'); ?></div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <!-- MA XUAT XU -->
                        <div class="formRow">
                            <label class="formLeft" for="param_cat">XUẤT XỨ:<span class="req">*</span></label>
                            <div class="formRight">
                                <select name="idmade" _autocheck="true" id="made-product-add" class="left"
                                        value="<?php echo set_value('idmade'); ?>">
                                    <option value="0">Chọn xuất xứ</option>
                                    <?php
                                    //  var_dump($madeIn);
                                    foreach ($madeIn as $item) {
                                        ?>
                                        <option value="<?= $item['MA_XUATXU']; ?>"><?= $item['TEN_XUATXU']; ?></option>
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
                                                               cols="""><?php echo set_value('description'); ?></textarea></span>
                                <span name="description_autocheck" class="autocheck"></span>
                                <div name="description_error"
                                     class="clear error"><?php echo form_error('description'); ?></div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <!-- TRANG THAI -->
                        <!--                        <div class="formRow">-->
                        <!--                            <label class="formLeft" for="param_name">Trạng thái:<span class="req">*</span></label>-->
                        <!--                            <div class="formRight">-->
                        <!--                                <span class="one-two"><input name="status" id="param_status" _autocheck="true"-->
                        <!--                                                             type="radio" value="0" checked>-->
                        <!--                                </span><label>Hết hàng</label>-->
                        <!--                                <span class="one-two"><input name="status" id="param_status" _autocheck="true"-->
                        <!--                                                             type="radio" value="1">-->
                        <!--                                </span><label>Còn hàng</label>-->
                        <!--                                <span name="status_autocheck" class="autocheck"></span>-->
                        <!--                                <div name="status_error" class="clear error">-->
                        <?php //echo form_error('status'); ?><!--</div>-->
                        <!--                            </div>-->
                        <!--                            <div class="clear"></div>-->
                        <!--                        </div>-->
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
    $(document).ready(function () {
        //jquery  group-catelog
        $('#group-product-add').on('change', function () {
            var group = $(this).val();
            if (group == '0') {
                alert('Vui lòng chọn nhóm sản phẩm');
            }
            if (group) {
                $.ajax({
                    type: 'POST',
                    url: '../catelog/getListCateLogByGroup',
                    data: 'groupId=' + group,
                    success: function (html) {
                        $('#catelog-product-add').html(html);
                    }
                });
            }
        });

        $('#catelog-product-add').on('change', function () {
            var catelog = $(this).val();
            if (catelog) {
                $('#filter_id').val("");
                $('#loading').html("<img src='<?php echo public_url()?>images/loader.gif'/>").fadeIn('fast');
                $.ajax({
                    type: 'POST',
                    url: 'getListProductByCate',
                    data: 'catelogId=' + catelog,
                    success: function (html) {
                        $('#loading').fadeOut('fast');
                        $('.list_item').html(html);
                    }
                });
            }
        });
        $('#form-product-add').submit(function (e) {
            //xet ten
            var nampro = $('#namepro').val();
            //xet nhom
            var idgroup = $('#group-product-add').val();
            //xet upload hinh
            var image = $('#image').val();
            //xet loai
            var idcatalog = $('#catelog-product-add').val();
            //xet made - in
            var made = $('#made-product-add').val();
           // alert(idmade);
            //xet bao hanh
            var warranty = $('#warranty').val();
            if (nampro == '') {
                e.preventDefault();
                $('#namepro_error').html('Không được để trống');
                return false;
            }else{
                $('#namepro_error').html('');


            }

            if (idgroup == 0) {
                e.preventDefault();
                $('#group_error').html('Không được để trống');

            }else{
                $('#group_error').html('');


            }

            if (idcatalog == 0) {
                e.preventDefault();
                $('#catalog_error').html('Không được để trống');
                return false;
            }else{
                $('#catalog_error').html('');


            }

            if (made == 0) {
                e.preventDefault();
                $('#made_error').html('Không được để trống');
                return false;
            }else{
                $('#made_error').html('');
            }

            if (warranty == '') {
                e.preventDefault();
                $('#warranty_error').html('Không được để trống');
                return false;
            }else{
                $('#warranty_error').html('');


            }

            if (image == '') {
                e.preventDefault();
                $('#image_error').html('Không được để trống');
                return false;
            }else{
                $('#image_error').html('');
            }

        });
        //jquery tab
        var main = $('#form');
        // Tabs
        main.contentTabs();
    });
</script>

