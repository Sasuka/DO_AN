<script type='text/javascript'>
    //<![CDATA[
    Haravan.checkout = '{"created_at":"2017-07-07T08:24:53.267Z","currency":"VND","customer_id":1004067765,"email":"abc@gmail.com","location_id":null,"order_id":1011727757,"requires_shipping":true,"reservation_time":null,"source_name":"web","source_identifier":null,"source_url":null,"taxes_included":false,"tax_exempt":false,"tax_lines":null,"token":"9da4ac7a14de46fdba068d4f8f789d15","updated_at":"0001-01-01T00:00:00","payment_due":null,"payment_url":null,"reservation_time_left":0,"subtotal_price":6194000.0,"total_price":6194000.0,"total_tax":0.0,"line_items":[{"id":0,"key":"0","product_id":1004862902,"variant_id":1012030836,"sku":"DHN68","vendor":"Happylive","title":"ĐỒNG HỒ NAM SKMEI KIM XANH DƯƠNG - Default Title","variant_title":"Default Title","taxable":false,"requires_shipping":true,"price":499000.0,"compare_at_price":700000.0,"line_price":2994000.0,"quantity":6,"grams":0.0},{"id":0,"key":"0","product_id":1004853557,"variant_id":1012006173,"sku":"DHN04","vendor":"Happylive","title":"ĐỒNG HỒ NAM TEVISE 1952 CHẠY CƠ CỰC CHẤT - Default Title","variant_title":"Default Title","taxable":false,"requires_shipping":true,"price":800000.0,"compare_at_price":1200000.0,"line_price":3200000.0,"quantity":4,"grams":0.0}],"shipping_rate":{"id":0,"barcode":null,"title":"Giao hàng tận nơi","price":0.0,"handle":"giao-hang-tan-noi-0"},"shipping_address":{"name":"sfsdf ","full_name":null,"first_name":null,"last_name":"sfsdf","company":null,"address1":"dfdsfsfs","address2":null,"zip":"70000","country":"Vietnam","province":"Bà Rịa - Vũng Tàu","country_id":241,"province_id":49,"district_id":548,"ward_id":null,"phone":"123131321","province_code":"BV","country_code":"VN"},"billing_address":{"name":"sfsdf ","full_name":"sfsdf","first_name":null,"last_name":"sfsdf","company":null,"address1":"dfdsfsfs","address2":null,"zip":"70000","country":"Vietnam","province":"Bà Rịa - Vũng Tàu","country_id":241,"province_id":49,"district_id":null,"phone":"123131321","billing_is_shipping":false,"note":null,"customeradd":0,"province_code":"BV","country_code":"VN"},"discount":{"amount":0.0,"code":null}}';
    //]]>
</script>

