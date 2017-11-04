<?php
$this->load->view('admin/import/head', $this->data);
$account = $this->session->userdata('account');
//pre($account);
$tmp['fname'] = $account['HO'] . ' ' . $account['TEN'];
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

        <form class="form" id="form-import" action="add" method="post">
            <fieldset>
                <!-- nhan vien nhap -->
                <div class="formRow">
                    <label class="formLeft" for="param_fname">Nhân viên lập phiếu :<span class="req">*</span></label>
                    <div class="formRight">
                                <span class="oneTwo">
                                    <input type="hidden" name="employeeId" id="employeeId" value="<?php echo $account['MA_NHANVIEN']; ?>">
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
                    <label class="formLeft" for="param_cat">Tên nhà cung cấp:<span class="req">*</span></label>
                    <div class="formRight">
                        <select name="nameProviders" _autocheck="true" id='nameProviders' class="left">
                            <option value="0">&nbsp;Lựa chọn nhà cung cấp &nbsp;</option>

                            <?php

                            for ($i = 0; $i < count($list); $i++) {

                                ?>
                                <option value="<?= $list[$i]['MA_NHA_CUNGCAP']; ?>"><?= $list[$i]['TEN_NHA_CUNGCAP']; ?></option>
                                <?php
                            }
                            //                         print_r($level);
                            ?>
                        </select>
                        <span name="nameProviders_autocheck" class="autocheck"></span>
                        <div name="nameProviders_error" class="clear error" id="nameProviders_error"></div>
                    </div>
                    <div class="clear"></div>
                </div>


                <div class="formSubmit">
                    <input value="Thêm mới" class="redB" type="submit">
                    <input value="Hủy bỏ" class="basic" type="reset" href="<?php echo admin_url('admin/import')?>">
                </div>
                <div class="clear"></div>
            </fieldset>
        </form>
    </div>

</div>
<script>
    $(document).ready(function () {
        //thuc hien kiem tra  cty do da lap hoa don ngay do hay chua
        $('#nameProviders').on('change', function () {
            var nameProviders = $(this).val();
            if (nameProviders == '0') {
                alert('Vui lòng chọn nhà cung cấp');
            }
            if (nameProviders) {
                $.ajax({
                    type: 'POST',
                    url: 'checkRepeat',
                    data: 'providersId=' +nameProviders,
                    success: function (html) {
                       if(html!=''){
                           alert(html);
                           $('#nameProviders').val(0);
                       }
                    }
                });
            }
        });

        $('#form-import').submit(function (e) {
            var nameProviders = $('#nameProviders').val();
           // alert(nameProviders);
            if (nameProviders == 0) {
                e.preventDefault();
                $('#nameProviders_error').html('Không được để trống');
                return false;
            }else{
                $('#nameProviders_error').html('');


            }
        });
    });
</script>