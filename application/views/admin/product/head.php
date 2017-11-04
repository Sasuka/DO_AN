<div class="titleArea">
    <div class="wrapper">
        <div class="pageTitle">
            <h5>SẢN PHẨM</h5>
            <span>Quản lý sản phẩm</span>
        </div>

        <div class="horControlB menu_action">
            <ul>
                <li><a href="<?php echo admin_url('product/add')?>">
                        <img src="<?php echo public_url('admin')?>/images/icons/control/16/add.png">
                        <span>Thêm mới</span>
                    </a></li>

                <li><a href="<?php echo admin_url('product')?>">
                        <img src="<?php echo public_url('admin')?>/images/icons/control/16/list.png">
                        <span>Danh sách</span>
                    </a></li>
            </ul>
        </div>

        <div class="clear"></div>
    </div>
</div>
<script>
    $(document).ready(function () {
        //jquery  group-catelog
        $('#group-product').on('change', function () {
            var group = $(this).val();
            if (group == '0') {
                alert('Vui lòng chọn nhóm sản phẩm');
            }
            if (group) {
                $.ajax({
                    type: 'POST',
                    url: 'Catelog/getListCateLogByGroup',
                    data: 'groupId=' + group,
                    success: function (html) {
                        $('#catelog-product').html(html);
                    }
                });
            }
        });

        $('#catelog-product').on('change', function () {
            var catelog = $(this).val();
            if (catelog) {
                $('#filter_id').val("");
                $('#loading').html("<img src='<?php echo public_url()?>images/loader.gif'/>").fadeIn('fast');
                $.ajax({
                    type: 'POST',
                    url: 'product/getListProductByCate',
                    data: 'catelogId=' + catelog,
                    success: function (html) {
                        $('#loading').fadeOut('fast');
                        $('.list_item').html(html);
                    }
                });
            }
        });

        //jquery tab
        var main = $('#form');
        // Tabs
        main.contentTabs();
    });
</script>
