<div class="container nav-wrapper check_nav">
    <div class="row">
        <div class="navbar-header">
            <div class="mobile-menu-icon-wrapper">
                <div class="menu-logo">

                    <h1 class="logo logo-mobile">
                        <a href="http://happylive.vn">
                            <img src="<?php echo public_url('site');?>/design/14/logo.png?v=90"
                                 alt="Happylive" class="img-responsive logoimg"/>
                        </a>
                    </h1>

                    <div class="nav-login">
                        <a href="/account" class="cart " title="Tài khoản">
                            <svg class="icon icon-user" viewBox="0 0 32 32">
                                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-user">
                                </use>
                            </svg>
                        </a>
                    </div>
                    <div class="menu-btn click-menu-mobile "><a href="#menu-mobile"
                                                                class="navbar-toggle">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span></a>
                    </div>

                    <div id="cart-targets" class="cart">
                        <a href="/cart" class="cart " title="Giỏ hàng">
							<span>

								<svg class="shopping-cart">
									<use xmlns:xlink="./www.w3.org/1999/xlink" xlink:href="#icon-add-cart"/>
								</svg>
							</span>
                            <span id="cart-count" class="cart-number">0</span>
                        </a>
                    </div>
                </div>
                <div class="search-bar-top">
                    <div class="search-input-top">
                        <form action="/search">
                            <input type="hidden" name="type" value="product"/>
                            <input type="text" name="q" placeholder="Tìm kiếm sản phẩm ..."/>
                            <button type="submit" class="icon-search">
                                <svg class="icon-search_white">
                                    <use xmlns:xlink="./www.w3.org/1999/xlink" xlink:href="#icon-search_white"/>
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav clearfix">
                <li>
                    <a href="/" class=" current" title="Trang chủ">
                        <span>Trang chủ</span>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="/collections/dong-ho-nam" title="Đồng hồ nam" class="">
                        <span>Đồng hồ nam</span>
                    </a>
                    <ul class="dropdown-menu" role="menu">

                        <li>
                            <a href="/collections/dong-ho-nam-tevise" title="Đồng hồ Tevise">Đồng hồ
                                Tevise</a>

                        </li>

                        <li>
                            <a href="/collections/dong-ho-nam-skmei" title="Đồng hồ Skmei">Đồng hồ
                                Skmei</a>

                        </li>

                        <li>
                            <a href="/collections/dong-ho-nam-halei" title="Đồng hồ Halei">Đồng hồ
                                Halei</a>

                        </li>

                        <li>
                            <a href="/collections/dong-ho-nam-longbo" title="Đồng hồ Longbo">Đồng hồ
                                Longbo</a>

                        </li>

                        <li>
                            <a href="/collections/dong-ho-nam-curren" title="Đồng hồ nam Curren">Đồng hồ
                                nam Curren</a>

                        </li>

                        <li>
                            <a href="/collections/dong-ho-nam-baishuns" title="Đồng hồ nam Baishuns">Đồng
                                hồ nam Baishuns</a>

                        </li>

                    </ul>
                </li>


                <li class="dropdown">
                    <a href="/collections/dong-ho-nu" title="Đồng hồ nữ" class="">
                        <span>Đồng hồ nữ</span>
                    </a>
                    <ul class="dropdown-menu" role="menu">

                        <li>
                            <a href="/collections/dong-ho-nu-beesister" title="Đồng hồ Beesister">Đồng
                                hồ Beesister</a>

                        </li>

                        <li>
                            <a href="/collections/dong-ho-nu-skmei" title="Đồng hồ Skmei">Đồng hồ
                                Skmei</a>

                        </li>

                        <li>
                            <a href="/collections/dong-ho-nu-halei" title="Đồng hồ Halei">Đồng hồ
                                Halei</a>

                        </li>

                    </ul>
                </li>
                <li>
                    <a href="/pages/dich-vu" class="" title="Dịch vụ">
                        <span>Dịch vụ</span>
                    </a>
                </li>
                <li>
                    <a href="/pages/gioi-thieu" class="" title="Giới thiệu">
                        <span>Giới thiệu</span>
                    </a>
                </li>
                <li>
                    <a href="/blogs/news" class="" title="Blog">
                        <span>Blog</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="hidden-xs pull-right right-menu">
            <ul class="nav navbar-nav pull-right">
                <li class="col-md-12">

                    <div class="search-bar">

                        <div class="">
                            <form action="/search">
                                <input type="hidden" name="type" value="product"/>
                                <input type="text" name="q" placeholder="Tìm kiếm..."
                                       autocomplete="off"/>
                            </form>
                        </div>
                    </div>
                </li>

            </ul>
        </div><!--/.nav-collapse -->
    </div>
</div>