<?php
$this->load->view('admin/store/head', $this->data);


?>
<div class="line"></div>
<div class="wrapper">

    <!-- Form -->
    <form class="form" id="form-store-add" action="" method="post">
        <fieldset>
            <div class="widget">
                <div class="title">
                    <img src="<?php echo public_url('admin/images') ?>/icons/dark/add.png" class="titleIcon">
                    <h6>Thêm mới kho</h6>
                </div>


                <div class="tab_container">
                    <div id="tab1" class="tab_content pd0">
                        <!-- TEN SAN PHAM -->
                        <div class="formRow">
                            <label class="formLeft" for="param_name">Tên kho:<span class="req">*</span></label>
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
                        <!-- row group -->
                        <div class="formRow">
                            <label class="formLeft" for="param_cat">Loại sản phẩm:<span class="req">*</span></label>
                            <div class="formRight">
                                <select name="cate" _autocheck="true" id="cate-store-add" class="left"
                                        value="<?php echo set_value('cate'); ?>">
                                    <option value="0">Chọn loại</option>
                                    <?php
                                    foreach ($listCate as $itemGroup) {
                                        ?>
                                        <option value="<?= $itemGroup['MA_LOAI_SANPHAM']; ?>"><?= $itemGroup['TEN_LOAI_SANPHAM']; ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                                <span name="cate_autocheck" class="autocheck"></span>
                                <div name="cate_error" id="cate_error"
                                     class="clear error"><?php echo form_error('cate'); ?></div>
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
    $(document).ready(function () {
        //jquery  group-catelog
        $('#cate-store-add').on('change', function () {
            var cate = $(this).val();
            if (cate == '0') {
                alert('Vui lòng chọn loai sản phẩm');
            }

            if (cate) {
                $.ajax({
                    type: 'POST',
                    url: 'checkCateInStore',
                    data: 'cateId=' + cate,
                    success: function (html) {
                        if (html == '1') {
                            alert('Đã trong kho');
                            $('#cate-store-add').val(0);
                        } else {
                            $('#name').focus();
                        }
                    }
                });
            }
        });

        $('#form-store-add').submit(function (e) {
            var cate = $('#cate-store-add').val();
            if (cate == '0') {
                e.preventDefault();
               $('#cate_error').html('Vui lòng chọn');
               return false;
            }else{
                $('#cate_error').html('');

            }
            var name = $('#name').val();
            if (name == '') {
                e.preventDefault();
                $('#name_error').html('Vui lòng chọn');
                return false;
            }

        });


    });
</script>