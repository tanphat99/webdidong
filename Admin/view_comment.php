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
            <a href="view_comment.php">Quản lý nghiệp vụ</a>
            <span> > </span>
            <a href="view_comment.php">Quản lý phản hồi</a>
        </div>
        <div class="row right-admin-bottom">
            <div>
                <form method="post" action="search_comment.php" class="search_ad">
                    <input type="text" name="searchadmin" placeholder="Tìm kiếm">
                    <button type="submit" name="btnSearchtk" class="btn btn-danger">Tìm kiếm</button>
                </form>
                <a href="" class="add_new">
                    <button class="btn btn-primary"><i class="fa fa-plus"></i>Thêm mới</button>
                </a>
            </div>
            <div class="table-responsive table_admin">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th>Sản phẩm</th>
                        <th>Tên sản phẩm</th>
                        <th>ID bình luận</th>
                        <th>Thời gian bình luận</th>
                        <th>Nội dung</th>
                        <th>Thông tin người bình luận</th>
                        <th>Phản hồi</th>
                        <th>Tác vụ</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $stt = 1;
                    $list_cmt = ds_cmt();
                    while ($num=mysqli_fetch_array($list_cmt))
                    {   ?>
                        <tr>
                        <td><?php echo $stt; ?></td>
                        <td><img src="../Images/<?php echo $num["anh_sp"]; ?>"
                                 width="60" height="60" alt="LTPs2"></td>
                        <td><?php echo $num["ten_sp"]; ?></td>
                        <td><?php echo $num["id_bl"]; ?></td>
                        <td><?php echo $num["ngay_gio"]; ?></td>
                        <td><?php echo $num["noi_dung"]; ?></td>
                        <td>
                            <b>Họ tên: </b> <?php echo $num["ho_ten"]; ?> <br>
                            <b>SĐT: </b> <?php echo $num["sdt"]; ?>
                        </td>
                        <?php
                        $slrep = sl_repcmt($num['id_bl']);
                        while ($num1 = mysqli_fetch_array($slrep))
                        {
                            ?>
                            <td>
                                <a href="feedback_content.php?idcmt=<?php echo $num['id_bl']; ?>" style="color: red">
                                    Có  <?php echo $num1['slrep'];?> phản hồi
                                </a>
                            </td>
                            <?php
                        }
                        ?>
                        <td>
                            <a href="reply_comment.php?idcmt=<?php echo $num['id_bl']; ?>">
                                <i class="fas fa-reply-all"></i>
                                <a href="delete_comment.php?idcmt=<?php echo $num['id_bl']; ?>"
                                   onClick ="if(confirm('Bạn chắc chắn muốn xóa'))
                               return true; else return false;"><i class="glyphicon glyphicon-trash"></i></a>
                        </td>
                    </tr>

                        <?php $stt +=1;}  ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!--  Footer  -->
</body>
</html>
<?php }else{header('location: ../Customer/login.php');} ?>