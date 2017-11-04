/**
 * Created by tient on 21/7/2017.
 */
//
// function menu_top(str) {
//     var xmlHttpRequest;
//     if (window.XMLHttpRequest) {
//         xmlHttpRequest = new XMLHttpRequest();
//     } else {
//         xmlHttpRequest = new ActiveXObject("Microsoft.XMLHTTP");
//     }
//     xmlHttpRequest.open("GET", "menu_top.php?act="+str, true);
//     xnmlHttpRequest.send();
//
// //        response
//     xmlHttpRequest.onreadystatechange = function () {
//         if (xmlHttpRequest.readyState == 4 && xmlHttpRequest.status == 200) {
//             var response = xmlHttpRequest.responseText;
//         }
//     }
// }
$(document).ready(function () {

    menu_home_ajax();

});
function menu_home_ajax() {
    $(".home").click(function () {
        event.preventDefault();
        jQuery.ajax({
            type:"GET",
            async:false,
            url:"<?php echo site_url('menu'); ?>",
            data:"act=home",
            dataType:'json',
            success:function (data) {
                if (data){
                    $('#menu').innerHTML='this content ajax';
                }
            }
        });
    })
}

