<?php
require_once 'function.php';
session_start();
$idsp = $_GET["idsp"];
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
<?php
    if (isset($_POST['ok'])){
        $tensp = $_POST["tensp"];
        $img_name = $_FILES['anhsp']['name'];
        $img_tmpname = $_FILES['anhsp']['tmp_name'];
        $giasp = $_POST["giasp"];
        $giakm = $_POST["giakm"];
        $mausac = $_POST["mausac"];
        $trongluong = $_POST["trongluong"];
        $kichthuoc = $_POST["kichthuoc"];
        $soluong = $_POST["soluong"];
        $chipset = $_POST["chipset"];
        $pin = $_POST["pin"];
        $cameratruoc = $_POST["cameratruoc"];
        $camerasau = $_POST["camerasau"];
        $cambien = $_POST["cambien"];
        $hdh = $_POST["hdh"];
        $gps = $_POST["gps"];
        $blutooth = $_POST["blutooth"];
        $wlan = $_POST["wlan"];
        $dpgmh = $_POST["dpgmh"];
        $ktmh = $_POST["ktmh"];
        $loaisim = $_POST["loaisim"];
        $rom = $_POST["rom"];
        $ram = $_POST["ram"];
        $hangsx = $_POST["dmsp"];
        $baohanh = $_POST["baohanh"];

        if (!empty($tensp) && !empty($giasp) && !empty($giakm) && !empty($hangsx) && !empty($soluong)
            && !empty($rom) && !empty($ram) && !empty($mausac) && !empty($img_name)){
            move_uploaded_file($img_tmpname,'../Images/'.$img_name);
            $suasp= sua_sp($idsp, $tensp, $img_name, $giasp, $giakm, $mausac, $trongluong, $kichthuoc, $soluong,
                            $chipset, $pin, $cameratruoc, $camerasau, $cambien, $hdh, $gps, $blutooth, $wlan,
                            $dpgmh, $ktmh, $loaisim, $rom, $ram, $hangsx, $baohanh);
            if ($suasp){
                header('location: view_product.php');
            }else{
                echo "<script>alert('Cập nhật sản phẩm không thành công')</script>";
            }
        }else{
            echo "<script>alert('Vui lòng nhập đầy đủ thông tin')</script>";
        }
    }
