<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <!-- Content-->
        <div class="main-content">
            <!-- Sản phẩm trang chủ -->
            <?php $this->load->view('site/product_home');?>
            <!--Product loop-->


            <div class="row">
                <div class="col-lg-12 col-sm-12 col-xs-12">
                    <div class="animation fade-in home-banner-1">
                        <aside class="banner-home-1">

                            <div class="divcontent"><span class="ad_banner_1">Miễn phí vận chuyển<strong
                                        class="ad_banner_2">Với tất cả đơn hàng trên 500k thành phố Hà Nội</strong></span>
                                <span class="ad_banner_desc">Miễn phí 2 ngày vận chuyển với đơn hàng trên 500k trừ trực tiếp khi thanh toán</span>
                            </div>
                            <div class="divstyle" style="border-color:;"></div>
                        </aside>
                    </div>
                </div>
            </div>


            <div class="product-list clearfix ">
                <div class="row">
                    <div class="col-lg-12 col-sm-12 col-xs-12">
                        <aside class="styled_header  use_icon ">
                            <h3>Sản phẩm mới</h3>
                            <span class="icon"><img
                                    src="<?php echo public_url('site');?>/design/14/icon_sale.png?v=90"
                                    alt="Newest trends"></span>
                        </aside>
                    </div>
                </div>

                <div class="row content-product-list products-resize">
                    <?php
                    $this->load->view('site/product_new');
                    ?>
                </div>
                <div class="row">
                    <div class="col-lg-12 pull-center center ">
                        <a class="btn btn-readmore" href="/collections/dong-ho-cao-cap" role="button">Xem
                            thêm</a>
                    </div>
                </div>
            </div>

            <div class="banner-bottom">
                <div class="row">
                    <?php $this->load->view('site/banner_bottom');?>
                </div>
            </div>
        </div>
        <!-- end Content-->
    </div>
</div>