<?php
require_once 'function.php';
session_start();
if (isset($_SESSION['account']))
{
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
        <link rel="stylesheet" href="../Public/CSS/index3.css">
        <link rel="stylesheet" href="../Public/CSS/admin.css">
        <title>LTPStore - Điện thoại chính hãng, giá tốt nhất</title>
    </head>

    <body class="body-all-ad">
    <!-- Header -->
    <!-- Header -->
    <div class="row header" style="margin: auto; width: 100%">
        <div class="topnav" id="myTopnav">
            <a href="Manager.php" class="logo">
                <span class="logo1"><i class="fas fa-users-cog"></i> A</span>
                <span class="logo2">dministrator</span></a>
            <a href="../Customer/Trangchu.php"><i class="fas fa-reply"></i> Vào trang web</a>
            <a href="../Customer/introduce.php">Giới Thiệu</a>
            <a href="tel: 0963785109">Liên Hệ</a>
            <a href="statistical.php">Thống kê</a>

            <a href="javascript:void(0);"
               style="font-size:19px;"
               class="icon" onclick="myFunction()">&#9776;</a>

            <?php
            if (isset($_SESSION['account']))
            {
                echo "<a class='regis_log' href='../Customer/profile_user.php'>
                  <img src='../Images/Tan%20Phat.jpg' alt='Lý Tấn Phát'>"."
                  <font style='color: bisque'>".$_SESSION['account']."</font></a>";
            }else
            {
                ?>
                <a href="../Customer/register.php" class="regis_log"><span class="fa fa-user-plus"></span> Đăng Ký</a>
                <a class="regis_log" href="../Customer/login.php"><span class="glyphicon glyphicon-log-in"></span> Đăng Nhập</a>
            <?php } ?>
        </div>
    </div>

    <!--  Body  -->
    <div class="row body_admin">
        <div class="col-md-3 left-admin" id="left-admin">
            <div class="home-admin">
                <a href="Manager.php">
                    <i class="fas fa-house-damage"></i> Trang chủ Admin
                </a>
            </div>
            <div class="left-list">
                <input class="qtad" id="qtht" type="checkbox" >
                <label class="fa fa-user" for="qtht">Quản trị hệ thống</label>

                <div>
                    <a href="account_management.php">Quản lý tài khoản</a>
                </div>
            </div>
            <div class="left-list">
                <input class="qtad" id="qtdm" type="checkbox" >
                <label class="fa fa-list" for="qtdm">Quản lý danh mục</label>
                <div>
                    <a href="view_category.php">Danh mục sản phẩm</a> <br>
                    <a href="view_product.php">Sản phẩm</a>
                </div>
            </div>
            <div class="left-list">
                <input class="qtad" id="qtnv" type="checkbox" >
                <label class="fa fa-coins" for="qtnv">Quản lý nghiệp vụ</label>
                <div>
                    <a href="view_order.php">Quản lý đơn đặt hàng</a> <br>
                    <a href="view_comment.php">Quản lý phản hồi</a>
                </div>
            </div>
        </div>
        <div class="col-md-9 right-admin" id="right-admin">
            <div class="row right-admin-top">
                <a href="../Customer/Trangchu.php">
                    <i class="fas fa-home"></i> Trang chủ website
                </a>
                <span> > </span>
                <a href="view_category.php">Quản lý danh mục</a>
                <span> > </span>
                <a href="view_product.php">Sản phẩm</a>
            </div>
            <div class="row right-admin-bottom">
                <div>
                    <form method="post" action="search_product.php" class="search_ad">
                        <input type="text" name="searchadmin" placeholder="Tìm kiếm">
                        <button type="submit" name="btnSearchtk" class="btn btn-danger">Tìm kiếm</button>
                    </form>
                    <a href="add_product.php" class="add_new">
                        <button class="btn btn-primary"><i class="fa fa-plus"></i>Thêm mới</button>
                    </a>
                </div>
                <div class="table-responsive table_admin">
                    <table class="table table-bordered text-center">

                        <?php
                        $stt = 1;
                        if (isset($_POST["btnSearchtk"])){
                            $texttk = $_POST['searchadmin'];
                            if (!empty($texttk)){
                                $timkiem = search_sp($texttk);
                                if (mysqli_num_rows($timkiem) > 0){
                                    ?>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Ảnh sản phẩm</th>
                                        <th>Mã sản phẩm</th>
                                        <th>Hãng sản xuất</th>
                                        <th>Giá sản phẩm</th>
                                        <th>Giá khuyến mại</th>
                                        <th>Số lượng</th>
                                        <th>Tác vụ</th>
                                    </tr>
                                    <?php
                                    while ($num = mysqli_fetch_array($timkiem))
                                    {
                                        ?>
                                        <tr>
                                            <td><?php echo $stt; ?></td>
                                            <td><?php echo $num["ten_sp"]; ?></td>
                                            <td><img src="../Images/<?php echo $num["anh_sp"]; ?>"
                                                     alt="LTPs2" style="width: 50px; height: 50px"></td>
                                            <td><?php echo $num["id_sp"]; ?></td>
                                            <td><?php echo $num["ten_dmsp"]; ?></td>
                                            <td><?php echo number_format($num["gia_sp"],'0',',','.'); ?></td>
                                            <td><?php echo number_format($num["gia_km"],'0',',','.'); ?></td>
                                            <td><?php echo $num["so_luong"]; ?></td>
                                            <td>
                                                <a href="edit_product.php?idsp=<?php echo $num['id_sp']; ?>">
                                                    <i class="glyphicon glyphicon-edit"></i></a>
                                                <a href="delete_product.php?idsp=<?php echo $num['id_sp']; ?>"
                                                   onClick ="if(confirm('Bạn chắc chắn muốn xóa'))
                               return true; else return false;"><i class="glyphicon glyphicon-trash"></i></a>
                                            </td>
                                        </tr>
                                        <?php
                                        $stt +=1;
                                    }
                                }else{
                                    echo "<div class='row text-center' style='padding-bottom: 150px;margin: auto'>".
                                        "<img src='../Images/Search-no.png' style='background: #f6f3f3;'>".
                                        "<h3>Không tìm thấy sản phẩm nào</h3>".
                                        "<h3>Hãy thử sử dụng các từ khóa chung chung hơn</h3>"."</div>";
                                }
                            }else{
                                echo "<script>alert('Nhập từ khóa cần tìm !')</script>";
                                echo "<div class='row text-center' style='padding-bottom: 150px;margin: auto'>".
                                    "<img src='../Images/Search-no.png' style='background: #f6f3f3;'>".
                                    "<h3>Không tìm thấy sản phẩm nào</h3>".
                                    "<h3>Hãy thử sử dụng các từ khóa chung chung hơn</h3>"."</div>";
                            }
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!--  Footer  -->
    </body>
    </html>
<?php }else{header('location: ../Customer/Trangchu.php');} ?>