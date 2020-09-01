<?php
require_once 'function.php';
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../Public/bootstrap-3.3.7-dist/css/bootstrap.css">
    <script src="../Public/bootstrap-3.3.7-dist/js/jquery-3.2.1.js"></script>
    <script src="../Public/bootstrap-3.3.7-dist/js/bootstrap.js"></script>
    <script src="../Public/bootstrap-3.3.7-dist/js/jquery-3.2.0.min.js"></script>
    <script src="../Public/JS/navbar.js"></script>
    <link rel="stylesheet" href="../Public/fontawesome-free-5.12.1-web/css/all.css">
    <link href="https://fonts.googleapis.com/css2?family=Notable&family=Racing+Sans+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Patua+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../Public/CSS/call.css">
    <link rel="stylesheet" href="../Public/CSS/index3.css">
    <title>LTPStore - Điện thoại chính hãng, giá tốt nhất</title>
</head>
<body>
<div class="row headers">
    <div class="container">
        <span class="topp col-md-3 col-sm-3 col-xs-6"><i class="fas fa-hand-holding-usd"></i><a href="Trangchu.php"> Cam kết giá tốt nhất</a></span>
        <span class="topp col-md-3 col-sm-3 col-xs-6"><i class="fas fa-truck-moving"></i><a href="freeship.php">Miễn phí vận chuyển</a></span>
        <span class="topp col-md-3 col-sm-3 col-xs-6"><i class="fas fa-map-marked-alt"></i><a href="Trangchu.php">Thanh toán khi nhận hàng</a></span>
        <span class="topp col-md-3 col-sm-3 col-xs-6"><i class="fas fa-shield-alt"></i><a href="change_delivery.php">Đổi trả trong 7 ngày</a></span>
        <!--        <span class="topp"><a href="#">Bảo hành tận nơi</a></span>-->
    </div>
</div>
<!-- Header -->
<div class="row header">
    <div class="topnav" id="myTopnav">
        <a href="Trangchu.php" class="logo">
            <span class="logo1">L</span>
            <span class="logo2">TPStore</span></a>
        <a href="Trangchu.php">Trang Chủ</a>
        <a href="introduce.php">Giới Thiệu</a>
        <a href="tel: 0963785109">Liên Hệ</a>

        <a href="javascript:void(0);"
           style="font-size:19px;"
           class="icon" onclick="myFunction()">&#9776;</a>

        <?php
        if (isset($_SESSION['account']) or isset($_SESSION['avatar']))
        {
            $prfuser = prf_user($_SESSION['id_kh']);
            $prf = mysqli_fetch_array($prfuser);
            $anhdd = $prf['avatar'];
            echo "<a class='regis_log' href='profile_user.php'>
                  <img src='../Images/$anhdd' alt=''>"."
                  <font style='color: bisque'>".$_SESSION['account']."</font></a>";
        }else
        {
            ?>
            <a href="register.php" class="regis_log"><span class="fa fa-user-plus"></span> Đăng Ký</a>
            <a class="regis_log" href="login.php"><span class="glyphicon glyphicon-log-in"></span> Đăng Nhập</a>
        <?php } ?>
        <a href="cart.php" class="regis_log">
            <i class="fa fa-cart-plus"></i>
        </a>
        <div class="search">
            <form action="result_search.php" method="post" class="form-inline">
                <input type="text" name="text_search" id="search" class="form-control text-search" placeholder="Tìm kiếm...">
                <input type="submit" value="Tìm kiếm" name="search" class="btn btn-warning">
            </form>
        </div>
    </div>
    <div class="row result-search">
        <div class="list-group col-md-5 col-md-offset-4" id="show-list">
            <!--            <a href="#" class="list-group-item border-1">List 1</a>-->
        </div>
    </div>
</div>

<!--  Body  -->
<div class="container pay">
    <div class="row">
        <h3 class="text-center"><img src="../Images/businiss.jpg" alt=""></h3>
        <h3 class="text-center"><b>LIÊN HỆ HỢP TÁC KINH DOANH</b></h3>
        <div class="container pay-text">
            <p><b>Mọi thông tin liên hệ hợp tác, cho thuê mặt bằng vui lòng liên hệ:</b></p>
            <ul>
                <li><b>Mr Tan Phat</b></li>
                <li>Email: <font>tanphat@ltpstore.com.vn</font></li>
            </ul>
            <p><b>Hợp tác với các kênh video LTPTech:</b></p>
            <ul>
                <li><b>Mr Phat</b></li>
                <li>Email: <font>SangtaoLTP@gmail.com</font></li>
                <li>Link kênh: <a href="https://www.youtube.com/c/SángTạoChanel090899">
                        <font>https://www.youtube.com/c/SángTạoChanel090899</font>
                    </a></li>
            </ul>
            <h4><b>LTPSTORE</b> xin cảm ơn và và kính mong hợp tác.</h4>
        </div>
    </div>
</div>

<!----------------Back To Top------------------->

<div id="back-to-top" class="back-to-top" data-toggle="tooltip" data-placement="left"
     title="Trở lên đầu trang">
    <span class="fas fa-chevron-circle-up"></span>
