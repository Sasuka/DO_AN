<?php
$this->load->view('admin/bill/head', $this->data);
$account = $this->session->userdata('account');
//pre($account);
$tmp['fname'] = $account['HO'] . ' ' . $account['TEN'];
$tmp['status'] = (isset($_POST['status'])) ? $_POST['$status'] : '0';
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
            <h6>Lập hóa đơn</h6>
        </div>

        <form class="form" id="form-import" action="" method="post">
            <fieldset>
                <!-- nhan vien nhap -->
                <div class="formRow">
                    <label class="formLeft" for="param_fname">Nhân viên lập phiếu :<span class="req">*</span></label>
                    <div class="formRight">
                                <span class="oneTwo">
                                    <input type="hidden" name="employeeId" id="employeeId"
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
                    <label class="formLeft" for="param_cat">Trạng thái:<span class="req">*</span></label>
                    <div class="formRight">
                        <select name="status" _autocheck="true" id='status' class="left">
                            <option value="0" <?php echo ($tmp['status']==0) ? 'selected':'';?>>&nbsp;Chờ xử lý &nbsp;</option>
                            <option value="1" <?php echo ($tmp['status']==1) ? 'selected':'';?>>&nbsp;Giao hàng &nbsp;</option>
                            <option value="2" <?php echo ($tmp['status']==2) ? 'selected':'';?>>&nbsp;Hủy bỏ &nbsp;</option>

                        </select>
                        <span name="status_autocheck" class="autocheck"></span>
                        <div name="status_error" class="clear error" id="status_error"></div>
                    </div>
                    <div class="clear"></div>
                </div>


                <div class="formSubmit">
                    <input value="Cập nhật" class="redB" type="submit">

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
                    data: 'providersId=' + nameProviders,
                    success: function (html) {
                        if (html != '') {
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
            } else {
                $('#nameProviders_error').html('');


            }
        });
    });
</script>