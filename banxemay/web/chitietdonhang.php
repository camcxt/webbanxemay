<?php
include "header.php";
require_once('../db/dbhelper.php');
?>
<?php if (isset($_SESSION['USER'])) {
    $user = $_SESSION['USER'];
}
?>
<?php
$sql = 'select * from donhang where ten = "' . $user['username'] . '"';
$categoryList = executeResult($sql);
$index = 1;
foreach ($categoryList as $item) {
    $id = $item['id'];
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>success</title>
</head>

<body>
    <section class="success">
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4"> ĐƠN HÀNG
                    </h1>
                    <ol class="breadcrumb mb-4">

                        <li class="breadcrumb-item active">
                            QUẢN LÝ ĐƠN HÀNG
                        </li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fa fa-shopping-cart"></i>
                            Dữ liệu đơn hàng

                            &emsp; &emsp;

                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th> ID Đơn Hàng </th>
                                            <th> Tên Sản Phẩm </th>
                                            <th> Hình Ảnh </th>
                                            <th> Số lượng </th>
                                            <th> Giá </th>
                                            
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        // lấy dữ liệu hãng ra
                                        if (isset($id)) {
                                            $sqlgiohang = 'SELECT giohang.id_donhang, sanpham.tensp ,sanpham.hinhanh,giohang.soluong, giohang.gia FROM giohang  JOIN sanpham ON giohang.id_sanpham = sanpham.id WHERE id_donhang = "' . $id . '"';
                                            $giohangList = executeResult($sqlgiohang);
                                            foreach ($giohangList as  $item) {
                                                echo '<tr>
                                                            <td>' . $item['id_donhang'] . '</td>
                                                            <td>' . $item['tensp'] . '</td>  
                                                            <td><img src="' . $item['hinhanh'] . '" ></td>                                                            
                                                            <td>' . $item['soluong'] . '</td>
                                                            <td>' . $item['gia'] . '</td>
                                                           
                                                      </tr>';
                                            }
                                        }
                                       
                                        ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </main>


        </div>
    </section>

</body>

</html>