<script type="text/javascript">
    window.onpageshow = function (event) {
        if (event.persisted) {
            var currentUrl = '';
            currentUrl = 'http://localhost/www/WEBCODE_GRADUATE/';
            if (currentUrl)
                window.location = currentUrl;
        }
    };

    var isInit = false;

    function funcFormOnSubmit(e) {
        if (!isInit) {
            isInit = true;
            $.fn.tagName = function () {
                return this.prop("tagName").toLowerCase();
            };
        }

        if (typeof(e) == 'string') {
            var element = $(e);
            var formData = e;
        } else {
            var element = this;
            var formData = this;
            e.preventDefault();
        }

        $(element).find('button:submit').addClass('btn-loading');

        var formId = $(element).attr('id'), replaceElement = [], funcCallback;

        if (formId == undefined || formId == null || formId == '')
            return;


        if (formId == 'form_next_step') {
            formData = '.section-customer-information';
            replaceElement.push('.step-sections');
        }
        else if (
            formId == 'form_discount_add'
            || formId == 'form_discount_remove'
            || formId == 'form_update_location'

        ) {
            replaceElement.push('#form_update_location');
            replaceElement.push('.inventory_location');
            replaceElement.push('.inventory_location_data');
            replaceElement.push('.order-summary-toggle-inner .order-summary-toggle-total-recap');
            replaceElement.push('.order-summary-sections');
        }


        if (!$(formData) || $(formData).length == 0) {
            window.location.reload();
            return false;
        }

        if ($(formData).tagName() != 'form')
            formData += ' :input';

        $.ajax({
            type: 'GET',
            url: window.location.origin + window.location.pathname + '?' + $(formData).serialize() + encodeURI('&form_name=' + formId),
            success: function (html) {

                if ($(html).attr('id') == 'redirect-url') {
                    window.location = $(html).val();
                } else {
                    if (replaceElement.length > 0) {
                        for (var i = 0; i < replaceElement.length; i++) {
                            var tempElement = replaceElement[i];
                            var newElement = $(html).find(tempElement);

                            if (newElement.length > 0) {
                                if (tempElement == '.step-sections')
                                    $(tempElement).attr('step', $(newElement).attr('step'));

                                var listTempElement = $(tempElement);

                                for (var j = 0; j < newElement.length; j++)
                                    if (j < listTempElement.length)
                                        $(listTempElement[j]).html($(newElement[j]).html());
                            }
                        }
                    }

                    $('body').attr('src', $(html).attr('src'));
                    $(element).find('button:submit').removeClass('btn-loading');

                    if (($('body').find('.field-error') && $('body').find('.field-error').length > 0)
                        || ($('body').find('.has-error') && $('body').find('.has-error').length > 0))
                        $("html, body").animate({scrollTop: 0}, "slow");

                    if (funcCallback)
                        funcCallback();
                }
            }
        });

        return false;
    };

    function funcSetEvent() {
        var effectControlFieldClass = '.field input, .field select, .field textarea';

        $('body')
            .on('focus', effectControlFieldClass, function () {
                funcFieldFocus($(this), true);
            })
            .on('blur', effectControlFieldClass, function () {
                funcFieldFocus($(this), false);
                funcFieldHasValue($(this), true);
            })
            .on('keyup input paste', effectControlFieldClass, function () {
                funcFieldHasValue($(this), false);
            })
            .on('submit', 'form', funcFormOnSubmit);


        $('body')
            .on('change', '#form_update_location', function () {
                $(this).submit();
            });


        $('body')
            .on('change', '#form_update_location select[name=customer_shipping_district]', function () {
                $('.section-customer-information input:hidden[name=customer_shipping_district]').val($(this).val());
            })
            .on('change', '#form_update_location select[name=customer_shipping_ward]', function () {
                $('.section-customer-information input:hidden[name=customer_shipping_ward]').val($(this).val());
            });


        $('body')
            .on('change', '#form_update_shipping_method input:radio', function () {
                $('#form_update_shipping_method .content-box-row.content-box-row-secondary').addClass('hidden');

                var id = $(this).attr('id');

                if (id) {
                    var sub = $('body').find('.content-box-row.content-box-row-secondary[for=' + id + ']')

                    if (sub && sub.length > 0) {
                        $(sub).removeClass('hidden');
                    }
                }
            });


    };

    function funcFieldFocus(fieldInputElement, isFocus) {
        if (fieldInputElement == undefined)
            return;

        var fieldElement = $(fieldInputElement).closest('.field');

        if (fieldElement == undefined)
            return;

        if (isFocus)
            $(fieldElement).addClass('field-active');
        else
            $(fieldElement).removeClass('field-active');
    };

    function funcFieldHasValue(fieldInputElement, isCheckRemove) {
        if (fieldInputElement == undefined)
            return;

        var fieldElement = $(fieldInputElement).closest('.field');

        if (fieldElement == undefined)
            return;

        if ($(fieldElement).find('.field-input-wrapper-select').length > 0) {
            var value = $(fieldInputElement).find(':selected').val();

            if (value == 'null')
                value = undefined;
        } else {
            var value = $(fieldInputElement).val();
        }

        if (!isCheckRemove) {
            if (value != $(fieldInputElement).attr('value'))
                $(fieldElement).removeClass('field-error');
        }

        var fieldInputBtnWrapperElement = $(fieldInputElement).closest('.field-input-btn-wrapper');

        if (value && value.trim() != '') {
            $(fieldElement).addClass('field-show-floating-label');
            $(fieldInputBtnWrapperElement).find('button:submit').removeClass('btn-disabled');
        }
        else if (isCheckRemove) {
            $(fieldElement).removeClass('field-show-floating-label');
            $(fieldInputBtnWrapperElement).find('button:submit').addClass('btn-disabled');
        }
        else {
            $(fieldInputBtnWrapperElement).find('button:submit').addClass('btn-disabled');
        }
    };

    function funcInit() {
        funcSetEvent();


    }

    $(document).ready(function () {
        funcInit();
    });
</script>


