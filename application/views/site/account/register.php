
<div class="row">
    <div class="col-md-12 ">
        <div class="page-header ">
            <h2 class="col-md-offset-5">ĐĂNG KÝ</h2>
        </div>
    </div>
    <div class="col-md-12">
        <form id="form_register" method="POST" action="<?php echo base_url('user/register'); ?>" role="form" class="form-horizontal">
            <div class="form-group">
                <label class="col-sm-3 control-label">Username</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" name="fname" placeholder="Họ" value="<?php echo set_value('fname') ?>"/>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" name="username" placeholder="Tên" value="<?php echo set_value('lname') ?>"/>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Số ĐT</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control" name="phone" placeholder="Số điện thoại liên lạc" value="<?php echo set_value('phone') ?>"/>
                </div>
                <label class="col-sm-1 control-label">Email</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" name="email" placeholder="Địa chỉ email..." value="<?php echo set_value('email') ?>"/>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Địa chỉ</label>
                <div class="col-sm-6">
                   <textarea class="form-control" rows="2" placeholder="Địa chỉ Xã/Huyện,Quận/Thị trấn, Thành phố">

                   </textarea>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label">Password</label>
                <div class="col-sm-2">
                    <input type="password" class="form-control" name="password"/>
                </div>
                <label class="col-sm-2 control-label">Nhập lại password</label>
                <div class="col-sm-2">
                    <input type="password" class="form-control" name="password"/>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label">Giới tính</label>
                <div class="col-sm-6">
                    <div class="radio-inline col-sm-3">
                        <label>
                            <input type="radio" name="gender" value="male"/> Male
                        </label>
                    </div>
                    <div class="radio-inline col-sm-3">
                        <label>
                            <input type="radio" name="gender" value="female"/> Female
                        </label>
                    </div>

                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label">Ngày sinh</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="birthday" id="datepicker" placeholder="DD/MM/YYYY" value="<?php echo set_value('birthday') ?>" />
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-9 col-sm-offset-5">
                    <!-- Do NOT use name="submit" or id="submit" for the Submit button -->
                    <button type="submit" class="btn btn-default">ĐĂNG KÝ</button>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    $(document).ready(function () {
        $( "#datepicker" ).datepicker({
//            showOtherMonths: true,
//            selectOtherMonths: true
        });

        $('#form_register ').bootstrapValidator({
            // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                username: {
                    message: 'Username không được để trống',
                    validators: {
                        notEmpty: {
                            message: 'The username is required and cannot be empty'
                        },
                        stringLength: {
                            min: 6,
                            max: 30,
                            message: 'The username must be more than 6 and less than 30 characters long'
                        },
                        regexp: {
                            regexp: /^[a-zA-Z0-9]+$/,
                            message: 'The username can only consist of alphabetical and number'
                        },
                        different: {
                            field: 'password',
                            message: 'The username and password cannot be the same as each other'
                        }
                    }
                },
                email: {
                    validators: {
                        notEmpty: {
                            message: 'The email address is required and cannot be empty'
                        },
                        emailAddress: {
                            message: 'The email address is not a valid'
                        }
                    }
                },
                password: {
                    validators: {
                        notEmpty: {
                            message: 'The password is required and cannot be empty'
                        },
                        different: {
                            field: 'username',
                            message: 'The password cannot be the same as username'
                        },
                        stringLength: {
                            min: 8,
                            message: 'The password must have at least 8 characters'
                        }
                    }
                },
                birthday: {
                    validators: {
                        notEmpty: {
                            message: 'The date of birth is required'
                        },
                        date: {
                           // format: 'DD/MM/YYYY',
                            message: 'The date of birth is not valid'
                        }
                    }
                },
                gender: {
                    validators: {
                        notEmpty: {
                            message: 'The gender is required'
                        }
                    }
                }
            }
        });
    });



</script>
