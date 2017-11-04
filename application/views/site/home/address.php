<div class="row">

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 account-address">
        <div id="layout-page" class="clearfix">
	<span class="header-contact header-page clearfix text-center">
					<h1>Địa chỉ</h1>
				</span>
            <div class="row">
                <div class="col-xs-12 col-sm-3 sidebar-account">
                    <div class="AccountSidebar">
                        <h4 class="AccountTitle titleSidebar">Tài khoản</h4>
                        <div class="AccountContent">
                            <div class="AccountList">
                                <ul class="list-unstyled">
                                    <li class="current"><a href="/account">Thông tin tài khoản</a></li>
                                    <li><a href="/account/addresses">Danh sách địa chỉ</a></li>
                                    <li class="last"><a href="/account/logout">Đăng xuất</a></li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-9">
                    <div class="row">
                        <div class="content-page">
                            <div class="col-md-7 col-sm-12 col-xs-12">
                                <div id="address_tables">


                                    <div class="row">
                                        <div class="col-lg-12 col-xs-12 clearfix">
                                            <div class=" address_title ">
                                                <div class="row">
                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                        <h3>
                                                            <strong> </strong>
                                                            <span class="default_address note">(Địa chỉ mặc định)</span>
                                                        </h3>
                                                    </div>
                                                    <div class="col-md-3  col-sm-3 col-xs-12">
                                                        <p class="address_actions text-right">
                                                            <span class="action_link action_edit"><a href="#" onclick="Haravan.CustomerAddress.toggleForm(1005298365);return false"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></span>
                                                            <span class="action_link action_delete"><a href="#" onclick="Haravan.CustomerAddress.destroy(1005298365);return false"><i class="fa fa-times" aria-hidden="true"></i></a></span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="address_table">
                                        <div id="view_address_1005298365" class="customer_address">

                                            <div class="view_address">
                                                <div class="col-md-6  col-sm-6 col-xs-6 row">
                                                    <p><strong> </strong></p>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-6">

                                                </div>
                                                <div class="clearfix"></div>
                                                <div class="col-md-6 col-sm-6 col-xs-6 row">
                                                    <p>
                                                        <b>Công ty:</b>
                                                    </p>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-6 ">
                                                    <p>

                                                    </p>
                                                </div>
                                                <div class="clearfix"></div>
                                                <div class="col-md-6 col-sm-6 col-xs-6  row">
                                                    <p>
                                                        <b>Địa chỉ:</b>
                                                    </p>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-6">
                                                    <p></p>
                                                    <p></p>
                                                    <p>,  </p>
                                                </div>
                                                <div class="clearfix"></div>
                                                <div class="col-md-6 col-sm-6 col-xs-6 row">
                                                    <p>
                                                        <b>Số điện thoại:</b>
                                                    </p>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-6 ">
                                                    <p></p>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>

                                        </div>
                                        <div id="edit_address_1005298365" class="customer_address edit_address" style="display:none;">
                                            <form accept-charset="UTF-8" action="/account/addresses/1005298365" id="address_form_1005298365" method="post">
                                                <input name="form_type" value="customer_address" type="hidden">
                                                <input name="utf8" value="✓" type="hidden">

                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                    <input id="address_last_name_1005298365" class="form-control textbox" name="address[last_name]" size="40" value="" placeholder="Họ" type="text">
                                                </div>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                    <input id="address_first_name_1005298365" class="form-control textbox" name="address[first_name]" size="40" value="" placeholder="Tên" type="text">
                                                </div>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                                                    <input for="address_company_1005298365" class="form-control textbox" name="address[company]" size="40" value="" placeholder="Công ty" type="text">
                                                </div>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                                                    <input id="address_address1_1005298365" class="form-control textbox" name="address[address1]" size="40" value="" placeholder="Địa chỉ 1" type="text">
                                                </div>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                                                    <input id="address_address2_1005298365" class="form-control textbox" name="address[address2]" size="40" value="" placeholder="Địa chỉ 2" type="text">
                                                </div>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
                                                    <select class="form-control" id="address_country_1005298365" name="address[country]" data-default="">
                                                        <option value""="" data-provinces="[]">- Please Select --</option>

                                                        <option value="Vietnam" data-provinces="[&quot;Hà Nội&quot;,&quot;Hà Giang&quot;,&quot;Cao Bằng&quot;,&quot;Bắc Kạn&quot;,&quot;Tuyên Quang&quot;,&quot;Lào Cai&quot;,&quot;Điện Biên&quot;,&quot;Lai Châu&quot;,&quot;Sơn La&quot;,&quot;Yên Bái&quot;,&quot;Hòa Bình&quot;,&quot;Thái Nguyên&quot;,&quot;Lạng Sơn&quot;,&quot;Quảng Ninh&quot;,&quot;Bắc Giang&quot;,&quot;Phú Thọ&quot;,&quot;Vĩnh Phúc&quot;,&quot;Bắc Ninh&quot;,&quot;Hải Dương&quot;,&quot;Hải Phòng&quot;,&quot;Hưng Yên&quot;,&quot;Thái Bình&quot;,&quot;Hà Nam&quot;,&quot;Nam Định&quot;,&quot;Ninh Bình&quot;,&quot;Thanh Hóa&quot;,&quot;Nghệ An&quot;,&quot;Hà Tĩnh&quot;,&quot;Quảng Bình&quot;,&quot;Quảng Trị&quot;,&quot;Thừa Thiên Huế&quot;,&quot;Đà Nẵng&quot;,&quot;Quảng Nam&quot;,&quot;Quảng Ngãi&quot;,&quot;Bình Định&quot;,&quot;Phú Yên&quot;,&quot;Khánh Hòa&quot;,&quot;Ninh Thuận&quot;,&quot;Bình Thuận&quot;,&quot;Kon Tum&quot;,&quot;Gia Lai&quot;,&quot;Đắk Lắk&quot;,&quot;Đắk Nông&quot;,&quot;Lâm Đồng&quot;,&quot;Bình Phước&quot;,&quot;Tây Ninh&quot;,&quot;Bình Dương&quot;,&quot;Đồng Nai&quot;,&quot;Bà Rịa - Vũng Tàu&quot;,&quot;Hồ Chí Minh&quot;,&quot;Long An&quot;,&quot;Tiền Giang&quot;,&quot;Bến Tre&quot;,&quot;Trà Vinh&quot;,&quot;Vĩnh Long&quot;,&quot;Đồng Tháp&quot;,&quot;An Giang&quot;,&quot;Kiên Giang&quot;,&quot;Cần Thơ&quot;,&quot;Hậu Giang&quot;,&quot;Sóc Trăng&quot;,&quot;Bạc Liêu&quot;,&quot;Cà Mau&quot;]">Vietnam</option>
                                                    </select>
                                                </div>
                                                <div class="input-group" id="address_province_container_1005298365" style="display:none">
                                                    <span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
                                                    <select id="address_province_1005298365" class="form-control" name="address[province]" data-default=""></select>
                                                </div>
                                                <div class="input-group" style="display:none">
                                                    <span class="input-group-addon"><i class="glyphicon glyphicon-credit-card"></i></span>
                                                    <input id="address_zip_1005298365" class="form-control textbox" name="address[zip]" size="40" value="70000" type="text">
                                                </div>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="glyphicon glyphicon-phone-alt"></i></span>
                                                    <input id="address_phone_1005298365" class="form-control textbox" name="address[phone]" size="40" value="" placeholder="Số điện thoại" type="text">
                                                </div>
                                                <div class="input-group">
                                                    <input id="address_default_address_1005298365" name="address[default]" value="1" type="checkbox">  Đặt làm địa chỉ mặc định.
                                                </div>
                                                <div class="action_bottom">
                                                    <input class="btn bt-primary" value="Cập nhật" type="submit">
                                                    <span class="">hoặc <a href="/" onclick="Haravan.CustomerAddress.toggleForm(1005298365); return false;">Hủy</a></span>
                                                </div>
                                            </form>
                                        </div>
                                    </div>





                                </div>
                            </div>

                            <div class="col-md-5 col-sm-12 col-xs-12 col-lg-5 pt20 row">
                                <a href="#" onclick="Haravan.CustomerAddress.toggleNewForm(); return false;" class="add-new-address">Nhập địa chỉ mới</a>
                                <div id="add_address" class="customer_address edit_address" style="display: none;">
                                    <form accept-charset="UTF-8" action="/account/addresses" id="address_form_new" method="post">
                                        <input name="form_type" value="customer_address" type="hidden">
                                        <input name="utf8" value="✓" type="hidden">

                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                            <input id="address_last_name_new" class="form-control textbox" name="address[last_name]" size="40" value="" placeholder="Họ" type="text">
                                        </div>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                            <input id="address_first_name_new" class="form-control textbox" name="address[first_name]" size="40" value="" placeholder="Tên" type="text">
                                        </div>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                                            <input for="address_company_new" class="form-control textbox" name="address[company]" size="40" value="" placeholder="Công ty" type="text">
                                        </div>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                                            <input id="address_address1_new" class="form-control textbox" name="address[address1]" size="40" value="" placeholder="Địa chỉ 1" type="text">
                                        </div>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                                            <input id="address_address2_new" class="form-control textbox" name="address[address2]" size="40" value="" placeholder="Địa chỉ 2" type="text">
                                        </div>

                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
                                            <select class="form-control textbox" id="address_country_new" name="address[country]" data-default="">
                                                <option value""="" data-provinces="[]">- Please Select --</option>

                                                <option value="Vietnam" data-provinces="[&quot;Hà Nội&quot;,&quot;Hà Giang&quot;,&quot;Cao Bằng&quot;,&quot;Bắc Kạn&quot;,&quot;Tuyên Quang&quot;,&quot;Lào Cai&quot;,&quot;Điện Biên&quot;,&quot;Lai Châu&quot;,&quot;Sơn La&quot;,&quot;Yên Bái&quot;,&quot;Hòa Bình&quot;,&quot;Thái Nguyên&quot;,&quot;Lạng Sơn&quot;,&quot;Quảng Ninh&quot;,&quot;Bắc Giang&quot;,&quot;Phú Thọ&quot;,&quot;Vĩnh Phúc&quot;,&quot;Bắc Ninh&quot;,&quot;Hải Dương&quot;,&quot;Hải Phòng&quot;,&quot;Hưng Yên&quot;,&quot;Thái Bình&quot;,&quot;Hà Nam&quot;,&quot;Nam Định&quot;,&quot;Ninh Bình&quot;,&quot;Thanh Hóa&quot;,&quot;Nghệ An&quot;,&quot;Hà Tĩnh&quot;,&quot;Quảng Bình&quot;,&quot;Quảng Trị&quot;,&quot;Thừa Thiên Huế&quot;,&quot;Đà Nẵng&quot;,&quot;Quảng Nam&quot;,&quot;Quảng Ngãi&quot;,&quot;Bình Định&quot;,&quot;Phú Yên&quot;,&quot;Khánh Hòa&quot;,&quot;Ninh Thuận&quot;,&quot;Bình Thuận&quot;,&quot;Kon Tum&quot;,&quot;Gia Lai&quot;,&quot;Đắk Lắk&quot;,&quot;Đắk Nông&quot;,&quot;Lâm Đồng&quot;,&quot;Bình Phước&quot;,&quot;Tây Ninh&quot;,&quot;Bình Dương&quot;,&quot;Đồng Nai&quot;,&quot;Bà Rịa - Vũng Tàu&quot;,&quot;Hồ Chí Minh&quot;,&quot;Long An&quot;,&quot;Tiền Giang&quot;,&quot;Bến Tre&quot;,&quot;Trà Vinh&quot;,&quot;Vĩnh Long&quot;,&quot;Đồng Tháp&quot;,&quot;An Giang&quot;,&quot;Kiên Giang&quot;,&quot;Cần Thơ&quot;,&quot;Hậu Giang&quot;,&quot;Sóc Trăng&quot;,&quot;Bạc Liêu&quot;,&quot;Cà Mau&quot;]">Vietnam</option>
                                            </select>
                                        </div>
                                        <div class="input-group" id="address_province_container_new" style="display:none">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
                                            <select id="address_province_new" class="form-control textbox" name="address[province]" data-default=""></select>
                                        </div>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-phone-alt"></i></span>
                                            <input id="address_phone_new" class="form-control textbox" name="address[phone]" size="40" value="" placeholder="Số điện thoại" type="text">
                                        </div>
                                        <div class="input-group">
                                            <input id="address_default_address_new" name="address[default]" value="1" type="checkbox"> Đặt làm địa chỉ mặc định.
                                        </div>
                                        <div class="action_bottom">
                                            <input class="btn btn-primary" value="Thêm mới" type="submit">
                                            <span class="">hoặc <a href="#" onclick="Haravan.CustomerAddress.toggleNewForm(); return false;">Hủy</a></span>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" charset="utf-8">
        // initialize observers on address selectors
        new Haravan.CountryProvinceSelector('address_country_new', 'address_province_new', {hideElement: 'address_province_container_new'});

        new Haravan.CountryProvinceSelector('address_country_1005298365', 'address_province_1005298365', {hideElement: 'address_province_container_1005298365'});

    </script>

</div>