</div>
<!------------Call----------------->
<a id="calltrap-btn" class="b-calltrap-btn calltrap_offline hidden-phone visible-tablet"
   href="tel:0963785109" data-toggle="tooltip" title="Gọi ngay cho tôi" data-placement="right">
    <div id="calltrap-ico"></div>
</a>
<!-------------------Inbox------------------------->
<div class="float-ck">
    <div id="hide_float_right">

        <a href="javascript:hide_float_right()">
            <i class="fa fa-comment-alt"></i> Chat với nhân viên tư vấn !
            <span><i class="fas fa-minus"></i></span>
        </a>

    </div>
    <div id="float_content_right">
        <!– Start quang cao–>
        <div class="kh-ib">
            <br>
            <p><b>Nhập thông tin của bạn *</b></p>
            <form method="post">
                <p><input type="text" class="form-control" name="ten_ib" id="" placeholder="Nhập họ và tên của bạn"></p>
                <p><input type="text" class="form-control" name="email_ibb" id="" placeholder="Nhập email của bạn"></p>
                <p><input type="tel" class="form-control" name="sdt_ib" id="" placeholder="Nhập số điện thoại của bạn"></p>
                <b>Tin nhắn *</b>
                <textarea name="tin_ib" class="form-control" cols="30" rows="7" placeholder="Nội dung tin nhắn"></textarea>
                <hr>
                <button type="submit" class="btn btn-danger" name="send_ib">Gửi tin nhắn</button>
            </form>
        </div>

        <!– End quang cao –>

    </div>
</div>

<!-------------Footer------------->
<div class="row footer">
    <div class="fot col-md-3 col-sm-6 col-xs-6">
        <b>VỀ LTPSTORE</b> <br>
        <a href="introduce.php">Giới thiệu về LTPStore</a> <br>
        <a href="../../webdidong/page_text/pay.php">Thanh toán</a> <br>
        <a href="customer_care.php">Chăm sóc khách hàng</a> <br>
        <a href="data_backup.php">Quy định về việc sao lưu dữ liệu</a> <br>
        <a href="endow.php">Ưu đãi từ đối tác</a> <br>
        <a href="business_cooperation.php">Liên hệ hợp tác cùng LTPStore</a> <br>
    </div>
    <div class="fot col-md-3 col-sm-6 col-xs-6">
        <b>CHÍNH SÁCH & HỖ TRỢ</b> <br>
        <a href="online_shopping.php">Hỗ trợ mua hàng trực tuyến</a> <br>
        <a href="installment.php">Hướng dẫn mua trả góp</a> <br>
        <a href="freeship.php">Chính sách giao hàng</a> <br>
        <a href="information_security.php">Chính sách bảo mật thông tin</a> <br>
        <a href="warranty_policy.php">Chính sách bảo hành</a> <br>
        <a href="change_delivery.php">Chính sách đổi trả</a>
    </div>
    <div class="fot col-md-3 col-sm-6 col-xs-6">
        <b>THÔNG TIN LIÊN HỆ</b> <br>
        <i class="fas fa-map-marker-alt"></i>
        <span>Địa chỉ: <a target="_blank" href="https://www.google.com/maps/dir/20
        .8753456,105.8099382//@20.8750074,105.8097342,150m/data=!3m1!1e3!4m2!4m1!3e2?hl=vi-VN">
                Số 82, Rùa Hạ 1, Thanh Thùy, Thanh Oai, Hà Nội</a></span> <br>
        <i class="fas fa-mobile-alt"></i>
        <span>Điện thoại: <a href="tel: 0963785109">(+84) 963785109</a></span> <br>
        <i class="fas fa-phone-volume"></i>
        <span>Hotline: <a href="tel: 0926748870">0926748870</a></span> <br>
        <i class="fas fa-envelope-open-text"></i>
        <span>Email: <a href="https://www.google.com/gmail">lytanphat19091999@gmail.com</a></span>
    </div>
    <div class="fot col-md-3 col-sm-6 col-xs-6 map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3505.472448211638!2d105.80776541476054!3d20.87532468608173!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135b3b878ec2a67%3A0x603c8d53fc1ff574!2sLTPStore!5e1!3m2!1svi!2s!4v1595760517294!5m2!1svi!2s"
                width="600" height="210" frameborder="0" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
    </div>
</div>
<div class="row follow">
    <div class="fot col-md-12 col-sm-12 col-xs-12 text-center">
        <h4><b>Theo dõi chúng tôi</b></h4>
        <a href="https://www.facebook.com/phat.dev.9x"><div class="fab fa-facebook"></div> <span>Facebook</span></a>
        <a href="https://www.instagram.com/phat_ltp/"><div class="fab fa-instagram"></div> <span>Instagram</span></a>
        <a href="https://twitter.com/LyTanPhat6"><div class="fab fa-twitter"></div> <span>Twitter</span></a>
        <a href="https://www.youtube.com/channel/UCv3cqYB-f4DQRJMh4p_sY8g"><div class="fab fa-youtube"></div> <span>Youtube</span></a>
    </div>
</div>
</body>
</html>
<script src="../Public/JS/carousel.js"></script>
<script src="../Public/JS/search.js"></script>
