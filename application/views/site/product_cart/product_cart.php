<?php $this->load->view('site/product_cart/breadcrumb');?>
<section id="content" class="clearfix container">
    <div class="row">
        <div id="cart" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <!-- Begin empty cart -->

            <div class="row">
                <div id="layout-page" class="col-md-12 col-sm-12 col-xs-12">
			<span class="header-page clearfix">
				<h1>Giỏ hàng</h1>
			</span>
                    <form action="/cart" method="post" id="cartformpage">
                        <table>
                            <thead>
                            <tr>
                                <th class="image">&nbsp;</th>
                                <th class="item">Tên sản phẩm</th>
                                <th class="qty">Số lượng</th>
                                <th class="price">Giá tiền</th>
                                <th class="remove">&nbsp;</th>
                            </tr>
                            </thead>
                            <tbody>

                            <tr>
                                <td class="image">
                                    <div class="product_image">
                                        <a href="/products/dong-ho-nam-skmei-kim-xanh-duong">
                                            <img src="<?php echo upload_url('product');?>/1_e0ed7c0240734782a8268793dce0b9b8_small.jpg "
                                                 alt="ĐỒNG HỒ NAM SKMEI KIM XANH DƯƠNG"/>

                                        </a>
                                    </div>
                                </td>
                                <td class="item">
                                    <a href="/products/dong-ho-nam-skmei-kim-xanh-duong">
                                        <strong>ĐỒNG HỒ NAM SKMEI KIM XANH DƯƠNG</strong>

                                    </a>
                                </td>
                                <td class="qty">
                                    <input type="number" size="4" name="updates[]" min="1"
                                           id="updates_1012030836" value="2" onfocus="this.select();"
                                           class="tc item-quantity"/>
                                </td>
                                <td class="price">998,000₫</td>
                                <td class="remove">
                                    <a href="/cart/change?line=1&quantity=0" class="cart">Xóa</a>
                                </td>
                            </tr>

                            <tr>
                                <td class="image">
                                    <div class="product_image">
                                        <a href="/products/dong-ho-nam-tevise-1952-chay-co-cuc-chat">
                                            <img src="<?php echo upload_url('product');?>/7_0590d26379fb4da3ba8d9b57564ee6b0_small.jpg "
                                                 alt="ĐỒNG HỒ NAM TEVISE 1952 CHẠY CƠ CỰC CHẤT"/>

                                        </a>
                                    </div>
                                </td>
                                <td class="item">
                                    <a href="/products/dong-ho-nam-tevise-1952-chay-co-cuc-chat">
                                        <strong>ĐỒNG HỒ NAM TEVISE 1952 CHẠY CƠ CỰC CHẤT</strong>

                                    </a>
                                </td>
                                <td class="qty">
                                    <input type="number" size="4" name="updates[]" min="1"
                                           id="updates_1012006173" value="3" onfocus="this.select();"
                                           class="tc item-quantity"/>
                                </td>
                                <td class="price">2,400,000₫</td>
                                <td class="remove">
                                    <a href="/cart/change?line=2&quantity=0" class="cart">Xóa</a>
                                </td>
                            </tr>

                            <tr class="summary">
                                <td class="image">&nbsp;</td>
                                <td>&nbsp;</td>
                                <td class="text-center"><b>Tổng cộng:</b></td>
                                <td class="price">
								<span class="total">
									<strong>3,398,000₫</strong>
								</span>
                                </td>
                                <td>&nbsp;</td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-12 inner-left inner-right">
                                <div class="checkout-buttons clearfix">
                                    <label for="note">Ghi chú </label>
                                    <textarea id="note" name="note" rows="8" cols="50"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12 cart-buttons inner-right inner-left">
                                <div class="buttons clearfix">
                                    <button type="submit" id="checkout" class="button-default"
                                            name="checkout" value="">Thanh toán
                                    </button>
                                    <button type="submit" id="update-cart" class="button-default"
                                            name="update" value="">Cập nhật
                                    </button>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12  col-xs-12 continue-shop">

                                <a href="/collections/all">
                                    <i class="fa fa-reply"></i> Tiếp tục mua hàng</a>
                            </div>

                        </div>
                    </form>
                </div>
            </div>


            <!-- End cart -->

        </div>


    </div>
</section>
<footer id="footer">