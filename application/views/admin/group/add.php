
<?php
$this->load->view('admin/group/head', $this->data);
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

        <form class="form" id="form-group-add" action="" method="post" enctype="multipart/form-data"
              onclick="return check();">
            <fieldset>
                <!-- ho -->
                <div class="formRow">
                    <label class="formLeft" for="param_groupName">Tên nhóm sản phẩm:<span class="req">*</span></label>
                    <div class="formRight">
                                <span class="oneTwo">
                                    <input name="groupName" id="groupName" _autocheck="true"
                                                            type="text"
                                                            value="<?php echo set_value('groupName') ?>"></span>
                        <span name="groupName_autocheck" class="autocheck"></span>
                        <div name="groupName_error" id="groupName_error"
                             class="clear error"><?php echo form_error('groupName'); ?></div>
                    </div>
                    <div class="clear"></div>
                </div>
                <!-- logo -->
                <div class="formRow">
                    <label class="formLeft">Logo:<span class="req">*</span></label>
                    <div class="formRight">
                        <div class="left">
                            <input id="image" name="image" type="file"
                                                 value="<?php echo set_value('groupLogo') ?>" ></div>
                        <div name="groupLogo_error" id="groupLogo_error" class="clear error"><?php echo form_error('groupLogo'); ?></div>
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
    $(document).ready(function (e) {

        $('#form-group-add').submit(function (e) {
            var groupName = $('#groupName').val();
           // alert(groupName);
            var logo = $('#image').val();
            if (groupName == '') {
                e.preventDefault();
                $('#groupName_error').html('Vui lòng điền tên nhóm sản phẩm');
                return false;
            }else{
                $('#groupName_error').html('');
            }
            if (logo == '') {
                e.preventDefault();
                $('#groupLogo_error').html('Vui lòng upload logo');
                return false;
            }
        });
    })
</script>