?>
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
            <span> > </span>
            <a href="edit_product.php">Cập nhật sản phẩm</a>
        </div>
        <div class="row right-admin-bottom">
            <form method="post" enctype="multipart/form-data">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <?php
                        $dssp_id = ds_sp_id($idsp);
                        $num = mysqli_fetch_array($dssp_id);
                        ?>
                        <tr>
                            <th>Tên sản phẩm</th>
                            <td><input type="text" name="tensp" class="form-control" value="<?php echo $num['ten_sp']; ?>" id=""></td>
                            <th>Ảnh sản phẩm</th>
                            <td><input type="file" name="anhsp" id="">
                                <img src="../Images/<?php echo $num['anh_sp'];?>" alt="ltpdz" name="anhspp" style="width: 50px; height: 50px ">
                            </td>
                        </tr>
                        <tr>
                            <th>Giá sản phẩm</th>
                            <td><input type="number" class="form-control" name="giasp" value="<?php echo $num['gia_sp']; ?>" id=""></td>
                            <th>Giá khuyến mại</th>
                            <td><input type="number" class="form-control" name="giakm" value="<?php echo $num['gia_km']; ?>" id=""></td>
                        </tr>
                        <tr>
                            <th>Màu sắc</th>
                            <td><input type="text" class="form-control" name="mausac" value="<?php echo $num['mau_sac']; ?>" id=""></td>
                            <th>Trọng lượng</th>
                            <td><input type="text" class="form-control" name="trongluong" value="<?php echo $num['trong_luong']; ?>" id=""></td>
                        </tr>
                        <tr>
                            <th>Kích thước</th>
                            <td><input type="text" class="form-control" name="kichthuoc" value="<?php echo $num['kich_thuoc']; ?>" id=""></td>
                            <th>Số lượng</th>
                            <td><input type="number" class="form-control" name="soluong" value="<?php echo $num['so_luong']; ?>" id=""></td>
                        </tr>
                        <tr>
                            <th>Chip set</th>
                            <td><input type="text" class="form-control" name="chipset" value="<?php echo $num['chip_set']; ?>" id=""></td>
                            <th>Pin</th>
                            <td><input type="text" class="form-control" name="pin" value="<?php echo $num['pin']; ?>" id=""></td>
                        </tr>
                        <tr>
                            <th>Camera trước</th>
                            <td><input type="text" class="form-control" name="cameratruoc" value="<?php echo $num['camera_truoc']; ?>" id=""></td>
                            <th>Camera sau</th>
                            <td><input type="text" class="form-control" name="camerasau" value="<?php echo $num['camerasau']; ?>" id=""></td>
                        </tr>
                        <tr>
                            <th>Cảm biến</th>
                            <td><input type="text" class="form-control" name="cambien" value="<?php echo $num['cam_bien']; ?>" id=""></td>
                            <th>Hệ điều hành</th>
                            <td><input type="text" class="form-control" name="hdh" value="<?php echo $num['he_dieu_hanh']; ?>" id=""></td>
                        </tr>
                        <tr>
                            <th>GPS</th>
                            <td><input type="text" class="form-control" name="gps" value="<?php echo $num['gps']; ?>" id=""></td>
                            <th>Blutooth</th>
                            <td><input type="text" class="form-control" name="blutooth" value="<?php echo $num['blutooth']; ?>" id=""></td>
                        </tr>
                        <tr>
                            <th>WLAN</th>
                            <td><input type="text" class="form-control" name="wlan" value="<?php echo $num['wlan']; ?>" id=""></td>
                            <th>Độ phân giải màn hình</th>
                            <td><input type="text" class="form-control" name="dpgmh" value="<?php echo $num['do_phan_giai_mh']; ?>" id=""></td>
                        </tr>
                        <tr>
                            <th>Kích thước màn hình</th>
                            <td><input type="text" class="form-control" name="ktmh" value="<?php echo $num['kich_thuoc_mh']; ?>" id=""></td>
                            <th>Loại sim</th>
                            <td><input type="text" class="form-control" name="loaisim" value="<?php echo $num['loai_sim']; ?>" id=""></td>
                        </tr>
                        <tr>
                            <th>ROM</th>
                            <td><input type="text" class="form-control" name="rom" value="<?php echo $num['rom']; ?>" id=""></td>
                            <th>RAM</th>
                            <td><input type="text" class="form-control" name="ram" value="<?php echo $num['ram']; ?>" id=""></td>
                        </tr>
                        <tr>
                            <th>Hãng sản xuất</th>
                            <td>
                                <?php echo $num['ten_dmsp']; ?> <br>
                                <select name="dmsp" class="form-control">
                                    <?php
                                    $dmsp= ds_dmsp();
                                    while ($num1 = mysqli_fetch_array($dmsp))
                                    {
                                    ?>
                                    <option value="<?php echo $num1['id_dmsp']; ?>">
                                        <?php echo $num1['ten_dmsp']; ?>
                                    </option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </td>
                            <th>Bảo hành</th>
                            <td><input type="text" class="form-control" name="baohanh" value="<?php echo $num['bao_hanh']; ?>" id=""></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <a href="view_product.php"><button type="button" class="btn-primary btn"
                                                                         style="float: left;margin-left: 24px;width: 130px;font-size: 18px;">Quay lại</button></a>
                            </td>
                            <td colspan="2">
                                <button type="submit" name="ok" class="btn btn-success"
                                        style="float: right;margin-right: 24px;width: 130px;font-size: 18px;">Cập Nhật</button>
                            </td>
                        </tr>
                    </table>
                </div>
            </form>
        </div>
    </div>
</div>

<!--  Footer  -->
</body>
</html>
<?php }else{header('location: ../Customer/login.php');} ?>