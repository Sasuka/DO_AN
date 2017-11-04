<div class="wrap-breadcrumb">
    <div class="clearfix container">
        <div class="row main-header">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pd5  ">
                <ol class="breadcrumb breadcrumb-arrows">
                    <li><a href="/" target="_self">Trang chủ</a></li>
                    <li><a href="/collections" target="_self">Danh mục</a></li>
                    <li class="active"><span>Đồng hồ nam Longbo</span></li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div id="collection" class="content-pages collection-page" data-sticky_parent>

    <!-- Begin collection info -->
    <!-- Content-->
    <div class="col-lg-12 visible-sm visible-xs">
        <div class="visible-sm visible-xs">
            <h1 class="title-sm">
                Đồng hồ nam Longbo1
            </h1>
        </div>

        <div class="filter-by-wrapper">
            <div class="filter-by">

                <div class="sort-filter-option navbar-inactive" id="navbar-inner">
                    <div class="filterBtn txtLeft btn-navbar-collection">
						<span class="list-coll">
							<i class="fa fa-server" aria-hidden="true"></i>
							Danh mục
						</span>
                    </div>
                </div>


                <div class="sort-filter-option js-promoteTooltip">
                    <div class="filterBtn txtLeft showOverlay">
                        <i class="fa fa-sort-alpha-asc" aria-hidden="true"></i>
                        <span class="custom-dropdown custom-dropdown--white">
							<select class="sort-by custom-dropdown__select custom-dropdown__select--white">

										<option value="manual">Sản phẩm nổi bật</option>

								<option value="price-ascending">Giá: Tăng dần</option>
								<option value="price-descending">Giá: Giảm dần</option>
								<option value="title-ascending">Tên: A-Z</option>
								<option value="title-descending">Tên: Z-A</option>
								<option value="created-ascending">Cũ nhất</option>
								<option value="created-descending">Mới nhất</option>
								<option value="best-selling">Bán chạy nhất</option>
							</select>
						</span>
                    </div>
                </div>

            </div>
        </div>

    </div>
    <div class=" col-md-3 col-sm-12 col-xs-12 leftsidebar-col" data-sticky_column>
       <?php $this->load->view('site/product_list/menu_sidebar'); ?>
    </div>
    <div class="content-col col-md-9 col-sm-12 col-xs-12" data-sticky_column>
<!--        --><?php //$this->load->view('site/product_list/product_list');?>

        <?php $this->load->view('site/product_detail/product_detail');?>
    </div>

    <!-- End collection info -->
    <!-- Begin no products -->


    <!-- End no products -->
</div>
<script>
    Haravan.queryParams = {};
    if (location.search.length) {
        for (var aKeyValue, i = 0, aCouples = location.search.substr(1).split('&'); i < aCouples.length; i++) {
            aKeyValue = aCouples[i].split('=');
            if (aKeyValue.length > 1) {
                Haravan.queryParams[decodeURIComponent(aKeyValue[0])] = decodeURIComponent(aKeyValue[1]);
            }
        }
    }
    var collFilters = jQuery('.coll-filter');
    collFilters.change(function () {
        var newTags = [];
        var newURL = '';
        delete Haravan.queryParams.page;
        collFilters.each(function () {
            if (jQuery(this).val()) {
                newTags.push(jQuery(this).val());
            }
        });

        newURL = '/collections/' + 'dong-ho-nam-longbo';
        if (newTags.length) {
            newURL += '/' + newTags.join('+');
        }
        var search = jQuery.param(Haravan.queryParams);
        if (search.length) {
            newURL += '?' + search;
        }
        location.href = newURL;

    });
    jQuery('.sort-by')
        .val('title-ascending')
        .bind('change', function () {
            Haravan.queryParams.sort_by = jQuery(this).val();
            location.search = jQuery.param(Haravan.queryParams);
        });
</script>
