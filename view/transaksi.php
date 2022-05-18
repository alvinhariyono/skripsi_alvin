<?php

use Symfony\Component\VarDumper\VarDumper;

session_start();
// echo "session " . $_SESSION['user_login'];

$hari = date("d");
$bulan = date("m");
$tahun = date("Y");


include_once("../model/config.php");
$query_paket_laundry = mysqli_query($mysqli, "SELECT * FROM paket_laundry");

$sql_count_transaksi = mysqli_query($mysqli, "SELECT COUNT(1)  FROM transaksi WHERE `transaksi_tanggal` = '$tahun-$bulan-$hari'");
$row_count_transaksi = mysqli_fetch_array($sql_count_transaksi);
$total_row_count_transaksi = $row_count_transaksi[0];

$hariini = $hari . $bulan . $tahun . $total_row_count_transaksi + 1;

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Tayayoo Laundry - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/styles.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="transaksi.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Tayayoo Laundry </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard 
            <li class="nav-item active">
                <a class="nav-link" href="mainpage.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li> -->

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>


            <!-- Nav Item - Transaksi -->
            <li class="nav-item">
                <a class="nav-link" href="transaksi.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Transaksi</span></a>
            </li>

            <!-- Nav Item - List Transaksi -->
            <li class="nav-item">
                <a class="nav-link" href="listtransaksi.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>List Transaksi</span></a>
            </li>

            <!-- Nav Item - Stok Barang -->
            <li class="nav-item">
                <a class="nav-link" href="stokbarang.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Stok Barang</span></a>
            </li>

            <!-- Nav Item - Ambil Laundry -->
            <li class="nav-item">
                <a class="nav-link" href="ambillaundry.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Ambil Laundry</span></a>
            </li>

            <!-- Nav Item - Buat User Baru -->
            <li class="nav-item">
                <a class="nav-link" href="buatuserbaru.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Buat User Baru</span></a>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">


        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                    <?php
                                    echo "Hai, " . $_SESSION['user_login'];
                                    ?>
                                </span>
                            </a>
                        </li>
                    </ul>
                    <a class="btn btn-primary" href="../index.php?logout=true">Logout</a>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Transaksi</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>

                    <?php
                    echo "hari ini tanggal " . date("d-m-Y") . "<br>";
                    ?>
                    <br>
                    <!-- buat disini-->
                    <form action="">
                        <table width="25%" border="0" class="tabel">
                            <tr>
                                <td> nomor nota</td>
                                <td><?php echo $hariini; ?></td>
                            </tr>
                            <tr>
                                <td>Nama customer</td>
                                <td><input class="input" type="text" name="nama_customer"></td>
                            </tr>
                            <tr>
                                <td>alamat customer</td>
                                <td><input type="text" name="alamat customer"></td>
                            </tr>
                            <tr>
                                <td>tanggal</td>
                                <td><input type="text" name="mobile"></td>
                            </tr>
                            <tr>
                                <td></td>

                            </tr>
                        </table>
                        <br>


                        <table class="table">
                            <thead>
                                <tr class="">
                                    <th>No</th>
                                    <th>Item</th>
                                    <th>Quantity</th>
                                    <th>Cost(Per Item)</th>
                                    <th>Keterangan tambahan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class=" " id="1">
                                    <td scope="row">1</td>
                                    <td>
                                        <select name="dropdown_paket_laundry" id="dropdown_paket_laundry" onchange="getValue()">
                                            <option disabled selected> Pilih Paket</option>
                                            <?php
                                            while ($paket_laundry = mysqli_fetch_array($query_paket_laundry)) {
                                            ?> <option value="<?= $paket_laundry['paket_laundry_nama'] ?>"><?= $paket_laundry['paket_laundry_nama'] ?></option>

                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </td>
                                    <td>
                                        <input id="item1-Quantity" name="item1-quantity" type="number" onkeyup="quantityOnchange(this)">
                                    </td>
                                    <td>
                                        <div id="harga_paket_laundry"> </div> <br>
                                        <!-- <input id="result" name="item1-Price" type="number" placeholder=""> -->
                                    </td>
                                    <td>
                                        <input id="item1-Subtotal" name="item1-Subtotal" type="text" placeholder="keterangan tambahan">
                                    </td>
                                </tr>
                                <tr id="total-payment">
                                    <td colspan="4">Total : </td>
                                    <td>
                                        <p id="totalToPay"></p>
                                        <input id="totalTopayInput" name="totalToPay" type="hidden" value="0">
                                        <input type="hidden" id="rowCount" name="rowCount" value="1"></input>
                                    </td>
                                    </td>
                                </tr>
                            </tbody>

                        </table>
                        <div class="row">
                            <div class="col-5 form-group">
                                <label for="pay">Bayar</label>
                                <input type="number" class="form-control" id="payTotal" placeholder="Jumlah dibayarkan" onkeyup="giveChange(this)">
                            </div>
                            <div class="col-5 form-group">
                                <label for="change">Change</label>
                                <input type="text" class="form-control" id="change" placeholder="Change/kembalian">
                            </div>

                            <button type="submit" name="payment_success" class=" col-2 btn btn-primary">Pay</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Tayayoo Laundry 2022</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>





<script type="text/javascript">
    function getValue() {
        var dropdown_paket_laundry = document.getElementById("dropdown_paket_laundry");
        var harga_paket_laundry = document.getElementById("harga_paket_laundry");
        // harga_paket_laundry.innerHTML = dropdown_paket_laundry.value;

        <?php
        $result = mysqli_query($mysqli, "SELECT paket_laundry_harga FROM `paket_laundry` WHERE paket_laundry_nama = 'dropdown_paket_laundry'");
        $hasil_sql = mysqli_fetch_all($result);
        ?>
        var hasil = $hasil_sql;
        alert(hasil + "jnck");
        harga_paket_laundry.innerHTML = $hasil_sql;

    }
</script>

<script>
    function showHint(str) {
        if (str.length == 0) {
            document.getElementById("txtHint").innerHTML = "";
            return;
        } else {
            const xmlhttp = new XMLHttpRequest();
            xmlhttp.onload = function() {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
            xmlhttp.open("GET", "gethint.php?q=" + str);
            xmlhttp.send();
        }
    }
</script>