<script type="text/javascript">
    var toggleShowOrderSummary = false;
    $(document).ready(function () {
        var currentUrl = '';


        currentUrl = 'http://happylive.vn/checkouts/913189a78ff74efa816492a0bf2c7981?step=1';


        if ($('#reloadValue').val().length == 0) {
            $('#reloadValue').val(currentUrl);
            $('body').show();
        }
        else {
            window.location = $('#reloadValue').val();
            $('#reloadValue').val('');
        }

        $('body')
            .on('click', '.order-summary-toggle', function () {
                toggleShowOrderSummary = !toggleShowOrderSummary;

                if (toggleShowOrderSummary) {
                    $('.order-summary-toggle')
                        .removeClass('order-summary-toggle-hide')
                        .addClass('order-summary-toggle-show');

                    $('.sidebar:not(".sidebar-second") .sidebar-content .order-summary')
                        .removeClass('order-summary-is-collapsed')
                        .addClass('order-summary-is-expanded');

                    $('.sidebar.sidebar-second .sidebar-content .order-summary')
                        .removeClass('order-summary-is-expanded')
                        .addClass('order-summary-is-collapsed');
                } else {
                    $('.order-summary-toggle')
                        .removeClass('order-summary-toggle-show')
                        .addClass('order-summary-toggle-hide');

                    $('.sidebar:not(".sidebar-second") .sidebar-content .order-summary')
                        .removeClass('order-summary-is-expanded')
                        .addClass('order-summary-is-collapsed');

                    $('.sidebar.sidebar-second .sidebar-content .order-summary')
                        .removeClass('order-summary-is-collapsed')
                        .addClass('order-summary-is-expanded');
                }
            });
    });
</script>
<input id="reloadValue" type="hidden" name="reloadValue" value=""/>
<div class="banner">
    <div class="wrap">
        <a href="http://happylive.vn" class="logo">
            <h1 class="logo-text">OxyWatch</h1>
        </a>
    </div>
</div>
<button class="order-summary-toggle order-summary-toggle-hide">
    <div class="wrap">
        <div class="order-summary-toggle-inner">
            <div class="order-summary-toggle-icon-wrapper">
                <svg width="20" height="19" xmlns="http://www.w3.org/2000/svg" class="order-summary-toggle-icon">
                    <path d="M17.178 13.088H5.453c-.454 0-.91-.364-.91-.818L3.727 1.818H0V0h4.544c.455 0 .91.364.91.818l.09 1.272h13.45c.274 0 .547.09.73.364.18.182.27.454.18.727l-1.817 9.18c-.09.455-.455.728-.91.728zM6.27 11.27h10.09l1.454-7.362H5.634l.637 7.362zm.092 7.715c1.004 0 1.818-.813 1.818-1.817s-.814-1.818-1.818-1.818-1.818.814-1.818 1.818.814 1.817 1.818 1.817zm9.18 0c1.004 0 1.817-.813 1.817-1.817s-.814-1.818-1.818-1.818-1.818.814-1.818 1.818.814 1.817 1.818 1.817z"></path>
                </svg>
            </div>
            <div class="order-summary-toggle-text order-summary-toggle-text-show">
                <span>Hiển thị thông tin đơn hàng</span>
                <svg width="11" height="6" xmlns="http://www.w3.org/2000/svg" class="order-summary-toggle-dropdown"
                     fill="#000">
                    <path d="M.504 1.813l4.358 3.845.496.438.496-.438 4.642-4.096L9.504.438 4.862 4.534h.992L1.496.69.504 1.812z"></path>
                </svg>
            </div>
            <div class="order-summary-toggle-text order-summary-toggle-text-hide">
                <span>Ẩn thông tin đơn hàng</span>
                <svg width="11" height="7" xmlns="http://www.w3.org/2000/svg" class="order-summary-toggle-dropdown"
                     fill="#000">
                    <path d="M6.138.876L5.642.438l-.496.438L.504 4.972l.992 1.124L6.138 2l-.496.436 3.862 3.408.992-1.122L6.138.876z"></path>
                </svg>
            </div>
            <div class="order-summary-toggle-total-recap" data-checkout-payment-due-target="669300000">
                <span class="total-recap-final-price">6,693,000₫</span>
            </div>
        </div>
    </div>
</button>
<div class="content content-second">
    <?php $this->load->view('price_discount'); ?>
