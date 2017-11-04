<?php
$this->load->view('admin/catelog/head', $this->data);
?>
<div class="line">
</div>
<div class="wrapper">
    <?php
    if ($this->session->flashdata('message') != '') {
        $this->_data['message'] = $this->session->flashdata('message');
        $this->load->view('admin/messager', $this->_data);
    }
    ?>
    <!-- Form -->
    <div class="widget">
        <div class="title">
            <img src="<?php echo public_url('admin') ?>/images/icons/dark/add.png" class="titleIcon">
            <h6>Thêm mới nhóm sản phẩm</h6>
        </div>

        <form class="form" id="form-catelog" action="" method="post" enctype="multipart/form-data"
              onclick="return check();">
            <fieldset>
                <!-- ten loai san pham -->
                <div class="formRow">
                    <label class="formLeft" for="param_catelogName">Tên loại sản phẩm:<span class="req">*</span></label>
                    <div class="formRight">
                                <span class="oneTwo"><input name="catelogName" id="param_catelogName" _autocheck="true"
                                                            type="text" value="<?php echo set_value('catelogName') ?>"></span>
                        <span name="catelogName_autocheck" class="autocheck"></span>
                        <div name="catelogName_error" class="clear error"
                             id="catelogName_error"><?php echo form_error('catelogName'); ?></div>
                    </div>
                    <div class="clear"></div>
                </div>
                <!-- nhom san pham -->
                <div class="formRow">
                    <label class="formLeft" for="param_groupID">Nhóm sản phẩm<span class="req">*</span></label>
                    <div class="formRight">
                                <span class="oneTwo">
                                    <select _autocheck="true" id="groupID" name="groupID">
                                        <option value="0">Chọn nhóm sản phẩm</option>
                                        <?php foreach ($listGroup as $itemGroup) { ?>
                                            <option value="<?= $itemGroup['MA_NHOM_SANPHAM']; ?>"><?= $itemGroup['TEN_NHOM_SANPHAM']; ?></option>
                                        <?php } ?>
                                    </select>
                                </span>
                        <span name="groupID_autocheck" class="autocheck"></span>
                        <div name="groupID_error" class="clear error"
                             id="groupID_error"><?php echo form_error('groupID'); ?></div>
                    </div>
                    <div class="clear"></div>
                </div>
                <!-- nhom san pham -->
                <div class="formRow">
                    <label class="formLeft" for="providersID">Nhà cung cấp <span class="req">*</span></label>
                    <div class="formRight">
                                <span class="oneTwo">
                                    <select _autocheck="true" id="providersID" name="providersID">
                                        <option value="0">Chọn nhà cung cấp</option>
                                        <?php foreach ($list as $item) { ?>
                                            <option value="<?= $item['MA_NHA_CUNGCAP']; ?>"><?= $item['TEN_NHA_CUNGCAP']; ?></option>
                                        <?php } ?>
                                    </select>
                                </span>
                        <span name="providersID_autocheck" class="autocheck"></span>
                        <div name="providersID_error" class="clear error"
                             id="providersID_error"><?php echo form_error('providersID'); ?></div>
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
        $('#groupID').change(function (e) {

            groupID = $(this).val();

            catelogName = $('#param_catelogName').val();

            providersID = $('#providersID').val();

            data = {'groupID': groupID, 'catelogName': catelogName};


            if (groupID == 0) {
                alert('Vui lòng chọn nhóm sản phẩm');
                $('#catelogName_error').html('');

            } else if (catelogName == '') {
                e.preventDefault();
                $('#catelogName_error').html('Vui lòng điền loại sản phẩm');
                $(this).val(0);
                return false;
            } else {
                //chi con 2 truong ton tai hoac khong
                //tiep tuc goi ajax kiem tra co ton tai loai trong nhom chua
                $.ajax({
                    url: 'checkCatelogByGroup',
                    type: 'GET',
                    data: {'data': JSON.stringify(data)},
//                    data: 'sendName='+catelogName+'&groupId='+groupID,
                    async: true
                }).done(function (result) {
                    if (result == '1') {
                        $('#groupID_error').html('');
//                        $('#form-catelog').attr('onsubmit', 'return false;');
                        $('#catelogName_error').html('Loại sản phẩm này đã tồn tại');
                        e.preventDefault();
                        return false;

                    } else {
                        $('#form-catelog').attr('onsubmit', 'return true;');
                        $('#catelogName_error').html('');
                        $('#groupID_error').html('');

                    }
                });
            }
        });
        $('#form-catelog').submit(function (e) {
            groupID = $('#groupID').val();

            catelogName = $('#param_catelogName').val();

            providersID = $('#providersID').val();

            data1 = {'groupID': groupID, 'catelogName': catelogName,'providersID':providersID};

            $('#catelogName_error').html('');
            $('#groupID_error').html('');
            if ($('#groupID').val() == 0) {
                e.preventDefault();
                $('#groupID_error').html('<span style="color:red;">Vui lòng chọn nhóm sản phẩm</span>');
                return false;
            }
            if ($('#providersID').val() == 0) {
                e.preventDefault();
                $('#providersID_error').html('<span style="color:red;">Vui lòng chọn nhà cung cấp</span>');
                return false;
            } else {
                $('#providersID_error').html('');
            }

            if ($('#param_catelogName').val() == '') {
                e.preventDefault();
                $('#catelogName_error').html('<span style="color:red;">Vui lòng điền loại sản phẩm</span>');
                return false;
            } else {
//                alert(JSON.stringify(data1));
//                return false;
                //tiep tuc goi ajax kiem tra co ton tai loai trong nhom chua
                $.ajax({
                    url: 'addCateGroup',
                    type: 'GET',
                    data: {'data': JSON.stringify(data1)},
//                    data: {'sendName=': catelogName, 'groupId=': groupID},
                    async: true
                }).done(function (result) {
                    if (result == '1') {
                        e.preventDefault();
                        $('#catelogName_error').html('Loại sản phẩm này đã tồn tại');
                        return false;
                    } else {
                       alert('Thành công');
                    }
                });
            }
        });

    })
</script>