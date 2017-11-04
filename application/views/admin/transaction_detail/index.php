<?php
$this->load->view('admin/transaction_detail/head', $this->data);
?>
<div class="line"></div>
<div class="wrapper" id="main_transaction">
    <?php
    //  var_dump($this->session->flashdata('message'));
    if ($this->session->flashdata('message') != '') {
        $this->data['message'] = $this->session->flashdata('message');
        $this->load->view('admin/messager', $this->data);
    }
    ?>
    <div class="widget">

        <div class="title">
            <span class="titleIcon"><input id="titleCheck" name="titleCheck" type="checkbox"></span>
            <h6>
                Danh sách sản phẩm </h6>
            <div class="num f12">Số lượng: <b><?php echo $total_rows; ?></b></div>
        </div>

        <table class="sTable mTable myTable" id="checkAll" width="100%" cellspacing="0" cellpadding="0">

            <thead class="filter">
            <tr>
                <td colspan="8">
                    <form class="list_filter form" action="<?php echo admin_url('transaction'); ?>" method="post">
                        <table width="100%" cellspacing="0" cellpadding="0">
                            <tbody>
                            <tr>

                                <td class="label" style="width:40px;"><label for="filter_id">Mã số</label></td>
                                <td class="item"><input name="id" value="<?php echo $this->input->get('id'); ?>"
                                                        id="filter_id" style="width:55px;"
                                                        type="text"></td>

                                <td style="width:150px">
                                    <input class="button blueB" value="Lọc" type="submit">
                                    <input class="basic" value="Reset"
                                           onclick="window.location.href = '<?php echo admin_url("transaction") ?>'; "
                                           type="reset">
                                </td>
                                <td class="label" style="color: blue">Mã giao dịch:
                                            <?php echo $transactionId; ?>

                                </td>
                            </tr>

                            </tbody>
                        </table>
                    </form>
                </td>
            </tr>
            </thead>

            <thead>
            <tr>
                <td style="width:5px;">STT</td>
                <td style="width:5px;">Mã sản phẩm</td>
                <td style="width:110px;">Tên sản phẩm</td>
                <td style="width: 10px;">Số lượng</td>
                <td style="width:45px;">Thành tiền (USD)</td>
                <td style="width:25px;">Thanh toán</td>

            </tr>
            </thead>

            <tfoot class="auto_check_pages">
            <tr>
                <td colspan="7">
                    <div class="itemActions">
                        <a href="<?php echo admin_url('transaction'); ?>" id="submit" class="button blueB">
                            <span style="color:white;">Quay lại</span>
                        </a>
                    </div>

                    <div class="pagination">
                        <?php
                        echo $this->pagination->create_links();
                        ?>
                    </div>
                </td>
            </tr>
            </tfoot>

            <tbody class="list_item">
            <div id="loading" style="width: 50px;height: 50px;position: absolute;z-index: 99;margin:15% 45%;"></div>
            <?php
            $i=1;
            foreach ($list as $item) {
                ?>
                <tr class="row_<?php echo $item['MA_SANPHAM']; ?>">
                    <td style="text-align: center;"><?php echo $i++;?></td>

                    <td style="text-align: center;">
                        <?= $item['MA_SANPHAM'] ?>
                    </td>

                    <td class="tooltip">
                        <b><?php echo $item['TEN_SANPHAM']; ?></b>
                        <span class="tooltiptext">Đơn giá: <?php echo $item['DONGIA_BAN']; ?></span>
                    </td>
                    <td>
                        <?php echo $item['SOLUONG']; ?>
                    </td>
                    <td>
                        <?php echo number_format($item['THANHTIEN']); ?>
                    </td>
                    <td>
                        <?php echo $item['THANHTIEN']; ?>

                    </td>

                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
    </div>
</div>

