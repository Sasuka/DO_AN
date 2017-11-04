// jQuery(document).ready(function ($) {
//     //selector den menu can lam viec
//     var TopFixMenu = $("#top-menu");
//     //dung su kien cuon chuot de bat thong thin da cuoc duoc chieu dai cuon dươc la bao nhieu
//     $(window).scroll(function () {
//         //neu cuoc duoc hon 150px roi
//         if ($(this).scrollTop() > 50) {
//             //tien hanh show menu ra
//             TopFixMenu.show();
//         } else {
//             TopFixMenu.hide();
//         }
//     })
// });


$(document).ready(function () {
//slider jquery
    $('.sliders img:gt(0)').hide();
    setInterval(function () {
        $('.sliders :first-child').fadeOut()
            .next('img').fadeIn()
            .end().appendTo('.sliders');
    }, 3000);
//top back
    $('#back_to_top').click(function () {
        $('html, body').animate({scrollTop: 0}, "slow");
    });
    $(window).scroll(function () {
        if ($(window).scrollTop() > 0) {
            $('#back_to_top').fadeIn();
        } else {
            $('#back_to_top').fadeOut();
        }
    });
    //LEFT MENHU
    var menu_ul = $('.menu > li > ul'),
        menu_a = $('.menu > li > a');
    menu_ul.hide();
    menu_a.click(function (e) {
        e.preventDefault();
        if (!$(this).hasClass('active')) {
            menu_a.removeClass('active');
            menu_ul.filter(':visible').slideUp('normal');
            $(this).addClass('active').next().stop(true, true).slideDown('normal');
        } else {
            $(this).removeClass('active');
            $(this).next().stop(true, true).slideUp('normal');
        }
    });


//shop cart
    public_urlf

        var goToCartIcon = function ($addTocartBtn) {
            var $cartIcon = $(".my-cart-icon");
            var $image = $('<img width="30px" height="30px" src="' + $addTocartBtn.data("image") + '"/>').css({
                "position": "fixed",
                "z-index": "999"
            });
            $addTocartBtn.prepend($image);
            var position = $cartIcon.position();
            $image.animate({
                top: position.top,
                left: position.left
            }, 500, "linear", function () {
                $image.remove();
            });
        }

        $('.my-cart-btn').myCart({
            currencySymbol: '$',
            classCartIcon: 'my-cart-icon',
            classCartBadge: 'my-cart-badge',
            classProductQuantity: 'my-product-quantity',
            classProductRemove: 'my-product-remove',
            classCheckoutCart: 'my-cart-checkout',
            affixCartIcon: true,
            showCheckoutModal: true,
            numberOfDecimals: 2,
            cartItems: [
                {id: 1, name: 'product 1', summary: 'summary 1', price: 10, quantity: 1, image: 'images/img_1.png'},
                {id: 2, name: 'product 2', summary: 'summary 2', price: 20, quantity: 2, image: 'images/img_2.png'},
                {id: 3, name: 'product 3', summary: 'summary 3', price: 30, quantity: 1, image: 'images/img_3.png'}
            ],
            clickOnAddToCart: function ($addTocart) {
                goToCartIcon($addTocart);
            },
            afterAddOnCart: function (products, totalPrice, totalQuantity) {
                console.log("afterAddOnCart12", products, totalPrice, totalQuantity);
            },
            clickOnCartIcon: function ($cartIcon, products, totalPrice, totalQuantity) {
                console.log("cart icon clicked", $cartIcon, products, totalPrice, totalQuantity);
            },
            checkoutCart: function (products, totalPrice, totalQuantity) {
                var checkoutString = "Total Price: " + totalPrice + "\nTotal Quantity: " + totalQuantity;
                checkoutString += "\n\n id \t name \t summary \t price \t quantity \t image path";
                $.each(products, function () {
                    checkoutString += ("\n " + this.id + " \t " + this.name + " \t " + this.summary + " \t " + this.price + " \t " + this.quantity + " \t " + this.image);
                });
                alert(checkoutString)
                console.log("checking out", products, totalPrice, totalQuantity);
            },
            getDiscountPrice: function (products, totalPrice, totalQuantity) {
                console.log("calculating discount", products, totalPrice, totalQuantity);
                return totalPrice * 0.5;
            }
        });

        //search
    $('#search-input').keyup(function (evt) {
        var data_input = $(this).val();
        var dataString = 'key' + data_input;
        if ($('#loading').hasClass('loading')) {
            $('#loading').remove('loading')
        }

        if (data_input.length >= 0) {
            $.ajax({
                type: 'get',
                url: "<?php echo  process_url('')?>.'/getList/getListProduct'",
                data: dataString,
                beforeSend: function () {
                    $('#loading').addClass('loading');
                },
                success: function (listDataResponse) {
                    $('#list-product').innerHTML =listDataResponse;

                    //neu co thi xoa loading di
                    if ($('#loading').hasClass('loading')) {
                        $('#loading').remove('loading')
                    }
                }

            })
        }
    });
    //sort by
    $('#category').change(function (e) {
         e.preventDefault();
        id =$(this).val();
        $('#loading').html("<img src='public/images/loader.gif'/>").fadeIn('fast');
        $.ajax({
            url:'process/getList/sortbyProduct',
            type:'get',
            data:'sendId='+id,
            async:false
        }).done(function (result) {
            $('#loading').fadeOut('fast');
            $('#list-product > .row').empty().append(result);
        })


    })
  //  menu left
    $(".subitem1").click(function(e){
        e.preventDefault();
        var idCateproduct = $(this).attr('valu');
        // alert(idCateproduct);
        $('#loading').html("<img src='public/images/loader.gif'/>").fadeIn('fast');
        $.ajax({
            url:"process/getList/getListCateProduct",//tra ve dang mảng array()
            type:'get',
            data:"dataSend="+idCateproduct,//giá trị du lieu truyen di
             // dataType:"json",
            async:false,//mac dinh bat dong bo

        }).done(function (result) {
            $('#loading').fadeOut('fast');
            $("#list-product > .row").empty().append(result);


        }).fail(function (rs) {
                console.log('failed!');
        })



    });
    $('.my-cart-btn').live('click',function(){

    });
});