</div>
<div class="content">
    <div class="wrap">
        <div class="sidebar">
            <div class="sidebar-content">
                <div class="order-summary order-summary-is-collapsed">
                    <h2 class="visually-hidden">Thông tin đơn hàng</h2>
                    <div class="order-summary-sections">
                        <div class="order-summary-section order-summary-section-product-list"
                             data-order-summary-section="line-items">
                            <table class="product-table">
                                <thead>
                                <tr>
                                    <th scope="col"><span class="visually-hidden">Hình ảnh</span></th>
                                    <th scope="col"><span class="visually-hidden">Mô tả</span></th>
                                    <th scope="col"><span class="visually-hidden">Số lượng</span></th>
                                    <th scope="col"><span class="visually-hidden">Giá</span></th>
                                </tr>
                                </thead>
                                <tbody>

                                <tr class="product" data-product-id="1004862902" data-variant-id="1012030836">
                                    <td class="product-image">
                                        <div class="product-thumbnail">
                                            <div class="product-thumbnail-wrapper">
                                                <img class="product-thumbnail-image"
                                                     alt="ĐỒNG HỒ NAM SKMEI KIM XANH DƯƠNG"
                                                     src="<?php echo upload_url('product') ?>/1_e0ed7c0240734782a8268793dce0b9b8_small.jpg"/>
                                            </div>
                                            <span class="product-thumbnail-quantity" aria-hidden="true">7</span>
                                        </div>
                                    </td>
                                    <td class="product-description">
                                        <span class="product-description-name order-summary-emphasis">ĐỒNG HỒ NAM SKMEI KIM XANH DƯƠNG</span>

                                    </td>
                                    <td class="product-quantity visually-hidden">7</td>
                                    <td class="product-price">
                                        <span class="order-summary-emphasis">3,493,000₫</span>
                                    </td>
                                </tr>

                                <tr class="product" data-product-id="1004853557" data-variant-id="1012006173">
                                    <td class="product-image">
                                        <div class="product-thumbnail">
                                            <div class="product-thumbnail-wrapper">
                                                <img class="product-thumbnail-image"
                                                     alt="ĐỒNG HỒ NAM TEVISE 1952 CHẠY CƠ CỰC CHẤT"
                                                     src="<?php echo upload_url('product') ?>/7_0590d26379fb4da3ba8d9b57564ee6b0_small.jpg"/>
                                            </div>
                                            <span class="product-thumbnail-quantity" aria-hidden="true">4</span>
                                        </div>
                                    </td>
                                    <td class="product-description">
                                        <span class="product-description-name order-summary-emphasis">ĐỒNG HỒ NAM TEVISE 1952 CHẠY CƠ CỰC CHẤT</span>

                                    </td>
                                    <td class="product-quantity visually-hidden">4</td>
                                    <td class="product-price">
                                        <span class="order-summary-emphasis">3,200,000₫</span>
                                    </td>
                                </tr>

                                </tbody>
                            </table>
                        </div>

                        <div class="order-summary-section order-summary-section-discount"
                             data-order-summary-section="discount">
                            <form id="form_discount_add" accept-charset="UTF-8" method="post">
                                <input name="utf8" type="hidden" value="✓">
                                <div class="fieldset">
                                    <div class="field  ">
                                        <div class="field-input-btn-wrapper">
                                            <div class="field-input-wrapper">
                                                <label class="field-label" for="discount.code">Mã giảm giá</label>
                                                <input placeholder="Mã giảm giá" class="field-input"
                                                       data-discount-field="true" autocomplete="off"
                                                       autocapitalize="off" spellcheck="false" size="30" type="text"
                                                       id="discount.code" name="discount.code" value=""/>
                                            </div>
                                            <button type="submit" class="field-input-btn btn btn-default btn-disabled">
                                                <span class="btn-content">Sử dụng</span>
                                                <i class="btn-spinner icon icon-button-spinner"></i>
                                            </button>
                                        </div>

                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="order-summary-section order-summary-section-total-lines"
                             data-order-summary-section="payment-lines">
                            <table class="total-line-table">
                                <thead>
                                <tr>
                                    <th scope="col"><span class="visually-hidden">Mô tả</span></th>
                                    <th scope="col"><span class="visually-hidden">Giá</span></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr class="total-line total-line-subtotal">
                                    <td class="total-line-name">Tạm tính</td>
                                    <td class="total-line-price">
															<span class="order-summary-emphasis"
                                                                  data-checkout-subtotal-price-target="669300000">
																6,693,000₫
															</span>
                                    </td>
                                </tr>

                                <tr class="total-line total-line-shipping">
                                    <td class="total-line-name">Phí vận chuyển</td>
                                    <td class="total-line-price">
															<span class="order-summary-emphasis"
                                                                  data-checkout-total-shipping-target="0">

																	—

															</span>
                                    </td>
                                </tr>
                                </tbody>
                                <tfoot class="total-line-table-footer">
                                <tr class="total-line">
                                    <td class="total-line-name payment-due-label">
                                        <span class="payment-due-label-total">Tổng cộng</span>
                                    </td>
                                    <td class="total-line-name payment-due">
                                        <span class="payment-due-currency">VND</span>
                                        <span class="payment-due-price" data-checkout-payment-due-target="669300000">
																6,693,000₫
															</span>
                                    </td>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="main">
            <?php $this->load->view('order_main'); ?>
        </div>
    </div>
</div>